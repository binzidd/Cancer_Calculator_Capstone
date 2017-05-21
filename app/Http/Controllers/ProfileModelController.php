<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;

/*
     * Is responsible for gathering, saving and clearing profile data.
     * Accepts and processes responses from forms, merging with already gathered responses.
     * Retrieves previously gathered responses (validated and stored in session)
     * assesses it with ProfileAssessor, merges it with new response, assesses again
     * reporting evaluation, next required question or validation issue to controller.
     * Saves validated data to $_SESSION
     * Sets token within forms in addition to $_SESSION
     */


class ProfileModelController extends Controller
{

//class ProfileModel {
    private $token = NULL;        // to include in forms
    private $properties = array();  // assoc array of name => value
    private $valerrs = array();     // assoc array of validation errs
    private $assessor;          // ProfileAssessor object

    public function __construct()
    {
        session_start();
        $this->retrieve();
        if (is_null($this->token)) {
            $this->token = md5(uniqid(mt_rand(), true));
            $this->save();
        }
        $this->assessor = new ProfileAssessor();
        // Run an assessment from saved data
        // a post without an action will run from this state
        $this->assessor->submitProfile($this->properties);   //todo  1

    }

    /*
     *  Called by controller.
     *  New data to add to the Profile. Requires action and its vars
     *
     *  If validation errors, return false and controller will re-present
     *  If no validation errors, return true and controller will save
     *  Note: returning true does not mean evaluation is complete
     *  only presented form passed validation and is good data.
     *  More questions may follow.
     */
    public function formSubmission($req)
    {
        // $req['action'] is expected.
        // Controller shouldn't send if no action.
        $action = $req['action'];

        // A submitted action is valid if it equals the assessor's->toshow action
        // or it is from an already validated action
        // - this submission being a go back and correct
        if ($action != $this->assessor->getActionToShow()
            && !in_array($action, $this->assessor->getValidatedActions())
        ) {
            // An invalid action has been submitted.
            $this->setValErr('form', "Requested an invalid action.");
            return false;
        }

        // get the Action Property names
        $apnames = $this->assessor->getActionPropertyNames($action);
        if (!count($apnames) > 0) {  // requested action was invalid
            $this->setValErr('form', "Couldn't perform requested action.");
            return false;
        }

        // Add the submission's action properties to $this->properties
        // TODO should this ensure ALL apnames are present in submission?
        foreach ($apnames as $apn)
            if (isset($req[$apn]))
                $this->properties[$apn] = $req[$apn];
        unset($apn);

        // Send the accumulated properties to the assessor
        // which will validate the data set, and assess if possible
        $retrieveassessordata = true;
        if (!$this->assessor->submitProfile($this->properties)) {
            // false return = either invalid or more questions

            // if the submitted action is still the same as actiontoshow
            // validation has failed
            if ($action == $this->assessor->getActionToShow()) {
                $this->valerrs = array_merge($this->valerrs,
                    $this->assessor->getValidationErrors());
                // represent errors
                $retrieveassessordata = false;
            }
        }
        // take back validated data
        if ($retrieveassessordata)
            $this->properties = $this->assessor->getProperties();

        // return whether last submission validated
        return (count($this->valerrs) > 0 ? false : true);
    }

    /*
     * Given an action, returns assoc arr of pnames=>value for the action
     * Without, all properties returned.
     */
    public function getProperties($action = NULL)
    {
        if (is_null($action)) {
            return $this->properties;
        } else {
            $pnames = array_keys($this->getActionPropertyOptions($action));
            $pslice = array();
            foreach ($pnames as $pname)
                $pslice[$pname] = $this->properties[$pname];
            return $pslice;
        }
    }

    public function getProperty($pname)
    {
        return (isset($this->properties[$pname]) ? $this->properties[$pname] : NULL);
    }

    public function getValidationErrors()
    {
        return $this->valerrs;
    }

    public function getActionToShow()
    {
        return $this->assessor->getActionToShow();
    }

    private function setValErr($key, $errmesg)
    {
        $this->valerrs[$key] = $errmesg;
    }

    /*
     * Called by Views to insert into forms
     */
    public function getToken()
    {
        return $this->token;
    }

    public function getActionPropertyOptions($action)
    {
        return $this->assessor->getActionPropertyOptions($action);
    }

    private function set($varname, $value)
    {
        $this->properties[$varname] = $value;
    }

    public function getRiskCat($side = NULL)
    {
        return $this->assessor->getRiskCat($side);
    }

    public function getEvidenceBase($side = NULL)
    {
        return $this->assessor->getEvidenceBase($side);
    }

    public function getAlgDesc($side = NULL)
    {
        return $this->assessor->getAlgDesc($side);
    }

    /*
     * Tallies family reported number of a given factor
     * Limited to FamRels::LIM
     * Returns false if incomplete.
     */
    public function tallyFamFactor($factor)
    {
        $tally = 0;
        foreach (FamRels::getFamKeysAll() as $rel) {
            $pname = $factor . FamRels::SEP . $rel;
            $pval = $this->getProperty($pname);
            if (is_numeric($pval)) {
                $tally += $pval;
            } else {
                $tally = false;
                break;
            }
        }
        return $tally;
    }

    /*
     * Returns a summary description of entered details for a given factor.
     * If the question has not been answered or is incomplete, returns false;
     */
    public function factorSummary($factor)
    {
        if ($factor == 'assoc') {
            $report = "genetic condition associated with an increased risk of developing bowel cancer";
            $assoc = $this->getProperty($factor);
            if ($assoc == 'no') {
                $report = "No family member has ever been diagnosed with a $report.";
            } else if ($assoc == 'yes') {
                $report = "There has been a diagnosis of a $report within the family.";
            } else {
                $report = false;
            }
            return $report;
        }

        // Family factors
        $tally = $this->tallyFamFactor($factor);
        $report = '';
        $verbplural = "were";
        $verbsingle = "was";
        switch ($factor) {
            case 'crc':
                $report = "been diagnosed with bowel cancer.";
                $verbplural = "have";
                $verbsingle = "has";
                break;
            case 'y55':
                $report = "under the age of 55 when diagnosed with bowel cancer.";
                break;
            case 'mx':
                $report = "diagnosed with having multiple bowel cancers.";
                break;
            case 'y50':
                $report = "under the age of 50 when diagnosed with bowel cancer.";
                break;
            case 'nbc':
                $report = "diagnosed with another cancer(s) associated with an increased risk of developing bowel cancer.";
                break;
            default:
                die("ProfileModel tallyFamFactorDesc() handed unknown family factor '$factor'\n");
        }
        if ($tally === false) {
            $report = false;    // incomplete data
        } else if ($tally > 2) {
            $report = "Three or more family members $verbplural $report";
        } else if ($tally == 2) {
            $report = "Two family members $verbplural $report";
        } else if ($tally == 1) {
            $report = "A family member $verbsingle $report";
        } else if ($tally == 0) {
            $report = "No family member $verbsingle $report";
        } else {
            die("ProfileModel tallyFamFactorDesc() result reporting $factor error. Result was '$tally'.\n");
        }
        return $report;
    }

    /*
     * Returns a descriptive summary of the risk categories 1 thru 3.
     * If a category is not supplied, looks to see if this-> has one.
     * Returns NULL if invalid
     */
    public function getRiskCatDesc($cat = NULL)
    {
        if (is_null($cat)) {
            $cat = $this->getRiskCat();
        }
        $desc = NULL;
        if (!is_null($cat) && is_numeric($cat)) {
            $ci = $cat - 1;       // category index
            $catdescs = array(
                "At or slightly above average risk",
                "Moderately increased risk",
                "Potentially high risk"
            );
            $desc = (isset($catdescs[$ci]) ? $catdescs[$ci] : NULL);
        }
        return $desc;
    }


    /*
     * Storage control methods.
     * Stored in $_SESSION Prefix required?
     */
    private function retrieve()
    {
        $this->properties = $_SESSION;
        unset($this->properties['token']);
        if (isset($_SESSION['token']))
            $this->token = $_SESSION['token'];
    }

    public function save()
    {
        $_SESSION = $this->properties;
        $_SESSION['token'] = $this->token;
    }

    public function erase()
    {
        $this->properties = array();
        $this->token = NULL;
        $this->save();
        session_destroy();
    }

}

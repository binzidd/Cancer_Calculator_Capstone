<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;

class ProfileAccessorController extends Controller
{
    // Populated by submitProfile()
    private $validactions; // flat array of validated action keys
    private $actiontoshow; // string of next action to ask user
    // Populated by populateDataForAction()
    private $data;         // assoc arr of properties
    private $valerrs;      // assoc arr of validation errors
    // Populated by evaluateRisk()
    private $wantedactions;  // actions not answered, but wanted
    // Outcomes, only set if an evaluation has been made
    // Populated by setEvalOutcomes() by evaluateRisk()
    private $riskcat;
    private $algdesc;
    private $evidence;

    private $familysideeval; // assoc arr ms or fs => NULL or algorithmindex
    private $highside;  // ms or fs

    // flat array of assoc arr factor/info=>value constant algorithm matrix
    private $alg;


    public function __construct()
    {
        $this->reset();
    }

    private function reset()
    {
        $this->data = array();
        $this->valerrs = array();
        $this->validactions = array();
        $this->wantedactions = NULL;
        $this->actiontoshow = 'terms';
        $this->riskcat = NULL;
        $this->algdesc = NULL;
        $this->evidence = NULL;
        $this->familysideeval = array('ms' => NULL, 'fs' => NULL);
        $this->highside = NULL;
    }


    /*
     * Called by model with $dirtydata, assoc array property_name => value
     * Action (ie question) by action, validate the action's info
     * and add to this->data or valerrs, attempt evaluation.
     *
     * Returns true if evaluation is completed. Sets $this->riskcategory
     */
    public function submitProfile($dirtydata)
    {
        $this->reset(); // Populate this->data with validated new dirty data

        foreach (array_keys($this->getActions()) as $action) {

            $this->populateDataForAction($action, $dirtydata);
            if (count($this->valerrs) > 0) {
                // action to show is this action that failed validation
                $this->actiontoshow = $action;
                return false;
            }
            array_push($this->validactions, $action);
            if ($this->evaluateRisk()) {
                $this->actiontoshow = 'result';
                return true;   // we have resolution
            }
        }
        // We've walked off the end of the action list. This shouldn't happen.
        // TODO Throw error. All questions responded, but no evaluation result
        die('Error. All questions responded to, but no evaluation reached.');
    }

    /*
     * Examines properties of the given action
     * if valid, populates $this->data,
     * if invalid populates $this->valerrs
     */
    private function populateDataForAction($action, $dirtydata)
    {
        switch ($action) {
            case 'terms':
                $pr = 'acceptance_of_terms';  // property name
                $vo = array('yes');           // valid options
                if (isset($dirtydata[$pr])
                    && in_array($dirtydata[$pr], $vo)
                ) {
                    $this->data[$pr] = $dirtydata[$pr];
                } else {
                    $this->valerrs[$pr] =
                        'The terms must be accepted to use this tool.';
                }
                break;

            case 'assoc':
                $pr = 'assoc';                     // property name
                $vo = array('yes', 'no');           // TODO should ref valid options
                if (isset($dirtydata[$pr])
                    && in_array($dirtydata[$pr], $vo)
                ) {
                    $this->data[$pr] = $dirtydata[$pr];
                } else {
                    $this->valerrs[$pr] =
                        'Please select from the available options.';
                }
                break;

            default:
                $apos = $this->getActionPropertyOptions($action);

                foreach ($apos as $pname => $options) { // walk thru expected properties
                    // if not in dirty data, but set forward,
                    // use stored set forward value. Supplied dirty var overrides.
                    $dirtyval = NULL;
                    if (isset($this->data[$pname])) {
                        $dirtyval = $this->data[$pname];
                    }
                    if (isset($dirtydata[$pname])) {
                        $dirtyval = $dirtydata[$pname];
                    }

                    // is there a var set, and is it within the options allowed
                    if (!is_null($dirtyval)
                        && in_array((int)$dirtyval, array_keys($options))
                    ) {
                        // It's a good var. Store it in clean data.
                        $this->data[$pname] = (int)$dirtyval;
                        $this->populateDataForward($pname);
                    } else { // report error
                        $this->valerrs[$pname] =
                            'Please select from the available options.';
                    }
                }
        }
    }

    /*
     * Given a property name, examines this->data deducing values
     * ahead of currently examined action.
     * Called by populateDataForAction() during the
     * action by action data build up.
     * Eg if crc_ms_parent is 0, then y55, y50, mx must also be.
     */
    private function populateDataForward($pname)
    {
        list($action, $side, $rel) = explode(FamRels::SEP, $pname);
        $forwardactions = array();
        switch ($action) {
            case 'crc':
                $forwardactions = array('y55', 'mx', 'y50');
                break;
            case 'y55':
                $forwardactions = array('y50');
                break;
        }
        foreach ($forwardactions as $fact) {
            $forwardpname = $fact . FamRels::SEP . $side . FamRels::SEP . $rel;
            if ($this->data[$pname] == 0) {
                $this->data[$forwardpname] = 0;
            }
        }
    }


    public function getActions()
    {
        return array(
            'terms' => 'Terms of use',
            'assoc' => 'Any first or second degree relative known to be diagnosed with a genetic condition associated with bowel cancer',
            'crc' => 'Relatives diagnosed with colorectal cancer',
            'y55' => 'Relatives with colorectal cancer diagnosed under age 55',
            'mx' => 'Relatives with more than one colorectal cancer',
            'y50' => 'Relatives with colorectal cancer diagnosed under age 50',
            'nbc' => 'Relatives diagnosed with other cancer associated with colorectal cancer'
        );
    }

    public function getActionToShow()
    {
        return $this->actiontoshow;
    }

    public function getValidatedActions()
    {
        return $this->validactions;
    }


    public function getActionPropertyNames($action)
    {
        return array_keys($this->getActionPropertyOptions($action));
    }

    /*
     *  For a given action, return flat array of valid response options
     */
    public function getActionPropertyOptions($action)
    {
        $plist = array();

        if ($action == 'terms') {
            // TODO not referenced
            $plist['acceptance_of_terms'] = array('yes', 'no');

        } else if ($action == 'assoc') {
            // TODO not referenced
            $plist['assoc'] = array('yes', 'no', 'dontknow');

        } else if (in_array($action, array('crc', 'nbc'))) {
            foreach (FamRels::getFamKeysAll() as $rel) {
                $pn = $action . FamRels::SEP . $rel;
                $lim = FamRels::getRelLimit($rel);
                $plist[$pn] = FamRels::getRelOptionSet($lim);
            }

        } else if (in_array($action, array('y55', 'mx', 'y50'))) {
            // These are dependant on previous values
            $dep = ($action == 'y50' ? 'y55' : 'crc');
            foreach (FamRels::getFamKeysAll() as $rel) {
                $pn = $action . FamRels::SEP . $rel;
                $depn = "{$dep}_{$rel}";       // dependent property name
                if (isset($this->data[$depn])) {
                    $depv = $this->data[$depn];
                    $plist[$pn] = FamRels::getRelOptionSet($depv);
                }
            }
        }
        return $plist;
    }

    public function getValidationErrors($key = NULL)
    {
        if (is_null($key))
            return $this->valerrs;
        return (isset($this->valerrs[$key]) ? $this->valerrs[$key] : NULL);
    }

    public function getProperties()
    {
        return $this->data;
    }

    private function getAlg()
    {
        if (!is_array($this->alg)) {
            $this->populateAlgorithmArray();
        }
        return $this->alg;


        $this->populateAlgorithmArray($algstr);
    }

    /*
     * Puts algorithm lines and properties into
     * $this->alg as a flat array of assoc arrays
     * [0] => array('crc'=>0, 'fd'=>'na', ... )
     * ...
     * Each line's properties can be retrieved with
     * getAlgorithmIndexProperty($index, $property)
     */
    private function populateAlgorithmArray()
    {
        /*
         * In addition to the following algorithm table...
         *
         * Overriding factor
         * If a family member has an associated genetic condition
         * (assoc==2) => cat 3
         *
         * If both grandparents on one side of the family are indicated in any factor
         * they only count as 1 (not 2) second degree relative when applied to the algorithm
         *
         * This will foul algorithm descriptions where it occurs.
         * TODO add description modifier to note grandparent effect
         */

        $algstr = <<<EOT
crc	fd	sd	y55	mx	y50	nbc	cat	evidence_base	description
0	na	na	na	na	na	na	1	G	no familial risk factors associated with bowel cancer were reported.
1	any	any	0	na	na	na	1	G	one relative has been diagnosed with bowel cancer and was diagnosed after 55.
1	0	1	1	na	na	na	1	EO	one second degree relative has been diagnosed with bowel cancer and was diagnosed before 55.
1	1	0	1	na	na	na	2	G	one first degree relative has been diagnosed with bowel cancer and was diagnosed before 55.
2	2	0	any	0	0	0	2	G	two first degree relatives have been diagnosed with bowel cancer, neither diagnosed before 50, nor with multiple bowel cancer. No other associated cancer reported on this side of the family.
2	2	0	any	>0	na	na	3	G	two first degree relatives have been diagnosed with bowel cancer, one or both with multiple bowel cancer.
2	2	0	any	0	>0	na	3	G	two first degree relatives have been diagnosed with bowel cancer, one or both being diagnosed before 50.
2	2	0	any	0	0	>0	3	G	two first degree relatives have been diagnosed with bowel cancer, with other associated cancer(s) also reported  on this side of the family.
2	0	2	0	0	na	0	1	EO	two second degree relatives have been diagnosed with bowel cancer, neither diagnosed before 55, nor with multiple bowel cancer, nor another associated cancer on this side of the family.
2	0	2	>0	0	0	0	2	G	two second degree relatives have been diagnosed with bowel cancer, at least one diagnosed before 55, but not before 50, none with multiple bowel cancer. No other associated cancer reported on this side of the family.
>2	0	>2	any	0	0	0	2	EO	three or more second degree relatives have been diagnosed with bowel cancer, none before 50, nor with multiple bowel cancer. No associated cancer reported on this side of the family.
>1	0	>1	any	>0	na	na	3	G	two or more second degree relatives have been diagnosed with bowel cancer, at least one with multiple bowel cancer.
>1	0	>1	any	0	>0	na	3	G	two or more second degree relatives have been diagnosed with bowel cancer, at least one being diagnosed before 50.
2	0	2	any	0	0	>0	3	G	two second degree relatives have been diagnosed with bowel cancer, with other associated cancer(s) also reported on this side of the family.
>2	0	>2	0	0	na	>0	3	G	three or more second degree relatives have been diagnosed with bowel cancer, all after 55, with other associated cancer(s) also reported on this side of the family.
>2	0	>2	>0	0	0	>0	3	EO	three or more second degree relatives have been diagnosed with bowel cancer, at least one before 55, with other associated cancer(s) also reported on this side of the family.
2	1	1	any	0	0	0	2	G	one first degree and one second degree relatives have been diagnosed with bowel cancer, neither diagnosed before 50, nor with multiple bowel cancer. No other associated cancer reported on this side of the family.
2	1	1	any	>0	na	na	3	G	one first degree and one second degree relatives have been diagnosed with bowel cancer, one or both with multiple bowel cancer.
2	1	1	any	0	>0	na	3	G	one first degree and one second degree relatives have been diagnosed with bowel cancer, one or both being diagnosed before 50.
2	1	1	any	0	0	>0	3	G	one first degree and one second degree relatives have been diagnosed with bowel cancer, with other associated cancer(s) also reported on this side of the family.
>2	>0	any	na	na	na	na	3	G	more than two relatives diagnosed with bowel cancer, at least one being a first degree relative.
EOT;

        $this->alg = array();
        $alglines = explode("\n", $algstr);
        $keys = explode("\t", array_shift($alglines));

        foreach ($alglines as $line) {
            $values = explode("\t", $line);
            $combinedarray = array_combine($keys, $values);
            array_push($this->alg, $combinedarray);
        }
    }

    /*
     * Evaluate risk from gathered $this->data (which has been validated)
     * Return true if completed, or false if further info required
     */
    private function evaluateRisk()
    {
        $this->wantedactions = array();
        if (isset($this->data['assoc']) && $this->data['assoc'] == 'yes') {
            $this->setEvalOutcome(3, 'G',
                'Condition(s) associated with bowel cancer was reported in the family.');
            return true;
        }
        $factorkeys = array('crc', 'fd', 'sd', 'y55', 'mx', 'y50', 'nbc');
        $sides = array('ms', 'fs');

        // Generate family factor totals
        $factortotals = array();  // assoc array family_side=>array(factor=>total)
        foreach ($sides as $side) {
            foreach ($factorkeys as $factor) {
                $factortotals[$side][$factor] =
                    $this->getEffectiveFamilyFactorTotal($factor, $side);
            }
        }

        $alg = $this->getAlg();
        $results = array(); // assoc arr successful eval side=>array(catinfo=>val)
        $wantedfactors = array(); // flat arr of unique factors wanted

        foreach ($sides as $side) {
            $algmatches = array();

            for ($ai = 0; $ai < count($alg); $ai++) {  // algorithm index
                $match = true;    // Assuming matches are true until disproven
                foreach ($factorkeys as $factor) {
                    $crit = $alg[$ai][$factor];
                    $total = $factortotals[$side][$factor];

                    if (!$match || $crit == 'any' || $crit == 'na') {
                        // Match already established as false
                        // or Alg line doesn't care about result (ie matches all)
                        continue;
                    }
                    if (!is_numeric($total)) {
                        // Alg wants a total, but is not available. Note factor is wanted.
                        $match = false;
                        if (!in_array($factor, $wantedfactors)) {
                            array_push($wantedfactors, $factor);
                        }
                        continue;
                    }

                    $gt = false;   // test criteria is > value (rather than =)
                    if (substr($crit, 0, 1) === '>') {
                        $gt = true;
                        $crit = substr($crit, 1);
                    }
                    if (is_numeric($crit)) {
                        if (($gt && (int)$total > (int)$crit)
                            || (!$gt && (int)$total === (int)$crit)
                        ) {
                            // match is true (which is default stance)
                            continue;
                        } else {
                            $match = false;
                        }
                        continue;
                    }
                    // TODO throw error rather than die
                    die("evaluateRisk error: criteria value '$crit' invalid ");
                } // each factor

                if ($match) {
                    array_push($algmatches, $ai);
                }
            } // each algorithm lines

            if (count($algmatches) > 1) {
                // TODO throw error rather than die, more than 1 match is a problem
                die("Evaluation error: Test case matches multiple algorithm lines " . implode(',', $algmatches));
            }
            if (count($algmatches) == 1) {
                // This side of the family has resolution.
                $ai = $algmatches[0];
                $results[$side] = $ai;
            }
        } // each side

        // return true if an evaluation has been made
        if (array_key_exists('ms', $results)
            && array_key_exists('fs', $results)
        ) {
            // Set outcomes
            $this->familysideeval = $results;
            $this->highside = $this->sideWithHighestRisk();
            $highai = $results[$this->highside];
            // Add family side details to algdescription
            $this->setEvalOutcome(
                $this->alg[$highai]['cat'],
                $this->alg[$highai]['evidence_base'],
                $this->alg[$highai]['description']);
            return true;
        }
        // No evaluation made
        $this->wantedactions = array();
        foreach ($wantedfactors as $wf) {
            if ($wf != 'fd' && $wf != 'sd') {
                array_push($this->wantedactions, $wf);
            }
        }
        return false;
    }

    /*
     * Pulls details from $this->familysideeval
     * Compares their categories, returning the highest
     * or if the same, returns highest index.
     * Returns side (ie ms or fs)
     */
    private function sideWithHighestRisk()
    {
        if (is_null($this->familysideeval['ms'])
            || is_null($this->familysideeval['fs'])
        ) {
            // TODO throw error rather than die
            die("sideWithHighestRisk(): does not have mother and father side results to compare.");
        }
        $msai = $this->familysideeval['ms'];   // mother side algorithm index
        $fsai = $this->familysideeval['fs'];
        $mscat = $this->alg[$msai]['cat'];  // mother side risk category
        $fscat = $this->alg[$fsai]['cat'];
        $highside = 'fs';
        if ($mscat > $fscat) {
            $highside = 'ms';
        } else if (($mscat == $fscat) && ($msai > $fsai)) {
            $highside = 'ms';
        }
        return $highside;
    }

    /*
     * Returns an effective total of family factors specific to a side.
     * Note factors fd and sd (first/second degree) derived from crc.
     * If all data is numeric, a total is returned.
     * If over the FamRels::LIM (ie 3), total limited to 3
     * If data is not found (ie not answered yet), false is returned
     * Also note 2 affected grandparents only count for 1
     */
    private function getEffectiveFamilyFactorTotal($factor, $side)
    {
        // Grab the appropriate property names
        $pnames = array();  // flat array of property names
        if (array_key_exists($factor, $this->getActions())) {
            // getActionProperties expected
            $apnames = $this->getActionPropertyNames($factor);
            foreach (FamRels::getFamKeysForSide($side) as $rel) {
                $pname = $factor . FamRels::SEP . $rel;
                // where expected, add property name to list
                if (in_array($pname, $apnames)) {
                    array_push($pnames, $pname);
                }
            }

        } else if (in_array($factor, array('fd', 'sd'))) {
            // derived from crc
            foreach (FamRels::getFamKeysForSide($side, $factor) as $rel) {
                array_push($pnames, 'crc' . FamRels::SEP . $rel);
            }
        } else {
            // TODO throw error rather than die
            die("ProfileAssessor getEffectiveFamilyFactorTotal received bad factor '$factor'.");
        }

        // Walk through the property name list and tally property values
        $t = NULL;
        foreach ($pnames as $pname) {
            if (isset($this->data[$pname])) {
                $pval = $this->data[$pname];
                // 2 Grandparents (on one side) only count as one incidence
                list($a, $s, $r) = explode(FamRels::SEP, $pname);
                if ($r == 'gpar' && $pval == 2) {
                    $pval = 1;
                }
                $t = FamRels::limit($t + $pval);
            } else {
                $t = false;
                break;
            }
        }
        return $t;
    }

    private function setEvalOutcomeArray($arr)
    {
        $this->setEvalOutcome(
            $arr['riskcat'], $arr['evidence'], $arr['algdesc']);
    }

    private function setEvalOutcome($riskcat, $evidence, $algdesc)
    {
        $this->riskcat = $riskcat;
        $this->algdesc = $algdesc;
        $this->evidence = $evidence;
    }

    /*
     * Returns overall risk category or null if not known
     * If $side (fs or ms) given, returns risk cat for that side.
     */
    public function getRiskCat($side = NULL)
    {
        $cat = NULL;
        if (is_null($side)) {
            $cat = $this->riskcat;
        } else if (array_key_exists($side, $this->familysideeval)
            && !is_null($this->familysideeval[$side])
        ) {
            $ai = $this->familysideeval[$side];
            $cat = $this->alg[$ai]['cat'];
        }
        return $cat;
    }

    public function getEvidenceBase($side = NULL)
    {
        $eb = NULL;
        if (is_null($side)) {
            $eb = $this->evidence;
        } else if (array_key_exists($side, $this->familysideeval)
            && !is_null($this->familysideeval[$side])
        ) {
            $ai = $this->familysideeval[$side];
            $eb = $this->alg[$ai]['evidence_base'];
        }
        return $eb;
    }

    /*
     * Returns description of the algorithm line that identified a side's risk category
     * TODO 2 grandparents are only counted as 1. This will mess up some descriptions.
     */
    public function getAlgDesc($side = NULL)
    {
        $ret = NULL;
        if (is_null($side)) {
            $ret = $this->algdesc;
        } else if (array_key_exists($side, $this->familysideeval)
            && !is_null($this->familysideeval[$side])
        ) {
            $sidedescs = array('ms' => 'maternal', 'fs' => 'paternal');
            $ai = $this->familysideeval[$side];
            $ret = "On the {$sidedescs[$side]} side of the family, ";
            $ret .= $this->alg[$ai]['description'];
        }
        return $ret;
    }

}

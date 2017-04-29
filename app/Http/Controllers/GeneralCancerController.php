<?php

namespace Decision_Aid\Http\Controllers;

use Illuminate\Http\Request;

class GeneralCancerController extends Controller
{
    function viewgeneralcancer()
    {
        return view('forms.GeneralCancer');
    }

    function getvalues(Request $request)
    {


    }

    /*Calculating different form of Cancers based on these inputs

    Male
    1. Blood_Cancer_Male
    2. Colorectal_cancer_male
    3. gastro_oesophageal_cancer_male
    4. lung_cancer_male
    5. other_cancer_male
    6. pancreatic_cancer_male
    7. prostate_cancer_male
    8. renal_tract_cancer_male
    9. testicular_cancer_male

    Female
    1. blood_cancer_female
    2. breast_cancer_female
    3. cervical_cancer_female
    4. colorectal_cancer_female
    5. gastro_oesophageal_cancer_female
    6. lung_cancer_female
    7. other_cancer_female
    8. ovarian_cancer_female
    9. pancreatic_cancer_female
    10.renal_tract_cancer_female
    11.uterine_cancer_female */

    function blood_cancer_male(Request $request)
    {

        $data = session('formData');
        $arrData = json_decode($data, true);
        $survivor[0] = array();

        /* The conditional arrays */


        /* Applying the fractional polynomial transforms */
        /* (which includes scaling)                      */

        $dage = $request->input('age');
        print_r($arrData);
        $dage = $dage / 10;
        $age_1 = $dage;
        $age_2 = $dage * log($dage);
        $bmi = 123;                        //calculatebmi();
        $dbmi = $bmi;
        $dbmi = $dbmi / 10;
        $bmi_1 = pow($dbmi, -2);
        $bmi_2 = $dbmi;
        $town = $request->input('town');

        /* Centring the continuous variables */

        $age_1 = $age_1 - 4.800777912139893;
        $age_2 = $age_2 - 7.531354427337647;
        $bmi_1 = $bmi_1 - 0.146067067980766;
        $bmi_2 = $bmi_2 - 2.616518735885620;
        $town = $town - -0.264977723360062;

        /* Start of Sum */
        $a = 0;

        /* The conditional sums */


        /* Sum from continuous values */

        $a += $age_1 * 3.4970179354556610000000000;
        $a += $age_2 * -1.0806801421562633000000000;
        $a += $bmi_1 * 0.9519259479511792400000000;
        $a += $bmi_2 * 0.1714669358410085800000000;
        $a += $town * -0.0277062426752491610000000;

        /* Sum from boolean values */
        $c_hb = $request->input('c_hb');
        $new_abdodist = $request->input('new_abdodist');
        $new_abdopain = $request->input('new_abdopain');
        $new_appetiteloss = $request->input('new_appetiteloss');
        $new_dysphagia = $request->input('new_dysphagia');
        $new_haematuria = $request->input('new_haematuria');
        $new_haemoptysis = $request->input('new_haemoptysis');
        $new_indigestion = $request->input('new_indigestion');
        $new_necklump = $request->input('new_necklump');
        $new_nightsweats = $request->input('new_nightsweats');
        $new_testicularlump = $request->input('new_testicularlump');
        $new_vte = $request->input('new_vte');
        $new_weightloss = $request->input('new_weightloss');

        $a += $c_hb * 1.8905802113004144000000000;
        $a += $new_abdodist * 0.8430432197211393800000000;
        $a += $new_abdopain * 0.6226473288294992500000000;
        $a += $new_appetiteloss * 1.0672150380753760000000000;
        $a += $new_dysphagia * 0.5419443056595199000000000;
        $a += $new_haematuria * 0.4607538085363521700000000;
        $a += $new_haemoptysis * 0.9501446899241836600000000;
        $a += $new_indigestion * 0.5635686569331337400000000;
        $a += $new_necklump * 3.1567783466839603000000000;
        $a += $new_nightsweats * 1.5201300180753576000000000;
        $a += $new_testicularlump * 0.9957524928245107300000000;
        $a += $new_vte * 0.6142589726132866600000000;
        $a += $new_weightloss * 1.2233663263194712000000000;

        /* Sum from interaction terms */


        /* Calculate the score itself */
        $score = $a + -7.2591289466850277000000000;
        return $score;
    }

    function colorectal_cancer_male_raw(Request $request)
    {
        $survivor[0] = array();


        /* The conditional arrays */


        $Ialcohol[4] = array("0", "0.0674431700268591780000000", "0.2894952197787854000000000", "0.4419539984974097400000000");

        /* Applying the fractional polynomial transforms */
        /* (which includes scaling)                      */
        $dage = $request->input('age');
        $dage = $dage / 10;
        $age_1 = $dage;
        $age_2 = $dage * log($dage);
        $bmi = 123;                        //TODO:calculatebmi();
        $dbmi = $bmi;
        $dbmi = $dbmi / 10;
        $bmi_1 = pow($dbmi, -2);
        $bmi_2 = $dbmi;


        /* Centring the continuous variables */

        $age_1 = $age_1 - 4.800777912139893;
        $age_2 = $age_2 - 7.531354427337647;
        $bmi_1 = $bmi_1 - 0.146067067980766;
        $bmi_2 = $bmi_2 - 2.616518735885620;

        /* Start of Sum */
        $a = 0;

        /* The conditional sums */

        $a += $Ialcohol[$request->input('alcohol_cat4')];

        /* Sum from continuous values */

        $a += $age_1 * 7.2652842514036369000000000;
        $a += $age_2 * -2.3119103657424414000000000;
        $a += $bmi_1 * 0.4591530847132721000000000;
        $a += $bmi_2 * 0.1402651669090599400000000;

        /* Sum from boolean values */

        //input from $request

        $c_hb = $request->input('c_hb');
        $fh_gicancer = $request->input('fh_gicancer');
        $new_abdodist = $request->input('new_abdodist');
        $new_abdopain = $request->input('new_abdopain');
        $new_appetiteloss = $request->input('new_appetiteloss');
        $new_rectalbleed = $request->input('new_rectalbleed');
        $new_weightloss = $request->input('new_weightloss');
        $s1_bowelchange = $request->input('s1_bowelchange');
        $s1_constipation = $request->input('s1_constipation');

        //performing calculations based on questions
        $a += $c_hb * 1.4066322376473517000000000;
        $a += $fh_gicancer * 0.4057285321010044600000000;
        $a += $new_abdodist * 1.3572627165452165000000000;
        $a += $new_abdopain * 1.5179997924486877000000000;
        $a += $new_appetiteloss * 0.5421335457752113300000000;
        $a += $new_rectalbleed * 2.8846500840638964000000000;
        $a += $new_weightloss * 1.1082218896963933000000000;
        $a += $s1_bowelchange * 1.2962496832506105000000000;
        $a += $s1_constipation * 0.2284256115498967100000000;

        /* Sum from interaction terms */


        /* Calculate the score itself */
        $score = $a + -7.6876342765226262000000000;
        return $score;
    }


    function gastro_oesophageal_cancer_male_raw(Request $request)
    {
        $survivor[0] = array();


        /* The conditional arrays */

        $Ismoke[5] = array("0", "0.3532685922239948200000000", "0.6343201557712291300000000", "0.6500819736904158700000000", " 0.6273413010559952800000000");


        /* Applying the fractional polynomial transforms */
        /* (which includes scaling)                      */

        $dage = $request->input('age');
        $dage = $dage / 10;
        $age_1 = $dage;
        $age_2 = $dage * log($dage);
        $dbmi = 123;   //todo compute BMI
        $dbmi = $dbmi / 10;
        $bmi_1 = pow($dbmi, -2);
        $bmi_2 = $dbmi;

        /* Centring the continuous variables */

        $age_1 = $age_1 - 4.800777912139893;
        $age_2 = $age_2 - 7.531354427337647;
        $bmi_1 = $bmi_1 - 0.146067067980766;
        $bmi_2 = $bmi_2 - 2.616518735885620;

        /* Start of Sum */
        $a = 0;

        /* The conditional sums */

        $a += $Ismoke[$request->input('smoke_cat')];

        /* Sum from continuous values */

        $a += $age_1 * 8.5841509312915623000000000;
        $a += $age_2 * -2.7650409450116360000000000;
        $a += $bmi_1 * 4.1816752831070323000000000;
        $a += $bmi_2 * 0.6247106288954960000000000;

        /* Sum from boolean values */

        $c_hb = $request->input('c_hb');
        $new_abdopain = $request->input('new_abdopain');
        $new_appetiteloss = $request->input('new_appetiteloss');
        $new_dysphagia = $request->input('new_dysphagia');
        $new_gibleed = $request->input('new_gibleed');
        $new_heartburn = $request->input('new_heartburn');
        $new_indigestion = $request->input('new_indigestion');
        $new_necklump = $request->input('new_necklump');
        $new_weightloss = $request->input('new_weightloss');

        $a += $c_hb * 1.1065543049459461000000000;
        $a += $new_abdopain * 1.0280133043080188000000000;
        $a += $new_appetiteloss * 1.1868017500634926000000000;
        $a += $new_dysphagia * 3.8253199428642568000000000;
        $a += $new_gibleed * 1.8454733322333583000000000;
        $a += $new_heartburn * 1.1727679169313121000000000;
        $a += $new_indigestion * 1.8843639195644077000000000;
        $a += $new_necklump * 0.8414696385393357600000000;
        $a += $new_weightloss * 1.4698638306735652000000000;

        /* Sum from interaction terms */


        /* Calculate the score itself */
        $score = $a + -8.4208700270300625000000000;
        return $score;
    }

    function lung_cancer_male_raw(Request $request)
    {
        $survivor[0] = array();

        /* The conditional arrays */

        $Ismoke[5] = array("0", "0.8408574737524464600000000", "1.4966499028172435000000000", "1.7072509513243501000000000", "1.8882615411851338000000000");


        /* Applying the fractional polynomial transforms */
        /* (which includes scaling)                      */

        $dage = $request->input('age');
        $dage = $dage / 10;
        $age_1 = $dage;
        $age_2 = $dage * log($dage);
        $dbmi = 123;     //todo insert bmi
        $dbmi = $dbmi / 10;
        $bmi_1 = pow($dbmi, -2);
        $bmi_2 = $dbmi;

        /* Centring the continuous variables */

        $age_1 = $age_1 - 4.800777912139893;
        $age_2 = $age_2 - 7.531354427337647;
        $bmi_1 = $bmi_1 - 0.146067067980766;
        $bmi_2 = $bmi_2 - 2.616518735885620;
        $town = $town - -0.264977723360062;

        /* Start of Sum */
        $a = 0;

        /* The conditional sums */

        $a += $Ismoke[$request->input('smoke_cat')];
        /* Sum from continuous values */

        $a += $age_1 * 11.9178089602254960000000000;
        $a += $age_2 * -3.8503786390624457000000000;
        $a += $bmi_1 * 1.8605584222949920000000000;
        $a += $bmi_2 * -0.1132750038800869900000000;
        $a += $town * 0.0285745703610741780000000;

        /* Sum from boolean values */

        $b_copd = $request->input('b_copd');
        $c_hb = $request->input('c_hb');
        $new_abdopain = $request->input('new_abdopain');
        $new_appetiteloss = $request->input('new_appetiteloss');
        $new_dysphagia = $request->input('new_dysphagia');
        $new_haemoptysis = $request->input('new_haemoptysis');
        $new_indigestion = $request->input('new_indigestion');
        $new_necklump = $request->input('new_necklump');
        $new_nightsweats = $request->input('new_nightsweats');
        $new_vte = $request->input('new_vte');
        $new_weightloss = $request->input('new_weightloss');
        $s1_cough = $request->input('s1_cough');


        $a += $b_copd * 0.5526127629694074200000000;
        $a += $c_hb * 0.8243789117069311200000000;
        $a += $new_abdopain * 0.3996424879103057700000000;
        $a += $new_appetiteloss * 0.7487413720163385000000000;
        $a += $new_dysphagia * 1.0410482089004374000000000;
        $a += $new_haemoptysis * 2.8241680746676243000000000;
        $a += $new_indigestion * 0.2689673675929089000000000;
        $a += $new_necklump * 1.1065323833644807000000000;
        $a += $new_nightsweats * 0.7890696583845964200000000;
        $a += $new_vte * 0.7991150296038754800000000;
        $a += $new_weightloss * 1.3738119234931856000000000;
        $a += $s1_cough * 0.5154179003437485700000000;

        /* Sum from interaction terms */


        /* Calculate the score itself */
        $score = $a + -8.7166918098019277000000000;
        return $score;
    }

    function other_cancer_male_raw(Request $request)
    {
        $survivor[0] = array();


        /* The conditional arrays */

        $Ismoke[5] = array("0", "0.1306282330648657900000000", "0.4156824612593108500000000", "0.4034160393541376700000000", "0.5290383323065179800000000");

        /* Applying the fractional polynomial transforms */
        /* (which includes scaling)                      */

        $dage = $request->input('age');
        $dage = $dage / 10;
        $age_1 = $dage;
        $age_2 = $dage * log($dage);
        $dbmi = 123;     //todo BMI Calclulator
        $dbmi = $dbmi / 10;
        $bmi_1 = pow($dbmi, -2);
        $bmi_2 = $dbmi;

        /* Centring the continuous variables */

        $age_1 = $age_1 - 4.800777912139893;
        $age_2 = $age_2 - 7.531354427337647;
        $bmi_1 = $bmi_1 - 0.146067067980766;
        $bmi_2 = $bmi_2 - 2.616518735885620;

        /* Start of Sum */
        $a = 0;

        /* The conditional sums */

        $a += $Ismoke[$request->input("smoke_cat")];

        /* Sum from continuous values */

        $a += $age_1 * 4.1156415170875666000000000;
        $a += $age_2 * -1.2786588534988286000000000;
        $a += $bmi_1 * 2.4067691257533248000000000;
        $a += $bmi_2 * 0.2566799616335219100000000;


        /* Session Inputs*/
        $b_copd = $request->input('b_copd');
        $b_type2 = $request->input('b_type2');
        $c_hb = $request->input('c_hb');
        $new_abdodist = $request->input('new_abdodist');
        $new_abdopain = $request->input('new_abdopain');
        $new_appetiteloss = $request->input('new_appetiteloss');
        $new_dysphagia = $request->input('new_dysphagia');
        $new_gibleed = $request->input('new_gibleed');
        $new_haematuria = $request->input('new_haematuria');
        $new_haemoptysis = $request->input('new_haemoptysis');
        $new_indigestion = $request->input('new_indigestion');
        $new_necklump = $request->input('new_necklump');
        $new_vte = $request->input('new_vte');
        $new_weightloss = $request->input('new_weightloss');
        $s1_bowelchange = $request->input('s1_bowelchange');
        $s1_constipation = $request->input('s1_constipation');


        /* Sum from boolean values */

        $a += $b_copd * 0.2364397443316423000000000;
        $a += $b_type2 * 0.2390212489103255300000000;
        $a += $c_hb * 0.9765525865177192600000000;
        $a += $new_abdodist * 0.7203822227648433200000000;
        $a += $new_abdopain * 0.8372159579979499000000000;
        $a += $new_appetiteloss * 1.1647610659454599000000000;
        $a += $new_dysphagia * 1.0747326525064285000000000;
        $a += $new_gibleed * 0.4468867932306167000000000;
        $a += $new_haematuria * 0.5276884520139836200000000;
        $a += $new_haemoptysis * 0.6465976131208517300000000;
        $a += $new_indigestion * 0.3156125379576864000000000;
        $a += $new_necklump * 2.9472448787274570000000000;
        $a += $new_vte * 1.0954486585194212000000000;
        $a += $new_weightloss * 1.0550815022699203000000000;
        $a += $s1_bowelchange * 0.5059485944682162700000000;
        $a += $s1_constipation * 0.6035170412091727100000000;

        /* Sum from interaction terms */


        /* Calculate the score itself */
        $score = $a + -6.7132875682858542000000000;
        return $score;
    }

    function pancreatic_cancer_male(Request $request)
    {
        $survivor[0] = array();

        /* The conditional arrays */

        $Ismoke[5] = array("0", "0.2783298172089973500000000", "0.3079418928917603300000000", "0.5647359394991128300000000", "0.7765125427126866600000000");


        /* Applying the fractional polynomial transforms */
        /* (which includes scaling)                      */

        $dage = $request->input('age');
        $dage = $dage / 10;
        $age_1 = $dage;
        $age_2 = $dage * log($dage);
        $dbmi = 123; //todo bmi()
        $dbmi = $dbmi / 10;
        $bmi_1 = pow($dbmi, -2);
        $bmi_2 = $dbmi;

        /* Centring the continuous variables */

        $age_1 = $age_1 - 4.800777912139893;
        $age_2 = $age_2 - 7.531354427337647;
        $bmi_1 = $bmi_1 - 0.146067067980766;
        $bmi_2 = $bmi_2 - 2.616518735885620;
        $town = $town - -0.264977723360062;

        /* Start of Sum */
        $a = 0;

        /* The conditional sums */

        $a += $Ismoke[$request->input('smoke_cat')];

        /* Sum from continuous values */

        $a += $age_1 * 8.0275778709105907000000000;
        $a += $age_2 * -2.6082429130982798000000000;
        $a += $bmi_1 * 1.7819574994736820000000000;
        $a += $bmi_2 * -0.0249600064895699750000000;
        $a += $town * -0.0352288140617050480000000;

        /* input values */

        $b_chronicpan = $request->input('b_chronicpan');
        $b_type2 = $request->input('b_type2');
        $new_abdopain = $request->input('new_abdopain');
        $new_appetiteloss = $request->input('new_appetiteloss');
        $new_dysphagia = $request->input('new_dysphagia');
        $new_gibleed = $request->input('new_gibleed');
        $new_indigestion = $request->input('new_indigestion');
        $new_vte = $request->input('new_vte');
        $new_weightloss = $request->input('new_weightloss');
        $s1_constipation = $request->input('s1_constipation');

        /* Sum from boolean values */

        $a += $b_chronicpan * 0.9913246347991823100000000;
        $a += $b_type2 * 0.7396905098202540800000000;
        $a += $new_abdopain * 2.1506984011721579000000000;
        $a += $new_appetiteloss * 1.4272326009960661000000000;
        $a += $new_dysphagia * 0.9168689207526066200000000;
        $a += $new_gibleed * 0.9881061033081149900000000;
        $a += $new_indigestion * 1.2837402377092237000000000;
        $a += $new_vte * 1.1741805346104719000000000;
        $a += $new_weightloss * 2.0466064239967046000000000;
        $a += $s1_constipation * 0.6240548033048214400000000;

        /* Sum from interaction terms */


        /* Calculate the score itself */
        $score = $a + -9.2275729512009956000000000;
        return $score;
    }

    function prostate_cancer_male(Request $request)
    {
        $survivor[0] = array();


        /* The conditional arrays */


        /* Applying the fractional polynomial transforms */
        /* (which includes scaling)                      */

        $dage = $request->input('age');
        $dage = $dage / 10;
        $age_1 = $dage;
        $age_2 = $dage * log($dage);
        $dbmi = 123; //todo: Calculare bmi roso.
        $dbmi = $dbmi / 10;
        $bmi_1 = pow($dbmi, -2);
        $bmi_2 = $dbmi;

        /* Centring the continuous variables */

        $age_1 = $age_1 - 4.800777912139893;
        $age_2 = $age_2 - 7.531354427337647;
        $bmi_1 = $bmi_1 - 0.146067067980766;
        $bmi_2 = $bmi_2 - 2.616518735885620;
        $town = $town - -0.264977723360062;

        /* Start of Sum */
        $a = 0;

        /* The conditional sums */


        /* Sum from continuous values */

        $a += $age_1 * 14.8391010426566920000000000;
        $a += $age_2 * -4.8051341054408843000000000;
        $a += $bmi_1 * -2.8369035324107057000000000;
        $a += $bmi_2 * -0.3634984265900051400000000;
        $a += $town * -0.0214278653071876720000000;

        /* Session Inputs*/

        $fh_prostatecancer = $request->input('fh_prostatecancer');
        $new_abdopain = $request->input('new_abdopain');
        $new_appetiteloss = $request->input('new_appetiteloss');
        $new_haematuria = $request->input('new_haematuria');
        $new_rectalbleed = $request->input('new_rectalbleed');
        $new_testespain = $request->input('new_testespain');
        $new_testicularlump = $request->input('new_testicularlump');
        $new_vte = $request->input('new_vte');
        $new_weightloss = $request->input('new_weightloss');
        $s1_impotence = $request->input('s1_impotence');
        $s1_nocturia = $request->input('s1_nocturia');
        $s1_urinaryfreq = $request->input('s1_urinaryfreq');
        $s1_urinaryretention = $request->input('s1_urinaryretention');


        /* Sum from boolean values */

        $a += $fh_prostatecancer * 1.2892957682128878000000000;
        $a += $new_abdopain * 0.4445588372860774200000000;
        $a += $new_appetiteloss * 0.3425581971534915100000000;
        $a += $new_haematuria * 1.4890866073593347000000000;
        $a += $new_rectalbleed * 0.3478612952033963700000000;
        $a += $new_testespain * 0.6387609350076407500000000;
        $a += $new_testicularlump * 0.6338177436853567000000000;
        $a += $new_vte * 0.5758190804196261500000000;
        $a += $new_weightloss * 0.7528736226665873100000000;
        $a += $s1_impotence * 0.3692180041534241500000000;
        $a += $s1_nocturia * 1.0381560026453696000000000;
        $a += $s1_urinaryfreq * 0.7036410253080365200000000;
        $a += $s1_urinaryretention * 0.8525703399435586900000000;

        /* Sum from interaction terms */


        /* Calculate the score itself */
        $score = $a + -7.8871012697298699000000000;
        return $score;
    }

    function renal_tract_cancer_male_raw(Request $request)
    {
        $survivor = array();

        $Ismoke = array(
            "0",
            "0.4183007995792849000000000",
            "0.6335162368278742800000000",
            "0.7847230879322205600000000",
            "0.9631091411295211700000000"
        );


        $dage = $request->input('age');
        $dage = $dage / 10;
        $age_1 = $dage;
        $age_2 = $dage * log($dage);
        $dbmi = 123;                    //todo compute BMI
        $dbmi = $dbmi / 10;
        $bmi_1 = pow($dbmi, -2);
        $bmi_2 = $dbmi;

        /* Centring the continuous variables */

        $age_1 = $age_1 - 4.800777912139893;
        $age_2 = $age_2 - 7.531354427337647;
        $bmi_1 = $bmi_1 - 0.146067067980766;
        $bmi_2 = $bmi_2 - 2.616518735885620;

        /* Start of Sum */
        $a = 0;

        /* The conditional sums */

        $a += $Ismoke[$request->input('smoke_cat')];

        /* Sum from continuous values */

        $a += $age_1 * 6.2113803461111061000000000;
        $a += $age_2 * -1.9835661506953870000000000;
        $a += $bmi_1 * -1.5995682550089132000000000;
        $a += $bmi_2 * -0.0777696836930753120000000;

        /* Sum from boolean values */

        $new_abdopain = $request->input('new_abdopain');
        $new_haematuria = $request->input('new_haematuria');
        $new_nightsweats = $request->input('new_nightsweats');
        $new_weightloss = $request->input('new_weightloss');


        $a += $new_abdopain * 0.6089465678909584700000000;
        $a += $new_haematuria * 4.1596453389556789000000000;
        $a += $new_nightsweats * 1.0520790556587876000000000;
        $a += $new_weightloss * 0.6824635274408537000000000;

        /* Sum from interaction terms */


        /* Calculate the score itself */
        $score = $a + -8.3006555398942510000000000;
        return $score;
    }

    function testicular_cancer_male(Request $request)
    {
        $survivor = array();

        $dage = $request->input('age');;
        $dage = $dage / 10;
        $age_1 = $dage;
        $age_2 = $dage * log($dage);
        $dbmi = 123;   //todo create a bmi
        $dbmi = $dbmi / 10;
        $bmi_1 = pow($dbmi, -2);
        $bmi_2 = $dbmi;

        /* Centring the continuous variables */

        $age_1 = $age_1 - 4.800777912139893;
        $age_2 = $age_2 - 7.531354427337647;
        $bmi_1 = $bmi_1 - 0.146067067980766;
        $bmi_2 = $bmi_2 - 2.616518735885620;

        /* Start of Sum */
        $a = 0;

        /* The conditional sums */


        /* Sum from continuous values */

        $a += $age_1 * 3.9854184482476338000000000;
        $a += $age_2 * -1.7426970576325218000000000;
        $a += $bmi_1 * 2.0160796798276812000000000;
        $a += $bmi_2 * -0.0427340437454773740000000;

        $new_testespain = $request->input('new_testespain');
        $new_testicularlump = $request->input('new_testicularlump');
        $new_vte = $request->input('new_vte');

        /* Sum from boolean values */

        $a += $new_testespain * 2.7411880902787775000000000;
        $a += $new_testicularlump * 5.2200886149323269000000000;
        $a += $new_vte * 2.2416746922896493000000000;

        /* Sum from interaction terms */


        /* Calculate the score itself */
        $score = $a + -8.7592209887895898000000000;
        return $score;
    }

    /* Female Functions */

    static $blood_cancer_female_raw(
int age,$bmi,int c_hb,int new_abdopain,int new_haematuria,int new_necklump,int new_nightsweats,int new_pmb,int new_vte,int new_weightloss,int s1_bowelchange,int s1_bruising
)
{
	$survivor[0] = {

	}

;

/* The conditional arrays */


/* Applying the fractional polynomial transforms */
/* (which includes scaling)                      */

$dage = age;
dage = dage / 10;
$age_1 = pow(dage, -2);
$age_2 = pow(dage, -2) * log(dage);
$dbmi = bmi;
dbmi = dbmi / 10;
$bmi_1 = pow(dbmi, -2);
$bmi_2 = pow(dbmi, -2) * log(dbmi);

/* Centring the continuous variables */

age_1 = age_1 - 0.039541322737932;
age_2 = age_2 - 0.063867323100567;
bmi_1 = bmi_1 - 0.151021569967270;
bmi_2 = bmi_2 - 0.142740502953529;

/* Start of Sum */
$a = 0;

/* The conditional sums */


/* Sum from continuous values */

a += age_1 * 35.9405666896283120000000000;
a += age_2 * -68.8496375977904480000000000;
a += bmi_1 * 0.0785171223057501980000000;
a += bmi_2 * -5.3730627788681424000000000;

/* Sum from boolean values */

a += c_hb * 1.7035866502297630000000000;
a += new_abdopain * 0.3779206239385797800000000;
a += new_haematuria * 0.4086662974598894700000000;
a += new_necklump * 2.9539029476671903000000000;
a += new_nightsweats * 1.3792892192392403000000000;
a += new_pmb * 0.4689216313440992500000000;
a += new_vte * 0.6036630662990674100000000;
a += new_weightloss * 0.8963398932306315700000000;
a += s1_bowelchange * 0.7291379612468620300000000;
a += s1_bruising * 1.0255003552753392000000000;

/* Sum from interaction terms */


/* Calculate the score itself */
$score = a + -7.4207849482565749000000000;
return score;
}

static int blood_cancer_female_validation(
    int age,$bmi,int c_hb,int new_abdopain,int new_haematuria,int new_necklump,int new_nightsweats,int new_pmb,int new_vte,int new_weightloss,int s1_bowelchange,int s1_bruising,char * errorBuf,int errorBufSize
)
{
    int ok = 1;
	*errorBuf = 0;
	if (!i_in_range(age, 25, 89)) {
        ok = 0;
        strlcat(errorBuf, "error: age must be in range (25,89)\n", errorBufSize);
    }
	if (!d_in_range(bmi, 20, 40)) {
        ok = 0;
        strlcat(errorBuf, "error: bmi must be in range (20,40)\n", errorBufSize);
    }
	if (!is_boolean(c_hb)) {
        ok = 0;
        strlcat(errorBuf, "error: c_hb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_abdopain)) {
        ok = 0;
        strlcat(errorBuf, "error: new_abdopain must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_haematuria)) {
        ok = 0;
        strlcat(errorBuf, "error: new_haematuria must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_necklump)) {
        ok = 0;
        strlcat(errorBuf, "error: new_necklump must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_nightsweats)) {
        ok = 0;
        strlcat(errorBuf, "error: new_nightsweats must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_pmb)) {
        ok = 0;
        strlcat(errorBuf, "error: new_pmb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_vte)) {
        ok = 0;
        strlcat(errorBuf, "error: new_vte must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_weightloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_weightloss must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(s1_bowelchange)) {
        ok = 0;
        strlcat(errorBuf, "error: s1_bowelchange must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(s1_bruising)) {
        ok = 0;
        strlcat(errorBuf, "error: s1_bruising must be in range (0,1)\n", errorBufSize);
    }
	return ok;
}

$blood_cancer_female(
    int age,$bmi,int c_hb,int new_abdopain,int new_haematuria,int new_necklump,int new_nightsweats,int new_pmb,int new_vte,int new_weightloss,int s1_bowelchange,int s1_bruising,int * error,char * errorBuf,int errorBufSize
)
{
    *
    error = 0;
    int ok = blood_cancer_female_validation(age, bmi, c_hb, new_abdopain, new_haematuria, new_necklump, new_nightsweats, new_pmb, new_vte, new_weightloss, s1_bowelchange, s1_bruising, errorBuf, errorBufSize);
	if (!ok) {
        *
        error = 1;
        return 0.0;
    }
	return blood_cancer_female_raw(age, bmi, c_hb, new_abdopain, new_haematuria, new_necklump, new_nightsweats, new_pmb, new_vte, new_weightloss, s1_bowelchange, s1_bruising);
}

/* End of blood_cancer */

/* breast_cancer */

static $breast_cancer_female_raw(
int age,int alcohol_cat4,$bmi,int fh_breastcancer,int new_breastlump,int new_breastpain,int new_breastskin,int new_pmb,int new_vte,$town
)
{
    $survivor[0] = {

};

	/* The conditional arrays */

	$Ialcohol[4] = {
    0,
		0.0543813075945134560000000,
		0.1245709972983817800000000,
		0.1855198679261514700000000
	};

	/* Applying the fractional polynomial transforms */
	/* (which includes scaling)                      */

	$dage = age;
	dage = dage / 10;
	$age_1 = pow(dage, -2);
	$age_2 = pow(dage, -2) * log(dage);
	$dbmi = bmi;
	dbmi = dbmi / 10;
	$bmi_1 = pow(dbmi, -2);
	$bmi_2 = pow(dbmi, -2) * log(dbmi);

	/* Centring the continuous variables */

	age_1 = age_1 - 0.039541322737932;
	age_2 = age_2 - 0.063867323100567;
	bmi_1 = bmi_1 - 0.151021569967270;
	bmi_2 = bmi_2 - 0.142740502953529;
	town = town - -0.383295059204102;

	/* Start of Sum */
	$a = 0;

	/* The conditional sums */

	a += Ialcohol[alcohol_cat4];

	/* Sum from continuous values */

	a += age_1 * -14.3029484067898500000000000;
	a += age_2 * -25.9301811377364260000000000;
	a += bmi_1 * -1.7540983825680900000000000;
	a += bmi_2 * 2.0601979121740364000000000;
	a += town * -0.0160766972632234440000000;

	/* Sum from boolean values */

	a += fh_breastcancer * 0.3863899675953914000000000;
	a += new_breastlump * 3.9278533274888368000000000;
	a += new_breastpain * 0.8779616078329102200000000;
	a += new_breastskin * 2.2320296233987880000000000;
	a += new_pmb * 0.4465053002248299800000000;
	a += new_vte * 0.2728610297213165400000000;

	/* Sum from interaction terms */


	/* Calculate the score itself */
	$score = a + -6.1261694200869234000000000;
	return score;
}

static int breast_cancer_female_validation(
    int age,int alcohol_cat4,$bmi,int fh_breastcancer,int new_breastlump,int new_breastpain,int new_breastskin,int new_pmb,int new_vte,$town,char * errorBuf,int errorBufSize
)
{
    int ok = 1;
	*errorBuf = 0;
	if (!i_in_range(age, 25, 89)) {
        ok = 0;
        strlcat(errorBuf, "error: age must be in range (25,89)\n", errorBufSize);
    }
	if (!i_in_range(alcohol_cat4, 0, 3)) {
        ok = 0;
        strlcat(errorBuf, "error: alcohol_cat4 must be in range (0,3)\n", errorBufSize);
    }
	if (!d_in_range(bmi, 20, 40)) {
        ok = 0;
        strlcat(errorBuf, "error: bmi must be in range (20,40)\n", errorBufSize);
    }
	if (!is_boolean(fh_breastcancer)) {
        ok = 0;
        strlcat(errorBuf, "error: fh_breastcancer must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_breastlump)) {
        ok = 0;
        strlcat(errorBuf, "error: new_breastlump must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_breastpain)) {
        ok = 0;
        strlcat(errorBuf, "error: new_breastpain must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_breastskin)) {
        ok = 0;
        strlcat(errorBuf, "error: new_breastskin must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_pmb)) {
        ok = 0;
        strlcat(errorBuf, "error: new_pmb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_vte)) {
        ok = 0;
        strlcat(errorBuf, "error: new_vte must be in range (0,1)\n", errorBufSize);
    }
	if (!d_in_range(town, -7, 11)) {
        ok = 0;
        strlcat(errorBuf, "error: town must be in range (-7,11)\n", errorBufSize);
    }
	return ok;
}

$breast_cancer_female(
    int age,int alcohol_cat4,$bmi,int fh_breastcancer,int new_breastlump,int new_breastpain,int new_breastskin,int new_pmb,int new_vte,$town,int * error,char * errorBuf,int errorBufSize
)
{
    *
    error = 0;
    int ok = breast_cancer_female_validation(age, alcohol_cat4, bmi, fh_breastcancer, new_breastlump, new_breastpain, new_breastskin, new_pmb, new_vte, town, errorBuf, errorBufSize);
	if (!ok) {
        *
        error = 1;
        return 0.0;
    }
	return breast_cancer_female_raw(age, alcohol_cat4, bmi, fh_breastcancer, new_breastlump, new_breastpain, new_breastskin, new_pmb, new_vte, town);
}

/* End of breast_cancer */

/* cervical_cancer */

static $cervical_cancer_female_raw(
int age,$bmi,int c_hb,int new_abdopain,int new_haematuria,int new_imb,int new_pmb,int new_postcoital,int new_vte,int smoke_cat,$town
)
{
    $survivor[0] = {

};

	/* The conditional arrays */

	$Ismoke[5] = {
    0,
		0.3247875277095715300000000,
		0.7541211259076738800000000,
		0.7448343035139659600000000,
		0.6328348533913806800000000
	};

	/* Applying the fractional polynomial transforms */
	/* (which includes scaling)                      */

	$dage = age;
	dage = dage / 10;
	$age_1 = pow(dage, -2);
	$age_2 = pow(dage, -2) * log(dage);
	$dbmi = bmi;
	dbmi = dbmi / 10;
	$bmi_1 = pow(dbmi, -2);
	$bmi_2 = pow(dbmi, -2) * log(dbmi);

	/* Centring the continuous variables */

	age_1 = age_1 - 0.039541322737932;
	age_2 = age_2 - 0.063867323100567;
	bmi_1 = bmi_1 - 0.151021569967270;
	bmi_2 = bmi_2 - 0.142740502953529;
	town = town - -0.383295059204102;

	/* Start of Sum */
	$a = 0;

	/* The conditional sums */

	a += Ismoke[smoke_cat];

	/* Sum from continuous values */

	a += age_1 * 10.1663393107505800000000000;
	a += age_2 * -16.9118902491100020000000000;
	a += bmi_1 * -0.5675143308052614800000000;
	a += bmi_2 * -2.6377586334504044000000000;
	a += town * 0.0573200669650633030000000;

	/* Sum from boolean values */

	a += c_hb * 1.2205973555195053000000000;
	a += new_abdopain * 0.7229870191773574200000000;
	a += new_haematuria * 1.6126499968790107000000000;
	a += new_imb * 1.9527008812518938000000000;
	a += new_pmb * 3.3618997560756485000000000;
	a += new_postcoital * 3.1391568551730864000000000;
	a += new_vte * 1.1276327958138455000000000;

	/* Sum from interaction terms */


	/* Calculate the score itself */
	$score = a + -8.8309098444401926000000000;
	return score;
}

static int cervical_cancer_female_validation(
    int age,$bmi,int c_hb,int new_abdopain,int new_haematuria,int new_imb,int new_pmb,int new_postcoital,int new_vte,int smoke_cat,$town,char * errorBuf,int errorBufSize
)
{
    int ok = 1;
	*errorBuf = 0;
	if (!i_in_range(age, 25, 89)) {
        ok = 0;
        strlcat(errorBuf, "error: age must be in range (25,89)\n", errorBufSize);
    }
	if (!d_in_range(bmi, 20, 40)) {
        ok = 0;
        strlcat(errorBuf, "error: bmi must be in range (20,40)\n", errorBufSize);
    }
	if (!is_boolean(c_hb)) {
        ok = 0;
        strlcat(errorBuf, "error: c_hb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_abdopain)) {
        ok = 0;
        strlcat(errorBuf, "error: new_abdopain must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_haematuria)) {
        ok = 0;
        strlcat(errorBuf, "error: new_haematuria must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_imb)) {
        ok = 0;
        strlcat(errorBuf, "error: new_imb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_pmb)) {
        ok = 0;
        strlcat(errorBuf, "error: new_pmb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_postcoital)) {
        ok = 0;
        strlcat(errorBuf, "error: new_postcoital must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_vte)) {
        ok = 0;
        strlcat(errorBuf, "error: new_vte must be in range (0,1)\n", errorBufSize);
    }
	if (!i_in_range(smoke_cat, 0, 4)) {
        ok = 0;
        strlcat(errorBuf, "error: smoke_cat must be in range (0,4)\n", errorBufSize);
    }
	if (!d_in_range(town, -7, 11)) {
        ok = 0;
        strlcat(errorBuf, "error: town must be in range (-7,11)\n", errorBufSize);
    }
	return ok;
}

$cervical_cancer_female(
    int age,$bmi,int c_hb,int new_abdopain,int new_haematuria,int new_imb,int new_pmb,int new_postcoital,int new_vte,int smoke_cat,$town,int * error,char * errorBuf,int errorBufSize
)
{
    *
    error = 0;
    int ok = cervical_cancer_female_validation(age, bmi, c_hb, new_abdopain, new_haematuria, new_imb, new_pmb, new_postcoital, new_vte, smoke_cat, town, errorBuf, errorBufSize);
	if (!ok) {
        *
        error = 1;
        return 0.0;
    }
	return cervical_cancer_female_raw(age, bmi, c_hb, new_abdopain, new_haematuria, new_imb, new_pmb, new_postcoital, new_vte, smoke_cat, town);
}

/* End of cervical_cancer */

/* colorectal_cancer */

static $colorectal_cancer_female_raw(
int age,int alcohol_cat4,$bmi,int c_hb,int fh_gicancer,int new_abdodist,int new_abdopain,int new_appetiteloss,int new_rectalbleed,int new_vte,int new_weightloss,int s1_bowelchange,int s1_constipation
)
{
    $survivor[0] = {

};

	/* The conditional arrays */

	$Ialcohol[4] = {
    0,
		0.2429014262884695900000000,
		0.2359224520197608100000000,
		0.4606605934539446100000000
	};

	/* Applying the fractional polynomial transforms */
	/* (which includes scaling)                      */

	$dage = age;
	dage = dage / 10;
	$age_1 = pow(dage, -2);
	$age_2 = pow(dage, -2) * log(dage);
	$dbmi = bmi;
	dbmi = dbmi / 10;
	$bmi_1 = pow(dbmi, -2);
	$bmi_2 = pow(dbmi, -2) * log(dbmi);

	/* Centring the continuous variables */

	age_1 = age_1 - 0.039541322737932;
	age_2 = age_2 - 0.063867323100567;
	bmi_1 = bmi_1 - 0.151021569967270;
	bmi_2 = bmi_2 - 0.142740502953529;

	/* Start of Sum */
	$a = 0;

	/* The conditional sums */

	a += Ialcohol[alcohol_cat4];

	/* Sum from continuous values */

	a += age_1 * -11.6175606616390770000000000;
	a += age_2 * -42.9098057686870220000000000;
	a += bmi_1 * -0.5344237822753052900000000;
	a += bmi_2 * 2.6900552265408226000000000;

	/* Sum from boolean values */

	a += c_hb * 1.4759238359186861000000000;
	a += fh_gicancer * 0.4044501048847998200000000;
	a += new_abdodist * 0.6630074287856559900000000;
	a += new_abdopain * 1.4990872468711913000000000;
	a += new_appetiteloss * 0.5068020107261922400000000;
	a += new_rectalbleed * 2.7491673095810105000000000;
	a += new_vte * 0.7072816884002932600000000;
	a += new_weightloss * 1.0288860866585736000000000;
	a += s1_bowelchange * 0.7664414123199643200000000;
	a += s1_constipation * 0.3375158123121173600000000;

	/* Sum from interaction terms */


	/* Calculate the score itself */
	$score = a + -7.5466948789670942000000000;
	return score;
}

static int colorectal_cancer_female_validation(
    int age,int alcohol_cat4,$bmi,int c_hb,int fh_gicancer,int new_abdodist,int new_abdopain,int new_appetiteloss,int new_rectalbleed,int new_vte,int new_weightloss,int s1_bowelchange,int s1_constipation,char * errorBuf,int errorBufSize
)
{
    int ok = 1;
	*errorBuf = 0;
	if (!i_in_range(age, 25, 89)) {
        ok = 0;
        strlcat(errorBuf, "error: age must be in range (25,89)\n", errorBufSize);
    }
	if (!i_in_range(alcohol_cat4, 0, 3)) {
        ok = 0;
        strlcat(errorBuf, "error: alcohol_cat4 must be in range (0,3)\n", errorBufSize);
    }
	if (!d_in_range(bmi, 20, 40)) {
        ok = 0;
        strlcat(errorBuf, "error: bmi must be in range (20,40)\n", errorBufSize);
    }
	if (!is_boolean(c_hb)) {
        ok = 0;
        strlcat(errorBuf, "error: c_hb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(fh_gicancer)) {
        ok = 0;
        strlcat(errorBuf, "error: fh_gicancer must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_abdodist)) {
        ok = 0;
        strlcat(errorBuf, "error: new_abdodist must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_abdopain)) {
        ok = 0;
        strlcat(errorBuf, "error: new_abdopain must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_appetiteloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_appetiteloss must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_rectalbleed)) {
        ok = 0;
        strlcat(errorBuf, "error: new_rectalbleed must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_vte)) {
        ok = 0;
        strlcat(errorBuf, "error: new_vte must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_weightloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_weightloss must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(s1_bowelchange)) {
        ok = 0;
        strlcat(errorBuf, "error: s1_bowelchange must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(s1_constipation)) {
        ok = 0;
        strlcat(errorBuf, "error: s1_constipation must be in range (0,1)\n", errorBufSize);
    }
	return ok;
}

$colorectal_cancer_female(
    int age,int alcohol_cat4,$bmi,int c_hb,int fh_gicancer,int new_abdodist,int new_abdopain,int new_appetiteloss,int new_rectalbleed,int new_vte,int new_weightloss,int s1_bowelchange,int s1_constipation,int * error,char * errorBuf,int errorBufSize
)
{
    *
    error = 0;
    int ok = colorectal_cancer_female_validation(age, alcohol_cat4, bmi, c_hb, fh_gicancer, new_abdodist, new_abdopain, new_appetiteloss, new_rectalbleed, new_vte, new_weightloss, s1_bowelchange, s1_constipation, errorBuf, errorBufSize);
	if (!ok) {
        *
        error = 1;
        return 0.0;
    }
	return colorectal_cancer_female_raw(age, alcohol_cat4, bmi, c_hb, fh_gicancer, new_abdodist, new_abdopain, new_appetiteloss, new_rectalbleed, new_vte, new_weightloss, s1_bowelchange, s1_constipation);
}

/* End of colorectal_cancer */

/* gastro_oesophageal_cancer */

static $gastro_oesophageal_cancer_female_raw(
int age,$bmi,int c_hb,int new_abdopain,int new_appetiteloss,int new_dysphagia,int new_gibleed,int new_heartburn,int new_indigestion,int new_vte,int new_weightloss,int smoke_cat
)
{
    $survivor[0] = {

};

	/* The conditional arrays */

	$Ismoke[5] = {
    0,
		0.2108835385994093400000000,
		0.4020914846651602000000000,
		0.8497119766959212500000000,
		1.1020585469724540000000000
	};

	/* Applying the fractional polynomial transforms */
	/* (which includes scaling)                      */

	$dage = age;
	dage = dage / 10;
	$age_1 = pow(dage, -2);
	$age_2 = pow(dage, -2) * log(dage);
	$dbmi = bmi;
	dbmi = dbmi / 10;
	$bmi_1 = pow(dbmi, -2);
	$bmi_2 = pow(dbmi, -2) * log(dbmi);

	/* Centring the continuous variables */

	age_1 = age_1 - 0.039541322737932;
	age_2 = age_2 - 0.063867323100567;
	bmi_1 = bmi_1 - 0.151021569967270;
	bmi_2 = bmi_2 - 0.142740502953529;

	/* Start of Sum */
	$a = 0;

	/* The conditional sums */

	a += Ismoke[smoke_cat];

	/* Sum from continuous values */

	a += age_1 * 5.5127932958160830000000000;
	a += age_2 * -70.2734062916161830000000000;
	a += bmi_1 * 2.6063377632938987000000000;
	a += bmi_2 * -1.2389834515079798000000000;

	/* Sum from boolean values */

	a += c_hb * 1.2479756970482034000000000;
	a += new_abdopain * 0.7825304005124729100000000;
	a += new_appetiteloss * 0.6514592236889243900000000;
	a += new_dysphagia * 3.7751714910656862000000000;
	a += new_gibleed * 1.4264472204617833000000000;
	a += new_heartburn * 0.8178746069193373300000000;
	a += new_indigestion * 1.4998439683677578000000000;
	a += new_vte * 0.7199894658172598700000000;
	a += new_weightloss * 1.2287925630053846000000000;

	/* Sum from interaction terms */


	/* Calculate the score itself */
	$score = a + -8.8746031610250764000000000;
	return score;
}

static int gastro_oesophageal_cancer_female_validation(
    int age,$bmi,int c_hb,int new_abdopain,int new_appetiteloss,int new_dysphagia,int new_gibleed,int new_heartburn,int new_indigestion,int new_vte,int new_weightloss,int smoke_cat,char * errorBuf,int errorBufSize
)
{
    int ok = 1;
	*errorBuf = 0;
	if (!i_in_range(age, 25, 89)) {
        ok = 0;
        strlcat(errorBuf, "error: age must be in range (25,89)\n", errorBufSize);
    }
	if (!d_in_range(bmi, 20, 40)) {
        ok = 0;
        strlcat(errorBuf, "error: bmi must be in range (20,40)\n", errorBufSize);
    }
	if (!is_boolean(c_hb)) {
        ok = 0;
        strlcat(errorBuf, "error: c_hb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_abdopain)) {
        ok = 0;
        strlcat(errorBuf, "error: new_abdopain must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_appetiteloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_appetiteloss must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_dysphagia)) {
        ok = 0;
        strlcat(errorBuf, "error: new_dysphagia must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_gibleed)) {
        ok = 0;
        strlcat(errorBuf, "error: new_gibleed must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_heartburn)) {
        ok = 0;
        strlcat(errorBuf, "error: new_heartburn must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_indigestion)) {
        ok = 0;
        strlcat(errorBuf, "error: new_indigestion must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_vte)) {
        ok = 0;
        strlcat(errorBuf, "error: new_vte must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_weightloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_weightloss must be in range (0,1)\n", errorBufSize);
    }
	if (!i_in_range(smoke_cat, 0, 4)) {
        ok = 0;
        strlcat(errorBuf, "error: smoke_cat must be in range (0,4)\n", errorBufSize);
    }
	return ok;
}

$gastro_oesophageal_cancer_female(
    int age,$bmi,int c_hb,int new_abdopain,int new_appetiteloss,int new_dysphagia,int new_gibleed,int new_heartburn,int new_indigestion,int new_vte,int new_weightloss,int smoke_cat,int * error,char * errorBuf,int errorBufSize
)
{
    *
    error = 0;
    int ok = gastro_oesophageal_cancer_female_validation(age, bmi, c_hb, new_abdopain, new_appetiteloss, new_dysphagia, new_gibleed, new_heartburn, new_indigestion, new_vte, new_weightloss, smoke_cat, errorBuf, errorBufSize);
	if (!ok) {
        *
        error = 1;
        return 0.0;
    }
	return gastro_oesophageal_cancer_female_raw(age, bmi, c_hb, new_abdopain, new_appetiteloss, new_dysphagia, new_gibleed, new_heartburn, new_indigestion, new_vte, new_weightloss, smoke_cat);
}

/* End of gastro_oesophageal_cancer */

/* lung_cancer */

static $lung_cancer_female_raw(
int age,int b_copd,$bmi,int c_hb,int new_appetiteloss,int new_dysphagia,int new_haemoptysis,int new_indigestion,int new_necklump,int new_vte,int new_weightloss,int s1_cough,int smoke_cat,$town
)
{
    $survivor[0] = {

};

	/* The conditional arrays */

	$Ismoke[5] = {
    0,
		1.3397416191950409000000000,
		1.9500839456663224000000000,
		2.1881694694325233000000000,
		2.4828660433307768000000000
	};

	/* Applying the fractional polynomial transforms */
	/* (which includes scaling)                      */

	$dage = age;
	dage = dage / 10;
	$age_1 = pow(dage, -2);
	$age_2 = pow(dage, -2) * log(dage);
	$dbmi = bmi;
	dbmi = dbmi / 10;
	$bmi_1 = pow(dbmi, -2);
	$bmi_2 = pow(dbmi, -2) * log(dbmi);

	/* Centring the continuous variables */

	age_1 = age_1 - 0.039541322737932;
	age_2 = age_2 - 0.063867323100567;
	bmi_1 = bmi_1 - 0.151021569967270;
	bmi_2 = bmi_2 - 0.142740502953529;
	town = town - -0.383295059204102;

	/* Start of Sum */
	$a = 0;

	/* The conditional sums */

	a += Ismoke[smoke_cat];

	/* Sum from continuous values */

	a += age_1 * -117.2405737502962500000000000;
	a += age_2 * 25.1702254741268090000000000;
	a += bmi_1 * 2.5845488133924350000000000;
	a += bmi_2 * -0.6083523966762799400000000;
	a += town * 0.0406920461830567460000000;

	/* Sum from boolean values */

	a += b_copd * 0.7942901962671364800000000;
	a += c_hb * 0.8627980324401628400000000;
	a += new_appetiteloss * 0.7170232121379446200000000;
	a += new_dysphagia * 0.6718426806077323300000000;
	a += new_haemoptysis * 2.9286439157734474000000000;
	a += new_indigestion * 0.3634893730114273600000000;
	a += new_necklump * 1.2097240380091590000000000;
	a += new_vte * 0.8907072670032341000000000;
	a += new_weightloss * 1.1384524885073082000000000;
	a += s1_cough * 0.6439917053275602300000000;

	/* Sum from interaction terms */


	/* Calculate the score itself */
	$score = a + -8.6449002971789692000000000;
	return score;
}

static int lung_cancer_female_validation(
    int age,int b_copd,$bmi,int c_hb,int new_appetiteloss,int new_dysphagia,int new_haemoptysis,int new_indigestion,int new_necklump,int new_vte,int new_weightloss,int s1_cough,int smoke_cat,$town,char * errorBuf,int errorBufSize
)
{
    int ok = 1;
	*errorBuf = 0;
	if (!i_in_range(age, 25, 89)) {
        ok = 0;
        strlcat(errorBuf, "error: age must be in range (25,89)\n", errorBufSize);
    }
	if (!is_boolean(b_copd)) {
        ok = 0;
        strlcat(errorBuf, "error: b_copd must be in range (0,1)\n", errorBufSize);
    }
	if (!d_in_range(bmi, 20, 40)) {
        ok = 0;
        strlcat(errorBuf, "error: bmi must be in range (20,40)\n", errorBufSize);
    }
	if (!is_boolean(c_hb)) {
        ok = 0;
        strlcat(errorBuf, "error: c_hb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_appetiteloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_appetiteloss must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_dysphagia)) {
        ok = 0;
        strlcat(errorBuf, "error: new_dysphagia must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_haemoptysis)) {
        ok = 0;
        strlcat(errorBuf, "error: new_haemoptysis must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_indigestion)) {
        ok = 0;
        strlcat(errorBuf, "error: new_indigestion must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_necklump)) {
        ok = 0;
        strlcat(errorBuf, "error: new_necklump must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_vte)) {
        ok = 0;
        strlcat(errorBuf, "error: new_vte must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_weightloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_weightloss must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(s1_cough)) {
        ok = 0;
        strlcat(errorBuf, "error: s1_cough must be in range (0,1)\n", errorBufSize);
    }
	if (!i_in_range(smoke_cat, 0, 4)) {
        ok = 0;
        strlcat(errorBuf, "error: smoke_cat must be in range (0,4)\n", errorBufSize);
    }
	if (!d_in_range(town, -7, 11)) {
        ok = 0;
        strlcat(errorBuf, "error: town must be in range (-7,11)\n", errorBufSize);
    }
	return ok;
}

$lung_cancer_female(
    int age,int b_copd,$bmi,int c_hb,int new_appetiteloss,int new_dysphagia,int new_haemoptysis,int new_indigestion,int new_necklump,int new_vte,int new_weightloss,int s1_cough,int smoke_cat,$town,int * error,char * errorBuf,int errorBufSize
)
{
    *
    error = 0;
    int ok = lung_cancer_female_validation(age, b_copd, bmi, c_hb, new_appetiteloss, new_dysphagia, new_haemoptysis, new_indigestion, new_necklump, new_vte, new_weightloss, s1_cough, smoke_cat, town, errorBuf, errorBufSize);
	if (!ok) {
        *
        error = 1;
        return 0.0;
    }
	return lung_cancer_female_raw(age, b_copd, bmi, c_hb, new_appetiteloss, new_dysphagia, new_haemoptysis, new_indigestion, new_necklump, new_vte, new_weightloss, s1_cough, smoke_cat, town);
}

/* End of lung_cancer */

/* other_cancer */

static $other_cancer_female_raw(
int age,int alcohol_cat4,int b_copd,$bmi,int c_hb,int new_abdodist,int new_abdopain,int new_appetiteloss,int new_breastlump,int new_dysphagia,int new_gibleed,int new_haematuria,int new_indigestion,int new_necklump,int new_pmb,int new_vte,int new_weightloss,int s1_constipation,int smoke_cat
)
{
    $survivor[0] = {

};

	/* The conditional arrays */

	$Ialcohol[4] = {
    0,
		0.1129292517088995400000000,
		0.1389183205617967600000000,
		0.3428114766789586200000000
	};
	$Ismoke[5] = {
    0,
		0.0643839792551647580000000,
		0.1875068101660691500000000,
		0.3754052152821668000000000,
		0.5007337952210844100000000
	};

	/* Applying the fractional polynomial transforms */
	/* (which includes scaling)                      */

	$dage = age;
	dage = dage / 10;
	$age_1 = pow(dage, -2);
	$age_2 = pow(dage, -2) * log(dage);
	$dbmi = bmi;
	dbmi = dbmi / 10;
	$bmi_1 = pow(dbmi, -2);
	$bmi_2 = pow(dbmi, -2) * log(dbmi);

	/* Centring the continuous variables */

	age_1 = age_1 - 0.039541322737932;
	age_2 = age_2 - 0.063867323100567;
	bmi_1 = bmi_1 - 0.151021569967270;
	bmi_2 = bmi_2 - 0.142740502953529;

	/* Start of Sum */
	$a = 0;

	/* The conditional sums */

	a += Ialcohol[alcohol_cat4];
	a += Ismoke[smoke_cat];

	/* Sum from continuous values */

	a += age_1 * 35.8208987302204780000000000;
	a += age_2 * -68.3294741037719150000000000;
	a += bmi_1 * 1.8969796480108396000000000;
	a += bmi_2 * -3.7755945945329574000000000;

	/* Sum from boolean values */

	a += b_copd * 0.2823021429107943600000000;
	a += c_hb * 1.0476364795173587000000000;
	a += new_abdodist * 0.9628688090459262000000000;
	a += new_abdopain * 0.8335710066715610300000000;
	a += new_appetiteloss * 0.8450972438476546100000000;
	a += new_breastlump * 1.0400807427059522000000000;
	a += new_dysphagia * 0.8905342895684595900000000;
	a += new_gibleed * 0.3839632265134078600000000;
	a += new_haematuria * 0.6143184647549447800000000;
	a += new_indigestion * 0.2457016002992454300000000;
	a += new_necklump * 2.1666504706191545000000000;
	a += new_pmb * 0.4219383252623540900000000;
	a += new_vte * 1.0630784861733920000000000;
	a += new_weightloss * 1.1058752771736007000000000;
	a += s1_constipation * 0.3780143641299491500000000;

	/* Sum from interaction terms */


	/* Calculate the score itself */
	$score = a + -6.7864501668594306000000000;
	return score;
}

static int other_cancer_female_validation(
    int age,int alcohol_cat4,int b_copd,$bmi,int c_hb,int new_abdodist,int new_abdopain,int new_appetiteloss,int new_breastlump,int new_dysphagia,int new_gibleed,int new_haematuria,int new_indigestion,int new_necklump,int new_pmb,int new_vte,int new_weightloss,int s1_constipation,int smoke_cat,char * errorBuf,int errorBufSize
)
{
    int ok = 1;
	*errorBuf = 0;
	if (!i_in_range(age, 25, 89)) {
        ok = 0;
        strlcat(errorBuf, "error: age must be in range (25,89)\n", errorBufSize);
    }
	if (!i_in_range(alcohol_cat4, 0, 3)) {
        ok = 0;
        strlcat(errorBuf, "error: alcohol_cat4 must be in range (0,3)\n", errorBufSize);
    }
	if (!is_boolean(b_copd)) {
        ok = 0;
        strlcat(errorBuf, "error: b_copd must be in range (0,1)\n", errorBufSize);
    }
	if (!d_in_range(bmi, 20, 40)) {
        ok = 0;
        strlcat(errorBuf, "error: bmi must be in range (20,40)\n", errorBufSize);
    }
	if (!is_boolean(c_hb)) {
        ok = 0;
        strlcat(errorBuf, "error: c_hb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_abdodist)) {
        ok = 0;
        strlcat(errorBuf, "error: new_abdodist must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_abdopain)) {
        ok = 0;
        strlcat(errorBuf, "error: new_abdopain must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_appetiteloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_appetiteloss must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_breastlump)) {
        ok = 0;
        strlcat(errorBuf, "error: new_breastlump must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_dysphagia)) {
        ok = 0;
        strlcat(errorBuf, "error: new_dysphagia must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_gibleed)) {
        ok = 0;
        strlcat(errorBuf, "error: new_gibleed must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_haematuria)) {
        ok = 0;
        strlcat(errorBuf, "error: new_haematuria must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_indigestion)) {
        ok = 0;
        strlcat(errorBuf, "error: new_indigestion must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_necklump)) {
        ok = 0;
        strlcat(errorBuf, "error: new_necklump must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_pmb)) {
        ok = 0;
        strlcat(errorBuf, "error: new_pmb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_vte)) {
        ok = 0;
        strlcat(errorBuf, "error: new_vte must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_weightloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_weightloss must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(s1_constipation)) {
        ok = 0;
        strlcat(errorBuf, "error: s1_constipation must be in range (0,1)\n", errorBufSize);
    }
	if (!i_in_range(smoke_cat, 0, 4)) {
        ok = 0;
        strlcat(errorBuf, "error: smoke_cat must be in range (0,4)\n", errorBufSize);
    }
	return ok;
}

$other_cancer_female(
    int age,int alcohol_cat4,int b_copd,$bmi,int c_hb,int new_abdodist,int new_abdopain,int new_appetiteloss,int new_breastlump,int new_dysphagia,int new_gibleed,int new_haematuria,int new_indigestion,int new_necklump,int new_pmb,int new_vte,int new_weightloss,int s1_constipation,int smoke_cat,int * error,char * errorBuf,int errorBufSize
)
{
    *
    error = 0;
    int ok = other_cancer_female_validation(age, alcohol_cat4, b_copd, bmi, c_hb, new_abdodist, new_abdopain, new_appetiteloss, new_breastlump, new_dysphagia, new_gibleed, new_haematuria, new_indigestion, new_necklump, new_pmb, new_vte, new_weightloss, s1_constipation, smoke_cat, errorBuf, errorBufSize);
	if (!ok) {
        *
        error = 1;
        return 0.0;
    }
	return other_cancer_female_raw(age, alcohol_cat4, b_copd, bmi, c_hb, new_abdodist, new_abdopain, new_appetiteloss, new_breastlump, new_dysphagia, new_gibleed, new_haematuria, new_indigestion, new_necklump, new_pmb, new_vte, new_weightloss, s1_constipation, smoke_cat);
}

/* End of other_cancer */

/* ovarian_cancer */

static $ovarian_cancer_female_raw(
int age,$bmi,int c_hb,int fh_ovariancancer,int new_abdodist,int new_abdopain,int new_appetiteloss,int new_haematuria,int new_indigestion,int new_pmb,int new_vte,int new_weightloss,int s1_bowelchange
)
{
    $survivor[0] = {

};

	/* The conditional arrays */


	/* Applying the fractional polynomial transforms */
	/* (which includes scaling)                      */

	$dage = age;
	dage = dage / 10;
	$age_1 = pow(dage, -2);
	$age_2 = pow(dage, -2) * log(dage);
	$dbmi = bmi;
	dbmi = dbmi / 10;
	$bmi_1 = pow(dbmi, -2);
	$bmi_2 = pow(dbmi, -2) * log(dbmi);

	/* Centring the continuous variables */

	age_1 = age_1 - 0.039541322737932;
	age_2 = age_2 - 0.063867323100567;
	bmi_1 = bmi_1 - 0.151021569967270;
	bmi_2 = bmi_2 - 0.142740502953529;

	/* Start of Sum */
	$a = 0;

	/* The conditional sums */


	/* Sum from continuous values */

	a += age_1 * -61.0831814462568940000000000;
	a += age_2 * 20.3028612701106890000000000;
	a += bmi_1 * -2.1261135335028407000000000;
	a += bmi_2 * 3.2168200408772472000000000;

	/* Sum from boolean values */

	a += c_hb * 1.3625636791018674000000000;
	a += fh_ovariancancer * 1.9951774809951830000000000;
	a += new_abdodist * 2.9381020883363806000000000;
	a += new_abdopain * 1.7307824546132513000000000;
	a += new_appetiteloss * 1.0606947909647773000000000;
	a += new_haematuria * 0.4958835997468107900000000;
	a += new_indigestion * 0.3843731027493998400000000;
	a += new_pmb * 1.5869592940878865000000000;
	a += new_vte * 1.6839747529852673000000000;
	a += new_weightloss * 0.4774332393821720800000000;
	a += s1_bowelchange * 0.6849850007182314300000000;

	/* Sum from interaction terms */


	/* Calculate the score itself */
	$score = a + -7.5609929644491318000000000;
	return score;
}

static int ovarian_cancer_female_validation(
    int age,$bmi,int c_hb,int fh_ovariancancer,int new_abdodist,int new_abdopain,int new_appetiteloss,int new_haematuria,int new_indigestion,int new_pmb,int new_vte,int new_weightloss,int s1_bowelchange,char * errorBuf,int errorBufSize
)
{
    int ok = 1;
	*errorBuf = 0;
	if (!i_in_range(age, 25, 89)) {
        ok = 0;
        strlcat(errorBuf, "error: age must be in range (25,89)\n", errorBufSize);
    }
	if (!d_in_range(bmi, 20, 40)) {
        ok = 0;
        strlcat(errorBuf, "error: bmi must be in range (20,40)\n", errorBufSize);
    }
	if (!is_boolean(c_hb)) {
        ok = 0;
        strlcat(errorBuf, "error: c_hb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(fh_ovariancancer)) {
        ok = 0;
        strlcat(errorBuf, "error: fh_ovariancancer must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_abdodist)) {
        ok = 0;
        strlcat(errorBuf, "error: new_abdodist must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_abdopain)) {
        ok = 0;
        strlcat(errorBuf, "error: new_abdopain must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_appetiteloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_appetiteloss must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_haematuria)) {
        ok = 0;
        strlcat(errorBuf, "error: new_haematuria must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_indigestion)) {
        ok = 0;
        strlcat(errorBuf, "error: new_indigestion must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_pmb)) {
        ok = 0;
        strlcat(errorBuf, "error: new_pmb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_vte)) {
        ok = 0;
        strlcat(errorBuf, "error: new_vte must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_weightloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_weightloss must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(s1_bowelchange)) {
        ok = 0;
        strlcat(errorBuf, "error: s1_bowelchange must be in range (0,1)\n", errorBufSize);
    }
	return ok;
}

$ovarian_cancer_female(
    int age,$bmi,int c_hb,int fh_ovariancancer,int new_abdodist,int new_abdopain,int new_appetiteloss,int new_haematuria,int new_indigestion,int new_pmb,int new_vte,int new_weightloss,int s1_bowelchange,int * error,char * errorBuf,int errorBufSize
)
{
    *
    error = 0;
    int ok = ovarian_cancer_female_validation(age, bmi, c_hb, fh_ovariancancer, new_abdodist, new_abdopain, new_appetiteloss, new_haematuria, new_indigestion, new_pmb, new_vte, new_weightloss, s1_bowelchange, errorBuf, errorBufSize);
	if (!ok) {
        *
        error = 1;
        return 0.0;
    }
	return ovarian_cancer_female_raw(age, bmi, c_hb, fh_ovariancancer, new_abdodist, new_abdopain, new_appetiteloss, new_haematuria, new_indigestion, new_pmb, new_vte, new_weightloss, s1_bowelchange);
}

/* End of ovarian_cancer */

/* pancreatic_cancer */

static $pancreatic_cancer_female_raw(
int age,int b_chronicpan,int b_type2,$bmi,int new_abdopain,int new_appetiteloss,int new_dysphagia,int new_gibleed,int new_indigestion,int new_vte,int new_weightloss,int s1_bowelchange,int smoke_cat
)
{
    $survivor[0] = {

};

	/* The conditional arrays */

	$Ismoke[5] = {
    0,
		-0.0631301848152044240000000,
		0.3523695950528934500000000,
		0.7146003670327156800000000,
		0.8073207410335441200000000
	};

	/* Applying the fractional polynomial transforms */
	/* (which includes scaling)                      */

	$dage = age;
	dage = dage / 10;
	$age_1 = pow(dage, -2);
	$age_2 = pow(dage, -2) * log(dage);
	$dbmi = bmi;
	dbmi = dbmi / 10;
	$bmi_1 = pow(dbmi, -2);
	$bmi_2 = pow(dbmi, -2) * log(dbmi);

	/* Centring the continuous variables */

	age_1 = age_1 - 0.039541322737932;
	age_2 = age_2 - 0.063867323100567;
	bmi_1 = bmi_1 - 0.151021569967270;
	bmi_2 = bmi_2 - 0.142740502953529;

	/* Start of Sum */
	$a = 0;

	/* The conditional sums */

	a += Ismoke[smoke_cat];

	/* Sum from continuous values */

	a += age_1 * -6.8219654517231225000000000;
	a += age_2 * -65.6404897305188650000000000;
	a += bmi_1 * 3.9715559458995728000000000;
	a += bmi_2 * -3.1161107999130500000000000;

	/* Sum from boolean values */

	a += b_chronicpan * 1.1948138830441282000000000;
	a += b_type2 * 0.7951745325664703000000000;
	a += new_abdopain * 1.9230379689782926000000000;
	a += new_appetiteloss * 1.5209568259888571000000000;
	a += new_dysphagia * 1.0107551560302726000000000;
	a += new_gibleed * 0.9324059153254259400000000;
	a += new_indigestion * 1.1134012616631439000000000;
	a += new_vte * 1.4485586969016084000000000;
	a += new_weightloss * 1.5791912580663912000000000;
	a += s1_bowelchange * 0.9361738611941444700000000;

	/* Sum from interaction terms */


	/* Calculate the score itself */
	$score = a + -9.2782129678657608000000000;
	return score;
}

static int pancreatic_cancer_female_validation(
    int age,int b_chronicpan,int b_type2,$bmi,int new_abdopain,int new_appetiteloss,int new_dysphagia,int new_gibleed,int new_indigestion,int new_vte,int new_weightloss,int s1_bowelchange,int smoke_cat,char * errorBuf,int errorBufSize
)
{
    int ok = 1;
	*errorBuf = 0;
	if (!i_in_range(age, 25, 89)) {
        ok = 0;
        strlcat(errorBuf, "error: age must be in range (25,89)\n", errorBufSize);
    }
	if (!is_boolean(b_chronicpan)) {
        ok = 0;
        strlcat(errorBuf, "error: b_chronicpan must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(b_type2)) {
        ok = 0;
        strlcat(errorBuf, "error: b_type2 must be in range (0,1)\n", errorBufSize);
    }
	if (!d_in_range(bmi, 20, 40)) {
        ok = 0;
        strlcat(errorBuf, "error: bmi must be in range (20,40)\n", errorBufSize);
    }
	if (!is_boolean(new_abdopain)) {
        ok = 0;
        strlcat(errorBuf, "error: new_abdopain must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_appetiteloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_appetiteloss must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_dysphagia)) {
        ok = 0;
        strlcat(errorBuf, "error: new_dysphagia must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_gibleed)) {
        ok = 0;
        strlcat(errorBuf, "error: new_gibleed must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_indigestion)) {
        ok = 0;
        strlcat(errorBuf, "error: new_indigestion must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_vte)) {
        ok = 0;
        strlcat(errorBuf, "error: new_vte must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_weightloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_weightloss must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(s1_bowelchange)) {
        ok = 0;
        strlcat(errorBuf, "error: s1_bowelchange must be in range (0,1)\n", errorBufSize);
    }
	if (!i_in_range(smoke_cat, 0, 4)) {
        ok = 0;
        strlcat(errorBuf, "error: smoke_cat must be in range (0,4)\n", errorBufSize);
    }
	return ok;
}

$pancreatic_cancer_female(
    int age,int b_chronicpan,int b_type2,$bmi,int new_abdopain,int new_appetiteloss,int new_dysphagia,int new_gibleed,int new_indigestion,int new_vte,int new_weightloss,int s1_bowelchange,int smoke_cat,int * error,char * errorBuf,int errorBufSize
)
{
    *
    error = 0;
    int ok = pancreatic_cancer_female_validation(age, b_chronicpan, b_type2, bmi, new_abdopain, new_appetiteloss, new_dysphagia, new_gibleed, new_indigestion, new_vte, new_weightloss, s1_bowelchange, smoke_cat, errorBuf, errorBufSize);
	if (!ok) {
        *
        error = 1;
        return 0.0;
    }
	return pancreatic_cancer_female_raw(age, b_chronicpan, b_type2, bmi, new_abdopain, new_appetiteloss, new_dysphagia, new_gibleed, new_indigestion, new_vte, new_weightloss, s1_bowelchange, smoke_cat);
}

/* End of pancreatic_cancer */

/* renal_tract_cancer */

static $renal_tract_cancer_female_raw(
int age,$bmi,int c_hb,int new_abdopain,int new_appetiteloss,int new_haematuria,int new_indigestion,int new_pmb,int new_weightloss,int smoke_cat
)
{
    $survivor[0] = {

};

	/* The conditional arrays */

	$Ismoke[5] = {
    0,
		0.2752175727739372700000000,
		0.5498656631475861100000000,
		0.6536242182136680100000000,
		0.9053763661785879700000000
	};

	/* Applying the fractional polynomial transforms */
	/* (which includes scaling)                      */

	$dage = age;
	dage = dage / 10;
	$age_1 = pow(dage, -2);
	$age_2 = pow(dage, -2) * log(dage);
	$dbmi = bmi;
	dbmi = dbmi / 10;
	$bmi_1 = pow(dbmi, -2);
	$bmi_2 = pow(dbmi, -2) * log(dbmi);

	/* Centring the continuous variables */

	age_1 = age_1 - 0.039541322737932;
	age_2 = age_2 - 0.063867323100567;
	bmi_1 = bmi_1 - 0.151021569967270;
	bmi_2 = bmi_2 - 0.142740502953529;

	/* Start of Sum */
	$a = 0;

	/* The conditional sums */

	a += Ismoke[smoke_cat];

	/* Sum from continuous values */

	a += age_1 * -0.0323226569626617470000000;
	a += age_2 * -56.3551410786635780000000000;
	a += bmi_1 * 1.2103910535779330000000000;
	a += bmi_2 * -4.7221299079939785000000000;

	/* Sum from boolean values */

	a += c_hb * 1.2666531852544143000000000;
	a += new_abdopain * 0.6155954984707594500000000;
	a += new_appetiteloss * 0.6842184594676019600000000;
	a += new_haematuria * 4.1791444537241542000000000;
	a += new_indigestion * 0.5694329224821874600000000;
	a += new_pmb * 1.2541097882792864000000000;
	a += new_weightloss * 0.7711610560290518300000000;

	/* Sum from interaction terms */


	/* Calculate the score itself */
	$score = a + -8.9440775553776248000000000;
	return score;
}

static int renal_tract_cancer_female_validation(
    int age,$bmi,int c_hb,int new_abdopain,int new_appetiteloss,int new_haematuria,int new_indigestion,int new_pmb,int new_weightloss,int smoke_cat,char * errorBuf,int errorBufSize
)
{
    int ok = 1;
	*errorBuf = 0;
	if (!i_in_range(age, 25, 89)) {
        ok = 0;
        strlcat(errorBuf, "error: age must be in range (25,89)\n", errorBufSize);
    }
	if (!d_in_range(bmi, 20, 40)) {
        ok = 0;
        strlcat(errorBuf, "error: bmi must be in range (20,40)\n", errorBufSize);
    }
	if (!is_boolean(c_hb)) {
        ok = 0;
        strlcat(errorBuf, "error: c_hb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_abdopain)) {
        ok = 0;
        strlcat(errorBuf, "error: new_abdopain must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_appetiteloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_appetiteloss must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_haematuria)) {
        ok = 0;
        strlcat(errorBuf, "error: new_haematuria must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_indigestion)) {
        ok = 0;
        strlcat(errorBuf, "error: new_indigestion must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_pmb)) {
        ok = 0;
        strlcat(errorBuf, "error: new_pmb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_weightloss)) {
        ok = 0;
        strlcat(errorBuf, "error: new_weightloss must be in range (0,1)\n", errorBufSize);
    }
	if (!i_in_range(smoke_cat, 0, 4)) {
        ok = 0;
        strlcat(errorBuf, "error: smoke_cat must be in range (0,4)\n", errorBufSize);
    }
	return ok;
}

$renal_tract_cancer_female(
    int age,$bmi,int c_hb,int new_abdopain,int new_appetiteloss,int new_haematuria,int new_indigestion,int new_pmb,int new_weightloss,int smoke_cat,int * error,char * errorBuf,int errorBufSize
)
{
    *
    error = 0;
    int ok = renal_tract_cancer_female_validation(age, bmi, c_hb, new_abdopain, new_appetiteloss, new_haematuria, new_indigestion, new_pmb, new_weightloss, smoke_cat, errorBuf, errorBufSize);
	if (!ok) {
        *
        error = 1;
        return 0.0;
    }
	return renal_tract_cancer_female_raw(age, bmi, c_hb, new_abdopain, new_appetiteloss, new_haematuria, new_indigestion, new_pmb, new_weightloss, smoke_cat);
}

/* End of renal_tract_cancer */

/* uterine_cancer */

static $uterine_cancer_female_raw(
int age,int b_endometrial,int b_type2,$bmi,int new_abdopain,int new_haematuria,int new_imb,int new_pmb,int new_vte
)
{
    $survivor[0] = {

};

	/* The conditional arrays */


	/* Applying the fractional polynomial transforms */
	/* (which includes scaling)                      */

	$dage = age;
	dage = dage / 10;
	$age_1 = pow(dage, -2);
	$age_2 = pow(dage, -2) * log(dage);
	$dbmi = bmi;
	dbmi = dbmi / 10;
	$bmi_1 = pow(dbmi, -2);
	$bmi_2 = pow(dbmi, -2) * log(dbmi);

	/* Centring the continuous variables */

	age_1 = age_1 - 0.039541322737932;
	age_2 = age_2 - 0.063867323100567;
	bmi_1 = bmi_1 - 0.151021569967270;
	bmi_2 = bmi_2 - 0.142740502953529;

	/* Start of Sum */
	$a = 0;

	/* The conditional sums */


	/* Sum from continuous values */

	a += age_1 * 2.7778124257317254000000000;
	a += age_2 * -59.5333514566633330000000000;
	a += bmi_1 * 3.7623897936404322000000000;
	a += bmi_2 * -26.8045450074654320000000000;

	/* Sum from boolean values */

	a += b_endometrial * 0.8742311851235286000000000;
	a += b_type2 * 0.2655181024063555900000000;
	a += new_abdopain * 0.6891953836735580400000000;
	a += new_haematuria * 1.6798617740998527000000000;
	a += new_imb * 1.7853122923827887000000000;
	a += new_pmb * 4.4770199876067398000000000;
	a += new_vte * 1.0362058616761669000000000;

	/* Sum from interaction terms */


	/* Calculate the score itself */
	$score = a + -8.9931390822564037000000000;
	return score;
}

static int uterine_cancer_female_validation(
    int age,int b_endometrial,int b_type2,$bmi,int new_abdopain,int new_haematuria,int new_imb,int new_pmb,int new_vte,char * errorBuf,int errorBufSize
)
{
    int ok = 1;
	*errorBuf = 0;
	if (!i_in_range(age, 25, 89)) {
        ok = 0;
        strlcat(errorBuf, "error: age must be in range (25,89)\n", errorBufSize);
    }
	if (!is_boolean(b_endometrial)) {
        ok = 0;
        strlcat(errorBuf, "error: b_endometrial must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(b_type2)) {
        ok = 0;
        strlcat(errorBuf, "error: b_type2 must be in range (0,1)\n", errorBufSize);
    }
	if (!d_in_range(bmi, 20, 40)) {
        ok = 0;
        strlcat(errorBuf, "error: bmi must be in range (20,40)\n", errorBufSize);
    }
	if (!is_boolean(new_abdopain)) {
        ok = 0;
        strlcat(errorBuf, "error: new_abdopain must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_haematuria)) {
        ok = 0;
        strlcat(errorBuf, "error: new_haematuria must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_imb)) {
        ok = 0;
        strlcat(errorBuf, "error: new_imb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_pmb)) {
        ok = 0;
        strlcat(errorBuf, "error: new_pmb must be in range (0,1)\n", errorBufSize);
    }
	if (!is_boolean(new_vte)) {
        ok = 0;
        strlcat(errorBuf, "error: new_vte must be in range (0,1)\n", errorBufSize);
    }
	return ok;
}

$uterine_cancer_female(
    int age,int b_endometrial,int b_type2,$bmi,int new_abdopain,int new_haematuria,int new_imb,int new_pmb,int new_vte,int * error,char * errorBuf,int errorBufSize
)
{
    *
    error = 0;
    int ok = uterine_cancer_female_validation(age, b_endometrial, b_type2, bmi, new_abdopain, new_haematuria, new_imb, new_pmb, new_vte, errorBuf, errorBufSize);
	if (!ok) {
        *
        error = 1;
        return 0.0;
    }
	return uterine_cancer_female_raw(age, b_endometrial, b_type2, bmi, new_abdopain, new_haematuria, new_imb, new_pmb, new_vte);
}

/* End of uterine_cancer *.

}

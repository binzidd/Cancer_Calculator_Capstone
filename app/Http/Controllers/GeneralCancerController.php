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


        /* Centring the continuous variables */

        $age_1 = $age_1 - 4.800777912139893;
        $age_2 = $age_2 - 7.531354427337647;
        $bmi_1 = $bmi_1 - 0.146067067980766;
        $bmi_2 = $bmi_2 - 2.616518735885620;
        //$town = $town - -0.264977723360062;

        /* Start of Sum */
        $a = 0;

        /* The conditional sums */


        /* Sum from continuous values */

        $a += $age_1 * 3.4970179354556610000000000;
        $a += $age_2 * -1.0806801421562633000000000;
        $a += $bmi_1 * 0.9519259479511792400000000;
        $a += $bmi_2 * 0.1714669358410085800000000;
        //$a += $town * -0.0277062426752491610000000;

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
        $$bmi_1 = pow($dbmi, -2);
        $$bmi_2 = $dbmi;

        /* Centring the continuous variables */

        $age_1 = age_1 - 4.800777912139893;
        $age_2 = age_2 - 7.531354427337647;
        $bmi_1 = bmi_1 - 0.146067067980766;
        bmi_2 = bmi_2 - 2.616518735885620;
        town = town - -0.264977723360062;

        /* Start of Sum */
        double a = 0;

    /* The conditional sums */


    /* Sum from continuous values */

    a += age_1 * 14.8391010426566920000000000;
    a += age_2 * -4.8051341054408843000000000;
    a += bmi_1 * -2.8369035324107057000000000;
    a += bmi_2 * -0.3634984265900051400000000;
    a += town * -0.0214278653071876720000000;

    /* Sum from boolean values */

    a += fh_prostatecancer * 1.2892957682128878000000000;
    a += new_abdopain * 0.4445588372860774200000000;
    a += new_appetiteloss * 0.3425581971534915100000000;
    a += new_haematuria * 1.4890866073593347000000000;
    a += new_rectalbleed * 0.3478612952033963700000000;
    a += new_testespain * 0.6387609350076407500000000;
    a += new_testicularlump * 0.6338177436853567000000000;
    a += new_vte * 0.5758190804196261500000000;
    a += new_weightloss * 0.7528736226665873100000000;
    a += s1_impotence * 0.3692180041534241500000000;
    a += s1_nocturia * 1.0381560026453696000000000;
    a += s1_urinaryfreq * 0.7036410253080365200000000;
    a += s1_urinaryretention * 0.8525703399435586900000000;

    /* Sum from interaction terms */


    /* Calculate the score itself */
    double score = a + -7.8871012697298699000000000;
    return score;
}


}

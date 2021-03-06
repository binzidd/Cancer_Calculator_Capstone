@extends('layouts.app')

@yield('title')
<title>QCancer Detection</title>


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                @if(!empty($yourMessage))
                    <div class="alert alert-danger">
                        <strong>{{$yourMessage}}!</strong>
                    </div>
                @endif


                <form action="{{route ('general_cancer_renderer')}}" method="post">

                    <h2>Session Based Calculation for QCancer</h2>
                    <input type="hidden" class="form-control" id="gender" value="{{$value=$userinfo->gender}}">

                    <div class="male_form" style="display: none;">
                        <br>
                        <div class="form-group col-md-offset-1">
                            <label class="col-md-offset-0">
                                Age
                            </label>
                            <input type="number" class="form-control" id="age" value="{{$userinfo->age}}">

                        </div>
                        <div class="form-group col-md-offset-1">
                            <label class="col-md-offset-0">
                                <strong> Q. Smoking Status? </strong>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-option" type="radio" name="smoke_cat"
                                               id="var_male_smoke_cat_non_smoker" value="0"> Non-Smoker
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="smoke_cat"
                                               id="var_male_smoke_cat_ex_smoker" value="1"> Ex-Smoker
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="smoke_cat"
                                               id="var_male_smoke_light_smoker" value="2"> light smoker (less than 10)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="smoke_cat"
                                               id="var_male_smoke_moderate_smoker" value="3"> moderate smoker (10 to 19)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="smoke_cat"
                                               id="var_male_smoke_heavy_smoker" value="4"> heavy smoker (20 or over)
                                    </label>
                                </div>

                            </label>
                        </div>

                        <div class="form-group col-md-offset-1">
                            <label class="form-group col-md-offset-0 ">
                                <strong> Alcohol status: </strong>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="alcohol_cat4"
                                               id="var_male_alcohol_non_drinker" value="0"> non-drinker
                                    </label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="alcohol_cat4"
                                               id="var_male_alcohol_drinker_1_day" value="1"> 1 unit per day
                                    </label>
                                </div>

                                <div class="'form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="alcohol_cat4"
                                               id="var_male_alcohol_drinker_2_day" value="2"> 1-2 unit per day
                                    </label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="alcohol_cat4"
                                               id="var_male_alcohol_drinker_3_day" value="3"> 3+ units per day
                                    </label>
                                </div>
                            </label>
                        </div>
                        <div>
                            <label name="content-header">Do you have..
                            </label>
                        </div>
                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="fh_gicancer"
                                               id="var_male_fh_gicancer" value="1"> a family history of gastrointestinal
                                        cancer?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0 ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="fh_prostatecancer"
                                               id="var_male_fh_prostatecancer" value="1"> a family history of prostate
                                        cancer?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0 ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="b_type2"
                                               id="var_male_b_type2"> type 2 diabetes?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0 ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="checkbox-inline" type="checkbox" name="b_chronicpan"
                                               id="var_male_fh_b_chronicpan"> chronic pancreatitis?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0 ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="checkbox-inline" type="checkbox" name="b_copd"
                                               id="var_male_fh_b_copd"> chronic obstructive airways disease (COPD)?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div>
                            <label name="content-header">Do you currently have..
                            </label>
                        </div>
                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_appetiteloss"
                                               id="var_male_new_appetiteloss"> loss of appetite?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_weightloss"
                                               id="var_male_new_weightloss"> unintentional weight loss?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_abdopain"
                                               id="var_male_new_abdopain"> abdominal pain?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_abdodist"
                                               id="var_male_new_abdopain">abdominal swelling?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_dysphagia"
                                               id="var_male_new_dysphagia">difficulty swallowing?
                                    </label>
                                </div>
                            </label>
                        </div>


                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_rectalbleed"
                                               id="var_male_new_rectalbleed">rectal bleeding?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_gibleed"
                                               id="var_male_new_gibleed">blood when you vomit?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_gibleed"
                                               id="var_male_new_gibleed">blood when you vomit?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_haemoptysis"
                                               id="var_male_new_haemoptysis">blood when you cough?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_haematuria"
                                               id="var_male_new_haematuria">blood in your urine?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_testicularlump"
                                               id="var_male_new_haematuria">a testicular lump?
                                    </label>
                                </div>
                            </label>
                        </div>


                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_testespain"
                                               id="var_male_new_testespain">testicular pain?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_necklump"
                                               id="var_male_new_necklump">a lump in your neck?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_nightsweats"
                                               id="var_male_new_nightsweats">night sweats?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_vte"
                                               id="var_male_new_vte">a venous thromboembolism??
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="s1_bowelchange"
                                               id="var_male_new_vte">vembolism??
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-group col-md-offset-1">
                            <label>
                                <strong> Condition of heartburn or indigestion: </strong>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-option" type="radio" name="heartburn_cat"
                                               id="var_male_heartburn_cat_0" value="0"> neither
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="heartburn_cat"
                                               id="var_male_heartburn_cat_1" value="1"> heartburn
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="heartburn_cat"
                                               id="var_male_heartburn_cat_2" value="2"> indigestion (less than 10)
                                    </label>
                                </div>
                            </label>
                        </div>
                        {{--Different Section --}}

                        <div>
                            <label name="content-header">In the last year have you seen your GP with...
                            </label>
                        </div>
                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="s1_bowelchange"
                                               id="var_male_s1_bowelchange">change in bowel habit
                                    </label>
                                </div>
                            </label>
                        </div>
                        <div>

                            <div class="form-check-inline col-md-offset-1">
                                <label class="form-check-inline col-md-offset-0  ">
                                    <div class="checkbox-inline ">
                                        <label class="checkbox-inline">
                                            <input class="form-check-input" type="checkbox" name="s1_constipation"
                                                   id="var_male_s1_constipation ">constipation?
                                        </label>
                                    </div>
                                </label>
                            </div>
                            <div>
                                <div class="form-check-inline col-md-offset-1">
                                    <label class="form-check-inline col-md-offset-0  ">
                                        <div class="checkbox-inline ">
                                            <label class="checkbox-inline">
                                                <input class="form-check-input" type="checkbox" name="s1_cough"
                                                       id="var_male_s1_cough">cough?
                                            </label>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="form-check-inline col-md-offset-1">
                                <label class="form-check-inline col-md-offset-0  ">
                                    <div class="checkbox-inline ">
                                        <label class="checkbox-inline">
                                            <input class="form-check-input" type="checkbox" name="s1_bruising"
                                                   id="var_male_s1_bruising ">unexplained bruising?
                                        </label>
                                    </div>
                                </label>
                            </div>

                            <div class="form-check-inline col-md-offset-1">
                                <label class="form-check-inline col-md-offset-0  ">
                                    <div class="checkbox-inline ">
                                        <label class="checkbox-inline">
                                            <input class="form-check-input" type="checkbox" name="c_hb"
                                                   id="var_male_c_hb"> anaemia (Haemoglobin < 11g/dL)?<
                                        </label>
                                    </div>
                                </label>
                            </div>


                            <div class="form-check-inline col-md-offset-1">
                                <label class="form-check-inline col-md-offset-0  ">
                                    <div class="checkbox-inline ">
                                        <label class="checkbox-inline">
                                            <input class="form-check-input" type="checkbox" name="s1_urinaryretention"
                                                   id="var_male_s1_urinaryretention"> urinary retention?
                                        </label>
                                    </div>
                                </label>
                            </div>

                            <div class="form-check-inline col-md-offset-1">
                                <label class="form-check-inline col-md-offset-0  ">
                                    <div class="checkbox-inline ">
                                        <label class="checkbox-inline">
                                            <input class="form-check-input" type="checkbox" name="s1_urinaryfreq"
                                                   id="var_male_urinaryfreq"> urinary frequency?
                                        </label>
                                    </div>
                                </label>
                            </div>


                            <div class="form-check-inline col-md-offset-1">
                                <label class="form-check-inline col-md-offset-0">
                                    <div class="checkbox-inline ">
                                        <label class="checkbox-inline">
                                            <input class="form-check-input" type="checkbox" name="s1_nocturia"
                                                   id="var_male_urinaryfreq"> nocturia (passing urine at night)?
                                        </label>
                                    </div>
                                </label>
                            </div>

                            <input type="hidden" name="town" value="1">

                            <div class="form-check-inline col-md-offset-1">
                                <label class="form-check-inline col-md-offset-0">
                                    <div class="checkbox-inline ">
                                        <label class="checkbox-inline">
                                            <input class="form-check-input" type="checkbox" name="s1_impotence"
                                                   id="var_male_urinaryfreq"> Impotence?
                                        </label>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div>
                            <label name="content-header col-md-offset-1">
                                Body mass index
                                <br>
                                <div class="form-group ">
                                    {{--col-md-2 col-md-offset-2--}}
                                    <label for="BMI">
                                        <div class="form-group">
                                            <label for="BMI"><h5>Height in CentiMeter </h5>
                                                <input class="form-control col-md-offset-2" type="number" name="height"
                                                       id="height"
                                                       value="{{$userinfo->height}}"></label>
                                        </div>

                                        <div class="form-group ">
                                            <label for="BMI"><h5>Weight in KGs</h5>
                                                <input class="form-control col-md-offset-2" type="number" name="weight"
                                                       id="weight"
                                                       value="{{$userinfo->weight}}">
                                            </label>
                                        </div>
                                    </label>
                                </div>
                            </label>
                        </div>

                    </div>

                    {{--Female form --}}

                    <div class="female_form" style="display: block;">
                        <div class="form-group col-md-offset-1">
                            <label class="col-md-offset-0">
                                Age
                            </label>
                            <input type="number" class="text" id="age" value="{{$userinfo->age}}">

                        </div>
                        <div class="form-group col-md-offset-1">
                            <label class="col-md-offset-0">
                                <strong> Q. Smoking Status? </strong>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-option" type="radio" name="smoke_cat"
                                               id="var_female_smoke_cat_non_smoker" value="0"> Non-Smoker
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="smoke_cat"
                                               id="var_female_smoke_cat_ex_smoker" value="1"> Ex-Smoker
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="smoke_cat"
                                               id="var_female_smoke_light_smoker" value="2"> light smoker (less than 10)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="smoke_cat"
                                               id="var_female_smoke_moderate_smoker" value="3"> moderate smoker (10 to
                                        19)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="smoke_cat"
                                               id="var_female_smoke_heavy_smoker" value="4"> heavy smoker (20 or over)
                                    </label>
                                </div>

                            </label>
                        </div>

                        <div class="form-group col-md-offset-1">
                            <label class="form-group col-md-offset-0 ">
                                <strong> Alcohol status: </strong>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="alcohol_cat4"
                                               id="var_female_alcohol_non_drinker" value="0"> non-drinker
                                    </label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="alcohol_cat4"
                                               id="var_female_alcohol_drinker_1_day" value="1"> 1 unit per day
                                    </label>
                                </div>

                                <div class="'form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="alcohol_cat4"
                                               id="var_female_alcohol_drinker_2_day" value="2"> 1-2 unit per day
                                    </label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="alcohol_cat4"
                                               id="var_female_alcohol_drinker_3_day" value="3"> 3+ units per day
                                    </label>
                                </div>
                            </label>
                        </div>
                        <div>
                            <label name="content-header">Do you have..
                            </label>
                        </div>
                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="fh_gicancer"
                                               id="var_female_fh_gicancer" value="1"> a family history of
                                        gastrointestinal
                                        cancer?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0 ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="fh_breastcancer"
                                               id="var_female_fh_prostatecancer" value="1"> a family history of breast
                                        cancer?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0 ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="fh_ovariancancer"
                                               id="var_female_b_type2"> a family history of ovarian cancer?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0 ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="checkbox-inline" type="checkbox" name="b_type2"
                                               id="var_female_fh_b_chronicpan"> type 2 diabetes?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0 ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="checkbox-inline" type="checkbox" name="b_copd"
                                               id="var_female_fh_b_copd"> chronic obstructive airways disease (COPD)?
                                    </label>
                                </div>
                            </label>
                        </div>


                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0 ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="checkbox-inline" type="checkbox" name="b_endometrial"
                                               id="var_female_fh_b_copd"> endometrial hyperplasia or polyp?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0 ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="checkbox-inline" type="checkbox" name="b_chronicpan"
                                               id="var_female_fh_b_copd"> chronic pancreatitis?
                                    </label>
                                </div>
                            </label>
                        </div>


                        <div>
                            <label name="content-header">Do you currently have..
                            </label>
                        </div>
                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_appetiteloss"
                                               id="var_female_new_appetiteloss"> loss of appetite?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_weightloss"
                                               id="var_female_new_weightloss"> unintentional weight loss?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_abdopain"
                                               id="var_female_new_abdopain"> abdominal pain?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_abdodist"
                                               id="var_female_new_abdopain">abdominal swelling?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_dysphagia"
                                               id="var_female_new_dysphagia">difficulty swallowing?
                                    </label>
                                </div>
                            </label>
                        </div>


                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_rectalbleed"
                                               id="var_female_new_rectalbleed">rectal bleeding?
                                    </label>
                                </div>
                            </label>
                        </div>


                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_gibleed"
                                               id="var_female_new_gibleed">blood when you vomit?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_haemoptysis"
                                               id="var_female_new_haemoptysis">blood when you cough?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_haematuria"
                                               id="var_female_new_haematuria">blood in your urine?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_pmb"
                                               id="var_female_new_pmb">postmenopausal bleeding?
                                    </label>
                                </div>
                            </label>
                        </div>


                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_imb"
                                               id="var_female_new_imb">irregular menstrual bleeding?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_necklump"
                                               id="var_female_new_necklump">a lump in your neck?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_postcoital"
                                               id="var_female_new_postcoital">vaginal bleeding after sex?
                                    </label>
                                </div>
                            </label>
                        </div>


                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_breastpain"
                                               id="var_female_new_breastpain">breast pain?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_breastlump"
                                               id="var_female_new_breastlump">a breast lump?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_breastskin"
                                               id="var_female_new_breastskin">breast skin tethering or nipple discharge?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="s1_bowelchange"
                                               id="var_female_new_vte">vembolism??
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="new_nightsweats"
                                               id="var_female_new_vte"> night sweats?
                                    </label>
                                </div>
                            </label>
                        </div>

                        <div class="form-group col-md-offset-1">
                            <label>
                                <strong> Condition of heartburn or indigestion: </strong>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-option" type="radio" name="heartburn_cat"
                                               id="var_male_heartburn_cat_0" value="0"> neither
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="heartburn_cat"
                                               id="var_male_heartburn_cat_1" value="1"> heartburn
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="heartburn_cat"
                                               id="var_male_heartburn_cat_2" value="2"> indigestion (less than 10)
                                    </label>
                                </div>
                            </label>
                        </div>
                        {{--Different Section --}}

                        <div>
                            <label name="content-header">In the last year have you seen your GP with...
                            </label>
                        </div>
                        <div class="form-check-inline col-md-offset-1">
                            <label class="form-check-inline col-md-offset-0  ">
                                <div class="checkbox-inline">
                                    <label class="checkbox-inline">
                                        <input class="form-check-input" type="checkbox" name="s1_bowelchange"
                                               id="var_male_s1_bowelchange">change in bowel habit
                                    </label>
                                </div>
                            </label>
                        </div>
                        <div>

                            <div class="form-check-inline col-md-offset-1">
                                <label class="form-check-inline col-md-offset-0  ">
                                    <div class="checkbox-inline ">
                                        <label class="checkbox-inline">
                                            <input class="form-check-input" type="checkbox" name="s1_constipation"
                                                   id="var_male_s1_constipation ">constipation?
                                        </label>
                                    </div>
                                </label>
                            </div>
                            <div>
                                <div class="form-check-inline col-md-offset-1">
                                    <label class="form-check-inline col-md-offset-0  ">
                                        <div class="checkbox-inline ">
                                            <label class="checkbox-inline">
                                                <input class="form-check-input" type="checkbox" name="s1_cough"
                                                       id="var_male_s1_cough">cough?
                                            </label>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="form-check-inline col-md-offset-1">
                                <label class="form-check-inline col-md-offset-0  ">
                                    <div class="checkbox-inline ">
                                        <label class="checkbox-inline">
                                            <input class="form-check-input" type="checkbox" name="s1_bruising"
                                                   id="var_male_s1_bruising ">unexplained bruising?
                                        </label>
                                    </div>
                                </label>
                            </div>

                            <div class="form-check-inline col-md-offset-1">
                                <label class="form-check-inline col-md-offset-0  ">
                                    <div class="checkbox-inline ">
                                        <label class="checkbox-inline">
                                            <input class="form-check-input" type="checkbox" name="c_hb"
                                                   id="var_male_c_hb"> anaemia (Haemoglobin < 11g/dL)?<
                                        </label>
                                    </div>
                                </label>
                            </div>


                            <input type="hidden" name="town" value="1">

                        </div>
                        <div>
                            <label name="content-header col-md-offset-1">
                                Body mass index
                                <br>
                                <div class="form-group ">
                                    {{--col-md-2 col-md-offset-2--}}
                                    <label for="BMI">
                                        <div class="form-group">
                                            <label for="BMI"><h5>Height in CentiMeter </h5>
                                                <input class="form-control col-md-offset-2" type="number" name="height"
                                                       id="height"
                                                       value="{{$userinfo->height}}"></label>
                                        </div>

                                        <div class="form-group ">
                                            <label for="BMI"><h5>Weight in KGs</h5>
                                                <input class="form-control col-md-offset-2" type="number" name="weight"
                                                       id="weight"
                                                       value="{{$userinfo->weight}}">
                                            </label>
                                        </div>
                                    </label>
                                </div>
                            </label>
                        </div>

                        <input class="col-md-offset-4" type="submit" name="submit" value="submit">

                        <input type="hidden" name="_token" value="{{Session::token()}} ">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {
            var value = $("#gender").val();

            function enableMaleForm() {

                jQuery(".male_form").css({'display': 'block'});
                jQuery(".female_form").css({'display': 'none'});
                return true;
            }

            function enableFemaleForm() {
                jQuery(".male_form").css({'display': 'none'});
                jQuery(".female_form").css({'display': 'block'});
                return true;
            }


            if (value == "Male") {
                enableMaleForm();
            }

            if (value == "Female") {
                enableFemaleForm();
            }
        });

    </script>



@endsection
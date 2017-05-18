@extends('layouts.app')

@yield('title')
<title>Skin Cancer Detection</title>

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(!empty($yourMessage))
                    <div class="alert alert-danger">
                        <strong>{{$yourMessage}}!</strong>
                    </div>
                @endif
                <form action="{{route ('skin_cancer_calculator')}}" method="post">

                    <div class="form-control">Session Based Calculation for Detection of Skin Cancer</div>
                    <br>
                    <div class="form-group col-md-offset-1">
                        <label class="col-md-offset-1">
                            <strong> Q. What is the natural color of your hair?</strong>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-option" type="radio" name="var_mf_skin_options"
                                           id="var_mf_skin_hair_red" value="1"> Red or blonde
                                </label>
                            </div>
                            <div class="'form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="var_mf_skin_options"
                                           id="var_mf_skin_hair_brown" value="0"> brown or
                                    black
                                </label>
                            </div>
                        </label>
                    </div>

                    <div class="form-group col-md-offset-1">
                        <label class="form-group col-md-offset-1 ">
                            <strong> Q. What is the natural color of your Skin? </strong>
                            <div class="'form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="var_mf_skin_body_options"
                                           id="var_mf_skin_body_fair" value="1"> Very fair or fair
                                </label>
                            </div>

                            <div class="'form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="var_mf_skin_body_options"
                                           id="var_mf_skin_body_brown" value="0"> Olive, brown
                                    or black
                                </label>
                            </div>
                        </label>
                    </div>


                    <span style='color:transparent;margin-right:1.25em; display:inline-block;'>&nbsp;</span>

                    <div class="form-group col-md-offset-1">
                        <label class="form-group col-md-offset-1">
                            <strong> Q. If you did not use any sun protection and spent 11am to 1pm in the Summer
                                Sun,<br>
                                how would you expect your skin to react? </strong>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio"
                                           name="var_mf_skin_body_burnt_options" id="var_mf_skin_body_burnt"
                                           value="1"> Burn Rather than Tan
                                </label>
                            </div>
                            <div class="'form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio"
                                           name="var_mf_skin_body_burnt_options" id="var_mf_skin_body_tan"
                                           value="0"> Tan Rather than Burn
                                </label>
                            </div>
                        </label>
                    </div>

                    <span style='color:transparent;margin-right:1.25em; display:inline-block;'>&nbsp;</span>


                    <div class="form-group col-md-offset-1">

                        <label class="form-group col-md-offset-1">
                            <strong> Q. Do you have moles on your skin? </strong>
                            <div class="'form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio"
                                           name="var_mf_skin_body_moles_options"
                                           id="var_mf_skin_body_moles_20plus"
                                           value="4"> More than 20
                                </label>
                            </div>
                            <div class="'form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio"
                                           name="var_mf_skin_body_moles_options"
                                           id="var_mf_skin_body_moles_20less"
                                           value="2"> Less than 20
                                </label>
                            </div>
                            <div class="'form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio"
                                           name="var_mf_skin_body_moles_options"
                                           id="var_mf_skin_body_moles_none"
                                           value="0"> None
                                </label>
                            </div>
                        </label>
                    </div>

                    <span style='color:transparent;margin-right:1.25em; display:inline-block;'>&nbsp;</span>
                    <br>

                    <div class="form-group col-md-offset-1">

                        <label class="form-group col-md-offset-1">
                            <strong> Q. Have you ever been diagnosed with skin cancer? </strong>
                            <div class="'form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio"
                                           name="var_mf_skin_body_cancer_options"
                                           id="var_mf_skin_body_cancer_yes"
                                           value="3"> Yes
                                </label>
                            </div>
                            <div class="'form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio"
                                           name="var_mf_skin_body_cancer_options"
                                           id="var_mf_skin_body_cancer_no"
                                           value="0"> No
                                </label>
                            </div>
                        </label> <br>
                        <input class="col-md-offset-4" type="submit" name="submit" value="submit">


                        <input type="hidden" name="_token" value="{{Session::token()}} ">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
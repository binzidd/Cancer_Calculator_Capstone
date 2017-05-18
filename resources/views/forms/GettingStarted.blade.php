@extends('layouts.app')

@yield('title')
<title>QCancer Detection</title>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome {{ Auth::user()->name }}</div>

                    <div class="panel-body">
                        <div class="form-control"> Let us get familiar</div>
                        <br>
                        <form data-toggle="validator" action="{{route('inspect')}}" method="post">
                            {{--Date of Birth--}}
                            <div class="form-group col-md-offset-1">
                                <label class="col-md-offset-1">
                                    <h3>All the Questions in this Sections are Mandatory</h3>
                                    <strong> Date of birth </strong>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-option" type="date" name="dob"
                                                   id="dob" required="true">
                                        </label>
                                    </div>
                                </label>

                            </div>
                            {{--Gender --}}
                            <div class="form-group col-md-offset-1">
                                <label class="form-group col-md-offset-1 ">
                                    <strong> Gender </strong>
                                    <div class="'form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="gender"
                                                   id="gender" value="Male"> Male
                                        </label>
                                    </div>

                                    <div class="'form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="gender"
                                                   id="gender" value="Female"> Female
                                        </label>
                                    </div>
                                </label>
                            </div>

                            {{--Height in Cms--}}
                            <div class="form-group col-md-offset-1">
                                <label class="form-group col-md-offset-1 ">
                                    <strong> Height in CM </strong>
                                    <div class="'form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="number" name="height"
                                                   id="height" required="true">
                                        </label>
                                    </div>
                                </label>
                            </div>


                            <div class="form-group col-md-offset-1">
                                <label class="form-group col-md-offset-1 ">
                                    <strong> Weight in KG </strong>
                                    <div class="'form-check">
                                        <label class="form-check-label">
                                            <input required class="form-check-input" type="number" name="weight"
                                                   id="user_weight" required="true">
                                        </label>
                                    </div>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success"> Submit</button>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                        </form>
                        {{--<script>--}}

                        {{--$(document).ready(function() {--}}
                        {{--$('#dob').formValidation({--}}
                        {{--framework: 'bootstrap',--}}
                        {{--icon: {--}}
                        {{--valid: 'glyphicon glyphicon-ok',--}}
                        {{--invalid: 'glyphicon glyphicon-remove',--}}
                        {{--validating: 'glyphicon glyphicon-refresh'--}}
                        {{--},--}}
                        {{--fields: {--}}
                        {{--latitude: {--}}
                        {{--validators: {--}}
                        {{--between: {--}}
                        {{--min: -90,--}}
                        {{--max: 90,--}}
                        {{--message: 'The latitude must be between -90.0 and 90.0'--}}
                        {{--}--}}
                        {{--}--}}
                        {{--},--}}
                        {{--longitude: {--}}
                        {{--validators: {--}}
                        {{--between: {--}}
                        {{--min: -180,--}}
                        {{--max: 180,--}}
                        {{--message: 'The longitude must be between -180.0 and 180.0'--}}
                        {{--}--}}
                        {{--}--}}
                        {{--}--}}
                        {{--}--}}
                        {{--});--}}
                        {{--});--}}
                        {{--</script>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
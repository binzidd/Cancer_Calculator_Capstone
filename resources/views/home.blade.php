@extends('layouts.app')

@yield('title')
<title>Integrated Cancer Calculator Title</title>
@section('content')
    <title>Integrated Cancer Calculator</title>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome {{ Auth::user()->name }}</div>
                    am i here

                    <div class="panel-body">
                        <div class="form-control"> Let us get familiar</div>
                        <br>
                        <form action="{{route('basicinfo')}}"method="post">
                        {{--Date of Birth--}}
                        <div class="form-group col-md-offset-1">
                            <label class="col-md-offset-1">
                                <strong> Date of birth </strong>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-option" type="date" name="dob"
                                               id="dob">
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
                                               id="height">
                                    </label>
                                </div>
                            </label>
                        </div>


                        <div class="form-group col-md-offset-1">
                            <label class="form-group col-md-offset-1 ">
                                <strong> Weight in KG </strong>
                                <div class="'form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="number" name="weight"
                                               id="user_weight">
                                    </label>
                                </div>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success"> Submit </button>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

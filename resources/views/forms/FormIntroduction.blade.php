@extends('layouts.app')

@yield('title')
<title>Integrated Cancer Calculator Detection</title>

@section('content')

    {{--<div class="panel-heading col-lg-offset-1"> Welcome {{ Auth::User()->name}}</div>--}}

    <div class="jumbotron">
        <div style="background:transparent !important; " class="container">
            <h3 align="left" style="color: black">The Lifehouse Cancer Risk Reduction Clinic Pre-visit Survey</h3>
            <p> We are looking forward to seeing you at the Chris O'Brien Lifehouse Cancer Risk
                Reduction Clinic soon.
                This is a new service designed to help you develop a personalised cancer risk reduction
                plan.
                Every person is different and we want to work in partnership with you and your local
                doctor to advise on evidence-based ways in which you can reduce your cancer risk.
                To help us prepare for your visit we'd like you to complete this survey about you and
                your health.</p>
            <p>The questions in this survey will help us work out your risk for the cancers for which we
                have some evidence
                about risk reduction (breast, cervical, bowel, lung, skin and prostate). Since every
                person is different, we
                want to be able to discuss the most beneficial options for you. The survey includes
                questions about cancer in your family.
                It may be helpful to talk to family members to find out more information. Just let us
                know what you do know and answer the questions
                as accurately as you can.</p>
            <p>Best Wishes</p>
            <p>Lyndall Trevena</p>

            <br>
            <br>


            <h3 align="left" style="color: black">Please click on the following links to proceed on Cancer
                Calculations </h3>

            <a class="btn btn-default inline " name="skin_cancer" id="skin_cancer"
               href="{{route('skin_cancer_renderer')}}">Skin Cancer</a>
            <a class="btn btn-default inline " name="bowel_cancer" id="bowel_cancer"
               href="{{route('bowel_cancer_renderer')}}">Bowel Cancer</a>
            <a class="btn btn-default inline " name="general_cancer" id="general_cancer"
               href="{{route('general_cancer_renderer')}}">General
                Cancer</a>

        </div>
    </div>

    </div>




@endsection
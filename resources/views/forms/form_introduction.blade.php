@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel-heading"> Welcome {{ Auth::user()->first_name }}</div>

        <div class="jumbotron">
            <div style="background:transparent !important; " class="container">
                <h3>The Lifehouse Cancer Risk Reduction Clinic Pre-visit Survey</h3>
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

            </div>
        </div>
    </div>

    @endsection
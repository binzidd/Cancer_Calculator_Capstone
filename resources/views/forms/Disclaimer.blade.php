@extends('layouts.app')

@yield('title')
<title>Integrated Cancer Calculator Detection</title>


@section('content')

    <div class="jumbotron">

        <div style="background:transparent !important; " class="container">


            <p>The information and recommendations contained in this website are not intended to be used as a
                substitute
                for
                advice by a medical professional.</p>

            <p>The University of Sydney and its affiliates do not accept any liability for any injury, loss or
                damage
                incurred by the use of this website and the reliance of the information contained within it. The
                information
                contained within this website was compiled using the best evidence-based information, in addition to
                input from
                experts in the field, however the University of Sydney and its affiliates cannot guarantee, and
                assume
                no legal
                responsibility for, the complete validity of all the information contained within this website.</p>

            <p>The views or opinions stated in secondary sources linked to this website do not necessarily reflect
                those
                of
                the University of Sydney and its affiliates.</p>

            <p>The developers of this website will not benefit personally or professionally from any decisions you
                make
                regarding the information and recommendations contained within this website.</p>


            <div class="container">
                <div class="row">
                    <div class="container-fluid">


                        <form {{route("disclaimer_accepted")}} method="post"
                              onsubmit="if(document.getElementById('agree').checked)
              {
            return true;
              }
            else {
                  alert('Please agree to Terms to Continue');
                  return false;
              }">

                            <input type="checkbox" name="checkbox" value="check" id="agree"/> I have read and agree to
                            the
                            Terms and
                            Conditions
                            <br>
                            <br>
                            <input type="submit" name="submit" value="submit"/>
                            <input type="hidden" name="_token" value="{{Session::token()}} ">
                        </form>
                    </div>
                </div>

            </div>
@endsection
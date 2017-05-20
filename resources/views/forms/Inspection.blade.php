@extends('layouts.app')

@yield('title')
<title>Results</title>

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1> Summary Results </h1>


                {{--<div class="container">--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-8 col-md-offset-2">--}}
                {{--<h2>2. Results for Skin Cancer</h2>--}}
                {{--{{$userId= Auth::user()->id }}--}}
                {{--{{$skincancer_value = DB::table('skin_cancers')->where('user_id', Auth::User()->id)->value('skin_cancer_score');}}--}}
                {{--{{print_r($skincancer_value);}}--}}
                {{--{{die;}}--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}


                <div class="generalcancer">
                    <h2>1. Results for General Cancer</h2>
                    <table>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td><strong>Score</strong></td>
                        </tr>
                        @foreach($generalCancerValuestoView as $value)
                            <tr>
                                <td> {{ $value['name'] }} </td>
                                <td> {{ $value['score'] }} {{"%"}} </td>
                            </tr>
                        @endforeach
                    </table>
                    <br>

                    <br>
                </div>
            </div>
        </div>
    </div>



    <button class="btn-success  onClick=" window.print()">Print this page</button>

@endsection











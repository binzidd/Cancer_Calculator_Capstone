@extends('layouts.app')

@yield('title')
<title>Results</title>

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1> Summary Results </h1>


                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">

                            <div class="skincancer">
                                <h2>1.Result for Skin Cancer</h2>
                                {{ $Skin_Cancer_Results }}

                                <div class="generalcancer">
                                    <h2>2. Results for General Cancer</h2>
                                    <table>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Score</strong></td>
                                        </tr>
                                        @foreach($GeneralCancer as $value)
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
                </div>
            </div>
            <div class="col-md-8 col-md-offset-3">
                <button class="btn-success" onClick="window.print()"> Print this page</button>
            </div>
        </div>
    </div>





@endsection










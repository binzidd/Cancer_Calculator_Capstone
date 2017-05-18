@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1> Summary Results </h1>
                <h2>1. Results for General Cancer</h2>
                <table>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td><strong>Score</strong></td>
                    </tr>
                    @foreach($resultsarray_general_cancer as $value)
                        <tr>
                            <td> {{ $value['name'] }} </td>
                            <td> {{ $value['score'] }} {{"%"}} </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>2. Results for Skin Cancer</h2>
                {{$Skin_Cancer_Results}}

            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>3. Results for Bowel Cancer</h2>

            </div>
        </div>
    </div>

    <button onClick="window.print()">Print this page</button>



@endsection











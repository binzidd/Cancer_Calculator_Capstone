@extends('layouts.app')

@foreach($resultsarray as $value)
    {{ $value['name'] }}
    {{ $value['score'] }}
@endforeach








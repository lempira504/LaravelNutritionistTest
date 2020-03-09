@extends('layouts.master')

@section('title', 'entrevista de ')

@section('content')
<div class="container">

    <div class="row">
        <ul>
            @foreach ($plans as $plan)
                <li>{{ $plan->title }}</li>
            @endforeach
        </ul>
    </div>
    <div class="row py-3">
        <div class="col">
            <hr>
        </div>
    </div>


    




</div>
@endsection
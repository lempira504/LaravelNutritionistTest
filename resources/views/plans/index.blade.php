@extends('layouts.master')

@section('title', 'Lista de Planes')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12 align-">
            <h1 class="text-success text-center">Lista de Planes</h1>
            
        </div>
        
    </div>
    
    <div class="row py-3">
        @foreach ($plans as $plan)
            <div class="col-md-3">
                <a href="{{ route('entrevista.appointment') }}">{{ $plan->cita->code }}</a>
            </div>
            <div class="col-md-3">
                {{ $plan->cita->name }}
            </div>
            <div class="col-md-3">
                {{ $plan->cita->phone }}
            </div>
            <div class="col-md-3">
                {{ $plan->created_at }}
            </div>
        @endforeach
    </div>
    
</div>
@endsection
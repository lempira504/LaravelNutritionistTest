@extends('layouts.app')

@section('title', 'Lista de Pacientes')

@section('content')
<div class="container">

    <div class="row pt-3">
        <div class="col-12">
            <h1 class="text-success">
                Lista de Pacientes
                <hr>
            </h1>
            
            {{-- <div class="col-md-12">
                @foreach ($patients as $patient)
                    <li> {{ $patient->name }} </li>
                @endforeach
            </div> --}}

        </div>
    </div>


    @foreach ($patients as $patient)
        <div class="row py-1 justify-content-md-center">
            <div class="col-md-3">
                <a class="text-info" href="{{ route('pacientes.create', $patient->id) }}" data-toggle="tooltip" data-placement="top" title="Crear Plan del Paciente">{{ $patient->code }}</a>
            </div>
            <div class="col-md-2">
            <a class="text-danger" href="{{ route('pacientes.show', $patient->id) }}">{{ $patient->name }}</a>
            </div>
            <div class="col-md-2">
                <a class="text-success" href="mailto:{{ $patient->email }}?subject=Norma Garcia">{{ $patient->email }}</a>
            </div>
            
        </div>
    @endforeach

</div>
@endsection
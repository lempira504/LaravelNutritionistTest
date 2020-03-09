@extends('layouts.app')

@section('title', 'Detalles de Paciente')

@section('content')
<div class="container">

    <div class="row pt-3">
        <div class="col-12">
            <h1 class="text-success">
                Detalles de Paciente {{ $paciente->name }}
                <hr>
            </h1>

        </div>
    </div>

        <div class="row py-1">
            <div class="d-flex-column">
                <div class="col-md-12 pb-3">
                    {{ $paciente->code }}
                </div>
                <div class="col-md-10 pb-3">
                    {{ $paciente->name }}
                </div>
                <div class="col-md-10 pb-3">
                    {{ $paciente->date }}
                </div>
                <div class="col-md-10 pb-3">
                    {{ $paciente->phone }}
                </div>
                <div class="col-md-10 pb-3">
                    {{ $paciente->email }}
                </div>
                <div class="col-md-10 pb-3">
                    {{ $paciente->address }}
                </div>
                
            </div>
            <div class="col-md-12">
                <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Borrar</button>
                </form>
            </div>
            
            
        </div>

</div>
@endsection
@extends('layouts.layout')

@section('title', 'Nuestros Horarios')

@section('content')
<div class="container">

    <div class="row pt-3">
        <div class="col-12">
            <h1 class="text-success">
                Nuestros Horarios
                <hr>
            </h1>

        </div>
    </div>


    @foreach ($appointments as $appointment)
    <div class="row py-1 justify-content-md-center">
        <div class="col-4 d-flex">
            <div class="pr-2">
                <label for="">Creado por:</label>
            </div>
            <div class="text-muted">
                {{ $appointment->user->name }}
                {{-- {{ $appointment->patient->id }} --}}
            </div>
        </div>
        <div class="col-4">
            {{-- <a href="/horarios/{{ $appointment->id }}/edit">{{ $appointment->time }}</a> --}}
            <a href="{{ route('horarios.edit', $appointment->id) }}">{{ $appointment->time }}</a>
        </div>
        

        <div class="col-2 d-flex">
            <div class="pr-2">
                <a class="btn btn-warning btn-sm" href="{{ route('horarios.edit', $appointment->id) }}">Editar</a>
            </div>
            <div class="pr-2">
                <form action="{{ route('horarios.destroy', $appointment->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
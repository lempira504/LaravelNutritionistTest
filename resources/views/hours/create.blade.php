@extends('layouts.app')

@section('title', 'Agregar Horario')

@section('content')
<div class="container">

    <div class="row pb-1">
        <div class="col-12">
            <h1 style="color: #19bc9d; font-weight: bold;">Agregar Horario
                <hr>
            </h1>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <form action="{{ route('horas.store') }}" method="post">

                <div class="form-group">
                    <label for="time">Horario <b class="text-danger">*</b></label>
                    <input name="time" type="text" class="form-control my-input-bg @error('time') is-invalid @enderror"
                        placeholder="Nombre" value="{{ old('time') }}" autofocus>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md">Guardar cita</button>
                </div>

                @csrf
            </form>
        </div>

    </div>
</div>
@endsection
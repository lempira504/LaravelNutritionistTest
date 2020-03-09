@extends('layouts.app')

@section('title', 'Agregar Paciente')

@section('content')
<div class="container">


    <div class="row pb-1">
        <div class="col-12">
            <h1 class="text-success">Agregar Paciente
                <hr>
            </h1>
        </div>
    </div>

    <div class="row pb-1">
        <div class="col-6 text-right">
            <h5 class="text-muted"># {{ $codigoDelPaciente }} </h5>

        </div>
    </div>

    

    <div class="row">

        <div class="col-md-6">
            
            @include('flash-message')

            <form action="{{ route('pacientes.store') }}" method="post">

                <div class="form-group">
                    <label for="name">Nombre de Paciente <b class="text-danger">*</b></label>
                    <input name="name" type="text" class="form-control my-input-bg @error('name') is-invalid @enderror"
                        placeholder="Nombre" value="{{ old('name') }}" autofocus>
                    <input name="code" type="hidden" class="form-control" value="{{ $codigoDelPaciente }}">
                </div>

                <div class="form-group">
                    <label for="date">Fecha <b class="text-danger">*</b></label>
                    <input name="date" type="date" class="form-control my-input-bg @error('date') is-invalid @enderror"
                        placeholder="Fecha" value="{{ old('date') }}">
                        
                </div>

                <div class="form-group">
                    <label for="appt_id">Hora <b class="text-danger">*</b></label>
                    <select name="appt_id" class="form-control @error('appt_id') is-invalid @enderror">

                        @foreach ($availableHours as $availableHour)
                            <option value="{{ old('appt_id') ?? $availableHour->id }}">{{ $availableHour->time }}</option>
                        @endforeach

                    </select>

                </div>

                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input name="phone" type="text"
                        class="form-control my-input-bg @error('phone') is-invalid @enderror" placeholder="Teléfono"
                        value="{{ old('phone') }}">

                </div>

                <div class="form-group">
                    <label for="email">Correo</label>
                    <input name="email" type="text"
                        class="form-control my-input-bg @error('email') is-invalid @enderror" placeholder="Correo"
                        value="{{ old('email') }}">

                </div>

                <div class="form-group">
                    <label for="address">Direccion</label>
                    <input name="address" type="text"
                        class="form-control my-input-bg @error('address') is-invalid @enderror" placeholder="Direccion"
                        value="{{ old('address') }}">

                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md">Guardar</button>
                </div>

                @csrf
            </form>
        </div>

        <div class="col-md-4 offset-md-2 text-right">
            <div class="pr-2">
                <label for="" style="text-decoration: underline;">Codigo:</label>
            </div>
            <div class="text-muted">
                {{ $patient->code ?? '' }}
            </div>
            <hr>
            <div class="pr-2">
                <label for="" style="text-decoration: underline;">Nombre:</label>
            </div>
            <div class="text-muted">
                {{ $patient->name ?? '' }}
            </div>
            <hr>
            <div class="pr-2">
                <label for="" style="text-decoration: underline;">Teléfono:</label>
            </div>
            <div class="text-muted">
                {{ $patient->phone ?? '' }}
            </div>
            <hr>
            <div class="pr-2" style="text-decoration: underline;">
                <label for="">Correo:</label>
            </div>
            <div class="">
                <a href="{{ $patient->email ?? '' }}?subject=asda">{{ $patient->email ?? '' }}</a>
            </div>
            <hr>
            <div class="pr-2">
                <label for="" style="text-decoration: underline;">Direccion:</label>
            </div>
            <div class="">
                {{ $patient->address ?? '' }}
            </div>
        </div>
        
    </div>
</div>
@endsection
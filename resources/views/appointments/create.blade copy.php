@extends('layouts.app')

@section('title', 'Crear Cita')

@section('content')


@if(!empty(Session::get('search')) && Session::get('search') == 1)
{{ dd('sd') }}
<script>
$(function() {
    $('#myModal').modal('show');
});
</script>
@endif

<div class="container">


    <div class="row pb-1">
        <div class="col-12">
            <h1 style="color: rgb(25, 188, 157); font-weight: bold;">Crear Cita
                <hr>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            {{-- <div class="form-group">
                <input class="form-control" name="date" type="date">
            </div> --}}
            <a class="btn btn-success" href=" {{ route('buscar.create') }} ">Buscar Horario</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>
            
            @include('search.modal.modal')
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
            
            {{-- {{ Helper::showAlertMessageWhenUserDoesSomething($success, $message) }} --}}
            <form action="{{ route('citas.store') }}" method="post">

                <div class="form-group">
                    <label for="name">Nombre de Paciente <b class="text-danger">*</b></label>
                    <input name="name" type="text" class="form-control my-input-bg @error('name') is-invalid @enderror"
                        placeholder="Nombre" value="{{ old('name') }}" >
                    <input name="code" type="hidden" class="form-control" value="{{ $codigoDelPaciente }}">
                </div>

                <div class="form-group">
                    <label for="date">Fecha <b class="text-danger">*</b></label>
                    <input name="date" type="date" class="form-control my-input-bg @error('date') is-invalid @enderror"
                        placeholder="Fecha" value="{{ old('date') }}">
                        
                </div>
                
                <div class="form-group">
                    <label for="hour_id">Hora <b class="text-danger">*</b></label>
                    <select name="hour_id" class="form-control @error('time') is-invalid @enderror">

                        @foreach ($availableHours as $availableHour)
                            <option value="{{ old('hour_id') ?? $availableHour->id }}">{{ $availableHour->time }}</option>
                        @endforeach

                    </select>

                </div>

                <div class="form-group">
                    <label for="phone">Teléfono <b class="text-danger">*</b></label>
                    <input name="phone" type="text"
                        class="form-control my-input-bg @error('phone') is-invalid @enderror" placeholder="Teléfono"
                        value="{{ old('phone') }}">

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
                he
                {{ $appointment->code ?? '' }}
            </div>
            <hr>
            <div class="pr-2">
                <label for="" style="text-decoration: underline;">Nombre:</label>
            </div>
            <div class="text-muted">
                {{ $appointment->name ?? '' }}
            </div>
            <hr>
            <div class="pr-2">
                <label for="" style="text-decoration: underline;">Teléfono:</label>
            </div>
            <div class="text-muted">
                {{ $appointment->phone ?? '' }}
            </div>
            <hr>
            <div class="pr-2" style="text-decoration: underline;">
                <label for="">Correo:</label>
            </div>
            <div class="">
                <a href="{{ $appointment->email ?? '' }}?subject=asda">{{ $appointment->email ?? '' }}</a>
            </div>
            <hr>
            <div class="pr-2">
                <label for="" style="text-decoration: underline;">Direccion:</label>
            </div>
            <div class="">
                {{ $appointment->address ?? '' }}
            </div>
        </div>
        
    </div>
</div>
@endsection

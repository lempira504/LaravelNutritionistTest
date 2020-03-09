@extends('layouts.app')

@section('title', 'Crear Cita')

@section('content')

<div class="container">

    <div class="row pb-1">
        <div class="col-12">
            <h1 style="color: rgb(25, 188, 157); font-weight: bold;">Crear Cita
                <hr>
            </h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form id="form-hours" action=" {{ route('citas.buscar') }} " method="POST">
                {{-- <form id="form-hours" data-route=" {{ route('citas.buscar') }} " method="POST"> --}}
                    {{-- <div id="alerts"></div> --}}
                    @csrf
                    
                    <div class="form-group">
                        <label for="search">Fecha</label>
                        <input id="search" name="search" type="date" class="form-control my-input-bg @error('search') is-invalid @enderror" placeholder="Fecha" value="{{ old('search') }}">

                    </div>
                    <div class="form-group">
                        <button id="btnsearch" type="submit" class="btn btn-primary">Buscar Horario</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6 text-left pl-4 pt-4">
                {{-- {{ dd($date) }} --}}
                @if (Session::has('appointments'))
                <?php  $appointments = Session::get('appointments'); ?>

                <?php $date = Session::get('date'); ?>
                {{-- {{ dd($date['search']) }} --}}
                {{-- {{ dd(Session::all()) }} --}}

                @if (count($appointments) > 0)

                <div class="alert alert-danger text-capitalize" role="alert" style="font-size: 18px;">
                    <strong>Horarios Ocupados Para el: </strong>
                    <br>
                    {{ App\Helper::showDayMonthNameAndYearDate($date) }}
                </div>
                
                @else
                <div class="alert alert-success text-capitalize" role="alert" style="font-size: 18px;">
                    <strong>Todas Las Horas Están Disponibles el: </strong>
                    <br>
                    {{ App\Helper::showDayMonthNameAndYearDate($date) }}
                </div>

                @endif

                @foreach ($appointments as $appointment)
                <?php $hours = App\Hour::where('id', $appointment->hour_id)->get(); ?>
                <span class="badge badge-warning p-2 font-weight-light" style="font-size: 18px;">
                    {{ $appointment->hour->time }}
                </span>
                {{-- @foreach ($hours as $hour)
                
                <span class="badge badge-warning p-2 font-weight-light" style="font-size: 18px;">

                    {{ $hour->time }}
                </span>
                @endforeach --}}
                @endforeach
                {{-- {{ dd(Session::all()) }} --}}

                @endif
            </div>

        </div>
    </div>

    <div class="row pt-5">

        <div class="col-md-6">
            {{-- @include('flash-message') --}}
            <div class="text-right">
                <h5 class="text-muted"># {{ $codigoDelPaciente }} </h5>
            </div>

            {{-- {{ Helper::showAlertMessageWhenUserDoesSomething($success, $message) }} --}}
            <form action="{{ route('citas.store') }}" method="post">

                <div class="form-group">
                    <label for="name">Nombre de Paciente <b class="text-danger">*</b></label>
                    <input name="name" type="text" class="form-control my-input-bg @error('name') is-invalid @enderror"
                        placeholder="Nombre" value="{{ old('name') }}">
                    <input name="code" type="hidden" class="form-control" value="{{ $codigoDelPaciente }}">
                </div>

                <div class="form-group">
                    <label for="date">Fecha <b class="text-danger">*</b></label>
                    <input name="date" type="date" class="form-control my-input-bg @error('date') is-invalid @enderror"
                        placeholder="Fecha" value="{{ old('date') }}">

                </div>

              
                <div class="form-group">
                    <label for="hour_id">Hora <b class="text-danger">*</b></label>
                    <select name="hour_id" class="form-control @error('hour_id') is-invalid @enderror">

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

    </div>

    {{-- @section('script')

    <script src="{{ asset('js/searchavailableHours.js') }}" defer></script>
        
    @endsection --}}

@endsection


    {{-- @if (Session::get('search'))

{{ dd(session()->all()) }}

    {{ Session::forget('appointments') }}
    {{ Session::forget('search') }}
    {{ Session::save() }}
    @endif --}}





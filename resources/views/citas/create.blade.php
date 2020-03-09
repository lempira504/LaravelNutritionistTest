@extends('layouts.app')

@section('title', 'Lista de Citas')

@section('content')
<div class="container">
    
    <div class="row pb-5">
        <div class="col-12">
            <h1>Lista de Citas</h1>
        </div>
        <div class="col-8">
            
            <form action="">
                @csrf
                <div class="form-group">
                    <p><i class="fa fa-search"></i> Buscar Fecha</p>
                    <input class="form-control" type="text" placeholder="Buscar por dia...">
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h1>Crear Cita</h1>
        </div>
        
        <div class="col-md-6">
            <form action="{{ route('citas.store') }}" method="post">
                
                <div class="form-group">
                    <label for="code">Código del Paciente: </label>
                    <span class="muted">{{ $codigoDelPaciente }}</span>
                    {{-- <input name="code" type="text" class="form-control" value="{{ $codigoDelPaciente }}" readonly="readonly"> --}}
                    <input name="code" type="hidden" class="form-control" value="{{ $codigoDelPaciente }}">
                </div>
                <div class="form-group">
                    <label for="name">Nombre del Paciente</label>
                    <input name="name" type="text" class="form-control my-input-bg @error('name') is-invalid @enderror" placeholder="Nombre" value="{{ old('name') }}">
                    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="time">Hora</label>
                    <select name="time" class="form-control @error('time') is-invalid @enderror">
                        {{-- <option value="{{ old('time') }}">{{ old('time') }}</option> --}}
                    <option value="{{ old('time') ?? '7:00 a.m.'}}">{{ old('time') ?? '7:00 a.m.'}}</option>
                        <option value="{{ old('time') ?? '7:30 a.m.'}}">7:30 a.m.</option>
                        <option value="{{ old('time') ?? '8:00 a.m.'}}">8:00 a.m.</option>
                        <option value="{{ old('time') ?? '8:30 a.m.'}}">8:30 a.m.</option>
                        <option value="{{ old('time') ?? '9:00 a.m.'}}">9:00 a.m.</option>
                        <option value="{{ old('time') ?? '9:30 a.m.'}}">9:30 a.m.</option>
                        <option value="{{ old('time') ?? '10:00 a.m.'}}">10:00 a.m.</option>
                        <option value="{{ old('time') ?? '10:30 a.m.'}}">10:30 a.m.</option>
                        <option value="{{ old('time') ?? '11:00 a.m.'}}">11:00 a.m.</option>
                        <option value="{{ old('time') ?? '11:30 a.m.'}}">11:30 a.m.</option>
                        <option value="{{ old('time') ?? '1:00 p.m.'}}">1:00 p.m.</option>
                        <option value="{{ old('time') ?? '1:30 p.m.'}}">1:30 p.m.</option>
                        <option value="{{ old('time') ?? '2:00 p.m.'}}">2:00 p.m.</option>
                        <option value="{{ old('time') ?? '2:30 p.m.'}}">2:30 p.m.</option>
                        <option value="{{ old('time') ?? '3:00 p.m.'}}">3:00 p.m.</option>
                        <option value="{{ old('time') ?? '3:30 p.m.'}}">3:30 p.m.</option>
                        <option value="{{ old('time') ?? '4:00 p.m.'}}">4:00 p.m.</option>
                    </select>
                    @error('time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="date">Fecha</label>
                    <input name="date" class="form-control @error('date') is-invalid @enderror" type="date" value="{{ old('date') }}">
                    @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="(504) 3333-3333">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Correo</label>
                    <input name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="ejemplo@me.com">
                   
                </div>

                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input name="address" type="text" class="form-control" value="{{ old('address') }}" placeholder="Colonia...">
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
@extends('layouts.app')

@section('title', 'Lista de Citas')

@section('content')
<div class="container">
    
    <div class="row pb-5">
        <div class="col-12">
            <h1>Editar de Cita</h1>
        </div>
        <div class="col-8">
            
            <form action="">
                @csrf
                <div class="form-group">
                    <p><i class="fa fa-search"></i> Buscar Fecha</p>
                <input class="form-control" type="text"  placeholder="Buscar por dia...">
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h1>Editar Cita</h1>
        </div>
        
        <div class="col-md-6">
            <form action="{{ route('citas.update', $cita->id) }}" method="post">
                
                <div class="form-group">
                    <label for="code">Código del Paciente</label>
                    <input name="code" type="text" class="form-control" value="{{ $cita->code }}">
                </div>
                <div class="form-group">
                    <label for="name">Nombre del Paciente</label>
                <input name="name" type="text" class="form-control my-input-bg @error('name') is-invalid @enderror" placeholder="Nombre" value="{{ $cita->name ?? old('name') }}">
                    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="time">Hora</label>
                    <select name="time" class="form-control @error('time') is-invalid @enderror">
                        <option value="{{ $cita->time ?? old('time') }}">{{ $cita->time ?? old('time') }}</option>
                        <option value="7:00 a.m.">7:00 a.m.</option>
                        <option value="7:30 a.m.">7:30 a.m.</option>
                        <option value="8:00 a.m.">8:00 a.m.</option>
                        <option value="8:30 a.m.">8:30 a.m.</option>
                        <option value="9:00 a.m.">9:00 a.m.</option>
                        <option value="9:30 a.m.">9:30 a.m.</option>
                        <option value="10:00 a.m.">10:00 a.m.</option>
                        <option value="10:30 a.m.">10:30 a.m.</option>
                        <option value="11:00 a.m.">11:00 a.m.</option>
                        <option value="11:30 a.m.">11:30 a.m.</option>
                        <option value="1:00 p.m.">1:00 p.m.</option>
                        <option value="1:30 p.m.">1:30 p.m.</option>
                        <option value="2:00 p.m.">2:00 p.m.</option>
                        <option value="2:30 p.m.">2:30 p.m.</option>
                        <option value="3:00 p.m.">3:00 p.m.</option>
                        <option value="3:30 p.m.">3:30 p.m.</option>
                        <option value="4:00 p.m.">4:00 p.m.</option>
                    </select>
                    @error('time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="date">Fecha</label>
                    <input name="date" class="form-control @error('date') is-invalid @enderror" type="date" value="{{ $cita->date ?? old('date') }}">
                    @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ $cita->phone ?? old('phone') }}" placeholder="(504) 3333-3333">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Correo</label>
                    <input name="email" type="email" class="form-control" value="{{ $cita->email ?? old('email') }}" placeholder="ejemplo@me.com">
                   
                </div>

                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input name="address" type="text" class="form-control" value="{{ $cita->address ?? old('address') }}" placeholder="Colonia...">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md">Guardar Cambios</button>
                </div>

                @csrf
                @method('PATCH')
            </form>
        </div>

        



    </div>
</div>
@endsection
@extends('layouts.master')

@section('title', 'Editar Horario')

@section('content')
<div class="container">
   
    <div class="row pb-1">
        <div class="col-12">
            <h1 class="text-success">Editar Horario<hr></h1>
        </div>
    </div>

    <div class="row">
        
        <div class="col-md-6">
            <form action="{{ route('horas.update', $hora->id) }}" method="post">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="time">Horario</label>
                    <input name="time" type="text" class="form-control my-input-bg @error('time') is-invalid @enderror" placeholder="Nombre" value="{{ $hora->time ?? old('time') }}" autofocus>
                    
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md">Actualizar</button>
                    <a class="btn btn-danger" href=" {{ route('horas.index') }} ">Cancelar</a>
                </div>

            </form>
        </div>

        



    </div>
</div>
@endsection
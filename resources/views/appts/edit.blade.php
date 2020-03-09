@extends('layouts.layout')

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
            <form action="{{ route('horarios.update', $horario->id) }}" method="post">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="time">Horario</label>
                    <input name="time" type="text" class="form-control my-input-bg @error('time') is-invalid @enderror" placeholder="Nombre" value="{{ $horario->time ?? old('time') }}" autofocus>
                    
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md">Actualizar</button>
                </div>

            </form>
        </div>

        



    </div>
</div>
@endsection
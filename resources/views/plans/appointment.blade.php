@extends('layouts.layout')

@section('title', 'entrevista de '.$entrevista->name)

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            <h1 class="text-success" style="font-family: 'Oswald', sans-serif;">Detalles de {{ $entrevista->name }}</h1>
            <hr>
        </div>
        <div class="col-12 d-flex" style="font-family: 'Noto Sans', sans-serif;">
            <div class="pl-3">
                Fecha: <b>{{ $entrevista->date }}</b>
            </div>
            <div class="pl-3">
                Hora: <b>{{ $entrevista->time }}</b>
            </div>
            <div class="pl-3">
                Telefono: <b>{{ $entrevista->phone }}</b>
            </div>
            <div class="pl-3">
                Correo: <b>{{ $entrevista->email }}</b>
            </div>
            <div class="pl-3">
                Direccion: <b>{{ $entrevista->address }}</b>
            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col">
            <hr>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <form action="{{ route('entrevistas.store') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="col pb-2">
                            <img class="rounded-circle" src="https://via.placeholder.com/300.png/09f/fffC/O"
                                alt="patient" width="100%;">
                                <label for="photo">Subir foto:</label>
                                <input type="file" name="image" value="{{ old('photo') }}" multiple>
                                
                                <input type="hidden" name="cita_id" value="{{ $entrevista->id ?? old('cita_id') }}" multiple>
                        </div>
                        <div class="col text-center">
                            <hr>
                            <p>Codigo: <a class="text-success" href=""><b>{{ $entrevista->code }}</b></a> </p>
                        </div>
                    </div>

                    <div class="col-md-8">

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="">Titulo</label>
                                <input class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" type="text" name="title" id="title" autofocus="">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Brazos (cm):</label>
                                <input class="form-control @error('brazos') is-invalid @enderror" value="{{ old('brazos') }}" type="text" name="brazos" id="brazos">
                                    @error('brazos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Espalda (cm):</label>
                                <input class="form-control @error('espalda') is-invalid @enderror" value="{{ old('espalda') }}" type="text" name="espalda" id="espalda">
                                    @error('espalda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Busto (cm):</label>
                                <input class="form-control @error('busto') is-invalid @enderror" value="{{ old('busto') }}" type="text" name="busto" id="busto">
                                @error('busto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Cintura (cm):</label>
                                <input class="form-control @error('cintura') is-invalid @enderror" value="{{ old('cintura') }}" type="text" name="cintura" id="cintura">
                                @error('cintura')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Cadera (cm):</label>
                                <input class="form-control @error('cadera') is-invalid @enderror" value="{{ old('cadera') }}" type="text" name="cadera" id="cadera">
                                @error('cadera')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Piernas (cm):</label>
                                <input class="form-control @error('cadera') is-invalid @enderror" value="{{ old('piernas') }}" type="text" name="piernas" id="piernas">
                                @error('piernas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Peso Inicial:</label>
                                <input class="form-control @error('peso_inicial') is-invalid @enderror" value="{{ old('peso_inicial') }}" type="text" name="peso_inicial" id="peso_inicial">
                                @error('peso_inicial')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">% Grasa Corporal:</label>
                                <input class="form-control @error('grasa_corporal') is-invalid @enderror" value="{{ old('grasa_corporal') }}" type="text" name="grasa_corporal" id="grasa_corporal">
                                @error('grasa_corporal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">% Grasa visceral:</label>
                                <input class="form-control @error('grasa_visceral') is-invalid @enderror" value="{{ old('grasa_visceral') }}" type="text" name="grasa_visceral" id="grasa_visceral">
                                @error('grasa_visceral')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="">% Índice Masa Corporal (IMC):</label>
                                <input class="form-control @error('indice_masa_corporal') is-invalid @enderror" value="{{ old('indice_masa_corporal') }}" type="text" name="indice_masa_corporal"
                                    id="indice_masa_corporal">
                                @error('indice_masa_corporal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">% Masa Muscular:</label>
                                <input class="form-control @error('masa_muscular') is-invalid @enderror" value="{{ old('masa_muscular') }}" type="text" name="masa_muscular" id="masa_muscular">
                                @error('masa_muscular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Talla (cm):</label>
                                <input class="form-control @error('talla') is-invalid @enderror" value="{{ old('talla') }}" type="text" name="talla" id="talla">
                                @error('talla')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Edad:</label>
                                <input class="form-control @error('edad') is-invalid @enderror" value="{{ old('edad') }}" type="text" name="edad" id="edad">
                                @error('edad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Guardar Datos</button>
                        </div>
                        
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>




</div>
@endsection
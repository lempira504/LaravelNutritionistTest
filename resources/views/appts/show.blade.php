@extends('layouts.layout')

@section('title', 'Cita - Detalles de '.$cita->name)

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            <h1 class="text-success" style="font-family: 'Oswald', sans-serif;">Detalles de {{ $cita->name }}</h1>
            <hr>
        </div>
        <div class="col-12 d-flex" style="font-family: 'Noto Sans', sans-serif;">
            <div class="pl-3" >
                Fecha: <b>{{ $cita->date }}</b>
            </div>
            <div class="pl-3">
                Hora: <b>{{ $cita->time }}</b>
            </div>
            <div class="pl-3">
                Telefono: <b>{{ $cita->phone }}</b>
            </div>
            <div class="pl-3">
                Correo: <b>{{ $cita->email }}</b>
            </div>
            <div class="pl-3">
                Direccion: <b>{{ $cita->address }}</b>
            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="col pb-5">
                <a href="#">
                    <img class="rounded-circle" src="https://via.placeholder.com/300.png/09f/fffC/O" alt=""
                        width="100%;">
                </a>
            </div>
            <div class="col text-center">
                <p>Codigo: <a class="text-success" href=""><b>{{ $cita->code }}</b></a> </p>
                {{-- <p>Fecha: {{ $cita->date }}</p> --}}
                {{-- <p>Hora: {{ $cita->time }}</p> --}}
                {{-- <p>Telefono: {{ $cita->phone }}</p> --}}
                {{-- <p>Correo: {{ $cita->email }}</p> --}}
                {{-- <p>Direccion: {{ $cita->address }}</p> --}}
                {{-- <p class="overview"><b>{{ $cita->name }}</b>, {{ $cita->email }}</p> --}}
            </div>
        </div>

        <div class="col-md-8">

            <form action="">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="">Brazos (cm):</label>
                        <input class="form-control" type="text" name="brazos" id="brazos" required="" autofocus="">
                    </div>
        
                    <div class="form-group col-md-3">
                        <label for="">Espalda (cm):</label>
                        <input class="form-control" type="text" name="espalda" id="espalda">
        
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Busto (cm):</label>
                        <input class="form-control" type="text" name="busto" id="busto">
        
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Cintura (cm):</label>
                        <input class="form-control" type="text" name="cintura" id="cintura">
        
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Cadera (cm):</label>
                        <input class="form-control" type="text" name="cadera" id="cadera">
        
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Piernas (cm):</label>
                        <input class="form-control" type="text" name="piernas" id="piernas">
        
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Peso Inicial:</label>
                        <input class="form-control" type="text" name="peso_inicial" id="peso_inicial">
        
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">% Grasa Corporal:</label>
                        <input class="form-control" type="text" name="grasa_corporal" id="grasa_corporal">
        
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">% Grasa visceral:</label>
                        <input class="form-control" type="text" name="grasa_visceral" id="grasa_visceral">
        
                    </div>
                    <div class="form-group col-md-5">
                        <label for="">% Índice Masa Corporal (IMC):</label>
                        <input class="form-control" type="text" name="indice_masa_corporal" id="indice_masa_corporal">
        
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">% Masa Muscular:</label>
                        <input class="form-control" type="text" name="masa_muscular" id="masa_muscular">
        
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Talla (cm):</label>
                        <input class="form-control" type="text" name="talla" id="talla">
        
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Edad:</label>
                        <input class="form-control" type="text" name="edad" id="edad">
        
                    </div>
                </div>
                
                
                

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar Datos</button>
                </div>

                @csrf
            </form>
            
        </div>


    </div>

</div>
@endsection
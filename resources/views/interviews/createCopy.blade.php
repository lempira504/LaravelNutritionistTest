@extends('layouts.app')

@section('title', 'Entrevista del Paciente')

@section('content')
<div class="container">


    <div class="row pb-1">
        <div class="col-12">
            <h1 class="text-success d-print-none">Entrevista del Paciente
                <hr class="d-print-none">
            </h1>
        </div>
    </div>

    <div class="row">

        <div class="col-12">
            @include('flash-message')
            <form action="{{ route('citas.store') }}" method="post">

                <div class="row m-1 p-3" style="border: dashed 1px gray;">
                    <div class="col-md-12">
                        <h3>Datos Personales</h3>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            
                            <label for="name">Paciente <strong>Heber Pavon</strong> </label>
                            <h5 class="text-muted">  </h5>
                            {{-- <input name="name" type="text" class="form-control my-input-bg @error('name') is-invalid @enderror"
                                placeholder="Nombre" value="{{ old('name') }}" autofocus> --}}
                            <input name="code" type="hidden" class="form-control" value="{{ $codigoDelPaciente }}">
                        </div>
                    </div>

                    <div class="col-6 float-right">
                        <div class="col text-right">
                            <label for="name">Codigo <strong># {{ $codigoDelPaciente }}</strong> </label>
                        </div>
                        <div class="col text-right">
                            <label for="name">Fecha <strong> 03-20-2020</strong> </label>
                        </div>
                    </div>

                    
                </div>

                <div class="row m-1 p-3" style="border: dashed 1px gray;">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="dob">Fecha de Nacimiento <b class="text-danger">*</b></label>
                            <input name="dob" type="date" class="form-control my-input-bg @error('dob') is-invalid @enderror"
                                placeholder="Fecha" value="{{ old('dob') }}">
                                
                        </div>
                        <div class="form-group">
                            <label for="email">Correo <b class="text-danger">*</b></label>
                            <input name="email" type="email" class="form-control my-input-bg @error('email') is-invalid @enderror"
                                placeholder="Correo" value="{{ old('email') }}">
                                
                        </div>
                        <div class="form-group">
                            <label for="">Edad <b class="text-danger">*</b></label>
                            <input class="form-control" type="text" name="edad" id="edad">
            
                        </div>
                    </div>
                    <div class="col-6">
                        <form action="">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Brazos (cm) <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="brazos" id="brazos" required="" autofocus="">
                                </div>
                    
                                <div class="form-group col-md-4">
                                    <label for="">Espalda (cm) <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="espalda" id="espalda">
                    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Busto (cm) <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="busto" id="busto">
                    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Cintura (cm) <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="cintura" id="cintura">
                    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Cadera (cm) <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="cadera" id="cadera">
                    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Piernas (cm) <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="piernas" id="piernas">
                    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Peso Inicial <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="peso_inicial" id="peso_inicial">
                    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">% Grasa Corporal <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="grasa_corporal" id="grasa_corporal">
                    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">% Grasa visceral <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="grasa_visceral" id="grasa_visceral">
                    
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="">% Índice Masa Corporal (IMC) <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="indice_masa_corporal" id="indice_masa_corporal">
                    
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="">% Masa Muscular <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="masa_muscular" id="masa_muscular">
                    
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Talla (cm) <b class="text-danger">*</b></label>
                                    <input class="form-control" type="text" name="talla" id="talla">
                    
                                </div>
                                
                            </div>
                            
                            
                            
            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success d-print-none">Guardar Datos</button>
                            </div>
            
                            @csrf
                        </form>
                    </div>
                </div>

                <div class="row m-1 p-3" style="border: dashed 1px gray;">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="scroll">
                                <div class="panel panel-default panel-table">
                                    <div class="panel-heading">
                                        <h4>Patrón de Menú</h4>
                                    </div>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Hora</th>
                                                <th>Opción 1</th>
                                                <th>Opción 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    AYUNAS y a las 4:00 p.m.
                                                </td>
                                                <td>
                                                    1 tz de te verde con te quema grasa
                                                </td>
                                                <td>
                                                    1 tz de te verde con te quema grasa
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    DESAYUNO: 7:00 a.m.
                                                </td>
                                                <td>
                                                    1 1/2 tz de leche 0% con 1 tz de melón con 2 cdas de granola, licuar. 2 tz de papaya en cuadritos con 1 cdita de miel.
                                                </td>
                                                <td>
                                                    1 1/2 tz de leche 0% con 1 tz de papaya con 2 cdas de avena integral con 1 cdita de miel. Licuar. 2 barras de galleta de linaza.

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    MERIENDA: 10:00 a.m.
                                                </td>
                                                <td>
                                                    1 manzana verde.
                                                </td>
                                                <td>
                                                    1 manzana gala
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    ALMUERZO: 12:00 m.d

                                                </td>
                                                <td>
                                                    1 1/2 tz de ensalada de lechuga con espinacas y zanahoria rallada, chile dulce, pizca de sal y limon. 1 1/2 filete de Pescado al vapor.

                                                </td>
                                                <td>
                                                    1 1/2 tz de brócoli con coliflor y zanahoria al vapor con 1 cdita de aceite de oliva. 1 1/2 filete de pollo a la plancha.

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    MERIENDA: 3:00 p.m
                                                </td>
                                                <td>
                                                    1 galleta de macadamia
                                                </td>
                                                <td>
                                                    1 galleta de soda integral.
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    CENA: 6:00 p.m.
                                                </td>
                                                <td>
                                                    1 1/2 tz de jugo de toronja con papaya. Licuar. 2 tz de melón con 2 cdas de kiwi en cuadritos y 1 cda de miel, mezclar con 2 cdas de granola, 1/2 tz de yogurt de fresa.

                                                </td>
                                                <td>
                                                    1 1/2 tz de leche 0% con 1 tz de melocotón, licuar con 2 cdas de granola. 2 tz de sandia con pina y 1 cda de miel.

                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                @csrf
            </form>
        </div>
        
    </div>
</div>
@endsection
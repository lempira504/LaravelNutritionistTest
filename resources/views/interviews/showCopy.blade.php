@extends('layouts.master')

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
            <form action="{{ route('entrevistas.store') }}" method="post">
                <?php $date = Carbon\Carbon::parse($appointment->date); ?>
                @csrf
                <div class="row m-1 p-3" style="border: dashed 1px gray;">
                    <div class="col-12" >
                        <h3>Informacion General</h3>
                        <hr>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Paciente:
                                  <strong>  {{ $appointment->name }}</strong><br>
                                  
                                  Fecha de Cita: {{ $date->isoFormat('L') }} <br>
                                  Hora: {{ $appointment->hour->time }} <br>
                                  Tel: {{ $appointment->phone }} <br>
                                  Correo: {{ $appointment->email ?? 'No' }}
                              </div>
                              <div class="col-sm-4 invoice-col">
                                Código #:
                                  <strong>  {{ $appointment->code }}</strong><br>
                                  Fecha de Hoy: {{ date('d/m/Y') }} <br>
                              </div>
                              <div class="col-sm-4 invoice-col">
                                Creado Por:
                                  <strong>  {{ $appointment->user->name }}</strong><br>
                                  Correo: {{ $appointment->user->email }} <br>
                              </div>
                        </div>
                        
                    </div>
                    {{-- <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="row invoice-info">
                                    <div class="col-12 invoice-col">
                                        Paciente:
                                          <strong>  {{ $appointment->name }}</strong><br>
                                          Fecha de Cita: {{ $appointment->date }} <br>
                                          Telefono: {{ $appointment->phone }} <br>
                                          Correo: {{ $appointment->email ?? 'No' }}
                                      </div>
                                </div>
                            </div>
                            

                        </div>
                    </div> --}}

                    {{-- <div class="col-6 float-right">
                        <div class="row invoice-info">
                            <div class="col-12 invoice-col">
                                Codigo #:
                                  <strong>  {{ $appointment->code }}</strong><br>
                                  Codigo #: {{ $appointment->date }} <br>
                                  Fecha de Hoy: {{ date('d-m-Y') }} <br>
                              </div>
                        </div>
                    </div> --}}

                    


                </div>
                
                

                FIXME:
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="h2 text-success">Datos Personales Aqui</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-3 m-1 p-3" style="border:1px dashed gainsboro;">

                                <strong><i class="fa fa-id-card mr-1" style="color:#758184;"> </i></strong> {{ $appointment->code }}
                                <hr>

                                <strong><i class="fa fa-user-alt mr-1" style="color:#758184;"></i> </strong> {{ $appointment->name }}
                                <hr>

                                <strong><i class="fa fa-calendar-alt mr-1" style="color:#758184;"></i></strong> {{ $date->isoFormat('L') }}
                                <hr>

                                <strong><i class="fas fa-clock mr-1" style="color:#758184;"></i> </strong> {{ $appointment->hour->time }}
                                <hr>

                                <strong><i class="fas fa-phone-alt mr-1" style="color:#758184;"></i> </strong> {{ $appointment->phone }}
                                <hr>
                                
                                
                            </div>

                            <div class="col-3 m-1 text-center p-1" style="border:1px dashed gainsboro;">
                                
                                <div>
                                    <img class="img-fluid mx-auto p-2" src=" {{ asset('/img/mabel.jpeg') }} " alt="User profile picture" style="width: 50%;">
                                </div>
                                <hr>
                                {{-- <div class="p-3 mt-2">
                                    
                                    <input type="file" name="photo">
                                    <button class="btn btn-primary mt-3" type="submit">Ver Imagen</button>
                                </div> --}}
                                
                            </div>

                            {{-- Beings the form for data ----------------------------------------------}}
                            <div class="col-5 m-1 p-3" style="border:1px dashed gainsboro;">
                       
                                <div class="form-group">
                                    <label for="dob">Fecha de Nacimiento <b class="text-danger">*</b></label>
                                    <input name="dob" type="date"
                                        class="form-control my-input-bg @error('dob') is-invalid @enderror"
                                        placeholder="Fecha" value="{{ old('dob') }}" autofocus>
                                        {{-- <input name="code" type="hidden" class="form-control" value="{{ $appointment->code }}"> --}}
                                        <input name="appointment_id" type="hidden" class="form-control" value="{{ $appointment->id }}">

                                </div>
                                <div class="form-group">
                                    <label for="email">Correo <b class="text-danger">*</b></label>
                                    <input name="email" type="email"
                                        class="form-control my-input-bg @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}"
                                        placeholder="Correo">

                                </div>
                                <div class="form-group">
                                    <label for="">Edad <b class="text-danger">*</b></label>
                                    <input class="form-control my-input-bg @error('age') is-invalid @enderror"
                                    value="{{ old('age') }}" type="text" name="age" id="age" placeholder="Edad">

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 py-3">
                                

                                <div class="row ">
                                    <div class="col-12">
                                        <hr>
                                        
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Brazos <b class="text-danger">*</b></label>
                                            <input class="form-control my-input-bg @error('brazos') is-invalid @enderror"
                                                value="{{ old('brazos') }}" type="text" name="brazos" id="brazos" placeholder="cms">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Espalda<b class="text-danger">*</b></label>
                                            <input class="form-control my-input-bg @error('espalda') is-invalid @enderror"
                                                value="{{ old('espalda') }}" type="text" name="espalda" id="espalda" placeholder="cms">

                                        </div>
                                        <div class="form-group">
                                            <label for="">Busto<b class="text-danger">*</b></label>
                                            <input class="form-control my-input-bg @error('busto') is-invalid @enderror"
                                                value="{{ old('busto') }}" type="text" name="busto" id="busto" placeholder="cms">

                                        </div>
                                        <div class="form-group">
                                            <label for="">Cintura<b class="text-danger">*</b></label>
                                            <input class="form-control my-input-bg @error('cintura') is-invalid @enderror"
                                                value="{{ old('cintura') }}" type="text" name="cintura" id="cintura" placeholder="cms">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Cadera<b class="text-danger">*</b></label>
                                            <input class="form-control my-input-bg @error('cadera') is-invalid @enderror"
                                                value="{{ old('cadera') }}" type="text" name="cadera" id="cadera" placeholder="cms">

                                        </div>
                                        <div class="form-group">
                                            <label for="">Piernas<b class="text-danger">*</b></label>
                                            <input class="form-control my-input-bg @error('piernas') is-invalid @enderror"
                                                value="{{ old('piernas') }}" type="text" name="piernas" id="piernas" placeholder="cms">

                                        </div>
                                        <div class="form-group">
                                            <label for="">Peso Inicial <b class="text-danger">*</b></label>
                                            <input class="form-control my-input-bg @error('peso_inicial') is-invalid @enderror"
                                                value="{{ old('peso_inicial') }}" type="text" name="peso_inicial" id="peso_inicial"
                                                placeholder="cms">

                                        </div>
                                        <div class="form-group">
                                            <label for="">Grasa Corporal <b class="text-danger">*</b></label>
                                            <input class="form-control my-input-bg @error('grasa_corporal') is-invalid @enderror"
                                                value="{{ old('grasa_corporal') }}" type="text" name="grasa_corporal" id="grasa_corporal"
                                                placeholder="cms">

                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Grasa visceral <b class="text-danger">*</b></label>
                                            <input class="form-control my-input-bg @error('grasa_visceral') is-invalid @enderror"
                                                value="{{ old('grasa_visceral') }}" type="text" name="grasa_visceral" id="grasa_visceral"
                                                placeholder="cms">

                                        </div>
                                        <div class="form-group">
                                            <label for="">IMC <b class="text-danger">*</b></label>
                                            <input class="form-control my-input-bg @error('indice_masa_corporal') is-invalid @enderror"
                                                value="{{ old('indice_masa_corporal') }}" type="text" name="indice_masa_corporal"
                                                id="indice_masa_corporal" placeholder="cms">

                                        </div>
                                        <div class="form-group">
                                            <label for="">Masa Muscular <b class="text-danger">*</b></label>
                                            <input class="form-control my-input-bg @error('masa_muscular') is-invalid @enderror"
                                                value="{{ old('masa_muscular') }}" type="text" name="masa_muscular" id="masa_muscular"
                                                placeholder="cms">

                                        </div>
                                        <div class="form-group">
                                            <label for="">Talla<b class="text-danger">*</b></label>
                                            <input class="form-control my-input-bg @error('talla') is-invalid @enderror"
                                                value="{{ old('talla') }}" type="text" name="talla" id="talla" placeholder="cms">

                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success d-print-none float-right">Guardar</button>
                                </div>


                            </div>

                            {{-- Ends the form for data ----------------------------------------------}}

                            
                            
                        </div>
                                
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>

               

                <div class="row m-1 p-3" style="border: dashed 1px gray;">

                    <div class="col-6">
                       
                                <div class="form-group">
                                    <label for="dob">Fecha de Nacimiento <b class="text-danger">*</b></label>
                                    <input name="dob" type="date"
                                        class="form-control my-input-bg @error('dob') is-invalid @enderror"
                                        placeholder="Fecha" value="{{ old('dob') }}" autofocus>
                                        {{-- <input name="code" type="hidden" class="form-control" value="{{ $appointment->code }}"> --}}
                                        <input name="appointment_id" type="hidden" class="form-control" value="{{ $appointment->id }}">

                                </div>
                                <div class="form-group">
                                    <label for="email">Correo <b class="text-danger">*</b></label>
                                    <input name="email" type="email"
                                        class="form-control my-input-bg @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}"
                                        placeholder="Correo">

                                </div>
                                <div class="form-group">
                                    <label for="">Edad <b class="text-danger">*</b></label>
                                    <input class="form-control my-input-bg @error('age') is-invalid @enderror"
                                    value="{{ old('age') }}" type="text" name="age" id="age" placeholder="age">

                                </div>

                    </div>
                    
                    
                    <div class="col-12 py-3" style="border-top: dashed 1px gray;">
                        <h3>Datos Personales</h3>
                    </div>

                    <div class="col-12">

                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="">Brazos <b class="text-danger">*</b></label>
                                <input class="form-control my-input-bg @error('brazos') is-invalid @enderror"
                                    value="{{ old('brazos') }}" type="text" name="brazos" id="brazos" placeholder="cms">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="">Espalda<b class="text-danger">*</b></label>
                                <input class="form-control my-input-bg @error('espalda') is-invalid @enderror"
                                    value="{{ old('espalda') }}" type="text" name="espalda" id="espalda" placeholder="cms">

                            </div>
                            <div class="form-group col-md-2">
                                <label for="">Busto<b class="text-danger">*</b></label>
                                <input class="form-control my-input-bg @error('busto') is-invalid @enderror"
                                    value="{{ old('busto') }}" type="text" name="busto" id="busto" placeholder="cms">

                            </div>
                            <div class="form-group col-md-2">
                                <label for="">Cintura<b class="text-danger">*</b></label>
                                <input class="form-control my-input-bg @error('cintura') is-invalid @enderror"
                                    value="{{ old('cintura') }}" type="text" name="cintura" id="cintura" placeholder="cms">

                            </div>
                            <div class="form-group col-md-2">
                                <label for="">Cadera<b class="text-danger">*</b></label>
                                <input class="form-control my-input-bg @error('cadera') is-invalid @enderror"
                                    value="{{ old('cadera') }}" type="text" name="cadera" id="cadera" placeholder="cms">

                            </div>
                            <div class="form-group col-md-2">
                                <label for="">Piernas<b class="text-danger">*</b></label>
                                <input class="form-control my-input-bg @error('piernas') is-invalid @enderror"
                                    value="{{ old('piernas') }}" type="text" name="piernas" id="piernas" placeholder="cms">

                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Peso Inicial <b class="text-danger">*</b></label>
                                <input class="form-control my-input-bg @error('peso_inicial') is-invalid @enderror"
                                    value="{{ old('peso_inicial') }}" type="text" name="peso_inicial" id="peso_inicial"
                                    placeholder="cms">

                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Grasa Corporal <b class="text-danger">*</b></label>
                                <input class="form-control my-input-bg @error('grasa_corporal') is-invalid @enderror"
                                    value="{{ old('grasa_corporal') }}" type="text" name="grasa_corporal" id="grasa_corporal"
                                    placeholder="cms">

                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Grasa visceral <b class="text-danger">*</b></label>
                                <input class="form-control my-input-bg @error('grasa_visceral') is-invalid @enderror"
                                    value="{{ old('grasa_visceral') }}" type="text" name="grasa_visceral" id="grasa_visceral"
                                    placeholder="cms">

                            </div>
                            <div class="form-group col-md-2">
                                <label for="">IMC <b class="text-danger">*</b></label>
                                <input class="form-control my-input-bg @error('indice_masa_corporal') is-invalid @enderror"
                                    value="{{ old('indice_masa_corporal') }}" type="text" name="indice_masa_corporal"
                                    id="indice_masa_corporal" placeholder="cms">

                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Masa Muscular <b class="text-danger">*</b></label>
                                <input class="form-control my-input-bg @error('masa_muscular') is-invalid @enderror"
                                    value="{{ old('masa_muscular') }}" type="text" name="masa_muscular" id="masa_muscular"
                                    placeholder="cms">

                            </div>
                            <div class="form-group col-md-2">
                                <label for="">Talla<b class="text-danger">*</b></label>
                                <input class="form-control my-input-bg @error('talla') is-invalid @enderror"
                                    value="{{ old('talla') }}" type="text" name="talla" id="talla" placeholder="cms">

                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success d-print-none">Guardar</button>
                        </div>


                    </div>
                </div>


            </form>
        </div>

    </div>

</div>
@endsection





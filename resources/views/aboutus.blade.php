@extends('layouts.app')

@section('title', "Quienes Somos")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <img class="text-center" src="{{ asset('img/logo.png') }}" alt="" width="100%">
        </div>
        <div class="col-md-5">


            <div class="row">
                <div class="col-12">
                    <h1 style="color:#19bc9d; font-weight: bold;">¿Quiénes Sómos?</h1>

                    <hr>
                </div>
                {{-- <div class="col-md-12">
                  <h2>NORMA GARCÍA CHÁVEZ</h2>
                  <p>Dra. en Nutrición Clínica y Dietoterapia <br>
                    Especialista en niños y adultos <br>
                    Graduada en U.S.J. Costa Rica.</p>
                </div>
  
                <div class="col-md-12">
                  <p style="font-size:12px;">Bo. Independencia<br> Blvd. 15 de Septiembre
                    <br>Frente a Financiera Popular Ceibeña
                    <br>La Ceiba, Atlántida
                    <br>Tel: (504) 2443-0514 / 3315-2308
                  </p>
                </div> --}}
            </div>

            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <h2>NORMA GARCÍA CHÁVEZ</h2>
                        <p style="font-size:18px;">Dra. en Nutrición Clínica y Dietoterapia <br>
                            Especialista en niños y adultos <br>
                            Graduada en U.S.J. Costa Rica.</Dra.>
                    </div>

                    <div class="col-md-12">
                        {{-- <p style="font-size:15px;">Bo. Independencia<br> Blvd. 15 de Septiembre
                                <br>Frente a Financiera Popular Ceibeña
                                <br>La Ceiba, Atlántida
                                <br>Tel: (504) 2443-0514 / 3315-2308
                            </p> --}}
                        <address>
                            <strong>CLÍNICA DE NUTRICIÓN INTEGRAL</strong><br>
                            Bo. Independencia<br> Blvd. 15 de Septiembre
                            <br>Frente a Financiera Popular Ceibeña
                            <br>La Ceiba, Atlántida<br>
                            <abbr title="Phone">Tel:</abbr>(504) 2443-0514 / 3315-2308
                        </address>
                        <address>
                            <strong>Full Name</strong><br>
                            <a href="mailto:#">mailto@somedomain.com</a>
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-success" href=" {{ route('contactos.create') }} ">Escribenos</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

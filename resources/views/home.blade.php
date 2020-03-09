@extends('layouts.app')

@section('content')
<div class="container">

    <!-- CLÍNICA DE NUTRICIÓN INTEGRAL -->
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="display-4 text-center" style="color: #8cba51;">CLÍNICA DE NUTRICIÓN INTEGRAL</h1>
                </div>
                <div class="col-md-4 pt-2 pb-2">
                    <img src="img/logo.png" alt="" width="100%">
                </div>

                <div class="col-md-4">
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
            
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <hr>
                    <h4 class="text-capitalize" style="color:#19bc9d; font-weight: bold;">preparamos tu almuerzo</h4>
                    <h5>Prescrito en tu Plan Nutricional</h5>
                    <p>Solicitalo antes de las 10:00 a.m.
                        <br>Cel: (504) 3315-2308
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <hr>
                    <h4 class="text-capitalize" style="color:#19bc9d; font-weight: bold;">Informacion</h4>
                    <h5>Prescrito en tu Plan Nutricional</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut asperiores magnam blanditiis dignissimos 
                        numquam officiis officia quos architecto fuga cum nostrum debitis et error, similique, itaque adipisci 
                        facere dolores eum assumenda. Eos facilis cum voluptates officiis ratione quasi, quibusdam temporibus.
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <hr>
                    <h4 class="text-capitalize" style="color:#19bc9d; font-weight: bold;">Informacion</h4>
                    <h5>Prescrito en tu Plan Nutricional</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut asperiores magnam blanditiis dignissimos 
                        numquam officiis officia quos architecto fuga cum nostrum debitis et error, similique, itaque adipisci 
                        facere dolores eum assumenda. Eos facilis cum voluptates officiis ratione quasi, quibusdam temporibus.
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <hr>
                    <h4 class="text-capitalize" style="color:#19bc9d; font-weight: bold;">Informacion</h4>
                    <h5>Prescrito en tu Plan Nutricional</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut asperiores magnam blanditiis dignissimos 
                        numquam officiis officia quos architecto fuga cum nostrum debitis et error, similique, itaque adipisci 
                        facere dolores eum assumenda. Eos facilis cum voluptates officiis ratione quasi, quibusdam temporibus.
                    </p>
                </div>
            </div>


            <!-- CLÍNICA DE NUTRICIÓN INTEGRAL Segundo contenido -->

            <!-- Starts carosel -->
            <div class="row justify-content-center pt-4">

                <div class="col-10">
                    <div class="col-12">
                        <hr>
                        <p style="font-size: 3em; color: #8cba51;" class="text-center">NUESTROS CLIENTES</p>
                    </div>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block h-100 m-auto" src="http://via.placeholder.com/640x360" alt="">
                                <p class="py-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur
                                    dolorum quaerat corporis, cupiditate, eaque,
                                    voluptate quis sunt nemo illo consequuntur odio enim eveniet. Deleniti veniam et
                                    quia natus atque sint.</p>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block h-100 m-auto" src="http://via.placeholder.com/640x360" alt="">
                                <p class="py-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur
                                    dolorum quaerat corporis, cupiditate, eaque,
                                    voluptate quis sunt nemo illo consequuntur odio enim eveniet. Deleniti veniam et
                                    quia natus atque sint.</p>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block h-100 m-auto" src="http://via.placeholder.com/640x360" alt="">
                                <p class="py-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur
                                    dolorum quaerat corporis, cupiditate, eaque,
                                    voluptate quis sunt nemo illo consequuntur odio enim eveniet. Deleniti veniam et
                                    quia natus atque sint.</p>

                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only text-dark">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>


            </div>
</div>
    @endsection

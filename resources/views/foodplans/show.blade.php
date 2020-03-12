<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ $appointment->code }} </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('/admin-lte/dist/css/adminlte.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('/admin-lte/plugins/fontawesome-free/css/all.min.css') }} ">

    <link href="https://fonts.googleapis.com/css?family=Fresca" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

    {{-- Style CSS --}}
    <style type="text/css">
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Fresca', 'Open Sans', sans-serif;
        }

        .table-wrapper {
            /*                width: 1000px;*/
            /* margin: 30px auto; */
            background: #fff;
            padding: 30px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }

        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }

        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }

        .table-title .add-new i {
            margin-right: 4px;
        }

        table.table {
            table-layout: fixed;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:last-child {
            width: 100px;
        }

        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }

        table.table td a.add {
            color: #27C46B;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }

        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }

        table.table .form-control.error {
            border-color: #f50000;
        }

        table.table td .add {
            display: none;
        }

        label {
            font-weight: bold;
        }

        /*            No print*/
        @media print {

            .no-print,
            .no-print *,
            span,
                {
                display: none !important;
            }

            .table-wrapper {
                margin: -40px;
            }

            .form-control {
                border: 0;
                padding: 0;
                overflow: visible;

            }

            .input-group-addon {
                border: 0;
            }

            .input {
                background-color: none;

            }


        }

        /* Heber Style for Borders */
        .my-border-style {
            border: 1px solid rgba(0, 0, 0, .1);
        }

        .my-border-style-inside {
            border-bottom: 1px solid rgba(0, 0, 0, .1);
        }

    </style>
    {{-- Ends Style CSS --}}


    {{-- Script --}}
    <script type="text/javascript">
        $(document).ready(function() {

            $('[data-toggle="tooltip"]').tooltip();

            //                var actions = $("table td:last-child").html();

            // Append table with add row form on add new button click
            $(".add-new").click(function() {
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();

                var patron = $('.patron-de-menu option:selected').val();
                var opcion_1 = $('.opcion_1 option:selected').val();
                var opcion_2 = $('.opcion_2 option:selected').val();

                var row =
                    '<tr>' +
                    '<td><p name="name"> ' + patron + '</p></td>' +
                    '<td><p name="name"> ' + opcion_1 + '</p></td>' +
                    '<td><p name="name"> ' + opcion_2 + '</p></td>' +
                    '<td class="no-print d-print-none">' +
                    '<a class="add d-print-none" title="Agregar" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
                    // '<a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +  
                    '<a class="delete d-print-none" title="Borrar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>' +
                    '</td>' +
                    '</tr>';
                $("table").append(row);
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();
            });
            // Add row on add button click
            $(document).on("click", ".add", function() {
                var empty = false;
                //                    var input = $(this).parents("tr").find('input[type="text"]');
                var input = $(this).parents("tr").find('input[type="select"]');


                input.each(function() {
                    if (!$(this).val()) {
                        $(this).addClass("error");
                        empty = true;
                    } else {
                        $(this).removeClass("error");
                    }
                });

                $(this).parents("tr").find(".error").first().focus();
                if (!empty) {
                    input.each(function() {
                        $(this).parent("td").html($(this).val());
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                }
            });

            // Edit row on edit button click
            $(document).on("click", ".edit", function() {
                $(this).parents("tr").find("td:not(:last-child)").each(function() {
                    $(this).html('<input type="text" class="form-control" value="' + $(this)
                        .text() + '">');
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").attr("disabled", "disabled");
            });

            // Delete row on delete button click
            $(document).on("click", ".delete", function() {
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            });

        });

        function myFunction() {
            window.print();
        }

    </script>
    {{-- Ends Script --}}

</head>

<body>
    <section class="content">

        <div class="container">
            {{-- Invoice --}}

            <div class="invoice p-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <h1>
                            Plan de Alimentación Personalizado

                            {{-- <small class="float-right pt-2">Fecha: {{ Carbon\Carbon::now()->day }}-{{ Carbon\Carbon::now()->month  }}-{{ Carbon\Carbon::now()->year  }}</small> --}}

                        </h1>

                    </div>
                    <!-- /.col -->
                </div>


                <!-- info row -->
                <div class="row invoice-info">
                    <?php  
                // $interview = App\Interview::where('appointment_id', $appointment->id)->first(); ?>
                    {{-- Informacion de Doctora --}}
                    @include('foodplans.includes.doctorInfo')
                    {{-- /Datos de Doctora --}}


                    {{-- Informacion de Paciente --}}
                    @include('foodplans.includes.patientInfo')
                    {{-- /Datos de Paciente --}}

                    <div class="col invoice-col">

                        <b class="text-capitalize">Fecha: {{ Carbon\Carbon::now()->day }} {{ Carbon\Carbon::now()->monthName  }} {{ Carbon\Carbon::now()->year  }}</b><br>
                        <br>
                        <b>Código:</b> {{ $appointment->code }} <br>

                    </div>
                    <!-- /.col -->

                    <div class="col">
                        <img class="float-right" src=" {{ asset('/img/logo.png') }} " alt="" width="150px">
                    </div>

                </div>
                <!-- /.row -->


                {{-- Detalles de Paciente --}}
                <div class="row py-3">
                    <div class="col-12">

                        <h2 class="h1 lead"> Evaluación Nutricional </h2>
                        <hr>

                    </div>
                    <!-- /.col -->
                    <div class="col-12">
                        <div class="d-flex">

                            <div class="col my-border-style">
                                <label class="p-1" for="">Paciente</label>
                                <hr class="row mt-0 mb-0">
                                <label class="p-1" for="">{{ $appointment->name }}</label>

                            </div>

                            <div class="col my-border-style">

                                <label class="p-1" for="">Edad</label>
                                <hr class="row mt-0 mb-0">
                                <label class="p-1" for="">{{ $appointment->interview->age }}</label>
                            </div>

                            <div class="col my-border-style">

                                <label class="p-1" for="">Peso Ideal</label>
                                <hr class="row mt-0 mb-0">
                                <label class="p-1" for="">86</label>
                            </div>

                            <div class="col my-border-style">

                                <label class="p-1" for="">Peso Ajustado</label>
                                <hr class="row mt-0 mb-0">
                                <label class="p-1" for="">86</label>
                            </div>

                            <div class="col my-border-style">

                                <label class="p-1" for="">Req. Mínimo</label>
                                <hr class="row mt-0 mb-0">
                                <label class="p-1" for="">86</label>
                            </div>

                            <div class="col my-border-style">

                                <label class="p-1" for="">Req. Máximo</label>
                                <hr class="row mt-0 mb-0">
                                <label class="p-1" for="">86</label>
                            </div>

                            <div class="col my-border-style">

                                <label class="p-1" for="">Talla</label>
                                <hr class="row mt-0 mb-0">
                                <label class="p-1" for="">{{ $appointment->interview->talla }}</label>
                            </div>

                        </div>


                    </div>
                    <!-- /.col -->



                </div>



                <div class="row py-3">
                    <div class="col-12">

                        <h2 class="h1 lead"> Evaluación Antropométrica </h2>
                        <hr>

                    </div>
                    <!-- /.col -->
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"> <i class="fa fa-user-circle mr-2" style="font-size:100%;"></i> {{ $appointment->name }}</h3>

                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Cintura (cm):
                                    {{ $appointment->interview->cintura }}
                                </li>
                                <li class="list-group-item">
                                    % Grasa Corporal:
                                    26.9%
                                </li>

                                <li class="list-group-item">
                                    % P/T:
                                    115%
                                </li>

                                <li class="list-group-item">
                                    IMC:
                                    28
                                </li>

                                <li class="list-group-item">
                                    Cintura (cm):
                                    {{ $appointment->interview->cintura }}
                                </li>

                                <li class="list-group-item">
                                    Cadera (cm):
                                    {{ $appointment->interview->cadera }}
                                </li>

                                <li class="list-group-item">
                                    Piernas (cm):
                                    {{ $appointment->interview->piernas }}
                                </li>

                                <li class="list-group-item">
                                    Busto (cm):
                                    {{ $appointment->interview->busto }}
                                </li>

                                <li class="list-group-item">
                                    Brazos (cm):
                                    {{ $appointment->interview->brazos }}
                                </li>

                                <li class="list-group-item">
                                    Espalda (cm):
                                    {{ $appointment->interview->espalda }}
                                </li>

                            </ul>
                        </div>

                    </div>
                    <!-- /.col -->

                    <div class="col-9">


                        <div class="row">
                            <div class="col-9">
                                <!-- /.col -->
                                <div class="callout callout-info d-print-block">
                                    {{-- link --}}
                                    {{-- https://www.cdc.gov/healthyweight/spanish/assessing/bmi/adult_bmi/english_bmi_calculator/bmi_calculator.html --}}
                                    <h5><i class="fas fa-info"></i> NOTA</h5>
                                    <label for="">Estatura:</label> {{ $appointment->interview->weigth }} mts
                                    <br>
                                    <label for="">Peso:</label> 193 libras

                                    <div class="text-muted text-justify">
                                        <p>
                                            Su IMC es (28.5), lo que indica que su peso está en la
                                            categoría de (Sobrepeso) para adultos de su misma estatura.
                                        </p>
                                        <p>
                                            Para su estatura, un peso normal variaría entre 125 y 169 libras.
                                        </p>

                                        <p>
                                            Toda persona que tenga sobrepeso debería tratar de evitar ganar más peso.
                                            Además, si usted tiene sobrepeso junto con otros factores de riesgo (como niveles altos de colesterol LDL,
                                            niveles bajos de colesterol HDL o hipertensión arterial), debería tratar de perder peso. Incluso una pequeña
                                            disminución (tan solo 10 % de su peso actual) puede ayudar a disminuir el riesgo de enfermedades.
                                            Hable con su proveedor de atención médica para establecer maneras adecuadas de perder peso.
                                        </p>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>

                            <div class="col-3 pl-2" style="border-left: dashed 1px rgba(0,0,0,.1);">
                                <p class="lead">IMC, Nivel de peso</p>

                                <div class="d-flex flex-column">
                                    <div>
                                        <label>0 - 18.5</label> <i class="fa fa-arrow-right" style="font-size:80%;"></i> Peso Bajo
                                    </div>

                                    <div>
                                        <label>18.5 - 24.9</label> <i class="fa fa-arrow-right" style="font-size:80%;"></i> Peso Normal
                                    </div>

                                    <div>
                                        <label>25.0 - 29.9</label> <i class="fa fa-arrow-right" style="font-size:80%;"></i> Sobrepeso
                                    </div>

                                    <div>
                                        <label>30.0 o más</label> <i class="fa fa-arrow-right" style="font-size:80%;"></i></i> Obeso
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



                <p style="page-break-after: always;">&nbsp;</p>
                <p style="page-break-before: always;">&nbsp;</p>

                <div class="row">
                    {{-- <p style="page-break-after: always"> --}}
                    <!-- .col -->
                    <div class="col-12">


                        {{-- <h2>Ejemplo de Menú</h2>
                    <hr> --}}
                        <h2 class="h1 lead"> Ejemplo de Menú </h2>
                        <hr>
                        <p>
                            Deberá realizar una opción de menú diferente cada DÍA, siguiendo sus respectivos tiempos de
                            comidas.
                            <b style="text-decoration: underline">NO COMER LA MISMA OPCIÓN TODOS LOS DÍAS</b>
                            y no mezclar las opciones ya que alterará el metabolismo. Seguir las recomendaciones del
                            análisis
                            nutricional.
                        </p>

                    </div>
                    <!-- /.col -->

                    <div class="col-12">

                        <div class="row d-print-none justify-content-center">
                            {{-- <div class="col-md-12 mt-2" style="background-color:#ffe196;">
                            <h3 class="mt-2 "><i class="fa fa-cutlery fa-sm" aria-hidden="true"></i> Pratrón de Menú </h3>
                        </div> --}}

                            <div class="col-8">
                                <label for="">Pratrón de Menú <b class="text-danger">*</b></label>
                                <select class="form-control patron-de-menu">
                                    <option value="" disabled selected hidden>Patrón de menú</option>
                                    <option></option>
                                    @foreach ($portions as $portion )
                                    <option> {{ $portion->time }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-8">
                                <br>
                                <label for="">Opción 1 <b class="text-danger">*</b></label>
                                <select class="form-control opcion_1">
                                    <option value="" disabled selected hidden> Opción 1 </option>
                                    @foreach ($portions as $portion)
                                    <option>{{ $portion->option1 }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-8">
                                <br>
                                <label for="">Opción 2 <b class="text-danger">*</b></label>
                                <select class="form-control opcion_2">
                                    <option value="" disabled selected hidden>Opción 2</option>

                                    @foreach ($portions as $portion)
                                    <option> {{ $portion->option2 }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-8 py-3">

                                <button type="button" class="btn btn-success add-new no-print add-plan float-right"><i class="fa fa-plus"></i> Agregar</button>
                            </div>

                        </div> <!--     Wrapper       -->
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:20%">Patrón de menú</th>
                                        <th class="block">Opción 1</th>
                                        <th class="block">Opción 2</th>
                                        <th class="no-print d-print-none"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>


                    <div class="col-12">
                        <button type="button" class="btn btn-primary pull-right d-print-none" style="margin-right: 5px;" onclick="myFunction()">
                            <i class="fas fa-download"></i> Guardar PDF
                        </button>
                    </div>





                </div>
                {{-- End Invoice --}}



            </div>
    </section>


    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script> --}}

    <!-- jQuery -->
    <script src=" {{ asset('/admin-lte/plugins/jquery/jquery.min.js') }} "></script>
    <!-- Bootstrap 4 -->
    <script src=" {{ asset('/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <!-- AdminLTE App -->
    <script src=" {{ asset('/admin-lte/dist/js/adminlte.min.js') }} "></script>

</body>

</html>

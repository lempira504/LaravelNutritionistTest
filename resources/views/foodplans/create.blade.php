<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plan de Paciente</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Fresca" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

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
    </style>


    <script type="text/javascript">
        $(document).ready(function () {

            $('[data-toggle="tooltip"]').tooltip();
            
            //                var actions = $("table td:last-child").html();

            // Append table with add row form on add new button click
            $(".add-new").click(function () {
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
            $(document).on("click", ".add", function () {
                var empty = false;
                //                    var input = $(this).parents("tr").find('input[type="text"]');
                var input = $(this).parents("tr").find('input[type="select"]');


                input.each(function () {
                    if (!$(this).val()) {
                        $(this).addClass("error");
                        empty = true;
                    } else {
                        $(this).removeClass("error");
                    }
                });

                $(this).parents("tr").find(".error").first().focus();
                if (!empty) {
                    input.each(function () {
                        $(this).parent("td").html($(this).val());
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                }
            });

            // Edit row on edit button click
            $(document).on("click", ".edit", function () {
                $(this).parents("tr").find("td:not(:last-child)").each(function () {
                    $(this).html('<input type="text" class="form-control" value="' + $(this)
                        .text() + '">');
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").attr("disabled", "disabled");
            });

            // Delete row on delete button click
            $(document).on("click", ".delete", function () {
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            });

        });
    </script>

</head>

<body>
    <div class="container">
        <div class="p-3 table-wrapper">
            <div class="row">
                
                <div class="col-md-12 pb-3 text-right d-print-none mt-5">
                    <a class="btn btn-success btn-sm" href=" {{ route('citas.index') }}  ">Regresar</a>
                    <div class="mt-2" style="height:3px; background-color:#ffe196;"></div>
                </div>

                <div class="col-8 text-left pt-5">
                    <h3>PLAN DE ALIMENTACIÓN <b>PERSONALIZADO</b></h3>
                    <hr>

                    <div class="row">
                        <div class="col-md-6 d-flex-column">
                            <div>
                                <b>Dra. Norma Garcia Chávez/Nutricionista</b>
                            </div>

                            <div>
                                CNDH: <b>2013-0013</b>
                            </div>

                            <div class="pt-2">
                                Paciente: <b>Heber Pavon</b>
                            </div>

                            <div>
                                Código: <b>NG-LCB98293887773</b>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex-column text-right">
                    <div>
                        {{-- <img src="https://via.placeholder.com/150" alt="" height="120px;"> --}}
                        <img src="{{ asset('img/logo.png') }}" alt="" height="120px;">
                        
                    </div>

                    <div class="pt-2">
                        Fecha: 25 Nov 2017
                        <br>
                        Control: 31 Nov 2017
                    </div>

                </div>

            </div>
            
            <div class="row pt-3">
                <div class="col-md-12">
                    <hr>
                    <p>
                        Deberá realizar una opción de menú diferente cada DÍA, siguiendo sus respectivos tiempos de
                        comidas.
                        <b style="text-decoration: underline">NO COMER LA MISMA OPCIÓN TODOS LOS DÍAS</b> 
                        y no mezclar las opciones ya que alterará el metabolismo. Seguir las recomendaciones del análisis
                        nutricional.
                    </p>
                    {{-- <hr> --}}
                </div>
            </div>
            
            <div class="row d-print-none">
                <div class="col-md-12 mt-2" style="background-color:#ffe196;">
                    <h3 class="mt-2 "><i class="fa fa-cutlery fa-sm" aria-hidden="true"></i> Pratrón de Menú </h3>
                </div>

                <div class="col-md-8 pt-3">
                    <label for="">Pratrón de Menú <b class="text-danger">*</b></label>
                    <select class="form-control patron-de-menu">
                        <option value="" disabled selected hidden>Patrón de menú</option>
                        <option></option>
                        @foreach ($portions as $portion )
                            <option> {{ $portion->time }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-10">
                    <br>
                    <label for="">Opción 1 <b class="text-danger">*</b></label>
                    <select class="form-control opcion_1">
                        <option value="" disabled selected hidden> Opción 1 </option>
                        @foreach ($portions as $portion)
                            <option>{{ $portion->option1 }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-10 no-print">
                    <br>
                    <label for="">Opción 2 <b class="text-danger">*</b></label>
                    <select class="form-control opcion_2">
                        <option value="" disabled selected hidden>Opción 2</option>

                        @foreach ($portions as $portion)
                            <option> {{ $portion->option2 }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 no-print pt-3">
                    
                    <button type="button" class="btn btn-success add-new no-print add-plan"><i
                            class="fa fa-plus"></i> Agregar</button>
                </div>

            </div> <!--     Wrapper       -->

            <div class="row pt-3">
                <div class="col-md-12 mt-2 d-flex d-print-none" style="background-color:#ffe196;">
                    <h3 class="mt-2"><i class="fa fa-cutlery fa-sm" aria-hidden="true"></i> Plan de Alimentación </h3>
                </div>

                <div class="col-md-12 pt-4">
                    <div class="panel panel-default panel-table">
                        {{-- <div class="panel-heading no-print">
                            <h3>Plan de Alimentación</h3>
                        </div> --}}

                        {{-- <div style="height: 300px; overflow: scroll"> --}}
                        <div>

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

                </div>
            </div>

        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>

</body>

</html>
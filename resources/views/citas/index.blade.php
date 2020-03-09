@extends('layouts.app')

@section('title', 'Lista de Citas')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12 align-">
            <h1 class="text-success text-center">Lista de Citas</h1>

        </div>
    </div>

    <div class="row pb-5 justify-content-md-center">

        <div class="col-6 ">

            <form action="">
                @csrf
                <div class="form-group">
                    {{-- <p><i class="fa fa-search"></i> Buscar podía</p> --}}
                    <input class="form-control" type="text" placeholder="Buscar por día...">
                </div>
            </form>
        </div>
    </div>


    @if ($citas->count() > 0)


    <div class="row">


        <table class="table table-hover fixed_header">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Hora</th>
                    <th>Código</th>
                    <th>Fecha</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($citas as $cita)
                  <tr>
                  <td> <a href="/citas/{{ $cita->id }}/edit"> {{ $cita->name }}</a> </td>
                      <td> {{ $cita->time }} </td>
                      <td> <a href="/plans/{{ $cita->id }}">{{ $cita->code }}</a> </td>
                      <td> {{ $cita->date }} </td>
                      <td> {{ $cita->email }} </td>
                      <td> {{ $cita->phone }} </td>
                      <td> {{ $cita->address }} </td>
                      <td class="text-center"> <i class="fa fa-thumbs-up text-success fa-lg" title="Plan esta disponible"></i></td>
                  </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    @endif

</div>
@endsection
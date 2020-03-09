@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex align-items-baseline">
                  <div>
                        <h1>Crear Cita</h1>
                  </div>
                  <div class="pl-5">
                        <a href="" class="text-dark">Editar Cita</a>
                  </div>
            </div>

            <form action="">
                  <div class="form-group">
                        <label for="name">Nombre de Paciente:</label>
                        <input name="nombre" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input name="fecha" type="date" class="form-control">
                  </div>
                  <div class="form-group">
                        <label for="hora">Hora:</label>
                        <input name="hora" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input name="telefono" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <input name="direccion" type="text" class="form-control">
                  </div>
            </form>
            
        </div>
    </div>
</div>
@endsection
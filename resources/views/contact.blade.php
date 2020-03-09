@extends('layouts.app')

@section('title', "Contactenos")

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-8">
            <h1 style="color:#19bc9d; font-weight: bold;">Contáctenos</h1>
            <p class="hint-text text-capitalize" style="font-size: 15px; opacity: 0.6;">Nos encantaría escuchar su comentario o pregunta.</p>
        </div>

        <div class="col-8">
            <form action="/examples/actions/confirmation.php" method="post">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="font-weight-bold" for="inputName">Nombre <b class="text-danger">*</b></label>
                              <input type="text" class="form-control" id="inputName" autofocus>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="font-weight-bold" for="inputEmail">Correo <b class="text-danger">*</b></label>
                              <input type="email" class="form-control" id="inputEmail" >
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="font-weight-bold" for="inputPhone">Teléfono <b class="text-danger">*</b></label>
                              <input type="text" class="form-control" id="inputPhone" >
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="font-weight-bold" for="inputSubject">Asunto <b class="text-danger">*</b></label>
                      <input type="text" class="form-control" id="inputSubject" >
                  </div>
                  <div class="form-group">
                      <label class="font-weight-bold" for="inputMessage">Mensaje <b class="text-danger">*</b></label>
                      <textarea class="form-control" id="inputMessage" rows="5" ></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Enviar</button>
              </form>
        </div>
    </div>

</div>
@endsection
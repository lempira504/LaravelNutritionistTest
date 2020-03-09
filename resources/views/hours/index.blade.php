@extends('layouts.master')

@section('title', 'Nuestros Horarios')

@section('content')
<div class="container">

    {{-- <div class="row pt-3">
        <div class="col-12">
            <h1 style="color: rgb(25, 188, 157); font-weight: bold;">
                Nuestros Horarios
                <hr>
            </h1>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('flash-message')
        </div>
    </div> --}}

    <div class="card">
        <div class="card-header">
            <h1 class="card-title" style="color: rgb(25, 188, 157); font-weight: bold; font-size: 2.5em;">Lista de
                Horarios
            </h1>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            
            @foreach ($hours as $hour)
            <div class="row py-1 justify-content-md-center">
                <div class="col-4 d-flex">
                    <div class="pr-2">
                        <label for="">Creado por:</label>
                    </div>
                    <div class="text-muted">
                        {{ $hour->user->name }}
                        {{-- {{ $hour->patient->id }} --}}
                    </div>
                </div>
                <div class="col-4">
                    {{-- <a href="/horarios/{{ $hour->id }}/edit">{{ $hour->time }}</a> --}}
                    {{ $hour->time }}
                </div>


                <div class="col-2 d-flex">
                    <div class="pr-2">
                        {{-- <a class="btn btn-warning btn-sm" href="{{ route('horas.edit', $hour->id) }}"
                            data-toggle="modal" data-target="#editHour">Editar</a> --}}
                            {{-- <a class="btn btn-warning btn-sm" data-editId="sfd" data-toggle="modal" data-target="#editHour">Editar</a> --}}
                            <a class="btn btn-warning btn-sm" data-time=" {{ $hour->time }}" data-hourid=" {{ $hour->id }} " data-toggle="modal" data-target="#editHour">Editar</a>
                            
                    </div>
                    <div class="pr-2">
                        <form action="{{ route('horas.destroy', $hour->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Desea Eliminar Este Record?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- /.card-body -->
        <div class="card-footer">

            @include('hours.modal.hourModal')
        </div>
        <!-- /.card-footer-->
    </div>
</div>
@endsection

@section('script')
    <script>
        
        
        $('#editHour').on('show.bs.modal', function (event) {
            
            var button = $(event.relatedTarget); // Button that triggered the modal
            var hourid = button.data('hourid'); // Extract info from data-* attributes
            var time = button.data('time');
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            // modal.find('.modal-title').text('New message to ' + hourid);
            // modal.find('.modal-body #time').val(id);
            modal.find('.modal-body #time').val(time);
            modal.find('.modal-body #hour_id').val(hourid);

             
            
            
        });
        
        
    </script>
@endsection
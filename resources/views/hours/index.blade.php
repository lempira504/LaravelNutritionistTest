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
    
    {{-- {{ dd($errors->all()) }} --}}
    
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
            
            @forelse ($hours as $hour)
            <div class="row py-1 justify-content-md-center">
                <div class="col-4 d-flex">
                    {{-- <div class="pr-2">
                        <label for="">Creado por:</label>
                    </div> --}}
                    <div class="text-muted">
                        <i class="fas fa-user-edit mr-2"></i>{{ $hour->user->name }} <small > [{{ $hour->created_at->diffForHumans() }}] </small>
                        
                        
                    </div>
                </div>
                <div class="col-4">
                    {{-- <a href="/horarios/{{ $hour->id }}/edit">{{ $hour->time }}</a> --}}
                    <i class="far fa-clock mr-2"></i>{{ $hour->time }}
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
            @empty
            <h3 class="display-4">No hay Horarios</h3>
            @endforelse

        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createHour">
                        <i class="fa fa-plus"></i> Nuevo
                    </button>
                </div>
                {{-- <div class="col">
                    <div class="row justify-content-center">
                    {{ $hours->links() }}
                    </div>
                </div> --}}
                <div class="col">
                    <small class="float-right align-middle lead text-muted">{{ $todaysDate }}</small>
                </div>
            </div>

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
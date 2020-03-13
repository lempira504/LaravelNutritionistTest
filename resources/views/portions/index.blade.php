@extends('layouts.master')

@section('title', 'Patrones de Menú')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="pl-4" style="color: rgb(25, 188, 157); font-weight: bold;">Patrón de Menú</h1>
    </div>

    <div class="card-body">
        @if ($portions->count() > 0)
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="text-center role">
                    <th>Hora</th>
                    <th>Opción 1</th>
                    <th>Opción 2</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($portions as $portion)
                <tr role="row" class="even">
                    <td width="200px;">
                        {{ $portion->time }}
                    </td>
                    <td>
                        {{ $portion->option1 }}
                    </td>
                    <td>
                        {{ $portion->option2 }}
                    </td>
                    <td width="50px;">
                        <form action="{{ route('porciones.destroy', $portion->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('¿Desea Eliminar Este Record?')"> <span class="fa fa-trash-alt fa-fw"> </span> </button>

                        </form>
                        
                    </td>
                    <td width="50px;">
                        <a type="button" class="btn btn-warning btn-xs" data-edittime=" {{ $portion->time }}" data-editoption1=" {{ $portion->option1 }}" data-editoption2=" {{ $portion->option2 }}" data-edithourid=" {{ $portion->id }} " data-toggle="modal" data-target="#editPortion">Editar</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="display-4">No hay Porciones</h3>
        @endif
    </div>

    <div class="card-footer">
        <!-- Button trigger modal for creating Portions -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createPortion">
            <i class="fa fa-plus"></i> Nuevo
        </button>


        <div class="row justify-content-center">

            {{ $portions->links() }}
        </div>
        @include('portions.modal.create')
        @include('portions.modal.edit')

    </div>

</div>
@endsection

@section('script')
<script>
    $('#editPortion').on('show.bs.modal', function (event) {
       
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('edithourid');
        var time = button.data('edittime');
        var option1 = button.data('editoption1');
        var option2 = button.data('editoption2');

        var modal = $(this);
        //modal.find('.modal-title').text('New message to ' + editoption1);
         
         
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #time').val(time);
        modal.find('.modal-body #option1').val(option1);
        modal.find('.modal-body #option2').val(option2);
        
       
    });

</script>
@endsection

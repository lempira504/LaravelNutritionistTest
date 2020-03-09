@extends('layouts.master')

@section('title', 'Patrones de Menú')

@section('content')
<div class="card">
            <div class="card-header">
                <h1 class="pl-4" style="color: rgb(25, 188, 157); font-weight: bold;">Patrón de Menú</h1>
            </div>

            <div class="card-body">
                @if ($portions != null)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center role">
                            <th >Hora</th>
                            <th >Opción 1</th>
                            <th >Opción 2</th>
                            <th ></th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <div class="col-md-7 offset-md-1 p-3 d-flex-column">
                        <h1 class="pl-4" style="color:yellowgreen;">No Hay Porciones</h1>
                    </div>
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
    </div>

    </div>
@endsection
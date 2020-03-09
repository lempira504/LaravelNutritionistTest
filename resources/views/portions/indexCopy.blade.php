@extends('layouts.master')

@section('title', 'Patrones de Menú')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            <h1 class="pl-4" style="color: rgb(25, 188, 157); font-weight: bold;">Patrones de Menú</h1>
            <hr>
        </div>
    </div>
    
    <div class="row m-1">
        
        @if ($portions != null)

            @foreach ($portions as $portion)
           
            <div class="col-md-3 pb-3 pt-3">
                {{ $portion->time }}
            </div>
            <div class="col-md-4 pb-3 pt-3">
                {{ $portion->option1 }}
            </div>
            <div class="col-md-4 pb-3 pt-3">
                {{ $portion->option2 }}
            </div>
            <div class="col-md-1 pb-3 pt-3">
                <form action="{{ route('porciones.destroy', $portion->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea Eliminar Este Record?')"> <i class="fas fa-trash-alt"></i> </button>
                    
                </form>
            </div>
            <div class="col-12">
                <hr>
            </div>
            @endforeach
            
        @else
            <div class="col-md-7 offset-md-1 p-3 d-flex-column">
                <h1 class="pl-4" style="color:yellowgreen;">No Hay Porciones</h1>
            </div>
        @endif

    </div>

    <div class="card">
        <div class="card-header">
                <h1 class="pl-4" style="color: rgb(25, 188, 157); font-weight: bold;">Patrones de Menú</h1>
            </div>
        <div class="card-body">
            <div class="row">
                @if ($portions != null)

            @foreach ($portions as $portion)
           
            <div class="col-3 pb-3 pt-3">
                {{ $portion->time }}
            </div>
            <div class="col-4 pb-3 pt-3">
                {{ $portion->option1 }}
            </div>
            <div class="col-4 pb-3 pt-3">
                {{ $portion->option2 }}
            </div>
            <div class="col-1 pb-3 pt-3">
                <form action="{{ route('porciones.destroy', $portion->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('¿Desea Eliminar Este Record?')"> <span class="fa fa-trash "> </span> </button>
                    
                </form>
            </div>
            <div class="col-12">
                <hr>
            </div>
            @endforeach
            
        @else
            <div class="col-md-7 offset-md-1 p-3 d-flex-column">
                <h1 class="pl-4" style="color:yellowgreen;">No Hay Porciones</h1>
            </div>
        @endif
            </div>
        </div>

        <div class="card-footer">
            hello
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <hr>
        </div>
        {{ $portions->links() }}
    </div>

<div class="row">
        <div class="card">
            <div class="card-header">
                <h1 class="pl-4" style="color: rgb(25, 188, 157); font-weight: bold;">Patrón de Menú</h1>
            </div>
            <div class="card-body">
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
    </div>

    <div class="card-footer">
        <div class="row justify-content-center">
            {{ $portions->links() }}
        </div>
    </div>

    </div>
    </div>

</div>
@endsection
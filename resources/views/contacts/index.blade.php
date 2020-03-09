@extends('layouts.master')

@section('title', "Lista de Preguntas y Comentarios")

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12 pt-3">
            <h1 class="text-left" style="color: rgb(25, 188, 157); font-weight: bold;">Lista de Preguntas y Comentarios
            </h1>
            <hr>
            {{-- @include('flash-message') --}}
        </div>
    </div>

    @if (count($userComments) > 0)
        
    
    <div class="col">
        <div class="box box-primary">
            
            <!-- /.box-header -->
            <div class="box-body no-padding pt-3">
                
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <tbody>
                            @foreach ($userComments as $userComment)
                                <tr>
                                    
                                    <td class="mailbox-name"><a href=" {{ route('contactos.show', $userComment->id) }} "
                                        title="Ver Más Detalles">{{ $userComment->name }}</a></td>
                                    <td class="mailbox-subject "><b>{{ $userComment->title }}</b>
                                    </td>
                                    <td class="mailbox-attachment"></td>
                                    <td class="mailbox-date">
                                        <?php $created_at = Carbon\Carbon::parse($userComment->created_at);  ?>

                                        {{  $created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <form action="{{ route('contactos.destroy', $userComment->id ) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                            
                                            {{-- <input type="submit" class="btn btn-danger btn-sm" value="Borrar"
                                                onclick="return confirm('¿Desea Eliminar Este Record?')"> --}}
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea Eliminar Este Record?')"> <i class="far fa-trash-alt"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->
            </div>
           
        </div>
        <!-- /. box -->
    </div>

    <div class="row justify-content-center">
        <div class="col-12 pt-3 ">
            <hr>
        </div>

        {{ $userComments->links() }}

    </div>
    @else
    <div class="container" >
        <h3 class="display-4 lead">No hay Comentarios</h3>
    </div>
    @endif

</div>
@endsection

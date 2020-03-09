@extends('layouts.master')

@section('title', "Contactenos")

@section('content')
<div class="container">



    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h3 >Comentario</h3>
                    
                </div>
                <div class="card-body">

                    <div class="col-12 text-left py-3">
                        <div class="row">
                            <span class="pr-3">
                                {{ $contacto->name }}
                            </span>
                            
                            <span class="pl-3 pr-3" style="border-left:dashed 1px gray;">
                                {{ $contacto->phone }}
                            </span>
                            <span class="pl-3 pr-3" style="border-left:dashed 1px gray;">
                                <a href="mailto:{{ $contacto->email }}?subject={{$contacto->title}} "
                                    title="Responder a Usuario">{{ $contacto->email }}</a>
                            </span>
                            
                        </div>
                        <hr>
                    </div>
                    

                    

                    <h4 class="text-left">{{ $contacto->title }}</h4>
                    
                    <p class="card-text text-left">
                        {{ $contacto->description }}
                    </p>
                    
                    <p class="card-text text-left">
                        {{ $contacto->name }}
                    </p>

                   
                </div>
                <div class="card-footer">
                    <small class="float-left text-muted">
                        <?php $created_at = Carbon\Carbon::parse($contacto->created_at);  ?>

                        {{  $created_at->diffForHumans() }}
                    </small>

                    <i class="float-right pl-2">
                        <form action="{{ route('contactos.destroy', $contacto->id ) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm btn-block" onclick="return confirm('¿Desea Eliminar Este Record?')"> <i class="far fa-trash-alt"></i> Eliminar</button>
                        </form>
                    </i>
                    
                    <i class="float-right">
                        
                        <a class="btn btn-primary btn-sm btn-block" 
                            href="mailto:{{ $contacto->email }}?subject={{$contacto->title}} "
                            title="Responder a Usuario"><i class="far fa-envelope"></i> Responder</a>
                            
                    </i>

                    

                </div>

            </div>
        </div>
    </div>

</div>
@endsection
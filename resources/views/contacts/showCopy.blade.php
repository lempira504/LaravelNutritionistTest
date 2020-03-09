@extends('layouts.master')

@section('title', "Contactenos")

@section('content')
<div class="container">

    

    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card text-center">
                <div class="card-header">
                <h3 class="card-title">Compose New Message</h3>
              </div>
                <div class="card-body">
                    <div class="col-12">
                        <h3 class="card-title text-left"> {{ $contacto->title }} </h3>
                        <hr>
                    </div>

                    <div class="col-12 text-left pb-2">
                        <div class="row">
                            <span class="pl-3 pr-3" style="border-left:dashed 1px gray;">
                                {{ $contacto->name }}
                            </span>
                            <span class="pl-3 pr-3" style="border-left:dashed 1px gray;">
                                {{ $contacto->phone }}
                            </span>
                            <span class="pl-3 pr-3" style="border-left:dashed 1px gray;">
                                <a href="mailto:{{ $contacto->email }}?subject={{$contacto->title}} " title="Responder a Usuario">{{ $contacto->email }}</a>
                            </span>
                        </div>
                    </div>

                    <p class="card-text text-left">
                        {{ $contacto->description }}
                    </p>

                    <p class="card-text text-left">
                        <small class="text-muted">
                            <?php $created_at = Carbon\Carbon::parse($contacto->created_at);  ?>

                            {{  $created_at->diffForHumans() }}
                        </small>
                    </p>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {{-- <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-envelope"></i> Responder</button> --}}
                        <a class="btn btn-primary btn-sm" href="mailto:{{ $contacto->email }}?subject={{$contacto->title}} " title="Responder a Usuario"><i class="far fa-envelope"></i> Responder</a>
                    </div>
                    
                  </div>
                
            </div>
        </div>
    </div>

</div>
@endsection
@extends('layouts.master')

@section('title', 'Crear Porciones')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            <h1 class="pl-4" style="color: #19bc9d; font-weight: bold;">Patrón de Menú</h1>
        </div>
    </div>
    <hr>
    <div class="row" style="background-color: #ffffff;">
        <div class="col-md-6">
            
            {{-- @include('flash-message') --}}

            <form action='{{ route('porciones.store') }}' method='POST' class="p-3">
                @csrf
                <div class="form-group">
                    <label for="time">Hora <b class="text-danger">*</b></label>
                    <input name="time" type="text"
                        class="form-control my-input-bg @error('time') is-invalid @enderror"
                        value="{{ old('time') }}" placeholder="Hora" autofocus>

                </div>
                <div class="form-group">
                    <label for="option1">Opcion 1 <b class="text-danger">*</b></label>
                    <textarea name="option1" class="form-control my-input-bg @error('option1') is-invalid @enderror"
                        id="" cols="30" rows="5" placeholder="Opcion 1">{{ old('option1') }}</textarea>
                    {{-- @error('option1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <label for="option2">Opcion 2 <b class="text-danger">*</b></label>
                    <textarea name="option2" class="form-control my-input-bg @error('option2') is-invalid @enderror"
                        value="{{ old('option2') }}" id="" cols="30" rows="5"
                        placeholder="Opcion 2">{{ old('option2') }}</textarea>
                    {{-- @error('option2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <button class="btn btn-success float-right mb-4" type="submit">Guardar</button>
                </div>
            </form>
        </div>

        {{-- {{ dd($portions) }} --}}
        @if ($portions != null)
        <div class="col-md-6 p-3 d-flex-column">
            {{-- {{ dd($portions) }} --}}
            {{-- @foreach ($portions as $portion) --}}
            <label for="porciones"><strong>Hora</strong></label>
            <p>
                {{ $portions->time }}
            </p>

            <hr>
            <label for="opcion 1"><strong>Opcion 1</strong></label>
            <p>
                {{ $portions->option1 }}
            </p>

            <hr>
            <label for="opcion 2"><strong>Opcion 2</strong></label>
            <p>
                {{ $portions->option2 }}
            </p>
            {{-- @endforeach --}}
        </div>
        @else
        <div class="col-md-7 offset-md-1 p-3 d-flex-column">
            <h1 class="pl-4" style="color:yellowgreen;">No Hay Porciones</h1>
        </div>
        @endif


    </div>



</div>
@endsection
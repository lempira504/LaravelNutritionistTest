@extends('layouts.app')

@section('title', 'Buscar Fecha')

@section('content')
<div class="container">

    <div class="row pb-1">
        <div class="col-12">
            <h1 style="color: rgb(25, 188, 157); font-weight: bold;">
                Buscar Fecha y Horario Disponible
                <hr>
            </h1>
        </div>
    </div>

    {{-- Search Box --}}
    <div class="row pb-4">

        <div class="col-md-6 offset-md-3">
            <form action=" {{ route('buscar.create') }} " method="POST">
                <div class="form-group">
                    <label for="date">Buscar Horario Disponible</label>
                    <input name="date" id="date" type="date"
                        class="form-control my-input-bg @error('date') is-invalid @enderror" autofocus>
                    <div class="pt-3 text-right">

                        @csrf
                        <button type="submit" class="btn btn-success">Buscar</button>

                    </div>
                </div>
            </form>
        </div>

    </div>

    

</div>
@endsection

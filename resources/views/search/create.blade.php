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
            <form action=" {{ route('buscar.store') }} " method="POST">
                @csrf

                <div class="form-group">
                    <label for="date">Buscar Horario Disponible</label>
                    <input name="date" id="date" type="date"
                        class="form-control my-input-bg @error('date') is-invalid @enderror" autofocus>

                    <div class="pt-3 text-right">

                        <button type="submit" class="btn btn-success">Buscar</button>

                    </div>
                </div>

            </form>
        </div>

    </div>

    {{-- {{ dd(session()->all()) }} --}}
    <div class="row justify-content-center">

        <div class="col-md-6">
            <h4>Horarios</h4>
            <hr>

            <div class="d-flex">
                <?php $hours = App\Hour::all(); ?>

                @foreach ($hours as $hour)
                <div>
                    <div class="pl-3 pr-3">
                        <h4 class="text-success">
                            {{ $hour->time }}
                        </h4>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-6">




            @if(Session::has('appointments'))

                <div class="col">
                    @if (count(Session::get('appointments')) > 0)
                    <h4>Horas No Disponibles</h4>
                    <hr>
                    @endif
                </div>


            {{-- {{ Session::get('appointments') }} --}}

            <?php $appointments = session('appointments'); ?>
            <div class="d-flex">
                {{-- {{ dd(session()->all()) }} --}}
                @foreach($appointments as $appointment)
                <?php $hours = App\Hour::where('id', $appointment->hour_id)->get(); ?>
                {{-- <div>
                            <div class="pl-3 pr-3">
                                <h4 class="text-danger">
                                    {{ $appointment->date }}
                </h4>
            </div>
            </div> --}}

                @foreach ($hours as $hour)
                <div>
                    <div class="pl-3 pr-3">
                        <h4 class="text-danger">
                            {{ $hour->time }}
                        </h4>
                    </div>
                </div>

                @endforeach
            @endforeach
        </div>
    {{-- {{ dd($hours) }} --}}

    {{ Session::forget('appointments') }}
    {{ Session::save() }}

    @endif

</div>


</div>


{{-- <div class="row justify-content-center">
        <div class="d-flex">
            
            @if(Session::has('appointments'))
    
                @foreach($appointments as $appointment)
    
                    
                    
                    // $availableHours = App\Hour::where('id', '=', $appointment->hour_id )->get(); ?>
        
                    @foreach ($availableHours as $availableHour)
                    
                        <div>
                            <div class="pl-3 pr-3">
                                <h4 class="text-danger">
                                    {{ $availableHour->time }}
</h4>
</div>
</div>

@endforeach

@endforeach

@endif
</div>
</div> --}}

</div>
@endsection

@extends('layouts.master')

@section('title', 'Lista de Citas')


@section('content')
<div class="container">

    @include('includes.infocard')

    {{-- <div class="row">
        <div class="col-12">
            <h1 class="text-center" style="color: rgb(25, 188, 157); font-weight: bold;">Lista de Citas</h1>
            <hr>
        </div>
    </div> --}}



    <div class="card">

        <div class="card-header">
            <h1 class="card-title" style="color: rgb(25, 188, 157); font-weight: bold; font-size: 2.5em;">Lista de Citas
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
            
            
            @forelse ($appointments as $appointment)

            <?php  $interview = App\Interview::where('appointment_id', $appointment->id)->value('active'); ?>

            <div class="row pl-2 pr-2 py-1">
                <div class="col-3">
                    {{-- <a href=" {{ route('entrevistas.show', $appointment->id ) }} "
                        title="Crear Entrevista del Paciente Darle Click">{{ $appointment->code }}</a> --}}
                    
                    @if($interview)
                    <a href=" {{ route('entrevistas.show', $appointment->id ) }} "
                        title="Crear Entrevista del Paciente Darle Click">{{ $appointment->code }}</a>  
                    @else
                    <a href=" {{ route('entrevistas.interview', $appointment->id ) }} "
                        title="Crear Entrevista del Paciente Darle Click">{{ $appointment->code }}</a>  
                    @endif

                </div>

                <div class="col-2">
                    
                    <a class="text-success font-weight-bolder" href=" {{ route('planes.show', $appointment->id) }} "
                    title="Crear Plan del Paciente al Darle Click">{{ $appointment->name }}</a>
                    
                    
                </div>
                
                <div class="col-1 text-left text-muted">
                    
                    @if ($interview)
                    <i class="fa fa-user-check text-success"></i>
                    
                    @endif
                    
                </div>

                <div class="col text-capitalize"> {{ App\Helper::showDayMonthNameAndYearDate($appointment->date) }} - {{ $appointment->hour->time }} </div>
                
                
                {{-- <div class="col">{{ $appointment->created_at->diffForHumans() }}</div> --}}

                <div class="col-2">{{ $appointment->phone }}</div>

                <div class="col-1">
                    <form action="{{ route('citas.destroy', $appointment->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-xs"
                            onclick="return confirm('¿Desea Eliminar Este Registro?')">Eliminar</button>

                    </form>
                </div>
            </div>
            @empty
            <h3 class="display-4">No hay Citas</h3>
            @endforelse

        </div>
        
        <!-- /.card-footer-->
        <div class="card-footer clearfix">
            <div class="row justify-content-center">

                {{ $appointments->links() }}

            </div>
            <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#createAppointment"><i class="fas fa-plus"></i> Nuevo</button>

            @include('appointments.modal.create')
        </div>

    </div>

</div>
@endsection

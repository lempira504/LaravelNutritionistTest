<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createApp">
    <i class="fa fa-plus"></i> Nuevo
</button> --}}



<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Modal -->
            <div class="modal fade" id="createAppointment" tabindex="-1" role="dialog" aria-labelledby="createAppointmentTitle"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createAppointmentTitle">Crear Cita</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('citas.store') }}" method="post">
                            @csrf
                            <div class="modal-body">


                                @include('flash-message')
                                <div class="text-right">
                                    <h5 class="text-muted"># {{ $codigoDelPaciente }} </h5>
                                </div>

                                {{-- {{ Helper::showAlertMessageWhenUserDoesSomething($success, $message) }} --}}

                                <div class="form-group">
                                    <label for="name">Nombre de Paciente <b class="text-danger">*</b></label>
                                    <input name="name" type="text"
                                        class="form-control my-input-bg @error('name') is-invalid @enderror"
                                        placeholder="Nombre" value="{{ old('name') }}">
                                    <input name="code" type="hidden" class="form-control"
                                        value="{{ $codigoDelPaciente }}">
                                </div>

                                <div class="form-group">
                                    <label for="date">Fecha <b class="text-danger">*</b></label>
                                    <input name="date" type="date"
                                        class="form-control my-input-bg @error('date') is-invalid @enderror"
                                        placeholder="Fecha" value="{{ old('date') }}">

                                </div>


                                <div class="form-group">
                                    <label for="hour_id">Hora <b class="text-danger">*</b></label>
                                    <select name="hour_id" class="form-control @error('hour_id') is-invalid @enderror">

                                        @forelse($availableHours as $availableHour)
                                            <option value="{{ old('hour_id') ?? $availableHour->id }}">
                                                {{ $availableHour->time }}
                                            </option>
                                        @empty
                                            <option disabled >Ingrese Horarios</option>
                                        @endforelse 

                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="phone">Teléfono <b class="text-danger">*</b></label>
                                    <input name="phone" type="text"
                                        class="form-control my-input-bg @error('phone') is-invalid @enderror"
                                        placeholder="Teléfono" value="{{ old('phone') }}">
                                </div>

                                {{-- <div class="form-group">
                <button type="submit" class="btn btn-success btn-md">Guardar</button>
            </div> --}}

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
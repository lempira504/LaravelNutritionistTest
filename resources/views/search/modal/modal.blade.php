<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Buscar Horario Disponible</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                    <div class="container pt-4">
                        
                        <div class="row justify-content-center">
                            <div class="col-8">
                                @include('flash-message')
                                <form action=" {{ route('citas.store') }} " method="POST">
                                    @csrf

                                    <div class="form-group">
                                        {{-- <label for="date">Buscar Horario Disponible</label> --}}
                                        <input name="date" id="date" type="date"
                                            class="form-control my-input-bg @error('date') is-invalid @enderror"
                                            autofocus value=" {{ old('date') ?? '' }} ">

                                        <div class="pt-3 text-right">

                                            <button type="submit" class="btn btn-success">Buscar</button>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="container p-4">
                        {{-- {{ dd(session()->all()) }} --}}
                        <div class="row justify-content-center">

                            <div class="col-12">

                                @if(Session::has('appointments'))

                                <div class="col-12">
                                    @if (count(Session::get('appointments')) > 0)
                                    <h4>Horas No Disponibles</h4>
                                    <hr>
                                    @endif
                                </div>

                                <?php $appointments = session('appointments'); ?>

                                @foreach($appointments as $appointment)
                                
                                    <?php $hours = App\Hour::where('id', $appointment->hour_id)->get(); ?>

                                    @foreach ($hours as $hour)
                                    
                                    <div class="col-12">
                                        <h4 class="text-danger text-capitalize">
                                            {{ App\Helper::showDayMonthNameAndYearDate($appointment->date) . ' - ' . $hour->time }}
                                        </h4>
                                    </div>

                                    @endforeach
                                @endforeach
                                {{-- {{ dd($hours) }} --}}

                                {{-- {{ Session::forget('appointments') }}
                                {{ Session::save() }} --}}

                                @endif

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>



    

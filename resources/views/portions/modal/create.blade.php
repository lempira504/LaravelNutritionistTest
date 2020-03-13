
<!-- Add Hour -->
<div class="modal fade" id="createPortion" tabindex="-1" role="dialog" aria-labelledby="createPortionTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPortionTitle">Agregar Porción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
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
                        
                </div>
                <div class="form-group">
                    <label for="option2">Opcion 2 <b class="text-danger">*</b></label>
                    <textarea name="option2" class="form-control my-input-bg @error('option2') is-invalid @enderror"
                        value="{{ old('option2') }}" id="" cols="30" rows="5"
                        placeholder="Opcion 2">{{ old('option2') }}</textarea>
                        
                </div>
                <div class="form-group">
                    <button class="btn btn-success float-right mb-4" type="submit">Guardar</button>
                </div>
            </form>
            
        </div>
    </div>
</div>



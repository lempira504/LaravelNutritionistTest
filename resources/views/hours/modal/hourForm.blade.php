<div class="modal-body">
    <div class="form-group">
        <label for="time">Horario</label>
        <input name="hour_id" type="hidden" id="hour_id">
        <input id="time" name="time" type="text" class="form-control my-input-bg @error('time') is-invalid @enderror"
            placeholder="Nombre" value="{{ $hora->time ?? old('time') }}" autofocus>

    </div>
</div>
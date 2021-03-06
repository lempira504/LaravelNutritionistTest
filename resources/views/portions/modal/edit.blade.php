<!-- Add Portion -->
<div class="modal fade" id="editPortion" tabindex="-1" role="dialog" aria-labelledby="editPortionTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPortionTitle">Actualizar Porción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action='{{ route('porciones.update', 0) }}' method='POST' class="p-3">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <input name="id" id="id" type="hidden">
                        <label for="time">Hora <b class="text-danger">*</b></label>
                        <input name="time" type="text" class="form-control" id="time" placeholder="Hora" autofocus>

                    </div>
                    <div class="form-group">
                        <label for="option1">Opcion 1 <b class="text-danger">*</b></label>
                        <textarea name="option1" class="form-control" id="option1" cols="30" rows="5" placeholder="Opcion 1"></textarea>
                        
                    </div>
                    <div class="form-group">
                        <label for="option2">Opcion 2 <b class="text-danger">*</b></label>
                        <textarea name="option2" class="form-control" id="option2" cols="30" rows="5" placeholder="Opcion 2"></textarea>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-success float-right mb-4" type="submit">Actualizar</button>
                    </div>
                </form>
            </div>

            

        </div>
    </div>
</div>




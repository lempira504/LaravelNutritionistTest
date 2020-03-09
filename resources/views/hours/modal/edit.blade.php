<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editHour">
      <i class="fa fa-plus"></i> Nuevo
   </button> --}}
   
   
   
   <!-- Modal -->
   <div class="modal fade" id="editHour" tabindex="-1" role="dialog" aria-labelledby="editHourTitle"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="editHourTitle">Editar</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               {{-- <form action="{{ route('horas.update', $hora->id) }}" method="post"> --}}
                <form  method="post" id="update">
                @csrf
                @method('PATCH')

                @include('hours.modal.hourForm')


                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit"  class="btn btn-success btn-md">Actualizar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>

            </form>
           </div>
       </div>
   </div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Editar Trabajador</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="form-edit-tb">
            <input type="hidden" class="form-control" id="id_tb_e" name="id_tb_e">
            <label for="">Cedula:</label>
               <input type="text" class="form-control" id="cedulau" name="cedulau">
            <label for="">Nombre:</label>
               <input type="text" class="form-control" id="nameu" name="nameu">
            <label for="">Apellido:</label>
                <input type="text" class="form-control" id="apellidou" name="apellidou">
            <label for="">Email:</label>
                 <input type="text" class="form-control" id="emailu" name="emailu">
            <label for="">Contacto:</label>
                <input type="text" class="form-control" id="contactou" name="contactou">
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="update"  class="btn btn-primary ">Guardar Cambios</button>
  
        </div>
      </div>
    </div>
  </div>
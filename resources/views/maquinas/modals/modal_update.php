<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Nueva Maquina</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
        <div class="modal-body">
        <input  class="form-control" placeholder="Marca de la maquina" type="hidden" id="id_maq" ></input>
            <label>Placa:</label>
            <input  class="form-control" placeholder="Placa de la maquina" type="text" id="placau" ></input>
            <label>Marca:</label>
            <input  class="form-control" placeholder="Marca de la maquina" type="text" id="marcau" ></input>
            <label>Modelo:</label>
            <input  class="form-control" placeholder="Modelo de la maquina"type="text"  id="modelou" ></input>
            <label>Cilindraje:</label>
            <input  class="form-control" placeholder="Cilindraje de la maquina" type="text" id="cilindrajeu" ></input>
            <label>Motor:</label>
            <input  class="form-control" placeholder="Motor de la maquina" type="text" id="motoru" ></input>
            <label>Chasis:</label>
            <input  class="form-control" placeholder="Chasis de la maquina" type="text" id="chasisu" ></input>
        </div>
        <div class="modal-footer">
          <button type="button" id="update"  class="btn btn-primary ">Guardar Cambios</button>
  
        </div>
        </form>
      </div>
    </div>
  </div>
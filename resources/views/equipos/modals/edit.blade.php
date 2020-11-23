<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Equipo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <label>Ingrese el numero de integrantes del nuevo equipo</label>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccione el numero de integrantes</label>
                <select id="selecte" onchange="caseOptions1()" class="form-control" >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                </select>
            </div>
          @verbatim
         <input id="id_eq" type="text"></input>
        <div  id="select1e"  class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select  class="form-control" id="s1e">
                <option v-for="usuario of usuarios" >{{usuario.id}}-{{usuario.nombre}} {{usuario.apellido}}</option>
                
                </select>
            </div>
            <div id="select2e" style="display:none;"class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select   class="form-control" id="s2e">
                <option  v-for="usuario of usuarios" >{{usuario.id}}-{{usuario.nombre}} {{usuario.apellido}}</option>
                </select>
            </div>
            <div id="select3e"  style="display:none;" class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select   class="form-control" id="s3e">
                <option  v-for="usuario of usuarios">{{usuario.id}}-{{usuario.nombre}} {{usuario.apellido}}</option>
                </select>
            </div>

        </div>
        @endverbatim

        <div class="modal-footer">
          <button type="button" @click="update()"  class="btn btn-primary ">Guardar Cambios</button>
  
        </div>
      </div>
    </div>
  </div>
 
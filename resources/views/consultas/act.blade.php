<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLongTitle">Actividades </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>

          </button>
        </div>

        <div class="modal-body">
        @verbatim

           <div v-for="actividades of actividades">
               <p>{{actividades.act_tb}}</p>
           </div>
           @endverbatim

        </div>
        <div class="modal-footer">
  
        </div>
      </div>
    </div>
  </div>
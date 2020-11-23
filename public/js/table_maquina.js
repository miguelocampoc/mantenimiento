import  {sweetalert2 } from './alerts_script.js'
import {Ajax} from './ajax.js';
var ax= new Ajax();
var sweet= new sweetalert2();
var index="api/maquinas";
var insert="api/maquinas/create";
var update="api/maquinas/update";
//var drop="api/maquinas/drop";

    $( "#btninsert" ).click(function() {
        $("#placa").val("");
        $("#marca").val("");
        $("#modelo").val("");
        $("#cilindraje").val("");
        $("#motor").val("");
        $("#chasis").val("");

        $("#insert").modal({backdrop: "static"});       
        $('#insert').modal('show');



     });
     $( "#create" ).click(function() {
      let placa= $('#placa').val();

       let marca= $('#marca').val();
       let modelo= $('#modelo').val();
       let cilindraje= $('#cilindraje').val();
       let motor= $('#motor').val();
       let chasis= $('#chasis').val();
       if(placa!="" && modelo!="" && cilindraje!="" && motor!="" && chasis!=""){
       let parametros={"placa":placa,"marca":marca,"modelo":modelo,"cilindraje":cilindraje,"motor":motor,"chasis":chasis}
        ax.ajax_create(insert,parametros);
        $('#insert').modal('hide');
       }
       else{
           sweet.danger();
       }
        
     });
     
     
     $( "#update" ).click(function() {
         let id= $("#id_maq").val();
         let placa= $("#placau").val();
         let marca= $('#marcau').val();
         let modelo= $('#modelou').val();
         let cilindraje= $('#cilindrajeu').val();
         let motor= $('#motoru').val();
         let chasis= $('#chasisu').val();
         if(placa!="" && modelo!="" && cilindraje!="" && motor!="" && chasis!=""){
          let parametros={"id":id,"placa":placa,"marca":marca,"modelo":modelo,"cilindraje":cilindraje,"motor":motor,"chasis":chasis};
          ax.ajax_update(update,parametros);
           $('#edit').modal('hide');
         }
         else{
            sweet.danger();
         }
      });
     
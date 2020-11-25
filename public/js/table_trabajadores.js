import  {sweetalert2 } from './alerts_script.js'
import {Ajax} from './ajax.js';
var ax= new Ajax();
var sweet= new sweetalert2();
var insert="api/usuarios/create";
var update="api/usuarios/update";
//var drop="api/maquinas/drop";

    $( "#btninsert" ).click(function() {
        $('#cedulai').val("");
        $('#namei').val("");
        $('#apellidoi').val("");
        $('#emaili').val("");
        $('#contactoi').val("");
        $("#insert").modal({backdrop: "static"});       
        $('#insert').modal('show');



     });
     $( "#create" ).click(function() {
       var nombre= $('#namei').val();
       var apellido= $('#apellidoi').val();
       var email= $('#emaili').val();
       var contacto= $('#contactoi').val();
       var cedula= $('#cedulai').val();

       if(cedula!="" && nombre!="" && apellido!="" && email!= "" && contacto !=""){
        let parametros={"cedula":cedula,"name":nombre,"apellido":apellido,"email":email,"contacto":contacto};
        ax.ajax_create(insert,parametros);
        $('#insert').modal('hide');
       }
       else{
         sweet.danger();
       }
       
     
        
     });


     $( "#update" ).click(function() {
       let id= $("#id_tb_e").val();
       let cedula= $('#cedulau').val();
       let nombre= $("#nameu").val();
       let apellido= $('#apellidou').val();
       let email= $('#emailu').val();
       let contacto= $('#contactou').val();
       if(cedula!="" && nombre!="" && apellido!="" && email!= "" && contacto !=""){
        let parametros={"id":id, "cedula":cedula,"nombre":nombre,"apellido":apellido,"email":email,"contacto":contacto};
        ax.ajax_update(update,parametros);
        $('#edit').modal('hide');
        }
        else{
          sweet.danger();

        }       
    
 
     });

 
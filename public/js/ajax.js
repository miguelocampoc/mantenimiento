 import {sweetalert2} from './alerts_script.js';
  var sweet= new sweetalert2();
export class Ajax{
ajax_create(url,parametros){
    $.ajax({
        type: "POST",
        url: url,
        data: parametros,
        success: function (response) {
            console.log(response);
        
            sweet.insert();
            var table = $('#table_id').DataTable();
            table.ajax.reload();
            
        }
    });
}
ajax_update(url,parametros){
    
   
    $.ajax({type: "POST",url: url,data: parametros,success: function (response) {
        sweet.update();
        var table = $('#table_id').DataTable();
        table.ajax.reload();
            
          
        }
    });
   
}


}
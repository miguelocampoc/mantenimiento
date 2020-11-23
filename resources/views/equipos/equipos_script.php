<script>
   
index="api/usuarios";
insert="api/equipos/create";
lequipos="api/equipos";
drop="api/equipos/drop";
update="api/equipos/update";
 casei="1";
  function caseOptions(){
       select= $('#select').val();

        switch (select) {
            case "1":
                $("#select2").hide();
                $("#select3").hide();
                $("#select1").show();
                casei="1";
                break;
                
            case "2":
                $("#select2").show();
                $("#select3").hide();
                casei="2";
                break;
            case "3":
                $("#select1").show();
                $("#select2").show();
                $("#select3").show();
                casei="3";


                 break;

            default:

                 break;
            }
  }
  function caseOptions1(){
       select1= $('#selecte').val();
        switch (select1) {
            case "1":
                $("#select2e").hide();
                $("#select3e").hide();
                $("#select1e").show();
                casei="1";
                break;
                
            case "2":
                $("#select2e").show();
                $("#select3e").hide();
                casei="2";
                break;
            case "3":
                $("#select1e").show();
                $("#select2e").show();
                $("#select3e").show();
                casei="3";


                 break;

            default:

                 break;
            }
            
  }

 function ainsert(parametros){
        axios.post(insert,parametros).then(response =>{
            console.log(response);
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Registro exitoso',
            showConfirmButton: false,
            timer: 1500
            })
            this.equipos=response.data;
             
            $('#insert').modal('hide');

            });


    }
    
 function aupdate(parametros){
        axios.post(update,parametros).then(response =>{
            console.log(response);
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Edicion exitosa',
            showConfirmButton: false,
            timer: 1500
            })
            this.equipos=response.data;
             
            $('#edit').modal('hide');
              
            });

    }
  function datatable(){
      
    $(document).ready( function () {
    $('#table_id').DataTable({
      searching: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No hay registros",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ total de registros)",
            "search":         "Buscar:",
            "paginate": {
                "first":      "First",
                "last":       "Last",
                "next":       "Siguiente",
                "previous":   "Anterior"
           },
        }

    });
      } )
      
  }
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    usuarios:[],
     equipos:[],
  },
  methods:{
  

    insert:function(){
        s1=$('#s1e').val();
        s2=$('#s2e').val();
        s3=$('#s3e').val();
      
        if(casei=="1"){
           parametros={'s1':s1,'s2':'N/D','s3':'N/D'};
          ainsert(parametros);
          this.reload();
        }
        if(casei=="2"){
            parametros={'s1':s1,'s2':s2,'s3':'N/D'};
            ainsert(parametros);
            this.reload();

        }
        if(casei=="3"){
          parametros={ 's1':s1,'s2':s2,'s3':s3};
            ainsert(parametros);
            this.reload();

        }
        
        /*
        var dataString = $('#form-insert-tb').serialize();
        axios.post(insert,dataString).then(response =>{
           console.log(response.data);
           this.usuarios=response.data;
           Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Registro exitoso',
            showConfirmButton: false,
            timer: 1500
         })
           $('#insert').modal('hide');

        });
        */
     },
     
     btninsert:function(){
       $("#insert").modal({backdrop: "static"});       
       $('#insert').modal('show');
     },
     update:function(){
        id= $('#id_eq').val();
        s1=$('#s1e').val();
        s2=$('#s2e').val();
        s3=$('#s3e').val();
        if(casei=="1"){
           parametros={'id':id,'s1':s1,'s2':'N/D','s3':'N/D'};
          aupdate(parametros);
          this.reload();
        }
        if(casei=="2"){
            parametros={'id':id,'s1':s1,'s2':s2,'s3':'N/D'};
            aupdate(parametros);
            this.reload();

        }
        if(casei=="3"){
          parametros={ 'id':id,'s1':s1,'s2':s2,'s3':s3};
            aupdate(parametros);
            this.reload();

        }
         /*
        var dataString = $('#form-edit-tb').serialize();

      axios.post(update,dataString).then(response =>{

          console.log(response);
          this.usuarios=response.data;
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Edicion exitosa',
            showConfirmButton: false,
            timer: 1500
         })
           $('#edit').modal('hide');

        });
       */
     },
        
    btneditar:function(id){ 
        $('#id_eq').val(id);
        $('#edit').modal('show');

    },
     caseop:function(){ 
        caseOptions(i1,i2,i3);
       },
   btndrop:function(id){
                        const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success ml-2',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                        title: '¿Estas seguro de Eliminar este registro?',
                        text: " ¿Deseas eliminar este registro?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Si, Eliminar',
                        cancelButtonText: 'No, Cancelar!</div>',
                        reverseButtons: true
                        }).then((result) => {
                        if (result.isConfirmed) {
                            axios.post(drop,{"id":id}).then(response =>{
                                console.log(response);
                                this.equipos=response.data;

                                });
                            swalWithBootstrapButtons.fire(
                            'Eliminado!',
                            'Su registro ha sido borrado exitosamente',
                            'success'
                            )
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                           
                        }
                        })
                        },
                        reload:function(){
                            axios.post(lequipos).then(response =>{
                            console.log(response.data);
                            this.equipos=response.data;
                           // datatable();

                            });
                        },
   
  },
                        created:function(){
                            axios.post(index).then(response =>{
                            console.log(response.data);
                            this.usuarios=response.data;
                           });
                           axios.post(lequipos).then(response =>{
                           console.log(response.data);
                           this.equipos=response.data;
                           datatable();

                             });
                        },
   
})

</script>
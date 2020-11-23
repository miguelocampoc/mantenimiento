<script>
    index="api/usuarios";
    insert="api/usuarios/create";
    update="api/usuarios/update";
    drop="api/usuarios/drop";

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
  },
  methods:{
    insert:function(){
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
     },
     btninsert:function(){
       $("#insert").modal({backdrop: "static"});       
       $('#insert').modal('show');
     },
     update:function(){
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
       
     },

    btneditar:function(id,nombre,apellido,email,contacto){ 
     $('#id_tb_e').val(id);
      $('#nameu').val(nombre);
     $('#apellidou').val(apellido);
      $('#emailu').val(email);
      $('#contactou').val(contacto);
      $('#edit').modal('show');

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
                                this.usuarios=response.data;

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
                        listarMoviles:function(){
                            axios.post(index).then(response =>{
                            console.log(response.data);
                            this.usuarios=response.data;
                            datatable();

                            });
                        },
   
  },
  created:function(){
       this.listarMoviles();
  },
   
})

</script>
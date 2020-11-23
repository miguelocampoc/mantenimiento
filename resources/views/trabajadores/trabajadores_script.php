<script>

  
var index="api/usuarios";
var drop="api/usuarios/drop";
 function datatable(){
        
            $('#table_id').DataTable(
                {
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
                    },
                    "ajax":{
                        "processing": true,
                        "url":index,
                        "dataSrc":""
                        }
                    ,
                    "columns": [
                        { "data": "id" },
                        { "data": "cedula" },
                        { "data": "nombre" },
                        { "data": "apellido" },
                        { "data": "email" },
                        { "data": "contacto" },
                        { "defaultContent": "<button type='button'  onclick='btnedit()' class='btn btn-primary mr-2 ' ><i class='fas fa-pen-alt'></i></button><button type='button' onclick='btndrop()' class='btn btn-danger ' ><i class='fas fa-trash'></i></button>" },
            
                    ]
            
                }
        
            );

      
    }  
    datatable();
  

    function btnedit(){
        var i=0;
            var table = $('#table_id').DataTable();
            $('#table_id tbody').on( 'click', 'tr', function () {
            if(i==0){
              let data= table.row( this ).data();
              console.log(data);
              $('#id_tb_e').val(data.id);
              $('#cedulau').val(data.cedula);
              $('#nameu').val(data.nombre);
              $('#apellidou').val(data.apellido);
              $('#emailu').val(data.email);
              $('#contactou').val(data.contacto);
              $("#edit").modal({backdrop: "static"});       
              $('#edit').modal('show');  
              i++;
            }   
            } );


    }

    function btndrop(){
    var i=0;
        var table = $('#table_id').DataTable();
        $('#table_id tbody').on( 'click', 'tr', function () {
        if(i==0){
          let data= table.row( this ).data();
             sweetdrop(data.id);
          i++;

        }
          
        } );

  }
  
  function sweetdrop(id){
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
                          $.ajax({type: "POST",url: drop,data: {"id":id},success: function (response) {
                                   var table = $('#table_id').DataTable();
                                    table.ajax.reload();
                                    
                                }
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

  }






    </script>
<script>
    var index="api/orden";
    var drop="/api/ordenes/drop";
    datatable();


    $('#tb1select').val("");
    $('#tb2select').val("");
    $('#tb3select').val("");

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
                  
            
                }
        
            );

      
    } 
    function caseOptions(){
       
        var id=$('#select').val();
        $('#id_maq').val(id);
        
    }
    function ontb1(){
     let tb1= $('#tb1select').val();
     let tb2= $('#tb2select').val();
     let tb3= $('#tb3select').val();
      if(tb1==tb2 || tb1==tb3 ){
          if(tb1!=""){
         $('#tb1select').prop('selectedIndex',0);
         danger();
          }

      }
      if(tb1!=""){
            $('#act_tb1').show();
        }
        else{
            $('#act_tb1').hide();

        }
      
    }
    function ontb2(){
    let tb1= $('#tb1select').val();
    let tb2= $('#tb2select').val();
    let tb3= $('#tb3select').val();
        if(tb2==tb1 || tb2==tb3 ){
            if(tb2!=""){
                    $('#tb2select').prop('selectedIndex',0);
                    danger();    
                    }
            }
            if(tb2!=""){
            $('#act_tb2').show();
            }
            else{
            $('#act_tb2').hide();

            }
    }

    
    function ontb3(){
     let tb1= $('#tb1select').val();
     let tb2= $('#tb2select').val();
     let tb3= $('#tb3select').val();
        if(tb3==tb1 || tb3==tb2 ){
              if(tb3!=""){
                 $('#tb3select').prop('selectedIndex',0);
                danger();
              }
            
            }    
      
        if(tb3!=""){
            $('#act_tb3').show();
            }
            else{
            $('#act_tb3').hide();

            }
        
    
        
    }
            


  function btndrop(id){
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
                            $.ajax({
                                        type: "POST",
                                        url: drop,
                                        data: {id:id},
                                        success: function (response) {
                                            console.log(response);
                                            
                                        }
                                    });
                            swalWithBootstrapButtons.fire(
                            'Eliminado!',
                            'Su registro ha sido borrado exitosamente',
                            'success'
                            )
                            location.reload();

                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                           
                        }
                        })
  
   
                       
   
  }
   function danger(){
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'No puedes seleccionar el mismo trabajador',
            showConfirmButton: false,
            timer: 1500
            });
      }
















</script>
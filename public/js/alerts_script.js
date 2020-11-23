
export class sweetalert2{
     
    constructor(){
      }
      insert(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Registro exitoso',
            showConfirmButton: false,
            timer: 1500
            });
      }
     drop(url,id){
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
    }
   
     update(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Edicion exitosa',
            showConfirmButton: false,
            timer: 1500
            })
     }

     danger(){
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Por favor rellene todos los campos',
            showConfirmButton: false,
            timer: 1500
            });
      }



}

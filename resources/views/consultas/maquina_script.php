<script>
  var consult="/api/consultas/maquina";
  var actividades="/api/consultas/actividades";

var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    consulta:[],
    actividades:[],
  },
  methods:{
    actividad:function(id){
      //alert(id);
      axios.post(actividades,{"id":id}).then(response =>{
            this.actividades=response.data;
             console.log(this.actividades);
             $("#insert").modal({backdrop: "static"});       
             $('#insert').modal('show');
        });
              
    },
      btnconsult:function(){
       let fecha= $('#fecha').val();
       let maquina= $('#maquina').val();
       let select= $('#selectdate').val();
    
    
        axios.post(consult,{"filtrar":select,"fecha":fecha,"maquina":maquina}).then(response =>{
            this.consulta=response.data;
            if(this.consulta.length!=0){
              console.log(this.consulta);
               $("#table_maquina").show();
                }
            else{
              $("#table_maquina").hide();
                danger();
            }
        });
 
    }
          
  },
  created:function(){
  },
   
})

function danger(){
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'No se encontraron resultados',
            showConfirmButton: false,
            timer: 1500
            });
      }


    
</script>
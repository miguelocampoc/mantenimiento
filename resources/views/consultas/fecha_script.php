<script>
    var consult="/api/consultas/fecha";
    var actividades="/api/consultas/actividades";
    var app = new Vue({
  el: '#app',
  data: {
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
        var fech=$('#fecha_consult').val();
     
        axios.post(consult,{"fecha":fech}).then(response =>{
            this.consulta=response.data;
            if(this.consulta.length!=0){
              console.log(this.consulta);
               $("#table_fecha").show();
                }
            else{
              $("#table_fecha").hide();
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
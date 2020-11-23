<script>
  var consult="/api/consultas/maquina"
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    consulta:[],
  },
  methods:{
      btnconsult:function(){
       let fecha= $('#fecha').val();
       let maquina= $('#maquina').val();
        axios.post(consult,{"fecha":fecha,"maquina":maquina}).then(response =>{
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
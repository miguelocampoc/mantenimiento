<script>
function CaseOption (){
  
}

var consult="/api/consultas/tb"
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    consulta:[],
  },
  methods:{
      btnconsult:function(){
       let fecha= $('#fecha').val();
       let tb= $('#tb').val();
       let select= $('#selectdate').val();

            axios.post(consult,{"filtrar":select,"fecha":fecha,"tb":tb}).then(response =>{
            this.consulta=response.data;
            if(this.consulta.length!=0){
              console.log(this.consulta);
               $("#table_tb").show();
                }
            else{
              $("#table_tb").hide();
                danger();
            }        
            });
    },
   
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
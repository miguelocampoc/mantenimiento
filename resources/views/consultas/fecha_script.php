<script>

    var consult="/api/consultas/fecha"
    var app = new Vue({
  el: '#app',
  data: {
    consulta:[],
  },
  methods:{
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
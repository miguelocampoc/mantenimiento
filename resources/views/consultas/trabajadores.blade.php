@extends('adminlte::page')

@section('title', 'Mantenimiento')

@section('content_header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-PMjWzHVtwxdq7m7GIxBot5vdxUY+5aKP9wpKtvnNBZrVv1srI8tU6xvFMzG8crLNcMj/8Xl/WWmo/oAP/40p1g==" crossorigin="anonymous" />

    <h1>Trabajadores</h1>
@stop

@section('content')
<div id="app">
    <p>Seleccione una fecha y  trabajador y ver las actividades a realizar</p>
    <label for="exampleFormControlSelect1" >Fecha </label>
             
          <input type="date" id="fecha" class=" form-control col-md-3"></input>

                 <div class="form-group">
                <label  for="exampleFormControlSelect1"  >Seleccione el trabajdor</label>

                <select onchange="CaseOption()" id="tb"  class="form-control col-md-3"  >
                <option value="" >NINGUNO</option>

                @foreach($trabajadores as $tb)

                <option value="{{$tb->id}}" >{{ $tb->nombre }}</option>
                @endforeach

                </select>
                


            </div>
     <button @click="btnconsult()" class="btn btn-primary">Consultar</button><br><br>
   
     <table  id="table_tb" style="display:none;" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
             <th>id</th>
             <th>nombre</th>
            <th>apellido</th>
            <th>maquina</th>
            <th>Actividades</th>
           
        </tr>
    </thead>
     <tbody>
     <tr v-for="consulta of consulta" >
     @verbatim

              <td>{{consulta.id}}</td>
              <td>{{consulta.nombre}}</td>
              <td>{{consulta.apellido}}</td>
              <td>{{consulta.placa}}</td>
              <td>{{consulta.descripcion}}</td>
              
           </tr>
     @endverbatim

     </tbody>
</table>


</div>


@stop

@section('css')

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-2JBCbWoMJPH+Uj7Wq5OLub8E5edWHlTM4ar/YJkZh3plwB2INhhOC3eDoqHm1Za/ZOSksrLlURLoyXVdfQXqwg==" crossorigin="anonymous"></script>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
            $(function () {
                $('#datetimepicker2').datetimepicker();
            });
        </script>
@include('consultas.tb_script')

@stop
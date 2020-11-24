@extends('adminlte::page')

@section('title', 'Mantenimiento')

@section('content_header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-PMjWzHVtwxdq7m7GIxBot5vdxUY+5aKP9wpKtvnNBZrVv1srI8tU6xvFMzG8crLNcMj/8Xl/WWmo/oAP/40p1g==" crossorigin="anonymous" />

    <h1>Fecha</h1>
@stop

@section('content')
<div id="app"> 
    <p>Seleccione una dia y  ver las actividades a realizar</p>
    <label for="exampleFormControlSelect1" >Dia:</label>
                <input type="date" id="fecha_consult" class=" form-control col-md-3"></input><br>
     <button @click="btnconsult()" class="btn btn-primary">Consultar</button><br><br>
     <table style="display:none;" id="table_fecha"  class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
             <th>id</th>
             <th>placa</th>
            <th>marca</th>
            <th>modelo</th>
            <th>Actividades</th>
           
        </tr>
    </thead>
     <tbody>
     <tr v-for="consulta of consulta" >
     @verbatim

              <td>{{consulta.id}}</td>
              <td>{{consulta.placa}}</td>
              <td>{{consulta.marca}}</td>
              <td>{{consulta.modelo}}</td>
              <td><button type="button" class="btn btn-primary"  @click="actividad(consulta.id)"><i class="fas fa-eye"></i> Visualizar</button></td>
              
           </tr>
     @endverbatim

     </tbody>
     @include('consultas.act')

</table>



</div>

@stop

@section('css')

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@include('consultas.fecha_script')

@stop
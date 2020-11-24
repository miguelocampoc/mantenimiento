@extends('adminlte::page')

@section('title', 'Mantenimiento')

@section('content_header')

    <h1>Fecha</h1>
@stop

@section('content')
<div id="app">
    <p>Seleccione una maquina y fecha y ver las actividades a realizar</p>
    <label for="exampleFormControlSelect1" >Fecha </label>
                 <div class="form-group">
                 <input type="date" id="fecha" class=" form-control col-md-3"></input>
                 </div>
                              <div class="row">
                                 <div class="col-md-3"> 
                                            <div class="form-group">
                                                            <label for="exampleFormControlSelect1"  >Seleccione la maquina</label>

                                                            <select  id="maquina"  class="form-control "  >
                                                            <option value="" >NINGUNA</option>

                                                            @foreach($maquina as $maquina)

                                                            <option value="{{$maquina->placa}}" >{{ $maquina->placa }}</option>
                                                            @endforeach

                                                            </select>


                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                                <label for="exampleFormControlSelect1" >Filtrar por: </label>

                                                    <select class="form-control col-md-4" id="selectdate">
                                                            <option value="date">Fecha</option>
                                                            <option value="m">Mes</option>
                                                            <option value="d"> Dia</option>
                                                    </select>
                                        </div> 
                                    </div>           
     <button @click="btnconsult()" class="btn btn-primary">Consultar</button><br><br>
     
     <table  id="table_maquina" style="display:none;width:100%;" class="table table-striped table-bordered" >
    <thead>
        <tr>
             <th>id</th>
             <th>placa</th>
            <th>marca</th>
            <th>modelo</th>
            <th>Fecha inicio</th>
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
              <td>{{consulta.fecha_in}}</td>
              <td><button type="button" class="btn btn-primary"  @click="actividad(consulta.id)"><i class="fas fa-eye"></i> Visualizar</button></td>
              
           </tr>
     @endverbatim

     </tbody>
</table>

@include('consultas.act')


</div>

@stop

@section('css')

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@include('consultas.maquina_script')

@stop
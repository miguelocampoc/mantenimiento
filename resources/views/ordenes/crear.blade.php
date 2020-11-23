@extends('adminlte::page')
  @section('title', 'Mantenimiento')

  @section('content_header')
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-PMjWzHVtwxdq7m7GIxBot5vdxUY+5aKP9wpKtvnNBZrVv1srI8tU6xvFMzG8crLNcMj/8Xl/WWmo/oAP/40p1g==" crossorigin="anonymous" />
    <a  id="content" href="./" class="btn btn-primary "><i class="fas fa-arrow-left"></i></a><br>
   <h1 id="content"class="mt-2" >Crear Orden</h1>
    @if (session('status'))
    <br>
    <div id="content" class="alert alert-success alert-dismissible fade show col-md-3" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
   @stop

    @section('content')
    <form id="content" action="/ordenes/save" method="POST">
    @csrf

        <!--<label>idmaquina</label>!-->
        <input class="form-control col-md-3" type="hidden"  id="id_maq" name="maquina"></input>
           <!--
        <label>tb1</label>
        <input class="form-control col-md-3" type="text" id="tb1" name="id_maq"></input>
        <label>tb2</label>
        <input class="form-control col-md-3" type="text" id="tb2" name="id_maq"></input>
        <label>tb3</label>
        <input class="form-control col-md-3" type="text" id="tb3" name="id_maq"></input>
     !-->

          <div class="form-group">
                <label for="exampleFormControlSelect1"  >Seleccione la maquina</label>

                <select  id="select" onchange="caseOptions()" class="form-control col-md-3"  >
                <option value="" >NINGUNA</option>

                @foreach($maquina as $maquina)

                <option value="{{$maquina->id}}" >{{ $maquina->placa }}</option>
                @endforeach

                </select>
                @error('maquina')
               <p style="color:red"> {{ $message }} </p>
                              
                @enderror


            </div>
            <label for="exampleFormControlSelect1" >Fecha de inicio</label>
           <div class="form-group col-md-3">
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" id="fecha_in" name="fecha_inicio"   value="{{old('fecha_inicio')}}"class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                 </div>
                 @error('fecha_inicio')
               <p style="color:red"> {{ $message }} </p>
                              
                @enderror
                 <label for="exampleFormControlSelect1" >Fecha final</label>
                 <div class="form-group col-md-3">
                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    <input type="text" id="fecha_fn"  name="fecha_final"   value="{{old('fecha_final')}}" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                 </div>
                 @error('fecha_final')
               <p style="color:red"> {{ $message }} </p>
                              
                @enderror
              <label>Trabajador1</label>

              <div class="form-group">

                <select   onchange="ontb1()" class="form-control col-md-3" id="tb1select" name="trabajador1">
                <option value="" >Seleccione un trabajador</option>

                @foreach($trabajadores as $trabajador)

                <option  value="{{$trabajador->id}}" >{{$trabajador->nombre}}</option>
                @endforeach

                </select>

            </div>
      
            @error('trabajador1')
               <p style="color:red"> {{ $message }} </p>
                              
                @enderror
            <label>Trabajador2</label>

            <div class="form-group">

                <select  onchange="ontb2()" class="form-control col-md-3" id="tb2select" name="trabajador2">
                <option value="" >NINGUNO</option>

                @foreach($trabajadores as $trabajador)

                <option value="{{$trabajador->id}}" >{{$trabajador->nombre}}</option>
                @endforeach

                </select>
                
            </div>
            <label>Trabajador3</label>

            <div class="form-group">

                <select  onchange="ontb3()" class="form-control col-md-3" id="tb3select" name="trabajador3">
                <option value="" >NINGUNO</option>

                @foreach($trabajadores as $trabajador)

                <option value="{{$trabajador->id}}" >{{$trabajador->nombre}}</option>
                @endforeach

                </select>
             </div>
            
                <label>Descripcion</label>
              
                 
                <textarea class="form-control col-md-3"  id="descripcion" value="{{old('descripcion')}}" name="descripcion" placeholder="descripcion"></textarea>
            @error('descripcion')
               <p style="color:red"> {{ $message }} </p>
                              
                @enderror
                <br>

                 <button class="btn btn-primary"  type="submit"> Guardar</button>
                 <br>

           
       </form>

   @stop

@section('css')
<link href="{{asset('css/style.css')}}" rel="stylesheet" >
@stop

@section('js')
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
@include('ordenes.ordenes_script')
@stop









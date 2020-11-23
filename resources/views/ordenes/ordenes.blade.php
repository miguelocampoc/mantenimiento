@extends('adminlte::page')

@section('title', 'Mantenimiento')

@section('content_header')

    <h1 id="content">Ordenes</h1>
@stop

@section('content')

 <div id="content">
    <a href="/ordenes/crear"><button type="button" id="btninsert" class="btn btn-primary">+</button></a><br><br>
    <table id="table_id" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
             <th>id</th>
            <th>maquina</th>
            <th>fecha inicio</th>
            <th>fecha fin</th>
           
            <th>Descripcion</th>
            <th>Opciones</th>

        </tr>
    </thead>
      <tbody>
      @foreach($orden as $orden)
           <tr>
              <td>{{$orden->id}}</td>
              <td>{{$orden->placa}}</td>
              <td>{{$orden->fecha_in}}</td>
              <td>{{$orden->fecha_fn}}</td>
              <td>{{$orden->descripcion}}</td>
              <td><a type='button' href="/ordenes/edit/{{$orden->id}}" class='btn btn-primary mr-3' ><i class='fas fa-pen-alt'></i></a><button type="button"  onclick="btndrop('{{$orden->id}}')" class='btn btn-danger ' ><i class='fas fa-trash'></i></button></td>

           </tr>

      @endforeach

      </tbody>
</table>
</div>
@stop

@section('css')
<link href="{{asset('css/style.css')}}" rel="stylesheet" >

@stop

@section('js')

@include('ordenes.ordenes_script')

@stop
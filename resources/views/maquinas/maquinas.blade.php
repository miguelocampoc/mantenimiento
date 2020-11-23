@extends('adminlte::page')

@section('title', 'Mantenimiento')

@section('content_header')
    <h1 id="content">Maquinas</h1>
@stop

@section('content')
<div id="maquinas">
    <button type="button" id="btninsert" class="btn btn-primary">+</button><br><br>
    <table id="table_id" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
             <th>id</th>
             <th>placa</th>
            <th>marca</th>
            <th>modelo</th>
            <th>cilindraje</th>
            <th>motor</th>
            <th>chasis</th>
            <th>Opciones</th>
        </tr>
    </thead>

</table>
<div>
@include('maquinas.modals.modal_create')
@include('maquinas.modals.modal_update')

@stop

@section('css')
<link href="{{asset('css/style.css')}}" rel="stylesheet" >

@stop

@section('js')
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>!-->
<script src="{{asset('js/table_maquina.js')}}" type="module"></script>
@include("maquinas.maquinas_script");

@stop
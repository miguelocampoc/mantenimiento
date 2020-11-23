@extends('adminlte::page')

@section('title', 'Mantenimiento')

@section('content_header')
    <h1>Gestion de Mantenimiento</h1>
@stop

@section('content')
    <ul>
    <li style="font-size:20px;"> <a href="/trabajadores"> Ir a Trabajadores</a> </li>
    <li  style="font-size:20px;"> <a href="/maquinas"> Ir a Maquinas</a> </li>
    <li  style="font-size:20px;" > <a href="/ordenes"> Ir a Ordenes</a></li>
    <li  style="font-size:20px;" > <a href="/consultas/fecha"> Ir a Consultar fecha</a></li>
    <li  style="font-size:20px;" > <a href="/consultas/maquinas"> Ir a Consultar maquinas</a></li>
    <li  style="font-size:20px;" > <a href="/consultas/trabajador"> Ir a Consultar trabajador</a></li>

    </ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
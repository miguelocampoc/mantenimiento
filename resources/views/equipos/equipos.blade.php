@extends('adminlte::page')

@section('title', 'Mantenimiento')

@section('content_header')
    <h1>Equipos</h1>
@stop

@section('content')
    <p>Agregar nuevo Equipo</p>
    <div id="app">
    @include('equipos.component')
    @include('equipos.modals.insert')
    @include('equipos.modals.edit')

    </div>
    @include('libraries.vue')
    @include('equipos.equipos_script')

@stop

@section('css')
@stop

@section('js')

@stop
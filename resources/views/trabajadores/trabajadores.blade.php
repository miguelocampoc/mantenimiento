@extends('adminlte::page')
  @section('title', 'Mantenimiento')

  @section('content_header')
    <h1 id="content">Trabajadores</h1>
   @stop

    @section('content')
            <div id="content" >

            @include('trabajadores.component')
            @include('trabajadores.modals.insert')
            @include('trabajadores.modals.edit')

            </div>

@stop

@section('css')
<link href="{{asset('css/style.css')}}" rel="stylesheet" >


@stop

@section('js')
@include('trabajadores.trabajadores_script')
<script src="{{asset('js/table_trabajadores.js')}}" type="module"></script>


@stop


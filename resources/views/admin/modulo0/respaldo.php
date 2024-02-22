@extends('layouts.main.index')
@section('container')


<h1>{{$mensaje}}</h1>


@if(isset($datos['choices'][0]['text']))
    <p>{{ $datos['choices'][0]['text'] }}</p>
@else
    <p>No se encontró respuesta.</p>
@endif


@endsection

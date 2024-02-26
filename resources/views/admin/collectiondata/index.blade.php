@extends('layouts.main.index')
@section('container')

@if(isset($resultados))
    @foreach($resultados as $resultado)
        <div>{{ $resultado->informe }}</div>
    @endforeach
@endif

@endsection


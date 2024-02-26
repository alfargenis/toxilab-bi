@extends('layouts.main.index')
@section('container')

<div class="col-md-12 col-lg-12 order-8 mb-8">
    <div class="card h-100">
      <div class="card-body">
      @foreach($resultados as $resultado)
            {!! $resultado->informe !!}
      @endforeach      </div>
    </div>
  </div>
</div>
@endsection


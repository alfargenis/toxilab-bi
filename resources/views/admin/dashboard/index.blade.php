@extends('layouts.main.index')
@section('container')
<style>
  .apexcharts-legend-series {
    display: none;
  }

  .apexcharts-title-text {
    font-size: 1rem;
    font-weight: 700 !important;
  }
</style>
<div class="row">
  <div class="col-6 col-lg-3 mb-4">
    <div class="card h-100">
      <div class="card-body px-3 py-4-5">
        <div class="row p-2 p-lg-0">
          <div class="col-md-4">
            <div class="stats-icon" style="background-color: #008080;">
              <i class="bx bx-group text-white fs-3"></i>
            </div>
          </div>
          <div class="col-md-8">
            <h6 class="text-muted mt-3 mt-lg-0 fw-bold mb-2">Paciente del día</h6>
            <h6 class="mb-0 fw-bold">{{ $patientsToday }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-6 col-lg-3 mb-4">
    <div class="card h-100">
      <div class="card-body px-3 py-4-5">
        <div class="row p-2 p-lg-0">
          <div class="col-md-4">
            <div class="stats-icon" style="background-color: #ff7f50;">
              <i class="bx bx-group text-white fs-3"></i>
            </div>
          </div>
          <div class="col-md-8">
            <h6 class="text-muted mt-3 mt-lg-0 mb-2 fw-bold">El paciente de ayer</h6>
            <h6 class="mb-0 fw-bold">{{ $patientsYesterday }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-6 col-lg-3 mb-4">
    <div class="card h-100">
      <div class="card-body px-3 py-4-5">
        <div class="row p-2 p-lg-0">
          <div class="col-md-4">
            <div class="stats-icon" style="background-color: #800080 ;">
              <i class="bx bx-group text-white fs-3"></i>
            </div>
          </div>
          <div class="col-md-8">
            <h6 class="text-muted mt-3 mt-lg-0 mb-2 fw-bold">Paciente del mes</h6>
            <h6 class="mb-0 fw-bold">{{ $patientsMonthly }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-6 col-lg-3 mb-4">
    <div class="card h-100">
      <div class="card-body px-3 py-4-5">
        <div class="row p-2 p-lg-0">
          <div class="col-md-4">
            <div class="stats-icon" style="background-color: #6a5acd;">
              <i class="bx bx-group text-white fs-3"></i>
            </div>
          </div>
          <div class="col-md-8">
            <h6 class="text-muted mt-3 mt-lg-0 mb-2 fw-bold">Total Pacientes</h6>
            <h6 class="mb-0 fw-bold">{{ $totalPatient }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 col-lg-5 order-0 mb-4">
    <div class="card h-100">
      <div class="card-header">
        <div>
          <h5 class="card-title m-0 me-2 fw-bold mb-2" style="font-family: poppins; font-size:32px;">Ultimos pacientes ingresados</h5>
        </div>
      </div>
      <div class="card-body">
        @if(!$patients->isEmpty())
        <ul class="p-0 m-0">
          @foreach($patients as $patient)
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              @if($patient->gender == 'Perempuan')
              <img src="{{ asset('assets/img/profil-images-default/girl.jpeg') }}" alt="Profile Image" class="rounded">
              @else
              <img src="{{ asset('assets/img/profil-images-default/man.jpeg') }}" alt="Profile Image" class="rounded">
              @endif
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-1 text-capitalize"style="font-family: poppins; font-size:16px; color:black">{{ $patient->name }}</h6>
                <small class="text-muted d-block">{{ $patient->created_at->format('d-m-Y H:i') }}</small>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <span class="mb-1 text-capitalize"style="font-family: poppins; font-size:16px; color:black">{{ $patient->ci }}</span>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
        @endif
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-7 order-2 mb-4">
    <div class="card h-100">
      <div class="card-body">
        {!! $chart !!}
      </div>
    </div>
  </div>
</div>

@endsection

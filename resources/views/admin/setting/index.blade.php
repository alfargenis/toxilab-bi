@extends('layouts.main.index')
@section('container')
<style>
  .required-label::after {
    content: " *";
    color: red;
  }
</style>
<div class="infoupdate" data-user-updated="@if(session()->has('updateUserBerhasil')) {{ session('updateUserBerhasil') }} @endif" data-update-app="@if(session()->has('updateAppBerhasil')) {{ session('updateAppBerhasil') }} @endif"></div>
<div class="infoupdatepass" data-pass-lama-failed="@if(session()->has('passwordLamaSalah')) {{ session('passwordLamaSalah') }} @endif" data-updated-pass="@if(session()->has('passwordUpdateSuccess')) {{ session('passwordUpdateSuccess') }} @endif"></div>
<div class="row">
  <div class="col-md-12">

    <div class="nav-align-top">
      <ul class="nav nav-fill nav-tabs col-lg-4" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link @unless ($errors->has('passwordLama') || $errors->has('passwordBaru') || session()->has('passwordLamaSalah') || $errors->has('logo') || $errors->has('name_app') || $errors->has('description_app') || session()->has('updateAppBerhasil')) active @endunless" role="tab" data-bs-toggle="tab" data-bs-target="#navs-profil" aria-controls="navs-profil"><i class="tf-icons bx bxs-user fs-6 me-1" style="margin-bottom: 2px;"></i>&nbsp;Perfil</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link @if($errors->has('passwordLama') || $errors->has('passwordBaru') || session()->has('passwordLamaSalah')) active @endif" role="tab" data-bs-toggle="tab" data-bs-target="#navs-akun" aria-controls="navs-akun"><i class="tf-icons bx bxs-lock-alt fs-6 me-1" style="margin-bottom: 3px;"></i>&nbsp;Cambio de contraseña</button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade @unless ($errors->has('passwordLama') || $errors->has('passwordBaru') || session()->has('passwordLamaSalah') || $errors->has('logo') || $errors->has('name_app') || $errors->has('description_app') || session()->has('updateAppBerhasil')) show active @endunless" id="navs-profil" role="tabpanel">
          <!-- Profil  -->
          <div class="card-body">
            <h3 class="card-header" style="margin-top: -0.5rem;">Gestion de informacion de usuario</h3>
            <form id="formAccountSettings" action="/admin/setting" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="@if(Storage::disk('public')->exists('profil-images')) {{ asset('storage/'. auth()->user()->image) }} @else {{ asset('assets/img/profil-images-default/1.jpeg') }} @endif" alt="profile" class="d-block rounded cursor-pointer fotoProfile" height="100" width="100" id="uploadedPhotoProfil" data-url-img="@if(Storage::disk('public')->exists('profil-images')) {{ asset('storage/'. auth()->user()->image) }} @else {{ asset('assets/img/profil-images-default/1.jpeg') }} @endif" />
                <div class="button-wrapper">
                  <label for="upload" class="btn btn-outline-primary me-2 mb-4" tabindex="0">
                    <span><i class="bx bx-image-alt fs-6" style="margin-bottom: 2px;"></i>&nbsp;Subir imagen</span>
                    <input type="file" name="image" id="upload" class="account-file-input" hidden />
                  </label>
                  @error('image')<div style="color: #ff3e1d; font-size:80%; margin-top:0.3rem;">{{ $message }}</div>@else
                  <p class="text-muted mb-0" style="margin-top: -5px;">Tamaño máximo 500 KB con proporción 1:1. Formato: JPG, PNG, JPEG.</p>@enderror
                </div>
              </div>
          </div>
          <hr class="my-0">
          <div class="card-body">
            <div class="row mb-2 mb-lg-3">
              <label class="col-sm-2 col-form-label" for="namaLengkap">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="namaLengkap" name="name" autocomplete="off" placeholder="Ingrese su nombre" value="{{ old('name') ?? auth()->user()->name}}" />
                @error('name') <div class="invalid-feedback" style="margin-bottom: -3px;">{{ $message }}</div> @enderror
              </div>
            </div>
            <div class="row mb-2 mb-lg-3">
              <label class="col-sm-2 col-form-label" for="username">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') ?? auth()->user()->username }}" autocomplete="off" />
                @error('username') <div class="invalid-feedback" style="margin-bottom: -3px;">{{ $message }}</div> @enderror
              </div>
            </div>
            <div class="row mb-2 mb-lg-3">
              <label class="col-sm-2 col-form-label" for="email">Email&nbsp;<i class='bx bx-edit fs-6 text-primary buttonEditEmailUser' data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="auto" title="Edit Email"></i></label>
              <div class="col-sm-10">
                <input type="email" id="email" class="form-control" name="email" autocomplete="off" placeholder="Ingrese su email" disabled value="{{ substr(auth()->user()->email, 0, 3) . str_repeat('*', strlen(substr(auth()->user()->email, 0, strpos(auth()->user()->email, '@'))) - 3) . substr(auth()->user()->email, -10)}}" />
              </div>
            </div>
            <div class="row mb-2 mb-lg-3">
              <label class="col-sm-2 col-form-label" for="tanggalLahir">Fecha de Nacimiento</label>
              <div class="col-sm-10">
                <input type="date" id="tanggalLahir" name="tanggal_lahir" class="form-control" @if(old('tanggal_lahir')) value="{{ date('Y-m-d', strtotime(old('tanggal_lahir'))) }}" @endif @if(auth()->user()->tanggal_lahir) value="{{ date('Y-m-d', strtotime(auth()->user()->tanggal_lahir)) }}" @endif />
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary"><i class="bx bx-save fs-6" style="margin-bottom: 2px;"></i>&nbsp;Guardar cambios</button>
              </div>
            </div>
            </form>
          </div>
        </div>

        <div class="tab-pane fade @if($errors->has('passwordLama') || $errors->has('passwordBaru') || session()->has('passwordLamaSalah')) show active @endif" id="navs-akun" role="tabpanel">
          <!-- Akun  -->
          <form id="formAccount" action="/admin/setting/changepassword" method="POST">
            @csrf
            <div class="card-body">
              <div class="row mb-2 mb-lg-3">
                <label class="col-sm-2 col-form-label required-label" for="passwordLama">Contraseña actual</label>
                <div class="col-sm-10 col-md-4">
                  <input type="password" class="form-control  @error('passwordLama') is-invalid @enderror" id="passwordLama" name="passwordLama" autocomplete="off" />
                  @error('passwordLama') <div class="invalid-feedback" style="margin-bottom: -3px;">{{ $message }}</div> @enderror
                </div>
              </div>
              <div class="row mb-2 mb-lg-3">
                <label class="col-sm-2 col-form-label required-label" for="passwordBaru">Nueva contraseña</label>
                <div class="col-sm-10 col-md-4">
                  <input type="password" class="form-control  @error('passwordBaru') is-invalid @enderror" id="passwordBaru" name="passwordBaru" autocomplete="off" />
                  @error('passwordBaru')<div class="invalid-feedback" style="margin-bottom: -3px;">{{ $message }}</div>@enderror
                  <div class="form-text @error('passwordBaru') d-none @enderror"><i class='bx bx-error' style="font-size: 100%;"></i>&nbsp;Contraseña de al menos 8 caracteres que incluya letras mayúsculas y minúsculas (A-Z), (a-z), números (1-9) y caracteres únicos (@,#,%,etc).</div>
                </div>
              </div>
              <div class="row mb-4">
                <label class="col-sm-2 col-form-label required-label" for="ulangiPasswordBaru">Repita nueva contraseña</label>
                <div class="col-sm-10 col-md-4">
                  <input type="password" class="form-control" id="ulangiPasswordBaru" name="passwordBaru_confirmation" autocomplete="off" />
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary"><i class="bx bx-save fs-6" style="margin-bottom: 2px;"></i>&nbsp;Guardar cambios</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
</div>


<!-- Modal Verifikasi Users-->
<div class="validateMessages" data-username-required="@error('usernameverify') {{ $message }} @enderror" data-password-required="@error('password') {{ $message }} @enderror"></div>
<div class="modal fade" id="formModalUsersEditEmail" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="/admin/setting/verify" method="post" class="modalUsersEditEmail">
      @csrf
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <h5 class="modal-title text-primary fw-bold">Verificacion de seguridad&nbsp;<i class='bx bxs-user fs-5' style="margin-bottom: 1px;"></i></h5>
          <button type="button" class="btn p-0 dropdown-toggle hide-arrow btnCancelVerify" data-bs-dismiss="modal"><i class="bx bx-x-circle text-danger fs-4" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="auto" title="Tutup"></i></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="usernameVerivy" class="form-label required-label">Username</label>
              <input type="text" id="usernameVerivy" name="usernameverify" value="{{ old('usernameverify') ?? auth()->user()->username }}" class="form-control @error('usernameverify') is-invalid @enderror" placeholder="Masukkan username Anda" autocomplete="off" readonly required>
              @error('username')
              <div class="invalid-feedback" style="margin-bottom: -3px;">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="passwordVerify" class="form-label required-label">Contraseña</label>
              <input type="password" id="passwordVerify" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror @if(session()->has('statusverifyfailed')) is-invalid @endif" placeholder="Confirme su contraseña" autocomplete="off" required>
              @error('password')
              <div class="invalid-feedback" style="margin-bottom: -3px;">
                {{ $message }}
              </div>
              @enderror
              @if(session()->has('statusverifyfailed'))
              <div class="invalid-feedback" style="margin-bottom: -3px;">Contraseña incorrecta</div>
              @endif
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger btnCancelVerify" data-bs-dismiss="modal"><i class='bx bx-share fs-6' style="margin-bottom: 3px;"></i>&nbsp;Cancelar</button>
          <button type="submit" class="btn btn-primary"><i class='bx bxs-user fs-6' style="margin-bottom: 3px;"></i>&nbsp;Confirmar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="statusUpdateEmail" data-update-email-success="@if(session()->has('updateEmailUser')) {{ session('updateEmailUser') }} @endif"></div>
<div class="statusverify" data-status-verify-success="@if(session()->has('statusverifysuccess')) {{ session('statusverifysuccess') }} @endif" data-status-verify-failed="@if(session()->has('statusverifyfailed')) {{ session('statusverifyfailed') }} @endif"></div>

@if(session()->has('statusverifysuccess') || $errors->has('email'))
<div class="validatedEmail" data-email="@error('email') {{ $message }} @enderror"></div>
<div class="modal fade" id="formModalUsersSetEmail" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="/admin/setting/setemail" method="post" class="modalUsersSetEmail">
      @csrf
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <h5 class="modal-title text-primary fw-bold">Cambiar Email&nbsp;<i class='bx bx-envelope fs-5' style="margin-bottom: 1px;"></i></h5>
          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-dismiss="modal"><i class="bx bx-x-circle text-danger fs-4" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="auto" title="Tutup"></i></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label for="emailSet" class="form-label required-label">Email Nuevo</label>
              <input type="text" id="emailSet" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Introducir nuevo correo electrónico" autocomplete="off" required>
              @error('email')
              <div class="invalid-feedback" style="margin-bottom: -3px;">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class='bx bx-share fs-6' style="margin-bottom: 3px;"></i>&nbsp;Cancelar</button>
          <button type="submit" class="btn btn-primary"><i class='bx bx-save fs-6' style="margin-bottom: 3px;"></i>&nbsp;Confirmar</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endif


@section('script')
<script src="{{ asset('assets/js/settingsAdmin.js') }}"></script>
@endsection
@endsection
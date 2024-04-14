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
          <button type="button" class="nav-link @if($errors->has('passwordLama') || $errors->has('passwordBaru') || session()->has('passwordLamaSalah')) active @endif" role="tab" data-bs-toggle="tab" data-bs-target="#navs-akun" aria-controls="navs-akun"><i class="tf-icons bx bxs-lock-alt fs-6 me-1" style="margin-bottom: 3px;"></i>&nbsp;Cuenta</button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade @unless ($errors->has('passwordLama') || $errors->has('passwordBaru') || session()->has('passwordLamaSalah') || $errors->has('logo') || $errors->has('name_app') || $errors->has('description_app') || session()->has('updateAppBerhasil')) show active @endunless" id="navs-profil" role="tabpanel">
          <h5 class="card-header" style="margin-top: -0.5rem;">Mi Perfil</h5>
          <p style="padding-left: 1.5rem; margin-top:-1.3rem; margin-bottom:-5px;">Administra la información de tu perfil para controlar, proteger y asegurar tu cuenta.
          </p>
          <!-- Perfil -->
          <div class="card-body">
            <form id="formAccountSettings" action="/admin/setting" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="@if(Storage::disk('public')->exists('profil-images')) {{ asset('storage/'. auth()->user()->image) }} @else {{ asset('assets/img/profil-images-default/man.jpeg') }} @endif" alt="perfil" class="d-block rounded cursor-pointer fotoProfile" height="100" width="100" id="uploadedPhotoProfil" data-url-img="@if(Storage::disk('public')->exists('profil-images')) {{ asset('storage/'. auth()->user()->image) }} @else {{ asset('assets/img/profil-images-default/man.jpeg') }} @endif" />
                <div class="button-wrapper">
                  <label for="upload" class="btn btn-outline-primary me-2 mb-4" tabindex="0">
                    <span><i class="bx bx-image-alt fs-6" style="margin-bottom: 2px;"></i>&nbsp;Subir</span>
                    <input type="file" name="image" id="upload" class="account-file-input" hidden />
                  </label>
                  @error('image')<div style="color: #ff1d00;">{{ $message }}</div>@enderror
                </div>
                <div class="flex-1">
                  <h5 class="card-title">Información Básica</h5>
                  <p class="card-text">
                    Controla tu información básica. El correo electrónico es el único campo que no se puede cambiar.
                  </p>
                  <div class="mb-4">
                    <label for="name" class="form-label required-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required />
                    @error('name')<div style="color: #ff1d00;">{{ $message }}</div>@enderror
                  </div>
                  <div class="mb-4">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly />
                  </div>
                  <button type="submit" class="btn btn-success">Guardar Cambios</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="tab-pane fade @if($errors->has('passwordLama') || $errors->has('passwordBaru') || session()->has('passwordLamaSalah')) show active @endif" id="navs-akun" role="tabpanel">
          <h5 class="card-header" style="margin-top: -0.5rem;">Configuración de la Cuenta</h5>
          <p style="padding-left: 1.5rem; margin-top:-1.3rem; margin-bottom:-5px;">Asegura tu cuenta con una contraseña fuerte y única.
          </p>
          <!-- Akun -->
          <div class="card-body">
            <form id="formAccountSettingsPassword" method="POST">
              @csrf
              <div class="mb-4">
                  <label for="passwordLama" class="form-label required-label">Contraseña Actual</label>
                  <input type="password" class="form-control" id="passwordLama" name="passwordLama" required />
                  @error('passwordLama')<div style="color: #ff1d00;">{{ $message }}</div>@enderror
              </div>
              <div class="mb-4">
                  <label for="passwordBaru" class="form-label required-label">Contraseña Nueva</label>
                  <input type="password" class="form-control" id="passwordBaru" name="passwordBaru" required />
                  @error('passwordBaru')<div style="color: #ff1d00;">{{ $message }}</div>@enderror
              </div>
              <div class="mb-4">
                  <label for="konfirmasiPasswordBaru" class="form-label required-label">Confirme Contraseña Nueva</label>
                  <input type="password" class="form-control" id="konfirmasiPasswordBaru" name="konfirmasiPasswordBaru" required />
              </div>
              <button type="submit" class="btn btn-success">Guardar Cambios</button>
          </form>
          <div id="responseMessage"></div>
          </div>
        </div>

        <div class="tab-pane fade @if($errors->has('logo') || $errors->has('name_app') || $errors->has('description_app') || session()->has('updateAppBerhasil')) show active @endif" id="navs-aplikasi" role="tabpanel">
          <h5 class="card-header" style="margin-top: -0.5rem;">Configuración de la Aplicación</h5>
          <p style="padding-left: 1.5rem; margin-top:-1.3rem; margin-bottom:-5px;">Administra la información de tu aplicación para que se muestre correctamente a tus usuarios.
          </p>
          <!-- Aplikasi -->
          <div class="card-body">
            <form id="formAccountSettingsApp" action="/admin/setting/ganti-aplikasi" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-4">
                <label for="logo" class="form-label required-label">Logo de la Aplicación</label>
                <input type="file" class="form-control" id="logo" name="logo" accept="image/*" />
                @error('logo')<div style="color: #ff1d00;">{{ $message }}</div>@enderror
              </div>
              <div class="mb-4">
                <label for="name_app" class="form-label required-label">Nombre de la Aplicación</label>
                <input type="text" class="form-control" id="name_app" name="name_app" value="{{ config('app.name') }}" required />
                @error('name_app')<div style="color: #ff1d00;">{{ $message }}</div>@enderror
              </div>
              <div class="mb-4">
                <label for="description_app" class="form-label required-label">Descripción de la Aplicación</label>
                <textarea class="form-control" id="description_app" name="description_app" rows="3" required>{{ config('app.description') }}</textarea>
                @error('description_app')<div style="color: #ff1d00;">{{ $message }}</div>@enderror
              </div>
              <button type="submit" class="btn btn-success">Guardar Cambios</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#formAccountSettingsPassword').on('submit', function(e) {
        e.preventDefault(); // Detiene el envío normal del formulario
        var formData = $(this).serialize(); // Serializa los datos del formulario

        $.ajax({
            type: 'POST',
            url: '/admin/setting/',
            data: formData,
            dataType: 'json', // Asegúrate de especificar que esperas una respuesta en formato JSON
            success: function(response) {
                // Asegúrate de que el mensaje exista en la respuesta
                if(response.message) {
                    $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                } else {
                    // Si no hay mensaje, puedes definir un mensaje genérico
                    $('#responseMessage').html('<div class="alert alert-success">Operación realizada con éxito.</div>');
                }
            },
            error: function(xhr) {
                // Manejo de errores
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Error desconocido al actualizar la contraseña.';
                $('#responseMessage').html('<div class="alert alert-danger">' + errorMessage + '</div>');
            }
        });
    });
});

</script>


@stop

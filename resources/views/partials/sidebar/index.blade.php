@can('admin')
<li class="menu-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/dashboard'">
    <i class="menu-icon tf-icons bx bx-desktop"></i>
    <div>INICIO</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/datamarts*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/datamarts'">
    <i class="menu-icon tf-icons bx bx-data"></i>
    <div>DATA MARTS</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/collectiondata*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/collectiondata'">
    <i class="menu-icon tf-icons bx bx-collection"></i>
    <div>COLECCIÓN DE DATOS</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/files*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/files'">
    <i class="menu-icon tf-icons bx bx-import"></i>
    <div>IMPORTAR DATOS</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/modulo0*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/modulo0'">
    <i class="menu-icon tf-icons bx bx-street-view"></i>
    <div>MODULO 0</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/antrian*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/antrian'">
    <i class="menu-icon tf-icons bx bx-group"></i>
    <div>COLA PACIENTES</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/daftar-antrian-terlambat*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/daftar-antrian-terlambat'">
    <i class="menu-icon tf-icons bx bx-recycle"></i>
    <div>RESUMEN DE PACIENTES</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/pasien*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/pasien'">
  <i class="menu-icon tf-icons bx bxs-user-detail"></i>
    <div>CONSULTA DE PACIENTES</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/pengaturan*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/pengaturan'">
    <i class="menu-icon tf-icons bx bx-cog"></i>
    <div>CONFIUGURACION DE PERFIL</div>
  </a>
</li>
@endcan
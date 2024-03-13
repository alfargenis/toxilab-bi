@can('admin')
<li class="menu-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/dashboard'">
    <i class="menu-icon tf-icons bx bx-desktop"></i>
    <div>INICIO</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/datamarts/*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/datamarts/'">
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
<li class="menu-item {{ Request::is('admin/constructor*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/constructor'">
    <i class="menu-icon tf-icons bx bx-wrench"></i>
    <div>CONSTRUCTOR DE INFORMES</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/modulo0*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/modulo0'">
    <i class="menu-icon tf-icons bx bx-bot"></i>
    <div>CONSULTA NATURAL</div>
  </a>
</li>

<li class="menu-item {{ Request::is('admin/pengaturan*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/pengaturan'">
    <i class="menu-icon tf-icons bx bx-cog"></i>
    <div>CONFIUGURACION DE PERFIL</div>
  </a>
</li>
@endcan
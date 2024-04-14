@can('admin')
<style>
  .menu-text {
    margin-left: 10px; /* Ajusta este valor según tus necesidades */
}
</style>

<li class="menu-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/dashboard'">
    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24">
      <path d="M18,21H6c-1.7,0-3-1.3-3-3V8.8c0-1.1,0.6-2.1,1.5-2.6l6-3.3c0.9-0.5,2-0.5,2.9,0l6,3.3c1,0.5,1.5,1.5,1.5,2.6 V18C21,19.7,19.7,21,18,21z" opacity=".35"></path>
      <path d="M15,21H9v-6c0-1.1,0.9-2,2-2h2c1.1,0,2,0.9,2,2V21z"></path>
    </svg>
    <div class="menu-text">INICIO</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/datamarts*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/datamarts'">
    <svg width="20px" height="20px" viewBox="0 0 91 91" enable-background="new 0 0 91 91" xmlns="http://www.w3.org/2000/svg" fill="#000000">
      <path d="M88.587,25.783L46.581,5.826c-0.672-0.317-1.45-0.317-2.12,0L2.462,25.783c-0.861,0.408-1.41,1.277-1.41,2.232c0,0.951,0.549,1.819,1.41,2.229l41.999,19.954c0.335,0.158,0.697,0.239,1.059,0.239c0.363,0,0.726-0.081,1.061-0.239l42.006-19.954c0.861-0.41,1.41-1.278,1.41-2.229C89.997,27.06,89.448,26.191,88.587,25.783z" fill="#647F94"></path>
      <path d="M45.521,68.085c-0.483,0-0.965-0.105-1.414-0.317L2.109,47.813c-1.643-0.781-2.341-2.744-1.562-4.386c0.78-1.642,2.742-2.341,4.388-1.562l40.584,19.283l40.595-19.283c1.639-0.78,3.606-0.083,4.386,1.562c0.78,1.643,0.083,3.605-1.562,4.386L46.934,67.768C46.487,67.979,46.004,68.085,45.521,68.085z" fill="#45596B"></path>
      <path d="M45.521,84.912c-0.483,0-0.965-0.105-1.414-0.317L2.109,64.641c-1.643-0.78-2.341-2.746-1.562-4.389c0.78-1.645,2.742-2.342,4.388-1.562l40.584,19.282L86.115,58.69c1.642-0.78,3.606-0.083,4.386,1.562c0.78,1.643,0.083,3.608-1.56,4.389L46.934,84.595C46.487,84.807,46.004,84.912,45.521,84.912z" fill="#45596B"></path>
    </svg>
    <div class="menu-text">DATA MARTS</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/collectiondata*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/collectiondata'">
    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path opacity="0.1" d="M17 8C18.8856 8 19.8284 8 20.4142 8.58579C21 9.17157 21 10.1144 21 12L21 16C21 17.8856 21 18.8284 20.4142 19.4142C19.8284 20 18.8856 20 17 20L16 20L8 20L7 20C5.11438 20 4.17157 20 3.58579 19.4142C3 18.8284 3 17.8856 3 16L3 12C3 10.1144 3 9.17157 3.58579 8.58579C4.17157 8 5.11438 8 7 8L8 8L16 8L17 8Z" fill="#323232"></path>
      <path d="M17 8C18.8856 8 19.8284 8 20.4142 8.58579C21 9.17157 21 10.1144 21 12L21 16C21 17.8856 21 18.8284 20.4142 19.4142C19.8284 20 18.8856 20 17 20L16 20L8 20L7 20C5.11438 20 4.17157 20 3.58579 19.4142C3 18.8284 3 17.8856 3 16L3 12C3 10.1144 3 9.17157 3.58579 8.58579C4.17157 8 5.11438 8 7 8L8 8L16 8L17 8Z" stroke="#323232" stroke-width="2" stroke-linejoin="round"></path>
      <path d="M6 8V5.71429C6 4.76751 6.76751 4 7.71429 4V4H16.2857V4C17.2325 4 18 4.76751 18 5.71429V8" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg>
    <div class="menu-text">COLECCIÓN DE DATOS</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/files*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/files'">
    <svg width="20px" height="20px" viewBox="0 0 32 32" id="OBJECT" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:#b2b2b2;}</style></defs><title></title><path class="cls-1" d="M24,8H12.54L10.83,5.45A1,1,0,0,0,10,5H8A3,3,0,0,0,5,8v5a1,1,0,0,0,1,1H26a1,1,0,0,0,1-1V11A3,3,0,0,0,24,8Z"></path><rect height="6" rx="1" ry="1" width="26" x="3" y="12"></rect><path class="cls-1" d="M30.81,16.42A1,1,0,0,0,30,16H2a1,1,0,0,0-.81.42,1,1,0,0,0-.14.9l3,9A1,1,0,0,0,5,27H27a1,1,0,0,0,.95-.68l3-9A1,1,0,0,0,30.81,16.42Z"></path><path d="M10,24H8a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"></path></g></svg>
    <div class="menu-text">IMPORTAR DATOS</div>
  </a>
</li>
<li class="menu-item {{ Request::is('admin/constructor*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/constructor'">
   <svg width="25px" height="25px" viewBox="0 0 91 91" enable-background="new 0 0 91 91" id="Layer_1" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M89.81,6l-4.979-4.975c-0.84-0.838-2.154-0.973-3.146-0.322l-14.498,9.533 c-0.631,0.414-1.041,1.09-1.115,1.84c-0.08,0.748,0.186,1.492,0.719,2.025l2.728,2.729L40.472,45.88 c-1.305,1.303-1.305,3.42,0,4.723c0.652,0.652,1.508,0.979,2.361,0.979c0.855,0,1.711-0.326,2.363-0.979l29.043-29.047 l2.492,2.494c0.471,0.475,1.111,0.734,1.773,0.734c0.084,0,0.168-0.004,0.254-0.014c0.75-0.074,1.426-0.484,1.838-1.115 L90.13,9.146C90.782,8.152,90.647,6.838,89.81,6z" fill="#4e555a"></path> <path d="M50.858,53.079l-12.857-12.86c-0.695-0.695-1.732-0.92-2.652-0.572c-1.318,0.494-2.453,1.211-3.373,2.131 L3.394,70.362c-1.816,1.816-2.818,4.318-2.814,7.041c0,3.25,1.424,6.531,3.877,8.98l0.215,0.219 c2.471,2.475,5.752,3.895,8.998,3.895c2.723,0,5.225-1.002,7.045-2.822l28.568-28.57c0.918-0.908,1.641-2.039,2.143-3.361 C51.778,54.821,51.556,53.778,50.858,53.079z" fill="#45596B"></path> </g> </g> </g></svg>
    <div class="menu-text">CONSTRUCTOR DE INFORMES</div>
  </a>
</li>

<li class="menu-item {{ Request::is('admin/modulo0*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/modulo0'">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="20px" height="20px" fill="#000000">
      <g>
        <path style="fill:#D9DCDF;" d="M469.779,111.192h-121.79c-2.812,0-5.418,1.474-6.869,3.883c-1.45,2.41-1.532,5.403-0.215,7.888
          c12.105,22.837,18.243,47.467,18.243,73.205c0,89.882-76.96,163.006-171.557,163.006c-10.974,0-21.995-1.003-32.755-2.98
          c-2.343-0.433-4.752,0.201-6.58,1.724c-1.828,1.523-2.886,3.78-2.886,6.16v20.215c0,23.28,18.941,42.221,42.221,42.221h150.844
          l83.224,74.902c5.065,4.559,13.38,0.821,13.38-5.958v-68.944h34.739c23.28,0,42.221-18.941,42.221-42.221V153.413
          C512,130.133,493.059,111.192,469.779,111.192z"/>
        <path style="fill:#F6F6F7;" d="M355.073,115.453c-1.391-2.622-4.116-4.262-7.084-4.262H187.591
          c-23.281,0-42.221,18.941-42.221,42.221v210.666c0,3.868,2.762,7.186,6.567,7.884c11.714,2.154,23.71,3.245,35.654,3.245
          c103.438,0,187.591-80.318,187.591-179.04C375.182,167.785,368.416,140.629,355.073,115.453z"/>
        <path style="fill:#FFC44F;" d="M256,145.396c-37.426,0-67.875,30.448-67.875,67.875s30.449,67.875,67.875,67.875
          s67.875-30.449,67.875-67.875S293.426,145.396,256,145.396z"/>
        <circle style="fill:#FFEBC8;" cx="285.929" cy="174.796" r="12.827"/>
      </g>
    </svg>
    <div class="menu-text">CONSULTA NATURAL</div>
  </a>
</li>


<li class="menu-item {{ Request::is('admin/setting*') ? 'active' : '' }}">
  <a class="menu-link cursor-pointer" onclick="window.location.href='/admin/setting'">
    <svg width="20px" height="20px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#000000">
      <path class="cls-1" d="M25.88,27.3l-2.65-2.65a1,1,0,0,1-.29-.71V19h2v4.53l2.36,2.35Z"></path>
      <path class="cls-1" d="M6.12,27.3,4.7,25.88l2.36-2.35V19h2v4.94a1,1,0,0,1-.29.71Z"></path>
      <rect class="cls-1" height="5" width="2" x="15" y="19"></rect>
      <circle cx="16" cy="27" r="4"></circle>
      <circle cx="28" cy="28" r="3"></circle>
      <circle cx="4" cy="28" r="3"></circle>
      <path class="cls-1" d="M29,12.5H26.42a11.26,11.26,0,0,0-.57-1.39l1.83-1.83a2,2,0,0,0,0-2.83L25.55,4.33a2,2,0,0,0-2.84,0L20.89,6.15a11.26,11.26,0,0,0-1.39-.57V3a2,2,0,0,0-2-2h-3a2,2,0,0,0-2,2V5.58a11.26,11.26,0,0,0-1.39.57L9.28,4.32a2,2,0,0,0-2.83,0L4.33,6.45a2,2,0,0,0,0,2.84l1.82,1.82a11.26,11.26,0,0,0-.57,1.39H3a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2H29a2,2,0,0,0,2-2v-3A2,2,0,0,0,29,12.5Z"></path>
      <path d="M23.5,16.5a7.5,7.5,0,1,0-14.37,3H22.87A7.49,7.49,0,0,0,23.5,16.5Z"></path>
    </svg>
    <div class="menu-text">CONFIGURACIÓN DE PERFIL</div>
  </a>
</li>

@endcan
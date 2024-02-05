@extends('layouts.main.index')
@section('container')


<div class="container">
  <div class="mt1 flex align-end flex-wrap flex-row fieldset-container" axis="x" distance="9">

    <!-- Fieldset 1 -->
    <fieldset data-testid="field-set" class="emotion-asff7v e1nogqi92 bordered rounded fieldset1" onclick="toggleMenu(this)">
      <div data-testid="field-set-content" class="w-full">
      <a class="no-decoration emotion-0 e29ju10">
        <div class="Button eqnhavx1 emotion-2lvb64 emiw9oj2">
          <div class="_3hpav _38618 _3Dqep tether-target tether-element-attached-top tether-element-attached-left tether-target-attached-bottom tether-target-attached-left" role="button" aria-label="Created At">
        <i class="menu-icon tf-icons bx bx-message-add"></i>
        <div class="mr1 text-nowrap">Creado en</div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentcolor" viewBox="0 0 16 16" role="img" aria-label="chevrondown icon" class="Icon Icon-chevrondown flex-align-right flex-no-shrink" width="12" height="12">
          <path d="M1.47 4.47a.75.75 0 0 1 1.06 0L8 9.94l5.47-5.47a.75.75 0 1 1 1.06 1.06l-6 6a.75.75 0 0 1-1.06 0l-6-6a.75.75 0 0 1 0-1.06z"></path>
        </svg>
          </div>
          </a>
          <div class="options">
            <button>Hoy</button>
            <button>Ayer</button>
            <button>Semana Pasada</button>
            <button>Últimos 7 días</button>
            <button>Últimos 30 días</button>
            <div>_____________________</div>
            <button>El mes pasado</button>
            <button>Últimos 3 meses</button>
            <button>Últimos 12 meses</button>
            <div>_____________________</div>
            <button>Fechas específicas...</button>
            <button>Fechas relativas...</button>
            <button>Excluir...</button>
          </div>
        </div>
      </div>
    </fieldset>

    <!-- Fieldset 2 -->
<fieldset data-testid="field-set" class="emotion-asff7v e1nogqi92 bordered rounded" onclick="toggleMenu(this)">
  <div data-testid="field-set-content" class="w-full">
    <a class="no-decoration emotion-0 e29ju10">
      <div class="_3hpav _38618 _3Dqep tether-target tether-element-attached-top tether-element-attached-left tether-target-attached-bottom tether-target-attached-left" role="button" aria-label="Source">
        <i class="menu-icon tf-icons bx bx-location-plus"></i>
        <div class="mr1 text-nowrap">Localidad</div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentcolor" viewBox="0 0 16 16" role="img" aria-label="chevrondown icon" class="Icon Icon-chevrondown flex-align-right flex-no-shrink" width="12" height="12">
          <path d="M1.47 4.47a.75.75 0 0 1 1.06 0L8 9.94l5.47-5.47a.75.75 0 1 1 1.06 1.06l-6 6a.75.75 0 0 1-1.06 0l-6-6a.75.75 0 0 1 0-1.06z"></path>
        </svg>
      </div>
    </a>
    <div class="options">
      <div data-testid="field-values-widget" style="min-width: 300px; max-width: 400px;">
        <div class="emotion-gx0lhm e1vl85b23">
          <div class="emotion-17sifsc edcfyzd6">
            <input placeholder="Busca la lista" class="emotion-2chkho edcfyzd5" value="">
          </div>
        </div>
        <ul class="emotion-1mtrwmo e1vl85b22">
          <!-- Ciudades del estado Bolívar -->
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="CiudadBolivar-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  Ciudad Bolívar</span>
                </div>
              </span>
            </label>
          </li>
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="CiudadGuayana-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  Ciudad Guayana</span>
                </div>
              </span>
            </label>
          </li>
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="Upata-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  Upata</span>
                </div>
              </span>
            </label>
          </li>
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="CaicaraDelOrinoco-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  Caicara del Orinoco</span>
                </div>
              </span>
            </label>
          </li>
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="CiudadPiar-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  Ciudad Piar</span>
                </div>
              </span>
            </label>
          </li>
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="ElCallao-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  El Callao</span>
                </div>
              </span>
            </label>
          </li>
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="Tumeremo-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  Tumeremo</span>
                </div>
              </span>
            </label>
          </li>
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="SantaElenaDeUairen-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  Santa Elena de Uairén</span>
                </div>
              </span>
            </label>
          </li>
          <!-- Opción para Foráneos -->
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="Foraneos-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  Foráneos</span>
                </div>
              </span>
            </label>
          </li>
        </ul>
      </div>
    </div>
  </div>
</fieldset>

    <!-- Fieldset 3 -->
    <fieldset data-testid="field-set" class="emotion-asff7v e1nogqi92 bordered rounded">
      <div data-testid="field-set-content" class="w-full">
        <a class="no-decoration emotion-0 e29ju10">
          <div class="_3hpav _38618 _3Dqep tether-target tether-element-attached-top tether-element-attached-left tether-target-attached-bottom tether-target-attached-left" role="button" aria-label="Active Subscription">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="currentcolor" viewBox="0 0 16 16" role="img" aria-label="string icon" class="Icon Icon-string flex-align-left mr1 flex-no-shrink" width="16" height="16">
              <path d="M2.25 3A.75.75 0 0 1 3 2.25h10a.75.75 0 0 1 .75.75v2a.75.75 0 0 1-1.5 0V3.75h-3.5v8.5H10a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1 0-1.5h1.25v-8.5h-3.5V5a.75.75 0 0 1-1.5 0V3z"></path>
            </svg> -->
            <i class='bx bx-group'></i>
            <div class="mr1 text-nowrap">Edad</div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentcolor" viewBox="0 0 16 16" role="img" aria-label="chevrondown icon" class="Icon Icon-chevrondown flex-align-right flex-no-shrink" width="12" height="12">
              <path d="M1.47 4.47a.75.75 0 0 1 1.06 0L8 9.94l5.47-5.47a.75.75 0 1 1 1.06 1.06l-6 6a.75.75 0 0 1-1.06 0l-6-6a.75.75 0 0 1 0-1.06z"></path>
            </svg>
          </div>
        </a>
        <div class="options">
      <div data-testid="field-values-widget" style="min-width: 300px; max-width: 400px;">
        <div class="emotion-gx0lhm e1vl85b23">
          <div class="emotion-17sifsc edcfyzd6">
            <input placeholder="Una edad en especifico" class="emotion-2chkho edcfyzd5" style="min-width: 10px;">
          </div>
        </div>
        <ul class="emotion-1mtrwmo e1vl85b22">
          <!-- Ciudades del estado Bolívar -->
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="CiudadBolivar-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  0-13 años</span>
                </div>
              </span>
            </label>
          </li>
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="CiudadGuayana-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  14-27 años</span>
                </div>
              </span>
            </label>
          </li>
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="Upata-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  28-41 años</span>
                </div>
              </span>
            </label>
          </li>
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="CaicaraDelOrinoco-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  42-69 años</span>
                </div>
              </span>
            </label>
          </li>
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="CiudadPiar-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  70-97 años</span>
                </div>
              </span>
            </label>
          </li>
        </ul>
      </div>
    </div>
      </div>
    </fieldset>

    <!-- Fieldset 4 -->
    <fieldset data-testid="field-set" class="emotion-asff7v e1nogqi92 bordered rounded">
      <div data-testid="field-set-content" class="w-full">
        <a class="no-decoration emotion-0 e29ju10">
          <div class="_3hpav _38618 _3Dqep tether-target tether-element-attached-top tether-element-attached-left tether-target-attached-bottom tether-target-attached-left" role="button" aria-label="Plan">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="currentcolor" viewBox="0 0 16 16" role="img" aria-label="string icon" class="Icon Icon-string flex-align-left mr1 flex-no-shrink" width="16" height="16">
              <path d="M2.25 3A.75.75 0 0 1 3 2.25h10a.75.75 0 0 1 .75.75v2a.75.75 0 0 1-1.5 0V3.75h-3.5v8.5H10a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1 0-1.5h1.25v-8.5h-3.5V5a.75.75 0 0 1-1.5 0V3z"></path>
            </svg> -->
            <i class='bx bx-registered' ></i>
            <div class="mr1 text-nowrap">Tipo Ingreso</div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentcolor" viewBox="0 0 16 16" role="img" aria-label="chevrondown icon" class="Icon Icon-chevrondown flex-align-right flex-no-shrink" width="12" height="12">
              <path d="M1.47 4.47a.75.75 0 0 1 1.06 0L8 9.94l5.47-5.47a.75.75 0 1 1 1.06 1.06l-6 6a.75.75 0 0 1-1.06 0l-6-6a.75.75 0 0 1 0-1.06z"></path>
            </svg>
          </div>
        </a>
        <div class="options">
      <div data-testid="field-values-widget" style="min-width: 300px; max-width: 400px;">
        <ul class="emotion-1mtrwmo e1vl85b22">
          <!-- Ciudades del estado Bolívar -->
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="CiudadBolivar-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  Ambulatorio</span>
                </div>
              </span>
            </label>
          </li>
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="CiudadGuayana-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  Convenio</span>
                </div>
              </span>
            </label>
          </li>
          <li class="emotion-9g8p9a e1vl85b21">
            <label data-testid="Upata-filter-value" class="emotion-4bgdod ekqkkiz5">
              <span class="emotion-pc31xd ekqkkiz3">
                <span size="16" class="emotion-1ymj03w ekqkkiz1"></span>
                <div class="emotion-18tt7mj e1vl85b20">
                <input type="checkbox" size="16" class="emotion-1g9ihxu ekqkkiz4"><span class="text-bold">  Venta de contado</span>
                </div>
              </span>
            </label>
          </li>
        </ul>
      </div>
    </div>
      </div>
    </fieldset>
  </div>
</div>
<!-- Cuentas Panel -->
<div class="panel-container">
    <div class="panel">
        @if($patients->isEmpty())
            <p>No hay pacientes disponibles.</p>
        @else
            <div class="total-cuentas">
                <i class='bx bxs-user'></i> <!-- Cambia 'bxs-user' por el icono que prefieras -->
                <div class="total-cuentas-info">
                    <p>Total de Cuentas:</p>
                    <p class="total-number">{{ $patients->count() }}</p>
                </div>
            </div>
        @endif
    </div>
</div>

<style>
    .panel {
        /* Agrega estilos para el panel según tus preferencias */
        background-color: #f2f2f2;
        border-radius: 10px;
        padding: 20px;
        margin: 20px 0;
    }

    .total-cuentas {
        display: flex;
        align-items: center;
    }

    .total-cuentas i {
        font-size: 50px; /* Ajusta el tamaño según sea necesario */
        margin-right: 10px;
        color: #3490dc; /* Cambia el color según sea necesario */
    }

    .total-cuentas-info {
        text-align: center;
    }

    .total-cuentas-info p {
        margin: 0;
        font-size: 18px; /* Ajusta el tamaño según sea necesario */
        font-weight: bold;
    }

    .total-number {
        font-size: 24px; /* Ajusta el tamaño según sea necesario */
        font-weight: bold;
        color: #3490dc; /* Cambia el color según sea necesario */
    }
</style>




@endsection

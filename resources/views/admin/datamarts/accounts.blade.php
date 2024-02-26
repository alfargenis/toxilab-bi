@extends('layouts.main.index')
@section('container')
<style>
    .branding-info {
    display: none !important;
}

</style>
<div class="col-md-12 col-lg-12 order-8 mb-8">
    <div class="card h-100">
      <div class="card-body">
      <iframe width="100%" height="1020px" src="https://lookerstudio.google.com/embed/reporting/072d764f-1ed8-49d3-af35-c97f4631294b/page/TLFIC" frameborder="0" style="border:0" allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
      </div>
    </div>
  </div>
</div>
<script>
// Función para ocultar el enlace de Looker Studio
function ocultarLookerStudio() {
    const elemento = document.querySelector('.branding-info');
    if (elemento) {
        elemento.style.display = 'none';
    }
}

// Crear una instancia de MutationObserver
const observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
        ocultarLookerStudio(); // Llama a la función cada vez que hay cambios en el DOM
    });
});

// Especifica qué elemento del DOM observar
const config = { childList: true, subtree: true };

// Comienza a observar el documento
observer.observe(document.body, config);

// Asegúrate también de llamar a ocultarLookerStudio() inicialmente por si el elemento ya está en el DOM
ocultarLookerStudio();

// Función para verificar y eliminar el elemento
function eliminarLookerStudio() {
    const elemento = document.querySelector('.app-name');
    if (elemento && elemento.textContent.includes('Looker Studio')) {
        elemento.parentNode.removeChild(elemento);
        clearInterval(intervalo); // Detener el intervalo una vez que el elemento se ha eliminado
    }
}

// Establecer un intervalo para verificar la presencia del elemento cada 500 ms
var intervalo = setInterval(eliminarLookerStudio, 500);

document.addEventListener("DOMContentLoaded", function() {
    // Espera a que el contenido de la página esté completamente cargado
    var intervalo = setInterval(function() {
        // Busca el enlace por su clase específica y verifica si el texto del div interno es "Looker Studio"
        var enlaceLookerStudio = document.querySelector('a.branding-info');
        if (enlaceLookerStudio && enlaceLookerStudio.textContent.includes('Looker Studio')) {
            enlaceLookerStudio.style.display = 'none'; // Oculta el enlace
            clearInterval(intervalo); // Detiene la verificación una vez que el enlace se ha ocultado
        }
    }, 100); // Ajusta el intervalo según sea necesario
});

</script>
@endsection


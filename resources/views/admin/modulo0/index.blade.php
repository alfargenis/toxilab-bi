@extends('layouts.main.index')
@section('container')
<style>
    /* Estilo para el contenedor de iframes */
    .iframe-container {
        display: flex;
        justify-content: space-between; /* Para distribuir los iframes horizontalmente */
        width: 100%;
        height: auto; /* Cambiado de 100% a auto */
    }

    /* Estilo para cada iframe */
    .iframe-container iframe {
        width: 100%; /* Ajustar el ancho de los iframes */
        height: 800px; /* Cambiado de 1200px a 800px */
        border: 0;
    }

    .app-name {
    display: none !important;
}

</style>

<!-- Botones -->
<form method="GET" action="">
    <button type="button" name="button" value="button1" id="button1">Agregar grafica de Pacientes</button>
    <button type="button" name="button" value="button2" id="button2">Agregar grafica de Pruebas</button>
    <button type="button" name="button" value="button3">Agregar Buscador de Pacientes</button>
</form>

<?php
// Verificar si se ha hecho clic en algún botón
if(isset($_GET['button'])) {
    $button = $_GET['button'];

    // Dependiendo del botón, mostrar la información correspondiente
    switch($button) {
        case 'button1':
            break;
        case 'button2':
            break;
        case 'button3':
            echo "<p>Has hecho clic en el botón 3. Aquí va la información del botón 3.</p>";
            break;
        default:
            echo "<p>No se ha seleccionado ningún botón.</p>";
    }
}
?>

<div class="iframe-container">
    <iframe id="frame" src="https://lookerstudio.google.com/embed/reporting/35038bdd-0125-4c7a-8231-42ad8c23d50b/page/WZaqD"></iframe>
    <iframe id="frame2" src="https://lookerstudio.google.com/embed/reporting/6a121fe2-0adf-4f00-93f2-a7e726e701f6/page/0MdqD"></iframe>
</div>

<script>
    // Ocultar los iframes al cargar la página
    document.addEventListener("DOMContentLoaded", function() {
        var iframes = document.querySelectorAll("#iframe-container iframe");
        for (var i = 0; i < iframes.length; i++) {
            iframes[i].style.display = "none";
        }
    });

    // Función para mostrar el iframe correspondiente al hacer clic en un botón
    document.getElementById('button1').addEventListener('click', function() {
        document.getElementById('frame').style.display = 'block';
        // document.getElementById('frame2').style.display = 'block'; // Ocultar el otro iframe
        event.preventDefault(); // Evita que el formulario se envíe
    });

    document.getElementById('button2').addEventListener('click', function() {
        document.getElementById('frame2').style.display = 'block';
        // document.getElementById('frame').style.display = 'block'; // Ocultar el otro iframe
        event.preventDefault(); // Evita que el formulario se envíe
    });
</script>

@endsection

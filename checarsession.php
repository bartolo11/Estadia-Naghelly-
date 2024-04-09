<?php
session_start();
error_reporting(0);

// Tiempo de inactividad permitido en segundos (por ejemplo, 15 minutos)
$inactive_time = 60 * 60;

// Verifica si la sesión existe y si el usuario está autenticado
if (!isset($_SESSION['nombre'])) {
    echo '
    <script> 
        alert("Por favor, debes iniciar sesión");
        window.location = "l.php";
    </script>
    ';
    die();
    session_destroy();
} else {
    // Verifica el tiempo de inactividad
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactive_time)) {
        echo '
        <script> 
            alert("Has estado inactivo por mucho tiempo. Por favor, inicia sesión de nuevo.");
            window.location = "l.php";
        </script>
        ';
        session_unset();
        session_destroy();
        die();
    }
}

// Actualiza el tiempo de la última actividad en cada carga de página
$_SESSION['last_activity'] = time();
?>
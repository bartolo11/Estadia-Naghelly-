<?php
//Abre la sesión iniciada
session_start();
//destruye la sesión iniciada 
session_destroy();
//redirecciona al index para volver a iniciar sesión
header('Location: ../l.php');
?>
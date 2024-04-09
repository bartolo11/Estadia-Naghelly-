<?php
//Abre la sesión iniciada
session_start();
//Condiciona el redireccionamiento al home
//mediante la variable de session rol la
//cual es asignada al iniciar sesión
//por medio de la función validar la
//cual asigna el valor dependiendo
//en qué sector de la base de datos
//localice
if($_SESSION['rol']=='prof@'){
    header('Location: ../home.php');
}
if($_SESSION['rol']=='Enfermer@'){
    header('Location: ../homeE.php');
}
if($_SESSION['rol']=='Administrador@'){
    header('Location: ../homeAd.php');
}
?>
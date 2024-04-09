<?php

if(!empty($_GET["id"])){
   $idAsignarMaterial = $_GET["id"];
   $nuevoEstado = "revisado";


   $sql=$conexion->query(" UPDATE asignar_material SET estado = '$nuevoEstado' WHERE idAsignarMaterial = $idAsignarMaterial");
    if($sql==1){
        echo'<div class="alert alert-success">Adminstrador eliminada correctamente </div>';
    }else {
        echo'<div class="alert alert-warning">Error en la eliminacion</div>';
    }
}
    ?>

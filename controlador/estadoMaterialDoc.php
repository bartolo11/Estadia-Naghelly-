<?php
// Esta fuyncion permite actualizar el estado de las notificaciones para marcarlas como 
// revisadas lo cual permite que ya no se visualicen como notificaciones pendientes 
  if(!empty($_GET["id"])){
     $idAsignarMaterial = $_GET["id"];
     $nuevoEstado = "revisado";
  
  
     $sql=$conexion->query(" UPDATE notificaciones SET estado = '$nuevoEstado' WHERE idMaterial = $idAsignarMaterial");
      if($sql==1){
          echo'<div class="alert alert-success">Adminstrador eliminada correctamente </div>';
      }else {
          echo'<div class="alert alert-warning">Error en la eliminacion</div>';
      }
  }
  ?>
<?php
  //función eliminarEncuesta.php
  //obtiene un valor del id enviado por el botón 
  //eliminar de la vista gestionEncuesta.php y mediante
  //una consulta y condiciones para validar 
  //lleva a cabo la búsqueda en la 
  //tabla por medio de esa id y elimina el 
  //registro completo de esta 
  if(!empty($_GET["id"])){  //Condiciona la existencia de la variable id recibida por el method GEt

      $id=$_GET["id"]; //Asigna el valor de la variable id obtenida por el method get a la variable $id
      
      $sql=$conexion->query(" delete from encuesta where idEncuesta=$id");  //Elimina el registrop de encuesta mediante una consulta desde php 
      $sql_rEncuesta=$conexion->query(" delete from respuesta where idPregunta=$id");  //Elimina el registrop de respuestas encuesta mediante una consulta desde php
      if($sql==1){
          echo'<div class="alert alert-success">pregunta eliminada correctamente </div>';
      }else {
          echo'<div class="alert alert-warning">Error en la eliminacion</div>';
      }
  }
  ?>
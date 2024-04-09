<?php
  //función eliminarE.php
  //obtiene un valor del id enviado por el botón 
  //eliminar de la vista gestionEs.php o la vista gestionEsProfe.php y mediante
  //una consulta y condiciones para validar 
  //lleva a cabo la búsqueda en la 
  //tabla por medio de esa id y elimina el 
  //registro completo de esta 
  if(!empty($_GET["id"])){ //Condiciona la existencia de la variable id recibida por el method GEt

      $id=$_GET["id"]; //Asigna el valor de la variable id obtenida por el method get a la variable $id

      $sql=$conexion->query(" delete from estudiante where idestudiante=$id"); //Elimina el registro de estudiante mediante una consulta sql
      $sql_asignacion=$conexion->query(" delete from asignar_material where idEst=$id");  //Elimina el registro de material asignado relacionado al estudiante mediante una consulta sql
      $sql_notificacion=$conexion->query(" delete from notificaciones where idEst=$id");  //Elimina el registro de notificaciones relacionado al estudiante mediante una consulta sql
      $sql_REncuesta=$conexion->query(" delete from respuesta where idUsuario=$id");  //Elimina el registro de respuestas de la encuesta relacionado al estudiante mediante una consulta sql
      $sql_RTest=$conexion->query(" delete from rtest where idUsuario=$id");  //Elimina el registro de respuestas del Test relacionado al estudiante mediante una consulta sql
      $sql_categoria=$conexion->query(" delete from tabla_categorias where idUsuario=$id"); //Elimina el registro la categoria relacionado al estudiante mediante una consulta sql
      
      if($sql==1){
          echo'<div class="alert alert-success">Estudiante eliminada correctamente </div>';
      }else {
          echo'<div class="alert alert-warning">Error en la eliminacion</div>';
      }
  }
  ?>
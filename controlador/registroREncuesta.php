<?php
   if (!empty($_POST["btnregistrar"])) {
       if (!empty($_POST["Npreguntas"])) {
           $nombre = $_SESSION["idA"];
           $Npreguntas = $_POST["Npreguntas"];
   
           // Variable para controlar el éxito de todas las actualizaciones e inserciones
           $success = true;
   
           for ($i = 1; $i <= $Npreguntas; $i++) {
               $op = $_POST["categoria" . $i];
               $idPregunta = $_POST["idpreguntas" . $i];
   
               // Verificar si ya existe una entrada para esta pregunta y usuario
               $query_existence = $conexion->query("SELECT * FROM respuesta WHERE idUsuario = '$nombre' AND idPregunta = '$idPregunta'");
               if ($query_existence->num_rows > 0) {
                   // Si existe, actualiza la categoría
                   $sql = $conexion->query("UPDATE respuesta SET nivelS = '$op' WHERE idUsuario = '$nombre' AND idPregunta = '$idPregunta'");
               } else {
                   // Si no existe, realiza la inserción
                   $sql = $conexion->query("INSERT INTO respuesta (nivelS, idUsuario, idPregunta) VALUES ('$op', '$nombre', '$idPregunta')");
               }
   
               // Verifica si la operación fue exitosa
               if (!$sql) {
                   // Si una operación falla, actualiza $success a false
                   $success = false;
                   // Puedes agregar un mensaje de error específico si lo deseas
                   // echo '<div class="alert alert-danger">Error al actualizar/registrar la categoría para la pregunta ' . $i . '</div>';
               }
           }
   
           // Verifica el éxito de todas las operaciones
           if ($success) {
               echo '<div class="alert alert-success">Todos los registros fueron exitosos  </div>';
           } else {
               echo '<div class="alert alert-danger">Hubo errores al actualizar/registrar algunas categorías</div>';
           }
       } else {
           echo '<div class="alert alert-warning">El número de preguntas está vacío</div>';
       }
   }
   
?>
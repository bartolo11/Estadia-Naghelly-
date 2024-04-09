<?php
   if (!empty($_POST["btnregistrar"])) {
       if (!empty($_POST["Npreguntas"])) {
           $nombre = $_SESSION["idA"];
           $grupo = $_SESSION["grupo"];
           $Npreguntas = $_POST["Npreguntas"];
   
           // Variable para controlar el éxito de todas las actualizaciones e inserciones
           $success = true;
   
           for ($i = 1; $i <= $Npreguntas; $i++) {
               $categoria = $_POST["categoria" . $i];
               $idPregunta = $_POST["idpreguntas" . $i];
   
               // Verificar si ya existe una entrada para esta pregunta y usuario
               $query_existence = $conexion->query("SELECT * FROM Rtest WHERE idUsuario = '$nombre' AND idPregunta = '$idPregunta'");
               if ($query_existence->num_rows > 0) {
                   // Si existe, actualiza la categoría
                   $sql = $conexion->query("UPDATE Rtest SET categoria = '$categoria',grupo = '$grupo' WHERE idUsuario = '$nombre' AND idPregunta = '$idPregunta'");
               } else {
                   // Si no existe, realiza la inserción
                   $sql = $conexion->query("INSERT INTO Rtest (idUsuario, categoria, idPregunta, grupo) VALUES ('$nombre', '$categoria', '$idPregunta', '$grupo')");
               }
   
               // Verifica si la operación fue exitosa
               if (!$sql) {
                   // Si una operación falla, actualiza $success a false
                   $success = false;
                   // Puedes agregar un mensaje de error específico si lo deseas
                   // echo '<div class="alert alert-danger">Error al actualizar/registrar la categoría para la pregunta ' . $i . '</div>';
               }
           }
   
           $sql_cate = "SELECT categoria, COUNT(*) as conteo FROM rtest WHERE idUsuario = '$nombre' GROUP BY categoria ORDER BY conteo DESC LIMIT 1";
   
           $result2 = $conexion->query($sql_cate);
           
           // Variable para almacenar la categoría más repetida
           $categoria_mas_repetida = "";
           
           // Procesar los resultados de la consulta
           if ($result2->num_rows > 0) {
               $row = $result2->fetch_assoc();
               $categoria_mas_repetida = $row["categoria"];
           } else {
               echo "No se encontraron resultados.";
           }
           
           $query_existence2 = $conexion->query("SELECT * FROM tabla_categorias WHERE idUsuario = '$nombre'");
           if ($query_existence2->num_rows > 0) {
               // Si existe, actualiza la categoría
               $sqln = $conexion->query("UPDATE tabla_categorias SET categoria = '$categoria_mas_repetida' WHERE idUsuario = '$nombre'");
           } else {
               // Si no existe, realiza la inserción
               $sqln = $conexion->query("INSERT INTO tabla_categorias (idUsuario, categoria, grupo) VALUES ('$nombre', '$categoria_mas_repetida', '$grupo')");
           }
           
           // Verifica si la operación fue exitosa
           if (!$sqln) {
               // Si una operación falla, actualiza $success a false
               $success2 = false;
               // Puedes agregar un mensaje de error específico si lo deseas
               // echo '<div class="alert alert-danger">Error al actualizar/registrar la categoría para la pregunta ' . $i . '</div>';
           }
   
           // Verifica el éxito de todas las operaciones
           if ($success) {
               echo '<div class="alert alert-success">Todos los registros fueron exitosos</div>';
           } else {
               echo '<div class="alert alert-danger">Hubo errores al actualizar/registrar algunas categorías</div>';
           }
       } else {
           echo '<div class="alert alert-warning">El número de preguntas está vacío</div>';
       }
   }
   ?>
<?php
   include "modelo/conexion.php";
   include "checarsession.php";
   
   $id = $_GET["id"];
   
   $sql = $conexion->query("SELECT * FROM material_didactico WHERE idMaterial = $id");
   
   $datos = $sql->fetch_object();
   $nombre_archivo = $datos->titulo;
   $estilo=$datos->categoria;
   $ruta_archivo = 'material/' . $nombre_archivo;
   
   // Obtener el valor de "tipo" del material asociado
   $tipo_archivo = $datos->tipo;
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Modificar Material</title>
      <link href='css/formulario.css' rel='stylesheet' type='text/css'>
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   </head>
   <body>
      <form class="col-10 p-3 m-auto formulario" method="POST" enctype="multipart/form-data" >
         <h3>Modificar Material</h3>
         <hr color="#000000">
         <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
         <input type="hidden" name="tipo" value="<?= $tipo_archivo?>">
         <?php include "controlador/compartirMat.php"; ?>
         <?php if (($tipo_archivo === 'pdf')||($tipo_archivo === 'doc')||($tipo_archivo === 'pptx')){?>
         <div class="mb-3">
            Archivo actual: <a href="<?= $ruta_archivo ?>" download><?= $nombre_archivo ?></a>
         </div>
         <?php
            }?>
         <?php
            ?>
         <div class="mb-3">
            <label class="form-label">Selecciona los estudiantes</label>
            <?php
               $sqlEstudiantes = $conexion->query("SELECT e.* FROM estudiante e INNER JOIN tabla_categorias tc ON e.idEstudiante = tc.idUsuario WHERE tc.categoria = '$estilo'");
               while($fila = $sqlEstudiantes->fetch_array()) {
                   echo "<div>";
                   echo "<input type='checkbox' id='estudiante_" . $fila['idEstudiante'] . "' name='idE[]' value='" . $fila['idEstudiante'] . "'>";
                   echo "<label for='estudiante_" . $fila['idEstudiante'] . "'>" . $fila['nombre'] . " " . $fila['apellidoPaterno'] . " " . $fila['apellidoMaterno'] . " GRUPO " . $fila['grupo'] . "</label>";
                   echo "</div>";
               }
               ?>
         </div>
         <button type="submit" class="btn btn-outline-primary" name="btnregistrar" value="ok">Compartir material</button>
      </form>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      <script></script>
   </body>
</html>

<?php
  include "modelo/conexion.php";
  include "checarsession.php";
  
  $id = $_GET["id"];
  $sql = $conexion->query("SELECT * FROM pregunta WHERE idpreguntas = $id");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='css/formulario.css' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <form class="col-10 p-3 m-auto formulario" method="POST">
      <h3>Modificar pregunta</h3>
      <hr color="#000000">
      <input type="hidden" name="id" value="<?= $id ?>">
      
      <?php
        include "controlador/modificarPre.php";
        
        while($datos = $sql->fetch_object()){
          $numero = 1;         
          $sqlOpciones = $conexion->query("SELECT * FROM opcion WHERE idPregunta = $id");
      ?>
      
      <div class="mb-3">
        <label for="exampleInputEmail1" class="input_textual">Pregunta</label>
        <input type="text" class="form-control" name="pregunta" value="<?= $datos->descripción_p ?>" required>
      </div>

      <?php
        while ($opciones = $sqlOpciones->fetch_object()) {
      ?>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="input_textual">Opción- <?= $opciones->categoria ?></label>
        <input type="text" class="form-control" name="opcion<?= $numero ?>" value="<?= $opciones->descripción_op ?>" required>
      </div>
      <?php
         $numero++; // Incrementamos el índice para la siguiente opción
        }
      ?>
      <button type="submit" class="btn btn-outline-primary" name="btnregistrar" value="ok">Modificar pregunta</button>
    </form>
    <?php }
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
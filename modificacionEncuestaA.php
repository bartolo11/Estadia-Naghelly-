<?php
  //Se llama a la función que genera la 
  //conexión con la base de datos 
  include "modelo/conexion.php";
  include "checarsessionA.php";
  //Se genera la asignación del valor de la id que 
  //envía el boton de la modificación
  $id = $_GET["id"];
  //Se genera la consulta de los datos afiliados en 
  //la base de datos de la tabla encuesta relacionados 
  //a la id de encuesta
  $sql = $conexion->query("select * from encuesta where idEncuesta=$id ")
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificacion Encuesta</title>
    <link href='css/formulario.css' rel='stylesheet' type='text/css'>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body >
    <form class="col-10 p-3 m-auto formulario" method="POST">
      <h3>Modificar Pregunta Encuesta</h3>
      <hr    color="#000000";>
      <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
      <?php
        //Genera el llamado a la función de modificarEncuesta.php
        include "controlador/modificarEncuesta.php";
        //Genera un ciclo para obtener cada uno de los campos
        //de la tabla afiliados a la id de encuesta
        
        while($datos=$sql->fetch_object()){?>
       <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">Pregunta</label>
            <!--Genera el espacio para introducir el titulo de la pregunta de la encuesta  y envía el dato titulo
              por medio del method post del formulario
              -->
            <input type="text" aling="center" class="form-control" name="titulo" value="<?= $datos->descripcion ?>" required >
          </div>    
      <?php }
        ?>
      <button type="submit" class="btn btn-outline-primary" name="btnregistrar" value="ok">Modificar Pregunta</button>
    </form>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
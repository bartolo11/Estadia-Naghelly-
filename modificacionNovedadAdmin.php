<?php
  //Se llama a la función que genera la 
  //conexión con la base de datos 
  include "modelo/conexion.php";
  include "checarsessionA.php";
  //Se genera la asignación del valor de la id que 
  //envía el boton de la modificación
  $id = $_GET["id"];
  //Se genera la consulta de los datos afiliados en 
  //la base de datos de la tabla administrador relacionados 
  //a la id de administrador
  $sql = $conexion->query("select * from novedades where idnovedades=$id ")
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='css/formulario.css' rel='stylesheet' type='text/css'>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body >
    <form class="col-10 p-3 m-auto formulario" method="POST">
      <h3>Modificar Novedad</h3>
      <hr    color="#000000";>
      <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
      <?php
        //Genera el llamado a la función de modificarA.php
        include "controlador/modificarNovedad.php";
        //Genera un ciclo para obtener cada uno de los campos
        //de la tabla afiliados a la id de administrador
        
        while($datos=$sql->fetch_object()){?>
       <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">Titulo</label>
            <!--Genera el espacio para introducir el nombre del administrador y envía el dato nombre
              por medio del method post del formulario
              -->
            <input type="text" aling="center" class="form-control" name="titulo" value="<?= $datos->tituloNov ?>" required >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">descripción</label>
            <!--Genera el espacio para introducir el apellido paterno del administrador y envía 
              el dato apellidoP por medio del method post del formulario -->
            <input type="text" class="form-control" name="descripcion" value="<?= $datos->descripciónNov ?>" required>
          </div>
                
          
      <?php }
        ?>
      <button type="submit" class="btn btn-outline-primary" name="btnregistrar" value="ok">Modificar Novedad</button>
    </form>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
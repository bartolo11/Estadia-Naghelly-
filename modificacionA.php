<?php
  //Se llama a la función que genera la 
  //conexión con la base de datos 
  include "modelo/conexion.php";
  include "checarsession.php";
  //Se genera la asignación del valor de la id que 
  //envía el boton de la modificación
  $id = $_GET["id"];
  //Se genera la consulta de los datos afiliados en 
  //la base de datos de la tabla administrador relacionados 
  //a la id de administrador
  $sql = $conexion->query("select * from profesor where idProfesor=$id ")
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
      <h3>Modificar Profesor</h3>
      <hr    color="#000000";>
      <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
      <?php
        //Genera el llamado a la función de modificarA.php
        include "controlador/modificarA.php";
        //Genera un ciclo para obtener cada uno de los campos
        //de la tabla afiliados a la id de administrador
        
        while($datos=$sql->fetch_object()){?>
       <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">Nombre</label>
            <!--Genera el espacio para introducir el nombre del administrador y envía el dato nombre
              por medio del method post del formulario
              -->
            <input type="text" aling="center" class="form-control" name="nombre" value="<?= $datos->nombre ?>" required >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">Apellido paterno</label>
            <!--Genera el espacio para introducir el apellido paterno del administrador y envía 
              el dato apellidoP por medio del method post del formulario -->
            <input type="text" class="form-control" name="apellidoP" value="<?= $datos->apellidoP ?>" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">Apellido materno</label>
            <!--Genera el espacio para introducir el apellido materno del administrador y envía 
              el dato apellidoM por medio del method post del formulario -->
            <input type="text" class="form-control" name="apellidoM" value="<?= $datos->apellidoM ?>" >
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">Fecha de nacimiento</label>
            <!--Genera el espacio para introducir la fecha de nacimiento del administrador y envía 
              el dato fechan por medio del method post del formulario -->
            <input type="date" class="form-control" name="fechan" value="<?= $datos->fechaNacimiento ?>" required>
          </div>       
          <div class="mb-3">
            <label for="genero" class="input_textual">Género</label>
            <select class="form-control" id="genero" name="genero" required>
              <option disabled>Selecciona un género</option>
              <option value="F" <?= ($datos->generoP == 'F') ? 'selected' : '' ?>>Femenino</option>
              <option value="M" <?= ($datos->generoP == 'M') ? 'selected' : '' ?>>Masculino</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="input_textual">Correo Electronico</label>
            <!--Genera el espacio para introducir el apellido materno del administrador y envía 
              el dato apellidoM por medio del method post del formulario -->
            <input type="email" class="form-control" name="correo" value="<?= $datos->correoP ?>" required>
          </div>
      <?php }
        ?>
      <button type="submit" class="btn btn-outline-primary" name="btnregistrar" value="ok">Modificar profesor</button>
    </form>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
<?php
  //Se llama a la función que genera la 
  //conexión con la base de datos 
  include "modelo/conexion.php";
  //Se genera la asignación del valor de la id que 
  //envía el boton de la modificación
  $id = $_GET["id"];
  //Se genera la consulta de los datos afiliados en 
  //la base de datos de la tabla cita relacionados 
  //a la id de cita
  $sql = $conexion->query("select * from cita where idCita=$id ")
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body style="background: linear-gradient(to right, #cebbf5,#b460d5);">
    <form class="col-4 p-3 m-auto" method="POST">
      <h3>Modificar Administrador</h3>
      <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
      <?php
        //Genera el llamado a la función de modificarC.php
        include "controlador/modificarC.php";
         //Genera un ciclo para obtener cada uno de los campos
        //de la tabla afiliados a la id de cita
        while($datos=$sql->fetch_object()){?>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Fecha de la cita</label>
        <!--El código php contiene una consulta para traer un dato determinado de la base de datos                 
          en este caso es FechaCita el cual es la variable de la base para la fecha de la cita
          -->
        <input type="date" class="form-control" name="fechan" value="<?= $datos->FechaCita ?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Costo de la cita</label>
        <!--misma función -->
        <input type="text" class="form-control" name="costo" value="<?= $datos->Costo ?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Diagnostico</label>
        <!--misma función -->
        <input type="text" class="form-control" name="diagnostico" value="<?= $datos->Diagnostico ?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Cedula del doctor</label>
        <!--El código php contiene una consulta para traer la lista de la base de datos                 
          en este caso de los nombres completos de la tabla doctor y trae de vuelta el 
          valor de la cedula del doctor 
          -->
        <select name="cedula" id="CedulaD">
          <option value="">Selecciona el doctor</option>
          <?php
            $sql=$conexion->query(" SELECT * FROM doctor");
               
                while($fila=$sql->fetch_array()){
                    echo "<option value='".$fila['CedulaD']."' >".$fila['NombreD']." ".$fila['ApellidoPD']." ".$fila['ApellidoMD']."</option>";
                } 
                ?>
        </select>
      </div>
      <?php }
        ?>
      <button type="submit" class="btn btn-outline-primary" name="btnregistrar" value="ok">Modificar Cita
      </button>
    </form>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
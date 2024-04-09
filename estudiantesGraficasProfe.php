<?php 
  //Se genera la conexión con la base de datos
  include "modelo/conexion.php";
  include "checarsession.php";
  //inicia la sesión para poder utilizar los datos de la sesión
  session_start();

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href='css/nav.css' rel='stylesheet' type='text/css'>
    <link href='css/formulario.css' rel='stylesheet' type='text/css'>
    
</head>
<body>
  
<div class="page">
  <div class="pageHeader">
    <div class="title">Sistema web identificación de estilos de aprendizaje</div>
    <div class="userPanel"><span class="username" style="color:#000000";><i class="fa-solid fa-user-large"></i></svg>
          <?php   echo  $_SESSION["nombre"];
            ?></span></div>
  </div>
  <div class="main">
    <div class="nav">
      
      <div class="menu">
      <div class="title"><center>Menu</center></div>
      <ul>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
          </svg><a href="controlador/loginrol.php"> Inicio<a></li>

          <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
            <path d="M132.7 4.7l-64 64c-4.6 4.6-5.9 11.5-3.5 17.4s8.3 9.9 14.8 9.9H208c6.5 0 12.3-3.9 14.8-9.9s1.1-12.9-3.5-17.4l-64-64c-6.2-6.2-16.4-6.2-22.6 0zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H64zm96 96a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM80 400c0-26.5 21.5-48 48-48h64c26.5 0 48 21.5 48 48v16c0 17.7-14.3 32-32 32H112c-17.7 0-32-14.3-32-32V400zm192 0c0-26.5 21.5-48 48-48h64c26.5 0 48 21.5 48 48v16c0 17.7-14.3 32-32 32H304c-17.7 0-32-14.3-32-32V400zm32-128a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM356.7 91.3c6.2 6.2 16.4 6.2 22.6 0l64-64c4.6-4.6 5.9-11.5 3.5-17.4S438.5 0 432 0H304c-6.5 0-12.3 3.9-14.8 9.9s-1.1 12.9 3.5 17.4l64 64z"/></svg>
            <a href="registroEstudiante.php"> Resgistrar estudiante<a></li>
          
            <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"  viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
          <a href="gestionEsProfe.php"> gestionar estudiantes<a></li>
          <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
            <path d="M160 80c0-26.5 21.5-48 48-48h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V80zM0 272c0-26.5 21.5-48 48-48H80c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V272zM368 96h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H368c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48z"/></svg>
            <a href="estudiantesGraficasProfe.php"> Resultados por estudiantes<a></li>
          <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-details" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M13 5h8" />
            <path d="M13 9h5" />
            <path d="M13 15h8" />
            <path d="M13 19h5" />
            <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
            <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
          </svg>   <a href="registroPreguntaProfe.php"> Resgistrar Preguntas<a></li>
          <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-forms" width="23" height="23" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 3a3 3 0 0 0 -3 3v12a3 3 0 0 0 3 3" />
            <path d="M6 3a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3" />
            <path d="M13 7h7a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-7" />
            <path d="M5 7h-1a1 1 0 0 0 -1 1v8a1 1 0 0 0 1 1h1" />
            <path d="M17 12h.01" />
            <path d="M13 12h.01" />
          </svg><a href="gestionPreguntasProfe.php"> gestion Preguntas<a></li>
          <li>
          <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 512 512">
            <path d="M128 64c0-35.3 28.7-64 64-64H352V128c0 17.7 14.3 32 32 32H512V448c0 35.3-28.7 64-64 64H192c-35.3 0-64-28.7-64-64V336H302.1l-39 39c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l80-80c9.4-9.4 9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l39 39H128V64zm0 224v48H24c-13.3 0-24-10.7-24-24s10.7-24 24-24H128zM512 128H384V0L512 128z"/>
            </svg><a href="registroMaterialProfe.php">   Registro Material<a>
          </li>
          <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
            <path d="M0 96C0 43 43 0 96 0h96V190.7c0 13.4 15.5 20.9 26 12.5L272 160l54 43.2c10.5 8.4 26 .9 26-12.5V0h32 32c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384 96c-53 0-96-43-96-96V96zM64 416c0 17.7 14.3 32 32 32H352V384H96c-17.7 0-32 14.3-32 32z"/>
          </svg> <a href="gestionMaterialProfe.php">  Gestion Material<a> </li>
          <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M19.364 4.636a2 2 0 0 1 0 2.828a7 7 0 0 1 -1.414 7.072l-2.122 2.12a4 4 0 0 0 -.707 3.536l-11.313 -11.312a4 4 0 0 0 3.535 -.707l2.121 -2.123a7 7 0 0 1 7.072 -1.414a2 2 0 0 1 2.828 0z" />
            <path d="M7.343 12.414l-.707 .707a3 3 0 0 0 4.243 4.243l.707 -.707" />
          </svg>  Administrar Notificaciones</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
            <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
            <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" />
            <path d="M17 18h2" />
            <path d="M20 15h-3v6" />
            <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" />
          </svg>  Reporte</li>
          
          <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="23" height="23" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M9 12h12l-3 -3" />
            <path d="M18 15l3 -3" />
          </svg><a href="controlador/cerrarsesion.php"> Logout<a></li>
        </ul>
      </div>
    </div>
    <div class="view col-12 p-3 ">
      <!--img src="vistaA.jpeg"-->
      <div class="container-fluid row">
        <!--El formulario envía datos por medio del method post -->
        <div class="col-12 p-3">
        <form action="" method="get" class="col-10 p-3 m-auto formulario">
        <h3>Resultados individuales</h3>
           <hr    color="#000000";>
          <label for="buscarNombre" class="form-label">Buscar por apellido:</label>
          <input type="text" class="form-control" id="buscarNombre" name="buscarNombre">
          <button type="submit" class="btn btn-outline-primary">Buscar</button>
        </form>
        <?php
        include "modelo/conexion.php";

        // Verificar si hay un parámetro de búsqueda
        $filtroNombre = isset($_GET['buscarNombre']) ? $_GET['buscarNombre'] : '';

        // Modificar la consulta SQL para incluir el filtro por nombre solo si se proporciona un nombre
        if (!empty($filtroNombre)) {
          $sql = $conexion->query("SELECT * FROM estudiante WHERE apellidoPaterno LIKE '%$filtroNombre%'");
        } else {
          // Si no hay filtro de nombre, mostrar todos los registros
          $sql = $conexion->query("SELECT * FROM estudiante");
        }
        ?>
<!--Se genera el diseño de una tabla para organizar la información-->
        <table class="table">
          <thead class="table bg-light text-dark table-striped table-bordered border-dark table-primary">
            <tr>
              <th scope="col">id</th>
              <th scope="col">Nombres</th>
              <th scope="col">Apellidos paternos</th>
              <th scope="col">Apellidos maternos</th>
              <th scope="col">Grupo</th>
              <th scope="col">Consulta resultados</th>
            </tr>
          </thead>
          <tbody class="table table table-striped table-hover table-bordered border-primary">
            <!--Genera la llamada a la función conexión y genera una consulta a la base de datos de los registros 
              y por medio de un ciclo obtiene los datos de los registros y los asigna a una variable para imprimirlos en pantalla 
              -->
            <?php
              include "modelo/conexion.php";
              
              while($datos=$sql->fetch_object()){?>
            <tr>
              <td><?= $datos->idEstudiante ?></td>
              <td><?= $datos->nombre ?></td>
              <td><?= $datos->apellidoPaterno ?></td>
              <td><?= $datos->apellidoMaterno ?></td>
             
              <td><?= $datos->grupo ?></td>
              <td>
                <!--Se crea un enlace por medio del cual se llama la función modificacionA.php
                  el cual es un icono de color amarillo que indica la modificación  
                  para llevar a cabo el llenado nuevo de los datos del registro el cual obtiene
                  la información por medio de un dato de control de arrastre que es el id 
                  -->
                <a href="resultadoAlumnoProfe.php?id=<?= $datos->idEstudiante ?>" class="btn btn-small btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
            <path d="M160 80c0-26.5 21.5-48 48-48h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V80zM0 272c0-26.5 21.5-48 48-48H80c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V272zM368 96h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H368c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48z"/></svg>
                </a>
                
              </td>
            </tr>
            <?php }
              ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
  </div>
</div>
<script>
  // Función para validar la contraseña
  function validarContrasena() {
    var contrasena = document.getElementById('contraseña').value;

    // Expresión regular que requiere al menos 8 caracteres, una mayúscula y un carácter especial
    var regex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

    if (!regex.test(contrasena)) {
      alert('La contraseña debe tener al menos 8 caracteres, una mayúscula y un carácter especial.');
      return false;
    }

    return true;
  }
  function eliminar()
      {
        var respuesta = confirm("estas seguro que deseas eliminar");
          return respuesta;
      }
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</script>
</body>
</html>
<?php
  //Se genera la conexión con la base de datos
  include "modelo/conexion.php";

  include "checarsessionE.php";
  //inicia la sesión para poder utilizar los datos de la sesión
  session_start();

  

  $idE = $_SESSION["idA"];

   // Consulta para obtener la cantidad de estudiantes
   $sql = "SELECT COUNT(*) as cantidad_notificaciones FROM notificaciones
        WHERE idEst = $idE AND estado = 'sin revisar'";
$result = $conexion->query($sql);

   
   if ($result->num_rows > 0) {
       // Devolver la cantidad de estudiantes como JSON
       $row = $result->fetch_assoc();
       $cantidad_notificaciones = $row['cantidad_notificaciones'];
   } else {
       $cantidad_notificaciones = 0;
   }
 
   // Determina si hay notificaciones
   $hay_notificaciones = $cantidad_notificaciones > 0;

   $sql2 = "SELECT * FROM notificaciones
   WHERE idEst = $idE AND estado = 'sin revisar'";
$result2 = $conexion->query($sql2);



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
    <div class="userPanel"><span class="username"><?php   echo  $_SESSION["nombre"];
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
            <a href="MaterialEstCom.php">Material recomendado<a></li>
             <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
            <path d="M0 96C0 43 43 0 96 0h96V190.7c0 13.4 15.5 20.9 26 12.5L272 160l54 43.2c10.5 8.4 26 .9 26-12.5V0h32 32c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384 96c-53 0-96-43-96-96V96zM64 416c0 17.7 14.3 32 32 32H352V384H96c-17.7 0-32 14.3-32 32z"/>
          </svg> <a href="MaterialEst.php"> Material<a> </li>
          <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
            <path d="M0 24C0 10.7 10.7 0 24 0H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H24C10.7 48 0 37.3 0 24zM0 488c0-13.3 10.7-24 24-24H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H24c-13.3 0-24-10.7-24-24zM83.2 160a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM32 320c0-35.3 28.7-64 64-64h96c12.2 0 23.7 3.4 33.4 9.4c-37.2 15.1-65.6 47.2-75.8 86.6H64c-17.7 0-32-14.3-32-32zm461.6 32c-10.3-40.1-39.6-72.6-77.7-87.4c9.4-5.5 20.4-8.6 32.1-8.6h96c35.3 0 64 28.7 64 64c0 17.7-14.3 32-32 32H493.6zM391.2 290.4c32.1 7.4 58.1 30.9 68.9 61.6c3.5 10 5.5 20.8 5.5 32c0 17.7-14.3 32-32 32h-224c-17.7 0-32-14.3-32-32c0-11.2 1.9-22 5.5-32c10.5-29.7 35.3-52.8 66.1-60.9c7.8-2.1 16-3.1 24.5-3.1h96c7.4 0 14.7 .8 21.6 2.4zm44-130.4a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM321.6 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/>
          </svg><a href="respuestas.php"> Test<a></li>
          <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
            <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm64 192c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm64-64c0-17.7 14.3-32 32-32s32 14.3 32 32V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V160zM320 288c17.7 0 32 14.3 32 32v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V320c0-17.7 14.3-32 32-32z"/>
        </svg><a href="resultadoVistaEstudiante.php"> Mi estilo<a>
             </li>
       
             <li>
            

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                          <path d="M19.364 4.636a2 2 0 0 1 0 2.828a7 7 0 0 1 -1.414 7.072l-2.122 2.12a4 4 0 0 0 -.707 3.536l-11.313 -11.312a4 4 0 0 0 3.535 -.707l2.121 -2.123a7 7 0 0 1 7.072 -1.414a2 2 0 0 1 2.828 0z" />
                          <path d="M7.343 12.414l-.707 .707a3 3 0 0 0 4.243 4.243l.707 -.707" />
                        </svg><span class="badge bg-danger"><?php echo $cantidad_notificaciones; ?></span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon" width="20" height="20" viewBox="0 0 24 24"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  
  
                  
                    <ul class="navbar-nav">
                     
                      
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Notificaciones
                          
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php   
                              // Verificar si se obtuvieron resultados
                          if ($result2->num_rows > 0) {
                            // Inicializar una variable para almacenar las notificaciones
                            $notificaciones = '';
  
                            // Iterar sobre los resultados y construir la lista de notificaciones
                            while ($row = $result2->fetch_assoc()) {
                                $nombreEstudiante = $row['nombre'];
                                $descripcion = $row['descripcion'];
  
                                // Agregar cada nombre de estudiante como un elemento de lista a las notificaciones
                                
                                $notificaciones .= "<li><spam class='message-desciption'>$descripcion $nombreEstudiante</li>";
                            }
  
                            // Devolver las notificaciones como respuesta
                            echo $notificaciones;
                          } else {
                            // Si no hay notificaciones, mostrar un mensaje indicando que no hay notificaciones
                            echo '<li><a class="dropdown-item" href="#">No hay notificaciones.</a></li>';
                          }
  
                            ?>
                        </ul>
                      </li>
                    </ul>
                  
                    </div>
              </div>
                </nav>
            </li>
            <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
          <path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM105.8 229.3c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L216 328.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V314.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H158.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM160 416a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
        </svg><a href="encuesta.php"> encuesta<a></li>


          
          <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="23" height="23" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M9 12h12l-3 -3" />
            <path d="M18 15l3 -3" />
          </svg><a href="controlador/cerrarsesion.php"> Logout<a></li>
        </ul>
      </div>
    </div>
    <div class="view">
      
      <div class="container-fluid row">
        <!--El formulario envía datos por medio del method post -->
        <form  class=" col-10 p-3 formulario" method="POST"  >
          <h3>Test de identificación</h3>
          <hr    color="#000000";>

          <?php
          include "modelo/conexion.php";
          include "controlador/registroRespuestas.php";
          $Npreguntas = 0;
          
          $sql = $conexion->query("SELECT * FROM pregunta");
        
          while($datos = $sql->fetch_object()){
            $Npreguntas++;
            $id= $datos->idpreguntas;
                   
            
        ?>
        
        <div class="mb-3">
          <input type="hidden" name="idpreguntas<?= $Npreguntas ?>" value="<?= $id ?>">
          <label for="exampleInputEmail1" class="input_textual"><?= $datos->descripción_p ?></label>
          <select class="form-select" name="categoria<?= $Npreguntas ?>" id="categoria" required>
            <option value="">Selecciona una opción</option>
          <?php
          $sqlOpciones = $conexion->query("SELECT * FROM opcion WHERE idPregunta = $id");
        
          while($fila = $sqlOpciones->fetch_array()) {
            echo "<option value='".$fila['categoria']."' >".$fila['descripción_op']."  </option>";
        }
        ?>
    </select>
</div>
        <?php
        
          }
        ?>
        <input type="hidden" name="Npreguntas" value="<?php echo $Npreguntas; ?>">

        <button type="submit" class="btn btn-outline-primary" name="btnregistrar" value="ok">registrar respuestas</button>
      </form>
     
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>
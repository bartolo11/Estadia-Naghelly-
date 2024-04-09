<?php 
  //Se genera la conexión con la base de datos


  include "checarsessionE.php";
  //inicia la sesión para poder utilizar los datos de la sesión
  session_start();
 
include "modelo/conexion.php";
include "ver.php";

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

// ID del usuario específico

$idUsuarioEspecifico= $_SESSION["idA"];  // Aquí debes poner el ID del usuario específico
 
// Consulta SQL para contar las ocurrencias de cada categoría para el usuario específico
$sqlG = "SELECT categoria, COUNT(*) as conteo FROM rtest WHERE idUsuario = $idUsuarioEspecifico GROUP BY categoria";

$resultG = $conexion->query($sqlG);

// Array para almacenar las categorías y sus conteos
$categorias = [];
$conteos = [];

// Procesar los resultados de la consulta

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href='css/nav.css' rel='stylesheet' type='text/css'>
  <link href='css/formulario.css' rel='stylesheet' type='text/css'>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
          </svg> <a href="MaterialEst.php">  Material<a> </li>
          <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
            <path d="M0 24C0 10.7 10.7 0 24 0H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H24C10.7 48 0 37.3 0 24zM0 488c0-13.3 10.7-24 24-24H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H24c-13.3 0-24-10.7-24-24zM83.2 160a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM32 320c0-35.3 28.7-64 64-64h96c12.2 0 23.7 3.4 33.4 9.4c-37.2 15.1-65.6 47.2-75.8 86.6H64c-17.7 0-32-14.3-32-32zm461.6 32c-10.3-40.1-39.6-72.6-77.7-87.4c9.4-5.5 20.4-8.6 32.1-8.6h96c35.3 0 64 28.7 64 64c0 17.7-14.3 32-32 32H493.6zM391.2 290.4c32.1 7.4 58.1 30.9 68.9 61.6c3.5 10 5.5 20.8 5.5 32c0 17.7-14.3 32-32 32h-224c-17.7 0-32-14.3-32-32c0-11.2 1.9-22 5.5-32c10.5-29.7 35.3-52.8 66.1-60.9c7.8-2.1 16-3.1 24.5-3.1h96c7.4 0 14.7 .8 21.6 2.4zm44-130.4a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM321.6 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/>
          </svg><a href="respuestas.php"> Test<a></li>
          <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
            <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm64 192c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm64-64c0-17.7 14.3-32 32-32s32 14.3 32 32V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V160zM320 288c17.7 0 32 14.3 32 32v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V320c0-17.7 14.3-32 32-32z"/>
        </svg><a href="resultadoVistaEstudiante.php"> Mi estilo<a>
             </li>
       
          <li>
            

            
              <div class="dropdown">
                

                
                  <ul class="navbar-nav">
                   
                    
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M19.364 4.636a2 2 0 0 1 0 2.828a7 7 0 0 1 -1.414 7.072l-2.122 2.12a4 4 0 0 0 -.707 3.536l-11.313 -11.312a4 4 0 0 0 3.535 -.707l2.121 -2.123a7 7 0 0 1 7.072 -1.414a2 2 0 0 1 2.828 0z" />
            <path d="M7.343 12.414l-.707 .707a3 3 0 0 0 4.243 4.243l.707 -.707" />
          </svg>Notificaciones
                        <span class="badge bg-danger"><?php echo $cantidad_notificaciones; ?></span>
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
            
          </li>


          
          <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="23" height="23" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M9 12h12l-3 -3" />
            <path d="M18 15l3 -3" />
          </svg><a href="controlador/cerrarsesion.php"> Logout<a></li>
        </ul>
      </div>
    </div>
    <div class=" col-10 p-3 view" >
    <?php if ($resultG->num_rows > 0) {
    while($row = $resultG->fetch_assoc()) {
        $categorias[] = $row["categoria"];
        $conteos[] = $row["conteo"];
    }
} else {
    echo "No existen registro de sus respuestas.<br>";
}
// Consulta SQL para obtener la categoría de la tabla_categoria
$sqlCategoria = "SELECT categoria FROM tabla_categorias WHERE idUsuario = $idUsuarioEspecifico";
$resultCategoria = $conexion->query($sqlCategoria);
$categoriaMensaje = "";

if ($resultCategoria->num_rows > 0) {
    $rowCategoria = $resultCategoria->fetch_assoc();
    $categoriaMensaje = "La categoría del estudiante es: " . $rowCategoria["categoria"];
    $nn = $rowCategoria["categoria"];
    
    $query2 = "SELECT * FROM notificaciones WHERE nombre = '$nn' and idEst = $idE ";
$resultado2 = mysqli_query($conexion, $query2);
while ($fila2 = mysqli_fetch_assoc($resultado2)) {
  
  $idNotificacion=$fila2['idNotificaciones'];

}

    echo "$categoriaMensaje ";
} else {
    $categoriaMensaje = "No se encontró ninguna categoría asociada al estudiante.";
    echo "$categoriaMensaje";
}

// Colores de las barras (puedes ajustar estos colores según tus preferencias)
$colores = [
    'rgba(255, 99, 132, 0.5)',
    'rgba(54, 162, 235, 0.5)',
    'rgba(255, 206, 86, 0.5)',
    'rgba(75, 192, 192, 0.5)',
    'rgba(153, 102, 255, 0.5)',
    'rgba(255, 159, 64, 0.5)'
];

// Cerrar conexión
$conexion->close();?>
    <div style="width: 600px; height: 600px;">
        <canvas id="graficoCategorias"></canvas>

   

        <form  class=" col-10 p-3 formulario" method="POST"  >
          <h4>Marcar como revisado</h4>
          <hr    color="#000000";>
          <a href="resultadoVistaEstudiante.php?id=<?= $idNotificacion ?>" class="btn btn-small btn btn-primary">
          <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
          </a>
        </form>
    </div>        
    </div>
      <!-- Contenedor del gráfico -->
    
  </div>
</div>
<script>
        // Datos para el gráfico
        var categorias = <?php echo json_encode($categorias); ?>;
        var conteos = <?php echo json_encode($conteos); ?>;
        var colores = <?php echo json_encode($colores); ?>;

        // Configuración del gráfico
        var config = {
            type: 'bar',
            data: {
                labels: categorias,
                datasets: [{
                    label: 'Número de ocurrencias',
                    data: conteos,
                    backgroundColor: colores, // Usar los colores definidos
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Crear el gráfico
        var ctx = document.getElementById('graficoCategorias').getContext('2d');
        var myChart = new Chart(ctx, config);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script>
</body>
</html>
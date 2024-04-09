<?php 
   //Se genera la conexión con la base de datos
   include "modelo/conexion.php";
   include "checarsessionA.php";
   //inicia la sesión para poder utilizar los datos de la sesión
   session_start();
   
   include "controlador/eliminarMaterial.php";
   
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
   </head>
   <body>
      <div class="page">
         <div class="pageHeader">
            <div class="title">Sistema web identificación de estilos de aprendizaje</div>
            <div class="userPanel"><span class="username" style="color:#000000";><i class="fa-solid fa-user-large"></i></svg>
               <?php   echo  $_SESSION["nombre"];
                  ?></span>
            </div>
         </div>
         <div class="main">
            <div class="nav">
               <div class="menu">
                  <div class="title">
                     <center>Menu</center>
                  </div>
                  <ul>
                     <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                           <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                        </svg>
                        <a href="controlador/loginrol.php"> Inicio
                        <a>
                     </li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                     <path d="M132.7 4.7l-64 64c-4.6 4.6-5.9 11.5-3.5 17.4s8.3 9.9 14.8 9.9H208c6.5 0 12.3-3.9 14.8-9.9s1.1-12.9-3.5-17.4l-64-64c-6.2-6.2-16.4-6.2-22.6 0zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H64zm96 96a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM80 400c0-26.5 21.5-48 48-48h64c26.5 0 48 21.5 48 48v16c0 17.7-14.3 32-32 32H112c-17.7 0-32-14.3-32-32V400zm192 0c0-26.5 21.5-48 48-48h64c26.5 0 48 21.5 48 48v16c0 17.7-14.3 32-32 32H304c-17.7 0-32-14.3-32-32V400zm32-128a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM356.7 91.3c6.2 6.2 16.4 6.2 22.6 0l64-64c4.6-4.6 5.9-11.5 3.5-17.4S438.5 0 432 0H304c-6.5 0-12.3 3.9-14.8 9.9s-1.1 12.9 3.5 17.4l64 64z"/></svg>
                     <a href="registroUs.php"> Resgistrar usuario<a></li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
                     <path d="M0 24C0 10.7 10.7 0 24 0H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H24C10.7 48 0 37.3 0 24zM0 488c0-13.3 10.7-24 24-24H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H24c-13.3 0-24-10.7-24-24zM83.2 160a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM32 320c0-35.3 28.7-64 64-64h96c12.2 0 23.7 3.4 33.4 9.4c-37.2 15.1-65.6 47.2-75.8 86.6H64c-17.7 0-32-14.3-32-32zm461.6 32c-10.3-40.1-39.6-72.6-77.7-87.4c9.4-5.5 20.4-8.6 32.1-8.6h96c35.3 0 64 28.7 64 64c0 17.7-14.3 32-32 32H493.6zM391.2 290.4c32.1 7.4 58.1 30.9 68.9 61.6c3.5 10 5.5 20.8 5.5 32c0 17.7-14.3 32-32 32h-224c-17.7 0-32-14.3-32-32c0-11.2 1.9-22 5.5-32c10.5-29.7 35.3-52.8 66.1-60.9c7.8-2.1 16-3.1 24.5-3.1h96c7.4 0 14.7 .8 21.6 2.4zm44-130.4a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM321.6 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg>  
                     <a href="gestionPr.php">Gestionar profesores<a></li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"  viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                     <a href="gestionEs.php"> Gestionar estudiantes<a></li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                     <path d="M160 80c0-26.5 21.5-48 48-48h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V80zM0 272c0-26.5 21.5-48 48-48H80c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V272zM368 96h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H368c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48z"/></svg>  
                     <a href="estudiantesGraficas.php">Resultados por estudiante<a></li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-details" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <path d="M13 5h8" />
                     <path d="M13 9h5" />
                     <path d="M13 15h8" />
                     <path d="M13 19h5" />
                     <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                     <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                     </svg>   <a href="registroPregunta.php"> Resgistrar Test<a></li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-forms" width="23" height="23" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <path d="M12 3a3 3 0 0 0 -3 3v12a3 3 0 0 0 3 3" />
                     <path d="M6 3a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3" />
                     <path d="M13 7h7a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-7" />
                     <path d="M5 7h-1a1 1 0 0 0 -1 1v8a1 1 0 0 0 1 1h1" />
                     <path d="M17 12h.01" />
                     <path d="M13 12h.01" />
                     </svg><a href="gestionPreguntas.php"> Gestión Test<a></li>
                     <li>
                     <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 512 512">
                     <path d="M128 64c0-35.3 28.7-64 64-64H352V128c0 17.7 14.3 32 32 32H512V448c0 35.3-28.7 64-64 64H192c-35.3 0-64-28.7-64-64V336H302.1l-39 39c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l80-80c9.4-9.4 9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l39 39H128V64zm0 224v48H24c-13.3 0-24-10.7-24-24s10.7-24 24-24H128zM512 128H384V0L512 128z"/>
                     </svg><a href="registroMaterial.php"> Registro Material<a>
                     </li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                     <path d="M0 96C0 43 43 0 96 0h96V190.7c0 13.4 15.5 20.9 26 12.5L272 160l54 43.2c10.5 8.4 26 .9 26-12.5V0h32 32c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384 96c-53 0-96-43-96-96V96zM64 416c0 17.7 14.3 32 32 32H352V384H96c-17.7 0-32 14.3-32 32z"/>
                     </svg> <a href="gestionMaterial.php">  Gestión Material<a> </li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                     <path d="M168 80c-13.3 0-24 10.7-24 24V408c0 8.4-1.4 16.5-4.1 24H440c13.3 0 24-10.7 24-24V104c0-13.3-10.7-24-24-24H168zM72 480c-39.8 0-72-32.2-72-72V112C0 98.7 10.7 88 24 88s24 10.7 24 24V408c0 13.3 10.7 24 24 24s24-10.7 24-24V104c0-39.8 32.2-72 72-72H440c39.8 0 72 32.2 72 72V408c0 39.8-32.2 72-72 72H72zM176 136c0-13.3 10.7-24 24-24h96c13.3 0 24 10.7 24 24v80c0 13.3-10.7 24-24 24H200c-13.3 0-24-10.7-24-24V136zm200-24h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zM200 272H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/>
                     </svg> <a href="registroNovedadAdmin.php"> Registro Novedades<a></li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"> 
                     <path d="M480 32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9L381.7 53c-48 48-113.1 75-181 75H192 160 64c-35.3 0-64 28.7-64 64v96c0 35.3 28.7 64 64 64l0 128c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V352l8.7 0c67.9 0 133 27 181 75l43.6 43.6c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V300.4c18.6-8.8 32-32.5 32-60.4s-13.4-51.6-32-60.4V32zm-64 76.7V240 371.3C357.2 317.8 280.5 288 200.7 288H192V192h8.7c79.8 0 156.5-29.8 215.3-83.3z"/>
                     </svg> <a href="gestionNovedadesAdmin.php"> Gestión Novedades<a></li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                     <path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                     </svg><a href="registroEncuestaA.php"> Registro Encuesta<a></li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                     <path d="M192 0c-41.8 0-77.4 26.7-90.5 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H282.5C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM105.8 229.3c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L216 328.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V314.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H158.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM160 416a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
                     </svg><a href="gestionEncuestaA.php"> Gestión Encuesta<a></li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                     <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                     <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" />
                     <path d="M17 18h2" />
                     <path d="M20 15h-3v6" />
                     <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" />
                     </svg><a href="formularioReporteA.php">Reporte<a></li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-export" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3" />
                     <path d="M4 6v6c0 1.657 3.582 3 8 3c1.118 0 2.183 -.086 3.15 -.241" />
                     <path d="M20 12v-6" />
                     <path d="M4 12v6c0 1.657 3.582 3 8 3c.157 0 .312 -.002 .466 -.005" />
                     <path d="M16 19h6" />
                     <path d="M19 16l3 3l-3 3" />
                     </svg> <a href="generaR.php"> Respaldo<a></li>
                     <li><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-cog" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3" />
                     <path d="M4 6v6c0 1.657 3.582 3 8 3c.21 0 .42 -.003 .626 -.01" />
                     <path d="M20 11.5v-5.5" />
                     <path d="M4 12v6c0 1.657 3.582 3 8 3" />
                     <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                     <path d="M19.001 15.5v1.5" />
                     <path d="M19.001 21v1.5" />
                     <path d="M22.032 17.25l-1.299 .75" />
                     <path d="M17.27 20l-1.3 .75" />
                     <path d="M15.97 17.25l1.3 .75" />
                     <path d="M20.733 20l1.3 .75" />
                     </svg><a href="respaldo"> Restauración DB<a></li>
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
            <h3>Gestión Material</h3>
            <hr    color="#000000";>
            </form>
            <?php
               include "modelo/conexion.php";
               
               // Verificar si se ha enviado un filtro por materia
               if (isset($_GET['materia'])) {
                   $filtro_materia = $_GET['materia'];
                   $query = "SELECT * FROM material_didactico WHERE materia_asosiada = '$filtro_materia' ORDER BY fechaPublicacion ASC";
               } else {
                   $query = "SELECT * FROM material_didactico ORDER BY fechaPublicacion ASC"; //order by fecha_publicacion desc
               }
               
               $resultado = mysqli_query($conexion, $query);
               ?>
            <form method="GET" action="" class="col-10 p-3 m-auto formulario">
            <div class="mb-3">
            <label for="materia" class="input_textual"><h4>Filtrar por Materia:</h4></label>
            <select class="form-control" id="materia" name="materia" required>
            <option value="">Selecciona una materia</option>
            <option value="Habilidades Gerenciales">Habilidades Gerenciales</option>
            <option value="Matemáticas para Ingeniería II">Matemáticas para Ingeniería II</option>
            <option value="Sistemas Operativos">Sistemas Operativos</option>
            <option value="Programación Orientada a Objetos">Programación Orientada a Objetos</option>
            <option value="Interconexión de Redes">Interconexión de Redes</option>
            <option value="Administración de Base de Datos">Administración de Base de Datos</option>
            </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
            <a href="?clear=true" class="btn btn-secondary">Limpiar Filtro</a>
            </form>
            <table class="table">
            <thead class="table bg-light text-dark table-striped table-bordered border-dark table-primary">
            <tr>
            <th scope="col">Id </th>
            <th scope="col">Materia Asociada</th>
            <th scope="col">Nombre del Archivo</th>
            <th scope="col">Tipo de Archivo</th>
            <th scope="col">Descripción</th>
            <th scope="col">Fecha de Publicación</th>
            <th scope="col">Descargar</th>
            <th scope="col">Categoría</th>
            <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody class="table table table-striped table-hover table-bordered border-primary">
            <?php
               while ($fila = mysqli_fetch_assoc($resultado)) {
                 $nombre = $fila['idMaterial'];
                   echo '<tr>';
                   echo '<td>' . $fila['idMaterial'] . '</td>';
                   echo '<td>' . $fila['materia_asosiada'] . '</td>';
                   echo '<td>' . $fila['titulo'] . '</td>';
                   echo '<td>' . $fila['tipo'] . '</td>'; // Tipo de archivo
                   echo '<td>' . $fila['descripción'] . '</td>'; // Descripción
                   echo '<td>' . $fila['fechaPublicacion'] . '</td>'; // Fecha de Publicación
                   $ruta_archivo = 'material/' . $fila['titulo'];
                   echo '<td><a href="' . $ruta_archivo . '" download>Descargar</a></td>';
                   echo '<td>' . $fila['categoria'] . '</td>';
                   ?>
            <td>
            <!--Se crea un enlace por medio del cual se llama la función modificacionA.php
               el cual es un icono de color amarillo que indica la modificación  
               para llevar a cabo el llenado nuevo de los datos del registro el cual obtiene
               la información por medio de un dato de control de arrastre que es el id 
               -->
            <a href="modificacionMaterial.php?id=<?= $nombre ?>" class="btn btn-small btn-warning">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
            <path d="M16 5l3 3" />
            <path d="M9 7.07a7.002 7.002 0 0 0 1 13.93a7.002 7.002 0 0 0 6.929 -5.999" />
            </svg>
            </a>
            <!--Se crea un enlace por medio del cual se llama a sí misma 
               la pagina para llevar a cabo la eliminación del registro además de
               que llama la funcion Script con el onclick para llevar a 
               cabo la función de eliminación 
               -->
            <a onclick="return eliminar()" href="gestionMaterial.php?id=<?= $nombre ?>"  class="btn btn-small btn-danger" >
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <line x1="4" y1="7" x2="20" y2="7" />
            <line x1="10" y1="11" x2="10" y2="17" />
            <line x1="14" y1="11" x2="14" y2="17" />
            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
            </svg>
            </a>
            </td>
            <?php
               echo '</tr>';
               }
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
         function eliminar()
             {
               var respuesta = confirm("estas seguro que deseas eliminar");
                 return respuesta;
             }
           
      </script>
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   </body>
</html>
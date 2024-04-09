<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/estilos.css" rel="stylesheet" type="text/css">
      <title>historialmedico</title>
   </head>
   <body>
      <hr>
      <main class="main">
         <div class="login-page">
            <div class="form">
               <h1 >Generear historial medico</h1>
               <br><br>
               <!--El formulario envía datos por medio del method post así como
                  hace la llamada al controlador reporteHistorial.php mediante el action 
                  -->
               <form class="login-form" method="POST" action="controlador/reporteHistorial.php">
                  <!--Genera el espacio para introducir el numero de seguro social del paciente y envía el dato nombre
                     por medio del method post del formulario
                     -->      
                  <label for="exampleInputEmail1" class="form-label">paciente</label>
                  <select name="nss" id="nss">
                     <option value="">Selecciona el paciente </option>
                     <?php
                        include "modelo/conexion.php";
                        $sql=$conexion->query(" SELECT * FROM paciente");
                              
                        while($fila=$sql->fetch_array()){
                            echo "<option value='".$fila['NSS']."' >".$fila['NombreP']." ".$fila['ApellidoPP']." ".$fila['ApellidoMP']."</option>";
                        } 
                        ?>
                  </select>
                  <br><br><br><br>
                  <button>Generar PDF</button>
                  <!--Se llama al controlador loginrol.php para volver a la página del home mediante un enlace con una forma de casa
                     -->
                  <center>
                     <a href="controlador/loginrol.php">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#a905b6" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                           <polyline points="5 12 3 12 12 3 21 12 19 12" />
                           <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                           <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                     </a>
                  </center>
               </form>
            </div>
         </div>
         </form>
         </div> 
      </main>
   </body>
</html>
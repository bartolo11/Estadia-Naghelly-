<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registro Doctores</title>
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   </head>
   <body style="background: linear-gradient(to right, #cebbf5,#b460d5);">
      <!--Se crea el espacio para el encabezado de la página en el cual se colocó el nombre de del sistema y se creó la llamada a la función
         loginrol.php la cual regresa al login específico del tipo de usuario como un icono de una pequeña casa
          -->
      <header class="header" >
         <div  class="cabecera" style=" margin-top: 15px; font-family: 'Times New Roman', 'Times', 'serif'; background: linear-gradient(to right, #FFEA98,#FFA775); justify-content:space-between; text-align: center;">
            <h3>
               <img src="img/upemor.png" style="align-items: right;  width: 100px;  heigth: 100px; margin: 15px;"> Sistema integral para pacientes de cuidados paliativos  
               <a href="controlador/loginrol.php">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="50" height="50" viewBox="0 0 24 24" stroke-width="1.5" stroke="#a905b6" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <polyline points="5 12 3 12 12 3 21 12 19 12" />
                     <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                     <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                  </svg>
               </a>
            </h3>
         </div>
      </header>
      <!--Se genera la llamada a la función eliminarDoc.php la cual genera la eliminación del doctor por medio
         de un dato de control el cual es la id del doctor  que se registra si es que se selecciona la opción
         eliminar de acuerdo al número de registro que se seleccione.
         Así como a la función conexion.php la cual contiene el código para la conexión a la base de datos
         -->
      <?php
         include "modelo/conexion.php";
         include "controlador/eliminarDoc.php";
         ?>
      <div class="container-fluid row">
         <!--El formulario envía datos por medio del method post -->
         <form class="col-4 p-3" method="POST">
            <h3>Registro de Doctores</h3>
            <!--Se genera la llamada a la función registroDoc.php la cual genera el registro de doctor por medio
               del botón registrar del formulario. 
               Así como a la función conexion.php la cual contiene el código para la conexión a la base de datos
               -->
            <?php
               include "modelo/conexion.php";
               include "controlador/registroDoc.php";
               ?>
            <!--Genera el espacio para introducir el nombre del doctor y envía el dato nombre
               por medio del method post del formulario
               -->
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Nombre del doctor</label>
               <input type="text" class="form-control" name="nombre" >
            </div>
            <!--Genera el espacio para introducir el apellido paterno del doctor y envía el dato apellidoP
               por medio del method post del formulario
               -->
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Apellido paterno del doctor</label>
               <input type="text" class="form-control" name="apellidoP" >
            </div>
            <!--Genera el espacio para introducir el apellido materno del doctor y envía el dato apellidoM
               por medio del method post del formulario
               -->             
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Apellido materno del doctor</label>
               <input type="text" class="form-control" name="apellidoM" >
            </div>
            <!--Genera el espacio para introducir la fecha de nacimiento del doctor y envía el dato fechan
               por medio del method post del formulario
               -->             
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
               <input type="date" class="form-control" name="fechan" >
            </div>
            <!--Genera el espacio para introducir la cedula del doctor y envía el dato cedula
               por medio del method post del formulario
               -->
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Cedula</label>
               <input type="text" class="form-control" name="cedula" >
            </div>
            <!--Genera el espacio para introducir la contraseña de usuario del doctor y envía el dato nombre
               por medio del method post del formulario
               -->
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Contraseña</label>
               <input type="text" class="form-control" name="contraseña" >
            </div>
            <button type="submit" class="btn btn-outline-primary" name="btnregistrar" value="ok">Registrar</button><br>
            <br>
         </form>
         <div class="col-8 p-4">
            <!--Se genera el diseño de una tabla para organizar la información-->
            <table class="table">
               <thead class="table bg-light text-dark table-striped table-bordered border-dark">
                  <tr>
                     <th scope="col">idDoctor</th>
                     <th scope="col">Nombres</th>
                     <th scope="col">Apellido paternos</th>
                     <th scope="col">Apellido maternos</th>
                     <th scope="col">Fecha de nacimiento</th>
                     <th scope="col">Cedula</th>
                     <th scope="col"></th>
                  </tr>
               </thead>
               <tbody class="table bg-light text-dark  table-striped table-bordered border-dark">
                  <!--Genera la llamada a la función conexión y genera una consulta a la base de datos de los registros 
                     y por medio de un ciclo obtiene los datos de los registros y los asigna a una variable para imprimirlos en pantalla 
                     -->
                  <?php
                     include "modelo/conexion.php";
                     $sql=$conexion->query(" select * from doctor ");
                     while($datos=$sql->fetch_object()){?>
                  <tr>
                     <td><?= $datos->idDoctor ?></td>
                     <td><?= $datos->NombreD ?></td>
                     <td><?= $datos->ApellidoPD ?></td>
                     <td><?= $datos->ApellidoMD ?></td>
                     <td><?= $datos->FeNacD ?></td>
                     <td><?= $datos->CedulaD ?></td>
                     <td>
                        <!--Se crea un enlace por medio del cual se llama la función modificacionDoc.php
                           el cual es un icono de color amarillo que indica la modificación  
                           para llevar a cabo el llenado nuevo de los datos del registro el cual obtiene
                           la información por medio de un dato de control de arrastre que es el id 
                           -->
                        <a href="modificacionDoc.php?id=<?= $datos->idDoctor ?>"  class="btn btn-small btn-warning">
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
                        <a onclick="return eliminar()" href="gestionD.php?id=<?= $datos->idDoctor ?>"  class="btn btn-small btn-danger" >
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
                  </tr>
                  <?php }
                     ?>
               </tbody>
            </table>
         </div>
      </div>
      <!--Se genera el espacio de pie de la página en el cual colocamos la dirección de la empresa-->
      <footer class="footer"  style="font-family: 'Times New Roman', 'Times', 'serif'; background: linear-gradient(to right, #FFEA98,#FFA775); justify-content:space-between; text-align: center;">
         <h4 style="color: #f12e2e;">Dirección: Boulevard Cuauhnáhuac #566, Col. Lomas del Texcal, Jiutepec, Morelos. CP 62550     Tel: (777) 229-3517        Email: informes@upemor.edu.mx</h4>
      </footer>
      <!--Se crea la funcion Script para confirmar la eliminación-->
      <script>
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
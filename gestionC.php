 <!DOCTYPE html>
 <html lang="en">
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Registro Citas</title>
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
       <!--Se genera la llamada a la función eliminarC.php la cual genera la eliminación de cita por medio
          de un dato de control el cual es la id de la cita  que se registra si es que se selecciona la opción
          eliminar de acuerdo al número de registro que se seleccione.
          Así como a la función conexion.php la cual contiene el código para la conexión a la base de datos
          -->
       <?php
          include "modelo/conexion.php";
          include "controlador/eliminarC.php";
          ?>
       <div class="container-fluid row">
          <!--El formulario envía datos por medio del method post -->
          <form class="col-3 p-3" method="POST">
             <h3>Registro de Citas</h3>
             <!--Se genera la llamada a la función registroC.php la cual genera el registro de cita por medio
                del botón registrar del formulario. 
                Así como a la función conexion.php la cual contiene el código para la conexión a la base de datos
                -->
             <?php
                include "modelo/conexion.php";
                include "controlador/registroC.php";
                ?>
             <!--Genera el espacio para introducir la fecha de la cita y envía el dato fechan
                por medio del method post del formulario
                -->
             <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de la cita</label>
                <input type="date" class="form-control" name="fechan" >
             </div>
             <!--Genera el espacio para introducir el costo de la cita y envía 
                el dato costo por medio del method post del formulario -->
             <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Costo de la cita</label>
                <input type="text" class="form-control" name="costo" >
             </div>
             <!--Genera el espacio para introducir el costo de la cita y envía 
                el dato costo por medio del method post del formulario -->
             <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Diagnostico</label>
                <input type="text" class="form-control" name="diagnostico" >
             </div>
             <!--Genera el espacio para seleccionar el doctor de la cita y envía 
                el dato cedula por medio del method post del formulario -->
             <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Doctor</label>
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
             <!--Genera el espacio para seleccionar el paciente de la cita y envía 
                el dato nss por medio del method post del formulario -->
             <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Paciente</label>
                <select name="nss" id="nss">
                   <option value="">Selecciona al paciente</option>
                   <?php  
                      $sql=$conexion->query(" SELECT * FROM paciente");
                         
                          while($fila=$sql->fetch_array()){
                              echo "<option value='".$fila['NSS']."' >".$fila['NombreP']." ".$fila['ApellidoPP']." ".$fila['ApellidoMP']."</option>";
                          } 
                          ?>
                </select>
             </div>
             <button type="submit" class="btn btn-outline-primary" name="btnregistrar" value="ok">Registrar</button>
          </form>
          <div class="col-9 p-4">
             <!--Se genera el diseño de una tabla para organizar la información-->
             <table class="table">
                <thead class="table bg-light text-dark table-striped table-bordered border-dark">
                   <tr>
                      <th scope="col">idCita</th>
                      <th scope="col">Fecha cita</th>
                      <th scope="col">costo de la cita</th>
                      <th scope="col">diagnostico</th>
                      <th scope="col">Cedula del doctor</th>
                      <th scope="col">NSS del paciente</th>
                      <th scope="col"></th>
                   </tr>
                </thead>
                <tbody class="table bg-light text-dark  table-striped table-bordered border-dark">
                   <!--Genera la llamada a la función conexión y genera una consulta a la base de datos de los registros 
                      y por medio de un ciclo obtiene los datos de los registros y los asigna a una variable para imprimirlos en pantalla 
                      -->
                   <?php
                      include "modelo/conexion.php";
                      $sql=$conexion->query(" select * from cita ");
                      while($datos=$sql->fetch_object()){?>
                   <tr>
                      <td><?= $datos->idCita ?></td>
                      <td><?= $datos->FechaCita ?></td>
                      <td><?= $datos->Costo ?></td>
                      <td><?= $datos->Diagnostico ?></td>
                      <td><?= $datos->CedulaD ?></td>
                      <td><?= $datos->Nsspac ?></td>
                      <td>
                         <!--Se crea un enlace por medio del cual se llama la función modificacionA.php
                            el cual es un icono de color amarillo que indica la modificación  
                            para llevar a cabo el llenado nuevo de los datos del registro el cual obtiene
                            la información por medio de un dato de control de arrastre que es el id 
                            -->
                         <a href="modificacionC.php?id=<?= $datos->idCita ?>" class="btn btn-small btn-warning">
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
                         <a onclick="return eliminar()" href="gestionC.php?id=<?= $datos->idCita ?>"  class="btn btn-small btn-danger" >
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
          <h4 >Dirección: Boulevard Cuauhnáhuac #566, Col. Lomas del Texcal, Jiutepec, Morelos. CP 62550     Tel: (777) 229-3517        Email: informes@upemor.edu.mx</h4>
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
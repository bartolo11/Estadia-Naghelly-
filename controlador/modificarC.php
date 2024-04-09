<?php
  //Crea la conexion con la base de datos
  $conexion=mysqli_connect("localhost","root","","prueba1");
  
    //condiciona el que se haya presionado el botón
    //para hacer la modificación del registro en 
    //la vista modificacionC.php y así mismo 
    //condiciona la existencia de datos en el formulario 
    //para llevar a cabo el proceso de actualización 
  if(!empty($_POST["btnregistrar"])){
      if(!empty($_POST["costo"]) and !empty($_POST["fechan"]) and !empty($_POST["cedula"])){
         
              //variables optenidas mediante el method post 
              //del formulario de modificacionC.php 
              //Datos de la cita  
          $id=$_POST["id"];
          $costo=$_POST["costo"];               //costo de la cita
          $diagnostico=$_POST["diagnostico"];   //disgnostico de la cita 
          $fecha=$_POST["fechan"];              //fecha de la cita 
          $cedula=$_POST["cedula"];             //cedula del doctor
         
          //consulta a la ase la existencia del registro en 
          //la tabla doctor en base a la cedula 
          $consulta2="SELECT * FROM doctor WHERE CedulaD='$cedula' ";
          $resultado2=mysqli_query($conexion,$consulta2);
          $filas=mysqli_num_rows($resultado2);
          //condiciona la existencia de registros 
          if(mysqli_num_rows($resultado2)>0){
          
          //realiza el proceso de modificacion de los datos del registro por los nuevos
          $sql=$conexion->query("update cita set FechaCita='$fecha', Costo='$costo', Diagnostico='$diagnostico', CedulaD='$cedula' where idCita=$id");
          if ($sql==1) {
              //redirecciona a la vista gestionC.php
              header("location:gestionC.php");
          } else {
              //envía alerta sobre error
              echo'<div class="alert alert-danger">Error al modificar Citar </div>';
          }
         }
            else{
              //envía alerta de doctor inexistente
              echo '<script type="text/javascript">'; 
              echo 'alert("Doctor inexistente");'; 
              echo 'window.location = "gestionC.php";';
              echo '</script>';
            }
        }else{
          //envía alerta de campos vacíos
                echo'<div class="alert alert-warning">Campos vacios</div>';
            }
        }
        ?>
<?php
  //condiciona el que se haya presionado el botón
  //para hacer la modificación del registro en 
  //la vista modificacionD.php y así mismo 
  //condiciona la existencia de datos en el formulario 
  //para llevar a cabo el proceso de actualización 
  if(!empty($_POST["btnregistrar"])){
  if(!empty($_POST["nombre"]) and !empty($_POST["apellidoP"]) and !empty($_POST["fechan"]) and !empty($_POST["cedula"]) and !empty($_POST["contraseña"])){
     
          //variables optenidas mediante el method post 
            //del formulario de modificacionD   .php 
            //Datos de la cita 
      $id=$_POST["id"];
      $nombre=$_POST["nombre"];           //nombre del doctor
      $apellidoP=$_POST["apellidoP"];     //apellido paterno del doctor
      $apellidoM=$_POST["apellidoM"];     //apellido materno del doctor
      $fechan=$_POST["fechan"];           //fecha de nacimiento del doctor
      $cedula=$_POST["cedula"];           //cedula del doctor
      $contraseña=$_POST["contraseña"];   //contraseña del doctor
  
      //realiza el proceso de modificacion de los datos del registro por los nuevos
      $sql=$conexion->query("update doctor set NombreD='$nombre', ApellidoPD='$apellidoP', ApellidoMD='$apellidoM', FeNacD='$fechan', CedulaD='$cedula' , ContraseñaD='$contraseña' where idDoctor=$id");
  
      if ($sql==1) {
          //redirecciona a la vista gestionD.php
          header("location:gestionD.php");
      } else {
          //envía alerta sobre error
          echo'<div class="alert alert-danger">Error al modificar enfermera </div>';
      }
      
  }else{
      //envía alerta de campos vacíos
      echo'<div class="alert alert-warning">Campos vacios</div>';
  }
  }
  ?>
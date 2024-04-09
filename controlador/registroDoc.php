<?php
  //condiciona el que se haya presionado el botón
    //para hacer el registro del doctor
    //condiciona la existencia de datos en el formulario 
    //para llevar a cabo el proceso de registro 
  if(!empty($_POST["btnregistrar"])){
   if(!empty($_POST["nombre"]) and !empty($_POST["apellidoP"])and !empty($_POST["fechan"]) and !empty($_POST["cedula"]) and !empty($_POST["contraseña"])){
      
       
         //crea una consulta para calcualr la edad 
       $nacimiento = new DateTime($_POST["fechan"]);
       $ahora = new DateTime(date("Y-m-d"));
       $diferencia = $ahora->diff($nacimiento);
       
         //condiciona el proceso de registro para 
         //verificar la edad de la doctor
       if($diferencia->format("%y")>18){
  
           //variables optenidas mediante el method post 
           //del formulario de gestionD.php 
           //Datos del doctor 
           $nombre=$_POST["nombre"];
           $apellidoP=$_POST["apellidoP"];
           $apellidoM=$_POST["apellidoM"];
           $fechan=$_POST["fechan"];
           $cedula=$_POST["cedula"];
           $contraseña=$_POST["contraseña"];
  
           //se genera el registro mediante una sentencia SQL
           $sql=$conexion->query(" insert into doctor(NombreD,ApellidoPD,ApellidoMD,FeNacD,CedulaD,ContraseñaD)values('$nombre','$apellidoP','$apellidoM','$fechan','$cedula','$contraseña')");
           if ($sql==1) {
               //alerta de registro exitoso
           echo'<div class="alert alert-success">Registro exitoso</div>';
           } else {
               //alerta de error en el registro
           echo'<div class="alert alert-danger">Error al registrar doctor </div>';
           }
   
   }else{
       //alerta de la edad no valida
  echo '<script type="text/javascript">'; 
  echo 'alert("No cumples con la edad requerida");'; 
  echo 'window.location = "gestionD.php";';
  echo '</script>';
  }
  }else{
    //alerta de campos vacios
       echo'<div class="alert alert-warning">Campos vacios</div>';
   }
  }
  ?>
<?php
 //condiciona el que se haya presionado el botón
   //para hacer el registro del administrador
   //condiciona la existencia de datos en el formulario 
   //para llevar a cabo el proceso de registro 
if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST["nombre"]) and !empty($_POST["apellidoP"])and !empty($_POST["fechan"]) and !empty($_POST["contraseña"])){
       

        //crea una consulta para calcualr la edad 
        $nacimiento = new DateTime($_POST["fechan"]);
        $ahora = new DateTime(date("Y-m-d"));
        $diferencia = $ahora->diff($nacimiento);

                //variables optenidas mediante el method post 
              //del formulario de gestionA.php 
              //Datos del Usuario 
              $nombre=$_POST["nombre"];          //nombre  
              $apellidoP=$_POST["apellidoP"];    //apellido paterno 
              $apellidoM=$_POST["apellidoM"];    //apellido materno
              $fechan=$_POST["fechan"];          //fecha de nacimiento
              $genero=$_POST["genero"];          //genero
              $correo=$_POST["correo"];          //cedula
              $contraseña=$_POST["contraseña"];  //contraseña
              $tipo=$_POST["tipo"];
        if($tipo=="Profesor"){
        //condiciona el proceso de registro para 
        //verificar la edad del administrador
        if($diferencia->format("%y")>20){

      

        //se genera el registro mediante una sentencia SQL
        
        $sql=$conexion->query(" insert into profesor(nombre,apellidoP,apellidoM,fechaNacimiento,generoP,correoP,contraseña)values('$nombre','$apellidoP','$apellidoM','$fechan','$genero','$correo','$contraseña')");
    
        if ($sql==1) {
            //alerta de registro exitoso
            echo'<div class="alert alert-success">registro exitoso</div>';
        } else {
            //alerta de error en el registro 
            echo'<div class="alert alert-danger">Error al registrar profesor </div>';
        }
        
    }else{
        echo'<div class="alert alert-danger">no cumple con la edad </div>';
        //alerta de la edad no valida
        //echo '<script type="text/javascript">'; 
        //echo 'alert("No cumples con la edad requerida");'; 
        //echo 'window.location = "gestionA.php";';
        //echo '</script>';
      }
    }else{
        $sql=$conexion->query(" insert into estudiante(nombre,apellidoPaterno,apellidoMaterno,fechaNaci,genero,correo,contraseña)values('$nombre','$apellidoP','$apellidoM','$fechan','$genero','$correo','$contraseña')");
    
        if ($sql==1) {
            //alerta de registro exitoso
            echo'<div class="alert alert-success">registro exitoso</div>';
        } else {
            //alerta de error en el registro 
            echo'<div class="alert alert-danger">Error al registrar estudiante </div>';
        }
          }

      }}
      ?>
<?php
  //condiciona el que se haya presionado el botón
  //para hacer la modificación del registro en 
  //la vista modificacionA.php y así mismo 
  //condiciona la existencia de datos en el formulario 
  //para llevar a cabo el proceso de actualización 
  $sesion = $_SESSION["rol"];
    if(!empty($_POST["btnregistrar"])){  //valida el que se presionara el boton para la modificacion
        if(!empty($_POST["nombre"]) and !empty($_POST["apellidoP"]) and !empty($_POST["fechan"]) and !empty($_POST["correo"])){
           
            //variables optenidas mediante el method post 
            //del formulario de modificacionE.php o modificacionEProfe.php 
            //Datos del estudiante 
            $id=$_POST["id"];                    
            $nombre=$_POST["nombre"];          //nombre  
            $apellidoP=$_POST["apellidoP"];    //apellido paterno 
            $apellidoM=$_POST["apellidoM"];    //apellido materno
            $fechan=$_POST["fechan"];          //fecha de nacimiento
            $correo=$_POST["correo"];          //correo
            $genero=$_POST["genero"];          //correo
  
            
          
            //realiza el proceso de modificacion de los datos del registro por los nuevos
            $sql=$conexion->query("update estudiante set nombre='$nombre', apellidoPaterno='$apellidoP', apellidoMaterno='$apellidoM', fechaNaci='$fechan' , genero='$genero', correo='$correo' where idEstudiante=$id");
        
            if ($sql==1) {
              //redirecciona a la vista determinada por el rol
              if ($sesion == 'Administrador@'){
                header("location:gestionEs.php");
              }
              else{
                header("location:gestionEsProfe.php");
              }
            } else {
              //envía alerta sobre error
                echo'<div class="alert alert-danger">Error al modificar estudiante </div>';
            }
            
        }else{
          //envía alerta de campos vacíos 
            echo'<div class="alert alert-warning">Campos vacios</div>';
        }
    }
?>
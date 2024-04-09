<?php
  //condiciona el que se haya presionado el botón
  //para hacer la modificación del registro en 
  //la vista modificacionEncuesta.php y así mismo 
  //condiciona la existencia de datos en el formulario 
  //para llevar a cabo el proceso de actualización 
  $sesion = $_SESSION["rol"];
    if(!empty($_POST["btnregistrar"])){
        if(!empty($_POST["titulo"]) ){
           
            //variables optenidas mediante el method post 
            //del formulario de modificacionEncuesta.php 
            //Datos de la encuesta  
            $id=$_POST["id"]; 
            $titulo=$_POST["titulo"];
                 
            //realiza el proceso de modificacion de los datos del registro por los nuevos
            $sql=$conexion->query("update encuesta set descripcion='$titulo' where idEncuesta=$id");
        
            if ($sql==1) {
              //redirecciona a la vista determinada por el rol
              if ($sesion == 'Administrador@'){
                header("location:gestionEncuestaA.php");
              }
              else{
                header("location:gestionNovedades.php");
              }
            } else {
              //envía alerta sobre error
                echo'<div class="alert alert-danger">Error al modificar novedad </div>';
            }
            
        }else{
          //envía alerta de campos vacíos 
            echo'<div class="alert alert-warning">Campos vacios</div>';
        }
    }
?>
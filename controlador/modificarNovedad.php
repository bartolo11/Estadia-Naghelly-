<?php
  //condiciona el que se haya presionado el botón
  //para hacer la modificación del registro en 
  //la vista modificacionA.php y así mismo 
  //condiciona la existencia de datos en el formulario 
  //para llevar a cabo el proceso de actualización 
  $sesion = $_SESSION["rol"];
    if(!empty($_POST["btnregistrar"])){
        if(!empty($_POST["titulo"]) and !empty($_POST["descripcion"])){
           
            //variables optenidas mediante el method post 
            //del formulario de modificacionA.php 
            //Datos del administrador 
            $id=$_POST["id"]; 
            $titulo=$_POST["titulo"];
            $descripcion=$_POST["descripcion"];       
            //realiza el proceso de modificacion de los datos del registro por los nuevos
            $sql=$conexion->query("update novedades set tituloNov='$titulo', descripciónNov='$descripcion' where idnovedades=$id");
        
            if ($sql==1) {
              //redirecciona a la vista determinada por el rol
              if ($sesion == 'Administrador@'){
                header("location:gestionNovedadesAdmin.php");
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

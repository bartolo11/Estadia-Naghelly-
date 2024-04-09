<?php
 //condiciona el que se haya presionado el botón
   //para hacer el registro del administrador
   //condiciona la existencia de datos en el formulario 
   //para llevar a cabo el proceso de registro 
if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST["titulo"]) ){

              $descri=$_POST["titulo"];       
             
         
        
        $sql=$conexion->query("insert into encuesta(descripcion)values('$descri')");
    
        if ($sql==1) {
            //alerta de registro exitoso
            echo'<div class="alert alert-success">registro exitoso</div>';
        } else {
            //alerta de error en el registro 
            echo'<div class="alert alert-danger">Error al registrar Pregunta </div>';
        }
        
    

      }}
      ?>
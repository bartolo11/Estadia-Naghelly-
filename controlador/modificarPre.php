<?php
  //condiciona el que se haya presionado el botón
  //para hacer la modificación del registro en 
  //la vista modificacionA.php y así mismo 
  //condiciona la existencia de datos en el formulario 
  //para llevar a cabo el proceso de actualización 
    if(!empty($_POST["btnregistrar"])){
        if(!empty($_POST["pregunta"]) and !empty($_POST["opcion1"]) and !empty($_POST["opcion2"]) and !empty($_POST["opcion3"])){
           
            //variables optenidas mediante el method post 
            //del formulario de modificacionA.php 
            //Datos del administrador 
            $id=$_POST["id"];                    
            $nombre=$_POST["pregunta"];          //nombre  
            $opcion1=$_POST["opcion1"];    //apellido paterno 
            $opcion2=$_POST["opcion2"];    //apellido materno
            $opcion3=$_POST["opcion3"];    //fecha de nacimiento
        

            
          
            //realiza el proceso de modificacion de los datos del registro por los nuevos
            $sql=$conexion->query("update pregunta set descripción_p='$nombre' where idpreguntas=$id");
            $sql_a=$conexion->query("update opcion set descripción_op='$opcion1' where idPregunta=$id AND categoria='visual'");
            $sql_b=$conexion->query("update opcion set descripción_op='$opcion2' where idPregunta=$id AND categoria='auditivo'");
            $sql_c=$conexion->query("update opcion set descripción_op='$opcion3' where idPregunta=$id AND categoria='kinestesico'");
        
            if ($sql==1) {
              //redirecciona a la vista gestionA.php
              header("location:gestionPreguntas.php");
            } else {
              //envía alerta sobre error
                echo'<div class="alert alert-danger">Error al modificar pregunta </div>';
            }
            
        }else{
          //envía alerta de campos vacíos 
            echo'<div class="alert alert-warning">Campos vacios</div>';
        }
    }
    ?>
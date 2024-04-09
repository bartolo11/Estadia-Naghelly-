<?php
  //condiciona el que se haya presionado el botón
  //para hacer la modificación del registro en 
  //la vista modificacionA.php y así mismo 
  //condiciona la existencia de datos en el formulario 
  //para llevar a cabo el proceso de actualización 
    if(!empty($_POST["btnregistrar"])){
      $sesion = $_SESSION["rol"];
        if(!empty($_POST["pregunta"]) and !empty($_POST["opcion1"]) and !empty($_POST["opcion2"]) and !empty($_POST["opcion3"])){
           
            //variables optenidas mediante el method post 
            //Datos de la pregunta 
            $id=$_POST["id"];                    
            $nombre=$_POST["pregunta"];          //la pregunta  
            $opcion1=$_POST["opcion1"];    //opcion visual
            $opcion2=$_POST["opcion2"];    //opcion auditiva
            $opcion3=$_POST["opcion3"];    //opcion kinestesica
        
  
            
          
            //realiza el proceso de modificacion de los datos del registro por los nuevos
            $sql=$conexion->query("update pregunta set descripción_p='$nombre' where idpreguntas=$id");
            $sql_a=$conexion->query("update opcion set descripción_op='$opcion1' where idPregunta=$id AND categoria='visual'");
            $sql_b=$conexion->query("update opcion set descripción_op='$opcion2' where idPregunta=$id AND categoria='auditivo'");
            $sql_c=$conexion->query("update opcion set descripción_op='$opcion3' where idPregunta=$id AND categoria='kinestesico'");
        
            if ($sql==1) {
              //redirecciona a la vista gestionA.php
              
              if ($sesion == 'Administrador@'){
                header("location:gestionPreguntas.php");
              }
              else{
                header("location:gestionPreguntasProfe.php");
              }
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
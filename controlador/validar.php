<?php
  
  $admin="Administrador@";
  $prof="prof@";      //valor creado dentro de la funcion
  $est="estudiante";  
  $nivelA="Admin";
  $nivelP="Profe";
  $nivelE="Estudiante";

  $usuario=$_POST['usuario'];   //valor de la cedula trasferido por el methgod post dese el index
  $clave=$_POST['clave'];       //valor de la contraseña trasferido por el methgod post dese el index
  
  //genera la conexion con la base de datos
  $conexion=mysqli_connect("localhost","root","","estadia");
  //inicia la sesion para usuario
  session_start();
  //valida el que los campos esten llenos
  //consulta la existencia del registro dentro de la tabla doctor
  //con los datos del method post
  $consulta= $conexion -> query ("SELECT * FROM profesor WHERE correoP='$usuario' AND contraseña='$clave'");
  
  //si la consulta regresa un registro este proceso asigna 
  //los valores y direcciona al home establecido
  if($datos = $consulta->fetch_object()){
    $_SESSION["idA"]=$datos->idProfesor;
    $_SESSION["nombre"]=$datos->nombre;
    $_SESSION["app"]=$datos->apellidoP;
    $_SESSION['rol']=$prof;
    $_SESSION['nivelP']=$nivelP;
    header('Location: ../homeProfesor.php');
  }else{ //si no encontro el registro 
  
  
   
        //consulta la existencia del registro dentro de la tabla administrador
  //con los datos del method post
      $consulta3= $conexion -> query ("SELECT * FROM administrador WHERE correoA='$usuario' AND contraseñaA='$clave'");
    
      //si la consulta regresa un registro este proceso asigna 
  //los valores y direcciona al home establecido
      if($datos = $consulta3->fetch_object()){
        $_SESSION["idA"]=$datos->idAdministrador;
        $_SESSION["nombre"]=$datos->nombreAdmin;
        $_SESSION["app"]=$datos->apellidoPA;
        $_SESSION['rol']=$admin;
        $_SESSION['nivelA']=$nivelA;

        header('Location: ../homeAd.php');
        ;
      }else{
            //si no encontro el registro 
      
      
      
            //consulta la existencia del registro dentro de la tabla administrador
      //con los datos del method post
          $consulta2= $conexion -> query ("SELECT * FROM estudiante WHERE correo='$usuario' AND contraseña='$clave'");
        
          //si la consulta regresa un registro este proceso asigna 
      //los valores y direcciona al home establecido
          if($datos = $consulta2->fetch_object()){
            $_SESSION["idA"]=$datos->idEstudiante;
            $_SESSION["nombre"]=$datos->nombre;
            $_SESSION["app"]=$datos->apellidoPaterno;
            $_SESSION["grupo"]=$datos->grupo;
            $_SESSION['rol']=$est;
            $_SESSION['nivelE']=$nivelE;

            header('Location: ../homeEs.php');
            ;
          }else{
            //alerta de datos incorrectos
            echo '<script type="text/javascript">'; 
            echo 'alert("Usuario o contraseña son incorrectos");'; 
            echo 'window.location = "../l.php";';
            echo '</script>';
          }
      }
    }
    
  mysqli_free_result($resultado);
  mysqli_close($conexion);
  ?>

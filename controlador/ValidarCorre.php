<?php
  
  function generarContrasena() {
    $letras = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numeros = '0123456789';
    $simbolos = '@#$%*-_+';

    $contrasena = '';
    // Generar 4 letras
    for ($i = 0; $i < 4; $i++) {
        $contrasena .= $letras[rand(0, strlen($letras) - 1)];
    }
    // Generar 3 números
    for ($i = 0; $i < 3; $i++) {
        $contrasena .= $numeros[rand(0, strlen($numeros) - 1)];
    }
    // Generar 1 símbolo
    $contrasena .= $simbolos[rand(0, strlen($simbolos) - 1)];

    // Mezclar los caracteres de la contraseña
    $contrasena = str_shuffle($contrasena);

    return $contrasena;
}
 

  $usuario=$_POST['usuario'];   //valor de la cedula trasferido por el methgod post dese el index
  
  
  //genera la conexion con la base de datos
  $conexion=mysqli_connect("localhost","root","","estadia");
  //inicia la sesion para usuario
  session_start();
  //valida el que los campos esten llenos
  //consulta la existencia del registro dentro de la tabla doctor
  //con los datos del method post
  $consulta= $conexion -> query ("SELECT * FROM profesor WHERE correoP='$usuario' ");
  
  //si la consulta regresa un registro este proceso asigna 
  //los valores y direcciona al home establecido
  if($datos = $consulta->fetch_object()){
    $codigo = generarContrasena();
    $nuevaC = md5($codigo);
    $to = $_POST['usuario'];
    $subject = 'Información';
    $msg = "Esta sera tu nueva contraseña para ingresar a tu cuenta: \r\n" . $codigo;
    $header = 'From: grno200401@upemor.edu.mx' . "\r\n".
    'Reply-To: grno200401@upemor.edu.mx' . "\r\n".
    'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $msg, $header);

    //realiza el proceso de modificacion de los datos del registro por los nuevos
    $sql=$conexion->query("UPDATE profesor set contraseña='$nuevaC' where correoP='$usuario'");
        
    if ($sql==1) {
      //redirecciona a la vista gestionA.php
      echo '<script type="text/javascript">'; 
            echo 'alert("La contraseña a sido actualizada intente ingresar la nueva contraseña");'; 
            echo 'window.location = "../l.php";';
            echo '</script>';
    } else {
      //envía alerta sobre error
      echo '<script type="text/javascript">'; 
      echo 'alert("Error al modificar su contraseña");'; 
      echo 'window.location = "../l.php";';
      echo '</script>';
    }

  }else{ //si no encontro el registro 
  
  
   
        //consulta la existencia del registro dentro de la tabla administrador
  //con los datos del method post
      $consulta3= $conexion -> query ("SELECT * FROM administrador WHERE correoA='$usuario' ");
    
      //si la consulta regresa un registro este proceso asigna 
  //los valores y direcciona al home establecido
      if($datos = $consulta3->fetch_object()){
        $codigo = generarContrasena();
        $nuevaC = md5($codigo);
        $to = $_POST['usuario'];
        $subject = 'Información';
        $msg = "Esta sera tu nueva contraseña para ingresar a tu cuenta: \r\n" . $codigo;
        $header = 'From: grno200401@upemor.edu.mx' . "\r\n".
        'Reply-To: grno200401@upemor.edu.mx' . "\r\n".
        'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $msg, $header);

        //realiza el proceso de modificacion de los datos del registro por los nuevos
        $sql=$conexion->query("UPDATE administrador set contraseñaA='$nuevaC' where correoA='$usuario'");
            
        if ($sql==1) {
          //redirecciona a la vista gestionA.php
          echo '<script type="text/javascript">'; 
                echo 'alert("La contraseña a sido actualizada intente ingresar la nueva contraseña");'; 
                echo 'window.location = "../l.php";';
                echo '</script>';
        } else {
          //envía alerta sobre error
          echo '<script type="text/javascript">'; 
          echo 'alert("Error al modificar su contraseña");'; 
          echo 'window.location = "../l.php";';
          echo '</script>';
        }
      }else{
          
      
      
      
            //consulta la existencia del registro dentro de la tabla administrador
      //con los datos del method post
          $consulta2= $conexion -> query ("SELECT * FROM estudiante WHERE correo='$usuario'");
        
          //si la consulta regresa un registro este proceso asigna 
      //los valores y direcciona al home establecido
          if($datos = $consulta2->fetch_object()){
            $codigo = generarContrasena();
            $nuevaC = md5($codigo);
            $to = $_POST['usuario'];
            $subject = 'Información';
            $msg = "Esta sera tu nueva contraseña para ingresar a tu cuenta: \r\n" . $codigo;
            $header = 'From: grno200401@upemor.edu.mx' . "\r\n".
            'Reply-To: grno200401@upemor.edu.mx' . "\r\n".
            'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $msg, $header);
    
            //realiza el proceso de modificacion de los datos del registro por los nuevos
            $sql=$conexion->query("UPDATE estudiante set contraseña='$nuevaC' where correo='$usuario'");
                
            if ($sql==1) {
              //redirecciona a la vista gestionA.php
              echo '<script type="text/javascript">'; 
                    echo 'alert("La contraseña a sido actualizada intente ingresar la nueva contraseña");'; 
                    echo 'window.location = "../l.php";';
                    echo '</script>';
            } else {
              //envía alerta sobre error
              echo '<script type="text/javascript">'; 
              echo 'alert("Error al modificar su contraseña");'; 
              echo 'window.location = "../l.php";';
              echo '</script>';
            }
          }else{
            //alerta de datos incorrectos
            echo '<script type="text/javascript">'; 
            echo 'alert("El correo que ingreso no existe dentro de la base de datos");'; 
            echo 'window.location = "../l.php";';
            echo '</script>';
          }
      }
    }
    
  mysqli_free_result($resultado);
  mysqli_close($conexion);
  ?>

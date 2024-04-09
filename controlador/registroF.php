<?php
  //Genera la conexion con la base de datos
  $conexion=mysqli_connect("localhost","root","","prueba1");
    //condiciona el que se haya presionado el botón
      //para hacer el registro de familiar
      //condiciona la existencia de datos en el formulario 
      //para llevar a cabo el proceso de registro 
  if(!empty($_POST["btnregistrar"])){
     if(!empty($_POST["nombre"]) and !empty($_POST["apellidoP"]) and !empty($_POST["fechan"]) and !empty($_POST["parentesco"]) and !empty($_POST["nss"]) and !empty($_POST["telefono"])){
        
         $nss=$_POST["nss"];
  
          //crea una consulta para calcualr la edad 
         $nacimiento = new DateTime($_POST["fechan"]);
         $ahora = new DateTime(date("Y-m-d"));
         $diferencia = $ahora->diff($nacimiento);
  
         
         //condiciona el proceso de registro para 
         //verificar la edad del familiar
         if($diferencia->format("%y")>18){
  
             //variables optenidas mediante el method post 
             //del formulario de gestionF.php 
             //Datos de la familiar 
         $nombre=$_POST["nombre"];           //nombre del familiar
         $apellidoP=$_POST["apellidoP"];     //apellido paterno del familiar
         $apellidoM=$_POST["apellidoM"];     //apellido materno del familiar
         $fechan=$_POST["fechan"];           //fecha de nacimiento del familiar
         $parentesco=$_POST["parentesco"];   //parentesco con el paciente
         $telefono=$_POST["telefono"];       //telefono del familiar
  
         //se genera el registro mediante una sentencia SQL
         $sql=$conexion->query("insert into familiar(NombreF,ApellidoPF,ApellidoMF,FeNacF,parentesco,NssP,telefono)values('$nombre','$apellidoP','$apellidoM','$fechan','$parentesco','$nss','$telefono')");
     
         if ($sql==1) {
             //alerta de registro exitoso
             echo'<div class="alert alert-success">Registro exitoso</div>';
         } else {
             //alerta de error en el registro
             echo'<div class="alert alert-danger">Error al registrar familiar </div>';
         }      
     }else{
         //alerta de la edad no valida
         echo '<script type="text/javascript">'; 
         echo 'alert("No cumples con la edad requerida");'; 
         echo 'window.location = "gestionF.php";';
         echo '</script>';
       }
       }
     else{
         //alerta de campos vacios
               echo'<div class="alert alert-warning">Campos vacios</div>';
           }
       }
       ?>
<?php
  //condiciona el que se haya presionado el botón
    //para hacer el registro de paciente
    //condiciona la existencia de datos en el formulario 
    //para llevar a cabo el proceso de registro 
  if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST["nombre"]) and !empty($_POST["apellidoP"]) and !empty($_POST["fechan"]) and !empty($_POST["fechaing"]) and !empty($_POST["nss"]) and !empty($_POST["peso"]) and !empty($_POST["altura"]) ){
       
         //variables optenidas mediante el method post 
          //del formulario de gestionP.php 
          //Datos de paciente 
        $nombre=$_POST["nombre"];           //nombre del paciente 
        $apellidoP=$_POST["apellidoP"];     //apellido paterno del paciente
        $apellidoM=$_POST["apellidoM"];     //apellido materno del paciente
        $fechan=$_POST["fechan"];           //fecha de nacimiento del paciente
        $fechaing=$_POST["fechaing"];       //fecha de ingreso del paciente
        $nss=$_POST["nss"];                 //numero de seguro social del páciente
        $peso=$_POST["peso"];               //peso del paciente 
        $altura=$_POST["altura"];           //altura del paciente
        $alergias=$_POST["alergias"];       //alergias del paciente
  
        //se genera el registro mediante una sentencia SQL
        $sql=$conexion->query(" insert into paciente(NombreP,ApellidoPP,ApellidoMP,FeNacP,FeIng,NSS,Peso,Altura,Alergias)values('$nombre','$apellidoP','$apellidoM','$fechan','$fechaing','$nss','$peso','$altura','$alergias')");
    
        if ($sql==1) {
            //alerta de registro exitoso
            echo'<div class="alert alert-success">Registro exitoso</div>';
        } else {
            //alerta de error en el registro
            echo'<div class="alert alert-danger">Error al registrar paciente </div>';
        }
        
    }else{
        //alerta de campos vacios
        echo'<div class="alert alert-warning">Campos vacios</div>';
    }
  }
  ?>
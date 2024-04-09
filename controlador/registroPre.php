<?php
  //condiciona el que se haya presionado el botón
    //para hacer el registro de paciente
    //condiciona la existencia de datos en el formulario 
    //para llevar a cabo el proceso de registro 
  if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST["pregunta"]) and !empty($_POST["opcionA"]) and !empty($_POST["opcionB"]) and !empty($_POST["opcionC"])){
       
         //variables optenidas mediante el method post 
          //del formulario de gestionP.php 
          //Datos de paciente 
        $pregunta=$_POST["pregunta"];           //nombre del paciente 
        $opcionA=$_POST["opcionA"];     //apellido paterno del paciente
        $opcionB=$_POST["opcionB"];     //apellido materno del paciente
        $opcionC=$_POST["opcionC"];           //fecha de nacimiento del paciente
        $visual="visual";
        $auditivo="auditivo";
        $kinestesico="kinestesico";

        // Se genera el registro de la pregunta
$sql_pregunta = $conexion->query("INSERT INTO pregunta(descripción_p) VALUES ('$pregunta')");

// Obtener el ID de la pregunta recién insertada
$nuevo_id_pregunta = $conexion->insert_id;

// Verificar la inserción de la pregunta
if ($sql_pregunta) {
    // Inserción exitosa de la pregunta

    // Insertar opciones relacionadas con la pregunta
    $sql_opcionA = $conexion->query("INSERT INTO opcion(idPregunta, descripción_op, categoria) VALUES ('$nuevo_id_pregunta', '$opcionA', '$visual')");
    $sql_opcionB = $conexion->query("INSERT INTO opcion(idPregunta, descripción_op, categoria) VALUES ('$nuevo_id_pregunta', '$opcionB', '$auditivo')");
    $sql_opcionC = $conexion->query("INSERT INTO opcion(idPregunta, descripción_op, categoria) VALUES ('$nuevo_id_pregunta', '$opcionC', '$kinestesico')");
    
    // Verificar la inserción de las opciones
    if ($sql_opcionA && $sql_opcionB && $sql_opcionC) {
        // Todas las inserciones fueron exitosas
        echo '<div class="alert alert-success">Registro exitoso</div>';
    } else {
        // Hubo un error en al menos una inserción de opción
        echo '<div class="alert alert-danger">Error al registrar opciones</div>';
    }
} else {
    // Hubo un error en la inserción de la pregunta
    echo '<div class="alert alert-danger">Error al registrar pregunta</div>';

}
}
}
  ?>
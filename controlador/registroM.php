<?php
include "modelo/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha seleccionado un archivo para subir
    if(isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == 0){
        // Se ha seleccionado un archivo para subir
        $tipo = $_POST["tipo_archivo"];
        $descripcion = $_POST["descripcion"];
        $materia = $_POST["materia"];
        $estilo = $_POST["estilo"];

        // Nombre del archivo
        $nombre_archivo = $_FILES["archivo"]["name"];

        // Directorio donde se guardará el archivo
        $directorio_destino = "material/";

        // Mover el archivo del directorio temporal al directorio de destino
        if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $directorio_destino . $nombre_archivo)){
            // Query para insertar los datos en la tabla material_didactico
            $query = "INSERT INTO material_didactico (tipo, titulo, descripción, fechaPublicacion, materia_asosiada, categoria) VALUES ('$tipo', '$nombre_archivo', '$descripcion', NOW(), '$materia', '$estilo')";

            // Ejecutar la consulta
            if(mysqli_query($conexion, $query)){
                echo'<div class="alert alert-success">Registro exitoso</div>';
            } else{
                echo '<div class="alert alert-danger">Error al registrar el material didáctico: </div>' . mysqli_error($conexion);
            }
        } else{
            echo '<div class="alert alert-danger">Error al subir el archivo. </div>';
        }
    } else if($_POST["tipo_archivo"] === "link"){
        // Se ha seleccionado la opción de enlace
        $nombre = $_POST["enlace"];
        $tipo = $_POST["tipo_archivo"];
        $descripcion = $_POST["descripcion"];
        $materia = $_POST["materia"];
        $estilo = $_POST["estilo"];

        // Query para insertar los datos en la tabla material_didactico sin título de archivo
        $query = "INSERT INTO material_didactico (tipo, titulo, descripción, fechaPublicacion, materia_asosiada, categoria) VALUES ('$tipo', '$nombre', '$descripcion', NOW(), '$materia', '$estilo')";

        // Ejecutar la consulta
        if(mysqli_query($conexion, $query)){
            echo'<div class="alert alert-success">Registro exitoso</div>';
        } else{
            echo '<div class="alert alert-danger">Error al registrar el material didáctico: </div>' . mysqli_error($conexion);
        }
    }
}
?>


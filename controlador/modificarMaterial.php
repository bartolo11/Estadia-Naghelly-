<?php
include "modelo/conexion.php";
include "checarsession.php";

// Obtener ID del material didáctico a modificar
$id = $_GET["id"];

// Consultar los datos actuales del material didáctico
$sql = $conexion->query("SELECT * FROM material_didactico WHERE idMaterial = $id");
$datos = $sql->fetch_object();
$nombre_archivo = $datos->titulo;
$ruta_archivo = 'material/' . $nombre_archivo;

// Obtener el valor del tipo de archivo
$tipo_archivo = $datos->tipo;

// Manejar la actualización del material didáctico
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se seleccionó la opción de cambiar el archivo
    $opcion = $_POST["opcion"];
    if ($opcion === "si") {
        // Verificar el tipo de archivo y actualizar la base de datos y el archivo en el servidor
        if ($tipo_archivo === 'pdf' || $tipo_archivo === 'doc' || $tipo_archivo === 'pptx') {
            // Manejar la actualización del archivo en el servidor y en la base de datos
            $nombreArchivoModificado = $_FILES["archivo_modificado"]["name"];
            $rutaArchivoModificado = 'material/' . $nombreArchivoModificado;
            move_uploaded_file($_FILES["archivo_modificado"]["tmp_name"], $rutaArchivoModificado);
            $sqlUpdate = $conexion->prepare("UPDATE material_didactico SET nombre_archivo_modificado = ? WHERE idMaterial = ?");
            $sqlUpdate->bind_param("si", $nombreArchivoModificado, $id);
            $sqlUpdate->execute();
            
            // Puedes redirigir a una página de éxito o mostrar un mensaje
            header("location:gestionMaterial.php");
            exit(); // Terminar el script después de la redirección
        }
    }
}
?>

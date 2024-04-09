<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnregistrar'])) {
    $id = $_POST["id"];
    $tipo_archivo = $_POST["tipo"];
    $descripcion = $_POST["descripcion"];
    $materia = $_POST["materia"];
    $enlace = $_POST["enlace"];
    $estilo = $_POST["estilo"];
    $sesion = $_SESSION["rol"];

    if ($tipo_archivo == 'link'){
        $sql_update = "UPDATE material_didactico SET titulo = '$enlace', descripción = '$descripcion', materia_asosiada = '$materia', categoria = '$estilo' WHERE idMaterial = $id";
                $resultado = $conexion->query($sql_update);
        
                if ($resultado) {
                    if ($sesion == 'Administrador@'){
                        header("location: gestionMaterial.php");
                      }
                      else{
                        header("location: gestionMaterialProfe.php");
                      }
                } else {
                    echo "Ha ocurrido un error al actualizar los datos en la base de datos: " . mysqli_error($conexion);
                } 
    }
        else{

        
            // Verificar si se seleccionó la opción de cambiar el archivo
            if ($_POST['opcion'] == 'si' && isset($_FILES['archivo_modificado'])) {
                // Ruta donde se guardarán los archivos
                $directorio_destino = "material/";
                
                // Consulta para obtener el nombre del archivo actual
                $sql = $conexion->query("SELECT * FROM material_didactico WHERE idMaterial = $id");
                $datos = $sql->fetch_object();
                $nombre_archivo_viejo = $datos->titulo;
                
                // Eliminar el archivo anterior
                unlink($directorio_destino . $nombre_archivo_viejo);
                
                // Subir el nuevo archivo
                $nombre_archivo_nuevo = $_FILES['archivo_modificado']['name'];
                move_uploaded_file($_FILES['archivo_modificado']['tmp_name'], $directorio_destino . $nombre_archivo_nuevo);
                
                // Actualizar la base de datos con el nuevo nombre del archivo
                $sql_update = "UPDATE material_didactico SET titulo = '$nombre_archivo_nuevo', descripción = '$descripcion', materia_asosiada = '$materia', categoria = '$estilo' WHERE idMaterial = $id";
                $resultado = $conexion->query($sql_update);

                if ($resultado) {
                    if ($sesion == 'Administrador@'){
                        header("location: gestionMaterial.php");
                      }
                      else{
                        header("location: gestionMaterialProfe.php");
                      }
                    
                } else {
                echo "Ha ocurrido un error al actualizar los datos en la base de datos: " . mysqli_error($conexion);
                }
                
            } else {
                $sql_update = "UPDATE material_didactico SET descripción = '$descripcion', materia_asosiada = '$materia', categoria = '$estilo' WHERE idMaterial = $id";
                $resultado = $conexion->query($sql_update);
        
                if ($resultado) {
                    if ($sesion == 'Administrador@'){
                        header("location: gestionMaterial.php");
                      }
                      else{
                        header("location: gestionMaterialProfe.php");
                      }
                } else {
                    echo "Ha ocurrido un error al actualizar los datos en la base de datos: " . mysqli_error($conexion);
                } 
            }
    }
}
?>

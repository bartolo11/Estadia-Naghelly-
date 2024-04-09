<?php
if (!empty($_POST["btnregistrar"])) {
    if (isset($_POST['idE']) && !empty($_POST['idE'])) {
        $id = $_POST['id'];
        
        
        foreach ($_POST['idE'] as $idEstudiante) {
            // Verificar si ya existe un registro para el mismo estudiante y material
            $sql_check = $conexion->query("SELECT COUNT(*) AS count FROM asignar_material WHERE idEst = '$idEstudiante' AND idMaterial = '$id'");
            $row = $sql_check->fetch_assoc();
            $count = $row['count'];
            
            if ($count == 0) {
                // Si no existe, insertar el nuevo registro
                $sql = $conexion->query("SELECT * FROM material_didactico WHERE idMaterial = $id ");
                $datos = $sql->fetch_object();
                $nombre = $datos->titulo;
                $descripcion = $datos->descripción;
                $estilo = $datos->categoria;
                $materiaA = $datos->materia_asosiada;

                $sql2 = $conexion->query("INSERT INTO asignar_material (nombreM, descripciónM, estiloAprendizaje, idMaterial, idEst, materiaA) VALUES ('$nombre', '$descripcion', '$estilo', '$id', '$idEstudiante', '$materiaA')");

                if ($sql2) {
                    // Registro exitoso
                    header("location: gestionMaterialProfe.php");
                } else {
                    // Error en el registro
                    echo '<div class="alert alert-danger">Error al asignar material</div>';
                }
            } else {
                header("location: gestionMaterialProfe.php");
               
            }
        }
    } else {
        // Mensaje de error si no se selecciona ningún estudiante
        echo "Por favor, selecciona al menos un estudiante.";
    }
}

?>
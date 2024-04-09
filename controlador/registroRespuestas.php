<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["Npreguntas"])) {
        $nombre = $_SESSION["idA"];
        $Npreguntas = $_POST["Npreguntas"];

        // Variable para controlar el éxito de todas las inserciones
        $success = true;

        for ($i = 1; $i <= $Npreguntas; $i++) {
            $categoria = $_POST["categoria" . $i];
            $idPregunta = $_POST["idpreguntas" . $i];

            // Realiza la inserción en la base de datos
            $sql = $conexion->query("INSERT INTO Rtest (idUsuario, categoria,idPregunta) VALUES ('$nombre', '$categoria','$idPregunta')");

            // Verifica si la inserción fue exitosa
            if (!$sql) {
                // Si una inserción falla, actualiza $success a false
                $success = false;
                // Puedes agregar un mensaje de error específico si lo deseas
                // echo '<div class="alert alert-danger">Error al registrar la categoría para la pregunta ' . $i . '</div>';
            }
        }

        // Verifica el éxito de todas las inserciones
        if ($success) {
            echo '<div class="alert alert-success">Todos los registros fueron exitosos</div>';
        } else {
            echo '<div class="alert alert-danger">Hubo errores al registrar algunas categorías</div>';
        }
    } else {
        echo '<div class="alert alert-warning">El número de preguntas está vacío</div>';
    }
}
?>
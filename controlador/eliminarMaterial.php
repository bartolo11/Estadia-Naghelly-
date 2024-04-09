<?php

if(!empty($_GET["id"])){
    $id=$_GET["id"];
    // Ruta donde se guardarán los archivos
    $directorio_destino = "material/";
                
    // Consulta para obtener el nombre del archivo actual
    $sql = $conexion->query("SELECT * FROM material_didactico WHERE idMaterial = $id");
    $datos = $sql->fetch_object();
    $nombreArchivo = $datos->titulo;
    $tipo = $datos->tipo;
    
    if($tipo == 'link'){
        $sql=$conexion->query(" delete from material_didactico where idMaterial=$id");
        if($sql==1){
            echo'<div class="alert alert-success">Material eliminado correctamente </div>';
        }else {
            echo'<div class="alert alert-warning">Error en la eliminacion</div>';
        }

    }else{        // Eliminar el archivo anterior
        unlink($directorio_destino . $nombreArchivo);

        $sql=$conexion->query(" delete from material_didactico where idMaterial=$id");
        if($sql==1){
            echo'<div class="alert alert-success">Material eliminado correctamente </div>';
        }else {
            echo'<div class="alert alert-warning">Error en la eliminacion</div>';
        }
    }
}
?>
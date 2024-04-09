<?php
//función eliminarMaterial.php
//obtiene un valor del id enviado por el botón 
//eliminar de la vista gestionMaterial.php o gestionMaterialProfe.php y mediante
//una consulta y condiciones para validar 
//lleva a cabo la búsqueda en la 
//tabla por medio de esa id y elimina el 
//registro completo de esta 

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
        $sql_asignaciones=$conexion->query(" delete from asignar_material where idMaterial=$id");
        $sql_notificaciones=$conexion->query(" delete from notificaciones where nombre=$nombreArchivo");

        if($sql==1){
            echo'<div class="alert alert-success">Material eliminado correctamente </div>';
        }else {
            echo'<div class="alert alert-warning">Error en la eliminacion</div>';
        }

    }else{        // Eliminar el archivo anterior
        unlink($directorio_destino . $nombreArchivo);

        $sql=$conexion->query(" delete from material_didactico where idMaterial=$id");
        $sql_asignaciones=$conexion->query(" delete from asignar_material where idMaterial=$id");
        $sql_notificaciones=$conexion->query(" delete from notificaciones where nombre=$nombreArchivo");

        if($sql==1){
            echo'<div class="alert alert-success">Material eliminado correctamente </div>';
        }else {
            echo'<div class="alert alert-warning">Error en la eliminacion</div>';
        }
    }
}
?>
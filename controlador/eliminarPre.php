<?php
//función eliminarA.php
//obtiene un valor del id enviado por el botón 
//eliminar de la vista gestionA.php y mediante
//una consulta y condiciones para validar 
//lleva a cabo la búsqueda en la 
//tabla por medio de esa id y elimina el 
//registro completo de esta 
if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql=$conexion->query(" delete from pregunta where idpreguntas=$id");
    $sql_opcion=$conexion->query(" delete from opcion where idPregunta=$id");
    if($sql==1){
        echo'<div class="alert alert-success">Estudiante eliminada correctamente </div>';
    }else {
        echo'<div class="alert alert-warning">Error en la eliminacion</div>';
    }
}
?>
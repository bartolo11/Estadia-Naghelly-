<?php
include "modelo/conexion.php";
include "checarsession.php";

$id = $_GET["id"];

$sql = $conexion->query("SELECT * FROM material_didactico WHERE idMaterial = $id");

$datos = $sql->fetch_object();
$nombre_archivo = $datos->titulo;
$ruta_archivo = 'material/' . $nombre_archivo;

// Obtener el valor de "tipo" del material asociado
$tipo_archivo = $datos->tipo;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Material</title>
    <link href='css/formulario.css' rel='stylesheet' type='text/css'>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<form class="col-10 p-3 m-auto formulario" method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario()">
    <h3>Modificar Material</h3>
    <hr color="#000000">
    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <?php include "controlador/modificarMaterial.php"; ?>
   
    <?php if (($tipo_archivo === 'pdf')||($tipo_archivo === 'doc')||($tipo_archivo === 'pptx')){?>
    <div class="mb-3">
        Archivo actual: <a href="<?= $ruta_archivo ?>" download><?= $nombre_archivo ?></a>
    </div>
    
    <div class="mb-3">
        <label class="input_textual">Desear cambiar el archivo</label><br>
        <input type="radio" id="si" name="opcion" value="si" required>
        <label for="pdf">Si </label><br>
        <input type="radio" id="no" name="opcion" value="no">
        <label for="doc">No </label><br>
    </div>
    <?php }?>
    
    <?php if ($tipo_archivo === 'pdf') { ?>
    <div class="mb-3 archivo archivo_pdf" style="display: none;">
    <label for="archivo_modificado_pdf" class="input_textual">Subir archivo PDF</label>
    <input type="file" name="archivo_modificado" accept=".pdf"> 
    </div>
    <?php } elseif ($tipo_archivo === 'doc') { ?>
    <div class="mb-3 archivo archivo_doc" style="display: none;">
    <label for="archivo_modificado_doc" class="input_textual">Subir archivo DOC/DOCX</label>
    <input type="file" name="archivo_modificado" accept=".doc, .docx">
    </div>
    <?php } elseif ($tipo_archivo === 'pptx') { ?>
    <div class="mb-3 archivo archivo_ppt" style="display: none;">
    <label for="archivo_modificado_pptx" class="input_textual">Subir archivo PPT/PPTX</label>
    <input type="file" name="archivo_modificado" accept=".ppt, .pptx">
    </div>
    <?php } ?>

    
    <?php if ($tipo_archivo === 'link') { ?>
    <div class="mb-3">
        <label for="enlace" class="input_textual">Introduce el enlace</label>
        <input type="text" id="enlace" class="form-control" name="enlace" value="<?= $datos->titulo ?>" required>
    </div>
    <?php } ?>
    
    <div class="mb-3">
        <label for="exampleInputEmail1" class="input_textual">Descripcion</label>
        <input type="text" aling="center" class="form-control" name="descripcion" value="<?= $datos->descripción ?>" required >
    </div>
    
    <div class="mb-3">
        <label for="exampleInputEmail1" class="input_textual">Materia asociada</label>
        <select class="form-control" id="materia" name="materia" required>
            <option disabled selected>Selecciona una materia</option>
            <option value="Habilidades Gerenciales" <?= ($datos->materia_asosiada == 'Habilidades Gerenciales') ? 'selected' : '' ?>>Habilidades Gerenciales</option>
            <option value="Matemáticas para Ingeniería II" <?= ($datos->materia_asosiada == 'Matemáticas para Ingeniería II') ? 'selected' : '' ?>>Matemáticas para Ingeniería II</option>
            <option value="Sistemas Operativos" <?= ($datos->materia_asosiada == 'Sistemas Operativos') ? 'selected' : '' ?>>Sistemas Operativos</option>
            <option value="Programación Orientada a Objetos" <?= ($datos->materia_asosiada == 'Programación Orientada a Objetos') ? 'selected' : '' ?>>Programación Orientada a Objetos</option>
            <option value="Interconexión de Redes" <?= ($datos->materia_asosiada == 'Interconexión de Redes') ? 'selected' : '' ?>>Interconexión de Redes</option>
            <option value="Administración de Base de Datos" <?= ($datos->materia_asosiada == 'Administración de Base de Datos') ? 'selected' : '' ?>>Administración de Base de Datos</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-outline-primary" name="btnregistrar" value="ok">Modificar Material</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script>
    function validarFormulario() {
        var opcionSeleccionada = document.querySelector('input[name="opcion"]:checked');
        if (opcionSeleccionada && opcionSeleccionada.value === 'si') {
            if ('<?= $tipo_archivo ?>' === 'pdf') {
                var archivoModificadoPDF = document.querySelector('.archivo_pdf input[type="file"]');
                if (!archivoModificadoPDF || archivoModificadoPDF.files.length === 0) {
                    alert('Por favor, seleccione un archivo PDF para subir.');
                    return false;
                }
            } else if ('<?= $tipo_archivo ?>' === 'doc' || '<?= $tipo_archivo ?>' === 'docx') {
                var archivoModificadoDOC = document.querySelector('.archivo_doc input[type="file"]');
                if (!archivoModificadoDOC || archivoModificadoDOC.files.length === 0) {
                    alert('Por favor, seleccione un archivo DOC o DOCX para subir.');
                    return false;
                }
            } else if ('<?= $tipo_archivo ?>' === 'ppt' || '<?= $tipo_archivo ?>' === 'pptx') {
                var archivoModificadoPPT = document.querySelector('.archivo_ppt input[type="file"]');
                if (!archivoModificadoPPT || archivoModificadoPPT.files.length === 0) {
                    alert('Por favor, seleccione un archivo PPT o PPTX para subir.');
                    return false;
                }
            }
            // Agrega validaciones adicionales para otros tipos de archivos aquí si es necesario
        }
        return true;
    }
    
    document.addEventListener("DOMContentLoaded", function() {
        var radioSi = document.getElementById('si');
        var archivosDiv = document.querySelector('.archivo');
        
        if (radioSi) {
            radioSi.addEventListener('click', function() {
                archivosDiv.style.display = 'block';
            });
        }
        
        var radioNo = document.getElementById('no');
        
        if (radioNo) {
            radioNo.addEventListener('click', function() {
                archivosDiv.style.display = 'none';
            });
        }
    });
</script>
</body>
</html>


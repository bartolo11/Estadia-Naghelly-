<?php
$conexion=mysqli_connect("localhost","root","","estadia");
require "../modelo/plantilla.php";
require "../checarsession.php";

 
    session_start();


    if(!empty($_POST["btnregistrar"])){
        if(!empty($_POST["opcionE"]) and !empty($_POST["op"]) and !empty($_POST["encuestaR"])){
            /// Variables de uso                  
            $opcionE=$_POST["opcionE"];           
            $op=$_POST["op"];    
            $fechaInicioMaterial=$_POST["fechaInicioMaterial"];    
            $fechaFinMaterial=$_POST["fechaFinMaterial"];         
            $encuestaR=$_POST["encuestaR"];        

            switch ($opcionE) {
                case "estilo":
                        $pdf = new PDF("P", "mm", "letter");
                        $pdf->AliasNbPages();
                        $pdf->SetMargins(10, 10, 10);
                        $pdf->AddPage();

                        $sql="SELECT categoria, COUNT(idUsuario) AS numero_usuarios FROM tabla_categorias GROUP BY categoria";
    

                        $resultado=$conexion->query($sql);
                        
                        $Ndocs=mysqli_num_rows($resultado);

                        $pdf->SetFont("Arial", "B", 9);

                        $pdf->cell(30,5,utf8_decode('Estudiantes por estilo de aprendizaje '));
                        
                        $pdf->Cell(30);
                        $pdf->cell(10,5,utf8_decode($Ndocs));
                        $pdf->cell(15,5,utf8_decode('resultados'));
                        $pdf->Ln();

                        $pdf->Cell(35, 5, "Estilo de aprendizaje", 1, 0, "C");
                        $pdf->Cell(19, 5, "Cantidad", 1, 0, "C");
                        $pdf->Ln();

                        $pdf->SetFont("Arial", "", 9);

                        while ($fila = $resultado->fetch_assoc()) {
                            $pdf->Cell(35, 5, utf8_decode($fila['categoria']), 1, 0, "C");
                            $pdf->Cell(19, 5, utf8_decode($fila['numero_usuarios']), 1, 0, "C"); // Aquí corregido
                            $pdf->Ln();
                        }
                        $pdf->Ln();


                    break;
                case "grupo":
                    $pdf = new PDF("P", "mm", "letter");
                        $pdf->AliasNbPages();
                        $pdf->SetMargins(10, 10, 10);
                        $pdf->AddPage();

                    $sql = "SELECT grupo, COUNT(idEstudiante) AS cantidad_alumnos
                    FROM estudiante
                    GROUP BY grupo";
            
                    $resultado = $conexion->query($sql);

                    $Ndocs=mysqli_num_rows($resultado);
                
                
                
                    $pdf->SetFont("Arial", "B", 9);
                
                    $pdf->Cell(30, 5, utf8_decode('Cantidad de Alumnos por Grupo'));

                    $pdf->Cell(30);
                    $pdf->cell(10,5,utf8_decode($Ndocs));
                    $pdf->cell(15,5,utf8_decode('resultados'));
                
                    $pdf->Cell(0, 7, "", 0, 1, "C"); // Celda de espaciado
                
                    $pdf->SetFont("Arial", "B", 9);
                    $pdf->Cell(50, 7, "Grupo", 1, 0, "C");
                    $pdf->Cell(50, 7, "Cantidad de Alumnos", 1, 1, "C");
                
                    $pdf->SetFont("Arial", "", 9);
                
                    while ($fila = $resultado->fetch_assoc()) {
                        $pdf->Cell(50, 7, utf8_decode($fila['grupo']), 1, 0, "C");
                        $pdf->Cell(50, 7, utf8_decode($fila['cantidad_alumnos']), 1, 1, "C");
                    }
                    $pdf->Ln();
                    break;
                case "genero":
                    $pdf = new PDF("P", "mm", "letter");
                        $pdf->AliasNbPages();
                        $pdf->SetMargins(10, 10, 10);
                        $pdf->AddPage();

                        $sql = "SELECT genero, COUNT(*) AS cantidad_estudiantes
                        FROM estudiante
                        GROUP BY genero";
                        
                        $resultado = $conexion->query($sql);

                        $Ndocs=mysqli_num_rows($resultado);
                        
                        
                        
                        $pdf->SetFont("Arial", "B", 9);
                        
                        $pdf->Cell(30, 5, utf8_decode('Cantidad de estudiantes por genero'));

                        $pdf->Cell(30);
                        $pdf->cell(10,5,utf8_decode($Ndocs));
                        $pdf->cell(15,5,utf8_decode('resultados'));
                        
                        $pdf->Cell(0, 7, "", 0, 1, "C"); // Celda de espaciado
                        
                        $pdf->SetFont("Arial", "B", 9);
                        $pdf->Cell(50, 7, "Genero", 1, 0, "C");
                        $pdf->Cell(50, 7, "Cantidad de estudiantes", 1, 1, "C");
                        
                        $pdf->SetFont("Arial", "", 9);
                        
                        while ($fila = $resultado->fetch_assoc()) {
                            $pdf->Cell(50, 7, utf8_decode($fila['genero']), 1, 0, "C");
                            $pdf->Cell(50, 7, utf8_decode($fila['cantidad_estudiantes']), 1, 1, "C");
                        }
                        
                        $pdf->Ln();

                    break;

                }
                switch ($op) {
                    case "Estilo":
                                                           
                                $sql2="SELECT categoria, COUNT(idMaterial) AS numero_material FROM material_didactico GROUP BY categoria";
            
        
                                $resultado2=$conexion->query($sql2);
                                
                                $Ndocs2=mysqli_num_rows($resultado2);
                            
                                $pdf->SetFont("Arial", "B", 9);
                            
                                $pdf->cell(30,5,utf8_decode('Material por estilo de aprendizaje '));
                                $pdf->Cell(30);
                                $pdf->cell(10,5,utf8_decode($Ndocs2));
                                $pdf->cell(15,5,utf8_decode('resultados'));
                                        
                                $pdf->Ln();
                                $pdf->Cell(35, 5, "Estilo de aprendizaje", 1, 0, "C");
                                $pdf->Cell(19, 5, "Cantidad", 1, 0, "C");
                                $pdf->Ln();
                            
                                $pdf->SetFont("Arial", "", 9);
                            
                                while ($fila2 = $resultado2->fetch_assoc()) {
                                    $pdf->Cell(35, 5, utf8_decode($fila2['categoria']), 1, 0, "C");
                                    $pdf->Cell(19, 5, utf8_decode($fila2['numero_material']), 1, 0, "C"); // Aquí corregido
                                    $pdf->Ln();
                                }
                                $pdf->Ln();    
                                       
                        break;
                    case "Materia":
                        $sql = "SELECT tipo, COUNT(idMaterial) AS cantidad FROM material_didactico GROUP BY tipo";
        
                            $resultado = $conexion->query($sql);

                            $Ndocs=mysqli_num_rows($resultado);
                        
                            $pdf->SetFont("Arial", "B", 9);
                        
                            $pdf->Cell(20, 5, utf8_decode('Cantidad de material por tipo'));
                            
                            $pdf->Cell(30);
                            $pdf->cell(10,5,utf8_decode($Ndocs));
                            $pdf->cell(15,5,utf8_decode('resultados'));
                                                    
                            $pdf->Cell(0, 7, "", 0, 1, "C"); // Celda de espaciado
                        
                            $pdf->SetFont("Arial", "B", 9);
                            $pdf->Cell(50, 7, "Tipo", 1, 0, "C");
                            $pdf->Cell(50, 7, "Cantidad ", 1, 1, "C");
                        
                            $pdf->SetFont("Arial", "", 9);
                        
                            while ($fila = $resultado->fetch_assoc()) {
                                $pdf->Cell(50, 7, utf8_decode($fila['tipo']), 1, 0, "C");
                                $pdf->Cell(50, 7, utf8_decode($fila['cantidad']), 1, 1, "C");
                            }
                            $pdf->Ln();
                        break;
                    case "RangoFecha":
                         $sql = "SELECT tipo, COUNT(*) AS cantidad_archivos 
                        FROM material_didactico 
                        WHERE fechaPublicacion BETWEEN '$fechaInicioMaterial' AND '$fechaFinMaterial' 
                        GROUP BY tipo";
                
                        $resultado = $conexion->query($sql);
                        
                        $Ndocs=mysqli_num_rows($resultado);

                        $pdf->SetFont("Arial", "B", 9);
                    
                        $pdf->Cell(30, 5, utf8_decode('Cantidad de material por rango de fechas'));
                        
                        $pdf->Cell(35);
                        $pdf->cell(10,5,utf8_decode($Ndocs));
                        $pdf->cell(15,5,utf8_decode('resultados'));

                        $pdf->Cell(0, 7, "", 0, 1, "C"); // Celda de espaciado
                    
                        $pdf->SetFont("Arial", "B", 9);
                        $pdf->Cell(50, 7, "tipo", 1, 0, "C");
                        $pdf->Cell(50, 7, "cantidad_archivos", 1, 1, "C");
                    
                        $pdf->SetFont("Arial", "", 9);
                    
                        while ($fila = $resultado->fetch_assoc()) {
                            $pdf->Cell(50, 7, utf8_decode($fila['tipo']), 1, 0, "C");
                            $pdf->Cell(50, 7, utf8_decode($fila['cantidad_archivos']), 1, 1, "C");
                        }
                        $pdf->Ln();
                        break;
                }
                if($encuestaR == 'si'){
                    $sql = "SELECT idPregunta, nivelS, COUNT(*) AS cantidad
                    FROM respuesta
                    GROUP BY idPregunta, nivelS";
            
                    $resultado = $conexion->query($sql);

                    $Ndocs=mysqli_num_rows($resultado);
                                
                    $pdf->SetFont("Arial", "B", 9);
                
                    $pdf->Cell(35, 5, utf8_decode('Resultados en Encuesta de satisfacción'));
                    $pdf->Cell(35);
                    $pdf->cell(10,5,utf8_decode($Ndocs));
                    $pdf->cell(15,5,utf8_decode('resultados'));
                
                    $pdf->Cell(0, 7, "", 0, 1, "C"); // Celda de espaciado
                
                    $pdf->SetFont("Arial", "B", 9);
                    $pdf->Cell(50, 7, "Id de la pregunta", 1, 0, "C");
                    $pdf->Cell(50, 7, utf8_decode("Nivel de satisfacción "), 1, 0, "C");
                    $pdf->Cell(50, 7, "Cantidad ", 1, 1, "C");
                
                    $pdf->SetFont("Arial", "", 9);
                
                    while ($fila = $resultado->fetch_assoc()) {
                        $pdf->Cell(50, 7, utf8_decode($fila['idPregunta']), 1, 0, "C");
                        $pdf->Cell(50, 7, utf8_decode($fila['nivelS']), 1, 0, "C");
                        $pdf->Cell(50, 7, utf8_decode($fila['cantidad']), 1, 1, "C");
                    }
                    $pdf->Ln();
                }
            
            }
            else{
                //envía alerta de campos vacíos 
                  echo'<div class="alert alert-warning">Campos vacios</div>';
              }


        }
        

          
    
    
    
    $pdf->Output();
?>
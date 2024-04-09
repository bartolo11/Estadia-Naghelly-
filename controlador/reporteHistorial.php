<?php
$conexion=mysqli_connect("localhost","root","","prueba1");
if(!empty($_POST["nss"])){
require "../modelo/plantilla1.php";

 $nss=$_POST['nss'];
    session_start();

    $sql="SELECT * FROM paciente WHERE NSS='$nss'";
    $resultado=$conexion->query($sql);
    if(mysqli_num_rows($resultado)>0){

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 9);

    $pdf->cell(30,5,utf8_decode('Pacientes'));
    $pdf->Ln();

    $pdf->Cell(10, 5, "Id", 1, 0, "C");
    $pdf->Cell(25, 5, "Nombre", 1, 0, "C");
    $pdf->Cell(20, 5, "Apellido P", 1, 0, "C");
    $pdf->Cell(20, 5, "Apellido M", 1, 0, "C");
    $pdf->Cell(28, 5, "Fecha nacimiento", 1, 0, "C");
    $pdf->Cell(23, 5, "Fecha ingreso", 1, 0, "C");
    $pdf->Cell(20, 5, "NSS", 1, 0, "C");
    $pdf->Cell(10, 5, "peso", 1, 0, "C");
    $pdf->Cell(10, 5, "altura", 1, 0, "C");
    $pdf->Cell(30, 5, "Alergias", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['idPaciente'], 1, 0, "C");
        $pdf->Cell(25, 5, utf8_decode($fila['NombreP']), 1, 0, "C");
        $pdf->Cell(20, 5, utf8_decode($fila['ApellidoPP']), 1, 0, "C");
        $pdf->Cell(20, 5, utf8_decode($fila['ApellidoMP']), 1, 0, "C");
        $pdf->Cell(28, 5, $fila['FeNacP'], 1, 0, "C");
        $pdf->Cell(23, 5, $fila['FeIng'], 1, 0, "C");
        $pdf->Cell(20, 5, $fila['NSS'], 1, 0, "C");
        $pdf->Cell(10, 5, $fila['Peso'], 1, 0, "C");
        $pdf->Cell(10, 5, $fila['Altura'], 1, 0, "C");
        $pdf->MultiCell(30, 5, $fila['Alergias'],1,"L",0);
    }
    $pdf->Ln();
    $pdf->SetFont("Arial", "B", 9);

    $pdf->cell(30,5,utf8_decode('Familiares'));
    $pdf->Ln();

    $sql5="SELECT * FROM familiar WHERE NssP='$nss'";
    $resultado5=$conexion->query($sql5);
    $Nfam=mysqli_num_rows($resultado5);

    
    $pdf->Cell(10, 5, "Id", 1, 0, "C");
    $pdf->Cell(15, 5, "Nombre", 1, 0, "C");
    $pdf->Cell(30, 5, "Apellido Pa", 1, 0, "C");
    $pdf->Cell(30, 5, "Apellido Ma", 1, 0, "C");
    $pdf->Cell(30, 5, "Fecha nacimiento", 1, 0, "C");
    $pdf->Cell(20, 5, "Parentesco", 1, 0, "C");
    $pdf->Cell(20, 5, "Nss paciente", 1, 0, "C");
    $pdf->Cell(20, 5, "telefono", 1, 1, "C");


    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado5->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['idFamiliar'], 1, 0, "C");
        $pdf->Cell(15, 5, utf8_decode($fila['NombreF']), 1, 0, "C");
        $pdf->Cell(30, 5, utf8_decode($fila['ApellidoPF']), 1, 0, "C");
        $pdf->Cell(30, 5, utf8_decode($fila['ApellidoMF']), 1, 0, "C");
        $pdf->Cell(30, 5, $fila['FeNacF'], 1, 0, "C");
        $pdf->Cell(20, 5, utf8_decode($fila['parentesco']), 1, 0, "C");
        $pdf->Cell(20, 5, $fila['NssP'], 1, 0, "C");
        $pdf->Cell(20, 5, $fila['telefono'], 1, 1, "C");
    }

    $pdf->Ln();
    $pdf->SetFont("Arial", "B", 9);

    $pdf->cell(30,5,utf8_decode('Citas'));
    $pdf->Ln();

    $sql6="SELECT * FROM cita WHERE Nsspac='$nss'";
    $resultado6=$conexion->query($sql6);
    $Ncit=mysqli_num_rows($resultado6);

    $pdf->Cell(10, 5, "Id", 1, 0, "C");
    $pdf->Cell(25, 5, "Fecha cita", 1, 0, "C");
    $pdf->Cell(15, 5, "costo", 1, 0, "C");
    $pdf->Cell(25, 5, "Cedula doctor", 1, 0, "C");
    $pdf->Cell(20, 5, "Nss paciente", 1, 0, "C");
    $pdf->Cell(70, 5, "Diagnostico", 1, 1, "C");

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado6->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['idCita'], 1, 0, "C");
        $pdf->Cell(25, 5, $fila['FechaCita'], 1, 0, "C");
        $pdf->Cell(15, 5, $fila['Costo'], 1, 0, "C");
        $pdf->Cell(25, 5, utf8_decode($fila['CedulaD']), 1, 0, "C");
        $pdf->Cell(20, 5, $fila['Nsspac'], 1, 0, "C");
        $pdf->MultiCell(70, 5, utf8_decode($fila['Diagnostico']),1,"L",0);
    }

    $pdf->Ln();
    $pdf->SetFont("Arial", "B", 9);

    $pdf->cell(30,5,utf8_decode('Medicamentos'));
    $pdf->Ln();

    $sql7="SELECT * FROM medicamento WHERE NSS='$nss'";
    $resultado7=$conexion->query($sql7);
    $Nmed=mysqli_num_rows($resultado7);

    $pdf->Cell(10, 5, "Id", 1, 0, "C");
    $pdf->Cell(40, 5, "Nombre del medicamento", 1, 0, "C");
    $pdf->Cell(60, 5, "Periodo entre docis", 1, 0, "C");
    $pdf->Cell(30, 5, "NSS del paciente", 1, 1, "C");
   

    $pdf->SetFont("Arial", "", 9);

    while ($fila = $resultado7->fetch_assoc()) {
        $pdf->Cell(10, 5, $fila['idMedicamento'], 1, 0, "C");
        $pdf->Cell(40, 5, utf8_decode($fila['NombreM']), 1, 0, "C");
        $pdf->Cell(60, 5, utf8_decode($fila['periodo']), 1, 0, "C");
        $pdf->Cell(30, 5, $fila['NSS'], 1, 1, "C");
    }




    $pdf->Output();}
      else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Paciente inexistente");'; 
        echo 'window.location = "../historialm.php";';
        echo '</script>';
      }
    }
    else{
        echo '<script type="text/javascript">'; 
        echo 'alert("El campo esta vacio");'; 
        echo 'window.location = "../historialm.php";';
        echo '</script>';
      }
?>
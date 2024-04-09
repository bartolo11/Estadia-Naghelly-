<?php
if (isset($_POST['enviar'])){
if (!empty($_POST['email'])){
    $asunto = "Recuperación de contraseña";
    $msg = "Esta es una contraseña aleatoria con la que podras ingresar";
    $email = $_POST['email'];
    $header = "From: rojas.naghelly@gmail.com" . "\r\n";
    $header.= "Reply-To: rojas.naghelly@gmail.com" . "\r\n";
    $header.= "X-Mailer: PHP/". phpversion();
    $mail = @mail($email,$asunto,$smg,$header);
    if ($mail){
        echo "<h4>¡Correo enviado exitosamente!</h4>";  
    } 
}
}
?>
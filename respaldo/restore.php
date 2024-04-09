<?php

session_start();

include 'function.php';

if(isset($_POST['restore'])){
    
    $server ="localhost";
    $username = "root";
    $password = "";
    $dbname = $_POST['dbname'];

    $filename = $_FILES['sql']['name'];
    move_uploaded_file($_FILES['sql']['tmp_name'],'upload/' . $filename);
    $file_location = 'upload/' . $filename;

    $restore = restore($server, $username, $password, $dbname, $file_location);

    if($restore['error']){
        $_SESSION['error'] = $restore['message'];
    }
    else{
        $_SESSION['success'] = $restore['message'];
    }

}
else{
    $_SESSION['error'] = 'Completa las credenciales de la base de datos primero';
}

header('location:index.php');

?>

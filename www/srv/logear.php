<?php session_start();
    include "../class/Auth.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $Auth = new Auth();

    if ($Auth->logear($email, $password)) {
        header("location:../inicio.php");
    } else {
        echo "No se pudo logear";
    }

?>
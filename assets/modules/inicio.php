<?php
session_start();

$usuario = $_SESSION['email'];

if(!isset($usuario)){
    header("location: ../../index.php");
}

echo "<h1>BIENVENIDO '$usuario' </h1>";

echo "<a href='salir.php'>salir</a>"

?>
<?php

require 'conexion.php';
session_start();
@$email = $_POST['email'];
@$pass = $_POST['pass']; 
$usuario = $_SESSION['email'];


$q = "SELECT COUNT(*) as contar FROM usuarios WHERE email = '$email' and pass = '$pass' ";

$consulta = mysqli_query($conexion, $q);

$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
    $_SESSION['email'] = $email;
    if(!empty($_POST['reme'])){

      $reme = $_POST['reme'];
      
      setcookie('email',$email,time()+3600*24*7);
      setcookie('pass',$pass,time()+3600*24*7);
      setcookie('login',$reme,time());
  
  }else{
      setcookie('email',$email,30);
      setcookie('pass',$email,30);
      setcookie('login',$reme,time());
  }
    header("location: assets/modules/index");
    header("location: inicio");
    
}else{
    //header("location: error");
}

?>
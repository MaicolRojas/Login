<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>
    
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action=""  method="post">
    <img class="mb-4" src="assets/img/logo.png" alt="" width="100" height="100">
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    <div class="form-floating">
      <input type="email" class="form-control" value = "<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" name="email" id="email" placeholder="name@example.com" required>
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" value = '<?php if(isset($_COOKIE["pass"])) { echo $_COOKIE["pass"]; } ?>' name="pass" id="pass" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name='reme' <?php if(isset($_COOKIE["pass"])) { echo "checked";} ?>> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>


    
  </body>
</html>

<?php

require 'assets/modules/conexion.php';
session_start();
@$email = $_POST['email'];
@$pass = $_POST['pass']; 
@$usuario = $_SESSION['email'];


$q = "SELECT COUNT(*) as contar FROM usuarios WHERE email = '$email' and pass = '$pass' ";

$consulta = mysqli_query($conexion, $q);

$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
    $_SESSION['email'] = $email;
    if(!empty($_POST['reme'])){

      $reme = $_POST['reme'];
      
      setcookie('email',$email,time()+3600*24*7);
      setcookie('pass',$pass,time()+3600*24*7);
      setcookie('login',$reme,time()+30);
  
  }else{
      setcookie('email',$email,30);
      setcookie('pass',$email,30);
      setcookie('login',$reme,time()+30);
  }
    header("location: index");
    header("location: assets/modules/inicio");
    
}else{
    //header("location: error");
}

?>

<?php
session_start();


if (isset($_SESSION['user_id'])){
  header('Location:../PaginaPrincipal/index.php');
}


require 'basedatos.php';

if(!empty($_POST['mail']) && !empty($_POST['pass'])){

$email =$_POST['mail'];
$password =$_POST['pass'];

$consulta = mysqli_query($conn,"SELECT id,nombre,email,contrasena,rol_id FROM usuarios WHERE email='$email' AND contrasena ='$password'");

$result = mysqli_num_rows($consulta);

$mensaje ='';


if($result > 0) {
  $data = mysqli_fetch_array($consulta);
  $_SESSION['user_id'] = $data['id'];

  $_SESSION['rol'] = $data['rol_id'];

  header('Location:../PaginaPrincipal/index.php');
}else{

  $mensaje = 'Los datos introducidos no coinciden';
}

}




?>
<!Doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Cover Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cover/">

    

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> </link>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">Devel4u</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Contact</a>
      </nav>
    </div>
  </header>

  <main class="px-3">

<div class="container">

    <div class="modal-dialog text-center">
      <div class=" col-12 main"> <!--col-sm-8-->
        <div class="modal-content">
        <p class="text-st">Iniciar Sesion</p>
          <div class="col-12  mt-2 mb-3">
            <img src="../src/images/user.png" height="250px" width="250px">
          <hr class="bg-white">
          </div>
          <?php if (!empty($mensaje)) {?>
          <div class="alert alert-info pl-2 pr-2">
          <?php echo $mensaje ?>
          </div>
          <?php } ?>

          <form class="col-12" action="Login.html" method="POST">
            <div class="form-group">
            <img src="../src/images/userinput.png" class="mb-2" height="40px" width="40px">
              <input type="email" name="mail" id="mail" class="form-control mb-2 text-center" placeholder="Email" required>
            </div>
            <div class="form-group">
              <img src="../src/images/contrainput4.png" class="mb-1" height="40px" width="40px">
              <input type="password" name="pass" id="pass" class="form-control mt-2 text-center" placeholder="Contrasena" required>
            </div>
            <hr class="bg-white">
            <button class="btn btn-info mb-3 mt-3 text-center w-50" type="submit">
            <img src="../src/images/login.png" class="mr-2 sty">Iniciar sesion</button>
          </form>

    </div>
  </main>

</div>


    
  </body>
</html>

<?php include_once "conexion.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

    </style>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
</head>
<body class="text-center">

 <?php include "Header.php";
 if (isset($_POST['iniciar'])){
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $query = "SELECT * FROM usuarios WHERE usuario ='$usuario' AND contraseña = '$contraseña';";
    $result = mysqli_query($link, $query);
    $filas = mysqli_num_rows($result);
    if ($filas > 0){
      $extraido = mysqli_fetch_array($result);
      $activado = $extraido['activado'];
      if ($activado) {
        session_start();
        $_SESSION['tipo'] = $extraido['tipo'];
        $_SESSION['usuario'] = $usuario;
        header("Location:Home.php");
      } else { echo $activado; ?><div class="alert alert-danger" role="alert">Active su cuenta por favor</div><?php }
    } else { ?><div class="alert alert-danger" role="alert">Usuario y/o contraseña incorrecto</div><?php }
 }
 include "obligatorios.html";
 ?>


<div class="container">
    <form method="POST" class="form-signin rounded" style="background-color: #e9ecef">
        <h1 class="h3 mb-3 font-weight-normal">Ingrese sus datos</h1>
        <br>
        <div class="row">
            <div class="col-md-10">
                <label for="usuario" class="sr-only">Usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
            </div>
            <div class="col-2">
                <p style="color:red">*</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-10">
            <label for="contraseña" class="sr-only">Contraseña</label>
            <input type="password" name="contraseña" class="form-control" placeholder="Contraseña" required>
        </div>
        <div class="col-2">
            <p style="color:red">*</p>
        </div>
    </div>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="iniciar">Iniciar sesion</button>
    
    </form>
</div>

 <?php include "Footer.php" ?>

 <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

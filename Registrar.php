<?php
include_once "conexion.php"; 
?>

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
    <title>Crear Cuenta</title>
</head>
<body class="text-center">

 <?php 
 include "Header.php";

 if (isset($_POST['registrar'])){
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $tipo = 'usuario';

    $query1 = "SELECT * FROM usuarios WHERE usuario ='$usuario'";
    $result1 = mysqli_query($link, $query1); 
    $filasq1 = mysqli_num_rows($result1);

    if ($filasq1 == 0){
        $query2 = "INSERT INTO usuarios (usuario, email, contraseña, tipo) VALUES ('$usuario','$email','$contraseña','$tipo');";

        $result2 = mysqli_query($link, $query2);  

        if ($result2){
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['tipo'] = $tipo;
            header("Location:Home.php");
        }else{
            ?>
            <div class="alert alert-danger" role="alert">Error en la Base de Datos, intentelo de nuevo mas tarde</div>
            <?php
        }
    }else{
        ?>
        <div class="alert alert-danger" role="alert">El usuario ingresado ya existe, ingrese uno diferente</div>
        <?php
    }
}
 ?>



<div class="container">
    <form  method="POST" class="form-signin rounded" style="background-color: #e9ecef">
        <h1 class="h3 mb-3 font-weight-normal">Crear Cuenta</h1>
        <br>
        <label for="usuario" class="sr-only">Usuario</label>
        <input type="text" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
        <br>
        <label for="email" class="sr-only">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Direccion e-mail" required autofocus>
        <br>
        <label for="contraseña" class="sr-only">Contraseña</label>
        <input type="password" name="contraseña" class="form-control" placeholder="Contraseña" required>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="registrar">Crear Cuenta</button>
    </form>
</div>



 <?php 
 include "Footer.php"
 ?>

 <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
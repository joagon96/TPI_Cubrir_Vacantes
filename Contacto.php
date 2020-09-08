<?php include_once "conexion.php"; ?>

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
    <title>Contacto</title>
</head>
<body class="text-center">

 <?php include "Header.php";
 if (isset($_POST['enviar'])){
   if (isset($_SESSION['usuario'])) {
     $consulta = $_POST['consulta'];
     $usuario = $_SESSION['usuario'];
     $query = "SELECT * FROM usuarios WHERE usuario ='$usuario';";
     $result = mysqli_query($link, $query);
     $extraido = mysqli_fetch_array($result);
     $email = $extraido['email'];
     $asunto = 'Consulta';
     $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
     $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
     $cabeceras .= 'From: '. $email . "\r\n";
     $cuerpo = '
     <html>
     <head>
     <title>Consulta de '.$usuario.':</title>
     </head>
     <body>
     <p>'.$consulta.'</p>
     </body>
     </html>
     ';
     mail('jcpistol16@gmail.com',$asunto,$cuerpo,$cabeceras);
     ?>
     <div class="alert alert-success" role="alert">Consulta enviada, nos contactaremos de inmediato.</div>
     <?php
   } else { ?><div class="alert alert-danger" role="alert">Inicie sesión para enviar consulta.</div><?php }
   }?>

<div class="container">
    <form method="POST" class="form-signin rounded" style="background-color: #e9ecef">
        <h1 class="h3 mb-3 font-weight-normal">Ingrese su consulta:</h1>
        <br>
        <label for="consulta" class="sr-only">Consulta:</label>
        <textarea id="consulta" name="consulta" class="form-control" placeholder="Consulta" required autofocus></textarea>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="enviar">Enviar Consulta</button>
    </form>
</div>
<a href="Home.php">Volver a Inicio</a>

 <?php include "Footer.php" ?>

 <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

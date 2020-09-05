<?php
include 'conexion.php';
$msg='Email confirmado';
if(!empty($_GET['code']) && isset($_GET['code'])) {
  $code=mysqli_real_escape_string($link,$_GET['code']);
  $c=mysqli_query($link,"SELECT id FROM usuarios WHERE email='$code'");
  if(mysqli_num_rows($c) > 0) {
    $count=mysqli_query($link,"SELECT id FROM usuarios WHERE email='$code' and activado='0'");
    if(mysqli_num_rows($count) == 1) {
      mysqli_query($link,"UPDATE usuarios SET activado='1' WHERE email='$code'");
      $msg = "Tu cuenta ha sido activada";
      $tipo_msg = 'success';
    } else {
      $msg = "Tu cuenta ya estaba activada, no hay necesidad de volver a activarla";
      $tipo_msg = 'warning';
    }
  } else {
    $msg = "Código de activación erróneo";
    $tipo_msg = 'danger';
  }
} ?>
//HTML Part
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
    <title>Activar Cuenta</title>
</head>
<body class="text-center">

 <?php
 include "Header.php"; ?>
 <div class="alert alert-<?php echo $tipo_msg; ?>" role="alert"><?php echo $msg; ?></div>
 <?php
 include "Footer.php"
 ?>

 <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

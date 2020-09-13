<?php include 'conexion.php';
$msg='Email confirmado';
if(!empty($_GET['code']) && isset($_GET['code'])) {
  $code=mysqli_real_escape_string($link,$_GET['code']);
  $c=mysqli_query($link,"SELECT id FROM usuarios WHERE email='$code'"); ?>

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

 <?php include "Header.php";
 if(!isset($tipo_msg)){
    if(mysqli_num_rows($c) > 0) {
    $count=mysqli_query($link,"SELECT id FROM usuarios WHERE email='$code' and activado='0'");
        if(mysqli_num_rows($count) == 1) {
        if(isset($_POST['registrar'])) {
            $contraseña = $_POST['contraseña'];
            $contraseña2 = $_POST['contraseña2'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            if($contraseña <> $contraseña2) {?> <div class="alert alert-danger" role="alert">Los campos Contraseña y Confirmar Contraseña deben ser iguales</div> <?php
            } else {
            mysqli_query($link,"UPDATE usuarios
                SET activado='1', contraseña = '$contraseña', nombre = '$nombre',
                apellido = '$apellido', telefono = '$telefono'
                WHERE email='$code'");
            $msg = "Tu cuenta ha sido activada";
            $tipo_msg = 'success';
            } } if ($tipo_msg <> 'success') {?>

            <div class="container">
                <form  method="POST" class="form-signin rounded" style="background-color: #e9ecef">
                    <h1 class="h3 mb-3 font-weight-normal">Crear Cuenta</h1>
                    <div class="row">
                        <div class="col-md-10">
                            <label for="nombre" class="sr-only">Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required autofocus>
                        </div>
                        <div class="col-md-2">
                            <p style="color:red">*</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                            <label for="apellido" class="sr-only">Apellido</label>
                            <input type="text" name="apellido" class="form-control" placeholder="Apellido" required autofocus>
                        </div>
                        <div class="col-md-2">
                            <p style="color:red">*</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                            <label for="telefono" class="sr-only">Telefono</label>
                            <input type="text" name="telefono" class="form-control" placeholder="Telefono" required autofocus>
                        </div>
                        <div class="col-md-2">
                            <p style="color:red">*</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                    <label for="contraseña" class="sr-only">Contraseña</label>
                    <input type="password" name="contraseña" class="form-control" placeholder="Contraseña" required>
                    </div>
                        <div class="col-md-2">
                            <p style="color:red">*</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                    <label for="contraseña2" class="sr-only">Confirmar Contraseña</label>
                    <input type="password" name="contraseña2" class="form-control" placeholder="Confirmar Contraseña" required>
                    </div>
                        <div class="col-md-2">
                            <p style="color:red">*</p>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="registrar">Crear Cuenta</button>
                </form>
            </div>


        <?php }} else {
            $msg = "Tu cuenta ya estaba activada, no hay necesidad de volver a activarla";
            $tipo_msg = 'warning';
            }} else {
        $msg = "Código de activación erróneo";
        $tipo_msg = 'danger'; }
} else { ?>
 <div class="alert alert-<?php echo $tipo_msg; ?>" role="alert"><?php echo $msg; ?></div>
<?php }} include "Footer.php" ?>

 <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

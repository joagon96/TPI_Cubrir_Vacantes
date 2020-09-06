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
    <title>Editar Perfil</title>
</head>
<body class="text-center">

 <?php include "Header.php";
     $usuario = $_SESSION['usuario'];
     $query1 = "SELECT * FROM usuarios WHERE usuario ='$usuario'";
     $result1 = mysqli_query($link, $query1);
     $extraido = mysqli_fetch_array($result1);
     $nombre = $extraido['nombre'];
     $apellido = $extraido['apellido'];
     $telefono = $extraido['telefono'];

     if (isset($_POST['editar'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $query1 = "UPDATE usuarios
                    SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono'
                    WHERE usuario ='$usuario'";
        $result1 = mysqli_query($link, $query1); } 

include "obligatorios.html";     
?>

<div class="container">
    <form  method="POST" class="form-signin rounded" style="background-color: #e9ecef">
        <h1 class="h3 mb-3 font-weight-normal">Editar Perfil</h1>
        <br>
        <div class="row">
            <div class="col-md-10">
                <label for="nombre" class="sr-only">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $nombre; ?>" required autofocus>
            </div>   
            <div class="col-md-2">
                <p style="color:red">*</p>
            </div> 
        </div>
        <br>
        <div class="row">
            <div class="col-md-10">
                <label for="apellido" class="sr-only">Apellido</label>
                <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="<?php echo $apellido; ?>" required autofocus>
            </div>   
            <div class="col-md-2">
                <p style="color:red">*</p>
            </div> 
        </div>
        <br>
        <div class="row">
            <div class="col-md-10">
                <label for="telefono" class="sr-only">Telefono</label>
                <input type="text" name="telefono" class="form-control" placeholder="Telefono" value="<?php echo $telefono; ?>" required autofocus>
            </div>   
            <div class="col-md-2">
                <p style="color:red">*</p>
            </div> 
        </div> 
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="editar">Editar</button>
    </form>
</div>

 <?php include "Footer.php" ?>

 <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

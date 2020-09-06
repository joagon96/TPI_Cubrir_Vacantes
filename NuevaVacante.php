<?php
include "conexion.php"; 
?>
<html lang="en">
<head>
    <style>
        .form-signin {
            width: 100%;
            max-width: 500px;
            padding: 15px;
            margin: 0 auto;
}
    </style>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Vacante</title>
</head>
<body class="text-center">

 <?php 
 include "Header.php";

 if (isset($_POST['registrarVacante'])){
    $titulo = $_POST['titulo'];
    $fechaDesde = $_POST['fechaDesde'];
    $fechaHasta = $_POST['fechaHasta'];
    $descripcion = $_POST['descripcion'];

 
    $query = "INSERT INTO vacantes (titulo, fecha_desde, fecha_hasta, descripcion) VALUES ('$titulo','$fechaDesde','$fechaHasta','$descripcion');";

    $result = mysqli_query($link, $query);  

    if ($result){
        ?>
        <div class="alert alert-success" role="alert">La vacante fue registrada con exito</div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger" role="alert">Error en la Base de Datos, intentelo de nuevo mas tarde</div>
        <?php
    }
 } 
 include "obligatorios.html";
 ?>

<div class="container">
    <form method="POST" class="form-signin rounded" style="background-color: #e9ecef">
        <h1 class="h3 mb-3 font-weight-normal">Datos de la Vacante</h1>
        <div class="row">
            <div class="col-md-3">
                <label for="titulo">Titulo Vacante:</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="titulo" class="form-control" required autofocus>
            </div>
            <div class="col-md-1">
                <p style="color:red">*</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="fechaDesde">Fecha Desde:</label>
            </div>
            <div class="col-md-8">
                <input type="date" name="fechaDesde" class="form-control" required autofocus>
            </div>
            <div class="col-md-1">
                <p style="color:red">*</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="fechaHasta">Fecha Hasta: </label>
            </div>
            <div class="col-md-8">
                <input type="date" name="fechaHasta" class="form-control" required>
            </div>
            <div class="col-md-1">
                <p style="color:red">*</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="descripcion">Descripcion del puesto: </label>
            </div>
            <div class="col-md-8">
                <textarea  name="descripcion" class="form-control" required></textarea>
            </div>
            <div class="col-md-1">
                <p style="color:red">*</p>
            </div>
        </div>
        <br>
        <button class="btn btn-lg btn-primary" type="submit" name="registrarVacante">Crear Vacante</button>
    </form>
</div>
<a href="CubrirVacantes.php">Volver a Vacantes</a>
 <?php 
 include "Footer.php"
 ?>

 <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
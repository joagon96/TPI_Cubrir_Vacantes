<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolsa de Trabajo</title>
</head>
<body class="text-center">

 <?php 
 include "Header.php"
 ?>
<h1>Orden de merito para Soporte Tecnico</h1>

<div class="container">
    <div class="card">
        <div class="card-header">
        <div class="class row">
            <div class="col-md-10">
                <h2 class="text-center" style="margin-left:20%">Postulados</h2>
            </div>
            <div class="col-md-2">
            <a href="CargaOrdenDeMerito.php" class="btn btn-primary" role="button" >Agregar Postulados</a>
            </div>
        </div>
        </div>
        <table class="card-table table">
            <thead>
            <tr>
                <th scope="col">Numero</th>
                <th scope="col">Nombre</th>
                <th scope="col">Adecuacion</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>01</td>
                <td>Juan Perez</td>
                <td>85%</td>
            </tr>
            <tr>
                <td>02</td>
                <td>Miguel Torres</td>
                <td>70%</td>
            </tr>
            <tr>
                <td>03</td>
                <td>Pedro Rodriguez</td>
                <td>60%</td>
            </tr>
        </table>
    </div>
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
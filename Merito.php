<?php
include "conexion.php";
$titulo = ($_GET['var']);


?>
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
 include "Header.php";

 if (isset($_SESSION['usuario'])){
    $tipo = $_SESSION['tipo'];
 }

 $query = "SELECT * FROM merito WHERE  titulo = '$titulo' ORDER BY adecuacion DESC;";
 $result = mysqli_query($link, $query);  
 

 ?>
<h1>Orden de merito para <?php echo $titulo ?></h1>

<div class="container">
    <div class="card">
        <div class="card-header">
        <?php
            if(isset($tipo)){
                if ($tipo == "admin"){
                ?>
                    <div class="class row">
                    <div class="col-md-10">
                        <h2 class="text-center" style="margin-left:20%">Postulados</h2>
                    </div>
                    <div class="col-md-2">
                    <a href="CargaOrdenDeMerito.php?var=<?php echo $titulo?>" class="btn btn-primary" role="button" >Agregar Postulados</a>
                    </div>
                <?php }elseif($tipo == "usuario"){
                    ?>
                    <h2 class="text-center">Postulados</h2>
                    <?php
                }
            }else{
                ?>
                    <h2 class="text-center">Postulados</h2>
                <?php
            }
            ?>
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
                <?php 
                while ($mostrar = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $mostrar['id']?></td>
                    <td><?php echo $mostrar['usuario']?></td>
                    <td><?php echo $mostrar['adecuacion']?>%</td>
                </tr>
                <?php
                }
                ?>
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
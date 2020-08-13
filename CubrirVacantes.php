<?php
include "conexion.php";

$query = "SELECT * FROM vacantes;";
$result = mysqli_query($link, $query);

session_start();
if (isset($_SESSION['usuario'])){
    $tipo = $_SESSION['tipo'];
}
?>
<html lang="en">
<head>

<style>

    .btn.primary {
    color:blue;
    }

    .btn.disabled {
    color:grey;
    }

</style>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
}
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolsa de Trabajo</title>
</head>
<body class="text-center">

 <?php 
 include "Header.php"
 ?>
<h1>Bolsa de Trabajo</h1>

<div class="container">
    <div class="card">
        <div class="card-header">
            <?php
            if(isset($tipo)){
                if ($tipo == "admin"){
                ?>
                    <div class="class row">
                    <div class="col-md-10">
                        <h2 class="text-center" style="margin-left:20%">Vacantes</h2>
                    </div>
                    <div class="col-md-2">
                    <a href="NuevaVacante.php" class="btn btn-primary" role="button" >Nueva Vacante</a>
                    </div>
                <?php }elseif($tipo == "usuario"){
                    ?>
                    <h2 class="text-center">Vacantes</h2>
                    <?php
                }
            }else{
                ?>
                    <h2 class="text-center">Vacantes</h2>
                <?php
            }
            ?>
        </div>
        <table class="card-table table">
            <thead>
            <tr>
                <th scope="col">Numero</th>
                <th scope="col">Titulo</th>
                <th scope="col">Detalle</th>
                <th scope="col">Orden de Merito</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <?php 
            while ($mostrar = mysqli_fetch_array($result)){
            ?>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['titulo'] ?></td>
                <td>
                <?php
                $hoy = date("Y-m-d");
                $fecha =$mostrar['fecha_hasta'];
                $var = $mostrar['titulo'];              // creo esta variable para enviar por a traves de la url a otra pagina
                if (isset($tipo)){
                    if ($hoy < $fecha or $tipo == "admin"){
                    ?>
                        <a class="btn primary" href="Detalles.php?var=<?php echo $var?>">                                                                <!--  en el href le agregue la variable que cree antes para mandarla a esa direccion -->
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                        </svg></a>
                    <?php    
                    }else{
                    ?>
                        <a class="btn disabled" href="Detalles.php">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                        </svg></a>
                        <?php    
                    }
                }else{
                    if ($hoy < $fecha ){
                        ?>
                            <a class="btn primary" href="Detalles.php?var=<?php echo $var?>">                                                                <!--  en el href le agregue la variable que cree antes para mandarla a esa direccion -->
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg></a>
                        <?php    
                        }else{
                        ?>
                            <a class="btn disabled" href="Detalles.php">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg></a>
                            <?php    
                        }
                }
                ?>
                </td>
                <td>
                <?php
        
                $hoy = date("Y-m-d");
                $fecha =$mostrar['fecha_hasta'];
                if (isset($tipo)){
                    if ($hoy >= $fecha or $tipo == "admin"){
                    ?>
                        <a class="btn primary" href="Merito.php" ><svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-file-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
                        </svg></a>
                    <?php    
                    }else{
                    ?>
                        <a class="btn disabled" href="Merito.php" ><svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-file-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
                        </svg></a>
                    <?php    
                    }
                }else{
                    if ($hoy >= $fecha){
                        ?>
                            <a class="btn primary" href="Merito.php" ><svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-file-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
                            </svg></a>
                        <?php    
                        }else{
                        ?>
                            <a class="btn disabled" href="Merito.php" ><svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-file-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
                            </svg></a>
                        <?php    
                        }
                    }
                ?>
                </td>
            </tr>
            <?php 
            }
            ?>
        </table>
    </div>
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
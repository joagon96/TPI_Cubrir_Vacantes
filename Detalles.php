<?php
include "conexion.php";

$id = ($_GET['var']);

$postulado = false;     


$query = "SELECT * FROM vacantes WHERE id = '$id';";
$result = mysqli_query($link,$query);
$infoVacante = mysqli_fetch_array($result);

?>
<html lang="en">
<head>
    </style>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolsa de Trabajo</title>
</head>
<body class="text-center">

 <?php 
 include "Header.php";

if(isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
    
    //Obtengo el ID del usuario en base a su nombre
    $queryIdUsu = "SELECT id FROM usuarios WHERE usuario ='$usuario';";
    $resultIdUsu = mysqli_query($link, $queryIdUsu);
    $idUsu = mysqli_fetch_object($resultIdUsu)->id;//Devuelvo un objeto y accedo a su propiedad id

    //Ahora con el ID del usuario veo si esta postulado
    $query2 = "SELECT * FROM postulaciones WHERE id_usuario ='$idUsu' AND id_vacante = '$id';";
    $result2 = mysqli_query($link, $query2);
   
    $filas = mysqli_num_rows($result2);

    //Si esta postulado le aviso
    if ($filas > 0){
        $postulado = true;
        ?>
        <div class="alert alert-success" role="alert">Ya te postulaste a esta vacante</div>
        <?php
    }
 }
 ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title"><?php echo$infoVacante['titulo']?>
            <?php
            if(isset($usuario)){
                if ($usuario == "admin" or $usuario == "jefe"){    //Si el usuario es un admin o jefe activamos los botones de modificar y eliminar
                ?>
                <a href="EditarVacante.php?acc=Modificar&var=<?php echo $id?>" class="btn btn-primary" role="button" style="float:right">Modificar</a>
                <a href="EditarVacante.php?acc=Eliminar&var=<?php echo $id?>" class="btn btn-danger" role="button" style="float:right; margin-right:10px">Eliminar</a>
                <?php
                }
            }?>
            </h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 text-left">Fecha Desde:</div>
                <div class="col-md-10 text-left"><?php echo $infoVacante['fecha_desde']?></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 text-left">Fecha Hasta:</div>
                <div class="col-md-10 text-left"><?php echo $infoVacante['fecha_hasta']?></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 text-left">Descripcion del puesto:</div>
                <div class="col-md-10 text-left">
                <p> <?php echo $infoVacante['descripcion']?>
                </p>
                </div>
            </div>
        </div>
        <div class="card-footer">
        <?php
        if (!isset($_SESSION['usuario']) or $postulado ){
        ?>
           <a type="button" class="btn btn-secondary" href="#" data-toggle="tooltip" data-placement="right" title="Para enviar tu Curriculum es necesario iniciar sesion">Enviar CV</a>
        <?php
        }else{
        ?>
           <a type="button" class="btn btn-primary" href="Postulacion.php?var=<?php echo $id?>">Enviar CV</a>
        <?php
        }
        ?>
        </div>
    </div>
</div>

<a href="VacantesPaginacion.php?pagina=">Volver a Vacantes</a>

 <?php 
 include "Footer.php";
 ?>

 <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
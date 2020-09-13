<?php
include "conexion.php";
$id = ($_GET['var']);

$query = "SELECT * FROM merito WHERE id = '$id';";
$result = mysqli_query($link, $query);
$infoMerito = mysqli_fetch_array($result);

$idUsu = $infoMerito['id_usuario'];
$query2 = "SELECT * FROM usuarios WHERE id = '$idUsu';";
$result2 = mysqli_query($link, $query2);
$infoUsuario = mysqli_fetch_array($result2);

$modificado = 0; //Representa si el cambio fue aceptado.

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
    <title>Postulados</title>
</head>

<body class="text-center">

    <?php
    include "Header.php";
    //MODIFICAR VACANTE------------------------
    if (isset($_POST['modificarMerito'])) {
        $idUsuario = $infoMerito['id_usuario'];
        $idVacante = $infoMerito['id_vacante'];
        $adecuacion = $_POST['adecuacion'];

        $query = "UPDATE merito SET id_vacante='$idVacante', id_usuario='$idUsuario', adecuacion='$adecuacion' WHERE id='$id' ;";

        $result = mysqli_query($link, $query);


        if ($result) {
            ?>
            <div class="alert alert-success" role="alert">La orden de merito fue modificada con exito</div>
            <?php
            $modificado = 1;
        } else {
            ?>
            <div class="alert alert-danger" role="alert">Error en la Base de Datos, intentelo de nuevo mas tarde</div>
        <?php
        }
    }
    ?>

    <div class="container">
        <?php
        if ($modificado == 0)    //Si aun no aceptamos la modificacion
        {
        ?>
            <form method="POST" class="form-signin rounded" style="background-color: #e9ecef">
                <h1 class="h3 mb-3 font-weight-normal">Datos de la postulación</h1>
                <div class="row">
                    <div class="col-md-3 text-right">
                        <label for="titulo">Nombre:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="nombre" value="<?php echo($infoUsuario['nombre'])?>" class="form-control" required autofocus readonly>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3 text-right">
                        <label for="fechaDesde">Apellido:</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="apellido" value="<?php echo($infoUsuario['apellido'])?>" class="form-control" required autofocus readonly>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3 text-right">
                        <label for="fechaDesde">Adecuacion:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="number" min="0" max="100" name="adecuacion" value="<?php echo($infoMerito['adecuacion'])?>" class="form-control" required autofocus>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                    <div class="col-md-1 text-left">
                        <p style="color:red">*</p>
                    </div>
                </div>
                <br>
                <button class="btn btn-lg btn-primary" type="submit" name="modificarMerito">Modificar</button>
            </form>
            <?php
        }
        ?>
    </div>

    <?php
    if ($modificado == 0)   //Si todavia NO acepte la modificacion muestro VOLVER como un ENLACE
    {
    ?>
        <a href="./Merito.php?var=<?php echo ($infoMerito['id_vacante']) ?>">Volver</a>
    <?php
    } else    //Si ya acepte, muestro VOLVER como un BOTON
    { ?>
        <a href="./Merito.php?var=<?php echo ($infoMerito['id_vacante']) ?>" class="btn btn-primary" role="button">Volver</a>
    <?php
    }
    include "Footer.php"
    ?>
    
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
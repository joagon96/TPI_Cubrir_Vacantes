<?php
include "conexion.php";

session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    if ($usuario !="admin" and $usuario !="jefe"){
        header("location: ./Page404.html");}
} else {
    header("location: ./Page404.html");
}

$id = ($_GET['var']);
$acc = ($_GET['acc']);

$query = "SELECT * FROM vacantes WHERE id = '$id';";
$result = mysqli_query($link, $query);
$infoVacante = mysqli_fetch_array($result);

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
    <title>Modificar Vacante</title>
</head>

<body class="text-center">

    <?php
    include "Header.php";
    //MODIFICAR VACANTE------------------------
    if (isset($_POST['modificarVacante'])) {
        $titulo = $_POST['titulo'];
        $fechaDesde = $_POST['fechaDesde'];
        $fechaHasta = $_POST['fechaHasta'];
        $descripcion = $_POST['descripcion'];


        $query = "UPDATE vacantes SET titulo='$titulo', fecha_desde='$fechaDesde', fecha_hasta='$fechaHasta', descripcion='$descripcion' WHERE id='$id' ;";

        $result = mysqli_query($link, $query);

        if ($result) {
            ?>
            <div class="alert alert-success" role="alert">La vacante fue modificada con exito</div>
            <?php
            $modificado = 1;
        } else {
            ?>
            <div class="alert alert-danger" role="alert">Error en la Base de Datos, intentelo de nuevo mas tarde</div>
            <?php
        }
    }

    //ELIMINAR VACANTE------------------------
    if (isset($_POST['eliminarVacante'])) {

        $query = "DELETE FROM vacantes WHERE id='$id';";

        $result = mysqli_query($link, $query);

        if ($result) {
            ?>
            <div class="alert alert-success" role="alert">La vacante fue eliminada con exito</div>
            <?php
            $modificado = 2;
        } else {
            ?>
            <div class="alert alert-danger" role="alert">Error en la Base de Datos, intentelo de nuevo mas tarde</div>
            <?php
        }
    }
include "obligatorios.html";
    ?>

    <div class="container">
        <?php
        if ($modificado == 0)    //Si aun no aceptamos la modificacion
        {
        ?>
            <form method="POST" class="form-signin rounded" style="background-color: #e9ecef">
                <h1 class="h3 mb-3 font-weight-normal">Datos de la Vacante</h1>
                <div class="row">
                    <div class="col-md-3">
                        <label for="titulo">Titulo Vacante:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="titulo" value="<?php echo($infoVacante['titulo'])?>" class="form-control" required autofocus
                        <?php if ($acc=="Eliminar") //Si estoy eliminando vacante hago el campo de solo lectura
                        {
                            ?>
                            readonly <?php
                        }?> >
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
                        <input type="date" name="fechaDesde" value="<?php echo($infoVacante['fecha_desde'])?>" class="form-control" required autofocus
                        <?php if ($acc=="Eliminar")
                        {
                            ?>
                            readonly <?php
                        }?> >
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
                        <input type="date" name="fechaHasta" value="<?php echo($infoVacante['fecha_hasta'])?>" class="form-control" required
                        <?php if ($acc=="Eliminar")
                        {
                            ?>
                            readonly <?php
                        }?> >
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
                        <textarea name="descripcion" class="form-control" required
                        <?php if ($acc=="Eliminar")
                        {
                            ?>
                            readonly <?php
                        }?> ><?php echo($infoVacante['descripcion'])?></textarea>
                    </div>
                    <div class="col-md-1">
                        <p style="color:red">*</p>
                    </div>
                </div>
                <br>
                <?php
                if ($acc=="Modificar"){
                    ?>
                    <button class="btn btn-lg btn-primary" type="submit" name="modificarVacante">Modificar</button>
                    <?php
                }
                else{
                    ?>
                    <button class="btn btn-lg btn-danger" type="submit" name="eliminarVacante">Eliminar</button>
                    <?php
                }
                ?>
                
            </form>
        <?php
        }//Muestro el texto del boton modificarVariante segun si entre para modificar o eliminar, determinado en la variable $acc
        ?>

    </div>
    <?php
    if ($modificado == 0)   //Si todavia NO acepte la modificacion muestro VOLVER como un ENLACE
    {
    ?>
        <a href="Detalles.php?var=<?php echo ($id) ?>">Volver</a>
    <?php
    } else    //Si ya acepte, muestro VOLVER como un BOTON
    { ?>
        <a href="./CubrirVacantes.php" class="btn btn-primary" role="button">Volver</a>
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
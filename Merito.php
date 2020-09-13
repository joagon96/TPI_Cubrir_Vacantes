<?php
include "conexion.php";
$id = ($_GET['var']);

$query = "SELECT * FROM vacantes WHERE id = '$id';";
$result = mysqli_query($link, $query);
$infoVacante = mysqli_fetch_array($result);

?>
<html lang="en">

<head>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postulados</title>
</head>

<body class="text-center">

    <?php
    include "Header.php";

    if (isset($_SESSION['usuario'])) {
        $tipo = $_SESSION['tipo'];
    }

    $query = "SELECT us.nombre, us.apellido, me.adecuacion, me.id, me.id_usuario FROM merito AS me INNER JOIN usuarios AS us ON me.id_usuario = us.id WHERE me.id_vacante = '$id' ORDER BY adecuacion DESC;";
    $result = mysqli_query($link, $query);


    ?>
    <h1>Orden de merito para <?php echo $infoVacante['titulo'] ?></h1>

    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <?php
                if (isset($tipo)) {
                    if ($tipo == "admin" or $tipo == "jefe") {
                ?>
                        <div class="class row">
                            <div class="col-md-10">
                                <h2 class="text-center" style="margin-left:20%">Postulados</h2>
                            </div>
                            <div class="col-md-2">
                                <a href="CargaOrdenDeMerito.php?var=<?php echo $id ?>" class="btn btn-primary" role="button">Agregar Postulados</a>
                            </div>
                        <?php } elseif ($tipo == "usuario") {
                        ?>
                            <h2 class="text-center">Postulados</h2>
                        <?php
                    }
                } else {
                        ?>
                        <h2 class="text-center">Postulados</h2>
                    <?php
                }
                    ?>
                        </div>
                        <table class="card-table table">
                            <thead>
                                <tr>
                                    <th scope="col">Apellido, Nombre</th>
                                    <th scope="col">Adecuacion</th>
                                    <th scope="col"> Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($mostrar = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $mostrar['apellido'] . ", " . $mostrar['nombre'] ?></td>
                                        <td><?php echo $mostrar['adecuacion'] ?>%</td>
                                        <td><a href="EditarMerito.php?var=<?php echo ($mostrar['id']) ?>">
                                                <button style="border: none;">
                                                    <svg width="30px" height="20px" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </button>
                                            </a></td>
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
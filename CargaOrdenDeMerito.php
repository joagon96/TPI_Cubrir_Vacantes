<?php
include "conexion.php";
$titulo = ($_GET['var']);
$usuariosRegsitrados=[];

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
            .container-signin {
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


 $query = "SELECT * FROM postulaciones WHERE  titulo = '$titulo';";
 $result = mysqli_query($link, $query);  


 if (isset($_POST['agregar'])){
    $usuario = $_POST['usuario'];
    $adecuacion = $_POST['adecuacion'];

    $query3 = "SELECT * FROM merito WHERE  usuario='$usuario' and titulo = '$titulo';";
    $result3 = mysqli_query($link, $query3);
    $filas = mysqli_num_rows($result3);


    if($filas == 0){

        $query2 = "INSERT INTO merito (usuario, adecuacion, titulo) VALUES ('$usuario','$adecuacion','$titulo');";
        $result2 = mysqli_query($link, $query2);  

        
        if ($result2){
            ?>
            <div class="alert alert-success" role="alert">Operacion Realizada Correctamente</div>
            <?php
        }else{
            ?>
            <div class="alert alert-danger" role="alert">Error en la Base de Datos, intentelo de nuevo mas tarde</div>
            <?php
        }
    }else{
        ?>
        <div class="alert alert-danger" role="alert">El usuario ya esta registrado</div>
        <?php
    }
}

 ?>
<h1 class="h2 mb-3 font-weight-normal">Registro de Orden de Merito para <?php echo $titulo?></h1>
<div class="row">
    <div class="container col-md-6">
        <form method="POST" class="form-signin rounded" style=" background-color: #e9ecef">
            <h1 class="h3 mb-3 font-weight-normal">Orden de Merito</h1>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="titulo">Postulado:</label>
                </div>
                <div class="col-md-8">
                    <select name="usuario" class="form-control">
                        <?php 
                        while($mostrar = mysqli_fetch_array($result)){      
                                ?>
                                <option value="<?php echo $mostrar['usuario']?>"><?php echo $mostrar['usuario']?></option>
                                <?php                        
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label for="adecuacion">Adecuacion al puesto: </label>
                </div>
                <div class="col-md-8 input-group mb-4">
                    <input type="number" name="adecuacion" class="form-control" required>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
            <br>
            <button class="btn btn-lg btn-primary" type="submit" name="agregar">Agregar</button>
        </form>
    </div>

    <div class="container  col-md-6  rounded" style=" width: 100%; max-width: 700px; padding: 15px; margin: 0 auto; background-color: #e9ecef">
        <br>
        <div class="row">
            <div class="col-md-8" style="text-align:left">
            <h1 class="h3 mb-3 font-weight-normal">Usuarios ya registrados</h1>
            <?php 
            $query4 = "SELECT * FROM merito WHERE titulo = '$titulo';";
            $result4 = mysqli_query($link, $query4);

            while ($datos = mysqli_fetch_array($result4)){
                ?>
                <label ><?php echo $datos['usuario'] ?></label><br>
                <?php
            }
            ?>
        </div>
        <div class="col-md-4">
            <a class="btn btn-primary" href="Descarga.php" role="button" style="margin-top:100%">Descargar Curriculums</a>
        </div>
    </div>
    </div>
</div>
<a href="Merito.php?var=<?php echo $titulo?>">Volver a Orden de Merito</a>

 <?php 
 include "Footer.php"
 ?>

 <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
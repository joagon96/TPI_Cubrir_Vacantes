<?php
include "conexion.php"; 

$postulado = false;

session_start();

$id = ($_GET['var']);

$query = "SELECT * FROM vacantes WHERE id = '$id';";
$result = mysqli_query($link,$query);
$infoVacante = mysqli_fetch_array($result);

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

 
$usuario = $_SESSION['usuario'];
//Obtengo el ID del usuario en base a su nombre
$queryIdUsu = "SELECT * FROM usuarios WHERE usuario ='$usuario';";
//$resultIdUsu = mysqli_query($link, $queryIdUsu);
//$idUsu = mysqli_fetch_object($resultIdUsu)->id;//Devuelvo un objeto y accedo a su propiedad id
$resultUsu = mysqli_query($link, $queryIdUsu);
$usuActual = mysqli_fetch_array($resultUsu);
$idUsu = $usuActual['id'];
$nombre = $usuActual['nombre'];
$apellido = $usuActual['apellido'];
$email = $usuActual['email'];
$telefono = $usuActual['telefono'];

$query2 = "SELECT * FROM postulaciones WHERE id_usuario ='$idUsu' AND id_vacante = '$id';";
$result2 = mysqli_query($link, $query2);  

$filas = mysqli_num_rows($result2);

if ($filas > 0){
    $postulado = true;
    ?>
    <div class="alert alert-success" role="alert">Ya te postulaste a esta vacante</div>
    <?php
}

$formatos = array('.doc','.pdf','.docx');
if (isset($_POST['postular'])){
     $nombre = $_POST['nombre'];
     $apellido = $_POST['apellido'];
     $telefono = $_POST['telefono'];
     $email = $_POST['email'];
     $nombreArchivo = $_FILES['cv']['name'];
     $nombreArchivoTemp = $_FILES['cv']['tmp_name'];
     $ext = substr($nombreArchivo, strrpos($nombreArchivo, '.'));
     if (in_array($ext, $formatos)){
            if(move_uploaded_file($nombreArchivoTemp, "CVS/$nombreArchivo")){

                $query = "INSERT INTO postulaciones (id_usuario, id_vacante, nombre, apellido, telefono, email) VALUES ('$idUsu','$id','$nombre', '$apellido','$telefono','$email');";
                $result = mysqli_query($link, $query); 

                if ($result){
                    header("Location:Detalles.php?var=$id");
                }else{
                    ?>
                    <div class="alert alert-danger" role="alert">Error en la Base de Datos, intentelo de nuevo mas tarde</div>
                    <?php
                }
            }
        }
    }
include "obligatorios.html";
?>

<div class="container">
    <form method="POST" class="form-signin rounded" style="background-color: #e9ecef" enctype="multipart/form-data">
        <h1 class="h3 mb-3 font-weight-normal">Postulacion para <?php echo $infoVacante['titulo'] ?></h1>
        <br>
        <div class="row">
            <div class="col-md-2 text-right">
                <label for="nombre">Nombre:</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="nombre" value="<?php echo $nombre?>" class="form-control" required autofocus>
            </div>
            <div class="col-md 2">
                <p style="color:red">*</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2 text-right">
                <label for="apellido">Apellido:</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="apellido" value="<?php echo $apellido?>" class="form-control" required>
            </div>
            <div class="col-md 2">
                <p style="color:red">*</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2 text-right">
                <label for="apellido">Telefono:</label>
            </div>
            <div class="col-md-8">
                <input type="number" name="telefono" value="<?php echo $telefono?>" class="form-control" required>
            </div>
            <div class="col-md 2">
                <p style="color:red">*</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2 text-right">
                <label for="apellido">Email:</label>
            </div>
            <div class="col-md-8">
                <input type="text" name="email" value="<?php echo $email?>" class="form-control" required>
            </div>
            <div class="col-md 2">
                <p style="color:red">*</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2 text-right">
                <label for="cv">Curriculum:</label>
            </div>
            <div class="col-md-8">
                <input type="file" name="cv" required>
            </div>      
            <div class="col-md 2">
                <p style="color:red">*</p>
            </div>      
        </div>     
        <br>
        <?php 
        if (!$postulado){
        ?>
            <button class="btn btn-lg btn-primary" type="submit" name="postular">Postular</button>
        <?php
        }
        ?>
    </form>
</div>
<a href="Detalles.php?var=<?php echo $id?>">Volver</a>

 <?php 
 include "Footer.php"
 ?>

 <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
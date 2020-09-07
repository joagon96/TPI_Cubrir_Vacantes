<?php
session_start();
if (isset($_SESSION['usuario'])){
  $usu = $_SESSION['usuario'];
}
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="Home.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="CubrirVacantes.php">Bolsa de trabajo</a>
            </li>
          </ul>
          <?php
          if(!isset($usu)){
          ?>
            <ul class="navbar-nav " >
              <li  class="nav-item">
                  <a class="nav-link" href="IniciarSesion.php">Iniciar Sesion</a>
              </li>
              <li  class="nav-item">
                  <a class="nav-link" href="Registrar.php">Registrar</a>
              </li>
            </ul>
          <?php
          }
          else {
          ?>
              <ul class="navbar-nav">
                <li  class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropDown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $usu ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="EditarPerfil.php">Editar Perfil</a>
                      <a class="dropdown-item" href="CerrarSesion.php">Cerrar Sesion</a>
                    </div>
                </li>
              </ul>
          <?php
          } ?>
        </div>
</nav>

<div class="jumbotron">
  <div class="container">
    <br>
    <img class="img-fluid" src="img/imagenutn.png" alt="">
  </div>
</div>

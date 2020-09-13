<footer class="container">
        <br>
        <p class="text-center">&copy; UTN FRRo 2020 - Contacto:<a href="Contacto.php"> jcpistol16@gmail.com </a> - TEL:341789465 </p>
        <div class="text-left" style="background-color: whitesmoke; width: 100%; padding: 10px 0 20px 0;">
                <ul style="list-style-type: none;">
                        <li><a href="Home.php">Inicio</a></li>
                        <li><a href="VacantesPaginacion.php">Bolsa de trabajo</a></li>
                        <li><a href="Contacto.php">Contacto</a></li>
                        <?php
                        if (isset($_SESSION['usuario'])) {
                                $tipo = $_SESSION['tipo'];

                                if ($tipo != "") {
                                        ?>
                                        <li><a href="Merito.php"></a></li>
                                        <?php
                                }
                        }
                        ?>
                </ul>
        </div>
</footer>
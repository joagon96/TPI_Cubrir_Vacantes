<?php
// $link = mysqli_connect("localhost", "root") or die ("Problemas de conexión a la base de datos");
// mysqli_select_db($link, "tpi_vacantes");

$link = mysqli_connect("localhost", "root", '') or die ("Problemas de conexión a la base de datos");
mysqli_select_db($link, "tpi_vacantes");

?>
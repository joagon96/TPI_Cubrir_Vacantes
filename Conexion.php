<?php
$link = mysqli_connect("localhost", "root") or die ("Problemas de conexión a la base de datos");
mysqli_select_db($link, "tpi_vacantes");
$url = 'http://localhost/';

//$link = mysqli_connect("remotemysql.com:3306", "QnHYncINOT", 'TJ2F3MKMuq') or die ("Problemas de conexión a la base de datos");
//mysqli_select_db($link, "QnHYncINOT");
//$url = 'http://eg2020-g8-tpi.freecluster.eu';
?>

<?php

include_once 'clases/db_connect.php';
$query01 = mysql_query("SELECT id_p FROM producto");
$total_productos = mysql_num_rows($query01);
echo "Total Productos: \n $total_productos <br>";

$query02 = mysql_query("SELECT id_p FROM producto where activo_p='S'");
$productos_activos = mysql_num_rows($query02);
echo "Activos: \n $productos_activos <br>";

$query03 = mysql_query("SELECT id_p FROM producto where activo_p='N'");
$productos_no_activos = mysql_num_rows($query03);
echo "No Activos: \n $productos_no_activos";
?>
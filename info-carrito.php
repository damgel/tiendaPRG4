<?php

include_once 'clases/db_connect.php';
session_start();


if (!empty($_SESSION['username'])) {
    $nombre = $_SESSION['username'];

    $id_usuario = $_SESSION['userid'];
//$query = "SELECT round(sum(cantidad),0) as cantidad, round(sum(subtotal),2) FROM carrito limit 0,1";
    $query = "SELECT round(sum(cantidad),0) as cantidad FROM carrito where id_u=$id_usuario";
    $result = mysql_query($query) or die(mysql_error());

    while ($row = mysql_fetch_array($result)) {
        $numero = $row['cantidad'];
        if ($numero == 0) {
            echo "0";
        } else {
            echo "<b> " . $numero . " productos</b>";
        }
    }
} else {
    echo "<b> " . 0 . " productos</b>";
}
?>

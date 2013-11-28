<?php

/**
 * clase para abrir una conexion a mysql server
 *
 * @author daMgeL
 */
$servidor = "localhost";
$usuario = "root";
$password = "";
$databaseName = "tienda";

//echo "<p>hola mundo desde la clase de conexion..</p>";
if (!($conexion = mysql_connect($servidor, $usuario, $password) or die('Oh!, parece que el servidor de la db esta apagado ^_^'))) {
    echo "algo fallo en la conexion";
    //exit();
}
else
    mysql_select_db($databaseName) or die('Imposible acceder a base de datos!');
?>


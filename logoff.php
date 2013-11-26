<?php

/**
 * Clase que permite eliminar las sesiones activas para salir del sistema.
 *
 * @author daMgeL
 */
session_start();
session_destroy();
session_unset();
echo '<h1>Cerrando Sesion</h1>';
header("Location: index.php"); /* redireccionar navegador */
?>

<?php

if (!empty($_SESSION['username'])) {
    $nombre = $_SESSION['username'];
} else {
    //header("Location: logon.php"); /* Redirect browser */
    header("Location: info.php"); /* Redirect browser */
}
?>
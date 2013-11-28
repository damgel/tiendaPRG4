<?php
if (!empty($_SESSION['username'])) {
    $nombre = $_SESSION['username'];
    echo "submit";
} else {
    echo 'hidden';
}
?>
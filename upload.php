<?php

$output_dir = "Images/productos/";


if (isset($_FILES["myfile"])) {
    //Filter the file types , if you want.
    if ($_FILES["myfile"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    } else {
        //move the uploaded file to uploads folder;
        $id_unico = uniqid();
        move_uploaded_file($_FILES["myfile"]["tmp_name"], $output_dir . $id_unico . $_FILES["myfile"]["name"]);

        echo "Uploaded File :" . $id_unico . $_FILES["myfile"]["name"];
        $name_ok = $id_unico . $_FILES["myfile"]["name"];
        echo '<br>' . 'El nombre correcto es:' . $name_ok;
    }
}
?>
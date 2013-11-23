<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Agregar Producto</title>
        <link href="../assets/css/main.css" rel="stylesheet" type="text/css" />
        <script src="../assets/js/jquery-v1.10.2.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script>
        <style>
            form { display: block; margin: 20px auto;  border-radius: 10px; padding: 15px }
            fieldset
            {
                *border-collapse: collapse; /* IE7 and lower */
                border-spacing: 0; 
                border: solid #ccc 1px;
                -moz-border-radius: 6px;
                -webkit-border-radius: 6px;
                border-radius: 6px;
                -webkit-box-shadow: 0 1px 1px #ccc;
                -moz-box-shadow: 0 1px 1px #ccc;
                box-shadow: 0 1px 1px #ccc;

            }
        </style>
    </head>
    <body>
        <?php include_once '../Includes/header.php'; ?>
        <div class="contenedor">
            <?php
            include_once '../clases/db_connect.php';
            if (isset($_POST['submitted'])) {
                /* ------------------------------------BEGIN FILE UPLOADER-------------------------------------------- */
                $output_dir = "../Images/productos/";
                $name_ok;
                if (isset($_FILES["myfile"])) {
                    //Filter the file types , if you want.
                    if ($_FILES["myfile"]["error"] > 0) {
                        echo "Error: " . $_FILES["file"]["error"] . "<br>";
                    } else {
                        //move the uploaded file to uploads folder;
                        $id_unico = uniqid();
                        move_uploaded_file($_FILES["myfile"]["tmp_name"], $output_dir . $id_unico . $_FILES["myfile"]["name"]);
                        $name_ok = $output_dir . $id_unico . $_FILES["myfile"]["name"];
                    }
                }
                /* ------------------------------------END FILE UPLOADER-------------------------------------------- */
                foreach ($_POST AS $key => $value) {
                    $_POST[$key] = $value;
                }
                $sql = "INSERT INTO `producto` (`nombre_p` ,  `descripcion_p` ,  `categoria_p` ,   `marca_p`  ,   `tamanio_p`, `color_p` , `precio_p` ,  `costo_p` ,  `activo_p` ,  `imagen_p`,  `fecha_p`   ) VALUES( '{$_POST['nombre_p']}' ,  '{$_POST['descripcion_p']}' ,  '{$_POST['categoria_p']}' , '{$_POST['marca_p']}' , '{$_POST['tamanio_p']}' , '{$_POST['color_p']}',  '{$_POST['precio_p']}' , '{$_POST['costo_p']}' ,  '{$_POST['activo_p']}' , '$name_ok' ,  now())";
                mysql_query($sql) or die(mysql_error());
                echo "<script>alert('$name_ok')</script>";
                echo "Registro Agregado.<br />";
                echo "<a href='administrarProductos.php'>Regresar</a>";
            }
            ?>

            <form action='#' id="myform" method='POST' enctype="multipart/form-data"> 
                <fieldset>
                    <div><input type="file" name="myfile"></div><br>
                    <div><b>Nombre del Producto:</b><br /><input type='text' name='nombre_p' required/></div> 
                    <div><b>Descripcion del Producto:</b><br /><input type='text' name='descripcion_p' required/></div> 
                    <div><b>Categoria:</b><br><select name="categoria_p"><option>-seleccione-</option><?php include_once '../clases/listas/categorias.php'; ?></select></div>
                    <div><b>Marca:</b><br /><input type='text' name='marca_p' required/></div> 
                    <div><b>Talla:</b><br><select name="tamanio_p"><option>-seleccione-</option><?php include_once '../clases/listas/tallas.php'; ?></select></div>
                    <div><b>Color:</b><br><select name="color_p"><option>-seleccione-</option><?php include_once '../clases/listas/colores.php'; ?></select></div>
                    <div><b>Precio de Venta:</b><br /><input type='text' name='precio_p' required/></div> 
                    <div><b>Precio de Costo:</b><br /><input type='text' name='costo_p' required/></div> 
                    <div><select name="activo_p">
                            <option value="S">Activo</option>
                            <option value="N">No activo</option>
                        </select></div>

                    <div><input type='submit' value='Agregar' /><input type='hidden' value='1' name='submitted' /></div>
                </fieldset>
            </form> 

            <script>
                $(document).ready(function()
                {

                    var options = {
                        beforeSend: function()
                        {
                            $("#progress").show();
                            //clear everything
                            $("#bar").width('0%');
                            $("#message").html("");
                            $("#percent").html("0%");
                        },
                        uploadProgress: function(event, position, total, percentComplete)
                        {
                            $("#bar").width(percentComplete + '%');
                            $("#percent").html(percentComplete + '%');


                        },
                        success: function()
                        {
                            $("#bar").width('100%');
                            $("#percent").html('100%');

                        },
                        complete: function(response)
                        {
                            $("#message").html("<font color='green'>" + response.responseText + "</font>");
                        },
                        error: function()
                        {
                            $("#message").html("<font color='red'> ERROR: unable to upload files</font>");

                        }

                    };
                    $("#myForm").ajaxForm(options);

                });

            </script>
        </div>
    </body>
</html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Agregar Producto al Carrito</title>
    </head>
    <body>
        <?php
        ?>
        <?php
        session_start();

        include_once 'clases/db_connect.php';
        //CODIGO QUE COMPRUEBA SI HAY USUARIO LOGUEADO,
//SI NO HAY USUARIO REGISTRDO LO ENVIA A LOGIN O REGISTRO
        if (!empty($_SESSION['username'])) {
            $nombre = $_SESSION['username'];
            if (isset($_POST['id_txt'])) {
                $evalSubmit = $_POST['id_txt'];
                foreach ($_POST AS $key => $value) {
                    $_POST[$key] = mysql_real_escape_string($value);
                }
                $usuario = $_SESSION['userid'];
                $sub_total = $_POST['precio'] * $_POST['cantidad'];
                $sql = "INSERT INTO `carrito` (`id_p` ,  `id_u` ,  `nombre` ,  `precio` ,  `cantidad` ,  `subtotal`  ) VALUES('{$_POST['id_txt']}' ,  $usuario , '{$_POST['nombre']}' ,  '{$_POST['precio']}' ,  '{$_POST['cantidad']}' ,  $sub_total  ) ";
                mysql_query($sql) or die(mysql_error());
                echo "Producto Agregado al CARRITO .<br />";
                $evalSubmit = 0;
                header("Location: index.php"); /* Si el usuario existe, direccionar a la pagina princial( catalogo) */
            }
        } else {
            //header("Location: logon.php"); /* Redirect browser */
            header("Location: info.php"); /* Redirect browser */
            
        }
        ?>
    </body>
</html>

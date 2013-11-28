<?
include('clases/db_connect.php');
if (isset($_POST['Enviar'])) {
foreach ($_POST AS $key => $value) {
$_POST[$key] = mysql_real_escape_string($value);
}
$cyp_password = sha1($_POST['contrasenia']);
$sql = "INSERT INTO `cliente` (`nombre` ,  `apellido` ,  `usuario` ,  `contrasenia` ,  `fecha_nac` ,  `correo` ,  `tel`  ) VALUES(  '{$_POST['nombre']}' ,  '{$_POST['apellido']}' ,  '{$_POST['usuario']}' ,  '$cyp_password' ,  '{$_POST['fecha_nac']}' ,  '{$_POST['correo']}' ,  '{$_POST['tel']}'  ) ";
mysql_query($sql) or die(mysql_error());

$email = $_POST['correo'];
if (($email) != "") {
$query = mysql_query("SELECT idcliente, nombre FROM cliente WHERE correo = '$email' LIMIT 1");
while ($row = mysql_fetch_array($query)) {
session_start();
$_SESSION['userid'] = $row{'idcliente'};
$_SESSION['username'] = $row{'nombre'};
header("Location: index.php"); /* Si el usuario existe, direccionar a la pagina princial( catalogo) */
}
} else {
echo "<p>error al registrarse</p>";
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>profile</title>

        <link rel="stylesheet" href="assets/css/bootstrap.css">

        <script src="assets/js/jquery-v1.10.2.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/holder.js"></script>
        <script src="assets/js/validarRegCliente.js"></script>

    </head>
    <style>
        fieldset
        {
            background-color: white;
            border:solid 1px #CCC;
            margin: 25px;
            padding: 25px;
        }
    </style>
    <body>
        <?php include_once 'Includes/header.php'; ?>
        <div  class="col-md-8 col-md-offset-2">


            <form action='' method='POST'> 
                <p><b>Idcliente:</b><br /><input type='text' name='idcliente' value='<?= stripslashes($row['idcliente']) ?>' /> 
                <p><b>Nombre:</b><br /><input type='text' name='nombre' value='<?= stripslashes($row['nombre']) ?>' /> 
                <p><b>Apellido:</b><br /><input type='text' name='apellido' value='<?= stripslashes($row['apellido']) ?>' /> 
                <p><b>Usuario:</b><br /><input type='text' name='usuario' value='<?= stripslashes($row['usuario']) ?>' /> 
                <p><b>Contrasenia:</b><br /><input type='text' name='contrasenia' value='<?= stripslashes($row['contrasenia']) ?>' /> 
                <p><b>Fecha Nac:</b><br /><input type='text' name='fecha_nac' value='<?= stripslashes($row['fecha_nac']) ?>' /> 
                <p><b>Correo:</b><br /><input type='text' name='correo' value='<?= stripslashes($row['correo']) ?>' /> 
                <p><b>Tel:</b><br /><input type='text' name='tel' value='<?= stripslashes($row['tel']) ?>' /> 
                <p><b>Compra Pendiente:</b><br /><input type='text' name='compra_pendiente' value='<?= stripslashes($row['compra_pendiente']) ?>' /> 
                <p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
            </form> 
            <? } ?> 


        </div>
    </body>
</html>
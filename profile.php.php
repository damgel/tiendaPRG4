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
        <title>Registro Clientes</title>

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
    
       <? 
include('config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `cliente` ( `idcliente` ,  `nombre` ,  `apellido` ,  `usuario` ,  `contrasenia` ,  `fecha_nac` ,  `correo` ,  `tel` ,  `compra_pendiente`  ) VALUES(  '{$_POST['idcliente']}' ,  '{$_POST['nombre']}' ,  '{$_POST['apellido']}' ,  '{$_POST['usuario']}' ,  '{$_POST['contrasenia']}' ,  '{$_POST['fecha_nac']}' ,  '{$_POST['correo']}' ,  '{$_POST['tel']}' ,  '{$_POST['compra_pendiente']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Idcliente:</b><br /><input type='text' name='idcliente'/> 
<p><b>Nombre:</b><br /><input type='text' name='nombre'/> 
<p><b>Apellido:</b><br /><input type='text' name='apellido'/> 
<p><b>Usuario:</b><br /><input type='text' name='usuario'/> 
<p><b>Contrasenia:</b><br /><input type='text' name='contrasenia'/> 
<p><b>Fecha Nac:</b><br /><input type='text' name='fecha_nac'/> 
<p><b>Correo:</b><br /><input type='text' name='correo'/> 
<p><b>Tel:</b><br /><input type='text' name='tel'/> 
<p><b>Compra Pendiente:</b><br /><input type='text' name='compra_pendiente'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 


        </div>
    </body>
</html>
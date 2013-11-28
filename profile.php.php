<? 
include('config.php'); 
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id']; 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "UPDATE `cliente` SET  `idcliente` =  '{$_POST['idcliente']}' ,  `nombre` =  '{$_POST['nombre']}' ,  `apellido` =  '{$_POST['apellido']}' ,  `usuario` =  '{$_POST['usuario']}' ,  `contrasenia` =  '{$_POST['contrasenia']}' ,  `fecha_nac` =  '{$_POST['fecha_nac']}' ,  `correo` =  '{$_POST['correo']}' ,  `tel` =  '{$_POST['tel']}' ,  `compra_pendiente` =  '{$_POST['compra_pendiente']}'   WHERE `id` = '$id' "; 
mysql_query($sql) or die(mysql_error()); 
echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `cliente` WHERE `id` = '$id' ")); 
?>

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

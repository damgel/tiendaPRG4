
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Registro Clientes</title>
        
        <link rel="stylesheet" href="assets/css/bootstrap.css">

        <script src="assets/js/jquery-v1.10.2.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/holder.js"></script>

    </head>
    <style>
    </style>
    <body>


<? 
include(''); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `cliente` (`nombre` ,  `apellido` ,  `usuario` ,  `contrasenia` ,  `fecha_nac` ,  `correo` ,  `tel`  ) VALUES(  '{$_POST['nombre']}' ,  '{$_POST['apellido']}' ,  '{$_POST['usuario']}' ,  '{$_POST['contrasenia']}' ,  '{$_POST['fecha_nac']}' ,  '{$_POST['correo']}' ,  '{$_POST['tel']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
?>
<div>
<form action='' method='POST'> 
<p><b>Nombre:</b><br /><input type='text' name='nombre'/></p> 
<p><b>Apellido:</b><br /><input type='text' name='apellido'/></p> 
<p><b>Usuario:</b><br /><input type='text' name='usuario'/> </p>
<p><b>Contrasenia:</b><br /><input type='text' name='contrasenia'/> </p>
<p><b>Fecha Nacimiento:</b><br /><input type='text' name='fecha_nac'/> </p>
<p><b>Correo:</b><br /><input type='text' name='correo'/> </p>
<p><b>Telefono:</b><br /><input type='text' name='tel'/> </p>
<p><input type='submit' value='Enviar' /><input type='hidden' value='1' name='submitted' /> </p>
</form> 

</div>
    </body>
</html>
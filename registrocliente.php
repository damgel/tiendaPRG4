
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
include('../clases/db_connect.php'); 
if (isset($_POST['Enviar'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `cliente` (`nombre` ,  `apellido` ,  `usuario` ,  `contrasenia` ,  `fecha_nac` ,  `correo` ,  `tel`  ) VALUES(  '{$_POST['nombre']}' ,  '{$_POST['apellido']}' ,  '{$_POST['usuario']}' ,  '{$_POST['contrasenia']}' ,  '{$_POST['fecha_nac']}' ,  '{$_POST['correo']}' ,  '{$_POST['tel']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
} 
?>
<div  class="col-md-8 col-md-offset-2">

<form action='' method='POST' class="form-horizontal" role="form"> 
<br>
<div class="form-group">
<label class="col-sm-2 control-label">Nombre</label>
<div class="col-sm-6">
<input type='text' name='nombre' class="form-control"/>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Apellido</label>
<div class="col-sm-6">
<input type='text' name='apellido' class="form-control"/> 
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Usuario</label>
<div class="col-sm-6">
<input type='text' name='usuario' class="form-control"/> 
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Contrasenia</label>
<div class="col-sm-6">
<input type='text' name='contrasenia' class="form-control"/>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Fecha Nacimiento</label>
<div class="col-sm-6">
<input type='text' name='fecha_nac' class="form-control"/>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Correo</label>
<div class="col-sm-6">
<input type='text' name='correo' class="form-control"/>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Telefono</label>
<div class="col-sm-6">
<input type='text' name='tel' class="form-control"/>
</div>
</div>


<p align="center"><input type='submit' value='Enviar' class="btn btn-primary btn-lg" />
<input type='hidden' value='1' name='Enviar' /> </p>
</form> 

</div>
    </body>
</html>
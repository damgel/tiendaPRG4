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
        <?php include_once 'Includes/header.php'; ?>
        <div  class="col-md-8 col-md-offset-2">

            <form action='' method='POST' class="form-horizontal" role="form"> 
                <fieldset>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-6">
                        <input type='text' name='nombre' class="form-control" required/>
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
                        <input type='text' name='usuario' class="form-control" required/> 
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Contrasenia</label>
                    <div class="col-sm-6">
                        <input type='text' name='contrasenia' class="form-control" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Fecha Nacimiento</label>
                    <div class="col-sm-6">
                        <input type='date' name='fecha_nac' class="form-control" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Correo</label>
                    <div class="col-sm-6">
                        <input type='text' name='correo' class="form-control" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Telefono</label>
                    <div class="col-sm-6">
                        <input type='text' name='tel' class="form-control" required/>
                    </div>
                </div>


                <p align="center"><input type='submit' value='Registrarse' class="btn btn-primary btn-lg" />
                    <input type='hidden' value='1' name='Enviar' /> </p>
                </fieldset>
            </form> 

        </div>
    </body>
</html>
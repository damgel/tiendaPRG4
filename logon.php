<?php
include_once "clases/db_connect.php";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    echo 'VALORES QUE SE INTRODUCEN EN LOS CAMPOS:<br>';
    echo $username . ' <br>';
    echo $password . '<br>';
    $query = mysql_query("SELECT idcliente, nombre FROM cliente WHERE usuario = '$username' AND contrasenia = '$password' LIMIT 1");

    if ($query >= 1) {
        while ($row = mysql_fetch_array($query)) {
            session_start();
            $_SESSION['userid'] = $row{'idcliente'};
            $_SESSION['username'] = $row{'nombre'};
            header("Location: index.php"); /* Si el usuario existe, direccionar a la pagina princial( catalogo) */
        }
    } else {
        echo "Usuario/Contrasenia incorrectos.";
    }
}
?>
<style>
    body
    {
        background: whitesmoke;
    }
    fieldset
    {
        background: white;
    }
    #main
    {

        width: 40%;
        margin: auto;
    }
</style>
<div id="main">
    <h2>Acceso a clientes</h2>
    <form action="logon.php" method="post">
        <fieldset>
            <legend>Log on</legend>
            <ol>
                <li>
                    <label for="username">Username:</label> 
                    <input type="text" name="username" value="" id="username" />
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password" name="password" value="" id="password" />
                </li>
            </ol>
            <input type="submit" name="submit" value="Submit" />
            <p>
                <a href="index.php">Cancel</a>
            </p>
        </fieldset>
    </form>
</div>
</div> <!-- End of outer-wrapper which opens in header.php -->
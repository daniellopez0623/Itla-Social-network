<?php
require_once "user.php";
require_once "userService.php";

require_once "Servicios/IFileHandler.php";
require_once "Servicios/JsonFileHandler.php";
require_once "database/usuariosContext.php";

$result = null;
$message = "";

session_start();	

$service = new userService("database");

if(isset($_POST['_user']) && isset($_POST['_pass'])){

	$result = $service->login($_POST['_user'],$_POST['_pass']);

		
	if($result != null){
		
		$_SESSION['_user'] = json_encode($result);
		
		header("Location: ../index.php");
		exit();

	}else{
		
		$message = "Usuario o contraseña incorrecta, intente nuevamente.";
	}
 
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen">    
    <link rel="stylesheet" type="text/css" href="assets/css/login.css" media="screen">    
    <link rel="stylesheet" type="text/css" href="assets/css/framework/bootstrap.min.css" media="screen">
    <title>Login</title>
</head>
<body>
    
<div class="top2">

<div class="container">
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Iniciar Sesión</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrate</label>
            <div class="login-form">
                <div class="sign-in-htm ">
                    <br></br>
                    <form action="" method="post">
                        <div class="group">
                            <label for="usuario" class="label">Usuario</label>
                            <input id="usuario" type="text" class=" input" placeholder="Ingresar Usuario" name="usuario" pattern="[A-Za-z_-0-9]{1,20}" required>
                        </div>
                        <div class="group">
                            <label for="contrasena" class="label">Contraseña</label>
                            <input id="contrasena" type="password" data-type="password" class="input" placeholder="Ingresar Contraseña" name="contrasena" pattern="[A-Za-z_-0-9]{1,20}" required>
                        </div>
                        <br>
                        <div class="group text-center">
                            <input id="check" type="checkbox" class="check" checked>
                            <label for="check"><span class="icon"></span> Mantenerme en sesion!!</label>
                        </div>
                        <br>
                        <div class="group">
                            <input type="submit" name="login" class="button" value="Iniciar Sesión">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a href="#forgot">¿Se te olvidó tu contraseña?</a>
                        </div>
                    </form>
                </div>
                <div class="sign-up-htm">
                    <form action="" method="post">
                        <div class="group">
                            <label for="name" class="label">Nombre</label>
                            <input id="name" type="text" class="input" placeholder="Ingresar Nombre" required>
                        </div>
                        <div class="group">
                            <label for="LastN" class="label">Apellido</label>
                            <input id="LastN" type="text" class="input" placeholder="Ingresar Apellido">
                        </div>
                        <div class="group">
                            <label for="phone" class="label">Telefono</label>
                            <input id="phone" type="text" class="input" placeholder="Ingresar Telefono" required>
                        </div>
                        <div class="group">
                            <label for="user" class="label">Usuario</label>
                            <input id="user" type="text" class="input" placeholder="Ingresar Usuario" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Contraseña</label>
                            <input id="pass" type="password" class="input" data-type="password" placeholder="Ingresar Contraseña" required>
                        </div>
                        <div class="group">
                            <label for="passR" class="label">Repite la contraseña</label>
                            <input id="passR" type="password" class="input" data-type="password" placeholder="Repite la contraseña" required>
                        </div>
                        <div class="group">
                            <label for="Email" class="label">Dirección de correo electrónico</label>
                            <input id="Email" type="text" class="input" placeholder="Ingresar correo electrónico" required>
                        </div>
                        <br>
                        <div class="group">
                            <input type="submit" class="button" value="Sign Up" >
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk centerrr">
                            <h3><label for="tab-1"><span class="badge badge-warning">Already Member?</span></a>
                            </h3>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"
    type="text/javascript">
    </script>
<script src="assets/js/libreria/bootstrap.min.js"></script>
<script src="assets/js/index.js"></script>

</html>
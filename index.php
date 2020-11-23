<?php
require_once 'Servicios/JsonFileHandlercsv.php';
require_once 'database/usuariosContext.php';
require_once 'Servicios/usuarioServiceDatabase.php';
require_once 'Servicios/Iserviciobase.php';
require_once 'Servicios/JsonFileHandler.php';
require_once 'Servicios/IFileHandler.php';
require_once 'Servicios/servidorfile.php';
require_once 'Servicios/servicio.php';
require_once 'Servicios/serializationFileHandler.php';
require_once 'class.php';
include 'log.php';

session_start();
 
$service = new usuarioServiceDatabase("database");

$servicio=new Servicio();

$listaestudi = $service->Getlista();

$isLogged = false;

if(isset($_SESSION['_user']) && isset($_SESSION['_user']) != null){

    $isLogged = true;
}

?>
<?php echo printHeader(true); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

</body>
</html>
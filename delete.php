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



$service = new usuarioServiceDatabase11("database");

  $id=isset($_GET['id']);

  if($id){

    $log="Usuario Eliminada del ID ($id)";
    logger($log);

    $iduser=$_GET['id'];
    $service->eliminar($iduser);
  }

  header("location: index.php");
  exit();

?>
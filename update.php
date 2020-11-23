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


$service = new usuarioServiceDatabase11('database');

   $servicio=new Servicio();
  

    if(isset($_GET['id'])){

                
        $iduser = $_GET['id'];

        $elemento = $service->GetByid($iduser  );
        
        
        if (isset($_POST['nombre']) && isset($_POST['apellido'])  && isset($_POST['_user']) && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['_pass'])) {

            
            $log="Usuario editada del ID($iduser) ";
            logger($log);

            $actualizar = new usuario();
            $actualizar->iniciodatos($iduser   , $_POST['nombre'], $_POST['apellido'], $_POST['_user'], $_POST['telefono'], $_POST['correo'], $_POST['_pass']);
                
            $service->editar($iduser   ,$actualizar);

            header("location: index.php");
            exit();
        }

    }else{

        header("location: index.php");
        exit();
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

<div class="card-header">
    Editar Transaccion
</div>
    <!-- <div class="card-body"> -->
        <div class="container">
            <div class="row">
            <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                    <div class="card-header bg-primary text-light">Editar Transaccion</div>
                            <form enctype="multipart/form-data" action="update.php?id=<?php echo $elemento->id; ?>" method="post">
                                
                                <div class="form-group">
                                    <label for="nombre" >Nombre</label>
                                    <input type="text" value=<?php echo $elemento->nombre; ?> class="form-control" id="nombre"
                                        name="nombre" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" value=<?php echo $elemento->apellido; ?> class="form-control" id="apellido"
                                        name="apellido" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="_user">_user</label>
                                    <input type="text" value=<?php echo $elemento->_user; ?> class="form-control" id="_user"
                                        name="_user" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" value=<?php echo $elemento->telefono; ?> class="form-control" id="telefono"
                                        name="telefono" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="correo">Correo</label>
                                    <input type="text" value=<?php echo $elemento->correo; ?> class="form-control" id="correo"
                                        name="correo" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="passwordd">Password</label>
                                    <input type="text" value=<?php echo $elemento->passwordd; ?> class="form-control" id="passwordd"
                                        name="passwordd" placeholder="Password">
                                </div>
                                <br>
                                <button type="submit " class="btn btn-success bb float-right" tabindex="5">Editar</button>                                                  
                            </form>
                    </div>            
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<style type="text/css">
.container{
    margin-top: 60px;
}
</style>
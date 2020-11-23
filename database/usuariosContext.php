<?php

class usuariosContext{


    public $db;
    private $fileHandler;
    
    function __construct($directory){


        $this->fileHandler = new JsonFileHandler($directory,"configuration");
        $configuration = $this->fileHandler->ReadConfiguration();
        $this->db = new mysqli($configuration->server,$configuration->_user,$configuration->_pass,$configuration->database);

        if($this->db->connect_error){

            exit("Error al intentar conectarse a la base de datos");
            
        }
    }

}
 
?>
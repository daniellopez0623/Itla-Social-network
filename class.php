<?php

class usuarios{

    public $id;
    public $_user;
    public $_pass;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;

    public function __construct(){
        
        $this->servicio= new Servicio();
    }

    public function iniciodatos($id,$_user,$_pass,$nombre,$apellido,$telefono,$correo,){
        
        $this->id=$id;
        $this->_user=$_user;
        $this->_pass=$_pass;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->telefono=$telefono;
        $this->correo=$correo;

        
    }

    public function set($data){
        foreach ($data as $key => $value)$this->{$key} = $value;
    }

}

?>
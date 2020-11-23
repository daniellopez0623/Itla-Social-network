<?php

class userService{

    private $context;

    public function __construct($directory){

        $this->context = new usuariosContext($directory);
    }

    public function login($_user,$_pass){

        $stmt = $this->context->db->prepare("select * from tbl_users where _user = ? and _pass = ?");

        $stmt->bind_param("ss",$_user,$_pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0){

            return null;

        }else{

            $array = array();


                $entity = $result->fetch_object();
                $user = new user();

                $user->id = $entity->id;
                $user->_user = $entity->_user;
                $user->_pass = $entity->_pass;
                $user->nombre = $entity->nombre;
                $user->apellido = $entity->apellido;
                $user->telefono = $entity->telefono;
                $user->correo = $entity->correo;

                return $user;
   
        }
    }

}

?>
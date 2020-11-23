<?php

class usuarioServiceDatabase implements Iserviciobase{

    private $context;

    public function __construct($directory){

        $this->servicio= new Servicio();
        $this->context = new usuariosContext($directory);
    }

    public function Getlista(){

        $listadoUsuario = array();

        $stmt = $this->context->db->prepare("select * from tbl_users");
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows === 0){

            return $listadoUsuario;

        }else{

            while($row = $result->fetch_object()){

                $usuario = new usuario();

                $usuario->id = $row->id;
                $usuario->_user = $row->_user;
                $usuario->_pass = $row->_pass;
                $usuario->nombre = $row->nombre;
                $usuario->apellido = $row->apellido;
                $usuario->telefono = $row->telefono;
                $usuario->correo = $row->correo;

                array_push($listadoUsuario,$usuario);

            }
        }

        return $listadoUsuario;
        $stmt->close();
    }

    public function GetByid($id){

        $usuario = new usuarios();

        $stmt = $this->context->db->prepare("select * from tbl_users where id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows === 0){

            return null;

        }else{

            while($row = $result->fetch_object()){

                $usuario = new usuario();

                $usuario->id = $row->id;
                $usuario->_user = $row->_user;
                $usuario->_pass = $row->_pass;
                $usuario->nombre = $row->nombre;
                $usuario->apellido = $row->apellido;
                $usuario->telefono = $row->telefono;
                $usuario->correo = $row->correo;
            }
        }
        $stmt->close();
        return $usuario;
    }

    public function añadir($obj)
    {
        
        $stmt = $this->context->db->prepare("insert into tbl_users (nombre,apellido,_user,telefono,correo,_pass) Values (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$obj->nombre,$obj->apellido,$obj->_user,$obj->telefono, $obj->correo, $obj->_pass);
        $stmt->execute();
        $stmt->close();

    }

    public function editar($id,$obj){

        $stmt = $this->context->db->prepare("update tbl_users set nombre = ?,apellido = ?,_user = ?,telefono = ?,correo = ?,_pass = ? where id = ?");
        $stmt->bind_param("ssssssi",$obj->nombre,$obj->apellido,$obj->_user,$obj->telefono,$obj->correo,$obj->_pass,$id);
        $stmt->execute();
        $stmt->close();

    }

    public function eliminar($id){

        $stmt = $this->context->db->prepare("delete from  tbl_users where id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();

    }

}

?>
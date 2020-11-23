<?php

class servidorfile implements Iserviciobase{
    
    public $directory;
    private $utilities;
    public $filename;
    public $filehandler;


    
    public function __construct(){
        
        $this->servicio = new Servicio();
        $this->directorio="data";
        $this->filename="trans";
        $this->filehandler = new serializationFileHandler($this->directorio,$this->filename);
    }

    public function Getlista(){

        $listuserdecode=$this->filehandler->ReadFile();
            
        $listuser = array();

        if($listuserdecode == false){
        
            $this->filehandler->SaveFile($listuser);   

        }else{
        
            foreach ($listuserdecode as $elementoD) {
            
                array_push($listuser,$elementoD);
            }
        }
        return $listuser;

    }

    public function GetByid($id){
        
        $listuser = $this->Getlista();
        $estudiante = $this->servicio->buscar($listuser,'id',$id)[0];
        return $estudiante;
    }

    public function añadir($entidad)
    {
        $listuser=$this->Getlista();
        $iduser=1;
        
        if(!empty($listuser)){

            $lastuser=$this->servicio->getLastElement($listuser);
            $iduser=$lastuser->id+1;
        }
            $entidad->id=$iduser;
     

        array_push($listuser,$entidad);

        $this->filehandler->SaveFile($listuser);
    }

    public function editar($id,$entidad){
        
        $elemento=$this->GetByid($id);
        $listuser = $this->Getlista();

        $elementoindex=$this->servicio->getelemento($listuser,'id',$id);

        $listuser[$elementoindex]=$entidad;
        $this->filehandler->SaveFile($listuser);
    }

    public function eliminar($id){

        $listuser=$this->Getlista();
        $elementoindex=$this->servicio->getelemento($listuser,'id',$id);

        unset($listuser[$elementoindex]);
        $listuser=array_values($listuser);
        $this->filehandler->SaveFile($listuser);
    }

}

?>
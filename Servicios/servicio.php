<?php

class Servicio{
    
  public function getLastElement($lista){

    $contarlista=count($lista);
    $ultimoele=$lista[$contarlista - 1];

    return $ultimoele;
  }

  public function buscar($lista,$propiedad,$valor){

    $filtrar=[];

    foreach ($lista as $articulo) {
      
      if($articulo->$propiedad==$valor){

        array_push($filtrar,$articulo);
      }
    }
    return $filtrar;
  }

  public function cookietime(){

    return time() + 60*60*24;
  }

  public function getelemento($lista,$propiedad,$valor){

    $inicio=0;

    foreach ($lista as $key => $articulo) {
      
      if($articulo->$propiedad==$valor){

        $inicio=$key;
      }
    }
    return $inicio;
  }
  
  private function uploadfile($name,$tmpfile){
  
    if(file_exists($name)){
    
      unlink($name);
    }
    move_uploaded_file($tmpfile,$name);
  }
}

?>
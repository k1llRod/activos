<?php
require_once "conexion.php";
class configurationModel{
    public function view_unit(){
        $query = conexion::conectar()->prepare("SELECT * FROM unidad_medida");
        $query->execute();
        return $query->fetchAll();
        #$query->close();
    }
    public function view_state(){
        $query = conexion::conectar()->prepare("SELECT * FROM estado");
        $query->execute();
        return $query->fetchAll();
        $query->close();
    }
}

?>
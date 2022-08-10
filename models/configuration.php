<?php
require_once "conexion.php";
class configurationModel{
    public static function view_unit(){
        $query = conexion::conectar()->prepare("SELECT * FROM unidad_medida");
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }
    public static function view_state(){
        $query = conexion::conectar()->prepare("SELECT * FROM estado");
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }
    public static function crear_correlativo($data){
        $query = conexion::conectar()->prepare("INSERT INTO correlativo(name)
                                                VALUES (:name)");
        $query->bindParam(':name',$data['name'], PDO::PARAM_STR);
        // $query->execute();
        $query->execute();
        return $query;
        $query -> close;
    }
    public static function view_correlativo(){
        $query = conexion::conectar()->prepare("SELECT * FROM correlativo WHERE estado='1'");
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }
    public static function count_correlativo($code){
        $query = conexion::conectar()->prepare("SELECT COUNT(id_asignar_activo) code_count
                                                FROM asig_activo
                                                WHERE codigo_registro LIKE '%".$code."%'");
        /* $query -> bindParam(':code',$code, PDO::PARAM_STR); */
        $query -> execute();
        return $query->fetchAll();
        $query->close;
    }

    public static function tree_view_correlativo(){
        $query = conexion::conectar()->prepare("SELECT * FROM correlativo");
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }
}

?>
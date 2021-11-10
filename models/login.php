<?php
require_once("conexion.php");
class loginModels{
    public function loginModel($dataModel, $tabla){
        $query = conexion::conectar()->prepare("SELECT id_user ,nombres, apellidos, cuenta, pass FROM $tabla WHERE cuenta=:user AND pass=:pass");
        $query -> bindParam(":user", $dataModel['user'], PDO::PARAM_STR);
        $query -> bindParam(":pass", $dataModel['pass'], PDO::PARAM_STR);
        $query -> execute();
        return $query->fetch();
        $query -> close();
    }
}
?>
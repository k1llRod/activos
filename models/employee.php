<?php

class employeeModel{
    public function create_employee($data){
        $query = conexion::conectar()->prepare("INSERT INTO `funcionario`(`ci`, `nombres`, `apellidos`, `cargo`, `estado`)
												VALUES (:inputCI,:inputNombres,:inputApellidos,:inputCargo,:inputEstado)");

        $query->bindParam(':inputCI',$data['inputCI'], PDO::PARAM_STR);
        $query->bindParam(':inputNombres',$data['inputNombres'], PDO::PARAM_STR);
        $query->bindParam(':inputApellidos',$data['inputApellidos'], PDO::PARAM_STR);
        $query->bindParam(':inputCargo',$data['inputCargo'], PDO::PARAM_STR);
        $query->bindParam(':inputEstado',$data['inputEstado'], PDO::PARAM_STR);
        // $query->execute();
        $query->execute();
        return $query;
        $query -> close();
    }

    public function select_employee(){
        $query = conexion::conectar()->prepare("SELECT * FROM funcionario");
        $query -> execute();
        return $query;
        $query->close();
    }

    public function data_employee($data){
        $query = conexion::conectar()->prepare("SELECT * FROM `funcionario` WHERE id_funcionario=:id_funcionario");

        $query->bindParam(':id_funcionario',$data, PDO::PARAM_INT);
       
        // $query->execute();
        $query->execute();
        return $query;
        $query -> close;
    }
}


?>
<?php

require_once 'conexion.php';

class accountAssetModel{
    public function create_account_asset($data){
        $query = conexion::conectar()->prepare("INSERT INTO `activo`(`codigo`, `descripcion`, `serie`, `observaciones`, `id_estado`, `id_unidad`)
												VALUES (:inputCodigo,:inputDescripcion,:inputSerie,:inputObservacion,:inputEstado,:inputUnidad)");

        $query->bindParam(':inputCodigo',$data['inputCodigo'], PDO::PARAM_STR);
        $query->bindParam(':inputDescripcion',$data['inputDescripcion'], PDO::PARAM_STR);
        $query->bindParam(':inputSerie',$data['inputSerie'], PDO::PARAM_STR);
        $query->bindParam(':inputObservacion',$data['inputObservacion'], PDO::PARAM_STR);
        $query->bindParam(':inputEstado',$data['inputEstado'], PDO::PARAM_STR);
        $query->bindParam(':inputUnidad',$data['inputUnidad'], PDO::PARAM_STR);
        // $query->execute();
        $query->execute();
        return $query;
        $query -> close();
    }
    public function list_account_asset($a){
        $query = conexion::conectar()->prepare("SELECT a.id_activo, a.codigo, a.descripcion, a.serie, a.observaciones, a.id_estado, e.descripcion estado, a.id_unidad, um.nombre, um.sigla, aa.id_asignar_activo, 
        aa.fecha_registro, aa.codigo_registro
        FROM activo a LEFT JOIN estado e ON a.id_estado = e.id_estado
        LEFT JOIN unidad_medida um ON um.id_unidad = a.id_unidad
        LEFT JOIN asig_activo aa ON aa.id_activo = a.id_activo");
        // $query->execute();
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        #echo json_encode($data);
        $query -> close();
    }

    public function edit_account_asset($data){
        $query = conexion::conectar()->prepare("UPDATE `activo` 
        SET `codigo`=:codigo,`descripcion`=:descripcion,`serie`=:serie,`id_estado`=:estado,`id_unidad`=:unidad_medida WHERE id_activo=:id_asset");
    
        $query->bindParam(':codigo',$data['codigo'], PDO::PARAM_STR);
        $query->bindParam(':descripcion',$data['descripcion'], PDO::PARAM_STR);
        $query->bindParam(':serie',$data['serie'], PDO::PARAM_STR);
        $query->bindParam(':estado',$data['estado'], PDO::PARAM_STR);
        $query->bindParam(':unidad_medida',$data['unidad_medida'], PDO::PARAM_STR);
        $query->bindParam(':id_asset',$data['id_asset'], PDO::PARAM_STR);

        $query->execute();
        return $query;
        #echo json_encode($data);
        $query -> close();
    }

    public function view_account_asset($id_asset){
        $query = conexion::conectar()->prepare("SELECT a.id_activo, a.codigo, a.descripcion, a.serie, a.observaciones, a.id_estado, e.descripcion,a.id_unidad, um.nombre, um.sigla, au.id_funcionario, 
        CONCAT(f.nombres,' ',f.apellidos) funcionario
        FROM activo a LEFT JOIN asig_activo ac ON a.id_activo = ac.id_activo
        LEFT JOIN asig_ubicacion au ON au.id_asig_ubicacion = ac.id_asig_ubicacion
        LEFT JOIN funcionario f ON f.id_funcionario = au.id_funcionario
        LEFT JOIN estado e ON e.id_estado = a.id_estado
        LEFT JOIN unidad_medida um ON um.id_unidad = a.id_unidad
        WHERE a.id_activo =:id_asset");
    
        $query->bindParam(':id_asset',$id_asset, PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        #echo json_encode($data);
        $query -> close();
    }

    

}

?>
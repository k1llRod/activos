<?php
class accountAsignmentModels{
    public static function crear_acta_asignacion_activos($data){
        $query = conexion::conectar()->prepare("INSERT INTO asig_activo(id_activo,fecha_registro,codigo_registro,id_asig_ubicacion)
        VALUES (:id_activo,:fecha_registro,:codigo_registro,:codigo_registro)");
        $query->bindParam(':id_activo',$data['id_activo'], PDO::PARAM_STR);
        $query->bindParam(':fecha_registro',$data['fecha_registro'], PDO::PARAM_STR);
        $query->bindParam(':codigo_registro',$data['codigo_registro'], PDO::PARAM_STR);
        $query->bindParam(':id_asig_ubicacion',$data['id_asig_ubicacion'], PDO::PARAM_STR);
        // $query->execute();
        $query->execute();
        return $query;
        $query -> close();
    }
}
?>

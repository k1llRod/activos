<?php
require_once 'conexion.php';

class assignmentModels{
    public function select_location_area($data,$data1){
        $query = conexion::conectar()->prepare("SELECT ac.id_asignar_activo, ac.fecha_registro, ac.codigo_registro, au.id_funcionario, f.ci, CONCAT(f.nombres,' ',f.apellidos)nombre_completo, f.cargo,
        ua.id_area, ua.descripcion area, ue.id_especifica, ue.descripcion especifica, ug.id_ubicacion, ug.descripcion general
        FROM asig_activo ac LEFT JOIN asig_ubicacion au ON ac.id_asig_ubicacion = au.id_asig_ubicacion
        LEFT JOIN funcionario f ON f.id_funcionario = au.id_funcionario
        LEFT JOIN ubi_area ua ON ua.id_area = au.id_area
        LEFT JOIN ubi_especifica ue ON ue.id_especifica = ua.id_especifica
        LEFT JOIN ubi_general ug ON ug.id_ubicacion = ue.id_ubicacion
        WHERE au.id_funcionario =:id_funcionario AND ue.id_especifica =:id_especifica
        GROUP BY ua.id_area");
        $query->bindParam(':id_funcionario',$data,PDO::PARAM_INT);
        $query->bindParam(':id_especifica',$data1,PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
        $query->close();
    }

    public function select_location_especifica($data){
        $query = conexion::conectar()->prepare("SELECT ac.id_asignar_activo, ac.fecha_registro, ac.codigo_registro, au.id_funcionario, f.ci, CONCAT(f.nombres,' ',f.apellidos)nombre_completo, f.cargo,
        ua.id_area, ua.descripcion area, ue.id_especifica, ue.descripcion especifica, ug.id_ubicacion, ug.descripcion general
        FROM asig_activo ac LEFT JOIN asig_ubicacion au ON ac.id_asig_ubicacion = au.id_asig_ubicacion
        LEFT JOIN funcionario f ON f.id_funcionario = au.id_funcionario
        LEFT JOIN ubi_area ua ON ua.id_area = au.id_area
        LEFT JOIN ubi_especifica ue ON ue.id_especifica = ua.id_especifica
        LEFT JOIN ubi_general ug ON ug.id_ubicacion = ue.id_ubicacion
        WHERE au.id_funcionario =:id_funcionario
        GROUP BY ue.id_especifica");
        $query->bindParam(':id_funcionario',$data,PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
        $query->close();
    }

    public function select_location_general($data){
        $query = conexion::conectar()->prepare("SELECT ac.id_asignar_activo, ac.fecha_registro, ac.codigo_registro, au.id_funcionario, f.ci, CONCAT(f.nombres,' ',f.apellidos)nombre_completo, f.cargo,
        ua.id_area, ua.descripcion area, ue.id_especifica, ue.descripcion especifica, ug.id_ubicacion, ug.descripcion general
        FROM asig_activo ac LEFT JOIN asig_ubicacion au ON ac.id_asig_ubicacion = au.id_asig_ubicacion
        LEFT JOIN funcionario f ON f.id_funcionario = au.id_funcionario
        LEFT JOIN ubi_area ua ON ua.id_area = au.id_area
        LEFT JOIN ubi_especifica ue ON ue.id_especifica = ua.id_especifica
        LEFT JOIN ubi_general ug ON ug.id_ubicacion = ue.id_ubicacion
        WHERE au.id_funcionario = :id_funcionario
        GROUP BY ug.id_ubicacion");
        $query->bindParam(':id_funcionario',$data,PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
        $query->close();
    }

    public function table_asignaciones($data,$data1){
        $query = conexion::conectar()->prepare("SELECT a.id_activo,a.codigo ,a.descripcion, a.serie, e.descripcion estado_activo, ac.id_asignar_activo, ac.fecha_registro, ac.codigo_registro, au.id_funcionario, f.ci, CONCAT(f.nombres,' ',f.apellidos)nombre_completo, f.cargo,
        ua.id_area, ua.descripcion area, ue.id_especifica, ue.descripcion especifica, ug.id_ubicacion, ug.descripcion general
        FROM asig_activo ac LEFT JOIN asig_ubicacion au ON ac.id_asig_ubicacion = au.id_asig_ubicacion
        LEFT JOIN funcionario f ON f.id_funcionario = au.id_funcionario
        LEFT JOIN ubi_area ua ON ua.id_area = au.id_area
        LEFT JOIN ubi_especifica ue ON ue.id_especifica = ua.id_especifica
        LEFT JOIN ubi_general ug ON ug.id_ubicacion = ue.id_ubicacion
        LEFT JOIN activo a ON a.id_activo = ac.id_activo
        LEFT JOIN estado e ON e.id_estado = a.id_estado
        WHERE au.id_funcionario =:id_funcionario AND ua.id_area =:id_area");
        $query->bindParam(':id_funcionario',$data,PDO::PARAM_INT);
        $query->bindParam(':id_area',$data1,PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
        $query->close();
    }

    public function create_acta($data, $data1){
        $sw = 0;
        $sw1 = 0;
        foreach($data as $row){
            $query = conexion::conectar()->prepare($row);
            $query -> execute();
            if(!$query){
                $sw = 1;
            }
        }
        foreach ($data1 as $row1){
            $query1 = conexion::conectar()->prepare($row1);
            $query1 -> execute();
            if(!$query1){
                $sw1 = 1;
            }
        }

        return $sw;
        $query->close();
        $query1->close();
    }

    public function tabla_asignacion($query){
        $totalQuery = "SELECT a.id_activo,a.codigo ,a.descripcion, a.serie, e.descripcion estado_activo, um.nombre unidad_medida ,ac.id_asignar_activo, ac.fecha_registro, ac.codigo_registro, au.id_funcionario, f.ci, CONCAT(f.nombres,' ',f.apellidos)nombre_completo, f.cargo,
        ua.id_area, ua.descripcion area, ue.id_especifica, ue.descripcion especifica, ug.id_ubicacion, ug.descripcion general
        FROM asig_activo ac LEFT JOIN asig_ubicacion au ON ac.id_asig_ubicacion = au.id_asig_ubicacion
        LEFT JOIN funcionario f ON f.id_funcionario = au.id_funcionario
        LEFT JOIN ubi_area ua ON ua.id_area = au.id_area
        LEFT JOIN ubi_especifica ue ON ue.id_especifica = ua.id_especifica
        LEFT JOIN ubi_general ug ON ug.id_ubicacion = ue.id_ubicacion
        LEFT JOIN activo a ON a.id_activo = ac.id_activo
        LEFT JOIN estado e ON e.id_estado = a.id_estado
        LEFT JOIN unidad_medida um ON um.id_unidad = a.id_unidad";

        $totalQuery = $totalQuery." WHERE ".$query;

        $queryExe = conexion::conectar()->prepare($totalQuery);
        $queryExe->execute();
        return $queryExe->fetchAll();
        $queryExe->close();
    }

    public function timeline(){
        $totalQuery = "SELECT hac.id_historico_asignar, hac.id_funcionario, hac.id_asignar_activo, DATE_FORMAT(hac.registration_date,'%d-%m-%y') fecha, f.id_funcionario, CONCAT(f.nombres,' ',f.apellidos) usuario,
        aa.fecha_registro, aa.codigo_registro, aa.id_activo, a.codigo, a.descripcion, a.serie 
        FROM `historico_asig_activo` hac LEFT JOIN funcionario f ON hac.id_funcionario = f.id_funcionario
        LEFT JOIN asig_activo aa ON aa.id_asignar_activo = hac.id_asignar_activo
        LEFT JOIN activo a ON a.id_activo = aa.id_activo";
        $queryExe = conexion::conectar()->prepare($totalQuery);
        $queryExe->execute();
        return $queryExe->fetchAll();
        $queryExe->close();
    }

}


?>
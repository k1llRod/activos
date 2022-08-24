<?php
require_once 'conexion.php';

class assignmentModels{
    public static function ubicacion_area(){
        $query = conexion::conectar()->prepare("SELECT * FROM ubi_area");
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }
    public static function ciudad(){
        $query = conexion::conectar()->prepare("SELECT * FROM ciudad");
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }

    public static function select_ubicacion_general($data){
        $query = conexion::conectar()->prepare("SELECT * FROM ubi_general WHERE id_ciudad=:id_ciudad");
        $query->bindParam(':id_ciudad',$data,PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }
    public static function select_location_area($data,$data1){
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
        $query->close;
    }

    public static function select_location_especifica($data){
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
        $query->close;
    }
    
    public static function select_location_especifica_asset($data){
        $query = conexion::conectar()->prepare("SELECT * FROM ubi_especifica 
        WHERE id_ubicacion=:id_ubicacion");
        $query->bindParam(':id_ubicacion',$data,PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }

    public static function select_location_general($data){
        $q = "SELECT ac.id_asignar_activo, ac.fecha_registro, ac.codigo_registro, au.id_funcionario, f.ci, CONCAT(f.nombres,' ',f.apellidos)nombre_completo, f.cargo,
        ua.id_area, ua.descripcion area, ue.id_especifica, ue.descripcion especifica, ug.id_ubicacion, ug.descripcion general
        FROM asig_activo ac LEFT JOIN asig_ubicacion au ON ac.id_asig_ubicacion = au.id_asig_ubicacion
        LEFT JOIN funcionario f ON f.id_funcionario = au.id_funcionario
        LEFT JOIN ubi_area ua ON ua.id_area = au.id_area
        LEFT JOIN ubi_especifica ue ON ue.id_especifica = ua.id_especifica
        LEFT JOIN ubi_general ug ON ug.id_ubicacion = ue.id_ubicacion";
        if(!empty($data)){
            $q = $q." WHERE au.id_funcionario = :id_funcionario GROUP BY ug.id_ubicacion";
            $query = conexion::conectar()->prepare($q);
            $query->bindParam(':id_funcionario',$data,PDO::PARAM_INT);    
        }else{
            $query = conexion::conectar()->prepare($q);
        }
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }

    public static function select_ubicacion_area($data){
        $query = conexion::conectar()->prepare("SELECT * FROM ubi_area 
        WHERE id_especifica=:id_especifica");
        $query->bindParam(':id_especifica',$data,PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }
    public static function select_employee($data){
        $query = conexion::conectar()->prepare("SELECT * 
        FROM asig_ubicacion au LEFT JOIN funcionario f ON au.id_funcionario = f.id_funcionario  
        WHERE au.id_area=:id_area");
        $query->bindParam(':id_area',$data,PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }

    public static function table_asignaciones($data,$data1){
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
        $query->close;
    }

    public static function create_acta($data, $data1){
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
        $query->close;
        $query1->close;
    }

    public static function create_assignment_asset($data, $data1){
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

        //return $sw;
        return $query->errorCode();
        $query->close;
        $query1->close;
    }

    public static function tabla_asignacion($query){
        $totalQuery = "SELECT a.id_activo,a.codigo ,a.descripcion, a.serie, e.descripcion estado_activo, um.nombre unidad_medida ,ac.id_asignar_activo, ac.fecha_registro, ac.codigo_registro, au.id_funcionario, f.ci, CONCAT(f.nombres,' ',f.apellidos)nombre_completo, f.cargo,
        ua.id_area, ua.descripcion area, ue.id_especifica, ue.descripcion especifica, ug.id_ubicacion, ug.descripcion general, CONCAT(ug.descripcion,'-',ue.descripcion,'-',ua.descripcion) ubicacion
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
        $queryExe->close;
    }

    // public static function timeline(){
    //     $totalQuery = "SELECT hac.id_historico_asignar, hac.id_funcionario, hac.id_asignar_activo, DATE_FORMAT(hac.registration_date,'%d-%m-%y') fecha, f.id_funcionario, CONCAT(f.nombres,' ',f.apellidos) usuario,
    //     aa.fecha_registro, aa.codigo_registro, aa.id_activo, a.codigo, a.descripcion, a.serie 
    //     FROM `historico_asig_activo` hac LEFT JOIN funcionario f ON hac.id_funcionario = f.id_funcionario
    //     LEFT JOIN asig_activo aa ON aa.id_asignar_activo = hac.id_asignar_activo
    //     LEFT JOIN activo a ON a.id_activo = aa.id_activo";
    //     $queryExe = conexion::conectar()->prepare($totalQuery);
    //     $queryExe->execute();
    //     return $queryExe->fetchAll();
    //     $queryExe->close();
    // }
    public static function timeline(){
        $totalQuery = "SELECT haa.id_historico_asignar,haa.id_funcionario,CONCAT(f.nombres,' ',f.apellidos) funcionario,haa.id_asignar_activo,haa.id_user,CONCAT(u.nombres,' ',u.apellidos) usuario,haa.registration_date,aa.id_asignar_activo,aa.id_activo,a.codigo,a.descripcion,aa.codigo_registro
        FROM historico_asig_activo haa LEFT JOIN asig_activo aa ON haa.id_asignar_activo = aa.id_asignar_activo
        LEFT JOIN activo a ON a.id_activo = aa.id_activo
        LEFT JOIN asig_ubicacion au ON au.id_asig_ubicacion = aa.id_asig_ubicacion
        LEFT JOIN funcionario f ON f.id_funcionario = haa.id_funcionario
        LEFT JOIN users u ON u.id_user = haa.id_user
        ORDER BY aa.id_activo,haa.registration_date";
        $queryExe = conexion::conectar()->prepare($totalQuery);
        $queryExe->execute();
        return $queryExe->fetchAll();
        $queryExe->close;
    }


    public static function timeline_asset($data){
        $totalQuery = "SELECT aa.id_asignar_activo, aa.id_activo, aa.fecha_registro, aa.codigo_registro, hac.id_historico_asignar, hac.id_funcionario, hac.id_user,
        CONCAT(f.nombres,' ',f.apellidos) funcionario, CONCAT(u.nombres,' ',u.apellidos) usuario
        FROM asig_activo aa LEFT JOIN historico_asig_activo hac ON aa.id_asignar_activo = hac.id_asignar_activo
        LEFT JOIN funcionario f ON f.id_funcionario = hac.id_funcionario
        LEFT JOIN users u ON u.id_user = hac.id_user
        WHERE aa.id_activo=:id_activo";
        $queryExe = conexion::conectar()->prepare($totalQuery);
        $queryExe->bindParam(':id_activo',$data,PDO::PARAM_INT);
        $queryExe->execute();
        return $queryExe->fetchAll();
        $queryExe->close;
    }
    public static function id_asig($data){
        $query = conexion::conectar()->prepare("SELECT * FROM asig_ubicacion 
        WHERE id_funcionario=:id_funcionario AND id_area=:id_area");
        $query->bindParam(':id_funcionario',$data['id_employee'],PDO::PARAM_INT);
        $query->bindParam(':id_area',$data['id_area'],PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }
    public static function employeeActa($data){
        $query = conexion::conectar()->prepare("SELECT aa.id_asignar_activo,aa.codigo_registro,au.id_funcionario,CONCAT(f.nombres,' ',f.apellidos) AS nombre_completo,f.ci,f.cargo,aa.tipo_asignacion
        FROM asig_activo aa LEFT JOIN asig_ubicacion au ON aa.id_asig_ubicacion = au.id_asig_ubicacion
        LEFT JOIN funcionario f ON f.id_funcionario = au.id_funcionario
        WHERE aa.codigo_registro != 'VACIO' AND au.id_funcionario =:id_funcionario
        GROUP BY aa.codigo_registro
        ORDER BY aa.codigo_registro DESC");
        $query->bindParam(':id_funcionario',$data,PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }

}


?>
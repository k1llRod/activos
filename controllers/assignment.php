<?php
class assignmentController{
    public static function ciudad(){
        $answer = assignmentModels::ciudad();
        $constructor = '';
        $constructor.= '
            <select class="form-control" name="ciudad" id="ciudad">
                <option value="">Seleccionar ciudad</option>';
        foreach ($answer as $row => $item){
            $constructor.='<option value="'.$item['id_ciudad'].'">'.$item['nombre'].'</option>';
        }
        $constructor .= '</select>';
        echo $constructor;
    }
    public static function ubicacion_area(){
        $answer = assignmentModels::ubicacion_area();
        $constructor = '';
        $constructor.= '
            <select class="form-control" name="ubicacion_general" id="ubicacion_general">
                <option value="">Seleccionar</option>';
        foreach ($answer as $row => $item){
            $constructor.='<option value="'.$item['id_area'].'">'.$item['descripcion'].'</option>';
        }
        $constructor .= '</select>';
        echo $constructor;
    }
    public static function select_location_area($data,$data1){
        $answer = assignmentModels::select_location_area($data,$data1);
        $constructor = '';
        $constructor.= '<option value="">Seleccionar</option>';
        foreach ($answer as $row => $item){
            $constructor.='<option value="'.$item['id_area'].'">'.$item['area'].'</option>';
        }
        echo $constructor;

    }
    public static function select_location_especifica($data){
        $answer = assignmentModels::select_location_especifica($data);
        $constructor = '';
        $constructor.= '<option value="">Seleccionar</option>';
        foreach ($answer as $row => $item){
            $constructor.='<option value="'.$item['id_especifica'].'">'.$item['especifica'].'</option>';
        }
        echo $constructor;
    }

    public static function select_location_especifica_asset($data){
        $answer = assignmentModels::select_location_especifica_asset($data);
        $constructor = '';
        $constructor.= '<option value="">Seleccionar</option>';
        foreach ($answer as $row => $item){
            $constructor.='<option value="'.$item['id_especifica'].'">'.$item['descripcion'].'</option>';
        }
        echo $constructor;
    }

    public static function select_location_general($data){
        $answer = assignmentModels::select_location_general($data);
        $constructor = '';
        $constructor.= '<option value="">Seleccionar</option>';
        foreach ($answer as $row => $item){
            $constructor.='<option value="'.$item['id_ubicacion'].'">'.$item['general'].'</option>';
        }
        echo $constructor;
    }

    public static function select_ubicacion_area($data){
        $answer = assignmentModels::select_ubicacion_area($data);
        $constructor = '';
        $constructor.= '<option value="">Seleccionar</option>';
        foreach ($answer as $row => $item){
            $constructor.='<option value="'.$item['id_area'].'">'.$item['descripcion'].'</option>';
        }
        echo $constructor;
    }
    public static function select_employee($data){
        $answer = assignmentModels::select_employee($data);
        $constructor = '';
        $constructor.= '<option value="">Seleccionar</option>';
        foreach ($answer as $row => $item){
            $constructor.='<option value="'.$item['id_funcionario'].'">'.$item['nombres'].' '.$item['apellidos'].'.</option>';
        }
        echo $constructor;
    }

    public static function table_asignaciones($data,$data1){
        $answer = assignmentModels::table_asignaciones($data,$data1);
        $constructor = '
                    <table id="ver_asignaciones" class="table">
                        <thead>
                            <tr>
                                <th>N</th>
                                <th>Código</th>
                                <th>Código Registro</th>
                                <th>Descripción</th>
                                <th>Serie</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>';
        $c = 1;
        foreach ($answer as $row => $item){
            $constructor .= '<tr id="'.$item['id_asignar_activo'].'">
                                <td>'.$c.'</td>
                                <td>'.$item['codigo'].'</td>
                                <td>'.$item['codigo_registro'].'</td>
                                <td>'.$item['descripcion'].'</td>
                                <td>'.$item['serie'].'</td>
                                <td>'.$item['estado_activo'].'</td>
                            </tr>';
            $c++;

        }
        $constructor .= "</tbody>
                                <tfoot>
                                <tr>

                                </tr>
                            </tfoot>
                        </table>
                        <script>
                        $(document).ready(function() {
                            var table = $('#ver_asignaciones').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    'selectAll',
                                    'selectNone'
                                ],
                                
                                select: {
                                    style: 'multi'
                                }
                            });
                            $('#ver_asignaciones tbody').on( 'click', 'tr', function () {
                                $(this).toggleClass('selected');
                            } );
                            
                            $('#button').click(function(){
                                var n = table.rows('.selected').ids().length;
                                var ids = table.rows('.selected').ids();
                                var id_funcionario = $('#select_employee').val();
                                var valor='';
                                valor = ids[0];
                                for(i=1; i<n; i++) {
                                    valor = valor+ ',' + ids[i];
                                }
                                console.log(valor);
                                $('#idAsignarActivo').val(valor);
                                //console.log(id_funcionario);
                                $('#funcionario').val(id_funcionario); 
                            });
                        })
                        </script>";

        echo $constructor;            
    }
    
    public static function create_acta($data){
        #echo 'Controlador'.$data['idAsignarActivo'];
        $array = explode(',',$data['idAsignarActivo']);
        $arrayQuery[] = '';
        $arrayTimeline[] = '';
        $c = 0;
        foreach($array as $word){
            $arrayQuery[$c] ="UPDATE `asig_activo` SET `codigo_registro` = '".$data['codeActa']."' WHERE `id_asignar_activo`=".$word;
            $arrayTimeline[$c] = "INSERT INTO `historico_asig_activo`(`id_funcionario`, `id_asignar_activo`, `id_user`, `registration_date`)
            VALUES (".$data['id_employee'].",".$word.",".$data['user'].",NOW())";
            echo $arrayTimeline[$c];
            $c++;
        }
        $answer = assignmentModels::create_acta($arrayQuery, $arrayTimeline);
        
        if($answer){
            echo '
            swal({
                title: "OK!",
                text: "El funcionario se registro correctamente!!",
                type: "success",
                confirmButtonText: "Cerrar",
                closeOnConfirm: false,
                },
                function(isConfirm){
                    if(isConfirm){
                        window.location = "new_employee";
                    }
                });

            ';
        }else{
            echo '
                    swal({
                        title: "Error!",
                        text: "Error al registrar un nuevo funcionario!",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false,
                        },
                        function(isConfirm){
                            if(isConfirm){
                                window.location = "new_employee";
                            }
                        });

                ';
                
        }
        
        
    }

    public static function create_assignment_asset($data){
        #echo 'Controlador'.$data['idAsignarActivo'];
        $array = explode(',',$data['idAsignarActivo']);
        $arrayQuery[] = '';
        $arrayTimeline[] = '';
        //$q = "INSERT INTO `asig_activo`(`id_activo`, `fecha_registro`, `codigo_registro`, `id_asig_ubicacion`) 
        //VALUES ('".$data['idAsignarActivo']."','".$data['datepicker']."','".$data['codeActa']."','".$data['id_asig']."')";
        $c = 0;
        foreach($array as $word){
            $a = str_replace(
                '/',
                '-',
                $data['datepicker']
            );
            //$a = $a
            $format_date = date("Y-m-d", strtotime($a));
            //echo strtotime($data["datepicker"]);
            //echo var_dump($data['datepicker']);
            //echo date("Y/m/d", strtotime("01/01/2022"));
            $arrayQuery[$c] = "INSERT INTO `asig_activo`(`id_activo`, `fecha_registro`, `codigo_registro`, `id_asig_ubicacion`) 
            VALUES ('".$word."','".$format_date."','".$data['codeActa']."','".$data['id_asig']."')";
            $arrayTimeline[$c] = "INSERT INTO `historico_asig_activo`(`id_funcionario`, `id_asignar_activo`, `id_user`, `registration_date`)
            VALUES (".$data['id_employee'].",".$word.",".$data['user'].",NOW())";
            //echo $arrayQuery[$c];
            $c++;
        }
        $answer = assignmentModels::create_assignment_asset($arrayQuery, $arrayTimeline);
        print_r($answer);
        
        
    }

    public function tabla_asignacion(){
        if(!isset($_GET['ids'])){
            $_GET['ids'] = ''; 
        }
        $array = explode(',',$_GET['ids']);
        $query = '';
        $sw = 0;
        $constructor = '';
        foreach($array as $item){
            if($sw == 0){
                $query .= 'ac.id_asignar_activo='.$item;
                $sw = 1;
            }else{
                $query .= " OR ".'ac.id_asignar_activo='.$item;
            }
            
        }
        $answer = assignmentModels::tabla_asignacion($query);
        $constructor .= '<table style="border: 1px solid #333; text-align:center; line-height: 20px; font-size:10px">';
        $c = 1;
        foreach ($answer as $row){
            $constructor .= '<tr>
                <td style="border: 1px solid #666; width: 25px;">'.$c.'</td>
                <td style="border: 1px solid #666; width: 70px;">'.$row['unidad_medida'].'</td>
                <td style="border: 1px solid #666;">'.$row['codigo'].'</td>
                <td style="border: 1px solid #666; width: 200px;">'.$row['descripcion'].'</td>
                <td style="border: 1px solid #666;">'.$row['serie'].'</td>
                <td style="border: 1px solid #666;">'.$row['estado_activo'].'</td>
                <td style="border: 1px solid #666;">'.$row['ubicacion'].'</td>
            </tr>';
        $c ++;
        }
        $constructor .="</table>";
        return $constructor;
        
    }

    public function timeline(){
        $answer = assignmentModels::timeline();
        $constructor = '';
        $id_activo = 0;
        $sw = 0;
        foreach ($answer as $row){
            
            if($row['id_activo'] == $id_activo){
                $constructor .= '<ul>
                                    <li><b>Código de registro: </b> '.$row['codigo_registro'].'</li>
                                    <li><b>Funcionario: </b> '.$row['id_funcionario'].'</li>
                                    <li><b>Fecha: </b> '.$row['registration_date'].'</li>
                                </ul>';
                
            }else{
                $sw = 0;
                $constructor .=' <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-red">
                                            '.$row['id_activo'].' - test
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->';
                if($sw == 0){
                    $constructor .= ' <!-- timeline item -->
                                    <li>
                                    <i class="fa fa-user bg-aqua"></i>
                            
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                                        <h3 class="timeline-header no-border"><a href="#">Activo fijo: '.$row['descripcion'].' - Codigo: '.$row['codigo'].'</a></h3>
                                    <div class="timeline-body">
                                        <ul>
                                            <li><b>Código de registro: </b> '.$row['codigo_registro'].'</li>
                                            <li><b>Administrador: </b> '.$row['usuario'].'</li>
                                            <li><b>Responsable del activo: </b> '.$row['id_funcionario'].'</li>
                                            <li><b>Fecha: </b> '.$row['registration_date'].'</li>
                                        </ul>';   
                    $sw = 1;
                }else{
                    $constructor .= '</div>
                                    </div>
                                    </li>
                                    <!-- END timeline item -->';
                                    
                    $sw = 0;
                }
                
                                        
            }
            
            $id_activo = $row['id_activo'];
        }

        echo $constructor;

    }

    public function timeline_asset(){
        if(isset($_GET['id_activos'])){
            $data = $_GET['id_activos'];
        }
        $answer = assignmentModels::timeline_asset($data);
        $constructor = '';
        foreach ($answer as $row){

            $constructor .=' <!-- timeline time label -->
                                <li class="time-label">
                                    <span class="bg-red">
                                        '.$row['fecha_registro'].'
                                    </span>
                                </li>
                                <!-- /.timeline-label -->';
            $constructor .= ' <!-- timeline item -->
                                <li>
                                <i class="fa fa-user bg-aqua"></i>
                        
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                        
                                    <h3 class="timeline-header no-border"><a href="#">'.$_SESSION['name'].' </a> asigno un nuevo activo fijo al usuario <a href="#">'.$row['usuario'].' </a></h3>
                                    <div class="timeline-body">
                                    <b>Código de registro: </b> '.$row['codigo_registro'].'
                                    </div>
                                </div>
                                </li>
                                <!-- END timeline item -->';
            
        }
        echo $constructor;
    }

    public static function select_ubicacion_general($data){
        $answer = assignmentModels::select_ubicacion_general($data);
        $constructor = '';
        $constructor.= '<option value="">Seleccionar</option>';
        foreach ($answer as $row => $item){
            $constructor.='<option value="'.$item['id_ubicacion'].'">'.$item['descripcion'].'</option>';
        }
        echo $constructor;
    }

    public static function id_asig($data){
        $answer = assignmentModels::id_asig($data);
        //$answer = 1;
        foreach($answer as $row =>$item){
            $constructor = $item['id_asig_ubicacion'];
        }

        echo $constructor;
    }

    public static function employeeActa($data){
        $answer = assignmentModels::employeeActa($data);
        $constructor = 'asd';
        $sw = 0;
        foreach ($answer as $row => $item){
            if($sw == 0){
                $constructor .= '<div class="widget-user-header bg-gray">
                                    <div class="widget-user-image">
                                        <img class="img-circle" src="views/images/personal_img.png" alt="User Avatar">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">'.$item['nombre_completo'].'</h3>
                                    <h5 class="widget-user-desc">'.$item['cargo'].'</h5>
                                </div>';
                $sw = 1;
            }
            $constructor .= '<div class="widget-user-header bg-gray">
            <div class="widget-user-image">
                <img class="img-circle" src="views/images/personal_img.png" alt="User Avatar">
            </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Nadia Carmichael</h3>
                <h5 class="widget-user-desc">Lead Developer</h5>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Historial de procesos</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 150px">Asignaciones</th>
                            <th>Detalle</th>
                        </tr>';
            if($item['tipo_asignacion'] == 'entrega'){
                $constructor .= '<tr>
                                    <td>1.</td>
                                    <td>Actas de entrega</td>
                                    <td><span class="badge bg-light-blue">'.$item['codigo_registro'].'</span></td>
                                </tr>';
            }
            if($item['tipo_asignacion'] == 'devolucion'){
                $constructor .= '<tr>
                                    <td>2.</td>
                                    <td>Actas de devolucion</td>
                                    <td><span class="badge bg-light-blue">'.$item['codigo_registro'].'</span></td>
                                </tr>';
            }

        }
        $constructor .= '</table>
        </div>';        
        echo $constructor;
    }

    public static function employeeActas($data){
        $answer = assignmentModels::employeeActa($data);
        $constructor = '';
        $sw = 0;
        $sw1 = 0;
        $sw2 = 0;
        foreach ($answer as $row => $item){
            if($sw == 0){
                $constructor .= '<div class="widget-user-header bg-gray">
                                    <div class="widget-user-image">
                                        <img class="img-circle" src="views/images/personal_img.png" alt="User Avatar">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">'.$item['nombre_completo'].'</h3>
                                    <h5 class="widget-user-desc">'.$item['cargo'].'</h5>
                                </div>';
                $sw = 1;
            
                $constructor .= '
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Historial de procesos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th style="width: 150px">Asignaciones</th>
                                <th>Detalle</th>
                            </tr>';
            }
            if($item['tipo_asignacion'] == 'assignment'){
                if($sw1 == 1){
                    $constructor .= '<span class="badge bg-light-blue update_acta" id="'.$item['codigo_registro'].'" type="button" data-toggle="modal" data-target="#modal_update_acta">'.$item['codigo_registro'].'</span>';
                }else{
                    $constructor .= '<tr>
                        <td>1.</td>
                        <td>Actas de entrega</td>
                        <td><span class="badge bg-light-blue update_acta" id="'.$item['codigo_registro'].'" type="button" data-toggle="modal" data-target="#modal_update_acta">'.$item['codigo_registro'].'</span>';
                }
                $sw1 = 1;  
            }
            if($item['tipo_asignacion'] == 'return'){
                if($sw1 == 1){
                    $constructor.= '</td></tr>';
                }
                $constructor .= '<tr>
                                    <td>2.</td>
                                    <td>Actas de devolucion</td>
                                    <td><span class="badge bg-light-blue">'.$item['codigo_registro'].'</span></td>
                                </tr>';
            }

        }
        $constructor .= '</table>
        </div>
        <script>
        /*MODIFICAR ACTAS DE ASIGACION DE ACTIVOS*/
            $(".update_acta").click(function(){
                var id = $(this).attr("id");
                var id_employee = $("#id_employee").val();
                $("#codigo_registro").val(id);
                $("#id_employee_acta").val(id_employee);
                console.log(id);
                console.log(id_employee);
                $.ajax({
                    url:"views/ajax/assignment.php",
                    method:"POST",
                    data:{"codigo_registro":id, "id_employee_acta":id_employee},
                    success:function(r){
                        console.log(r);
                        $("#table_codigo_registro").html(JSON.parse(r));
                        
                    }
                });
                
            })
        </script>';        
        echo $constructor;
    }

    public static function get_asset_code($data){
        $answer = assignmentModels::get_asset_code($data);
        $constructor = '';
        $constructor .= '<table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Codigo</th>
                                <th>Descripcion</th>
                                <th>Serie</th>
                                <th>Observacion</th>
                                <th>Estado</th>
                                <th>Unidad</th>
                                <th>Status</th>
                                <th>Acción</th>
                            </tr>';
        foreach($answer as $row => $item){
            $constructor .= '<tr id="'.$item['id_asignar_activo'].'">
                                <td>'.$item['id_asignar_activo'].'</td>
                                <td>'.$item['codigo_registro'].'</td>
                                <td>'.$item['id_activo'].'</td>
                                <td>'.$item['id_activo'].'</td>
                                <td>'.$item['id_activo'].'</td>
                                <td>'.$item['id_activo'].'</td>
                                <td>'.$item['id_activo'].'</td>
                                <td>'.$item['id_activo'].'</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger delete_activo_acta" id="'.$item['id_asignar_activo'].'"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>     
                            </tr>';    
        }
        $constructor .= '</table>
        <script>
        //ELIMINAR ACTIVO ASIGNADO
        $(".delete_activo_acta").click(function(){
            console.log("Eliminar activo asignado");
            var id_assignment_asset = $(this).attr("id");
            
            console.log(id_assignment_asset);
            Swal.fire({
                title: "Are you sure?",
                text: "You wont be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
              }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:"views/ajax/assignment.php",
                        method:"POST",
                        data:{"id_eliminar_activo_acta":id_assignment_asset},
                        success:function(r){
                            console.log(r);
                            if(r == "ok"){
                                Swal.fire("Deleted!", "Your file has been deleted.", "success");
                            }else{
                                Swal.fire("Error!", "Your file has not been deleted.", "error");
                            }
                        }
                    });
                  
                }
              })
        });
        </script>';
        print json_encode($constructor, JSON_UNESCAPED_UNICODE);
        // echo $constructor;
    }

    public static function eliminar_activo_acta($data){
        $answer = assignmentModels::eliminar_activo_acta($data);
        if($answer){
            echo "ok";
        }else{
            echo "error";
        }
    }

    

}


    
?>
<?php
require_once "configuration.php";
class accountAssetController{
    public function create_account_asset(){
        if(!isset($_POST['inputCodigo'])){
            $_POST['inputCodigo'] ='';
        }
        if(!isset($_POST['inputDescripcion'])){
            $_POST['inputDescripcion'] ='';
        }
        if(!isset($_POST['inputSerie'])){
            $_POST['inputSerie'] ='';
        }
        if(!isset($_POST['inputObservacion'])){
            $_POST['inputObservacion'] ='';
        }
        if(!isset($_POST['inputEstado'])){
            $_POST['inputEstado'] ='';
        }
        if(!isset($_POST['inputUnidad'])){
            $_POST['inputUnidad'] ='';
        }
        if(isset($_POST['new_asset'])){
            $data = array('inputCodigo' => $_POST['inputCodigo'],
                        'inputDescripcion' => $_POST['inputDescripcion'],
                        'inputSerie' => $_POST['inputSerie'],
                        'inputObservacion' => $_POST['inputObservacion'],
                        'inputEstado' => $_POST['inputEstado'],
                        'inputUnidad' => $_POST['inputUnidad']);

            $answer = accountAssetModel::create_account_asset($data);
                if($answer){ 
                    echo '<script>
                    swal({
                        title: "OK!",
                        text: "El usuario se registro correctamente!!",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false,
                        },
                        function(isConfirm){
                            if(isConfirm){
                                window.location = "account_asset";
                            }
                        });

                    </script>';
                }else{
                    echo '<script>
                        swal({
                            title: "Error!",
                            text: "Error al registrar un nuevo usuario!",
                            type: "success",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false,
                            },
                            function(isConfirm){
                                if(isConfirm){
                                    window.location = "account_asset";
                                }
                            });

                    </script>';
            }

        }

       
        
    }
    
    public static function list_account_asset($search){
        $constructor = '';
        $c = 1;
        $answer = accountAssetModel::list_account_asset($search);
        print json_encode($answer, JSON_UNESCAPED_UNICODE);
        /*
        foreach ($answer as $row => $item){
            $constructor .= '<tr id="'.$item['id_activo'].'">
                                <td>'.$c.'</td>
                                <td>'.$item['codigo'].'</td>
                                <td>'.$item['descripcion'].'</td>
                                <td>'.$item['serie'].'</td>
                                <td>'.$item['estado'].'</td>
                                <td>'.$item['nombre'].'</td>
                                <td>'.$item['fecha_registro'].'</td>
                                <td>'.$item['codigo_registro'].'</td>
                            </tr>';
            $c++;
        }
       
        echo $constructor;
        */
    }

    public function edit_account_asset($data){
        $edit_account_asset = accountAssetModel::edit_account_asset($data);
        
    }

    public function view_account_asset($id_asset){

        $answer = accountAssetModel::view_account_asset($id_asset);
        $constructor = '';
        foreach ($answer as $a =>$row){
            echo '
            <input type="hidden" name="id_activo" id="id_activo" value="'.$row['id_activo'].'">
            <div class="form-group">
            <label for="codigo" class="col-sm-2 control-label">Código</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="codigo" name="codigo" value="'.$row['codigo'].'">
                </div>
            </div>
            <div class="form-group">
                <label for="funcionario" class="col-sm-2 control-label">Funcionario</label>
                <div class="col-sm-10">
                    <select class="form-control" name="funcionario" id="funcionario">
                        <option value="'.$row['id_funcionario'].'">'.$row['funcionario'].'</option>';
                        //$unit = new configurationController();
                        //$unit -> view_unit();
        echo '</select>
                </div>
            </div>    
            <div class="form-group">
            <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="descripcion" name="descripcion" placeholder="Enter ...">'.$row['descripcion'].'</textarea>
                </div>
            </div>
            <div class="form-group">
            <label for="serie" class="col-sm-2 control-label">Serie</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="serie" name="serie" value="'.$row['serie'].'">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEstado" class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-10">
                    <select class="form-control" name="inputEstado" id="inputEstado">
                    <option value="'.$row['id_estado'].'">'.$row['estado'].'</option>';
                        //echo $state;
                    echo '</select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputUnidad" class="col-sm-2 control-label">Unidad de medida</label>
                <div class="col-sm-10">
                    <select class="form-control" name="inputUnidad" id="inputUnidad">
                        <option value="'.$row['id_unidad'].'">'.$row['nombre'].'</option>';
                        //$unit = new configurationController();
                        //$unit -> view_unit();
        echo '</select>
                </div>
            </div>
            <div class="form-group">
            <label for="observaciones" class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="observaciones" name="observaciones" value="'.$row['observaciones'].'">
                </div>
            </div>
            <div class="form-group">
            <label for="fecha_registro" class="col-sm-2 control-label">Fecha de registro</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fecha_registro" name="fecha_registro" placeholder="Descripción">
                </div>
            </div>
            <div class="form-group">
            <label for="codigo_registro" class="col-sm-2 control-label">Código de registro</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="codigo_registro" name="codigo_registro" placeholder="Descripción">
                </div>
            </div>';
        }
        #print json_encode($answer, JSON_UNESCAPED_UNICODE);
    }

    public function updated_account_asset($data){
        $sw = 0;
        $updated_account_asset = accountAssetModel::updated_account_asset($data);
        if($updated_account_asset){
            $sw = 1;
        }else{
            $sw = 0;
        }
        echo $sw;
    }

    public static function view_account_asset_assignment(){
        $constructor = '';
        $answer = accountAssetModel::view_account_asset_assignment();
        print json_encode($answer, JSON_UNESCAPED_UNICODE);
    }

    public static function view_account_asset_assignment1(){
        $answer = accountAssetModel::view_account_asset_assignment();
        $constructor = '';
        $constructor .= '
                    <table id="ver_activos_fijos" class="table">
                        <thead>
                            <tr>
                                <th>N</th>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Serie</th>
                                <th>Observacion</th>
                                <th>Estado</th>
                                <th>Unidad</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>';
        $c = 1;
        foreach ($answer as $a=> $item){
            $constructor .= '<tr id="'.$item['id_activo'].'">
            <td>'.$c.'</td>
            <td>'.$item['codigo'].'</td>
            <td>'.$item['descripcion'].'</td>
            <td>'.$item['serie'].'</td>
            <td>'.$item['observaciones'].'</td>
            <td>'.$item['id_estado'].'</td>
            <td>'.$item['id_unidad'].'</td>
            <td><span class="label label-success">'.$item['estado_asignacion_activo'].'</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-times"></i></button>
                </div>
            </td>   
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
                            var table = $('#ver_activos_fijos').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    'selectAll',
                                    'selectNone'
                                ],
                                
                                select: {
                                    style: 'multi'
                                }
                            });
                            $('#ver_activos_fijos tbody').on( 'click', 'tr', function () {
                                $(this).toggleClass('selected');
                            } );
                            
                            $('#button').click(function(){
                                var n = table.rows('.selected').ids().length;
                                var ids = table.rows('.selected').ids();
                                var id_funcionario = $('#id_employee').val();
                                var funcionario = $('#id_employee option:selected').text();
                                var valor='';
                                valor = ids[0];
                                for(i=1; i<n; i++) {
                                    valor = valor+ ',' + ids[i];
                                }
                                console.log('VALOR' + valor);
                                $('#idAsignarActivo').val(valor);
                                console.log('ID FUNCIONARUIO' + id_funcionario);
                                $('#funcionario').val(funcionario);
                                $('#id_funcionario').val(id_funcionario); 
                            });
                        })
                        </script>";

        echo $constructor;            

    }
    /* public static function updated_code_acta(){
        $answer = accountAssetModel::updated_code_acta($codigo_registro);
        print json_encode($answer, JSON_UNESCAPED_UNICODE);
    } */

}



?>
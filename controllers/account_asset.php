<?php
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
    
    public function list_account_asset($search){
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
        print json_encode($answer, JSON_UNESCAPED_UNICODE);
    }

    
}



?>
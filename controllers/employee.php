<?php

class employeeController{
    public function create_employee(){
        if(!isset($_POST['inputCI'])){
            $_POST['inputCI'] ='';
        }
        if(isset($_POST['new_employee'])){
            $data = array('inputCI'=>$_POST['inputCI'],
            'inputNombres'=>$_POST['inputNombres'],
            'inputApellidos'=>$_POST['inputApellidos'],
            'inputCargo'=>$_POST['inputCargo'],
            'inputEstado'=>$_POST['inputEstado']);

            $answer = employeeModel::create_employee($data);
            if($answer){ 
                echo '<script>
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

                </script>';
            }else{
                echo '<script>
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

                </script>';
            }

        }

 
    }

    public function select_employee(){
        $answer = employeeModel::select_employee();
            echo "<option value=''>Buscar</option>";
        foreach ($answer as $item => $row) {
            echo "<option value='".$row['id_funcionario']."'>".$row['nombres']." ".$row['apellidos']."</option>";
        }
    }

}

?>
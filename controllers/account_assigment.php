<?php
class accountAsignmentController{
    public function crear_acta_asignacion_activos(){
             $data = array('id_asignment_asset' => $_POST['id_asignment_asset'],
            'codeActa' => $_POST['codeActa'],
            'date_assignment_asset' => $_POST['date_assignment_asset'],
            'id_funcionario' => $_POST['id_funcionario']);
            echo $data['id_asignment_asset'];
            echo $data['codeActa'];
            echo $data['id_funcionario'];
            // $answer = accountAsignmentModels::crear_acta_asignacion_activos($data);
            // if($answer){
            //     echo $data['codeActa'];
            //     echo '<script>
            //             swal({
            //                 title: "OK!",
            //                 text: "El usuario se registro correctamente!!",
            //                 type: "success",
            //                 confirmButtonText: "Cerrar",
            //                 closeOnConfirm: false,
            //                 },
            //                 function(isConfirm){
            //                     if(isConfirm){
            //                         window.location = "account_assignment";
            //                     }
            //                 });
    
            //             </script>';
            // }
           
            
    }

}

?>
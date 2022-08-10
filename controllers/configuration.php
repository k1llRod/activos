<?php
class configurationController{
        public function view_unit(){
            $answer = configurationModel::view_unit();
            $constructor = '';
            foreach ($answer as $row => $item){
                echo '<option value="'.$item['id_unidad'].'">'.$item['sigla'].'</option>';
            }

        }

        public function view_state(){
            $answer = configurationModel::view_state();
            $constructor = '';
            foreach ($answer as $row => $item){
                echo '<option value="'.$item['id_estado'].'">'.$item['descripcion'].'</option>';
            }
        }
        public function crear_correlativo(){
            if(isset($_POST['inputName'])){
                $data = array('name' => $_POST['inputName']);
            }
            $answer = configurationModel::crear_correlativo($data);
            if($answer){ 
                echo '<script>
                swal({
                    title: "OK!",
                    text: "El prefijo correlativo se registro correctamente!!",
                    type: "success",
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false,
                    },
                    function(isConfirm){
                        if(isConfirm){
                            window.location = "config";
                        }
                    });

                </script>';
            }else{
                echo '<script>
                    swal({
                        title: "Error!",
                        text: "Error al registrar un nuevo prefijo correlativo!",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false,
                        },
                        function(isConfirm){
                            if(isConfirm){
                                window.location = "config";
                            }
                        });

                </script>';
            }
            
        }

        public function view_correlativo(){
            $answer = configurationModel::view_correlativo();
            foreach ($answer as $row => $item){
                $code = $item['name'];
            }
            $count = configurationModel::count_correlativo($code);
            foreach ($count as $row => $item){
                $count = $item['code_count'];
            }
            echo '<input type="text" class="form-control" id="codeActa" name="codeActa" value="'.$count.'/'.$code.'">';
        }

        public function tree_view_correlativo(){
            $answer = configurationModel::tree_view_correlativo();
            $constructor = '';
            $constructor .= '';
            foreach($answer as $row => $item){
                $constructor .= "<tr>";
                $constructor .= "<td>".$item['id_correlativo']."</td>";
                $constructor .= "<td>".$item['name']."</td>";
                $constructor .= "<td>".$item['estado']."</td>";
                $constructor .= "</tr>";
            }
            echo $constructor;
        }
    }
?>

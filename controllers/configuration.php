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
    }
?>

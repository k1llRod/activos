<?php

class linksControllers{
    public function linkController(){
        if(isset($_GET['action'])){
            $links = $_GET['action'];
        }
        else{
            $links = "index";
        }
        $answer = linksModels::linkModel($links);
        include $answer;
        //echo $answer;
    }
}

?>
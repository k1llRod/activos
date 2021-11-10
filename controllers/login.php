<?php

class loginControllers{
    public function loginController(){
        if(isset($_POST['inputText'])){
            $dataControllers = array("user"=>$_POST['inputText'], "pass"=>$_POST['inputPassword']);
            $answer = loginModels::loginModel($dataControllers,"users");
            if($answer['cuenta'] == $_POST['inputText'] &&
				$answer['pass'] == $_POST['inputPassword'] ){
                session_start();
                $_SESSION['validate'] = true;
                $_SESSION['name'] = $answer['nombres'];
                $_SESSION['id'] = $answer['id_user'];       
                header("location:index.php?action=account_asset");    
            }else{
                echo '<div class="alert alert-warning">Error al ingresar </div>';
            }
        }
    }

}

?>
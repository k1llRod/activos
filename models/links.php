<?php
class linksModels{
	public function linkModel($links){
		if($links == 'login'||
			$links == 'new_account_asset'||	
			$links == 'account_asset'||
			$links == 'new_employee'||
			$links == 'employee'||
			$links == 'assignment'){
			$module = 'views/modules/'.$links.'.php';
		}else if($links == 'index'){
			$module = 'views/modules/login.php';
		}else{
			$module = 'views/modules/login.php';
		}
		return $module;
	}
}
 ?>
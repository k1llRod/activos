<?php
class linksModels{
	public static function linkModel($links){
		if($links == 'login'||
			$links == 'new_account_asset'||	
			$links == 'account_asset'||
			$links == 'new_employee'||
			$links == 'employee'||
			$links == 'edit_account_asset'||
			$links == 'account_assignment'||
			$links == 'config'||
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
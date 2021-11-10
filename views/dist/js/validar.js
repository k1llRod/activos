function validar_ingreso(){
	var expresion = /^[a-zA-Z0-9]*$/;
	if(!expresion.test($('#usuario').val())){
		return false;

	}
	if(!expresion.test($('#pass').val())){
		return false;
	}
	return true;
}
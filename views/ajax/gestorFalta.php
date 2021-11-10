<?php 
require_once '../../modelo/falta.php';
require_once '../../controlador/falta.php';

class Ajax{
	

	public $articuloFalta;
	
	public function llenarSelectAjax(){
		$datos = $this-> articuloFalta;
		$respuesta = faltaControlador::llenarSelectControlador($datos);
		echo $respuesta;
	}

}

if(isset($_POST['falta'])){
	$a = new Ajax();
	$a -> articuloFalta = $_POST['falta'];
	$a -> llenarSelectAjax();
}

 ?>
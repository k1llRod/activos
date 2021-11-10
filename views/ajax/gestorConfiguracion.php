<?php

require_once '../../modelo/configuracion.php';
require_once '../../controlador/configuracion.php';

class Ajax{

	public $descripcionActa;

	public function llenarActaAjax(){
		$datos = $this-> descripcionActa;
		$respuesta = configuracionControlador::descripcion_acta($datos);
		echo $respuesta;
	}

	public $idAutoInicial;
	public function llenarAutoInicialAjax(){
		$datos = $this -> idAutoInicial;
		$respuesta = configuracionControlador::descripcionAutoInicial($datos);
		echo $respuesta;

	}

	public $idResolucion;
	public function llenarResolucionAjax(){
		$datos = $this -> idResolucion;
		$respuesta = configuracionControlador::descripcionResolucion($datos);
		echo $respuesta;
	}


}

if(isset($_POST['acta'])){
	$a = new Ajax();
	$a -> descripcionActa = $_POST['acta'];
	$a -> llenarActaAjax();
}

if(isset($_POST['auto'])){
	$b = new Ajax();
	$b -> idAutoInicial = $_POST['auto'];
	$b -> llenarAutoInicialAjax();
}	
if(isset($_POST['resolucion'])){
	$c = new Ajax();
	$c -> idResolucion = $_POST['resolucion'];
	$c -> llenarResolucionAjax();
}


?>
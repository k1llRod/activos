<?php

require_once '../../controlador/sancion.php';
require_once '../../modelo/sancion.php';


class Ajax{

	// SUBIR ARCHIVO 

	public $archivoTemporal;
	public $nombreTemporal;

	public $listaActa;
	public $idCadete;
	public $ciCadete;
	public $idUsuario;
	public $ciUsuario;
	public $idSancion;


	public function gestorArchivosAjax(){

		$datos = array('archivoTemporal'=>$this->archivoTemporal,
						'nombreTemporal'=>$this->nombreTemporal,
						'listaActa'=>$this->listaActa,
						'idCadete'=>$this->idCadete,
						'ciCadete'=>$this->ciCadete,
						'idUsuario'=>$this->idUsuario,
						'ciUsuario'=>$this->ciUsuario,
						'idSancion' =>$this->idSancion);
		

		$respuesta = sancionControlador::agregarArchivo($datos);
		echo $respuesta;
	}

}

if(isset($_FILES['archivo']['tmp_name']) ){
		$a = new Ajax();
		$a -> archivoTemporal = $_FILES['archivo']['tmp_name'];
		$a -> nombreTemporal = $_FILES['archivo']['name'];
		$a -> listaActa = $_POST['listaActa'];
		$a -> idCadete = $_POST['idCadete'];
		$a -> ciCadete = $_POST['ciCadete'];
		$a -> idUsuario = $_POST['idUsuario'];
		$a -> ciUsuario = $_POST['ciUsuario'];
		$a -> idSancion = $_POST['idSancion'];
		$a -> gestorArchivosAjax();
	} 



 ?>


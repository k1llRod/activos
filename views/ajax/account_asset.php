<?php

require_once '../../models/configuration.php';
require_once '../../controllers/configuration.php';
require_once '../../models/account_asset.php';
require_once '../../controllers/account_asset.php';

class Ajax{
    public $search;
	public $id_asset;
	public $codigo;
	public $descripcion;
	public $serie;
	public $estado;
	public $unidad_medida;
	public $fecha_registro;
	public $codigo_registro;

	public function search_asset(){
		$data = $this->search;
		$respuesta = accountAssetController::list_account_asset($data);
		echo $respuesta;
	}
	public function edit_account_assets(){
		$id_asset = $this-> id_asset;
		$codigo = $this->codigo;
		$descripcion = $this->descripcion;
		$serie = $this->serie;
		$estado = $this->estado;
		$unidad_medida = $this->unidad_medida;
		$fecha_registro = $this->fecha_registro;
		$codigo_registro = $this->codigo_registro;
		$data = array('id_asset'=>$id_asset,
					'codigo'=>$codigo,
					'descripcion'=>$descripcion,
					'serie'=>$serie,
					'estado'=>$estado,
					'unidad_medida'=>$unidad_medida,
					'fecha_registro'=>$fecha_registro,
					'codigo_registro'=>$codigo_registro);
		$edit_account_asset = accountAssetController::edit_account_asset($data);
		echo $edit_account_asset;
	}
	public function ajaxAssetState(){
		$assetState = configurationController::view_state();
		return $assetState;
	}
	public function ajaxAssetUnit(){
		$assetState = configurationController::view_unit();
		return $assetState;
	}

	public function view_account_asset(){
		$id_asset = $this-> id_asset;
		$view_account_asset = accountAssetController::view_account_asset($id_asset);
		echo $view_account_asset;
	}
	public function ajaxUpdatedAccountAsset(){
		$id_asset = $this -> id_asset;
		$codigo = $this->codigo;
		$descripcion = $this->descripcion;
		$serie = $this->serie;
		$estado = $this->estado;
		$unidad_medida = $this->unidad_medida;
		$observaciones = $this->observaciones;
		$fecha_registro = $this->fecha_registro;
		$codigo_registro = $this->codigo_registro;
		$data = array('id_asset'=>$id_asset,
					'codigo' => $codigo,
					'descripcion' => $descripcion,
					'serie' => $serie,
					'estado'=>$estado,
					'unidad_medida'=>$unidad_medida,
					'observaciones'=>$observaciones,
					'fecha_registro'=>$fecha_registro,
					'codigo_registro'=>$codigo_registro);
		$answer = accountAssetController::updated_account_asset($data);
		echo $answer;
	}

	
		
}
if(isset($_POST['option'])){
	$a = new Ajax();
	$a -> search = $_POST['option'];
	$a -> search_asset();
}

if(isset($_POST['id_asset'])){
	$b = new Ajax();
	$b -> id_asset = $_POST['id_asset'];
	$b -> view_account_asset();
}
if(isset($_POST['state'])){
	$c = new Ajax();
	$c -> ajaxAssetState();
}
if(isset($_POST['unidad'])){
	$d = new Ajax();
	$d -> ajaxAssetUnit();
}
if(isset($_POST['id_activo'])){
	$e = new Ajax();
	$e -> id_asset = $_POST['id_activo'];
	$e -> codigo = $_POST['codigo'];
	$e -> descripcion = $_POST['descripcion'];
	$e -> serie = $_POST['serie'];
	$e -> estado = $_POST['estado'];
	$e -> unidad_medida = $_POST['unidad_medida'];
	$e -> observaciones = $_POST['observaciones'];
	$e -> ajaxUpdatedAccountAsset();
}


?>
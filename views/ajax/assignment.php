<?php

require_once '../../models/assignment.php';
require_once '../../controllers/assignment.php';

class Ajax{
    public $id_employee;
	public $id_general;
	public $id_especifica;
	public $id_area;
	public $id_asignacion;
	public $idAsignarActivo;
	public $codeActa;
	public $datepicker;
	

	public function llenarSelectGeneralAjax(){
		$data = $this->id_employee;
		$respuesta = assignmentController::select_location_general($data);
		echo $respuesta;
	}
	
	public function llenarSelectEspecificaAjax(){
		$data = $this->id_employee;
		$respuesta = assignmentController::select_location_especifica($data);
		echo $respuesta;
	}

	public function llenarSelectAreaAjax(){
		$data = $this-> id_employee;
		$data1 = $this-> id_especifica;
		$respuesta = assignmentController::select_location_area($data,$data1);
		echo $respuesta;
	}

	public function llenarTableAsignacionAjax(){
		$data = $this-> id_employee;
		$data1 = $this-> id_area;
		$respuesta = assignmentController::table_asignaciones($data,$data1);
		echo $respuesta;
	}
	public function create_actaAjax(){
		$data= array('idAsignarActivo'=>$this-> idAsignarActivo,
					'codeActa'=>$this-> codeActa,
					'datepicker'=>$this-> datepicker,
					'id_employee'=>$this ->id_employee);
		$respuesta = assignmentController::create_acta($data);
		echo $respuesta;
	}
	
		
}
if(isset($_POST['id_employee'])){
	$a = new Ajax();
	$a -> id_employee = $_POST['id_employee'];
	$a -> llenarSelectGeneralAjax();
}

if(isset($_POST['id_general'])&& isset($_POST['id_emp'])){
	$b = new Ajax();
	$b -> id_employee = $_POST['id_emp'];
	$b -> llenarSelectEspecificaAjax();
}

if(isset($_POST['id_em']) && isset($_POST['id_especifica'])){
	$c = new Ajax();
	$c -> id_employee = $_POST['id_em'];
	$c -> id_especifica = $_POST['id_especifica'];
	$c -> llenarSelectAreaAjax();
}

if(isset($_POST['id_emp']) && isset($_POST['id_area'])){
	$d = new Ajax();
	$d -> id_employee = $_POST['id_emp'];
	$d -> id_area = $_POST['id_area'];
	$d -> llenarTableAsignacionAjax();
}
if(isset($_POST['idAsignarActivo'])){
	$e = new Ajax();
	$e -> idAsignarActivo = $_POST['idAsignarActivo'];
	$e -> codeActa = $_POST['codeActa'];
	$e -> datepicker = $_POST['datepicker'];
	$e -> id_employee = $_POST['id_employee'];
	$e -> create_actaAjax();
}

?>
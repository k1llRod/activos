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
	public $id_ciudad;
	public $user;
	

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
	public function get_location_especificaAjax(){
		$data = $this -> id_general;
		$respuesta = assignmentController::select_location_especifica_asset($data);
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
					'id_employee'=>$this ->id_employee,
					'user' =>$this -> user);
		$respuesta = assignmentController::create_acta($data);
		echo $respuesta;
	}
	
	#Llenar campos para asignacion de activos fijos
	public function get_ubicacion_general(){
		$data = $this -> id_ciudad;
		$respuesta = assignmentController::select_ubicacion_general($data);
	}

	public function get_ubicacion_area(){
		$data = $this -> id_especifica;
		$respuesta = assignmentController::select_ubicacion_area($data);
	}

	public function get_funcionario(){
		$data = $this -> id_area;
		$respuesta = assignmentController::select_employee($data);
	}
	public function create_assignment_assetAjax(){
		$data= array('idAsignarActivo'=>$this-> idAsignarActivo,
					'id_employee'=>$this ->id_employee,
					'codeActa'=>$this-> codeActa,
					'datepicker'=>$this-> datepicker,
					'user' =>$this -> user,
					'id_asig' => $this ->id_asignacion);
		$respuesta = assignmentController::create_assignment_asset($data);
	}
	public function id_asigAjax(){
		$data= array('id_employee'=>$this ->id_employee,
					'id_area'=>$this-> id_area);
		$respuesta = assignmentController::id_asig($data);
		//echo $respuesta = 1;
	}
	public function employeeActaAjax(){
		$data= $this ->id_employee;
		$respuesta = assignmentController::employeeActa($data);
	}
	public function employeeActa2Ajax(){
		$data= $this ->id_employee;
		$respuesta = assignmentController::employeeActas($data);
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

if(isset($_POST['id_emple']) && isset($_POST['id_areas'])){
	$d = new Ajax();
	$d -> id_employee = $_POST['id_emple'];
	$d -> id_area = $_POST['id_areas'];
	$d -> llenarTableAsignacionAjax();
}
if(isset($_POST['idAsignarActivo'])){
	$e = new Ajax();
	$e -> idAsignarActivo = $_POST['idAsignarActivo'];
	$e -> codeActa = $_POST['codeActa'];
	$e -> datepicker = $_POST['datepicker'];
	$e -> id_employee = $_POST['id_employee'];
	$e -> user = $_POST['user'];
	$e -> create_actaAjax();
}
if(isset($_POST['id_ciudad'])){
	$f = new Ajax();
	$f -> id_ciudad = $_POST['id_ciudad'];
	$f -> get_ubicacion_general();
}

if(isset($_POST['id_gral'])){
	$g = new Ajax();
	$g -> id_general = $_POST['id_gral'];
	$g -> get_location_especificaAjax();
}

if(isset($_POST['id_especifica'])){
	$h = new Ajax();
	$h -> id_especifica = $_POST['id_especifica'];
	$h -> get_ubicacion_area();
}

if(isset($_POST['id_area'])){
	$i = new Ajax();
	$i -> id_area = $_POST['id_area'];
	$i -> get_funcionario();
}

if(isset($_POST['create_assignment'])){
	$j = new Ajax();
	$j -> idAsignarActivo = $_POST['id_activos'];
	$j -> codeActa = $_POST['codigo_acta'];
	$j -> datepicker = $_POST['date_assignment'];
	$j -> id_employee = $_POST['funcionario'];
	$j -> user = $_POST['user'];
	$j -> id_asignacion = $_POST['id_asig'];
	$j -> create_assignment_assetAjax(); 
}

if(isset($_POST['employee'])){
	$k = new Ajax();
	$k -> id_employee = $_POST['employee'];
	$k -> employeeActa2Ajax();
}

if(isset($_POST['employee_acta'])){
	$l = new Ajax();
	$l -> id_employee = $_POST['employee_acta'];
	$l -> employeeActaAjax();
}




?>
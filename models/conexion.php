<?php
class conexion{
	public static function conectar(){
		$link = new PDO('mysql:host=localhost;dbname=activos2021','root','');
		return $link;
	}
} 
 ?>
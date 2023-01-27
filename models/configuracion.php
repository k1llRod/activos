<?php
require_once 'conexion.php';

class configuracionModelo{

	public function nuevo_acta($datoControlador){
		$consulta = conexion::conectar()->prepare("INSERT INTO `acta_formatos`(`titulo`, `descripcion`) 
													VALUES (:titulo_actas,:descripcion_acta)");

	    $consulta->bindParam(':titulo_actas',$datoControlador['titulo_actas'], PDO::PARAM_STR);
	    $consulta->bindParam(':descripcion_acta',$datoControlador['descripcion_acta'], PDO::PARAM_STR);
	    
	    if($consulta->execute()){
	    	return 'ok';
	    }else{
	    	return 'error';
	    }
	  
	    $consulta->close;
	}

	public function nuevo_auto($datoControlador){
		$consulta = conexion::conectar()->prepare("INSERT INTO `auto_inicial`(`titulo`, `contenido`) 
													VALUES (:titulo_auto,:descripcion_auto)");

	    $consulta->bindParam(':titulo_auto',$datoControlador['titulo_auto'], PDO::PARAM_STR);
	    $consulta->bindParam(':descripcion_auto',$datoControlador['descripcion_auto'], PDO::PARAM_STR);
	    
	    if($consulta->execute()){
	    	return 'ok';
	    }else{
	    	return 'error';
	    }
	    
	    $consulta->close;
	}


	public function descripcion_acta($datos){
		$consulta = conexion::conectar()->prepare("SELECT * FROM `acta_formatos` WHERE id_acta_formatos=:id_acta");
		$consulta->bindParam(':id_acta',$datos, PDO::PARAM_INT);

		$consulta->execute();
		return $consulta->fetchAll();
		$consulta->close;
	}

	public function ver_tablas_actas(){
		$consulta = conexion::conectar()->prepare('SELECT * FROM acta_formatos');
		$consulta->execute();
	    return $consulta->fetchAll();
	    $consulta->close;
	}


	public function lista_auto_inicial(){
		$consulta = conexion::conectar()->prepare('SELECT * FROM `auto_inicial` WHERE 1');
		$consulta->execute();
	    return $consulta->fetchAll();
	    $consulta->close;
	}


		public function descripcion_inicial($datos){
		$consulta = conexion::conectar()->prepare("SELECT * FROM `auto_inicial` WHERE id_auto_inicial=:id_auto");
		$consulta->bindParam(':id_auto',$datos, PDO::PARAM_INT);

		$consulta->execute();
		return $consulta->fetchAll();
		$consulta->close;
	}

		public function lista_resolucion(){
			$consulta = conexion::conectar()->prepare("SELECT * FROM `resolucion` WHERE 1");
			$consulta->bindParam(':id_auto',$datos, PDO::PARAM_INT);

			$consulta->execute();
			return $consulta->fetchAll();
			$consulta->close;
		}

		public function nuevo_resolutivo($datoControlador){
			$consulta = conexion::conectar()->prepare("INSERT INTO `resolucion`(`titulo`, `contenido`) 
														VALUES (:titulo_resolutivo,:descripcion_resolutivo)");

		    $consulta->bindParam(':titulo_resolutivo',$datoControlador['titulo_resolutivo'], PDO::PARAM_STR);
		    $consulta->bindParam(':descripcion_resolutivo',$datoControlador['descripcion_resolutivo'], PDO::PARAM_STR);
		    
		    if($consulta->execute()){
		    	return 'ok';
		    }else{
		    	return 'error';
		    }
		    
		    $consulta->close;
		}


		public function descripcionResolucion($datos){
			$consulta = conexion::conectar()->prepare("SELECT * FROM `resolucion` WHERE id_resolucion=:id_resolucion");
			$consulta->bindParam(':id_resolucion',$datos, PDO::PARAM_INT);

			$consulta->execute();
			return $consulta->fetchAll();
			$consulta->close;
		}

		public function nuevaFalta($datoControlador){
			$consulta = conexion::conectar()->prepare("INSERT INTO `falta`(`titulo_falta`, `descripcion`, `cantidad_sancion`) 
														VALUES (:titulo_articulo,:descripcion_articulo,0)");

			$consulta->bindParam(':titulo_articulo',$datoControlador['titulo_articulo'], PDO::PARAM_STR);
		    $consulta->bindParam(':descripcion_articulo',$datoControlador['descripcion_articulo'], PDO::PARAM_STR);
		    
		    
		    if($consulta->execute()){
		    	return 'ok';
		    }else{
		    	return 'error';
		    }
		    
		    $consulta->close;
		}

		public function nuevoInciso($datoControlador){
			$consulta = conexion::conectar()->prepare("INSERT INTO `articulo_falta`(`titulo_articulo`, `descripcion`, `periodo_castigo`, `id_falta`) 
														VALUES (:titulo_inciso,:descripcion_inciso,0,:tipo_falta)");

			$consulta->bindParam(':tipo_falta',$datoControlador['tipo_falta'], PDO::PARAM_INT);
			$consulta->bindParam(':titulo_inciso',$datoControlador['titulo_inciso'], PDO::PARAM_STR);
		    $consulta->bindParam(':descripcion_inciso',$datoControlador['descripcion_inciso'], PDO::PARAM_STR);
		    
		    
		    if($consulta->execute()){
		    	return 'ok';
		    }else{
		    	return 'error';
		    }
		    
		    $consulta->close;
		}


		public function borrarActa($varControlador){
			$consulta = conexion::conectar()->prepare("DELETE FROM `acta_formatos` WHERE id_acta_formatos=:id_acta_formatos");

			$consulta->bindParam(':id_acta_formatos',$varControlador, PDO::PARAM_INT);
			
		    if($consulta->execute()){
		    	return 'ok';
		    }else{
		    	return 'error';
		    }
		    $consulta->close;
		}

		public function ver_lista_auto_inicial(){
			$consulta = conexion::conectar()->prepare("SELECT * FROM `auto_inicial` WHERE 1");
			//$consulta->bindParam(':id_resolucion',$datos, PDO::PARAM_INT);

			$consulta->execute();
			return $consulta->fetchAll();
			$consulta->close;
		}

		public function borrar_auto_inicial($varControlador){
			$consulta = conexion::conectar()->prepare("DELETE FROM `auto_inicial` WHERE id_auto_inicial=:id_auto_inicial");

			$consulta->bindParam(':id_auto_inicial',$varControlador, PDO::PARAM_INT);
			
		    if($consulta->execute()){
		    	return 'ok';
		    }else{
		    	return 'error';
		    }
		    $consulta->close;
		}

		public function ver_lista_resolucion(){
			$consulta = conexion::conectar()->prepare("SELECT * FROM `resolucion` WHERE 1");
			//$consulta->bindParam(':id_resolucion',$datos, PDO::PARAM_INT);

			$consulta->execute();
			return $consulta->fetchAll();
			$consulta->close;
		}

		public function borrar_resolucion($varControlador){
			$consulta = conexion::conectar()->prepare("DELETE FROM `resolucion` WHERE id_resolucion=:id_resolucion");

			$consulta->bindParam(':id_resolucion',$varControlador, PDO::PARAM_INT);
			
		    if($consulta->execute()){
		    	return 'ok';
		    }else{
		    	return 'error';
		    }
		    $consulta->close;
		}
}

 ?>
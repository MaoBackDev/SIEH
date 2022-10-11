<?php

require_once "Connection.php";

class ModeloTripulante{
	static public function mdlMostrarDatos($tabla,$item,$valor){

		if($item != null){

			$stm = Connection::getConnection()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stm->bindParam($item, $valor, PDO::PARAM_STR);
			$stm->execute();
			return $stm->fetch();

		}else{
			$stm = Connection::getConnection()->prepare("SELECT * FROM $tabla");
			$stm->execute();
	 		return $stm->fetchAll();
		}
		

	}

	// Ingresar usuarios
	static public function mdlCrearTripulante($tabla,$datos){

		$stm = Connection::getConnection()->prepare("INSERT INTO $tabla (documento, codigo_militar, apellidos, nombres, correo, clave, fecha_nacimiento,fecha_promocion, certificado_medico, rol, id_categoria, id_grado, foto) 
		VALUES(:documento, :codigo_militar, :apellidos, :nombres, :correo, :clave, :fecha_nacimiento, :fecha_promocion, :certificado_medico, :rol, :id_categoria, :id_grado, :foto)");

		$stm->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stm->bindParam(":codigo_militar", $datos["codigo_militar"],PDO::PARAM_STR);
		$stm->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stm->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stm->bindParam(":correo", $datos["correo"],PDO::PARAM_STR);
		$stm->bindParam(":clave", $datos["clave"],PDO::PARAM_STR);
		$stm->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"],PDO::PARAM_STR);
		$stm->bindParam(":fecha_promocion", $datos["fecha_promocion"],PDO::PARAM_STR);
		$stm->bindParam(":certificado_medico", $datos["certificado_medico"],PDO::PARAM_STR);		
		$stm->bindParam(":rol", $datos["rol"],PDO::PARAM_STR);
		$stm->bindParam(":id_categoria", $datos["id_categoria"],PDO::PARAM_INT);
		$stm->bindParam(":id_grado", $datos["id_grado"],PDO::PARAM_INT);
		$stm->bindParam(":foto", $datos["foto"],PDO::PARAM_STR);

		if ($stm->execute()) {
			return "ok";
		}
	}


	/************************************************* EDITAR TRIPULANTES *******************************************/

	static public function mdlEditarTripulante($tabla,$datos){

		$stm = Connection::getConnection()->prepare("UPDATE $tabla SET codigo_militar = :codigo_militar, apellidos = :apellidos, nombres = :nombres, correo = :correo, clave = :clave, fecha_nacimiento = :fecha_nacimiento, fecha_promocion = :fecha_promocion, certificado_medico = :certificado_medico, rol = :rol, estado = :estado, id_categoria = :id_categoria, id_grado = :id_grado, foto = :foto WHERE documento = :documento");

		$stm->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stm->bindParam(":codigo_militar", $datos["codigo_militar"],PDO::PARAM_STR);
		$stm->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stm->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stm->bindParam(":correo", $datos["correo"],PDO::PARAM_STR);
		$stm->bindParam(":clave", $datos["clave"],PDO::PARAM_STR);
		$stm->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"],PDO::PARAM_STR);
		$stm->bindParam(":fecha_promocion", $datos["fecha_promocion"],PDO::PARAM_STR);
		$stm->bindParam(":certificado_medico", $datos["certificado_medico"],PDO::PARAM_STR);		
		$stm->bindParam(":rol", $datos["rol"],PDO::PARAM_STR);
		$stm->bindParam(":estado", $datos["estado"],PDO::PARAM_STR);
		$stm->bindParam(":id_categoria", $datos["id_categoria"],PDO::PARAM_STR);
		$stm->bindParam(":id_grado", $datos["id_grado"],PDO::PARAM_STR);
		$stm->bindParam(":foto", $datos["foto"],PDO::PARAM_STR);
		// $stm->bindParam(":idTripulante", $datos["idTripulante"],PDO::PARAM_STR);

		if ($stm->execute()) {
			return "ok";
		}
	}

	// ******************************************  ACTIVAR Y DESACTIVAR TRIPULANTES ***************************************************

	static public function mdlActivarTripulante($tabla,$item1,$valor1,$item2,$valor2){

		$stm = Connection::getConnection()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stm->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stm->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if ($stm->execute()) {
			return "ok";
		}
	}

	// ******************************************  CAMBIAR CORREO ***************************************************

	static public function mdlCambiarCorreo($datos){

		$stm = Connection::getConnection()->prepare("UPDATE tripulante SET correo = :correo WHERE idTripulante = :idTripulante");

		$stm->bindParam(":correo", $datos["correo"],PDO::PARAM_STR);
		$stm->bindParam(":idTripulante", $datos["idTripulante"],PDO::PARAM_STR);

		if ($stm->execute()) {
			return "ok";
		}
	}


	// ******************************************  CAMBIAR CERTIFICADO MÉDICO ***************************************************

	static public function mdlCambiarCertificado($datos){

		$stm = Connection::getConnection()->prepare("UPDATE tripulante SET certificado_medico = :certificado_medico WHERE idTripulante = :idTripulante");

		$stm->bindParam(":certificado_medico", $datos["certificado_medico"],PDO::PARAM_STR);
		$stm->bindParam(":idTripulante", $datos["idTripulante"],PDO::PARAM_STR);

		if ($stm->execute()) {
			return "ok";
		}
	}

	// ******************************************  CAMBIAR FECHA DE PROMOCION ***************************************************

	static public function mdlCambiarPromocion($datos){

		$stm = Connection::getConnection()->prepare("UPDATE tripulante SET fecha_promocion = :fecha_promocion WHERE idTripulante = :idTripulante");

		$stm->bindParam(":fecha_promocion", $datos["fecha_promocion"],PDO::PARAM_STR);
		$stm->bindParam(":idTripulante", $datos["idTripulante"],PDO::PARAM_STR);

		if ($stm->execute()) {
			return "ok";
		}
	}
	
	/************************************************* CAMBIAR FOTO PERFIL *******************************************/
	static public function mdlCambiarFoto($datos){

		$stm = Connection::getConnection()->prepare("UPDATE tripulante SET foto = :foto WHERE idTripulante = :idTripulante");

		$stm->bindParam(":foto", $datos["foto"],PDO::PARAM_STR);
		$stm->bindParam(":idTripulante", $datos["idTripulante"],PDO::PARAM_STR);

		if ($stm->execute()) {
			return "ok";
		}
	}

	// ******************************************  CAMBIAR FECHA DE PROMOCION ***************************************************

	static public function mdlCambiarClave($datos){

		$stm = Connection::getConnection()->prepare("UPDATE tripulante SET clave = :clave WHERE idTripulante = :idTripulante");

		$stm->bindParam(":clave", $datos["clave"],PDO::PARAM_STR);
		$stm->bindParam(":idTripulante", $datos["idTripulante"],PDO::PARAM_STR);

		if ($stm->execute()) {
			return "ok";
		}
	}

}



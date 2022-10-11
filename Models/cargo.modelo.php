<?php

require_once "Connection.php";

class ModeloCargo
{

	// ************************************ MOSTRAR CARGOS VUELO *********************************************

	static public function mdlMostrarDatos($tabla, $item, $valor)
	{

		if ($item != null) {

			$stm = Connection::getConnection()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stm->bindParam($item, $valor, PDO::PARAM_STR);
			$stm->execute();
			return $stm->fetch();
		} else {
			$stm = Connection::getConnection()->prepare("SELECT * FROM $tabla");
			$stm->execute();
			return $stm->fetchAll();
		}
	}


	// ************************************ CREAR CARGOS DE VUELO *********************************************

	static public function mdlCrearCargo($tabla, $datos)
	{

		$stm = Connection::getConnection()->prepare("SELECT 'nombreCargo' FROM $tabla WHERE nombreCargo = ?");
		$stm->bindParam(1, $datos['nombreCargo']);
		$stm->execute();
		$result = $stm->fetch();

		$stm = Connection::getConnection()->prepare("SELECT 'abreCargo_vuelo' FROM $tabla WHERE abreCargo_vuelo = ?");
		$stm->bindParam(1, $datos['abreCargo_vuelo']);
		$stm->execute();
		$result2 = $stm->fetch();

		if ($result) {
			return  "error";
			die();
		} else if($result2){
			return  "errorCod";
			die();
		} else{

			$stm = Connection::getConnection()->prepare("INSERT INTO $tabla (nombreCargo, abreCargo_vuelo) VALUES(:nombreCargo, :abreCargo_vuelo)");

			$stm->bindParam(":nombreCargo", $datos["nombreCargo"], PDO::PARAM_STR);
			$stm->bindParam(":abreCargo_vuelo", $datos["abreCargo_vuelo"], PDO::PARAM_STR);

			if ($stm->execute()) {
				return "ok";
			}
		}
	}


	// ************************************ EDITAR CARGO VUELO *********************************************

	static public function mdlEditarCargo($tabla, $datos)
	{

		$stm = Connection::getConnection()->prepare("UPDATE $tabla  SET nombreCargo = :nombreCargo, abreCargo_vuelo = :abreCargo_vuelo WHERE idCargo = :idCargo");

		$stm->bindParam(":nombreCargo", $datos["nombreCargo"], PDO::PARAM_STR);
		$stm->bindParam(":abreCargo_vuelo", $datos["abreCargo_vuelo"], PDO::PARAM_STR);
		$stm->bindParam(":idCargo", $datos["idCargo"], PDO::PARAM_INT);

		if ($stm->execute()) {
			return "ok";
		}
	}
}

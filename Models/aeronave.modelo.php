<?php

require_once "Connection.php";

class ModeloAeronave
{

	// ************************************ MOSTRAR AERONAVES *********************************************

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


	// ************************************ CREAR AERONAVES *********************************************

	static public function mdlCrearAeronave($tabla, $datos)
	{

		$stm = Connection::getConnection()->prepare("SELECT 'matricula' FROM $tabla WHERE matricula = ?");
		$stm->bindParam(1, $datos['matricula']);
		$stm->execute();
		$result = $stm->fetch();

		if ($result) {
			return  "error";
			die();
		} else {

			$stm = Connection::getConnection()->prepare("INSERT INTO $tabla (matricula, tipoAeronave) VALUES(:matricula, :tipoAeronave)");

			$stm->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
			$stm->bindParam(":tipoAeronave", $datos["tipoAeronave"], PDO::PARAM_STR);

			if ($stm->execute()) {
				return "ok";
			}
		}
	}


	// ************************************ EDITAR AERONAVES *********************************************

	static public function mdlEditarAeronave($tabla, $datos)
	{

		$stm = Connection::getConnection()->prepare("UPDATE $tabla  SET matricula = :matricula, tipoAeronave = :tipoAeronave, estado = :estado WHERE idAeronave = :idAeronave");

		$stm->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
		$stm->bindParam(":tipoAeronave", $datos["tipoAeronave"], PDO::PARAM_STR);
		$stm->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stm->bindParam(":idAeronave", $datos["idAeronave"], PDO::PARAM_INT);

		if ($stm->execute()) {
			return "ok";
		}
	}
}

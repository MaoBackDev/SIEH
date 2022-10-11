<?php

require_once "Connection.php";

class ModeloMisiones
{

	// ************************************ MOSTRAR MISIONES *********************************************

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


	// ************************************ CREAR MISIONES *********************************************

	static public function mdlCrearMisiones($tabla, $datos)
	{

		$stm = Connection::getConnection()->prepare("SELECT 'tipo_mision' FROM $tabla WHERE tipo_mision = ?");
		$stm->bindParam(1, $datos['tipo_mision']);
		$stm->execute();
		$result = $stm->fetch();

		$stm = Connection::getConnection()->prepare("SELECT 'codigo' FROM $tabla WHERE codigo = ?");
		$stm->bindParam(1, $datos['codigo']);
		$stm->execute();
		$result2 = $stm->fetch();

		if ($result) {
			return  "error";
			die();
		} else if ($result2) {
			return  "errorCod";
			die();
		} else {

			$stm = Connection::getConnection()->prepare("INSERT INTO $tabla (tipo_mision, codigo) VALUES(:tipo_mision, :codigo)");

			$stm->bindParam(":tipo_mision", $datos["tipo_mision"], PDO::PARAM_STR);
			$stm->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);

			if ($stm->execute()) {
				return "ok";
			}
		}
	}


	// ************************************ EDITAR MISIONES *********************************************

	static public function mdlEditarMisiones($tabla, $datos)
	{

		$stm = Connection::getConnection()->prepare("UPDATE $tabla  SET tipo_mision = :tipo_mision, codigo = :codigo WHERE idMision = :idMision");

		$stm->bindParam(":tipo_mision", $datos["tipo_mision"], PDO::PARAM_STR);
		$stm->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stm->bindParam(":idMision", $datos["idMision"], PDO::PARAM_INT);

		if ($stm->execute()) {
			return "ok";
		}
	}
}

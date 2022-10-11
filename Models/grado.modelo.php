<?php

require_once "Connection.php";

class ModeloGrado
{
	// Listar Grados
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

	// static public function mdlListarGrados($tabla){

	// 	$stm = Connection::getConnection()->prepare("SELECT * FROM $tabla");
	// 	$stm->execute();
	// 	return $stm->fetchAll();

	// }


	// Insertar Grados
	static public function mdlCrearGrado($tabla, $datos)
	{

		$stm = Connection::getConnection()->prepare("SELECT 'nombreGrado' FROM $tabla WHERE nombreGrado = ?");
		$stm->bindParam(1, $datos['nombreGrado']);
		$stm->execute();
		$result = $stm->fetch();

		$stm = Connection::getConnection()->prepare("SELECT 'abreGrado' FROM $tabla WHERE abreGrado = ?");
		$stm->bindParam(1, $datos['abreGrado']);
		$stm->execute();
		$result2 = $stm->fetch();

		if ($result) {
			return  "error";
			die();
		} else if ($result2) {
			return  "errorCod";
			die();
		} else {

			$stm = Connection::getConnection()->prepare("INSERT INTO $tabla (nombreGrado,abreGrado) VALUES(:nombreGrado, :abreGrado)");

			$stm->bindParam(":nombreGrado", $datos["nombreGrado"], PDO::PARAM_STR);
			$stm->bindParam(":abreGrado", $datos["abreGrado"], PDO::PARAM_STR);

			if ($stm->execute()) {
				return "ok";
			}
		}
	}

	// ************************************ EDITAR GRADOS *********************************************

	static public function mdlEditarGrado($tabla, $datos)
	{

		$stm = Connection::getConnection()->prepare("UPDATE $tabla  SET nombreGrado = :nombreGrado, abreGrado = :abreGrado WHERE idGrado = :idGrado");

		$stm->bindParam(":nombreGrado", $datos["nombreGrado"], PDO::PARAM_STR);
		$stm->bindParam(":abreGrado", $datos["abreGrado"], PDO::PARAM_STR);
		$stm->bindParam(":idGrado", $datos["idGrado"], PDO::PARAM_INT);

		if ($stm->execute()) {
			return "ok";
		}
	}
}

<?php

require_once "Connection.php";

class ModeloCategoria
{

	// ************************************ MOSTRAR CATEGORÍAS *********************************************

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


	// ************************************ CREAR CATEGORÍAS *********************************************

	static public function mdlCrearCategoria($tabla, $datos)
	{

		$stm = Connection::getConnection()->prepare("SELECT 'nombreCategoria' FROM $tabla WHERE nombreCategoria = ?");
		$stm->bindParam(1, $datos['nombreCategoria']);
		$stm->execute();
		$result = $stm->fetch();

		$stm = Connection::getConnection()->prepare("SELECT 'abrCategoria' FROM $tabla WHERE abrCategoria = ?");
		$stm->bindParam(1, $datos['abrCategoria']);
		$stm->execute();
		$result2 = $stm->fetch();

		if ($result) {
			return  "error";
			die();
		} else if ($result2) {
			return  "errorCod";
			die();
		} else {
			
			$stm = Connection::getConnection()->prepare("INSERT INTO $tabla (nombreCategoria,abrCategoria) VALUES(:nombreCategoria, :abrCategoria)");

			$stm->bindParam(":nombreCategoria", $datos["nombreCategoria"], PDO::PARAM_STR);
			$stm->bindParam(":abrCategoria", $datos["abrCategoria"], PDO::PARAM_STR);

			if ($stm->execute()) {
				return "ok";
			}
		}
	}


	// ************************************ EDITAR CATEGORÍAS *********************************************

	static public function mdlEditarCategoria($tabla, $datos)
	{

		$stm = Connection::getConnection()->prepare("UPDATE $tabla  SET nombreCategoria = :nombreCategoria, abrCategoria = :abrCategoria WHERE idCategoria = :idCategoria");

		$stm->bindParam(":nombreCategoria", $datos["nombreCategoria"], PDO::PARAM_STR);
		$stm->bindParam(":abrCategoria", $datos["abrCategoria"], PDO::PARAM_STR);
		$stm->bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_INT);

		if ($stm->execute()) {
			return "ok";
		}
	}

	// ******************************************  ACTIVAR Y DESACTIVAR CATEGORÍAS *****************************************************

	static public function mdlActivarCategoria($tabla, $item1, $valor1, $item2, $valor2)
	{

		$stm = Connection::getConnection()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stm->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
		$stm->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

		if ($stm->execute()) {
			return "ok";
		}
	}
}

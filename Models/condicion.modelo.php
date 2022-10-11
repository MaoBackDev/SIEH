<?php

require_once "Connection.php";

class ModeloCondicion
{

	// ************************************ MOSTRAR CODICIONES VUELO *********************************************

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


	// ************************************ CREAR CONDICIONES *********************************************

	static public function mdlCrearCondicion($tabla, $datos)
	{

		$stm = Connection::getConnection()->prepare("SELECT 'nombreCondicion' FROM $tabla WHERE nombreCondicion = ?");
		$stm->bindParam(1, $datos['nombreCondicion']);
		$stm->execute();
		$result = $stm->fetch();

		$stm = Connection::getConnection()->prepare("SELECT 'abreCondicion_vuelo' FROM $tabla WHERE abreCondicion_vuelo = ?");
		$stm->bindParam(1, $datos['abreCondicion_vuelo']);
		$stm->execute();
		$result2 = $stm->fetch();

		if ($result) {
			return  "error";
			die();
		} else if ($result2) {
			return  "errorCod";
			die();
		} else {

			$stm = Connection::getConnection()->prepare("INSERT INTO $tabla (nombreCondicion, abreCondicion_vuelo) VALUES(:nombreCondicion, :abreCondicion_vuelo)");

			$stm->bindParam(":nombreCondicion", $datos["nombreCondicion"], PDO::PARAM_STR);
			$stm->bindParam(":abreCondicion_vuelo", $datos["abreCondicion_vuelo"], PDO::PARAM_STR);

			if ($stm->execute()) {
				return "ok";
			}
		}
	}


	// ************************************ EDITAR CONDICION *********************************************

	static public function mdlEditarCondicion($tabla, $datos)
	{

		$stm = Connection::getConnection()->prepare("UPDATE $tabla  SET nombreCondicion = :nombreCondicion, abreCondicion_vuelo = :abreCondicion_vuelo WHERE idCondicion = :idCondicion");

		$stm->bindParam(":nombreCondicion", $datos["nombreCondicion"], PDO::PARAM_STR);
		$stm->bindParam(":abreCondicion_vuelo", $datos["abreCondicion_vuelo"], PDO::PARAM_STR);
		$stm->bindParam(":idCondicion", $datos["idCondicion"], PDO::PARAM_INT);

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

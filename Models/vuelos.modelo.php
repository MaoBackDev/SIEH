<?php

require_once "Connection.php";

class ModeloVuelo
{

	// ************************************ MOSTRAR VUELOS PERSONALIZADOS*********************************************

	static public function mdlListarVuelos($tabla, $item, $valor)
	{

		$stm = Connection::getConnection()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		$stm->bindParam($item, $valor, PDO::PARAM_STR);
		$stm->execute();
		return $stm->fetchAll();
	}

	// ************************************ MOSTRAR VUELOS GENERALES*********************************************

	static public function mdlMostrarVuelos($tabla, $item, $valor)
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

	// ************************************ CREAR VUELOS*********************************************

	static public function mdlCrearVuelo($tabla, $datos)
	{
		$stm = Connection::getConnection()->prepare("SELECT 'ordenVuelo' FROM $tabla WHERE ordenVuelo = ? AND idTripulante = ?");
		$stm->bindParam(1, $datos['ordenVuelo']);
		$stm->bindParam(2, $datos['idTripulante']);
		$stm->execute();
		$result = $stm->fetch();

		if ($result) {
			return "error";
			die();
		} else {

			$stm = Connection::getConnection()->prepare("INSERT INTO $tabla (ordenVuelo, idAeronave, fechaVuelo, idMision, idCondicion, idTripulante, idCargo, hora_inicio, hora_final, cantidadHora, observaciones) VALUES(:ordenVuelo, :idAeronave, :fechaVuelo, :idMision, :idCondicion, :idTripulante, :idCargo, :hora_inicio, :hora_final, :cantidadHora, :observaciones)");

			$stm->bindParam(":ordenVuelo", $datos["ordenVuelo"], PDO::PARAM_STR);
			$stm->bindParam(":idAeronave", $datos["idAeronave"], PDO::PARAM_STR);
			$stm->bindParam(":fechaVuelo", $datos["fechaVuelo"], PDO::PARAM_STR);
			$stm->bindParam(":idMision", $datos["idMision"], PDO::PARAM_STR);
			$stm->bindParam(":idCondicion", $datos["idCondicion"], PDO::PARAM_STR);
			$stm->bindParam(":idTripulante", $datos["idTripulante"], PDO::PARAM_STR);
			$stm->bindParam(":idCargo", $datos["idCargo"], PDO::PARAM_STR);
			$stm->bindParam(":hora_inicio", $datos["hora_inicio"], PDO::PARAM_STR);
			$stm->bindParam(":hora_final", $datos["hora_final"], PDO::PARAM_STR);
			$stm->bindParam(":cantidadHora", $datos["cantidadHora"], PDO::PARAM_STR);
			$stm->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

			if ($stm->execute()) {
				return "ok";
			}
		}
	}


	// ************************************ EDITAR VUELOS *********************************************

	static public function mdlEditarVuelos($tabla, $datos)
	{

		$stm = Connection::getConnection()->prepare("UPDATE $tabla  SET idAeronave = :idAeronave, fechaVuelo = :fechaVuelo, idMision = :idMision, idCondicion = :idCondicion, idCargo = :idCargo, hora_inicio = :hora_inicio, hora_final = :hora_final, cantidadHora = :cantidadHora, observaciones = :observaciones WHERE ordenVuelo = :ordenVuelo AND idTripulante = :idTripulante");

		$stm->bindParam(":ordenVuelo", $datos["ordenVuelo"], PDO::PARAM_STR);
		$stm->bindParam(":idAeronave", $datos["idAeronave"], PDO::PARAM_INT);
		$stm->bindParam(":fechaVuelo", $datos["fechaVuelo"], PDO::PARAM_STR);
		$stm->bindParam(":idMision", $datos["idMision"], PDO::PARAM_INT);
		$stm->bindParam(":idCondicion", $datos["idCondicion"], PDO::PARAM_INT);
		$stm->bindParam(":idTripulante", $datos["idTripulante"], PDO::PARAM_INT);
		$stm->bindParam(":idCargo", $datos["idCargo"], PDO::PARAM_INT);
		$stm->bindParam(":hora_inicio", $datos["hora_inicio"], PDO::PARAM_STR);
		$stm->bindParam(":hora_final", $datos["hora_final"], PDO::PARAM_STR);
		$stm->bindParam(":cantidadHora", $datos["cantidadHora"], PDO::PARAM_STR);
		$stm->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);

		if ($stm->execute()) {
			return  'ok';
		}
	}

	// ************************************ FILTRAR VUELOS POR RANGO DE FECHAS ****************************************

	static public function mdlRangoFechas($tabla, $f_ini, $f_fin)
	{

		if ($f_ini = null) {
			$stm = Connection::getConnection()->prepare("SELECT * FROM $tabla ORDER BY idVuelo ASC");
			$stm->execute();
			return $stm->fetchAll();
		} else if ($f_ini == $f_fin) {
			$stm = Connection::getConnection()->prepare("SELECT * FROM $tabla WHERE fechaVuelo like '%f_fin%'");
			$stm->bindParam(":fechaVuelo", $f_fin, PDO::PARAM_STR);
			$stm->execute();
			return $stm->fetchAll();
		} else {
			$stm = Connection::getConnection()->prepare("SELECT * FROM $tabla WHERE fechaVuelo BETWEEN '$f_ini' AND '$f_fin'");
			$stm->execute();
			return $stm->fetchAll();
		}
	}


	// ************************************ SUMA TOTAL HORAS VUELO ****************************************

	static public function mdlSumaHoras($tabla)
	{

		$stm = Connection::getConnection()->prepare("SELECT SUM(cantidadHora) as total_horas FROM $tabla");
		$stm->execute();
		return $stm->fetch();
	}

	// ************************************ SUMA TOTAL HORAS VUELO  INDIVIDUAL****************************************

	static public function mdlSumaHorasIndividual($tabla, $item, $valor)
	{

		$stm = Connection::getConnection()->prepare("SELECT SUM(cantidadHora) AS horas FROM $tabla WHERE $item = $valor");
		$stm->execute();
		return $stm->fetch();
	}

	static public function mdlSumaHorasIndividualMes($tabla, $item, $valor)
	{

		$stm = Connection::getConnection()->prepare("SELECT sum(cantidadHora) AS horas_mes FROM $tabla WHERE $item = $valor And date(fechaVuelo)>=date(last_day(now()-INTERVAL 1 month) + INTERVAL 1 day) AND date(fechaVuelo)<=last_day(date(CURRENT_DATE));");
		$stm->execute();
		return $stm->fetch();
	}

	static public function mdlVueloMayor($tabla, $item, $valor)
	{

		$stm = Connection::getConnection()->prepare("SELECT max(cantidadHora) AS vuelo_mayor FROM $tabla WHERE $item = $valor");
		$stm->execute();
		return $stm->fetch();
	}
}


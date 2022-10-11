<?php
require_once "Connection.php";

class HomeModelo{

    static public function mdlGetHorasMesActual(){

        $stm = Connection::getConnection()->prepare("call prc_obtenerHorasMesActual");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }


    static public function mdlGetTripulantesMayorHoras(){

        $stm = Connection::getConnection()->prepare("SELECT CONCAT(apellidos,' ', nombres) AS tripulantes, sum(Round(cantidadHora)) As horas
        FROM vuelo
        INNER JOIN tripulante on vuelo.idTripulante = tripulante.idTripulante
        GROUP BY tripulantes 
        ORDER BY sum(Round(cantidadHora)) DESC
        LIMIT 5;");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }


    static public function mdlAeronavesDisponibles(){

        $stm = Connection::getConnection()->prepare("SELECT * FROM aeronaves WHERE estado = 'Disponible'");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    static public function getVuelos(){

        $stm = Connection::getConnection()->prepare("SELECT ordenVuelo, fechaVuelo, matricula, CONCAT(apellidos,' ',nombres) AS tripulante, tipo_mision, nombreCondicion, nombreCargo, hora_inicio, hora_final, cantidadHora, observaciones from vuelo v INNER JOIN aeronaves a ON v.idAeronave = a.idAeronave INNER JOIN tripulante t ON v.idTripulante = t.idTripulante INNER JOIN misiones m ON v.idMision = m.idMision INNER JOIN condicion_vuelo c ON v.idCondicion = c.idCondicion INNER JOIN cargo_vuelo cv ON v.idCargo = cv.idCargo;");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
         

}
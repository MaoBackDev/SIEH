<?php

require_once "Connection.php";
class ReporteModelo{

    static public function mdlReportesRangoFecha($f_ini, $f_fin){

        $stm = Connection::getConnection()->prepare("SELECT * FROM vuelo WHERE fechaVuelo BETWEEN '$f_ini' AND '$f_fin'");
        $stm->execute();
	 	return $stm->fetchAll();

    }

}
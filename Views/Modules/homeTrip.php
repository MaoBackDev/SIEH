<?php
        $item = 'idTripulante';
        $valor = $_SESSION['id'];
        $horas = ReporteController::ctrTotalHorasIndividual($item, $valor);
        $horasMes = ReporteController::ctrTotalHorasIndividualMes($item, $valor);
        $vuelo_mayor = ReporteController::ctrVueloMayor($item, $valor);
        $vuelos = ControllerVuelo::ctrListarVuelos($item, $valor);
        $totalVuelos = count($vuelos);
        
    ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-sm-8">
                    <h1 class="m-0"><?php echo $_SESSION['grado'] . '  ' . $_SESSION['nombres'] ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="homeTrip">SIEH</a></li>
                        <li class="breadcrumb-item active">Vuelos Tripulante</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
   
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $totalVuelos ?></h3>
                            <p>Vuelos Realizados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fighter-jet"></i>
                        </div>                      
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3><?php echo  number_format((float)$horas['horas'], 1, '.', '') ?></h3>
                            <p>Horas Globales</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo  number_format((float)$horasMes['horas_mes'], 1, '.', '') ?></h3>
                            <p>Horas del Mes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-calendar-alt"></i>
                        </div>  
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo  number_format((float)$vuelo_mayor['vuelo_mayor'], 1, '.', '') ?></h3>
                            <p>Vuelo Más Largo</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-sort-amount-up"></i>
                        </div>  
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <table class="table table-bordered table-striped display nowrap tableData td-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>No. Orden</th>
                                <th>Aeronave</th>
                                <th>Misión</th>
                                <th>Condición</th>
                                <th>Cargo</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Duración</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $item = "idTripulante";
                            $valor = $_SESSION['id'];

                            $vuelos = ControllerVuelo::ctrListarVuelos($item,$valor);

                            foreach ($vuelos as $key => $value) {

                                echo '<tr> 
                                <td>' . $value["fechaVuelo"] . '</td>
                                <td>' . $value["ordenVuelo"] . '</td>';

                                // AGREGAR MATRICULA AERONAVE
                                $item = 'idAeronave';
                                $valor = $value['idAeronave'];
                                $aeronave = ControllerAeronave::ctrListarAeronave($item, $valor);
                                echo '<td>' . $aeronave["matricula"] . '</td>';
                                      

                                // AGREGAR TIPO DE MISIÓN
                                $item = 'idMision';
                                $valor = $value['idMision'];
                                $mision = ControllerMisiones::ctrListarMisiones($item, $valor);
                                echo '<td>' . $mision["tipo_mision"] . '</td>';

                                // AGREGAR CONDICIÓN VUELO
                                $item = 'idCondicion';
                                $valor = $value['idCondicion'];
                                $condicion = ControllerCondicion::ctrListarCondicion($item, $valor);
                                echo '<td>' . $condicion["abreCondicion_vuelo"] . '</td>';

                                 // AGREGAR CARGO VUELO
                                 $item = 'idCargo';
                                 $valor = $value['idCargo'];
                                 $cargo = ControllerCargo::ctrListarCargo($item, $valor);
                                 echo '<td>' . $cargo["abreCargo_vuelo"] . '</td>';

                                echo '<td>' . $value["hora_inicio"] . '</td>
                                      <td>' . $value["hora_final"] . '</td>
                                      <td>' . $value["cantidadHora"] ."  "."Horas". '</td>
                                    </tr>';
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </section>

</div>
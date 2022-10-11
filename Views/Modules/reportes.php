<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-sm-6">
                    <h1 class="m-0">Reportes de Vuelo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">SIEH</a></li>
                        <li class="breadcrumb-item active">Reportes de Vuelo</li>
                    </ol>
                </div> 
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10">

                        <form method="POST">
                            <div class="form-group row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></i>inicio</span>
                                            </div>
                                            <input class="form-control input-lg" type="date" name="f_ini" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">fin</span>
                                            </div>
                                            <input class="form-control input-lg" type="date" name="f_fin" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group d-flex align-items-center justify-content-start">
                                        <button type="submit" class="btn btn-outline-success d-block mr-3">Buscar</button>
                                        <a href="reportes" class="btn btn-outline-warning">Limpiar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-2">
                        <form method="POST">
                            <input type="submit" name="AllRegisters" value="Todos los Registros" class="btn btn-outline-dark float-right">
                        </form>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-striped td-responsive display nowrap" id="tablaReporte" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>No. Orden</th>
                                    <th>Aeronave</th>
                                    <th>Tripulante</th>
                                    <th>Misión</th>
                                    <th>Condición</th>
                                    <th>Cargo</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora Fin</th>
                                    <th>Duración</th>
                                    <th>Observaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $reporte = ReporteController::ctrReportes(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>
    </div>
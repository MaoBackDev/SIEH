       <?php
        $item = null;
        $valor = null;
        $horas = ReporteController::ctrTotalHoras();
        $vuelos = ControllerVuelo::ctrMostrarVuelos($item, $valor);
        $tripulantes = ControladorTripulante::ctrListarUsuarios($item, $valor);
        $aeronaves = ControllerAeronave::ctrListarAeronave($item, $valor);
        $totalVuelos = count($vuelos);
        $totalTripulantes = count($tripulantes);
        $totalAeronaves = count($aeronaves);
        ?>



       <!-- Content Wrapper. Contains page content -->
       <div class="content-wrapper">
           <!-- Content Header (Page header) -->
           <div class="content-header">
               <div class="container-fluid">
                   <div class="row mb-2">
                       <div class="col-sm-6">
                           <h1 class="m-0">Panel de Control</h1>
                       </div>
                       <div class="col-sm-6">
                           <ol class="breadcrumb float-sm-right">
                               <li class="breadcrumb-item"><a href="home">SIEH</a></li>
                               <li class="breadcrumb-item active">Inicio</li>
                           </ol>
                       </div>
                   </div>
               </div>
           </div>

           <section class="content">
               <div class="container-fluid">
                   <!-- Small boxes (Stat box) -->
                   <div class="row">
                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box bg-info">
                               <div class="inner">
                                   <h4><?php echo number_format($totalVuelos) ?></h4>

                                   <p>Vuelos Realizados</p>
                               </div>
                               <div class="icon">
                                   <i class="fas fa-fighter-jet"></i>
                               </div>
                               <a href="vuelos" class="small-box-footer">Ver Más <i class="fas fa-arrow-circle-right"></i></a>
                           </div>
                       </div>
                       <!-- ./col -->
                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box bg-secondary">
                               <div class="inner">
                                   <h4><?php echo  number_format((float)$horas['total_horas'], 1, '.', '') ?></h4>
                                   <p>Total Horas</p>
                               </div>
                               <div class="icon">
                                   <i class="fas fa-clock"></i>
                               </div>
                               <a href="vuelos" class="small-box-footer">Ver Más <i class="fas fa-arrow-circle-right"></i></a>
                           </div>
                       </div>
                       <!-- ./col -->
                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box bg-warning">
                               <div class="inner">
                                   <h4 class="text-light"><?php echo number_format($totalTripulantes) ?></h4>
                                   <p class="text-light">Tripulantes</p>
                               </div>
                               <div class="icon">
                                   <i class="fas fa-user-astronaut"></i>
                               </div>
                               <a href="tripulantes" class="small-box-footer text-light">Ver Más <i class="fas fa-arrow-circle-right text-light"></i></a>
                           </div>
                       </div>
                       <!-- ./col -->
                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box bg-success">
                               <div class="inner">
                                   <h4><?php echo number_format($totalAeronaves) ?></h4>

                                   <p>Aeronaves</p>
                               </div>
                               <div class="icon">
                                   <i class="fas fa-helicopter"></i>
                               </div>
                               <a href="aeronaves" class="small-box-footer">Ver Más <i class="fas fa-arrow-circle-right"></i></a>
                           </div>
                       </div>
                       <!-- ./col -->
                   </div>
                   <!-- GRÁFICO -->
                   <div class="row">
                       <div class="col-12">
                           <div class="card card-dark">
                               <div class="card-header">
                                   <h3 id="card-title" class="card-title"></h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                       <button type="button" class="btn btn-tool" data-card-widget="remove">
                                           <i class="fas fa-times"></i>
                                       </button>
                                   </div>
                               </div>
                               <div class="card-body">
                                   <div class="chart">
                                       <canvas id="chart" style="min-height: 250px; height:400px; max-height:450px; width: 100%">

                                       </canvas>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                   <!-- GRÁFICO  VUELOS REALIZADOS POR CONDICIÓN-->
                   <div class="row mt-4">
                       <div class="col-sm-6">
                           <div class="card card-dark">
                               <div class="card-header">
                                   <h3 id="card-title" class="card-title">Vuelos Realizados Por Condición</h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                       <button type="button" class="btn btn-tool" data-card-widget="remove">
                                           <i class="fas fa-times"></i>
                                       </button>
                                   </div>
                               </div>
                               <div class="card-body">
                                   <div class="chart">
                                       <canvas id="chartCondicion" style="min-height: 250px; height:300px; max-height:350px; width: 100%">

                                       </canvas>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <div class="col-sm-6">
                           <div class="card card-dark">
                               <div class="card-header">
                                   <h3 id="card-title" class="card-title">Top 5 Mejores Tripulantes</h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                       <button type="button" class="btn btn-tool" data-card-widget="remove">
                                           <i class="fas fa-times"></i>
                                       </button>
                                   </div>
                               </div>
                               <div class="card-body">
                                   <div class="chart">
                                       <canvas id="trip" style="min-height: 250px; height:300px; max-height:350px; width: 100%">

                                       </canvas>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                   <!-- TRIPULANTES CON MÁS HORAS DE VUELO -->
                   <div class="row mt-4">

                       <div class="col-lg-10 m-auto">
                           <div class="card shadow">
                               <div class="card-header">
                                   <h3 class="card-title font-weight-bolder text-dark text-uppercase">Listado Aeronaves Disponibles</h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                       <button type="button" class="btn btn-tool" data-card-widget="remove">
                                           <i class="fas fa-times"></i>
                                       </button>
                                   </div>
                               </div>
                               <div class="card-body">
                                   <div class="table-responsive">
                                       <table class="table table-home" id="tbl-aeronaves-disponibles">
                                           <thead">
                                               <tr>
                                                   <th>Código</th>
                                                   <th>Matrícula</th>
                                                   <th>Tipo Aeronave</th>
                                                   </thead>
                                                   <tbody>

                                                   </tbody>
                                       </table>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
       </div>

       <?php

        $item = 'idTripulante';
        $valor = $_SESSION['id'];
        $trip = ControladorTripulante::ctrListarUsuarios($item, $valor);
        $certificado = $trip['certificado_medico'];
        $certificado = strtotime($certificado . "+ 1 year");
        $certificado = date('d-m-Y', $certificado);

        $certi = new DateTime();
        $certi2 = new DateTime($certificado);
        $diff = $certi2->diff($certi);
        $calc = $diff->days;


        if ($calc == 10 || $calc == 5 || $calc == 1) {
            echo
            "<script>
                swal.fire({
                    title: 'Advertencia!',
                    text: 'Tu permiso de vuelo vence en 9 días. Es importante que realices los exámenes médicos pertinentes. De lo contrario, tu cuenta será inhabilitada.',
                    icon: 'warning',
                    confirmButtonText: 'Ok',
                    closeOnConfirm: false
                })
            </script>";
        }
    ?>
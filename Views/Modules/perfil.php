<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>Perfíl</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="homeTrip">SIEH</a></li>
                        <li class="breadcrumb-item active">Perfíl de Usuario</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 m-auto">

                    <!-- Profile Image -->
                    <div class="card card-info card-outline shadow">
                        <div class="card-body box-profile">
                            <?php
                            $item = "idTripulante";
                            $valor = $_SESSION['id'];
                            $trip = ControladorTripulante::ctrListarUsuarios($item, $valor);

                            echo '<div class="text-center">';
                            if (empty($trip['foto'])) {
                                echo '<img class="visualizar profile-user-img img-fluid img-circle" src="Views/img/avatar-pilot.png">';
                            } else {
                                echo '<img class="visualizar profile-user-img img-fluid img-circle" src="' . $trip['foto'] . '">';
                            }
                            echo '</div>';

                            ?>

                            <h3 class="profile-username text-center font-weight-bold" style="font-size: 2rem;"><?php echo $_SESSION['grado'] ?></h3>
                            <p class="text-muted text-center" style="font-size: 1.5rem;"><?php echo $_SESSION['nombres'] ?></p>

                            <?php
                            $nacimiento = $trip['fecha_nacimiento'];
                            $nacimiento = ControladorTripulante::fechaEs($nacimiento);

                            $promocion = $trip['fecha_promocion'];
                            $promocion = ControladorTripulante::fechaEs($promocion);
                            

                            $certificado = $trip['certificado_medico'];
                            $certificado = strtotime($certificado . "+ 1 year");
                            $certificado = date('d-m-Y', $certificado);
                            $cer_ven = ControladorTripulante::fechaEsDia($certificado);


                            echo '<ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Fecha Nacimiento</b>
                                    <p class="float-right">' . $nacimiento . '</p>    
                                </li>
                                <li class="list-group-item">
                                    <b>Permiso de Vuelo</b>
                                    <p class="float-right">' . $cer_ven .'</p>
                                </li>
                                <li class="list-group-item">
                                    <b>último Ascenso</b>
                                    <p class="float-right">' . $promocion . ' <i class="fa fa-edit icon-perfil" data-toggle="modal" data-target="#promocion" title="Cambiar fecha Promoción"></i></p>
                                </li>
                                <li class="list-group-item">
                                    <b>Correo Electrónico</b>
                                    <p class="float-right">' . $trip['correo'] . ' <i class="fa fa-edit icon-perfil" data-toggle="modal" data-target="#correo" title="Cambiar Correo"></i></p>
                                </li>
                                <li class="list-group-item">
                                    <b>Contraseña</b>
                                    <p class="float-right">Actualizar Contraseña <i class="fa fa-edit icon-perfil" data-toggle="modal" data-target="#clave" title="Cambiar Contraseña"></i></p>
                                </li>
                                <li class="list-group-item">
                                    <b>Imagen</b>
                                    <p class="float-right">Cambiar Imagen <i class="far fa-image icon-perfil" data-toggle="modal" data-target="#image" title="Cambiar Imagen "></i></p>
                                </li>
                            </ul>';
                            ?>


                            <!-- MODAL CAMBIAR CORREO -->
                            <div class="modal fade" id="correo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal-body">
                                                <label for="">Nuevo Correo Electrónico</label>
                                                <br>
                                                <input class="form-control input-lg" type="email" name="correoPerfil" id="correoPerfil" placeholder="Nuevo Correo Electrónico" required>
                                                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">Cambiar</button>
                                            </div>
                                        </form>
                                        <?php $correo = ControladorTripulante::ctrCambiarCorreo() ?>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL CAMBIAR CERTIFICADO MÉDICO -->
                            

                            <!-- MODAL CAMBIAR FECHA PROMOCIÓN -->
                            <div class="modal fade" id="promocion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal-body">
                                                <label for="">Fecha Ascenso</label>
                                                <br>
                                                <input class="form-control input-lg" type="date" name="promocionPerfil" id="promocionPerfil" required>
                                                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">Cambiar</button>
                                            </div>
                                        </form>
                                        <?php $correo = ControladorTripulante::ctrCambiarPromocion() ?>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL CAMBIAR FOTO DE PERFIL -->
                            <div class="modal fade" id="image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <label for="">Elija una Nueva Foto</label>
                                                <br>
                                                <input class="form-control input-lg foto" type="file" name="fotoPerfil" required>
                                                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                                                <input type="hidden" name="fotoPerfilActual" value="<?php echo $_SESSION['foto'] ?>">
                                                <input type="hidden" name="documentoPerfil" value="<?php echo $_SESSION['documento'] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">Cambiar</button>
                                            </div>
                                        </form>
                                        <?php $foto = ControladorTripulante::ctrCambiarFoto() ?>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL CAMBIAR CONTRASEÑA -->
                            <div class="modal fade" id="clave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <label for="">Nueva Contraseña</label>
                                                <br>
                                                <input class="form-control input-lg foto" type="password" name="clavePerfil" required placeholder="Ingrese Nueva Contraseña">
                                                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                                                <input type="hidden" name="documento" value="<?php echo $_SESSION['documento'] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">Cambiar</button>
                                            </div>
                                        </form>
                                        <?php $clave = ControladorTripulante::ctrCambiarClave() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
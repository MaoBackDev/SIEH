       <!-- Navbar -->
       <nav class="main-header navbar navbar-expand navbar-white navbar-light d-flex align-items-center justify-content-between">
           <!-- Left navbar links -->
           <ul class="navbar-nav">
               <li class="nav-item">
                   <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
               </li>
           </ul>

           <!-- Right navbar links -->
           <ul class="navbar-nav w-50 d-flex align-items-center justify-content-end">
               <li class="nav-item dropdown w-75  d-flex align-items-center justify-content-end">
                   <a class="nav-link d-block" data-toggle="dropdown" href="#">
                       <?php
                        $item = "idTripulante";
                        $valor = $_SESSION['id'];
                        $trip = ControladorTripulante::ctrListarUsuarios($item, $valor);

                        echo '<div class="text-center">';
                        if (empty($trip['foto'])) {
                            echo '<img class="brand-image img-circle elevation-3" style="opacity: .8" width="25" src="Views/img/avatar-pilot.png">';
                        } else {
                            echo '<img class="brand-image img-circle elevation-3" style="opacity: .8" width="25" src="' . $trip['foto'] . '">';
                        }
                        echo '</div>';

                        ?>
                   </a>

                   <div class="dropdown-menu dropdown-menu-right">
                       <p class="dropdown-item mt-0 "><?php echo $_SESSION['grado'] . ' ' . $_SESSION['nombres']; ?></p>
                       <div class="dropdown-divider div-dropdown"></div>
                       <a class="dropdown-item div-dropdown" href="perfil">Editar Perfil</a>
                       <div class="dropdown-divider div-dropdown"></div>
                       <a class="dropdown-item div-dropdown" href="salir">Cerrar Sesión</a>
                   </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
           </ul>
       </nav>
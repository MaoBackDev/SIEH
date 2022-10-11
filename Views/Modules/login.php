<div class="login-box">
  <div class="login-logo">
    <h1 class="text-light font-weight-bolder">SIEH BAAV-4</h1>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card card-header bg-login d-flex align-items-center font-weight-bolder mb-3" style="font-size: larger;">
      <img src="Views/img/avatar-pilot.png" class="brand-image img-circle elevation-3" style="opacity: .8" width="50">
      Iniciar Sesión
    </div>
    <div class="card-body login-card-body">
      <form id="form-login" method="POST">
        <div class="form-group mb-4">
          <div class="input-group">
            <input id="input-document" type="text" class="form-control" name="ingUser" placeholder="Documento" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group mb-4">
            <input type="password" class="form-control" name="ingPass" placeholder="Contraseña" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-login btn-block">Ingresar</button>
          </div>
        </div>
        <?php
        $login = new ControladorTripulante();
        $login->ctrIngresoUsuario();
        ?>
      </form>
    </div>
  </div>
</div>
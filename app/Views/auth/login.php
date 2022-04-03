<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>/template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page bg-primary">
<div class="login-box ">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary shadow-sm">
    <div class="card-header text-center mt-2">
        <h2 class="text-center font-weight-bold text-dark">LOGIN</h2>
    </div>
    <div class="card-body">
      <form action="<?= base_url(); ?>/authcontroller/login_proses" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">  
            <div class="col-8"></div>        
          <!-- /.col -->
          <div class="col-4 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <p class="mb-0">
            <a href="<?= base_url(); ?>/regis" class="text-center">Need account?</a>
          </p>
        </div>
        <div class="col-md-6">
          <p class="mb-0 text-right">
            <a href="<?= base_url(); ?>/forgot-password" class="text-center">Forgot Password?</a>
          </p>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url(); ?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/template/dist/js/adminlte.min.js"></script>
<script src="<?= base_url(); ?>/template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
  <?php if(session()->getFlashdata('gagal')): ?>
      $(document).Toasts('create', {
        title: 'Gagal',
        class : 'bg-danger',
        autohide: true,
        delay: 2000,
        body: "<?= session()->getFlashdata('gagal'); ?>"
      })
    <?php endif ?>
    <?php if(session()->getFlashdata('success')): ?>
      $(document).Toasts('create', {
        title: 'Berhasil!',
        class : 'bg-success',
        autohide: true,
        delay: 2000,
        body: "<?= session()->getFlashdata('success'); ?>"
      })
    <?php endif ?>
</script>
</body>
</html>

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
        <h2 class="text-center font-weight-bold text-dark">SIMPEG</h2>
    </div>
    <div class="card-body">
      <form action="<?= base_url(); ?>/authcontroller/regis_proses" method="post">
      <?= csrf_field(); ?>
        <div class="input-group mb-3">
          <input value="<?= old('email'); ?>" type="email" class="form-control <?= ($valid->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" placeholder="Email">         
          <div class="invalid-feedback">
              <?= $valid->getError('email'); ?>
          </div> 
        </div>
        <div class="input-group mb-3">
          <input value="<?= old('nama'); ?>" type="text" class="form-control <?= ($valid->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" placeholder="Nama">        
          <div class="invalid-feedback">
              <?= $valid->getError('nama'); ?>
          </div>   
        </div>
        <div class="input-group mb-3">
          <input value="<?= old('username'); ?>" type="text" class="form-control <?= ($valid->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" placeholder="Username">    
          <div class="invalid-feedback">
              <?= $valid->getError('username'); ?>
          </div>      
        </div>
        <div class="input-group mb-3">
          <input value="<?= old('password'); ?>" type="password" class="form-control <?= ($valid->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" placeholder="Password">     
          <div class="invalid-feedback">
              <?= $valid->getError('password'); ?>
          </div>      
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="jabatan">
                <option value="1">Admin</option>
                <option value="2">Pimpinan</option>
                <option value="3">Pegawai</option>
            </select>         
        </div>
        <div class="row">  
            <div class="col-8"></div>        
          <!-- /.col -->
          <div class="col-4 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <hr>
      <p class="mb-0 text-center">
        <a href="<?= base_url(); ?>/" class="text-center">Have account?</a>
      </p>
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
</script>
</body>
</html>

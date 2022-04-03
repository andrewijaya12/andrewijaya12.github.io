<?php require_once 'head.php' ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url(); ?>/template/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->


    <?php require_once 'sidebar.php' ?>

    <?= $this->renderSection('content'); ?>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>&copy; <?= date('Y'); ?> Andre Wijaya</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <?= $this->renderSection('modals'); ?>
  </div>
  <!-- ./wrapper -->

  <?php require_once 'foot.php' ?>
  <?= $this->renderSection('js'); ?>
</body>

</html>
<?= $this->extend('layouts/index') ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid text-center" style="padding-top: 8rem !important;">
      <div>
        <img src="<?= base_url(); ?>/img/SEHAN.png" style="width: 10rem;" alt="">
        <h1 class="font-weight-bold">SIMPEG</h1>
        <h2 class="font-weight-bold">PT Hakim Sembilan Nusantara</h2>
        <h4 class="font-weight-bold">Jalan Darussalam No.82, Susunan Baru, Kecamatan Tanjung Barat, Kota Bandar Lampung</h4>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?= $this->endSection('content'); ?>
<?= $this->section('modals'); ?>
<?= $this->endSection('modals'); ?>
<?= $this->section('js'); ?>

<?= $this->endSection('js'); ?>
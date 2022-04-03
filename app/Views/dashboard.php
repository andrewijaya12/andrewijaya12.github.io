<?= $this->extend('layouts/index') ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Menu</a></li>
            <li class="breadcrumb-item active"><?= $breadcumb; ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h4 class="font-weight-bold">Pegawai</h4>
              <p class="font-weight-bold" style="font-size: 1.2rem;"><?= $pegawai; ?> Pegawai</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h4 class="font-weight-bold">Kontrak</h4>
              <p class="font-weight-bold" style="font-size: 1.2rem;"><?= $kontrak; ?> Kontrak</p>
            </div>
            <div class="icon">
              <i class="fas fa-tasks"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h4 class="font-weight-bold">Bonus (<?= date('d'); ?> <?= medium_bulan(date('m')); ?> <?= date('Y'); ?>)</h4>
              <p class="font-weight-bold" style="font-size: 1.2rem;">Rp. <?= (empty($bonus['bonus'])) ? '0' : number_format($bonus['bonus']); ?></p>
            </div>
            <div class="icon">
              <i class="fas fa-file-invoice-dollar"></i>
            </div>
          </div>
        </div>
      </div>
      <!-- Row -->

      <div class="card">
        <div class="card-header">
          <h4 class="mb-0 py-2 font-weight-bold">Data Pengeluaran Bulan Ini</h4>
        </div>
        <div class="card-body">
          <canvas id="chart"></canvas>
        </div>
      </div>

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
<script>
  $(function() {
    <?php if (session()->getFlashdata('success')) : ?>
      $(document).Toasts('create', {
        title: 'Berhasil',
        class: 'bg-success',
        autohide: true,
        delay: 2000,
        body: "<?= session()->getFlashdata('success'); ?>"
      })
    <?php endif ?>
  });
</script>
<script>
  const data = {
    labels: ['Senin', 'Selasa ', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
    datasets: [{
      label: "Pengeluaran Bulan <?= bulan(date('m')); ?>-<?= date('Y'); ?>",
      backgroundColor: '#524A4E',
      borderColor: '#000000',
      data: ["<?= $sen; ?>", "<?= $sel; ?>", "<?= $rab; ?>", "<?= $kam; ?>", "<?= $jum; ?>", "<?= $sab; ?>", "<?= $min; ?>"],
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };
  const myChart = new Chart(
    document.getElementById('chart'),
    config
  );
</script>
<?= $this->endSection('js'); ?>
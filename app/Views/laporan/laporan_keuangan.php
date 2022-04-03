<?= $this->extend('layouts/index') ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan Keuangan (<?= bulan(date('m')); ?>-<?= date('Y'); ?>)</h1>
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
      <form action="<?= base_url('LaporanController/search'); ?>" method="post" class="mb-3">
        <div class="row d-flex align-items-center">
          <div class="col-md-3">
            <input type="date" name="tgl_awal" required class="form-control">
          </div>
          <div class="text-center">
            s/d
          </div>
          <div class="col-md-3">
            <input type="date" name="tgl_akhir" required class="form-control">
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-success">Cetak</button>
          </div>
        </div>
      </form>
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered table-hover text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis Pengeluaran</th>
                <th>Keterangan</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              $total = 0;
              foreach ($pengeluaran as $p) : $total += $p['total']; ?>
                <tr>
                  <td class="align-middle"><?= $no++; ?></td>
                  <td class="align-middle"><?= date_indo($p['tanggal']); ?></td>
                  <td class="align-middle"><?= $p['jenis_pengeluaran']; ?></td>
                  <td class="align-middle"><?= $p['keterangan']; ?></td>
                  <td class="align-middle">Rp. <?= number_format($p['total']); ?></td>
                </tr>
              <?php endforeach ?>
              <?php $nom = $no;
              $ttl = 0;
              foreach ($gaji as $g) : $ttl += $g['gapok'] ?>
                <tr>
                  <td class="align-middle"><?= $nom++; ?></td>
                  <td class="align-middle"><?= date_indo($g['tanggal']); ?></td>
                  <td class="align-middle">Gaji</td>
                  <td class="align-middle"><?= $g['jumlah']; ?> Pegawai</td>
                  <td class="align-middle">Rp. <?= number_format($g['gapok']); ?></td>
                </tr>
              <?php endforeach ?>
              <tr class="font-weight-bold">
                <td class="align-middle" colspan="4">Total Keseluruhan</td>
                <td class="align-middle">Rp. <?= number_format($total + $ttl); ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?= $this->endSection('content'); ?>
<?= $this->section('modals'); ?>
<div class="modal fade" id="modalTambah">

  <?= $this->endSection('modals'); ?>
  <?= $this->section('js'); ?>
  <script>
    $(function() {
      $('#example3').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
      <?php if (session()->getFlashdata('gagal')) : ?>
        $(document).Toasts('create', {
          title: 'Gagal',
          class: 'bg-danger',
          autohide: true,
          delay: 2000,
          body: "<?= session()->getFlashdata('gagal'); ?>"
        })
      <?php endif ?>
    });
  </script>
  <?= $this->endSection('js'); ?>
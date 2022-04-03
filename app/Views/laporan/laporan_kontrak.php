<?= $this->extend('layouts/index') ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan Kontrak (<?= bulan(date('m')); ?>-<?= date('Y'); ?>)</h1>
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
      <form action="<?= base_url('LaporanController/search_kontrak'); ?>" method="post" class="mb-3">
        <div class="row d-flex align-items-center">
          <div class="col-md-1">
            <input type="hidden" name="bulan" value="<?= date('m'); ?>" class="form-control">
          </div>
          <div class="col-md-1">
            <input type="hidden" name="tahun" value="<?= date('Y'); ?>" class="form-control">
          </div>
          <div class="col-md-10 d-flex justify-content-end">
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
                <th class="align-middle">No</th>
                <th class="align-middle">Nama Kontrak</th>
                <th class="align-middle">Tanggal</th>
                <th class="align-middle">Nama Pegawai</th>
                <th class="align-middle">Nilai Kontrak</th>
              </tr>
            </thead>
            <tbody>
              <?php $total = 0;
              if (!empty($kontrak)) {
                $no = 1;
                foreach ($kontrak as $p) : $total += $p['nilai_kontrak']; ?>
                  <tr>
                    <td class="align-middle"><?= $no++; ?></td>
                    <td class="align-middle"><?= $p['nama_kontrak']; ?></td>
                    <td class="align-middle"><?= date_indo($p['tanggal']); ?></td>
                    <td class="align-middle"><?= $p['nama_pegawai']; ?></td>
                    <td class="align-middle">Rp. <?= number_format($p['nilai_kontrak']); ?></td>
                  </tr>
                <?php endforeach;
              } else { ?>
                <tr>
                  <td colspan="5">No data available</td>
                </tr>
              <?php } ?>
              <tr class="font-weight-bold">
                <td class="align-middle" colspan="4">Total Keseluruhan Nilai Kontrak</td>
                <td class="align-middle">Rp. <?= number_format($total); ?></td>
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
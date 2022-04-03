<?= $this->extend('layouts/index') ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Gaji</h1>
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
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover ">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Pegawai</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php $no = 1;
              foreach ($gaji as $p) : ?>
                <tr>
                  <td class="text-middle"><?= $no++; ?></td>
                  <td class="align-middle"><?= date_indo($p['tanggal']); ?></td>
                  <td class="align-middle"><?= $p['nama_pegawai']; ?></td>
                  <td class="align-middle">
                    <a href="<?= base_url(); ?>/detail-slip-gaji/<?= $p['id_gaji']; ?>" class="btn btn-sm btn-success">Cetak</a>
                  </td>
                </tr>
              <?php endforeach ?>
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

<?= $this->endSection('modals'); ?>
<?= $this->section('js'); ?>
<script>
  $(function() {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
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
<?= $this->endSection('js'); ?>
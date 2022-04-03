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
              <div class="card-header">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah">
                    <i class="fa-fa-plus">Tambah Data</i>
                </button>              
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Pegawai</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan Konsumsi</th>
                            <th>Bonus</th>
                            <th>Action</th>
                        </tr>
                    </thead>    
                    <tbody class="text-center">
                        <?php $no = 1; foreach($gaji as $p): ?>
                        <tr>
                            <td class="align-middle"><?= $no++; ?></td>
                            <td class="align-middle"><?= date_indo($p['tanggal']); ?></td>
                            <td class="align-middle"><?= $p['nama_pegawai']; ?></td>
                            <td class="align-middle">Rp. <?= number_format($p['gaji_pokok']); ?></td>
                            <td class="align-middle">Rp. <?= number_format($p['tj_konsumsi']); ?></td>
                            <td class="align-middle">Rp. <?= number_format($p['bonus']); ?></td>
                            <td class="align-middle">
                                <div class="d-flex inline-block justify-content-center">
                                    <a href="<?= base_url() ?>/edit-gaji/<?= $p['id_gaji']; ?>" class="btn btn-sm mr-1 btn-warning text-white">Edit</a>
                                   <form action="<?= base_url(); ?>/GajiController/delete/<?= $p['id_gaji']; ?>" method="post">
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda ingin menghapus data?')">Delete</button>
                                   </form> 
                                </div>
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
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Gaji</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('GajiController/save'); ?>" method="post">                                               
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input class="form-control" type="date" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <select name="nama_pegawai" class="form-control" <?= (empty($pegawai)) ? 'disabled' : ''; ?>>
                              <?php foreach($pegawai as $p): ?>
                                    <option value="<?= $p['id_pegawai']; ?>"><?= $p['nama_pegawai']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gaji</label>
                            <input class="form-control" name="gaji" placeholder="Nilai Gaji" required>
                        </div>                                            
                        <div class="form-group">
                            <label>Tunjangan Konsumsi</label>
                            <input class="form-control" name="tj_konsumsi" placeholder="Nilai Tunjangan Konsumsi" required>
                        </div>                                            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('modals'); ?>
<?= $this->section('js'); ?>
<script>
  $(function () {    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    <?php if(session()->getFlashdata('success')): ?>
      $(document).Toasts('create', {
        title: 'Berhasil',
        class : 'bg-success',
        autohide: true,
        delay: 2000,
        body: "<?= session()->getFlashdata('success'); ?>"
      })
    <?php endif ?>
    });
</script>
<?= $this->endSection('js'); ?>
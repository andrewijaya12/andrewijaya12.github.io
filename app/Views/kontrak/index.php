<?= $this->extend('layouts/index') ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Kontrak</h1>
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
                            <th class="align-middle">No</th>
                            <th class="align-middle">Nama Kontrak</th>
                            <th class="align-middle">Tanggal</th>
                            <th class="align-middle">Nama Pegawai</th>
                            <th class="align-middle">Nilai Konrak</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>     
                    <tbody class="text-center">
                        <?php $no = 1; foreach($kontrak as $p): ?>
                        <tr>
                            <td class="align-middle"><?= $no++; ?></td>
                            <td class="align-middle"><?= $p['nama_kontrak']; ?></td>
                            <td class="align-middle"><?= date_indo($p['tanggal']); ?></td>
                            <td class="align-middle"><?= $p['nama_pegawai']; ?></td>
                            <td class="align-middle">Rp. <?= number_format($p['nilai_kontrak']); ?></td>
                            <td class="align-middle">
                                <div class="d-flex inline-block justify-content-center">
                                    <a href="<?= base_url() ?>/edit-kontrak/<?= $p['id_kontrak']; ?>" class="btn btn-sm mr-1 btn-warning text-white">Edit</a>
                                   <form action="<?= base_url(); ?>/KontrakController/delete/<?= $p['id_kontrak']; ?>" method="post">
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kontrak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('KontrakController/save'); ?>" method="post">
                        <div class="form-group">
                            <label>Nama Kontrak</label>
                            <input class="form-control" name="nama_kontrak" placeholder="Nama Kontrak" required>
                        </div>                        
                        <div class="form-group">
                            <label>Tanggal Kontrak</label>
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
                            <label>Nilai Kontrak</label>
                            <input class="form-control" name="nilai_kontrak" placeholder="Nilai Konrak" required>
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
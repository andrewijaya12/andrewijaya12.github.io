<?= $this->extend('layouts/index') ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pegawai</h1>
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
              <div class="card-header <?= (session('level') == 1 ? '' : 'd-none'); ?>">
                <button type="button" class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalTambah">
                    <i class="fa-fa-plus">Tambah Data</i>
                </button>              
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover ">
                    <thead>
                        <tr>
                            <th class="align-middle">No</th>
                            <th class="align-middle">Nama Pegawai</th>
                            <th class="align-middle">Jabatan</th>
                            <th class="align-middle">Jenis Pegawai</th>
                            <th class="align-middle">Tanggal Lahir</th>
                            <th class="align-middle">Jenis Kelamin</th>
                            <th class="align-middle">Alamat</th>
                            <th class="align-middle">Telefon</th>
                            <th class="align-middle <?= (session('level') == 1 ? '' : 'd-none'); ?>">Action</th>
                        </tr>
                    </thead>     
                    <tbody class="text-center">
                        <?php $no = 1; foreach($pegawai as $p): ?>
                        <tr>
                            <td class="align-middle"><?= $no++; ?></td>
                            <td class="align-middle"><?= $p['nama_pegawai']; ?></td>
                            <td class="align-middle"><?= $p['jabatan']; ?></td>
                            <td class="align-middle"><?= $p['jenis_pegawai']; ?></td>
                            <td class="align-middle"><?= $p['tanggal_lahir']; ?></td>
                            <td class="align-middle"><?= $p['jenis_kelamin']; ?></td>
                            <td class="align-middle"><?= $p['alamat']; ?></td>
                            <td class="align-middle"><?= $p['telfon']; ?></td>
                            <td class="align-middle <?= (session('level') == 1 ? '' : 'd-none'); ?>">
                                <div class="d-flex inline-block">
                                    <a href="<?= base_url('/edit-pegawai/' . $p['id_pegawai']) ?>" class="btn btn-sm btn-warning text-white mr-1">Edit</a>
                                    <form action="<?= base_url(); ?>/pegawaicontroller/delete/<?= $p['id_pegawai']; ?>" method="post">
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('PegawaiController/save'); ?>" method="post">
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input class="form-control" name="nama_pegawai" placeholder="Nama Pegawai" required>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input class="form-control" name="jabatan" placeholder="Jabatan">
                        </div>
                        <div class="form-group">
                            <label>Jenis Pegawai</label>
                            <br>
                            <select class="form-control" name="jenis_pegawai">
                                <option value="Tetap">Tetap</option>
                                <option value="Freelance">Freelance</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <br>
                            <input type="radio" name="jenis_kelamin" value="Pria"> Pria
                            <input type="radio" name="jenis_kelamin" value="Wanita"> Wanita
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input class="form-control" name="alamat" placeholder="Alamat" required>
                        </div>
                        <div class="form-group">
                            <label>Telfon</label>
                            <input class="form-control" name="telfon" placeholder="Telfon" required>
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
      "searching": true,
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
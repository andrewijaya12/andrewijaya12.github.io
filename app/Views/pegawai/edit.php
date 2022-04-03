<?= $this->extend('layouts/index') ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
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
                <h5 class="font-weight-bold">Edit Data Pegawai</h5>            
            </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="<?= base_url('PegawaiController/update/' . $pegawai['id_pegawai']); ?>" method="post">
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input class="form-control" value="<?= $pegawai['nama_pegawai']; ?>" name="nama_pegawai" placeholder="Nama Pegawai" required>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input class="form-control" value="<?= $pegawai['jabatan']; ?>" name="jabatan" placeholder="Jabatan">
                        </div>
                        <div class="form-group">
                            <label>Jenis Pegawai</label>
                            <br>
                            <select class="form-control" name="jenis_pegawai">
                                <option value="Tetap" <?= ($pegawai['jenis_pegawai'] == 'Tetap') ? 'selected' : ''; ?>>Tetap</option>
                                <option value="Freelance" <?= ($pegawai['jenis_pegawai'] == 'Freelance') ? 'selected' : ''; ?>>Freelance</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input class="form-control" type="date" value="<?= $pegawai['tanggal_lahir']; ?>"  name="tanggal_lahir" placeholder="Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <br>
                            <input type="radio" <?= ($pegawai['jenis_kelamin'] == 'Pria') ? 'checked' : ''; ?> name="jenis_kelamin" value="Pria"> Pria
                            <input type="radio" <?= ($pegawai['jenis_kelamin'] == 'Wanita') ? 'checked' : ''; ?> name="jenis_kelamin" value="Wanita"> Wanita
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input class="form-control" value="<?= $pegawai['alamat']; ?>" name="alamat" placeholder="Alamat" required>
                        </div>
                        <div class="form-group">
                            <label>Telfon</label>
                            <input class="form-control" value="<?= $pegawai['telfon']; ?>" name="telfon" placeholder="Telfon" required>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                          <a href="<?= base_url(); ?>/pegawai" class="btn btn-secondary mr-1">Back</a>
                          <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                        </div>
                      </form>
                </div>             
              </div>
            </div>
     
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?= $this->endSection('content'); ?>
<?= $this->section('modals'); ?>

<?= $this->endSection('modals'); ?>
<?= $this->section('js'); ?>

<?= $this->endSection('js'); ?>
<?= $this->extend('layouts/index') ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data Kontrak</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Kontrak</a></li>
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
                <h5 class="font-weight-bold">Edit Data Kontrak</h5>            
            </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="<?= base_url('KontrakController/update/' . $kontrak['id_kontrak']); ?>" method="post">
                        <div class="form-group">
                            <label>Nama Kontrak</label>
                            <input class="form-control" value="<?= $kontrak['nama_kontrak']; ?>" name="nama_kontrak" placeholder="Nama Kontrak" required>
                        </div>                        
                        <div class="form-group">
                            <label>Tanggal Kontrak</label>
                            <input class="form-control" value="<?= $kontrak['tanggal']; ?>" type="date" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <select name="nama_pegawai" class="form-control">
                              <option value="<?= $kontrak['id_pegawai']; ?>" selected><?= $kontrak['nama_pegawai']; ?></option>
                                <?php foreach($pegawai as $p): ?>
                                    <option value="<?= $p['id_pegawai']; ?>" class="<?= ($kontrak['id_pegawai'] == $p['id_pegawai']) ? 'd-none' : ''; ?>"><?= $p['nama_pegawai']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nilai Kontrak</label>
                            <input class="form-control" value="<?= $kontrak['nilai_kontrak']; ?>"  name="nilai_kontrak" placeholder="Nilai Konrak" required>
                        </div>  
                        <div class="form-group d-flex justify-content-end">
                          <a href="<?= base_url(); ?>/kontrak" class="btn btn-secondary mr-1">Back</a>
                          <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                        </div>                                          
                </form>
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
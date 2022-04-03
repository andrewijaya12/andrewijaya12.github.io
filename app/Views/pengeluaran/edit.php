<?= $this->extend('layouts/index') ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data Pengeluaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pengeluaran</a></li>
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
                <h5 class="font-weight-bold">Edit Data Pengeluaran</h5>            
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <form action="<?= base_url('PengeluaranController/update/' . $pengeluaran['id_pengeluaran'] ); ?>" method="post">                                               
                        <div class="form-group">
                            <label>Jenis Pengeluaran</label>
                            <select name="jenis_pengeluaran" class="form-control" required>
                                <option value="Operasional" <?= ($pengeluaran['jenis_pengeluaran'] == 'Operasional') ? 'selected' : ''; ?>>Operasional</option>
                                <option value="Pembelian" <?= ($pengeluaran['jenis_pengeluaran'] == 'Pembelian') ? 'selected' : ''; ?>>Pembelian</option>    
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <select name="nama_pegawai" class="form-control" required>
                                <option value="<?= $pengeluaran['id_pegawai']; ?>"><?= $pengeluaran['nama_pegawai']; ?></option>
                                <?php foreach($pegawai as $p): ?>
                                    <option value="<?= $p['id_pegawai']; ?>" class="<?= ($p['id_pegawai'] == $pengeluaran['id_pegawai']) ? 'd-none' : ''; ?>"><?= $p['nama_pegawai']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input class="form-control" type="date" name="tanggal" value="<?= $pengeluaran['tanggal']; ?>" placeholder="Tanggal">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input class="form-control" name="keterangan" value="<?= $pengeluaran['keterangan']; ?>" placeholder="Keterangan">
                        </div>
                        <div class="form-group">
                            <label>Total</label>
                            <input class="form-control" name="total" value="<?= $pengeluaran['total']; ?>" placeholder="Rp">
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url(); ?>/pengeluaran" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-success">Perbaharui Data</button>
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
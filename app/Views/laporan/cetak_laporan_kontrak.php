<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= longdate_indo(date('Y-m-d')); ?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>/template/dist/css/adminlte.min.css">
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        div.admin{
            width:100%;
            text-align: center;
        }
        div.divider{
            box-sizing: border-box;
            width: 60%;
            border-bottom: 3px solid #000000;
        }
        div.heading h3,h5{
            font-weight: bold;
            color: #000000;
        }
        div.heading h5{
            width: 35rem;
        }
        .tb-tgl{
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="heading text-center">
            <h3 class="mb-1">Laporan Kontrak PT Sembilan Hakim Nusantara</h3>
            <h5 class="mx-auto">Jalan Darussalam No.82, Susunan Baru, Kecamatan Tanjung Karang Barat, Kota Bandar Lampung</h5>
        </div>
        <hr>
        <div class="row my-3 d-flex align-items-center ">
            <div class="col-md-11">
                <table class="font-weight-bold text-dark tb-tgl">
                    <tr>
                        <td>Tanggal</td>
                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td><?= date_indo($awal); ?></td>
                        <td>&nbsp;&nbsp; s/d&nbsp;&nbsp;</td>
                        <td><?= date_indo($akhir); ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-1 d-flex inline-block justify-content-end d-print-none">
                <a href="<?= base_url(); ?>/laporan-kontrak" class="btn btn-secondary btn-sm mr-1">Back</a>
                <button onclick="return window.print()"  class="btn btn-success btn-sm">Cetak</button>
            </div>            
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kontrak</th>
                            <th>Tanggal</th>
                            <th>Nama Pegawai</th>
                            <th>Nilai Kontrak</th>
                        </tr>
                </thead>
                <tbody>
                    <?php $no = 1; $total =0; foreach($kontrak as $p): $total += $p['nilai_kontrak'];?>
                    <tr>
                        <td class="align-middle"><?= $no++; ?></td>
                        <td class="align-middle"><?= $p['nama_kontrak']; ?></td>
                        <td class="align-middle"><?= date_indo($p['tanggal']); ?></td>
                        <td class="align-middle"><?= $p['nama_pegawai']; ?></td>
                        <td class="align-middle">Rp. <?= number_format($p['nilai_kontrak']); ?></td>
                    </tr>
                    <?php endforeach ?>                        
                    <tr class="font-weight-bold">
                        <td class="align-middle" colspan="4">Total Keseluruhan Nilai Kontrak</td>
                        <td class="align-middle">Rp. <?= number_format($total); ?></td>
                    </tr>
                </tbody>
            </table>        
        </div>
        <div class="row mt-4">            
            <div class="col-md-8"></div>
            <div class="col-md-4 d-flex justify-content-end">
                <div class="admin">
                    <h6 style="font-weight: bold;">Jakarta, <?= date_indo(date('Y-m-d')); ?></h6>
                    <h6 style="font-weight: bold;">Pimpinan</h6>
                    <div class="divider pt-5 mt-3 mx-auto"></div>
                </div>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>

</body>
</html>
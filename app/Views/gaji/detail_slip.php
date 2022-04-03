<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= longdate_indo(date('Y-m-d')); ?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>/template/dist/css/adminlte.min.css">
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        div.admin {
            width: 100%;
            text-align: center;
        }

        div.divider {
            box-sizing: border-box;
            width: 60%;
            border-bottom: 3px solid #000000;
        }

        div.divider2 {
            box-sizing: border-box;
            width: 100%;
            border-bottom: 3px solid #000000;
        }

        div.divider-judul {
            box-sizing: border-box;
            width: 21%;
            border-bottom: 3px solid #000000;
        }

        div.sub-head {
            box-sizing: border-box;
            width: fit-content;
            border-bottom: 2px solid #000000;
        }

        div.heading h3,
        h5 {
            font-weight: bold;
            color: #000000;
        }

        div.heading h5 {
            width: 35rem;
        }

        .tb-tgl {
            font-size: 1.2rem;
        }
    </style>
</head>

<body>
    <div class="container py-2">
        <div class="heading text-center mb-3">
            <h3 class="mb-1">PT Sembilan Hakim Nusantara</h3>
            <h5 class="mx-auto">Jalan Darussalam No.82, Susunan Baru, Kecamatan Tanjung Karang Barat, Kota Bandar Lampung</h5>
        </div>
        <div class="divider2"></div>
        <div class="row d-flex justify-content-center mt-2">
            <div class="col-md-12 text-center">
                <h5 class="mb-0">SLIP GAJI KARYAWAN</h5>
                <div class="divider-judul mx-auto mb-1"></div>
                <h6 class="font-weight-bold">Periode : <?= bulan(date('m')); ?> <?= date('Y'); ?></h6>
            </div>
        </div>
        <div class="row my-3 d-flex align-items-end">
            <div class="col-md-11">
                <table class="font-weight-bold text-dark" style="font-size: 1.05rem;">
                    <tr>
                        <td>Nama</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td><?= $gaji['nama_pegawai']; ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td><?= $gaji['jabatan']; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td>Karyawan <?= $gaji['jenis_pegawai']; ?></td>
                    </tr>
                    <tr>
                        <td>No Handphone</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td><?= $gaji['telfon']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td><?= $gaji['alamat']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-1 d-flex inline-block justify-content-end d-print-none">
                <a href="<?= base_url(); ?>/slip-gaji" class="btn btn-secondary btn-sm mr-1">Back</a>
                <button onclick="return window.print()" class="btn btn-success btn-sm">Cetak</button>
            </div>
        </div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th class="align-middle">Gaji Pokok</th>
                    <th class="align-middle">Tunjangan Konsumsi</th>
                    <th class="align-middle">Bonus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">Rp. <?= number_format($gaji['gaji_pokok']); ?></td>
                    <td class="align-middle">Rp. <?= number_format($gaji['tj_konsumsi']); ?></td>
                    <td class="align-middle">Rp. <?= number_format($gaji['bonus']); ?></td>
                </tr>
                <tr class="font-weight-bold">
                    <td colspan="2" class="align-middle">Total Penghasilan</td>
                    <td class="align-middle">Rp. <?= number_format($gaji['gaji_pokok'] + $gaji['bonus'] + $gaji['tj_konsumsi']); ?></td>
                </tr>
            </tbody>
        </table>
        <div class="row mt-4">
            <div class="col-md-8"></div>
            <div class="col-md-4 d-flex justify-content-end">
                <div class="admin">
                    <h6 style="font-weight: bold;">Bandar Lampung <?= date_indo(date('Y-m-d')); ?></h6>
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
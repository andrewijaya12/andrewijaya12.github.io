<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GajiModel;
use App\Models\KontrakModel;
use App\Models\PengeluaranModel;
use CodeIgniter\I18n\Time;

class LaporanController extends BaseController
{
    protected $pengeluaran;
    protected $gaji;
    protected $kontrak;
    function __construct()
    {
        $this->pengeluaran = new PengeluaranModel();
        $this->gaji = new GajiModel();
        $this->kontrak = new KontrakModel();
    }
    // lAPORAN KEUANGAN
    public function laporan_keuangan()
    {
        $date = date('m');
        $data = [
            'title' => 'Laporan Keuangan',
            'breadcumb' => 'Laporan Keuangan',
            'active' => 'laporan_p',
            'pengeluaran' => $this->pengeluaran->query("SELECT * FROM pengeluaran JOIN pegawai ON pengeluaran.id_pegawai = pegawai.id_pegawai where month(tanggal) = $date ORDER BY nama_pegawai ASC")->getResultArray(),
            'gaji' => $this->gaji->query("SELECT *,sum(gaji_pokok) as gapok,sum(bonus) as b,count(tanggal) as jumlah FROM gaji JOIN pegawai ON gaji.id_pegawai = pegawai.id_pegawai GROUP BY tanggal ORDER BY nama_pegawai ASC")->getResultArray()
        ];
        return view('laporan/laporan_keuangan', $data);
    }
    public function cetak_keuangan($awal, $akhir)
    {
        $data = [
            'pengeluaran' => $this->pengeluaran->query("SELECT * FROM pengeluaran WHERE (tanggal BETWEEN '$awal' AND '$akhir') OrDER BY tanggal ASC")->getResultArray(),
            'gaji' => $this->gaji->query("SELECT *,sum(gaji_pokok) as gapok,sum(bonus) as b,count(tanggal) as jumlah FROM gaji  WHERE (tanggal BETWEEN '$awal' AND '$akhir') GROUP BY tanggal ORDER BY tanggal ASC")->getResultArray(),
            'awal' => $awal,
            'akhir' => $akhir
        ];
        return view('laporan/cetak_laporan_keuangan', $data);
    }
    public function search()
    {
        $tgl_awal = $this->request->getPost('tgl_awal');
        $tgl_akhir = $this->request->getPost('tgl_akhir');
        $cek = $this->pengeluaran->query("SELECT * FROM pengeluaran  WHERE (tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir')")->getResultArray();
        $cek2 = $this->gaji->query("SELECT * FROM gaji WHERE (tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir')")->getResultArray();
        if ($cek != null or $cek2 != null) {
            return redirect()->to(base_url('/cetak-laporan-keuangan/' . $tgl_awal . '/' . $tgl_akhir));
        } else {
            session()->setFlashdata('gagal', 'Maaf data tidak tersedia');
            return redirect()->to(base_url('/laporan-keuangan'));
        }
    }
    // AKHIR LAPORAN KEUANGAN

    // LAPORAN KONTRAK
    public function laporan_kontrak()
    {
        $date = date('m');
        $data = [
            'title' => 'Laporan Kontrak',
            'breadcumb' => 'Laporan Kontrak',
            'active' => 'laporan_k',
            'kontrak' => $this->pengeluaran->query("SELECT * FROM kontrak JOIN pegawai ON kontrak.id_pegawai = pegawai.id_pegawai where month(tanggal) = $date ORDER BY nama_pegawai ASC")->getResultArray(),
        ];
        return view('laporan/laporan_kontrak', $data);
    }
    public function cetak_kontrak($awal, $akhir)
    {
        $data = [
            'kontrak' => $this->kontrak->query("SELECT * FROM kontrak JOIN pegawai ON kontrak.id_pegawai = pegawai.id_pegawai  WHERE (tanggal BETWEEN '$awal' AND '$akhir')")->getResultArray(),
            'awal' => $awal,
            'akhir' => $akhir,
        ];
        return view('laporan/cetak_laporan_kontrak', $data);
    }
    public function search_kontrak()
    {
        $tgl_awal = $this->request->getPost('tgl_awal');
        $tgl_akhir = $this->request->getPost('tgl_akhir');
        $cek = $this->kontrak->query("SELECT * FROM kontrak  WHERE (tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir')")->getResultArray();
        if ($cek != null) {
            return redirect()->to(base_url('/cetak-laporan-kontrak/' . $tgl_awal . '/' . $tgl_akhir));
        } else {
            session()->setFlashdata('gagal', 'Maaf data tidak tersedia');
            return redirect()->to(base_url('/laporan-kontrak'));
        }
    }
    // AKHIR LAPORAN KONTRAK
}

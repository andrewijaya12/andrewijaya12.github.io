<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GajiModel;
use App\Models\KontrakModel;
use App\Models\PegawaiModel;
use App\Models\PengeluaranModel;
use CodeIgniter\I18n\Time;

class DashboardController extends BaseController
{
    protected $kontrak;
    protected $pegawai;
    protected $gaji;
    protected $pengeluaran;
    function __construct()
    {
        $this->kontrak = new KontrakModel();
        $this->pegawai = new PegawaiModel();
        $this->gaji = new GajiModel();
        $this->pengeluaran = new PengeluaranModel();
    }
    public function index()
    {   
        $year = date('Y');
        $peng = $this->pengeluaran->findAll();
        $mon = 0;
        $tues = 0;
        $wed = 0;
        $thurs = 0;
        $fri = 0;
        $sat = 0;
        $sun = 0;
        foreach($peng as $p){
            $date = $p['tanggal'];
            switch ((date('D-m-Y',strtotime($date)))) {
                case 'Mon-' . date('m') . '-' . date('Y'):
                    $mon+=$p['total'];
                    break;            
                case 'Tue-' . date('m') . '-' . date('Y'):
                    $tues+=$p['total'];
                    break;  
                case 'Wed-' . date('m') . '-' . date('Y'):
                    $wed+=$p['total'];
                    break;  
                case 'Thu-' . date('m') . '-' . date('Y'):
                    $thurs+=['total'];
                    break;  
                case 'Fri-' . date('m') . '-' . date('Y'):
                    $fri+=$p['total'];
                    break;  
                case 'Sat-' . date('m') . '-' . date('Y'):
                    $sat+=$p['total'];
                    break;  
                case 'Sun-' . date('m') . '-' . date('Y'):
                    $sun+=$p['total'];
                    break;  
                    
            }
        }
        // $date = Time::createFromDate($year);
        $time = Time::today('Asia/Jakarta', 'id_ID');
        $data = [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'breadcumb' => 'Dashboard',
            'pegawai' => $this->pegawai->countAllResults(),
            'kontrak' => $this->kontrak->countAllResults(),
            'bonus' => $this->gaji->selectSum('bonus')->where('tanggal', $time)->first(),
            'sen' => $mon,
            'sel' => $tues,
            'rab' => $wed,
            'kam' => $thurs,
            'jum' => $fri,
            'sab' => $sat,
            'min' => $sun,
        ];
        return view('dashboard', $data);
    }

    public function info(){
        $data = [
            'title' => 'Info Perusahaan',
            'active' => 'info',
        ];
        return view('info',$data);
    }
}

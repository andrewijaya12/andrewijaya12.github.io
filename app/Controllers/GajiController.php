<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GajiModel;
use App\Models\KontrakModel;
use App\Models\PegawaiModel;

class GajiController extends BaseController
{
    protected $gaji;
    protected $pegawai;
    protected $kontrak;
    function __construct()
    {
        $this->gaji = new GajiModel();
        $this->pegawai = new PegawaiModel();
        $this->kontrak = new KontrakModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Gaji',
            'active' => 'gaji',
            'breadcumb' => 'Gaji',
            'gaji' => $this->gaji->join('pegawai','gaji.id_pegawai = pegawai.id_pegawai')->findAll(),
            'pegawai' => $this->pegawai->findAll()
        ];
        return view('gaji/index', $data);
    }

    // Insert Kontrak
    public function save(){
        $id_pegawai = $this->request->getPost('nama_pegawai');
        $cek =  $this->kontrak->where('id_pegawai',$id_pegawai)->selectSum('nilai_kontrak','bonus')->first();
        if (!empty($cek)) {
            $bonus = $cek['bonus']*0.4;
        }else{
            $bonus = 0;
        }
        $this->gaji->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'id_pegawai' => $id_pegawai,
            'gaji_pokok' => $this->request->getPost('gaji'),
            'tj_konsumsi' => $this->request->getPost('tj_konsumsi'),
            'bonus' => $bonus,
        ]);
        session()->setFlashdata('success', 'Data gaji berhasil ditambahkan');
        return redirect()->to(base_url('/gaji'));
    }
    // Akhir Insert

    // Edit Kontrak
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Gaji',
            'active' => 'gaji',
            'breadcumb' => 'Edit-Gaji',
            'pegawai' => $this->pegawai->findAll(),
            'gaji' => $this->gaji->join('pegawai', 'gaji.id_pegawai = pegawai.id_pegawai')->find($id)
        ];
        return view('gaji/edit', $data);
    }
    public function update($id){
        $this->gaji->update($id,[
            'tanggal' => $this->request->getPost('tanggal'),
            'id_pegawai' => $this->request->getPost('nama_pegawai'),
            'gaji_pokok' => $this->request->getPost('gaji_pokok'),
            'tj_konsumsi' => $this->request->getPost('tj_konsumsi'),
        ]);
        session()->setFlashdata('success', 'Data gaji berhasil diperbaharui');
        return redirect()->to(base_url('/gaji'));
    }
    // Akhir Edit

    // Delete
    public function delete($id){
        $this->gaji->delete($id);
        session()->setFlashdata('success','Data gaji berhasil dihapus');
        return redirect()->to(base_url('/gaji'));
    }
    // Akhir Delete
    public function slip_gaji()
    {
        $data = [
            'title' => 'Slip Gaji',
            'active' => 'slip',
            'breadcumb' => 'Slip Gaji',
            'gaji' => $this->gaji->join('pegawai', 'gaji.id_pegawai = pegawai.id_pegawai')->findAll()
        ];
        return view('gaji/slip', $data);
    }    
    public function detail_slip($id){
        $data = [
            'title' => 'Detail Slip Gaji',
            'gaji' => $this->gaji->join('pegawai', 'gaji.id_pegawai = pegawai.id_pegawai')->find($id)
        ];
        return view('gaji/detail_slip', $data);
    }

}

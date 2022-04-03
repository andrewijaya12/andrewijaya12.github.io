<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\PengeluaranModel;

class PengeluaranController extends BaseController
{
    protected $pengeluaran;
    protected $pegawai;
    function __construct()
    {
        $this->pegawai = new PegawaiModel();
        $this->pengeluaran = new PengeluaranModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Pengeluaran',
            'active' => 'peng',
            'breadcumb' => 'Pengeluaran',
            'pengeluaran' => $this->pengeluaran->join('pegawai','pengeluaran.id_pegawai = pegawai.id_pegawai')->findAll(),
            'pegawai' => $this->pegawai->findAll()
        ];
        return view('pengeluaran/index', $data);
    }

     // Insert Kontrak
     public function save(){
        $id_pegawai = $this->request->getPost('nama_pegawai');        
        $this->pengeluaran->insert([
            'jenis_pengeluaran' => $this->request->getPost('jenis_pengeluaran'),
            'id_pegawai' => $id_pegawai,
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'total' => $this->request->getPost('total'),
        ]);
        session()->setFlashdata('success', 'Data pengeluaran berhasil ditambahkan');
        return redirect()->to(base_url('/pengeluaran'));
    }
    // Akhir Insert

    // Edit Kontrak
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Pengeluaran',
            'active' => 'pengeluaran',
            'breadcumb' => 'Edit-Pengeluaran',
            'pegawai' => $this->pegawai->findAll(),
            'pengeluaran' => $this->pengeluaran->join('pegawai', 'pengeluaran.id_pegawai = pegawai.id_pegawai')->find($id)
        ];
        return view('pengeluaran/edit', $data);
    }
    public function update($id){
        $this->pengeluaran->update($id,[
            'jenis_pengeluaran' => $this->request->getPost('jenis_pengeluaran'),
            'id_pegawai' => $this->request->getPost('nama_pegawai'),
            'tanggal' => $this->request->getPost('tanggal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'total' => $this->request->getPost('total'),
        ]);
        session()->setFlashdata('success', 'Data gaji berhasil diperbaharui');
        return redirect()->to(base_url('/pengeluaran'));
    }
    // Akhir Edit

    // Delete
    public function delete($id){
        $this->pengeluaran->delete($id);
        session()->setFlashdata('success','Data pengeluaran berhasil dihapus');
        return redirect()->to(base_url('/pengeluaran'));
    }
    // Akhir Delete
}

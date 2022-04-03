<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KontrakModel;
use App\Models\PegawaiModel;

class KontrakController extends BaseController
{
    protected $kontrak;
    protected $pegawai;
    function __construct()
    {
        $this->kontrak = new KontrakModel();
        $this->pegawai = new PegawaiModel();
    } 
    public function index()
    {
        $data = [
            'title' => 'Data Kontrak',
            'active' => 'kontrak',
            'breadcumb' => 'Kontrak',
            'kontrak' => $this->kontrak->join('pegawai','kontrak.id_pegawai = pegawai.id_pegawai')->findAll(),
            'pegawai' => $this->pegawai->findAll()
        ];
        return view('kontrak/index', $data);
    }

    // Insert Kontrak
    public function save(){
        $this->kontrak->insert([
            'nama_kontrak' => $this->request->getPost('nama_kontrak'),
            'tanggal' => $this->request->getPost('tanggal'),
            'id_pegawai' => $this->request->getPost('nama_pegawai'),
            'nilai_kontrak' => $this->request->getPost('nilai_kontrak'),
        ]);
        session()->setFlashdata('success', 'Data kontrak berhasil ditambahkan');
        return redirect()->to(base_url('/kontrak'));
    }

    // Edit Kontrak
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Pegawai',
            'active' => 'pegawai',
            'breadcumb' => 'Edit-Kontrak',
            'pegawai' => $this->pegawai->findAll(),
            'kontrak' => $this->kontrak->join('pegawai', 'kontrak.id_pegawai = pegawai.id_pegawai')->find($id)
        ];
        return view('kontrak/edit', $data);
    }
    public function update($id){
        $this->kontrak->update($id,[
            'nama_kontrak' => $this->request->getPost('nama_kontrak'),
            'tanggal' => $this->request->getPost('tanggal'),
            'id_pegawai' => $this->request->getPost('nama_pegawai'),
            'nilai_kontrak' => $this->request->getPost('nilai_kontrak'),
        ]);
        session()->setFlashdata('success', 'Data kontrak berhasil diperbaharui');
        return redirect()->to(base_url('/kontrak'));
    }
    // Akhir Edit

    // Delete
    public function delete($id){
        $this->kontrak->delete($id);
        session()->setFlashdata('success','Data kontrak berhasil dihapus');
        return redirect()->to(base_url('/kontrak'));
    }
    // Akhir Delete
}

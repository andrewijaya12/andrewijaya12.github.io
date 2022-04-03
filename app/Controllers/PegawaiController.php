<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class PegawaiController extends BaseController
{
    protected $pegawai;
    function __construct()
    {
        $this->pegawai = new PegawaiModel();
    } 
    public function index()
    {
        $data = [
            'title' => 'Data Pegawai',
            'active' => 'pegawai',
            'breadcumb' => 'Pegawai',
            'pegawai' => $this->pegawai->findAll()
        ];
        return view('pegawai/index', $data);
    }

    // Insert Pegawai
    public function save(){
        $this->pegawai->insert([
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'jabatan' => $this->request->getPost('jabatan'),
            'jenis_pegawai' => $this->request->getPost('jenis_pegawai'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'telfon' => $this->request->getPost('telfon'),
        ]);
        session()->setFlashdata('success', 'Data pegawai berhasil ditambahkan');
        return redirect()->to(base_url('/pegawai'));
    }

   
    // Akhir Insert

    // Edit Pegawai
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Pegawai',
            'active' => 'pegawai',
            'breadcumb' => 'Edit-Pegawai',
            'pegawai' => $this->pegawai->find($id)
        ];
        return view('pegawai/edit', $data);
    }
    public function update($id){
        $this->pegawai->update($id,[
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'jabatan' => $this->request->getPost('jabatan'),
            'jenis_pegawai' => $this->request->getPost('jenis_pegawai'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'telfon' => $this->request->getPost('telfon'),
        ]);
        session()->setFlashdata('success', 'Data pegawai berhasil diperbaharui');
        return redirect()->to(base_url('/pegawai'));
    }
    // Akhir Edit

    // Delete
    public function delete($id){
        $this->pegawai->delete($id);
        session()->setFlashdata('success','Data pegawai berhasil dihapus');
        return redirect()->to(base_url('/pegawai'));
    }
    // Akhir Delete

}

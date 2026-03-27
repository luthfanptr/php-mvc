<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa(); // hasil dari db PDO
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) // detail berdasarkan id
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id); // ambil berdasarkan function $id
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah(){
        // method untuk tambah data mhs
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) { // ada baris baru yg ditambahkan | dikirim ke models Mahasiswa_model
            header('Location: ' . BASEURL . '/mahasiswa'); // pindahkan user ke halaman utama mhs
            exit;
        }
    }
}

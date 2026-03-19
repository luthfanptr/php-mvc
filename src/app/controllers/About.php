<?php

class About extends Controller
{
    public function index($nama = "Luthfan", $status = "Mahasiswa")
    {
        $data['nama'] = $nama; // ambil data nama dari user
        $data['status'] = $status; 
        $data['judul'] = 'About Me'; // kirim data default about/index
        $this->view('templates/header', $data); //terima data default about/index
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] = 'Pages'; // kirim data default about/page
        $this->view('templates/header', $data); // terima data default about/page
        $this->view('about/page');
        $this->view('templates/footer');
    }
}

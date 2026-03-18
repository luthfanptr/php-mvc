<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home'; // kirim data default home/index
        $this->view('templates/header', $data); // terima data default home/index
        $this->view('home/index');
        $this->view('templates/footer');
    }
}

<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home'; // kirim data default home/index
        $data['nama'] = $this->model('User_model')->getUser(); // minta data bukan dari controller tapi dari model. | model dipanggil controller dan dilanjut ke method getUser 
        $this->view('templates/header', $data); // terima data default home/index
        $this->view('home/index', $data); // $data[nama] dikirim kesini
        $this->view('templates/footer');
    }
}

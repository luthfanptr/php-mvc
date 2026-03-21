<?php

class Mahasiswa_model
{
    // // data dummy
    // private $mhs = [
    //     [
    //         "nama" => "Luthfan Putra Prakarsa",
    //         "nim" => "20230801220",
    //         "email" => "luthfanputra.04@gmail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama" => "Doddy",
    //         "nim" => "20230803001",
    //         "email" => "doddy@gmail.com",
    //         "jurusan" => "Sistem Informasi"
    //     ],
    //     [
    //         "nama" => "Erik",
    //         "nim" => "20230101020",
    //         "email" => "erik@gmail.com",
    //         "jurusan" => "Teknik Mesin"
    //     ]
    // ];

    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id'); // untuk menyimpan data yang di binding, mengamankan dari sql injection
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}

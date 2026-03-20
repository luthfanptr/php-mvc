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

    private $dbh; // database handler
    private $stmt; // statement

    public function __construct()
    {
        $dsn = 'mysql:host=mysql;dbname=db_mvc'; // data source name

        try {
            $this->dbh = new PDO($dsn, 'root', 'root');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa()
    {
        // return $this->mhs;
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); // ambil model dari db
    }
}

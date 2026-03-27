<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh; // database handler
    private $stmt; // statement

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name; // data source name

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    { // null supaya aplikasi yang menentukan tipenya 

        // kondisi jika type null | pasti null hasilnya
        if (is_null($type)) {
            switch (true) {
                case is_int($value): // klo value int, tipenya int
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value): // klo value null, tipenya null
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        // misal where id == 1, maka 1 itu si int. supaya aman dari sql injection. karena query dieksekusi setelah string dibersihkan dulu
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    // tentukan jika dieksekusi datanya mau 1 atau banyak
    // kalau banyak (SELECT * FROM MAHASISWA)
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // kalau datanya cuma mau 1
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // untuk menghitung berapa baris yang baru ditambah
    public function rowCount(){ 
        return $this->stmt->rowCount(); // punya PDO
    }
}

<?php

// proses routing utama (yg baca URL dan menentukan controller & method)
class App
{
    // properties utk menentukan parameter default
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // ucfirst untuk membaca file About.php karena di linux & docker case sensitive tdk seperti di windows
        if (isset($url[0]) && file_exists('../app/controllers/' . ucfirst($url[0]) . '.php')) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        // import semua logic file yg ada di folder controllers
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
            var_dump($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); // hapus slash (/) di akhir
            $url = filter_var($url, FILTER_SANITIZE_URL); // bersihin url dari karakter aneh yg memungkinkan di hack
            $url = explode('/', $url); // pecah url dengan delimiter / dan stringnya elemen array dari $url
            return $url;
        }
    }
}

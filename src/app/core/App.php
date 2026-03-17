<?php

class App
{
    public function __construct()
    {
        $url = $this->parseURL();
        var_dump($url);
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

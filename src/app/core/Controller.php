<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php'; // gaperlu return karena cuma liat html
    }

    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model; // return karena harus di instansiasikan supaya bisa pakai model
    }
}

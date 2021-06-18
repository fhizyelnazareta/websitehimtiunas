<?php

class Home extends Controller
{
    public function index()
    {
        // mengirimkan data

        // Judul Halaman Website
        $data['judul'] = 'Halaman Home';

        // membutuhkan data dari model User_model
        $data['nama'] = $this->model('User_model')->getUser();

        // menampilkan tampilan halaman
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');

        
    }
}

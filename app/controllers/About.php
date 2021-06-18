<?php

class About extends Controller
{
    public function index($nama = 'Fhizyel', $pekerjaan = 'Web Developer', $umur = 20)
    {
        // array assos untuk mengambil data
        $data['judul'] = 'About';
        $data['nama'] = $nama;
        $data['umur'] = $umur;
        $data['pekerjaan'] = $pekerjaan;

        // menampilkan tampilan halaman
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page()
    {
        $data['judul'] = 'Page';

        // menampilkan tampilan halaman
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}

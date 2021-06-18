<?php

class Mahasiswa extends Controller
{
    // method default index di controller mahasiswa
    public function index()
    {
        // mengambil $data
        $data['judul'] = 'Data';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();

        // tampilan halaman mahasiswa
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    // method detail pada controller mahasiswa
    public function detail($id)
    {
        // mengambil $data
        $data['judul'] = 'Detail Data';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        // tampilan halaman mahasiswa
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    // method tambahData pada controller mahasiswa
    // berfungsi untuk menambahkan data ke dalam databasey
    public function tambahData()
    {
        // function tambahDataOrang ada di file Mahasiswa_model.php di folder models
        if ($this->model('Mahasiswa_model')->tambahDataOrang($_POST) > 0) {
            // flasher
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            // flasher
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
    // function hapus
    public function hapusData($id)
    {
        // function hapusDataOrang ada di file Mahasiswa_model.php di folder models
        if ($this->model('Mahasiswa_model')->hapusDataOrang($id) > 0) {
            // flasher Berhasil
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            // flasher Gagal
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
    // function getUbahData
    public function getUbahData()
    {
        // getMahasiswaById ada di models didalam file Mahasiswa_model.php
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    // function ubah
    public function ubahData()
    {
        // function ubahDataOrang ada di file Mahasiswa_model.php di folder models
        if ($this->model('Mahasiswa_model')->ubahDataOrang($_POST) > 0) {
            // flasher
            Flasher::setFlash('berhasil', 'diubahkan', 'success');
            header('location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            // flasher
            Flasher::setFlash('gagal', 'diubahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    // method cari
    public function cariData()
    {
        // mengambil $data
        $data['judul'] = 'Data';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();

        // tampilan halaman mahasiswa
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}

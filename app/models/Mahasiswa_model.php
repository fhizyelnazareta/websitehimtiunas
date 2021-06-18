<?php
class Mahasiswa_model
{
    // menginisialisasikan nama tabel dan db
    private $table = 'mahasiswa';
    private $db;

    // menginstansiasikan class Database yang ada di folder core
    public function __construct()
    {
        $this->db = new Database;
    }

    // melakakukan query mengambil data mahasiswa untuk ditampilkan
    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // function mengambil isi detail mahasiswa
    public function getMahasiswaById($id)
    {
        // query database menampilkan data
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        // melakukan binding
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // function tambah data ke database yaitu tambahDataOrang()
    public function tambahDataOrang($data)
    {
        // query database memasukan data atau tambah data
        $query = "INSERT INTO mahasiswa 
                    VALUES
                (null, :nama, :npm, :email, :jurusan)";

        // menjalankan tambah data
        $this->db->query($query);

        // melakukan binding
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        // mengeksekusi tambah data
        $this->db->execute();

        // mengembalikan nilai, yaitu rowCount() yg ada di file Database.php di folder core
        return $this->db->rowCount();
    }

    // function hapus data yang digunakan pada controller mahasiswa pada function hapusData()
    public function hapusDataOrang($id)
    {
        // query hapus data
        $query = "DELETE FROM mahasiswa WHERE id = :id";

        // menjalankan hapus data
        $this->db->query($query);

        // melakukan binding
        $this->db->bind('id', $id);

        // melakukan eksekusi
        $this->db->execute();

        // mengembalikan nilai menghasilkan angka untuk true dan false
        return $this->db->rowCount();
    }

    // function ubah data ke database yaitu ubahDataOrang()
    public function ubahDataOrang($data)
    {
        // query database update data atau ubah data
        $query = "UPDATE mahasiswa SET 
                    nama = :nama,
                    npm = :npm,
                    email = :email,
                    jurusan = :jurusan
                    WHERE id = :id";

        // menjalankan ubah data
        $this->db->query($query);

        // melakukan binding
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        // mengeksekusi ubah data
        $this->db->execute();

        // mengembalikan nilai, yaitu rowCount() yg ada di file Database.php di folder core
        return $this->db->rowCount();
    }

    // function cariDataMahasiswa digunakan di method mahasiswa pada method cari data
    public function cariDataMahasiswa()
    {
        // mengampil metode post keyword
        $keyword = $_POST['keyword'];

        // query menampilkan data untuk pencarian data
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";

        // menjalankan query
        $this->db->query($query);

        // melakukan binding
        // %$keyword% dilakukan/ditaro dibinding karena kalau di query tidak akan jalan
        $this->db->bind('keyword', "%$keyword%");

        // mengembalikan nilai pencarian
        return $this->db->resultSet();
    }
}

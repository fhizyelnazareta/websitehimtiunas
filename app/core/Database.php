<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    // Menampung koneksi ke database
    // database handler ($dbh)
    // untuk menampung koneksi ($dbh) username password database
    private $dbh;
    // statement untuk menampilkan data atau menampung data
    private $stmt;

    public function __construct()
    {
        // menlakukan koneksi database
        // data source name ($dsn)
        $dsn = 'mysql:host=' . $this->host . '; dbname=' . $this->db_name;

        // Array option
        $option = [
            // untuk membuat database koneksinya terjaga terus
            PDO::ATTR_PERSISTENT => true,
            // untuk mode error
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];


        // menghubungkan ke database
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // function query
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }
    // untuk melakukan Bind
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // untuk eksekusi
    public function execute()
    {
        $this->stmt->execute();
    }

    // function menentukan hasil banyaknya data
    // resultSet mengambil semua data pada database
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // singel hanya mengambil satu data saja pada database
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // untuk menghitung adaberapa baris yang ada didalam tabelnya
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}

<div class="container mt-3">
    <!-- flasher -->
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <!-- akhir -->
    <!-- tombol tambah -->
    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambah" data-toggle="modal" data-target="#formModal">
                Tambahkan Data
            </button>
        </div>
    </div>
    <!-- tombol cari -->
    <div class="row mt-3">
        <div class="col-lg-6">
            <!-- Form cari Data -->
            <form action="<?= BASEURL; ?>/mahasiswa/cariData" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Data Nama Pengguna" name="keyword" id="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                    </div>
                    <div class="input-group-append">
                        <a class="btn btn-primary ml-1" href="<?= BASEURL; ?>/mahasiswa">Refresh</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <h3 class="mt-4">Daftar Nama Mahasiswa Informatika</h3>
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item mt-2"><?= $mhs['nama']; ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapusData/<?= $mhs['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Data Akan dihapus?');">Hapus</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/ubahData/<?= $mhs['id']; ?>" class="badge badge-success float-right ml-1 tombolUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">Ubah</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-info float-right ml-1">Info</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <!-- akhir -->
</div>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulLabelModal">Tambah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Method Baseurl/mahasiswa/tambahData yaitu function tambahData()-->
                <form action="<?= BASEURL; ?>/mahasiswa/tambahData" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input type="number" class="form-control" id="npm" name="npm">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Sosiologi">Sosiologi</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>

        </div>
    </div>
</div>
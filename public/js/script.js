$(function () {
  // mengambil tombolTambah pada index di controller mahasiswa
  $(".tombolTambah").on("click", function () {
    // mengambil id judulLabelHalaman pada index di controller mahasiswa
    $("#judulLabelModal").html("Tambah Data Pengguna");
    // mengubah html button submit data
    $(".modal-footer button[type=submit]").html("Tambah Data");
  });

  // mengambil class tombolUbah pada index di controller mahasiswa
  $(".tombolUbah").on("click", function () {
    // mengambil id judulLabelHalaman pada index di controller mahasiswa
    $("#judulLabelModal").html("Ubah Data Pengguna");
    // mengubah html button submit data
    $(".modal-footer button[type=submit]").html("Ubah Data");
    // ubah arahan action form pada halaman index mahasiswa
    $(".modal-body form").attr(
      "action",
      "http://localhost/phpmvc-Real/public/mahasiswa/ubahData"
    );

    // mengambil data id
    const id = $(this).data("id");

    // ajax
    $.ajax({
      url: "http://localhost/phpmvc-Real/public/mahasiswa/getUbahData",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama").val(data.nama);
        $("#npm").val(data.npm);
        $("#email").val(data.email);
        $("#jurusan").val(data.jurusan);
        $("#id").val(data.id);
      },
    });
  });
});

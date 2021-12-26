<?php
require "session.php";

if (isset($_POST['hapus'])) {
    require "koneksi.php";

    $kode_barang = $_POST['kode_barang'];
    $gambar = $_POST['gambar'];
    $delete = mysqli_query($conn, "DELETE FROM tb_barang WHERE kode_barang = '$kode_barang'");
    if ($delete) {
        if ($gambar != '') {
            unlink('../gambar/barang/' . $gambar);
        }
        echo '<script>alert("Penghapusan data berhasil");</script>';
        echo '<script>window.location="../barang";</script>';
    } else {
        echo '<script>alert("Penghapusan data gagal, mohon kontak admin");</script>';
        echo '<script>window.location="../barang";</script>';
    }
} else {
    echo '<script>alert("Penghapusan data gagal, mohon kontak admin");</script>';
    echo '<script>window.location="../barang";</script>';
}
?>
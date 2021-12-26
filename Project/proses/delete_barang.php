<?php
require "session.php";

if (isset($_POST['hapus'])) {
    require "koneksi.php";

    $kode_barang = $_POST['kode_barang'];
    $delete = mysqli_query($conn, "DELETE FROM tbbarang WHERE kode_barang = '$kode_barang'");
    if ($delete) {
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
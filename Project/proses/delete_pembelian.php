<?php
require "session.php";

if (isset($_POST['hapus'])) {
    require "koneksi.php";

    $id= $_POST['id_pembelian'];
    $delete = mysqli_query($conn, "DELETE FROM tbpembelian WHERE id_pembelian = '$id'");
    if ($delete) {
        echo '<script>alert("Penghapusan data berhasil");</script>';
        echo '<script>window.location="../pembelian";</script>';
    } else {
        echo '<script>alert("Penghapusan data gagal, mohon kontak admin");</script>';
        echo '<script>window.location="../pembelian";</script>';
    }
} else {
    echo '<script>alert("Penghapusan data gagal, mohon kontak admin");</script>';
    echo '<script>window.location="../pembelian";</script>';
}
?>
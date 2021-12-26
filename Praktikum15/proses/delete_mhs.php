<?php
require "session.php";

if (isset($_POST['hapus'])) {
    require "koneksi.php";

    $nim= $_POST['nim'];
    $delete = mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE nim = '$nim'");
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
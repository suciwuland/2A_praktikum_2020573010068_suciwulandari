<?php
require "session.php";

if (isset($_POST['hapus'])) {
    require "koneksi.php";

    $id_supplier = $_POST['id_supplier'];
    $delete = mysqli_query($conn, "DELETE FROM tbsupplier WHERE id_supplier = '$id_supplier'");
    if ($delete) {
        echo '<script>alert("Penghapusan data berhasil");</script>';
        echo '<script>window.location="../supplier";</script>';
    } else {
        echo '<script>alert("Penghapusan data gagal, mohon kontak admin");</script>';
        echo '<script>window.location="../supplier";</script>';
    }
} else {
    echo '<script>alert("Penghapusan data gagal, mohon kontak admin");</script>';
    echo '<script>window.location="../supplier";</script>';
}
?>
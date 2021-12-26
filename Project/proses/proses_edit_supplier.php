<?php
require "session.php";

if (isset($_POST['edit'])) {
    require "koneksi.php";
    $id_supplier = $_POST['id_supplier'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telepon'];
    $email = $_POST['email'];

    $update = mysqli_query($conn, "UPDATE tbsupplier SET id_supplier = '$id_supplier', nama = '$nama', alamat = '$alamat' , telepon = '$telp', email='$email' WHERE id_supplier = '$id_supplier'");

    if ($update) {
        echo '<script>alert("EDIT data berhasil");</script>';
        echo '<script>window.location="../supplier";</script>';
    } else {
        echo '<script>alert("Edit data tidak berhasil, mohon kontak admin");</script>';
        echo '<script>window.location="../supplier";</script>';
    }
} else {
    echo '<script>alert("Edit data tidak berhasil, mohon kontak admin");</script>';
    echo '<script>window.location="../supplier";</script>';
}

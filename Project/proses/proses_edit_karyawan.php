<?php
require "session.php";

if (isset($_POST['edit'])) {
    require "koneksi.php";
    $id = $_POST['id_karyawan'];
    $user = $_POST['user'];
    $nama = $_POST['nama_karyawan'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telepon'];
    $email = $_POST['email'];
    $tp = $_POST['tp_lahir'];
    $tgl = $_POST['tgl_lahir'];

    $update = mysqli_query($conn, "UPDATE tbprofile SET id_profile = '$id',user ='$user', nama = '$nama', alamat = '$alamat' , no_hp = '$telp', email ='$email', tp_lahir = '$tp', tgl_lahir='$tgl' WHERE id_profile = '$id'");

    if ($update) {
        echo '<script>alert("EDIT data berhasil");</script>';
        echo '<script>window.location="../karyawan";</script>';
    } else {
        echo '<script>alert("Edit data tidak berhasil, mohon kontak admin");</script>';
        echo '<script>window.location="../karyawan";</script>';
    }
} else {
    echo '<script>alert("Edit data tidak berhasil, mohon kontak admin");</script>';
    echo '<script>window.location="../karyawan";</script>';
}

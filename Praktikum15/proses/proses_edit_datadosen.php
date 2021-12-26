<?php
require "session.php";

if (isset($_POST['edit'])) {
    require "koneksi.php";
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tp_lahir = $_POST['tp_lahir'];
    $tgl = $_POST['tgl_lahir'];

    $update = mysqli_query($conn, "UPDATE tb_dosen SET nip = '$nip', nama= '$nama', alamat= '$alamat', tp_lahir = $tp_lahir,tgl_lahir=$tgl WHERE nip= '$nip'");


    if ($update) {
        if (isset($sql)) {
            $hasil = mysqli_fetch_array($sql);

        }
        echo '<script>alert("EDIT data berhasil");</script>';
        echo '<script>window.location="../barang";</script>';
    } else {
        echo '<script>alert("Edit data tidak berhasil, mohon kontak admin");</script>';
        echo '<script>window.location="../barang";</script>';
    }
} else {
    echo '<script>alert("Edit data tidak berhasil, mohon kontak admin");</script>';
    echo '<script>window.location="../barang";</script>';
}
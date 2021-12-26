<?php
require "session.php";

if (isset($_POST['edit'])) {
    require "koneksi.php";
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $satuan = $_POST['satuan'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $ket = $_POST['keterangan'];
    
    $update = mysqli_query($conn, "UPDATE tbbarang SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', satuan = '$satuan' , stok = '$stok', harga='$harga', keterangan = '$ket' WHERE kode_barang = '$kode_barang'");

    if ($update) {
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
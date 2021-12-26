<?php
require "session.php";

if (isset($_POST['edit'])) {
    require "koneksi.php";
    $id= $_POST['id_pembelian'];
    $tgl = $_POST['tgl'];
    $barang = $_POST['barang']; 
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $supplier= $_POST['supplier'];
    $ket= $_POST['ket'];

    $update = mysqli_query($conn, "UPDATE tbpembelian SET id_pembelian = '$id', tanggal ='$tgl', kode_barang = '$barang', jumlah= '$jumlah' , harga= '$harga', 
    supplier ='$supplier', ket='$ket' WHERE id_pembelian = '$id'");

    if ($update) {
        echo '<script>alert("EDIT data berhasil");</script>';
        echo '<script>window.location="../pembelian";</script>';
    } else {
        echo '<script>alert("Edit data tidak berhasil, mohon kontak admin");</script>';
        echo '<script>window.location="../pembelian";</script>';
    }
} else {
    echo '<script>alert("Edit data tidak berhasil, mohon kontak admin");</script>';
    echo '<script>window.location="../pembelian";</script>';
}

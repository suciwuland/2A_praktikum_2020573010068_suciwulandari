<?php

//include koneksi database
require "koneksi.php";

//get data dari form
$kode_barang=$_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$keterangan = $_POST['keterangan'];
$gambar = $_POST['gambar'];

$hasil =mysqli_query($conn, "INSERT INTO tb_barang (`kode_barang`, `nama_barang`, `keterangan`, `gambar`) VALUES ('$kode_barang', '$nama_barang', '$keterangan', '$gambar')");
if ($hasil) {
    header("location: ../barang");
} else {
    echo "Data Gagal Ditambahkan";
}
?>

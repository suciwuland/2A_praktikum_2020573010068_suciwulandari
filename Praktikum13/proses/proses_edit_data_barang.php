<?php
    require "koneksi.php";
    
$kode_barang=$_POST['kode_barang'];
$nama_barang=$_POST['nama_barang'];
$keterangan=$_POST['ket'];

echo $kode_barang;

$update= mysqli_query($conn, "UPDATE tb_barang SET nama_barang = '$nama_barang', keterangan = '$keterangan'  WHERE kode_barang='$kode_barang'");
if ($update) {
    header("location: ../barang");
} else {
    echo "<script>alert('Mohon maaf data gagal diperbaharui')</script>";
}?>
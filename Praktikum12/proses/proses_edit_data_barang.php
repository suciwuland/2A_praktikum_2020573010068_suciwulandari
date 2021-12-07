<?php
    require "koneksi.php";
    
$id=$_POST['id_barang'];
$nama_barang=$_POST['nama_barang'];
$keterangan=$_POST['ket'];

echo $id;

$update= mysqli_query($conn, "UPDATE tb_barang SET nama_barang= '$nama_barang', keterangan='$keterangan' WHERE id_barang= '$id'");
?>
<?php 
    require "proses/koneksi.php";
    $id=$_GET['id'];
    $query="DELETE FROM tb_barang WHERE id_barang='$id'";

    if($conn->query($query)){
        header("location:barang");
    } else{
        echo "DATA GAGAL DIHAPUS!";
    }
?>
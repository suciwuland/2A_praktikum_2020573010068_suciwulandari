<?php
if (empty($_GET['x'])) {
    echo "<script>window.location='home';</script>";
} else if ($_GET['x'] == 'home') {
    require 'home.php';
} else if ($_GET['x'] == 'transaksi') {
    require 'transaksi.php';
} else if ($_GET['x'] == 'dropship') {
    require 'dropship.php';
} else if ($_GET['x'] == 'barang') {
    require 'barang.php';
}  else if ($_GET['x'] == 'karyawan') {
    require 'karyawan.php';
} else if ($_GET['x'] == 'pembelian') {
    require 'pembelian.php';
} else if ($_GET['x'] == 'penjualan') {
    require 'penjualan.php';
}else if ($_GET['x'] == 'kendala') {
    require 'kendala.php';
}else if ($_GET['x'] == 'kendala') {
    require 'kendala.php';
}
else if ($_GET['x'] == 'profile') {
    require 'profile.php';
} else if ($_GET['x'] == 'setting') {
    require 'setting.php';
} else {
    echo "<script>window.location='home';</script>";
}
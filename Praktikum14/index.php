<?php
if (empty($_GET['x'])) {
    echo "<script>window.location='home';</script>";
} else if ($_GET['x'] == 'home') {
    require 'home.php';
} else if ($_GET['x'] == 'barang') {
    require 'barang.php';
} else if ($_GET['x'] == 'mhs') {
    require 'mahasiswa.php';
} else if ($_GET['x'] == 'dosen') {
    require 'dosen.php';
}  else if ($_GET['x'] == 'datapinjam') {
    require 'datapeminjaman.php';
}else if ($_GET['x'] == 'pinjam') {
    require 'pinjam.php';
}else if ($_GET['x'] == 'profile') {
    require 'profile.php';
} else if ($_GET['x'] == 'setting') {
    require 'setting.php';
} else {
    echo "<script>window.location='home';</script>";
}
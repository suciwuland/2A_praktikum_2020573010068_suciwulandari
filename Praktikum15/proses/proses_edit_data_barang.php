<?php
require "session.php";

if (isset($_POST['edit'])) {
    require "koneksi.php";
    $kode_barang = $_POST['kode_brg'];
    $nama_barang = $_POST['nama_barang'];
    $ket = $_POST['ket'];
    $stock = $_POST['stok'];
    $nama_gambar = $_FILES['gambar']['name'];

    if ($nama_gambar == '') {
        $update = mysqli_query($conn, "UPDATE tb_barang SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', keterangan = '$ket', stok = $stock WHERE kode_barang = '$kode_barang'");
    } else {
        $ukuran_gambar = $_FILES['gambar']['size'];
        if ($ukuran_gambar < 1044070) {
            $file_tmp = $_FILES['gambar']['tmp_name'];
            $sql = mysqli_query($conn, "SELECT gambar FROM tb_barang WHERE kode_barang = '$kode_barang'");
            $update = mysqli_query($conn, "UPDATE tb_barang SET kode_barang = '$kd_brg', nama_barang = '$nama_barang', keterangan = '$ket', gambar = '$nama_gambar', stok = $stock WHERE kode_barang = '$kode_barang'");
        } else {
            echo '<script>alert("Ukuran gambar melebihi 1Mb, tolong kecilkan ukurannya");</script>';
            echo '<script>window.location="../barang.php";</script>';
        }
    }

    if ($update) {
        if (isset($sql)) {
            $hasil = mysqli_fetch_array($sql);

            if ($hasil['gambar'] != '') {
                unlink('../gambar/barang/' . $hasil['gambar']);
            }
            move_uploaded_file($file_tmp, '../gambar/barang/' . $nama_gambar);
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
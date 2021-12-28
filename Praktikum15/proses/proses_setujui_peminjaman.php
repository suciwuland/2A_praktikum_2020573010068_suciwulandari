<?php

if (isset($_POST['setuju/tolak'])) {
    require "koneksi.php";

    $id_peminjaman = $_POST['id_peminjaman'];
    $aksi = $_POST['aksi'];

    //melihat apakah id_peminjaman ada di tabel tb_peminjaman
    $select = mysqli_query($conn, "SELECT * FROM tb_peminjaman WHERE id_peminjaman = '$id_peminjaman'");
    $hasil = mysqli_fetch_array($select);

    if ($hasil['id_peminjaman'] == $id_peminjaman) {
        //mengubah status peminjaman
        $update = mysqli_query($conn, "UPDATE tb_peminjaman SET status = '$aksi' WHERE id_peminjaman = '$id_peminjaman'");

        if ($update) {
            //menampilkan alert sesuai aksi yang aksi yang dikirimkan oleh admin
            if ($aksi == 1) {
                echo '<script>alert("Proses persetujuan peminjaman berhasil");</script>';
                echo '<script>window.location="../datapinjam";</script>';
            } elseif ($aksi == 3) {
                echo '<script>alert("Proses penolakan peminjaman berhasil");</script>';
                echo '<script>window.location="../datapinjam";</script>';
            }
        } else {
            echo '<script>alert("Proses Setujui/Tolak bermasalah, mohon kontak admin");</script>';
            echo '<script>window.location="../datapinjam";</script>';
        }
    } else {
        echo '<script>alert("ID peminjaman tidak ditemukan, mohon kontak admin");</script>';
        echo '<script>window.location="../datapinjam";</script>';
    }
} else {
    echo '<script>alert("Tombol simpan belum di tekan");</script>';
    echo '<script>window.location="../datapinjam";</script>';
}
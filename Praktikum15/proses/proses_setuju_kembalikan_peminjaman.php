<?php

if (isset($_POST['setuju_kembalikan'])) {
    require "koneksi.php";

    $id_peminjaman = $_POST['id_peminjaman'];

    //melihat apakah id_peminjaman ada di tabel tb_peminjaman
    $select = mysqli_query($conn, "SELECT * FROM tb_peminjaman WHERE id_peminjaman = '$id_peminjaman'");
    $hasil = mysqli_fetch_array($select);

    if ($hasil['id_peminjaman'] == $id_peminjaman) {
        //mengubah status peminjaman
        $update = mysqli_query($conn, "UPDATE tb_peminjaman SET status = '4' WHERE id_peminjaman = '$id_peminjaman'");

        if ($update) {
            echo '<script>alert("Proses Setuju dikembalikan berhasil");</script>';
            echo '<script>window.location="../pinjam";</script>';
        } else {
            echo '<script>alert("Proses Setuju dikembalikan bermasalah, mohon kontak admin");</script>';
            echo '<script>window.location="../pinjam";</script>';
        }
    } else {
        echo '<script>alert("ID peminjaman tidak ditemukan, mohon kontak admin");</script>';
        echo '<script>window.location="../pinjam";</script>';
    }
} else {
    echo '<script>alert("Tombol setuju kembalikan belum di tekan");</script>';
    echo '<script>window.location="../pinjam";</script>';
}
<?php

if (isset($_POST['kembalikan'])) {
    require "koneksi.php";

    $id_peminjaman = $_POST['id_peminjaman'];

    //melihat apakah id_peminjaman ada di tabel tb_peminjaman
    $select = mysqli_query($conn, "SELECT * FROM tb_peminjaman WHERE id_peminjaman = '$id_peminjaman'");
    $hasil = mysqli_fetch_array($select);

    if ($hasil['id_peminjaman'] == $id_peminjaman) {
        //mengubah status peminjaman
        $update = mysqli_query($conn, "UPDATE tb_peminjaman SET status = '5' WHERE id_peminjaman = '$id_peminjaman'");

        if ($update) {
            echo '<script>alert("Proses kembalikan berhasil");</script>';
            echo '<script>window.location="../pinjam";</script>';
        } else {
            echo '<script>alert("Proses kembalikan bermasalah, mohon kontak admin");</script>';
            echo '<script>window.location="../pinjam";</script>';
        }
    } else {
        echo '<script>alert("ID peminjaman tidak ditemukan, mohon kontak admin");</script>';
        echo '<script>window.location="../pinjam";</script>';
    }
} else {
    echo '<script>alert("Tombol kembalikan belum di tekan");</script>';
    echo '<script>window.location="../pinjam";</script>';
}
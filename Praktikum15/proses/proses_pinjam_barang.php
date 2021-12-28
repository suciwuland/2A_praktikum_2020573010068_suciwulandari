<?php
if (isset($_POST['pjn'])) {
    require "Koneksi.php";
    require "session.php";
    $brg = $_POST['brg'];

    // cek apakah barang apakah sudah di pinjam atau belum
    $select_id_barang = mysqli_query($conn, "SELECT * FROM tb_peminjaman WHERE barang = '$brg'");
    $hasil_barang = mysqli_fetch_array($select_id_barang);

    if (isset($hasil_barang['barang']) and $hasil_barang['barang'] == $brg) {
        echo '<script>alert("Peminjaman barang gagal, barang sudah di pinjam");</script>';
        echo '<script>window.location="../pjn";</script>';
    } else {
        $mk = $_POST['mk'];
        $username = $_SESSION['username'];

        //ambil id_user dari tabel tb_user
        $select_id_user = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

        if ($select_id_user) {
            $hasil_id = mysqli_fetch_array($select_id_user);
            $id = $hasil_id['id'];

            $pinjam = mysqli_query($conn, "INSERT INTO tb_peminjaman(barang, user, status, mata_kuliah) VALUES ('$brg', '$id', '1', '$mk')");

            if ($pinjam) {
                echo '<script>alert("Peminjaman barang berhasil");</script>';
                echo '<script>window.location="../pjn";</script>';
            } else {
                echo '<script>alert("Peminjaman barang gagal, mohon kontak admin");</script>';
                echo '<script>window.location="../pjn";</script>';
            }
        } else {
            echo '<script>alert("Peminjaman barang gagal, mohon kontak admin");</script>';
            echo '<script>window.location="../pjn";</script>';
        }
    }
} else {
    echo '<script>alert("Peminjaman barang gagal, mohon kontak admin");</script>';
    echo '<script>window.location="../pjn";</script>';
}
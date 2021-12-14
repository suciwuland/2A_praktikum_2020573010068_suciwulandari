<?php
if (isset($_POST['pinjam'])) {
    require "koneksi.php";
    require "session.php";
    $brg = $_POST['brg'];

    $query = mysqli_query($conn, "SELECT * FROM tb_barang WHERE kode_barang = '$brg'");
    $hasil_barang = mysqli_fetch_array($query);

    // cek apakah barang apakah sudah di pinjam atau belum
    if ($hasil_barang['kode_barang'] == $brg) {
        echo '<script>alert("Peminjaman barang gagal, barang sudah di pinjam");</script>';
        echo '<script>window.location="../pinjam";</script>';
    } else {
        $mk = $_POST['mk'];
        $username = $_SESSION['username'];

        //ambil id_user dari tabel tb_user
        $ambil_id_user = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

        if ($ambil_id_user) {
            $hasil_id = mysqli_fetch_array($ambil_id_user);
            $id = $hasil_id['id'];

            $pinjam = mysqli_query($conn, "INSERT INTO tb_peminjaman(barang, user, status, mata_kuliah) VALUES ('$brg', '$id', '1', '$mk')");

            if ($pinjam) {
                // echo '<script>alert("Peminjaman barang berhasil");</script>';
                // echo '<script>window.location="../pinjam";</script>';
            }
        } else {
            echo '<script>alert("Peminjaman barang gagal, mohon kontak admin");</script>';
            echo '<script>window.location="../pinjam";</script>';
        }
    }
} else {
    echo '<script>alert("Peminjaman barang gagal, mohon kontak admin");</script>';
    echo '<script>window.location="../pinjam";</script>';
}
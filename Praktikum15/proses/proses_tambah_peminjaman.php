<?php
if (isset($_POST['pinjam'])) {
    if (isset($_POST['wkt_kembali'])) {
        require "koneksi.php";
        require "session.php";
        $brg = $_POST['brg'];

        //cek apakah barang sudah i pinjam atau belum
        $select_id_barang = mysqli_query($conn, "SELECT * FROM tb_peminjaman WHERE barang='$brg' && (status='1' || status='2')");
        $hasil_barang = mysqli_fetch_array($select_id_barang);
        if ($select_id_barang) {
            echo '<script>alert("Peminjaman barang gagal , barang sudah di pinjam");</script>';
            echo '<script>window.location="../pinjam";</script>';
        } else {
            $mk = $_POST['mk'];
            $username = $_SESSION['username'];
            //cek apakah barang sudah i pinjam atau belum
            $select_id_user = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username'");
            if ($select_id_user) {
                $hasil_id = mysqli_fetch_array($select_id_user);
                $id = $hasil_id['id'];
                $wkt_kembali = $_POST['wkt_kembali'];
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
    } else{
        echo '<script>alert("Waktu Pengembalian harus diisi");</script>';
        echo '<script>window.location="../pinjam";</script>';
    }
} else {
    echo '<script>alert("Peminjaman barang gagal, mohon kontak admin");</script>';
    echo '<script>window.location="../pinjam";</script>';
}

<?php
require "session.php";

if (isset($_POST['tambah'])) {
    require "koneksi.php";
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $satuan = $_POST['satuan'];
        $stok = $_POST['stok'];
        $harga= $_POST['harga'];
        $ket = $_POST['keterangan'];

        if ($kode_barang != "") {
            $cek = mysqli_query($conn, "SELECT * FROM tbbarang WHERE kode_barang = '$kode_barang'");
            $hasil = mysqli_fetch_array($cek);

            if (isset($hasil['kode_barang'])) {
                echo '<script>alert("Data kode barang sudah ada");</script>';
                echo '<script>window.location="../barang";</script>';
            } else {
                $tambah = mysqli_query($conn, "INSERT INTO tbbarang VALUES ('$kode_barang', '$nama_barang', '$satuan', '$stok', '$harga','$ket')");

                if ($tambah) {
                    echo '<script>alert("Penambahan data berhasil");</script>';
                    echo '<script>window.location="../barang";</script>';
                } else {
                    echo '<script>alert("Penambahan data gagal, mohon kontak admin");</script>';
                    echo '<script>window.location="../barang";</script>';
                }
            }
        } else {
            echo '<script>alert("Kode barang harus diisi");</script>';
            echo '<script>window.location="../barang";</script>';
        }
    } else {
        echo '<script>alert("Penambahan data gagal, mohon kontak admin");</script>';
        echo '<script>window.location="../barang";</script>';
    }
?>

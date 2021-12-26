<?php
require "session.php";

if (isset($_POST['tambah'])) {
    require "koneksi.php";
        $id= $_POST['id_pembelian'];
        $tgl = $_POST['tgl'];
        $barang = $_POST['barang']; 
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'];
        $supplier= $_POST['supplier'];
        $ket= $_POST['ket'];

        if ($id != "") {
            $cek = mysqli_query($conn, "SELECT * FROM tbpembelian WHERE id_pembelian = '$id'");
            $hasil = mysqli_fetch_array($cek);

            if (isset($hasil['id_pembelian'])) {
                echo '<script>alert("Data id pembelian sudah ada");</script>';
                echo '<script>window.location="../pembelian";</script>';
            } else {
                $tambah = mysqli_query($conn, "INSERT INTO tbpembelian VALUES ('$id','$tgl','$barang','$jumlah','$harga','$supplier','$ket')");

                if ($tambah) {
                    echo '<script>alert("Penambahan data berhasil");</script>';
                    echo '<script>window.location="../pembelian";</script>';
                } else {
                    echo '<script>alert("Penambahan data gagal, mohon kontak admin");</script>';
                    echo '<script>window.location="../pembelian";</script>';
                }
            }
        } else {
            echo '<script>alert("Id Pembelian harus diisi");</script>';
            echo '<script>window.location="../pembelian";</script>';
        }
    } else {
        echo '<script>alert("Penambahan data gagal, mohon kontak admin");</script>';
        echo '<script>window.location="../pembelian";</script>';
    }
?>

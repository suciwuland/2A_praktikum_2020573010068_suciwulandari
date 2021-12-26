<?php
require "session.php";

if (isset($_POST['tambah'])) {
    require "koneksi.php";
        $id_supplier = $_POST['id_supplier'];
        $nama_supplier = $_POST['nama_supplier'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telepon'];
        $email= $_POST['email'];

        if ($id_supplier!= "") {
            $cek = mysqli_query($conn, "SELECT * FROM tbsupplier WHERE id_supplier = '$id_supplier'");
            $hasil = mysqli_fetch_array($cek);

            if (isset($hasil['id_supplier'])) {
                echo '<script>alert("Data id supplier sudah ada");</script>';
                echo '<script>window.location="../supplier";</script>';
            } else {
                $tambah = mysqli_query($conn, "INSERT INTO tbsupplier VALUES ('$id_supplier', '$nama_supplier', '$alamat', '$telp', '$email')");

                if ($tambah) {
                    echo '<script>alert("Penambahan data berhasil");</script>';
                    echo '<script>window.location="../supplier";</script>';
                } else {
                    echo '<script>alert("Penambahan data gagal, mohon kontak admin");</script>';
                    echo '<script>window.location="../supplier";</script>';
                }
            }
        } else {
            echo '<script>alert("Id Supplier harus diisi");</script>';
            echo '<script>window.location="../supplier";</script>';
        }
    } else {
        echo '<script>alert("Penambahan data gagal, mohon kontak admin");</script>';
        echo '<script>window.location="../barang";</script>';
    }
?>

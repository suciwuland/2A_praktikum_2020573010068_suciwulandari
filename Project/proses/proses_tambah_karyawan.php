<?php
require "session.php";

if (isset($_POST['tambah'])) {
    require "koneksi.php";
        $id= $_POST['id_karyawan'];
        $user = $_POST['user'];
        $nama = $_POST['nama_karyawan']; 
        $alamat = $_POST['alamat'];
        $telp = $_POST['telepon'];
        $email= $_POST['email'];
        $tp= $_POST['tp_lahir'];
        $tgl= $_POST['tgl_lahir'];

        if ($id != "") {
            $cek = mysqli_query($conn, "SELECT * FROM tbprofile WHERE id_profile = '$id'");
            $hasil = mysqli_fetch_array($cek);

            if (isset($hasil['id_profile'])) {
                echo '<script>alert("Data id karyawan sudah ada");</script>';
                echo '<script>window.location="../karyawan";</script>';
            } else {
                $tambah = mysqli_query($conn, "INSERT INTO tbprofile VALUES ('$id','$user','$nama','$alamat','$telp','$email','$tp','$tgl')");

                if ($tambah) {
                    echo '<script>alert("Penambahan data berhasil");</script>';
                    echo '<script>window.location="../karyawan";</script>';
                } else {
                    echo '<script>alert("Penambahan data gagal, mohon kontak admin");</script>';
                    echo '<script>window.location="../karyawan";</script>';
                }
            }
        } else {
            echo '<script>alert("Id Supplier harus diisi");</script>';
            echo '<script>window.location="../karyawan";</script>';
        }
    } else {
        echo '<script>alert("Penambahan data gagal, mohon kontak admin");</script>';
        echo '<script>window.location="../karyawan";</script>';
    }
?>

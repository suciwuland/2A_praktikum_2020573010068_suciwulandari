<?php
require "session.php";

if (isset($_POST['hapus'])) {
    require "koneksi.php";

    $id= $_POST['id_profile'];
    $delete = mysqli_query($conn, "DELETE FROM tbprofile WHERE id_profile= '$id'");
    if ($delete) {
        echo '<script>alert("Penghapusan data berhasil");</script>';
        echo '<script>window.location="../karyawan";</script>';
    } else {
        echo '<script>alert("Penghapusan data gagal, mohon kontak admin");</script>';
        echo '<script>window.location="../karyawan";</script>';
    }
} else {
    echo '<script>alert("Penghapusan data gagal, mohon kontak admin");</script>';
    echo '<script>window.location="../karyawan";</script>';
}
?>
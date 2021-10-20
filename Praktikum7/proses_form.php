<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $id_user    =$_POST["iduser"];
    $nama   = $_POST["nama_mhs"];
    $jurusan   = $_POST["jurusan"];
    $prodi  = $_POST["prodi"];
    $nim    = $_POST["NIM"];
    $email  = $_POST["email"];
    $nohp   =$_POST["nohp"];
    $tplahir    =$_POST["tempatlahir"];
    $tglahir    =$_POST["tanggallahir"];
    $alamat     =$_POST["alamat"];
    $jk     =$_POST["jk"];
    $agama  =$_POST["agama"];
    $fotodiri=$_POST["fotodiri"];

    $conn       = mysqli_connect("localhost", "root", "", "db_saya")
        or die("koneksi gagal");
        echo "ID User            : $id_user<br>";
        echo "Nama Mahasiswa     : $nama <br>";
        echo "Jurusan            : $jurusan <br>";
        echo "Prodi              : $prodi <br>";
        echo "NIM                : $nim <br>";
        echo "Email              : $email <br>";
        echo "No. HP             : $nohp <br>";
        echo "Tempat Lahir       : $tplahir <br>";
        echo "Tanggal Lahir      : $tglahir <br>";
        echo "Alamat             : $alamat <br>";
        echo "Jenis Kelamin      : $jk <br>";
        echo "Agama              : $agama <br>";
        echo "Foto Diri          : $fotodiri<br>";
        $sqlqry= "INSERT into mahasiswa SET id_user='$id_user',
        Nama_Mahasiswa='$nama',
        Jurusan='$jurusan',
        Prodi='$prodi',
        NIM='$nim',
        Email='$email',
        No_Hp='$nohp',
        Tempat_Lahir='$tplahir',
        Tanggal_Lahir='$tglahir',
        Alamat='$alamat',
        Jenis_Kelamin='$jk',
        Agama='$agama',
        Foto_Diri='$fotodiri'";
        mysqli_query($conn,$sqlqry); 
            echo "Berhasil Disimpan";
    ?>
</body>
</html>
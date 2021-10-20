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
    $username   = $_POST["username"];
    $password   = $_POST["password"];
    $upassword  = $_POST["upassword"];

    $conn       = mysqli_connect("localhost", "root", "","db_saya") or die("koneksi gagal");
    if ($password != $upassword) {
        echo "Password Tidak Sama";
    } else {
        echo "ID User       :$id_user<br>";
        echo "Username      : $username <br>";
        echo "Password      : $password <br>";
        echo "Ulangi Password    : $upassword <br>";
        $sqlqry= "INSERT into tbuser SET id_user='$id_user',username='$username',password='$password'";
        mysqli_query($conn,$sqlqry); 
        echo "Pendaftaran Berhasil<br>";
        echo'<a href="form.php"> Go to Form Mahasiswa</a>';
    }
    ?>  
</body>
</html>
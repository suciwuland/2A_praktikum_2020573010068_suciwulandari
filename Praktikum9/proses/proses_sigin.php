<?php
require "koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);

// echo $username."-". $password;
$hasil = mysqli_query($conn, "select * from tb_user where username='$username' &&  password='$password'");
$row = mysqli_fetch_array($hasil);

if ($hasil) {
    if ((isset($row['username']) && isset($row['password'])) && $row['username'] == $username &&
        $row['password'] == $password
    )
        echo "username ada";
    else {
        echo "<script>
    alert('Mohon maaf username danpassword yang anda masukkan salah');
    </script>";
    }
} else {
}

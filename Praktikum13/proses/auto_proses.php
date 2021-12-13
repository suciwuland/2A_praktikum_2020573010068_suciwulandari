<?php
include "koneksi.php";
$query = mysqli_query($conn,"SELECT * FROM tb_user WHERE id='$_GET[id]'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Database</title>
</head>
<body>
    <h1>Searching Buku Tamu untuk database MySQL</h1>
    <form action="hasilsearch.php" method="POST">
        <select name="kolom">
            <option value="nama">nama</option>
            <option value="email">email</option>
        </select>
        Masukkan Kata yang Anda Cari<br>
        <input type="text" name="cari">
        <input type="submit" value="cari">
    </form>
</body>
</html>
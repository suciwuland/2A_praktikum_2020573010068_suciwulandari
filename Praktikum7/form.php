<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="proses_form.php" method="POST">
        <table border="0">
        <tr>
                <td>
                    <label for="">ID User</label>
                </td>
                <td>
                    <input type="text" name="iduser">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Nama Mahasiswa</label>
                </td>
                <td>
                    <input type="text" name="nama_mhs">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Jurusan</label>
                </td>
                <td>
                    <input type="text" name="jurusan">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Prodi</label>
                </td>
                <td>
                    <input type="text" name="prodi">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">NIM</label>
                </td>
                <td>
                    <input type="text" name="NIM">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Email</label>
                </td>
                <td>
                    <input type="email" name="email">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">No.HP</label>
                </td>
                <td>
                    <input type="text" name="nohp">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Tempat Lahir</label>
                </td>
                <td>
                    <input type="text" name="tempatlahir">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Tanggal Lahir</label>
                </td>
                <td>
                    <input type="date" name="tanggallahir">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Alamat</label>
                </td>
                <td>
                    <input type="text" name="alamat">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Jenis Kelamin</label>
                </td>
                <td>
                <label for="jk">
                    <input type="radio" name="jk" value="Pria">Pria
		            <input type="radio" name="jk" value="Wanita"> Wanita
                </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Agama</label>
                </td>
                <td>
                    <label for="agama">
                        <select name="agama">
			            <option value="islam">Islam</option>
			            <option value="kristen">Kristen</option>
			            <option value="hindu">Hindu</option>
			            <option value="buddha">Buddha</option>
			            <option value="konghuchu">Konghuchu</option>
			            </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Foto Diri</label>
                </td>
                <td>
                    <input type="file" name="fotodiri">
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input type="submit" name="simpan" value="Simpan">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
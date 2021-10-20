<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="proses_register.php" method="POST">
        <table border="0">
        <tr>
                <td>
                    <label for="">ID User </label>
                </td>
                <td>
                    <input type="text" name="iduser">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Username </label>
                </td>
                <td>
                    <input type="text" name="username">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Password</label>
                </td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Ulang Password</label>
                </td>
                <td>
                    <input type="password" name="upassword">
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input type="submit" name="simpan" value="simpan">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
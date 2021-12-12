<?php
require "proses/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <?php
        require "header.php";
        ?>
    </div>
    <div class="container-fluid">
        <div class="row row-col">
            <div class="col">
                <?php
                require "sidebar.php";
                ?>
            </div>
            <!-- isi konten -->
            <div class="col-10">
                <div class="card ms-1 mt-4">
                    <h3 class="card-header">
                        <svg class="bi " width="28" height="26">
                            <use xlink:href="#grid" />
                        </svg>Dropship
                    </h3>
                </div>
                <hr>
                <table class="table table-striped  table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id Dropshipper</th>
                            <th scope="col">Nama Dropshipper</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No.Hp</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                            <!-- isi table -->
                        </tr>
                    </thead>
                    <tbody>
                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ModalTambah">Tambah Data Dropshipper</button>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
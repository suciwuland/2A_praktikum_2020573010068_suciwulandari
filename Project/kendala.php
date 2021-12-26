<?php
require "proses/session.php";
require "proses/koneksi.php";

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
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sidebars.css" rel="stylesheet">
    <title>Document</title>
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
                        <svg class="bi me-2" width="28" height="26">
                            <use xlink:href="#grid" />
                        </svg>Kendala
                    </h3>
                </div>
                <hr>
                <!-- modal tambah -->
                <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Masukkan Kendala</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="proses/proses_tambah_kendala.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="id_kendala" id="floatingInput" autofocus>
                                        <label for="floatingInput">Id Kendala</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" name="tgl" id="floatingInput" autofocus>
                                        <label for="floatingInput">Tanggal</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-select mb-3" aria-label="Default select example"
                                         id="floatingInput" name="user" required>
                                            <?php
                                            $user = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbkendala ken
                                                LEFT JOIN tbuser usr ON ken.user= usr.id_user"
                                            );
                                            while ($query = mysqli_fetch_array($user)) {
                                            ?>
                                                <option value="<?= $query['id_user'] ?>">
                                                    <?= $query['id_user'] . "-" . $query['usename'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label for="floatingPassword">User</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="kendala" id="floatingPassword"></textarea>
                                        <label for="floatingPassword">Kendala</label>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="tambah" value="Lapor">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- akhir modal tambah -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
                data-bs-target="#ModalTambah">Laporkan Masalah</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
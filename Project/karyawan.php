<?php
require "proses/session.php";
require "proses/koneksi.php";
$select = mysqli_query($conn, "SELECT * FROM tbprofile pro 
LEFT JOIN tbuser usr ON pro.user=usr.id_user WHERE usr.level='karyawan'");
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
                        <svg class="bi " width="28" height="26">
                            <use xlink:href="#grid" />
                        </svg>Karyawan
                    </h3>
                </div>
                <hr>
                <!-- modal tambah -->
                <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Karyawan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="proses/proses_tambah_karyawan.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="id_karyawan" id="floatingInput" autofocus>
                                        <label for="floatingInput">Id Karyawan </label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select mb-3" aria-label="Default select example" id="floatingInput" name="user" required>
                                            <?php
                                            $user = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbuser usr WHERE usr.level='karyawan'"
                                            );
                                            while ($query = mysqli_fetch_array($user)) {
                                            ?>
                                                <option value="<?= $query['id_user'] ?>">
                                                    <?= $query['id_user'] . "-" . $query['username'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label for="floatingPassword">User</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="nama_karyawan" id="floatingInput" autofocus>
                                        <label for="floatingInput">Nama Karyawan</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="alamat" id="floatingPassword">
                                        <label for="floatingPassword">Alamat</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="telepon" id="floatingPassword">
                                        <label for="floatingPassword">No Telepon</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="email" id="floatingPassword">
                                        <label for="floatingPassword">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="tp_lahir" id="floatingPassword">
                                        <label for="floatingPassword">Tempat Lahir</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" name="tgl_lahir" id="floatingPassword">
                                        <label for="floatingPassword">Tanggal Lahir</label>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="tambah" value="Tambah">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- akhir modal tambah -->
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ModalTambah">Tambah Data Karyawan</button>

                <table class="table table-striped  table-hover">
                    <br>
                    <br>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id Karyawan</th>
                            <th scope="col">User</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Aksi</th>
                            <!-- isi table -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        while ($hasil = mysqli_fetch_array($select)) {
                            $no++;
                        ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <th scope="row"><?= $hasil['id_profile'] ?></th>
                                <td><?= $hasil['id_user'];?> - <?= $hasil['username']; ?></td>
                                <td><?= $hasil['nama']; ?></td>
                                <td><?= $hasil['alamat']; ?></td>
                                <td><?= $hasil['no_hp']; ?></td>
                                <td><?= $hasil['email'] ?></td>
                                <td><?= $hasil['tp_lahir'] ?></td>
                                <td><?= $hasil['tgl_lahir'] ?></td>
                                <?php
                                if ($row['level'] == 'Admin') {
                                ?>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit<?= $hasil["id_profile"]; ?>" name="edit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></button>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldelete<?= $hasil["id_profile"]; ?>" name="delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg></button>
                                    </td>
                                <?php
                                }
                                ?>
                                <!-- akhir isi table -->
                                <!-- Modal edit -->
                                <div class="modal fade" id="modaledit<?= $hasil["id_profile"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="proses/proses_edit_karyawan.php" method="post">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="id_karyawan" id="floatingInput" value="<?= $hasil['id_profile'] ?>" readonly>
                                                        <label for="floatingInput">Id Karyawan</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select mb-3" aria-label="Default select example" id="floatingInput" name="user" required>
                                                            <?php
                                                            $user = mysqli_query(
                                                                $conn,
                                                                "SELECT * FROM tbuser usr WHERE usr.level='karyawan'"
                                                            );
                                                            while ($query = mysqli_fetch_array($user)) {
                                                            ?>
                                                                <option value="<?= $query['id_user'] ?>">
                                                                    <?= $query['id_user'] . "-" . $query['username'] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="floatingPassword">User</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="nama_karyawan" id="floatingInput" value="<?= $hasil['nama'] ?>" autofocus>
                                                        <label for="floatingInput">Nama Karyawan</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="alamat" id="floatingPassword" value="<?= $hasil['alamat'] ?>" autofocus>
                                                        <label for="floatingPassword">Alamat</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="telepon" id="floatingPassword" value="<?= $hasil['no_hp'] ?>" autofocus>
                                                        <label for="floatingPassword">No Telepon</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="email" id="floatingPassword" value="<?= $hasil['email'] ?>" autofocus>
                                                        <label for="floatingPassword">Email</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="tp_lahir" id="floatingPassword" value="<?= $hasil['tp_lahir'] ?>" autofocus>
                                                        <label for="floatingPassword">Tempat Lahir</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="tgl_lahir" id="floatingPassword" value="<?= $hasil['tgl_lahir'] ?>" autofocus>
                                                        <label for="floatingPassword">Tanggal Lahir</label>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <input type="submit" class="btn btn-primary" name="edit" value="EDIT">
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- akhir modal edit-->
                                <!-- Modal delete -->
                                <div class="modal fade" id="modaldelete<?= $hasil["id_profile"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="proses/delete_karyawan.php" method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_profile" value="<?= $hasil['id_profile']; ?>">
                                                    <p style="color: red;">Apakah anda akan menghapus data
                                                        "<?= $hasil['nama']; ?>" ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" name="hapus" value="Delete">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- akhir modal delete-->
                            <?php
                        }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>
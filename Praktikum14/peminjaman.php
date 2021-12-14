<?php
include 'proses/session.php';
$select = mysqli_query($conn, "SELECT * FROM tb_barang");
$sql = mysqli_query($conn, "SELECT * FROM tb_peminjaman");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sistem Informasi Peminjaman Barang Jurusan TIK</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        require "header.php";
        ?>
    </div>

    <div class="container-fluid em-1 mt-2">
        <div class="row">
            <div class="col-3">
                <?php
                require "sidebar.php";
                ?>
            </div>
            <div class="col-9 ">
                <div class="card ms-1 mt-4">
                    <h3 class="card-header">
                        <svg class="bi me-2" width="28" height="26">
                            <use xlink:href="#grid" />
                        </svg>Peminjaman
                    </h3>
                </div>
                <hr>
                <!-- Button Tambah barang -->
                <button style="background-color:lightsteelblue; color: black;" type="button" class="btn btn-primary mb-3 mt-2" data-bs-toggle="modal" data-bs-target="#ModalTambah">Tambah Data Barang</button>
                <!-- Button list -->
                <button style="background-color:lightsteelblue; color: black;" type="button" class="btn btn-primary mb-3 mt-2" data-bs-toggle="modal" data-bs-target="#listpeminjaman">List Peminjaman</button>
                <table class="table table-striped  table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Barang</th>
                            <th scope="col">User</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        while ($hasil = mysqli_fetch_array($sql)) {
                            $no++;
                        ?>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $hasil['barang']; ?></td>
                                <td><?= $hasil['user']; ?></td>
                                <td><?= $hasil['status']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit<?= $hasil["barang"]; ?>" name="edit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldelete<?= $hasil["barang"]; ?>" name="delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg></button>
                                </td>
                            <tr>
                                <!-- akhir isi table -->
                            <?php
                        }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Barang -->
    <?php foreach ($select as $sl) : ?>
    <div class="modal fade" id="exampleadd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="proses/proses_tambah.php" method="POST">
                        <div class="mb-1">
                            <label for="nama_barang" class="col-form-label">Nama Barang:</label>
                            <input type="text" name="nama_barang" class="form-control" id="nama_barang">
                        </div>
                        <div class="mb-1">
                            <label for="keterangan" class="col-form-label">Keterangan Barang:</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan">
                        </div>
                        <div class="mb-1">
                            <label for="gambar" class="col-form-label">Gambar Barang:</label>
                            <input type="text" name="gambar" class="form-control" id="gambar">
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- List Peminjaman -->
    <div class="modal fade" id="examplelist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">List Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">barang</th>
                                <th scope="col">Gambar</th>

                                <th scope="col">user</th>
                                <th scope="col">status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php while ($sl = mysqli_fetch_array($sql)) { ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $sl['barang']; ?></td>
                                    <td><? $sl['gambar']; ?></td>
                                    <td><?= $sl['nama']; ?></td>
                                    <td>
                                        <?php
                                        $status = "";
                                        if ($sl['status'] == 1) {
                                            $status = 'Disetujui';
                                        } else if ($sl['status'] == 2) {
                                            $status = 'Pending';
                                        } else if ($sl['status'] == 3) {
                                            $status = 'Tidak Disetujui';
                                        }
                                        echo $status;
                                        ?>
                                    </td>
                                </tr>

                                <?php $i++ ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal edit -->
        <?php foreach ($select as $sl) : ?>
        <div class="modal fade" id="modaledit<?= $hasil["kode_barang"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="proses/proses_edit_data_barang.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="kode_barang" id="floatingInput" value="<?= $hasil['kode_barang'] ?>" readonly>
                                <label for="floatingInput">Kode Barang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nama_barang" id="floatingInput" value="<?= $hasil['nama_barang'] ?>" autofocus>
                                <label for="floatingInput">Nama Barang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="ket" id="floatingPassword" value="<?= $hasil['keterangan'] ?>">
                                <label for="floatingPassword">Keterangan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="stok" id="floatingPassword" value="<?= $hasil['stock'] ?>">
                                <label for="floatingPassword">Stok</label>
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02" name="gambar">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
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
        <?php endforeach; ?>
        <!-- akhir modal edit-->

        <!-- Modal delete -->
        <?php foreach ($select as $sl) : ?>
        <div class="modal fade" id="modaldelete<?= $hasil["kode_barang"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="proses/delete.php" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="kode_barang" value="<?= $hasil['kode_barang']; ?>">
                            <input type="hidden" name="gambar" value="<?= $hasil['gambar'] ?>">
                            <p style="color: red;">Apakah anda akan menghapus data
                                "<?= $hasil['nama_barang']; ?>" ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="hapus" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- akhir modal delete-->
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->

        <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->

        <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/sidebars.js"></script>

</body>

</html>
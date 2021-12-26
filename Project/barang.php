 <?php
require "proses/session.php";
require "proses/koneksi.php";
$select = mysqli_query($conn, "SELECT * FROM tbbarang brg
LEFT JOIN tbsatuan sat ON brg.satuan = sat.id_satuan")
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
                        </svg>Barang
                    </h3>
                </div>
                <hr>
                <!-- modal tambah -->
                <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="proses/proses_tambah_barang.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="kode_barang" id="floatingInput" autofocus>
                                        <label for="floatingInput">Kode Barang</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="nama_barang" id="floatingInput" autofocus>
                                        <label for="floatingInput">Nama Barang</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select mb-3" aria-label="Default select example" id="floatingInput" 
                                        name="satuan" required>
                                            <?php
                                            $barang = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbsatuan"
                                            );
                                            while ($query = mysqli_fetch_array($barang)) {
                                            ?>
                                                <option value="<?= $query['id_satuan'] ?>">
                                                    <?= $query['id_satuan'] . "-" . $query['satuan'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label for="floatingPassword">Satuan</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="stok" id="floatingInput" autofocus>
                                        <label for="floatingInput">Stok</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="harga" id="floatingInput" autofocus>
                                        <label for="floatingInput">Harga</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="keterangan" id="floatingInput" autofocus>
                                        <label for="floatingInput">Keterangan</label>
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
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ModalTambah">Tambah Data Barang</button>

                <table class="table table-striped  table-hover">
                    <br>
                    <br>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Keterangan</th>
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
                                <th scope="row"><?= $hasil['kode_barang'] ?></th>
                                <td><?= $hasil['nama_barang']; ?></td>
                                <td><?= $hasil['satuan']; ?>  </td>
                                <td><?= $hasil['stok']; ?></td>
                                <td><?= $hasil['harga'] ?></td>
                                <td><?= $hasil['keterangan'] ?></td>
                                <?php
                                if ($row['level'] == 'Admin') {
                                ?>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit<?= $hasil["kode_barang"]; ?>" name="edit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></button>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldelete<?= $hasil["kode_barang"]; ?>" name="delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg></button>
                                    </td>
                                <?php
                                }
                                ?>
                                <!-- akhir isi table -->
                                <!-- Modal edit -->
                                <div class="modal fade" id="modaledit<?= $hasil["kode_barang"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="proses/proses_edit_barang.php" method="post">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="kode_barang" id="floatingInput" value="<?= $hasil['kode_barang'] ?>" readonly>
                                                        <label for="floatingInput">Kode Barang</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="nama_barang" id="floatingInput" value="<?= $hasil['nama_barang'] ?>" autofocus>
                                                        <label for="floatingInput">Nama Barang</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select mb-3" aria-label="Default select example"
                                                        id="floatingInput" name="satuan" required>
                                                            <?php
                                                            $barang = mysqli_query(
                                                                $conn,
                                                                "SELECT * FROM tbsatuan"
                                                            );
                                                            while ($query = mysqli_fetch_array($barang)) {
                                                            ?>
                                                                <option value="<?= $query['id_satuan'] ?>">
                                                                    <?= $query['id_satuan'] . "-" . $query['satuan'] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="floatingPassword">Satuan</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" name="stok" id="floatingPassword" value="<?= $hasil['stok'] ?>" autofocus>
                                                        <label for="floatingPassword">Stok</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="harga" id="floatingPassword" value="<?= $hasil['harga'] ?>" autofocus>
                                                        <label for="floatingPassword">Harga</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="keterangan" id="floatingPassword" value="<?= $hasil['keterangan'] ?>" autofocus>
                                                        <label for="floatingPassword">Keterangan</label>
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
                                <div class="modal fade" id="modaldelete<?= $hasil["kode_barang"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="proses/delete_barang.php" method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="kode_barang" value="<?= $hasil['kode_barang']; ?>">
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
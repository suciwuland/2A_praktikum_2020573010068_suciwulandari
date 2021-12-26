<?php
require "proses/session.php";
require "proses/koneksi.php";
$select = mysqli_query($conn, "SELECT * FROM tbpembelian pem 
LEFT JOIN tbbarang brg ON pem.kode_barang=brg.kode_barang
LEFT JOIN tbsupplier sup ON pem.supplier=sup.id_supplier");
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
                        </svg>Pembelian
                    </h3>
                </div>
                <hr>
                <!-- modal tambah -->
                <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pembelian</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="proses/proses_tambah_pembelian.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="id_pembelian" id="floatingInput" autofocus>
                                        <label for="floatingInput">Id Pembelian</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" name="tgl" id="floatingInput" autofocus>
                                        <label for="floatingInput">Tanggal</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-select mb-3" aria-label="Default select example" 
                                        id="floatingInput" name="barang" required>
                                            <?php
                                            $barang = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbbarang"
                                            );
                                            while ($query = mysqli_fetch_array($barang)) {
                                            ?>
                                                <option value="<?= $query['kode_barang'] ?>">
                                                    <?= $query['kode_barang'] . "-" . $query['nama_barang'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label for="floatingPassword">Barang</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="jumlah" id="floatingPassword">
                                        <label for="floatingPassword">Jumlah</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="harga" id="floatingPassword">
                                        <label for="floatingPassword">Harga</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select mb-3" aria-label="Default select example" 
                                        d="floatingInput" name="supplier" required>
                                            <?php
                                            $supplier = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbsupplier"
                                            );
                                            while ($query= mysqli_fetch_array($supplier)) {
                                            ?>
                                                <option value="<?= $query['id_supplier'] ?>">
                                                    <?= $query['id_supplier'] . "-" . $query['nama'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <label for="floatingPassword">Supplier</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="ket" id="floatingPassword">
                                        <label for="floatingPassword">Keterangan</label>
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
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" 
                data-bs-target="#ModalTambah">Tambah Data Pembelian</button>

                <table class="table table-striped  table-hover">
                    <br>
                    <br>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id Pembelian</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Supplier</th>
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
                                <th scope="row"><?= $hasil['id_pembelian'] ?></th>
                                <td><?= $hasil['tanggal']; ?></td>
                                <td><?php echo $hasil['kode_barang']; ?> -<?= $hasil['nama_barang']; ?></td>
                                <td><?= $hasil['jumlah'] ?></td>
                                <td><?= $hasil['harga'] ?></td>
                                <td><?= $hasil['supplier']; ?> -<?= $hasil['nama']; ?></td>
                                <td><?= $hasil['ket'] ?></td>
                                <?php
                                if ($row['level'] == 'Admin') {
                                ?>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit<?= $hasil["id_pembelian"]; ?>" name="edit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></button>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldelete<?= $hasil["id_pembelian"]; ?>" name="delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg></button>
                                    </td>
                                <?php
                                }
                                ?>
                                <!-- akhir isi table -->
                                <!-- Modal edit -->
                                <div class="modal fade" id="modaledit<?= $hasil["id_pembelian"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="proses/proses_edit_pembelian.php" method="post">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="id_pembelian" id="floatingInput" value="<?= $hasil['id_pembelian'] ?>" readonly>
                                                        <label for="floatingInput">Id Pembelian</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" name="tgl" id="floatingInput" value="<?= $hasil['tanggal'] ?>" autofocus>
                                                        <label for="floatingInput">Tanggal</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select mb-3" aria-label="Default select example" 
                                                        id="floatingInput" name="barang" required>
                                                            <?php
                                                            $barang = mysqli_query(
                                                                $conn,
                                                                "SELECT * FROM tbbarang"
                                                            );
                                                            while ($query = mysqli_fetch_array($barang)) {
                                                            ?>
                                                                <option value="<?= $query['kode_barang'] ?>">
                                                                    <?= $query['kode_barang'] . "-" . $query['nama_barang'] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="floatingPassword">Barang</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" name="jumlah" id="floatingPassword" value="<?= $hasil['jumlah'] ?>" autofocus>
                                                        <label for="floatingPassword">Jumlah</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="harga" id="floatingPassword" value="<?= $hasil['harga'] ?>" autofocus>
                                                        <label for="floatingPassword">Harga</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select mb-3" aria-label="Default select example" 
                                                        id="floatingInput" name="supplier" required>
                                                            <?php
                                                            $supplier = mysqli_query(
                                                                $conn,
                                                                "SELECT * FROM tbsupplier"
                                                            );
                                                            while ($query = mysqli_fetch_array($supplier)) {
                                                            ?>
                                                                <option value="<?= $query['id_supplier'] ?>">
                                                                    <?= $query['id_supplier'] . "-" . $query['nama'] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        <label for="floatingPassword">Supplier</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="ket" id="floatingPassword" value="<?= $hasil['ket'] ?>" autofocus>
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
                                <div class="modal fade" id="modaldelete<?= $hasil["id_pembelian"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="proses/delete_pembelian.php" method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_pembelian" value="<?= $hasil['id_pembelian']; ?>">
                                                    <p style="color: red;">Apakah anda akan menghapus data pembelian "<?= $hasil['nama_barang']; ?>" pada tanggal
                                                        "<?= $hasil['tanggal']; ?>" ?</p>
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
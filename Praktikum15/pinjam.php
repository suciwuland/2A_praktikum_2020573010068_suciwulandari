<?php
require "proses/session.php";
require "proses/koneksi.php";


//query untuk tabel data peminjaman user
$select = mysqli_query(
    $conn,
    "SELECT *
    FROM tb_peminjaman PEM
    LEFT JOIN tb_barang BRG ON PEM.barang = BRG.kode_barang
    LEFT JOIN tb_matakuliah MK ON PEM.matakuliah = MK.kode_matakuliah
    LEFT JOIN tb_dosen DSN ON MK.dosen = DSN.nip
    LEFT JOIN tb_user USR ON USR.id = PEM.user"
);

//query untuk modal list peminjaman
$sql = mysqli_query(
    $conn,
    "SELECT *
    FROM tb_peminjaman PEM
    RIGHT JOIN tb_barang BRG ON PEM.barang = BRG.kode_barang
    LEFT JOIN tb_mahasiswa MHS ON PEM.user = MHS.id_user
    LEFT JOIN tb_matakuliah MK ON PEM.matakuliah = MK.kode_matakuliah
    LEFT JOIN tb_dosen DSN ON MK.dosen = DSN.nip"
);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>SIPBAR - Sistem Informasi Peminjaman Barang Jurusan TIK</title>
</head>

<body>
    <div class="container-fluid">

        <!-- Navbar header -->
        <?php require "header.php"; ?>
        <!-- akhir header -->
    </div>
    <div class="container-fluid em-1 mt-2">
        <div class="row">
            <div class="col-3">
                <!-- sidebar -->
                <?php require "sidebar.php"; ?>
                <!-- akhir sidebar -->
            </div>
            <!-- isi konten -->
            <div class="col-9">
                <div class="card ms-1 mt-4">
                    <h3 class="card-header">
                        <svg class="bi me-2" width="28" height="26">
                            <use xlink:href="#grid" />
                        </svg>Peminjaman Barang
                    </h3>
                </div>
                <hr>

                <button style="background-color:lightsteelblue; color:black;" type="button" class="btn btn-primary mb-3 mt-2" data-bs-toggle="modal" data-bs-target="#ModalTambah">Tambah Peminjaman</button>
                <button style="background-color:lightsteelblue; color:black;" type="button" class="btn btn-primary mb-3 mt-2" data-bs-toggle="modal" data-bs-target="#ModalListPeminjaman">List Peminjaman</button>
                <!-- modal tambah -->
                <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peminjaman</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="proses/proses_tambah_peminjaman.php" method="POST">
                                <div class="modal-body">
                                    <div class="barang">
                                        <label for="level" class="form-label">Nama Barang</label>
                                        <select class="form-select mb-3" aria-label="Default select example" id="barang" name="brg" required>
                                            <?php
                                            $barang = mysqli_query($conn, "SELECT * FROM tb_barang");
                                            while ($hasil = mysqli_fetch_array($barang)) {
                                            ?>
                                                <option value="<?= $hasil['kode_barang'] ?>">
                                                    <?= $hasil['kode_barang'] . " " . $hasil['nama_barang'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="matakuliah">
                                        <label for="matakuliah" class="form-label">Mata Kuliah</label>
                                        <select class="form-select mb-3" aria-label="Default select example" id="matakuliah" name="mk" required>
                                            <?php
                                            $matakuliah = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tb_matakuliah MTK
                                                        LEFT JOIN tb_dosen DSN ON MTK.dosen = DSN.nip"
                                            );
                                            while ($hasil = mysqli_fetch_array($matakuliah)) {
                                            ?>
                                                <option value="<?= $hasil['kode_matakuliah'] ?>">
                                                    <?= $hasil['kode_matakuliah'] . " " . $hasil['nama_matakuliah'] . " - " . $hasil['nama_dosen'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="wkt_kembali">
                                        <label for="wkt_kembali" class="form-label">Waktu Pengembalian</label>
                                        <input type="date" class="form-select mb-3" aria-label="Default select example" id="wkt_kembali" name="wkt_kembali" required>
                                        </input>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="pinjam" value="Pinjam">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- akhir modal tambah -->

                <!-- modal list peminjaman -->
                <div class="modal fade" id="ModalListPeminjaman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">List Data Peminjaman</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode Barang</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Peminjam</th>
                                            <th scope="col">Waktu Peminjaman</th>
                                            <th scope="col">Waktu Pengembalian</th>
                                            <th scope="col">Mata Kuliah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        while ($hasil = mysqli_fetch_array($sql)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $no ?></th>
                                                <td><?= $hasil['kode_barang'] ?></td>
                                                <td><?= $hasil['nama_barang'] ?></td>
                                                <?php
                                                $status = "";
                                                if ($hasil['status'] == 1) {
                                                    $status = "Berhasil";
                                                } elseif ($hasil['status'] == 2) {
                                                    $status = "Pending";
                                                } elseif ($hasil['status'] == 3) {
                                                    $status = "Ditolak";
                                                }
                                                ?>
                                                <td><?= $status ?></td>
                                                <td>
                                                    <?php echo $hasil['nama'] . "<br>" ?>
                                                    <?php echo $hasil['kelas'] . "<br>" ?>
                                                    <?php echo $hasil['prodi'] ?>
                                                </td>
                                                <td><?= $hasil['waktu_peminjaman'] ?></td>
                                                <td><?= $hasil['waktu_pengembalian'] ?></td>
                                                <td>
                                                    <?php echo $hasil['nama_matakuliah'] . "<br>" ?>
                                                    <?php echo $hasil['nama_dosen'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir modal peminjaman -->

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Waktu Peminjaman</th>
                            <th scope="col">Waktu Pengembalian</th>
                            <th scope="col">Mata Kuliah</th>
                            <th scope="col">Status</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        while ($query = mysqli_fetch_array($select)) {
                            $no++;
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $query['kode_barang'] ?></td>
                                <td><?= $query['nama_barang'] ?></td>
                                <td><?= $query['keterangan'] ?></td>
                                <td><?php echo date("d-m-Y H:i:s", strtotime($query['waktu_peminjaman'])); ?></td>
                                <td><?php echo date("d-m-Y H:i:s", strtotime($query['waktu_pengembalian'])); ?></td>
                                <td><?= $query['nama_matakuliah'] ?> - <?= $query['nama_dosen'] ?> </td>
                                <td>
                                    <?php
                                    $status = "";
                                    if ($query['status'] == 1) {
                                        echo "<span class='badge bg-success'>Disetujui</span>";
                                    } elseif ($query['status'] == 2) {
                                        echo "<span class='badge bg-secondary'>Pending</span>";
                                    } elseif ($query['status'] == 3) {
                                        echo "<span class='badge bg-danger'>Ditolak</span>";
                                    } elseif ($query['status'] == 4) {
                                        echo "<span class='badge bg-primary'>Telah Dikembalikan</span>";
                                    }elseif ($query['status'] == 5) {
                                        echo "<span class='badge bg-primary'>Proses DikembalikanDikembalikan</span>";
                                    }
                                    ?>
                                </td>
                                <td><img src="<?= "gambar/barang/" . $query['gambar'] . ".jpg"; ?>" width="150" height="120" class="rounded" alt=""></td>
                                <td>
                                    <?php if ($query['status'] == 2) { ?>
                                        <button type="button" class="btn btn-primary" name="edit" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $query['kode_barang']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>
                                    <?php } elseif ($query['status'] == 1) { ?>
                                        <button type="button" class="btn btn-success" name="kembalikan" data-bs-toggle="modal" data-bs-target="#ModalKembalikan<?= $query['kode_barang']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shift" viewBox="0 0 16 16">
                                                <path d="M7.27 2.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v3a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-3H1.654C.78 10.5.326 9.455.924 8.816L7.27 2.047zM14.346 9.5 8 2.731 1.654 9.5H4.5a1 1 0 0 1 1 1v3h5v-3a1 1 0 0 1 1-1h2.846z" />
                                            </svg>
                                        </button>
                                    <?php } elseif ($query['status'] == 3) { ?>
                                        <button type="button" class="btn btn-danger" name="delete" data-bs-toggle="modal" data-bs-target="#ModalDelete<?= $query['kode_barang']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg>
                                        </button>
                                    <?php } elseif ($query['status'] == 5) { ?>
                                        <button type="button" class="btn btn-danger" name="proses_kembalikan" data-bs-toggle="modal" data-bs-target="#ModalProsesKembalikan<?= $query['kode_barang']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                            </svg>
                                        </button>
                                    <?php } ?>
                                </td>

                                <!-- modal edit -->
                                <div class="modal fade" id="ModalEdit<?= $query['kode_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="proses/proses_edit_barang.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="kd-brg" id="floatingInput" value="<?= $query['kode_barang'] ?>" readonly>
                                                        <label for="floatingInput">Kode Barang</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="nm-brg" id="floatingInput" value="<?= $query['nama_barang'] ?>" autofocus>
                                                        <label for="floatingInput">Nama Barang</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="ket" id="floatingPassword" value="<?= $query['keterangan'] ?>">
                                                        <label for="floatingPassword">Keterangan</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" name="stok" id="floatingPassword" value="<?= $query['stock'] ?>">
                                                        <label for="floatingPassword">Stok</label>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="file" class="form-control" id="inputGroupFile02" name="gambar">
                                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" name="edit" value="EDIT">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- akhir modal edit -->

                                <!-- modal hapus -->
                                <div class="modal fade" id="ModalDelete<?= $query['kode_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="proses/proses_hapus_barang.php" method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="kode_barang" value="<?= $query['kode_barang'] ?>">
                                                    <input type="hidden" name="gambar" value="<?= $query['gambar'] ?>">
                                                    <p style="color: red;">Apakah anda akan menghapus data
                                                        "<?= $query['nama_barang']; ?>" ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-secondary" name="hapus" value="Delete">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- akhir modal hapus -->

                                <!-- modal Kembalikan -->
                                <div class="modal fade" id="ModalKembalikan<?= $query['kode_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Mengambalikan Peminjaman</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="proses/proses_kembalikan_peminjaman.php" method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_peminjaman" value="<?= $query['id_peminjaman'] ?>">
                                                    <p style="color: red;">Apakah anda akan mengembalikan peminjaman barang
                                                        "<?= $query['nama_barang']; ?>" ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-secondary" name="kembalikan" value="Kembalikan">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- akhir modal kembalikan -->

                                <!-- modal proses setuju dikembalikan -->
                                <div class="modal fade" id="ModalProsesKembalikan<?= $query['kode_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Mengambalikan Peminjaman</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="proses/proses_setuju_kembalikan_peminjaman.php" method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_peminjaman" value="<?= $query['id_peminjaman'] ?>">
                                                    <p style="color: red;">Apakah anda setuju barang
                                                        "<?= $query['nama_barang']; ?>" dikembalikan?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-secondary" name="setuju_kembalikan" value="Setuju Dikembalikan">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- akhir modal proses setuju kembalikan -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- akhir isi konten -->
    </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebars.js"></script>
</body>

</html>
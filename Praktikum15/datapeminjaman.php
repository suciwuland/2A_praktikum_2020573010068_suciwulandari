<?php
include 'proses/session.php';
$select = mysqli_query($conn, "SELECT * FROM tb_peminjaman pem 
LEFT JOIN tb_barang brg ON pem.barang=brg.kode_barang
LEFT JOIN tb_matakuliah mk ON pem.matakuliah=mk.kode_matakuliah
LEFT JOIN tb_dosen dos ON mk.dosen=dos.nip
LEFT JOIN tb_user usr ON pem.user=usr.id 
WHERE username='$_SESSION[username]'");
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

            <div class="col-9">
                <div class="card ms-1 mt-4">
                    <h3 class="card-header">
                        <svg class="bi me-2" width="28" height="26">
                            <use xlink:href="#grid" />
                        </svg>Data Peminjaman
                    </h3>
                </div>
                <hr>
                   
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
                                        echo "<span class='badge bg-primary'>Dikembalikan</span>";
                                    }
                                    ?>
                                </td>
                                <td><img src="<?= "gambar/barang/" . $query['gambar'] . ".jpg"; ?>" width="150" height="120" class="rounded" alt=""></td>
                                <td>
                                    <button type="button" class="btn btn-primary" name="approve" data-bs-toggle="modal" data-bs-target="#ModalApprove<?= $query['kode_barang']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                                        </svg>
                                </button>
                                    <button type="button" class="btn btn-warning" name="edit" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $query['kode_barang']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-danger" name="delete" data-bs-toggle="modal" data-bs-target="#ModalDelete<?= $query['kode_barang']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg>
                                    </button>
                                </td>
                                <!-- modal edit -->
                                <div class="modal fade" id="ModalEdit<?= $query['kode_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <input type="submit" class="btn btn-primary" name="edit" value="Edit">
                                                    </div>
                                                </form>
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
                            </tr>
                        <?php } ?>
                    </tbody>
                </div>
            </div>
        </div>
    </div>
    </div>

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
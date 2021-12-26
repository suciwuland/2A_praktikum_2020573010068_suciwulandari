<?php
require "proses/session.php";
require "proses/koneksi.php";
$select = mysqli_query($conn, "SELECT * FROM tbpenjualan pen
LEFT JOIN tbbarang brg ON pen.kode_barang=brg.kode_barang
LEFT JOIN tbprofile pro ON pen.karyawan=pro.id_profile");
$select2 = mysqli_query($conn, "SELECT * FROM tbpembelian pem 
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
                        </svg>Laporan
                    </h3>
                </div>
                <hr>
                <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapsepenjualan" aria-expanded="false" aria-controls="collapseWidthExample">
                    Laporan Penjualan
                </button>
                <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapsepembelian" aria-expanded="false" aria-controls="collapseWidthExample">
                    Laporan Pembelian
                </button>
                <div class="collapse collapse-horizontal" id="collapsepenjualan">
                    <br>
                    <div class="card card-body" style="width:auto">
                        <h3 class="card-header">
                            Laporan Penjualan
                        </h3>
                        <table class="table w-100 table-bordered table-hover" id="laporan_penjualan">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Id Transaksi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Barang</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Total Bayar</th>
                                    <th scope="col">Nota</th>
                                    <th scope="col">Karyawan</th>
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
                                        <th scope="row"><?= $hasil['id_transaksi'] ?></th>
                                        <td><?= $hasil['tanggal']; ?></td>
                                        <td><?php echo $hasil['kode_barang']; ?> -<?= $hasil['nama_barang']; ?></td>
                                        <td><?= $hasil['jumlah'] ?></td>
                                        <td><?= $hasil['total_bayar'] ?></td>
                                        <td><?= $hasil['nota'] ?></td>
                                        <td><?= $hasil['karyawan']; ?> -<?= $hasil['nama']; ?></td>
                                    <?php
                                }
                                    ?>
                                    <!-- akhir isi table -->
                        </table>
                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" 
                data-bs-target="#Modal">Cetak Laporan Penjualan</button>

                    </div>
                </div>
                <div class="collapse collapse-horizontal" id="collapsepembelian">
                    <br>
                    <div class="card card-body" style="width:auto">
                        <h3 class="card-header">
                            Laporan Pembelian
                        </h3>
                        <table class="table w-100 table-bordered table-hover" id="laporan_pembelian">

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
                                    <!-- isi table -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                while ($hasil = mysqli_fetch_array($select2)) {
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
                                }
                                    ?>
                                    <!-- akhir isi table -->
                        </table>
                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" 
                data-bs-target="#Modal">Cetak Laporan Pembelian</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebars.js"></script>
    </body>

</html>
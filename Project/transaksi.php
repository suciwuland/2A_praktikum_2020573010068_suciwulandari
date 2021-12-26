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
						<svg class="bi me-2" width="28" height="26">
							<use xlink:href="#grid" />
						</svg>Transaksi
					</h3>
				</div>
				<hr>
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-sm-5">
								<div class="form-group">
									<label>Kode Barang</label>
									<div class="form-inline">
										<select id="kode_barang" class="form-control select2 col-sm-6" name="kode_barang">
										<option value=" ">
											<?php
                                            $barang = mysqli_query(
                                                $conn,
                                                "SELECT * FROM tbbarang brg
                                                LEFT JOIN tbsatuan sat ON brg.satuan = sat.id_satuan"
                                            );
                                            while ($query = mysqli_fetch_array($barang)) {
                                            ?>
												
                                                <option value="<?= $query['kode_barang'] ?>">
                                                    <?= $query['kode_barang'] . "-" . $query['nama_barang'] . "-" . $query['satuan']?>
                                                </option>
                                            <?php } ?>
                                        </select>
										<span class="ml-3 text-muted" id="nama_barang"></span>
									</div>
									<small class="form-text text-muted" id="sisa"></small>
								</div>
								<br>
								<div class="form-group">
									<label>Jumlah</label>
									<input type="number" class="form-control col-sm-6" placeholder="Jumlah" id="jumlah" onkeyup="checkEmpty()">
								</div>
								<br>
								<div class="form-group">
									<button id="tambah" class="btn btn-success" onclick="checkStok()" disabled>Tambah</button>
									<button id="bayar" class="btn btn-success" data-toggle="modal" data-target="#modal" disabled>Bayar</button>
								</div>
							</div>
							<div class="col-sm-6 d-flex justify-content-end text-right nota">
								<div>
									<div class="mb-0">
										<b class="mr-2">Nota</b> <span id="nota"></span>
									</div>
									<span id="total" style="font-size: 80px; line-height: 1" class="text-danger">0</span>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<table class="table w-100 table-bordered table-hover" id="transaksi">
							<thead>
								<tr>
									<th>Barcode</th>
									<th>Nama</th>
									<th>Harga</th>
									<th>Jumlah</th>
									<th>Actions</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>


			</div>

			<div class="modal fade" id="modal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Bayar</h5>
							<button class="close" data-dismiss="modal">
								<span>&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="form">
								<div class="form-group">
									<label>Tanggal</label>
									<input type="text" class="form-control" name="tanggal" id="tanggal" required>
								</div>
								<div class="form-group">
									<label>Pelanggan</label>
									<select name="pelannggan" id="pelanggan" class="form-control select2"></select>
								</div>
								<div class="form-group">
									<label>Jumlah Uang</label>
									<input placeholder="Jumlah Uang" type="number" class="form-control" name="jumlah_uang" onkeyup="kembalian()" required>
								</div>
								<div class="form-group">
									<label>Diskon</label>
									<input placeholder="Diskon" type="number" class="form-control" onkeyup="kembalian()" name="diskon">
								</div>
								<div class="form-group">
									<b>Total Bayar:</b> <span class="total_bayar"></span>
								</div>
								<div class="form-group">
									<b>Kembalian:</b> <span class="kembalian"></span>
								</div>
								<button id="add" class="btn btn-success" type="submit" onclick="bayar()" disabled>Bayar</button>
								<button id="cetak" class="btn btn-success" type="submit" onclick="bayarCetak()" disabled>Bayar Dan Cetak</button>
								<button class="btn btn-danger" data-dismiss="modal">Close</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
	<script src="js/sidebars.js"></script>
	
	<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

</body>

</html>
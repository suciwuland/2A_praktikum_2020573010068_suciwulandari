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
				<div class="row">
					<div class="col-15">
						<div class="card ms-1 mt-4">
							<h3 class="card-header">
								<svg class="bi " width="28" height="26">
									<use xlink:href="#grid" />
								</svg>Transaksi
							</h3>
						</div>
						<hr>
					</div>
					<div class="row row-cols-2">
						<div class="col">
							<div class="card text-white bg-secondary ms-3 mt-3" style="max-width: 20rem; height:10rem">
								<div class="card-header">Cari Barang</div>
								<div class="card-body">
									<form>
										<input type="search" name="cari"><button name="cari" id="cari">cari</button>
									</form>
								</div>
							</div>
						</div>

						<div class="col-6">
							<div class="card text-white bg-secondary ms-3 mt-3" style="max-width: 50rem; height:10rem">
								<div class="card-header">Hasil Pencarian</div>
								<div class="card-body">
									<table class="table table-striped  table-hover">
										<thead>
											<tr>
												<th scope="col">Id Barang</th>
												<th scope="col">Nama Barang</th>
												<th scope="col">Produksi</th>
												<th scope="col">Stok</th>
												<th scope="col">Harga</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="row mt-4">
						<div class="col-15 em-3">
						<table class="table table-striped  table-hover">
							<thead>
								<tr>
									<th scope="col">Id Barang</th>
									<th scope="col">Nama Barang</th>
									<th scope="col">Jumlah</th>
									<th scope="col">Total</th>
									<th scope="col">Id Karyawan</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
						</table>
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


</body>

</html>
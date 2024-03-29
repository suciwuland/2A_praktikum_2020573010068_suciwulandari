<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sidebars.css" rel="stylesheet">
    <title>Sistem Informasi Peminjaman Barang Jurusan TIK</title>
</head>

<body>
    <div class="container-fluid">
        <?php
            require "navbar.php";
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
                <div class="card text-black em-1 mt-4" style="background-color: lightsteelblue;">
                    <div class="card-header">
                        <b>SISTEM INFORMASI PEMINJAMAN BARANG JURUSAN TEKNOLOGI INFORMASI DAN KOMPUTER</b>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Alat yang dipinjam</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <div class="row">
                            <div class="col">
                                <img src="gambar/infocus.jpg" class="img-thumbnail"><p align="center">Infocus<br>jumlah=10<br><a href="pinjaminfocus.php" class="btn btn-outline-dark">Pinjam</a></p>
                                
                            </div>
                            <div class="col">
                            <img src="gambar/stopkontakk.jpg" class="img-thumbnail"><p align="center">Stop Kontak<br>jumlah=10<br><a href="#" class="btn btn-outline-dark">Pinjam</a></p>
                            </div>
                            <div class="col">
                            <img src="gambar/absen.jpg" class="img-thumbnail"><p align="center">Absensi<br>jumlah=22<br><a href="#" class="btn btn-outline-dark">Pinjam</a></p>
                            </div>
                        </div>
                        <hr>
                        <a href="#" class="btn btn-outline-dark">UBAH</a>
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
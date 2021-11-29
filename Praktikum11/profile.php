<?php
    require "proses/session.php";
    $sql=mysqli_query($conn,"SELECT * FROM tb_user usr LEFT JOIN tb_mahasiswa mhs ON usr.id=mhs.id_user WHERE  username='$_SESSION[username]' ");
    $data=mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/sidebars.css" rel="stylesheet">
  <title>SICAS SISTEM INFORMASI</title>
</head>

<body>
  <div class="container-fluid">
    <?php
    require "header.php";
    ?>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-3">
        <?php
        require "sidebar.php";
        ?>
      </div>

      <div class="col-9">

        <div class="card em-1 mt-4">
          <div class="card-header">
            Profile
          </div>
          <div class="card-body">
            <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['username'];?>"disabled>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">level</label>
                <input type="text" class="form-control"value=" <?php echo $data['level'];?>"disabled>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama</label>
                <input type="text" class="form-control"value=" <?php echo $data['nama'];?>"disabled>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nim</label>
                <input type="text" class="form-control"value=" <?php echo $data['nim'];?>"disabled>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">kelas</label>
                <input type="text" class="form-control"value=" <?php echo $data['kelas'];?>"disabled>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">prodi</label>
                <input type="text" class="form-control"value=" <?php echo $data['prodi'];?>"disabled>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">alamat</label>
                <input type="text" class="form-control"value=" <?php echo $data['alamat'];?>"disabled>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">tgl_lahir</label>
                <input type="text" class="form-control"value=" <?php echo $data['tgl_lahir'];?>"disabled>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tempat_lahir</label>
                <input type="text" class="form-control"value=" <?php echo $data['tp_lahir'];?>"disabled>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="js/sidebars.js"></script>
</body>

</html>
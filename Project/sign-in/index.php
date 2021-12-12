<?php
session_start();
if(!empty($_SESSION['username'])){
    echo"<script>window.location='../sign-in';</script>";
}
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Cover Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cover/">
    <link href="../css/cover.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->

</head>

<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">Cover</h3>
            </div>

        </header>
        <main class="px-3">
            <div class="container">
                <div class="row">
                    <div class="col" style="margin: 90px 0px 0px 0px">
                        <h3>Selamat Datang dan Selamat Bekerja</h3>
                        <p>"Kill them with your success, then bury them with a smile."</p>
                    </div>
                    <div class="col">
                        <main class="form-signin">
                            <form action="../proses/proses_sigin.php" method="post">
                                <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                                <div class="form-floating" style="color:black;">
                                    <input type="email" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <br>
                                <div class="form-floating"style="color:black;">
                                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <br>
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </main>
        <footer class="mt-auto text-white-50">
           2021
        </footer>
    </div>



</body>

</html>
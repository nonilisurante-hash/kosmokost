<?php 
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KosmoKost</title>

    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet" />

    <link href="fontawesome/css/all.css" rel="stylesheet" />
    <!-- //font-awesome icons -->

     <!-- Footer -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- // Footer -->

    
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" />
    
</head>

<body>
    <div style="height: auto;" class="main wrapper height-auto">

        <!-- HEADER -->
        <div class="header">

            <!-- Header Nav & Brand -->
            <?php include 'layout/header.php'; ?>
            <!-- AKHIR Header Nav -->

        </div>
        <!-- AKHIR HEADER -->

        <!-- KONTENT -->
        <div class="conten">
            <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-6 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Silahkan Login | KosmoKost <i class="fa-solid fa-user-astronaut"></i></h1>
                                            <hr>
                                        </div>
                                        <form class="user" method="POST" action="proses_login.php">
                                            <div class="form-group" style="margin-top: 5vh;">
                                                <input type="text" class="form-control form-control-user"
                                                name="username" placeholder="Silahkan Masukkan Username Anda!" maxlength="20">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                name="password" placeholder="Silahkan Masukkan Password Anda!" maxlength="20">
                                            </div>
                                            <button type="submit" class="btn btn-info btn-user btn-block" style="margin-top: 7vh;">
                                                Login <i class="fas fa-sign-in-alt"></i>
                                            </button>
                                            <!-- <button type="button" class="btn btn-facebook btn-user btn-block" style="background: rgb(92, 61, 248);">
                                                <a href="register.php" style="color: white; text-decoration: none;"> Belum Punya Akun? Register </a> <i class="fas fa-arrow-circle-right"></i>
                                            </button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
            

        </div>
        <!-- AKHIR KONTENT -->

        <!-- FOOTER -->
        <div class="footer">
            
            <?php include 'layout/footer.php'; ?>
            
        </div>
        <!-- AKHIR FOOTER -->


    </div>

    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
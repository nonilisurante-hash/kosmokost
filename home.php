<?php
    require "config.php";
    require "cek_session.php"; // Pastikan session sudah dicek

    // Mendapatkan ID penghuni dari session
    $id_penghuni = $_SESSION['id_penghuni'];

    // $query = "SELECT * FROM penghuni WHERE id_penghuni='$id_penghuni'";
    // $hasil = query($query);
    // var_dump($_SESSION);

    $query = "SELECT * FROM kamar ORDER BY no_kamar DESC LIMIT 3";
    // $query = "SELECT * FROM kamar";
    $hasil = query($query);
    
?>

<!doctype html>
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
            <?php include 'layout/header_user.php'; ?>
            <!-- AKHIR Header Nav -->

        </div>
        <!-- AKHIR HEADER -->
        
        <!-- KONTENT -->
        <div class="conten">
            
            <div class="banner">
                <center>
                <div class="card w-100 rounded-0" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/kos.jpg'); background-size: cover; background-position: center; min-height: 50vh;">
                  <div class="mx-5 my-5 text-outline-dark" style="color: honeydew;">
                    <h2 class="mt-5 fw-bolder">Selamat Datang Di Website KosmoKost</h2>
                    <h3 class="fw-normal">Cari kost? Ya Di sini</h3>
                      <a href="kamar.php" class="btn btn-info mt-4"><span class="fw-semibold" >Lihat Kamar &#10095;</span></a>
                  </div>
                </div>
                </center>
            </div>
            
            <div class="main-content mt-5">
              <h2 class="subcontent mb-5">Daftar Kamar</h2>
              <div style="display: grid; grid-template-columns: repeat(3, 1fr); align-items: center; justify-content: center; gap: 1rem; max-width: 1000px; margin: auto;" class="mt-3 mb-3">
                  <?php foreach($hasil as $h) { ?>
                      <div class="card kamar">
                          <!-- Menambahkan gambar ke dalam card -->
                          <img src="img/<?= $h['gambar']; ?>" class="card-img-top" alt="Gambar Kamar <?= $h['no_kamar']; ?>" style="height: 200px; object-fit: cover;">

                          <div class="card-body text-bg-dark">
                              <h5 class="card-title">No Kamar <?= $h['no_kamar'] ?></h5>
                              <h6 class="card-subtitle mb-2">Status: <?= $h['status']; ?></h6>
                              <p class="card-text"><?= $h['deskripsi']; ?></p>
                              <p class="card-text">Rp <?= number_format($h['harga'], 0, ',', '.'); ?></p>
                              <a href="kamar_detail.php?no_kamar=<?= $h['no_kamar'] ?>" class="btn btn-info mt-2">Lihat Detail</a>
                          </div>
                      </div>
                  <?php } ?>
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
  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  
</html>
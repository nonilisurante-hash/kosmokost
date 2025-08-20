<?php
    include "config.php";
    // include "cek_session.php";

    // Pastikan $_SESSION['id_user'] tersedia
    // if (!isset($_SESSION['id_user'])) {
    //     header("Location: login.php"); // Redirect jika tidak ada sesi
    //     exit;
    // }

    $query = "SELECT * FROM kamar";
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

    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>

  <body>
        <div style="min-height: auto;" class="wrapper">

            <!-- HEADER -->
            <div class="header">

                    <!-- Header Nav & Brand -->
                    <?php 
                        if (!isset($_SESSION["username"]) || !isset($_SESSION["id_user"])) {
                            include 'layout/header.php'; // Untuk header tanpa login
                        } else {
                            include 'layout/header_user.php'; // Untuk header setelah login
                        }
                    ?>
                    <!-- AKHIR Header Nav -->

            </div>
            <!-- AKHIR HEADER -->

            <!-- CONTENT -->
            <div class="container mt-5 mb-5" style="background-color: #f8f9fa; border-radius: 10px; padding: 20px;">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <h3 class="border-bottom pb-3 pt-3">Daftar Kamar</h3>
                    </div>
                    <div class="col-md-6 text-end pt-3 ">
                        <select id="filterStatus" class="form-select w-50 d-inline-block">
                            <option value="all">Semua Status</option>
                            <option value="Kosong">Kosong</option>
                            <option value="Berpenghuni">Berpenghuni</option>
                        </select>
                    </div>
                </div>

                <!-- Card Kamar -->
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
                                <a href="kamar_detail.php?no_kamar=<?= $h['no_kamar'] ?>" class="btn btn-info mt-2" >Lihat Detail</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                
            </div>
                <!-- AKHIR CONTENT -->
            


            

            <!-- FOOTER -->
            <div class="footer">
                    
                <?php include 'layout/footer.php'; ?>
                    
            </div>
            <!-- AKHIR FOOTER -->

        </div>

    <script>
        document.getElementById("filterStatus").addEventListener("change", function () {
            const status = this.value.toLowerCase(); // Ambil nilai dari dropdown
            const cards = document.querySelectorAll(".card.kamar"); // Ambil semua card kamar

            cards.forEach(card => {
                const cardStatus = card.querySelector(".card-subtitle").textContent.toLowerCase();
                if (status === "all" || cardStatus.includes(status)) {
                    card.style.display = "block"; // Tampilkan card yang sesuai
                } else {
                    card.style.display = "none"; // Sembunyikan card yang tidak sesuai
                }
            });
        });
    </script>

  </body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  
</html>
<?php
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php"); // Redirect jika sesi tidak ada
    exit;
}

// Akses ID user
$id_user = $_SESSION['id_user'];

// Query atau logic tambahan jika diperlukan
?>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand ms-5 brand" href="home.php"><i class="fa-solid fa-rocket"></i> KosmoKost</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav mx-5 w-100">
        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        <a class="nav-link" href="kamar.php">Kamar</a>
        <a class="nav-link" href="riwayat_pembayaran.php">Pembayaran</a>

        <!-- Flex container untuk menempatkan "Halo, username" dan "Logout" -->
        <div class="d-flex ms-auto align-items-center">
          <a class="nav-link" href="profil.php"><i class="fa-regular fa-user"></i> | Halo, <?= $_SESSION["username"] ?></a>
          <!-- <span class="me-3 text-white">Halo, <?= $_SESSION["username"] ?></span> -->
          <a class="nav-link" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout?</a>
        </div>
      </div>
    </div>
  </div>
</nav>

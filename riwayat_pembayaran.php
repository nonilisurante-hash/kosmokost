<?php
    require "config.php";
    require "cek_session.php";

    $id_penghuni = $_SESSION['id_penghuni'];

    $query = "SELECT * FROM pembayaran INNER JOIN penghuni ON pembayaran.id_penghuni = penghuni.id_penghuni WHERE pembayaran.id_penghuni='$id_penghuni'";
    $catat = query($query);
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
    <div class="wrapper">

        <!-- HEADER -->
        <div class="header">
            <!-- Header Nav & Brand -->
            <?php include 'layout/header_user.php'; ?>
            <!-- AKHIR Header Nav -->
        </div>
        <!-- AKHIR HEADER -->

        <!-- CONTENT -->
        <div class="container mt-5 mb-5" style="background-color: #f8f9fa; border-radius: 10px; padding: 20px;">

            <div class="row mb-3">
                <div class="col-md-6">
                    <h3 class="border-bottom pb-3 pt-3">Riwayat Pembayaran</h3>
                </div>
                <div class="col-md-6 text-end pt-3">
                    <select id="filterStatus" class="form-select w-50 d-inline-block">
                        <option value="all">Semua Status</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                </div>
            </div>

            <!-- Tabel Riwayat Pembayaran -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>No. Kamar</th>
                            <th>Tanggal Bayar</th>
                            <th>Jam</th>
                            <th>Bayar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($catat as $c) { ?>
                        <tr>
                            <td><?= $c["nama"]; ?></td>
                            <td><?= $c["no_kamar"]; ?></td>
                            <td><?= date('d-m-Y', strtotime($c["tanggal_bayar"])); ?></td>
                            <td><?= date('H:i', strtotime($c["tanggal_bayar"])); ?></td>
                            <td><?= number_format($c["bayar"], 0, ',', '.'); ?></td> <!-- Format jumlah bayar -->
                            <td><?= $c["keterangan"]; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
            const rows = document.querySelectorAll("tbody tr"); // Ambil semua baris tabel

            rows.forEach(row => {
                const rowStatus = row.querySelector("td:nth-child(6)").textContent.toLowerCase();
                if (status === "all" || rowStatus.includes(status)) {
                    row.style.display = "table-row"; // Tampilkan baris yang sesuai
                } else {
                    row.style.display = "none"; // Sembunyikan baris yang tidak sesuai
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

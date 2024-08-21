<?php
require '../config/functions.php';

$id = $_GET["id"];

$car = read("SELECT * FROM mobil WHERE id_mobil=$id")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/page.css">
    <title>view mobil</title>
</head>
<body>
    

    <section id="view" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="box-view-img">
                        <img src="../images/<?= $car["gambar"]?>" alt="mobil">
                    </div>
            </div>
                <div class="col-md-6">
                    <div class="caption">
                        <h1 class="text-capitalize">Mobil <?= $car["model"]; ?></h1>
                        <span class="mt-3 fw-bold text-uppercase"><?= $car["merk"]; ?></span>
                        <p class="mt-3"><?= $car["deskripsi"]; ?></p>

                        <button onclick="history.back(-1)" class="btn btn-primary"><i class="bi bi-arrow-return-left me-2"></i> Kembali</button>
                    </div>
                    </div>
            </div>
        </div>
    </section>

</body>
</html>
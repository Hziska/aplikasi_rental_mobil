<?php
require '../config/functions.php';

$cars = read("SELECT * FROM mobil");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/page.css">
    <title>view all mobil</title>
</head>
<body>


    <section class="pt-4">
        <div class="container">
            <div class="judul">
                <h1 class="text-primary text-center">Semua Mobil</h1>
            </div>
        </div>
    </section>
    
    <div class="tombolback">
        <div class="container">
        <a href="../index.php" class="btn btn-primary"><i class="bi bi-arrow-return-left me-2"></i> Kembali</a>
        </div>
    </div>


    <section id="viewall" class="py-5">
        <div class="container">
            <div class="row gap-3">
                <?php
                foreach($cars as $car):
                ?>

                <div class="col-md-3 flex-fill">
                    <div class="card" style="width: 18rem;">
                       <div class="box_img_viewall">
                        <img src="../images/<?= $car["gambar"]?>" class="card-img-top" alt="...">
                       </div>
                        <div class="card-body">
                          <h5 class="card-title text-capitalize">Mobil <?= $car["model"]; ?></h5>
                          <span class="text-uppercase fw-semibold"><?= $car["merk"]; ?></span>
                          <p class="card-text mt-2 text-truncate"><?= $car["deskripsi"]; ?></p>
                          <a href="view_mobil.php?id=<?= $car["id_mobil"]?>" class="btn btn-primary">Lihat Selengkapnya</a>
                        </div>
                      </div>
                </div>

                <?php
                endforeach;
                ?>
            </div>
        </div>
    </section>
</body>
</html>
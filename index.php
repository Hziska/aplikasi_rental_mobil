<?php
session_start();
require 'config/functions.php';

// ambil data untuk slider
$cars = read("SELECT * FROM mobil LIMIT 5 ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi rental mobil</title>
    <!-- sytle -->
     <link rel="stylesheet" href="css/page.css">
    <!-- bootstrap -->
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <!-- icon -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    
  <?php
  include 'page/navigasi.php';
  ?>

    <!-- jumbotron -->
     <section class="jumbotron">
       <div class="container">
          <div class="row p-4">
            <div class="caption_jumbotron col-5 text-center">
              <h1 class="text-primary mb-3 fw-bolder">Rental <span class="text-emerald">Mobil</span></h1>

              <p class="mb-4">Dalam aplikasi web rental mobil ini, pelanggan dapat dengan mudah memesan mobil secara online melalui antarmuka yang user-friendly. Aplikasi ini dilengkapi dengan fitur-fitur canggih seperti pencarian mobil berdasarkan kategori, tanggal, dan lokasi, serta sistem pembayaran yang aman dan terintegrasi.</p>

                 <!-- login -->
                 <a href="#about" class="lihat px-4 py-2 border border-2 border-white text-white fw-semibold rounded-5 text-decoration-none ">Lihat</a>

            </div>
          </div>
        </div>
     </section>
   <!-- jumbotron -->

     <!-- about -->
      <section class="about" id="about">
        <div class="container">
            <!-- judul -->
             <div class="m-auto text-center w-25">
              <h3 class="judul mb-3 ">Tentang Kami</h3>
             </div>

             <div class="caption row mt-5">
              <div class="col-md-6 p-3">
                <h3 class="text-primary fw-bolder">Rental <span class="text-emerald">Mobil </span><br><span class="ms-5">Putra Kembar</span></h3>

                <p class="fs-6">Rental mobil adalah layanan penyewaan kendaraan yang menyediakan berbagai jenis mobil untuk memenuhi kebutuhan transportasi pelanggan. Layanan ini menawarkan fleksibilitas dalam memilih mobil sesuai dengan kebutuhan, mulai dari mobil keluarga, mobil mewah, hingga mobil untuk perjalanan bisnis. Rental mobil memberikan kemudahan bagi pelanggan yang membutuhkan kendaraan untuk jangka waktu tertentu, baik itu harian, mingguan, maupun bulanan.</p>
                <p>Dalam aplikasi web rental mobil ini, pelanggan dapat dengan mudah memesan mobil secara online melalui antarmuka yang user-friendly. Aplikasi ini dilengkapi dengan fitur-fitur canggih seperti pencarian mobil berdasarkan kategori, tanggal, dan lokasi, serta sistem pembayaran yang aman dan terintegrasi.</p>
              </div>

              <div class="col-md-6 p-3">
                <figure>
                  <img src="images/about.jpg" alt="" class="rounded-4 shadow">
                </figure>
              </div>
             </div>
        </div>
      </section>
     <!-- about end -->

      <!-- pilihan mobil -->
       <section class="choice_cars" id="mobil">
        <div class="container position-relative">

          <!-- heading pilihan -->
           <div class="row">
            <div class="col-9 col-md-10 ">
              <h3 class="judul mb-3">Pilihan Mobil</h3>
            </div>

            <div class="col-3 col-md-2">
              <a href="page/viewal_mobil.php" class="lihat w-100 text-white d-inline-block bg-primary rounded-2 p-2 text-decoration-none text-truncate">Selengkapnya<i class="bi bi-caret-right-fill ms-1 icon"></i></a>
            </div>
           </div>

           <!-- img slider -->
           <div class="row slider-container overflow-hidden">
            <div class="col-12 slider mt-4 d-flex justify-content-start">
              <!-- card mobil -->
               <?php
               foreach($cars as $car):
               ?>
              <div class="card-car me-3 position-relative">
                <div class="box-img">
                  <img src="images/<?= $car["gambar"]?>" alt="">
                </div>

                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0">
                  <div class="text-center text-white position-absolute top-50 start-50 translate-middle">
                    <h4><?= $car["model"]; ?></h4>
                    <h6 class="mb-4"><?= $car["merk"]; ?></h6>
                    <a href="page/view_mobil.php?id=<?= $car["id_mobil"]?>" class="btn-lihat px-4 py-1 border border-2 border-white text-white text-decoration-none rounded-2">Lihat</a>
                  </div>
                </div>
              </div>

              <?php
              endforeach;
              ?>
            </div>
           </div>

          <!-- button next and prev -->
           <!-- prev -->
          <button class="btn-prev rounded-circle bg-primary border-0" onclick="prevSlider()"><i class="bi bi-caret-left text-white fs-4"></i></button>
           <!-- next -->
          <button class="btn-next rounded-circle bg-primary border-0" onclick="nextSlider()"><i class="bi bi-caret-right text-white fs-4"></i></button>
        </div>
       </section>


       <!-- footer -->
       <footer>
        <div class="container">
          <div class="row p-4">
            <div class="col-md-6">
              <div class="p-2">
                <h3 class="text-white fw-bolder">Rental <span class="text-emerald2">Mobil </span><br><span class="ms-5">Putra Kembar</span></h3>

                <p class="text-white">Nikmati kemudahan dalam menyewa mobil dengan berbagai pilihan kendaraan yang sesuai kebutuhan Anda. Kami menawarkan harga kompetitif, layanan pelanggan 24/7, dan sistem pemesanan online yang mudah digunakan. Temukan mobil impian Anda dan nikmati perjalanan tanpa batas bersama kami.</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="p-2 text-white">
                <h4>Hubungi Kami</h4>
                <ul>
                  <li>Jl. Majalengka kulon ciwaringin</li>
                  <li><a href="#" class="text-white">Putrakembar@gmail.com</a></li>
                  <li>(021) 123-4567</li>

                </ul>
              </div>
            </div>
          </div>

        </div>
        <div class="bg-black p-2 pt-4 text-white text-center">
          <p>Copyright 2024 || HzCompany</p>
        </div>
      </footer>


        <!-- dialog logout -->
         <!-- Modal -->
<div class="modal fade" id="logoutdialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ingin Logut?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="loginpage/logout_page.php" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div>

      

    <!-- bootstrap -->
     <script src="js/bootstrap.min.js"></script>
     <script src="js/bootstrap.bundle.min.js"></script>

     <!-- main js -->
      <script src="js/main.js"></script>

</body>
</html>
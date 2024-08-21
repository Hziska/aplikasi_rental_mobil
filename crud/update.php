<?php
require '../config/functions.php';
session_start();
if(!isset($_SESSION["admin"])){
    header("Location: ../loginpage/login.php");
}
// tangkap id dari url
$id = $_GET["id"];

$car = read("SELECT * FROM mobil WHERE id_mobil = $id")[0];

if(isset($_POST["edit"])){
    if(update($_POST) > 0){
        echo"
        <script>
        alert('berhasil diupdate')
        location.href = '../admin/datamobil.php'
        </script>";
    }else{
        echo"
        <script>
        alert('berhasil diupdate')
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>EDIT DATA</title>


    <!-- Main CSS-->
    <link href="../css/insert.css" rel="stylesheet" media="all">
      <!-- textareal -->
      <style>
        textarea{
            width: 100%;
            font-family: arial;
            padding:10px 13px;
            height:200px;
        }
    </style>
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card_heading">
                </div>
                <div class="card-body">
                    <h2 class="title">Tambah data mobil</h2>

                    <form method="post" enctype="multipart/form-data">

                    <!-- ambil id -->
                     <input type="text" name="id" value="<?= $car["id_mobil"]?>" hidden>
                     <input type="text" name="gambar_lama" value="<?= $car["gambar"]?>" hidden>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="MEREK MOBIL" name="merk" value="<?= $car["merk"]?>" required>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="MODEL MOBIL" name="model" value="<?= $car["model"]?>" required>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="TAHUN" name="tahun" value="<?= $car["tahun"]?>" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="file" placeholder="gambar" name="gambar">
                                </div>
                            </div>
                        </div>


                        <div class="deskripsi">
                        <textarea class="form-text" placeholder="DESKRIPSI MOBIL"name="deskripsi"><?= $car["deskripsi"]; ?></textarea>
                        </div>
                       
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="edit">EDIT DATA</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

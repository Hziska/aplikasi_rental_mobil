<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "rental_mobil";

$conn = mysqli_connect($servername,$username,$password,$db);

if(!$conn){
    echo"gagal konek";
}
?>
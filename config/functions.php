<?php
require 'koneksi.php';

// membuat fungsi membaca data (read)
function read($query){
    global $conn;
    $sql = mysqli_query($conn,$query);
    $rows = [];
    while($result = mysqli_fetch_assoc($sql)){
        $rows[] = $result;
    }
    return $rows;
}

// tambah data
function insert($data){
    global $conn;
    
    $merk = $data["merk"];
    $model = $data["model"];
    $tahun = $data["tahun"];
    $deskripsi = $data["deskripsi"];
    $gambar = upload();
    // jika tidak ada gambar yang di upload
    if(!$gambar){
        return false;
    }

    $query = mysqli_query($conn, "INSERT INTO mobil VALUES ('','$merk','$model','$tahun','$gambar','$deskripsi')");

    return mysqli_affected_rows($conn);
}

// fungsi upload file
function upload(){
    $nama_gambar = $_FILES["gambar"]["name"];
    $error = $_FILES["gambar"]["error"];
    $tmp_name = $_FILES["gambar"]["tmp_name"];
    $size = $_FILES["gambar"]["size"];

    // cek ukuran gambar
    if($size > 2000000){
        echo "<script>
        alert('ukuran gambar terlalu besar';
        </script>";
        return false;
    }
    // cek apakah ada gambar yang di upload 
    if($error > 0){
        return 'default.png';
    }


    // pencegahan selaiin ekstensi yang di tentukan
    $ekstensi_valid = ["jpg","png","jpeg"];
    $ekstensi_gambar = explode('.',$nama_gambar);

    $ekstensi_gambar= strtolower(end($ekstensi_gambar));
    
    if(!in_array($ekstensi_gambar,$ekstensi_valid)){
        return false;
    }

    // ganti anma secara acak
    $nama_gambar_baru = uniqid();
    $nama_gambar_baru .= '.';
    $nama_gambar_baru .= $ekstensi_gambar ;

    move_uploaded_file($tmp_name,'../images/'.$nama_gambar_baru);

    return $nama_gambar_baru;

}

// fungsi edit
function update($data){
    global $conn;
    // ambil data yang diperlukan
    $id = $data["id"];
    $gambar_lama = $data["gambar_lama"];
    $merk = $data["merk"];
    $model = $data["model"];
    $tahun = $data["tahun"];
    $deskripsi = $data["deskripsi"];
    
    if($_FILES["gambar"]["error"] === 4){
        $gambar = $gambar_lama;
    }else{
        $gambar = upload();
    }

    $query = mysqli_query($conn,"UPDATE mobil SET 
    merk='$merk',
    model='$model',
    tahun='$tahun',
    gambar = '$gambar',
    deskripsi ='$deskripsi'
    WHERE id_mobil=$id");

    return mysqli_affected_rows($conn);
}

// membuat fungsi delete
function delete($id,$table){
    global $conn;

    $query = mysqli_query($conn, "DELETE FROM $table WHERE id_$table= $id");

    return mysqli_affected_rows($conn);
}

// registrasi
function regis($data){
    global $conn;
    // ambil data
    $username = $data["username"];
    $password = $data["password"];
    $konfimasi_password = $data["konfirmasi"];

    // cek username apakah sudah ada atau belum
    $query = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($query)){
        echo'username sudah digunakan';
        return false;
    }

    // cek kesamaan password dan konfirmasi password
    if($password !== $konfimasi_password){
        return false;
    }

    // hash password
    $password_hash = password_hash($password,PASSWORD_DEFAULT);

    // masukan data ke database
    mysqli_query($conn,"INSERT INTO users VALUE ('','$username','$password_hash')");

    return mysqli_affected_rows($conn);

}

// fungsi menghitung tabel
function jumlah_data_tabel($tables){
    global $conn;
    $dataTabel = mysqli_query($conn,"SELECT * FROM $tables");

    return mysqli_num_rows($dataTabel);
}
?>
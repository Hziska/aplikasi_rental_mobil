<?php
require '../config/functions.php';
session_start();
// jika ada session yabg di set
if(isset($_SESSION["admin"])){
	header("Location: ../admin/admin.php");
}

if(isset($_POST["ganti"])){
	// tangkap data
	$username = $_POST["username"];
	$password_lama = $_POST["password_lama"];
	$password_baru = $_POST["password_baru"];

	// ambil usernae dari database
	$query = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");

	// cek ada perubahas pada query 
	if(mysqli_num_rows($query) > 0){
		// ambil database menjadi assoiativ array
		$result = mysqli_fetch_assoc($query);
		
		// ambil data password
		$password = $result["password"];

		// cek verifikasi password yang lama dan database
		if(password_verify($password_lama,$password)){
			// menghash password baru
			$password_baru_hash = password_hash($password_baru,PASSWORD_DEFAULT);

			// update password lama ke password bary
			$sql ="UPDATE users SET password = '$password_baru_hash'";
			// tambahakn kondisi jika sudah di update
			if(mysqli_query($conn,$sql)){
				echo "<script>
				alert('password berhasil di update ');
				location.href = 'login.php'
				</script>";
			}else{
				echo "<script>
				alert('password gagal di update ');
				</script>";
			}
		}else{
			echo "<script>
			alert('password gagal di update ');
			</script>";
		}
	}
}
?>


<!doctype html>
<html lang="en">
  <head>
  	<title>forgot password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">FORGOT PASSWORD</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2 class="fs-4">Your Forgot Password?</h2>
								<a href="login.php" class="btn btn-white btn-outline-white">Back</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">forgot password</h3>
			      		</div>
			      	</div>
							<form action="" class="signin-form" method="post">
		            <div class="form-group mb-3">
		            	<label class="label" for="username">username</label>
		              <input type="text" class="form-control" placeholder="username" id="username" name="username" required>
		            </div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password_lama">Password Lama</label>
		              <input type="password" class="form-control" placeholder="Password Lama" id="password_lama" name="password_lama" required>
		            </div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password_baru">Password Baru</label>
		              <input type="password" class="form-control" placeholder="Password baru" id="password_baru" name="password_baru" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3" name="ganti">Ganti password</button>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>


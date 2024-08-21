<?php
require '../config/functions.php';
session_start();
// jika ada session yabg di set
if(isset($_SESSION["admin"])){
	header("Location: ../admin/admin.php");
}

if(isset($_POST["daftar"])){
	if(regis($_POST) > 0){
		echo "
		<script>
		alert('berhasil daftar')
		location.href = 'login.php'
		</script>";
	}else{
		echo "
		<script>
		alert('gagal daftar')
		</script>";
	}
}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Register Page</title>
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
					<h2 class="heading-section">SIGN UP ACCOUNT</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to register</h2>
								<p>Have an account?</p>
								<a href="login.php" class="btn btn-white btn-outline-white">Sign In</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign Up</h3>
			      		</div>
			      	</div>
							<form action="" class="signin-form" method="post">
			      		<div class="form-group mb-3">
			      			<label class="label" for="username">Username</label>
			      			<input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
		            </div>
		            <div class="form-group mb-3">
		            	<label class="label" for="Konfirmasi">Konfirmasi Password</label>
		              <input type="password" class="form-control" placeholder="Konfirmasi Password" id="Konfirmasi" name="konfirmasi" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3 mt-3" name="daftar">Sign Up</button>
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


<?php
require '../config/functions.php';
session_start();

// jika ada session yabg di set
if(isset($_SESSION["admin"])){
	header("Location: ../admin/admin.php");
}

if(isset($_POST["login"])){

	// tangkap data
	$username = $_POST["username"];
	$password = $_POST["password"];
	// cek persamaan username dri database dgn input user
	// tankap data username
	$query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
	
	// jika admin yang masuk
	if($username === 'admin' && $password==='admin123'){
		// set session
		$_SESSION["admin"] = true;
		header("location: ../admin/admin.php");
		exit;
	}

	// 1 kolom saja dari database
	if(mysqli_affected_rows($conn) === 1){
		// ambil username nya
		$result = mysqli_fetch_assoc($query);
		// cek kesamaan username dengan password
		if(password_verify($password,$result["password"])){
			// set session

			$_SESSION["login"] = true;
			
			header("location: ../index.php");
			exit;
		}
	}
}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Login Page</title>
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
					<h2 class="heading-section">SIGN IN ACCOUNT</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to login</h2>
								<p>Don't have an account?</p>
								<a href="regis.php" class="btn btn-white btn-outline-white">Sign Up</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
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
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3" name="login">Sign In</button>
		            </div>
		          </form>

				  <div class="form-group d-flex justify-content-between">
		            	<!-- <div class="text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" name="remember">
									  <span class="checkmark"></span>
										</label>
									</div> -->
									<div class=" text-md-right ">
										<a href="forgot.php">Forgot Password</a>
									</div>
		            </div>
					
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


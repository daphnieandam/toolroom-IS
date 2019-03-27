<!DOCTYPE html>
<html lang="en">
<head>
	<title>phonebook</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/jss/bootstrap.js">
	<script src="bootstrap-4.0.0-beta.3-dist/jquery/jquery.min.js"></script>
	<script src="bootstrap-4.0.0-beta.3-dist/js/bootstrap.bundle.min.js"></script>
	<style>
		body {
			background-image: url(img/back.jpg);
			color: white;
			width: 100%;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-success bg-dark">
		<img src="img/call.png" width="30" height="30" alt="img/call.png"/>&nbsp;&nbsp;&nbsp;
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
				</ul>
			</div>
	</nav>
	<div class="container text-center">
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	$db = mysqli_connect('localhost','root','','toolroom');

	if($user == "" || $pass == "" || $firstname == "" || $lastname == "" || $email == "") {
		echo "<br/>";
	} else {
		mysqli_query($db, "INSERT INTO login(firstname, lastname, email, username, password) VALUES('$firstname', '$lastname', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		header('location: login.php');
	}
} else {
?>
	<main class="bd-masthead" id="content" role="main">
  				<div class="container">
    					<div class="row align-items-center">
      						<div class="col-2 mx-auto col-md-4 text-md-left order-md-4">
        						<img src="img/iphone.png" alt="img/iphone.png" width="400" height="300"/>
									<h1 class="mb-3 bd-text-green-bright text-success">PHONEBOOK</h1></p>
										<p class="p">
											Phonebook is a book that lists the names, addresses, emails, and phone numbers of the the people and businesses in a certain area.
										</p>
      						</div>
							<div class="col-md-8 order-md-2 text-center text-md-left pr-md-2">
								<form name="form1" method="post" action=""><br/>
									<div class="container">
										<h2>Registration</h2>
									</div><br/>
										<div class="row">
											<div class="col-md-3 mb-3">
												<label for="validationServer01">first name</label>
													<input type="text" name="firstname" class="form-control is-valid" id="validationServer01"  required>
											</div>&nbsp;
											<div class="col-md-3 mb-3">
												<label for="validationServer01">last name</label>
													<input type="text" name="lastname" class="form-control is-valid" id="validationServer01"  required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 mb-3">
												<label for="validationServer01">email</label>
													<input type="email" name="email" class="form-control is-valid" id="validationServer01"  required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 mb-3">
												<label for="validationServer01">username</label>
													<input type="text" name="username" class="form-control is-valid" id="validationServer01"  required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 mb-3">
												<label for="validationServer01">password</label>
													<input type="password" name="password" class="form-control is-valid" id="validationServer01"  required>
											</div>
										</div>
										<button class="btn btn-outline-success" type="submit" name="submit" value="Submit">register</button><br/><br/>
											<p>
												Already have an account ? &nbsp; <a class="btn btn-sm btn-outline-info" href="login.php" role="button">log in</a>
											</p>
								</form>
							</div>
    					</div>
	
	

<?php
}
?>
</div><br/><br/>
	<div class="footer text-center">
		<p><font size="1">&copy; daphnieandam</font></p>
	</div>
</body>
</html>

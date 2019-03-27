<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>toolroom</title>
	<link rel="shortcut icon" type="image/x-icon" href="icon/toolroom.png" />
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/jss/bootstrap.js">
	<script src="bootstrap-4.0.0-beta.3-dist/jquery/jquery.min.js"></script>
	<script src="bootstrap-4.0.0-beta.3-dist/js/bootstrap.bundle.min.js"></script>
	<style>
		body {
			background-image: url(img/jj.png);
			color: white;
			width: 100%;
		}
	</style>
</head>
<body><br>
<div class="col">
  <div class="col-lg">
	<nav class="navbar navbar-expand-lg" style="background-color: #CC7722; border-radius: 5px">
		<img src="icon/toolroom.png" width="30" height="30" alt="img/11.jpg"/>&nbsp;&nbsp;&nbsp;
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php" style="color: white;">Home <span class="sr-only">(current)</span></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container"><br/>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($db, $_POST['username']);
	$pass = mysqli_real_escape_string($db, $_POST['password']);


	if($user == "" || $pass == "") {
		echo "<br/>";
	} else {
		$result = mysqli_query($db, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
		} else {
			header('Location: login.php');
		}

		if(isset($_SESSION['valid'])) {
			header('Location: home.php');			
		}
	}
} else {
?>

	 <main class="bd-masthead" id="content" role="main">
  		<div class="container">
    			<div class="row align-items-center">
      				<div class="col-6 mx-auto col-md-6 order-md-2">
        				<div class="list-group" id="list-tab" role="tablist">
									<h1 class="mb-3 bd-text-green-bright text-warning">ToolRoom</h1>
										<p class="p">
											A toolroom is a room where tools are stored.
										</p>
						</div>
     				 </div>
      				<div class="col-md-6 order-md-1 text-center text-md-left pr-md-5">
        				<p class="lead">
						<form name="form1" method="post" action="">
									<div class="row">
										<h2 style="color: white;">Log In</h2>
									</div><br/>
									<div class="row">
										<label for="validationServer01">username</label>
													<input type="text" name="username" class="form-control is-valid" id="validationServer01"  required>
									</div>
									<div class="row">
										<label for="validationServer01">password</label>
													<input type="password" name="password" class="form-control is-valid" id="validationServer01"  required>
									</div><br/>
									<div class="row">
										<button class="btn btn-warning" type="submit" name="submit" value="Submit">log in</button><br/>
										</div>
											
								</form>
      				</div>
    			</div>
		 </div>
	</main>

<?php
}
?>
</div><br/><br/>
	<div class="footer text-center">
		<img src="icon/FB.png" width="40" height="40" alt="icon/FB.png"/>
		<img src="icon/GIT.png" width="35" height="35" alt="icon/GIT.png"/>
		<img src="icon/GMAIL.png" width="30" height="30" alt="icon/GMAIL.png"/>
		<img src="icon/T.png" width="30" height="30" alt="icon/T.png"/>
		<img src="icon/C.png" width="30" height="30" alt="icon/C.png"/>
		<img src="icon/M.png" width="30" height="30" alt="icon/M.png"/>
		<p><font size="1">&copy; daphnieandam</font></p>
	</div>
</body>
</html>

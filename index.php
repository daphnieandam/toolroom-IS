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
<body>
	<div class="container"><br/>
		<center>
		<img src="icon/1.png" width="100" height="100" alt="icon/1.png"/>
		<img src="icon/2.png" width="100" height="100" alt="icon/2.png"/>
		<img src="icon/3.png" width="100" height="100" alt="icon/3.png"/>
		<img src="icon/4.png" width="100" height="100" alt="icon/4.png"/>
		<img src="icon/5.png" width="100" height="100" alt="icon/5.png"/>
		<img src="icon/6.png" width="100" height="100" alt="icon/6.png"/>
		<img src="icon/7.png" width="100" height="100" alt="icon/7.png"/>
		<img src="icon/8.png" width="100" height="100" alt="icon/8.png"/></center><br>
		<div class="header"><center>
			<img src="icon/toolroom.png" width="200" height="200" alt="img/11.jpg"/>
			<p style="font: 20px Times New Roman;">
				A <mark style="color: red;">ToolRoom</mark> is a collection of sources of electronic materials </br>
				that are used in electrical industries, electronics and microelectronics,</br>
				and the substances for the building up of integrated circuits, circuit boards,</br>
				packaging materials, communication cables, optical fibres, displays, and various </br>
				controlling and monitoring devices and are made accessible to a defined community for borrowing.
			</p></br>
			<a class="btn btn-sm btn-warning" href="login.php" role="button">log in</a></center>
		</div><br/>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($db, "SELECT * FROM login");
	?>
	
	<?php	
	}
	?>
	
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

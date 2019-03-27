<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>toolroom</title>
	<link rel="shortcut icon" type="image/x-icon" href="icon/toolroom.png" />
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
					<li class="nav-item active" style="color: white;>
						<ul class="navbar-nav mr-auto" >
					<li class="nav-item active">
						<a class="nav-link" href="view.php" style="color: white;"><b>| Home |</b></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tools.php" style="color: white;">Tools</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="view.php" style="color: white;">Borrowers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="borrowerview.php" style="color: white;">Borrow</a>
					</li>
										<li class="nav-item">
						<a class="nav-link" href="penaltyview.php" style="color: white;">Penalty</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="records.php" style="color: white;">Records</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="termsconditions.php" style="color: white;">Terms & Conditions</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-1">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;profile
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="admin.php" >
								admin</a>
								<a class="dropdown-item" href="logout.php" >logout</a>
							</div>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	</nav>
<br/>
	<div class="container">
	<center>
		<p>
			A toolroom is a room where tools are stored.
		</p>
		</center>
		<div class="row" >
		<div class="col-sm-3" >
    <div class="card text-center" style="background-color: #CC7722;">
      <div class="card-body">
        <h4 class="card-title">Tools</h4>
		<img src="img/12.jpg" width="100" height="80" style="border-radius: 20%"/></br></br>
        <a class="btn btn-sm btn-outline-warning" href="addtool.php">add</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card text-center" style="background-color: #CC7722;">
      <div class="card-body">
        <h4 class="card-title">Students / Instructor</h4>
        <a class="btn btn-sm btn-outline-warning" href="add.php">add</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card text-center" style="background-color: #CC7722;">
      <div class="card-body">
        <h4 class="card-title">Borrow</h4>
		<img src="img/machining.png" width="80" height="80"/></br></br>
        <a class="btn btn-sm btn-outline-warning" href="borrow.php">add</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card text-center" style="background-color: #CC7722;">
      <div class="card-body">
        <h4 class="card-title">Penalty</h4>
		<img src="img/tool.jpg" width="100" height="80" style="border-radius: 20%"/></br></br>
       <a class="btn btn-sm btn-outline-warning" href="penalty.php">add</a>
      </div>
    </div>
  </div>
</div>
	</div>
</br>
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

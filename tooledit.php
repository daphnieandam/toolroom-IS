<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php

include_once("connection.php");

if(isset($_POST['update']))
{	
	$tool_id = $_POST['tool_id'];
	
	$toolname = $_POST['toolname'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	
	$result = mysqli_query($db, "UPDATE tools SET toolname='$toolname', price='$price', quantity='$quantity' WHERE tool_id=$tool_id");
		
		header("Location: tools.php");
}
?>
<?php
$tool_id = $_GET['tool_id'];

$result = mysqli_query($db, "SELECT * FROM tools WHERE tool_id=$tool_id");

while($res = mysqli_fetch_array($result)) {
	$toolname = $res['toolname'];
	$price = $res['price'];
	$quantity = $res['quantity'];
	}
?>
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
				<ul class="navbar-nav mr-auto" >
					<li class="nav-item active">
						<a class="nav-link" href="home.php" style="color: white;">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tools.php" style="color: white;"><b>| Tools |</b></a>
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
				<form class="form-inline my-2 my-lg-0">		
					<ul class="navbar-nav mr-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color: white;">
								profile
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="admin.php" >admin</a>
								<a class="dropdown-item" href="logout.php">logout</a>
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
		<nav aria-label="breadcrumb" role="navigation">
			<div class="col-sm-5">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="tools.php">List of tools</a></li>
					<li class="breadcrumb-item active" aria-current="page">Edit tool</li>
				</ol>
			</div>
		</nav>
<br/>
	<div class="container">
		<form name="form1" method="post" action="tooledit.php">
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">tool name</label>
					<div class="col-sm-5">
						<input type="text" name="toolname" value="<?php echo $toolname;?>" class="form-control" id="colFormLabel">
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">price</label>
					<div class="col-sm-5">
						<input type="text" name="price" value="<?php echo $price;?>" class="form-control" id="colFormLabel">
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">quantity</label>
					<div class="col-sm-5">
						<input type="text" name="quantity" value="<?php echo $quantity;?>" class="form-control" id="colFormLabel">
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label"></label>	
					<div class="col-sm-10">
						<input type="hidden" name="tool_id" value=<?php echo $_GET['tool_id'];?>>
							<button class="btn btn-outline-success" type="submit" name="update" value="Update">update</button>
					</div>
			</div>
		</form>
	</div>
</br/>
	<div class="footer text-center">
		<img src="icon/FB.png" width="40" height="40" alt="icon/FB.png"/>
		<img src="icon/GIT.png" width="35" height="35" alt="icon/GIT.png"/>
		<img src="icon/GMAIL.png" width="30" height="30" alt="icon/GMAIL.png"/>
		<img src="icon/T.png" width="30" height="30" alt="icon/T.png"/>
		<img src="icon/C.png" width="30" height="30" alt="icon/C.png"/>
		<img src="icon/M.png" width="30" height="30" alt="icon/M.png"/>
		<p><font size="1">&copy; daphnieandam</font></p>
	</div>
	</div>
</body>
</html>

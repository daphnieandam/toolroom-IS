<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php

include_once("connection.php");

if(isset($_POST['update'])) {	
	$stud_id = $_POST['stud_id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$position = $_POST['position'];
	$section = $_POST['section'];
	$department = $_POST['department'];
	$phone_number = $_POST['phone_number'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	
	$result = mysqli_query($db, "UPDATE `borrower` SET `stud_id` = '$stud_id', `firstname` = '$firstname', `lastname` = '$lastname',  `position` = '$position',  `section` = '$section', `department` = '$department', `phone_number` = '$phone_number', `email` = '$email', `address` = '$address' WHERE `borrower`.`stud_id` = $stud_id;");

		header("Location: view.php");
}
?>
<?php
$stud_id = $_GET['stud_id'];

$result = mysqli_query($db, "SELECT * FROM borrower WHERE stud_id= ".$stud_id);

while($res = mysqli_fetch_array($result)) {
	
	$stud_id = $res['stud_id'];
	$firstname = $res['firstname'];
	$lastname = $res['lastname'];
	$position = $res['position'];
	$section = $res['section'];
	$department = $res['department'];
	$phone_number = $res['phone_number'];
	$email = $res['email'];
	$address = $res['address'];
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
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active" style="color: white;>
						<ul class="navbar-nav mr-auto" >
					<li class="nav-item active">
						<a class="nav-link" href="home.php" style="color: white;">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tools.php" style="color: white;">Tools</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="view.php" style="color: white;"><b>| Borrowers |</b></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="borrow.php" style="color: white;">Borrow</a>
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
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
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
					<li class="breadcrumb-item"><a href="view.php">List of Borrowers</a></li>
					<li class="breadcrumb-item active" aria-current="page">Edit contact</li>
				</ol>
			</div>
		</nav>
<br/>
	<div class="container">
		<form name="form1" method="post" action="edit.php">
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">ID No.</label>
					<div class="col-sm-5">
						<input type="number" name="stud_id" value="<?php echo $stud_id;?>" class="form-control" id="colFormLabel">
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">firstname</label>
					<div class="col-sm-5">
						<input type="text" name="firstname" value="<?php echo $firstname;?>" class="form-control" id="colFormLabel">
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">lastname</label>
					<div class="col-sm-5">
						<input type="text" name="lastname" value="<?php echo $lastname;?>" class="form-control" id="colFormLabel">
					</div>
			</div>
			<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">position</label>
				<div class="col-sm-5">
						<select name= "position" class="form-control" id="colFormLabel"required>
							<option value="<?php echo $position ?>"><?php echo $position ?></option>
							<?php
							$position= "SELECT * FROM position";
							$position= mysqli_query($db, $position);
						?>
						<?php while ($row = mysqli_fetch_array($position)){ ?>
							<option value="<?php echo $row['pos_id']; ?>"><?php echo $row['pos_name'] ?></option>
						<?php } ?>
						</select>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">section</label>
				<div class="col-sm-5">
					<select name= "section" class="form-control" id="colFormLabel"required>
							<option value="<?php echo $section ?>"><?php echo $section ?></option>
							<?php
							$section= "SELECT * FROM section";
							$section= mysqli_query($db, $section);
						?>
						<?php while ($row = mysqli_fetch_array($section)){ ?>
							<option value="<?php echo $row['sec_id']; ?>"><?php echo $row['sec_name'] ?></option>
						<?php } ?>
						</select>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">department</label>
				<div class="col-sm-5">
					<select name= "department" class="form-control" id="colFormLabel"required>
							<option value="<?php echo $department ?>"><?php echo $department ?></option>
							<?php
							$department= "SELECT * FROM department";
							$department= mysqli_query($db, $department);
						?>
						<?php while ($row = mysqli_fetch_array($department)){ ?>
							<option value="<?php echo $row['dept_id']; ?>"><?php echo $row['dept_name'] ?></option>
						<?php } ?>
						</select>
				</div>
		</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">phone_number</label>
					<div class="col-sm-5">
						<input type="text" name="phone_number" value="<?php echo $phone_number;?>" class="form-control" id="colFormLabel">
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">email</label>
					<div class="col-sm-5">
						<input type="text" name="email" value="<?php echo $email;?>" class="form-control" id="colFormLabel">
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">address</label>
					<div class="col-sm-5">
						<input type="text" name="address" value="<?php echo $address;?>" class="form-control" id="colFormLabel">
					</div>
			</div>
			
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label"></label>	
					<div class="col-sm-10">
						<input type="hidden" name="stud_id" value=<?php echo $_GET['stud_id'];?>>
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

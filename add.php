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
						<a class="nav-link" href="view.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="home">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tools.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="tools">Tools</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="view.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="students/instructor"><b>| Borrowers |</b></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="borrowerview.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="transaction">Borrow</a>
					</li>
										<li class="nav-item">
						<a class="nav-link" href="penaltyview.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="charged">Penalty</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="records.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="records" >Records</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="termsconditions.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="terms">Terms & Conditions</a>
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
			<div class="col-sm-7">	  
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="view.php">List of Students/Instructor</a></li>
					<li class="breadcrumb-item active" aria-current="page">Add Students/Instructor</li>
				</ol>
			</div>
		</nav>
<?php

include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$stud_id = $_POST['stud_id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$position = $_POST['position'];
	$section = $_POST['section'];
	$department = $_POST['department'];
	$phone_number = $_POST['phone_number'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$loginId = $_SESSION['id'];
	
		
	$result = mysqli_query($db, "INSERT INTO borrower(stud_id, firstname, lastname, position , section, department, phone_number, email, address, login_id) VALUES('$stud_id', '$firstname', '$lastname', '$position', '$section', '$department', '$phone_number', '$email', '$address', '$loginId')");
		header('location: view.php');
	} 
?>

<div class="container">
	<form action="add.php" method="post" name="form1">
	<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">student ID</label>
				<div class="col-sm-5">
					<input type="number" name="stud_id" class="form-control" id="colFormLabel" required>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">first name</label>
				<div class="col-sm-5">
					<input type="text" name="firstname" class="form-control" id="colFormLabel" required>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">lastname</label>
				<div class="col-sm-5">
					<input type="text" name="lastname" class="form-control" id="colFormLabel" required>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">position</label>
				<div class="col-sm-5">
				<?php
			$position= "SELECT * FROM position";
			$position= mysqli_query($db, $position);
		?>
		<select name= "position" class="form-control" id="colFormLabel"required>
			<option value=""></option>
		<?php while ($row = mysqli_fetch_array($position)){ ?>
			<option value="<?php echo $row['pos_id']; ?>"><?php echo $row['pos_name'] ?></option>
		<?php } ?>
		</select>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">section</label>
				<div class="col-sm-5">
			<?php
			$section= "SELECT * FROM section";
			$section= mysqli_query($db, $section);
		?>
		<select name= "section" class="form-control" id="colFormLabel"required>
			<option value=""></option>
		<?php while ($row = mysqli_fetch_array($section)){ ?>
			<option value="<?php echo $row['sec_id']; ?>"><?php echo $row['sec_name'] ?></option>
		<?php } ?>
		</select>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">department</label>
				<div class="col-sm-5">
			<?php
			$department= "SELECT * FROM department";
			$department= mysqli_query($db, $department);
		?>
		<select name= "department" class="form-control" id="colFormLabel"required>
			<option value=""></option>
		<?php while ($row = mysqli_fetch_array($department)){ ?>
			<option value="<?php echo $row['dept_id']; ?>"><?php echo $row['dept_name'] ?></option>
		<?php } ?>
		</select>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">phone number</label>
				<div class="col-sm-5">
					<input type="number" name="phone_number" class="form-control" id="colFormLabel" required>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">email</label>
				<div class="col-sm-5">
					<input type="email" name="email" class="form-control" id="colFormLabel" required>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label">address</label>
				<div class="col-sm-5">
					<textarea type="text" name="address" class="form-control" id="colFormLabel" required></textarea>
				</div>
		</div>
		<div class="form-group row">
			<label for="colFormLabel" class="col-sm-2 col-form-label"></label>
				<div class="col-sm-10">
					<button class="btn btn-outline-warning" type="submit" name="Submit" value="Add">save</button>
				</div>
		</div>
	</form>
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

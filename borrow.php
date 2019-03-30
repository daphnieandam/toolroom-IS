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
	<script type="text/javascript" src="jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="jquery/add.js"></script>
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
						<a class="nav-link" href="view.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="students/instructor">Borrowers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="borrowerview.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="transaction"><b>| Borrow |</b></a>
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
				<nav class="nav-inline my-2 my-lg-0">
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
				</nav>
			</div>
		</div>
	</div>
	</nav>
<br/>
<div class="container">
		<nav aria-label="breadcrumb" role="navigation">
			<div class="col-sm-5">	  
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="borrowerview.php">List of Transaction</a></li>
					<li class="breadcrumb-item active" aria-current="page">Add Borrower</li>
				</ol>
			</div>
		</nav>
<?php

include_once("connection.php");

if(isset($_POST['Submit'])) {
	
	$borrower = $_POST['borrower'];
	$tools = $_POST['tools'];
	$qty = $_POST['qty'];
	$returned = $_POST['returned'];
	
		
	$result = mysqli_query($db, "INSERT INTO `borrow` (`borrower`, `tools`, `qty`, `returned`) VALUES ('$borrower', '$tools', '$qty', '$returned')");
		header('location: borrowerview.php');
	} 
?>

<div class="container">
	<form action="borrow.php" method="post" name="form1">
	<div class="row">
	<div class="col-md-6 mb-3">
      <label for="colFormLabel" class="col-sm col-form-label">Student / Instructor</label>
		<?php
			$borrower= "SELECT * FROM borrower";
			$borrower= mysqli_query($db, $borrower);
		?>
		<select name= "borrower" class="form-control" id="colFormLabel"required>
			<option value=""></option>
		<?php while ($row = mysqli_fetch_array($borrower)){ ?>
			<option value="<?php echo $row['stud_id']; ?>"><?php echo $row['lastname'].", ".$row['firstname'] ?></option>
		<?php } ?>
		</select>
    </div>
	<div class="col-md-6 mb-3">
      <label for="colFormLabel" class="col-sm col-form-label">Date Borrowed</label>
		 <input type="date" name="time" class="form-control" id="colFormLabel"/>
    </div>
	</div>
  <div class="row">
    <div class="col-md-4 mb-3">
      <label for="colFormLabel" class="col-sm col-form-label">tool /s to borrow</label>
			<?php
			$tools= "SELECT * FROM tools";
			$tools= mysqli_query($db, $tools);
		?>
		<select name= "tools" class="form-control" id="tools"required>
			<option value=""></option>
		<?php while ($row = mysqli_fetch_array($tools)){ ?>
			<option value="<?php echo $row['tool_id']; ?>"><?php echo $row[1] ?></option>
		<?php } ?>
		</select>
    </div>
	<div class="col-md-2 mb-3">
		<label for="colFormLabel" class="col-sm col-form-label">quantity</label>
		<input type="number" name="qty" class="form-control" id="qty" required />
    </div>

	</div>
		<div class="row">
    <div class="col-md-6 mb-3">
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
</div>
</body>
</html>

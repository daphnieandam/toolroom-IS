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
	$borrow_id = $_POST['borrow_id'];
	$returned = $_POST['returned'];
	
	$result = mysqli_query($db, "UPDATE borrow SET returned='$returned' WHERE borrow_id=$borrow_id");
		
		header("Location: borrowerview.php");
}
?>
<?php
$borrow_id = $_GET['borrow_id'];

$result = mysqli_query($db, "SELECT * FROM borrow,borrower,tools WHERE borrow.borrower=borrower.stud_id AND borrow.tools=tools.tool_id AND borrow_id=$borrow_id");

while($res = mysqli_fetch_array($result)) {
	$time = $res['time'];
	$borrower = $res['lastname'];
	$borrower1 = $res['firstname'];
	$tools = $res['toolname'];
	$qty = $res['qty'];
	$returned = $res['returned'];
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
					<li class="breadcrumb-item"><a href="borrowerview.php">List of Transaction</a></li>
					<li class="breadcrumb-item active" aria-current="page">Edit Transaction</li>
				</ol>
			</div>
		</nav>
<br/>
	<div class="container">
		<form name="form1" method="post" action="borrowedit.php">
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">time borrowed</label>
					<div class="col-sm-5">
						<input type="" name="time" value="<?php echo $time;?>" class="form-control">
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">Student / Instructor</label>
					<div class="col-sm-5">
						<input type="text" name="borrower" value="<?php echo $borrower;?>, <?php echo $borrower1;?>" class="form-control" id="colFormLabel">
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">tool</label>
					<div class="col-sm-5">
						<input type="text" name="tools" value="<?php echo $tools;?>" class="form-control" id="colFormLabel">
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">quantity</label>
					<div class="col-sm-5">
						<input type="number" name="qty" value="<?php echo $qty;?>" class="form-control" id="colFormLabel">
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">time returned</label>
					<div class="col-sm-5">
						<input type="date" name="returned" class="form-control" id="colFormLabel" value="<?php echo $returned;?>"/>
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label"></label>	
					<div class="col-sm-10">
						<input type="hidden" name="borrow_id" value=<?php echo $_GET['borrow_id'];?>>
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

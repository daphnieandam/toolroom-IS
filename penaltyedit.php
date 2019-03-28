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
	$penalty_id = $_POST['penalty_id'];
	$borrower = $_POST['borrower'];
	$tools = $_POST['tools'];
	$qy = $_POST['qy'];
	$penalty = $_POST['penalty'];
	$timecharge = $_POST['timecharge'];
	
	$result = mysqli_query($db, "UPDATE penalty SET borrower='$borrower', tools='$tools', qy='$qy', penalty='$penalty', timecharge='$timecharge' WHERE penalty_id=$penalty_id");
		
		header("Location: penaltyview.php");
}
?>
<?php
$penalty_id = $_GET['penalty_id'];

$result = mysqli_query($db, "SELECT * FROM penalty,borrower,tools,penalties WHERE penalty.borrower=borrower.stud_id AND penalty.tools=tools.tool_id AND penalty.penalty=penalties.pen_id AND penalty_id=$penalty_id");

while($res = mysqli_fetch_array($result)) {
	$borrower = $res['lastname'];
	$borrower1 = $res['firstname'];
	$tools = $res['toolname'];
	$qy = $res['qy'];
	$penalty = $res['pen_name'];
	$timecharge = $res['timecharge'];
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
						<a class="nav-link" href="borrowerview.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="transaction">Borrow</a>
					</li>
										<li class="nav-item">
						<a class="nav-link" href="penaltyview.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="charged"><b>| Penalty |</b></a>
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
					<li class="breadcrumb-item"><a href="penaltyview.php">List of Charged</a></li>
					<li class="breadcrumb-item active" aria-current="page">Edit penalty</li>
				</ol>
			</div>
		</nav>
<br/>
	<div class="container">
		<form name="form1" method="post" action="penaltyedit.php">
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">date charged</label>
					<div class="col-sm-5">
						<input type="date" name="timecharge" class="form-control" id="colFormLabel" value="<?php echo $timecharge;?>"/>
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
						<input type="number" name="qy" value="<?php echo $qy;?>" class="form-control" id="colFormLabel">
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label">penalty</label>
					<div class="col-sm-5">
						<select name= "penalty" class="form-control" id="colFormLabel"required>
							<option value="<?php echo $penalty ?>"><?php echo $penalty ?></option>
							<?php
							$penalties= "SELECT * FROM penalties";
							$penalties= mysqli_query($db, $penalties);
						?>
						<?php while ($row = mysqli_fetch_array($penalties)){ ?>
							<option value="<?php echo $row['pen_id']; ?>"><?php echo $row['pen_name'] ?></option>
						<?php } ?>
						</select>
					</div>
			</div>
			<div class="form-group row">
				<label for="colFormLabel" class="col-sm-2 col-form-label"></label>	
					<div class="col-sm-10">
						<input type="hidden" name="borrow_id" value=<?php echo $_GET['penalty_id'];?>>
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

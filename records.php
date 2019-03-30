<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>
<?php	
include_once("connection.php");
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
		<img src="icon/toolroom.png" width="30" height="30" alt="icon/toolroom.png"/>&nbsp;&nbsp;&nbsp;
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto" >
					<li class="nav-item active">
						<a class="nav-link" href="home.php" style="color: white;">Home</a>
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
						<a class="nav-link" href="records.php" style="color: white;"><b>| Records |</b></a>
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
		<nav aria-label="breadcrumb" role="navigation">
			<div class="col-sm-5">	  
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">All Records</li>
				</ol>
			</div>
		</nav>

<br/>
	<div class="container">
		<div class="row">
  <div class="col-sm-4">
    <div class="card" style="background-color: #CC7722;">
      <div class="card-body">
        <h5 class="card-title" style="font-family:Times New Roman;">Borrowed Tools</h5>
        <p class="card-text" style="color: #ffc107;">
		<?php
		$result = mysqli_query($db, "SELECT * FROM borrow,tools WHERE borrow.tools=tools.tool_id");
		?>
		<?php while($res = mysqli_fetch_array($result)) {	
			echo $res['toolname']."</br>";
		}
		?></p>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card" style="background-color: #CC7722;">
      <div class="card-body">
        <h5 class="card-title" style="font-family:Times New Roman;">List of All Borrowers</h5>
        <p class="card-text" style="color: #ffc107;">
		<?php
		$result = mysqli_query($db, "SELECT * FROM borrow,borrower WHERE borrow.borrower=borrower.stud_id");
		?>
		
		<?php while($res = mysqli_fetch_array($result)) {	
			echo $res['lastname'].", ".$res['firstname']."</br>";
		}
		?></p>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card" style="background-color: #CC7722;">
      <div class="card-body">
        <h5 class="card-title" style="font-family:Times New Roman;">List of All Charged Borrowers</h5>
        <p class="card-text" style="color: #ffc107;">
		<?php
		$result = mysqli_query($db, "SELECT * FROM penalty,borrower WHERE penalty.borrower=borrower.stud_id");
		?>
		
		<?php while($res = mysqli_fetch_array($result)) {	
			echo $res['lastname'].", ".$res['firstname']."</br>";
		}
		?></p>
      </div>
    </div>
  </div>
</div>
</br>
<div class="row">
  <div class="col-sm-3">
    <div class="card" style="background-color: #CC7722;">
      <div class="card-body">
        <h5 class="card-title" style="font-family:Times New Roman;">Departments &nbsp;&nbsp;<a class="btn btn-sm btn-warning" href="adddept.php">+</a></h5>
        <p class="card-text">
		<?php
		$result = mysqli_query($db, "SELECT * FROM department");
		?>
		<?php while($res = mysqli_fetch_array($result)) {	
			echo $res['dept_name']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"del.php?dept_id=$res[dept_id]\" onClick=\"return confirm('delete ?')\">delete</a>"."</br>";
		}
		?></p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="background-color: #CC7722;">
      <div class="card-body">
        <h5 class="card-title" style="font-family:Times New Roman;">Sections &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-warning" href="addsec.php">+</a></h5>
        <p class="card-text">
		<?php
		$result = mysqli_query($db, "SELECT * FROM section");
		?>
		<?php while($res = mysqli_fetch_array($result)) {	
			echo $res['sec_name']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"del.php?sec_id=$res[sec_id]\" onClick=\"return confirm('delete ?')\">delete</a>"."</br>";
		}
		?></p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="background-color: #CC7722;">
      <div class="card-body">
        <h5 class="card-title" style="font-family:Times New Roman;">Positions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-warning" href="addpos.php">+</a></h5>
        <p class="card-text">
		<?php
		$result = mysqli_query($db, "SELECT * FROM position");
		?>
		<?php while($res = mysqli_fetch_array($result)) {	
			echo $res['pos_name']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"del.php?pos_id=$res[pos_id]\" onClick=\"return confirm('delete ?')\">delete</a>"."</br>";
		}
		?></p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="background-color: #CC7722;">
      <div class="card-body">
        <h5 class="card-title" style="font-family:Times New Roman;">Penalties &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-warning" href="addpen.php">+</a></h5>
        <p class="card-text">
		<?php
		$result = mysqli_query($db, "SELECT * FROM penalties");
		?>
		<?php while($res = mysqli_fetch_array($result)) {	
			echo $res['pen_name']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"del.php?pen_id=$res[pen_id]\" onClick=\"return confirm('delete ?')\">delete</a>"."</br>";
		}
		?></p>
      </div>
    </div>
  </div>
</div>
		<br/><br/>
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

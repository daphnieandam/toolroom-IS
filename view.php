<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>
<?php	
include("connection.php");
$result = mysqli_query($db, "SELECT * FROM borrower WHERE login_id=".$_SESSION['id']." ORDER BY lastname ASC");
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
						<a class="nav-link" href="home.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="home">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tools.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="tools">Tools</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="view.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="students/instructors"><b>| Borrowers |</b></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="borrowerview.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="transaction">Borrow</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="penaltyview.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="charged">Penalty</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="records.php" style="color: white;" data-toggle="tooltip" data-placement="top" title="records">Records</a>
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
					<li class="breadcrumb-item active" aria-current="page">List of Borrowers</li>
				</ol>
			</div>
			<div class="col-sm-5">	
				<a class="btn btn-sm btn-outline-warning" href="add.php">add student / instructor</a>
			</div>
		</nav>
	
<br/>
	<div class="container">
		<table class="table">
			<tr bgcolor='#CC7722'>
			<td>ID No.</td>
			<td>lastname</td>
			<td>firstname</td>
			<td>action</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['stud_id']."</td>";
			echo "<td>".$res['lastname']."</td>";
			echo "<td>".$res['firstname']."</td>";
			echo "<td><a href=\"edit.php?stud_id=$res[stud_id]\">Edit</a> | <a href=\"delete.php?stud_id=$res[stud_id]\" onClick=\"return confirm('delete tool?')\">Delete</a></td>";		
		}
		?>
  <tbody>
</table>
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
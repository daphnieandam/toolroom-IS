<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>


<?php
include("connection.php");


$tool_id = $_GET['tool_id'];
$result=mysqli_query($db, "DELETE FROM tools WHERE tool_id=$tool_id");
header("Location: tools.php");
?>


<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
include("connection.php");


$penalty_id = $_GET['penalty_id'];
$result=mysqli_query($db, "DELETE FROM penalty WHERE penalty_id=$penalty_id");
header("Location:penaltyview.php");
?>


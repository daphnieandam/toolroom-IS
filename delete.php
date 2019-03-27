<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
include("connection.php");


$stud_id = $_GET['stud_id'];


$result=mysqli_query($db, "DELETE FROM borrower WHERE stud_id=$stud_id");

header("Location:view.php");
?>


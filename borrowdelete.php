<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>


<?php
include("connection.php");


$borrow_id = $_GET['borrow_id'];


$result=mysqli_query($db, "DELETE FROM borrow WHERE borrow_id=$borrow_id");

header("Location: borrowerview.php");
?>


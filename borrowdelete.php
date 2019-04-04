<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>


<?php
include("connection.php");


$transaction_id = $_GET['transaction_id'];
$result=mysqli_query($db, "DELETE FROM `transaction` WHERE `transaction_id` = $transaction_id;");

header("Location: borrowerview.php");
?>


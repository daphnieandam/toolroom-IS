<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
include("connection.php");


$dept_id = $_GET['dept_id'];
$result=mysqli_query($db, "DELETE FROM department WHERE dept_id=$dept_id");

$sec_id = $_GET['sec_id'];
$result=mysqli_query($db, "DELETE FROM section WHERE sec_id=$sec_id");

$pos_id = $_GET['pos_id'];
$result=mysqli_query($db, "DELETE FROM position WHERE pos_id=$pos_id");

$pen_id = $_GET['pen_id'];
$result=mysqli_query($db, "DELETE FROM penalties WHERE pen_id=$pen_id");

header("Location: records.php");
?>


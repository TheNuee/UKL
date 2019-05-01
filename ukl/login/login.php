<?php 
session_start();
include '../connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == "" || $password == "") 
{
 	header("location: form-login.php");
}
 else
{
	$query = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($connect, $query);

	$num = mysqli_num_rows($result);

	if ($num == 1) {
		header("location: ../peminjaman/read.php");
		$_SESSION['user'] = $username;
	}
	else {
		header("location: form-login.php");
	}
} ?>
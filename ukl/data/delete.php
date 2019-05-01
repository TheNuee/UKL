<?php
session_start(); 

if (!(isset($_SESSION['user']))) 
{
	header("location: ../login/form-login.php");
}
if (!(isset($_GET['id_inventarris']))) 
{
	header("location: read.php");
}
?><?php

include '../connect.php';

$id_inventaris = $_GET['id_inventaris'];

$query = "DELETE FROM inventaris WHERE id_inventaris = $id_inventaris";

$result = mysqli_query($connect, $query);

$num = mysqli_affected_rows($connect);

if ($num > 0) 
{
	header("location: read.php");
}
else
{
	echo "Gagal hapus data <br>";
}

echo "<a href='read.php'>Lihat Data</a>"; 

 ?>
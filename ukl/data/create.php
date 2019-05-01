<?php 
session_start();

if (!(isset($_POST['btnSimpan']))) 
{
	header("location: form-create.php");
}
if (!(isset($_SESSION['user']))) 
{
	header("location: ../login/form-login.php");
}
?>
<?php

include '../connect.php';


$id_inventaris = null;
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$jumlah = $_POST['jumlah'];
$jenis = $_POST['id_jenis'];
date_default_timezone_set('Asia/Bangkok');
$tanggal = date("Y/m/d");

$query = "INSERT INTO inventaris
          VALUES ('$id_inventaris','$nama', '$deskripsi','$jumlah','$jenis','$tanggal')";
        
$result = mysqli_query($connect, $query);

$num = mysqli_affected_rows($connect);

if($num > 0)
{
  
	header("location: read.php");
}
else
{
  echo "Gagal tambah data <br>";
}

echo "<a href='read.php'>Lihat Data</a>";

?>

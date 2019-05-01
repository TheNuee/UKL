<?php
session_start();

if (!(isset($_SESSION['setuju']))) {
    header("location: read.php");
}
if(!(isset($_GET['id_pinjam'])))
{
    header("location: read.php");
}
if(!(isset($_SESSION['user'])))
{
    header("location:../login/form=login.php");
}

include '../connect.php';
$id_inventaris = $_GET['id_inventaris'];
$query	=	"SELECT jumlah FROM inventaris WHERE id_inventaris = '$id_inventaris' ";


$result = mysqli_query($connect, $query);
$result = mysqli_fetch_assoc($result);
$ajumlah = $result['jumlah'];
$jumlah_pinjam = $_GET['jumlah'];
$id_pinjam = $_GET['id_pinjam'];
$jumlah = $ajumlah - $jumlah_pinjam;


// SET bila sudah setuju SETUJU

// SET HASIL
$hasil2="UPDATE  inventaris SET jumlah = '$jumlah' 

        WHERE id_inventaris = '$id_inventaris' ";
        
$results2 = mysqli_query($connect, $hasil2);

$hasil="UPDATE  peminjamn SET keadaan = 'setuju' 

        WHERE id_pinjam = '$id_pinjam' ";
        
$results = mysqli_query($connect, $hasil);
$num = mysqli_affected_rows($connect);

if($nums > 0)
{
    header("location: read.php");
}
else
{
    echo "Gagal update data <br>";
}
echo "<a href='read.php'>Lihat Data</a>";
?>
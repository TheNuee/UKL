<?php
session_start();

if(!(isset($_POST['btnSimpan'])))
{
    header("location: form-update.php");
}
if(!(isset($_SESSION['user'])))
{
    header("location:../login/form=login.php");
}
include '../connect.php';

$id_inventaris = $_POST['id_inventaris'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$jumlah = $_POST['jumlah'];

$query="UPDATE  inventaris SET nama='$nama',
                deskripsi='$deskripsi',
                jumlah='$jumlah'
        WHERE id_inventaris = '$id_inventaris' ";
        
$result = mysqli_query($connect, $query);
$num = mysqli_affected_rows($connect);

if($num > 0)
{
    
    header("location: read.php");
}
else
{
    echo "Gagal update data <br>";
}
echo "<a href='read.php'>Lihat Data</a>";
?>
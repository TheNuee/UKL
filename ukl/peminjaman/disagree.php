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


$hasil="UPDATE  peminjamn SET keadaan = 'Tidak Setuju' 

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
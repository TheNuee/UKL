<?php 

session_start();

if (!(isset($_SESSION['user']))) 
{
	header("location: ../login/form-login.php");
}


include '../connect.php';

if (!(isset($_GET['id_inventaris']))) 
{
	header("location: read.php");
}
$id_inventaris = $_GET['id_inventaris'];

$query = "SELECT id_inventaris, nama, deskripsi, jumlah
FROM inventaris where $id_inventaris";

$result = mysqli_query($connect, $query);
$data= mysqli_fetch_assoc($result); 

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	 <link rel="stylesheet" type="text/css" href="../gaya.css">
</head>
<body>

	<div class="pinggir">
 		<ul>
 			<h1>INVENT</h1>
 			<li><a href="../data/read.php"><i class="fa fa-user"></i> Data Barang</a></li>
 			<li><a href="../peminjaman/read.php"><i class="fa fa-graduation-cap"></i> Peminjam</a></li>
 			<li><a href="../login/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
 		</ul>
 	</div>

 	<div class="head">     
 	 	
     		</div>
	</div>

	<div class="content">
	<form action="update.php" method="post">
		<table>
			<tr>
				<td><label for="id_inventaris">ID Inventaris</label></td> <td> : </td>
				
				<td>
					<div class="ainput">
					<input readonly type="text" name="id_inventaris" placeholder="ID Inventaris" class="inputicon" id="id_inventaris" value="<?php echo $data['id_inventaris']; ?>">
					</div>
					</td>
			
				</tr>
				<tr>
			<td><label for="nama">Nama</label></td><td> : </td>
			<td>
				<div class="ainput">
				<input type="text" name="nama" placeholder="Masukkan Nama" class="inputicon">
				</div>
			</td>
			</tr>
			<tr>
			<td><label for="deskripsi">Deskripsi</label></td><td> : </td>
			<td>
				<div class="ainput">
				
			
				<input type="text-box" name="deskripsi" placeholder="Masukkan Deskripsi" class="inputicon">
				</div>
			</td>
			</tr>
			<tr>
			<td><label for="jumlah">Jumlah</label></td><td> : </td>
			<td>
				<div class="ainput">
				
			
				<input type="text-box" name="jumlah" placeholder="Masukkan Jumlah" class="inputicon">
				</div>
			</td>
			</tr>

			<tr>
			<td><label for=""></label></td> 
			<td></td> 
			<td><button class="button" name="btnSimpan">Simpan</button></td>
			</tr>
		</table>
		</form>
</div>
</body>
</html>
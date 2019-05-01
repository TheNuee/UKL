<?php
session_start(); 

if (!(isset($_SESSION['user']))) 
{
	header("location: ../login/form-login.php");
}

include '../connect.php';

$query	=	"SELECT id_inventaris, nama, deskripsi, jumlah
			 FROM inventaris ";

$result = mysqli_query($connect, $query);

$num = mysqli_num_rows($result);

?>



<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../gaya.css">
</head>
<body>


	 <div class="pinggir">
 		<ul>
 			<h1>Invent</h1>
 			<li><a href="../data/read.php"><i class="fa fa-user"></i> Data Inventaris </a></li>
 			<li><a href="../peminjaman/read.php"><i class="fa fa-graduation-cap"></i> Peminjaman </a></li>
 			<li><a href="../login/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
 		</ul>
 	</div>

 	<div class="head">     
 	 	
     		</div>
	</div>

	<div class="content">
	
		<!-- <a href="form-create.php"><button class="buttontambah" >Tambah</button></a> -->
 		<div>
 		<button onclick="location.href='form-create.php'" class="tambah">Tambah</button>	
 		</div>

	<table border="1" align="center">

		<thead>
		<tr>
			<th>No.</th>
			<th>ID Inventaris</th>
			<th>Nama</th>
			<th>Deskripsi</th>
			<th>Jumlah</th>
			<th colspan="2">Aksi</th>
		</tr>
		</thead>

		<tbody>
	<?php 
		if ($num > 0) 
		{
			$no = 1;
			while ($data = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td> <?php echo $no; ?> </td>
					<td> <?php echo $data['id_inventaris']?> </td>
					<td> <?php echo $data['nama']?> </td>
					<td> <?php echo $data['deskripsi']?>
					</td>
					<td> <?php echo $data['jumlah']?> </td>
					<td width="80px">
						<a href="form-update.php?id_inventaris=<?php echo $data['id_inventaris']; ?>"><button type="button" class="buttonedit">Ubah</button></a>
					</td>
					<td width="80px">
						<a href="delete.php?id_inventaris=<?php echo $data['id_inventaris']; ?>" onclick="return confirm('Anda yakin ingin menghapus data?')"><button type="button" class="buttonhapus">Hapus</button></a>
					</td>
				</tr> 	
		
		<?php 
		$no++;
			}
		}
		else
		{
			echo "<tr> <td colspan='7'> Tidak ada data </td></tr>";
		} 
		?>
		</tbody>
		</table>
	
	</div>
</body>
</html>

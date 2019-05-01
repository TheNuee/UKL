<?php
session_start(); 

if (!(isset($_SESSION['user']))) 
{
	header("location: ../login/form-login.php");
}

include '../connect.php';

$query	=	"SELECT id_pinjam, id_inventaris,jumlah, tgl_pinjam, tgl_kembali, keadaan
			 FROM peminjamn ";

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
 			<li><a href="../data/read.php"><i class="../login/gaya.php"></i> Data Inventaris </a></li>
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
			<th>ID Pinjam</th>
			<th>ID Inventaris</th>
            <th>Jumlah</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
            <th>Status</th>
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
					<td> <?php echo $data['id_pinjam']?> </td>
					<td> <?php echo $data['id_inventaris']?></td> 
                    <td method="post"> <?php echo $data['jumlah']?></td>
                    <td> <?php echo $data['tgl_pinjam']?></td>
					<td> <?php echo $data['tgl_kembali']?> </td>
					<td> <?php echo $data['keadaan']?> </td>
					<td width="100px">
						<a href="agree.php?id_pinjam=<?php echo $data['id_pinjam']; ?>&id_inventaris=<?php echo $data['id_inventaris']; ?>&jumlah=<?php echo $data['jumlah']; ?>"><button type="button" name='setuju' class="buttonedit">Sudah Setuju</button></a>
					</td>
					<td width="80px">
						<a href="delete.php?id_pinjam=<?php echo $data['id_pinjam']; ?>"><button type="button" class="buttonhapus">Tidak Setuju</button></a>
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

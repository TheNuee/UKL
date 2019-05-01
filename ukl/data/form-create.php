<?php 
session_start();

if (!(isset($_SESSION['user']))) {
  header("location: ../login/form-login.php");
 } 
 ?>
 <?php
X
include '../connect.php';
$query1 = "SELECT id_jenis, nama_jenis FROM jenis";
$hasil = mysqli_query($connect, $query1);

?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../gaya.css">
  </head>
  <body>

<div class="pinggir">
 		<ul>
 			<h1>SARPRA</h1>
 			<li><a href="../data/read.php"><i class="fa fa-user"></i> Data Barang </a></li>
 			<li><a href="../peminjaman/read.php"><i class="fa fa-graduation-cap"></i> Peminjaman </a></li>
 			<li><a href="../login/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
 		</ul>
 	</div>

  <div class="head">     
    
        </div>
  </div>

    <div class="content">
    <form action="create.php" method="post">
      <table>
        <tr>
          <td><label for="id_inventaris"></td>
          </tr>
        <tr>
          <td><label for="id_inventaris">ID Inventaris</label></td><td> : </td>
          <td>
            <div class="ainput">
            <input type="text" name="id_inventaris" placeholder="Masukkan ID Inventaris" class="inputicon">
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
          <td><label for="Deskripsi">Deskripsi</label></td><td> : </td>
          <td>
            <div class="ainput">
        
              <textarea name="deskripsi" id="" cols="30" rows="10"></textarea> 
          </div>
        </td>
        </tr>
        <tr>
          <td><label for="jumlah">Jumlah</label></td><td> : </td>
          <td>
            <div class="ainput">
            
        
            <input type="text" name="jumlah" placeholder="Masukkan Jumlah" class="inputicon">
            </div>
          </td>
        </tr>
        
        <tr>
			<td><label for="id_jenis">Jenis</label></td><td> : </td>
			<td>
				<div class="ainput">
				<select type="select" name="id_jenis">
				<option value="-">--Pilih salah satu--</option>
				<?php
				while ($data = mysqli_fetch_assoc($hasil)) {
					?>
					<option value="<?php echo $data['id_jenis']; ?>">
					<?php echo $data['nama_jenis']; ?>
					</option>
					<?php
				}
				?>
			</select>
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

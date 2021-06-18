<?php 

session_start();
  if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }
 
include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Id			= $_POST['Id'];
			$Nama			= $_POST['Nama'];
			$Jenis_Kelamin	= $_POST['Jenis_Kelamin'];
			$Jabatan		= $_POST['Jabatan'];
			$Telpon		= $_POST['Telpon'];

			$cek = mysqli_query($koneksi, "SELECT * FROM pengurus WHERE Id='$Id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO pengurus(Id, Nama, Jenis_Kelamin, Jabatan, Telpon) VALUES('$Id', '$Nama', '$Jenis_Kelamin', '$Jabatan', '$Telpon')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tampil.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Id sudah terdaftar.</div>';
			}
		}
		?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<title>Tambah Data</title>
</head>
<body>

		<div class="w-50 mx-auto">
	<form action="tambah.php" method="post">

				<label class="col-form-label col-md-3 col-sm-3 label-align">Id</label>
					<input type="text" name="Id" class="form-control"  required>
				
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
					<input type="text" name="Nama" class="form-control" required>
				
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" required>Laki-Laki
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" required>Perempuan
						</label>
					</div>
				</div>
			</div>

				<label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan</label>
					<input type="text" name="Jabatan" class="form-control" required>

				<label class="col-form-label col-md-3 col-sm-3 label-align">Telpon</label>
					<input type="text" name="Telpon" class="form-control" required>
			
			<br>
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="tampil.php" class="btn btn-warning">Kembali</a>

		</form>
	</div>
</body>
</html>

		
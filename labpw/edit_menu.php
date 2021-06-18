<?php

session_start();
  if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

require 'functions.php'; 
?>

<div class="container" style="margin-top:20px">
<center><font size="6">Edit Data</font></center>
		<hr>

<?php

$kode = $_GET["kode"];
$mnu = query("SELECT * FROM menu WHERE kode= '$kode'")[0];


if( isset($_POST["submit"])) {

	if( ubah($_POST) ) {
		echo "<script>alert('data berhasil diedit!'); document.location.href='tampil_menu.php';</script> ";
	}else {
		echo "<script>alert('data gagal diedit!'); document.location.href='tampil_menu.php';</script> ";
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
	<title>Edit Data</title>
</head>
<body>
	<div class="w-50 mx-auto">
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="kode" value="<?= $mnu["kode"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mnu["gambar"]; ?>">
		<div class="item form-group">
			<div class="col-md-6 col-sm-6">
		<input type="hidden" name="kode" class="form-control" size="4" value="<?= $mnu["kode"]; ?>" readonly required>
			</div>
		</div>

			<label for="nama_makanan">Nama Makanan</label>
			<input type="text" name="nama_makanan" class="form-control" required value="<?= $mnu["nama_makanan"]; ?>">

			<label for="khas">Khas</label>
			<input type="text" name="khas" class="form-control" required value="<?= $mnu["khas"]; ?>">

			<label for="harga">Harga</label>
			<input type="text" name="harga" class="form-control" required value="<?= $mnu["harga"]; ?>">

			<label for="gambar">Gambar</label>
			<img src ="images/menu/<?=$mnu["gambar"]; ?>" width="40"> 
			<input type="file" name="gambar" class="form-control">
		<br>

		<div class="item form-group">
			<div  class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
				<a href="tampil_menu.php" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</form>
	</div>
</body>
</html>

			
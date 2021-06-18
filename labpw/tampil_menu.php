<?php

session_start();
  if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

require 'functions.php';
$menu = query("SELECT * FROM menu ORDER BY kode DESC");

//tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$menu = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="icon" type="image/ico" href="assets/images/icon.png" />
	<title>Menu</title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
  	<i class="bi bi-shop"></i>
    <a class="navbar-brand" href="#">  Resto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li class="nav-item" style="margin-left: 180px;">
          <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house-door-fill"></i>  Home</a>
        </li>

        <li class="nav-item dropdown" style="margin-left:180px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-badge-fill"></i>  Pegawai</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="tambah.php">Tambah Data</a></li>
            <li><a class="dropdown-item" href="tampil.php">Tampil Data</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown" style="margin-left:180px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-menu-button-wide-fill"></i>  Menu</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="tambah_menu.php">Tambah Menu</a></li>
            <li><a class="dropdown-item" href="tampil_menu.php">Tampil Menu</a></li>
          </ul>
        </li>

        <li class="nav-item" style="margin-left: 180px;">
          <a class="nav-link active" aria-current="page" href="logout.php"><i class="bi bi-box-arrow-right"></i>  Logout</a>   
        </li>

      </ul>
    </div>
  </div>
</nav>


	<div class="container" style="margin-top:20px">
		<center><font size="6">DATA MENU</font></center>
		<hr>
		<div class="table-responsive">

		
		<br>

	<form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian ..." autocomplete="off">
		<button type="submit" name="cari">Cari</button>
		<a href="tambah_menu.php" class="btn btn-warning" style="margin-left: 977px;"><i class="bi bi-calendar-plus"></i>   Tambah Data</a>

	</form>	

		<table class="table table-striped table-hover">
			<thead style="background-color: blue;">
			<tr style="color: white; text-align: center;">
				<th>No.</th>
				<th>Kode</th>
				<th>Nama</th>
				<th>Khas</th>
				<th>Harga</th>
				<th>Gambar</th>
				<th>Aksi</th>
			</tr>
			</thead>

			<tbody>
			<?php $i = 1; ?>
			<?php foreach ( $menu as $row ) : ?>

			<tr style="text-align: center;">
				<td><?= $i; ?></td>
				<td><?php echo $row["kode"]; ?></td>
				<td><?php echo $row["nama_makanan"]; ?></td>
				<td><?php echo $row["khas"]; ?></td>
				<td><?php echo $row["harga"]; ?></td>
				<td><img src="images/menu/<?php echo $row["gambar"]; ?>" width="90"></td>
				<td>
					<a href="edit_menu.php?page=edit_menu&kode= <?php echo $row["kode"]; ?> " class="btn btn-secondary btn-sm">Edit</a>
					<a href="delete_menu.php?kode=<?php echo $row["kode"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
				</td>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>

		</tbody>
		</table>
		</div>	
	</div>
</body>
</html>
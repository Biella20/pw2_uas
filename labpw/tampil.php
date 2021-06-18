<?php

session_start();
  if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

include('config.php');
?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<title>Pengurus</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
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
		<center><font size="6">Data Pengurus</font></center>
		<hr>
		<a href="tambah.php" class="btn btn-warning"><i class="bi bi-calendar-plus"></i>   Tambah Data</a>
		<div class="table-responsive">
		<center>
		<table class="table table-striped table-hover">
			<thead style="background-color: blue;">
				<tr style="color: white;">
					<th>NO.</th>
					<th>Id</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Jabatan</th>
					<th>Telpon</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//ambil data dari tabel pengurus
				$sql = mysqli_query($koneksi, "SELECT * FROM pengurus ORDER BY Id DESC") or die(mysqli_error($koneksi));
				if(mysqli_num_rows($sql) > 0){
					$no = 1;
					while($data = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['Id'].'</td>
							<td>'.$data['Nama'].'</td>
							<td>'.$data['Jenis_Kelamin'].'</td>
							<td>'.$data['Jabatan'].'</td>
							<td>'.$data['Telpon'].'</td>
							<td>
								<a href="edit.php?Id='.$data['Id'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?Id='.$data['Id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			</tbody>
		</table>
	</div>


</body>
</html>
	

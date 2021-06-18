<?php 
session_start();
  if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>AAAA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <style>
    body {
      background-color: antiquewhite;
    }
  </style>

</head>

<body>


<!-- bagian navbar -->

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

<!-- Navbar Selesai -->


<!-- Card -->

<div class="card-responsive">
<div class="container" style="margin-top:20px">
  <font size="6" ><i class="bi bi-speedometer2"></i></i>   DASHBOARD</font>
  <hr>

  <div class="row text-white">
    <div class="card bg-info" style="width: 18rem; margin-left: 50px;" >
      <div class="card-body">
        <div class= "card-body-icon" style="position: absolute; z-index: 0; top: 25px; right: 
        4px; opacity: 0.4; font-size: 90px;">
          <i class="bi bi-people"></i>
        </div>
        <h5 class="card-title">JUMLAH PENGUNJUNG</h5>
        <div class="display-4" style="font-weight: bold">5.300</div>
        <a href=""><p class="card-text text-white">Lihat Detail >> </p></a>
      </div>
    </div>

    <div class="card bg-success " style="width: 18rem; margin-left: 40px;">
      <div class="card-body">
        <div class= "card-body-icon" style="position: absolute; z-index: 0; top: 25px; right: 
        4px; opacity: 0.4; font-size: 90px;">
          <i class="bi bi-people"></i>
        </div>
        <h5 class="card-title">JUMLAH PEKERJA</h5>
        <div class="display-4" style="font-weight: bold">52</div>
        <a href="#"><p class="card-text text-white">Lihat Detail >> </p></a>
      </div>
    </div>

    <div class="card bg-danger" style="width: 18rem; margin-left: 40px;">
      <div class="card-body">
        <div class= "card-body-icon" style="position: absolute; z-index: 0; top: 25px; right: 
        4px; opacity: 0.4; font-size: 90px;">
          <i class="bi bi-people"></i>
        </div>
        <h5 class="card-title">JUMLAH CHEF</h5>
        <div class="display-4" style="font-weight: bold">15</div>
        <a href=""><p class="card-text text-white">Lihat Detail >> </p></a>
      </div>
    </div>
  </div>

  <div class="row mt-5">

    <div class="card text-white text-center" style="width: 18rem; height: 270px; margin-left: 50px;">
      <div class="card-header bg-danger display-4 pt-4 pb-4">
        <i class="bi bi-instagram"></i>
      </div>
      <div class="card-body">
        <br>
        <h5 class="card-title text-danger">INSTAGRAM</h5>
        <br>
        <a href="#" class="btn btn-danger">FOLLOW</a>
      </div>
    </div>

    <div class="card text-white text-center" style="width: 18rem; margin-left: 40px;">
      <div class="card-header bg-info display-4 pt-4 pb-4">
        <i class="bi bi-facebook"></i>
      </div>
      <div class="card-body">
        <br>
        <h5 class="card-title text-info">FACEBOOK</h5>
        <br>
        <a href="#" class="btn btn-info">LIKE</a>
      </div>
    </div>

    <div class="card text-white text-center" style="width: 18rem; margin-left: 40px;">
      <div class="card-header bg-primary display-4 pt-4 pb-4">
        <i class="bi bi-twitter"></i>
      </div>
      <div class="card-body">
        <br>
        <h5 class="card-title text-primary">TWITTER</h5>
        <br>
        <a href="#" class="btn btn-primary">FOLLOW</a>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Card Selesai -->

</body>
</html>
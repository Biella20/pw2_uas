<?php
session_start();
  if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

include('config.php');

//jika benar mendapatkan GET kode dari URL
if(isset($_GET['kode'])){
	//membuat variabel $kode yang menyimpan nilai dari $_GET['kode']
	$kode = $_GET['kode'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki kode yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM menu WHERE kode='$kode'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi kode=$kode
		$del = mysqli_query($koneksi, "DELETE FROM menu WHERE kode='$kode'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="tampil_menu.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="tampil_menu.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="tampil_menu.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="tampil_menu.php";</script>';
}

?>

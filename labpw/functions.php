<?php

$koneksi = mysqli_connect("localhost", "root", "", "resto");


function query ($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}


function ubah($data) {

	global $koneksi;

	$kode			= $data["kode"];
	$nama_makanan 	= htmlspecialchars($data["nama_makanan"]);	
	$khas 			= htmlspecialchars($data["khas"]);	
	$harga 			= htmlspecialchars($data["harga"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	if($_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}	


	$query = "UPDATE menu SET nama_makanan='$nama_makanan', khas= '$khas', harga= '$harga', gambar= '$gambar' WHERE kode = '$kode' "; 
	mysqli_query($koneksi, $query);	

	return mysqli_affected_rows($koneksi);
}


function tambah ($data) {
	global $koneksi;
	$nama_makanan 	= htmlspecialchars($data['nama_makanan']);	
	$khas 			= htmlspecialchars($data['khas']);	
	$harga 			= htmlspecialchars($data['harga']);	


//Upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	} 


	$query = "INSERT INTO menu VALUES ('', '$nama_makanan', '$khas', '$harga', '$gambar')"; 
	mysqli_query($koneksi, $query);	

	return mysqli_affected_rows($koneksi);
}

function upload() {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	//cek apakah tidak ada gambar yang diupload
	if($error === 4) {
		echo "</script>
					alert('pilih gambar dulu');
				</script>";
		return false;
	}

	//cek gambar atau tidak
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "</script>
					alert('Yang anda upload bukan gambar!');
				</script>";
		return false;
	}

	//cek jika ukuran terlalu besar
	if($ukuranFile > 4000000) {
		echo "</script>
					alert('ukuran gambar terlalu besar');
				</script>";
		return false;
	}

	//lolos pengecekan
	//generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru.='.';
	$namaFileBaru.= $ekstensiGambar;

	move_uploaded_file($tmpName, 'images/menu/'. $namaFileBaru);
	return $namaFileBaru;

}


function cari($keyword) {
	$query = "SELECT * FROM menu WHERE 
				nama_makanan LIKE '%$keyword%' OR 
				khas LIKE '%$keyword%' ";
	return query ($query);

}


function registrasi($data) {
	global $koneksi;
	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($koneksi, $data["password"]);
	$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

	//cek username sudah ada atau belum
	$result = mysqli_query($koneksi, "SELECT username FROM user WHERE username='$username'");
	
	if(mysqli_fetch_assoc($result)) {
		echo "<script>alert('username sudah terdaftar!') </script>";
		return false;
	}


	// cek konfirmasi password
	if($password != $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru ke database
	mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($koneksi);
}

?>
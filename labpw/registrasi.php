<?php 
 
	require 'functions.php';

	if(isset($_POST['register'])) {
		if(registrasi($_POST) > 0) {
			echo '<script>
					alert("user baru berhasil ditambahkan!"); document.location="login.php";
				  </script>';
		} else {
			echo mysqli_error($koneksi);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Registrasi</title>
	<style>
		label {
			display: block;
		}
		body {
			background-color: blanchedalmond;
		}

	</style>
</head>
<body>
	<br><br><br><br>
	<center><h1>Halaman Registrasi</h1></center>

	<center>
	<form action="" method="post">
		
				<label for="username">username : </label>
				<input type="text" name="username" id="username" class="form-control" size="50">
			
				<label for="password">password :</label>
				<input type="password" name="password" id="password" class="form-control" size="50">
			
				<label for="password2">konfirmasi password : </label>
				<input type="password" name="password2" id="password2" class="form-control" size="50">
				
				<br><br>
				<button type="submit" name="register" style="background-color: yellowgreen;">register</button>
			
	</form>
</center>
</body>
</html>
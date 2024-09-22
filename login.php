<?php
include "inc/koneksi.php";

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Masjid Tercode | Log in</title>
	<link rel="icon" href="dist/img/masjid.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="dist/css/style-login.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="left">
			<div class="image-overlay"></div>
			<img src="dist/img/masjid.jpg" alt="Image" class="image">
		</div>
		<div class="right">
			<div class="logo-container">
				<img src="dist/img/tercode.png" alt="Logo" class="logo">
			</div>
			<div class="container-form">
				<form action="login.php" method="POST">
					<div class="flex flex-col gap-y-6">
						<div class="inputan1">
							<label for="email" class="form-label">Email</label>
							<div class="input-container">
								<i class="icon fa-thin fa-user-group"></i>
								<input type="email" name="email" placeholder="Masukan Email" required
									class="form-input email-input" />
							</div>
						</div>
						<div class="inputan2">
							<label for="passowrd" class="form-label">Kata Sandi</label>
							<div class="input-container">
								<input type="password" name="password" placeholder="Masukan Kata Sandi" required
									class="form-input" id="password" />
								<i class="icon2 fa-light fa-eye" id="togglePassword" style="cursor: pointer;"></i>
							</div>
						</div>

						<div class="flex justify-end">
							<a href="/forgot-password" style="margin-left: auto;" class="text2">Lupa Kata Sandi?</a>
						</div>
					</div>
					<div class="tombol">
						<button type="submit" name="btnLogin" class="button">
							Login
						</button>
					</div>

					<?php if (isset($error)): ?>
						<p class="error-text">
							<?php echo $error; ?>
						</p>
					<?php endif; ?>

					<div class="flex justify-center items-center mt-4">
						<span class="text">
							Belum punya akun?
						</span>
						<a href="/signup" class="link" style="margin-left: 5px;">Daftar</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
	<script src="dist/js/script-mata.js"></script>
</body>

</html>

<?php





if (isset($_POST['btnLogin'])) {
	//anti inject sql
	$email = mysqli_real_escape_string($koneksi, $_POST['email']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);

	//query login
	$sql_login = "SELECT * FROM tb_pengguna WHERE BINARY email='$email' AND password='$password'";
	$query_login = mysqli_query($koneksi, $sql_login);
	$data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
	$jumlah_login = mysqli_num_rows($query_login);


	if ($jumlah_login == 1) {
		session_start();
		$_SESSION["ses_id"] = $data_login["id_pengguna"];
		$_SESSION["ses_nama"] = $data_login["nama_pengguna"];
		$_SESSION["ses_email"] = $data_login["email"];
		$_SESSION["ses_password"] = $data_login["password"];
		$_SESSION["ses_level"] = $data_login["level"];

		echo "<script>
			Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'http://localhost/kas_masjid/';}
			})</script>";
	} else {
		echo "<script>
			Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'login';}
			})</script>";
	}
}

<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_email"]) == "") {
	header("location: login");

} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_email"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "inc/koneksi.php";
//FUNGSI RUPIAH
include "inc/rupiah.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Masjid Tercode</title>
	<link rel="icon" href="dist/img/logo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.css">
	<link rel="stylesheet" href="dist/css/style.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
		rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-light-primary">
			<!-- Brand Logo -->
			<div class="container-logo" id="container-logo">
				<a href="#"><img src="dist/img/tercode.png" alt="logo" class="logo"></a>
			</div>
			<div class="container-small-logo hidden" id="container-small-logo">
				<a href="#"><img src="dist/img/logo.png" alt="logo" class="small-logo"></a>
			</div>
			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "Administrator") {
							?>
							<li class="nav-item">
								<a href="http://localhost/kas_masjid/" class="nav-link">
									<i class="nav-icon fa-light fa-house"></i>
									<p>
										Dashboard
										<i class="fas fa-angle-down right"></i>
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fa-light fa-mosque"></i>
									<p>
										Kelola Masjid
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fa-light fa-hands-holding-dollar"></i>
									<p>
										Keuangan
										<i class="fas fa-angle-down right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=i_data_ks" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Pemasukan Kas Sosial</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=o_data_ks" class="nav-link">
											<i class="nav-icon far fa-circle text-danger"></i>
											<p>Pengeluaran Kas Sosial</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=rekap_ks" class="nav-link">
											<i class="nav-icon far fa-circle text-primary"></i>
											<p>Rekap Kas Sosial</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=lap_masjid" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Rekap Kas Masjid</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=lap_sosial" class="nav-link">
											<i class="nav-icon far fa-circle text-info"></i>
											<p>Rekap Kas Sosial</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item has-treeview">
								<a href="?page=MyApp/data_pengguna" class="nav-link">
									<i class="nav-icon fa-light fa-user-group"></i>
									<p>
										Jamaah
										<i class="fas fa-angle-down right"></i>
									</p>
								</a>
							</li>
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fa-light fa-calendar"></i>
									<p>
										Kegiatan
										<i class="fas fa-angle-down right"></i>
									</p>
								</a>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fa-light fa-user-group"></i>
									<p>
										Yatim & Dhuafa
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fa-light fa-newspaper"></i>
									<p>
										Berita & Artikel
									</p>
								</a>
							</li>

							<?php
						} elseif ($data_level == "Bendahara") {
							?>
							<li class="nav-item">
								<a href="http://localhost/kas_masjid/" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
										<span class="badge badge-warning right">2 Info</span>
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-bell"></i>
									<p>
										Kas Masjid
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=i_data_km" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Pemasukan Kas Masjid</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=o_data_km" class="nav-link">
											<i class="nav-icon far fa-circle text-danger"></i>
											<p>Pengeluaran Kas Masjid</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=rekap_km" class="nav-link">
											<i class="nav-icon far fa-circle text-primary"></i>
											<p>Rekap Kas Masjid</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-users"></i>
									<p>
										Kas Sosial
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=i_data_ks" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Pemasukan Kas Sosial</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=o_data_ks" class="nav-link">
											<i class="nav-icon far fa-circle text-danger"></i>
											<p>Pengeluaran Kas Sosial</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=rekap_ks" class="nav-link">
											<i class="nav-icon far fa-circle text-primary"></i>
											<p>Rekap Kas Sosial</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-file"></i>
									<p>
										Laporan Kas
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=lap_masjid" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Rekap Kas Masjid</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=lap_sosial" class="nav-link">
											<i class="nav-icon far fa-circle text-info"></i>
											<p>Rekap Kas Sosial</p>
										</a>
									</li>
							</li>
						</ul>
						</li>
						<?php
						}
						?>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content row">
				<nav class="custom-nav">
					<div class="navbar-left">
						<a href="#" data-widget="pushmenu">
							<i class="fas fa-bars"></i>
						</a>
						<span class="welcome">Selamat datang, <?php echo $data_nama; ?></span>
					</div>
					<div class="navbar-right">
						<div class="notif-icon">
							<i class="fa-light fa-bell"></i>
						</div>
						<div class="profile-pic">
							<img src="dist/img/profile.jpg" alt="Profile Picture" />
							<i class="fa-light fa-angle-down"></i>
							<div class="dropdown-menu">
								<a href="?page=profile">Profile</a>
								<a href="change-password.php">Ubah Password</a>
								<a onclick="return confirm('Apakah anda yakin akan keluar ?')"
									href="logout.php">Logout</a>
							</div>
						</div>
					</div>
				</nav>

				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">
					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {
							//Klik Halaman Home Pengguna
							case 'MyApp/admin':
								include "home/admin.php";
								break;
							case 'bendahara':
								include "home/bendahara.php";
								break;
							case 'profile':
								include "home/profile.php";
								break;

							//Pengguna
							case 'MyApp/data_pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'MyApp/add_pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'MyApp/edit_pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'MyApp/del_pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

							//Masjid in
							case 'i_data_km':
								include "bendahara/masjid/in/data_kas.php";
								break;
							case 'i_add_km':
								include "bendahara/masjid/in/add_kas.php";
								break;
							case 'i_edit_km':
								include "bendahara/masjid/in/edit_kas.php";
								break;
							case 'i_del_km':
								include "bendahara/masjid/in/del_kas.php";
								break;

							//Masjid out
							case 'o_data_km':
								include "bendahara/masjid/out/data_kas.php";
								break;
							case 'o_add_km':
								include "bendahara/masjid/out/add_kas.php";
								break;
							case 'o_edit_km':
								include "bendahara/masjid/out/edit_kas.php";
								break;
							case 'o_del_km':
								include "bendahara/masjid/out/del_kas.php";
								break;

							case 'rekap_km':
								include "bendahara/masjid/rekap_kas.php";
								break;

							//sos in
							case 'i_data_ks':
								include "bendahara/sosial/in/data_kas.php";
								break;
							case 'i_add_ks':
								include "bendahara/sosial/in/add_kas.php";
								break;
							case 'i_edit_ks':
								include "bendahara/sosial/in/edit_kas.php";
								break;
							case 'i_del_ks':
								include "bendahara/sosial/in/del_kas.php";
								break;

							//sos out
							case 'o_data_ks':
								include "bendahara/sosial/out/data_kas.php";
								break;
							case 'o_add_ks':
								include "bendahara/sosial/out/add_kas.php";
								break;
							case 'o_edit_ks':
								include "bendahara/sosial/out/edit_kas.php";
								break;
							case 'o_del_ks':
								include "bendahara/sosial/out/del_kas.php";
								break;

							case 'rekap_ks':
								include "bendahara/sosial/rekap_kas.php";
								break;

							//lap kas mas
							case 'lap_masjid':
								include "bendahara/laporan/lap_mas.php";
								break;
							case 'lap_sosial':
								include "bendahara/laporan/lap_sos.php";
								break;


							//default
							default:
								echo "<center><h1> ERROR !</h1></center>";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Administrator") {
							include "home/admin.php";
						} elseif ($data_level == "Bendahara") {
							include "home/bendahara.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<script src="dist/js/script.js"></script>
	<script src="dist/js/script-logo.js"></script>
	<!-- page script -->
	<script>
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function () {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>
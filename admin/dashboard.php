<?php
session_start();
include('config/config.php');
if (!isset($_SESSION['id'])) {
	header("Location: ../login.php");
}
$_SESSION['login_time'] = time();
include('../session_time.php');
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">

	<title>LocRent Portal | Admin Dashboard</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php include('header.php'); ?>

	<div class="ts-main-content">
		<?php include('sidebar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Dashboard</h2>
						<div id="main-content" class="container allContent-section py-4">
							<div class="row">
								<div class="col-sm-3">
									<div class="card">
										<i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
										<h4 style="color:white;">Total Users</h4>
										<h5 style="color:white;">
											<?php
											$kondisi = "status = 0";
											$sql = "SELECT COUNT(*) AS total FROM akun WHERE $kondisi";
											$result = $conn->query($sql);
											$row = $result->fetch_assoc();
											$count = $row["total"];
											echo $count;
											?>
										</h5>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="card">
										<i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
										<h4 style="color:white;">Mobil</h4>
										<h5 style="color:white;">
											<?php
											$kondisi = "jenis = 'Mobil'";
											$sql = "SELECT COUNT(*) AS total FROM kendaraan WHERE $kondisi";
											$result = $conn->query($sql);
											$row = $result->fetch_assoc();
											$count = $row["total"];
											echo $count;
											?>
										</h5>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="card">
										<i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
										<h4 style="color:white;">Motor</h4>
										<h5 style="color:white;">
											<?php
											$kondisi = "jenis = 'Motor'";
											$sql = "SELECT COUNT(*) AS total FROM kendaraan WHERE $kondisi";
											$result = $conn->query($sql);
											$row = $result->fetch_assoc();
											$count = $row["total"];
											echo $count;
											?>
										</h5>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="card">
										<i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
										<h4 style="color:white;">Penyewaan</h4>
										<h5 style="color:white;">
											<?php
											$sql = "SELECT COUNT(*) AS total FROM penyewaan";
											$result = $conn->query($sql);
											$row = $result->fetch_assoc();
											$count = $row["total"];
											echo $count;
											?>
										</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

</body>

</html>
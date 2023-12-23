<?php
session_start();
include('config/config.php');
if (!isset($_SESSION['id'])) {
	header("Location: ../login.php");
}
include('../session_time.php');
$id = $_SESSION['id'];
$sql = "SELECT * FROM akun WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
	$password = $_POST["password"];
	$newpas = $_POST["newpas"];
	$konfirm = $_POST["konfirm"];

	if ($password == $row["password"]) {
		if ($newpas == $konfirm) {
			$query = "UPDATE akun SET
                password ='$newpas' WHERE id=$id";
			$result = mysqli_query($conn, $query);
			if ($result == true) {
				echo "<script> alert('Password Berhasil Diubah'); </script>";
				header("Location:dashboard.php");
			}
		} else {
			echo "<script> alert('Password Tidak Sama'); </script>";
		}
	} else {
		echo "<script> alert('Password Lama Salah'); </script>";
	}

}
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

	<title>LocRent Edit-Mobil Portal | Admin Edit-Mobil</title>
	<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">

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
						<h2 class="page-title">Edit Mobil</h2>
						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal">
											<div class="form-group">
												<label class="col-sm-4 control-label">Password Lama</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="password"
														required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Password Baru</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="newpas" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Konfirmasi Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="konfirm" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
													<button class="btn btn-primary" name="submit"
														type="submit">Simpan</button>
												</div>
											</div>

										</form>

									</div>
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
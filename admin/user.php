<?php
session_start();
include('config/config.php');
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
}
include('../session_time.php');
if (isset($_REQUEST['del'])) {
    $delid = intval($_GET['del']);
    $sql = "delete from kendaran SET id=:status WHERE  id=:delid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':delid', $delid, PDO::PARAM_STR);
    $query->execute();
    $msg = "Vehicle  record deleted successfully";
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

	<title>LocRent Portal |Admin Pengguna </title>
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
						<h2 class="page-title">Pengguna</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Detail Pengguna</div>
							<div class="panel-body">
								<table class="table table-dark table-striped table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>ID</th>
											<th>Nama</th>
											<th>Alamat</th>
											<th>No. Telp</th>
											<th>Email</th>
											<th>Username</th>
										</tr>
									</thead>
									<tbody>
										<?php
                                        $kondisi = "status = 0";
$sql = "SELECT * from akun WHERE $kondisi";
$result = $conn->query($sql);
$count = 1;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
												<tr>
													<td>
														<?= $count ?>
													</td>
													<td>
														<?php echo $row["id"]; ?>
													</td>
													<td>
														<?= $row["nama"] ?>
													</td>
													<td>
														<?= $row["alamat"] ?>
													</td>
													<td>
														<?= $row["telp"] ?>
													</td>
													<td>
														<?= $row["email"] ?>
													</td>
													<td>
														<?= $row["username"] ?>
													</td>
												</tr>
												<?php $count = $count + 1;
    }
} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

</body>

</html>
<?php ?>
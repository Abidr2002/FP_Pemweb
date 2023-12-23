<?php
session_start();
include('config/config.php');
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
}
include('../session_time.php');
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $idk = $_GET["idk"];
    mysqli_query($conn, "UPDATE kendaraan SET status = 1 WHERE plat = '$idk'");
    mysqli_query($conn, "UPDATE penyewaan SET status = 1 WHERE id = $id");
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

	<title>LocRent Portal |Admin Penyewaan </title>
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
						<h2 class="page-title">Penyewaan</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Riwayat Penyewaan</div>
							<div class="panel-body">
								<table class="table table-dark table-striped table-hover">
									<thead>
										<tr>
											<th>Id</th>
											<th>Id User</th>
											<th>Tipe</th>
											<th>No. Pol</th>
											<th>Tgl Pesan</th>
											<th>Tgl Sewa</th>
											<th>Tgl Kembali</th>
											<th>Driver</th>
											<th>Total</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
                                        if (isset($_GET['unset'])) {
                                            unset($_GET['tanggal']);
                                        }

                                        $kondisi = "jenis = 'Mobil'";
if (isset($_GET['tanggal'])) {
    $tanggal_tertentu = $_GET['tanggal'];
    $sql = "SELECT penyewaan.id, akun.nama, kendaraan.tipe, kendaraan.plat, penyewaan.tgl_order, penyewaan.tgl_sewa, penyewaan.tgl_kembali, penyewaan.driver, penyewaan.total, penyewaan.status
        FROM penyewaan
        JOIN akun ON penyewaan.id_akun = akun.id
        JOIN kendaraan ON penyewaan.id_kendaraan = kendaraan.id
        WHERE $kondisi AND tgl_order LIKE '$tanggal_tertentu%'";
} else {
    $sql = "SELECT penyewaan.id, akun.nama, kendaraan.tipe, kendaraan.plat, penyewaan.tgl_order, penyewaan.tgl_sewa, penyewaan.tgl_kembali, penyewaan.driver, penyewaan.total, penyewaan.status
        FROM penyewaan
        JOIN akun ON penyewaan.id_akun = akun.id
        JOIN kendaraan ON penyewaan.id_kendaraan = kendaraan.id
        WHERE $kondisi";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
												<tr>
													<td>
														<?php echo $row["id"]; ?>
													</td>
													<td>
														<?= $row["nama"] ?>
													</td>
													<td>
														<?= $row["tipe"] ?>
													</td>
													<td>
														<?= $row["plat"] ?>
													</td>
													<td>
														<?= $row["tgl_order"] ?>
													</td>
													<td>
														<?= $row["tgl_sewa"] ?>
													</td>
													<td>
														<?= $row["tgl_kembali"] ?>
													</td>
													<?php if ($row["driver"] == 0) { ?>
														<td>Tidak</td>
													<?php } else { ?>
														<td>Ya</td>
													<?php } ?>
													<td>
														<?= $row["total"] ?>
													</td>
													<?php if ($row["status"] == 0) { ?>
														<td>Berlangsung</td>
													<?php } else { ?>
														<td>Selesai</td>
													<?php } ?>
													<td class="text-center"><a
															href="penyewaan.php?id=<?php echo $row["id"]; ?>&idk=<?php echo $row["plat"]; ?>"><i
																class="fa fa-edit"></i></a>&nbsp;&nbsp;</td>
												</tr>
												<?php
    }
} ?>
									</tbody>
								</table>
								<form method="GET" action="">
									<label for="tanggal">Filter Tanggal:</label>
									<input type="date" id="tanggal" name="tanggal">
									<button type="submit">Tampilkan Data</button>
								</form>
								<form method="GET" action="">
									<input type="hidden" name="unset" value="">
									<button type="submit">Reset</button>
								</form>
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
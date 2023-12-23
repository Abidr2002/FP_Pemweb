<?php
session_start();
include('config/config.php');
if (!isset($_SESSION['id'])) {
	header("Location: ../login.php");
}
// include('../session_time.php');
// if (isset($_GET["del"])) {
// 	$delid = $_GET["del"];
// 	$sql = "DELETE FROM kendaraan WHERE id='$delid'";
// 	$hasil = mysqli_query($conn, $sql);
// }

include('../session_time.php');
if (isset($_GET["del"])) {
	$delid = $_GET["del"];
	$sql = "DELETE FROM penyewaan WHERE id_kendaraan='$delid'";
	$hasil = mysqli_query($conn, $sql);
	$sql = "DELETE FROM kendaraan WHERE id='$delid'";
	$hasil = mysqli_query($conn, $sql);
	if ($hasil) {
		?>
		<script>
			document.addEventListener('DOMContentLoaded', () => {
				Swal.fire('Data berhasil dihapus', '', 'success')
			})
		</script>;
		<?php
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

	<title>LocRent Portal |Admin Mobil </title>
	<link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
						<h2 class="page-title">Mobil</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Detail Mobil</div>
							<div class="panel-body">
								<table class="table table-dark table-striped table-hover" width="100%">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">Gambar</th>
											<th class="text-center">Tipe </th>
											<th class="text-center">Warna</th>
											<th class="text-center">Transmisi</th>
											<th class="text-center">Kapasitas</th>
											<th class="text-center">No Pol</th>
											<th class="text-center">Harga</th>
											<th class="text-center">Status</th>
											<th class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$kondisi = "jenis = 'Mobil'";
										$sql = "SELECT * from kendaraan WHERE $kondisi";
										$result = $conn->query($sql);
										$count = 1;
										if ($result->num_rows > 0) {
											while ($row = mysqli_fetch_assoc($result)) {
												$gambar = $row['gambar'];
												$tipe = $row["tipe"];
												?>
												<tr>
													<td class="text-center">
														<?= $count ?>
													</td>
													<td class="text-center">
														<?= "<img src='data:image/jpeg;base64," . base64_encode($gambar) . "' alt='$tipe' height='120'>"; ?>
													</td>
													<td class="text-center">
														<?= $row["tipe"] ?>
													</td>
													<td class="text-center">
														<?= $row["warna"] ?>
													</td>
													<td class="text-center">
														<?= $row["transmisi"] ?>
													</td>
													<td class="text-center">
														<?= $row["kapasitas"] ?>
													</td>
													<td class="text-center">
														<?= $row["plat"] ?>
													</td>
													<td class="text-center">
														<?= $row["harga"] ?>
													</td>
													<td class="text-center">
														<?= $row["status"] ?>
													</td>
													<td class="text-center"><a
															href="edit-mobil.php?id=<?php echo $row["id"]; ?>"><i
																class="fa fa-edit"></i></a>&nbsp;&nbsp;
														<button class="btn" onclick="alert(<?php echo $row['id']; ?>)"><i
																class="fa fa-close" style="color: #f45900;"></i></button>
													</td>
												</tr>
												<?php $count = $count + 1;
											}
										} ?>
									</tbody>
								</table>
							</div>
						</div>
						<a href="tambah-mobil.php">
							<button type="button" class="btn btn-secondary" style="height:40px">Tambah Mobil
							</button>
					</div>
				</div>

			</div>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
		integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
		crossorigin="anonymous"></script>
	<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js
"></script>
	<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css
" rel="stylesheet">
	<script>
		function alert(id) {
			Swal.fire({
				title: 'Apakah Anda Yakin?',
				text: "Data akan dihapus secara permanen",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, Hapus Data'
			}).then((result) => {
				if (result.isConfirmed) {
					location.href = 'mobil.php?del=' + id;
				}
			})
		}
	</script>
</body>

</html>
<?php ?>
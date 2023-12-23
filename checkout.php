<?php
session_start();
include('admin/config/config.php');
if (isset($_SESSION['id'])) {
    $_SESSION['login_time'] = time();
    include('session_time.php');
}

$hari = $_GET['hari'];
$ongkos = $_GET['ongkos'];
$ongkos = $ongkos * $hari;

$id = $_SESSION['id'];
$kondisi = "jenis = 'Mobil'";
$sql = "SELECT penyewaan.id, akun.nama, kendaraan.tipe, kendaraan.transmisi, kendaraan.harga,kendaraan.kapasitas, kendaraan.plat, penyewaan.tgl_order, penyewaan.tgl_sewa, penyewaan.tgl_kembali, penyewaan.driver, penyewaan.total, penyewaan.status
        FROM penyewaan
        JOIN akun ON penyewaan.id_akun = akun.id
        JOIN kendaraan ON penyewaan.id_kendaraan = kendaraan.id
        WHERE $kondisi ORDER BY tgl_order DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

?>
<html>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- CSS Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- SCSS LINK -->
<link rel="stylesheet" href="style.css" />
<!-- FAVICON -->
<link rel="shortcut icon" href="./assets/img/icon.png" type="image/x-icon">

<!-- FONT -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

<!-- Font Awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>

    <!-- <img src="images/bg2.png" alt="" class="bg2"> -->

    <!-- NAVBAR-->
    <?php include('layout/header.php'); ?>

    <div id='form-wrapper'>
        <form>

            <div id='header' class='text-center mb-3'>
                <h1>Check Out</h1>
            </div>

            <h5>Info Pemesanan</h4>

                <div class='form-group mb-1'>
                    <label class='mb-1' for=''>Tipe</label>
                    <p>
                        <?= $row["tipe"] ?>
                    </p>
                </div>

                <div class='form-group mb-1'>
                    <label class='mb-1' for=''>Transmisi</label>
                    <p>
                        <?= $row["transmisi"] ?>
                    </p>
                </div>

                <div class='form-group mb-1'>
                    <label class='mb-1'>Kapasitas</label>
                    <p>
                        <?= $row["kapasitas"] ?>
                    </p>
                </div>

                <div class='form-group mb-1'>
                    <label class='mb-1' for=''>Tanggal Peminjaman</label>
                    <p>
                        <?= $row["tgl_sewa"] ?>
                    </p>
                </div>

                <div class='form-group mb-1'>
                    <label class='mb-1' for=''>Tanggal Pengembalian</label>
                    <p>
                        <?= $row["tgl_kembali"] ?>
                    </p>
                </div>

                <hr>
                <hr class='mb-1'>
                <h5>Pembayaran</h4>
                    <div class='text-center'>
                        <i class="fab fa-cc-visa fa-3x mr-3"></i>
                        <i class="fab fa-cc-mastercard fa-3x mr-3"></i>
                        <i class="fab fa-cc-amex fa-3x mr-3"></i>
                        <i class="fab fa-cc-discover fa-3x mr-3"></i>
                    </div>

                    <hr>
                    <h6>Rincian Pembayaran</h6>

                    <div class='form-group mb-1'>
                        <label class='mb-1' for=''>Harga</label>
                        <p>
                            <?= $row["harga"] ?> x
                            <?= $hari ?>
                        </p>
                    </div>


                    <div class='form-group mb-1'>
                        <label class='mb-1' for=''>Driver</label>
                        <p>Rp
                            <?= $ongkos ?>
                        </p>
                    </div>

                    <div class='form-group mb-1'>
                        <label class='mb-1' for=''>Total Pembayaran</label>
                        <p>
                            <?= $row["total"] ?>
                        </p>
                    </div>
                    <div class="d-grid gap-2">
                        <a class='btn btn-primary' href="sewa.php" style="color:white">BAYAR</a>
                    </div>
        </form>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>
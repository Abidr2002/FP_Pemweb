<?php
session_start();
include('admin/config/config.php');
if (isset($_SESSION['id'])) {
    $_SESSION['login_time'] = time();
    include('session_time.php');
}
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


    <!-- NAVBAR-->
    <?php include('layout/header.php'); ?>

    <!-- Riwayat Sewa PAGE -->
    <section id="riwayat-sewa-page">
        <div class="riwayat-sewa-con">
            <h2>Riwayat Kendaraan yang Anda Sewa</h2>
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Jenis</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Tipe </th>
                        <th class="text-center">Warna</th>
                        <th class="text-center">Transmisi</th>
                        <th class="text-center">No Pol</th>
                        <th class="text-center">Tgl Pinjam</th>
                        <th class="text-center">Tgl Kembali</th>
                        <th class="text-center">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $akun_id = $_SESSION['id'];
                    $kondisi = "id_akun='$akun_id'";
                    $sql = "SELECT * from kendaraan INNER JOIN penyewaan ON $kondisi AND kendaraan.id = penyewaan.id_kendaraan ORDER BY penyewaan.id DESC";
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
                                    <?php echo $row["jenis"]; ?>
                                </td>
                                <td class="text-center">
                                    <?= "<img src='data:image/jpeg;base64," . base64_encode($gambar) . "' alt='$tipe' height='200'>"; ?>
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
                                    <?= $row["plat"] ?>
                                </td>
                                <td class="text-center">
                                    <?= $row["tgl_sewa"] ?>
                                </td>
                                <td class="text-center">
                                    <?= $row["tgl_kembali"] ?>
                                </td>
                                <td class="text-center">
                                    <?= $row["total"] ?>
                                </td>
                            </tr>
                            <?php $count = $count + 1;
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- FOOTER
        <footer>
            <div class="footer-con">
                <div class="footer-l">
                    <a class="logoH" href="home.php">LOCCRENT</a>
                    <div class="info-wrap">
                        <div class="info">
                            <i class="fa fa-mobile" aria-hidden="true"></i>
                            056-876-190
                        </div>
                        <div class="info">
                            <i class="fas fa-envelope"></i>
                            loccRent@gmail.com
                        </div>
                    </div>
                    <div class="sponsored">
                        <h4>Sponsored By :</h4>
                        <div class="sponsors">
                            <div class="sponsor"></div>
                            <div class="sponsor"></div>
                            <div class="sponsor"></div>
                        </div>
                    </div>
                </div>
                <div class="footer-r">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="about.php">About US</a></li>
                        <li><a href="menu.php">Rent</a></li>
                        <li><a href="order.php">Login</a></li>
                      </ul>
                </div>
            </div>
            <div class="credit">
                <p>Copyrights @ 2023 LoccRent</p>
            </div>
        </footer> -->


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>
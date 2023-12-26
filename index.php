<!-- SESION PHP -->
<?php
session_start();
include 'admin/config/config.php';
include './layout/header.php';
if (isset($_SESSION['id'])) {
    $_SESSION['login_time'] = time();
    include('session_time.php');
}
?>
<!-- MAIN CONTENT -->
<main class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-md-6 text-justify">
        <h1 class="fw-bold">Selamat Datang di <br> LOCRENT !</h1>
        <p>Sewa Mudah, Liburan Bahagia: LOCRENT, Menghadirkan Pengalaman Perjalanan yang Mengesankan</p>
        <p>
          Apakah Anda mencari mobil yang nyaman untuk menjelajahi kota atau motor yang lincah untuk menjelajahi
          tempat-tempat terpencil yang indah? LOCRENT menyediakan berbagai pilihan kendaraan dengan kualitas terbaik.
          Dari
          mobil mewah hingga motor adventure, kami memiliki sesuatu untuk setiap jenis perjalanan dan anggaran.
        </p>
        <p>
          <a href="about.php" class="btn btn-outline-primary btn-lg">SELENGKAPNYA</a>
        </p>
      </div>
      <div class="col-12 col-md-6">
        <img src="./assets/img/Mobil jeep.png" alt="" class="img-fluid">
      </div>
    </div>
  </div>
</main>

<?php include './layout/footer.php' ?>
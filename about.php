<!-- SESION PHP -->
<?php
session_start();
include('admin/config/config.php');
include './layout/header.php';
if (isset($_SESSION['id'])) {
  $_SESSION['login_time'] = time();
  include('session_time.php');
}
?>

<main>

  <section class="pt-5" id="about">
    <div class="container">
      <div class="row flex-md-row-reverse align-items-center">

        <div class="col-12 col-lg-6 mb-3">
          <h1 class="text-center text-md-start">Tentang LOCRENT</h1>
          <div class="text-justify">
            <p>
              LOCRENT adalah perusahaan penyewaan kendaraan yang berfokus pada menyediakan solusi terbaik untuk
              kebutuhan perjalanan pariwisata Anda. Kami percaya bahwa perjalanan adalah peluang untuk mengeksplorasi,
              menciptakan kenangan tak terlupakan, dan menemukan kebebasan di jalan. Dengan dedikasi kami terhadap
              pelayanan yang luar biasa, kualitas kendaraan terbaik, dan pengalaman pelanggan yang tak tertandingi, kami
              hadir untuk memastikan perjalanan Anda menjadi lebih menyenangkan.
            </p>
          </div>
          <div class="card mb-3 bg-dark text-white border">
            <div class="d-flex align-items-center card-body">
              <img src="./assets/img/motor.jpeg" height="100" class="rounded" alt="">
              <div class="ms-3">
                <h5 class="mb-1">Motor</h5>
                <p>PCX-Honda, Nmax-Yamaha, Vario-Honda,...</p>
                <a href="motor.php" class="btn btn-primary text-white">SELENGKAPNYA</a>
              </div>
            </div>
          </div>
          <div class="card mb-3 bg-dark text-white border">
            <div class="d-flex align-items-center card-body">
              <img src="./assets/img/Avanza.jpeg" height="100" class="rounded" alt="">
              <div class="ms-3">
                <h5 class="mb-1">Mobil</h5>
                <p>Fortune, Pajero, Avanza, Ertiga, wuiling, BMW, Stargazer,...</p>
                <a href="mobil.php" class="btn btn-primary text-white">SELENGKAPNYA</a>
              </div>
            </div>
          </div>

        </div>
        <div class="col-12 col-lg-6 mb-3">
          <div class="row">
            <div class="col-6 mb-3 text-center">
              <img src="./assets/img/Avanza.jpeg" alt="" class="img-fluid rounded">
            </div>
            <div class="col-6 mb-3 text-center">
              <img src="./assets/img/promosi1.jpeg" alt="" class="img-fluid rounded">
            </div>
            <div class="col-6 mb-3 text-center">
              <img src="./assets/img/motor.jpeg" alt="" class="img-fluid rounded">
            </div>
            <div class="col-6 mb-3 text-center">
              <img src="./assets/img/promosi2.jpeg" alt="" class="img-fluid rounded">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- FOOTER -->
<footer class="page-footer">
  <!-- CONTACT US -->
  <section class="py-5 bg-dark border-bottom border-primary" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 mb-3">
          <h1 class="text-center text-md-start">Hubungi Kami</h1>
          <form method="post" name="formMassages" onsubmit="return validasi()" required>
            <label class="d-block mb-3">
              Nama
              <input type="text" class="form-control" name="nama" placeholder="Nama">
            </label>
            <label class="d-block mb-3">
              Subjek
              <input type="text" class="form-control" name="subject" placeholder="Subjek">
            </label>
            <label class="d-block mb-3">
              Pesan
              <textarea name="message" class="form-control" cols="30" rows="8" placeholder="Hualooo"></textarea>
            </label>
            <div class="d-grid d-md-block gap-2">
              <!-- <button type="button" class="btn btn-primary text-white">KIRIM</button> -->
              <input class="btn btn-primary" type="submit" value="Kirim" style="color:white">
            </div>
          </form>
        </div>
        <div class="col-12 col-md-6">
          <iframe class="rounded"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252357.1475739337!2d114.9197464945312!3d-8.7785035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2434e393149b9%3A0xd373aee9d7f9a3d8!2sBali%20Becik%20Car%20%26%20Motor%20Bike%20Rental!5e0!3m2!1sid!2sid!4v1686673006463!5m2!1sid!2sid"
            height="450" style="border:0;width: 100%;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>
  <div class="footer-content bg-dark pb-3 pt-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-4 col-lg-6 mb-3">
          <h1 class="fw-bold text-primary">LOCRENT</h1>
          <p>
            <a target="blank" href="https://wa.me/6285648403235"
              class="d-block d-lg-inline text-white text-decoration-none"><i class="bi bi-telephone-fill"></i> +62
              856-4840-3235</a>
            <a target="blank" href="mailto:sbyikmapas@gmail.com"
              class="d-block d-lg-inline text-white text-decoration-none"><i class="bi bi-envelope-fill ms-lg-3"></i>
              locrent@gmail.com</a>
          </p>
        </div>
        <div class="col-12 col-md-4 col-lg-3">
          <p class="m-1"><a href="index.php" class="text-white text-decoration-none">Beranda</a></p>
          <p class="m-1"><a href="about.php" class="text-white text-decoration-none">Tentang Kami</a></p>
          <p class="m-1"><a href="login.php" class="text-white text-decoration-none">Masuk</a></p>
        </div>
        <div class="col-12 col-md-4 col-lg-3">
          <p class="m-1"><a href="motor.php" class="text-white text-decoration-none">Rental Motor</a></p>
          <p class="m-1"><a href="mobil.php" class="text-white text-decoration-none">Rental Mobil</a></p>
        </div>
      </div>
    </div>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css
" rel="stylesheet">
<script>
  // Fungsi Untuk Mengirim Pesan Ke WhatsApp
  function validasi() {
    var a = document.forms["formMassages"]["nama"].value;
    var b = document.forms["formMassages"]["subject"].value;
    var c = document.forms["formMassages"]["message"].value;
    var no = 6285648403235;
    var pesanWhatsApp = "Dari : " + a + "!\n";
    pesanWhatsApp += "Subjek : " + b + "\n\n";
    pesanWhatsApp += "Pesan : " + c + "\n\n";
    pesanWhatsApp += "Pesan ini dikirim melalui website locrent.com"
    var url = "https://api.whatsapp.com/send?phone=" + no + "&text=" + encodeURIComponent(pesanWhatsApp);
    if (a == "" || b == "" || c == "") {
      Swal.fire(
        'Pesan Tidak Lengkap',
        'Lengkapi Form Pesan yang Tersedia',
        'warning'
      )
      return false;
    }
    else {
      window.open(url, "_blank");

      return false;
    }
  }
</script>
</body>

</html>
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

  <!-- PRODUCT PAGE -->
  <section id="page-product">
    <h2 class="pt-4 text-center">OUR RENTAL</h2>
    <div class="page-product-container container">
      <?php
      $kond2 = "status = 1";
      $sql = "SELECT * FROM kendaraan WHERE jenis = 'Mobil' AND $kond2 GROUP BY tipe";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $gambar = $row['gambar'];
          $tipe = $row["tipe"];
          ?>
          <div class="page-product-item">
            <div>
              <?= "<img src='data:image/jpeg;base64," . base64_encode($gambar) . "' alt='$tipe' height='200'  class='img-fluid rounded'>"; ?>
            </div>
            <div class="page-product-description">
              <h2 class="page-product-titile">
                <?= $row["tipe"] ?>
                <?= $row["warna"] ?>
              </h2>
              <p class="sub-tipe">Transmisi:
                <?= $row["transmisi"] ?>
              </p>
              <p class="sub-tipe">Harga/hari: Rp
                <?= $row["harga"] ?>
              </p>
              <p class="sub-tipe">kapasitas:
                <?= $row["kapasitas"] ?>
              </p>
              <?php
              $kond = "tipe = '$tipe'";
              $query = "SELECT * FROM kendaraan WHERE $kond ORDER BY id DESC LIMIT 1";
              $hasil = $conn->query($query);
              $baris = mysqli_fetch_assoc($hasil);
              if (isset($_SESSION['id'])) { ?>
                <a href="order.php?id=<?php echo $baris["id"]; ?>"><button class="button-sub-tipe">SEWA</button></a>
              <?php } else { ?>
                <a href="login.php?id=<?php echo $baris["id"]; ?>"><button class="button-sub-tipe">SEWA</button></a>
              <?php } ?>
            </div>
          </div>
          <?php
        }
      } ?>
    </div>
  </section>


  <footer class="page-footer">
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

  <!-- SCRIPT BUAT VALIDASI FORM -->
  <script>
    function validasi() {
      var a = document.forms["formMassages"]["full-name"].value;
      var b = document.forms["formMassages"]["email"].value;
      var c = document.forms["formMassages"]["messages"].value;

      if (a == "" || b == "" || c == "") {
        alert("Semua data harus terisi!")
        return false;
      }
    }
  </script>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>
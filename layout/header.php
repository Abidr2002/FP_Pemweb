<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ICON -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- FAVICON -->
  <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">

  <!-- FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="./assets/css/main.min.css">
  <title>LOCRENT</title>
</head>

<body class="text-white">

  <!-- NAVBAR -->
  <div class="position-relative" style="height: 83px;">
    <div class="fixed-top navbar-fixed">
      <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
          <a class="navbar-brand fs-1 fw-bold text-primary" href="index.php">LOCRENT</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
            <i class="bi bi-list text-primary"></i>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link mb-3 mb-lg-0 me-lg-3" href="index.php">BERANDA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-3 mb-lg-0 me-lg-3" href="about.php">TENTANG KAMI</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link mb-3 mb-lg-0 me-lg-3 dropdown-toggle" href="#" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  RENTAL
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="mobil.php">MOBIL</a></li>
                  <li><a class="dropdown-item" href="motor.php">MOTOR</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <?php
                if (!isset($_SESSION['id'])) { ?>
                  <a href="login.php" class="btn btn-outline-primary">MASUK</a>
                <?php } elseif (isset($_SESSION['id'])) {
                  ?>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    AKUN
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="sewa.php">Sewa</a></li>
                    <li><a class="dropdown-item" href="ganti-password.php">Ganti Password</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    <!-- <li><a class="dropdown-item" href="sewa.php">Sewa</a></li>
                    <li><a class="dropdown-item" href="ganti-password.php">Ganti Password</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li> -->
                  </ul>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
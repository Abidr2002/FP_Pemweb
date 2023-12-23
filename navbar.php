<!-- NAVBAR-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5" id="nav-container">
        <a class="navbar-brand" href="index.php"> LOCRENT </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0" id="nav-btn">
                <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                        RENTAL
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="mobil.php" >MOBIL</a></li>
                        <li><a class="dropdown-item" href="motor.php" >MOTOR</a></li>
                    </ul>
                </li>
                <li class="nav-item" ><a class="nav-link" href="aboutUs.php" >About Us</a></li>
                <?php
            if(!isset($_SESSION['id'])) {?>
                <li class="nav-item"><a class="nav-link" href="login.php" >LOGIN</a></li>
            <?php } elseif(isset($_SESSION['id'])) {
                ?>
                <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                        AKUN
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="sewa.php" >Sewa</a></li>
                        <li><a class="dropdown-item" href="ganti-password.php" >Ganti Password</a></li>
                        <li><a class="dropdown-item" href="logout.php" >Logout</a></li>
                    </ul>
                </li>
            <?php }?>
            </ul>
        </div>
    </div>
</nav>

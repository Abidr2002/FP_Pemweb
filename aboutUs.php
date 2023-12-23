<?php
session_start();
include('admin/config/config.php');
if(isset($_SESSION['id'])) {
    $_SESSION['login_time'] = time();
    include('session_time.php');
}
?>

<html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- SCSS LINK -->
    <link rel="stylesheet" href="style.css" />

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <body>
    
    <!-- <img src="images/bg2.png" alt="" class="bg2"> -->
    
    <!-- NAVBAR-->
    <?php include('navbar.php');?>

    <!-- ABOUT US -->
    <div class="about-us">
        <!-- SLIDER PROMOSI -->
        <section class="home">
        <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/promosi1.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/promosi2.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/promosi3.jpeg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        </section>

        <!-- RENT MOBIL/MOTOR -->
        <div class="menu-con">
            <div class="menu-cards">
                <div class="menu-card" style="width: 18rem;">
                    <img src="images/Avanza.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Car</h5>
                    <p class="card-text">Fortune, Pajero, Avanza, Ertiga, wuiling, BMW, Stargazer, Yariz, Ayla, Agya, Zenia, Jeep..</p>
                    <button class="menu-btn"><a href="mobil.php">Car List</a></button>
                    </div>
                </div>
                <div class="menu-card" style="width: 18rem;">
                    <img src="images/motor.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Motor</h5>
                    <p class="card-text">PCX-Honda, Nmax-Yamaha, Vario-Honda, Beat-Honda, Aerox-Yamaha...</p>
                    <button class="menu-btn"><a href="motor.php">Motorcycle List</a></button>
                    </div>
                </div>    
            </div>
        </div>
    </div>

    <!-- CONTACT US KONTEN  -->
        <div class="contactUs-con">
            <div class="massagesUs">
                <div class="contact-tittle">Massages Us</div>
                <div class="massagesUs-form">
                    <form method="post" name="formMassages" onsubmit="return validasi()" required>
                        <div class="items">
                            <label for="">Nama : </label>
                            <input class="nama" type="text" name="full-name" placeholder="Nama"><br>
                        </div>
    
                        <div class="items">
                            <label for="">G-Mail : </label>
                            <input class="mail" type="email" name="email"><br>
                        </div>
    
                        <div class="items">
                            <label for="">Pesan : </label> 
                            <textarea name="messages" id="" cols="30" rows="10"placeholder="Pesan" name="messages"></textarea> <br>
                        </div>
    
                        <div class="items">
                            <input class="btn-submit" type="submit" value="submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="OurContact-info">
                <div class="contact-tittle">Our Contact Info</div>  
                <div class="contact-infos">
                    <div class="contact-info">
                        <i class="fa-solid fa-phone"></i> 086436***  
                    </div>
                    <div class="contact-info">
                        <i class="fa-brands fa-instagram"></i>
                        locrent
                    </div>
                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        loccrentbali@gmail.com 
                    </div>
                </div>
            </div>
        </div>

    <!-- FOOTER -->
        <footer>
            <div class="footer-con">
                <div class="footer-l">
                    <a class="logoH" href="home.html">LOCCRENT</a>
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="checkout.php">About US</a></li>
                        <li><a href="sewa.php">Rent</a></li>
                        <li><a href="login.html">Login</a></li>
                      </ul>
                </div>
            </div>
            <div class="credit">
                <p>Copyrights @ 2023 LoccRent</p>
            </div>
        </footer>
    
    <!-- SCRIPT BUAT VALIDASI FORM -->
    <script>
        function validasi(){
            var a = document.forms["formMassages"]["full-name"].value;
            var b = document.forms["formMassages"]["email"].value;
            var c = document.forms["formMassages"]["messages"].value;

            if(a == "" || b == "" || c == ""){
                alert("Semua data harus terisi!")
                return false;
            }
        }
    </script>

         <!-- JavaScript Bundle with Popper -->
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
    </body>
</html>

<?php
require 'admin/config/config.php';
session_start();
if (isset($_POST["login"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            if ($row['status'] == 1) {
                header("Location: admin/dashboard.php");
            } else {
                $id = $_GET['id'];
                if (isset($id)) {
                    $url = "order.php?id=" . $id;
                    header("Location: $url");
                } else {
                    header("Location: about.php");
                }
            }
        } else {
            echo
                "<script> alert('Password Salah'); </script>";
        }
    } else {
        echo
            "<script> alert('Username atau Email Tidak Terdaftar'); </script>";
    }
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

    <!-- <img src="images/bg2.png" alt="" class="bg2"> -->

    <!-- NAVBAR-->
    <?php include('layout/header.php'); ?>

    <!-- LOGIN FORM -->
    <div class="login-form">
        <form action="" method="post">
            <div class="login-box">
                <h1>Login</h1>
                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Username atau Email" name="usernameemail" value="" required>
                </div>

                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password" name="password" value="" required>
                </div>
                <input class="login-btn" type="submit" name="login" value="Sign In">
                <div class="sign">
                    <p>Belum punya akun? <a href="signUp.php">Sign Up</a></p>
                </div>
            </div>
        </form>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="credit">
            <p>Copyrights @ 2023 LoccRent</p>
        </div>
    </footer>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>
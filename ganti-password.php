<?php
session_start();
include('admin/config/config.php');
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
}

$id = $_SESSION['id'];
$sql = "SELECT * FROM akun WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['gantipass'])) {
    $password = $_POST["pass"];
    $newpas = $_POST["newpass"];
    $konfirm = $_POST["konfirmasipass"];

    if ($password == $row["password"]) {
        if ($newpas == $konfirm) {
            $query = "UPDATE akun SET
                password ='$newpas' WHERE id=$id";
            $result = mysqli_query($conn, $query);
            if ($result == true) {
                echo "<script> alert('Password Berhasil Diubah'); </script>";
                header("Location:index.php");
            }
        } else {
            echo "<script> alert('Password Tidak Sama'); </script>";
        }
    } else {
        echo "<script> alert('Password Lama Salah'); </script>";
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
                <h1>Ganti Password</h1>
                <div class="textbox">
                    <input type="text" placeholder="password lama" name="pass" value="" required>
                </div>

                <div class="textbox">
                    <input type="password" placeholder="Password baru" name="newpass" value="" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="konfirmasi password baru" name="konfirmasipass" value=""
                        required>
                </div>
                <input class="login-btn" type="submit" name="gantipass" value="Submit">
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
<?php
session_start();
include('admin/config/config.php');
if (isset($_SESSION['id'])) {
    $_SESSION['login_time'] = time();
    include('session_time.php');
}

include('orderform.php');

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

    <!-- FORM ORDER -->
    <div class="order-cont mt-4">
        <h3>ORDER FORM</h3>
        <div class="form-cont">
            <div class="form-menu">
                <form class="col" name="message-form" method="post">
                    <div class="row">
                        <label for="" class="col-md-2">Nama Lengkap:</label>
                        <input type="text" name="nama" class="form-control col" value="<?php echo $row['nama'] ?>">
                    </div><br>
                    <div class="row">
                        <label for="" class="col-md-2">Nomor Telepon :</label>
                        <input type="text" name="telp" class="form-control col" value="<?php echo $row['telp'] ?>">
                    </div><br>
                    <div class="row">
                        <label for="" class="col-md-2">Alamat :</label>
                        <input type="text" name="alamat" class="form-control col" value="<?php echo $row['alamat'] ?>">
                    </div><br>
                    <div class="row">
                        <label for="" class="col-md-2">Pilih tanggal sewa</label>
                        <input type="date" name="tgl_sewa" class="form-container col">
                    </div><br>
                    <div class="row">
                        <label for="" class="col-md-2">Tanggal Kembali</label>
                        <input type="date" name="tgl_kbl" class="form-container col">
                    </div><br>
                    <div class="row">
                        <label for="" class="col-md-2">Fasilitas: </label>
                        <input type="radio" class="form-container col" name="driver" value="Driver">Driver
                        <input type="radio" class="form-container col" name="driver" value="Nodriver">no Driver
                    </div><br>
                    <input type="submit" class="btn btn-light form-control col" id="submit-btn" name="submit"
                        value="submit">
                </form>
            </div>
        </div>
    </div>

    <script>
        function validateform() {
            const namee = document.forms["message-form"]["namee"].value;
            const teleponn = document.forms["message-form"]["teleponn"].value;
            const addresss = document.forms["message-form"]["addresss"].value;
            const dateee = document.forms["message-form"]["dateee"].value;
            const ampma = document.forms["message-form"]["ampma"].value;

            if (namee == "" || teleponn == "" || addresss == "" || dateee == "" || ampma == "") {
                alert("Tidak boleh ada yang kosong");
                return false;
            }

            setSenderUI(namee, teleponn, addresss, dateee, ampma);
            return false;
        }

        function setSenderUI(namee, teleponn, addresss, dateee, ampma) {
            document.getElementById("name").innerHTML = namee;
            document.getElementById("telepon").innerHTML = teleponn;
            document.getElementById("address").innerHTML = addresss;
            document.getElementById("datee").innerHTML = dateee;
            document.getElementById("ampm").innerHTML = ampma;
        }
    </script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>
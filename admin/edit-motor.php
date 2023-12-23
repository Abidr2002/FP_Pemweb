<?php
session_start();
include('config/config.php');
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
}
include('../session_time.php');
$id = $_GET['id'];
$sql = "SELECT * FROM kendaraan WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
    $tipe = $_POST["tipe"];
    $warna = $_POST["warna"];
    $transmisi = $_POST["transmisi"];
    $plat = $_POST["plat"];
    $harga = $_POST["harga"];
    if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $lokasiFile = $_FILES['gambar']['tmp_name'];
        $dataGambar = file_get_contents($lokasiFile);
        $dataGambar = mysqli_real_escape_string($conn, $dataGambar);
        $query = "UPDATE kendaraan SET gambar= '$dataGambar' WHERE id=$id";
        $result = mysqli_query($conn, $query);
    }

    $query = "UPDATE kendaraan SET
        tipe='$tipe',
        warna='$warna',
        transmisi='$transmisi',
        kapasitas='$kapasitas',
        plat='$plat',
        harga='$harga' WHERE id=$id";
    $result = mysqli_query($conn, $query);


    if ($result == true) {
        header("Location:motor.php");
    }
}
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>LocRent Edit-Motor Portal | Admin Edit-Motor</title>
    <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include('header.php'); ?>
    <div class="ts-main-content">
        <?php include('sidebar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Edit Motor</h2>
                        <div id="main-content" class="container allContent-section py-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Tipe:</label>
                                            <input type="text" name="tipe" class="form-control"
                                                value="<?php echo $row['tipe'] ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Warna:</label>
                                            <input type="text" name="warna" class="form-control"
                                                value="<?php echo $row['warna'] ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Transmisi:</label>
                                            <input type="text" name="transmisi" class="form-control"
                                                value="<?php echo $row['transmisi'] ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label>No. Pol:</label>
                                            <input type="text" name="plat" class="form-control"
                                                value="<?php echo $row['plat'] ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Harga:</label>
                                            <input type="number" name="harga" class="form-control"
                                                value="<?php echo $row['harga'] ?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar:</label>
                                            <input type="file" name="gambar" accept="image/*">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
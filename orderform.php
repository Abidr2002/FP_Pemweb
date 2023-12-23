<?php
$id_akun = $_SESSION['id'];
$result = mysqli_query($conn, "SELECT * FROM akun WHERE id = $id_akun");
$row = mysqli_fetch_array($result);

if(isset($_POST["submit"])) {
    $id_kendaraan = $_GET['id'];
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $alamat = $_POST["alamat"];
    $tgl_sewaSTR = $_POST["tgl_sewa"];
    $tgl_kblSTR = $_POST["tgl_kbl"];
    if ($_POST["driver"] == "Driver") {
        $driver = 1;
    } else {
        $driver = 0;
    }
    $timestamp = date('Y-m-d H:i:s');
    $tgl_sewa = DateTime::createFromFormat('Y-m-d', $tgl_sewaSTR);
    $tgl_kbl =DateTime::createFromFormat('Y-m-d', $tgl_kblSTR);
    $selisih = date_diff($tgl_sewa, $tgl_kbl);
    $hari = $selisih->days + 1;


    $result = mysqli_query($conn, "SELECT * FROM akun WHERE id = $id_akun");
    $row = mysqli_fetch_array($result);

    $result = mysqli_query($conn, "UPDATE akun SET
         nama = '$nama',
         telp = '$telp',
         alamat = '$alamat' WHERE id = $id_akun");

    $result = mysqli_query($conn, "UPDATE kendaraan SET status = 0 WHERE id = $id_kendaraan");
    $result = mysqli_query($conn, "SELECT * FROM kendaraan WHERE id = $id_kendaraan");
    $row = mysqli_fetch_array($result);

    if ($driver == 1) {
        $ongkos_driver = 150000;
    } else {
        $ongkos_driver = 0;
    }

    $total = $hari * $row['harga'] + $ongkos_driver * $hari;

    $result = mysqli_query($conn, "INSERT INTO penyewaan VALUES('','$id_akun','$id_kendaraan','$timestamp','$tgl_sewaSTR','$tgl_kblSTR','$driver','$total', 0)");
    echo
    "<script> alert('Sewa Berhasil'); </script>";
    $url = "checkout.php?hari=" . $hari . "&ongkos=" . $ongkos_driver ;
    header("Location: $url");
}

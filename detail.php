<?php
session_start();
// koneksi ke database
include 'koneksi.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

$id = $_GET["id"];



$user = query("SELECT * FROM mahasiswa WHERE id = $id");
$username = $user[0]["nama"];
$nim = $user[0]["nim"];
$email = $user[0]["email"];
$jurusan = $user[0]["jurusan"];
$alamat = $user[0]["alamat"];

if (isset($_POST["submit"])) {
  // cek apakah data berhasil di edit atau tidak
  if (edit($_POST, $id) > 0) {
    $_SESSION['edit'] = true;
  }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.css" />
  <!-- fontstyle -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merienda+One&family=Noto+Serif&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Noto Serif', serif">
  <?php include('header.php') ?>
  <div class="container my-5 m-auto text-center">
    <!-- breadcrumb -->
    <div class="row container">
      <div class="col-8">
      </div>
      <div class="col-4">
        <ul class="breadcrumb fs-5 d-none d-md-flex">
          <li class="breadcrumb-item"><a href="index.php"> Kelola Mahasiswa</a></li>
          <li class="breadcrumb-item active">Detail Mahasiswa</li>
        </ul>
      </div>
    </div>
    <!-- akhir breadcumb -->
    <!-- file nama -->
    <h4 class="text-start fs-5 fw-bolder m-auto" style="max-width: 600px;">Nama Mahasiswa :</h4>
    <div class="input-group my-4">
      <p style="max-width: 600px;" class="form-control m-auto fs-5">
        <?= $username; ?>
      </p>
    </div>
    <!-- akhir file nama -->
    <!-- file NIM -->
    <h4 class="text-start fs-5 fw-bolder m-auto" style="max-width: 600px;">NIM Mahasiswa :</h4>
    <div class="input-group my-4">
      <p style="max-width: 600px;" class="form-control m-auto fs-5">
        <?= $nim; ?>
      </p>
    </div>
    <!-- akhir file NIM -->
    <!-- file email -->
    <h4 class="text-start fs-5 fw-bolder m-auto" style="max-width: 600px;">Email Mahasiswa :</h4>
    <div class="input-group my-4">
      <p style="max-width: 600px;" class="form-control m-auto fs-5">
        <?= $email; ?>
      </p>
    </div>
    <!-- akhir file email -->
    <!-- file jurusan -->
    <h4 class="text-start fs-5 fw-bolder m-auto" style="max-width: 600px;">Jurusan Mahasiswa :</h4>
    <div class="input-group my-4">
      <p style="max-width: 600px;" class="form-control m-auto fs-5">
        <?= $jurusan; ?>
      </p>
    </div>
    <!-- akhir file jurusan -->
    <!-- file alamat -->
    <h4 class="text-start fs-5 fw-bolder m-auto" style="max-width: 600px;">Alamat Mahasiswa :</h4>
    <div class="input-group my-4">
      <p style="max-width: 600px;" class="form-control m-auto fs-5">
        <?= $alamat; ?>
      </p>
    </div>
    <!-- akhir file alamat -->
  </div>
  <!-- bootstrap -->
  <script src="bootstrap.bundle.js"></script>
  <!-- script-ion-icons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
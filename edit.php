<?php
session_start();
// koneksi ke database
include 'koneksi.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

$id = $_GET["id"];

$user = query("SELECT * FROM mahasiswa WHERE id = $id");
$nama = $user[0]["nama"];
$nim = $user[0]["nim"];
$jurusan = $user[0]["jurusan"];

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

    <form action="" method="post">
      <!-- file nama -->
      <h4 class="text-start fs-5 fw-bolder m-auto" style="max-width: 600px;">Ubah Nama Mahasiswa :</h4>
      <div class="input-group my-4">
        <input style="max-width: 600px;" name="nama" type="text" class="form-control m-auto" required
          value="<?php echo $nama; ?>">
      </div>
      <!-- akhir file nama -->
      <!-- file nim -->
      <h4 class=" text-start fs-5 fw-bolder m-auto" style="max-width: 600px;">Ubah NIM :</h4>
      <div class="input-group my-4">
        <input style="max-width: 600px;" name="nim" type="number" class="form-control m-auto" required
          value="<?php echo $nim; ?>">
      </div>
      <!-- akhir file nim -->
      <!-- file jurusan -->
      <h4 class="text-start fs-5 fw-bolder m-auto" style="max-width: 600px;">Ubah Jurusan :</h4>
      <div class="input-group my-4 position-relative m-auto" style="max-width: 600px;">
        <input style="max-width: 600px;" name="jurusan" type="text" class="form-control m-auto rounded-end" id="jurusan"
          required value="<?php echo $jurusan; ?>">
      </div>
      <!-- akhir file jurusan -->
      <!-- submit -->
      <a href="index.php" class="btn btn-secondary fs-5 me-5">Batal</a>
      <button type="submit" name="submit" class="btn btn-primary fs-5">Ubah</button>
    </form>
  </div>
  <!-- bootstrap -->
  <script src="bootstrap.bundle.js"></script>
  <!-- script-ion-icons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!-- jquery -->
  <script src="jquery-3.6.0.min.js"></script>

  <!-- sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session sukses  -->
  <?php if (isset($_POST['submit'])): ?>
  <?php if (isset($_SESSION['edit'])): ?>
  <script>
    swal("Berhasil Mengubah Data", "", "success");
    setTimeout(function () {
      document.location = "index.php";
    }, 2500)
  </script>
  <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
  <?php unset($_SESSION['edit']); ?>
  <?php else: ?>
  <script>
    swal("Gagal Mengubah Data", "", "error");
      <?php unset($_SESSION[' edit ']); ?>
  </script>
  <?php endif; ?>
  <?php endif; ?>

</body>

</html>
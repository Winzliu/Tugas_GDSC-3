<?php
session_start();
require 'koneksi.php';


if (isset($_POST["tambahuser"])) {
  if (registrasi($_POST) > 0) {
    $_SESSION["tambahuser"] = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Mahasiswa</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merienda+One&family=Noto+Serif&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Noto Serif', serif">
  <?php include("header.php") ?>
  <nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
      <span class="navbar-text fs-4">Tambah Mahasiswa</span>

      <ul class="breadcrumb fs-5 d-none d-md-flex">
        <li class="breadcrumb-item"><a href="index.php">Kelola Mahasiswa</a></li>
        <li class="breadcrumb-item active">Tambah Mahasiswa</li>
      </ul>
    </div>
  </nav>
  <!-- Form -->
  <form action="" method="post" class="ms-2">
    <section class="fs-5">
      <ul class="list-group container">
        <li class="list-group-item bg-light fw-bolder fs-3 text-center" aria-current="true">Tambah User</li>
        <li class="list-group-item">
          <!-- nama -->
          <div class="my-3 ms-4" style="max-width: 800px;">
            <label for="nama" class="form-label">Nama</label>
            <input name="nama" autocomplete="off" type="text" class="form-control fs-6" id="nama" required>
          </div>
          <!-- akhir nama -->
          <!-- nim -->
          <div class="my-3 ms-4" style="max-width: 800px;">
            <label for="nim" class="form-label">NIM</label>
            <input name="nim" autocomplete="off" type="number" class="form-control fs-6" id="nim" required>
          </div>
          <!-- akhir nim -->
          <!-- email -->
          <div class="my-3 ms-4" style="max-width: 800px;">
            <label for="email" class="form-label">Email</label>
            <input name="email" autocomplete="off" type="email" class="form-control fs-6" id="email" required>
          </div>
          <!-- jurusan -->
          <div class="my-3 ms-4" style="max-width: 800px;">
            <label for="jurusan" class="form-label">Jurusan</label>
            <div class=" position-relative m-auto" style="max-width: 800px;">
              <input style="max-width: 800px;" name="jurusan" type="text" class="form-control m-auto rounded-end"
                id="jurusan" required>
            </div>
            <!-- akhir jurusan -->
            <!-- alamat -->
            <div class="my-3" style="max-width: 800px;">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea name="alamat" autocomplete="off" type="text" class="form-control fs-6" id="alamat"
                required></textarea>
            </div>
          </div>

          <button name="tambahuser" class="btn btn-primary ms-5 my-4" type="submit">Tambah</button>
        </li>
      </ul>
    </section>
  </form>
  <!-- bootstrap -->
  <script src="bootstrap.bundle.js"></script>

  <!-- sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- script-ion-icons -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- showpassword -->
  <script>
    function showPassword() {
      let icon = document.getElementById('icon');
      let password = document.getElementById('password');
      if (password.getAttribute("type") === 'password') {
        password.setAttribute("type", "text")
        icon.setAttribute("name", "eye-off-outline")
      } else {
        password.setAttribute("type", "password")
        icon.setAttribute("name", "eye-outline")
      }
    }
  </script>
  <!-- show konfirmasi password -->
  <script>
    function showPassword2() {
      let icon = document.getElementById('icon2');
      let password = document.getElementById('password2');
      if (password.getAttribute("type") === 'password') {
        password.setAttribute("type", "text")
        icon.setAttribute("name", "eye-off-outline")
      } else {
        password.setAttribute("type", "password")
        icon.setAttribute("name", "eye-outline")
      }
    }
  </script>

  <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
  di dalam session sukses  -->
  <?php if (isset($_POST['tambahuser'])): ?>
  <?php if (isset($_SESSION['tambahuser'])): ?>
  <script>
    swal("Berhasil Menambahkan Mahasiswa", "", "success");
    setTimeout(function () {
      document.location = "./";
    }, 2500)
  </script>
  <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
  <?php unset($_SESSION['tambahuser']); ?>
  <?php else: ?>
  <script>
    swal("Gagal Menambahkan Mahasiswa", "", "error");
  </script>
  <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
  <?php unset($_SESSION['tambahuser']); ?>
  <?php endif; ?>
  <?php endif; ?>
</body>

</html>
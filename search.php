<?php
require 'koneksi.php';

$keyword = mysqli_real_escape_string($conn, $_GET["keyword"]);

// pagination
$JumlahDataPerHal = 5;
$JumlahData = count(query("SELECT * FROM mahasiswa"));
$JumlahHalaman = ceil($JumlahData / $JumlahDataPerHal);

$HalSekarang = (isset($_GET["page"])) ? $_GET["page"] : 1;


$IndeksData = ($HalSekarang * $JumlahDataPerHal) - $JumlahDataPerHal;


$user = query("SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' LIMIT $IndeksData,$JumlahDataPerHal");

?>

<table id="container" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="text-center">#</th>
      <th>Nama Mahasiswa</th>
      <th class="d-none d-md-table-cell">NIM</th>
      <th class="d-none d-md-table-cell">Jurusan</th>
      <th colspan="2" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1 ?>
    <?php foreach ($user as $u): ?>
    <tr>
      <th scope="row" class="text-center">
        <?php echo $i + ($HalSekarang - 1) * $JumlahDataPerHal; ?>
      </th>
      <td>
        <?php echo $u["nama"]; ?>
      </td>
      <td class="d-none d-md-table-cell">
        <?php echo $u["nim"]; ?>
      </td>
      <td class="d-none d-md-table-cell">
        <?php echo $u["jurusan"]; ?>
      </td>
      <!-- edit -->
      <td class="text-center">
        <a class="btn btn-success py-1 ps-2 pe-1 opacity-75">
          <ion-icon name="create" class="fs-5"></ion-icon>
        </a>
      </td>
      <!-- akhir edit -->
      <!-- hapus -->
      <td class="text-center">
        <a href="confirmUser.php?id=<?php echo $u["id"]; ?>" class="btn btn-danger py-1 px-2 opacity-75">
          <ion-icon name="trash" class="fs-5"></ion-icon>
        </a>
      </td>
      <!-- akhir hapus -->
    </tr>
    <?php $i++ ?>
    <?php endforeach; ?>
  </tbody>
</table>
<?php
$conn = mysqli_connect("localhost", "root", "", "gdsc");

// fungsi query
function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

// fungsi tambah user
function registrasi($data)
{
  global $conn;

  $nama = mysqli_real_escape_string($conn, $data["nama"]);
  $nim = mysqli_real_escape_string($conn, strtolower(htmlspecialchars($data["nim"])));
  $jurusan = mysqli_real_escape_string($conn, $data["jurusan"]);
  $email = mysqli_real_escape_string($conn, $data["email"]);
  $alamat = mysqli_real_escape_string($conn, $data["alamat"]);

  $result = mysqli_query($conn, "SELECT nama FROM mahasiswa WHERE nama = '$nama'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
    alert('username telah dipakai');
    </script>";
    return false;
  }

  // tambah password ke database
  mysqli_query($conn, "INSERT INTO mahasiswa VALUES('','$nama','$nim','$email','$jurusan','$alamat')");

  return mysqli_affected_rows($conn);
}
// akhir fungsi tambah user


// fungsi edit user
function edit($edit, $idUser)
{
  global $conn;
  $user = query("SELECT * FROM mahasiswa WHERE id = $idUser");
  $namaLama = $user[0]['nama'];
  $nama = mysqli_real_escape_string($conn, $edit["nama"]);
  $nim = mysqli_real_escape_string($conn, htmlspecialchars($edit["nim"]));
  $jurusan = mysqli_real_escape_string($conn, $edit["jurusan"]);
  $result = mysqli_query($conn, "SELECT nama FROM mahasiswa WHERE nama = '$nama'");

  if (mysqli_fetch_assoc($result) && $nama != $namaLama) {
    echo "<script>
    alert('nama telah dipakai');
    </script>";
    return false;
  }

  $id = $idUser;

  mysqli_query($conn, "UPDATE mahasiswa SET  nama = '$nama', nim = '$nim', jurusan = '$jurusan' WHERE id = $id");

  return mysqli_affected_rows($conn);
}
// akhir fungsi edit user

?>
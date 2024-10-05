<?php 
require 'function.php';
// cek apakah tombol sudah dipencet atau blm
if (isset($_POST["submit"])) {


    if(tambah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil ditambahkan!');
        document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('gagal menambahkan data');
        </script>
        ";
    }
    
    // ambil data dari tiap elemen dalam form
    // $judul = $_POST["judul"];
    // $penyanyi = $_POST["penyanyi"];
    // $band = $_POST["band"];
    // $durasi = $_POST["durasi"];
    // $tanggal = $_POST["tanggal"];

    // // query insert data
    // $query = "INSERT INTO lagu
    //         VALUES
    //         ('', '$judul', '$penyanyi', '$band', '$durasi', '$tanggal')
    //         ";
    // mysqli_query($db, $query);

    // cek apakah data berhasil terkirim
    // if (mysqli_affected_rows($db) > 0) {
    //     echo"berhasil";
    // } else {
    //     echo"gagal!";
    //     echo "<br>";
    //     echo mysqli_error($db);     
    // }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>

</head>
<style>

</style>
<body>
    <h1>Tambah Data <span>Lagu</span></h1>
    <br>
    
    
    <form action="" method="post" enctype="multipart/form-data">
  
    </div>
  <div class="mb-3 row">
    <label for="judul" class="col-sm-2 col-form-label">Judul Lagu: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="judul" name="judul">
    </div>
  </div>
  </div>
  <div class="mb-3 row">
    <label for="penyanyi" class="col-sm-2 col-form-label">Nama Penyanyi: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="penyanyi" name="penyanyi">
    </div>
  </div>
  </div>
  <div class="mb-3 row">
    <label for="band" class="col-sm-2 col-form-label">Nama Band: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="band" name="band">
    </div>
  </div>
  </div>
  <div class="mb-3 row">
    <label for="durasi" class="col-sm-2 col-form-label">Durasi: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="durasi" name="durasi" placeholder="00:00:00" pattern="^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$">
    </div>
  </div>
  </div>
  <div class="mb-3 row">
    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Rilis: </label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="tanggal" name="tanggal">
    </div>
  </div>
  </div>
  <div class="mb-3 row">
    <label for="lirik" class="col-sm-2 col-form-label">Lirik : </label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="lirik" name="lirik">
    </div>
  </div>
  <button type="submit" class="btn btn-outline-success" name="submit">Send</button>
  
    </form>

</body>
</html>
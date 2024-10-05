<?php 
require 'function.php';

// ambil data di URL
$id = $_GET["id"];

// query data lagu berdasarkan id
$lagu = query("SELECT * FROM lagu WHERE id = $id")[0];

// cek apakah tombol sudah dipencet atau blm
if (isset($_POST["submit"])) {

    if(edit($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diubah!');
        document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('gagal mengubah data');
        </script>
        ";
    }
    

}

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Mahasiswa</title>

</head>
<style>

</style>
<body>
    <h1>Update Data <span>Lagu</span></h1>
    <br>
    

    
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= ($lagu["id"]); ?> ">
    </div>
  <div class="mb-3 row">
    <label for="judul" class="col-sm-2 col-form-label">Judul Lagu: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="judul" name="judul" value="<?= ($lagu["judul_lagu"]); ?> ">
    </div>
  </div>
  </div>
  <div class="mb-3 row">
    <label for="penyanyi" class="col-sm-2 col-form-label">Nama Penyanyi: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="penyanyi" name="penyanyi" value="<?= ($lagu["nama_penyanyi"]); ?> ">
    </div>
  </div>
  </div>
  <div class="mb-3 row">
    <label for="band" class="col-sm-2 col-form-label">Nama Band: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="band" name="band" value="<?= ($lagu["nama_band"]); ?> ">
    </div>
  </div>
  </div>
  <div class="mb-3 row">
    <label for="durasi" class="col-sm-2 col-form-label">Durasi: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="durasi" name="durasi" placeholder="00:00:00" 
      pattern="^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$" value="<?= ($lagu["durasi"]); ?> ">
    </div>
  </div>
  </div>
  <div class="mb-3 row">
    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Rilis: </label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= ($lagu["tanggal_rilis"]);?>">
  </div>
  </div>
  <div class="mb-3 row">
    <label for="lirik" class="col-sm-2 col-form-label">Lirik : </label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="lirik" name="lirik" value="<?= ($lagu["lirik"]);    ?>">
    </div>
  </div>
  <br><br><br>
  <button type="submit" class="btn btn-outline-success" name="submit">Send</button>
    </form>
    
    

   
</body>
</html>
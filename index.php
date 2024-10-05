<?php 

require 'function.php';
$lagu = query("SELECT * FROM lagu ORDER BY id DESC"); 
$showButton = false;

if (isset($_POST["cari"]) ) {
    $lagu = cari($_POST["keyword"]);
    $showButton = true;
}

if (isset($_POST["show"])) {
    $lagu = query("SELECT * FROM lagu ORDER BY id DESC"); 
    
   }

// UNTUK MEMERIKSA ERROR
// if (!$result) {
//     echo mysqli_error($db);
// }

// NGECEK ISI LUARAN
// var_dump($result);

// ambil data (fetch) lagu dari object result
// myssqli_fetch_row() -- mengembalikan array numerik
// mysqli_fetch_assoc() -- mengembalikan array associative
// mysqli_fetch_array() -- bisa dua duanya karena dobel
// mysqli_fetch_object() -- pake tanda panah (->)

// while ($lagu = mysqli_fetch_assoc($result)) {

// }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN ADMIN</title>

    <link rel="stylesheet" href="style.css">
  
</head>

<body>


<h1>DAFTAR LAGU</h1>

<div class="tombol">
<a href="tambah.php" class="btn btn-primary">Tambah Data Lagu</a>
<br>
<br>
<form action="" method="post">
    <input type="text" name="keyword" size="150" autofocus placeholder="masukkan keyword!" autocomplete="off">
    <button class="btn btn-primary" type="submit" name="cari">CARI!</button>

    <?php if (isset($showButton) && $showButton) { ?>
        <br><br>
        <button type="submit" class="btn btn-outline-primary" name="show" >Tampilkan Semua</button>
    <?php } ?>
    
    </form>
</div>


<table class="table table-light table-borderless">
  
<br>

<tr>
    <th>No. </th>
    <th>Aksi</th>
    <th>Lirik</th>
    <th>Durasi</th>
    <th>Judul Lagu</th>
    <th>Nama Penyanyi</th>
    <th>Nama Band</th>
    <th>Tanggal Rilis</th>

</tr>
<?php $noUrut = 0; ?>
<?php foreach($lagu as $row) :
    $noUrut++;
    ?>
   
<tr>
    <td><?= $noUrut?></td>
    <td>
        <a href="edit.php?id=<?= $row["id"]; ?>" class="btn btn-success">Edit</a> |
        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('apakah anda yakin ingin menghapus?')" class="btn btn-danger">Delete</a>
    </td>
    <td>
        <a href="lyrics/<?= $row["lirik"]; ?>.txt" class-="btn btn-info" download>Download Lirik</a>
    </td>
    <td><?= $row["durasi"] ?></td>
    <td><?= $row["judul_lagu"]  ?></td>
    <td><?= $row["nama_penyanyi"]  ?></td>
    <td><?= $row["nama_band"]  ?></td>
    <td><?= $row["tanggal_rilis"]  ?></td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>
<?php 

// koneksi ke database
$db = mysqli_connect("localhost", "root", "", "belajarphp");

function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $db;
    // $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $penyanyi = htmlspecialchars($data["penyanyi"]);
    $band = htmlspecialchars($data["band"]);
    $durasi = htmlspecialchars($data["durasi"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    
    // upload file
    $lirik = upload();

    if (!$lirik) {
        return false;

    }

    // query insert data
    $query = "INSERT INTO lagu
            VALUES
            ('', '$judul', '$penyanyi', '$band', '$durasi', '$tanggal', '$lirik')
            ";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function upload () {
    
    $namaFile = $_FILES['lirik']['name'];
    $ukuranFile = $_FILES['lirik']['size'];
    $error = $_FILES['lirik']['error'];
    $tmpName = $_FILES['lirik']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload

    if ($error === 4) {
        echo "<script>
        alert('upload file terlebih dahulu!')
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah .txt
    $acceptedFile = ['txt'];
    $bentukFile = explode('.', $namaFile);
    $bentukFile = strtolower(end($bentukFile));

    if (!in_array($bentukFile, $acceptedFile)) {
        echo "<script>
        alert('upload file txt!')
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('file terlalu besar')
        </script>";
        return false;
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru.= '.';
    $namaFileBaru.= $bentukFile;


    // penguploadan file
    move_uploaded_file($tmpName, 'lyrics/' . $namaFileBaru);

    return $namaFileBaru;
}
function delete($id) {
    global $db;

    mysqli_query($db, "DELETE FROM lagu WHERE id = $id");

    return mysqli_affected_rows($db);
}

function edit($data) {
    global $db;

    $id = ($data["id"]);
    $judul = htmlspecialchars($data["judul"]);
    $penyanyi = htmlspecialchars($data["penyanyi"]);
    $band = htmlspecialchars($data["band"]);
    $durasi = htmlspecialchars($data["durasi"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
   
    $lirik = upload();

     // query insert data
     $query = "UPDATE lagu SET 
                judul_lagu = '$judul',
                nama_penyanyi = '$penyanyi',
                nama_band = '$band',
                durasi = '$durasi',
                tanggal_rilis = '$tanggal',
                lirik = '$lirik'
                WHERE id = $id
                "; 
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// function edit($id) {
//     global $db;

//     mysqli_query($db, "UPDATE ")
// }

function cari ($kata) {
    $query = "SELECT * FROM lagu WHERE
        nama_penyanyi LIKE '%$kata%' OR
        judul_lagu LIKE '%$kata%' OR
        nama_band LIKE '%$kata%' OR
        durasi LIKE '%$kata%' OR
        tanggal_rilis LIKE '%$kata%'
    ";

    return query($query);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
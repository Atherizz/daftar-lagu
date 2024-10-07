<?php 
session_start();
require 'function.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil username berdasarkan id
  $result = mysqli_query($db, "SELECT username FROM akun WHERE 
        id = $id
  ");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }


}

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}


if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($db, "SELECT * FROM akun WHERE
            username = '$username' 
  ");

  // cek username
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
          $_SESSION["login"] = true;

          // cek remember me
          if (isset($_POST["remember"])) {
            // buat cookie
            setcookie('id', $row['id'], time()+60);
            setcookie('key', hash('sha256', $row['username']), time()+60);
          }

        
          header("Location: index.php");
          exit;
        }
    } 

    $error = true;
}

?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
input {
  border: 1px solid black !important;
  border-radius: 4px !important;
  padding: 10px !important;
  width: 100% !important; /* Agar input dan tombol mengisi lebar penuh form */
}
</style>
<body>
  <form action="" method="post">  
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <div class="d-flex flex-column">
          <h1 style="text-align: center;">HALAMAN LOGIN</h1>
          <?php if (isset($error)) : ?>
            <p style="color:red;">username / password salah</p>
            <?php endif; ?>
          <div class="d-flex flex-column gap-2 mt-2">
              <label for="username" class="text-uppercase fw-bold">USERNAME</label>
              <input class="form-control form-control-lg"  type="text" name="username"/>
              <label for="password" class="text-uppercase fw-bold">PASSWORD</label>
              <input class="form-control form-control-lg" type="password" name="password"/>
              <button class="btn btn-outline-primary fw-bold btn-lg mt-2" type="submit" name="login">LOGIN</button>
              <h6>belum punya akun? remember me? <a href="register.php" style="margin-left: 4px;">REGISTRASI</a></h6>
              <input  type="checkbox" name="remember" id="remember"/>
          </div>
      </div>
  </div>
  </form>        
</body>
</html>
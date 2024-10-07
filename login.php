<?php 
session_start();

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
require 'function.php';

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
              <h6>belum mempunyai akun? silahkan registrasi terlebih dahulu <a href="register.php" style="margin-left: 4px;">REGISTRASI</a></h6>
          </div>
      </div>
  </div>
  </form>        
</body>
</html>
<?php 
require 'function.php';
  

if (isset($_POST["register"])) {
 
  if (register($_POST) > 0) {
   echo "
   <script>
     alert('registrasi berhasil 👍!');
   </script>
   ";
  } else {
    echo mysqli_error($db);
  }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
</head>
<style>
input {
  border: 1px solid black !important;
  border-radius: 4px !important;
  padding: 10px !important;
  width: 100% !important; /* Agar input dan tombol mengisi lebar penuh form */
}

h6 {
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
</style>
<body>

    <form action="" method="post">
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <div class="d-flex flex-column">
          <h1>HALAMAN REGISTRASI</h1>
          <div class="d-flex flex-column gap-2 mt-2">
              <label for="username" class="text-uppercase fw-bold">USERNAME</label>
              <input class="form-control form-control-lg"  type="text" name="username" required/>
              <label for="password" class="text-uppercase fw-bold">PASSWORD</label>
              <input class="form-control form-control-lg" type="password" name="password" required/>
              <label for="password2" class="text-uppercase fw-bold">KONFIRMASI PASSWORD</label>
              <input class="form-control form-control-lg" type="password" name="password2" required/>
              <button class="btn btn-outline-primary fw-bold btn-lg mt-2" type="submit" name="register">REGISTER</button>
              <h6>sudah mempunyai akun? silahkan login <a href="login.php" style="margin-left: 4px;">LOGIN DISINI</a></h6>
          </div>
      </div>
  </div>
    </form>





    
</body>
</html>
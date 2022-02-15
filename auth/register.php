<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>YuAUCT</title>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
 
  <!-- font -->
  <link rel="stylesheet" href="css/main_style.css">
 
  <style>
  body {
    background: url('https://minzel.io/svg/logout_background_blue_spot_1.svg');
    background-size: cover;
    padding-bottom: 500px; 
  }
  </style>

  </head>
  <body>

<!-- navbar -->
<nav class="navbar navbar">
    <a class="navbar-brand" href="index.php" style="color:black;">
      <img src="https://image.flaticon.com/icons/svg/376/376700.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      YuAUCT
    </a>
  </nav>

<!-- Fungsi register -->
<?php

if(isset($_POST['register'])){

  require 'database/db.php';
  
  $db = new Database();

  $nama     = $_POST['nama_lengkap'];
  $username = $_POST['username'];
  $pass     = $_POST['password'];
  $telp     = $_POST['telp'];

  $hash = password_hash($pass, PASSWORD_DEFAULT);

  $result = mysqli_query($koneksi, "SELECT username FROM tb_masyarakat WHERE username='$username' ");
  
  if(is_numeric($username)){
    echo "<script>
    alert('Username harus huruf tidak boleh angka')
    </script>";
    return false;
  } else if (mysqli_fetch_assoc($result)){
    echo "
    <script>
        alert('username sudah terdaftar!')
    </script>
    ";
    return false;
}  if (strlen($pass) <= 6) {
    echo "
    <script>
        alert('password harus memiliki minimal 6 karakter')
    </script>
    ";
    return false;
}
  $insert = $db->insert('tb_masyarakat', [
      'id_user'     => '',
      'nama_lengkap'=> $nama,
      'username'    => $username,
      'password'    => $hash,
      'telp'        => $telp
  ]);
  
  if ( $insert > 0 ) {
      // Data berhasil dimasukkan
      echo "
    <center>
    <div style='margin-top: 2cm;' class='alert alert-success' role='alert'>
        Akun berhasil dibuat
        Silahkan login <a href='login.php'> Disini</a>
    </div>
    </center>";
  } else {
    echo "
    <center>
    <div style='margin-top: 2cm;' class='alert alert-danger' role='alert'>
        Akun gagal dibuat,
        Gagal menambahkan data<br/>
    </div>
    </center>".mysqli_error($koneksi->connect());
  }
}


?>
  <center>
  <form style="margin-top: 150px;" action="" method="POST">
  <a href="index.php"><img style="margin-bottom: 8px;" src="https://image.flaticon.com/icons/svg/376/376700.svg" width="100" height="100"></a>
  <h5 style="color:white;">Register akun</h5>
  <div class="form-group">
    <input style="width: 300px;" type="text" class="form-control"placeholder="Nama Lengkap" name="nama_lengkap" required>
  </div>
  <div class="form-group">
    <input style="width: 300px;" type="text" class="form-control"placeholder="Username" name="username" required>
  </div>
  <div class="form-group">
    <input style="width: 300px;" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
  <small class="form-text " style="color:white;">Password harus memiliki minimal 6 karakter!</small>
  </div>
  <div class="form-group">
    <input style="width: 300px;" type="text" class="form-control" placeholder="No Telpon" name="telp" required>
  </div>
  <button style="width: 8cm;" type="submit" class="btn btn-light" name="register">Register</button>
  <small class="form-text" style="color:white">Sudah mempunyai akun ? masuk <a href="auth/login.php" style="color:white;">Disini</a></small>
</form>
</center>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
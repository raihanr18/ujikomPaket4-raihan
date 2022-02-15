<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main_style.css">
    <title>Hello, world!</title>

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

<?php 

if(isset($_POST['insert'])){

  require "../database/db.php";

  $level     = $_POST['id_level'];
  $nama      = $_POST['nama_petugas'];
  $username  = $_POST['username'];
  $password  = $_POST['password'];

  $hash = password_hash($password, PASSWORD_DEFAULT);

  $db = new Database();
  $insert = $db->insert('petugas', [
    'id_petugas'   => '',
    'id_level'    => $level,
    'nama_petugas'=> $nama,
    'username'    => $username,
    'password'    => $hash
  ]);
  
  if ( $insert > 0 ) {
      // Data berhasil dimasukkan
      header("location:../admin.php");
  } else {
    var_dump($insert);
    echo mysqli_error($koneksi->connect());
  }

  }

?>

  <center>
  <form style="margin-top: 150px;" action="" method="POST">
  <a href="index.php"><img style="margin-bottom: 8px;" src="https://image.flaticon.com/icons/svg/376/376700.svg" width="100" height="100"></a>
  <h5 style="color:white;">Tambah Barang</h5>
  <div class="form-group">
    <input style="width: 300px;" type="text" class="form-control"  placeholder="Id Petugas" readonly>
  </div>
  <div class="form-group">
  <label for="" class="form-group" style="color:white;">Level</label>
  <br>
  <select name="id_level" id="" class="form-group">
    <option value="1">Administrator</option>
    <option value="2">Petugas</option>
  </select>
  <div class="form-group">
    <input style="width: 300px;" type="text" class="form-control"placeholder="Nama Petugas" name="nama_petugas" required>
  </div>
  <div class="form-group">
    <input style="width: 300px;" type="text" class="form-control" placeholder="Username" name="username" required>
  </div>
  <div class="form-group">
    <input style="width: 300px;" type="password" class="form-control" placeholder="Password" name="password" required>
  </div>
  <div class="container">
  <div class="row">
    <div class="col">
    <a href="admin.php" style="width: 4cm;" type="submit" class="btn btn-light" name="register">Kembali</a>
    </div>
    <div class="col">
    <button style="width: 4cm;" type="submit" class="btn btn-light" name="insert">Tambah Data!</button>
    </div>
  </div>
</form>
</center>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
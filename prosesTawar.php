<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>- + </title>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  
  <!-- font -->
  <link rel="stylesheet" href="main_style.css">
  
  <style>
  body {
    background: url('https://minzel.io/svg/logout_background_blue_spot_1.svg');
    background-size:cover;
    padding-bottom: 500px
  }
  </style>

  </head>
  <body>

<!-- navbar -->
<nav class="navbar navbar bg">
    <a class="navbar-brand" href="index.php" style="color:black;">
      <img src="https://image.flaticon.com/icons/svg/376/376700.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    YuAUCT
    </a>
    <a href="historyLelang.php">Kembali</a>
  </nav>

<!-- cek user -->
<?php 
session_start();
require "db.php";
$id    = $_GET['id'];

if (isset($_POST["ubah"])){
    
    $harga = $_POST['harga'];

    $db = new Database();
    $update = $db->update('history_lelang', [
        'penawaran_harga'   => $harga,
    ], ['id_history' => $id]);

    if ( $update > 0 ) {
        // Data berhasil diubah
        header('location:historyLelang.php');
    } else {
        echo mysqli_error($db->connect());
    }
  
  }

  $query = mysqli_query($koneksi, "SELECT * FROM history_lelang WHERE id_history='$id'");
  $cek   = mysqli_fetch_assoc($query);

?>

  <center>
  <form style="margin-top: 150px;" action="" method="POST">
  <a href="index.php"><img style="margin-bottom: 8px;" src="https://image.flaticon.com/icons/svg/376/376700.svg" width="100" height="100"></a>
  <h5 style="color:white">YuAUCT</h5>
  <small style="margin-bottom: 8px; color:white;" class="form-text ">Website lelang barang antik terpercaya</small>
  
  <div class="form-group">
    <input style="width: 300px;" type="text" class="form-control"placeholder="id" value="<?= $cek['id_history']; ?>" name="username" readonly>
  </div>
  <div class="form-group">
    <input style="width: 300px;" type="number" class="form-control" value="<?= $cek['penawaran_harga']; ?>" name="harga">
  </div>
  <button style="width: 8cm;" type="submit" class="btn btn-light" name="ubah" >Ubah Tawaran</a>
</form>
</center>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="main_style.css">

    <style>
    body {
      background: url('https://minzel.io/svg/logout_background_blue_spot_1.svg');
      background-size:cover;
      padding-bottom: 500px
    }
    </style>

    <title>Hello, world!</title>
  </head>
  <body>

    <!-- navbar -->
<nav class="navbar navbar bg">
    <a class="navbar-brand" href="3" style="color:black;">
      <img src="https://image.flaticon.com/icons/svg/376/376700.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    YuAUCT
    </a>
    <?php

                session_start();

                if($_SESSION['level'] == 1){
                echo "<li>
                    <a href='admin.php'>Dashboard</a>
                </li>";
                }else if($_SESSION['level'] == 2){
                  echo "<li>
                    <a href='petugas.php'>Dashboard</a>
                </li>";
                }
                ?>
  </nav>

 <?php 
 include "functions.php";
 
 $id    = $_GET['id'];

 if(isset($_POST['ubah'])){

$nama         = $_POST['nama'];
$tgl          = $_POST['tgl'];
$harga        = $_POST['harga'];
$jenis        = $_POST['jenis'];
$deskripsi    = $_POST['deskripsi'];

// simpan gambar
        $query = mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama', tgl='$tgl', harga_awal='$harga', image='$nama', jenis='$jenis', deskripsi='$deskripsi' WHERE id_barang='$id' ");
        if($query){
            header('location:jumlahBarang.php');
        }else{
            echo 'GAGAL MENGUPLOAD DATA!';
        }

 }

 $query = mysqli_query ($koneksi, "SELECT * FROM barang WHERE id_barang='$id'");
 $hasil = mysqli_fetch_assoc($query);
 ?>

<center>
<form action="" method="POST" style="margin-top: 3cm;">
  <div class="form-group">
    <label style="margin-right: 8.5cm;">Nama Barang</label>
    <input name ="nama" style="width: 10cm;" type="text" class="form-control" placeholder="Enter email" value="<?php echo $hasil['nama_barang']; ?>"Readonly>
  </div>
  <div class="form-group">
    <label style="margin-right: 7.5cm;">Tanggal berakhir</label>
    <input name="tgl" style="width: 10cm;" type="date" class="form-control" placeholder="Enter email" value="<?php echo $hasil['tgl']; ?>" required>
  </div>
  <div class="form-group">
    <label style="margin-right: 7.5cm;">Harga Awal</label>
    <input name="harga" style="width: 10cm;" type="text" class="form-control" placeholder="Enter email" value="<?php echo $hasil['harga_awal']; ?>">
  </div>
  <div class="form-group">
    <label style="margin-right: 7.5cm;">Gambar</label>
    <input name="file" style="width: 10cm;" type="file" class="form-control" placeholder="Enter email">
  </div>    
  <div class="form-group">
    <label style="margin-right: 7.5cm;">Jenis</label>
    <select name="jenis" id="" class="form-control" style="width:10cm;">
      <option value="">Perhiasan</option>
      <option value="">Patung</option>
      <option value="">Keramik</option>
    </select>
  </div>                                          
  <div class="form-group">
    <label for="exampleFormControlTextarea1" style="margin-right: 8cm;">Deskripsi</label>
    <textarea name="deskripsi" style="width: 10cm;" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $hasil['deskripsi']; ?></textarea>
  </div>
  <button type="submit" class="btn btn-light" name="ubah">Ubah</button>
</form>
</center>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
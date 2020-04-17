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
    .card-img-top {
    width: 100%;
    height: 18vw;
    transition: all 0.8s ease;
    object-fit: cover;
    }

    .card-img-top:hover {
    transform: scale(1.2);
    }
    
    </style>

    <title>Hello, world!</title>
  </head>
  <body>
  
  <!-- Image and text -->
  <nav class="navbar navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#">
      <img src="https://image.flaticon.com/icons/svg/771/771275.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      Perhiasan Antik
    </a>
    <a class="btn btn-light" href="lelang.php">Kembali</a>
  </nav>

  <div class="row" style="margin-top:2cm; margin-left:0.7cm;">
    <?php
    require "db.php";

    $jenis =$_GET['nama'];

    $data = mysqli_query($koneksi, "SELECT * FROM barang WHERE jenis='$jenis'");

    foreach($data as $d):
    ?>
    <div class="col-sm-6 col-md-3">
      <div class="card  mb-3">
        <!-- set a width on the image otherwise it will expand to full width -->
        <img class="card-img-top img-fluid" src="img/<?= $d['image']; ?>" alt="Card image cap" width="400" >    
        <div class="card-body">
          <h4 class="card-title"><strong><?= $d['nama_barang']; ?></strong></h4>
          <p class="card-text">Berlaku sampai tanggal : <?= $d['tgl']; ?></p>
          <br>
          <a href="preview.php?id=<?= $d['id_barang']; ?>" class="btn btn-primary">Cek</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
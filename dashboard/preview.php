<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Y | A</title>

    <!-- font -->
    <link rel="stylesheet" href="../css/main_style.css">

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
  
    .pict {
    width: 70%;
    height: auto;
    object-fit: cover;
    margin-left:1cm;
    }
    </style>
  </head>
  <body>
 <!-- Navbar --> 
 <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="https://image.flaticon.com/icons/svg/376/376700.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    YuAUCT
  </a>
  </button>
    <ul class="navbar-nav">
      <li class="nav-item active" >
        <a class="nav-link" href="lelang.php">Kembali</a>
      </li>
    </ul>
</nav>


<!-- konten -->
<?php 
 session_start();

 $id    = $_GET['id'];
 require "database/db.php";
 
// proses simpan histori lelang
if(isset($_POST['bid'])){

  
  $user      = $_SESSION['user'];
  $penawaran = $_POST['harga'];

  $db = new Database();
  $insert = $db->insert('history_lelang', [
    'id_history'      => '',
    'id_user'         => $user,
    'id_barang'       => $id,
    'penawaran_harga' => $penawaran
  ]);

    if ( $insert > 0 ) {
      // Data berhasil dimasukkan
      echo "<script>
      alert('Bid berhasil disimpan')
      </script>";
    } else {
      var_dump($insert);
      echo mysqli_error($koneksi->connect());
    }

  }

 $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id'");
 $hasil = mysqli_fetch_assoc($query);

//  $tanggal = date('d / M / y');
//  var_dump($tanggal);

//  for similiar product
$arr = $hasil['jenis'] ;
$x = implode(" ", (array)$arr);

 ?>
<form action="" method="POST">
<div class="container-fluid">
  <div class="row">
    <div class="col">
        <div class="gambar" style="margin-top: 3cm;">
            <img class="pict" src="img/<?php echo $hasil ['image']; ?>">
        </div>
    </div>
    <div class="col">
        <div class="judul" style="margin-top: 3cm; margin-left: 2cm;"> 
            <h3><?php echo $hasil['nama_barang']; ?></h3>
            <p>Harga Awal : <?php echo $hasil ['harga_awal']; ?></p>
            <hr>
            <input type="number" name="harga" id="" placeholder="" value="<?= $hasil['harga_awal'] ?>" id="form1" class="form-control">
            <br>
            <button class="btn btn-primary" name="bid">Masukan Bid</button>
            <p style="margin-top:0.7cm;"><u><strong>Daftar harga lelang saat ini</strong></u></p>
            <div>
            <?php
            $db = new Database();
            $a  = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM history_lelang WHERE id_barang='$id' ORDER BY penawaran_harga DESC ");

            foreach($data as $d):
            ?>
                <p><?= $a++.". ".$d['penawaran_harga']; ?></p>
                <hr>
            <?php endforeach; ?>
            </div>
            <small class="form-text text-muted">Tanggal jatuh tempo</small>
            <?php echo $hasil['tgl']; ?>
            <br>
            <br>
        </div>

        <div class="card w-60" style="border: 0px;">
            <div class="card-body">
                <h5 class="card-title">Deskripsi Produk</h5>
                <p><?php echo $hasil ['deskripsi']; ?></p>
            </div>
        </div>
    </div>
  </div>
</form>

<hr>
<center>
  <h1 style="margin-top:1.5cm;"><u><strong>Barang yang serupa</strong></u></h1>
</center>
  <div class="row" style="margin-top:2cm; margin-left:0.7cm;">
      <?php

      $data = mysqli_query($koneksi, "SELECT * FROM barang WHERE jenis='$x'");

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
  
    <script>
    // Set the date we're counting down to
    var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById("demo").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";

      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
    </script>

  
  </body>
</html>
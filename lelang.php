<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="sidebar2.css">
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
  <div id="wrapper">

<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                Hai, <?php 
                
                session_start();
                echo $_SESSION['username'];
                
                ?>
            </a>
        </li>
        <li>
            <a href="index.php">Kembali</a>
        </li>
        <li>
            <a href="showPerhiasan.php?nama=perhiasan">Perhiasan antik</a>
        </li>
        <li>
            <a href="showPatung.php?nama=patung">Patung antik</a>
        </li>
        <li>
            <a href="showKeramik.php?nama=keramik">Keramik antik</a>
        </li>
        <li>
            <a href="historyLelang.php">Histori Lelang anda</a>
        </li>
        <li>
          <a href="logout.php">Log out</a>
        </li>
    </ul>
</div>
<!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
            
                    <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle" style="margin-bottom:1cm;">Menu</a>
                    <div class="row">
                    <?php
                      
                      require "db.php";
                      $db = new Database();
                      $data = $db->getAll('barang');

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
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    <script>
  $("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
  });
  </script>
  
  </body>
</html>
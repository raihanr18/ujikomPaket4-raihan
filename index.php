<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="main_style.css">
    <link rel="stylesheet" href="about.css">

    <title>Halaman|Index</title>

    <style>
      .features-icons {
        padding-top: 7rem;
        padding-bottom: 7rem;
      }

      .features-icons .features-icons-item {
        max-width: 20rem;
      }

      .features-icons .features-icons-item .features-icons-icon {
        height: 7rem;
      }

      .features-icons .features-icons-item .features-icons-icon i {
        font-size: 4.5rem;
      }

      .features-icons .features-icons-item:hover .features-icons-icon i {
        font-size: 5rem;
      }

      .head{
        background-image: url('img/palu.jpg');
        height: 500px;
        width:100%;
      }

      a {
        color:white;
      }
      
      .showcase .showcase-text {
      padding: 3rem;
      }

      .showcase .showcase-img {
        min-height: 30rem;
        background-size: cover;
      }

      @media (min-width: 768px) {
        .showcase .showcase-text {
          padding: 7rem;
        }
      }

      .carousel {
      margin-bottom: 4rem;
      }
      /* Since positioning the image, we need to help out the caption */
      .carousel-caption {
        bottom: 3rem;
        z-index: 10;
      }

      /* Declare heights because of positioning of img element */
      .carousel-item {
        height: 32rem;
      }
      .carousel-item > img {
        position: absolute;
        top: 0;
        left: 0;
        min-width: 100%;
        height: 32rem;
      }
      #title {
  text-align: center;
  margin: 20px 0 20px 0;
  font-size: 10vw;
  padding: 0px;
  color: transparent;
     text-shadow: 
      5px -5px 0 #FCB42A,
      1px -1px 0 #F7F461,
      0px 0px 0 #2e2e2e,
      -1px 2px 0 #2c2c2c, 
      -2px 3px 0 #2a2a2a, 
      -3px 4px 0 #282828, 
      -4px 5px 0 #262626, 
      -5px 6px 0 #242424, 
      -6px 7px 0 #222, 
      -7px 8px 0 #202020, 
      -8px 9px 0 #1e1e1e, 
      -9px 10px 0 #1c1c1c, 
      -10px 11px 0 #1a1a1a, 
      -11px 12px 0 #181818, 
      -12px 13px 0 #161616, 
      -13px 14px 0 #141414, 
      -14px 15px 0 #121212, 
      -10px 15px 30px rgba(0, 0, 0, 0.9); 
}
    </style>

  </head>
  <body>

  <!-- pesan -->
  <?php
    session_start();
    if(isset($_GET['pesan'])){
      if($_GET['pesan'] == "logout"){
          echo "<script>
                    alert ('Anda telah berhasil logout')
                 </script>";
        }
    }
    ?>

  <h1 id="title"><u><strong>YuAUCT</strong></u></h1>
    <!-- navbar -->
  
    <!-- Image and text -->
  
    <nav class="navbar navbar-expand sticky-top" style="background-color:black;">
      <a class="navbar-brand" href="index.php" style="color:white">
        <img src="https://image.flaticon.com/icons/svg/376/376700.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        YuAUCT
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <h2 style="color:white;">|</h2>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
      </ul>
    </nav>
  

    <!-- Konten -->
    <center>
    <div class="head">
      <br>
      <br>
      <br>
        <h1 style="color:white"><strong>Website terpercaya untuk melakukan </strong></h1>
        <br>
        <h1 style="color:white"><strong>lelang barang antik</strong></h1>
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter">
          Tentang Kami
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">YuAUCT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p style="color:black;">Kami adalah sebuah perusahan lelang online yang telah diberi lisensi oleh pemerintah untuk melelangkan barang-barang antik.</p>
                <br>
                <p style="color:black;">Tujuan kami adalah untuk menyediakan tempat lelang praktis online kepada seluruh masyarakat.</p>
              </div>
              <div class="modal-footer">
                <p style="color:black;"><u>CEO YuAUCT. Raihan Ramadhan</u></p>
              </div>
            </div>
          </div>
        </div>
      <br>
      <hr>
    </center>
    </div>
</div>

<hr>
<br>
<br>
<center>
<h1><u><strong>Cara lelang di YuAUCT</strong></u></h1>
</center>
<!-- Icons Grid -->
<section class="features-icons bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-screen-desktop m-auto text-primary"></i>
                <img src="https://image.flaticon.com/icons/svg/2633/2633848.svg" alt="" srcset="">
              </div>
              <h3>Registrasi Akun</h3>
              <p class="lead mb-0">Anda harus memiliki akun terlebih dahulu untuk memulai lelang disini</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"></i>
                <img src="https://image.flaticon.com/icons/svg/1055/1055645.svg" alt="">
              </div>
              <h3>Cari & Mulai Lelang</h3>
              <p class="lead mb-0">Cari dan temukan barang yang cocok untuk anda, dan jadilah pemenang dalam lelang</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-check m-auto text-primary"></i>
                <img src="https://image.flaticon.com/icons/svg/2761/2761281.svg" alt="">
              </div>
              <h3>Dapatkan barang</h3>
              <p class="lead mb-0">Setelah lelang beres, barang akan diproses dalam waktu 24 jam dan langsung dikirim</p>
            </div>
          </div>
        </div>
      </div>
    </section>
<hr>
<center>
<h1><u><strong>Mengapa harus lelang di YuAUCT ?</strong></u></h1>
</center>
<!-- Image Showcases -->
<section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/w1.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Koneksi yang luas</h2>
            <p class="lead mb-0">Kami telah berkerjasama dengan terkoneksi dengan lebih dari 30 kota & negara</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/w2.jpg');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h2>Lelang real time</h2>
            <p class="lead mb-0">Kami menyediakan fitur lelang real time dimana user bisa bersaing dilelang secara langsung sesuai dengan waktu</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/w3.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Menyediakan banyak lelang</h2>
            <p class="lead mb-0">Freluensi lelang lebih dari 50 kali lelang perbulan</p>
          </div>
        </div>
      </div>
    </section>
<hr>
<center>
  <h1><u><strong>Testimoni</strong></u></h1>
</center>
<br>
<div class="card-columns">
  <div class="card">
    <img src="img/reza-rahadian.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">"Saya berhasil mendapatkan barang yang saya mau"</p>
    </div>
    <footer class="blockquote-footer">
        <small class="text-muted" style="font-size: 14px;">
          Reza Rahadian<cite title="Source Title">- Aktor</cite>
        </small>
      </footer>
  </div>
  <div class="card p-3">
    <blockquote class="blockquote mb-0 card-body">
      <p>"Barang langsung diproses tanpa lama dan langsung diantar ke rumah"</p>
      <footer class="blockquote-footer">
        <small class="text-muted">
          Ahmad Nur sanjaya <cite title="Source Title">- Student</cite>
        </small>
      </footer>
    </blockquote>
  </div>
  <div class="card">
    <img src="img/iqbal.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">"Antik banget sih, saya suka"</p>
      <p class="card-text"><small class="text-muted">Iqbal Ramadhan - Aktor</small></p>
    </div>
  </div>
  <div class="card bg-dark text-white text-center p-3">
    <blockquote class="blockquote mb-0">
      <p>"Barangnya seperti yang digambar"</p>
      <footer class="blockquote-footer text-white">
        <small>
          Valdemort <cite title="Source Title">- Magician</cite>
        </small>
      </footer>
    </blockquote>
  </div>
  <div class="card text-center">
    <div class="card-body">
      <p class="card-text">"Website lelang terpercaya nih!"</p>
      <p class="card-text"><small class="text-muted">Nisa Nuraida - Student</small></p>
    </div>
  </div>
  <div class="card">
    <img src="img/yLogo.jpg" class="card-img-top" alt="...">
  </div>
  <div class="card p-3 text-right">
    <blockquote class="blockquote mb-0">
      <p>"Gak ada yang se-real ini sih website lelang selain di YuAUCT"</p>
      <footer class="blockquote-footer">
        <small class="text-muted">
          Syamsudin <cite title="Source Title">- Student</cite>
        </small>
      </footer>
    </blockquote>
  </div>
  <div class="card">
    <div class="card-body">
      <p class="card-text">"Terlengkap barang antiknya"</p>
      <p class="card-text"><small class="text-muted">Erisa Putri - Student</small></p>
    </div>
  </div>
</div>
<!-- Footer -->
<footer class="page-footer font-small blue pt-4" style="margin-top:4cm; background-color:#0a2440;">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase" style="color:white;">Tim YuAUCT</h5>
        <p>Raihan Ramadhan</p>
        <p>Ahmad Nursanjaya</p>
        <p>Nisa Nuraida</p>
        <p>Muhamad Syamsudin</p>
        <p>Erisa Amelia</p>
        <p>Stevan Niki</p>
        <p>Topan Septria</p>
        <p>Susi</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase" style="color:white;">Sosial Media</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Twitter</a>
          </li>
          <li>
            <a href="#!">Facebook</a>
          </li>
          <li>
            <a href="#!">Instagram</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase" style="color:white;">Kirim Pesan kepada kami?</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Kirim</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="color:white">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> YuAUCT</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <!-- js navbar -->
 
  
  </body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="main_style.css">
    <link rel="stylesheet" href="sidebar.css">


<!-- Load required Bootstrap and BootstrapVue CSS -->
<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />


    <style>
    
    .card-text{
        color:white;
        display: block;
    }

    body {
      background: url('https://static.rfstat.com/renderforest/images/v2/logo-homepage/style-bg-blue.svg');
      background-size: cover;
      padding-bottom: 500px;
      background-repeat: no-repeat;
    }
    </style>

    <title>Hello, world!</title>
  </head>
  <body>
  <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <form action="logout.php" method="post">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        YuAUCT
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="jumlahBarang.php" >Jumlah Barang</a>
                </li>
                <li>
                    <a href="jumlahLelang.php">Jumlah Lelang</a>
                </li>
                <li>
                    <a href="jumlahUser.php">Jumlah User</a>
                </li>
                <li>
                    <a href="historiLelang.php">Histori Lelang</a>
                </li>
                <li>
                    <a href="logout.php">Log out</a>
                </li>
            </ul>
            </form>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <nav class="navbar navbar">
                    <a class="navbar-brand" href="index.php" style="color:white;">
                      <img src="https://image.flaticon.com/icons/svg/376/376700.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                      YuAUCT
                    </a>
                  </nav>
                    <center>
                    <h1 style="margin-top:2.5cm; color:white;"><strong>HALAMAN PETUGAS</strong></h1>
                    <hr>
                    <h3 style="color:white;">Hai Petugas, <?php session_start(); echo $_SESSION['username']; ?></h3>
                    </center>
                    <a href="#menu-toggle" class="btn btn-light" id="menu-toggle">Kontrol Petugas</a>
                  <hr>

                  <div>
    
        
                        <!-- cek jumlah -->
                        <?php 
                        require "db.php";
                        $query = "SELECT * FROM barang";
                        $cek = mysqli_query($koneksi, $query);
                        $result = mysqli_num_rows($cek);
                        ?>
                        <div class="container-fluid" style="margin-top: 1cm;">
                        <div class="row">
                            <div class="col-sm">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">YuAUCT</div>
                                <div class="card-body">
                                <h5 class="card-title">Jumlah Barang</h5>
                                <p class="card-text"><?php echo $result; ?></p>
                                <p class="card-text"><small>Data saat ini</small></p>
                                </div>
                            </div>
                            </div>
                        <!-- /jumlah barang -->

                        <?php 

                        $query = "SELECT * FROM history_lelang";
                        $cek = mysqli_query($koneksi, $query);
                        $result = mysqli_num_rows($cek);
                        ?>
                        <div class="container-fluid" style="margin-top: 1cm;">
                        <div class="row">
                            <div class="col-sm">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">YuAUCT</div>
                                <div class="card-body">
                                <h5 class="card-title">History Lelang</h5>
                                <p class="card-text"><?php echo $result; ?></p>
                                <p class="card-text"><small>Data saat ini</small></p>
                                </div>
                            </div>
                            </div>
                            <!-- /history lelang -->

                        <?php 

                        $query = "SELECT * FROM lelang";
                        $cek = mysqli_query($koneksi, $query);
                        $result = mysqli_num_rows($cek);
                        ?>
                        <div class="container-fluid" style="margin-top: 1cm;">
                        <div class="row">
                            <div class="col-sm">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">YuAUCT</div>
                                <div class="card-body">
                                <h5 class="card-title">Jumlah Lelang</h5>
                                <p class="card-text"><?php echo $result; ?></p>
                                <p class="card-text"><small>Data saat ini</small></p>
                                </div>
                            </div>
                            </div>
                            <!-- /jumlah lelang -->

                        <?php 

                        $query = "SELECT * FROM tb_masyarakat";
                        $cek = mysqli_query($koneksi, $query);
                        $result = mysqli_num_rows($cek);
                        ?>
                        <div class="container-fluid" style="margin-top: 1cm;">
                        <div class="row">
                            <div class="col-sm">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">YuAUCT</div>
                                <div class="card-body">
                                <h5 class="card-title">Jumlah User</h5>
                                <p class="card-text"><?php echo $result; ?></p>
                                <p class="card-text"><small>Data saat ini</small></p>
                                </div>
                            </div>
                            </div>
                            <!-- /jumlah petugas -->
                  
                  </div>
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
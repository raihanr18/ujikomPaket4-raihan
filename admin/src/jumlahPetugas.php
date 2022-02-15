<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main_style.css">
    <link rel="stylesheet" href="../css/sidebar.css">


<!-- Load required Bootstrap and BootstrapVue CSS -->
<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />


    <style>
    
    .card {
      border:0px;
    }
    .table{
      border-radius:5cm;;
    }

    td{
      background-color: whitesmoke;
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
                    <a href="../admin.php">Dashboard</a>
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
                    <a href="jumlahPetugas.php">Jumlah Petugas</a>
                </li>
                <li>
                    <a href="historiLelang.php">Histori Lelang</a>
                </li>
                <li>
                    <a href="../auth/logout.php">Log out</a>
                </li>
            </ul>
            </form>
        </div>
        <!-- /#sidebar-wrapper -->

       <a href="#menu-toggle" class="btn btn-light" id="menu-toggle" style="margin-top:1cm; margin-left:1cm;">Kontrol Admin</a>

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
                  <h1 style="color:white;"><strong><u>Jumlah Petugas</u></strong></h1>
                  <br>

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal" style="margin-bottom:0.7cm;">
                    Tambah Petugas
                  </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Nama</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama..." name="nama">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">username</label>
                              <input type="text" name="username" placeholder="Username..." class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect2">Password</label>
                              <input type="password" class="form-control" name="password" id="" placeholder="password...">
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id petugas</th>
                        <th scope="col">Nama petugas</th>
                        <th scope="col">Username</th>
                        <th class="col">Password</th>
                        <th class="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    require "../database/db.php";
                    $barang = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_level='2'");

                    if(isset($_POST['submit'])){
                
                      $nama     = $_POST['nama'];
                      $username = $_POST['username'];
                      $pass     = $_POST['password'];
                      
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
                      }
                     $insert = mysqli_query($koneksi, "INSERT INTO petugas VALUES ('', '2', '$nama', '$username', '$hash')");
                     
                      if ( $insert > 0 ) {
                          // Data berhasil dimasukkan
                          echo "
                          <center>
                          <div style='margin-top: 2cm;' class='alert alert-success' role='alert'>
                              Berhasil dibuat
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
                    
                    $a = 1;
                    foreach($barang as $b):
                    ?>
                      <tr>
                        <td scope="row"><?= $a++; ?></td>
                        <td><?= $b['id_petugas']; ?></td>
                        <td><?= $b['nama_petugas']; ?></td>
                        <td><?= $b['username']; ?></td>
                        <td>***</td>
                        <td>
                          <a href="hapusPetugas.php?id=<?php echo $b['id_petugas']; ?>" class="btn btn-danger" onclick="return confirm('untuk menghapus data ini?')"> Hapus</a>
                        </td>
                      </tr>
                    </tbody>
                    <?php endforeach; ?>
                  </table>

              
          
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
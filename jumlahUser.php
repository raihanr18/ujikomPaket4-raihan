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
                <li>
                    <a href="jumlahBarang.php" >Jumlah Barang</a>
                </li>
                <li>
                    <a href="jumlahLelang.php">Jumlah Lelang</a>
                </li>
                <li>
                    <a href="jumlahUser.php">Jumlah User</a>
                </li>
                <?php

                if($_SESSION['level'] == 1){
                echo "<li>
                    <a href='jumlahPetugas.php'>Jumlah Petugas</a>
                </li>";
                }
                ?>  
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
                  <h1 style="color:white;"><strong><u>Jumlah User</u></strong></h1>
                  <br>

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal" style="margin-bottom:0.7cm;">
                    Tambah User
                  </button>
                    
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
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
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">No. Telp</label>
                              <input type="text" class="form-control" name="telp" id="" placeholder="No. Telp...">
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
                        <th scope="col">Id user</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th class="col">No Telp</th>
                        <th class="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    require "db.php";

                    // proses tambah user
                    if(isset($_POST['submit'])){
                
                      
                
                      $nama     = $_POST['nama'];
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
                      }if (strlen($pass) <= 6) {
                        echo "
                        <script>
                            alert('password harus memiliki minimal 6 karakter')
                        </script>
                        ";
                        return false;
                      }
                      $insert=mysqli_query($koneksi, "INSERT INTO tb_masyarakat VALUES ('', '$nama', '$username', '$hash', '$telp')");
                     
                      if ( $insert > 0 ) {
                          // Data berhasil dimasukkan
                          echo "
                        <center>
                        <div style='margin-top: 2cm;' class='alert alert-success' role='alert'>
                            Akun berhasil dibuat
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

                    $db = new Database();
                    $barang = $db->getAll('tb_masyarakat');
                    
                    $a = 1;
                    foreach($barang as $b):
                    ?>
                      <tr>
                        <td scope="row"><?= $a++ ?></td>
                        <td><?= $b['id_user']; ?></td>
                        <td><?= $b['nama_lengkap']; ?></td>
                        <td><?= $b['username']; ?></td>
                        <td><?= $b['telp']; ?></td>
                        <td>
                          <a href="hapusUser.php?id=<?php echo $b['id_user']; ?>" class="btn btn-danger" onclick="return confirm('untuk menghapus data ini?')"> Hapus</a>
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
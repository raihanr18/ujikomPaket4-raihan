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
      background-color:whitesmoke;
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

                  <h1 style="color:white;"><strong><u>Jumlah Barang</u></strong></h1>
                  <br>

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                  </button>
                    
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Nama Barang</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama barang..." name="barang">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Tanggal berakhir</label>
                              <input type="date" class="form-control" name="tanggal" id="">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect2">Harga</label>
                              <input type="number" class="form-control" name="harga" id="" placeholder="Harga awal...">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Gambar</label>
                              <input type="file" class="form-control" name="file" id="">
                            </div>
                            <div class="form-group">
                              <label for="">Jenis</label>
                              <select name="jenis" id="" class="form-control">
                                <option value="perhiasan">Perhiasan</option>
                                <option value="patung">Patung</option>
                                <option value="keramik">Keramik</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10">Deskripsi barang..</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <table class="table" style="margin-top:1cm;">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id barang</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Tgl</th>
                        <th class="col">Harga awal</th>
                        <th class="col">Image</th>
                        <th class="col">Jenis</th>
                        <th class="col">Deskripsi</th>
                        <th class="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    require "db.php";

                    $db = new Database();

                    // tambah barang
                    if(isset($_POST['submit'])){
                    
                      $namaBarang = $_POST['barang'];
                      $tgl        = $_POST['tanggal'];
                      $harga      = $_POST['harga'];
                      $jenis      = $_POST['jenis'];
                      $deskripsi  = $_POST['deskripsi'];
  
                    // simpan gambar
                     $ekstensi_diperbolehkan	= array('png','jpg');
                     $nama = $_FILES['file']['name'];
                     $x = explode('.', $nama);
                     $ekstensi = strtolower(end($x));
                     $ukuran	= $_FILES['file']['size'];
                     $file_tmp = $_FILES['file']['tmp_name'];	
  
                     if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                         if($ukuran < 1044070){			
                             move_uploaded_file($file_tmp, 'img/'.$nama);
                             $query = mysqli_query($koneksi, "INSERT INTO barang VALUES('', '$namaBarang', '$tgl', '$harga', '$nama', '$jenis', '$deskripsi')");
                             if($query){
                                 echo "<script>
                                 alert('Data Berhasil disimpan dan ditambahkan)
                                 </script>";
                             }else{
                                 echo 'GAGAL MENGUPLOAD DATA!';
                             }
                         }else{
                             echo 'UKURAN GAMBAR TERLALU BESAR';
                         }
                     }else{
                         echo 'EKSTENSI FILE GAMBAR YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                     }
  
                    }

                    $barang = $db->getAll('barang');
                    
                    $a = 1;
                    foreach($barang as $b):
                    ?>
                      <tr>
                        <td scope="row"><?= $a++ ?></td>
                        <td><?= $b['id_barang']; ?></td>
                        <td><?= $b['nama_barang']; ?></td>
                        <td><?= $b['tgl']; ?></td>
                        <td><?= $b['harga_awal']; ?></td>
                        <td><?= $b['image']; ?></td>
                        <td><?= $b['jenis']; ?></td>
                        <td><?= $b['deskripsi']; ?></td>
                        <td>
                          <a href="ubahBarang.php?id=<?php echo $b['id_barang']; ?>" class="btn btn-primary"> Edit</a>
                          <br>
                          <br>
                          <a href="hapusBarang.php?id=<?php echo $b['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('untuk menghapus data ini?')"> Hapus</a>
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
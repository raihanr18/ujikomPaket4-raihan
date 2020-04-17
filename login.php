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
  </nav>

<!-- cek user -->
<?php 
session_start();
require "functions.php";

if (isset($_POST["login"])){

  $username = $_POST["username"];
  $pass     = $_POST["password"];

  $result = mysqli_query($koneksi, "SELECT * FROM tb_masyarakat WHERE username = '$username' ");

  // cek petugas dan admin
  $admin = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username ='$username'");

  if (mysqli_num_rows($result) === 1){
   
    // cek password
    $cek = mysqli_fetch_assoc($result);
    if (password_verify($pass, $cek["password"]) ){
      $_SESSION['username'] = $username;
      $_SESSION['status']   = "login";
      $_SESSION['in']       = true;
      $_SESSION['user']     = $cek['id_user'];

      header("location:lelang.php");
    }
    }else if(mysqli_num_rows($admin) === 1){
      
      // cek pasword admin
  
      $cekAdmin = mysqli_fetch_assoc($admin);

      if(password_verify($pass, $cekAdmin['password'])){
        $_SESSION['username'] = $username;

        if($cekAdmin['id_level'] == 1){
          $_SESSION['level'] = 1;
          header("location:admin.php");
        }else if($cekAdmin['id_level'] == 2){
          $_SESSION['level'] = 2;
          header("location:petugas.php");
        }
      }
    } else {
      echo "<center>
      <div class='alert alert-danger' role='alert'>
      username/password salah!
    </div>
    </center>";
    }

  }

?>

  <center>
  <form style="margin-top: 150px;" action="" method="POST">
  <a href="index.php"><img style="margin-bottom: 8px;" src="https://image.flaticon.com/icons/svg/376/376700.svg" width="100" height="100"></a>
  <h5 style="color:white">YuAUCT</h5>
  <small style="margin-bottom: 8px; color:white;" class="form-text ">Website lelang barang antik terpercaya</small>
  
  <div class="form-group">
    <input style="width: 300px;" type="text" class="form-control"placeholder="Nama" name="username" required>
  </div>
  <div class="form-group">
    <input style="width: 300px;" type="password" class="form-control" id="password" placeholder="Password" name="password" required>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1" style="color:white">Show Password</label>
  </div>
  <br>
  <button style="width: 8cm;" type="submit" class="btn btn-light" value="login" name="login">Login</button>
  <small style="color:white" class="form-text">Belum mempunyai akun ? buat <a href="register.php" style="color:white;">Disini</a></small>
</form>
</center>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <!-- fungsi show password -->
  <script type="text/javascript">
	$(document).ready(function(){		
		$('.form-check-input').click(function(){
			if($(this).is(':checked')){
				$('#password').attr('type','text');
			}else{
				$('#password').attr('type','password');
			}
		});
	});
</script>
  </body>
</html>
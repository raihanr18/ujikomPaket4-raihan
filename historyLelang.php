<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="main_style.css">

    <title>Y | A</title>
  </head>
  <body>
  <nav class="navbar navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#">
      <img src="https://image.flaticon.com/icons/svg/1789/1789227.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      Histori lelang
    </a>
    <a class="btn btn-light" href="lelang.php">Kembali</a>
  </nav>

  <?php
    session_start();

    require 'db.php';

    $id     = $_SESSION['user'];
    $query  = mysqli_query($koneksi, "SELECT * FROM history_lelang WHERE id_user ='$id'");


    $a = 1;
    ?>

    <div class="table-responsive">
      <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Id History</th>
          <th scope="col">Id Barang</th>
          <th scope="col">Harga yang diajukan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php while($r = mysqli_fetch_assoc($query)): ?>
        <tr>
          <th scope="row"><?= $a++; ?></th>
          <td><?= $r['id_history']; ?></td>
          <td><?= $r['id_barang']; ?></td>
          <td><?= $r['penawaran_harga']; ?></td>
          <td>
          <a href="prosesTawar.php?id=<?= $r['id_history']; ?>" class="btn btn-primary">Ubah Harga</a>
          <a href="hapusHistory.php?id=<?= $r['id_history']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus penawaran anda, dan membatalkan lelang anda ?')">Batalkan lelang</button>
          </td>
        </tr>

      <?php endwhile; ?>
      </tbody>
    </table>
  </div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
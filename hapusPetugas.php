<?php 

session_start();

include "db.php";
$id =$_GET ['id'];


$db = new Database();
$delete = $db->delete('petugas', ['id_petugas' => $id]);

if ( $delete > 0 ) {
    // Data berhasil dihapus
    header('location:jumlahPetugas.php');
} else {
    echo mysqli_error($db->connect());
}
?>
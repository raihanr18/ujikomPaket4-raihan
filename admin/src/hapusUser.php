<?php 

session_start();

include "../database/db.php";
$id =$_GET ['id'];


$db = new Database();
$delete = $db->delete('tb_masyarakat', ['id_user' => $id]);

if ( $delete > 0 ) {
    // Data berhasil dihapus
    header('location:jumlahUser.php');
} else {
    echo mysqli_error($db->connect());
}
?>
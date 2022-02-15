<?php
session_start();
require "../database/db.php";
$id = $_GET['id'];

$db = new Database();
$delete = $db->delete('history_lelang', ['id_history' => $id]);

if ( $delete > 0 ) {
    // Data berhasil dihapus
    if($_SESSION['level'] == 1){
        header('location:historiLelang.php');
    }else if($_SESSION['level'] == 2){
        header('location:historiLelang.php');
    }else{
        header('location:historyLelang.php');
    }
} else {
    echo mysqli_error($db->connect());
}
<?php

require '../db.php';

$db = new Database();
$delete = $db->delete('outlet', ['id_outlet' => '4']);

if ( $delete > 0 ) {
    // Data berhasil dihapus
    echo "Data berhasil dihapus";
} else {
    echo mysqli_error($db->connect());
}
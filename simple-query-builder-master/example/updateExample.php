<?php

require '../db.php';

$db = new Database();
$update = $db->update('outlet', [
    'nama'      => 'Cabang Baru Update',
    'alamat'    => 'Alamat baru Update',
    'telp'      => '021187351'
], ['id_outlet' => 2]);

if ( $update > 0 ) {
    // Data berhasil diubah
    echo "Data berhasil diubah";
} else {
    echo mysqli_error($db->connect());
}
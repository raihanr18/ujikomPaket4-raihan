<?php

require '../db.php';

$db = new Database();
$insert = $db->insert('outlet', [
    'id_outlet' => '',
    'nama'      => 'Cabang Baru',
    'alamat'    => 'Alamat baru',
    'telp'      => '0228293723'
]);

if ( $insert > 0 ) {
    // Data berhasil dimasukkan
    echo "Data berhasil dimasukkan";
} else {
    echo mysqli_error($koneksi->connect());
}
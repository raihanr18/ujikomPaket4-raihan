<?php

require '../db.php';

$db = new Database();
$data = $db->getById('outlet', ['id_outlet' => 1]);

foreach($data as $d):
?>
    <p><?= $d['id_outlet']; ?></p>
    <p><?= $d['nama']; ?></p>
    <p><?= $d['alamat']; ?></p>
    <p><?= $d['telp']; ?></p>
    <hr>
<?php endforeach; ?>
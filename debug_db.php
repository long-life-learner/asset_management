<?php
require 'vendor/autoload.php';
require 'app/Config/Constants.php';

$db = \Config\Database::connect();

echo "KOLOM TABEL masterbarang:\n";
$fields = $db->getFieldNames('masterbarang');
foreach ($fields as $field) {
    echo "- $field\n";
}

echo "\nCONTOH 1 DATA masterbarang:\n";
$query = $db->query("SELECT * FROM masterbarang LIMIT 1");
$row = $query->getRowArray();
print_r($row);

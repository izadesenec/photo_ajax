<?php
header('Content-type:application/json');
include_once 'PhotoUpload.php';
$pu = new PhotoUpload();
if ($pu->validate()) {
    $pu->upload()->addToDb();
}

function get_photo() {
    $querry = "SELECT * FROM images";
    $images = array();
    $dbh = new PDO('mysql:host=localhost;dbname=gallery', 'root', '');
    foreach ($dbh->query($querry)as $row) {
        $images[] = array(
            'id' => $row['id'],
            'src' => $row['src']);
    }
    header('Content-type:application/json');
    return json_encode($images);
}

$querry = "SELECT * FROM images";
$images = array();
$dbh = new PDO('mysql:host=localhost;dbname=gallery', 'root', '');
foreach ($dbh->query($querry)as $row) {
    $images[] = array(
        'id' => $row['id'],
        'src' => $row['src']);
}

echo json_encode($images);
//get_photo();
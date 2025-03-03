<?php

include "koneksidb.php";
header('Content-Type: application/json');

$nama = htmlspecialchars($_POST['nama']);
$nisn = htmlspecialchars($_POST['nisn']);
$tplahir = htmlspecialchars($_POST['tplahir']);
$tglahir = htmlspecialchars($_POST['tglahir']);
$kelamin = htmlspecialchars($_POST['kelamin']);
$agama = htmlspecialchars($_POST['agama']);
$alamat = htmlspecialchars($_POST['alamat']);

$stmt = $db_connection->prepare("INSERT INTO siswa (nis, nama, tplahir, tglahir, kelamin, agama, alamat)
                                VALUES(?, ?, ?, ?, ?, ?, ?)");
$result = $stmt->execute([$nisn, $nama, $tplahir, $tglahir, $kelamin, $agama, $alamat]);

echo json_encode([
    "message" => "Data is successfully inputted",
    "data" => $result
]);
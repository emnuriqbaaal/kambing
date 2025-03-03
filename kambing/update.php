<?php

include "koneksidb.php";
header('Content-Type: application/json');

//variable yang akan mengganti data pada tabel 'tabel_siswa'
$id = htmlspecialchars($_POST['id']);
$nama = htmlspecialchars($_POST['nama']);
$nisn = htmlspecialchars($_POST['nisn']);
$tplahir = htmlspecialchars($_POST['tplahir']);
$tglahir = htmlspecialchars($_POST['tglahir']);
$kelamin = htmlspecialchars($_POST['kelamin']);
$agama = htmlspecialchars($_POST['agama']);
$alamat = htmlspecialchars($_POST['alamat']);

//query untuk mengganti data pada tabel 'tabel_siswa'
$stmt = $db_connection->prepare("UPDATE siswa SET nis = ?, nama = ?, tplahir = ?, tglahir = ?, 
                                kelamin = ?, agama = ?, alamat = ?  WHERE id = ?");
$result = $stmt->execute([$nisn, $nama, $tplahir, $tglahir, $kelamin, $agama, $alamat, $id]);

//menampilkan data yang sukses di ganti pada tabel 'tabel_siswa'
echo json_encode([
    "message" => "Data successfully updated",
    "id" => $id,
    "data" => $result
]);
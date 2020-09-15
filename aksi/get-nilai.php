<?php
include_once 'class/database.php';

$database = new Database();
$conn = $database->dbConnection();

$kelas = isset($_POST['nilai-kelas']) ? $_POST['nilai-kelas'] : die();


//getbindo
$query = "SELECT u.username AS username, u.nis AS nis, n.nilai
         FROM tb_nilai n LEFT JOIN tb_user u ON n.id_user = u.id_user
         WHERE n.id_matpel = 1 AND n.kelas = :kelas";
$statement = $conn->prepare($query);
$statement->bindParam(":kelas", $kelas);
$statement->execute();

//getbing
$query_ing = "SELECT u.username AS username, u.nis AS nis, n.nilai
         FROM tb_nilai n LEFT JOIN tb_user u ON n.id_user = u.id_user
         WHERE n.id_matpel = 2 AND n.kelas = :kelas";
$statement_bing = $conn->prepare($query_ing);
$statement_bing->bindParam(":kelas", $kelas);
$statement_bing->execute();

//getmm
$query_ing = "SELECT u.username AS username, u.nis AS nis, n.nilai
         FROM tb_nilai n LEFT JOIN tb_user u ON n.id_user = u.id_user
         WHERE n.id_matpel = 3 AND n.kelas = :kelas";
$statement_mm = $conn->prepare($query_ing);
$statement_mm->bindParam(":kelas", $kelas);
$statement_mm->execute();

//getmm
$query_ing = "SELECT u.username AS username, u.nis AS nis, n.nilai
         FROM tb_nilai n LEFT JOIN tb_user u ON n.id_user = u.id_user
         WHERE n.id_matpel = 4 AND n.kelas = :kelas";
$statement_ipa = $conn->prepare($query_ing);
$statement_ipa->bindParam(":kelas", $kelas);
$statement_ipa->execute();


?>
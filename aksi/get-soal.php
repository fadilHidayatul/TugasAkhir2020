<?php
include_once 'class/database.php';

$database = new Database();
$conn = $database->dbConnection();


    $mp = isset($_POST['id-matpel-chk']) ? $_POST['id-matpel-chk'] : die();    
    $kelas = isset($_POST['kelas-chk']) ? $_POST['kelas-chk'] : die();

    $query = "SELECT * FROM tb_soal WHERE id_matpel = :id AND kelas = :kelas";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":kelas", $kelas);
    $stmt->bindParam(":id", $mp);
    $stmt->execute();
    
?>
<?php
include_once '../class/database.php';
$database = new Database();
$conn = $database->dbConnection();

if(isset($_POST['btnNis'])){
    $kelas = $_POST['kelas'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    
    
    $chk_nis = "SELECT nis FROM tb_nis WHERE nis = :nis";
    $stmt = $conn->prepare($chk_nis);
    $stmt->bindParam(":nis", $nis);
    $stmt->execute();

    if($stmt->rowCount()){
        header('Location:../?page=nis&status=nis_sudah_ada');
    }else {
        $query = "INSERT INTO tb_nis(nis,nama_siswa,kelas) VALUES(:nis, :nama, :kelas)";
        $statement = $conn->prepare($query);
        $statement->bindParam(":nis", $nis);
        $statement->bindParam(":nama", $nama);
        $statement->bindParam(":kelas", $kelas);
        $statement->execute();

        header('Location:../?page=nis&status=berhasil');
    }
}


?>
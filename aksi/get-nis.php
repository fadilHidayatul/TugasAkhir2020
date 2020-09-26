<?php
    include_once 'class/database.php';

    $database = new Database();
    $conn = $database->dbConnection();

    $chk_nis = isset($_POST['chk-nis']) ? $_POST['chk-nis'] : die();

    $query = "SELECT * FROM tb_nis WHERE kelas = :kelas ORDER BY nis DESC";
    $statement = $conn->prepare($query);
    $statement->bindParam(":kelas", $chk_nis);
    $statement->execute();

?>
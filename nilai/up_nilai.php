<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json, charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

function msg($success,$status,$message,$extra = []){
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message' => $message
    ],$extra);
}

include_once '../class/database.php';

$database = new Database();
$conn = $database->dbConnection();
$returnData = [];

if ($_SERVER["REQUEST_METHOD"]!="POST") {
    $returnData = msg(0,404,'Page Not Found');
} elseif (!isset($_GET['id_user']) || !isset($_GET['id_matpel']) || !isset($_POST['nilai']) || !isset($_GET['kelas']) ||
          empty(trim($_GET['id_user'])) || 
          empty(trim($_GET['id_matpel'])) || 
          empty(trim($_POST['nilai'])) ||
          empty(trim($_GET['kelas']))
          ){

    $field = ['Fields' => ['id_user','kelas' ,'id_matpel','nilai']];
    $returnData = msg(0,422,'Harap isi field berikut',$field);
}else {
    $idUser = $_GET['id_user'];
    $idMatpel = $_GET['id_matpel'];
    $nilai = $_POST['nilai'];
    $kelas = $_GET['kelas'];

    $u = "SELECT * FROM tb_user WHERE id_user = :iduser";
    $chk_usr = $conn->prepare($u);
    $chk_usr->bindParam(":iduser",$idUser);
    $chk_usr->execute();

    $chk_kelas = $chk_usr->fetch(PDO::FETCH_ASSOC);

    $mp = "SELECT * FROM tb_matpel WHERE id_matpel = :idmatpel";
    $chk_mp = $conn->prepare($mp);
    $chk_mp->bindParam(":idmatpel", $idMatpel);
    $chk_mp->execute();

    $chk_data = "SELECT * FROM tb_nilai WHERE id_user = :iduser AND id_matpel = :idmatpel";
    $stmt = $conn->prepare($chk_data);
    $stmt->bindParam(":iduser", $idUser);
    $stmt->bindParam(":idmatpel", $idMatpel);
    $stmt->execute();

    
    if (!$chk_usr->rowCount()) {
        $returnData = msg(0,422,"id user tidak ada!!");
    }elseif (!$chk_mp->rowCount()) {
        $returnData = msg(0,422,"id mata pelajaran tidak ada!!");
    }else if ($chk_kelas['kelas'] != $kelas) {
        $returnData = msg(0,422,"Kamu bukan dari kelas ini");
    }
    else if (!$stmt->rowCount()) {
        $query ="INSERT INTO tb_nilai(id_user, kelas, id_matpel, nilai) VALUES(:iduser, :kelas, :idmatpel, :nilai)";
        $statement = $conn->prepare($query);
        $statement->bindParam(":iduser", $idUser);
        $statement->bindParam(":kelas", $kelas);
        $statement->bindParam(":idmatpel", $idMatpel);
        $statement->bindParam(":nilai", $nilai);
        $statement->execute();

        $returnData = msg(1,200,"Nilai masuk!!");
        //insert
    }else{
        $query = "UPDATE tb_nilai SET nilai=:nilai 
                 WHERE id_user=:id_user AND id_matpel=:id_matpel AND kelas=:kelas";
        $statement = $conn->prepare($query);
        $statement->bindParam(":nilai", $nilai);
        $statement->bindParam(":id_user", $idUser);
        $statement->bindParam(":id_matpel", $idMatpel);
        $statement->bindParam(":kelas", $kelas);
        $statement->execute();

        $returnData = msg(1,200,"Nilai masuk!!");
        //update
    }
    
}

echo json_encode($returnData);
?>



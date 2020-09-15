<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

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

if($_SERVER["REQUEST_METHOD"] != "GET"){
    $returnData = msg(0, 404, 'Page Not Found');
}else {
    //$query = "SELECT * FROM tb_soal ORDER BY id_soal DESC";
    $query = "SELECT * FROM tb_soal LEFT JOIN tb_matpel ON tb_soal.id_matpel = tb_matpel.id_matpel ORDER BY RAND() LIMIT 20";

    $statement = $conn->prepare($query);
    $statement->execute();

    if($statement->rowCount() > 0){
        $data = array();
        $data["DATA"] = array();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $item = array(
                "id_soal" => $row['id_soal'],
                "id_matpel" => $row['id_matpel'],
                "mata_pelajaran" => $row['matpel'],
                "waktu_pengerjaan" => $row['waktu_ujian'],
                "image_soal" => $row['image_soal'],
                "text_soal" => $row['txt_soal'],
                "a" => $row['jawab_a'],
                "b" => $row['jawab_b'],
                "c" => $row['jawab_c'],
                "d" => $row['jawab_d'],
                "kunci" => $row['kunci']
            );
            array_push($data["DATA"], $item);
        }

        $returnData = msg(1,200,'Data didapatkan',$data);
        
    }else{
        $returnData = msg(0,422,'data tidak ditemukan');
    }

}
echo json_encode($returnData);
?>
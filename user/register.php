<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Method: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization,X-Requested-With");

function msg($success,$status,$message,$extra = []){
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message'=> $message
    ],$extra);
}

include_once '../class/database.php';

$database = new Database();
$conn = $database->dbConnection();

$data = json_decode(file_get_contents("php://input"));
$returnData = [];

if($_SERVER["REQUEST_METHOD"] != "POST"){
    $returnData = msg(0,404, 'Page Not Found');

}elseif( !isset($_POST['name']) || !isset( $_POST['nis']) || !isset($_POST['password']) ||
         empty(trim($_POST['name'])) || empty(trim($_POST['nis'])) ||empty(trim($_POST['password']))  ){
    $fields = ['fields' => ['name:','nis:','password:']];
    $returnData = msg(0,422,'Please Fill in all Required Fields',$fields);

}else{
    $name = trim($_POST['name']);
    $nis = trim($_POST['nis']);
    $pass = trim($_POST['password']);

    if (strlen($name)<3) {
        $returnData = msg(0, 422, 'Nama Kamu Minimal 3 karakter');
    }else if (strlen($pass)<8) {
        $returnData = msg(0, 422, 'Password Kamu Minimal 8 Karakter');
    }else{
        try{
            $chk_nis = "SELECT * FROM tb_nis WHERE nis=:nis";
            $nis_stat = $conn->prepare($chk_nis);
            $nis_stat->bindParam(":nis",$nis);
            $nis_stat->execute(); //cek nis ada dikelas tsb
            $row_nis = $nis_stat->fetch(PDO::FETCH_ASSOC);

            $query = "SELECT * FROM tb_user WHERE nis=:nis";
            $already = $conn->prepare($query);
            $already->bindParam(":nis",$nis);
            $already->execute();
            $row = $already->fetch(PDO::FETCH_ASSOC); //nis sudah register
            

            if (!$nis_stat->rowCount()) { //nis tidak ditemukan
                $returnData = msg(0,422,'NIS tidak ada, silahkan hubungi guru untuk mendaftarkan NIS');
            }elseif($nis == $row['nis']){
                $returnData = msg(0,422,'NIS sudah didaftarkan');
            }else {
                $stringPass = password_hash($pass, PASSWORD_DEFAULT);
                $token = "";
                $id_nis = $row_nis['id_nis'];
                $kelas = $row_nis['kelas'];

                 $query = "INSERT INTO tb_user(id_nis,username,nis,kelas,password,token) 
                 VALUES(:id_nis,:user,:nis,:kelas,:pass,:token)";
                 $statement = $conn->prepare($query);
                 $statement->bindParam(":id_nis", $id_nis);
                 $statement->bindParam(":user",$name);
                 $statement->bindParam(":nis", $nis);
                 $statement->bindParam(":kelas", $kelas);
                 $statement->bindParam(":pass", $stringPass);
                 $statement->bindParam(":token", $token);
                 $statement->execute();
 
                $returnData = msg(1,200,'Success Register');
                     
            }

        }catch(PDOException $e){
            $returnData = msg(0, 500, $e->getMessage());
        }
    }
}
 echo json_encode($returnData);
?>
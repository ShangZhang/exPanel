<?php
// ini_set('memory_limit', '1024M');
// hub
$db = new PDO('mysql:host=localhost;dbname=bdlb1_2', 'root', '929daca0bb41a0c9');
// ali
// $db = new PDO('mysql:host=localhost;dbname=bdlb1_1', 'root', 'c90d204689ee9dcf');
$table='BDLB_RNA_markers';

$msgArray = array('code'=>0, 'data'=>array(), 'message'=>'参数接收错误，请关闭浏览器后重试。');
$RNA_name = isset($_POST['RNA_name']) ? trim($_POST['RNA_name']) : trim($_GET['RNA_name']);
// $Disease_type = isset($_POST['Disease_type']) ? trim($_POST['Disease_type']) : trim($_GET['Disease_type']);


header('content-type:application:json;charset=utf8');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:x-requested-with,content-type');

function gtfinfor($RNA_name,$table){
        global $db ;
        $query = "select * from ".$table." where RNA_name='".$RNA_name."'";
        $result = $db->query($query);
        $resultArray = $result->fetchAll();
        return $resultArray;
}
$response=gtfinfor($RNA_name,$table);
echo json_encode($response);
?>

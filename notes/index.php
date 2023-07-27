<?php
header('Access-Control-Allow-Origin: *');
$conn=new mysqli("localhost:3309","root","","db_crudflutter");
$query=mysqli_query($conn,"select * from tb_notes ");
$data=mysqli_fetch_all($query,MYSQLI_ASSOC);

$response = [
    "data" => $data
];

$json = json_encode($response);

echo $json;
?>

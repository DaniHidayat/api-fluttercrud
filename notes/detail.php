<?php
$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);
$segments = explode('/', $path);
$segment4 = isset($segments[4]) ? $segments[4] : '';

header('Access-Control-Allow-Origin: *');
$conn=new mysqli("localhost:3309","root","","db_crudflutter");
$query=mysqli_query($conn,"select * from tb_notes where _id = '$segment4' ");
$data=mysqli_fetch_all($query,MYSQLI_ASSOC);

// $response = [
//     "data" => $data
// ];

$json = json_encode($data);

echo $json;
?>

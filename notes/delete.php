<?php
header('Access-Control-Allow-Origin: *');

// Konfigurasi koneksi database
$host = 'localhost:3309';
$username = 'root';
$password = '';
$database = 'db_crudflutter';

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah data telah dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   
    $uri = $_SERVER['REQUEST_URI'];
    $path = parse_url($uri, PHP_URL_PATH);
    $segments = explode('/', $path);
    $id = isset($segments[4]) ? $segments[4] : '';

    
 
    // Query INSERT
    $query = "DELETE FROM tb_notes WHERE _id='$id'";
   
    if ($conn->query($query) === TRUE) {
        // echo "Data berhasil diUpdate.";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else {
    echo "Data tidak dikirim melalui metode DELETE.";
}

// Menutup koneksi
$conn->close();
?>
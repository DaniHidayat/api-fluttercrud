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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari variabel $_POST
     
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

 
    // Query INSERT
    $query = "UPDATE tb_notes SET title='$title',content='$content'where _id='$id'";
   
    if ($conn->query($query) === TRUE) {
        // echo "Data berhasil diUpdate.";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else {
    echo "Data tidak dikirim melalui metode POST.";
}

// Menutup koneksi
$conn->close();
?>
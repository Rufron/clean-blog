<?php 

$host = 'localhost';
$dbname = 'cleanblog';
$user = 'root';     // default XAMPP MySQL username
$pass = '';         // default XAMPP MySQL password is empty



try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "✅ Connected to the database successfully!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}


?>
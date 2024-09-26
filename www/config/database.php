<?php
$host = 'db';  // Use the MySQL service name from docker-compose.yml
$user = 'root';
$password = 'rootpassword';
$database = 'catalog_db';
// Create a connection
$conn = new mysqli($host, $user, $password, $database);
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// return $conn;

<?php
$servername = "localhost";
$username = "root";
$dbname = "teteng_db";
$password = "";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  error_log("Connection failed: " . $e->getMessage()) ;
}
?>
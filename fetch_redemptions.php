<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=school', 'username', 'password');

// Fetch redemption requests
$stmt = $pdo->query("SELECT * FROM redemptions");
$redemptions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return JSON response
echo json_encode($redemptions);
?>

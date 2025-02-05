<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=school', 'username', 'password');

// Read incoming JSON data
$data = json_decode(file_get_contents('php://input'), true);

if ($data && isset($data['id'], $data['status'])) {
    $stmt = $pdo->prepare("UPDATE redemptions SET status = :status WHERE id = :id");
    $stmt->execute([
        ':status' => $data['status'],
        ':id' => $data['id'],
    ]);
    echo json_encode(['message' => 'Redemption status updated successfully!']);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid data received.']);
}
?>

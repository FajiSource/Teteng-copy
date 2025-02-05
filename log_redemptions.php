<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=school', 'username', 'password');

// Read incoming JSON data
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $stmt = $pdo->prepare("INSERT INTO redemptions (rfid, name, grade_section, reward, points, status) 
                           VALUES (:rfid, :name, :grade_section, :reward, :points, :status)");
    $stmt->execute([
        ':rfid' => $data['rfid'],
        ':name' => $data['name'],
        ':grade_section' => $data['gradeSection'],
        ':reward' => $data['reward'],
        ':points' => $data['points'],
        ':status' => $data['status'],
    ]);
    echo json_encode(['message' => 'Redemption logged successfully!']);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid data received.']);
}
?>

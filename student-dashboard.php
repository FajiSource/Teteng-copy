<?php
session_start();
include 'database-connection.php';
$connection = $conn;

function logRedemption($connection, $rfid, $name, $gradeSection, $reward, $points, $status)
{
    $stmt = $connection->prepare("INSERT INTO redeems (student_id, name, grade_section, reward, points, status) VALUES (:student_id, :name, :grade_section, :reward, :points, :status)");
    $stmt->bindParam(':student_id', $rfid);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':grade_section', $gradeSection);
    $stmt->bindParam(':reward', $reward);
    $stmt->bindParam(':points', $points);
    $stmt->bindParam(':status', $status);
    $stmt->execute();
    return $connection->lastInsertId();
}
function get_student_info($connection, $rfid)
{
    $stmt = $connection->prepare("SELECT * FROM student_info WHERE student_id = :id");
    $stmt->bindParam(':id', $rfid);
    $stmt->execute();
    return $stmt->fetch();
}
$student = get_student_info($connection, $_SESSION['logged_in_user']['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $rfid = $student['id'];
    $name  =$student['name'];
    $gradeSection = 'Grade '.$student['grade'] . '- Section ' . $student['section'];
    $reward = null;
    $points = $_POST['points-val'];
    $status = "Pending";

    $redemptionId = logRedemption($connection, $rfid, $name, $gradeSection, $reward, $points, $status);
    // echo json_encode(['id' => $redemptionId]);
} else {
    // echo json_encode(['error' => 'Invalid redemption data']);
    error_log( "Invalid redemption data");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #43cea2, #185a9d);
            color: #333;
            overflow-x: hidden;
        }

        header {
            background-color: rgba(255, 255, 255, 0.95);
            color: #43cea2;
            padding: 20px;
            text-align: center;
            position: sticky;
            top: 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
            animation: fadeInDown 1s ease-out;
        }

        header button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
            position: absolute;
            right: 20px;
            top: 20px;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        header button:hover {
            background-color: #d32f2f;
            transform: scale(1.1);
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: calc(100vh - 80px);
            padding: 20px;
        }

        .intro {
            text-align: center;
            color: white;
            margin-bottom: 30px;
            animation: fadeInUp 1.5s ease-out;
        }

        .intro h2 {
            font-size: 2.2em;
            margin-bottom: 10px;
        }

        .intro p {
            font-size: 1.2em;
            margin: 0;
        }

        .section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
            width: 100%;
            max-width: 600px;
            animation: fadeInUp 1s ease-out;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .section:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        }

        .section h2 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #43cea2;
            text-transform: uppercase;
        }

        .section p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .section input {
            padding: 10px;
            font-size: 1em;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: calc(100% - 20px);
            max-width: 200px;
            transition: box-shadow 0.3s;
        }

        .section input:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(67, 206, 162, 0.5);
        }

        .section button {
            background-color: #43cea2;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .section button:hover {
            background-color: #3bb089;
            transform: scale(1.1);
        }

        .loading {
            margin-top: 20px;
            font-size: 1em;
            color: #43cea2;
            display: none;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Student Dashboard</h1>
        <button onclick="logout()">Logout</button>
    </header>

    <main>
        <div class="intro">
            <h2>Welcome to Your Dashboard!</h2>
            <p>Track your progress, manage your points, and redeem rewards with ease.</p>
        </div>
        <section class="section">
            <form method="POST" onsubmit="(e) => e.preventDefault();">
                
                <h2>Redeem Points</h2>
                <p>You have <span id="student-points">100</span> points available.</p>
                <input type="number" id="redeem-input" name='points-val' placeholder="Enter points to redeem">
                <button type="submit">Redeem</button>
                <p id="loading-indicator" class="loading">Processing...</p>
            </form>
        </section>
    </main>

    <script>
        function redeemPoints() {
            const pointsElement = document.getElementById('student-points');
            const redeemInput = document.getElementById('redeem-input');
            const loadingIndicator = document.getElementById('loading-indicator');

            const currentPoints = parseInt(pointsElement.innerText);
            const pointsToRedeem = parseInt(redeemInput.value);

            if (isNaN(pointsToRedeem) || pointsToRedeem <= 0) {
                alert("Please enter a valid number of points to redeem.");
                return;
            }

            if (pointsToRedeem > currentPoints) {
                alert("You don't have enough points to redeem this amount.");
                return;
            }

            loadingIndicator.style.display = 'block';

            setTimeout(() => {
                pointsElement.innerText = currentPoints - pointsToRedeem;
                alert("Successfully redeemed " + pointsToRedeem + " points!");
                redeemInput.value = "";
                loadingIndicator.style.display = 'none';

                // Redemption data to send
                const redemptionData = {
                    rfid: '231232434',
                    name: 'John Smith',
                    gradeSection: '10-Constancy',
                    reward: 'Notebook',
                    points: pointsToRedeem,
                    status: 'Pending'
                };

                // Send redemption data to the backend
                fetch('log_redemption.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(redemptionData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Redemption logged successfully:", data);
                    })
                    .catch(error => {
                        console.error("Error logging redemption:", error);
                    });
            }, 1500); // Simulate processing delay
        }

        function logout() {
            window.location.href = 'login.php'; // Redirect to login page
        }
    </script>
</body>

</html>
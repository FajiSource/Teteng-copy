<?php
session_start();
include 'database-connection.php';
$connection = $conn;
function format_student_id($student_id)
{
    return str_pad($student_id, 5, '0', STR_PAD_LEFT);
}
function getRedemptionRequests($connection)
{
    $stmt = $connection->prepare("SELECT * FROM redeems");
    $stmt->execute();
    return $stmt->fetchAll();
}

$redemptionRequests = getRedemptionRequests($connection);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #43cea2, #185a9d);
            background-size: 400% 400%;
            animation: gradientAnimation 10s ease infinite;
            color: #333;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        header {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            animation: slideDown 1s ease;
        }

        @keyframes slideDown {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        header img {
            height: 50px;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
            color: #4CAF50;
        }

        header button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 50px;
            transition: background-color 0.3s, transform 0.3s;
            animation: fadeIn 1s ease;
        }

        header button:hover {
            background-color: #d32f2f;
            transform: scale(1.1);
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .container {
            padding: 40px 20px;
        }

        .section {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            animation: fadeIn 1.2s ease;
        }

        .section h2 {
            margin: 0 0 20px;
            font-size: 2em;
            color: #4CAF50;
            border-bottom: 2px solid #81C784;
            display: inline-block;
            padding-bottom: 5px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            animation: fadeIn 1.5s ease;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            background-color: #f9f9f9;
            transition: background-color 0.3s;
        }

        tr:nth-child(even) td {
            background-color: #f1f1f1;
        }

        tr:hover td {
            background-color: #e0f7fa;
        }

        .info-button {
            background-color: #2196F3;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            animation: fadeIn 1.5s ease;
        }

        .info-button:hover {
            background-color: #1976D2;
            transform: scale(1.1);
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 80%;
            max-width: 500px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            animation: popIn 0.5s ease;
        }

        @keyframes popIn {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .modal-content h3 {
            margin: 0 0 15px;
        }

        .modal-close {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .modal-close:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <header>
        <img src="rvm.png" alt="Logo">
        <h1>Admin Dashboard</h1>
        <button onclick="logout()">Logout</button>
    </header>

    <div class="container">
        <section class="section">
            <h2>Redemption Requests</h2>
            <table id="requests-table">
                <thead>
                    <tr>
                        <th>RFID</th>
                        <th>Name</th>
                        <th>Grade & Section</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td>12345</td>
                        <td>John Doe</td>
                        <td>Grade 10 - Section A</td>
                        <td><button class="info-button" onclick="showInfo('12345', 'John Doe', 'Grade 10 - Section A')">Info</button></td>
                    </tr> -->
                    <!-- <tr>
                        <td>67890</td>
                        <td>Jane Smith</td>
                        <td>Grade 11 - Section B</td>
                        <td><button class="info-button" onclick="showInfo('67890', 'Jane Smith', 'Grade 11 - Section B')">Info</button></td>
                    </tr> -->

                    <?php
                    foreach ($redemptionRequests as $request) {
                        echo "<tr>";
                        echo "<td>" . format_student_id($request['id']) . "</td>";
                        echo "<td>{$request['name']}</td>";
                        echo "<td>{$request['grade_section']}</td>";
                        echo "<td><button class='info-button' onclick=\"showInfo('" . format_student_id($request['id']) . "', '{$request['name']}', '{$request['grade_section']}')\">Info</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>

    <div id="info-modal" class="modal">
        <div class="modal-content">
            <h3>Student Information</h3>
            <p id="modal-rfid"></p>
            <p id="modal-name"></p>
            <p id="modal-grade-section"></p>
            <button class="modal-close" onclick="closeModal()">Close</button>
        </div>
    </div>

    <script>
        function showInfo(rfid, name, gradeSection) {
            document.getElementById('modal-rfid').innerText = `RFID: ${rfid}`;
            document.getElementById('modal-name').innerText = `Name: ${name}`;
            document.getElementById('modal-grade-section').innerText = `Grade & Section: ${gradeSection}`;

            document.getElementById('info-modal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('info-modal').style.display = 'none';
        }

        function logout() {
            window.location.href = 'login.php'; // Redirect to login page
        }
    </script>
</body>

</html>
<?php
session_start();
error_reporting(E_ALL); // Enable error reporting for debugging
ini_set('display_errors', 1);

// Users array with roles and credentials
$users = [
    ["username" => "student1", "password" => "password1", "role" => "student"],
    ["username" => "teacher1", "password" => "password1", "role" => "teacher"],
    ["username" => "admin1", "password" => "password1", "role" => "admin"],
    ["username" => "pos1", "password" => "password1", "role" => "pos"], // New POS role
];

$errorMessage = ''; // Initialize error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']); // Sanitize username
    $password = trim($_POST['password']); // Sanitize password

    // Validate credentials
    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            // Store user data in session
            $_SESSION['logged_in_user'] = $user;

            // Redirect to the appropriate dashboard
            header("Location: " . $user['role'] . "-dashboard.php");
            exit();
        }
    }

    // If no match found, set error message
    $errorMessage = "Invalid credentials. Please try again.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Plate it Forward</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* General styles */
        html, body {
            height: 100%; /* Ensure full height */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column; /* Use flexbox for layout */
            font-family: 'Roboto', sans-serif;
            background-image: url('background3.jpg');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            color: #333;
            overflow: hidden; /* Prevent scrolling */
        }

        /* Header */
        header {
            background: rgba(0, 77, 64, 0.7); /* Same green shade as form */
            color: #FFFFFF;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1;
            backdrop-filter: blur(5px);
        }

        .container {
            width: 80%;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            margin: 0;
            flex: 1;
            text-align: center;
            font-size: 24px;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px; /* Adjusted space between links */
            margin: 0;
            padding: 0;
        }

        nav ul li a {
            color: #FFFFFF;
            text-decoration: none;
            font-weight: 500;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        /* Login Section */
        #roles {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            height: calc(100vh - 100px); /* Adjust height based on header height */
        }

        #login-section {
            background: rgba(0, 77, 64, 0.7); /* Same color as header */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
            animation: slideIn 0.5s ease-in-out forwards;
            opacity: 0.9; /* Slight transparency to show the background */
        }

        /* Keyframes for slide-in animation */
        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        #login-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 5px;
            text-align: left;
            color: #fff;
            font-weight: 500;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 30px;
            font-size: 16px;
            width: 100%;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #FFFFFF;
            outline: none;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .btn-primary {
            background-color: #FFFFFF;
            color: #3a6a4d;
            padding: 10px 20px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
            transition: transform 0.3s, background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #f4f4f4;
            transform: scale(1.05);
        }

        .error {
            color: #FF0000;
            margin-top: 10px;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Footer styles */
        footer {
            background: rgba(0, 77, 64, 0.7); /* Same green shade as header */
            color: #FFFFFF;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
            margin-top: auto;
        }

        /* Logo styling */
        .logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .links {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 15px;
            gap: 10px;
        }

        .links a {
            color: #FFFFFF;
            text-decoration: none;
            font-size: 14px;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <img src="rvm.png" alt="Logo" class="logo">
            <h1>Plate it Forward</h1>
            <nav>
                <ul>
                    <li><a href="plate.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Login Section -->
    <main>
        <section id="roles">
            <div id="login-section">
                <form id="login-form" method="POST">
                    <label for="username">Username:</label>
                    <input type="text" name="username" required placeholder="Enter username">
                    <label for="password">Password:</label>
                    <input type="password" name="password" required placeholder="Enter password">
                    <button type="submit" class="btn-primary">Login</button>
                    <?php if (!empty($errorMessage)): ?>
                        <div id="error-message" class="error"><?php echo $errorMessage; ?></div>
                    <?php endif; ?>

                    <div class="links">
                        <a href="forgot-password.php">Forgot Password?</a>
                        <a href="register.php">Don't have an account? Create now</a>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Plate it Forward. All rights reserved.</p>
        <p>Designed by <a href="https://yourwebsite.com" target="_blank">Group 6</a></p>
    </footer>
</body>
</html>

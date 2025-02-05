<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #2196F3;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
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
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px);
            padding: 20px;
        }

        .section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            width: 100%;
            max-width: 600px;
        }

        .section h2 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #2196F3;
        }

        .section p {
            font-size: 1.2em;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        @media (max-width: 600px) {
            header h1 {
                font-size: 2em;
            }

            .section h2 {
                font-size: 1.5em;
            }

            .section p {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Teacher Dashboard</h1>
        <button onclick="logout()">Logout</button>
    </header>

    <main>
        <section class="section">
            <h2>Monitor Student Engagement</h2>
            <p>Track student points and redemptions here. Use the tools available to enhance student learning and engagement.</p>
        </section>
    </main>

    <script>
        function logout() {
            window.location.href = 'Plate.php'; // Go back to the main page
        }
    </script>
</body>
</html>
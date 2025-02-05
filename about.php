<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Plate it Forward</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('background2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #333;
        }

        .header {
            background-color: rgba(0, 77, 64, 0.7); /* Dark green with 70% opacity */
            color: white; /* Text color */
            padding: 10px 20px; /* Reduced padding to 10px for top and bottom */
            width: 100%; /* Full width */
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }

        .header img {
            height: 50px;
            width: 50px;
            border-radius: 50%; /* Make the logo circular */
            margin-left: 20px; /* Move the logo further right */
        }

        .header h1 {
            color: white;
            font-size: 28px; /* Reduced font size */
            font-weight: 700; /* Slightly bold */
            margin-left: 20px; /* Move "Plate it Forward" text further from the logo */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .header nav {
            display: flex;
            gap: 20px; /* Space out the links */
            margin-right: 80px; /* Increased margin from the edge for better centering */
        }

        .header a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600; /* Thicker text for the links */
        }

        .header a:hover {
            text-decoration: underline;
        }

        main {
            margin-top: 80px; /* Adjusted margin-top to avoid navbar overlap */
        }

        .section {
            padding: 40px 0;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: rgba(58, 106, 77, 0.8); /* Green with reduced opacity */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h2, h3 {
            color: #FFFFFF; /* White text to contrast the green background */
        }

        .about-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .step {
            background-color: rgba(58, 106, 77, 1); /* Solid green */
            color: #FFFFFF;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 1s ease-out forwards;
        }

        .step:nth-child(1) { animation-delay: 0.2s; }
        .step:nth-child(2) { animation-delay: 0.4s; }
        .step:nth-child(3) { animation-delay: 0.6s; }
        .step:nth-child(4) { animation-delay: 0.8s; }

        .step img {
            width: 50px;
            margin-bottom: 10px;
        }

        #vision {
            text-align: center;
            margin-top: 40px;
            color: #F8F8F8; /* Lighter text for readability */
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 1s ease-out forwards;
            animation-delay: 1s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <img src="rvm.png" alt="Plate it Forward Logo">
        <h1>Plate it Forward</h1>
        <nav>
            <a href="plate.php">Home</a>
            <a href="about.php">About</a>
            <a href="login.php">Login</a>
        </nav>
    </header>

    <main>
        <section id="about" class="section">
            <div class="container">
                <h2>How It Works</h2>
                <div class="about-grid">
                    <div class="step">
                        <img src="plastic.jpg" alt="Plate and Bottle">
                        <h3>Step 1</h3>
                        <p>Return plates or recycle bottles at our designated stations to earn points effortlessly.</p>
                    </div>
                    <div class="step">
                        <img src="points.jpg" alt="Dashboard">
                        <h3>Step 2</h3>
                        <p>Track your progress and points on your personalized dashboard, keeping you motivated.</p>
                    </div>
                    <div class="step">
                        <img src="gift.jpg" alt="Gift Box">
                        <h3>Step 3</h3>
                        <p>Use your points for exciting rewards such as discounts, exclusive offers, and more!</p>
                    </div>
                    <div class="step">
                        <img src="earth.jpg" alt="Spread the Word">
                        <h3>Step 4</h3>
                        <p>Spread the word! Encourage friends and family to join and multiply the positive impact.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="vision" class="section">
            <div class="container">
                <h3>Our Vision</h3>
                <p>We envision a sustainable future where every plate returned and bottle recycled contributes to a cleaner, greener planet. Together, we can make a difference and inspire others to join this impactful movement.</p>
            </div>
        </section>
    </main>
</body>
</html>

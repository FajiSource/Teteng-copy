<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plate it Forward - Home</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Base Styles */
        html, body {
            background-color: #F1F1F1;
            color: #333;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
            background-image: url('background.jpg'); /* Apply background to the entire page */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        /* Header Design */
        header {
            background-color: rgba(0, 77, 64, 0.7); /* Semi-transparent background with reduced opacity */
            color: white;
            padding: 20px 40px; /* Reduced vertical padding */
            display: flex;
            justify-content: space-between; /* Distribute space between the logo and navigation */
            align-items: center;
            width: 100%; /* Full width */
            box-sizing: border-box;
            animation: slideDown 1s ease;
        }

        header img {
            height: 50px; /* Adjusted logo size */
            width: 50px;  /* Adjusted logo size */
            border-radius: 50%;
            animation: fadeIn 1.5s ease;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em; /* Adjusted title size */
            text-align: center;
            flex-grow: 1;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 25px; /* Adjusted gap between navigation links */
            justify-content: center; /* Center the navigation links */
            flex-grow: 1;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            position: relative;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #80cbc4;
            transition: width 0.3s ease;
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        /* Welcome Section */
        #welcome {
            padding: 40px 20px;
            text-align: center;
            background-color: rgba(0, 77, 64, 0.85); /* Increased opacity to 0.85 */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.5s ease;
        }

        #welcome h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #80cbc4;
        }

        #welcome p {
            font-size: 18px;
            margin-bottom: 30px;
            color: #e0f2f1;
        }

        .btn-primary {
            background-color: #00796b;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #004d40;
            transform: translateY(-5px);
        }

        /* Testimonial Slider */
        .testimonial-slider {
            max-width: 600px;
            margin: 40px auto;
            background-color: rgba(0, 77, 64, 0.7); /* Semi-transparent background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            animation: fadeInUp 1s ease;
        }

        .testimonial-slide {
            display: none;
            text-align: center;
            animation: slideIn 1s ease;
        }

        .testimonial-slider img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .testimonial-slider p {
            font-style: italic;
            font-size: 16px; /* Reduced font size */
            color: #e0f2f1;
        }

        .testimonial-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .nav-button {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .nav-button:hover {
            color: #80cbc4;
        }

        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideDown {
            from { transform: translateY(-100%); }
            to { transform: translateY(0); }
        }

        /* Footer */
        footer {
            background-color: rgba(0, 77, 64, 0.7); /* Semi-transparent background with reduced opacity */
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: auto;
        }

        .footer-content a {
            color: #80cbc4;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-content a:hover {
            color: #b2dfdb;
        }
    </style>
</head>
<body>
    <header>
        <img src="rvm.png" alt="Logo">
        <h1>Plate it Forward</h1>
        <nav>
            <ul>
                <li><a href="plate.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="welcome">
            <h2>Welcome to Plate it Forward</h2>
            <p>A sustainable initiative to encourage recycling and eco-friendly actions. Earn points for recycling plates and bottles, and redeem them for exciting rewards!</p>
            <a href="login.php" class="btn-primary">Join the Movement!</a>
        </section>

        <section class="testimonial-slider">
            <div class="testimonial-slide" id="testimonial1">
                <img src="user1.jpg" alt="User 1">
                <p>"This initiative has changed the way I think about recycling!"</p>
                <p>- User 1</p>
            </div>
            <div class="testimonial-slide" id="testimonial2">
                <img src="user2.jpg" alt="User 2">
                <p>"I love being part of this eco-friendly community!"</p>
                <p>- User 2</p>
            </div>
            <div class="testimonial-nav">
                <button class="nav-button" id="prevBtn">&#10094;</button>
                <button class="nav-button" id="nextBtn">&#10095;</button>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; 2025 Plate it Forward. All Rights Reserved.</p>
            <p>Follow us on social media: 
                <a href="https://facebook.com/plateitforward" target="_blank">Facebook</a> | 
                <a href="https://twitter.com/plateitforward" target="_blank">Twitter</a> | 
                <a href="https://instagram.com/plateitforward" target="_blank">Instagram</a>
            </p>
        </div>
    </footer>

    <script>
        let currentTestimonial = 0;
        const testimonials = document.querySelectorAll(".testimonial-slide");

        function showTestimonial() {
            testimonials.forEach((testimonial, index) => {
                testimonial.style.display = index === currentTestimonial ? "block" : "none";
            });
        }

        function nextTestimonial() {
            currentTestimonial = (currentTestimonial + 1) % testimonials.length;
            showTestimonial();
        }

        function prevTestimonial() {
            currentTestimonial = (currentTestimonial - 1 + testimonials.length) % testimonials.length;
            showTestimonial();
        }

        setInterval(nextTestimonial, 5000);
        showTestimonial();

        document.getElementById("nextBtn").addEventListener("click", nextTestimonial);
        document.getElementById("prevBtn").addEventListener("click", prevTestimonial);
    </script>
</body>
</html>

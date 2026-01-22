<?php
session_start();

// DATABASE CONNECTION
// Adjust these settings if your XAMPP password is different (default is usually empty)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "als";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$firstname = "Guest";
$is_logged_in = false;

// Check if user is logged in (Assuming your login.php sets $_SESSION['user_id'])
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT name FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $full_name = $row['name'];
        
        // Logic to get just the First Name from the full 'name' column
        $name_parts = explode(' ', $full_name);
        $firstname = $name_parts[0];
        $is_logged_in = true;
    }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Strand 3 E-Learning for Empowerment</title>
    <!-- Tailwind CSS CDN for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    
    <style>
        html {
            scroll-behavior: smooth; 
        }
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            padding-top: 96px; 
        }

        /* NAVBAR STYLES */
        .navbar-initial {
            background-color: rgba(0, 0, 0, 0.3); 
            backdrop-filter: blur(5px); 
            border-bottom: 2px solid rgba(255, 255, 255, 0.5); 
            transition: all 0.3s ease-in-out;
        }
        
        .navbar-scrolled {
            background-color: #1a202c; 
            backdrop-filter: none;
            border-bottom: 2px solid #1E8449; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease-in-out;
        }

        /* HEADER STYLES */
        .header {
            width: 100%;
            height: calc(100vh); 
            background-size: cover;
            background-position: center;
            position: relative;
            transition: background-image 0.7s ease-in-out; 
            margin-bottom: 50px;
            margin-top: -96px; 
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.4); 
            z-index: 1; 
        }

        .dropdown-arrow {
            transition: transform 0.3s ease-in-out;
        }

        .nav-item.open .dropdown-arrow {
            transform: rotate(180deg);
        }

        /* SLIDER STYLES */
        .slider-slide {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 2rem;
            z-index: 2; 
        }

        .slider-slide.active {
            opacity: 1;
        }
        
        .service-card {
            background-color: #fff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -1px rgba(0, 0, 0, 0.1), 0 -2px 4px -1px rgba(0, 0, 0, 0.05);
            border-top: 3px solid #1E8449;
            border-bottom: 3px solid #1E8449;
        }

        /* BANNER STYLES */
        .math-skills-banner {
            width: 100%;
            height: 220px; 
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .math-skills-banner::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.6); 
        }
        
        /* ABOUT SECTION */
        .about-us-section {
            background-color: #fff;
            position: relative;
            margin-top: 50px;
        }

        .about-image {
            /* Confirmed: Set image height to 390px */
            height: 390px; 
            object-fit: cover; 
        }

        /* Utility to clear floats */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        
        /* UPDATED: Custom style for 20px text */
        .about-text {
            font-size: 20px; 
            line-height: 1.6; 
            margin-bottom: 1.5rem; 
        }
        
        .know-us-btn {
            display: inline-block;
            padding: 1rem 2rem;
            margin-top: 1rem;
            background-color: #1E8449; 
            color: white;
            font-weight: bold;
            /* UPDATED: Set font size to 18px */
            font-size: 18px; 
            text-align: center;
            border-radius: 0.5rem; 
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(30, 132, 73, 0.4); 
        }

        .know-us-btn:hover {
            background-color: #27AE60; 
            box-shadow: 0 6px 16px rgba(30, 132, 73, 0.6);
            transform: translateY(-2px);
        }
        
        @media (max-width: 1024px) {
            #main-navbar {
                padding-left: 2rem !important;
                padding-right: 2rem !important;
            }
        }
    </style>
</head>
<body class="bg-white text-gray-900">

    <!-- NAVIGATION BAR -->
    <nav id="main-navbar" class="w-full flex items-center justify-between py-6 fixed top-0 z-50 navbar-initial" style="padding-left: 250px; padding-right: 80px;">
        <!-- Logo -->
        <div class="logo flex items-center">
            <!-- UPDATED: Changed logo source to als-logo.png and set size to h-16 w-auto -->
            <a href="home.php" class="block">
                <img src="als-logo.png" alt="ALS Logo" class="h-16 w-auto">
            </a>
        </div>
        
        <!-- Menu Items -->
        <ul class="hidden md:flex space-x-12 text-white items-center ml-auto">
            <li><a href="home.php" class="hover:text-gray-300 transition duration-300 ease-in-out">Home</a></li>
            <li><a href="#services" class="hover:text-gray-300 transition duration-300 ease-in-out">Service</a></li> 
            <li><a href="#about" class="hover:text-gray-300 transition duration-300 ease-in-out">About</a></li> 
            <!-- Pages Dropdown -->
            <li id="pages-dropdown" class="nav-item group relative cursor-pointer">
                <a href="#" onclick="event.preventDefault();" class="flex items-center hover:text-gray-300 transition duration-300 ease-in-out">
                    Pages
                    <svg class="dropdown-arrow ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
                <ul id="pages-menu" class="dropdown-menu absolute hidden bg-gray-800 text-white rounded-md shadow-lg py-2 mt-2 w-48">
                    <li><a href="about.php" class="block px-4 py-2 hover:bg-gray-700">About Us</a></li> 
                    <li><a href="services.php" class="block px-4 py-2 hover:bg-gray-700">Our Services</a></li>
                    <li><a href="contact.php" class="block px-4 py-2 hover:bg-gray-700">Contact Us</a></li>
                </ul>
            </li>
            <li class="mr-8"><a href="#contact" class="hover:text-gray-300 transition duration-300 ease-in-out">Contact Us</a></li>
            
            <!-- LOGIN CREDENTIALS SECTION -->
            <!-- Logic: If logged in, show "Hi, Name" button with Dropdown (Explore, Logout). Else, show Login. -->
            <li id="account-item" class="nav-item relative cursor-pointer ml-8">
                <?php if ($is_logged_in): ?>
                    <!-- Logged In State: Dropdown Button -->
                    <button id="accountBtn" class="flex items-center bg-green-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition-colors duration-300 hover:bg-green-600 focus:outline-none">
                        <span class="text-lg mr-2">Hi, <?php echo htmlspecialchars($firstname); ?></span>
                        <!-- Dropdown Arrow SVG -->
                        <svg id="account-arrow" class="dropdown-arrow w-4 h-4 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    
                    <!-- User Dropdown Menu -->
                    <!-- UPDATED: Changed 'right-0' to 'left-0' so the dropdown expands to the right -->
                    <ul id="account-menu" class="dropdown-menu absolute hidden bg-gray-800 text-white rounded-md shadow-lg py-2 mt-2 w-48 left-0 z-50">
                        <li>
                            <a href="http://localhost/als/front/records.php" class="block px-4 py-2 hover:bg-gray-700 transition duration-200">Explore</a>
                        </li>
                        <!-- UPDATED: Added mx-4 to prevent full width hr -->
                        <hr class="border-gray-600 my-1 mx-4">
                        <li>
                            <a href="http://localhost/als/interface/index.php" class="block px-4 py-2 hover:bg-gray-700 transition duration-200">Logout</a>
                        </li>
                    </ul>
                <?php else: ?>
                    <!-- Fallback State (Not Logged In) -->
                    <a href="http://localhost/als/logs/login.php" class="flex items-center bg-green-700 text-white font-bold py-2 px-6 rounded-full shadow-lg hover:bg-green-600 transition duration-300">
                        Login
                    </a>
                <?php endif; ?>
            </li>
        </ul>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-white focus:outline-none">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </nav>
    
    <!-- HEADER -->
    <header id="header" class="header">
        <div class="relative w-full h-full flex flex-row items-center justify-center px-4 sm:px-8 md:px-12 lg:px-24">
            <!-- Left arrow button -->
            <button id="prevBtn" class="absolute z-10 left-4 md:left-8 top-1/2 transform -translate-y-1/2 p-2 rounded-full transition duration-300 ease-in-out hover:bg-white/10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 md:h-14 md:w-14 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
    
            <!-- Main Header Content with Slider -->
            <div id="slides-wrapper" class="relative w-full h-full flex items-center justify-center flex-grow">
                <div class="slider-slide active" data-slide-index="0">
                    <h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold mb-4 drop-shadow-lg">
                        Learning Strand 3 E-Learning
                        <span class="block mt-4 md:mt-6">Mathematical and Problem Solving Skills</span>
                    </h1>
                </div>
                <div class="slider-slide" data-slide-index="1">
                    <h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold mb-4 drop-shadow-lg">Discover Our Services</h1>
                    <p class="text-base sm:text-xl md:text-2xl font-light max-w-5xl drop-shadow-md">Sharpen your skills with our comprehensive mock tests designed to simulate real exam conditions. Our platform offers extensive practice modules tailored for honing your mathematical knowledge and building confidence.</p>
                </div>
                <div class="slider-slide" data-slide-index="2">
                    <h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold mb-4 drop-shadow-lg">Get in Touch</h1>
                    <p class="text-base sm:text-xl md:text-2xl font-light max-w-5xl drop-shadow-md">Have questions about our modules or need assistance with your learning plan? Reach out to us today to get the guidance you need for your educational journey.</p>
                </div>
                <div class="slider-slide" data-slide-index="3">
                    <h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold mb-4 drop-shadow-lg">Our Mission</h1>
                    <p class="text-base sm:text-xl md:text-2xl font-light max-w-2xl drop-shadow-md">To provide innovative solutions that empower our clients to achieve their goals.</p>
                </div>
                <div class="slider-slide" data-slide-index="4">
                    <h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold mb-4 drop-shadow-lg">Start Your Learning Journey Today</h1>
                    <p class="text-base sm:text-xl md:text-2xl font-light max-w-5xl drop-shadow-md">Unlock your full potential with our dedicated learning tools. We are here to support your path to mathematical mastery and help you achieve your educational dreams.</p>
                </div>
            </div>
    
            <!-- Right arrow button -->
            <button id="nextBtn" class="absolute z-10 right-4 md:right-8 top-1/2 transform -translate-y-1/2 p-2 rounded-full transition duration-300 ease-in-out hover:bg-white/10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 md:h-14 md:w-14 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services" class="bg-white py-16" style="padding-top: calc(4rem + 5px); padding-bottom: calc(4rem + 5px);">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-10 text-gray-900">Our Services</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="service-card p-8 rounded-lg shadow-lg flex flex-col items-center text-center relative transition-all duration-300 hover:-translate-y-2 hover:bg-green-50" style="padding-bottom: 40px;">
                    <div class="text-green-600 mb-4 text-4xl"><i class="fas fa-chart-line"></i></div>
                    <h3 class="text-xl font-bold text-gray-900">Diagnostic Assessments</h3>
                    <p class="mt-2 text-gray-600">
                        Not sure where to start? Our comprehensive diagnostic tests cover a range of mathematical topics from arithmetic to calculus.
                    </p>
                </div>
                <div class="service-card p-8 rounded-lg shadow-lg flex flex-col items-center text-center relative transition-all duration-300 hover:-translate-y-2 hover:bg-green-50" style="padding-bottom: 40px;">
                    <div class="text-green-600 mb-4 text-4xl"><i class="fas fa-tasks"></i></div>
                    <h3 class="text-xl font-bold text-gray-900"> Targeted Practice</h3>
                    <p class="mt-2 text-gray-600">
                        Once you know your weaknesses, our platform provides a library of practice quizzes tailored to your needs.
                    </p>
                </div>
                <div class="service-card p-8 rounded-lg shadow-lg flex flex-col items-center text-center relative transition-all duration-300 hover:-translate-y-2 hover:bg-green-50" style="padding-bottom: 40px;">
                    <div class="text-green-600 mb-4 text-4xl"><i class="fas fa-brain"></i></div>
                    <h3 class="text-xl font-bold text-gray-900">Problem-Solving</h3>
                    <p class="mt-2 text-gray-600">
                        Math isn't just about formulas. Our problem-solving simulations challenge you to apply mathematical concepts in real-world scenarios.
                    </p>
                </div>
                <div class="service-card p-8 rounded-lg shadow-lg flex flex-col items-center text-center relative transition-all duration-300 hover:-translate-y-2 hover:bg-green-50" style="padding-bottom: 40px;">
                    <div class="text-green-600 mb-4 text-4xl"><i class="fas fa-lightbulb"></i></div>
                    <h3 class="text-xl font-bold text-gray-900">The "Why" Behind Math</h3>
                    <p class="mt-2 text-gray-600">
                        Understanding why a concept is important is key. We include a section dedicated to the real-world applications of math.
                    </p>
                </div>
                <div class="service-card p-8 rounded-lg shadow-lg flex flex-col items-center text-center relative transition-all duration-300 hover:-translate-y-2 hover:bg-green-50" style="padding-bottom: 40px;">
                    <div class="text-green-600 mb-4 text-4xl"><i class="fas fa-user-graduate"></i></div>
                    <h3 class="text-xl font-bold text-gray-900">Personalized Plans</h3>
                    <p class="mt-2 text-gray-600">
                        Based on your assessment results, we'll create a customized study plan to help you focus on the right areas.
                    </p>
                </div>
                <div class="service-card p-8 rounded-lg shadow-lg flex flex-col items-center text-center relative transition-all duration-300 hover:-translate-y-2 hover:bg-green-50" style="padding-bottom: 40px;">
                    <div class="text-green-600 mb-4 text-4xl"><i class="fas fa-file-alt"></i></div>
                    <h3 class="text-xl font-bold text-gray-900">Mock Tests</h3>
                    <p class="mt-2 text-gray-600">
                        Our full-length mock exams are designed to simulate the real testing environment.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Banner -->
    <div class="math-skills-banner mt-16 flex items-center justify-start" style="background-image: url('https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white z-10 text-left px-4 md:pl-20 lg:pl-32 drop-shadow-lg">Mathematical and Problem Solving Skills</h2>
    </div>
    <br><br>

    <!-- About Us Section -->
    <section id="about" class="about-us-section py-16">
        <!-- The container is now set to full width with responsive padding -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <h2 class="text-4xl sm:text-5xl font-bold text-center mb-12 text-gray-900">About Us</h2>
            
            <!-- REVISED: Centered, larger image, and side-by-side flex layout for centering -->
            <!-- The flex container uses items-start to align content to the top (visual alignment with first image) -->
            <div class="flex flex-col lg:flex-row items-start justify-center gap-12">
                <!-- Image column (Now 50% width on large screens) -->
                <div class="w-full lg:w-1/2 flex flex-col space-y-8">
                    <!-- Changed src from als1.jpg to know-us1.jpg -->
                    <img src="know-us1.jpg" alt="Our team collaborating" class="rounded-xl shadow-lg w-full about-image">
                    <!-- Changed src from als2.jpg to know-us2.jpg -->
                    <img src="know-us2.jpg" alt="Abstract mathematical equations" class="rounded-xl shadow-lg w-full about-image">
                </div>
                
                <!-- Text column (Now 50% width on large screens, standard text alignment for readability) -->
                <div class="w-full lg:w-1/2 text-gray-800 flex flex-col">
                    <div class="prose max-w-none">
                        <p class="about-text leading-relaxed">
                            Our platform is designed to show you that math is more than just formulas and numbers—it's a powerful tool for solving real-world problems. We bridge the gap between classroom theory and practical application by providing lessons and challenges that directly relate to everyday life. 
                        </p>
                        <p class="about-text leading-relaxed">
                            We believe everyone deserves a chance to build strong mathematical and critical thinking skills. Our flexible, self-paced modules are designed specifically for the Alternative Learning System (ALS) framework, making quality education accessible regardless of your background or schedule.
                        </p>
                        <p class="about-text leading-relaxed">
                            Through interactive problem-solving simulations and hands-on exercises, we help you develop critical thinking and analytical skills that are essential for any career path. Our goal is to make learning an engaging journey.
                        </p>
                    </div>
                    <div class="mt-8">
                        <a href="about.php" class="know-us-btn inline-block">
                            Know Us Better
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>

    <!-- Lower Banner -->
    <div class="math-skills-banner mt-16 flex items-center justify-start" style="background-image: url('https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');">
         <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white z-10 text-left px-4 md:pl-20 lg:pl-32 drop-shadow-lg">Mathematical and Problem Solving Skills</h2>
    </div>
    <br>

    <!-- Contact Section -->
<section id="contact" class="py-16 bg-white mt-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl sm:text-5xl font-bold text-center mb-12 text-gray-900">Get In Touch</h2>
        <br>
        <div class="flex flex-col md:flex-row justify-center gap-12 md:gap-40">

            <!-- Contact Card 1: Email -->
            <div class="flex flex-col items-center text-center group">
                <div class="w-64 h-64 md:w-80 md:h-80 bg-white rounded-full flex items-center justify-center shadow-xl mb-6 transition-transform duration-300 group-hover:scale-110 border border-gray-100">
                    <a href="mailto:info@yourcompany.com" class="w-full h-full flex items-center justify-center">
                        <img src="email.jpg" alt="Email" class="w-1/2 h-1/2 object-contain">
                    </a>
                </div>
                <h3 class="text-xl font-semibold text-gray-900">Email Address</h3>
                <p class="text-gray-600 mt-1">editha.pichay@deped.gov.ph</p>
            </div>

            <!-- Contact Card 2: Phone -->
            <div class="flex flex-col items-center text-center group">
                <div class="w-64 h-64 md:w-80 md:h-80 bg-white rounded-full flex items-center justify-center shadow-xl mb-6 transition-transform duration-300 group-hover:scale-110 border border-gray-100">
                    <a href="#" class="w-full h-full flex items-center justify-center">
                        <img src="call.jpg" alt="Call Us" class="w-1/2 h-1/2 object-contain">
                    </a>
                </div>
                <h3 class="text-xl font-semibold text-gray-900">Call Us</h3>
                <p class="text-gray-600 mt-1">09052547504</p>
            </div>

            <!-- Contact Card 3: Location -->
            <div class="flex flex-col items-center text-center group">
                <div class="w-64 h-64 md:w-80 md:h-80 bg-white rounded-full flex items-center justify-center shadow-xl mb-6 transition-transform duration-300 group-hover:scale-110 border border-gray-100">
                    <a href="#" target="_blank" class="w-full h-full flex items-center justify-center">
                        <img src="location.png" alt="Location" class="w-1/2 h-1/2 object-contain">
                    </a>
                </div>
                <h3 class="text-xl font-semibold text-gray-900">Our Location</h3>
                <p class="text-gray-600 mt-1">Barangay Capt. C. Nazareno,<br> Naic, Cavite, Philippines</p>
            </div>
        </div>
    </div>
</section>
    <br><br>

    <!-- Footer Section -->
    <footer id="contact" class="bg-gray-900 text-white py-12 mt-[75px]">
        <!-- EDITED: Changed lg:px-24 to lg:px-20 for 80px left/right padding on large screens -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-20">
            <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left">
                <!-- Company Info and Copyright -->
                <div class="mb-6 md:mb-0">
                    <!-- LOGO UPDATED TO MATCH als-logo.png -->
                    <a href="home.php" class="block">
                        <img src="als-logo.png" alt="ALS Logo" class="h-16 w-auto">
                    </a>
                    <p class="mt-2 text-gray-400">© <?php echo date('Y'); ?> Alternative Learning System. <br>All rights reserved.</p>
                </div>

                <!-- Social Media Icons (replace with actual icons or SVGs) -->
                <div class="flex space-x-6">
                    <!-- Link 1: Facebook -->
                    <a href="https://www.facebook.com/ALSNAIC1" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white transition-colors duration-300">
                        <!-- Facebook Icon -->
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.873V15h-2.964V12h2.964V9.382c0-2.906 1.775-4.49 4.364-4.49 1.258 0 2.378.188 2.705.272V8.5h-1.63c-1.218 0-1.458.577-1.458 1.423V12h3.242l-.52 3H14V21.873A10.006 10.006 0 0022 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <!-- Link 2: Website (Globe Icon) -->
                    <a href="https://sites.google.com/view/ict4als/home?authuser=0" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white transition-colors duration-300">
                        <!-- Website Icon (Updated to match the user's provided globe image) -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10M12 22a15.3 15.3 0 000-20M2 12h20" />
                        </svg>
                    </a>
                    <!-- Link 3: Email (Direct to Gmail) -->
                    <a href="https://mail.google.com/" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white transition-colors duration-300">
                        <!-- Email Icon -->
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('.slider-slide');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const header = document.getElementById('header');
            const mainNavbar = document.getElementById('main-navbar'); 
            let currentSlide = 0;

            const slideImages = [
                '1.png', // Updated image path
                '2.png', // Updated image path
                '3.png', // Updated image path
                '4.png', // Updated image path
                '5.png'  // Updated image path
            ];

            function showSlide(index) {
                slides.forEach((slide) => {
                    slide.classList.remove('active');
                });
                slides[index].classList.add('active');
                
                if (slideImages[index]) {
                    header.style.backgroundImage = `url('${slideImages[index]}')`;
                }
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
            }

            nextBtn.addEventListener('click', nextSlide);
            prevBtn.addEventListener('click', prevSlide);

            showSlide(currentSlide);

            const headerScrollThreshold = header.clientHeight - 80; 

            window.addEventListener('scroll', () => {
                if (window.scrollY > headerScrollThreshold) {
                    mainNavbar.classList.remove('navbar-initial');
                    mainNavbar.classList.add('navbar-scrolled');
                } else {
                    mainNavbar.classList.remove('navbar-scrolled');
                    mainNavbar.classList.add('navbar-initial');
                }
            });

            const pagesDropdown = document.getElementById('pages-dropdown');
            const pagesDropdownMenu = pagesDropdown.querySelector('.dropdown-menu');

            pagesDropdown.addEventListener('click', () => {
                pagesDropdownMenu.classList.toggle('hidden');
                pagesDropdown.classList.toggle('open');
            });
            
            // --- User Account Dropdown Logic ---
            const accountBtn = document.getElementById('accountBtn');
            const accountMenu = document.getElementById('account-menu');
            const accountArrow = document.getElementById('account-arrow');
            
            // Only add listeners if the account button exists (i.e., user is logged in)
            // In the canvas environment, PHP will not execute, so $is_logged_in is effectively false.
            // The "Login" button will be rendered.
            if(accountBtn && accountMenu && accountArrow) {
                accountBtn.addEventListener('click', (event) => {
                    event.stopPropagation();
                    // Close pages dropdown if it's open
                    pagesDropdownMenu.classList.add('hidden');
                    pagesDropdown.classList.remove('open');
                    
                    accountMenu.classList.toggle('hidden');
                    accountArrow.classList.toggle('rotate-180');
                });
                
                document.addEventListener('click', (event) => {
                    if (!accountMenu.contains(event.target) && !accountBtn.contains(event.target)) {
                        accountMenu.classList.add('hidden');
                        accountArrow.classList.remove('rotate-180');
                    }
                });
            }

            const yearSpan = document.getElementById('current-year');
            if (yearSpan) {
                yearSpan.textContent = new Date().getFullYear();
            }
        });
    </script>
</body>
</html>
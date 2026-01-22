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
    <!-- Font Awesome for Icons (Added for replacements) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <style>
        html {
            /* This property enables the smooth transition effect when clicking on anchor links */
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            /* Adjusted padding-top to 96px (6rem) to account for the taller h-16 (4rem) logo container + py-6 padding. */
            padding-top: 96px;
        }

        /* NEW STYLES FOR FIXED NAVBAR TRANSITION */
        /* Initial state: Transparent and subtle over the header image */
        .navbar-initial {
            background-color: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(5px);
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease-in-out;
        }

        /* Scrolled state: Solid, dark background for contrast over page content */
        .navbar-scrolled {
            background-color: #1a202c; /* Tailwind gray-900 equivalent */
            backdrop-filter: none;
            border-bottom: 2px solid #1E8449; /* Dark green border for emphasis */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease-in-out;
        }

        /* The header will now only contain the background and slide content */
        .header {
            width: 100%;
            height: calc(100vh); /* Adjusted height to account for the fixed navbar */
            background-size: cover;
            background-position: center;
            position: relative;
            transition: background-image 0.7s ease-in-out;
            margin-bottom: 50px;
            /* Adjusted margin-top to match new body padding */
            margin-top: -96px; /* Pull the header up under the fixed navbar */
        }

        /* This pseudo-element creates the semi-transparent black overlay on the header image */
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.4); /* Semi-transparent black with 40% opacity */
            z-index: 1; /* Place it above the background image */
        }

        /* The old .navbar class is now controlled via JS and utility classes. */
        .dropdown-arrow {
            transition: transform 0.3s ease-in-out;
        }

        .nav-item.open .dropdown-arrow {
            transform: rotate(180deg);
        }

        /* Slider container and slides */
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
            z-index: 2; /* Ensures slide content is above the overlay */
        }

        .slider-slide.active {
            opacity: 1;
        }

        .service-card {
            background-color: #fff;
            /* Thicker shadow on the bottom and a light one on top */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -1px rgba(0, 0, 0, 0.1), 0 -2px 4px -1px rgba(0, 0, 0, 0.05);
            /* Dark green border on top and bottom */
            border-top: 3px solid #1E8449;
            border-bottom: 3px solid #1E8449;
        }

        /* Styling for the new Math Skills Banner */
        .math-skills-banner {
            width: 100%;
            height: 220px; /* Long and wide box */
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        /* Overlay for the 60% transparency image effect */
        .math-skills-banner::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.6); /* 60% transparent black overlay */
            z-index: 1;
        }
        /* Custom styling for the About Us section */
        .about-us-section {
            background-color: #fff;
            position: relative;
            margin-top: 50px;
        }

        /* UPDATED: Set image height to 390px */
        .about-image {
            height: 390px;
            object-fit: cover; /* Ensures images fill the space without distortion */
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
        
        /* --- STYLING FOR KNOW US BETTER BUTTON --- */
        .know-us-btn {
            display: inline-block;
            padding: 1rem 2rem;
            margin-top: 1rem;
            background-color: #1E8449; /* Dark Green */
            color: white;
            font-weight: bold;
            /* UPDATED: Set font size to 18px */
            font-size: 18px;
            text-align: center;
            border-radius: 0.5rem; /* rounded-lg */
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(30, 132, 73, 0.4); /* Green shadow */
        }

        .know-us-btn:hover {
            background-color: #27AE60; /* Lighter Green on hover */
            box-shadow: 0 6px 16px rgba(30, 132, 73, 0.6);
            transform: translateY(-2px);
        }
        /* --- END STYLING FOR KNOW US BETTER BUTTON --- */

        /* Additional Responsive fix for Navbar padding */
        @media (max-width: 1024px) {
            #main-navbar {
                padding-left: 2rem !important;
                padding-right: 2rem !important;
            }
        }
    </style>
</head>
<body class="bg-white text-gray-900">

    <!-- NAVIGATION BAR (MOVED OUTSIDE HEADER AND MADE FIXED) -->
    <nav id="main-navbar" class="w-full flex items-center justify-between py-6 fixed top-0 z-50 navbar-initial" style="padding-left: 250px; padding-right: 80px;">
        <!-- Logo container increased to h-16 (4rem) and constrained with w-40 -->
        <div class="logo flex items-center h-16 w-40">
            <!-- UPDATED: Logo source changed to als-logo.png -->
            <a href="index.php" class="h-full flex items-center">
                <img src="als-logo.png" alt="ALS Logo" class="h-full object-contain">
            </a>
        </div>
        <!-- Updated href attributes to link to sections by ID -->
        <ul class="hidden md:flex space-x-12 text-white items-center ml-auto">
            <li><a href="index.php" class="hover:text-gray-300 transition duration-300 ease-in-out">Home</a></li>
            <li><a href="#services" class="hover:text-gray-300 transition duration-300 ease-in-out">Service</a></li>
            <li><a href="#about" class="hover:text-gray-300 transition duration-300 ease-in-out">About</a></li>
            <!-- Pages Dropdown -->
            <li id="pages-dropdown" class="nav-item group relative cursor-pointer">
                <a href="#" onclick="event.preventDefault();" class="flex items-center hover:text-gray-300 transition duration-300 ease-in-out">
                    Pages
                    <!-- Dropdown Arrow SVG -->
                    <svg class="dropdown-arrow ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
                <!-- Updated href attributes in dropdown menu -->
                <ul id="pages-menu" class="dropdown-menu absolute hidden bg-gray-800 text-white rounded-md shadow-lg py-2 mt-2 w-48">
                    <li><a href="about.php" class="block px-4 py-2 hover:bg-gray-700">About Us</a></li>
                    <li><a href="services.php" class="block px-4 py-2 hover:bg-gray-700">Our Services</a></li>
                    <li><a href="contact.php" class="block px-4 py-2 hover:bg-gray-700">Contact Us</a></li>
                </ul>
            </li>
            <!-- UPDATED HREF TO #contact (from #) -->
            <li class="mr-8"><a href="#contact" class="hover:text-gray-300 transition duration-300 ease-in-out">Contact Us</a></li>

            <!-- ACCOUNT SECTION (Static Logged-Out State for Preview) -->
            <li id="account-item" class="nav-item relative cursor-pointer ml-8">
                <button id="accountBtn" class="flex items-center bg-green-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition-colors duration-300 hover:bg-green-600">
                    Account
                    <!-- Dropdown Arrow SVG -->
                    <svg id="account-arrow" class="dropdown-arrow ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- Account Dropdown Menu -->
                <ul id="account-menu" class="dropdown-menu absolute hidden bg-gray-800 text-white rounded-md shadow-lg py-2 mt-2 w-48 left-0 z-50">
                    <li>
                        <a href="http://localhost/als/logs/login.php" class="block px-4 py-2 hover:bg-gray-700">Login</a>
                        <!-- The previous custom divider DIV has been removed. -->
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Mobile Menu Button (Added for responsiveness in this demo) -->
        <button class="md:hidden text-white focus:outline-none">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </nav>

    <!-- ADDED DEFAULT BACKGROUND IMAGE HERE -->
    <header id="header" class="header">
        <!-- New container to align content with arrows -->
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
                        <!-- Replaced <br> with a span that has top margin (mt-6) for spacing -->
                        <span class="block mt-4 md:mt-6">Mathematical and Problem Solving Skills</span>
                    </h1>
                </div>
                <div class="slider-slide" data-slide-index="1">
                    <h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold mb-4 drop-shadow-lg">Discover Our Services</h1>
                    <!-- Changed max-w-2xl to max-w-5xl for wider text area -->
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

    <!-- Services Section (ID added) -->
    <section id="services" class="bg-white py-16" style="padding-top: calc(4rem + 5px); padding-bottom: calc(4rem + 5px);">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-10 text-gray-900">Our Services</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service Card 1 -->
                <div class="service-card p-8 rounded-lg shadow-lg flex flex-col items-center text-center relative transition-all duration-300 hover:-translate-y-2 hover:bg-green-50" style="padding-bottom: 40px;">
                    <div class="text-green-600 mb-4 text-4xl"><i class="fas fa-chart-line"></i></div>
                    <h3 class="text-xl font-bold text-gray-900">Diagnostic Assessments</h3>
                    <p class="mt-2 text-gray-600">
                        Not sure where to start? Our comprehensive diagnostic tests cover a range of mathematical topics from arithmetic to calculus.
                    </p>
                </div>

                <!-- Service Card 2 -->
                <div class="service-card p-8 rounded-lg shadow-lg flex flex-col items-center text-center relative transition-all duration-300 hover:-translate-y-2 hover:bg-green-50" style="padding-bottom: 40px;">
                    <div class="text-green-600 mb-4 text-4xl"><i class="fas fa-tasks"></i></div>
                    <h3 class="text-xl font-bold text-gray-900"> Targeted Practice</h3>
                    <p class="mt-2 text-gray-600">
                        Once you know your weaknesses, our platform provides a library of practice quizzes tailored to your needs.
                    </p>
                </div>

                <!-- Service Card 3 -->
                <div class="service-card p-8 rounded-lg shadow-lg flex flex-col items-center text-center relative transition-all duration-300 hover:-translate-y-2 hover:bg-green-50" style="padding-bottom: 40px;">
                    <div class="text-green-600 mb-4 text-4xl"><i class="fas fa-brain"></i></div>
                    <h3 class="text-xl font-bold text-gray-900">Problem-Solving</h3>
                    <p class="mt-2 text-gray-600">
                        Math isn't just about formulas. Our problem-solving simulations challenge you to apply mathematical concepts in real-world scenarios.
                    </p>
                </div>

                <!-- Service Card 4 -->
                <div class="service-card p-8 rounded-lg shadow-lg flex flex-col items-center text-center relative transition-all duration-300 hover:-translate-y-2 hover:bg-green-50" style="padding-bottom: 40px;">
                    <div class="text-green-600 mb-4 text-4xl"><i class="fas fa-lightbulb"></i></div>
                    <h3 class="text-xl font-bold text-gray-900">The "Why" Behind Math</h3>
                    <p class="mt-2 text-gray-600">
                        Understanding why a concept is important is key. We include a section dedicated to the real-world applications of math.
                    </p>
                </div>

                <!-- Service Card 5 -->
                <div class="service-card p-8 rounded-lg shadow-lg flex flex-col items-center text-center relative transition-all duration-300 hover:-translate-y-2 hover:bg-green-50" style="padding-bottom: 40px;">
                    <div class="text-green-600 mb-4 text-4xl"><i class="fas fa-user-graduate"></i></div>
                    <h3 class="text-xl font-bold text-gray-900">Personalized Plans</h3>
                    <p class="mt-2 text-gray-600">
                        Based on your assessment results, we'll create a customized study plan to help you focus on the right areas.
                    </p>
                </div>

                <!-- Service Card 6 -->
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

    <!-- "Mathematical and Problem Solving Skills" Section -->
    <!-- Using a placeholder math image from unsplash -->
    <div class="math-skills-banner mt-16 flex items-center justify-start" style="background-image: url('https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white z-10 text-left px-4 md:pl-20 lg:pl-32 drop-shadow-lg">Mathematical and Problem Solving Skills</h2>
    </div>
    <br><br>

    <!-- About Us Section -->
    <section id="about" class="about-us-section py-16">
        <!-- UPDATED: Container width removed (w-full used) -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <h2 class="text-4xl sm:text-5xl font-bold text-center mb-12 text-gray-900">About Us</h2>
            
            <!-- UPDATED: Layout for top-alignment and centering -->
            <div class="flex flex-col lg:flex-row items-start justify-center gap-12">
                <!-- Image column (w-1/2 on large screens) -->
                <div class="w-full lg:w-1/2 flex flex-col space-y-8">
                    <!-- Image tags kept as original but CSS height applied -->
                    <img src="know-us1.jpg" alt="Our team collaborating" class="rounded-xl shadow-lg w-full about-image">
                    <img src="know-us2.jpg" alt="Abstract mathematical equations" class="rounded-xl shadow-lg w-full about-image">
                </div>

                <!-- Text column (w-1/2 on large screens) -->
                <div class="w-full lg:w-1/2 text-gray-800 flex flex-col">
                    <div class="prose max-w-none">
                        <!-- UPDATED: Applied about-text class for 20px font size -->
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
                        <!-- UPDATED: Applied know-us-btn class for 18px font size -->
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
                    <a href="index.php" class="block">
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

            // UPDATED: Array of background images for each slide (from home.php)
            const slideImages = [
                '1.png', // Slide 1
                '2.png', // Slide 2
                '3.png', // Slide 3
                '4.png', // Slide 4
                '5.png'  // Slide 5
            ];

            // Function to show the current slide and change the background image
            function showSlide(index) {
                slides.forEach((slide) => {
                    slide.classList.remove('active');
                });
                slides[index].classList.add('active');

                // Fallback: If the image URL is broken, the browser will likely display nothing,
                // but we check if the image source exists in our list.
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

            // Show the first slide and set its background on initial load
            showSlide(currentSlide);

            // --- Scroll Listener for Fixed Navbar Transition ---
            // Calculate the scroll position based on the header's height minus a small offset
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

            // --- Dropdown Menu Functionality (Pages) ---
            const pagesDropdown = document.getElementById('pages-dropdown');
            const pagesDropdownMenu = pagesDropdown.querySelector('.dropdown-menu');

            pagesDropdown.addEventListener('click', () => {
                pagesDropdownMenu.classList.toggle('hidden');
                pagesDropdown.classList.toggle('open');
            });

            // --- Account Dropdown Functionality ---
            const accountBtn = document.getElementById('accountBtn');
            const accountMenu = document.getElementById('account-menu');
            const accountArrow = document.getElementById('account-arrow');

            if(accountBtn && accountMenu && accountArrow) {
                accountBtn.addEventListener('click', (event) => {
                    event.stopPropagation();
                    // Close other dropdowns
                    pagesDropdownMenu.classList.add('hidden');
                    pagesDropdown.classList.remove('open');

                    accountMenu.classList.toggle('hidden');
                    // Toggle arrow rotation class
                    accountArrow.classList.toggle('rotate-180');
                });

                // Close account dropdown when clicking anywhere else on the document
                document.addEventListener('click', (event) => {
                    if (!accountMenu.contains(event.target) && !accountBtn.contains(event.target)) {
                        accountMenu.classList.add('hidden');
                        accountArrow.classList.remove('rotate-180');
                    }
                });
            }

            // --- Dynamic Year Update for Footer ---
            const yearSpan = document.getElementById('current-year');
            if (yearSpan) {
                yearSpan.textContent = new Date().getFullYear();
            }
        });
    </script>
</body>
</html>
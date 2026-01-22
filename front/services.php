<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <!-- Tailwind CSS CDN for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7fafc; /* A light gray background for a clean look */
            /* Add padding-top to body to prevent fixed navbar from covering content */
            padding-top: 5rem; /* Matches the height of the fixed navbar */
        }

        /* The header now has its background set via JavaScript, with a transition */
        .header {
            width: 100%;
            height: 65vh; /* Updated to 65% of the viewport height */
            background-size: cover;
            background-position: center;
            position: relative;
            transition: background-image 0.7s ease-in-out;
            /* UPDATED BACKGROUND IMAGE SOURCE TO service-bg.png with cache-buster */
            background-image: url('services1.png?t=<?php echo time(); ?>');
            /* Use flex-col to manage vertical spacing between nav and hero content */
            display: flex; 
            flex-direction: column;
            /* Move up to compensate for body padding-top */
            margin-top: -5rem; 
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
            z-index: 1;
        }

        /* Styling for the FIXED navigation bar (Copied from contact.php) */
        .navbar {
            position: fixed; /* Changed from sticky to fixed */
            top: 0;
            width: 100%; /* Ensure it spans the full width of the viewport */
            z-index: 1000; /* Increased z-index to ensure it stays on top of all other content */
            background-color: rgba(0, 0, 0, 0.3); /* Semi-transparent background */
            backdrop-filter: blur(5px); /* Blurring effect to simulate assimilation */
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
        }

        .dropdown-arrow {
            transition: transform 0.3s ease-in-out;
        }

        .nav-item.open .dropdown-arrow {
            transform: rotate(180deg);
        }

        /* Styling for the individual service feature cards */
        .service-card {
            background-color: #fff;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 2.5rem;
            height: 100%; /* Ensure card fills the column height */
            /* Removed generic border-left to control it via Tailwind classes on each card */
            transition: transform 0.3s ease-in-out;
        }

        .service-card p {
            font-size: 20px; /* Set font size for all paragraph descriptions inside service cards */
            line-height: 1.6;
        }

        .service-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .section-image {
            width: 100%;
            height: auto;
            /* The aspect-[4/3] class in HTML sets the ratio to 4:3 (height is 75% of width) */
            object-fit: cover;
            border-radius: 0.75rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        /* Style for the copy message (Kept for completeness, though not used here) */
        .copy-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 0.5rem 1rem;
            background-color: #1E8449;
            color: white;
            border-radius: 0.5rem;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            z-index: 20;
        }

        .copy-message.visible {
            opacity: 1;
        }
    </style>
</head>
<body class="bg-white text-gray-900">

    <!-- Main Header Area (Applies background image and overlay) -->
    <header class="header">
        <!-- Navigation Bar (Fixed and blending - Copied from contact.php) -->
        <nav class="navbar w-full flex items-center justify-between py-6 px-4 md:px-20 lg:px-32">
            <div class="logo">
                <a href="home.php" class="block">
                    <img src="als-logo.png" alt="ALS Logo" class="h-16 w-auto">
                </a>
            </div>
            <!-- Main Navigation Links -->
            <ul class="flex space-x-8 lg:space-x-16 text-white items-center ml-auto">
                <li><a href="home.php" class="hover:text-gray-300 transition duration-300 ease-in-out">Home</a></li>
                <li><a href="about.php" class="hover:text-gray-300 transition duration-300 ease-in-out">About Us</a></li>
                <li><a href="services.php" class="hover:text-gray-300 transition duration-300 ease-in-out">Our Service</a></li>
                <li class="mr-8"><a href="contact.php" class="hover:text-gray-300 transition duration-300 ease-in-out">Contact Us</a></li>
            </ul>
        </nav>

        <!-- START: Services Container Design Update (Hero Content) -->
        <!-- The z-20 class ensures this content is above the overlay but below the navbar -->
        <div id="services-container" class="relative w-full flex-grow flex flex-col items-center justify-center text-white px-4 md:px-20 text-center z-20 py-16">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold mb-4 tracking-tight">
                <br>
                Our Services
            </h1>
            <p class="max-w-6xl text-lg sm:text-xl lg:text-2xl mb-10 font-light leading-relaxed tracking-wide opacity-90">
                Discover how our data-driven approach and proprietary interactive labs transform learning, ensuring you don't just study, but truly master complex subjects.
                <br><br>
            </p>
        </div>
        <!-- END: Services Container Design Update -->
    </header>
    <br><br>
    <!-- 1. Service Section: Adaptive Learning Paths (Image Left) -->
    <section id="service-1" class="py-16 mx-auto max-w-full px-4 md:px-16 lg:px-24 xl:px-32 flex flex-col md:flex-row items-center space-y-12 md:space-y-0 md:space-x-12">
        
        <!-- Image 1 (Left side) - Reduced width to 40% -->
        <div class="md:w-2/5">
            <!-- UPDATED IMAGE SOURCE: service-img1.png -->
            <img src="service-img1.png" alt="Image representing adaptive learning paths" class="section-image aspect-[4/3]">
        </div>
        
        <!-- Content 1 (Right side) - Increased width to 60% -->
        <div class="md:w-3/5">
            <!-- ADDED border-l-8 and retained border-l-green-600 -->
            <div class="service-card border-l-8 border-l-green-600 text-gray-700">
                <h3 class="text-3xl font-bold text-green-700 mb-5">Adaptive Learning Paths</h3>
                <p class="mb-4">
                    Our platform uses advanced algorithms to create a <b>personalized study plan</b> based on your diagnostic results. We don't offer one-size-fits-all instruction; instead, we focus on identifying your specific <b>knowledge gaps</b> and delivering content precisely tailored to maximize your growth and efficiency in mastering core mathematical and problem-solving skills.
                </p>
                <p>
                    By continuously assessing your performance, the path adjusts in real-time, ensuring you are always challenged at the perfect level, leading to faster and more complete subject mastery.
                </p>
            </div>
        </div>
    </section>

    <!-- 2. Service Section: Interactive Problem-Solving Labs (Image Right) -->
    <section id="service-2" class="py-16 mx-auto max-w-full px-4 md:px-16 lg:px-24 xl:px-32 flex flex-col md:flex-row-reverse items-center space-y-12 md:space-y-0 md:space-x-reverse md:space-x-12">
        
        <!-- Image 2 (Right side) - Reduced width to 40% -->
        <div class="md:w-2/5">
            <!-- UPDATED IMAGE SOURCE: service-img2.png -->
            <img src="service-img2.png" alt="Image representing interactive problem-solving labs" class="section-image aspect-[4/3]">
        </div>

        <!-- Content 2 (Left side) - Increased width to 60% -->
        <div class="md:w-3/5">
            <!-- MODIFIED: Changed to border-r-8 and border-r-green-600, and explicitly added border-l-0 to ensure only right border is visible -->
            <div class="service-card border-r-8 border-r-green-600 border-l-0 text-gray-700">
                <h3 class="text-3xl font-bold text-green-700 mb-5">Interactive Problem Labs</h3>
                <p class="mb-4">
                    Go beyond memorization with our hands-on, <b>simulation-based testing environment</b>. Our labs present complex scenarios that require applying mathematical formulas and logical reasoning to solve real-world problems. This service is designed to bridge the gap between theoretical knowledge and practical application.
                </p>
                <p>
                    Get <b>instant, detailed feedback</b> and step-by-step solutions to truly understand the application of every concept, building confidence in solving problems under pressure.
                </p>
            </div>
        </div>
    </section>

    <!-- 3. Service Section: Real-Time Performance Analytics (Image Left) -->
    <section id="service-3" class="py-16 mx-auto max-w-full px-4 md:px-16 lg:px-24 xl:px-32 flex flex-col md:flex-row items-center space-y-12 md:space-y-0 md:space-x-12">
        
        <!-- Image 3 (Left side) - Reduced width to 40% -->
        <div class="md:w-2/5">
            <!-- UPDATED IMAGE SOURCE: service-img3.png -->
            <img src="service-img3.png" alt="Image representing real-time performance analytics" class="section-image aspect-[4/3]">
        </div>

        <!-- Content 3 (Right side) - Increased width to 60% -->
        <div class="md:w-3/5">
            <!-- ADDED border-l-8 and retained border-l-green-600 -->
            <div class="service-card border-l-8 border-l-green-600 text-gray-700">
                <h3 class="text-3xl font-bold text-green-700 mb-5">Real-Time Progress Analytics</h3>
                <p class="mb-4">
                    Track your journey with our comprehensive <b>progress tracking dashboards</b>. Visualize your competency in different mathematical domains, see your improvement rate, and benchmark your performance against others. These data-driven insights empower you to take control of your learning and target areas needing immediate attention.
                </p>
                <p>
                    We turn your data into actionable intelligence, helping you quickly identify weak spots and efficiently allocate your study time for maximum return on effort.
                </p>
            </div>
        </div>
    </section>

    
    <!-- Footer Section (Copied from contact.php) -->
    <footer id="contact" class="bg-gray-900 text-white py-12 mt-[75px]">
        <!-- EDITED: Changed lg:px-8 to lg:px-20 for 80px left/right padding on large screens, matching contact.php -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-20">
            <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left">
                <!-- Company Info and Copyright -->
                <div class="mb-6 md:mb-0">
                    <a href="home.php" class="block">
                        <img src="als-logo.png" alt="ALS Logo" class="h-16 w-auto">
                    </a>
                    <p class="mt-2 text-gray-400">© <?php echo date('Y'); ?> Alternative Learning System. <br>All rights reserved.</p>
                </div>

                <!-- Social Media Icons -->
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
                        <!-- Website Icon (Updated to match contact.php) -->
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
            // No JavaScript is needed for the fixed navbar/footer synchronization.
        });
    </script>
</body>
</html>
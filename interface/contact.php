<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
        }

        /* The header now has its background set via JavaScript, with a transition */
        .header {
            width: 100%;
            height: 65vh; /* Header height retained from original */
            background-size: cover;
            background-position: center;
            position: relative;
            transition: background-image 0.7s ease-in-out;
            /* Header background image set to contact2.png */
            background-image: url('contact2.png?t=<?php echo time(); ?>');
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

        /* Styling for the FIXED navigation bar */
        .navbar {
            position: fixed; /* Changed from sticky to fixed */
            top: 0;
            width: 100%; /* Ensure it spans the full width of the viewport */
            z-index: 1000; /* Increased z-index to ensure it stays on top of all other content */
            background-color: rgba(0, 0, 0, 0.3); /* Semi-transparent background */
            backdrop-filter: blur(5px); /* Blurring effect to simulate assimilation */
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
        }

        /* New style for the contact cards, inspired by your design */
        .contact-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            /* CHANGED: border-top blue to green (Tailwind emerald-500: #10B981) */
            border-top: 4px solid #10B981;
        }
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        /* Custom styling for the form elements based on the image */
        .form-input-field {
            background-color: #f0f0f0; /* Light gray background */
            border: none;
            border-radius: 0.5rem; /* rounded-lg */
            padding: 1rem; /* p-4 */
            width: 100%;
            transition: background-color 0.2s;
        }
        .form-input-field:focus {
            outline: none;
            background-color: #e5e7eb; /* Slightly darker on focus */
        }
    </style>
</head>
<body class="bg-white text-gray-900">

    <!-- Main Header Area (Applies background image and overlay) -->
    <header class="header">
        <!-- Navigation Bar (Fixed and blending) -->
        <!-- Note: The w-full class is crucial here to ensure the fixed element spans the viewport -->
        <nav class="navbar w-full flex items-center justify-between py-6 px-4 md:px-20 lg:px-32">
            <div class="logo">
                <!-- LOGO UPDATED TO MATCH als-logo.png -->
                <a href="index.php" class="block">
                    <img src="als-logo.png" alt="ALS Logo" class="h-16 w-auto">
                </a>
            </div>
            <!-- Main Navigation Links: Increased spacing to space-x-8 and lg:space-x-16, links updated to .html -->
            <ul class="flex space-x-8 lg:space-x-16 text-white items-center ml-auto">
                <li><a href="index.php" class="hover:text-gray-300 transition duration-300 ease-in-out">Home</a></li>
                <li><a href="about.php" class="hover:text-gray-300 transition duration-300 ease-in-out">About Us</a></li>
                <li><a href="services.php" class="hover:text-gray-300 transition duration-300 ease-in-out">Our Service</a></li>
                <li class="mr-8"><a href="contact.php" class="hover:text-gray-300 transition duration-300 ease-in-out">Contact Us</a></li>
            </ul>
        </nav>
        
        <!-- Header Title Area: Updated for Contact Page -->
        <div id="header-title-container" class="relative w-full h-full flex flex-col items-center justify-center text-white px-4 md:px-20 text-center z-20">
            <!-- Removed h1 title, keeping the container to maintain header structure/height -->
            <div class="pt-24"></div> 
        </div>
    </header>

    <!-- Main Content Area: Contact Information, Map, and Form -->
    <!-- UPDATED: Changed vertical padding from py-16 to py-12. Changed horizontal padding from 10vw to 7.5vw for 15% total margin. -->
    <main class="w-full mx-auto py-12 px-4 sm:px-6 lg:px-[7.5vw]">

        <!-- Google Map Iframe for Naic Central Elementary School, Cavite - UPDATED WITH CUSTOM LINK/ZOOM -->
        <!-- The iframe is now wider due to the wider parent main container -->
        <div class="mb-16 rounded-xl overflow-hidden shadow-2xl">
            <!-- Map coordinates updated to point to Naic Central Elementary School with a higher zoom level (18z) -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.697554900762!2d120.7639229!3d14.3206477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339629d21cef8a8d%3A0x1f19f6b396ead0a!2sNaic%20Central%20Elementary%20School!5e0!3m2!1sen!2sph!v1700000000000!5m2!1sen!2sph&z=18"
                width="100%" 
                height="600" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy"
                title="Google Map location of Naic Central Elementary School">
            </iframe>
        </div>

        <!-- Contact Cards Section (Inspired by map.PNG) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-24">
            <!-- Card 1: Email Address (Updated to a generic math education email) -->
            <div class="contact-card bg-white p-8 rounded-xl shadow-lg flex flex-col items-center text-center">
                <!-- CHANGED: text-blue-500 to text-emerald-500 -->
                <div class="text-emerald-500 mb-4">
                    <!-- Email Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Email Address</h3>
                <p class="text-gray-600">For inquiries and support</p>
                <!-- UPDATED: Link redirects to Gmail homepage -->
                <a href="https://mail.google.com/" target="_blank" class="mt-2 text-emerald-600 font-medium hover:underline">editha.pichay@deped.gov.ph</a>
            </div>

            <!-- Card 2: Phone Number (Updated to a generic Cavite number) -->
            <div class="contact-card bg-white p-8 rounded-xl shadow-lg flex flex-col items-center text-center">
                <!-- CHANGED: text-blue-500 to text-emerald-500 -->
                <div class="text-emerald-500 mb-4">
                    <!-- Phone Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Call Us</h3>
                <p class="text-gray-600">Wednesday & Friday, 8am - 5pm</p>
                <!-- Phone number is now plain text (not clickable) -->
                <p class="mt-2 text-emerald-600 font-medium">09052547504</p>
            </div>

            <!-- Card 3: Address (Updated to Naic Central Elementary School) -->
            <div class="contact-card bg-white p-8 rounded-xl shadow-lg flex flex-col items-center text-center">
                <!-- Anchor tag added to link to Google Maps external view -->
                <a 
                    href="https://www.google.com/maps/search/?api=1&query=Naic+Central+Elementary+School+Cavite" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="block w-full"
                    aria-label="View Naic Central Elementary School on Google Maps"
                >
                    <!-- CHANGED: text-blue-500 to text-emerald-500 -->
                    <div class="text-emerald-500 mb-4 mx-auto">
                        <!-- Location Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <!-- CHANGED: hover:text-blue-600 to hover:text-emerald-600 -->
                    <h3 class="text-xl font-semibold text-gray-900 mb-2 hover:text-emerald-600 transition duration-150">Location</h3>
                    <p class="text-gray-600">Naic Poblacion Area, Near Municipal Hall</p>
                    <!-- CHANGED: text-blue-600 to text-emerald-600 -->
                    <p class="mt-2 text-emerald-600 font-medium hover:underline">View on Google Maps</p>
                </a>
            </div>
        </div>

        <!-- Contact Form Section (Based on send email.PNG) -->
        
        
    </main>

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
            // The navbar is now position: fixed, which means it is taken out of the document
            // flow and naturally overlaps the content. Therefore, scroll padding adjustment
            // is not needed and has been removed.
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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

        /* Set font size for all paragraphs within the main about content to 22px */
        #about-content p {
            font-size: 22px;
            line-height: 1.6;
        }

        /* Set font size for paragraphs within all insight boxes to 20px */
        /* This now targets the unified display area */
        #insight-display p {
            font-size: 20px;
            line-height: 1.5;
        }

        /* The header now has its background set via JavaScript, with a transition */
        .header {
            width: 100%;
            height: 65vh; /* Header height retained from original */
            background-size: cover;
            background-position: center;
            position: relative;
            transition: background-image 0.7s ease-in-out;
            /* Header background image set to about.png */
            background-image: url('about.png?t=<?php echo time(); ?>');
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
        
        /* Styling for the FIXED navigation bar (from contact.php) */
        .navbar {
            position: fixed; /* Changed from sticky to fixed */
            top: 0;
            width: 100%; /* Ensure it spans the full width of the viewport */
            z-index: 1000; /* Increased z-index to ensure it stays on top of all other content */
            background-color: rgba(0, 0, 0, 0.3); /* Semi-transparent background */
            backdrop-filter: blur(5px); /* Blurring effect to simulate assimilation */
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
        }

        /* about.php specific styles */
        .insight-button-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem; /* Gap between buttons */
            justify-content: center;
        }
        .collapsible-button {
            background-color: #e5e7eb; /* Neutral gray background */
            color: #1f2937; /* Dark text */
            padding: 1rem 2rem;
            border-radius: 9999px; /* Full rounded corners (pill shape) */
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, transform 0.2s;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.06);
            border: 2px solid transparent;
        }

        .collapsible-button:hover {
            background-color: #d1d5db;
        }

        /* Active/Selected button styling (Primary color: Emerald/Green - #10B981) */
        .collapsible-button.active {
            background-color: #10B981; /* Emerald 500 */
            color: white;
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3), 0 4px 6px -4px rgba(16, 185, 129, 0.2);
            transform: translateY(-2px);
            border-color: #059669; /* Emerald 600 */
        }
        
        /* Custom shadow for the Insights container: thick top/bottom, subtle left/right */
        .shadow-custom-v {
            box-shadow: 
                0 20px 30px -10px rgba(0, 0, 0, 0.15),  /* thick bottom shadow */
                0 -15px 25px -5px rgba(0, 0, 0, 0.1), /* thick top shadow */
                5px 0 10px -5px rgba(0, 0, 0, 0.05),  /* subtle right shadow */
                -5px 0 10px -5px rgba(0, 0, 0, 0.05); /* subtle left shadow */
        }
    </style>
</head>
<body class="bg-white text-gray-900">

    <!-- Main Header Area (Applies background image and overlay) -->
    <header class="header">
        <!-- Navigation Bar (Fixed and blending) -->
        <nav class="navbar w-full flex items-center justify-between py-6 px-4 md:px-20 lg:px-32">
            <div class="logo">
                <!-- LOGO UPDATED TO MATCH als-logo.png -->
                <a href="home.php" class="block">
                    <img src="als-logo.png" alt="ALS Logo" class="h-16 w-auto">
                </a>
            </div>
            <!-- Main Navigation Links: Adjusted spacing and links -->
            <ul class="flex space-x-8 lg:space-x-16 text-white items-center ml-auto">
                <li><a href="home.php" class="hover:text-gray-300 transition duration-300 ease-in-out">Home</a></li>
                <!-- Current Page: About Us -->
                <li><a href="about.php" class="hover:text-gray-300 transition duration-300 ease-in-out">About Us</a></li>
                <li><a href="services.php" class="hover:text-gray-300 transition duration-300 ease-in-out">Our Service</a></li>
                <!-- Last Item has mr-8 spacing -->
                <li class="mr-8"><a href="contact.php" class="hover:text-gray-300 transition duration-300 ease-in-out">Contact Us</a></li>
            </ul>
        </nav>
        
        <!-- Header Title Area: Added "About Us" title -->
        <div id="header-title-container" class="relative w-full h-full flex flex-col items-center justify-center text-white px-4 md:px-20 text-center z-20">
            <!-- Header Text Updated to match the requested size classes -->
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight mb-4 drop-shadow-lg"><br><br>About Us</h1>
            
            <!-- Updated descriptive text about the website's purpose (Problem Solving and LS3) -->
            <p class="max-w-4xl text-lg sm:text-xl lg:text-2xl mb-10 font-light leading-relaxed tracking-wide opacity-90">
                This interactive website was created to facilitate practice in Learning Strand 3, focusing on critical thinking and problem-solving skills.
            </p>
            
            <div class="pt-24"></div> 
        </div>
    </header>
        <br><br><br><br>
    <!-- Main Content Area: About Information and Insights - This section now spans nearly full width -->
    <main class="w-full mx-auto py-12 px-4 sm:px-6 lg:px-8">

        <!-- About ALS Section -->
        <section id="about-content" class="mb-16">
            <!-- START: Know Us Better Section -->
            <div class="mb-16">
                <!-- 50/50 Split on Medium Screens and Up -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    
                    <!-- Column 1: Image Column (50% width) -->
                    <div>
                        <div class="flex justify-center">
                            <!-- Image container: Updated to be rectangular (48rem wide, 32rem tall) -->
                            <div class="bg-white p-2 rounded-xl shadow-2xl border-4 border-emerald-500 flex items-center justify-center w-[48rem] h-[32rem] overflow-hidden">
                                <img src="know-us-better.png?t=<?php echo time(); ?>" 
                                     alt="ALS Program Visual" 
                                     class="w-full h-full object-cover rounded-lg"
                                     onerror="this.onerror=null; this.src='https://placehold.co/768x512/10B981/ffffff?text=ALS+Image';" 
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Column 2: Text Column (50% width) -->
                    <div>
                        <br>
                        <!-- Heading is now inside the second grid column, aligned left, and above the text -->
                        <h2 class="text-4xl font-extrabold text-emerald-800 mb-8 text-left">Know Us Better</h2>

                        <p class="text-gray-700 text-xl mb-4">
                            The Alternative Learning System (ALS) is a non-formal education program in the Philippines that provides a viable alternative to the conventional school system. It is designed to cater to out-of-school youth and adults who cannot afford to go to or finish formal schooling. ALS offers two major learning strands: Basic Literacy (for non-literates) and Elementary/Secondary Accreditation and Equivalency (A&E) Test preparation.
                        </p>
                        <p class="text-gray-700 text-xl mb-4">
                            ALS is more than just a second chance—it's a path to empowerment. We believe in harnessing the potential of every learner, providing flexible, quality education that adapts to their unique life circumstances. 
                        </p>
                        <p class="text-gray-700 text-xl">
                            Our goal is to equip our learners not just with certificates, but with the confidence and skills needed to thrive in the modern world. Join us in building a more literate and competitive community, one learner at a time.
                        </p>
                    </div>
                </div>
            </div>
            <!-- END: Know Us Better Section -->
            <br><br><br>
            <!-- Our Core Insights Section - Wrapped in a new container -->
            <div class="bg-white p-8 rounded-xl shadow-custom-v mt-12">
                <h3 class="text-3xl font-bold text-gray-800 mb-6 text-center border-b-2 border-emerald-500 pb-3">Our Core Insights</h3>

                <!-- Insight Buttons -->
                <div class="insight-button-container mb-10">
                    <button class="collapsible-button" data-insight-id="process">Learning Process</button>
                    <button class="collapsible-button" data-insight-id="benefits">Benefits</button>
                    <button class="collapsible-button" data-insight-id="mission">Mission & Vision</button>
                    <button class="collapsible-button" data-insight-id="success">Success Stories</button>
                </div>

                <!-- Unified Display Area -->
                <div id="insight-display" class="bg-white p-6 md:p-8 rounded-lg border-l-4 border-emerald-500 shadow-inner">
                    <!-- Content will be injected here via JavaScript -->
                    <p class="text-gray-800 italic">Select an insight above to learn more about the ALS program.</p>
                </div>
            </div>

        </section>

    </main>

    <!-- Footer Section -->
    <footer id="contact" class="bg-gray-900 text-white py-12 mt-[75px]">
        <div class="container max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
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
            // Data structure to hold the content for each insight button
            const insights = {
                'process': `
                    <p>
                        The ALS learning process is flexible and modular, allowing learners to study at their own pace and convenience. It primarily uses self-learning modules (SLMs) with the guidance of an Instructional Manager or Mobile Teacher. Learning is often conducted in community-based learning centers, homes, or workplaces. The program concludes with the Accreditation and Equivalency (A&E) Test, which, if passed, grants a certification comparable to an Elementary or Junior High School diploma.
                    </p>
                `,
                'benefits': `
                    <p>
                        ALS offers numerous benefits, including the opportunity to gain formal education qualifications without attending traditional school. It equips learners with essential life skills, functional literacy, and knowledge relevant to their daily lives and work. Graduates often use their A&E certification to pursue higher education, vocational training, or better employment opportunities. It directly addresses the issue of educational inequality.
                    </p>
                `,
                'mission': `
                    <p>
                        Our mission is to provide every Filipino out-of-school youth and adult with a chance to continue their education, uplift their lives, and contribute positively to society. Our vision is a nation where quality, inclusive, and equitable education is accessible to all, irrespective of their socio-economic background or age, leading to a citizenry equipped with 21st-century skills.
                    </p>
                `,
                'success': `
                    <p>
                        ALS has paved the way for thousands of Filipinos to achieve their dreams. Success stories range from former street children earning their high school diplomas and enrolling in college, to elderly individuals learning basic literacy for the first time. The program's flexibility has been crucial for working mothers, laborers, and those living in remote areas to achieve educational success and break the cycle of poverty.
                    </p>
                `
            };

            const insightButtons = document.querySelectorAll('.collapsible-button');
            const displayBar = document.getElementById('insight-display');
            const initialDisplayMessage = '<p class="text-gray-800 italic">Select an insight above to learn more about the ALS program.</p>'; // The default message

            // Function to update the display content and button state
            const updateDisplay = (insightId) => {
                const currentActiveButton = document.querySelector('.collapsible-button.active');
                const activeButton = document.querySelector(`[data-insight-id="${insightId}"]`);

                // If the user clicks the currently active button, toggle it off and show the initial message
                if (currentActiveButton === activeButton) {
                    activeButton.classList.remove('active');
                    displayBar.innerHTML = initialDisplayMessage; 
                } else {
                    // Clear active state from all buttons
                    insightButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Set new active button and update content
                    if (activeButton) {
                        activeButton.classList.add('active');
                        // Inject the new content from the insights object
                        displayBar.innerHTML = insights[insightId] || initialDisplayMessage;
                    }
                }
            };

            // Set default display content on load: Initialize the 'Learning Process' button as active and show its content
            // We call updateDisplay for 'process' to activate the button and show the content on load.
            updateDisplay('process'); 
            
            // Add click listeners to all insight buttons
            insightButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const insightId = button.dataset.insightId;
                    if (insightId) {
                        updateDisplay(insightId);
                    }
                });
            });
        });
    </script>
</body>
</html>
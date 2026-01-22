<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Measurement, Perimeter, and Circumference</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        /* Base styles for Green/Emerald Theme */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0fdf4; /* Green 50 */
        }
        .accent-bg { background-color: #10b981; } /* Green 600 */
        .module-section { 
            transition: all 0.3s ease; 
            border: 1px solid #e5e7eb; /* Light border */
        }
        .module-section:hover { 
            /* Subtle green glow effect on hover */
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.2), 0 4px 6px -2px rgba(16, 185, 129, 0.1); 
        }
        
        /* --- CUSTOM STYLE FOR MAIN H1 TITLE (50px) --- */
        .main-title-h1 {
            font-size: 50px; /* 50px */
            line-height: 1.1;
        }
        /* --- END ADDED CUSTOM STYLE --- */

        /* --- TEXT SIZE AND SPACING (Consistent with 20px) --- */
        .content-box { 
            padding: 1.5rem; 
            background-color: #ffffff; 
        }
        .content-box h2 { 
            font-size: 1.75rem; 
            color: #0e7490; /* Dark Teal */
            font-weight: 700; 
            margin-top: 1rem; 
            margin-bottom: 0.5rem; 
        } 
        .content-box h3 { 
            font-size: 1.5rem; 
            color: #1f2937; 
            font-weight: 700; 
            margin-top: 1rem; 
            margin-bottom: 0.5rem; 
        }
        .content-box p { 
            margin-bottom: 2rem; /* 2rem spacing */
            line-height: 1.75; 
            color: #4b5563;
            font-size: 1.25rem; /* 20px */
        }
        /* FIX: Ensure all UL/OL inside content boxes are 20px */
        .content-box ul, .content-box ol { 
            margin-left: 1.5rem; 
            margin-bottom: 2rem; /* 2rem spacing */
            font-size: 1.25rem; /* 20px */
        }
        .content-box strong, .content-box b { 
            color: #059669; /* Emerald Green for key terms */
            font-weight: 700; 
        } 
        
        .example-box, .text-illustration {
            /* Styles for callout/example boxes */
            background-color: #f3f4f6; 
            border-left: 4px solid #34d399; 
            padding: 1rem;
            margin-top: 2rem; /* 2rem spacing */
            margin-bottom: 2rem; /* 2rem spacing */
            border-radius: 0.5rem;
            font-size: 1.25rem; /* 20px */
        }
        
        /* Lesson Title Size */
        .module-section summary span {
            font-size: 1.375rem; /* 22px */
            font-weight: bold;
        }
        
        /* Quiz and Objectives Text Size */
        /* FIX: Explicitly target Objectives list items and set to 20px */
        #objectives ul li { /* Changed from #tungkol-saan */
            font-size: 1.25rem; /* 20px */
        }
        
        /* UPDATED: Quiz Question and Label Text Size to 20px (1.25rem) */
        #pagsasanay label, 
        #pagsasanay .font-medium,
        #pagsasanay .font-semibold {
            font-size: 1.25rem; /* 20px */
        }

        /* Outline Styles (Sticky Navigation) */
        .outline-link { 
            display: block; 
            padding: 0.5rem 0.75rem; 
            border-radius: 0.5rem; 
            color: #4b5563; 
            transition: background-color 0.15s, color 0.15s; 
            /* ADJUSTED SIZE: Set to 1rem (16px) for Balangkas ng Modyul */
            font-size: 1rem; 
        }
        .outline-link:hover { 
            background-color: #d1fae5; 
            color: #059669; 
        }
        .outline-link.active { 
            font-weight: 700; 
            background-color: #10b981; 
            color: #ffffff; 
        }
        
        /* Quiz input styling */
        .quiz-input {
            font-size: 1.25rem; /* 20px */
            line-height: 1.75;
            padding: 0.5rem 1rem;
            width: 100%; /* Default to full width on small screens */
            border-bottom: 2px solid #a7f3d0;
            transition: border-color 0.2s;
            padding: 0.25rem;
            text-align: left; 
        }
        /* UPDATED: Increased desktop width for input fields (w-64) */
        @media (min-width: 640px) {
            .quiz-input {
                width: 16rem; /* w-64 = 16rem (wider input box) */
            }
        }
        .quiz-input:focus {
            border-color: #059669;
            outline: none;
        }
        
        /* Quiz Feedback */
        .correct-answer {
            border-color: #10b981 !important;
            background-color: #ecfdf5;
        }
        .incorrect-answer {
            border-color: #ef4444 !important;
            background-color: #fef2f2;
        }
        
        /* Specific header size adjustment */
        .content-box h4 {
            font-size: 1.25rem; /* 20px */
            font-weight: 600;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #1f2937;
        }
        
        /* Math Display Style: Simplified, uses plain text and standard symbols */
        .math-formula {
            display: block;
            margin: 1rem 0;
            padding: 0.75rem;
            text-align: center;
            font-size: 1.25rem; /* 20px */
            font-weight: bold;
            color: #059669; /* Green 600 */
            background-color: #ecfdf5; /* Green 50 */
            border-radius: 0.5rem;
            border: 1px dashed #a7f3d0;
            font-family: 'Inter', sans-serif;
            overflow-x: auto;
        }
        .math-formula span { white-space: nowrap; } 

         /* ADDED: Sticky container styling for the left nav bar */
        .sticky-container {
            position: sticky;
            top: 1.5rem; /* Adjust this value to control the space above the sticky elements */
        }
    </style>
</head>
<body class="p-4 sm:p-8 lg:p-20">

    <!-- Main Grid Container for Outline and Content (Full Width) -->
    <div class="mx-auto lg:grid lg:grid-cols-12 lg:gap-8">

        <!-- Left Column: Balangkas ng Modyul (Outline) -->
        <nav id="outline-nav" class="lg:block lg:col-span-3 mb-8 lg:mb-0">
            <!-- STICKY WRAPPER: Contains all elements that need to stick to the top -->
            <div class="sticky-container space-y-4">
                <!-- 1. Go Back to Modules (Bumalik sa Modyul) - FIRST POSITION -->
                <a href="http://localhost/als/front/modules.php" id="back-to-modules" 
                   class="w-full flex items-center text-base text-gray-600 hover:text-green-700 transition duration-150 p-4 rounded-xl bg-white shadow-lg border border-gray-200 hover:bg-gray-50 font-normal">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    <span data-i18n="back_to_modules">Go Back to Modules</span>
                </a>

                <!-- 2. OUTLINE (Balangkas ng Modyul) - SECOND POSITION -->
                <div id="outline" class="p-4 space-y-2 bg-white rounded-xl shadow-lg border border-green-100">
                    <div class="border-b pb-2 mb-2">
                        <h3 class="text-lg font-bold text-green-700" data-i18n="outline_title">Module Outline</h3>
                    </div>
                    <!-- Added data-i18n attributes to outline links -->
                    <a href="#objectives" class="outline-link" data-i18n="outline_objectives">Objectives</a>
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Linear Measurement</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Perimeter of Polygons</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Circumference of a Circle</a>
                    <a href="#pagsasanay" class="outline-link" data-i18n="outline_quiz">Practice</a>
                </div>

                <!-- 3. Language Toggle Button (Translator) - LAST POSITION -->
                <div class="p-4 bg-white rounded-xl shadow-lg border border-green-100 flex justify-between items-center">
                    <!-- STATIC LANGUAGE LABEL -->
                    <span id="current-lang-label" class="text-base text-gray-700 font-normal">Language: English</span> 
                    
                    <!-- TOGGLE BUTTON: Emerald Green colors, text-base (16px), unbolded -->
                    <button id="lang-toggle-btn" class="py-1 px-3 rounded-xl bg-[#10b981] text-white hover:bg-[#059669] transition duration-150 text-base font-normal">
                        <span data-i18n="toggle_text_tl">Switch to: Tagalog</span>
                    </button>
                </div>
            </div>
        </nav>

        <!-- Right Column: Main Content -->
        <main class="lg:col-span-9">
            <div id="main-content-wrapper" class="bg-white p-6 sm:p-10 rounded-2xl shadow-2xl border-t-4 border-l-4 border-green-600">

                <!-- Header Section -->
                <header class="text-center mb-10">
                    <span class="text-xs font-semibold uppercase tracking-wider text-green-600 bg-green-100 px-3 py-1 rounded-full" data-i18n="meta_text">Junior High Learning Module Sheet</span>
                    <!-- UPDATED TITLE -->
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Measurement, Perimeter, and Circumference</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Studying Linear Measurement, Perimeter, and Circumference of geometric shapes.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <!-- UPDATED OBJECTIVES -->
                        <li data-i18n="obj_1">Use and convert <b>metric units</b> (m, cm, km) for length.</li>
                        <li data-i18n="obj_2">Identify and calculate the <b>Perimeter</b> of various polygons (square, rectangle).</li>
                        <li data-i18n="obj_3">Identify and calculate the <b>Circumference</b> of a circle.</li>
                        <li data-i18n="obj_4">Apply measurement knowledge to real-life situations.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Pagsukat (Linear Measurements) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Linear Measurement</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">The <b>Metric System</b> is the standard unit of measurement in the Philippines (according to Batas Pambansa Bilang 8). It is easy to use because the units are in multiples of 10. </p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Metric Units Table (Length)</h3>
                            <div class="example-box">
                                <ul class="list-disc list-inside ml-4 space-y-1" data-i18n="aralin1_ul">
                                    <li data-i18n="aralin1_l1"><b>1 centimeter (cm)</b> = 10 millimeters (mm)</li>
                                    <li data-i18n="aralin1_l2"><b>1 meter (m)</b> = 100 centimeters (cm)</li>
                                    <li data-i18n="aralin1_l3"><b>1 meter (m)</b> = 10 decimeters (dm)</li>
                                    <li data-i18n="aralin1_l4"><b>1 kilometer (km)</b> = 1000 meters (m)</li>
                                </ul>
                            </div>
                            <br>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE: Conversion</p>
                                <p data-i18n="aralin1_ex1_step1">1. How many cm is 1.5 m?</p>
                                <p class="math-formula" data-i18n="aralin1_ex1_solution1"> 1.5 x (100 cm / 1 m) = <b>150 cm</b> </p>
                                <p data-i18n="aralin1_ex1_step2">2. How many km is 500 m?</p>
                                <p class="math-formula" data-i18n="aralin1_ex1_solution2"> 500 m x (1 km / 1000 m) = <b>0.5 km</b> </p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Perimeter ng Polygons -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Perimeter of Polygons</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">The <b>Perimeter</b> is the <b>distance around</b> a polygon. It is obtained by adding the measurements of all sides. </p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">1. Perimeter of a Rectangle</h3>
                            <p data-i18n="aralin2_p2">A rectangle has two (2) lengths (<b>l</b>) and two (2) widths (<b>w</b>).</p>
                            <div class="math-formula" data-i18n="aralin2_formula1">
                                <span>P = 2(l + w)</span>
                            </div>
                            <p data-i18n="aralin2_ex1_step1">Example: A lot with length <b>15 m</b> and width <b>10 m</b>. </p>
                            <p class="math-formula" data-i18n="aralin2_ex1_solution"> P = 2(15 m + 10 m) = 2(25 m) = <b>50 m</b> </p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">2. Perimeter of a Square</h3>
                            <p data-i18n="aralin2_p3">A square has four (4) equal sides (<b>s</b>).</p>
                            <div class="math-formula" data-i18n="aralin2_formula2">
                                <span>P = 4s</span>
                            </div>
                            <p data-i18n="aralin2_ex2_step1">Example: A lot with side <b>8 m</b>. </p>
                            <p class="math-formula" data-i18n="aralin2_ex2_solution"> P = 4 x 8 m = <b>32 m</b> </p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_3">3. Other Polygons</h3>
                            <p data-i18n="aralin2_p4">For other polygons (triangle, pentagon, hexagon), the perimeter is the <b>sum of all sides</b>.</p>
                        </div>
                    </details>

                    <!-- ARALIN 3: Circumference ng Bilog -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Circumference of a Circle</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">The <b>Circumference</b> is the distance around (perimeter) of a circle. This uses the constant value <b>pi (π)</b>, which is approximately <b>3.14</b>. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Parts of a Circle:</h3>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin3_l1"><b>Diameter (d)</b>: The line passing through the center of the circle.</li>
                                <li data-i18n="aralin3_l2"><b>Radius (r)</b>: Half (1/2) of the diameter. (<b>d</b> = 2<b>r</b>)</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">Circumference Formula (<b>C</b>)</h3>
                            <div class="math-formula" data-i18n="aralin3_formula1">
                                <span>C = π x d</span>
                            </div>
                            <p data-i18n="aralin3_p2">Or:</p>
                            <div class="math-formula" data-i18n="aralin3_formula2">
                                <span>C = 2 x π x r</span>
                            </div>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex1_title">EXAMPLE: Using Diameter</p>
                                <p data-i18n="aralin3_ex1_step1">Diameter (<b>d</b>) = <b>18 cm</b>. (π = 3.14)</p>
                                <p class="math-formula" data-i18n="aralin3_ex1_solution"> C = 3.14 x 18 cm = <b>56.52 cm</b> </p>
                                
                                <p class="font-bold mt-4" data-i18n="aralin3_ex2_title">EXAMPLE: Using Radius</p>
                                <p data-i18n="aralin3_ex2_step1">Radius (<b>r</b>) = <b>20 cm</b>. (π = 3.14)</p>
                                <p class="math-formula" data-i18n="aralin3_ex2_solution"> C = 2 x 3.14 x 20 cm = <b>125.6 cm</b> </p>
                            </div>
                        </div>
                    </details>
                    
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED QUIZ FOR MEASUREMENT TOPICS -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the measurement problems. (Use π = 3.14)</p>

                    <form id="measurement-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Conversion and Perimeter</p>
                            <div class="flex flex-col space-y-2">
                                <label for="qa1" class="font-medium" data-i18n="qa1_label">1. How many kilometers (km) is 1500 meters (m)? (Answer in km):</label>
                                <input type="text" id="qa1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (km)">
                            </div>
                            <div class="flex flex-col space-y-2">
                                <label for="qa2" class="font-medium" data-i18n="qa2_label">2. Perimeter of a lot with 18 m length and 12 m width:</label>
                                <input type="text" id="qa2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (m)">
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Circumference</p>
                            <div class="flex flex-col space-y-2">
                                <label for="qb1" class="font-medium" data-i18n="qb1_label">3. Circumference of a tray with a diameter of 18 cm:</label>
                                <input type="text" id="qb1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qb1_placeholder" placeholder="Answer (cm)">
                            </div>
                            <div class="flex flex-col space-y-2">
                                <label for="qb2" class="font-medium" data-i18n="qb2_label">4. Circumference of a circular garden with a radius of 5 m:</label>
                                <input type="text" id="qb2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qb2_placeholder" placeholder="Answer (m)">
                            </div>
                        </div>


                        <!-- UPDATED BUTTON ID -->
                        <button type="submit" id="submit-measurement-quiz" class="w-[70%] mx-auto block accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
                            Check Answers
                        </button>
                    </form>

                    <div id="results" class="mt-6 p-4 rounded-xl font-semibold hidden">
                        <!-- Results will be displayed here -->
                    </div>

                </section>

            </div>
        </main>
    </div>

    <script>
        // --- LANGUAGE TRANSLATION DATA ---
        const translations = {
            en: {
                // UI & Navigation
                back_to_modules: "Go Back to Modules",
                toggle_text_tl: "Switch to: Tagalog", 
                outline_title: "Module Outline",
                outline_objectives: "Objectives",
                outline_aralin1: "Lesson 1: Linear Measurement",
                outline_aralin2: "Lesson 2: Perimeter of Polygons",
                outline_aralin3: "Lesson 3: Circumference of a Circle",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Measurement, Perimeter, and Circumference",
                h1_subtitle: "Studying Linear Measurement, Perimeter, and Circumference of geometric shapes.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Use and convert <b>metric units</b> (m, cm, km) for length.",
                obj_2: "Identify and calculate the <b>Perimeter</b> of various polygons (square, rectangle).",
                obj_3: "Identify and calculate the <b>Circumference</b> of a circle.",
                obj_4: "Apply measurement knowledge to real-life situations.",

                // Lesson 1 Content (Measurement)
                aralin1_title: "Lesson 1: Linear Measurement",
                aralin1_p1: "The <b>Metric System</b> is the standard unit of measurement in the Philippines (according to Batas Pambansa Bilang 8). It is easy to use because the units are in multiples of 10.",
                aralin1_h3_1: "Metric Units Table (Length)",
                aralin1_ul: "",
                aralin1_l1: "<b>1 centimeter (cm)</b> = 10 millimeters (mm)",
                aralin1_l2: "<b>1 meter (m)</b> = 100 centimeters (cm)",
                aralin1_l3: "<b>1 meter (m)</b> = 10 decimeters (dm)",
                aralin1_l4: "<b>1 kilometer (km)</b> = 1000 meters (m)",
                aralin1_ex1_title: "EXAMPLE: Conversion",
                aralin1_ex1_step1: "1. How many cm is 1.5 m?",
                aralin1_ex1_solution1: " 1.5 x (100 cm / 1 m) = <b>150 cm</b> ",
                aralin1_ex1_step2: "2. How many km is 500 m?",
                aralin1_ex1_solution2: " 500 m x (1 km / 1000 m) = <b>0.5 km</b> ",

                // Lesson 2 Content (Perimeter)
                aralin2_title: "Lesson 2: Perimeter of Polygons",
                aralin2_p1: "The <b>Perimeter</b> is the <b>distance around</b> a polygon. It is obtained by adding the measurements of all sides.",
                aralin2_h3_1: "1. Perimeter of a Rectangle",
                aralin2_p2: "A rectangle has two (2) lengths (<b>l</b>) and two (2) widths (<b>w</b>).",
                aralin2_formula1: "P = 2(l + w)",
                aralin2_ex1_step1: "Example: A lot with length <b>15 m</b> and width <b>10 m</b>. ",
                aralin2_ex1_solution: " P = 2(15 m + 10 m) = 2(25 m) = <b>50 m</b> ",
                aralin2_h3_2: "2. Perimeter of a Square",
                aralin2_p3: "A square has four (4) equal sides (<b>s</b>).",
                aralin2_formula2: "P = 4s",
                aralin2_ex2_step1: "Example: A lot with side <b>8 m</b>. ",
                aralin2_ex2_solution: " P = 4 x 8 m = <b>32 m</b> ",
                aralin2_h3_3: "3. Other Polygons",
                aralin2_p4: "For other polygons (triangle, pentagon, hexagon), the perimeter is the <b>sum of all sides</b>.",
                
                // Lesson 3 Content (Circumference)
                aralin3_title: "Lesson 3: Circumference of a Circle",
                aralin3_p1: "The <b>Circumference</b> is the distance around (perimeter) of a circle. This uses the constant value <b>pi (π)</b>, which is approximately <b>3.14</b>.",
                aralin3_h3_1: "Parts of a Circle:",
                aralin3_l1: "<b>Diameter (d)</b>: The line passing through the center of the circle.",
                aralin3_l2: "<b>Radius (r)</b>: Half (1/2) of the diameter. (<b>d</b> = 2<b>r</b>)",
                aralin3_h3_2: "Circumference Formula (<b>C</b>)",
                aralin3_formula1: "C = π x d",
                aralin3_p2: "Or:",
                aralin3_formula2: "C = 2 x π x r",
                aralin3_ex1_title: "EXAMPLE: Using Diameter",
                aralin3_ex1_step1: "Diameter (<b>d</b>) = <b>18 cm</b>. (π = 3.14)",
                aralin3_ex1_solution: " C = 3.14 x 18 cm = <b>56.52 cm</b> ",
                aralin3_ex2_title: "EXAMPLE: Using Radius",
                aralin3_ex2_step1: "Radius (<b>r</b>) = <b>20 cm</b>. (π = 3.14)",
                aralin3_ex2_solution: " C = 2 x 3.14 x 20 cm = <b>125.6 cm</b> ",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Answer the measurement problems. (Use π = 3.14)",
                quiz_section1_title: "A. Conversion and Perimeter",
                qa1_label: "1. How many kilometers (km) is 1500 meters (m)? (Answer in km):",
                qa1_placeholder: "Answer (km)",
                qa2_label: "2. Perimeter of a lot with 18 m length and 12 m width:",
                qa2_placeholder: "Answer (m)",
                quiz_section2_title: "B. Circumference",
                qb1_label: "3. Circumference of a tray with a diameter of 18 cm:",
                qb1_placeholder: "Answer (cm)",
                qb2_label: "4. Circumference of a circular garden with a radius of 5 m:",
                qb2_placeholder: "Answer (m)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Measurement, Perimeter, and Circumference calculation!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the Perimeter and Circumference formulas.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Re-read Lessons 2 and 3.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pagsukat (Linear Measurements)",
                outline_aralin2: "Aralin 2: Perimeter ng Polygons",
                outline_aralin3: "Aralin 3: Circumference ng Bilog",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Pagsukat, Perimeter, at Circumference",
                h1_subtitle: "Pag-aaral ng Linear Measurement, Perimeter, at Circumference ng mga geometric shapes.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Gumamit at mag-convert ng <b>metric units</b> (m, cm, km) para sa haba.",
                obj_2: "Tukuyin at tuusin ang <b>Perimeter</b> ng iba't ibang polygons (square, rectangle).",
                obj_3: "Tukuyin at tuusin ang <b>Circumference</b> ng isang bilog.",
                obj_4: "Gamitin ang kaalaman sa pagsukat sa mga sitwasyon sa araw-araw.",

                // Lesson 1 Content (Measurement)
                aralin1_title: "Aralin 1: Pagsukat (Linear Measurements)",
                aralin1_p1: "Ang <b>Metric System</b> ang standard unit of measurement sa Pilipinas (ayon sa Batas Pambansa Bilang 8). Madali itong gamitin dahil ang units ay nasa multiples ng 10.",
                aralin1_h3_1: "Talahanayan ng Metric Units (Haba)",
                aralin1_ul: "",
                aralin1_l1: "<b>1 centimeter (cm)</b> = 10 millimeters (mm)",
                aralin1_l2: "<b>1 meter (m)</b> = 100 centimeters (cm)",
                aralin1_l3: "<b>1 meter (m)</b> = 10 decimeters (dm)",
                aralin1_l4: "<b>1 kilometer (km)</b> = 1000 meters (m)",
                aralin1_ex1_title: "HALIMBAWA: Conversion",
                aralin1_ex1_step1: "1. Ilang cm ang 1.5 m?",
                aralin1_ex1_solution1: " 1.5 x (100 cm / 1 m) = <b>150 cm</b> ",
                aralin1_ex1_step2: "2. Ilang km ang 500 m?",
                aralin1_ex1_solution2: " 500 m x (1 km / 1000 m) = <b>0.5 km</b> ",

                // Lesson 2 Content (Perimeter)
                aralin2_title: "Aralin 2: Perimeter ng Polygons",
                aralin2_p1: "Ang <b>Perimeter</b> ay ang <b>distansya sa palibot</b> ng isang polygon. Makukuha ito sa pamamagitan ng pag-a-add ng sukat ng lahat ng sides (gilid).",
                aralin2_h3_1: "1. Perimeter ng Rectangle (Parihaba)",
                aralin2_p2: "Ang rectangle ay may dalawang (2) haba (<b>l</b>) at dalawang (2) lapad (<b>w</b>).",
                aralin2_formula1: "P = 2(l + w)",
                aralin2_ex1_step1: "Halimbawa: Loteng may habang <b>15 m</b> at lapad na <b>10 m</b>. ",
                aralin2_ex1_solution: " P = 2(15 m + 10 m) = 2(25 m) = <b>50 m</b> ",
                aralin2_h3_2: "2. Perimeter ng Square (Parisukat)",
                aralin2_p3: "Ang square ay may apat (4) na pantay na gilid (<b>s</b>).",
                aralin2_formula2: "P = 4s",
                aralin2_ex2_step1: "Halimbawa: Loteng may gilid na <b>8 m</b>. ",
                aralin2_ex2_solution: " P = 4 x 8 m = <b>32 m</b> ",
                aralin2_h3_3: "3. Iba Pang Polygons",
                aralin2_p4: "Para sa iba pang polygons (triangle, pentagon, hexagon), ang perimeter ay ang <b>suma ng lahat ng gilid</b>.",
                
                // Lesson 3 Content (Circumference)
                aralin3_title: "Aralin 3: Circumference ng Bilog",
                aralin3_p1: "Ang <b>Circumference</b> ay ang distansya sa palibot (perimeter) ng isang bilog. Ginagamit dito ang constant value na <b>pi (π)</b>, na katumbas ng <b>3.14</b> (approximate value).",
                aralin3_h3_1: "Mga Bahagi ng Bilog:",
                aralin3_l1: "<b>Diameter (d)</b>: Ang linyang dumadaan sa gitna ng bilog.",
                aralin3_l2: "<b>Radius (r)</b>: Kalahati (1/2) ng diameter. (<b>d</b> = 2<b>r</b>)",
                aralin3_h3_2: "Pormula sa Circumference (<b>C</b>)",
                aralin3_formula1: "C = π x d",
                aralin3_p2: "O kaya:",
                aralin3_formula2: "C = 2 x π x r",
                aralin3_ex1_title: "HALIMBAWA: Gamit ang Diameter",
                aralin3_ex1_step1: "Diameter (<b>d</b>) = <b>18 cm</b>. (π = 3.14)",
                aralin3_ex1_solution: " C = 3.14 x 18 cm = <b>56.52 cm</b> ",
                aralin3_ex2_title: "HALIMBAWA: Gamit ang Radius",
                aralin3_ex2_step1: "Radius (<b>r</b>) = <b>20 cm</b>. (π = 3.14)",
                aralin3_ex2_solution: " C = 2 x 3.14 x 20 cm = <b>125.6 cm</b> ",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang mga problema sa pagsukat. (Gamitin ang π = 3.14)",
                quiz_section1_title: "A. Conversion at Perimeter",
                qa1_label: "1. Ilang kilometer (km) ang 1500 meters (m)? (Sagot sa km):",
                qa1_placeholder: "Sagot (km)",
                qa2_label: "2. Perimeter ng loteng 18 m haba at 12 m lapad:",
                qa2_placeholder: "Sagot (m)",
                quiz_section2_title: "B. Circumference",
                qb1_label: "3. Circumference ng bilao na may diameter na 18 cm:",
                qb1_placeholder: "Sagot (cm)",
                qb2_label: "4. Circumference ng circular garden na may radius na 5 m:",
                qb2_placeholder: "Sagot (m)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Ipinapakita nito na mahusay ka sa pagsukat!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga formula ng Perimeter at Circumference.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang Aralin 2 at 3.`,
            }
        };

        let currentLang = 'en'; // DEFAULT LANGUAGE IS ENGLISH, as requested

        // --- UTILITY FUNCTIONS ---
        
        /**
         * Updates the text content and options of all elements with data-i18n attributes.
         * @param {string} lang - The target language ('en' or 'tl').
         */
        function updateLanguage(lang) {
            currentLang = lang;
            const elements = document.querySelectorAll('[data-i18n]');
            const langData = translations[lang];
            const toggleButton = document.getElementById('lang-toggle-btn');
            const currentLangLabel = document.getElementById('current-lang-label');
            
            // 1. Update text content
            elements.forEach(element => {
                const key = element.getAttribute('data-i18n');
                if (langData[key]) {
                    // Special handling for list items: if the content is mapped inside the list 
                    // item <li> element itself, we replace the innerHTML of the <li>
                    if (element.tagName === 'LI' && element.parentElement.closest('[data-i18n]')) {
                        // Skip if parent UL/OL has a global i18n tag (not applicable here, but good safeguard)
                    } else {
                        element.innerHTML = langData[key];
                    }
                }
            });
            
            // 2. Update placeholders
            document.querySelectorAll('[data-i18n-placeholder]').forEach(input => {
                const key = input.getAttribute('data-i18n-placeholder');
                if (langData[key]) {
                    input.placeholder = langData[key];
                }
            });

            // 3. Update language code on HTML tag
            document.documentElement.lang = lang;

            // 4. Update the static current language label
            currentLangLabel.textContent = lang === 'tl' ? 'Wika: Tagalog' : 'Language: English';

            // 5. Update toggle button text: shows the language it will switch TO
            const oppositeLang = lang === 'tl' ? 'en' : 'tl';
            const toggleKey = `toggle_text_${oppositeLang}`; 
            
            if (translations[oppositeLang] && translations[oppositeLang][toggleKey]) {
                toggleButton.querySelector('span').textContent = translations[oppositeLang][toggleKey];
            } else {
                 // Fallback
                 toggleButton.querySelector('span').textContent = lang === 'tl' ? 'Switch to: English' : 'Switch to: Tagalog';
            }
            
            // 6. Re-run quiz result update if visible to update the message language
            const resultsDiv = document.getElementById('results');
            if (!resultsDiv.classList.contains('hidden')) {
                // If results are visible, update them for the new language
                submitQuiz(true); 
            }
            
            // 7. Update the Title tag
            const titleElement = document.querySelector('title');
            if (titleElement) {
                const titleKey = titleElement.getAttribute('data-i18n');
                if (titleKey && langData[titleKey]) {
                    titleElement.textContent = langData[titleKey];
                }
            }
        }
        
        // --- LANGUAGE TOGGLE EVENT LISTENER ---
        document.getElementById('lang-toggle-btn').addEventListener('click', () => {
            const newLang = currentLang === 'tl' ? 'en' : 'tl';
            updateLanguage(newLang);
        });


        // Function to handle the opening/closing arrow animation
        document.querySelectorAll('details').forEach(detail => {
            const arrow = detail.querySelector('svg');
            // Ensure arrow rotates correctly on initialization if details is open
            if (arrow && detail.open) {
                 arrow.classList.add('rotate-180');
            }
            
            detail.addEventListener('toggle', () => {
                const arrow = detail.querySelector('svg');
                if (arrow) {
                    if (detail.open) {
                        arrow.classList.add('rotate-180');
                    } else {
                        arrow.classList.remove('rotate-180');
                    }
                }
            });
        });

        // --- SCROLL TRACKING LOGIC FOR OUTLINE ---
        const sections = ['objectives', 'aralin1', 'aralin2', 'aralin3', 'pagsasanay']; 
        
        const outlineLinks = sections.map(id => document.querySelector(`#outline a[href="#${id}"]`));
        const sectionElements = sections.map(id => document.getElementById(id));

        function highlightOutlineLink() {
            let activeLink = null;
            
            // Re-check from bottom up to handle section overlap gracefully
            for (let i = sectionElements.length - 1; i >= 0; i--) {
                if (!sectionElements[i]) continue;
                const rect = sectionElements[i].getBoundingClientRect();
                if (rect.top <= 100) { 
                    activeLink = outlineLinks[i]; 
                    break;
                }
            }
            // Default to the first link if we are at the very top of the page
            if (!activeLink && window.scrollY < 100 && outlineLinks.length > 0) { 
                activeLink = outlineLinks[0]; 
            }

            outlineLinks.forEach(link => {
                if (link) link.classList.remove('active');
            });

            if (activeLink) {
                activeLink.classList.add('active');
            }
        }

        window.addEventListener('scroll', highlightOutlineLink);
        document.addEventListener('DOMContentLoaded', highlightOutlineLink); 


        // Function to standardize number input (returns float)
        function standardizeFloat(value) {
            if (typeof value !== 'string') value = String(value);
            // Replace comma as decimal point and remove non-numeric characters except '.' and '-'
            value = value.trim().replace(',', '.').replace(/[^\d.-]/g, ''); 
            const parsedValue = parseFloat(value);
            return isNaN(parsedValue) ? 0 : parsedValue;
        }

        function checkAnswer(id, expected, tolerance = 0.01) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            const inputFloat = standardizeFloat(rawValue);
            const expectedFloat = standardizeFloat(String(expected));
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            const isCorrect = Math.abs(inputFloat - expectedFloat) < tolerance;

            input.classList.remove('correct-answer', 'incorrect-answer');
            
            if (isCorrect) {
                input.classList.add('correct-answer');
                return 1;
            } else {
                input.classList.add('incorrect-answer');
                return 0;
            }
        }

        /**
         * Submits the quiz and calculates the score.
         * @param {boolean} isLanguageToggle - True if called only to refresh results language.
         */
        document.getElementById('measurement-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false);
        });

        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 4; 
            const resultsDiv = document.getElementById('results');
            
            // --- Expected Calculations ---
            const PI = 3.14;
            
            // 1. Conversion: 1500 m to km. 1500 / 1000 = 1.5
            const ans_a1 = 1.5; 
            
            // 2. Perimeter: P = 2(l + w) = 2(18 + 12) = 2(30) = 60
            const ans_a2 = 60;

            // 3. Circumference (d=18): C = PI * d = 3.14 * 18 = 56.52
            const ans_b1 = 56.52;
            
            // 4. Circumference (r=5): C = 2 * PI * r = 2 * 3.14 * 5 = 31.4
            const ans_b2 = 31.4;


            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1', ans_a1, 0.01); 
                correctCount += checkAnswer('qa2', ans_a2, 0.01);
                correctCount += checkAnswer('qb1', ans_b1, 0.02); // Higher tolerance for PI calculation
                correctCount += checkAnswer('qb2', ans_b2, 0.01);
                
                // Store the current score to maintain state across language toggles
                resultsDiv.setAttribute('data-current-score', correctCount);
            } else {
                 // If it's a language toggle, retrieve the score
                 correctCount = parseInt(resultsDiv.getAttribute('data-current-score')) || 0;
            }

            // --- Display results ---
            const percentage = ((correctCount / totalQuestions) * 100).toFixed(0);
            const overallScore = `${correctCount}/${totalQuestions}`;
            
            // Determine the message based on current language
            const resultMessage = translations[currentLang];

            // Reset background for results box
            resultsDiv.classList.remove('bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800', 'bg-red-100', 'text-red-800', 'bg-green-600', 'text-white');

            let message;
            if (correctCount === totalQuestions) {
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalQuestions * 0.5) { // 50% threshold for "good"
                message = resultMessage.quiz_result_good(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-100', 'text-green-800');
            } else {
                message = resultMessage.quiz_result_fail(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-yellow-100', 'text-yellow-800');
            }

            resultsDiv.innerHTML = `<p class="text-xl font-bold mb-2">${currentLang === 'en' ? 'Your Score' : 'Iyong Iskor'}: ${overallScore} (${percentage}%)</p>` + `<p class="text-lg">${message}</p>`;
            resultsDiv.classList.remove('hidden');

            if (!isLanguageToggle) {
                resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
        
        window.addEventListener('load', () => {
             // Initialize default language (English) and outline highlight on load
             updateLanguage('en');
        });
    </script>
</body>
</html>
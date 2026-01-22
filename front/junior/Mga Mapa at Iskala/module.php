<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Maps and Scale</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        /* Base styles copied for consistency (Green/Emerald Theme) */
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
        .content-box ul:not(#objectives ul), .content-box ol { 
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
        #objectives ul li { 
            font-size: 1.25rem; /* 20px */
            margin-bottom: 0.5rem; /* Added small margin for breathing room */
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
            text-align: center; 
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Maps (Directions and Compass)</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Scale (Calculating Actual Distance)</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Maps and Scale</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Studying Map Reading, Direction Identification, and Calculating Distance using Scale.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Create and explain a map according to the <b>Scale</b>.</li>
                        <li data-i18n="obj_2">Read <b>Directions</b> (Cardinal and Intercardinal) and use the <b>Compass</b>.</li>
                        <li data-i18n="obj_3">Calculate the <b>Actual Distance</b> between places based on the given scale.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Maps (Directions and Compass) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Maps (Directions and Compass)</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">A <b>Map</b> is a reduced representation of a large area, showing the shape and location of different places. </p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Cardinal Directions</h3>
                                                        <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin1_l1"><b>North (N) / Hilaga (H)</b>: Usually at the top of the map.</li>
                                <li data-i18n="aralin1_l2"><b>South (S) / Timog (T)</b>: Opposite of North (bottom).</li>
                                <li data-i18n="aralin1_l3"><b>East (E) / Silangan (S)</b>: Where the sun rises (right).</li>
                                <li data-i18n="aralin1_l4"><b>West (W) / Kanluran (K)</b>: Where the sun sets (left).</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Intercardinal Directions</h3>
                            <p data-i18n="aralin1_p2">These are the directions between the main (cardinal) directions:</p>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin1_l5"><b>Northeast (NE) / Hilagang Silangan (HS)</b></li>
                                <li data-i18n="aralin1_l6"><b>Southeast (SE) / Timog Silangan (TS)</b></li>
                                <li data-i18n="aralin1_l7"><b>Northwest (NW) / Hilagang Kanluran (HK)</b></li>
                                <li data-i18n="aralin1_l8"><b>Southwest (SW) / Timog Kanluran (TK)</b></li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Using a Compass</h3>
                            <p data-i18n="aralin1_p3">A <b>Compass</b> is used to accurately determine direction. Its needle always points to the <b>magnetic north pole (North)</b>, which is the basis for finding other directions. </p>
                        </div>
                    </details>

                    <!-- ARALIN 2: Scale (Calculating Actual Distance) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Scale (Calculating Actual Distance)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">The <b>Scale</b> is the ratio between the measurement on a drawing/map and the actual measurement in the real world. It is used to reduce or enlarge the representation of an object. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Scale Formula</h3>
                            <p data-i18n="aralin2_p2">Scale is usually shown as <b>"Drawing Unit : Actual Unit"</b>. For example, 1 inch on the drawing is equivalent to 4 feet in actual measurement (1 inch : 4 feet).</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">EXAMPLE 1: Calculating Map Distance</p>
                                <p data-i18n="aralin2_ex1_p1">Scale: 1 broken line = 30 kilometers. If the route has 8 broken lines:</p>
                                <p class="math-formula" data-i18n="aralin2_ex1_solution1">8 broken lines x 30 km/line = <b>240 kilometers</b></p>
                            </div>
                                <br>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_title">EXAMPLE 2: Actual Measurement from Floor Plan</p>
                                <p data-i18n="aralin2_ex2_p1">Scale: 1 inch : 4 feet.</p>
                                <p data-i18n="aralin2_ex2_p2">A bed measures 3 inches long in the drawing. What is its actual length?</p>
                                <p class="math-formula" data-i18n="aralin2_ex2_solution1">Actual Length = 3 inches x 4 feet/inch = <b>12 feet</b></p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Steps for Drawing Based on Scale</h3>
                                                        <ol class="list-decimal list-inside ml-4 space-y-1">
                                <li data-i18n="aralin2_l1">Determine the <b>actual</b> measurement of the object/place.</li>
                                <li data-i18n="aralin2_l2">Choose a <b>scale</b> (e.g., 1 cm : 10 km).</li>
                                <li data-i18n="aralin2_l3">Use the ratio to convert the actual measurement to the drawing measurement.</li>
                                <li data-i18n="aralin2_l4">Draw the final output.</li>
                            </ol>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the following questions. (Total: 5 Questions)</p>

                    <form id="map-scale-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Directions and Scale (5 Items)</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. What cardinal direction is opposite of <b>East</b>?</label>
                                    <input type="text" id="qa1" class="quiz-input" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (One Word)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. Scale: 1 inch = 4 feet. What is the actual width (feet) of a cabinet that measures 1/2 inch in the drawing?</label>
                                    <input type="text" id="qa2" class="quiz-input" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (feet)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. Map scale: 1 broken line = 30 km. How many km is 8 broken lines?</label>
                                    <input type="text" id="qa3" class="quiz-input" data-i18n-placeholder="qa3_placeholder" placeholder="Answer (km)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. If a room has an actual width of 10 meters and the scale used is 1 cm : 2 m. How many cm is the room's measurement in the drawing?</label>
                                    <input type="text" id="qa4" class="quiz-input" data-i18n-placeholder="qa4_placeholder" placeholder="Answer (cm)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">5. What intercardinal direction is between North and East?</label>
                                    <input type="text" id="qa5" class="quiz-input" data-i18n-placeholder="qa5_placeholder" placeholder="Answer (e.g., NE)">
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit-map-scale-quiz" class="w-[70%] mx-auto block accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
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
                outline_aralin1: "Lesson 1: Maps (Directions and Compass)",
                outline_aralin2: "Lesson 2: Scale (Calculating Actual Distance)",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Maps and Scale",
                h1_subtitle: "Studying Map Reading, Direction Identification, and Calculating Distance using Scale.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Create and explain a map according to the <b>Scale</b>.",
                obj_2: "Read <b>Directions</b> (Cardinal and Intercardinal) and use the <b>Compass</b>.",
                obj_3: "Calculate the <b>Actual Distance</b> between places based on the given scale.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Maps (Directions and Compass)",
                aralin1_p1: "A <b>Map</b> is a reduced representation of a large area, showing the shape and location of different places. ",
                aralin1_h3_1: "Cardinal Directions",
                aralin1_l1: "<b>North (N) / Hilaga (H)</b>: Usually at the top of the map.",
                aralin1_l2: "<b>South (S) / Timog (T)</b>: Opposite of North (bottom).",
                aralin1_l3: "<b>East (E) / Silangan (S)</b>: Where the sun rises (right).",
                aralin1_l4: "<b>West (W) / Kanluran (K)</b>: Where the sun sets (left).",
                aralin1_h3_2: "Intercardinal Directions",
                aralin1_p2: "These are the directions between the main (cardinal) directions:",
                aralin1_l5: "<b>Northeast (NE) / Hilagang Silangan (HS)</b>",
                aralin1_l6: "<b>Southeast (SE) / Timog Silangan (TS)</b>",
                aralin1_l7: "<b>Northwest (NW) / Hilagang Kanluran (HK)</b>",
                aralin1_l8: "<b>Southwest (SW) / Timog Kanluran (TK)</b>",
                aralin1_h3_3: "Using a Compass",
                aralin1_p3: "A <b>Compass</b> is used to accurately determine direction. Its needle always points to the <b>magnetic north pole (North)</b>, which is the basis for finding other directions. ",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Scale (Calculating Actual Distance)",
                aralin2_p1: "The <b>Scale</b> is the ratio between the measurement on a drawing/map and the actual measurement in the real world. It is used to reduce or enlarge the representation of an object. ",
                aralin2_h3_1: "Scale Formula",
                aralin2_p2: "Scale is usually shown as <b>\"Drawing Unit : Actual Unit\"</b>. For example, 1 inch on the drawing is equivalent to 4 feet in actual measurement (1 inch : 4 feet).",
                aralin2_ex1_title: "EXAMPLE 1: Calculating Map Distance",
                aralin2_ex1_p1: "Scale: 1 broken line = 30 kilometers. If the route has 8 broken lines:",
                aralin2_ex1_solution1: "8 broken lines x 30 km/line = <b>240 kilometers</b>",
                aralin2_ex2_title: "EXAMPLE 2: Actual Measurement from Floor Plan",
                aralin2_ex2_p1: "Scale: 1 inch : 4 feet.",
                aralin2_ex2_p2: "A bed measures 3 inches long in the drawing. What is its actual length?",
                aralin2_ex2_solution1: "Actual Length = 3 inches x 4 feet/inch = <b>12 feet</b>",
                aralin2_h3_2: "Steps for Drawing Based on Scale",
                aralin2_l1: "Determine the <b>actual</b> measurement of the object/place.",
                aralin2_l2: "Choose a <b>scale</b> (e.g., 1 cm : 10 km).",
                aralin2_l3: "Use the ratio to convert the actual measurement to the drawing measurement.",
                aralin2_l4: "Draw the final output.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Answer the following questions. (Total: 5 Questions)",
                quiz_section1_title: "A. Directions and Scale (5 Items)",
                qa1_label: "1. What cardinal direction is opposite of <b>East</b>?",
                qa1_placeholder: "Answer (One Word)",
                qa2_label: "2. Scale: 1 inch = 4 feet. What is the actual width (feet) of a cabinet that measures 1/2 inch in the drawing?",
                qa2_placeholder: "Answer (feet)",
                qa3_label: "3. Map scale: 1 broken line = 30 km. How many km is 8 broken lines?",
                qa3_placeholder: "Answer (km)",
                qa4_label: "4. If a room has an actual width of 10 meters and the scale used is 1 cm : 2 m. How many cm is the room's measurement in the drawing?",
                qa4_placeholder: "Answer (cm)",
                qa5_label: "5. What intercardinal direction is between North and East?",
                qa5_placeholder: "Answer (e.g., NE)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You know how to use maps and scale!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review directions or the scale calculation.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the lesson on Scale.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Mga Mapa (Direksyon at Kompas)",
                outline_aralin2: "Aralin 2: Mga Iskala (Pagkalkula ng Aktwal na Distansya)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Mga Mapa at Iskala",
                h1_subtitle: "Pag-aaral ng Pagbasa ng Mapa, Pagtukoy ng Direksyon, at Pagkalkula ng Distansya gamit ang Iskala.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Bumuo at magpaliwanag ng mapa ayon sa <b>Iskala (Scale)</b>.",
                obj_2: "Magbasa ng mga <b>Direksyon</b> (Cardinal at Intercardinal) at gamitin ang <b>Kompas</b>.",
                obj_3: "Kalkulahin ang <b>Aktwal na Distansya</b> sa pagitan ng mga lugar batay sa ibinigay na iskala.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Mga Mapa (Direksyon at Kompas)",
                aralin1_p1: "Ang <b>Mapa</b> ay isang representasyon ng malaking lugar na pinaliit, nagpapakita ng hugis at lokasyon ng iba't ibang lugar. ",
                aralin1_h3_1: "Pangunahing Direksyon (Cardinal)",
                aralin1_l1: "<b>Hilaga (H) / North (N)</b>: Karaniwang nasa itaas ng mapa.",
                aralin1_l2: "<b>Timog (T) / South (S)</b>: Kasalungat ng Hilaga (ibaba).",
                aralin1_l3: "<b>Silangan (S) / East (E)</b>: Kung saan sumisikat ang araw (kanan).",
                aralin1_l4: "<b>Kanluran (K) / West (W)</b>: Kung saan lumulubog ang araw (kaliwa).",
                aralin1_h3_2: "Sekundaryang Direksyon (Intercardinal)",
                aralin1_p2: "Ang mga direksyon sa pagitan ng mga pangunahing direksyon:",
                aralin1_l5: "<b>Hilagang Silangan (HS / NE)</b>",
                aralin1_l6: "<b>Timog Silangan (TS / SE)</b>",
                aralin1_l7: "<b>Hilagang Kanluran (HK / NW)</b>",
                aralin1_l8: "<b>Timog Kanluran (TK / SW)</b>",
                aralin1_h3_3: "Paggamit ng Kompas",
                aralin1_p3: "Ang <b>Kompas</b> ay ginagamit para tumpak na matukoy ang direksyon. Ang karayom nito ay laging nakaturo sa <b>magnetic north pole (Hilaga)</b>, na siyang basehan sa paghahanap ng iba pang direksyon. ",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Mga Iskala (Pagkalkula ng Aktwal na Distansya)",
                aralin2_p1: "Ang <b>Iskala (Scale)</b> ay ang ratio (sukat) sa pagitan ng sukat sa drawing/mapa at ng aktwal na sukat sa mundo. Ginagamit ito para paliitin o palakihin ang representasyon ng isang bagay. ",
                aralin2_h3_1: "Pormula ng Iskala",
                aralin2_p2: "Iskala ay karaniwang ipinapakita bilang <b>\"Drawing Unit : Actual Unit\"</b>. Halimbawa, 1 pulgada sa drawing ay katumbas ng 4 piye sa aktwal na sukat (1 pulgada : 4 piye).",
                aralin2_ex1_title: "HALIMBAWA 1: Pagkalkula ng Map Distance",
                aralin2_ex1_p1: "Iskala: 1 putol na linya = 30 kilometro. Kung ang ruta ay may 8 putol na linya:",
                aralin2_ex1_solution1: "8 putol na linya x 30 km/putol = <b>240 kilometro</b>",
                aralin2_ex2_title: "HALIMBAWA 2: Aktwal na Sukat Mula sa Floor Plan",
                aralin2_ex2_p1: "Iskala: 1 pulgada : 4 piye.",
                aralin2_ex2_p2: "Ang isang kama ay may sukat sa drawing na 3 pulgada ang haba. Ano ang aktwal na haba nito?",
                aralin2_ex2_solution1: "Aktwal na Haba = 3 pulgada x 4 piye/pulgada = <b>12 piye</b>",
                aralin2_h3_2: "Hakbang sa Pagguhit Ayon sa Iskala",
                aralin2_l1: "Alamin ang <b>aktwal</b> na sukat ng bagay/lugar.",
                aralin2_l2: "Pumili ng <b>iskala</b> (e.g., 1 cm : 10 km).",
                aralin2_l3: "Gamitin ang ratio para i-convert ang aktwal na sukat sa sukat ng drawing.",
                aralin2_l4: "Iguhit ang final output.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang sumusunod na katanungan. (Total: 5 Questions)",
                quiz_section1_title: "A. Direksyon at Iskala (5 Items)",
                qa1_label: "1. Anong pangunahing direksyon ang kasalungat ng <b>Silangan</b>?",
                qa1_placeholder: "Sagot (Isang Salita)",
                qa2_label: "2. Iskala: 1 pulgada = 4 piye. Ano ang aktwal na lapad (piye) ng cabinet na may 1/2 pulgada sa drawing?",
                qa2_placeholder: "Sagot (piye)",
                qa3_label: "3. Map scale: 1 putol na linya = 30 km. Ilang km ang 8 putol na linya?",
                qa3_placeholder: "Sagot (km)",
                qa4_label: "4. Kung ang isang silid ay may aktwal na lapad na 10 metro at ang ginamit na iskala ay 1 cm : 2 m. Ilang cm ang sukat ng silid sa drawing?",
                qa4_placeholder: "Sagot (cm)",
                qa5_label: "5. Anong sekundaryang direksyon ang nasa pagitan ng Hilaga at Silangan?",
                qa5_placeholder: "Sagot (e.g., HS)",
                quiz_button: "Tapusin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Alam mo na kung paano gamitin ang mapa at iskala!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang mga direksyon o ang pagkalkula ng iskala.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang aralin tungkol sa Iskala.`,
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
                    element.innerHTML = langData[key];
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
        const sections = ['objectives', 'aralin1', 'aralin2', 'pagsasanay']; 
        
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
            value = value.trim().replace(',', '.').replace(/[^0-9.-]/g, ''); 
            const parsedValue = parseFloat(value);
            return isNaN(parsedValue) ? 0 : parsedValue;
        }
        
        // Helper function for single word comparison
        function normalizeWord(word) {
            // Allows letters and numbers
            // Modified to allow spaces/slashes for multi-word answers or abbreviations (e.g., NE, HS)
            return word.trim().toLowerCase().replace(/[^a-z0-9]/g, '');
        }
        
        // Helper function to check if two values are approximately equal (useful for Q2 which is 0.5 * 4 = 2)
        function areNumbersEqual(val1, val2, tolerance = 0.01) {
            const num1 = standardizeFloat(String(val1));
            const num2 = standardizeFloat(String(val2));
            return Math.abs(num1 - num2) < tolerance;
        }

        function checkAnswer(id, expected, type = 'number', tolerance = 0.01) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            let isCorrect = false;

            if (type === 'number') {
                isCorrect = areNumbersEqual(rawValue, expected, tolerance);
            } else if (type === 'word') {
                const inputWord = normalizeWord(rawValue);
                // Expected must be an array of acceptable normalized answers (e.g., ['west', 'kanluran', 'k'])
                const expectedNormalized = Array.isArray(expected) ? expected.map(normalizeWord) : [normalizeWord(expected)];
                isCorrect = expectedNormalized.includes(inputWord);
            }

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
        document.getElementById('map-scale-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false);
        });

        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 5; 
            const resultsDiv = document.getElementById('results');

            // --- Expected Calculations and Answers ---
            
            // Q1: Opposite of East is West.
            const ans_q1 = ["west", "kanluran", "k"];
            
            // Q2: 1/2 inch * 4 feet/inch = 2 feet.
            const ans_q2 = 2;
            
            // Q3: 8 lines * 30 km/line = 240 km.
            const ans_q3 = 240;

            // Q4: 10 meters / 2 meters/cm = 5 cm.
            const ans_q4 = 5;

            // Q5: Between North and East is Northeast.
            const ans_q5 = ["northeast", "hilagasilangan", "ne", "hs"];


            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1', ans_q1, 'word');
                correctCount += checkAnswer('qa2', ans_q2, 'number', 0.01); 
                correctCount += checkAnswer('qa3', ans_q3, 'number', 0);
                correctCount += checkAnswer('qa4', ans_q4, 'number', 0);
                correctCount += checkAnswer('qa5', ans_q5, 'word');
                
                // Store the current score to maintain state across language toggles
                resultsDiv.setAttribute('data-current-score', correctCount);
            } else {
                 // If it's a language toggle, retrieve the score
                 correctCount = parseInt(resultsDiv.getAttribute('data-current-score')) || 0;
            }


            // --- Display results ---\
            const percentage = ((correctCount / totalQuestions) * 100).toFixed(0);
            const overallScore = `${correctCount}/${totalQuestions}`;
            
            // Determine the message based on current language
            const resultMessage = translations[currentLang];

            // Reset background classes
            resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800');

            let message;
            if (correctCount === totalQuestions) {
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalQuestions * 0.6) {
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
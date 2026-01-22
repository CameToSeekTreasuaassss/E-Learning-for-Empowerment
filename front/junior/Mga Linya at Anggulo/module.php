<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Lines and Angles</title>
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Line Types (Parallel, Intersecting, Perpendicular)</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Angle Identification and Measurement</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Angle Classification (Acute, Right, Obtuse, Straight)</a>
                    <a href="#aralin4" class="outline-link" data-i18n="outline_aralin4">Lesson 4: Pythagorean Theorem (c&sup2; = a&sup2; + b&sup2;)</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Lines and Angles</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Studying Line Relationships, Angle Measurement, and the Pythagorean Theorem.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Identify lines as <b>Parallel</b>, <b>Intersecting</b>, or <b>Perpendicular</b>.</li>
                        <li data-i18n="obj_2">Measure and classify angles (<b>Acute</b>, <b>Right</b>, <b>Obtuse</b>, <b>Straight</b>).</li>
                        <li data-i18n="obj_3">Apply the <b>Pythagorean Theorem</b> (c&sup2; = a&sup2; + b&sup2;) to solve problems.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Mga Linya at mga Intersection -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Line Types (Parallel, Intersecting, Perpendicular)</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">A <b>Line</b> is endless, indicated by arrowheads on both ends. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">1. Parallel Lines</h3>
                            <p data-i18n="aralin1_p2">Pairs of lines that will <b>never meet</b>, no matter how far they are extended. </p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE:</p>
                                <p data-i18n="aralin1_ex1_p1">Opposite sides of a street, railroad tracks, opposite edges of a rectangular table.</p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">2. Intersecting Lines</h3>
                            <p data-i18n="aralin1_p3">Pairs of lines that <b>meet</b> at one point called the <b>Point of Intersection</b>. </p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_title">EXAMPLE:</p>
                                <p data-i18n="aralin1_ex2_p1">Crossroads, the blades of scissors when in use.</p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">3. Perpendicular Lines</h3>
                            <p data-i18n="aralin1_p4">Pairs of intersecting lines that meet and form a perfect <b>Right Angle</b> (<b>90&deg;</b>) at their point of intersection. </p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex3_title">EXAMPLE:</p>
                                <p data-i18n="aralin1_ex3_p1">Corner of a wall and floor, corner of a window or door, flagpole and the ground.</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Pagkilala at Pagsukat ng Anggulo -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Angle Identification and Measurement</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">An <b>Angle</b> is formed when two lines or rays meet at a single point called the <b>Vertex</b>. The lines forming the angle are called <b>Sides</b>. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Measurement and Naming</h3>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin2_l1">The basic unit of angle measure is the <b>Degree</b>, symbolized by <b>&deg;</b>.</li>
                                <li data-i18n="aralin2_l2">A <b>Protractor</b> is used to measure an angle. </li>
                                <li data-i18n="aralin2_l3">An angle is named using <b>three capital letters</b> (where the middle letter is the <b>Vertex</b>), or a single number or letter inside the angle (e.g., &ang;ABC).</li>
                            </ul>
                        </div>
                    </details>

                    <!-- ARALIN 3: Pag-uuri ng mga Anggulo -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Angle Classification (Acute, Right, Obtuse, Straight)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">Angles are classified based on their measure: </p>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin3_l1"><b>Acute Angle</b>: Measures <b>less than 90&deg;</b>. It is a "sharp" or narrow corner. </li>
                                <li data-i18n="aralin3_l2"><b>Right Angle</b>: Measures <b>exactly 90&deg;</b>. It is a perfect "L" shape, often marked with a small square. </li>
                                <li data-i18n="aralin3_l3"><b>Obtuse Angle</b>: Measures <b>more than 90&deg; but less than 180&deg;</b>. It is a wide angle. </li>
                                <li data-i18n="aralin3_l4"><b>Straight Angle</b>: Measures <b>exactly 180&deg;</b>. It forms a straight line. </li>
                            </ul>
                        </div>
                    </details>

                    <!-- ARALIN 4: Pythagorean Theorem -->
                    <details id="aralin4" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin4_title">Lesson 4: Pythagorean Theorem (c&sup2; = a&sup2; + b&sup2;)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin4_p1">The <b>Pythagorean Theorem</b> is used to find the missing side length of a <b>Right Triangle</b> (a triangle with a <b>90&deg;</b> angle). </p>
                            <p data-i18n="aralin4_p2">The side opposite the right angle is called the <b>Hypotenuse (c)</b>, and the other two sides are called <b>Legs (a and b)</b>.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin4_h3_1">Formula</h3>
                            <div class="math-formula" data-i18n="aralin4_formula1">
                                <span>c&sup2; = a&sup2; + b&sup2;</span>
                            </div>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin4_ex1_title">EXAMPLE: Ladder Length</p>
                                <p data-i18n="aralin4_ex1_p1">A ladder leans against a wall (a=12 ft) and its base is 5 ft away from the wall (b=5 ft). What is the length of the ladder (c)?</p>
                                <p class="math-formula" data-i18n="aralin4_ex1_solution1">c&sup2; = 12&sup2; + 5&sup2; = 144 + 25 = 169</p>
                                <p class="math-formula" data-i18n="aralin4_ex1_solution2">c = &radic;169 = <b>13 feet</b></p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the following questions based on Line Relationships and the Pythagorean Theorem. (Total: 10 Questions)</p>

                    <form id="geometry-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Classification and Geometry (1-5)</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. What type of lines form a right angle (90&deg;)?</label>
                                    <input type="text" id="qa1" class="quiz-input" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (One Word)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. What type of angle measures 142&deg;?</label>
                                    <input type="text" id="qa2" class="quiz-input" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (One Word)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. What angle measures exactly 180&deg;?</label>
                                    <input type="text" id="qa3" class="quiz-input" data-i18n-placeholder="qa3_placeholder" placeholder="Answer (One Word)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. In the Pythagorean Theorem, which side is always opposite the 90&deg; angle?</label>
                                    <input type="text" id="qa4" class="quiz-input" data-i18n-placeholder="qa4_placeholder" placeholder="Answer (One Word)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">5. Two lines that will NOT meet are called _____ lines.</label>
                                    <input type="text" id="qa5" class="quiz-input" data-i18n-placeholder="qa5_placeholder" placeholder="Answer (One Word)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Pythagorean Theorem (6-10)</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb6" class="font-medium" data-i18n="qb6_label">6. How many meters did Sally run (hypotenuse, c) if the field was 60 m wide (a) and 80 m long (b)?</label>
                                    <input type="text" id="qb6" class="quiz-input" data-i18n-placeholder="qb6_placeholder" placeholder="Answer (m)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb7" class="font-medium" data-i18n="qb7_label">7. Find the hypotenuse (c) if the two legs (a, b) are 3 cm and 4 cm.</label>
                                    <input type="text" id="qb7" class="quiz-input" data-i18n-placeholder="qb7_placeholder" placeholder="Answer (cm)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb8" class="font-medium" data-i18n="qb8_label">8. If the hypotenuse (c) is 10 ft and one leg (a) is 6 ft, find the length of the other leg (b) in ft.</label>
                                    <input type="text" id="qb8" class="quiz-input" data-i18n-placeholder="qb8_placeholder" placeholder="Answer (ft)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb9" class="font-medium" data-i18n="qb9_label">9. Find the hypotenuse (c) if a = 8 and b = 15.</label>
                                    <input type="text" id="qb9" class="quiz-input" data-i18n-placeholder="qb9_placeholder" placeholder="Answer">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb10" class="font-medium" data-i18n="qb10_label">10. Find the hypotenuse (c) if a = 5 and b = 12.</label>
                                    <input type="text" id="qb10" class="quiz-input" data-i18n-placeholder="qb10_placeholder" placeholder="Answer">
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit-geometry-quiz" class="w-[70%] mx-auto block accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
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
                outline_aralin1: "Lesson 1: Line Types (Parallel, Intersecting, Perpendicular)",
                outline_aralin2: "Lesson 2: Angle Identification and Measurement",
                outline_aralin3: "Lesson 3: Angle Classification (Acute, Right, Obtuse, Straight)",
                outline_aralin4: "Lesson 4: Pythagorean Theorem (c&sup2; = a&sup2; + b&sup2;)",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Lines and Angles",
                h1_subtitle: "Studying Line Relationships, Angle Measurement, and the Pythagorean Theorem.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Identify lines as <b>Parallel</b>, <b>Intersecting</b>, or <b>Perpendicular</b>.",
                obj_2: "Measure and classify angles (<b>Acute</b>, <b>Right</b>, <b>Obtuse</b>, <b>Straight</b>).",
                obj_3: "Apply the <b>Pythagorean Theorem</b> (c&sup2; = a&sup2; + b&sup2;) to solve problems.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Line Types (Parallel, Intersecting, Perpendicular)",
                aralin1_p1: "A <b>Line</b> is endless, indicated by arrowheads on both ends.",
                aralin1_h3_1: "1. Parallel Lines",
                aralin1_p2: "Pairs of lines that will <b>never meet</b>, no matter how far they are extended. ",
                aralin1_ex1_title: "EXAMPLE:",
                aralin1_ex1_p1: "Opposite sides of a street, railroad tracks, opposite edges of a rectangular table.",
                aralin1_h3_2: "2. Intersecting Lines",
                aralin1_p3: "Pairs of lines that <b>meet</b> at one point called the <b>Point of Intersection</b>. ",
                aralin1_ex2_title: "EXAMPLE:",
                aralin1_ex2_p1: "Crossroads, the blades of scissors when in use.",
                aralin1_h3_3: "3. Perpendicular Lines",
                aralin1_p4: "Pairs of intersecting lines that meet and form a perfect <b>Right Angle</b> (<b>90&deg;</b>) at their point of intersection. ",
                aralin1_ex3_title: "EXAMPLE:",
                aralin1_ex3_p1: "Corner of a wall and floor, corner of a window or door, flagpole and the ground.",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Angle Identification and Measurement",
                aralin2_p1: "An <b>Angle</b> is formed when two lines or rays meet at a single point called the <b>Vertex</b>. The lines forming the angle are called <b>Sides</b>. ",
                aralin2_h3_1: "Measurement and Naming",
                aralin2_l1: "The basic unit of angle measure is the <b>Degree</b>, symbolized by <b>&deg;</b>.",
                aralin2_l2: "A <b>Protractor</b> is used to measure an angle. ",
                aralin2_l3: "An angle is named using <b>three capital letters</b> (where the middle letter is the <b>Vertex</b>), or a single number or letter inside the angle (e.g., &ang;ABC).",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Angle Classification (Acute, Right, Obtuse, Straight)",
                aralin3_p1: "Angles are classified based on their measure: ",
                aralin3_l1: "<b>Acute Angle</b>: Measures <b>less than 90&deg;</b>. It is a 'sharp' or narrow corner. ",
                aralin3_l2: "<b>Right Angle</b>: Measures <b>exactly 90&deg;</b>. It is a perfect 'L' shape, often marked with a small square. ",
                aralin3_l3: "<b>Obtuse Angle</b>: Measures <b>more than 90&deg; but less than 180&deg;</b>. It is a wide angle. ",
                aralin3_l4: "<b>Straight Angle</b>: Measures <b>exactly 180&deg;</b>. It forms a straight line. ",

                // Lesson 4 Content
                aralin4_title: "Lesson 4: Pythagorean Theorem (c&sup2; = a&sup2; + b&sup2;)",
                aralin4_p1: "The <b>Pythagorean Theorem</b> is used to find the missing side length of a <b>Right Triangle</b> (a triangle with a <b>90&deg;</b> angle). ",
                aralin4_p2: "The side opposite the right angle is called the <b>Hypotenuse (c)</b>, and the other two sides are called <b>Legs (a and b)</b>.",
                aralin4_h3_1: "Formula",
                aralin4_formula1: "c&sup2; = a&sup2; + b&sup2;",
                aralin4_ex1_title: "EXAMPLE: Ladder Length",
                aralin4_ex1_p1: "A ladder leans against a wall (a=12 ft) and its base is 5 ft away from the wall (b=5 ft). What is the length of the ladder (c)?",
                aralin4_ex1_solution1: "c&sup2; = 12&sup2; + 5&sup2; = 144 + 25 = 169",
                aralin4_ex1_solution2: "c = &radic;169 = <b>13 feet</b>",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Answer the following questions based on Line Relationships and the Pythagorean Theorem. (Total: 10 Questions)",
                quiz_section1_title: "A. Classification and Geometry (1-5)",
                qa1_label: "1. What type of lines form a right angle (90&deg;)?",
                qa1_placeholder: "Answer (One Word)",
                qa2_label: "2. What type of angle measures 142&deg;?",
                qa2_placeholder: "Answer (One Word)",
                qa3_label: "3. What angle measures exactly 180&deg;?",
                qa3_placeholder: "Answer (One Word)",
                qa4_label: "4. In the Pythagorean Theorem, which side is always opposite the 90&deg; angle?",
                qa4_placeholder: "Answer (One Word)",
                qa5_label: "5. Two lines that will NOT meet are called _____ lines.",
                qa5_placeholder: "Answer (One Word)",

                quiz_section2_title: "B. Pythagorean Theorem (6-10)",
                qb6_label: "6. How many meters did Sally run (hypotenuse, c) if the field was 60 m wide (a) and 80 m long (b)?",
                qb6_placeholder: "Answer (m)",
                qb7_label: "7. Find the hypotenuse (c) if the two legs (a, b) are 3 cm and 4 cm.",
                qb7_placeholder: "Answer (cm)",
                qb8_label: "8. If the hypotenuse (c) is 10 ft and one leg (a) is 6 ft, find the length of the other leg (b) in ft.",
                qb8_placeholder: "Answer (ft)",
                qb9_label: "9. Find the hypotenuse (c) if a = 8 and b = 15.",
                qb9_placeholder: "Answer",
                qb10_label: "10. Find the hypotenuse (c) if a = 5 and b = 12.",
                qb10_placeholder: "Answer",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You are ready for more complex geometry!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the lessons on angles and the Pythagorean theorem where you made errors.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the entire module, especially line classification and the Pythagorean formula.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Mga Uri ng Linya (Parallel, Intersecting, Perpendicular)",
                outline_aralin2: "Aralin 2: Pagkilala at Pagsukat ng Anggulo",
                outline_aralin3: "Aralin 3: Pag-uuri ng mga Anggulo (Acute, Right, Obtuse, Straight)",
                outline_aralin4: "Aralin 4: Pythagorean Theorem (c&sup2; = a&sup2; + b&sup2;)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Mga Linya at Anggulo",
                h1_subtitle: "Pag-aaral ng Line Relationships, Angle Measurement, at Pythagorean Theorem.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Kilalanin ang mga linya bilang <b>Parallel</b>, <b>Intersecting</b>, o <b>Perpendicular</b>.",
                obj_2: "Sukatin at i-uri ang mga anggulo (<b>Acute</b>, <b>Right</b>, <b>Obtuse</b>, <b>Straight</b>).",
                obj_3: "Gamitin ang <b>Pythagorean Theorem</b> (c&sup2; = a&sup2; + b&sup2;) sa paglutas ng problema.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Mga Uri ng Linya (Parallel, Intersecting, Perpendicular)",
                aralin1_p1: "Ang <b>Linya (Line)</b> ay walang katapusan, ipinapakita ng mga hugis-pana (arrowhead) sa magkabilang dulo.",
                aralin1_h3_1: "1. Parallel Lines",
                aralin1_p2: "Mga pares ng linya na kailanman <b>hindi magtatagpo</b> kahit gaano man kahaba iunat. ",
                aralin1_ex1_title: "HALIMBAWA:",
                aralin1_ex1_p1: "Magkabilang gilid ng lansangan, riles ng tren, magkabilang gilid ng isang parihabang mesa.",
                aralin1_h3_2: "2. Intersecting Lines",
                aralin1_p3: "Mga pares ng linya na <b>nagtatagpo</b> sa isang tuldok na tinatawag na <b>Point of Intersection</b>. ",
                aralin1_ex2_title: "HALIMBAWA:",
                aralin1_ex2_p1: "Daang nagkikrus (crossroads), kamay ng gunting kapag ginagamit.",
                aralin1_h3_3: "3. Perpendicular Lines",
                aralin1_p4: "Mga pares ng intersecting lines na nagtatagpo at bumubuo ng perpektong <b>Right Angle</b> (<b>90&deg;</b>) sa kanilang point of intersection. ",
                aralin1_ex3_title: "HALIMBAWA:",
                aralin1_ex3_p1: "Sulok ng pader at sahig, sulok ng bintana o pintuan, tagdan ng bandila at lupa.",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Pagkilala at Pagsukat ng Anggulo",
                aralin2_p1: "Ang <b>Anggulo (Angle)</b> ay nabubuo kapag nagtagpo ang dalawang linya o ray sa iisang tuldok na tinatawag na <b>Vertex</b> o <b>Taluktok</b>. Ang mga linya na bumubuo sa anggulo ay tinatawag na mga <b>Gilid</b>. ",
                aralin2_h3_1: "Pagsukat at Pagpangalan",
                aralin2_l1: "Ang batayang sukat ng anggulo ay ang <b>Digri (Degree)</b>, na sinisimbolo ng <b>&deg;</b>.",
                aralin2_l2: "Ginagamit ang <b>Protractor</b> para sukatin ang anggulo. ",
                aralin2_l3: "Pinapangalanan ang anggulo gamit ang <b>tatlong malalaking titik</b> (kung saan ang gitnang titik ang <b>Vertex</b>), o kaya naman ay isang numero o letra sa loob ng anggulo (e.g., &ang;ABC).",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Pag-uuri ng mga Anggulo (Acute, Right, Obtuse, Straight)",
                aralin3_p1: "Inuuri ang mga anggulo batay sa kanilang sukat: ",
                aralin3_l1: "<b>Acute Angle</b>: May sukat na <b>kulang sa 90&deg;</b>. Ito ay \"matulis\" o makipot. ",
                aralin3_l2: "<b>Right Angle</b>: May sukat na <b>eksaktong 90&deg;</b>. Ito ay perpektong \"L\" shape. ",
                aralin3_l3: "<b>Obtuse Angle</b>: May sukat na <b>higit sa 90&deg; pero kulang sa 180&deg;</b>. Ito ay malawak. ",
                aralin3_l4: "<b>Straight Angle</b>: May sukat na <b>eksaktong 180&deg;</b>. Bumubuo ito ng tuwid na linya. ",

                // Lesson 4 Content
                aralin4_title: "Aralin 4: Pythagorean Theorem (c&sup2; = a&sup2; + b&sup2;)",
                aralin4_p1: "Ang <b>Pythagorean Theorem</b> ay ginagamit upang hanapin ang nawawalang haba ng gilid sa isang <b>Right Triangle</b> (tatsulok na may <b>90&deg;</b> na anggulo). ",
                aralin4_p2: "Ang gilid na katapat ng right angle ay tinatawag na <b>Hypotenuse (c)</b>, at ang dalawa pang gilid ay tinatawag na mga <b>Paa (a at b)</b>.",
                aralin4_h3_1: "Formula",
                aralin4_formula1: "c&sup2; = a&sup2; + b&sup2;",
                aralin4_ex1_title: "HALIMBAWA: Haba ng Hagdanan",
                aralin4_ex1_p1: "Ang hagdanan ay nakasandal sa pader (a=12 ft) at ang paanan nito ay 5 ft ang layo (b=5 ft). Ano ang haba ng hagdanan (c)?",
                aralin4_ex1_solution1: "c&sup2; = 12&sup2; + 5&sup2; = 144 + 25 = 169",
                aralin4_ex1_solution2: "c = &radic;169 = <b>13 talampakan</b>",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang sumusunod na katanungan batay sa Line Relationships at Pythagorean Theorem. (Total: 10 Questions)",
                quiz_section1_title: "A. Classification at Geometry (1-5)",
                qa1_label: "1. Anong uri ng linya ang bumubuo ng right angle (90&deg;)?",
                qa1_placeholder: "Sagot (Isang Salita)",
                qa2_label: "2. Anong uri ng anggulo ang may sukat na 142&deg;?",
                qa2_placeholder: "Sagot (Isang Salita)",
                qa3_label: "3. Anong anggulo ang may sukat na eksaktong 180&deg;?",
                qa3_placeholder: "Sagot (Isang Salita)",
                qa4_label: "4. Sa Pythagorean Theorem, anong gilid ang palaging katapat ng 90&deg; na anggulo?",
                qa4_placeholder: "Sagot (Isang Salita)",
                qa5_label: "5. Ang dalawang linya na HINDI magtatagpo ay tinatawag na _____ lines.",
                qa5_placeholder: "Sagot (Isang Salita)",

                quiz_section2_title: "B. Pythagorean Theorem (6-10)",
                qb6_label: "6. Ilang metro ang tinakbo ni Sally (hypotenuse, c) kung ang parang ay 60 m lapad (a) at 80 m haba (b)?",
                qb6_placeholder: "Sagot (m)",
                qb7_label: "7. Hanapin ang hypotenuse (c) kung ang dalawang paa (a, b) ay 3 cm at 4 cm.",
                qb7_placeholder: "Sagot (cm)",
                qb8_label: "8. Kung ang hypotenuse (c) ay 10 ft at ang isang paa (a) ay 6 ft, hanapin ang haba ng kabilang paa (b) sa ft.",
                qb8_placeholder: "Sagot (ft)",
                qb9_label: "9. Hanapin ang hypotenuse (c) kung a = 8 at b = 15.",
                qb9_placeholder: "Sagot",
                qb10_label: "10. Hanapin ang hypotenuse (c) kung a = 5 at b = 12.",
                qb10_placeholder: "Sagot",
                quiz_button: "Tapusin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Handa ka na para sa mas kumplikadong geometry!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga aralin sa mga anggulo at Pythagorean theorem na nagkamali ka.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Pag-aralan ulit ang buong modyul, lalo na ang pag-uuri ng mga linya at ang formula ng Pythagorean.`,
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
        const sections = ['objectives', 'aralin1', 'aralin2', 'aralin3', 'aralin4', 'pagsasanay']; 
        
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
            return word.trim().toLowerCase().replace(/[^a-z]/g, '');
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
                const inputFloat = standardizeFloat(rawValue);
                const expectedFloat = standardizeFloat(String(expected));
                isCorrect = Math.abs(inputFloat - expectedFloat) < tolerance;
            } else if (type === 'word') {
                const inputWord = normalizeWord(rawValue);
                // Allow multiple correct spellings for certain words
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
        document.getElementById('geometry-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false);
        });

        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 10; 
            const resultsDiv = document.getElementById('results');

            // --- Expected Calculations (Numbers) ---
            // Q6: c^2 = 60^2 + 80^2 = 3600 + 6400 = 10000. c = 100
            const ans_b6 = 100;
            // Q7: c^2 = 3^2 + 4^2 = 9 + 16 = 25. c = 5
            const ans_b7 = 5;
            // Q8: 10^2 = 6^2 + b^2 -> 100 = 36 + b^2 -> b^2 = 64. b = 8
            const ans_b8 = 8;
            // Q9: c^2 = 8^2 + 15^2 = 64 + 225 = 289. c = 17
            const ans_b9 = 17;
            // Q10: c^2 = 5^2 + 12^2 = 25 + 144 = 169. c = 13
            const ans_b10 = 13;
            
            // --- Expected Answers (Words/Classification) ---
            const ans_a1 = ["perpendicular"];
            const ans_a2 = ["obtuse"];
            const ans_a3 = ["straight"];
            const ans_a4 = ["hypotenuse"];
            const ans_a5 = ["parallel"];


            if (!isLanguageToggle) {
                // --- Check Answers ---
                // Words
                correctCount += checkAnswer('qa1', ans_a1, 'word');
                correctCount += checkAnswer('qa2', ans_a2, 'word');
                correctCount += checkAnswer('qa3', ans_a3, 'word');
                correctCount += checkAnswer('qa4', ans_a4, 'word');
                correctCount += checkAnswer('qa5', ans_a5, 'word');
                
                // Numbers
                correctCount += checkAnswer('qb6', ans_b6, 'number', 0);
                correctCount += checkAnswer('qb7', ans_b7, 'number', 0);
                correctCount += checkAnswer('qb8', ans_b8, 'number', 0);
                correctCount += checkAnswer('qb9', ans_b9, 'number', 0);
                correctCount += checkAnswer('qb10', ans_b10, 'number', 0);
                
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
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalQuestions * 0.7) {
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
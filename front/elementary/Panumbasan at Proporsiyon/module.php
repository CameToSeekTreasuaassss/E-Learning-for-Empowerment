<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Ratio and Proportion</title>
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
        
        /* --- ADDED CUSTOM STYLE FOR MAIN H1 TITLE (50px) --- */
        .main-title-h1 {
            font-size: 50px; /* 50px */
            line-height: 1.1;
        }
        /* --- END ADDED CUSTOM STYLE --- */

        /* --- TEXT SIZE AND SPACING (Consistent with previous module - 20px) --- */
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
        
        /* Quiz and Outline Text Size */
        /* Explicitly set Objectives list items to 20px (1.25rem) */
        #objectives ul li {
            font-size: 1.25rem; 
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
        /* Increased desktop width for better input visibility */
        @media (min-width: 640px) {
            .quiz-input {
                width: 12rem; /* 48 = 12rem (standardized width) */
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
        
        /* Table Styles (Updated to Green Theme) */
        .module-table {
            border-collapse: collapse;
            border: 2px solid #059669; /* Green 600 */
            border-radius: 0.5rem;
            overflow: hidden;
            margin-bottom: 2rem;
        }
        .module-table th {
            background-color: #059669; /* Green 600 */
            color: white;
            padding: 0.75rem;
            font-size: 1.1rem;
            font-weight: 700;
            border: 1px solid #047857;
        }
        .module-table td {
            padding: 0.75rem;
            border: 1px solid #a7f3d0; /* Green 200 */
            text-align: center;
            font-size: 1.25rem; /* 20px */
        }
        .module-table tbody tr:nth-child(odd) {
            background-color: #f7fee7; /* Lime 50 */
        }
        
        /* Math Display Style (for simple multiplication/division signs) */
        .math-display {
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
        }
         /* ADDED: Sticky container styling for the left nav bar */
        .sticky-container {
            position: sticky;
            top: 1.5rem; /* Adjust this value to control the space above the sticky elements */
        }
    </style>
</head>
<body class="p-4 sm:p-8 lg:p-20">

    <!-- Main Grid Container for Outline and Content -->
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
                    <a href="#objectives" class="outline-link" data-i18n="outline_objectives">Objectives</a>
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Understanding Ratio</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Understanding Proportion</a>
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
                    <!-- UPDATED: Meta Text -->
                    <span class="text-xs font-semibold uppercase tracking-wider text-green-600 bg-green-100 px-3 py-1 rounded-full" data-i18n="meta_text">Advance Elementary Learning Module Sheet</span>
                    <!-- UPDATED: Added main-title-h1 class and font-bold for 50px size -->
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Ratio and Proportion</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Comparing quantities using ratios and solving problems using proportion.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Explain the meaning of <b>ratio</b> and <b>proportion</b>.</li>
                        <li data-i18n="obj_2">Express a ratio in its <b>lowest term</b> and determine the <b>equivalent ratio</b>.</li>
                        <li data-i18n="obj_3">Differentiate between <b>ratio</b> and <b>rate</b>, and solve rate problems.</li>
                        <li data-i18n="obj_4">Solve everyday problems using ratio and proportion.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Pag-aaral Tungkol sa Ratio -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Understanding Ratio</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">A <b>Ratio</b> is the comparison of two quantities of the same type and unit through division. The result is a number without units. It is expressed using a colon (:) or a fraction. </p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Ratio in Lowest Term</h3>
                            <p data-i18n="aralin1_p2">To get the <b>lowest term</b>, divide both numbers by their <b>Greatest Common Factor (GCF)</b>. The ratio is in its lowest term if the GCF of both numbers is 1.</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_q">EXAMPLE: Ratio of 6 Students to 12 Modules (6:12)</p>
                                <p data-i18n="aralin1_ex1_p">The GCF of 6 and 12 is 6.</p>
                                <p class="math-display" data-i18n="aralin1_ex1_math"> 6 &divide; 6 : 12 &divide; 6 = <b>1 : 2</b> </p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Equivalent Ratio</h3>
                            <p data-i18n="aralin1_p3">An <b>Equivalent Ratio</b> describes the same relationship. It can be obtained by multiplying or dividing both numbers by the same non-zero number.</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_q">EXAMPLE: Equivalent Ratios of 1:3</p>
                                <p data-i18n="aralin1_ex2_p">Multiply 1:3 by 2, 3, and 4:</p>
                                <p class="math-display" data-i18n="aralin1_ex2_math1"> 1 &times; 2 : 3 &times; 2 = <b>2 : 6</b> </p>
                                <p class="math-display" data-i18n="aralin1_ex2_math2"> 1 &times; 3 : 3 &times; 3 = <b>3 : 9</b> </p>
                                <p class="math-display" data-i18n="aralin1_ex2_math3"> 1 &times; 4 : 3 &times; 4 = <b>4 : 12</b> </p>
                                <p data-i18n="aralin1_ex2_conclusion">1:3, 2:6, 3:9, and 4:12 are equivalent ratios.</p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Ratio vs. Rate</h3>
                            <p data-i18n="aralin1_p4">When two quantities have <b>different units</b> (e.g., kilometers and hours, or pesos and kilos), the comparison is called a <b>Rate</b>.</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex3_q1">EXAMPLE: Rate (Quantity over Time)</p>
                                <p data-i18n="aralin1_ex3_p1">Rolly typed 300 words in 5 minutes.</p>
                                <p class="math-display" data-i18n="aralin1_ex3_math1"> 300 words &divide; 5 minutes = <b>60 words/minute</b> </p>
                                <p class="font-bold mt-4" data-i18n="aralin1_ex3_q2">EXAMPLE: Rate (Cost over Quantity)</p>
                                <p data-i18n="aralin1_ex3_p2">3 kilos of rice cost ₱60.00.</p>
                                <p class="math-display" data-i18n="aralin1_ex3_math2"> ₱60.00 &divide; 3 kilos = <b>₱20.00/kilo</b> </p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Pag-aaral Tungkol sa Proporsiyon -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Understanding Proportion</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">A <b>Proportion</b> is formed when <b>two equivalent ratios</b> are set equal to each other.</p>
                            <p class="math-display" data-i18n="aralin2_p2_math"> 3 : 5 = 12 : 20 </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Means and Extremes</h3>
                            <p data-i18n="aralin2_p3">The <b>Extremes</b> (first term 'a' and fourth 'd') are the outer numbers. The <b>Means</b> (second term 'b' and third 'c') are the inner numbers. </p>
                            <div class="example-box">
                                <p data-i18n="aralin2_ex1_p">The proportion is true if the product of the means equals the product of the extremes:</p>
                                <p class="math-display" data-i18n="aralin2_ex1_math1"> a &times; d = b &times; c </p>
                                <p data-i18n="aralin2_ex1_p2">For 3 : 5 = 12 : 20:</p>
                                <p class="math-display" data-i18n="aralin2_ex1_math2"> 3 &times; 20 = 5 &times; 12 </p>
                                <p class="math-display" data-i18n="aralin2_ex1_math3"> 60 = 60 (The proportion is true) </p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Finding the Missing Number</h3>
                            <p data-i18n="aralin2_p4">If there is a missing number in the proportion (e.g., 'x'), use the following formulas:</p>
                            
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full text-lg">
                                    <thead>
                                        <tr data-i18n="aralin2_table_header"><th>Situation</th><th>Formula</th><th>Action</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin2_table_row1"><td>x : b = c : d</td><td>x = (b &times; c) &divide; d</td><td>Multiply the Means, divide by the Extreme</td></tr>
                                        <tr data-i18n="aralin2_table_row2"><td>a : x = c : d</td><td>x = (a &times; d) &divide; c</td><td>Multiply the Extremes, divide by the Mean</td></tr>
                                        <tr data-i18n="aralin2_table_row3"><td>a : b = x : d</td><td>x = (a &times; d) &divide; b</td><td>Multiply the Extremes, divide by the Mean</td></tr>
                                        <tr data-i18n="aralin2_table_row4"><td>a : b = c : x</td><td>x = (b &times; c) &divide; a</td><td>Multiply the Means, divide by the Extreme</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_q">EXAMPLE: On a map, 2 cm : 5 km. How many kilometers (x) is 6 cm?</p>
                                <p data-i18n="aralin2_ex2_p1">Proportion: 2 : 5 = 6 : x</p>
                                <p data-i18n="aralin2_ex2_p2">Use the formula for the missing fourth term (x):</p>
                                <p class="math-display" data-i18n="aralin2_ex2_math1"> x = (5 &times; 6) &divide; 2 </p>
                                <p class="math-display" data-i18n="aralin2_ex2_math2"> x = 30 &divide; 2 = <b>15</b> </p>
                                <p class="mt-2" data-i18n="aralin2_ex2_conclusion">The distance is <b>15 kilometers</b>.</p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Test your knowledge of Ratio, Rate, and Proportion.</p>

                    <form id="ratio-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Ratio and Rate (Provide Lowest Term / Rate)</p>
                            <!-- UPDATED: Removed grid and used flex-col space-y-4 for vertical alignment -->
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. Lowest Term: Ratio of 46 : 54 (Answer as A:B)</label>
                                    <input type="text" id="qa1" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa1_placeholder" placeholder="A : B">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. Rate: ₱164.00 for 8 minutes of calls (Cost per minute)</label>
                                    <input type="text" id="qa2" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa2_placeholder" placeholder="Cost">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. Lowest Term: Ratio of 15 : 30 (Answer as A:B)</label>
                                    <input type="text" id="qa3" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa3_placeholder" placeholder="A : B">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. Rate: 220 words in 4 minutes (Words per minute)</label>
                                    <input type="text" id="qa4" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa4_placeholder" placeholder="Words">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Proportion (Find the Missing Number 'x')</p>
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1" class="font-medium" data-i18n="qb1_label">1. x : 600 = 2 : 25 (How many people have TB if there are 600 in the village?)</label>
                                    <input type="text" id="qb1" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qb1_placeholder" placeholder="Number of People (x)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2" class="font-medium" data-i18n="qb2_label">2. 200 : ₱50.00 = 500 : x (Cost of 500 bond papers)</label>
                                    <input type="text" id="qb2" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qb2_placeholder" placeholder="Cost (x)">
                                </div>
                            </div>
                        </div>

                        <!-- UPDATED: Button width and text -->
                        <button type="submit" class="w-[70%] mx-auto block accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
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
                outline_aralin1: "Lesson 1: Understanding Ratio",
                outline_aralin2: "Lesson 2: Understanding Proportion",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Ratio and Proportion",
                h1_subtitle: "Comparing quantities using ratios and solving problems using proportion.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Explain the meaning of <b>ratio</b> and <b>proportion</b>.",
                obj_2: "Express a ratio in its <b>lowest term</b> and determine the <b>equivalent ratio</b>.",
                obj_3: "Differentiate between <b>ratio</b> and <b>rate</b>, and solve rate problems.",
                obj_4: "Solve everyday problems using ratio and proportion.",

                // Lesson 1 Content (Ratio)
                aralin1_title: "Lesson 1: Understanding Ratio",
                aralin1_p1: "A <b>Ratio</b> is the comparison of two quantities of the same type and unit through division. The result is a number without units. It is expressed using a colon (:) or a fraction. ",
                aralin1_h3_1: "Ratio in Lowest Term",
                aralin1_p2: "To get the <b>lowest term</b>, divide both numbers by their <b>Greatest Common Factor (GCF)</b>. The ratio is in its lowest term if the GCF of both numbers is 1.",
                aralin1_ex1_q: "EXAMPLE: Ratio of 6 Students to 12 Modules (6:12)",
                aralin1_ex1_p: "The GCF of 6 and 12 is 6.",
                aralin1_ex1_math: " 6 &divide; 6 : 12 &divide; 6 = <b>1 : 2</b> ",
                aralin1_h3_2: "Equivalent Ratio",
                aralin1_p3: "An <b>Equivalent Ratio</b> describes the same relationship. It can be obtained by multiplying or dividing both numbers by the same non-zero number.",
                aralin1_ex2_q: "EXAMPLE: Equivalent Ratios of 1:3",
                aralin1_ex2_p: "Multiply 1:3 by 2, 3, and 4:",
                aralin1_ex2_math1: " 1 &times; 2 : 3 &times; 2 = <b>2 : 6</b> ",
                aralin1_ex2_math2: " 1 &times; 3 : 3 &times; 3 = <b>3 : 9</b> ",
                aralin1_ex2_math3: " 1 &times; 4 : 3 &times; 4 = <b>4 : 12</b> ",
                aralin1_ex2_conclusion: "1:3, 2:6, 3:9, and 4:12 are equivalent ratios.",
                aralin1_h3_3: "Ratio vs. Rate",
                aralin1_p4: "When two quantities have <b>different units</b> (e.g., kilometers and hours, or pesos and kilos), the comparison is called a <b>Rate</b>.",
                aralin1_ex3_q1: "EXAMPLE: Rate (Quantity over Time)",
                aralin1_ex3_p1: "Rolly typed 300 words in 5 minutes.",
                aralin1_ex3_math1: " 300 words &divide; 5 minutes = <b>60 words/minute</b> ",
                aralin1_ex3_q2: "EXAMPLE: Rate (Cost over Quantity)",
                aralin1_ex3_p2: "3 kilos of rice cost ₱60.00.",
                aralin1_ex3_math2: " ₱60.00 &divide; 3 kilos = <b>₱20.00/kilo</b> ",

                // Lesson 2 Content (Proportion)
                aralin2_title: "Lesson 2: Understanding Proportion",
                aralin2_p1: "A <b>Proportion</b> is formed when <b>two equivalent ratios</b> are set equal to each other.",
                aralin2_p2_math: " 3 : 5 = 12 : 20 ",
                aralin2_h3_1: "Means and Extremes",
                aralin2_p3: "The <b>Extremes</b> (first term 'a' and fourth 'd') are the outer numbers. The <b>Means</b> (second term 'b' and third 'c') are the inner numbers. ",
                aralin2_ex1_p: "The proportion is true if the product of the means equals the product of the extremes:",
                aralin2_ex1_math1: " a &times; d = b &times; c ",
                aralin2_ex1_p2: "For 3 : 5 = 12 : 20:",
                aralin2_ex1_math2: " 3 &times; 20 = 5 &times; 12 ",
                aralin2_ex1_math3: " 60 = 60 (The proportion is true) ",
                aralin2_h3_2: "Finding the Missing Number",
                aralin2_p4: "If there is a missing number in the proportion (e.g., 'x'), use the following formulas:",
                aralin2_table_header: "<th>Situation</th><th>Formula</th><th>Action</th>",
                aralin2_table_row1: "<td>x : b = c : d</td><td>x = (b &times; c) &divide; d</td><td>Multiply the Means, divide by the Extreme</td>",
                aralin2_table_row2: "<td>a : x = c : d</td><td>x = (a &times; d) &divide; c</td><td>Multiply the Extremes, divide by the Mean</td>",
                aralin2_table_row3: "<td>a : b = x : d</td><td>x = (a &times; d) &divide; b</td><td>Multiply the Extremes, divide by the Mean</td>",
                aralin2_table_row4: "<td>a : b = c : x</td><td>x = (b &times; c) &divide; a</td><td>Multiply the Means, divide by the Extreme</td>",
                aralin2_ex2_q: "EXAMPLE: On a map, 2 cm : 5 km. How many kilometers (x) is 6 cm?",
                aralin2_ex2_p1: "Proportion: 2 : 5 = 6 : x",
                aralin2_ex2_p2: "Use the formula for the missing fourth term (x):",
                aralin2_ex2_math1: " x = (5 &times; 6) &divide; 2 ",
                aralin2_ex2_math2: " x = 30 &divide; 2 = <b>15</b> ",
                aralin2_ex2_conclusion: "The distance is <b>15 kilometers</b>.",
                
                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Test your knowledge of Ratio, Rate, and Proportion.",
                quiz_section_a: "A. Ratio and Rate (Provide Lowest Term / Rate)",
                qa1_label: "1. Lowest Term: Ratio of 46 : 54 (Answer as A:B)",
                qa2_label: "2. Rate: ₱164.00 for 8 minutes of calls (Cost per minute)",
                qa3_label: "3. Lowest Term: Ratio of 15 : 30 (Answer as A:B)",
                qa4_label: "4. Rate: 220 words in 4 minutes (Words per minute)",
                qa1_placeholder: "A : B",
                qa2_placeholder: "Cost",
                qa3_placeholder: "A : B",
                qa4_placeholder: "Words",
                quiz_section_b: "B. Proportion (Find the Missing Number 'x')",
                qb1_label: "1. x : 600 = 2 : 25 (How many people have TB if there are 600 in the village?)",
                qb2_label: "2. 200 : ₱50.00 = 500 : x (Cost of 500 bond papers)",
                qb1_placeholder: "Number of People (x)",
                qb2_placeholder: "Cost (x)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered ratio and proportion!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Read Lessons 1 and 2 again.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pag-aaral Tungkol sa Ratio (Panumbasan)",
                outline_aralin2: "Aralin 2: Pag-aaral Tungkol sa Proporsiyon",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Panumbasan at Proporsiyon",
                h1_subtitle: "Pagkumpara ng mga dami gamit ang ratio at paglutas ng problema gamit ang proporsiyon.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ipaliwanag ang ibig sabihin ng <b>ratio</b> at <b>proporsiyon</b>.",
                obj_2: "Gawin ang ratio sa <b>pinakamababang anyo</b> at alamin ang <b>equivalent ratio</b>.",
                obj_3: "Pag-ibahin ang <b>ratio</b> at <b>rate</b>, at lutasin ang mga problema tungkol sa rate.",
                obj_4: "Sagutin ang mga pang-araw-araw na problema gamit ang ratio at proporsiyon.",

                // Lesson 1 Content (Ratio)
                aralin1_title: "Aralin 1: Pag-aaral Tungkol sa Ratio (Panumbasan)",
                aralin1_p1: "Ang <b>Ratio</b> ay ang pagkumpara sa dalawang dami na may parehong uri at yunit sa pamamagitan ng paghahati. Ang resulta ay isang numerong walang yunit. Ipinapahayag ito gamit ang tutuldok (:) o praksiyon. ",
                aralin1_h3_1: "Ratio sa Pinakamababang Anyo",
                aralin1_p2: "Para makuha ang <b>pinakamababang anyo (lowest term)</b>, hatiin ang parehong numero sa kanilang <b>Greatest Common Factor (GCF)</b>. Ang ratio ay nasa pinakamababang anyo kung ang GCF ng parehong numero ay 1.",
                aralin1_ex1_q: "HALIMBAWA: Ratio ng 6 na Mag-aaral sa 12 Modyul (6:12)",
                aralin1_ex1_p: "Ang GCF ng 6 at 12 ay 6.",
                aralin1_ex1_math: " 6 &divide; 6 : 12 &divide; 6 = <b>1 : 2</b> ",
                aralin1_h3_2: "Equivalent Ratio",
                aralin1_p3: "Ang <b>Equivalent Ratio</b> ay naglalarawan ng parehong relasyon. Makukuha ito sa pamamagitan ng pagpaparami o paghahati ng parehong numero sa iisang bilang.",
                aralin1_ex2_q: "HALIMBAWA: Equivalent Ratios ng 1:3",
                aralin1_ex2_p: "I-multiply ang 1:3 ng 2, 3, at 4:",
                aralin1_ex2_math1: " 1 &times; 2 : 3 &times; 2 = <b>2 : 6</b> ",
                aralin1_ex2_math2: " 1 &times; 3 : 3 &times; 3 = <b>3 : 9</b> ",
                aralin1_ex2_math3: " 1 &times; 4 : 3 &times; 4 = <b>4 : 12</b> ",
                aralin1_ex2_conclusion: "Ang 1:3, 2:6, 3:9, at 4:12 ay equivalent ratios.",
                aralin1_h3_3: "Ratio vs. Rate",
                aralin1_p4: "Kapag ang dalawang dami ay may <b>magkaibang yunit</b> (hal. kilometro at oras, o piso at kilo), ang pagkumpara ay tinatawag na <b>Rate</b>.",
                aralin1_ex3_q1: "HALIMBAWA: Rate (Quantity over Time)",
                aralin1_ex3_p1: "Nakapag-type si Rolly ng 300 salita sa 5 minuto.",
                aralin1_ex3_math1: " 300 salita &divide; 5 minuto = <b>60 salita/minuto</b> ",
                aralin1_ex3_q2: "HALIMBAWA: Rate (Cost over Quantity)",
                aralin1_ex3_p2: "Ang 3 kilo ng bigas ay ₱60.00.",
                aralin1_ex3_math2: " ₱60.00 &divide; 3 kilo = <b>₱20.00/kilo</b> ",

                // Lesson 2 Content (Proportion)
                aralin2_title: "Aralin 2: Pag-aaral Tungkol sa Proporsiyon",
                aralin2_p1: "Ang <b>Proporsiyon (Proportion)</b> ay nabubuo kapag ang <b>dalawang equivalent ratio</b> ay pinagpantay.",
                aralin2_p2_math: " 3 : 5 = 12 : 20 ",
                aralin2_h3_1: "Means at Extremes",
                aralin2_p3: "Ang <b>Extremes</b> (unang termino 'a' at ikaapat 'd') ay ang mga panlabas na numero. Ang <b>Means</b> (ikalawang termino 'b' at ikatlo 'c') ay ang mga panloob na numero.",
                aralin2_ex1_p: "Ang proporsiyon ay tama kung ang produkto ng means ay katumbas ng produkto ng extremes:",
                aralin2_ex1_math1: " a &times; d = b &times; c ",
                aralin2_ex1_p2: "Para sa 3 : 5 = 12 : 20:",
                aralin2_ex1_math2: " 3 &times; 20 = 5 &times; 12 ",
                aralin2_ex1_math3: " 60 = 60 (Tama ang proporsiyon) ",
                aralin2_h3_2: "Paghanap sa Nawawalang Numero",
                aralin2_p4: "Kung may nawawalang numero sa proporsiyon (hal. 'x'), gamitin ang mga sumusunod na pormula:",
                aralin2_table_header: "<th>Sitwasyon</th><th>Pormula</th><th>Aksyon</th>",
                aralin2_table_row1: "<td>x : b = c : d</td><td>x = (b &times; c) &divide; d</td><td>Multiply ang Means, i-divide sa Extreme</td>",
                aralin2_table_row2: "<td>a : x = c : d</td><td>x = (a &times; d) &divide; c</td><td>Multiply ang Extremes, i-divide sa Mean</td>",
                aralin2_table_row3: "<td>a : b = x : d</td><td>x = (a &times; d) &divide; b</td><td>Multiply ang Extremes, i-divide sa Mean</td>",
                aralin2_table_row4: "<td>a : b = c : x</td><td>x = (b &times; c) &divide; a</td><td>Multiply ang Means, i-divide sa Extreme</td>",
                aralin2_ex2_q: "HALIMBAWA: Sa mapa, 2 cm : 5 km. Ilang kilometro (x) ang 6 cm?",
                aralin2_ex2_p1: "Proporsiyon: 2 : 5 = 6 : x",
                aralin2_ex2_p2: "Gamitin ang pormula para sa nawawalang ikaapat na termino (x):",
                aralin2_ex2_math1: " x = (5 &times; 6) &divide; 2 ",
                aralin2_ex2_math2: " x = 30 &divide; 2 = <b>15</b> ",
                aralin2_ex2_conclusion: "Ang layo ay <b>15 kilometro</b>.",
                
                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Subukan ang iyong kaalaman sa Ratio, Rate, at Proporsiyon.",
                quiz_section_a: "A. Ratio at Rate (Ibigay ang Pinakamababang Anyo / Rate)",
                qa1_label: "1. Pinakamababang Anyo: Ratio ng 46 : 54 (Ibigay ang sagot bilang A:B)",
                qa2_label: "2. Rate: ₱164.00 para sa 8 minutong tawag (Halaga bawat minuto)",
                qa3_label: "3. Pinakamababang Anyo: Ratio ng 15 : 30 (Ibigay ang sagot bilang A:B)",
                qa4_label: "4. Rate: 220 salita sa 4 na minuto (Salita bawat minuto)",
                qa1_placeholder: "A : B",
                qa2_placeholder: "Halaga",
                qa3_placeholder: "A : B",
                qa4_placeholder: "Salita",
                quiz_section_b: "B. Proporsiyon (Hanapin ang Nawawalang Numero 'x')",
                qb1_label: "1. x : 600 = 2 : 25 (Ilang tao ang may TB kung may 600 sa baryo?)",
                qb2_label: "2. 200 : ₱50.00 = 500 : x (Halaga ng 500 bond paper)",
                qb1_placeholder: "Numero ng Tao (x)",
                qb2_placeholder: "Halaga (x)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang ratio at proporsiyon!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga aralin para sa mga mali mong sagot.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang Aralin 1 at 2.`,
            }
        };

        let currentLang = 'en'; // DEFAULT LANGUAGE IS ENGLISH, as requested

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
                    // Use innerHTML for text that contains <b> tags or <pre> code blocks
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
        }
        
        // --- LANGUAGE TOGGLE EVENT LISTENER ---
        document.getElementById('lang-toggle-btn').addEventListener('click', () => {
            const newLang = currentLang === 'tl' ? 'en' : 'tl';
            updateLanguage(newLang);
        });


        // Function to handle the opening/closing arrow animation
        document.querySelectorAll('details').forEach(detail => {
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
        const sections = [
            'objectives', 
            'aralin1', 
            'aralin2', 
            'pagsasanay'
        ];
        
        const outlineLinks = sections.map(id => document.querySelector(`#outline a[href="#${id}"]`));
        const sectionElements = sections.map(id => document.getElementById(id));

        function highlightOutlineLink() {
            let activeLink = null;
            
            // Find the last section that has scrolled past 100px from the top
            for (let i = 0; i < sectionElements.length; i++) {
                if (!sectionElements[i]) continue;
                
                const rect = sectionElements[i].getBoundingClientRect();
                if (rect.top <= 100) { 
                    activeLink = outlineLinks[i];
                }
            }

            // Ensure the first link is active if at the very top
            if (window.scrollY < 100 && outlineLinks.length > 0 && outlineLinks[0]) {
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
        
        // --- QUIZ LOGIC ---

        // Function to standardize numerical input for float/whole comparison
        function standardizeInput(value, type = 'number') {
            if (typeof value !== 'string') value = String(value);
            // Clean currency symbol and commas
            value = value.trim().replace(/\s/g, '').replace(/,/g, '').replace(/₱/g, ''); 
            
            if (type === 'ratio') {
                // Accepts format X:Y or X/Y and returns X:Y
                const match = value.match(/^(\d+)[/:](\d+)$/);
                if (match) return `${parseInt(match[1])}:${parseInt(match[2])}`;
                return value.toLowerCase(); // If not in A:B format, let it through for case-insensitive comparison
            }
            
            // For general numbers/currency
            value = value.replace(/[^0-9.]/g, ''); 
            const parsedValue = parseFloat(value);
            if (isNaN(parsedValue)) return ''; 
            
            // If the number is meant to be a whole number, we round it.
            if (type === 'whole') {
                return String(Math.round(parsedValue));
            }
            // For general number, fix to 2 decimal places (good for currency/rates)
            return parsedValue.toFixed(2); 
        }

        function checkAnswer(id, expected, type = 'number', tolerance = 0.01) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            let isCorrect = false;

            if (type === 'ratio') {
                // For ratio, we expect the lowest term A:B format
                const standardizedInput = standardizeInput(rawValue, 'ratio');
                const standardizedExpected = standardizeInput(expected, 'ratio');
                isCorrect = standardizedInput === standardizedExpected;
            } else {
                const standardizedInput = parseFloat(standardizeInput(rawValue, type));
                const expectedFloat = parseFloat(standardizeInput(String(expected), type));
                
                // Use strict whole number comparison if type is 'whole'
                if (type === 'whole') {
                    isCorrect = standardizedInput === expectedFloat;
                } else {
                    // Use loose comparison for floats (0.01 tolerance)
                    isCorrect = Math.abs(standardizedInput - expectedFloat) < tolerance;
                }
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
        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 6; 
            const resultsDiv = document.getElementById('results');

            // --- Final Assessment Answers ---
            const answers = {
                // A1: 46:54 -> 23:27 (GCF is 2). Use 'ratio' type.
                qa1: '23:27',
                // A2: P164.00 / 8 min = P20.50/min. Use 'number' type (2 decimal precision).
                qa2: 20.50,
                // A3: 15:30 -> 1:2 (GCF is 15). Use 'ratio' type.
                qa3: '1:2',
                // A4: 220 words / 4 min = 55 words/min. Use 'whole' type.
                qa4: 55,
                // B1: x : 600 = 2 : 25. Formula: x = (600 * 2) / 25 = 48. Use 'whole' type.
                qb1: 48,
                // B2: 200 : 50 = 500 : x. Formula: x = (50 * 500) / 200 = 125. Use 'whole' type.
                qb2: 125,
            };
            
            if (!isLanguageToggle) {
                // Run checks only on button click, not language toggle
                correctCount += checkAnswer('qa1', answers.qa1, 'ratio'); 
                correctCount += checkAnswer('qa2', answers.qa2, 'number');
                correctCount += checkAnswer('qa3', answers.qa3, 'ratio');
                correctCount += checkAnswer('qa4', answers.qa4, 'whole');
                correctCount += checkAnswer('qb1', answers.qb1, 'whole');
                correctCount += checkAnswer('qb2', answers.qb2, 'whole');
                
                // Store the current score to maintain state across language toggles
                resultsDiv.setAttribute('data-current-score', correctCount);
            } else {
                 // If it's a language toggle, retrieve the score
                 correctCount = parseInt(resultsDiv.getAttribute('data-current-score')) || 0;
            }

            // Display results
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
        
        document.getElementById('ratio-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); 
        });
        
        window.addEventListener('load', () => {
             // Initialize default language (English) and outline highlight on load
             updateLanguage('en');
             highlightOutlineLink();
        });
    </script>
</body>
</html>
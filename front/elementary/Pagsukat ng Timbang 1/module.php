<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Measuring Weight 1</title>
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Metric System (Kg, Gram)</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: English System (Pound, Ounce)</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Measuring Weight 1</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Learning Metric and English Systems of Weight Measurement.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Identify units of weight measurement in the <b>Metric</b> and <b>English</b> systems.</li>
                        <li data-i18n="obj_2">Measure, read, and record the weight of objects and people.</li>
                        <li data-i18n="obj_3">Convert weight units (smaller to larger, and vice-versa).</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Metrikong Sistema (Grams at Kilograms) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Metric System (Kilogram and Gram)</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">In our markets, the <b>Metric System</b> is commonly used to measure the weight of food and other products. The primary units are the <b>kilogram (kilo or kg)</b> and the <b>gram (g)</b>. [Image of a metric weighing scale showing kilograms and grams]</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Units and Conversion Factors (Metric)</h3>
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full">
                                    <thead>
                                        <tr data-i18n="aralin1_table_header"><th>Smaller Unit</th><th>Equivalent Larger Unit</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin1_table_row1"><td>1,000 milligrams (mg)</td><td><b>1 gram (g)</b></td></tr>
                                        <tr data-i18n="aralin1_table_row2"><td>1,000 grams (g)</td><td><b>1 kilogram (kg)</b></td></tr>
                                        <tr data-i18n="aralin1_table_row3"><td>1,000 kilograms (kg)</td><td><b>1 metric ton</b></td></tr>
                                    </tbody>
                                </table>
                            </div>
                             <p data-i18n="aralin1_p2">The <b>"guhit"</b> (pronounced 'goo-hit') is a local unit equal to <b>100 grams</b>. There are 10 guhit in 1 kilo. </p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Conversion (Smaller → Larger)</h3>
                            <p data-i18n="aralin1_p3">To convert a <b>smaller unit</b> (g) to a <b>larger unit</b> (kg), you need to divide. Since the conversion factor is 1,000, divide by 1,000.</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_q">EXAMPLE: Convert 500 grams to kilos.</p>
                                <p class="math-display" data-i18n="aralin1_ex1_math"> 500 g &divide; 1,000 = <b>0.5 kilo</b> or 1/2 kilo</p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Conversion (Larger → Smaller)</h3>
                            <p data-i18n="aralin1_p4">To convert a <b>larger unit</b> (kilo) to a <b>smaller unit</b> (gram), you need to multiply by 1,000.</p>
                             <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_q">EXAMPLE: Convert 15 metric tons to kilos.</p>
                                <p class="math-display" data-i18n="aralin1_ex2_math"> 15 metric tons &times; 1,000 = <b>15,000 kilos</b></p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Ingles na Sistema (Pounds at Ounces) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: English System (Pound and Ounce)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">The <b>English System</b> (or U.S. Customary) is often used to measure human weight (especially babies) and in cooking/baking. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Units and Conversion Factors (English)</h3>
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full">
                                    <thead>
                                        <tr data-i18n="aralin2_table_header"><th>Smaller Unit</th><th>Equivalent Larger Unit</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin2_table_row1"><td>16 ounces (oz)</td><td><b>1 pound (lb)</b></td></tr>
                                        <tr data-i18n="aralin2_table_row2"><td>2,000 pounds (lbs)</td><td><b>1 ton (English Ton)</b></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <p data-i18n="aralin2_p2">Reading weight on the English scale (pounds) is similar to the Metric scale; just note which unit each line registers.</p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Conversion (Smaller → Larger)</h3>
                            <p data-i18n="aralin2_p3">To convert <b>ounces</b> to <b>pounds</b>, you need to divide by <b>16</b>.</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_q">EXAMPLE: Convert 35 ounces to pounds.</p>
                                <p class="math-display" data-i18n="aralin2_ex1_math"> 35 oz &divide; 16 = <b>2.19 pounds</b> (approx.)</p>
                                <p class="text-sm italic mt-2 text-gray-600" data-i18n="aralin2_ex1_note">Note: This is often written as 2 lbs and 3 oz, but for the quiz, use the decimal form.</p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_3">Conversion (Larger → Smaller)</h3>
                            <p data-i18n="aralin2_p4">To convert <b>pounds</b> to <b>ounces</b>, you need to multiply by <b>16</b>.</p>
                             <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_q">EXAMPLE: How many ounces equal 2 pounds and 6 ounces?</p>
                                <p class="font-semibold" data-i18n="aralin2_ex2_step1">Step 1: Convert pounds to ounces.</p>
                                <p class="math-display" data-i18n="aralin2_ex2_math1"> 2 lbs &times; 16 = <b>32 oz</b></p>
                                <p class="font-semibold" data-i18n="aralin2_ex2_step2">Step 2: Add the remaining ounces.</p>
                                <p class="math-display" data-i18n="aralin2_ex2_math2"> 32 oz + 6 oz = <b>38 oz</b></p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the conversion and word problems using the correct unit. (Round decimals to 2 places where necessary.)</p>

                    <form id="weight-conversion-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Metric Conversion</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. How many kilograms (kg) is 2,500 grams (g)?</label>
                                    <input type="text" id="qa1" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa1_placeholder" placeholder="Answer in kg">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. How many grams (g) is 1.2 metric tons?</label>
                                    <input type="text" id="qa2" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa2_placeholder" placeholder="Answer in grams">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. English Conversion</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1" class="font-medium" data-i18n="qb1_label">1. How many pounds (lbs) is 144 ounces (oz)?</label>
                                    <input type="text" id="qb1" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qb1_placeholder" placeholder="Answer in lbs">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2" class="font-medium" data-i18n="qb2_label">2. How many ounces (oz) is 3½ pounds (lbs)?</label>
                                    <input type="text" id="qb2" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qb2_placeholder" placeholder="Answer in oz">
                                </div>
                            </div>
                        </div>


                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_c">C. Word Problem (Comparison)</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qc1" class="font-medium" data-i18n="qc1_label">1. Which is heavier: 6 pounds (lbs) or 96 ounces (oz)? (Write 'same' if equal.)</label>
                                    <input type="text" id="qc1" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qc1_placeholder" placeholder="Answer (lbs, oz, or same)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qc2" class="font-medium" data-i18n="qc2_label">2. The requirement is 1.2 metric tons. The donation is 1,458 kilos. Is the donation sufficient? (Yes/No)</label>
                                    <input type="text" id="qc2" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qc2_placeholder" placeholder="Answer (Yes/No)">
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
                outline_aralin1: "Lesson 1: Metric System (Kg, Gram)",
                outline_aralin2: "Lesson 2: English System (Pound, Ounce)",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Measuring Weight 1", // UPDATED HERE
                h1_subtitle: "Learning Metric and English Systems of Weight Measurement.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Identify units of weight measurement in the <b>Metric</b> and <b>English</b> systems.",
                obj_2: "Measure, read, and record the weight of objects and people.",
                obj_3: "Convert weight units (smaller to larger, and vice-versa).",

                // Lesson 1 Content (Metric)
                aralin1_title: "Lesson 1: Metric System (Kilogram and Gram)",
                aralin1_p1: "In our markets, the <b>Metric System</b> is commonly used to measure the weight of food and other products. The primary units are the <b>kilogram (kilo or kg)</b> and the <b>gram (g)</b>.",
                aralin1_h3_1: "Units and Conversion Factors (Metric)",
                aralin1_table_header: "<th>Smaller Unit</th><th>Equivalent Larger Unit</th>",
                aralin1_table_row1: "<td>1,000 milligrams (mg)</td><td><b>1 gram (g)</b></td>",
                aralin1_table_row2: "<td>1,000 grams (g)</td><td><b>1 kilogram (kg)</b></td>",
                aralin1_table_row3: "<td>1,000 kilograms (kg)</td><td><b>1 metric ton</b></td>",
                aralin1_p2: "The <b>“guhit”</b> (pronounced 'goo-hit') is a local unit equal to <b>100 grams</b>. There are 10 guhit in 1 kilo.",
                aralin1_h3_2: "Conversion (Smaller → Larger)",
                aralin1_p3: "To convert a <b>smaller unit</b> (g) to a <b>larger unit</b> (kg), you need to divide. Since the conversion factor is 1,000, divide by 1,000.",
                aralin1_ex1_q: "EXAMPLE: Convert 500 grams to kilos.",
                aralin1_ex1_math: " 500 g &divide; 1,000 = <b>0.5 kilo</b> or 1/2 kilo",
                aralin1_h3_3: "Conversion (Larger → Smaller)",
                aralin1_p4: "To convert a <b>larger unit</b> (kilo) to a <b>smaller unit</b> (gram), you need to multiply by 1,000.",
                aralin1_ex2_q: "EXAMPLE: Convert 15 metric tons to kilos.",
                aralin1_ex2_math: " 15 metric tons &times; 1,000 = <b>15,000 kilos</b>",

                // Lesson 2 Content (English)
                aralin2_title: "Lesson 2: English System (Pound and Ounce)",
                aralin2_p1: "The <b>English System</b> (or U.S. Customary) is often used to measure human weight (especially babies) and in cooking/baking. ",
                aralin2_h3_1: "Units and Conversion Factors (English)",
                aralin2_table_header: "<th>Smaller Unit</th><th>Equivalent Larger Unit</th>",
                aralin2_table_row1: "<td>16 ounces (oz)</td><td><b>1 pound (lb)</b></td>",
                aralin2_table_row2: "<td>2,000 pounds (lbs)</td><td><b>1 ton (English Ton)</b></td>",
                aralin2_p2: "Reading weight on the English scale (pounds) is similar to the Metric scale; just note which unit each line registers.",
                aralin2_h3_2: "Conversion (Smaller → Larger)",
                aralin2_p3: "To convert <b>ounces</b> to <b>pounds</b>, you need to divide by <b>16</b>.",
                aralin2_ex1_q: "EXAMPLE: Convert 35 ounces to pounds.",
                aralin2_ex1_math: " 35 oz &divide; 16 = <b>2.19 pounds</b> (approx.)",
                aralin2_ex1_note: "Note: This is often written as 2 lbs and 3 oz, but for the quiz, use the decimal form.",
                aralin2_h3_3: "Conversion (Larger → Smaller)",
                aralin2_p4: "To convert <b>pounds</b> to <b>ounces</b>, you need to multiply by <b>16</b>.",
                aralin2_ex2_q: "EXAMPLE: How many ounces equal 2 pounds and 6 ounces?",
                aralin2_ex2_step1: "Step 1: Convert pounds to ounces.",
                aralin2_ex2_math1: " 2 lbs &times; 16 = <b>32 oz</b>",
                aralin2_ex2_step2: "Step 2: Add the remaining ounces.",
                aralin2_ex2_math2: " 32 oz + 6 oz = <b>38 oz</b>",
                
                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Answer the conversion and word problems using the correct unit. (Round decimals to 2 places where necessary.)",
                quiz_section_a: "A. Metric Conversion",
                qa1_label: "1. How many kilograms (kg) is 2,500 grams (g)?",
                qa2_label: "2. How many grams (g) is 1.2 metric tons?",
                qa1_placeholder: "Answer in kg",
                qa2_placeholder: "Answer in grams",
                quiz_section_b: "B. English Conversion",
                qb1_label: "1. How many pounds (lbs) is 144 ounces (oz)?",
                qb2_label: "2. How many ounces (oz) is 3½ pounds (lbs)?",
                qb1_placeholder: "Answer in lbs",
                qb2_placeholder: "Answer in oz",
                quiz_section_c: "C. Word Problem (Comparison)",
                qc1_label: "1. Which is heavier: 6 pounds (lbs) or 96 ounces (oz)? (Write 'same' if equal.)",
                qc2_label: "2. The requirement is 1.2 metric tons. The donation is 1,458 kilos. Is the donation sufficient? (Yes/No)",
                qc1_placeholder: "Answer (lbs, oz, or same)",
                qc2_placeholder: "Answer (Yes/No)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered weight conversion!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Read Lessons 1 and 2 again.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Metrikong Sistema (Kg, Gram)",
                outline_aralin2: "Aralin 2: Ingles na Sistema (Pound, Ounce)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Pagsukat ng Timbang 1", // UPDATED HERE (Pagsukat)
                h1_subtitle: "Pag-aaral ng Metriko at Ingles na Sistema sa Pagsukat ng Timbang.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Makilala ang mga yunit ng pagsukat ng timbang sa sistemang <b>Metriko</b> at <b>Ingles</b>.",
                obj_2: "Sukatin, basahin, at itala ang timbang ng mga bagay at tao.",
                obj_3: "Magpalit ng mga yunit ng timbang (mas maliit patungo sa mas malaki, at baliktaran).",

                // Lesson 1 Content (Metric)
                aralin1_title: "Aralin 1: Metrikong Sistema (Kilogram at Gram)",
                aralin1_p1: "Sa ating pamilihan, karaniwang ginagamit ang <b>Metrikong Sistema</b> para sukatin ang timbang ng pagkain at iba pang produkto. Ang pangunahing yunit ay ang <b>kilogram (kilo o kg)</b> at ang <b>gram (g)</b>.",
                aralin1_h3_1: "Mga Yunit at Conversion Factor (Metriko)",
                aralin1_table_header: "<th>Mas Maliit na Yunit</th><th>Katumbas na Mas Malaking Yunit</th>",
                aralin1_table_row1: "<td>1,000 miligrams (mg)</td><td><b>1 gram (g)</b></td>",
                aralin1_table_row2: "<td>1,000 grams (g)</td><td><b>1 kilogram (kg)</b></td>",
                aralin1_table_row3: "<td>1,000 kilograms (kg)</td><td><b>1 metric ton</b></td>",
                aralin1_p2: "Ang <b>“guhit”</b> ay isang lokal na yunit na katumbas ng <b>100 grams</b>. May 10 guhit sa 1 kilo.",
                aralin1_h3_2: "Conversion (Maliit → Malaki)",
                aralin1_p3: "Para mag-convert ng <b>mas maliit na yunit</b> (g) patungo sa <b>mas malaking yunit</b> (kg), kailangan mong maghati (divide). Dahil ang conversion factor ay 1,000, maghati sa 1,000.",
                aralin1_ex1_q: "HALIMBAWA: Palitan ang 500 grams sa kilo.",
                aralin1_ex1_math: " 500 g &divide; 1,000 = <b>0.5 kilo</b> o 1/2 kilo",
                aralin1_h3_3: "Conversion (Malaki → Maliit)",
                aralin1_p4: "Para mag-convert ng <b>mas malaking yunit</b> (kilo) patungo sa <b>mas maliit na yunit</b> (gram), kailangan mong magparami (multiply) sa 1,000.",
                aralin1_ex2_q: "HALIMBAWA: Palitan ang 15 metric tons sa kilo.",
                aralin1_ex2_math: " 15 metric tons &times; 1,000 = <b>15,000 kilos</b>",

                // Lesson 2 Content (English)
                aralin2_title: "Aralin 2: Ingles na Sistema (Pound at Ounce)",
                aralin2_p1: "Ang <b>Ingles na Sistema</b> (o U.S. Customary) ay kadalasang ginagamit para sukatin ang timbang ng tao (lalo na ng sanggol) at sa pagluluto (baking).",
                aralin2_h3_1: "Mga Yunit at Conversion Factor (Ingles)",
                aralin2_table_header: "<th>Mas Maliit na Yunit</th><th>Katumbas na Mas Malaking Yunit</th>",
                aralin2_table_row1: "<td>16 ounces (oz)</td><td><b>1 pound (lb)</b></td>",
                aralin2_table_row2: "<td>2,000 pounds (lbs)</td><td><b>1 ton (English Ton)</b></td>",
                aralin2_p2: "Ang pagbabasa ng timbang sa English scale (pounds) ay katulad ng sa Metric scale; tingnan lamang kung anong yunit ang nirerehistro ng bawat linya.",
                aralin2_h3_2: "Conversion (Maliit → Malaki)",
                aralin2_p3: "Para mag-convert ng <b>ounces</b> patungo sa <b>pounds</b>, kailangan mong maghati (divide) sa <b>16</b>.",
                aralin2_ex1_q: "HALIMBAWA: Palitan ang 35 ounces sa pounds.",
                aralin2_ex1_math: " 35 oz &divide; 16 = <b>2.19 pounds</b> (approx.)",
                aralin2_ex1_note: "Note: Karaniwang isinusulat ito bilang 2 lbs at 3 oz, pero para sa quiz, gamitin ang decimal form.",
                aralin2_h3_3: "Conversion (Malaki → Maliit)",
                aralin2_p4: "Para mag-convert ng <b>pounds</b> patungo sa <b>ounces</b>, kailangan mong magparami (multiply) sa <b>16</b>.",
                aralin2_ex2_q: "HALIMBAWA: Ilang ounces ang katumbas ng 2 pounds at 6 ounces?",
                aralin2_ex2_step1: "Hakbang 1: I-convert ang pounds sa ounces.",
                aralin2_ex2_math1: " 2 lbs &times; 16 = <b>32 oz</b>",
                aralin2_ex2_step2: "Hakbang 2: Idagdag ang natitirang ounces.",
                aralin2_ex2_math2: " 32 oz + 6 oz = <b>38 oz</b>",
                
                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang mga conversion at word problem na gumagamit ng tamang yunit. (I-round ang mga decimal sa 2 lugar kung kinakailangan.)",
                quiz_section_a: "A. Metrikong Conversion",
                qa1_label: "1. Ilang kilo (kg) ang 2,500 grams (g)?",
                qa2_label: "2. Ilang grams (g) ang 1.2 metric tons?",
                qa1_placeholder: "Sagot sa kg",
                qa2_placeholder: "Sagot sa grams",
                quiz_section_b: "B. Ingles na Conversion",
                qb1_label: "1. Ilang pounds (lbs) ang 144 ounces (oz)?",
                qb2_label: "2. Ilang ounces (oz) ang 3½ pounds (lbs)?",
                qb1_placeholder: "Sagot sa lbs",
                qb2_placeholder: "Sagot sa oz",
                quiz_section_c: "C. Word Problem (Paghahambing)",
                qc1_label: "1. Alin ang mas mabigat: 6 pounds (lbs) o 96 ounces (oz)? (Isulat ang 'pareho' kung pareho.)",
                qc2_label: "2. Ang kailangan ay 1.2 metric tons. Ang donasyon ay 1,458 kilos. Sapat ba ang donasyon? (Oo/Hindi)",
                qc1_placeholder: "Sagot (lbs, oz, o pareho)",
                qc2_placeholder: "Sagot (Oo/Hindi)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang conversion ng timbang!`,
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
        window.addEventListener('load', () => {
             // Initialize default language (English) and outline highlight on load
             updateLanguage('en');
             highlightOutlineLink();
        });
        // --- END SCROLL TRACKING LOGIC ---


        // Function to standardize numerical input for float comparison
        function standardizeFloat(value, precision = 2) {
            if (typeof value !== 'string') value = String(value);
            // Remove all non-numeric characters except for dots
            value = value.trim().replace(/\s/g, '').replace(/[^0-9.]/g, ''); 
            const parsedValue = parseFloat(value);
            if (isNaN(parsedValue)) return ''; 
            
            // Otherwise, fix precision
            return parsedValue.toFixed(precision);
        }

        // Function to standardize text answers (Comparison/Yes/No)
        function standardizeText(value) {
            if (typeof value !== 'string') return String(value).toLowerCase();
            // Remove non-alphabetic characters (except spaces) and convert to lowercase
            return value.trim().toLowerCase().replace(/[^a-z]/g, ''); 
        }


        function checkAnswer(id, expected, isStrictText = false, precision = 2) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            let isCorrect = false;

            if (isStrictText) {
                const standardizedInput = standardizeText(rawValue);
                const standardizedExpected = standardizeText(expected);
                isCorrect = standardizedInput === standardizedExpected;
            } else {
                const standardizedInput = standardizeFloat(rawValue, precision);
                const standardizedExpected = standardizeFloat(expected, precision);
                
                // Use loose comparison for floats because of calculation differences
                isCorrect = Math.abs(parseFloat(standardizedInput) - parseFloat(standardizedExpected)) < 0.01;
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
                // A1: 2500 g to kg (2500/1000 = 2.5)
                qa1: 2.5,
                // A2: 1.2 metric tons to grams (1.2 * 1000 kg/MT * 1000 g/kg = 1,200,000 g)
                qa2: 1200000, 
                // B1: 144 oz to lbs (144/16 = 9)
                qb1: 9,
                // B2: 3.5 lbs to oz (3.5 * 16 = 56)
                qb2: 56,
                // C1: 6 lbs vs 96 oz (6*16 = 96. They are equal.)
                qc1: 'same', 
                // C2: 1.2 metric tons vs 1458 kg. (1.2 MT = 1200 kg. 1458 > 1200. Yes.)
                qc2: 'yes',
            };
            
            if (!isLanguageToggle) {
                // Run checks only on button click, not language toggle
                correctCount += checkAnswer('qa1', answers.qa1, false, 1);
                correctCount += checkAnswer('qa2', answers.qa2, false, 0); 
                correctCount += checkAnswer('qb1', answers.qb1, false, 0);
                correctCount += checkAnswer('qb2', answers.qb2, false, 0);
                correctCount += checkAnswer('qc1', answers.qc1, true); // Strict text check
                correctCount += checkAnswer('qc2', answers.qc2, true); // Strict text check
                
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
        
        document.getElementById('weight-conversion-quiz-form').addEventListener('submit', function(e) {
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Measuring Weight 2</title>
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

        /* Table Styles (Updated to match standard template) */
        .module-table {
            border-collapse: collapse;
            border: 2px solid #059669; /* Green 600 */
            border-radius: 0.5rem;
            overflow: hidden;
            margin-bottom: 2rem;
            font-size: 1.25rem; /* 20px */
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
            text-align: left; 
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Conversion (Metric ↔ English)</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Finding a Reasonable Price</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Measuring Weight 2</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Studying cross-system weight conversion and calculating Unit Price for smart spending.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Convert weight from the <b>Metric</b> to the <b>English System</b> and vice-versa.</li>
                        <li data-i18n="obj_2">Compare prices of goods using the <b>Unit Price</b>.</li>
                        <li data-i18n="obj_3">Use weight measurement knowledge for wise spending.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Cross-System Conversion -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Conversion (Metric ↔ English)</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">The <b>Unit Factor Method</b> and <b>Conversion Factors</b> are used to change weight units between the Metric and English systems. This is important for comparing weights measured in different systems.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Table of Conversion Factors</h3>
                            <div class="overflow-x-auto my-4">
                                <table class="w-full module-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" data-i18n="aralin1_table_header1">From</th>
                                            <th class="text-center" data-i18n="aralin1_table_header2">To</th>
                                            <th class="text-center" data-i18n="aralin1_table_header3">Conversion Factor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin1_table_row1"><td><b>Kilo (kg)</b></td><td><b>Pound (lb)</b></td><td class="text-center">2.2</td></tr>
                                        <tr data-i18n="aralin1_table_row2"><td><b>Gram (g)</b></td><td><b>Ounce (oz)</b></td><td class="text-center">0.035 (g x 0.035)</td></tr>
                                        <tr data-i18n="aralin1_table_row3"><td><b>Pound (lb)</b></td><td><b>Kilo (kg)</b></td><td class="text-center">0.45 (lb x 0.45)</td></tr>
                                        <tr data-i18n="aralin1_table_row4"><td><b>Ounce (oz)</b></td><td><b>Gram (g)</b></td><td class="text-center">28.4 (oz x 28.4)</td></tr>
                                    </tbody>
                                </table>
                            </div>
                                <br>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE: Kilo to Pound</p>
                                <p data-i18n="aralin1_ex1_p1">How many pounds (lb) are 14 kilos (kg)? (Use 1 kg = 2.2 lb)</p>
                                <p class="math-formula" data-i18n="aralin1_ex1_solution1"> 14 kg x 2.2 lb/kg = <b>30.8 pounds</b> </p>
                                <p class="font-bold mt-4" data-i18n="aralin1_ex2_title">EXAMPLE: Pound to Kilo</p>
                                <p data-i18n="aralin1_ex2_p1">How many kilos (kg) are 5 pounds (lb)? (Use 1 lb = 0.45 kg)</p>
                                <p class="math-formula" data-i18n="aralin1_ex2_solution1"> 5 lb x 0.45 kg/lb = <b>2.25 kilos</b> </p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Pagkuha ng Pinakarisonableng Presyo -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Finding a Reasonable Price (Unit Price)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">Calculating the <b>Unit Price</b> is the best way to determine the cheapest option when buying items based on weight.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Unit Price Formula</h3>
                            <div class="math-formula" data-i18n="aralin2_formula1">
                                <span>Unit Price = Package Price / Package Weight</span>
                            </div>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">EXAMPLE: Comparing Laundry Detergents</p>
                                <p data-i18n="aralin2_ex1_p1"><b>Silaw:</b> P45 for 250 grams</p>
                                <p class="math-formula" data-i18n="aralin2_ex1_solution1"> P45 / 250 g = <b>P0.18/gram</b> </p>
                                <p data-i18n="aralin2_ex1_p2"><b>Puti:</b> P50 for 350 grams</p>
                                <p class="math-formula" data-i18n="aralin2_ex1_solution2"> P50 / 350 g ≈ <b>P0.14/gram</b> </p>
                                <p class="mt-2 text-gray-600" data-i18n="aralin2_ex1_note"><b>Puti</b> is cheaper because its price per gram is lower.</p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Cheaper by the Bulk</h3>
                            <p data-i18n="aralin2_p2">Buying in bulk means purchasing a large package to save money. To verify this, compare the price of one large package to the total price of the equivalent number of small packages. </p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_title">EXAMPLE: Sugar</p>
                                <p data-i18n="aralin2_ex2_p1"><b>Price of 1-kilo package:</b> P50</p>
                                <p data-i18n="aralin2_ex2_p2"><b>Price of five 200-gram packages (equals 1 kilo):</b> P12/package x 5 = P60</p>
                                <p class="mt-2 text-gray-600" data-i18n="aralin2_ex2_note">The <b>1-kilo package (P50)</b> is cheaper than the five small packages (P60). This is "cheaper by the bulk".</p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the problems. Use conversion factors: 1 kg = 2.2 lb, 1 lb = 0.45 kg. (Provide answers in decimal format.)</p>

                    <form id="weight-part2-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Cross-System Conversion</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. Which is heavier: 65 pounds (lb) or 27 kilos (kg)? (Answer: weight of 65 lb in kg):</label>
                                    <input type="text" id="qa1" class="quiz-input" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (kg)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. How much will Weng earn from 14 pounds (lb) of chicken if the price is P65 per kilo (kg)?</label>
                                    <input type="text" id="qa2" class="quiz-input" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (Peso)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Unit Price (Presyo ng Yunit)</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1" class="font-medium" data-i18n="qb1_label">3. Unit Price (per gram) of 500-g biscuits worth P134:</label>
                                    <input type="text" id="qb1" class="quiz-input" data-i18n-placeholder="qb1_placeholder" placeholder="Answer (P/gram)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2" class="font-medium" data-i18n="qb2_label">4. Price of 1-kilo rice (P20/kilo) vs. 48-kilo rice (P870). What is the Unit Price of the 48-kilo rice (per kilo)?</label>
                                    <input type="text" id="qb2" class="quiz-input" data-i18n-placeholder="qb2_placeholder" placeholder="Answer (P/kilo)">
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit-weight-part2-quiz" class="w-[70%] mx-auto block accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
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
                outline_aralin1: "Lesson 1: Conversion (Metric ↔ English)",
                outline_aralin2: "Lesson 2: Finding a Reasonable Price",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Measuring Weight 2",
                h1_subtitle: "Studying cross-system weight conversion and calculating Unit Price for smart spending.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Convert weight from the <b>Metric</b> to the <b>English System</b> and vice-versa.",
                obj_2: "Compare prices of goods using the <b>Unit Price</b>.",
                obj_3: "Use weight measurement knowledge for wise spending.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Conversion (Metric ↔ English)",
                aralin1_p1: "The <b>Unit Factor Method</b> and <b>Conversion Factors</b> are used to change weight units between the Metric and English systems. This is important for comparing weights measured in different systems.",
                aralin1_h3_1: "Table of Conversion Factors",
                aralin1_table_header1: "From",
                aralin1_table_header2: "To",
                aralin1_table_header3: "Conversion Factor",
                aralin1_table_row1: "<td><b>Kilo (kg)</b></td><td><b>Pound (lb)</b></td><td class=\"text-center\">2.2</td>",
                aralin1_table_row2: "<td><b>Gram (g)</b></td><td><b>Ounce (oz)</b></td><td class=\"text-center\">0.035 (g x 0.035)</td>",
                aralin1_table_row3: "<td><b>Pound (lb)</b></td><td><b>Kilo (kg)</b></td><td class=\"text-center\">0.45 (lb x 0.45)</td>",
                aralin1_table_row4: "<td><b>Ounce (oz)</b></td><td><b>Gram (g)</b></td><td class=\"text-center\">28.4 (oz x 28.4)</td>",
                aralin1_ex1_title: "EXAMPLE: Kilo to Pound",
                aralin1_ex1_p1: "How many pounds (lb) are 14 kilos (kg)? (Use 1 kg = 2.2 lb)",
                aralin1_ex1_solution1: " 14 kg x 2.2 lb/kg = <b>30.8 pounds</b> ",
                aralin1_ex2_title: "EXAMPLE: Pound to Kilo",
                aralin1_ex2_p1: "How many kilos (kg) are 5 pounds (lb)? (Use 1 lb = 0.45 kg)",
                aralin1_ex2_solution1: " 5 lb x 0.45 kg/lb = <b>2.25 kilos</b> ",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Finding a Reasonable Price (Unit Price)",
                aralin2_p1: "Calculating the <b>Unit Price</b> is the best way to determine the cheapest option when buying items based on weight.",
                aralin2_h3_1: "Unit Price Formula",
                aralin2_formula1: "Unit Price = Package Price / Package Weight",
                aralin2_ex1_title: "EXAMPLE: Comparing Laundry Detergents",
                aralin2_ex1_p1: "<b>Silaw:</b> P45 for 250 grams",
                aralin2_ex1_solution1: " P45 / 250 g = <b>P0.18/gram</b> ",
                aralin2_ex1_p2: "<b>Puti:</b> P50 for 350 grams",
                aralin2_ex1_solution2: " P50 / 350 g ≈ <b>P0.14/gram</b> ",
                aralin2_ex1_note: "<b>Puti</b> is cheaper because its price per gram is lower.",
                aralin2_h3_2: "Cheaper by the Bulk",
                aralin2_p2: "Buying in bulk means purchasing a large package to save money. To verify this, compare the price of one large package to the total price of the equivalent number of small packages.",
                aralin2_ex2_title: "EXAMPLE: Sugar",
                aralin2_ex2_p1: "<b>Price of 1-kilo package:</b> P50",
                aralin2_ex2_p2: "<b>Price of five 200-gram packages (equals 1 kilo):</b> P12/package x 5 = P60",
                aralin2_ex2_note: "The <b>1-kilo package (P50)</b> is cheaper than the five small packages (P60). This is 'cheaper by the bulk'.",
                
                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Answer the problems. Use conversion factors: 1 kg = 2.2 lb, 1 lb = 0.45 kg. (Provide answers in decimal format.)",
                quiz_section1_title: "A. Cross-System Conversion",
                qa1_label: "1. Which is heavier: 65 pounds (lb) or 27 kilos (kg)? (Answer: weight of 65 lb in kg):",
                qa1_placeholder: "Answer (kg)",
                qa2_label: "2. How much will Weng earn from 14 pounds (lb) of chicken if the price is P65 per kilo (kg)?",
                qa2_placeholder: "Answer (Peso)",
                quiz_section2_title: "B. Unit Price (Presyo ng Yunit)",
                qb1_label: "3. Unit Price (per gram) of 500-g biscuits worth P134:",
                qb1_placeholder: "Answer (P/gram)",
                qb2_label: "4. Price of 1-kilo rice (P20/kilo) vs. 48-kilo rice (P870). What is the Unit Price of the 48-kilo rice (per kilo)?",
                qb2_placeholder: "Answer (P/kilo)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered cross-system conversion and unit pricing!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the conversion factors (0.45 for lb→kg) and unit price calculation.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the Unit Price formula (Price / Weight) and Lesson 1.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Conversion (Metric ↔ English)",
                outline_aralin2: "Aralin 2: Pagkuha ng Risonableng Presyo",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Pagsukat ng Timbang 2",
                h1_subtitle: "Pag-aaral kung paano mag-convert sa pagitan ng Metric at English systems at pagkuha ng Unit Price.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "I-convert ang timbang mula <b>Metric</b> patungong <b>English System</b> at baliktaran.",
                obj_2: "Ikumpara ang presyo ng mga bilihin sa pamamagitan ng <b>Unit Price</b> (Presyo ng Yunit).",
                obj_3: "Magamit ang kaalaman sa pagsukat ng timbang para sa matalinong paggastos.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Conversion (Metric ↔ English)",
                aralin1_p1: "Ang <b>Unit Factor Method</b> at <b>Conversion Factors</b> ay ginagamit upang magbago ng yunit ng timbang sa pagitan ng Metric at English systems. Mahalaga ito upang maikumpara ang timbang ng mga bagay-bagay sa iba't ibang yunit.",
                aralin1_h3_1: "Talahanayan ng Conversion Factors",
                aralin1_table_header1: "Mula sa",
                aralin1_table_header2: "Patungo sa",
                aralin1_table_header3: "Conversion Factor",
                aralin1_table_row1: "<td><b>Kilo (kg)</b></td><td><b>Libra (lb)</b></td><td class=\"text-center\">2.2</td>",
                aralin1_table_row2: "<td><b>Gramo (g)</b></td><td><b>Onsa (oz)</b></td><td class=\"text-center\">0.035 (g x 0.035)</td>",
                aralin1_table_row3: "<td><b>Libra (lb)</b></td><td><b>Kilo (kg)</b></td><td class=\"text-center\">0.45 (lb x 0.45)</td>",
                aralin1_table_row4: "<td><b>Onsa (oz)</b></td><td><b>Gramo (g)</b></td><td class=\"text-center\">28.4 (oz x 28.4)</td>",
                aralin1_ex1_title: "HALIMBAWA: Kilo patungong Libra",
                aralin1_ex1_p1: "Ilang libra (lb) ang 14 kilo (kg)? (Gamitin ang 1 kg = 2.2 lb)",
                aralin1_ex1_solution1: " 14 kg x 2.2 lb/kg = <b>30.8 libra</b> ",
                aralin1_ex2_title: "HALIMBAWA: Libra patungong Kilo",
                aralin1_ex2_p1: "Ilang kilo (kg) ang 5 libra (lb)? (Gamitin ang 1 lb = 0.45 kg)",
                aralin1_ex2_solution1: " 5 lb x 0.45 kg/lb = <b>2.25 kilo</b> ",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Pagkuha ng Risonableng Presyo (Unit Price)",
                aralin2_p1: "Ang pagkuha ng <b>Unit Price</b> (Presyo ng Yunit) ang pinakamahusay na paraan upang malaman kung saan makakamura sa pagbili ng mga bagay na batay sa timbang.",
                aralin2_h3_1: "Formula ng Unit Price",
                aralin2_formula1: "Unit Price = Presyo ng Pakete / Timbang ng Pakete",
                aralin2_ex1_title: "HALIMBAWA: Pagkumpara ng Sabong Panlaba",
                aralin2_ex1_p1: "<b>Silaw:</b> P45 para sa 250 gramo",
                aralin2_ex1_solution1: " P45 / 250 g = <b>P0.18/gramo</b> ",
                aralin2_ex1_p2: "<b>Puti:</b> P50 para sa 350 gramo",
                aralin2_ex1_solution2: " P50 / 350 g ≈ <b>P0.14/gramo</b> ",
                aralin2_ex1_note: "Mas mura ang <b>Puti</b> dahil mas mababa ang presyo nito kada gramo.",
                aralin2_h3_2: "Cheaper by the Bulk (Pagbili nang Maramihan)",
                aralin2_p2: "Ito ay pagbili ng malaking pakete upang makatipid. Upang i-verify ito, ikumpara ang presyo ng isang malaking pakete sa kabuuang presyo ng katumbas na bilang ng maliliit na pakete.",
                aralin2_ex2_title: "HALIMBAWA: Asukal",
                aralin2_ex2_p1: "<b>Presyo ng 1-kilo na pakete:</b> P50",
                aralin2_ex2_p2: "<b>Presyo ng 5 na 200-gramo na pakete (katumbas ng 1 kilo):</b> P12/pakete x 5 = P60",
                aralin2_ex2_note: "Mas mura ang <b>1-kilo na pakete (P50)</b> kaysa sa 5 maliit na pakete (P60). Ito ay 'cheaper by the bulk'.",
                
                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang mga problema. Gamitin ang conversion factors: 1 kg = 2.2 lb, 1 lb = 0.45 kg. (Ibigay ang sagot sa decimal format.)",
                quiz_section1_title: "A. Cross-System Conversion",
                qa1_label: "1. Alin ang mas mabigat: 65 libra (lb) o 27 kilo (kg)? (Sagot: timbang ng 65 lb sa kg):",
                qa1_placeholder: "Sagot (kg)",
                qa2_label: "2. Magkano ang kikitain ni Weng sa 14 libra (lb) na manok kung P65 kada kilo (kg) ang presyo?",
                qa2_placeholder: "Sagot (Piso)",
                quiz_section2_title: "B. Unit Price (Presyo ng Yunit)",
                qb1_label: "3. Unit Price (per gramo) ng 500-g biskwet na nagkakahalaga ng P134:",
                qb1_placeholder: "Sagot (P/gramo)",
                qb2_label: "4. Presyo ng 1-kilo na bigas (P20/kilo) vs. 48-kilo na bigas (P870). Magkano ang Unit Price ng 48-kilo na bigas (per kilo)?",
                qb2_placeholder: "Sagot (P/kilo)",
                quiz_button: "Tapusin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang cross-system conversion at unit pricing!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga conversion factor (0.45 para sa lb→kg) at ang pagkuha ng Unit Price.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Pag-aralan ulit ang Unit Price formula (Presyo / Timbang) at ang Aralin 1.`,
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

        function checkAnswer(id, expected, tolerance = 0.02) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            const inputFloat = standardizeFloat(rawValue);
            const expectedFloat = standardizeFloat(String(expected));
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            // Use tolerance for all math calculations, especially conversion and price
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
        document.getElementById('weight-part2-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false);
        });

        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 4; 
            const resultsDiv = document.getElementById('results');
            
            // --- Expected Calculations ---
            
            // CONVERSION FACTORS: 1 kg = 2.2 lb, 1 lb = 0.45 kg
            const LB_TO_KG = 0.45;
            
            // Q1: 65 lb to kg. 65 * 0.45 = 29.25 kg. (This is the expected input for comparison)
            const ans_a1 = 65 * LB_TO_KG; 
            
            // Q2: Weng's earning. 1. Convert 14 lb to kg: 14 * 0.45 = 6.3 kg. 2. Calculate price: 6.3 kg * P65/kg = 409.5
            const ans_a2 = (14 * LB_TO_KG) * 65; 
            
            // Q3: Unit Price P/g = 134 / 500 = 0.268
            const ans_b1 = 134 / 500; 
            
            // Q4: Unit Price P/kg = 870 / 48 = 18.125
            const ans_b2 = 870 / 48; 


            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1', ans_a1, 0.05); // Allow tolerance for conversion
                correctCount += checkAnswer('qa2', ans_a2, 0.05); // Allow tolerance for conversion
                correctCount += checkAnswer('qb1', ans_b1, 0.001); // Strict check for unit price
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

            // Reset background classes
            resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800');

            let message;
            if (correctCount === totalQuestions) {
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalQuestions * 0.5) {
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
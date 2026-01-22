<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Mass and Weight</title>
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
        #objectives ul li { /* Renamed from #tungkol-saan */
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
        
        /* Table Styles (Updated to match standard template) */
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
            text-align: left; 
            font-size: 1.25rem; /* 20px */
        }
        .module-table tbody tr:nth-child(odd) {
            background-color: #f7fee7; /* Lime 50 */
        }
        
        /* Math Display Style */
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

    <!-- Main Grid Container for Outline and Content (Width limit removed for full responsiveness) -->
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Comparing Mass and Weight</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Measurement Units and Conversion</a>
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
                    <!-- UPDATED: Meta Text to Junior High Learning Sheet -->
                    <span class="text-xs font-semibold uppercase tracking-wider text-green-600 bg-green-100 px-3 py-1 rounded-full" data-i18n="meta_text">Junior High Learning Module Sheet</span>
                    <!-- UPDATED: Added main-title-h1 class and font-bold for 50px size -->
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Mass and Weight</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Studying the difference between Mass (amount of material) and Weight (force of gravity).</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Confirmed: List items font size is set to 1.25rem (20px) -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Explain the difference between <b>Mass</b> and <b>Weight</b>.</li>
                        <li data-i18n="obj_2">Identify units of measurement (e.g., kg, lb, kg&sdot;m/s²).</li>
                        <li data-i18n="obj_3">Convert units and solve related problems.</li>
                    </ul>
                </div>
                                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Pagkukumpara sa Mass at Timbang -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Comparing Mass and Weight</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1"><b>Mass</b> is the inherent property of an object. It is the amount of material (matter) an object contains and <b>does not change</b> regardless of where it is placed (on the moon, on a mountain, or on a plain).</p>
                            <p data-i18n="aralin1_p2"><b>Weight</b> is the force pulling an object toward the center of the Earth (or another planet/moon). It <b>changes</b> depending on the <b>acceleration due to gravity (g)</b> of a location.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Weight Formula</h3>
                            <p data-i18n="aralin1_p3">Weight (W) can be calculated using the formula:</p>
                            <div class="math-formula" data-i18n="aralin1_formula">
                                <span>Weight (W) = Mass (m) x Gravity (g)</span>
                            </div>
                            <p data-i18n="aralin1_p4">On Earth, gravity (g) is approximately <b>9.81 m/s²</b>. The unit of Weight is usually <b>kg&sdot;m/s²</b> or <b>Newton</b>.</p>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE: Weight of an Astronaut with a mass of 55 kg.</p>
                                <p data-i18n="aralin1_ex1_step1"><b>Weight on Earth (g = 9.81 m/s²):</b></p>
                                <p class="math-formula" data-i18n="aralin1_ex1_solution1"> W = 55 kg x 9.81 m/s² ≈ <b>539.55 kg&sdot;m/s²</b> </p>
                                <p data-i18n="aralin1_ex1_step2"><b>Weight on the Moon (g = 1.64 m/s²):</b></p>
                                <p class="math-formula" data-i18n="aralin1_ex1_solution2"> W = 55 kg x 1.64 m/s² ≈ <b>90.20 kg&sdot;m/s²</b> </p>
                                <p class="mt-2 italic text-gray-600" data-i18n="aralin1_ex1_conclusion">It can be seen that the weight on the moon is lower because gravity is weaker, but the mass (55 kg) remains the same.</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Mga Yunit ng Pagsukat (Conversion) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Measurement Units and Conversion</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">The <b>Conversion Factor</b> and <b>Ratio</b> are used to convert one unit to another. When solving problems, the units used in the measurements must be the same.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Measurement Table</h3>
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full text-sm">
                                    <thead>
                                        <tr data-i18n="aralin2_table1_header"><th>Mass Unit (Metric)</th><th>Equivalent (Metric)</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin2_table1_row1"><td>1 kilogram (kg)</td><td>1,000 grams (g)</td></tr>
                                        <tr data-i18n="aralin2_table1_row2"><td>1 gram (g)</td><td>1,000 milligrams (mg)</td></tr>
                                        <tr data-i18n="aralin2_table1_row3"><td>1 tonne (T)</td><td>1,000 kilograms (kg)</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full text-sm">
                                    <thead>
                                        <tr data-i18n="aralin2_table2_header"><th>Conversion Factor (Metric ↔ English)</th><th>Equivalent (Approx.)</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin2_table2_row1"><td>1 kilogram (kg)</td><td>2.2 pounds (lb)</td></tr>
                                        <tr data-i18n="aralin2_table2_row2"><td>1 pound (lb)</td><td>0.45 kilograms (kg)</td></tr>
                                        <tr data-i18n="aralin2_table2_row3"><td>1 pound (lb)</td><td>4.45 Newton (kg&sdot;m/s²)</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">EXAMPLE 1: How many grams are in 3 kilograms of fertilizer?</p>
                                <p data-i18n="aralin2_ex1_step1">Conversion Factor: 1 kg = 1,000 g.</p>
                                <p class="math-formula" data-i18n="aralin2_ex1_solution"> 3 kg x (1,000 g / 1 kg) = <b>3,000 grams</b> </p>
                            </div>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_title">EXAMPLE 2: Nonoy's weight (121 lb) in kg&sdot;m/s².</p>
                                <p data-i18n="aralin2_ex2_step1">Conversion Factor: 1 lb = 4.45 kg&sdot;m/s².</p>
                                <p class="math-formula" data-i18n="aralin2_ex2_solution"> 121 lb x (4.45 kg&sdot;m/s² / 1 lb) ≈ <b>538.45 kg&sdot;m/s²</b> </p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Measuring Tools</h3>
                            <p data-i18n="aralin2_p2">Various scales are used to measure mass:</p>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin2_l1"><b>Timbangan (Scale)</b>: Commonly used in the market.</li>
                                <li data-i18n="aralin2_l2"><b>Platform Balance</b>: Used in the laboratory, can measure up to 0.01 grams (mg).</li>
                                <li data-i18n="aralin2_l3"><b>Platform Scale</b>: For large masses (e.g., cement, sand).</li>
                                <li data-i18n="aralin2_l4"><b>Digital Scale</b>: Provides accurate measurement.</li>
                            </ul>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Solve the following problems. Use 9.81 m/s² for Earth's gravity.</p>

                    <form id="mass-weight-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Conversion and Mass (1-2)</p>
                            <!-- USED FLEX-COL FOR VERTICAL ALIGNMENT AND W-FULL/W-64 INPUTS -->
                            <div class="flex flex-col space-y-4"> 
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. How many grams (g) is 10 milligrams (mg)?</label>
                                    <input type="text" id="qa1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (g)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. How many pounds (lb) is 400 kilograms (kg)?</label>
                                    <input type="text" id="qa2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (lb)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Weight Problem (3-4)</p>
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1" class="font-medium" data-i18n="qb1_label">3. If a person has a mass of 67 kg, what is their weight on Earth?</label>
                                    <input type="text" id="qb1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qb1_placeholder" placeholder="Weight (kg·m/s²)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2" class="font-medium" data-i18n="qb2_label">4. A person weighs 132 lb on Earth. What is their weight on Mars (g = 3.7 m/s²)?</label>
                                    <input type="text" id="qb2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qb2_placeholder" placeholder="Weight (kg·m/s²)">
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
                outline_aralin1: "Lesson 1: Comparing Mass and Weight",
                outline_aralin2: "Lesson 2: Measurement Units and Conversion",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Mass and Weight",
                h1_subtitle: "Studying the difference between Mass (amount of material) and Weight (force of gravity).",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Explain the difference between <b>Mass</b> and <b>Weight</b>.",
                obj_2: "Identify units of measurement (e.g., kg, lb, kg&sdot;m/s²).",
                obj_3: "Convert units and solve related problems.",
                
                // Lesson 1 Content (Mass vs. Weight)
                aralin1_title: "Lesson 1: Comparing Mass and Weight",
                aralin1_p1: "<b>Mass</b> is the inherent property of an object. It is the amount of material (matter) an object contains and <b>does not change</b> regardless of where it is placed (on the moon, on a mountain, or on a plain).",
                aralin1_p2: "<b>Weight</b> is the force pulling an object toward the center of the Earth (or another planet/moon). It <b>changes</b> depending on the <b>acceleration due to gravity (g)</b> of a location.",
                aralin1_h3_1: "Weight Formula",
                aralin1_p3: "Weight (W) can be calculated using the formula:",
                aralin1_formula: "Weight (W) = Mass (m) x Gravity (g)",
                aralin1_p4: "On Earth, gravity (g) is approximately <b>9.81 m/s²</b>. The unit of Weight is usually <b>kg&sdot;m/s²</b> or <b>Newton</b>.",
                aralin1_ex1_title: "EXAMPLE: Weight of an Astronaut with a mass of 55 kg.",
                aralin1_ex1_step1: "<b>Weight on Earth (g = 9.81 m/s²):</b>",
                aralin1_ex1_solution1: " W = 55 kg x 9.81 m/s² ≈ <b>539.55 kg&sdot;m/s²</b> ",
                aralin1_ex1_step2: "<b>Weight on the Moon (g = 1.64 m/s²):</b>",
                aralin1_ex1_solution2: " W = 55 kg x 1.64 m/s² ≈ <b>90.20 kg&sdot;m/s²</b> ",
                aralin1_ex1_conclusion: "It can be seen that the weight on the moon is lower because gravity is weaker, but the mass (55 kg) remains the same.",

                // Lesson 2 Content (Units and Conversion)
                aralin2_title: "Lesson 2: Measurement Units and Conversion",
                aralin2_p1: "The <b>Conversion Factor</b> and <b>Ratio</b> are used to convert one unit to another. When solving problems, the units used in the measurements must be the same.",
                aralin2_h3_1: "Measurement Table",
                aralin2_table1_header: "<th>Mass Unit (Metric)</th><th>Equivalent (Metric)</th>",
                aralin2_table1_row1: "<td>1 kilogram (kg)</td><td>1,000 grams (g)</td>",
                aralin2_table1_row2: "<td>1 gram (g)</td><td>1,000 milligrams (mg)</td>",
                aralin2_table1_row3: "<td>1 tonne (T)</td><td>1,000 kilograms (kg)</td>",
                aralin2_table2_header: "<th>Conversion Factor (Metric ↔ English)</th><th>Equivalent (Approx.)</th>",
                aralin2_table2_row1: "<td>1 kilogram (kg)</td><td>2.2 pounds (lb)</td>",
                aralin2_table2_row2: "<td>1 pound (lb)</td><td>0.45 kilograms (kg)</td>",
                aralin2_table2_row3: "<td>1 pound (lb)</td><td>4.45 Newton (kg&sdot;m/s²)</td>",
                aralin2_ex1_title: "EXAMPLE 1: How many grams are in 3 kilograms of fertilizer?",
                aralin2_ex1_step1: "Conversion Factor: 1 kg = 1,000 g.",
                aralin2_ex1_solution: " 3 kg x (1,000 g / 1 kg) = <b>3,000 grams</b> ",
                aralin2_ex2_title: "EXAMPLE 2: Nonoy's weight (121 lb) in kg&sdot;m/s².",
                aralin2_ex2_step1: "Conversion Factor: 1 lb = 4.45 kg&sdot;m/s².",
                aralin2_ex2_solution: " 121 lb x (4.45 kg&sdot;m/s² / 1 lb) ≈ <b>538.45 kg&sdot;m/s²</b> ",
                aralin2_h3_2: "Measuring Tools",
                aralin2_p2: "Various scales are used to measure mass:",
                aralin2_l1: "<b>Timbangan (Scale)</b>: Commonly used in the market.",
                aralin2_l2: "<b>Platform Balance</b>: Used in the laboratory, can measure up to 0.01 grams (mg).",
                aralin2_l3: "<b>Platform Scale</b>: For large masses (e.g., cement, sand).",
                aralin2_l4: "<b>Digital Scale</b>: Provides accurate measurement.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Solve the following problems. Use 9.81 m/s² for Earth's gravity.",
                quiz_section1_title: "A. Conversion and Mass (1-2)",
                qa1_label: "1. How many grams (g) is 10 milligrams (mg)?",
                qa1_placeholder: "Answer (g)",
                qa2_label: "2. How many pounds (lb) is 400 kilograms (kg)?",
                qa2_placeholder: "Answer (lb)",
                quiz_section2_title: "B. Weight Problem (3-4)",
                qb1_label: "3. If a person has a mass of 67 kg, what is their weight on Earth?",
                qb1_placeholder: "Weight (kg·m/s²)",
                qb2_label: "4. A person weighs 132 lb on Earth. What is their weight on Mars (g = 3.7 m/s²)?",
                qb2_placeholder: "Weight (kg·m/s²)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Mass and Weight calculations!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the conversion and weight formulas.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Re-read the entire module.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pagkukumpara sa Mass at Timbang",
                outline_aralin2: "Aralin 2: Mga Yunit ng Pagsukat (Conversion)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Mass at Timbang",
                h1_subtitle: "Pag-aaral ng pagkakaiba ng Mass (dami ng materyal) at Timbang (puwersa ng grabidad).",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ipaliwanag ang pagkakaiba ng <b>Mass</b> at <b>Timbang</b>.",
                obj_2: "Tukuyin ang mga yunit ng pagsukat (hal. kg, lb, kg&sdot;m/s²).",
                obj_3: "Magsalin ng mga yunit (conversion) at lutasin ang mga problemang may kinalaman dito.",
                
                // Lesson 1 Content (Mass vs. Weight)
                aralin1_title: "Aralin 1: Pagkukumpara sa Mass at Timbang",
                aralin1_p1: "Ang <b>Mass</b> ay ang likas na katangian ng isang bagay. Ito ang dami o laki ng materyal (matter) na taglay ng isang bagay at <b>hindi nagbabago</b> kahit saan man ito ilagay (sa buwan, sa bundok, o sa kapatagan).",
                aralin1_p2: "Ang <b>Timbang (Weight)</b> ay ang puwersang humihila sa isang bagay patungo sa sentro ng mundo (o iba pang planeta/buwan). Ito ay <b>nagbabago</b> depende sa <b>bilis o tulin na dulot ng grabidad (g)</b> ng isang lugar.",
                aralin1_h3_1: "Formula ng Timbang",
                aralin1_p3: "Maaaring kalkulahin ang Timbang (T) gamit ang formula na:",
                aralin1_formula: "Timbang (T) = Mass (m) x Grabidad (g)",
                aralin1_p4: "Sa Daigdig (Earth), ang grabidad (g) ay humigit-kumulang <b>9.81 m/s²</b>. Ang unit ng Timbang ay kadalasang <b>kg&sdot;m/s²</b> o <b>Newton</b>.",
                aralin1_ex1_title: "HALIMBAWA: Timbang ng isang Astronaut na may 55 kg na mass.",
                aralin1_ex1_step1: "<b>Timbang sa Mundo (g = 9.81 m/s²):</b>",
                aralin1_ex1_solution1: " T = 55 kg x 9.81 m/s² ≈ <b>539.55 kg&sdot;m/s²</b> ",
                aralin1_ex1_step2: "<b>Timbang sa Buwan (g = 1.64 m/s²):</b>",
                aralin1_ex1_solution2: " T = 55 kg x 1.64 m/s² ≈ <b>90.20 kg&sdot;m/s²</b> ",
                aralin1_ex1_conclusion: "Makikita na mas mababa ang timbang sa buwan dahil mas mahina ang grabidad, ngunit ang mass (55 kg) ay nanatili.",

                // Lesson 2 Content (Units and Conversion)
                aralin2_title: "Aralin 2: Mga Yunit ng Pagsukat (Conversion)",
                aralin2_p1: "Ginagamit ang <b>Conversion Factor</b> at <b>Ratio</b> para magpalit ng isang yunit patungo sa isa pa. Sa paglutas ng problema, kailangang maging magkapareho ang yunit ng mga ginagamit na sukat.",
                aralin2_h3_1: "Talahanayan ng Sukat",
                aralin2_table1_header: "<th>Yunit ng Mass (Metriko)</th><th>Katumbas (Metriko)</th>",
                aralin2_table1_row1: "<td>1 kilogramo (kg)</td><td>1,000 gramo (g)</td>",
                aralin2_table1_row2: "<td>1 gramo (g)</td><td>1,000 miligramo (mg)</td>",
                aralin2_table1_row3: "<td>1 tonelada (T)</td><td>1,000 kilogramo (kg)</td>",
                aralin2_table2_header: "<th>Conversion Factor (Metriko ↔ Ingles)</th><th>Katumbas (Approx.)</th>",
                aralin2_table2_row1: "<td>1 kilogramo (kg)</td><td>2.2 libra (lb)</td>",
                aralin2_table2_row2: "<td>1 libra (lb)</td><td>0.45 kilogramo (kg)</td>",
                aralin2_table2_row3: "<td>1 libra (lb)</td><td>4.45 Newton (kg&sdot;m/s²)</td>",
                aralin2_ex1_title: "HALIMBAWA 1: Ilang gramo ang 3 kilo ng abono?",
                aralin2_ex1_step1: "Conversion Factor: 1 kg = 1,000 g.",
                aralin2_ex1_solution: " 3 kg x (1,000 g / 1 kg) = <b>3,000 gramo</b> ",
                aralin2_ex2_title: "HALIMBAWA 2: Timbang ni Nonoy (121 lb) sa kg&sdot;m/s².",
                aralin2_ex2_step1: "Conversion Factor: 1 lb = 4.45 kg&sdot;m/s².",
                aralin2_ex2_solution: " 121 lb x (4.45 kg&sdot;m/s² / 1 lb) ≈ <b>538.45 kg&sdot;m/s²</b> ",
                aralin2_h3_2: "Mga Kagamitan sa Pagsukat",
                aralin2_p2: "Ginagamit ang iba't ibang timbangan para sukatin ang mass:",
                aralin2_l1: "<b>Timbangan (Scale)</b>: Karaniwan sa palengke.",
                aralin2_l2: "<b>Platform Balance</b>: Ginagamit sa laboratoryo, nakakapagbigay ng sukat hanggang 0.01 gramo (mg).",
                aralin2_l3: "<b>Platform Scale</b>: Para sa malalaking mass (hal. semento, buhangin).",
                aralin2_l4: "<b>Timbangang Digital</b>: Nagbibigay ng tumpak na sukat.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Lutasin ang sumusunod na problema. Gamitin ang 9.81 m/s² para sa grabidad ng mundo.",
                quiz_section1_title: "A. Conversion at Mass (1-2)",
                qa1_label: "1. Ilang gramo (g) ang 10 miligramo (mg)?",
                qa1_placeholder: "Sagot (g)",
                qa2_label: "2. Ilang libra (lb) ang 400 kilogramo (kg)?",
                qa2_placeholder: "Sagot (lb)",
                quiz_section2_title: "B. Timbang (Weight) Problem (3-4)",
                qb1_label: "3. Kung ang isang tao ay may mass na 67 kg, ano ang timbang niya sa mundo?",
                qb1_placeholder: "Timbang (kg·m/s²)",
                qb2_label: "4. Isang tao ang tumitimbang ng 132 lb sa mundo. Ano ang timbang niya sa Mars (g = 3.7 m/s²)?",
                qb2_placeholder: "Timbang (kg·m/s²)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Na-master mo na ang pagkalkula ng Mass at Timbang!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga formula ng conversion at timbang.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang buong modyul.`,
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
                    // Use innerHTML for text that contains <b> tags or math symbols
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
            // Initial state check for open details
            const arrow = detail.querySelector('svg');
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
        // Renamed 'tungkol-saan' to 'objectives' for clarity
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


        // Function to standardize numerical input for float comparison
        function standardizeFloat(value) {
            if (typeof value !== 'string') value = String(value);
            // Allow numbers, period (for decimals)
            value = value.trim().replace(/\s/g, '').replace(/[^0-9.]/g, ''); 
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
        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 4; 
            const resultsDiv = document.getElementById('results');
            
            // --- Constants ---
            const G_EARTH = 9.81;
            const KG_TO_LB = 2.2;
            const LB_TO_KG = 1 / KG_TO_LB; // ~0.4545
            
            // --- Expected Calculations ---
            
            // Q1: 10 mg to g. 10 mg / 1000 mg/g = 0.01 g
            const ans_q1 = 0.01;
            
            // Q2: 400 kg to lb. 400 kg * 2.2 lb/kg = 880 lb
            const ans_q2 = 880;
            
            // Q3: Timbang sa Mundo. Mass = 67 kg. T = 67 * 9.81 = 657.27 kg·m/s²
            const mass_q3 = 67;
            const ans_q3 = (mass_q3 * G_EARTH); // 657.27
            
            // Q4: Timbang sa Mars. T_earth = 132 lb. 
            // 1. Convert T_earth (lb) to Mass (kg). Mass = 132 lb * 0.4545... kg/lb 
            const mass_q4 = (132 * LB_TO_KG); 
            // 2. T_mars = Mass * G_mars (3.7 m/s²). 
            const ans_q4 = (mass_q4 * 3.7); // 222.04...

            if (!isLanguageToggle) {
                // --- Check Answers ---
                // Q1 (g): Use tolerance for decimals
                correctCount += checkAnswer('qa1', ans_q1, 0.001); 
                // Q2 (lb): Integer, use tolerance 0
                correctCount += checkAnswer('qa2', ans_q2, 0); 
                // Q3 (kg·m/s²): Use tolerance for float
                correctCount += checkAnswer('qb1', ans_q3, 0.01); 
                // Q4 (kg·m/s²): Use tolerance for float
                correctCount += checkAnswer('qb2', ans_q4, 0.01); 
                
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
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions);
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
        
        document.getElementById('mass-weight-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); 
        });
        
        window.addEventListener('load', () => {
             // Initialize default language (English) and outline highlight on load
             updateLanguage('en');
        });
    </script>
</body>
</html>
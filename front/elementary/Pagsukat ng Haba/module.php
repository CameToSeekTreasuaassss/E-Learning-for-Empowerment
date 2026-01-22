<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Measurement of Length and Distance</title>
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
        
        /* NEW: Class for math display in lessons */
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

        <!-- Left Column: Outline and Translator (Made sticky on large screens) -->
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: The Metric System</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: The English System</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Unit Conversion (Metric ↔ English)</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Measurement of Length and Distance</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Learning Metric, English, and Conversion of units of measurement.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Estimate the length of objects and distance using non-standard measuring tools (e.g., <b>handspan</b>, <b>steps</b>).</li>
                        <li data-i18n="obj_2">Measure and record the length of objects using the <b>Metric</b> and <b>English</b> systems of units.</li>
                        <li data-i18n="obj_3">Convert small units of length to larger units, and vice-versa.</li>
                        <li data-i18n="obj_4">Convert units from the <b>Metric system</b> to the <b>English system</b>, and vice-versa.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Metrikong Sistema ng Pagsukat -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: The Metric System of Measurement</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">Before standards were set, <b>non-standard tools</b> (such as <b>handspan</b>, <b>feet</b>, or <b>cubit</b>) were used to measure length. However, since the size of a person's body varies, this is not reliable. </p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">The Meter (m) and its Prefixes</h3>
                            <p data-i18n="aralin1_p2">The <b>Metric System</b> uses the <b>meter (m)</b> as the base unit of length. It is based on multiples of ten, making unit conversion easy.</p>

                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full">
                                    <thead>
                                        <tr data-i18n="aralin1_table_header"><th>Unit</th><th>Symbol</th><th>Equivalent in Meters</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin1_table_row1"><td><b>Kilometer</b></td><td>km</td><td>1,000 meters</td></tr>
                                        <tr data-i18n="aralin1_table_row2"><td>Hectometer</td><td>hm</td><td>100 meters</td></tr>
                                        <tr data-i18n="aralin1_table_row3"><td>Decameter</td><td>dam</td><td>10 meters</td></tr>
                                        <tr data-i18n="aralin1_table_row4"><td><b>Meter</b></td><td>m</td><td>1 meter</td></tr>
                                        <tr data-i18n="aralin1_table_row5"><td>Decimeter</td><td>dm</td><td>0.1 meter (1/10)</td></tr>
                                        <tr data-i18n="aralin1_table_row6"><td><b>Centimeter</b></td><td>cm</td><td>0.01 meter (1/100)</td></tr>
                                        <tr data-i18n="aralin1_table_row7"><td><b>Millimeter</b></td><td>mm</td><td>0.001 meter (1/1000)</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Conversion in the Metric System</h3>
                                                        <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_q">EXAMPLE: Convert 500 meters to Kilometers.</p>
                                <p data-i18n="aralin1_ex1_p">Since 1 km = 1,000 m, the factor is <b>1 km / 1,000 m</b>.</p>
                                <p class="math-display" data-i18n="aralin1_ex1_math">
                                    500 m &times; (1 km / 1,000 m) = <b>0.5 km</b>
                                </p>
                            </div>
                             <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_q">EXAMPLE: Convert 25 centimeters to meters.</p>
                                <p data-i18n="aralin1_ex2_p">The conversion factor is <b>1 m / 100 cm</b>.</p>
                                <p class="math-display" data-i18n="aralin1_ex2_math">
                                    25 cm &times; (1 m / 100 cm) = <b>0.25 m</b>
                                </p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Ingles na Sistema ng Pagsukat -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: The English System of Measurement</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">The <b>English System</b> (U.S. Customary) uses units that are not based on powers of ten, making conversion more complex.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Units and Conversion Factors (English)</h3>
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full">
                                    <thead>
                                        <tr data-i18n="aralin2_table_header"><th>Unit of Measure</th><th>Equivalent Unit</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin2_table_row1"><td><b>1 foot (ft.)</b></td><td>12 inches (in.)</td></tr>
                                        <tr data-i18n="aralin2_table_row2"><td><b>1 yard (yd.)</b></td><td>3 feet</td></tr>
                                        <tr data-i18n="aralin2_table_row3"><td><b>1 mile (mi.)</b></td><td>5,280 feet</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Conversion in the English System</h3>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_q">EXAMPLE: Convert 48 inches to feet.</p>
                                <p data-i18n="aralin2_ex1_p">Since 1 foot = 12 inches, the factor is <b>1 foot / 12 inches</b>.</p>
                                <p class="math-display" data-i18n="aralin2_ex1_math">
                                    48 inches &divide; 12 inches/foot = <b>4 feet</b>
                                </p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_3">Height Conversion</h3>
                            <p data-i18n="aralin2_p2">If Anne is 72 inches tall, her height in feet is:</p>
                            <p class="math-display" data-i18n="aralin2_math_1">
                                72 inches &divide; 12 inches/foot = <b>6 feet</b>
                            </p>
                        </div>
                    </details>
                    
                    <!-- ARALIN 3: Ating Palitan ang mga Yunit (Cross-System Conversion) -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Unit Conversion (Metric ↔ English)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">The final step is converting units between the Metric and English systems.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Key Conversion Factors (Metric ↔ English)</h3>
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full">
                                    <thead>
                                        <tr data-i18n="aralin3_table_header"><th>English System</th><th>Metric Equivalent</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin3_table_row1"><td><b>1 inch</b> (in.)</td><td>2.54 centimeters (cm)</td></tr>
                                        <tr data-i18n="aralin3_table_row2"><td><b>3.28 feet</b> (ft.)</td><td>1 meter (m)</td></tr>
                                        <tr data-i18n="aralin3_table_row3"><td><b>1.09 yards</b> (yd.)</td><td>1 meter (m)</td></tr>
                                        <tr data-i18n="aralin3_table_row4"><td><b>1 mile</b> (mi.)</td><td>1.61 kilometers (km)</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">Multi-Step Conversion</h3>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex1_q">EXAMPLE: How many inches is 4.5 meters?</p>
                                <p data-i18n="aralin3_ex1_p">Two steps are needed: Meters → Feet → Inches.</p>
                                
                                <p class="font-semibold mt-2" data-i18n="aralin3_ex1_h1">Step 1: Meters → Feet</p>
                                <p class="math-display" data-i18n="aralin3_ex1_math1">
                                    4.5 m &times; (3.28 feet / 1 m) = <b>14.76 feet</b>
                                </p>
                                
                                <p class="font-semibold mt-2" data-i18n="aralin3_ex1_h2">Step 2: Feet → Inches</p>
                                <p class="math-display" data-i18n="aralin3_ex1_math2">
                                    14.76 feet &times; (12 inches / 1 foot) = <b>177.12 inches</b>
                                </p>
                            </div>
                            
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Solve the unit conversion problems. (Ensure answers are rounded to 2 decimal places if not a whole number)</p>

                    <form id="length-conversion-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Cross-System Conversion (English ↔ Metric)</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1_conv" class="font-medium" data-i18n="qa1_label">1. A building is 2,000 feet tall. How many centimeters (cm) is this? (1 ft=12 in; 1 in=2.54 cm):</label>
                                    <input type="text" id="qa1_conv" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_height_cm" placeholder="Height in cm">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2_conv" class="font-medium" data-i18n="qa2_label">2. A river is 4 km long. How many feet (ft.) is this? (1 km = 3280.84 ft.):</label>
                                    <input type="text" id="qa2_conv" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_length_ft" placeholder="Length in ft.">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Metric → Metric Conversion</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1_conv" class="font-medium" data-i18n="qb1_label">1. A pencil is 3,000 millimeters (mm) long. How many meters (m) is this?</label>
                                    <input type="text" id="qb1_conv" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_length_m" placeholder="Length in m">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2_conv" class="font-medium" data-i18n="qb2_label">2. How long is 5 hectometers (hm) when expressed in millimeters (mm)?</label>
                                    <input type="text" id="qb2_conv" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_length_mm" placeholder="Length in mm">
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
                outline_aralin1: "Lesson 1: The Metric System",
                outline_aralin2: "Lesson 2: The English System",
                outline_aralin3: "Lesson 3: Unit Conversion (Metric ↔ English)",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Measurement of Length and Distance",
                h1_subtitle: "Learning Metric, English, and Conversion of units of measurement.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Estimate the length of objects and distance using non-standard measuring tools (e.g., <b>handspan</b>, <b>steps</b>).",
                obj_2: "Measure and record the length of objects using the <b>Metric</b> and <b>English</b> systems of units.",
                obj_3: "Convert small units of length to larger units, and vice-versa.",
                obj_4: "Convert units from the <b>Metric system</b> to the <b>English system</b>, and vice-versa.",

                // Lesson 1 Content (Metric)
                aralin1_title: "Lesson 1: The Metric System of Measurement",
                aralin1_p1: "Before standards were set, <b>non-standard tools</b> (such as <b>handspan</b>, <b>feet</b>, or <b>cubit</b>) were used to measure length. However, since the size of a person's body varies, this is not reliable.",
                aralin1_h3_1: "The Meter (m) and its Prefixes",
                aralin1_p2: "The <b>Metric System</b> uses the <b>meter (m)</b> as the base unit of length. It is based on multiples of ten, making unit conversion easy.",
                aralin1_table_header: "<th>Unit</th><th>Symbol</th><th>Equivalent in Meters</th>",
                aralin1_table_row1: "<td><b>Kilometer</b></td><td>km</td><td>1,000 meters</td>",
                aralin1_table_row2: "<td>Hectometer</td><td>hm</td><td>100 meters</td>",
                aralin1_table_row3: "<td>Decameter</td><td>dam</td><td>10 meters</td>",
                aralin1_table_row4: "<td><b>Meter</b></td><td>m</td><td>1 meter</td>",
                aralin1_table_row5: "<td>Decimeter</td><td>dm</td><td>0.1 meter (1/10)</td>",
                aralin1_table_row6: "<td><b>Centimeter</b></td><td>cm</td><td>0.01 meter (1/100)</td>",
                aralin1_table_row7: "<td><b>Millimeter</b></td><td>mm</td><td>0.001 meter (1/1000)</td>",
                aralin1_h3_2: "Conversion in the Metric System",
                aralin1_ex1_q: "EXAMPLE: Convert 500 meters to Kilometers.",
                aralin1_ex1_p: "Since 1 km = 1,000 m, the factor is <b>1 km / 1,000 m</b>.",
                aralin1_ex1_math: '500 m &times; (1 km / 1,000 m) = <b>0.5 km</b>',
                aralin1_ex2_q: "EXAMPLE: Convert 25 centimeters to meters.",
                aralin1_ex2_p: "The conversion factor is <b>1 m / 100 cm</b>.",
                aralin1_ex2_math: '25 cm &times; (1 m / 100 cm) = <b>0.25 m</b>',

                // Lesson 2 Content (English)
                aralin2_title: "Lesson 2: The English System of Measurement",
                aralin2_p1: "The <b>English System</b> (U.S. Customary) uses units that are not based on powers of ten, making conversion more complex.",
                aralin2_h3_1: "Units and Conversion Factors (English)",
                aralin2_table_header: "<th>Unit of Measure</th><th>Equivalent Unit</th>",
                aralin2_table_row1: "<td><b>1 foot (ft.)</b></td><td>12 inches (in.)</td>",
                aralin2_table_row2: "<td><b>1 yard (yd.)</b></td><td>3 feet</td>",
                aralin2_table_row3: "<td><b>1 mile (mi.)</b></td><td>5,280 feet</td>",
                aralin2_h3_2: "Conversion in the English System",
                aralin2_ex1_q: "EXAMPLE: Convert 48 inches to feet.",
                aralin2_ex1_p: "Since 1 foot = 12 inches, the factor is <b>1 foot / 12 inches</b>.",
                aralin2_ex1_math: '48 inches &divide; 12 inches/foot = <b>4 feet</b>',
                aralin2_h3_3: "Height Conversion",
                aralin2_p2: "If Anne is 72 inches tall, her height in feet is:",
                aralin2_math_1: '72 inches &divide; 12 inches/foot = <b>6 feet</b>',

                // Lesson 3 Content (Cross-System)
                aralin3_title: "Lesson 3: Unit Conversion (Metric ↔ English)",
                aralin3_p1: "The final step is converting units between the Metric and English systems.",
                aralin3_h3_1: "Key Conversion Factors (Metric ↔ English)",
                aralin3_table_header: "<th>English System</th><th>Metric Equivalent</th>",
                aralin3_table_row1: "<td><b>1 inch</b> (in.)</td><td>2.54 centimeters (cm)</td>",
                aralin3_table_row2: "<td><b>3.28 feet</b> (ft.)</td><td>1 meter (m)</td>",
                aralin3_table_row3: "<td><b>1.09 yards</b> (yd.)</td><td>1 meter (m)</td>",
                aralin3_table_row4: "<td><b>1 mile</b> (mi.)</td><td>1.61 kilometers (km)</td>",
                aralin3_h3_2: "Multi-Step Conversion",
                aralin3_ex1_q: "EXAMPLE: How many inches is 4.5 meters?",
                aralin3_ex1_p: "Two steps are needed: Meters → Feet → Inches.", // Simplified arrow
                aralin3_ex1_h1: "Step 1: Meters → Feet", // Simplified arrow
                aralin3_ex1_math1: '4.5 m &times; (3.28 feet / 1 m) = <b>14.76 feet</b>',
                aralin3_ex1_h2: "Step 2: Feet → Inches", // Simplified arrow
                aralin3_ex1_math2: '14.76 feet &times; (12 inches / 1 foot) = <b>177.12 inches</b>',
                
                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Solve the unit conversion problems. (Ensure answers are rounded to 2 decimal places if not a whole number)",
                quiz_section_a: "A. Cross-System Conversion (English ↔ Metric)",
                qa1_label: "1. A building is 2,000 feet tall. How many centimeters (cm) is this? (1 ft=12 in; 1 in=2.54 cm):",
                qa2_label: "2. A river is 4 km long. How many feet (ft.) is this? (1 km = 3280.84 ft.):",
                quiz_section_b: "B. Metric → Metric Conversion", // Simplified arrow
                qb1_label: "1. A pencil is 3,000 millimeters (mm) long. How many meters (m) is this?",
                qb2_label: "2. How long is 5 hectometers (hm) when expressed in millimeters (mm)?",
                quiz_button: "Check Answers",
                placeholder_height_cm: "Height in cm",
                placeholder_length_ft: "Length in ft.",
                placeholder_length_m: "Length in m",
                placeholder_length_mm: "Length in mm",

                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered unit conversion.`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Read Lessons 1, 2, and 3 again.`,

            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Metrikong Sistema ng Pagsukat",
                outline_aralin2: "Aralin 2: Ingles na Sistema ng Pagsukat",
                outline_aralin3: "Aralin 3: Ating Palitan ang mga Yunit (Metriko ↔ Ingles)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Pagsukat ng Haba at Layo",
                h1_subtitle: "Pag-aaral ng Metriko, Ingles, at Conversion ng mga yunit ng pagsukat.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Estimahin ang haba ng mga bagay at layo gamit ang walang pamantayang kagamitan sa pagsukat (e.g., <b>dangkal</b>, <b>hakbang</b>).",
                obj_2: "Sukatin at itala ang haba ng mga bagay gamit ang <b>Metriko</b> at <b>Ingles</b> na sistema ng mga yunit.",
                obj_3: "Palitan ang maliliit na yunit ng haba tungo sa malalaking yunit, at baliktaran.",
                obj_4: "Palitan ang mga yunit mula sa <b>Metrikong sistema</b> tungo sa <b>Ingles na sistema</b>, at baliktaran.",

                // Lesson 1 Content (Metric)
                aralin1_title: "Aralin 1: Metrikong Sistema ng Pagsukat",
                aralin1_p1: "Bago ang mga pamantayan, ginamit ang <b>walang pamantayang kagamitan</b> (tulad ng <b>dangkal</b>, <b>piye</b>, o <b>cubit</b>) para sukatin ang haba. Ngunit dahil nag-iiba-iba ang laki ng katawan ng tao, hindi ito maaasahan.",
                aralin1_h3_1: "Ang Metro (m) at ang mga Prefixes",
                aralin1_p2: "Ang <b>Metrikong Sistema</b> ay gumagamit ng <b>metro (m)</b> bilang pangunahing yunit ng haba. Ito ay batay sa mga multiple ng sampu, kaya madaling palitan ang mga yunit.",
                aralin1_table_header: "<th>Yunit</th><th>Simbolo</th><th>Katumbas sa Metro</th>",
                aralin1_table_row1: "<td><b>Kilometro</b></td><td>km</td><td>1,000 metro</td>",
                aralin1_table_row2: "<td>Hektometro</td><td>hm</td><td>100 metro</td>",
                aralin1_table_row3: "<td>Dekametro</td><td>dam</td><td>10 metro</td>",
                aralin1_table_row4: "<td><b>Metro</b></td><td>m</td><td>1 metro</td>",
                aralin1_table_row5: "<td>Desimetro</td><td>dm</td><td>0.1 metro (1/10)</td>",
                aralin1_table_row6: "<td><b>Sentimetro</b></td><td>cm</td><td>0.01 metro (1/100)</td>",
                aralin1_table_row7: "<td><b>Milimetro</b></td><td>mm</td><td>0.001 metro (1/1000)</td>",
                aralin1_h3_2: "Pagpapalit (Conversion) sa Metrikong Sistema",
                aralin1_ex1_q: "HALIMBAWA: Palitan ang 500 metro sa Kilometro.",
                aralin1_ex1_p: "Dahil ang 1 km = 1,000 m, ang factor ay <b>1 km / 1,000 m</b>.",
                aralin1_ex1_math: '500 m &times; (1 km / 1,000 m) = <b>0.5 km</b>',
                aralin1_ex2_q: "HALIMBAWA: Palitan ang 25 sentimetro sa metro.",
                aralin1_ex2_p: "Ang conversion factor ay <b>1 m / 100 cm</b>.",
                aralin1_ex2_math: '25 cm &times; (1 m / 100 cm) = <b>0.25 m</b>',

                // Lesson 2 Content (English)
                aralin2_title: "Aralin 2: Ingles na Sistema ng Pagsukat",
                aralin2_p1: "Ang <b>Ingles na Sistema</b> (U.S. Customary) ay gumagamit ng mga yunit na hindi batay sa kapangyarihan ng sampu, kaya mas kumplikado ang pagpapalit.",
                aralin2_h3_1: "Mga Yunit at Conversion Factor (Ingles)",
                aralin2_table_header: "<th>Yunit ng Sukat</th><th>Katumbas na Yunit</th>",
                aralin2_table_row1: "<td><b>1 piye (ft.)</b></td><td>12 pulgada (in.)</td>",
                aralin2_table_row2: "<td><b>1 yarda (yd.)</b></td><td>3 piye</td>",
                aralin2_table_row3: "<td><b>1 milya (mi.)</b></td><td>5,280 piye</td>",
                aralin2_h3_2: "Pagpapalit (Conversion) sa Ingles na Sistema",
                aralin2_ex1_q: "HALIMBAWA: Palitan ang 48 pulgada upang maging piye.",
                aralin2_ex1_p: "Dahil 1 piye = 12 pulgada, ang factor ay <b>1 piye / 12 pulgada</b>.",
                aralin2_ex1_math: '48 pulgada &divide; 12 pulgada/piye = <b>4 piye</b>',
                aralin2_h3_3: "Pagpapalit ng Taas",
                aralin2_p2: "Kung si Anne ay 72 pulgada ang taas, ang katumbas nito sa piye ay:",
                aralin2_math_1: '72 pulgada &divide; 12 pulgada/piye = <b>6 piye</b>',

                // Lesson 3 Content (Cross-System)
                aralin3_title: "Aralin 3: Ating Palitan ang mga Yunit (Metriko ↔ Ingles)",
                aralin3_p1: "Ang pinakahuling hakbang ay ang pagpapalit ng mga yunit sa pagitan ng Metriko at Ingles na sistema.",
                aralin3_h3_1: "Pangunahing Conversion Factor (Metriko ↔ Ingles)",
                aralin3_table_header: "<th>Ingles na Sistema</th><th>Katumbas na Metriko</th>",
                aralin3_table_row1: "<td><b>1 pulgada</b> (in.)</td><td>2.54 sentimetro (cm)</td>",
                aralin3_table_row2: "<td><b>3.28 piye</b> (ft.)</td><td>1 metro (m)</td>",
                aralin3_table_row3: "<td><b>1.09 yarda</b> (yd.)</td><td>1 metro (m)</td>",
                aralin3_table_row4: "<td><b>1 milya</b> (mi.)</td><td>1.61 kilometro (km)</td>",
                aralin3_h3_2: "Multi-Step Conversion",
                aralin3_ex1_q: "HALIMBAWA: Ilang pulgada ang katumbas ng 4.5 metro?",
                aralin3_ex1_p: "Kailangan ng dalawang hakbang: Metro → Piye → Pulgada.", // Simplified arrow
                aralin3_ex1_h1: "Hakbang 1: Metro → Piye", // Simplified arrow
                aralin3_ex1_math1: '4.5 m &times; (3.28 piye / 1 m) = <b>14.76 piye</b>',
                aralin3_ex1_h2: "Hakbang 2: Piye → Pulgada", // Simplified arrow
                aralin3_ex1_math2: '14.76 piye &times; (12 pulgada / 1 piye) = <b>177.12 pulgada</b>',
                
                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Lutasin ang mga suliranin sa pagpapalit ng yunit. (Tiyakin na 2 decimal places lang ang sagot kung hindi whole number)",
                quiz_section_a: "A. Cross-System Conversion (Ingles ↔ Metriko)",
                qa1_label: "1. Ang isang gusali ay 2,000 piye ang taas. Ilang sentimetro (cm) ito? (1 piye=12 pulgada; 1 pulgada=2.54 cm):",
                qa2_label: "2. Ang isang ilog ay 4 km ang haba. Ilang piye (ft.) ito? (1 km = 3280.84 ft.):",
                quiz_section_b: "B. Metriko (Metric) → Metriko (Metric)", // Simplified arrow
                qb1_label: "1. Ang isang lapis ay 3,000 milimetro (mm) ang haba. Ilang metro (m) ito?",
                qb2_label: "2. Gaano kahaba ang 5 hektometro (hm) kung ihahayag sa milimetro (mm)?",
                quiz_button: "Tingnan ang Sagot",
                placeholder_height_cm: "Taas sa cm",
                placeholder_length_ft: "Haba sa piye",
                placeholder_length_m: "Haba sa m",
                placeholder_length_mm: "Haba sa mm",

                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang unit conversion.`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga aralin para sa mga mali mong sagot.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang Aralin 1, 2, at 3.`,
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
            'aralin3', 
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
            
            // If precision is 0, return the rounded integer as a string
            if (precision === 0) return String(Math.round(parsedValue));
            
            // Otherwise, fix precision
            return parsedValue.toFixed(precision);
        }

        // Function to check a number answer, allowing for floating point precision
        function checkAnswer(id, expected, precision = 2) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            const standardizedValue = standardizeFloat(rawValue, precision);
            const standardizedExpected = standardizeFloat(expected, precision);
            
            let isCorrect = false;

            // Use loose comparison for floats or exact string match for standardized whole numbers
            if (Math.abs(parseFloat(standardizedValue) - parseFloat(standardizedExpected)) < 0.01) {
                isCorrect = true;
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
            const totalQuestions = 4; 
            const resultsDiv = document.getElementById('results');

            // --- Final Assessment Answers (Calculated based on module content) ---
            const answers = {
                // A1: 2,000 ft to cm. (2000 * 12 * 2.54 = 60960)
                qa1: 60960, 
                // A2: 4 km to ft. (4 * 3280.84 = 13123.36)
                qa2: 13123.36,
                // B1: 3,000 mm to m. (3000 / 1000 = 3)
                qb1: 3, 
                // B2: 5 hm to mm. (5 * 100 * 1000 = 500000)
                qb2: 500000,
            };
            
            if (!isLanguageToggle) {
                // Run checks only on button click, not language toggle
                correctCount += checkAnswer('qa1_conv', answers.qa1, 0); 
                correctCount += checkAnswer('qa2_conv', answers.qa2, 2); 
                correctCount += checkAnswer('qb1_conv', answers.qb1, 0); 
                correctCount += checkAnswer('qb2_conv', answers.qb2, 0); 
                
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
            } else if (correctCount >= totalQuestions * 0.7) { // 70% threshold
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

        // Handle Form Submission for the Final Assessment
        document.getElementById('length-conversion-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); 
        });
    </script>
</body>
</html>
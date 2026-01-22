<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Measuring Volume</title>
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: How Much Volume? (Basic Units)</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Are They Equal? (Conversion)</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Which is the Better Buy?</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Measuring Volume</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Learning how to measure the contents or capacity of a container and comparing prices.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Identify units used to measure the capacity of a container (volume).</li>
                        <li data-i18n="obj_2">Use standard tools and measuring cups to determine the volume of containers.</li>
                        <li data-i18n="obj_3">Convert one unit of volume measurement to another (e.g., liters to gallons, milliliters to liters).</li>
                        <li data-i18n="obj_4">Apply learned volume calculations to solve everyday problems.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Gaano Karami? (Pangunahing Yunit) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: How Much Volume? (Basic Units)</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1"><b>Volume</b> refers to the amount or quantity of content that a container can hold. Measuring volume is essential in cooking, purchasing goods, and administering the correct dosage of medicine. </p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Common Units of Volume</h3>
                            <p data-i18n="aralin1_p2">Here are the units used in volume measurement, from smallest to largest:</p>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin1_l1"><b>Teaspoon (tsp)</b>: Used for very small amounts (e.g., medicine).</li>
                                <li data-i18n="aralin1_l2"><b>Tablespoon (tbsp)</b>: Larger than tsp.</li>
                                <li data-i18n="aralin1_l3"><b>Cup</b>: Used in cooking.</li>
                                <li data-i18n="aralin1_l4"><b>Pint</b> (pt): Often used for ice cream or other liquids.</li>
                                <li data-i18n="aralin1_l5"><b>Quart</b> (qt): Equivalent to two pints.</li>
                                <li data-i18n="aralin1_l6"><b>Gallon</b> (gal): For large quantities (e.g., water, gasoline).</li>
                                <li data-i18n="aralin1_l7"><b>Milliliter (mL)</b> and <b>Liter (L)</b>: The primary units in the Metric System.</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Household Equivalents</h3>
                            <div class="example-box">
                                <p data-i18n="aralin1_ex_p1">Using simple measurements, you can determine the equivalents:</p>
                                <ul class="list-disc list-inside ml-4">
                                    <li data-i18n="aralin1_ex_l1"><b>One Tablespoon</b> is equivalent to <b>3 Teaspoons</b>.</li>
                                    <li data-i18n="aralin1_ex_l2"><b>One Cup</b> is equivalent to <b>16 Tablespoons</b>.</li>
                                    <li data-i18n="aralin1_ex_l3"><b>One Pint</b> (pt) is equivalent to <b>2 Cups</b>.</li>
                                    <li data-i18n="aralin1_ex_l4"><b>One Gallon</b> is equivalent to <b>8 Pints</b>.</li>
                                </ul>
                            </div>
                             <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Metric Units: Liter and Milliliter</h3>
                            <p data-i18n="aralin1_p3">The <b>Liter (L)</b> is the most common unit in the Metric System. Every liter contains <b>1,000 milliliters (mL)</b>. mL is used for smaller amounts (e.g., soft drinks) and L for larger amounts (e.g., gasoline).</p>
                        </div>
                    </details>

                    <!-- ARALIN 2: Pareho Ba Sila? (Conversion) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Are They Equal? (Unit Conversion)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">To compare the volume of two products, they must be converted to a <b>single unit of measurement</b> using the <b>Conversion Factor</b>. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Conversion Factors (Metric ↔ English)</h3>
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full">
                                    <thead>
                                        <tr data-i18n="aralin2_table_header"><th>Volume Unit</th><th>Equivalent</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin2_table_row1"><td>1 teaspoon (tsp)</td><td>5 milliliters (mL)</td></tr>
                                        <tr data-i18n="aralin2_table_row2"><td>1 tablespoon (tbsp)</td><td>15 milliliters (mL)</td></tr>
                                        <tr data-i18n="aralin2_table_row3"><td>1 fluid ounce (fl. oz.)</td><td>30 milliliters (mL)</td></tr>
                                        <tr data-i18n="aralin2_table_row4"><td>1 pint (pt)</td><td>470 milliliters (mL)</td></tr>
                                        <tr data-i18n="aralin2_table_row5"><td>1 quart (qt)</td><td>950 milliliters (mL)</td></tr>
                                        <tr data-i18n="aralin2_table_row6"><td>1 gallon (gal)</td><td>3.8 liters (L)</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Ratio Conversion</h3>
                            <p data-i18n="aralin2_p2">We use a <b>unit factor</b> (conversion factor expressed as a ratio) to convert. The unit factor is used to cancel out the old unit and obtain the new unit.</p>
                            
                            <!-- SIMPLIFIED RATIO EXAMPLE -->
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_q">EXAMPLE 1: How many teaspoons (tsp) are equivalent to 10 mL of medicine?</p>
                                <p data-i18n="aralin2_ex1_step1">Step 1: Conversion Factor: <b>1 tsp = 5 mL</b>.</p>
                                <p data-i18n="aralin2_ex1_step2">Step 2: Use the factor as a ratio (1 tsp &divide; 5 mL) and multiply:</p>
                                <p class="math-display" data-i18n="aralin2_ex1_math"> 10 mL &times; (1 tsp &divide; 5 mL) = <b>2 tsp</b> </p>
                                <p data-i18n="aralin2_ex1_solution"><b>Solution:</b> (10 &divide; 5) &times; 1 tsp = 2 tsp</p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_3">Fraction Conversion</h3>
                            <p data-i18n="aralin2_p3">This is used to find a fraction of a total measurement.</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_q">EXAMPLE 2: Find the equivalent of 3/4 liter (L) in mL.</p>
                                <p data-i18n="aralin2_ex2_step1">Step 1: Conversion Factor: <b>1 L = 1,000 mL</b>.</p>
                                <p data-i18n="aralin2_ex2_step2">Step 2: Multiply the fraction by 1,000 mL:</p>
                                <p class="math-display" data-i18n="aralin2_ex2_math"> (3 &divide; 4) &times; 1,000 mL = <b>750 mL</b> </p>
                                <p data-i18n="aralin2_ex2_solution"><b>Solution:</b> 0.75 &times; 1,000 mL = 750 mL</p>
                            </div>
                            
                            <p class="mt-4 italic" data-i18n="aralin2_p4">Remember: Converting a smaller unit to a larger unit means <b>division</b>. Converting a larger unit to a smaller unit means <b>multiplication</b>.</p>
                        </div>
                    </details>
                    
                    <!-- ARALIN 3: Alin ang Mas Sulit Bilhin? -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Which is the Better Buy? (Unit Cost)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">To determine which item is the better buy, you need to calculate the <b>Cost Per Unit</b> (price per unit) for each product. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Calculating Unit Cost</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin3_l1">Convert the volume of all products to a <b>single unit</b> (e.g., Liter or Milliliter).</li>
                                <li data-i18n="aralin3_l2">Divide the <b>Price</b> by the total <b>Volume</b> (Unit Cost = Price &divide; Volume).</li>
                                <li data-i18n="aralin3_l3">The product with the <b>lowest Unit Cost</b> is the better buy.</li>
                            </ol>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex_q">EXAMPLE: Which is the better buy?</p>
                                <p data-i18n="aralin3_ex_a"><b>Product A:</b> 2 Liters ₱38.00</p>
                                <p data-i18n="aralin3_ex_b"><b>Product B:</b> 1.9 Liters (1/2 gal) ₱35.00</p>
                                
                                <p class="font-semibold mt-2" data-i18n="aralin3_ex_calc_title">Calculate the Unit Cost (Cost per Liter):</p>
                                <ul class="list-disc list-inside ml-4">
                                    <li data-i18n="aralin3_ex_calc_a">Product A: ₱38.00 &divide; 2 L = <b>₱19.00 per Liter</b></li>
                                    <li data-i18n="aralin3_ex_calc_b">Product B: ₱35.00 &divide; 1.9 L ≈ <b>₱18.42 per Liter</b></li>
                                </ul>
                                <p class="mt-4" data-i18n="aralin3_ex_conclusion">Conclusion: <b>Product B</b> is the better buy because its price per liter is lower.</p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the conversion and "Better Buy" problems. Use Liters (L) and Milliliters (mL) for conversions.</p>

                    <form id="volume-conversion-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Conversion (Provide the Numerical Answer)</p>
                            <!-- UPDATED: Removed grid and used flex-col space-y-4 for vertical alignment -->
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. How many Milliliters (mL) are in 2.5 Liters (L)?</label>
                                    <input type="text" id="qa1" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (mL)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. How many Liters (L) are in 4,700 Milliliters (mL)?</label>
                                    <input type="text" id="qa2" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (L)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. How many Milliliters (mL) are in 12 fluid ounces (fl. oz.)?</label>
                                    <input type="text" id="qa3" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa3_placeholder" placeholder="Answer (mL)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. How many Pints (pt) are equivalent to 1 Gallon (gal)?</label>
                                    <input type="text" id="qa4" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa4_placeholder" placeholder="Answer (pt)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Which is the Better Buy? (Unit Cost Comparison)</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1" class="font-medium" data-i18n="qb1_label">1. Which is the better buy: <b>350 mL</b> ₱10.50 (A) or <b>12 fl. oz.</b> ₱7.20 (B)?</label>
                                    <input type="text" id="qb1" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qb1_placeholder" placeholder="A or B">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2" class="font-medium" data-i18n="qb2_label">2. Which is the better buy: <b>2 L</b> ₱38.00 (A) or <b>1.9 L</b> ₱35.00 (B)?</label>
                                    <input type="text" id="qb2" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qb2_placeholder" placeholder="A or B">
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
                outline_aralin1: "Lesson 1: How Much Volume? (Basic Units)",
                outline_aralin2: "Lesson 2: Are They Equal? (Conversion)",
                outline_aralin3: "Lesson 3: Which is the Better Buy?",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Measuring Volume",
                h1_subtitle: "Learning how to measure the contents or capacity of a container and comparing prices.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Identify units used to measure the capacity of a container (volume).",
                obj_2: "Use standard tools and measuring cups to determine the volume of containers.",
                obj_3: "Convert one unit of volume measurement to another (e.g., liters to gallons, milliliters to liters).",
                obj_4: "Apply learned volume calculations to solve everyday problems.",

                // Lesson 1 Content (Basic Units)
                aralin1_title: "Lesson 1: How Much Volume? (Basic Units)",
                aralin1_p1: "<b>Volume</b> refers to the amount or quantity of content that a container can hold. Measuring volume is essential in cooking, purchasing goods, and administering the correct dosage of medicine. ",
                aralin1_h3_1: "Common Units of Volume",
                aralin1_p2: "Here are the units used in volume measurement, from smallest to largest:",
                aralin1_l1: "<b>Teaspoon (tsp)</b>: Used for very small amounts (e.g., medicine).",
                aralin1_l2: "<b>Tablespoon (tbsp)</b>: Larger than tsp.",
                aralin1_l3: "<b>Cup</b>: Used in cooking.",
                aralin1_l4: "<b>Pint</b> (pt): Often used for ice cream or other liquids.",
                aralin1_l5: "<b>Quart</b> (qt): Equivalent to two pints.",
                aralin1_l6: "<b>Gallon</b> (gal): For large quantities (e.g., water, gasoline).",
                aralin1_l7: "<b>Milliliter (mL)</b> and <b>Liter (L)</b>: The primary units in the Metric System.",
                aralin1_h3_2: "Household Equivalents",
                aralin1_ex_p1: "Using simple measurements, you can determine the equivalents:",
                aralin1_ex_l1: "<b>One Tablespoon</b> is equivalent to <b>3 Teaspoons</b>.",
                aralin1_ex_l2: "<b>One Cup</b> is equivalent to <b>16 Tablespoons</b>.",
                aralin1_ex_l3: "<b>One Pint</b> (pt) is equivalent to <b>2 Cups</b>.",
                aralin1_ex_l4: "<b>One Gallon</b> is equivalent to <b>8 Pints</b>.",
                aralin1_h3_3: "Metric Units: Liter and Milliliter",
                aralin1_p3: "The <b>Liter (L)</b> is the most common unit in the Metric System. Every liter contains <b>1,000 milliliters (mL)</b>. mL is used for smaller amounts (e.g., soft drinks) and L for larger amounts (e.g., gasoline).",

                // Lesson 2 Content (Conversion)
                aralin2_title: "Lesson 2: Are They Equal? (Unit Conversion)",
                aralin2_p1: "To compare the volume of two products, they must be converted to a <b>single unit of measurement</b> using the <b>Conversion Factor</b>. ",
                aralin2_h3_1: "Conversion Factors (Metric ↔ English)",
                aralin2_table_header: "<th>Volume Unit</th><th>Equivalent</th>",
                aralin2_table_row1: "<td>1 teaspoon (tsp)</td><td>5 milliliters (mL)</td>",
                aralin2_table_row2: "<td>1 tablespoon (tbsp)</td><td>15 milliliters (mL)</td>",
                aralin2_table_row3: "<td>1 fluid ounce (fl. oz.)</td><td>30 milliliters (mL)</td>",
                aralin2_table_row4: "<td>1 pint (pt)</td><td>470 milliliters (mL)</td>",
                aralin2_table_row5: "<td>1 quart (qt)</td><td>950 milliliters (mL)</td>",
                aralin2_table_row6: "<td>1 gallon (gal)</td><td>3.8 liters (L)</td>",
                aralin2_h3_2: "Ratio Conversion",
                aralin2_p2: "We use a <b>unit factor</b> (conversion factor expressed as a ratio) to convert. The unit factor is used to cancel out the old unit and obtain the new unit.",
                aralin2_ex1_q: "EXAMPLE 1: How many teaspoons (tsp) are equivalent to 10 mL of medicine?",
                aralin2_ex1_step1: "Step 1: Conversion Factor: <b>1 tsp = 5 mL</b>.",
                aralin2_ex1_step2: "Step 2: Use the factor as a ratio (1 tsp &divide; 5 mL) and multiply:",
                aralin2_ex1_math: " 10 mL &times; (1 tsp &divide; 5 mL) = <b>2 tsp</b> ",
                aralin2_ex1_solution: "<b>Solution:</b> (10 &divide; 5) &times; 1 tsp = 2 tsp",
                aralin2_h3_3: "Fraction Conversion",
                aralin2_p3: "This is used to find a fraction of a total measurement.",
                aralin2_ex2_q: "EXAMPLE 2: Find the equivalent of 3/4 liter (L) in mL.",
                aralin2_ex2_step1: "Step 1: Conversion Factor: <b>1 L = 1,000 mL</b>.",
                aralin2_ex2_step2: "Step 2: Multiply the fraction by 1,000 mL:",
                aralin2_ex2_math: " (3 &divide; 4) &times; 1,000 mL = <b>750 mL</b> ",
                aralin2_ex2_solution: "<b>Solution:</b> 0.75 &times; 1,000 mL = 750 mL",
                aralin2_p4: "Remember: Converting a smaller unit to a larger unit means <b>division</b>. Converting a larger unit to a smaller unit means <b>multiplication</b>.",

                // Lesson 3 Content (Better Buy)
                aralin3_title: "Lesson 3: Which is the Better Buy? (Unit Cost)",
                aralin3_p1: "To determine which item is the better buy, you need to calculate the <b>Cost Per Unit</b> (price per unit) for each product.",
                aralin3_h3_1: "Calculating Unit Cost",
                aralin3_l1: "Convert the volume of all products to a <b>single unit</b> (e.g., Liter or Milliliter).",
                aralin3_l2: "Divide the <b>Price</b> by the total <b>Volume</b> (Unit Cost = Price &divide; Volume).",
                aralin3_l3: "The product with the <b>lowest Unit Cost</b> is the better buy.",
                aralin3_ex_q: "EXAMPLE: Which is the better buy?",
                aralin3_ex_a: "<b>Product A:</b> 2 Liters ₱38.00",
                aralin3_ex_b: "<b>Product B:</b> 1.9 Liters (1/2 gal) ₱35.00",
                aralin3_ex_calc_title: "Calculate the Unit Cost (Cost per Liter):",
                aralin3_ex_calc_a: "Product A: ₱38.00 &divide; 2 L = <b>₱19.00 per Liter</b>",
                aralin3_ex_calc_b: "Product B: ₱35.00 &divide; 1.9 L ≈ <b>₱18.42 per Liter</b>",
                aralin3_ex_conclusion: "Conclusion: <b>Product B</b> is the better buy because its price per liter is lower.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Answer the conversion and \"Better Buy\" problems. Use Liters (L) and Milliliters (mL) for conversions.",
                quiz_section_a: "A. Conversion (Provide the Numerical Answer)",
                qa1_label: "1. How many Milliliters (mL) are in 2.5 Liters (L)?",
                qa2_label: "2. How many Liters (L) are in 4,700 Milliliters (mL)?",
                qa3_label: "3. How many Milliliters (mL) are in 12 fluid ounces (fl. oz.)?",
                qa4_label: "4. How many Pints (pt) are equivalent to 1 Gallon (gal)?",
                qa1_placeholder: "Answer (mL)",
                qa2_placeholder: "Answer (L)",
                qa3_placeholder: "Answer (mL)",
                qa4_placeholder: "Answer (pt)",
                quiz_section_b: "B. Which is the Better Buy? (Unit Cost Comparison)",
                qb1_label: "1. Which is the better buy: <b>350 mL</b> ₱10.50 (A) or <b>12 fl. oz.</b> ₱7.20 (B)?",
                qb2_label: "2. Which is the better buy: <b>2 L</b> ₱38.00 (A) or <b>1.9 L</b> ₱35.00 (B)?",
                qb1_placeholder: "A or B",
                qb2_placeholder: "A or B",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered volume and unit cost comparison!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Read Lessons 1-3 again.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Gaano Karami? (Pangunahing Yunit)",
                outline_aralin2: "Aralin 2: Pareho Ba Sila? (Conversion)",
                outline_aralin3: "Aralin 3: Alin ang Mas Sulit Bilhin?",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Pagsukat ng Bolyum",
                h1_subtitle: "Pag-aaral kung paano sukatin ang laman o nilalaman ng isang lalagyan at pagkumpara ng mga presyo.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ipakita kung paano sukatin ang laman ng isang lalagyan (volume).",
                obj_2: "Gamitin ang mga panukat at kagamitan para tuusin ang bolyum ng mga lalagyan.",
                obj_3: "Mag-convert ng isang yunit ng pagsukat ng bolyum patungo sa iba (hal. litro sa galon, mililitro sa litro).",
                obj_4: "Gamitin ang natutuhan sa pagtuos ng bolyum sa pang-araw-araw na sitwasyon.",

                // Lesson 1 Content (Basic Units)
                aralin1_title: "Aralin 1: Gaano Karami? (Pangunahing Yunit)",
                aralin1_p1: "Ang <b>Bolyum (Volume)</b> ay tumutukoy sa dami o sukat ng laman na kayang taglayin ng isang lalagyan. Mahalaga itong sukatin sa pagluluto, pagbili, at pagbibigay ng tamang dosis ng gamot. ",
                aralin1_h3_1: "Mga Karaniwang Yunit ng Bolyum",
                aralin1_p2: "Narito ang mga yunit na ginagamit sa pagsukat ng bolyum, mula sa pinakamaliit hanggang sa pinakamalaki:",
                aralin1_l1: "<b>Teaspoon (tsp)</b>: Ginagamit sa napakaliit na dami (hal. gamot).",
                aralin1_l2: "<b>Tablespoon (tbsp)</b>: Mas malaki kaysa tsp.",
                aralin1_l3: "<b>Cup</b>: Ginagamit sa pagluluto.",
                aralin1_l4: "<b>Pint</b> (pt): Kadalasang ginagamit sa sorbetes o iba pang likido.",
                aralin1_l5: "<b>Quart</b> (qt): Katumbas ng dalawang pint.",
                aralin1_l6: "<b>Gallon</b> (gal): Para sa malalaking dami (hal. tubig, gasolina).",
                aralin1_l7: "<b>Milliliter (mL)</b> at <b>Liter (L)</b>: Ang pangunahing yunit sa Metrikong Sistema.",
                aralin1_h3_2: "Mga Equivalent (Katumbas) sa Bahay",
                aralin1_ex_p1: "Sa pamamagitan ng simpleng pagsukat, maaari mong malaman ang mga katumbas:",
                aralin1_ex_l1: "Ang <b>Isang Tablespoon</b> ay katumbas ng <b>3 Teaspoons</b>.",
                aralin1_ex_l2: "Ang <b>Isang Cup</b> ay katumbas ng <b>16 Tablespoons</b>.",
                aralin1_ex_l3: "Ang <b>Isang Pint</b> (pt) ay katumbas ng <b>2 Cups</b>.",
                aralin1_ex_l4: "Ang <b>Isang Gallon</b> ay katumbas ng <b>8 Pints</b>.",
                aralin1_h3_3: "Metrikong Yunit: Litro at Mililitro",
                aralin1_p3: "Ang <b>Litro (L)</b> ay ang pinakakaraniwang yunit ng Metrikong Sistema. Ang bawat litro ay may <b>1,000 mililitro (mL)</b>. Ginagamit ang mL para sa mas maliliit na dami (hal. soft drinks) at L para sa mas malalaking dami (hal. gasolina).",

                // Lesson 2 Content (Conversion)
                aralin2_title: "Aralin 2: Pareho Ba Sila? (Conversion ng Yunit)",
                aralin2_p1: "Para makumpara ang bolyum ng dalawang produkto, kailangan silang i-convert sa <b>iisang yunit ng pagsukat</b> gamit ang <b>Conversion Factor</b>. ",
                aralin2_h3_1: "Mga Conversion Factor (Metriko ↔ Ingles)",
                aralin2_table_header: "<th>Yunit ng Bolyum</th><th>Katumbas (Equivalent)</th>",
                aralin2_table_row1: "<td>1 teaspoon (tsp)</td><td>5 milliliters (mL)</td>",
                aralin2_table_row2: "<td>1 tablespoon (tbsp)</td><td>15 milliliters (mL)</td>",
                aralin2_table_row3: "<td>1 fluid ounce (fl. oz.)</td><td>30 milliliters (mL)</td>",
                aralin2_table_row4: "<td>1 pint (pt)</td><td>470 milliliters (mL)</td>",
                aralin2_table_row5: "<td>1 quart (qt)</td><td>950 milliliters (mL)</td>",
                aralin2_table_row6: "<td>1 gallon (gal)</td><td>3.8 liters (L)</td>",
                aralin2_h3_2: "Conversion ng Ratio",
                aralin2_p2: "Gumagamit tayo ng <b>unit factor</b> (conversion factor na inihayag bilang ratio) para mag-convert. Ang unit factor ay ginagamit para i-cancel out ang lumang unit at makuha ang bagong unit.",
                aralin2_ex1_q: "HALIMBAWA 1: Ilang teaspoons (tsp) ang katumbas ng 10 mL ng gamot?",
                aralin2_ex1_step1: "Hakbang 1: Conversion Factor: <b>1 tsp = 5 mL</b>.",
                aralin2_ex1_step2: "Hakbang 2: Gamitin ang factor bilang ratio (1 tsp &divide; 5 mL) at mag-multiply:",
                aralin2_ex1_math: " 10 mL &times; (1 tsp &divide; 5 mL) = <b>2 tsp</b> ",
                aralin2_ex1_solution: "<b>Solusyon:</b> (10 &divide; 5) &times; 1 tsp = 2 tsp",
                aralin2_h3_3: "Conversion ng Praksiyon (Fraction)",
                aralin2_p3: "Ito ay ginagamit para kumuha ng bahagi (fraction) ng isang kabuuang sukat.",
                aralin2_ex2_q: "HALIMBAWA 2: Hanapin ang katumbas ng 3/4 na litro (L) sa mL.",
                aralin2_ex2_step1: "Hakbang 1: Conversion Factor: <b>1 L = 1,000 mL</b>.",
                aralin2_ex2_step2: "Hakbang 2: Paramihin ang praksiyon sa 1,000 mL:",
                aralin2_ex2_math: " (3 &divide; 4) &times; 1,000 mL = <b>750 mL</b> ",
                aralin2_ex2_solution: "<b>Solusyon:</b> 0.75 &times; 1,000 mL = 750 mL",
                aralin2_p4: "Tandaan: Ang pag-convert ng mas maliit na yunit sa mas malaking yunit ay nangangahulugang <b>division</b> (paghahati). Ang pag-convert ng mas malaking yunit sa mas maliit na yunit ay nangangahulugang <b>multiplication</b> (pagpaparami).",

                // Lesson 3 Content (Better Buy)
                aralin3_title: "Aralin 3: Alin ang Mas Sulit Bilhin? (Unit Cost)",
                aralin3_p1: "Upang malaman kung alin ang mas sulit bilhin, kailangan mong tuusin ang <b>Cost Per Unit</b> (halaga bawat yunit) ng bawat produkto.",
                aralin3_h3_1: "Pagkuha ng Unit Cost",
                aralin3_l1: "I-convert ang bolyum ng lahat ng produkto sa <b>iisang yunit</b> (hal. Litro o Mililitro).",
                aralin3_l2: "Hatiin ang <b>Presyo</b> sa kabuuang <b>Bolyum</b> (Unit Cost = Presyo &divide; Bolyum).",
                aralin3_l3: "Ang produkto na may <b>pinakamababang Unit Cost</b> ang mas sulit bilhin.",
                aralin3_ex_q: "HALIMBAWA: Alin ang mas sulit bilhin?",
                aralin3_ex_a: "<b>Produkto A:</b> 2 Litro ₱38.00",
                aralin3_ex_b: "<b>Produkto B:</b> 1.9 Litro (1/2 gal) ₱35.00",
                aralin3_ex_calc_title: "Tuusin ang Unit Cost (Cost per Litro):",
                aralin3_ex_calc_a: "Produkto A: ₱38.00 &divide; 2 L = <b>₱19.00 bawat Litro</b>",
                aralin3_ex_calc_b: "Produkto B: ₱35.00 &divide; 1.9 L ≈ <b>₱18.42 bawat Litro</b>",
                aralin3_ex_conclusion: "Konklusyon: Ang <b>Produkto B</b> ang mas sulit bilhin dahil mas mababa ang presyo nito bawat litro.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang mga conversion at \"Better Buy\" problems. Gamitin ang Litro (L) at Mililitro (mL) para sa conversion.",
                quiz_section_a: "A. Conversion (Ibigay ang Numerical Answer)",
                qa1_label: "1. Ilang Mililitro (mL) ang 2.5 Litro (L)?",
                qa2_label: "2. Ilang Litro (L) ang 4,700 Mililitro (mL)?",
                qa3_label: "3. Ilang Mililitro (mL) ang 12 fluid ounces (fl. oz.)?",
                qa4_label: "4. Ilang Pint (pt) ang katumbas ng 1 Gallon (gal)?",
                qa1_placeholder: "Sagot (mL)",
                qa2_placeholder: "Sagot (L)",
                qa3_placeholder: "Sagot (mL)",
                qa4_placeholder: "Sagot (pt)",
                quiz_section_b: "B. Alin ang Mas Sulit Bilhin? (Unit Cost Comparison)",
                qb1_label: "1. Alin ang mas sulit bilhin: <b>350 mL</b> ₱10.50 (A) o <b>12 fl. oz.</b> ₱7.20 (B)?",
                qb2_label: "2. Alin ang mas sulit bilhin: <b>2 L</b> ₱38.00 (A) o <b>1.9 L</b> ₱35.00 (B)?",
                qb1_placeholder: "A o B",
                qb2_placeholder: "A o B",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang bolyum at pagkumpara ng unit cost!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga aralin para sa mga mali mong sagot.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang Aralin 1-3.`,
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
                // A1: 2.5 L to mL (2.5 * 1000 = 2500)
                qa1: 2500,
                // A2: 4700 mL to L (4700 / 1000 = 4.7)
                qa2: 4.7, 
                // A3: 12 fl. oz. to mL (12 * 30 mL/fl. oz. = 360)
                qa3: 360,
                // A4: 1 Gallon to Pint (1 gal = 8 pt)
                qa4: 8,
                // B1: A: ₱10.50/350mL = ₱0.03/mL. B: ₱7.20 / (12*30mL=360mL) = ₱0.02/mL. B is cheaper.
                qb1: 'B', 
                // B2: A: ₱38.00/2L = ₱19.00/L. B: ₱35.00/1.9L = ₱18.42/L. B is cheaper.
                qb2: 'B',
            };
            
            if (!isLanguageToggle) {
                // Run checks only on button click, not language toggle
                correctCount += checkAnswer('qa1', answers.qa1, false, 0); // Whole number
                correctCount += checkAnswer('qa2', answers.qa2, false, 1); // 1 decimal place
                correctCount += checkAnswer('qa3', answers.qa3, false, 0); // Whole number
                correctCount += checkAnswer('qa4', answers.qa4, false, 0); // Whole number
                correctCount += checkAnswer('qb1', answers.qb1, true); // Strict text check
                correctCount += checkAnswer('qb2', answers.qb2, true); // Strict text check
                
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
        
        document.getElementById('volume-conversion-quiz-form').addEventListener('submit', function(e) {
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
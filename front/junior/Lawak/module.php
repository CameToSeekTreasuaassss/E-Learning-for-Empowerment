<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Area (Lawak)</title>
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
        
        /* Quiz and Outline Text Size */
        /* FIX: Explicitly target Objectives list items and set to 20px */
        #objectives ul li {
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
            color: #059669; /* Green 600 - EMERALD COLOR */
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Area Units and Conversion</a>
                    <a href="#aralin2a" class="outline-link" data-i18n="outline_aralin2a">Lesson 2: Area of Flat Figures</a>
                    <a href="#aralin2b" class="outline-link" data-i18n="outline_aralin2b">Lesson 3: Surface Area of Solids</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Area (Lawak)</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Calculating the area of different shapes and converting units.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Confirmed: List items font size is set to 1.25rem (20px) -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Explain the meaning of <b>Area</b> and identify its units.</li>
                        <li data-i18n="obj_2">Calculate the area of various <b>Flat Figures</b> and <b>Solids</b> (3D shapes).</li>
                        <li data-i18n="obj_3">Convert area units (e.g., sq. m to sq. ft).</li>
                        <li data-i18n="obj_4">Solve real-life problems using area.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">
                    [Image of area unit conversion chart]
                    <!-- ARALIN 1: Mga Yunit ng Lawak -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Area Units and Conversion</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1"><b>Area</b> is the number of square units required to cover a flat surface. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Area Unit Conversion</h3>
                            <p data-i18n="aralin1_p2">Area is always expressed in <b>squared</b> units. The basic unit in the metric system is the <b>square meter (sq. m)</b>.</p>
                            
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full text-sm">
                                    <thead>
                                        <!-- Data-i18n moved to the th element -->
                                        <tr><th colspan="2" data-i18n="aralin1_table1_header">Metric System</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin1_table1_row1"><td>1 sq. km</td><td>1,000,000 sq. meters</td></tr>
                                        <tr data-i18n="aralin1_table1_row2"><td>1 hectare (ha)</td><td>10,000 sq. meters</td></tr>
                                        <tr data-i18n="aralin1_table1_row3"><td>1 sq. meter</td><td>100 sq. dm</td></tr>
                                        <tr data-i18n="aralin1_table1_row4"><td>1 sq. dm</td><td>100 sq. cm</td></tr>
                                        <tr data-i18n="aralin1_table1_row5"><td>1 sq. cm</td><td>100 sq. mm</td></tr>
                                        <tr data-i18n="aralin1_table1_row6"><td>1 sq. km</td><td>100 ha</td></tr>
                                    </tbody>
                                </table>
                            </div>
                                <br>
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full text-sm">
                                    <thead>
                                        <!-- Data-i18n moved to the th element -->
                                        <tr><th colspan="2" data-i18n="aralin1_table2_header">Metric ↔ English System</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin1_table2_row1"><td>1 sq. foot (sq. ft)</td><td>144 sq. inches (sq. in)</td></tr>
                                        <tr data-i18n="aralin1_table2_row2"><td>1 sq. inch (sq. in)</td><td>6.4516 sq. cm (sq. cm)</td></tr>
                                        <tr data-i18n="aralin1_table2_row3"><td>1 sq. meter (sq. m)</td><td>9 sq. feet (sq. ft) (approx.)</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE: Convert 555 sq. m to sq. ft.</p>
                                <p data-i18n="aralin1_ex1_step1">Step 1: Identify the conversion factor: 1 sq. m = 9 sq. ft.</p>
                                <p data-i18n="aralin1_ex1_step2">Step 2: Use the ratio: (9 sq. ft / 1 sq. m).</p>
                                <p class="math-formula" data-i18n="aralin1_ex1_solution"> 555 sq. m x (9 sq. ft / 1 sq. m) = <b>4,995 sq. ft</b> </p>
                            </div>
                        </div>
                    </details>
                    
                    <!-- ARALIN 2A: Lawak ng Pantay na Pigura (Flat Shapes) -->
                    <details id="aralin2a" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2a_title">Lesson 2: Area of Flat Figures</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2a_p1"><b>Flat Figures</b> have a planar surface. <b>Irregular Figures</b> are composed of two or more flat figures. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2a_h3_1">Area Formulas</h3>
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full text-sm">
                                    <thead>
                                        <tr data-i18n="aralin2a_table1_header"><th>Figure</th><th>Formula</th><th>Variables</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin2a_table1_row1"><td>Square</td><td>A = s x s</td><td>s = side</td></tr>
                                        <tr data-i18n="aralin2a_table1_row2"><td>Rectangle</td><td>A = l x w</td><td>l = length, w = width</td></tr>
                                        <tr data-i18n="aralin2a_table1_row3"><td>Triangle</td><td>A = (b x h) / 2</td><td>b = base, h = height</td></tr>
                                        <tr data-i18n="aralin2a_table1_row4"><td>Rhombus</td><td>A = (d₁ x d₂) / 2</td><td>d₁, d₂ = diagonals</td></tr>
                                        <tr data-i18n="aralin2a_table1_row5"><td>Circle</td><td>A = 3.14 x r x r</td><td>r = radius, 3.14 (pi)</td></tr>
                                    </tbody>
                                </table>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2a_h3_2">Area of Irregular Figures</h3>
                            <p data-i18n="aralin2a_p2">Divide the irregular figure into **Flat Figures**. Calculate the area of each part and then add them together. </p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2a_ex1_title">EXAMPLE: A lot 20m long and 8m wide, with an added 7m x 7m square area.</p>
                                <p data-i18n="aralin2a_ex1_step1">Figure 1 (Rectangle): A₁ = 20 m x 8 m = 160 sq. m</p>
                                <p data-i18n="aralin2a_ex1_step2">Figure 2 (Square): A₂ = 7 m x 7 m = 49 sq. m</p>
                                <p class="math-formula" data-i18n="aralin2a_ex1_solution"> Total Area = A₁ + A₂ = 160 sq. m + 49 sq. m = <b>209 sq. m</b> </p>
                            </div>
                        </div>
                    </details>
                    
                    <!-- ARALIN 2B: Lawak ng Kapatagan ng Solido (Surface Area) -->
                    <details id="aralin2b" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2b_title">Lesson 3: Surface Area of Solids</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2b_p1">A <b>Solid Figure</b> has thickness (three dimensions). The <b>Surface Area (SA)</b> is the total area of all the faces or surfaces of the solid. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2b_h3_1">Surface Area Formulas</h3>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="aralin2b_l1"><b>Rectangular Prism</b>
                                    <p class="math-formula"> SA = 2 x [ (w x h) + (h x l) + (l x w) ] </p>
                                    <p class="text-sm italic" data-i18n="aralin2b_l1_vars"> (w=width, h=height, l=length) </p>
                                </li>
                                <li data-i18n="aralin2b_l2"><b>Cube</b>
                                    <p class="math-formula"> SA = 6 x (e x e) </p>
                                    <p class="text-sm italic" data-i18n="aralin2b_l2_vars"> (e=edge) </p>
                                </li>
                                <li data-i18n="aralin2b_l3"><b>Cylinder</b>
                                    <p class="math-formula"> SA = (2 x 3.14 x r²) + (2 x 3.14 x r x h) </p>
                                    <p class="text-sm italic" data-i18n="aralin2b_l3_vars"> (r=radius, h=height, 3.14=pi) </p>
                                </li>
                            </ul>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2b_ex1_title">EXAMPLE: Box with l=96in, w=24in, h=12in. Find the SA.</p>
                                <p data-i18n="aralin2b_ex1_step1">SA = 2 x [ (24 x 12) + (12 x 96) + (96 x 24) ]</p>
                                <p data-i18n="aralin2b_ex1_step2">SA = 2 x [ 288 + 1,152 + 2,304 ]</p>
                                <p class="math-formula" data-i18n="aralin2b_ex1_solution"> SA = 2 x [ 3,744 sq. in ] = <b>7,488 sq. in</b> </p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer problems about area, surface area, and conversion. (Total: 6 Questions)</p>

                    <form id="area-quiz-form" class="space-y-6">

                        <!-- SECTION A: LAWAK AT CONVERSION (Q1-Q3) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Area and Conversion (1-3)</p>
                            <!-- Removed grid layout for vertical alignment -->
                            <div class="flex flex-col space-y-4"> 
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. How many ha is a 600 m x 600 m square field?</label>
                                    <input type="text" id="qa1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (ha)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. Calculate the area of a Triangle with base 42 in and height 56 in.</label>
                                    <input type="text" id="qa2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (sq. in)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1" class="font-medium" data-i18n="qb1_label">3. (Surface Area) A Cube has an edge of 20 in. What is the total Surface Area (SA)?</label>
                                    <input type="text" id="qb1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qb1_placeholder" placeholder="Answer (sq. in)">
                                </div>
                            </div>
                        </div>

                        <!-- SECTION B: SURFACE AREA AT WORD PROBLEM (Q4-Q6) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Surface Area and Word Problem (4-6)</p>
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2" class="font-medium" data-i18n="qb2_label">4. (Word Problem) A bathroom (2.5 m x 1.8 m) needs to be tiled (1 dm² per tile). How many tiles are needed?</label>
                                    <input type="text" id="qb2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qb2_placeholder" placeholder="Number of Tiles">
                                </div>
                                
                                <!-- NEW QUESTION B3 (Q5) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qb3" class="font-medium" data-i18n="qb3_label">5. (Cylinder SA) Find the Surface Area (SA) of a cylinder with a radius (r) of 3 cm and height (h) of 10 cm. (Use \u03c0=3.14)</label>
                                    <input type="text" id="qb3" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qb3_placeholder" placeholder="Answer (sq. cm)">
                                </div>

                                <!-- NEW QUESTION B4 (Q6) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qb4" class="font-medium" data-i18n="qb4_label">6. (Irregular Area) A wall (8 m x 4 m) has a window (1 m x 2 m). If you paint it, what is the total area to be painted (sq. m)?</label>
                                    <input type="text" id="qb4" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qb4_placeholder" placeholder="Answer (sq. m)">
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
                outline_aralin1: "Lesson 1: Area Units and Conversion",
                outline_aralin2a: "Lesson 2: Area of Flat Figures",
                outline_aralin2b: "Lesson 3: Surface Area of Solids",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Area (Lawak)",
                h1_subtitle: "Calculating the area of different shapes and converting units.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Explain the meaning of <b>Area</b> and identify its units.",
                obj_2: "Calculate the area of various <b>Flat Figures</b> and <b>Solids</b> (3D shapes).",
                obj_3: "Convert area units (e.g., sq. m to sq. ft).",
                obj_4: "Solve real-life problems using area.",

                // Lesson 1 Content (Units)
                aralin1_title: "Lesson 1: Area Units and Conversion",
                aralin1_p1: "<b>Area</b> is the number of square units required to cover a flat surface. ",
                aralin1_h3_1: "Area Unit Conversion",
                aralin1_p2: "Area is always expressed in <b>squared</b> units. The basic unit in the metric system is the <b>square meter (sq. m)</b>.",
                aralin1_table1_header: "Metric System", 
                aralin1_table1_row1: "<td>1 sq. km</td><td>1,000,000 sq. meters</td>",
                aralin1_table1_row2: "<td>1 hectare (ha)</td><td>10,000 sq. meters</td>",
                aralin1_table1_row3: "<td>1 sq. meter</td><td>100 sq. dm</td>",
                aralin1_table1_row4: "<td>1 sq. dm</td><td>100 sq. cm</td>",
                aralin1_table1_row5: "<td>1 sq. cm</td><td>100 sq. mm</td>",
                aralin1_table1_row6: "<td>1 sq. km</td><td>100 ha</td>",
                aralin1_table2_header: "Metric ↔ English System", 
                aralin1_table2_row1: "<td>1 sq. foot (sq. ft)</td><td>144 sq. inches (sq. in)</td>",
                aralin1_table2_row2: "<td>1 sq. inch (sq. in)</td><td>6.4516 sq. cm (sq. cm)</td>",
                aralin1_table2_row3: "<td>1 sq. meter (sq. m)</td><td>9 sq. feet (sq. ft) (approx.)</td>",
                aralin1_ex1_title: "EXAMPLE: Convert 555 sq. m to sq. ft.",
                aralin1_ex1_step1: "Step 1: Identify the conversion factor: 1 sq. m = 9 sq. ft.",
                aralin1_ex1_step2: "Step 2: Use the ratio: (9 sq. ft / 1 sq. m).",
                aralin1_ex1_solution: " 555 sq. m x (9 sq. ft / 1 sq. m) = <b>4,995 sq. ft</b> ",

                // Lesson 2 Content (Flat Area)
                aralin2a_title: "Lesson 2: Area of Flat Figures",
                aralin2a_p1: "<b>Flat Figures</b> have a planar surface. <b>Irregular Figures</b> are composed of two or more flat figures. ",
                aralin2a_h3_1: "Area Formulas",
                aralin2a_table1_header: "<th>Figure</th><th>Formula</th><th>Variables</th>",
                aralin2a_table1_row1: "<td>Square</td><td>A = s x s</td><td>s = side</td>",
                aralin2a_table1_row2: "<td>Rectangle</td><td>A = l x w</td><td>l = length, w = width</td>",
                aralin2a_table1_row3: "<td>Triangle</td><td>A = (b x h) / 2</td><td>b = base, h = height</td>",
                aralin2a_table1_row4: "<td>Rhombus</td><td>A = (d₁ x d₂) / 2</td><td>d₁, d₂ = diagonals</td>",
                aralin2a_table1_row5: "<td>Circle</td><td>A = 3.14 x r x r</td><td>r = radius, 3.14 (pi)</td>",
                aralin2a_h3_2: "Area of Irregular Figures",
                aralin2a_p2: "Divide the irregular figure into **Flat Figures**. Calculate the area of each part and then add them together. ",
                aralin2a_ex1_title: "EXAMPLE: A lot 20m long and 8m wide, with an added 7m x 7m square area.",
                aralin2a_ex1_step1: "Figure 1 (Rectangle): A₁ = 20 m x 8 m = 160 sq. m",
                aralin2a_ex1_step2: "Figure 2 (Square): A₂ = 7 m x 7 m = 49 sq. m",
                aralin2a_ex1_solution: " Total Area = A₁ + A₂ = 160 sq. m + 49 sq. m = <b>209 sq. m</b> ",

                // Lesson 3 Content (Surface Area)
                aralin2b_title: "Lesson 3: Surface Area of Solids",
                aralin2b_p1: "A <b>Solid Figure</b> has thickness (three dimensions). The <b>Surface Area (SA)</b> is the total area of all the faces or surfaces of the solid. ",
                aralin2b_h3_1: "Surface Area Formulas",
                aralin2b_l1: "<b>Rectangular Prism</b>",
                aralin2b_l1_vars: " (w=width, h=height, l=length) ",
                aralin2b_l2: "<b>Cube</b>",
                aralin2b_l2_vars: " (e=edge) ",
                aralin2b_l3: "<b>Cylinder</b>",
                aralin2b_l3_vars: " (r=radius, h=height, 3.14=pi) ",
                aralin2b_ex1_title: "EXAMPLE: Box with l=96in, w=24in, h=12in. Find the SA.",
                // FIXED: Template literal usage for clarity
                aralin2b_ex1_step1: "SA = 2 x [ (24 x 12) + (12 x 96) + (96 x 24) ]",
                aralin2b_ex1_step2: "SA = 2 x [ 288 + 1,152 + 2,304 ]",
                aralin2b_ex1_solution: " SA = 2 x [ 3,744 sq. in ] = <b>7,488 sq. in</b> ",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Answer problems about area, surface area, and conversion. (Total: 6 Questions)",
                quiz_section1_title: "A. Area and Conversion (1-3)",
                qa1_label: "1. How many ha is a 600 m x 600 m square field?",
                qa1_placeholder: "Answer (ha)",
                qa2_label: "2. Calculate the area of a Triangle with base 42 in and height 56 in.",
                qa2_placeholder: "Answer (sq. in)",
                qb1_label: "3. (Surface Area) A Cube has an edge of 20 in. What is the total Surface Area (SA)?",
                qb1_placeholder: "Answer (sq. in)",
                
                quiz_section2_title: "B. Surface Area and Word Problem (4-6)",
                qb2_label: "4. (Word Problem) A bathroom (2.5 m x 1.8 m) needs to be tiled (1 dm² per tile). How many tiles are needed?",
                qb2_placeholder: "Number of Tiles",
                qb3_label: "5. (Cylinder SA) Find the Surface Area (SA) of a cylinder with a radius (r) of 3 cm and height (h) of 10 cm. (Use \u03c0=3.14)",
                qb3_placeholder: "Answer (sq. cm)",
                qb4_label: "6. (Irregular Area) A wall (8 m x 4 m) has a window (1 m x 2 m). If you paint it, what is the total area to be painted (sq. m)?",
                qb4_placeholder: "Answer (sq. m)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Area and Surface Area calculation!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the formulas for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Re-read Lessons 1-3.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Mga Yunit ng Lawak at Pagsasalin",
                outline_aralin2a: "Aralin 2: Lawak ng Pantay na Pigura",
                outline_aralin2b: "Aralin 3: Lawak ng Kapatagan ng Solido",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Lawak (Area)",
                h1_subtitle: "Pagkuwenta ng lawak ng iba't ibang hugis at pagsasalin ng mga yunit.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ipaliwanag ang kahulugan ng <b>Lawak (Area)</b> at alamin ang mga yunit nito.",
                obj_2: "Kalkulahin ang lawak ng iba't ibang <b>Pantay na Pigura</b> (flat shapes) at <b>Solido</b> (3D shapes).",
                obj_3: "Isalin ang mga yunit ng lawak (hal. sq. m sa sq. ft).",
                obj_4: "Lutasin ang mga pang-araw-araw na suliranin gamit ang lawak.",

                // Lesson 1 Content (Units)
                aralin1_title: "Aralin 1: Mga Yunit ng Lawak (Area Units)",
                aralin1_p1: "Ang <b>Lawak (Area)</b> ay ang bilang ng mga kuwadradong yunit na kinakailangan upang matakpan ang isang kapatagan (flat surface). ",
                aralin1_h3_1: "Pagsasalin ng mga Yunit ng Lawak",
                aralin1_p2: "Ang lawak ay laging ipinapahayag sa <b>kuwadrado</b> (squared) na yunit. Ang batayang yunit sa metrikong sistema ay ang <b>metro kuwadrado (sq. m)</b>.",
                aralin1_table1_header: "Metrikong Sistema", 
                aralin1_table1_row1: "<td>1 km kuwadrado</td><td>1,000,000 metro kuwadrado</td>",
                aralin1_table1_row2: "<td>1 hektarya (ha)</td><td>10,000 metro kuwadrado</td>",
                aralin1_table1_row3: "<td>1 metro kuwadrado</td><td>100 dm kuwadrado</td>",
                aralin1_table1_row4: "<td>1 dm kuwadrado</td><td>100 cm kuwadrado</td>",
                aralin1_table1_row5: "<td>1 cm kuwadrado</td><td>100 mm kuwadrado</td>",
                aralin1_table1_row6: "<td>1 km kuwadrado</td><td>100 ha</td>",
                aralin1_table2_header: "Metriko ↔ Ingles na Sistema", 
                aralin1_table2_row1: "<td>1 ft kuwadrado (sq. ft)</td><td>144 in kuwadrado (sq. in)</td>",
                aralin1_table2_row2: "<td>1 in kuwadrado (sq. in)</td><td>6.4516 cm kuwadrado (sq. cm)</td>",
                aralin1_table2_row3: "<td>1 metro kuwadrado (sq. m)</td><td>9 ft kuwadrado (sq. ft) (approx.)</td>",
                aralin1_ex1_title: "HALIMBAWA: Isalin ang 555 sq. m sa sq. ft.",
                aralin1_ex1_step1: "Step 1: Kilalanin ang conversion factor: 1 sq. m = 9 sq. ft.",
                aralin1_ex1_step2: "Step 2: Gamitin ang ratio: (9 sq. ft / 1 sq. m).",
                aralin1_ex1_solution: " 555 sq. m x (9 sq. ft / 1 sq. m) = <b>4,995 sq. ft</b> ",

                // Lesson 2 Content (Flat Area)
                aralin2a_title: "Aralin 2: Lawak ng Pantay na Pigura (Flat Shapes)",
                aralin2a_p1: "Ang <b>Pantay na Pigura</b> (Flat Figures) ay may patag na kapatagan. Ang <b>Di-Pantay na Pigura</b> (Irregular Figures) ay binubuo ng dalawa o higit pang pantay na pigura. ",
                aralin2a_h3_1: "Mga Formula ng Lawak (Area)",
                aralin2a_table1_header: "<th>Pigura</th><th>Pormula</th><th>Mga Variable</th>",
                aralin2a_table1_row1: "<td>Kuwadrado (Square)</td><td>A = s x s</td><td>s = panig (side)</td>",
                aralin2a_table1_row2: "<td>Rektanggulo (Rectangle)</td><td>A = l x w</td><td>l = haba (length), w = lapad (width)</td>",
                aralin2a_table1_row3: "<td>Tatsulok (Triangle)</td><td>A = (b x h) / 2</td><td>b = base, h = taas (height)</td>",
                aralin2a_table1_row4: "<td>Rombuso (Rhombus)</td><td>A = (d₁ x d₂) / 2</td><td>d₁, d₂ = diyagonal</td>",
                aralin2a_table1_row5: "<td>Bilog (Circle)</td><td>A = 3.14 x r x r</td><td>r = radius, 3.14 (pi)</td>",
                aralin2a_h3_2: "Lawak ng Di-Pantay na Pigura (Irregular Area)",
                aralin2a_p2: "Hatiin ang di-pantay na pigura sa mga **Pantay na Pigura**. Kuwentahin ang lawak ng bawat bahagi at pagkatapos ay idagdag ang mga ito. ",
                aralin2a_ex1_title: "HALIMBAWA: Isang lupaing 20m ang haba at 8m ang lapad, na may dagdag na 7m x 7m kuwadrado.",
                aralin2a_ex1_step1: "Figure 1 (Rectangle): A₁ = 20 m x 8 m = 160 sq. m",
                aralin2a_ex1_step2: "Figure 2 (Square): A₂ = 7 m x 7 m = 49 sq. m",
                aralin2a_ex1_solution: " Kabuuang Lawak = A₁ + A₂ = 160 sq. m + 49 sq. m = <b>209 sq. m</b> ",

                // Lesson 3 Content (Surface Area)
                aralin2b_title: "Aralin 3: Lawak ng Kapatagan ng Solido (Surface Area)",
                aralin2b_p1: "Ang <b>Solidong Pigura</b> ay may kapal (tatlong dimensiyon). Ang <b>Lawak ng Kapatagan (Surface Area - SA)</b> ay ang kabuuang lawak ng lahat ng mukha o bahagi ng solido. ",
                aralin2b_h3_1: "Mga Formula ng Surface Area",
                aralin2b_l1: "<b>Rektanggulong Solido (Rectangular Prism)</b>",
                aralin2b_l1_vars: " (w=lapad, h=taas, l=haba) ",
                aralin2b_l2: "<b>Cube</b>",
                aralin2b_l2_vars: " (e=gilid/edge) ",
                aralin2b_l3: "<b>Silindriko (Cylinder)</b>",
                aralin2b_l3_vars: " (r=radius, h=taas, 3.14=pi) ",
                aralin2b_ex1_title: "HALIMBAWA: Kahon na may l=96in, w=24in, h=12in. Hanapin ang SA.",
                // FIXED: Template literal usage for clarity
                aralin2b_ex1_step1: `SA = 2 x [ (24 x 12) + (12 x 96) + (96 x 24) ]`,
                aralin2b_ex1_step2: `SA = 2 x [ 288 + 1,152 + 2,304 ]`,
                aralin2b_ex1_solution: " SA = 2 x [ 3,744 sq. in ] = <b>7,488 sq. in</b> ",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang mga problema tungkol sa lawak, surface area, at conversion. (Total: 6 Questions)",
                quiz_section1_title: "A. Lawak (Area) at Conversion (1-3)",
                qa1_label: "1. Ilang ha ang 600 m x 600 m kuwadradong bukid?",
                qa1_placeholder: "Sagot (ha)",
                qa2_label: "2. Kuwentahin ang lawak ng Tatsulok na may base 42 in at taas 56 in.",
                qa2_placeholder: "Sagot (sq. in)",
                qb1_label: "3. (Surface Area) Isang Cube ang may gilid (edge) na 20 in. Ano ang kabuuang Lawak ng Kapatagan (SA)?",
                qb1_placeholder: "Sagot (sq. in)",
                
                // FIXED: Enclosed in backticks (template literals)
                quiz_section2_title: `B. Surface Area at Word Problem (4-6)`, 
                qb2_label: "4. (Word Problem) Isang banyo (2.5 m x 1.8 m) ang lalagyan ng baldosa (1 dm² per tile). Ilang baldosa ang kailangan?",
                qb2_placeholder: "Bilang ng Baldosa",
                // FIXED: Used \u03c0 for consistency
                qb3_label: "5. (Cylinder SA) Hanapin ang Lawak ng Kapatagan (SA) ng silindriko na may radius (r) na 3 cm at taas (h) na 10 cm. (Gamitin ang \u03c0=3.14)",
                qb3_placeholder: "Sagot (sq. cm)",
                // FIXED: The string which was causing the issue has been wrapped in backticks (template literal).
                qb4_label: `6. (Irregular Area) Isang pader (8 m x 4 m) ang may bintana (1 m x 2 m). Kung pipinturahan ito, ano ang kabuuang lawak na pipinturahan (sq. m)?`,
                qb4_placeholder: "Sagot (sq. m)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang Lawak at Surface Area calculation!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga formula para sa mga mali mong sagot.`,
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
        const sections = [
            'objectives', // Changed from 'tungkol-saan'
            'aralin1', 
            'aralin2a', 
            'aralin2b', 
            'pagsasanay'
        ];
        
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
            // Remove all non-numeric characters except for dots and minus sign
            value = value.trim().replace(/\s/g, '').replace(/[^0-9.-]/g, ''); 
            const parsedValue = parseFloat(value);
            if (isNaN(parsedValue)) return 0; 
            return parsedValue;
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
            const totalQuestions = 6; 
            const resultsDiv = document.getElementById('results');
            
            // --- Expected Calculations ---
            
            // Q1: 600 m * 600 m = 360,000 m². Conversion: 1 ha = 10,000 m². 360000 / 10000 = 36 ha.
            const ans1 = 36;
            
            // Q2: Area of Triangle: (b * h) / 2 = (42 * 56) / 2 = 1176 in²
            const ans2 = 1176;
            
            // Q3: Surface Area of Cube: SA = 6e². e = 20 in. SA = 6 * (20*20) = 2400 in²
            const ans3 = 2400;
            
            // Q4: Tile Problem: Area of bathroom: 2.5m * 1.8m = 4.5 m². Tile size: 1 dm². 
            // Conversion: 1 m² = 100 dm². Bathroom Area: 4.5 * 100 = 450 dm². 450 dm² / 1 dm² = 450 tiles.
            const ans4 = 450;

            // Q5: Cylinder SA: r=3, h=10, pi=3.14. SA = 2*pi*r² + 2*pi*r*h 
            // SA = 2*3.14*(3*3) + 2*3.14*3*10 = 56.52 + 188.4 = 244.92
            const ans5 = 244.92;

            // Q6: Irregular Area (Wall - Window): A_wall = 8*4=32. A_window=1*2=2. Painted Area = 32 - 2 = 30 m²
            const ans6 = 30;

            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1', ans1, 0); 
                correctCount += checkAnswer('qa2', ans2, 0); 
                correctCount += checkAnswer('qb1', ans3, 0); 
                correctCount += checkAnswer('qb2', ans4, 0); 
                correctCount += checkAnswer('qb3', ans5);     // Allow tolerance for 244.92
                correctCount += checkAnswer('qb4', ans6, 0); 
                
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
        
        document.getElementById('area-quiz-form').addEventListener('submit', function(e) {
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
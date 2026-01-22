<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Multiplication and Division of Decimals</title>
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
        
        /* Pre tag (code block for division) */
        .content-box pre {
            font-size: 1.25rem; /* 20px */
            line-height: 1.5;
            font-family: monospace;
            color: #1f2937;
        }


    </style>
</head>
<body class="p-4 sm:p-8 lg:p-20">

    <!-- Main Grid Container for Outline and Content -->
    <div class="mx-auto lg:grid lg:grid-cols-12 lg:gap-8">

        <!-- Left Column: Outline and Translator -->
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Decimal Multiplication</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Decimal Division</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Multiplication and Division of Decimals</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Learning multiplication and division of decimals in daily life.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Multiply and divide <b>decimals</b>; and</li>
                        <li data-i18n="obj_2">Solve word problems involving multiplication and division of <b>decimals</b>.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Pagpaparami ng mga Desimal -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Decimal Multiplication</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1"><b>Multiplying decimals</b> is done just like multiplying whole numbers. The only difference is placing the <b>decimal point</b> correctly in the product.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Rules for Multiplication</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin1_ol1">Ignore the decimal points first and multiply the numbers as whole numbers.</li>
                                <li data-i18n="aralin1_ol2">Count the total number of <b>decimal places</b> in the <b>factors</b> (multiplicand and multiplier).</li>
                                <li data-i18n="aralin1_ol3">The <b>product</b> (answer) must have the same number of decimal places. Count from the right to the left before placing the decimal point.</li>
                            </ol>
                                                        <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_q">EXAMPLE 1: Find the product of 0.7 and 0.8.</p>
                                <pre class="whitespace-pre-wrap text-2xl font-mono mt-2 text-gray-800" data-i18n="aralin1_ex1_math">
  0.7  <span class="text-gray-600 text-base">(1 decimal place)</span>
x 0.8  <span class="text-gray-600 text-base">(1 decimal place)</span>
-----
  <b>0.56</b> <span class="text-gray-600 text-base">(2 decimal places)</span>

<span class="font-bold text-xl" data-i18n="aralin1_ex1_a">7 x 8 = 56. Since 1 + 1 = 2, the product is 0.56.</span>
                                </pre>
                            </div>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_q">EXAMPLE 2: Find the product of 3.7 and 1.68.</p>
                                <pre class="whitespace-pre-wrap text-2xl font-mono mt-2 text-gray-800" data-i18n="aralin1_ex2_math">
  1.68  <span class="text-gray-600 text-base">(2 decimal places)</span>
x 3.7   <span class="text-gray-600 text-base">(1 decimal place)</span>
-----
  1176  <span class="text-gray-600 text-base">(Partial Product 1: 1.68 x 7)</span>
 5040   <span class="text-gray-600 text-base">(Partial Product 2: 1.68 x 30)</span>
-----
<b> 6.216</b>  <span class="text-gray-600 text-base">(3 decimal places)</span>
                                </pre>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Multiplication with Zero (0)</h3>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex3_q">EXAMPLE 3: Find the product of 386 and 1.50.</p>
                                <p data-i18n="aralin1_ex3_p">Because the trailing 0 in 1.50 does not affect the calculation steps, you can ignore it during partial products, but must include it when counting decimal places.</p>
                                <pre class="whitespace-pre-wrap text-2xl font-mono mt-2 text-gray-800" data-i18n="aralin1_ex3_math">
   386  
x 1.50  <span class="text-gray-600 text-base">(2 decimal places)</span>
-----
  1930  <span class="text-gray-600 text-base">(386 x 5)</span>
+ 386   <span class="text-gray-600 text-base">(386 x 10)</span>
-----
<b> 579.00</b> <span class="text-gray-600 text-base">(2 decimal places)</span>

<span class="italic" data-i18n="aralin1_ex3_a">The product is 579, or 579.00.</span>
                                </pre>
                            </div>

                        </div>
                    </details>

                    <!-- ARALIN 2: Paghahati ng mga Desimal -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Decimal Division</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1"><b>Dividing decimals</b> is done by first <b>converting the divisor</b> (the number you are dividing by) into a <b>whole number</b>.</p>
                                                        <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Rules for Division (Decimal Divisor)</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin2_ol1">Move the decimal point in the <b>divisor</b> to the right until it becomes a whole number.</li>
                                <li data-i18n="aralin2_ol2">Move the decimal point in the <b>dividend</b> (the number being divided) the exact same number of places to the right.</li>
                                <li data-i18n="aralin2_ol3">Begin the long division using the new numbers.</li>
                                <li data-i18n="aralin2_ol4">Place the decimal point in the <b>quotient</b> (answer) directly above the new position of the decimal point in the dividend.</li>
                            </ol>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_q">EXAMPLE 1: Divide 19.44 by 0.4.</p>
                                <p data-i18n="aralin2_ex1_p">Shift the decimal point 1 place to the right:</p>
                                <pre class="whitespace-pre-wrap text-2xl font-mono mt-2 text-gray-800" data-i18n="aralin2_ex1_math">
Original: 0.4 ) 19.44
New:      4. ) 194.4  <span class="text-gray-600 text-base">(Divisor becomes a whole number)</span>
                                </pre>
                                <p data-i18n="aralin2_ex1_a">The answer (Quotient) is <b>48.6</b>.</p>
                            </div>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_q">EXAMPLE 2: Divide 4.984 by 0.14.</p>
                                <p data-i18n="aralin2_ex2_p">Shift the decimal point 2 places to the right:</p>
                                <pre class="whitespace-pre-wrap text-2xl font-mono mt-2 text-gray-800" data-i18n="aralin2_ex2_math">
Original: 0.14 ) 4.984
New:     14. ) 498.4
                                </pre>
                                <p data-i18n="aralin2_ex2_a">The answer (Quotient) is <b>35.6</b>.</p>
                            </div>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Checking the Answer</h3>
                            <p data-i18n="aralin2_p2">To check if the quotient is correct, multiply the <b>Quotient &times; Divisor</b>. The product should equal the <b>Dividend</b>.</p>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Solve the following problems using Multiplication and Division of Decimals.</p>

                    <form id="decimal-operations-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Multiplication (Give the Product)</p>
                            <!-- REMOVED grid md:grid-cols-2 for vertical alignment on all screens -->
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2"><label for="qa1_final" class="font-medium" data-i18n="qa1_label">1. Find the product of 4.38 and 3.6:</label><input type="text" id="qa1_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_product" placeholder="Product"></div>
                                <div class="flex flex-col space-y-2"><label for="qa2_final" class="font-medium" data-i18n="qa2_label">2. Find the peso value: P175.50 &times; 52.00 exchange rate:</label><input type="text" id="qa2_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_product_p" placeholder="Product (P)"></div>
                                <div class="flex flex-col space-y-2"><label for="qa3_final" class="font-medium" data-i18n="qa3_label">3. Total distance: 41.5 km/hr &times; 5.5 hours:</label><input type="text" id="qa3_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_product_km" placeholder="Product (km)"></div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Division (Give the Quotient)</p>
                            <!-- REMOVED grid md:grid-cols-2 for vertical alignment on all screens -->
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2"><label for="qb1_final" class="font-medium" data-i18n="qb1_label">1. How many pieces of bread? P225.75 &divide; P0.50 per piece:</label><input type="text" id="qb1_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_quotient" placeholder="Quotient"></div>
                                <div class="flex flex-col space-y-2"><label for="qb2_final" class="font-medium" data-i18n="qb2_label">2. Average speed: 15.4 km &divide; 0.4 hours:</label><input type="text" id="qb2_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_quotient_km" placeholder="Quotient (km/hr)"></div>
                                <!-- NEW QUESTION ADDED -->
                                <div class="flex flex-col space-y-2"><label for="qb3_final" class="font-medium" data-i18n="qb3_label">3. Divide 39.69 by 6.3:</label><input type="text" id="qb3_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_quotient" placeholder="Quotient"></div>
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
                outline_aralin1: "Lesson 1: Decimal Multiplication",
                outline_aralin2: "Lesson 2: Decimal Division",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Multiplication and Division of Decimals",
                h1_subtitle: "Learning multiplication and division of decimals in daily life.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Multiply and divide <b>decimals</b>; and",
                obj_2: "Solve word problems involving multiplication and division of <b>decimals</b>.",

                // Lesson 1 Content (Multiplication)
                aralin1_title: "Lesson 1: Decimal Multiplication",
                aralin1_p1: "<b>Multiplying decimals</b> is done just like multiplying whole numbers. The only difference is placing the <b>decimal point</b> correctly in the product.",
                aralin1_h3_1: "Rules for Multiplication",
                aralin1_ol1: "Ignore the decimal points first and multiply the numbers as whole numbers.",
                aralin1_ol2: "Count the total number of <b>decimal places</b> in the <b>factors</b> (multiplicand and multiplier).",
                aralin1_ol3: "The <b>product</b> (answer) must have the same number of decimal places. Count from the right to the left before placing the decimal point.",
                aralin1_ex1_q: "EXAMPLE 1: Find the product of 0.7 and 0.8.",
                aralin1_ex1_math: '  0.7  <span class="text-gray-600 text-base">(1 decimal place)</span>\nx 0.8  <span class="text-gray-600 text-base">(1 decimal place)</span>\n-----\n  <b>0.56</b> <span class="text-gray-600 text-base">(2 decimal places)</span>\n\n<span class="font-bold text-xl">7 x 8 = 56. Since 1 + 1 = 2, the product is 0.56.</span>',
                aralin1_ex1_a: "7 x 8 = 56. Since 1 + 1 = 2, the product is 0.56.",
                aralin1_ex2_q: "EXAMPLE 2: Find the product of 3.7 and 1.68.",
                aralin1_ex2_math: '  1.68  <span class="text-gray-600 text-base">(2 decimal places)</span>\nx 3.7   <span class="text-gray-600 text-base">(1 decimal place)</span>\n-----\n  1176  <span class="text-gray-600 text-base">(Partial Product 1: 1.68 x 7)</span>\n 5040   <span class="text-gray-600 text-base">(Partial Product 2: 1.68 x 30)</span>\n-----\n<b> 6.216</b>  <span class="text-gray-600 text-base">(3 decimal places)</span>',
                aralin1_h3_2: "Multiplication with Zero (0)",
                aralin1_ex3_q: "EXAMPLE 3: Find the product of 386 and 1.50.",
                aralin1_ex3_p: "Because the trailing 0 in 1.50 does not affect the calculation steps, you can ignore it during partial products, but must include it when counting decimal places.",
                aralin1_ex3_math: '   386  \nx 1.50  <span class="text-gray-600 text-base">(2 decimal places)</span>\n-----\n  1930  <span class="text-gray-600 text-base">(386 x 5)</span>\n+ 386   <span class="text-gray-600 text-base">(386 x 10)</span>\n-----\n<b> 579.00</b> <span class="text-gray-600 text-base">(2 decimal places)</span>\n\n<span class="italic">The product is 579, or 579.00.</span>',
                aralin1_ex3_a: "The product is 579, or 579.00.",
                
                // Lesson 2 Content (Division)
                aralin2_title: "Lesson 2: Decimal Division",
                aralin2_p1: "<b>Dividing decimals</b> is done by first <b>converting the divisor</b> (the number you are dividing by) into a <b>whole number</b>.",
                aralin2_h3_1: "Rules for Division (Decimal Divisor)",
                aralin2_ol1: "Move the decimal point in the <b>divisor</b> to the right until it becomes a whole number.",
                aralin2_ol2: "Move the decimal point in the <b>dividend</b> (the number being divided) the exact same number of places to the right.",
                aralin2_ol3: "Begin the long division using the new numbers.",
                aralin2_ol4: "Place the decimal point in the <b>quotient</b> (answer) directly above the new position of the decimal point in the dividend.",
                aralin2_ex1_q: "EXAMPLE 1: Divide 19.44 by 0.4.",
                aralin2_ex1_p: "Shift the decimal point 1 place to the right:",
                aralin2_ex1_math: 'Original: 0.4 ) 19.44\nNew:      4. ) 194.4  <span class="text-gray-600 text-base">(Divisor becomes a whole number)</span>',
                aralin2_ex1_a: "The answer (Quotient) is <b>48.6</b>.",
                aralin2_ex2_q: "EXAMPLE 2: Divide 4.984 by 0.14.",
                aralin2_ex2_p: "Shift the decimal point 2 places to the right:",
                aralin2_ex2_math: 'Original: 0.14 ) 4.984\nNew:     14. ) 498.4',
                aralin2_ex2_a: "The answer (Quotient) is <b>35.6</b>.",
                aralin2_h3_2: "Checking the Answer",
                aralin2_p2: "To check if the quotient is correct, multiply the <b>Quotient &times; Divisor</b>. The product should equal the <b>Dividend</b>.",
                
                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Solve the following problems using Multiplication and Division of Decimals.",
                quiz_section_a: "A. Multiplication (Give the Product)",
                qa1_label: "1. Find the product of 4.38 and 3.6:",
                qa2_label: "2. Find the peso value: P175.50 &times; 52.00 exchange rate:",
                qa3_label: "3. Total distance: 41.5 km/hr &times; 5.5 hours:",
                quiz_section_b: "B. Division (Give the Quotient)",
                qb1_label: "1. How many pieces of bread? P225.75 &divide; P0.50 per piece:",
                qb2_label: "2. Average speed: 15.4 km &divide; 0.4 hours:",
                qb3_label: "3. Divide 39.69 by 6.3:",
                quiz_button: "Check Answers",
                placeholder_product: "Product",
                placeholder_product_p: "Product (P)",
                placeholder_product_km: "Product (km)",
                placeholder_quotient: "Quotient",
                placeholder_quotient_km: "Quotient (km/hr)",


                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered decimal operations.`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Read Lessons 1 and 2 again.`,

            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pagpaparami ng mga Desimal",
                outline_aralin2: "Aralin 2: Paghahati ng mga Desimal",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Pagpaparami at Paghahati ng mga Desimal",
                h1_subtitle: "Ang pag-aaral ng pagpaparami at paghahati ng mga desimal sa pang-araw-araw na buhay.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Magparami at maghati ng mga <b>desimal</b>; at",
                obj_2: "Malutas ang mga word problem na nagsasangkot ng pagpaparami at paghahati ng mga <b>desimal</b>.",

                // Lesson 1 Content (Multiplication)
                aralin1_title: "Aralin 1: Pagpaparami ng mga Desimal",
                aralin1_p1: "Ang <b>pagpaparami ng mga desimal</b> ay ginagawa katulad ng pagpaparami ng mga buong bilang. Ang pinagkaiba lang ay ang paglalagay ng <b>puntong desimal</b> sa tamang lugar sa product.",
                aralin1_h3_1: "Tuntunin sa Pagpaparami",
                aralin1_ol1: "Balewalain muna ang puntong desimal at paramihin ang mga bilang na parang mga buong bilang.",
                aralin1_ol2: "Bilangin ang kabuuang dami ng <b>decimal places</b> sa mga <b>factor</b> (multiplicand at multiplier).",
                aralin1_ol3: "Ang <b>product</b> (sagot) ay dapat magkaroon ng parehong dami ng decimal places. Bilangin mula sa kanan papunta sa kaliwa bago ilagay ang desimal point.",
                aralin1_ex1_q: "HALIMBAWA 1: Hanapin ang product ng 0.7 at 0.8.",
                aralin1_ex1_math: '  0.7  <span class="text-gray-600 text-base">(1 decimal place)</span>\nx 0.8  <span class="text-gray-600 text-base">(1 decimal place)</span>\n-----\n  <b>0.56</b> <span class="text-gray-600 text-base">(2 decimal places)</span>\n\n<span class="font-bold text-xl">7 x 8 = 56. Dahil 1 + 1 = 2, ang product ay 0.56.</span>',
                aralin1_ex1_a: "7 x 8 = 56. Dahil 1 + 1 = 2, ang product ay 0.56.",
                aralin1_ex2_q: "HALIMBAWA 2: Hanapin ang product ng 3.7 at 1.68.",
                aralin1_ex2_math: '  1.68  <span class="text-gray-600 text-base">(2 decimal places)</span>\nx 3.7   <span class="text-gray-600 text-base">(1 decimal place)</span>\n-----\n  1176  <span class="text-gray-600 text-base">(Partial Product 1: 1.68 x 7)</span>\n 5040   <span class="text-gray-600 text-base">(Partial Product 2: 1.68 x 30)</span>\n-----\n<b> 6.216</b>  <span class="text-gray-600 text-base">(3 decimal places)</span>',
                aralin1_h3_2: "Pagpaparami na may Sero (Zero)",
                aralin1_ex3_q: "HALIMBAWA 3: Hanapin ang product ng 386 at 1.50.",
                aralin1_ex3_p: "Dahil ang 0 sa 1.50 ay huling tambilang, maaari na itong i-drop mula sa pagdaragdag ng partial products, ngunit kailangan pa ring isama sa pagbilang ng decimal places.",
                aralin1_ex3_math: '   386  \nx 1.50  <span class="text-gray-600 text-base">(2 decimal places)</span>\n-----\n  1930  <span class="text-gray-600 text-base">(386 x 5)</span>\n+ 386   <span class="text-gray-600 text-base">(386 x 10)</span>\n-----\n<b> 579.00</b> <span class="text-gray-600 text-base">(2 decimal places)</span>\n\n<span class="italic">Ang product ay 579, o 579.00.</span>',
                aralin1_ex3_a: "Ang product ay 579, o 579.00.",
                
                // Lesson 2 Content (Division)
                aralin2_title: "Aralin 2: Paghahati ng mga Desimal",
                aralin2_p1: "Ang <b>paghahati ng mga desimal</b> ay ginagawa sa pamamagitan ng <b>pag-convert muna ng divisor</b> (panghati) sa isang <b>buong bilang</b>.",
                aralin2_h3_1: "Tuntunin sa Paghahati (Decimal Divisor)",
                aralin2_ol1: "Ilipat ang puntong desimal sa <b>divisor</b> (panghati) pakanan hanggang sa ito ay maging buong bilang.",
                aralin2_ol2: "Ilipat ang puntong desimal sa <b>dividend</b> (hahanhatiin) ng parehong dami ng lunan pakanan.",
                aralin2_ol3: "Simulan ang paghahati (long division) gamit ang mga bagong bilang.",
                aralin2_ol4: "Ilagay ang desimal point sa <b>quotient</b> (sagot) nang direkta sa ibabaw ng bagong posisyon ng desimal point sa dividend.",
                aralin2_ex1_q: "HALIMBAWA 1: Hatiin ang 19.44 sa 0.4.",
                aralin2_ex1_p: "Ilipat ang desimal point ng 1 lunan:",
                aralin2_ex1_math: 'Original: 0.4 ) 19.44\nBago:    4. ) 194.4  <span class="text-gray-600 text-base">(Gawing buong bilang ang divisor)</span>',
                aralin2_ex1_a: "Ang sagot (Quotient) ay <b>48.6</b>.",
                aralin2_ex2_q: "HALIMBAWA 2: Hatiin ang 4.984 sa 0.14.",
                aralin2_ex2_p: "Ilipat ang desimal point ng 2 lunan:",
                aralin2_ex2_math: 'Original: 0.14 ) 4.984\nBago:    14. ) 498.4',
                aralin2_ex2_a: "Ang sagot (Quotient) ay <b>35.6</b>.",
                aralin2_h3_2: "Pagsusuri ng Sagot",
                aralin2_p2: "Upang masuri kung tama ang quotient, paramihin ang <b>Quotient &times; Divisor</b>. Ang product ay dapat katumbas ng <b>Dividend</b>.",
                
                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Lutasin ang mga sumusunod na suliranin gamit ang Pagpaparami at Paghahati ng mga Desimal.",
                quiz_section_a: "A. Pagpaparami (Multiplication)",
                qa1_label: "1. Hanapin ang product ng 4.38 at 3.6:",
                qa2_label: "2. Hanapin ang halaga sa Piso: P175.50 &times; 52.00 exchange rate:",
                qa3_label: "3. Kabuuang distansiya: 41.5 km/hr &times; 5.5 hours:",
                quiz_section_b: "B. Paghahati (Division)",
                qb1_label: "1. Ilang pandesal? P225.75 &divide; P0.50 bawat isa:",
                qb2_label: "2. Average speed: 15.4 km &divide; 0.4 hours:",
                qb3_label: "3. Hatiin ang 39.69 sa 6.3:",
                quiz_button: "Tingnan ang Sagot",
                placeholder_product: "Product",
                placeholder_product_p: "Product (P)",
                placeholder_product_km: "Product (km)",
                placeholder_quotient: "Quotient",
                placeholder_quotient_km: "Quotient (km/hr)",

                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang decimal operations.`,
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


        // Function to clean and standardize input
        function standardizeNumberInput(value) {
            if (typeof value !== 'string') value = String(value);
            // Clean non-numeric characters except for dots and comma (we strip comma later)
            return value.trim().replace(/[^0-9.]/g, ''); 
        }

        // Function to check a number answer, allowing for floating point precision
        function checkNumberAnswer(id, expected) {
            const input = document.getElementById(id);
            // Remove unit labels (P, peso, km, etc.) before standardization
            const rawValue = standardizeNumberInput(input.value.replace(/p\s?|peso|km|hr|piece/gi, ''));
            const expectedStr = String(expected).trim();
            
            let isCorrect = false;

            // Use loose comparison allowing for slight floating point differences
            if (Math.abs(parseFloat(rawValue) - parseFloat(expectedStr)) < 0.001) {
                isCorrect = true; 
            } else if (rawValue === expectedStr) {
                 // Check for exact string match if no calculation was needed (e.g., pure integers)
                 isCorrect = true;
            }
            
            input.classList.remove('correct-answer', 'incorrect-answer');

            if (isCorrect) {
                input.classList.add('correct-answer');
                return 1;
            } else if (rawValue.length > 0) {
                input.classList.add('incorrect-answer');
            }
            return 0;
        }


        /**
         * Submits the quiz and calculates the score.
         * @param {boolean} isLanguageToggle - True if called only to refresh results language.
         */
        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 6; 
            const resultsDiv = document.getElementById('results');

            // Define correct answers
            const answers = {
                qa1: 15.768,   // 4.38 * 3.6 = 15.768
                qa2: 9126,     // 175.50 * 52.00 = 9126
                qa3: 228.25,   // 41.5 * 5.5 = 228.25
                qb1: 451.5,    // 225.75 / 0.50 = 451.5
                qb2: 38.5,     // 15.4 / 0.4 = 38.5
                qb3: 6.3,      // 39.69 / 6.3 = 6.3
            };
            
            if (!isLanguageToggle) {
                // Run checks only on button click, not language toggle
                correctCount += checkNumberAnswer('qa1_final', answers.qa1); 
                correctCount += checkNumberAnswer('qa2_final', answers.qa2);
                correctCount += checkNumberAnswer('qa3_final', answers.qa3);
                correctCount += checkNumberAnswer('qb1_final', answers.qb1); 
                correctCount += checkNumberAnswer('qb2_final', answers.qb2);
                correctCount += checkNumberAnswer('qb3_final', answers.qb3);
                
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
        
        document.getElementById('decimal-operations-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); // Run scoring logic
        });
    </script>
</body>
</html>
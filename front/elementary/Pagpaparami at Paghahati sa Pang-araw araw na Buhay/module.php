<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Multiplication and Division in Daily Life</title>
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
        
        /* Long division step size adjustment */
        .long-division-step {
            font-size: 1.25rem; /* 20px */
            line-height: 1.75;
        }
        
        /* ADDED: Sticky container styling for the left nav bar */
        .sticky-container {
            position: sticky;
            top: 1.5rem; /* Adjust this value to control the space above the sticky elements */
        }
    </style>
</head>
<!-- UPDATED: Changed body padding to match the full-width template (lg:p-20) -->
<body class="p-4 sm:p-8 lg:p-20">

    <!-- Main Grid Container for Outline and Content (Removed max-w-7xl) -->
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Multiplication</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Division</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Multiplication and Division in Daily Life</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Learning multiplication and division of large numbers (3-5 digits) to solve everyday problems.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Perform <b>multiplication</b> of three- to five-digit whole numbers;</li>
                        <li data-i18n="obj_2">Perform <b>division</b> of three- to five-digit whole numbers; and</li>
                        <li data-i18n="obj_3">Apply multiplication and division of whole numbers to solve problems.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Pagpaparami -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Multiplication</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1"><b>Multiplication</b> of large numbers is done by multiplying each digit of the multiplier by the multiplicand and then adding (addition) the resulting <b>partial products</b>.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Example 1: Three-Digit x One-Digit</h3>
                            <p data-i18n="aralin1_p2">Find the product of <b>128 &times; 4</b>.</p>
                            <pre class="whitespace-pre-wrap font-mono mt-2 p-2 bg-gray-100 rounded-lg text-gray-800" data-i18n="aralin1_ex1_math">
  128  (Multiplicand)
x 4    (Multiplier)
-----
  <b>512</b>  (Product)</pre>
                            <ul class="list-disc list-inside ml-4 mb-4">
                                <li data-i18n="aralin1_ex1_step1">4 x 8 = 32 (write 2, carry 3 to the tens)</li>
                                <li data-i18n="aralin1_ex1_step2">4 x 2 = 8, add 3: 11 (write 1, carry 1 to the hundreds)</li>
                                <li data-i18n="aralin1_ex1_step3">4 x 1 = 4, add 1: 5 (write 5)</li>
                            </ul>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Example 2: Four-Digit x Two-Digit</h3>
                            <p data-i18n="aralin1_p3">Find the product of <b>7,250 &times; 25</b>.</p>
                            <pre class="whitespace-pre-wrap font-mono mt-2 p-2 bg-gray-100 rounded-lg text-gray-800" data-i18n="aralin1_ex2_math">
   7250
 x 25
 ------
  36250   (First Partial Product: 7250 x 5)
+14500    (Second Partial Product: 7250 x 20)
 ------
 <b>181,250</b>  (Final Product)</pre>
                            <p class="font-bold mt-2" data-i18n="aralin1_ex2_result">Result: The product is 181,250.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Example 3: Five-Digit x Three-Digit (With Zero)</h3>
                            <p data-i18n="aralin1_p4">Find the product of <b>26,485 &times; 609</b>.</p>
                            <pre class="whitespace-pre-wrap font-mono mt-2 p-2 bg-gray-100 rounded-lg text-gray-800" data-i18n="aralin1_ex3_math">
   26485
 x 609
 -------
  238365  (First Partial Product: 26485 x 9)
  00000   (Second Partial Product: 26485 x 0, aligned to tens)
+158910   (Third Partial Product: 26485 x 600, aligned to hundreds)
 -------
<b>16,129,365</b> (Final Product)</pre>
                        </div>
                    </details>

                    <!-- ARALIN 2: Paghahati -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Division</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1"><b>Division</b> is performed using the <b>long division</b> method. We start with the highest place value (left) moving to the lowest (right).</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Example 1: Division Without Remainder (432 &divide; 6)</h3>
                            <pre class="whitespace-pre-wrap font-mono mt-2 p-2 bg-gray-100 rounded-lg text-gray-800" data-i18n="aralin2_ex1_math">
       72  (Quotient)
     -----
Divisor→ 6 ) 432  (Dividend)
         -42   (6 x 7 = 42)
         ---
          12
         -12   (6 x 2 = 12)
         ---
           0   (Remainder)
                            </pre>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Example 2: Division With Remainder (423 &divide; 5)</h3>
                            <pre class="whitespace-pre-wrap font-mono mt-2 p-2 bg-gray-100 rounded-lg text-gray-800" data-i18n="aralin2_ex2_math">
       84 R 3
     ------
Divisor→ 5 ) 423 
         -40
         ---
          23
         -20
         ---
           <b>3</b> (Remainder)
                            </pre>
                            <p class="font-bold mt-2" data-i18n="aralin2_ex2_result">Result: 84 with a remainder of 3.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_3">Checking Rule</h3>
                            <p data-i18n="aralin2_p2">To check if the answer is correct, use the formula:</p>
                            <p class="math-display" data-i18n="aralin2_math_1"><b>(Quotient &times; Divisor) + Remainder = Dividend</b></p>
                            <p data-i18n="aralin2_math_2">Example: (84 &times; 5) + 3 = 420 + 3 = <b>423</b>. (Correct)</p>

                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Solve the following problems using Multiplication and Division.</p>

                    <form id="whole-number-operations-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Multiplication</p>
                            <!-- UPDATED: Removed grid for vertical alignment -->
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1_final" class="font-medium" data-i18n="qa1_label">1. Product of 8,234 &times; 97 (4-digit x 2-digit):</label>
                                    <input type="text" id="qa1_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa1_placeholder" placeholder="Product">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2_final" class="font-medium" data-i18n="qa2_label">2. Product of 67,048 &times; 846 (5-digit x 3-digit):</label>
                                    <input type="text" id="qa2_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa2_placeholder" placeholder="Product">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Division</p>
                            <!-- UPDATED: Removed grid for vertical alignment -->
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1_final" class="font-medium" data-i18n="qb1_label">1. Quotient of 8,234 &divide; 46 (4-digit &divide; 2-digit):</label>
                                    <input type="text" id="qb1_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qb1_placeholder" placeholder="Quotient">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2_final" class="font-medium" data-i18n="qb2_label">2. Quotient of 14,768 &divide; 378 (5-digit &divide; 3-digit, with remainder):</label>
                                    <input type="text" id="qb2_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qb2_placeholder" placeholder="Quotient (e.g., 39 R 26)">
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_c">C. Word Problems</p>
                            <!-- Vertical alignment applied via flex-col space-y-4 -->
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qc1_final" class="font-medium" data-i18n="qc1_label">1. Total Cost: 16 computer tables &times; P2,671 each (P):</label>
                                    <input type="text" id="qc1_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qc1_placeholder" placeholder="Answer (P)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qc2_final" class="font-medium" data-i18n="qc2_label">2. Cost per kilo: P1,845 &divide; 15 kg of beef (P/kg):</label>
                                    <input type="text" id="qc2_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qc2_placeholder" placeholder="Answer (P)">
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
                outline_aralin1: "Lesson 1: Multiplication",
                outline_aralin2: "Lesson 2: Division",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Multiplication and Division in Daily Life",
                h1_subtitle: "Learning multiplication and division of large numbers (3-5 digits) to solve everyday problems.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Perform <b>multiplication</b> of three- to five-digit whole numbers;",
                obj_2: "Perform <b>division</b> of three- to five-digit whole numbers; and",
                obj_3: "Apply multiplication and division of whole numbers to solve problems.",

                // Lesson 1 Content (Multiplication)
                aralin1_title: "Lesson 1: Multiplication",
                aralin1_p1: "<b>Multiplication</b> of large numbers is done by multiplying each digit of the multiplier by the multiplicand and then adding (addition) the resulting <b>partial products</b>.",
                aralin1_h3_1: "Example 1: Three-Digit x One-Digit",
                aralin1_p2: "Find the product of <b>128 &times; 4</b>.",
                aralin1_ex1_math: '  128  (Multiplicand)\r\nx 4    (Multiplier)\r\n-----\r\n  <b>512</b>  (Product)',
                aralin1_ex1_step1: "4 x 8 = 32 (write 2, carry 3 to the tens)",
                aralin1_ex1_step2: "4 x 2 = 8, add 3: 11 (write 1, carry 1 to the hundreds)",
                aralin1_ex1_step3: "4 x 1 = 4, add 1: 5 (write 5)",
                aralin1_h3_2: "Example 2: Four-Digit x Two-Digit",
                aralin1_p3: "Find the product of <b>7,250 &times; 25</b>.",
                aralin1_ex2_math: '   7250\r\n x 25\r\n ------\r\n  36250   (First Partial Product: 7250 x 5)\r\n+14500    (Second Partial Product: 7250 x 20)\r\n ------\r\n <b>181,250</b>  (Final Product)',
                aralin1_ex2_result: "Result: The product is 181,250.",
                aralin1_h3_3: "Example 3: Five-Digit x Three-Digit (With Zero)",
                aralin1_p4: "Find the product of <b>26,485 &times; 609</b>.",
                aralin1_ex3_math: '   26485\r\n x 609\r\n -------\r\n  238365  (First Partial Product: 26485 x 9)\r\n  00000   (Second Partial Product: 26485 x 0, aligned to tens)\r\n+158910   (Third Partial Product: 26485 x 600, aligned to hundreds)\r\n -------\r\n<b>16,129,365</b> (Final Product)',

                // Lesson 2 Content (Division)
                aralin2_title: "Lesson 2: Division",
                aralin2_p1: "<b>Division</b> is performed using the <b>long division</b> method. We start with the highest place value (left) moving to the lowest (right).",
                aralin2_h3_1: "Example 1: Division Without Remainder (432 &divide; 6)",
                aralin2_ex1_math: '       72  (Quotient)\r\n     -----\r\nDivisor→ 6 ) 432  (Dividend)\r\n         -42   (6 x 7 = 42)\r\n         ---\r\n          12\r\n         -12   (6 x 2 = 12)\r\n         ---\r\n           0   (Remainder)',
                aralin2_h3_2: "Example 2: Division With Remainder (423 &divide; 5)",
                aralin2_ex2_math: '       84 R 3\r\n     ------\r\nDivisor→ 5 ) 423 \r\n         -40\r\n         ---\r\n          23\r\n         -20\r\n         ---\r\n           <b>3</b> (Remainder)',
                aralin2_ex2_result: "Result: 84 with a remainder of 3.",
                aralin2_h3_3: "Checking Rule",
                aralin2_p2: "To check if the answer is correct, use the formula:",
                aralin2_math_1: "<b>(Quotient &times; Divisor) + Remainder = Dividend</b>",
                aralin2_math_2: "Example: (84 &times; 5) + 3 = 420 + 3 = <b>423</b>. (Correct)",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Solve the following problems using Multiplication and Division.",
                quiz_section_a: "A. Multiplication",
                qa1_label: "1. Product of 8,234 &times; 97 (4-digit x 2-digit):",
                qa2_label: "2. Product of 67,048 &times; 846 (5-digit x 3-digit):",
                qa1_placeholder: "Product",
                qa2_placeholder: "Product",
                quiz_section_b: "B. Division",
                qb1_label: "1. Quotient of 8,234 &divide; 46 (4-digit &divide; 2-digit):",
                qb2_label: "2. Quotient of 14,768 &divide; 378 (5-digit &divide; 3-digit, with remainder):",
                qb1_placeholder: "Quotient",
                qb2_placeholder: "Quotient (e.g., 39 R 26)",
                quiz_section_c: "C. Word Problems",
                qc1_label: "1. Total Cost: 16 computer tables &times; P2,671 each (P):",
                qc2_label: "2. Cost per kilo: P1,845 &divide; 15 kg of beef (P/kg):",
                qc1_placeholder: "Answer (P)",
                qc2_placeholder: "Answer (P)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered whole number arithmetic!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Read Lessons 1 and 2 again.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pagpaparami",
                outline_aralin2: "Aralin 2: Paghahati",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Pagpaparami at Paghahati sa Pang araw araw na Buhay",
                h1_subtitle: "Ang pag-aaral ng pagpaparami at paghahati ng malalaking bilang (3-5 tambilang) upang malutas ang mga suliranin sa pang-araw-araw na buhay.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Maisagawa ang <b>pagpaparami</b> ng tatlo hanggang limang tambilang na buong bilang;",
                obj_2: "Maisagawa ang <b>paghahati</b> ng tatlo hanggang limang tambilang na buong bilang; at",
                obj_3: "Magamit ang pagpaparami at paghahati ng mga buong bilang sa paglutas ng mga suliranin.",

                // Lesson 1 Content (Multiplication)
                aralin1_title: "Aralin 1: Pagpaparami (Multiplication)",
                aralin1_p1: "Ang <b>pagpaparami</b> ng malalaking bilang ay isinasagawa sa pamamagitan ng pag-multiply ng bawat digit ng multiplier sa multiplicand at pagkatapos ay idadagdag (addition) ang mga <b>partial product</b>.",
                aralin1_h3_1: "Halimbawa 1: Tatlong-Tambilang x Isang-Tambilang",
                aralin1_p2: "Hanapin ang product ng <b>128 &times; 4</b>.",
                aralin1_ex1_math: '  128  (Multiplicand)\r\nx 4    (Multiplier)\r\n-----\r\n  <b>512</b>  (Product)',
                aralin1_ex1_step1: "4 x 8 = 32 (ilagay ang 2, i-carry ang 3 sa tig-sasampu)",
                aralin1_ex1_step2: "4 x 2 = 8, idagdag ang 3: 11 (ilagay ang 1, i-carry ang 1 sa tig-iisang daan)",
                aralin1_ex1_step3: "4 x 1 = 4, idagdag ang 1: 5 (ilagay ang 5)",
                aralin1_h3_2: "Halimbawa 2: Apat na-Tambilang x Dalawang-Tambilang",
                aralin1_p3: "Hanapin ang product ng <b>7,250 &times; 25</b>.",
                aralin1_ex2_math: '   7250\r\n x 25\r\n ------\r\n  36250   (Unang Product: 7250 x 5)\r\n+14500    (Ikalawang Product: 7250 x 20)\r\n ------\r\n <b>181,250</b>  (Huling Product)',
                aralin1_ex2_result: "Resulta: Ang product ay 181,250.",
                aralin1_h3_3: "Halimbawa 3: Limang-Tambilang x Tatlong-Tambilang (May Sero)",
                aralin1_p4: "Hanapin ang product ng <b>26,485 &times; 609</b>.",
                aralin1_ex3_math: '   26485\r\n x 609\r\n -------\r\n  238365  (Unang Product: 26485 x 9)\r\n  00000   (Ikalawang Product: 26485 x 0, nakahanay sa tens)\r\n+158910   (Ikatlong Product: 26485 x 600, nakahanay sa hundreds)\r\n -------\r\n<b>16,129,365</b> (Huling Product)',

                // Lesson 2 Content (Division)
                aralin2_title: "Aralin 2: Paghahati (Division)",
                aralin2_p1: "Ang <b>paghahati</b> ay ginagawa sa pamamagitan ng <b>mahabang paraan (long division)</b>. Nagsisimula tayo sa pinakamataas na place value (kaliwa) patungo sa pinakamababa (kanan).",
                aralin2_h3_1: "Halimbawa 1: Paghahati na Walang Remainder (432 &divide; 6)",
                aralin2_ex1_math: '       72  (Quotient)\r\n     -----\r\nDivisor→ 6 ) 432  (Dividend)\r\n         -42   (6 x 7 = 42)\r\n         ---\r\n          12\r\n         -12   (6 x 2 = 12)\r\n         ---\r\n           0   (Remainder)',
                aralin2_h3_2: "Halimbawa 2: Paghahati na May Remainder (423 &divide; 5)",
                aralin2_ex2_math: '       84 R 3\r\n     ------\r\nDivisor→ 5 ) 423 \r\n         -40\r\n         ---\r\n          23\r\n         -20\r\n         ---\r\n           <b>3</b> (Remainder)',
                aralin2_ex2_result: "Resulta: 84 na may remainder na 3.",
                aralin2_h3_3: "Tuntunin sa Pagsusuri (Checking)",
                aralin2_p2: "Upang masuri kung tama ang sagot, gamitin ang pormulang:",
                aralin2_math_1: "<b>(Quotient &times; Divisor) + Remainder = Dividend</b>",
                aralin2_math_2: "Halimbawa: (84 &times; 5) + 3 = 420 + 3 = <b>423</b>. (Tama)",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Lutasin ang mga sumusunod na suliranin gamit ang Pagpaparami at Paghahati.",
                quiz_section_a: "A. Pagpaparami (Multiplication)",
                qa1_label: "1. Product ng 8,234 &times; 97 (4-digit x 2-digit):",
                qa2_label: "2. Product ng 67,048 &times; 846 (5-digit x 3-digit):",
                qa1_placeholder: "Product",
                qa2_placeholder: "Product",
                quiz_section_b: "B. Paghahati (Division)",
                qb1_label: "1. Quotient ng 8,234 &divide; 46 (4-digit &divide; 2-digit):",
                qb2_label: "2. Quotient ng 14,768 &divide; 378 (5-digit &divide; 3-digit, may remainder):",
                qb1_placeholder: "Quotient",
                qb2_placeholder: "Quotient (e.g., 39 R 26)",
                quiz_section_c: "C. Word Problems",
                qc1_label: "1. Kabuuang Gastos: 16 na computer tables &times; P2,671 bawat isa (P):",
                qc2_label: "2. Halaga ng bawat kilo: P1,845 &divide; 15 kilo ng karne ng baka (P/kilo):",
                qc1_placeholder: "Sagot (P)",
                qc2_placeholder: "Sagot (P)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang aritmetika ng buong bilang!`,
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


        // Function to standardize currency/number input for comparison
        function standardizeInput(value, isCurrency = false) {
            if (typeof value !== 'string') value = String(value);
            // Remove spaces and commas, and non-numeric characters except for 'R'
            value = value.trim().replace(/\s/g, '').replace(/,/g, ''); 
            
            if (isCurrency) {
                value = value.replace(/^[Pp]/, '').replace(/\/kilo/gi, ''); // Remove 'P' or 'p' and unit
                const parsedValue = parseInt(value);
                if (isNaN(parsedValue)) return value;
                return String(parsedValue);
            } else if (value.toUpperCase().includes('R')) {
                // Special handling for Quotient with Remainder (e.g., "39R26")
                return value.toUpperCase().replace(/\s/g, '');
            } else {
                // For general whole numbers 
                 const parsedValue = parseInt(value);
                 if (isNaN(parsedValue)) return value;
                 return String(parsedValue);
            }
        }

        function checkAnswer(id, expected) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            const expectedStr = String(expected);
            
            let isCorrect = false;

            input.classList.remove('correct-answer', 'incorrect-answer');

            // Determine if input is currency for standardization
            const isCurrency = id === 'qc1_final' || id === 'qc2_final';
            const standardizedValue = standardizeInput(rawValue, isCurrency);
            const standardizedExpected = standardizeInput(expectedStr, isCurrency);
            
            if (standardizedValue === standardizedExpected) {
                isCorrect = true;
            }

            
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

            // --- Final Assessment Answers ---
            const answers = {
                // A1: 8234 * 97 = 798698
                qa1: 798698,
                // A2: 67048 * 846 = 56722608
                qa2: 56722608,
                // B1: 8234 / 46 = 179
                qb1: 179,
                // B2: 14768 / 378 = 39 R 26
                qb2: '39R26', // Standardized format is simpler
                // C1: 2671 * 16 = 42736 (P)
                qc1: 42736,
                // C2: 1845 / 15 = 123 (P)
                qc2: 123,
            };

            if (!isLanguageToggle) {
                // Run checks only on button click, not language toggle
                correctCount += checkAnswer('qa1_final', answers.qa1);
                correctCount += checkAnswer('qa2_final', answers.qa2);
                correctCount += checkAnswer('qb1_final', answers.qb1);
                correctCount += checkAnswer('qb2_final', answers.qb2); 
                correctCount += checkAnswer('qc1_final', answers.qc1);
                correctCount += checkAnswer('qc2_final', answers.qc2); 
                
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
        
        document.getElementById('whole-number-operations-quiz-form').addEventListener('submit', function(e) {
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
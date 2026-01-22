<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication and Division 1</title>
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
        
        /* Table styles (Multiplication Table) */
        .mult-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
            font-size: 1.25rem; /* 20px */
            border: 2px solid #1f2937; 
        }
        .mult-table th, .mult-table td {
            border: 1px solid #1f2937; 
            padding: 0.75rem 0.5rem;
            text-align: center;
        }
        .mult-table th {
            background-color: #10b981; 
            color: #ffffff; 
            font-weight: 600;
        }
        .mult-table td {
            background-color: #ecfdf5; 
            color: #1f2937; 
        }
        
        /* Pre tag (code block for long division) */
        .content-box pre {
            font-size: 1.25rem; /* 20px */
            line-height: 1.5;
            font-family: monospace;
            color: #1f2937;
        }

        /* Custom styles for sticky sidebar on large screens */
        @media (min-width: 1024px) {
            .sticky-container {
                /* top: 2rem is set via lg:top-8 in HTML. 
                   We calculate max-height based on this to prevent clipping */
                max-height: calc(100vh - 4rem); 
                overflow-y: auto; 
            }
        }

    </style>
</head>
<body class="p-4 sm:p-8 lg:p-20">

    <!-- Main Grid Container for Outline and Content -->
    <div class="mx-auto lg:grid lg:grid-cols-12 lg:gap-8">

        <!-- Left Column: Outline and Translator -->
        <nav id="outline-nav" class="lg:block lg:col-span-3 mb-8 lg:mb-0">
            <!-- STICKY WRAPPER: Contains all elements that need to stick to the top -->
            <div class="sticky-container space-y-4 lg:sticky lg:top-8">

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
                    <span class="text-xs font-semibold uppercase tracking-wider text-green-600 bg-green-100 px-3 py-1 rounded-full" data-i18n="meta_text">Lower Elementary Learning Module Sheet</span>
                    <!-- UPDATED: Added main-title-h1 class and font-bold for 50px size -->
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Multiplication and Division 1</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">The basic operations of multiplication and division of whole numbers.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Multiply whole numbers up to <b>two digits</b>;</li>
                        <li data-i18n="obj_2">Divide whole numbers up to <b>two digits</b>; and</li>
                        <li data-i18n="obj_3">Solve simple math problems involving multiplication and division.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Pagpaparami (Multiplication) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Multiplication</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1"><b>Multiplication</b> is increasing a number many times. It is a shortened way of repetitive <b>addition</b>.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Parts of Multiplication</h3>
                            <p class="math-display" data-i18n="aralin1_math_1">
                                <b>6 &times; 3 = 18</b><br>
                                <span class="text-base font-normal">(Factor) &times; (Factor) = <b>Product</b></span>
                            </p>
                            <ul class="list-disc list-inside space-y-1 ml-4">
                                <li data-i18n="aralin1_ul1_1">The <b>symbol</b> for multiplication is &times; (read as "times").</li>
                                <li data-i18n="aralin1_ul1_2">The <b>Factors</b> are the numbers being multiplied.</li>
                                <li data-i18n="aralin1_ul1_3">The <b>Product</b> is the answer to multiplication, which is always larger than any of the factors (unless the factor is 0 or 1).</li>
                                <li data-i18n="aralin1_ul1_4">Changing the order of the factors does not change the product (e.g., 6 &times; 3 = 18 and 3 &times; 6 = 18).</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Rules for Multiplication</h3>
                            <ul class="list-disc list-inside space-y-1 ml-4">
                                <li data-i18n="aralin1_ul2_1">Any number multiplied by <b>zero (0)</b>, the result is <b>0</b>.</li>
                                <li data-i18n="aralin1_ul2_2">Any number multiplied by <b>one (1)</b>, the result is still the number being multiplied.</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Multiplying Two Digits</h3>
                            <p data-i18n="aralin1_p2">We use the <b>expanded form</b> to easily get the product.</p>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_q">EXAMPLE: Get the product of 27 &times; 3.</p>
                                <pre class="whitespace-pre-wrap text-2xl font-mono mt-2 text-gray-800 text-left" data-i18n="aralin1_ex1_math">
  27  ->  20 + 7
x 3   ->    x 3
-----     -----
            21  <span class="text-gray-600 text-base">(3 x 7)</span>
          + 60  <span class="text-gray-600 text-base">(3 x 20)</span>
          -----
           <b>81</b>
                                </pre>
                            </div>

                        </div>
                    </details>

                    <!-- ARALIN 2: Paghahati (Division) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Division</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1"><b>Division</b> is figuring out how many small numbers are contained within a large number. It is the opposite of multiplication.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Parts of Division</h3>
                            <p class="math-display" data-i18n="aralin2_math_1">
                                <b>18 &divide; 2 = 9</b><br>
                                <span class="text-base font-normal">(Dividend) &divide; (Divisor) = <b>Quotient</b></span>
                            </p>
                            <ul class="list-disc list-inside space-y-1 ml-4">
                                <li data-i18n="aralin2_ul1_1">The <b>Dividend</b> is the larger number being divided.</li>
                                <li data-i18n="aralin2_ul1_2">The <b>Divisor</b> is the number dividing the dividend.</li>
                                <li data-i18n="aralin2_ul1_3">The <b>Quotient</b> is the answer to the division, which is always smaller than the dividend.</li>
                                <li data-i18n="aralin2_ul1_4">The symbols used are &divide;, (long division), or <b>Dividend/Divisor</b> (fraction).</li>
                                <li data-i18n="aralin2_ul1_5">You can check the answer to division using <b>multiplication</b>: <b>Quotient &times; Divisor = Dividend</b>.</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Dividing Two Digits</h3>
                            <p data-i18n="aralin2_p2">We use <b>long division</b> for larger numbers.</p>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_q">EXAMPLE: Divide 96 by 3.</p>
                                <pre class="whitespace-pre-wrap text-lg font-mono mt-2 text-gray-800 text-left px-4" data-i18n="aralin2_ex1_math">
   <u> 32</u> <span class="text-gray-600 text-base">(Quotient)</span>
3 | 96 <span class="text-gray-600 text-base">(Dividend)</span>
  - 9
  ---\n    06\n   - 6\n   ---\n     0 <span class="text-gray-600 text-base">(Remainder)</span>\n\nResult: <b>32</b>
                                </pre>
                                <p class="mt-2 text-sm italic" data-i18n="aralin2_ex1_check">Check: 32 &times; 3 = 96. Correct.</p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_3">Dividing Numbers with Zero (0)</h3>
                            <p data-i18n="aralin2_p3">If the dividend and divisor end in zero, you can remove the zero first and divide the remaining digits.</p>
                            <p class="math-display" data-i18n="aralin2_math_2">
                                <b>60 &divide; 20 = 3</b><br>
                                <span class="text-base font-normal">(This is like: 6 &divide; 2 = 3)</span>
                            </p>
                            <p data-i18n="aralin2_p4">If only the dividend has a zero, divide the digits first, and add the zero to the quotient.</p>
                            <p class="math-display" data-i18n="aralin2_math_3">
                                <b>60 &divide; 2 = 30</b><br>
                                <span class="text-base font-normal">(This is like: 6 &divide; 2 = 3, and add the 0: 30)</span>
                            </p>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Based on PDF exercises from pages 12, 25) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Test your knowledge of Multiplication and Division.</p>

                    <form id="math-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Multiplication (Give the Product)</p>
                            <!-- Vertical stacking on mobile, 2 columns on desktop -->
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                                <div class="flex flex-col sm:flex-row sm:items-center space-y-1 sm:space-y-0 sm:space-x-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. 23 packets &times; P4 per packet = P</label>
                                    <input type="text" id="qa1" class="quiz-input w-full sm:w-28" data-i18n-placeholder="placeholder_product" placeholder="Product">
                                </div>
                                <div class="flex flex-col sm:flex-row sm:items-center space-y-1 sm:space-y-0 sm:space-x-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. 13 pots &times; 7 flowers per pot =</label>
                                    <input type="text" id="qa2" class="quiz-input w-full sm:w-28" data-i18n-placeholder="placeholder_product" placeholder="Product">
                                </div>
                                <div class="flex flex-col sm:flex-row sm:items-center space-y-1 sm:space-y-0 sm:space-x-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. 17 pieces &times; 4 packets =</label>
                                    <input type="text" id="qa3" class="quiz-input w-full sm:w-28" data-i18n-placeholder="placeholder_product" placeholder="Product">
                                </div>
                                <div class="flex flex-col sm:flex-row sm:items-center space-y-1 sm:space-y-0 sm:space-x-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. 29 &times; 3 =</label>
                                    <input type="text" id="qa4" class="quiz-input w-full sm:w-28" data-i18n-placeholder="placeholder_product" placeholder="Product">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Division (Give the Quotient)</p>
                            <!-- Vertical stacking on mobile, 2 columns on desktop -->
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                                <div class="flex flex-col sm:flex-row sm:items-center space-y-1 sm:space-y-0 sm:space-x-2">
                                    <label for="qb1" class="font-medium" data-i18n="qb1_label">1. 78 &divide; 3 =</label>
                                    <input type="text" id="qb1" class="quiz-input w-full sm:w-28" data-i18n-placeholder="placeholder_quotient" placeholder="Quotient">
                                </div>
                                <div class="flex flex-col sm:flex-row sm:items-center space-y-1 sm:space-y-0 sm:space-x-2">
                                    <label for="qb2" class="font-medium" data-i18n="qb2_label">2. 24 sacks &divide; 4 sacks per trip =</label>
                                    <input type="text" id="qb2" class="quiz-input w-full sm:w-28" data-i18n-placeholder="placeholder_quotient" placeholder="Quotient">
                                </div>
                                <div class="flex flex-col sm:flex-row sm:items-center space-y-1 sm:space-y-0 sm:space-x-2">
                                    <label for="qb3" class="font-medium" data-i18n="qb3_label">3. 85 &divide; 5 =</label>
                                    <input type="text" id="qb3" class="quiz-input w-full sm:w-28" data-i18n-placeholder="placeholder_quotient" placeholder="Quotient">
                                </div>
                                <div class="flex flex-col sm:flex-row sm:items-center space-y-1 sm:space-y-0 sm:space-x-2">
                                    <label for="qb4" class="font-medium" data-i18n="qa4_label">4. 48 &divide; 8 =</label>
                                    <input type="text" id="qb4" class="quiz-input w-full sm:w-28" data-i18n-placeholder="placeholder_quotient" placeholder="Quotient">
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
                meta_text: "Lower Elementary Learning Module Sheet",
                h1_title: "Multiplication and Division 1",
                h1_subtitle: "The basic operations of multiplication and division of whole numbers.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Multiply whole numbers up to <b>two digits</b>;",
                obj_2: "Divide whole numbers up to <b>two digits</b>; and",
                obj_3: "Solve simple math problems involving multiplication and division.",

                // Lesson 1 Content (Multiplication)
                aralin1_title: "Lesson 1: Multiplication",
                aralin1_p1: "<b>Multiplication</b> is increasing a number many times. It is a shortened way of repetitive <b>addition</b>.",
                aralin1_h3_1: "Parts of Multiplication",
                aralin1_math_1: '<b>6 &times; 3 = 18</b><br><span class="text-base font-normal">(Factor) &times; (Factor) = <b>Product</b></span>',
                aralin1_ul1_1: "The <b>symbol</b> for multiplication is &times; (read as \"times\").",
                aralin1_ul1_2: "The <b>Factors</b> are the numbers being multiplied.",
                aralin1_ul1_3: "The <b>Product</b> is the answer to multiplication, which is always larger than any of the factors (unless the factor is 0 or 1).",
                aralin1_ul1_4: "Changing the order of the factors does not change the product (e.g., 6 &times; 3 = 18 and 3 &times; 6 = 18).",
                aralin1_h3_2: "Rules for Multiplication",
                aralin1_ul2_1: "Any number multiplied by <b>zero (0)</b>, the result is <b>0</b>.",
                aralin1_ul2_2: "Any number multiplied by <b>one (1)</b>, the result is still the number being multiplied.",
                aralin1_h3_3: "Multiplying Two Digits",
                aralin1_p2: "We use the <b>expanded form</b> to easily get the product.",
                aralin1_ex1_q: "EXAMPLE: Get the product of 27 &times; 3.",
                aralin1_ex1_math: '  27  ->  20 + 7\nx 3   ->    x 3\n-----\t  -----\n\t    21  <span class="text-gray-600 text-base">(3 x 7)</span>\n\t  + 60  <span class="text-gray-600 text-base">(3 x 20)</span>\n\t  -----\n\t   <b>81</b>',
                
                // Lesson 2 Content (Division)
                aralin2_title: "Lesson 2: Division",
                aralin2_p1: "<b>Division</b> is figuring out how many small numbers are contained within a large number. It is the opposite of multiplication.",
                aralin2_h3_1: "Parts of Division",
                aralin2_math_1: '<b>18 &divide; 2 = 9</b><br><span class="text-base font-normal">(Dividend) &divide; (Divisor) = <b>Quotient</b></span>',
                aralin2_ul1_1: "The <b>Dividend</b> is the larger number being divided.",
                aralin2_ul1_2: "The <b>Divisor</b> is the number dividing the dividend.",
                aralin2_ul1_3: "The <b>Quotient</b> is the answer to the division, which is always smaller than the dividend.",
                aralin2_ul1_4: "The symbols used are &divide;, (long division), or <b>Dividend/Divisor</b> (fraction).",
                aralin2_ul1_5: "You can check the answer to division using <b>multiplication</b>: <b>Quotient &times; Divisor = Dividend</b>.",
                aralin2_h3_2: "Dividing Two Digits",
                aralin2_p2: "We use <b>long division</b> for larger numbers.",
                aralin2_ex1_q: "EXAMPLE: Divide 96 by 3.",
                aralin2_ex1_math: '   <u> 32</u> <span class="text-gray-600 text-base">(Quotient)</span>\n3 | 96 <span class="text-gray-600 text-base">(Dividend)</span>\n  - 9\n  ---\n    06\n   - 6\n   ---\n     0 <span class="text-gray-600 text-base">(Remainder)</span>\n\nResult: <b>32</b>',
                aralin2_ex1_check: "Check: 32 &times; 3 = 96. Correct.",
                aralin2_h3_3: "Dividing Numbers with Zero (0)",
                aralin2_p3: "If the dividend and divisor end in zero, you can remove the zero first and divide the remaining digits.",
                aralin2_math_2: '<b>60 &divide; 20 = 3</b><br><span class="text-base font-normal">(This is like: 6 &divide; 2 = 3)</span>',
                aralin2_p4: "If only the dividend has a zero, divide the digits first, and add the zero to the quotient.",
                aralin2_math_3: '<b>60 &divide; 2 = 30</b><br><span class="text-base font-normal">(This is like: 6 &divide; 2 = 3, and add the 0: 30)</span>',
                
                // Quiz Labels
                quiz_title: "Practice",
                quiz_subtitle: "Test your knowledge of Multiplication and Division.",
                quiz_section_a: "A. Multiplication (Give the Product)",
                qa1_label: "1. 23 packets &times; P4 per packet = P",
                qa2_label: "2. 13 pots &times; 7 flowers per pot =",
                qa3_label: "3. 17 pieces &times; 4 packets =",
                qa4_label: "4. 29 &times; 3 =",
                quiz_section_b: "B. Division (Give the Quotient)",
                qb1_label: "1. 78 &divide; 3 =",
                qb2_label: "2. 24 sacks &divide; 4 sacks per trip =",
                qb3_label: "3. 85 &divide; 5 =",
                qb4_label: "4. 48 &divide; 8 =",
                quiz_button: "Check Answers",
                placeholder_product: "Product",
                placeholder_quotient: "Quotient",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered the basic operations!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score} out of ${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score} out of ${total} (${percentage}%). Read Lessons 1-2 again.`,

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
                meta_text: "Lower Elementary Learning Module Sheet",
                h1_title: "Pagpaparami at Paghahati 1",
                h1_subtitle: "Ang batayang operasyon ng pagpaparami at paghahati ng mga buong bilang.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Maparami ang mga buong bilang na hanggang <b>dalawang tambilang</b>;",
                obj_2: "Hatiin ang mga buong bilang na hanggang <b>dalawang tambilang</b>; at",
                obj_3: "Malutas ang mga simpleng problemang pangmatematika sa pamamagitan ng pagpaparami at paghahati.",

                // Lesson 1 Content (Multiplication)
                aralin1_title: "Aralin 1: Pagpaparami (Multiplication)",
                aralin1_p1: "Ang <b>pagpaparami</b> ay ang pagpapalaki sa isang bilang ng maraming beses. Ito ay isang pinaikling paraan ng paulit-ulit na <b>pagdaragdag</b>.",
                aralin1_h3_1: "Mga Bahagi ng Pagpaparami",
                aralin1_math_1: '<b>6 &times; 3 = 18</b><br><span class="text-base font-normal">(Factor) &times; (Factor) = <b>Product</b></span>',
                aralin1_ul1_1: "Ang <b>simbolo</b> ng pagpaparami ay &times; (binabasa bilang \"times\").",
                aralin1_ul1_2: "Ang <b>Factor</b> ang mga bilang na pinararami.",
                aralin1_ul1_3: "Ang <b>Product</b> ang sagot sa pagpaparami, na laging mas malaki sa alinman sa mga factor (maliban kung ang factor ay 0 o 1).",
                aralin1_ul1_4: "Ang pagbabago sa ayos ng mga factor ay hindi makapagpapabago sa product (e.g., 6 &times; 3 = 18 at 3 &times; 6 = 18).",
                aralin1_h3_2: "Tuntunin sa Pagpaparami",
                aralin1_ul2_1: "Anumang bilang na iparami sa <b>sero (0)</b>, ang katumbas ay <b>0</b>.",
                aralin1_ul2_2: "Anumang bilang na iparami sa <b>isa (1)</b>, ang katumbas ay ang bilang na pinarami pa rin.",
                aralin1_h3_3: "Pagpaparami ng Dalawang Tambilang",
                aralin1_p2: "Ginagamit natin ang <b>pinahabang porma (expanded form)</b> para mas madaling makuha ang product.",
                aralin1_ex1_q: "HALIMBAWA: Kunin ang product ng 27 &times; 3.",
                aralin1_ex1_math: '  27  ->  20 + 7\nx 3   ->    x 3\n-----\t  -----\n\t    21  <span class="text-gray-600 text-base">(3 x 7)</span>\n\t  + 60  <span class="text-gray-600 text-base">(3 x 20)</span>\n\t  -----\n\t   <b>81</b>',
                
                // Lesson 2 Content (Division)
                aralin2_title: "Aralin 2: Paghahati (Division)",
                aralin2_p1: "Ang <b>paghahati</b> ay ang pag-alam kung ilang maliit na bilang ang nakapaloob sa isang malaking bilang. Ito ang kasalungat ng pagpaparami.",
                aralin2_h3_1: "Mga Bahagi ng Paghahati",
                aralin2_math_1: '<b>18 &divide; 2 = 9</b><br><span class="text-base font-normal">(Dividend) &divide; (Divisor) = <b>Quotient</b></span>',
                aralin2_ul1_1: "Ang <b>Dividend</b> ang mas malaking bilang na hinahati.",
                aralin2_ul1_2: "Ang <b>Divisor</b> ang bilang na naghahati sa dividend.",
                aralin2_ul1_3: "Ang <b>Quotient</b> ang sagot sa paghahati, na laging mas maliit kaysa sa dividend.",
                aralin2_ul1_4: "Maaaring gamitin ang &divide;, (long division), o <b>Dividend/Divisor</b> (fraction) bilang simbolo.",
                aralin2_ul1_5: "Maaaring suriin ang sagot sa paghahati sa pamamagitan ng <b>pagpaparami</b>: <b>Quotient &times; Divisor = Dividend</b>.",
                aralin2_h3_2: "Paghahati ng Dalawang Tambilang",
                aralin2_p2: "Ginagamit natin ang <b>long division</b> (mahabang paraan) para sa mas malalaking bilang.",
                aralin2_ex1_q: "HALIMBAWA: Hatiin ang 96 sa 3.",
                aralin2_ex1_math: '   <u> 32</u> <span class="text-gray-600 text-base">(Quotient)</span>\n3 | 96 <span class="text-gray-600 text-base">(Dividend)</span>\n  - 9\n  ---\n    06\n   - 6\n   ---\n     0 <span class="text-gray-600 text-base">(Remainder)</span>\n\nResulta: <b>32</b>',
                aralin2_ex1_check: "Tsek: 32 &times; 3 = 96. Tama.",
                aralin2_h3_3: "Paghahati ng Bilang na may Sero (0)",
                aralin2_p3: "Kung ang dividend at divisor ay nagtatapos sa sero, maaari mong tanggalin muna ang sero at hatiin ang natitirang tambilang.",
                aralin2_math_2: '<b>60 &divide; 20 = 3</b><br><span class="text-base font-normal">(Ito ay tulad ng: 6 &divide; 2 = 3)</span>',
                aralin2_p4: "Kung ang dividend lamang ang may sero, hatiin muna ang tambilang, at idagdag ang sero sa quotient.",
                aralin2_math_3: '<b>60 &divide; 2 = 30</b><br><span class="text-base font-normal">(Ito ay tulad ng: 6 &divide; 2 = 3, at idagdag ang 0: 30)</span>',
                
                // Quiz Labels
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Subukan ang iyong kaalaman sa Pagpaparami at Paghahati.",
                quiz_section_a: "A. Pagpaparami (Ibigay ang Product)",
                qa1_label: "1. 23 pakete &times; P4 bawat pakete = P",
                qa2_label: "2. 13 paso &times; 7 bulaklak bawat paso =",
                qa3_label: "3. 17 piraso &times; 4 na pakete =",
                qa4_label: "4. 29 &times; 3 =",
                quiz_section_b: "B. Paghahati (Ibigay ang Quotient)",
                qb1_label: "1. 78 &divide; 3 =",
                qb2_label: "2. 24 sacks &divide; 4 sacks per trip =",
                qb3_label: "3. 85 &divide; 5 =",
                qb4_label: "4. 48 &divide; 8 =",
                quiz_button: "Tingnan ang Sagot",
                placeholder_product: "Product",
                placeholder_quotient: "Quotient",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang batayang operasyon!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score} out of ${total} (${percentage}%). Balikan lang ang mga aralin para sa mga mali mong sagot.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score} out of ${total} (${percentage}%). Basahin ulit ang Aralin 1-2.`,
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
            // Only allow numbers and decimal point, clean up spaces/commas
            return value.trim().replace(/[^0-9.]/g, ''); 
        }

        function checkNumberAnswer(id, expected) {
            const input = document.getElementById(id);
            // Clean the input, then remove any leading P or peso symbols (for question 1)
            const rawValue = standardizeNumberInput(input.value.replace(/p\s?|peso/gi, ''));
            const expectedStr = String(expected).trim();
            
            let isCorrect = false;

            // Check if the input value matches the expected value exactly
            if (rawValue === expectedStr) {
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
            const totalQuestions = 8; 
            const resultsDiv = document.getElementById('results');

            // Define correct answers
            const answers = {
                qa1: 92,   // 23 * 4 = 92
                qa2: 91,   // 13 * 7 = 91
                qa3: 68,   // 17 * 4 = 68
                qa4: 87,   // 29 * 3 = 87
                qb1: 26,   // 78 / 3 = 26
                qb2: 6,    // 24 / 4 = 6
                qb3: 17,   // 85 / 5 = 17
                qb4: 6,    // 48 / 8 = 6
            };
            
            if (!isLanguageToggle) {
                // Run checks only on button click, not language toggle
                correctCount += checkNumberAnswer('qa1', answers.qa1); 
                correctCount += checkNumberAnswer('qa2', answers.qa2);
                correctCount += checkNumberAnswer('qa3', answers.qa3);
                correctCount += checkNumberAnswer('qa4', answers.qa4);
                correctCount += checkNumberAnswer('qb1', answers.qb1); 
                correctCount += checkNumberAnswer('qb2', answers.qb2);
                correctCount += checkNumberAnswer('qb3', answers.qb3); 
                correctCount += checkNumberAnswer('qb4', answers.qb4);
                
                // Store the current score to maintain state across language toggles
                resultsDiv.setAttribute('data-current-score', correctCount);
            } else {
                 // If it's a language toggle, retrieve the score
                 correctCount = parseInt(resultsDiv.getAttribute('data-current-score')) || 0;
            }


            // Display results
            const percentage = ((correctCount / totalQuestions) * 100).toFixed(0);
            const overallScore = `${correctCount}/${totalQuestions}`;
            let message = '';
            
            // Determine the message based on current language
            const resultMessage = translations[currentLang];

            // Reset background for results box
            resultsDiv.classList.remove('bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800', 'bg-red-100', 'text-red-800', 'bg-green-600', 'text-white');

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
        
        document.getElementById('math-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); // Run scoring logic
        });
    </script>
</body>
</html>
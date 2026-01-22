<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Learning About Fractions</title>
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
        /* Style for selected correct/incorrect radio buttons (copied from Paglutas ng Suliranin) */
        .selected-correct {
            background-color: #a7f3d0 !important;
            border-color: #059669 !important;
            box-shadow: 0 0 0 3px #d1fae5;
        }
        .selected-incorrect {
            background-color: #fecaca !important;
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px #fee2e2;
        }
        
        /* Specific header size adjustment (Paraan 1 and 2 in Aralin 2) */
        .content-box h4 {
            font-size: 1.25rem; /* 20px */
            font-weight: 600;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #1f2937;
        }
        
        /* NEW: Class for math display in lessons (similar to formula but inline) */
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
        
        /* Table styles (ensuring 20px font) - Copied from previous fraction module */
        .module-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
            font-size: 1.25rem; /* 20px */
            border: 2px solid #1f2937; 
        }
        .module-table th, .module-table td {
            border: 1px solid #1f2937; 
            padding: 0.75rem 0.5rem;
            text-align: center;
        }
        .module-table th {
            background-color: #10b981; 
            color: #ffffff; 
            font-weight: 600;
        }
        .module-table td {
            background-color: #ecfdf5; 
            color: #1f2937; 
        }
        
        /* Custom CSS to make the entire NAV sticky */
        #outline-nav .sticky-container {
            position: sticky;
            top: 1rem; /* Adjust this value as needed, 1rem (16px) is usually good */
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Introduction to Fractions and Simplification</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Comparing Fractions</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Different Types of Fractions</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Learning About Fractions</h1>
                    <p class="mt-4 text-gray-600 italic" data-i18n="h1_subtitle">Operations involving fractions are beneficial in daily life.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Explain what a <b>fraction</b> is;</li>
                        <li data-i18n="obj_2"><b>Simplify</b> fractions (lowest term);</li>
                        <li data-i18n="obj_3"><b>Compare</b> and order fractions by size; and</li>
                        <li data-i18n="obj_4">Recognize different types of fractions (Proper, Improper, Mixed Number).</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Pagkilala sa mga Praksiyon (Based on PDF Page 5-20) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Introduction to Fractions and Simplification</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1"><b>Fractions</b> are used to show <b>parts of a whole</b>. When dividing an object into equal parts, each part is a fraction. </p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Parts of a Fraction</h3>
                            <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                                <p class="text-center text-3xl font-mono mb-2">
                                    <br>
                                    <span class="text-gray-800">3</span> <span class="text-xl" data-i18n="aralin1_num">&leftarrow; <b>Numerator</b> (How many parts are taken/chosen)</span>
                                </p>
                                <p class="text-center text-3xl font-mono">
                                    <span class="text-gray-800">4</span> <span class="text-xl" data-i18n="aralin1_den">&leftarrow; <b>Denominator</b> (Total number of equal parts)</span>
                                </p>
                            </div>
                            
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Simplification (Reducing Fractions)</h3>
                            <p data-i18n="aralin1_p2">Simplifying a fraction means finding an <b>equivalent fraction</b> with the smallest numerator and denominator. This is called the <b>lowest term</b>.</p>
                            
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin1_ol1">Find the whole number (factor) that can divide both the <b>numerator and denominator evenly</b>.</li>
                                <li data-i18n="aralin1_ol2">Divide both the numerator and denominator by that factor.</li>
                                <li data-i18n="aralin1_ol3">Repeat until there are no common factors other than 1.</li>
                            </ol>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_q">EXAMPLE: Reduce 12/16 to its lowest term.</p>
                                <p class="math-display">
                                    12/16 / 4/4 = <b>3/4</b>
                                </p>
                                <p class="mt-2" data-i18n="aralin1_ex1_p">The lowest term is 3/4 because there is no common factor other than 1 that can divide 3 and 4.</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Paghahambing ng mga Praksiyon (Based on PDF Page 21-33) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Comparing Fractions</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">1. Like Fractions</h3>
                            <p data-i18n="aralin2_p1_1">These are fractions that have the <b>same denominator</b> (e.g., 2/8, 5/8, 7/8).</p>
                            <p class="p-2 bg-green-50 border-l-4 border-green-400" data-i18n="aralin2_p1_2">If the <b>numerator</b> is larger, the value of the fraction is larger. Example: 7/8 is greater than 2/8.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">2. Unlike Fractions</h3>
                            <p data-i18n="aralin2_p2_1">These are fractions that have <b>different denominators</b> (e.g., 1/2, 4/5, 1/4). To compare them, they need to be converted to the <b>Least Common Denominator (LCD)</b> or converted to <b>Decimals</b>.</p>
                            
                            <!-- UPDATED FONT SIZE TO 20PX -->
                            <h4 class="font-semibold mt-4 text-gray-700" data-i18n="aralin2_h4_1">Method 1: Using LCD</h4>
                            <p data-i18n="aralin2_p2_2">Find the smallest number that all denominators can divide evenly. Use this as the new denominator, and create equivalent fractions.</p>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_q">EXAMPLE: Compare 1/2, 4/5, and 1/4.</p>
                                <p class="math-display">
                                    1/2 = 10/20<br>
                                    4/5 = 16/20<br>
                                    1/4 = 5/20
                                </p>
                                <p class="mt-2" data-i18n="aralin2_ex2_p">4/5 (16/20) is the largest, and 1/4 (5/20) is the smallest.</p>
                            </div>
                            
                            <!-- UPDATED FONT SIZE TO 20PX -->
                            <h4 class="font-semibold mt-4 text-gray-700" data-i18n="aralin2_h4_2">Method 2: Using Decimals</h4>
                            <p data-i18n="aralin2_p2_3">Divide the <b>numerator</b> by the <b>denominator</b> of each fraction.</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex3_q">EXAMPLE: Compare 2/3, 3/5, and 5/6.</p>
                                <ul class="list-disc list-inside ml-4">
                                    <li data-i18n="aralin2_ex3_l1">2/3 = 2 / 3 &asymp; <b>0.67</b></li>
                                    <li data-i18n="aralin2_ex3_l2">3/5 = 3 / 5 = <b>0.60</b></li>
                                    <li data-i18n="aralin2_ex3_l3">5/6 = 5 / 6 &asymp; <b>0.83</b></li>
                                </ul>
                                <p class="mt-2" data-i18n="aralin2_ex3_p">0.83 (5/6) is the largest. 0.60 (3/5) is the smallest.</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 3: Tamang Fraction, Hindi Tamang Fraction, at Pinaghalong Bilang (Based on PDF Page 34-44) -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Different Types of Fractions</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">1. Proper Fraction</h3>
                            <p data-i18n="aralin3_p3_1">The <b>numerator</b> is <b>smaller</b> than the <b>denominator</b>. Represents a part that is less than a whole. (Example: 1/2, 3/4, 5/6).</p>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">2. Improper Fraction</h3>
                            <p data-i18n="aralin3_p3_2">The <b>numerator</b> is <b>larger</b> or <b>equal</b> to the <b>denominator</b>. The value is one whole or more. (Example: 7/5, 13/8, 4/4).</p>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_3">3. Mixed Number</h3>
                            <p data-i18n="aralin3_p3_3">Consists of a <b>whole number</b> and a <b>proper fraction</b>. Used for measuring more than one whole. (Example: 1 1/2 kilograms, 5 3/4 meters, 4 7/9). </p>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_4">Fraction Conversion</h3>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex4_q">A. Mixed Number → Improper Fraction (Example: 4 2/3)</p>
                                <ol class="list-decimal list-inside ml-4">
                                    <li data-i18n="aralin3_ex4_l1">Multiply the <b>whole number</b> (4) by the <b>denominator</b> (3): 4 x 3 = 12.</li>
                                    <li data-i18n="aralin3_ex4_l2">Add the result (12) to the <b>numerator</b> (2): 12 + 2 = 14.</li>
                                    <li data-i18n="aralin3_ex4_l3">Keep the original <b>denominator</b> (3). Answer: <b>14/3</b>.</li>
                                </ol>
                            </div>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex5_q">B. Improper Fraction → Mixed Number (Example: 9/4)</p>
                                <ol class="list-decimal list-inside ml-4">
                                    <li data-i18n="aralin3_ex5_l1">Divide the <b>numerator</b> (9) by the <b>denominator</b> (4): 9 / 4 = 2 with a remainder of 1.</li>
                                    <li data-i18n="aralin3_ex5_l2">The <b>quotient</b> (2) becomes the <b>whole number</b>.</li>
                                    <li data-i18n="aralin3_ex5_l3">The <b>remainder</b> (1) becomes the <b>numerator</b>.</li>
                                    <li data-i18n="aralin3_ex5_l4">The <b>divisor</b> (4) remains the <b>denominator</b>. Answer: <b>2 1/4</b>.</li>
                                </ol>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Based on PDF exercises from pages 18, 42, 46) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Test your knowledge of recognizing, converting, and comparing fractions. (Format: <b>n/d</b> for fraction, <b>w n/d</b> for mixed number).</p>

                    <form id="fraction-recognition-quiz-form" class="space-y-6">
                        
                        <!-- Pagsasanay A: Simplification & Identification (Aralin 1 & 3) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Simplification and Reduction (Provide the Lowest Term)</p>
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                                <div class="flex flex-col space-y-2"><label for="qa1" class="font-medium" data-i18n="qa1_label">1. Simplest form of 24/36:</label><input type="text" id="qa1" class="quiz-input w-full sm:w-48" placeholder="n/d"></div>
                                <div class="flex flex-col space-y-2"><label for="qa2" class="font-medium" data-i18n="qa2_label">2. Simplest form of 15/21:</label><input type="text" id="qa2" class="quiz-input w-full sm:w-48" placeholder="n/d"></div>
                            </div>
                        </div>

                        <!-- Pagsasanay B: Conversion (Aralin 3) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Conversion (Type Change)</p>
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                                <div class="flex flex-col space-y-2"><label for="qb1" class="font-medium" data-i18n="qb1_label">1. Improper Fraction of 6 1/2:</label><input type="text" id="qb1" class="quiz-input w-full sm:w-48" placeholder="n/d"></div>
                                <div class="flex flex-col space-y-2"><label for="qb2" class="font-medium" data-i18n="qb2_label">2. Mixed Number of 43/9:</label><input type="text" id="qb2" class="quiz-input w-full sm:w-48" placeholder="w n/d"></div>
                            </div>
                        </div>
                        
                        <!-- Pagsasanay C: Comparison (Aralin 2) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_c">C. Comparison (Provide the Largest Fraction)</p>
                            <div class="flex flex-col space-y-2">
                                <label for="qc1" class="font-medium" data-i18n="qc1_label">1. Which is largest: 3/4, 5/6, or 2/3?</label>
                                <input type="text" id="qc1" class="quiz-input w-full sm:w-48" placeholder="n/d">
                            </div>
                            <div class="flex flex-col space-y-2">
                                <label for="qc2" class="font-medium" data-i18n="qc2_label">2. Who gave the largest amount: Lito (11/50), Rolly (9/25), Max (3/20), or Dong (27/100)?</label>
                                <input type="text" id="qc2" class="quiz-input w-full sm:w-48" placeholder="Answer (n/d or Name)">
                            </div>
                        </div>

                        <!-- UPDATED: Button width and text -->
                        <button type="submit" class="w-[70%] mx-auto block accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
                            Check Answers
                        </button>
                    </form>

                    <div id="results" class="mt-6 p-4 rounded-xl bg-green-100 text-green-800 font-semibold hidden">
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
                outline_aralin1: "Lesson 1: Introduction to Fractions and Simplification",
                outline_aralin2: "Lesson 2: Comparing Fractions",
                outline_aralin3: "Lesson 3: Different Types of Fractions",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Learning About Fractions", // UPDATED
                h1_subtitle: "Operations involving fractions are beneficial in daily life.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Explain what a <b>fraction</b> is;",
                obj_2: "<b>Simplify</b> fractions (lowest term);",
                obj_3: "<b>Compare</b> and order fractions by size; and",
                obj_4: "Recognize different types of fractions (Proper, Improper, Mixed Number).",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Introduction to Fractions and Simplification",
                aralin1_p1: "<b>Fractions</b> are used to show <b>parts of a whole</b>. When dividing an object into equal parts, each part is a fraction.",
                aralin1_h3_1: "Parts of a Fraction",
                aralin1_num: "&leftarrow; <b>Numerator</b> (How many parts are taken/chosen)",
                aralin1_den: "&leftarrow; <b>Denominator</b> (Total number of equal parts)",
                aralin1_h3_2: "Simplification (Reducing Fractions)",
                aralin1_p2: "Simplifying a fraction means finding an <b>equivalent fraction</b> with the smallest numerator and denominator. This is called the <b>lowest term</b>.",
                aralin1_ol1: "Find the whole number (factor) that can divide both the <b>numerator and denominator evenly</b>.",
                aralin1_ol2: "Divide both the numerator and denominator by that factor.",
                aralin1_ol3: "Repeat until there are no common factors other than 1.",
                aralin1_ex1_q: "EXAMPLE: Reduce 12/16 to its lowest term.",
                aralin1_ex1_p: "The lowest term is 3/4 because there is no common factor other than 1 that can divide 3 and 4.",
                
                // Lesson 2 Content
                aralin2_title: "Lesson 2: Comparing Fractions",
                aralin2_h3_1: "1. Like Fractions",
                aralin2_p1_1: "These are fractions that have the <b>same denominator</b> (e.g., 2/8, 5/8, 7/8).",
                aralin2_p1_2: "If the <b>numerator</b> is larger, the value of the fraction is larger. Example: 7/8 is greater than 2/8.",
                aralin2_h3_2: "2. Unlike Fractions",
                aralin2_p2_1: "These are fractions that have <b>different denominators</b> (e.g., 1/2, 4/5, 1/4). To compare them, they need to be converted to the <b>Least Common Denominator (LCD)</b> or converted to <b>Decimals</b>.",
                aralin2_h4_1: "Method 1: Using LCD",
                aralin2_p2_2: "Find the smallest number that all denominators can divide evenly. Use this as the new denominator, and create equivalent fractions.",
                aralin2_ex2_q: "EXAMPLE: Compare 1/2, 4/5, and 1/4.",
                aralin2_ex2_p: "4/5 (16/20) is the largest, and 1/4 (5/20) is the smallest.",
                aralin2_h4_2: "Method 2: Using Decimals",
                aralin2_p2_3: "Divide the <b>numerator</b> by the <b>denominator</b> of each fraction.",
                aralin2_ex3_q: "EXAMPLE: Compare 2/3, 3/5, and 5/6.",
                aralin2_ex3_l1: "2/3 = 2 / 3 &asymp; <b>0.67</b>",
                aralin2_ex3_l2: "3/5 = 3 / 5 = <b>0.60</b>",
                aralin2_ex3_l3: "5/6 = 5 / 6 &asymp; <b>0.83</b>",
                aralin2_ex3_p: "0.83 (5/6) is the largest. 0.60 (3/5) is the smallest.",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Different Types of Fractions",
                aralin3_h3_1: "1. Proper Fraction",
                aralin3_p3_1: "The <b>numerator</b> is <b>smaller</b> than the <b>denominator</b>. Represents a part that is less than a whole. (Example: 1/2, 3/4, 5/6).",
                aralin3_h3_2: "2. Improper Fraction",
                aralin3_p3_2: "The <b>numerator</b> is <b>larger</b> or <b>equal</b> to the <b>denominator</b>. The value is one whole or more. (Example: 7/5, 13/8, 4/4).",
                aralin3_h3_3: "3. Mixed Number",
                aralin3_p3_3: "Consists of a <b>whole number</b> and a <b>proper fraction</b>. Used for measuring more than one whole. (Example: 1 1/2 kilograms, 5 3/4 meters, 4 7/9). ",
                aralin3_h3_4: "Fraction Conversion",
                aralin3_ex4_q: "A. Mixed Number → Improper Fraction (Example: 4 2/3)",
                aralin3_ex4_l1: "Multiply the <b>whole number</b> (4) by the <b>denominator</b> (3): 4 x 3 = 12.",
                aralin3_ex4_l2: "Add the result (12) to the <b>numerator</b> (2): 12 + 2 = 14.",
                aralin3_ex4_l3: "Keep the original <b>denominator</b> (3). Answer: <b>14/3</b>.",
                aralin3_ex5_q: "B. Improper Fraction → Mixed Number (Example: 9/4)",
                aralin3_ex5_l1: "Divide the <b>numerator</b> (9) by the <b>denominator</b> (4): 9 / 4 = 2 with a remainder of 1.",
                aralin3_ex5_l2: "The <b>quotient</b> (2) becomes the <b>whole number</b>.",
                aralin3_ex5_l3: "The <b>remainder</b> (1) becomes the <b>numerator</b>.",
                aralin3_ex5_l4: "The <b>divisor</b> (4) remains the <b>denominator</b>. Answer: <b>2 1/4</b>.",
                
                // Quiz Labels
                quiz_title: "Practice",
                quiz_subtitle: "Test your knowledge of recognizing, converting, and comparing fractions. (Format: <b>n/d</b> for fraction, <b>w n/d</b> for mixed number).",
                quiz_section_a: "A. Simplification and Reduction (Provide the Lowest Term)",
                qa1_label: "1. Simplest form of 24/36:",
                qa2_label: "2. Simplest form of 15/21:",
                quiz_section_b: "B. Conversion (Type Change)",
                qb1_label: "1. Improper Fraction of 6 1/2:",
                qb2_label: "2. Mixed Number of 43/9:",
                quiz_section_c: "C. Comparison (Provide the Largest Fraction)",
                qc1_label: "1. Which is largest: 3/4, 5/6, or 2/3?",
                qc2_label: "2. Who gave the largest amount: Lito (11/50), Rolly (9/25), Max (3/20), or Dong (27/100)?",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered fractions!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score} out of ${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score} out of ${total} (${percentage}%). Read Lessons 1-3 again.`,

            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pagkilala sa mga Praksiyon at Simplifikasyon",
                outline_aralin2: "Aralin 2: Paghahambing ng mga Praksiyon",
                outline_aralin3: "Aralin 3: Iba't Ibang Uri ng Praksiyon",
                outline_quiz: "Pagsasanay",
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Pagkilala sa mga Praksiyon", // Tagalog remains the same
                h1_subtitle: "Ang mga operasyong kinasasangkutan ng mga praksiyon ay pakikinabangan sa pang-araw-araw na buhay.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",

                // Objectives
                obj_1: "Maipaliwanag kung ano ang <b>praksiyon</b>;",
                obj_2: "Gawing payak o <b>simple</b> ang mga praksiyon (lowest term);",
                obj_3: "<b>Paghambingin</b> at maiayos ang mga praksiyon ayon sa sukat; at",
                obj_4: "Makilala ang iba't ibang uri ng praksiyon (Proper, Improper, Mixed Number).",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Pagkilala sa mga Praksiyon at Simplifikasyon",
                aralin1_p1: "Ang mga <b>praksiyon</b> ay ginagamit upang maipakita ang mga <b>bahagi ng isang buo</b>. Sa paghati ng isang bagay sa pantay na bahagi, ang bawat bahagi ay isang praksiyon.",
                aralin1_h3_1: "Mga Bahagi ng Praksiyon",
                aralin1_num: "&leftarrow; <b>Numerator</b> (Ilang bahagi ang kinuha/pinili)",
                aralin1_den: "&leftarrow; <b>Denominator</b> (Kabuuang bilang ng pantay na bahagi)",
                aralin1_h3_2: "Simplifikasyon (Pagpapaliit ng Praksiyon)",
                aralin1_p2: "Ang paggawa ng simple sa praksiyon ay nangangahulugang paghahanap ng <b>katumbas na praksiyon</b> na may pinakamaliit na numerator at denominator. Ito ay tinatawag na <b>pinakamababang termino</b>.",
                aralin1_ol1: "Alamin kung anong buong bilang (factor) ang maaaring maghati nang pantay sa <b>parehong numerator at denominator</b>.",
                aralin1_ol2: "Hatiin ang parehong numerator at denominator sa factor na iyon.",
                aralin1_ol3: "Ulitin hanggang wala nang ibang factor maliban sa 1.",
                aralin1_ex1_q: "HALIMBAWA: Paliitin ang 12/16 sa pinakamababang termino.",
                aralin1_ex1_p: "Ang pinakamababang termino ay 3/4 dahil wala nang ibang bilang maliban sa 1 ang makakahati sa 3 at 4.",
                
                // Lesson 2 Content
                aralin2_title: "Aralin 2: Paghahambing ng mga Praksiyon",
                aralin2_h3_1: "1. Magkatulad (Like) na Praksiyon",
                aralin2_p1_1: "Ito ang mga praksiyon na may <b>magkakatulad na denominator</b> (hal. 2/8, 5/8, 7/8).",
                aralin2_p1_2: "Kung mas malaki ang <b>numerator</b>, mas malaki ang halaga ng praksiyon. Halimbawa: 7/8 ay mas malaki sa 2/8.",
                aralin2_h3_2: "2. Di-Magkatulad (Unlike) na Praksiyon",
                aralin2_p2_1: "Ito ang mga praksiyon na may <b>magkakaibang denominator</b> (hal. 1/2, 4/5, 1/4). Upang maihambing, kailangan silang baguhin sa <b>Least Common Denominator (LCD)</b> o gawing <b>Desimal</b>.",
                aralin2_h4_1: "Paraan 1: Gamit ang LCD",
                aralin2_p2_2: "Hanapin ang pinakamaliit na bilang na mahahati nang pantay sa lahat ng denominator. Gamitin ito bilang bagong denominator, at gumawa ng katumbas na praksiyon.",
                aralin2_ex2_q: "HALIMBAWA: Paghambingin ang 1/2, 4/5, at 1/4.",
                aralin2_ex2_p: "Ang 4/5 (16/20) ang pinakamalaki, at ang 1/4 (5/20) ang pinakamaliit.",
                aralin2_h4_2: "Paraan 2: Gamit ang Desimal",
                aralin2_p2_3: "Hatiin ang <b>numerator</b> sa <b>denominator</b> ng bawat praksiyon.",
                aralin2_ex3_q: "HALIMBAWA: Paghambingin ang 2/3, 3/5, at 5/6.",
                aralin2_ex3_l1: "2/3 = 2 / 3 &asymp; <b>0.67</b>",
                aralin2_ex3_l2: "3/5 = 3 / 5 = <b>0.60</b>",
                aralin2_ex3_l3: "5/6 = 5 / 6 &asymp; <b>0.83</b>",
                aralin2_ex3_p: "Ang 0.83 (5/6) ang pinakamalaki. Ang 0.60 (3/5) ang pinakamaliit.",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Iba't Ibang Uri ng Praksiyon",
                aralin3_h3_1: "1. Tamang Praksiyon (Proper Fraction)",
                aralin3_p3_1: "Ang <b>numerator</b> ay <b>mas maliit</b> kaysa sa <b>denominator</b>. Kumakatawan sa bahagi na mas maliit kaysa isang buo. (Halimbawa: 1/2, 3/4, 5/6).",
                aralin3_h3_2: "2. Hindi Tamang Praksiyon (Improper Fraction)",
                aralin3_p3_2: "Ang <b>numerator</b> ay <b>mas malaki</b> o <b>katumbas</b> ng <b>denominator</b>. Ang halaga ay isang buo o higit pa. (Halimbawa: 7/5, 13/8, 4/4).",
                aralin3_h3_3: "3. Pinaghalong Bilang (Mixed Number)",
                aralin3_p3_3: "Binubuo ng isang <b>buong bilang</b> at isang <b>tamang praksiyon</b>. Ginagamit sa pagsukat ng higit sa isang buo. (Halimbawa: 1 1/2 kilo, 5 3/4 metro, 4 7/9). ",
                aralin3_h3_4: "Pagbabago ng Praksiyon",
                aralin3_ex4_q: "A. Mixed Number → Improper Fraction (Halimbawa: 4 2/3)",
                aralin3_ex4_l1: "Paramihin ang <b>buong bilang</b> (4) sa <b>denominator</b> (3): 4 x 3 = 12.",
                aralin3_ex4_l2: "Idagdag ang sagot (12) sa <b>numerator</b> (2): 12 + 2 = 14.",
                aralin3_ex4_l3: "Panatilihin ang orihinal na <b>denominator</b> (3). Sagot: <b>14/3</b>.",
                aralin3_ex5_q: "B. Improper Fraction → Mixed Number (Halimbawa: 9/4)",
                aralin3_ex5_l1: "Hatiin ang <b>numerator</b> (9) sa <b>denominator</b> (4): 9 / 4 = 2 with a remainder na 1.",
                aralin3_ex5_l2: "Ang <b>quotient</b> (2) ay magiging <b>buong bilang</b>.",
                aralin3_ex5_l3: "Ang <b>remainder</b> (1) ay magiging <b>numerator</b>.",
                aralin3_ex5_l4: "Ang <b>divisor</b> (4) ay mananatiling <b>denominator</b>. Sagot: <b>2 1/4</b>.",
                
                // Quiz Labels
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Subukan ang iyong kaalaman sa pagkilala, pagbabago, at paghahambing ng mga praksiyon. (Format: <b>n/d</b> para sa fraction, <b>w n/d</b> para sa mixed number).",
                quiz_section_a: "A. Simplifikasyon at Pagbabago (Ibigay ang Pinakamababang Termino)",
                qa1_label: "1. Simplest form ng 24/36:",
                qa2_label: "2. Simplest form ng 15/21:",
                quiz_section_b: "B. Pagbabago ng Uri (Conversion)",
                qb1_label: "1. Improper Fraction ng 6 1/2:",
                qb2_label: "2. Mixed Number ng 43/9:",
                quiz_section_c: "C. Paghahambing (Ibigay ang Pinakamalaking Praksiyon)",
                qc1_label: "1. Alin ang pinakamalaki: 3/4, 5/6, o 2/3?",
                qc2_label: "2. Sino ang nagbigay ng pinakamalaking halaga: Lito (11/50), Rolly (9/25), Max (3/20), o Dong (27/100)?",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang praksiyon!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score} out of ${total} (${percentage}%). Balikan lang ang mga aralin para sa mga mali mong sagot.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score} out of ${total} (${percentage}%). Basahin ulit ang Aralin 1-3.`,
            }
        };

        let currentLang = 'en'; // DEFAULT LANGUAGE IS ENGLISH, as requested

        /**
         * Updates the text content of all elements with a data-i18n attribute.
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
                    // Use innerHTML for text that contains span classes for bolding/styling
                    element.innerHTML = langData[key];
                }
            });
            
            // 2. Update language code on HTML tag
            document.documentElement.lang = lang;

            // 3. Update the static current language label
            currentLangLabel.textContent = lang === 'tl' ? 'Wika: Tagalog' : 'Language: English';

            // 4. Update toggle button text: shows the language it will switch TO
            const oppositeLang = lang === 'tl' ? 'en' : 'tl';
            const toggleKey = `toggle_text_${oppositeLang}`; 
            
            if (translations[oppositeLang] && translations[oppositeLang][toggleKey]) {
                toggleButton.querySelector('span').textContent = translations[oppositeLang][toggleKey];
            } else {
                 // Fallback
                 toggleButton.querySelector('span').textContent = lang === 'tl' ? 'Switch to: English' : 'Switch to: Tagalog';
            }
            
            // 5. Update placeholder text for inputs
            const placeholderText = lang === 'tl' ? 'Sagot (n/d or Pangalan)' : 'Answer (n/d or Name)';
            document.querySelectorAll('.quiz-input[placeholder]').forEach(input => {
                 // Only QC2 uses the name/fraction placeholder
                 if (input.id === 'qc2') {
                    input.placeholder = placeholderText;
                 } else if (input.id === 'qa1' || input.id === 'qa2' || input.id === 'qc1' || input.id === 'qb1') {
                     input.placeholder = 'n/d'; // Simplification/Improper format
                 } else if (input.id === 'qb2') {
                     input.placeholder = 'w n/d'; // Mixed format
                 }
            });
            
            // 6. Re-run quiz result update if visible to update the message language
            const resultsDiv = document.getElementById('results');
            if (!resultsDiv.classList.contains('hidden')) {
                // If results are visible, run submitQuiz(true) to update the score message
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
            // Initial state check for open details
            const arrow = detail.querySelector('svg');
            if (arrow && detail.open) {
                 arrow.classList.add('rotate-180');
            }
            
            detail.addEventListener('toggle', () => {
                const arrow = detail.querySelector('svg');
                if (arrow) {
                    // Check if the detail tag is present before manipulating
                    const isDetailOpen = detail.open;

                    if (isDetailOpen) {
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
             // Initialize default language (English) on load
             updateLanguage('en');
             highlightOutlineLink();
        });
        // --- END SCROLL TRACKING LOGIC ---

        // Helper function for finding Greatest Common Divisor
        function gcd(a, b) {
            return b === 0 ? a : gcd(b, a % b);
        }

        // Helper function to simplify a fraction string (e.g., '14/2' -> '7/1')
        function simplifyFraction(fractionString) {
            const parts = fractionString.split('/');
            if (parts.length !== 2) return fractionString;
            let num = parseInt(parts[0]);
            let den = parseInt(parts[1]);
            
            if (den === 0 || isNaN(num) || isNaN(den)) return fractionString;

            const common = gcd(Math.abs(num), Math.abs(den));
            return `${num / common}/${den / common}`;
        }
        
        // Utility function for fraction comparison and parsing
        function normalizeFractionInput(input) {
            const value = input.trim().replace(/\s/g, '').toLowerCase(); 
            
            // 1. Check for 'w n/d' format (mixed number)
            // Matches: 4 2/3 -> 42/3 or 42/3
            // Regex to find w(optional space)n/d
            const mixedMatch = value.match(/^(\d+)(?:\s*)(\d+)\/(\d+)$/i);
            
            if (mixedMatch) {
                const whole = parseInt(mixedMatch[1]);
                const num = parseInt(mixedMatch[2]); // Corrected index from 3 to 2 for numerator
                const den = parseInt(mixedMatch[3]); // Corrected index from 4 to 3 for denominator

                if (den === 0 || isNaN(whole) || isNaN(num) || isNaN(den)) return value;
                // Convert to improper fraction for comparison
                return `${whole * den + num}/${den}`;
            }

            // 2. Check for improper/proper fraction format (n/d)
             if (value.includes('/')) {
                const parts = value.split('/');
                if (parts.length === 2) {
                    const num = parseInt(parts[0]);
                    const den = parseInt(parts[1]);
                    if (den === 0 || isNaN(num) || isNaN(den)) return value;
                    return `${num}/${den}`;
                }
            }
            
            // 3. Assume it might be a name (for QC2)
            return value;
        }

        /**
         * Checks the answer for a quiz input field, specifically handling fraction, mixed, or name formats.
         * @param {string} id - The ID of the input field.
         * @param {string} expectedImproper - The expected answer in simplest improper fraction form (e.g., '2/3', '13/2').
         * @param {string} expectedMixed - The expected answer in mixed number format (e.g., '4 7/9'). Null if not applicable.
         * @param {boolean} isNameAnswer - True if the answer can be a name (like 'rolly') or a fraction.
         * @returns {number} 1 if correct, 0 if incorrect or empty.
         */
        function checkFractionAnswer(id, expectedImproper, expectedMixed = null, isNameAnswer = false) {
            const input = document.getElementById(id);
            const rawValue = input.value.trim().toLowerCase();
            let isCorrect = false;

            // Reset styles
            input.classList.remove('correct-answer', 'incorrect-answer');
            
            if (rawValue.length === 0) return 0;

            // Normalize input if it's a fraction or mixed number
            let normalizedValue = isNameAnswer ? rawValue : normalizeFractionInput(rawValue);
            
            // Expected results should also be simplified for robust comparison (except names)
            const simplifiedExpected = simplifyFraction(expectedImproper);

            // --- Primary Checks ---

            if (isNameAnswer) {
                // Check C2: Accept name ('rolly') or simplified fraction ('9/25')
                 if (rawValue === 'rolly' || rawValue === '9/25' || simplifyFraction(normalizedValue) === simplifiedExpected) {
                     isCorrect = true;
                 }
            } else if (expectedMixed && normalizedValue.includes('/')) {
                // Check B2 (Mixed Number) - check if input (normalized to improper fraction) matches the expected improper fraction (13/2)
                if (simplifyFraction(normalizedValue) === simplifiedExpected) {
                     isCorrect = true;
                }
            } else if (normalizedValue.includes('/')) {
                 // Check A1, A2, C1, B1 (Simplification/Improper Fraction) - check if the simplified input matches the simplified expected
                 if (simplifyFraction(normalizedValue) === simplifiedExpected) {
                     isCorrect = true;
                 }
            } 
            // Note: We don't check for whole numbers or other formats here as the input type is strictly controlled by the instructions.
            

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
            
            if (!isLanguageToggle) {
                // --- Check Answers ---
                // A1: 24/36 -> 2/3
                correctCount += checkFractionAnswer('qa1', '2/3');
                
                // A2: 15/21 -> 5/7
                correctCount += checkFractionAnswer('qa2', '5/7');
                
                // B1: 6 1/2 -> 13/2 (Improper)
                correctCount += checkFractionAnswer('qb1', '13/2');
                
                // B2: 43/9 -> 4 7/9 (Mixed Number)
                correctCount += checkFractionAnswer('qb2', '43/9', '4 7/9');

                // C1: 3/4 (0.75), 5/6 (0.833), 2/3 (0.667). Largest is 5/6.
                correctCount += checkFractionAnswer('qc1', '5/6');
                
                // C2: Lito (11/50), Rolly (9/25), Max (3/20), Dong (27/100). Largest is Rolly (or 9/25).
                correctCount += checkFractionAnswer('qc2', '9/25', null, true); // isNameAnswer = true
                
                // Store the current score to maintain state across language toggles
                resultsDiv.setAttribute('data-current-score', correctCount);
            } else {
                 // If it's a language toggle, retrieve the score
                 correctCount = parseInt(resultsDiv.getAttribute('data-current-score')) || 0;
            }


            // Display results
            const overallScore = `${correctCount}/${totalQuestions}`;
            const totalPossible = totalQuestions;
            const percentage = ((correctCount / totalQuestions) * 100).toFixed(0);
            let message = '';
            
            // Determine the message based on current language
            const resultMessage = translations[currentLang];

            // Reset background classes
            resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800');


            if (correctCount === totalQuestions) {
                message = resultMessage.quiz_result_excellent(correctCount, totalPossible, percentage);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalQuestions * 0.7) {
                message = resultMessage.quiz_result_good(correctCount, totalPossible, percentage);
                resultsDiv.classList.add('bg-green-100', 'text-green-800');
            } else {
                message = resultMessage.quiz_result_fail(correctCount, totalPossible, percentage);
                resultsDiv.classList.add('bg-yellow-100', 'text-yellow-800');
            }

            resultsDiv.innerHTML = `<p class="text-xl font-bold mb-2">${currentLang === 'en' ? 'Your Score' : 'Iyong Iskor'}: ${overallScore} (${percentage}%)</p>` + `<p class="text-lg">${message}</p>`;
            resultsDiv.classList.remove('hidden');

            if (!isLanguageToggle) {
                resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        document.getElementById('fraction-recognition-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); 
        });
        
        window.addEventListener('load', () => {
             // Initialize default language (English) on load
             updateLanguage('en');
             highlightOutlineLink();
        });
    </script>
</body>
</html>
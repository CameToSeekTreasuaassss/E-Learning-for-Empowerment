<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagdaragdag at Pagbabawas ng mga Desimal</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ADDED weight 900 for font-extrabold to ensure font-bold works correctly, consistent with other module -->
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
        
        /* Table styles (ensuring 20px font) - copied from original content */
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

        /* Quiz Feedback */
        .correct-answer {
            border-color: #10b981 !important;
            background-color: #ecfdf5;
        }
        .incorrect-answer {
            border-color: #ef4444 !important;
            background-color: #fef2f2;
        }
        .border-green-500 { border-color: #10b981 !important; }
        .border-red-500 { border-color: #ef4444 !important; }
        .bg-green-50 { background-color: #ecfdf5 !important; }
        .bg-green-600 { background-color: #059669 !important; }
        .text-green-800 { color: #065f46 !important; }
        
        /* Math specific styles (from the original module) */
        .content-box pre {
            font-size: 1.25rem; /* 20px */
            line-height: 1.5;
            font-family: monospace;
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Introduction to Decimals</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Addition of Decimals</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Subtraction of Decimals</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Addition and Subtraction of Decimals</h1>
                    <p class="mt-4 text-gray-600 italic" data-i18n="h1_subtitle">Studying decimals and using them in addition and subtraction.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Identify the place value and value of decimal digits;</li>
                        <li data-i18n="obj_2">Write decimals in words and symbols;</li>
                        <li data-i18n="obj_3">Compare the value of decimal digits;</li>
                        <li data-i18n="obj_4">Perform addition and subtraction of decimals; and</li>
                        <li data-i18n="obj_5">Solve word problems involving addition and subtraction of decimals.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Ang mga Desimal -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Introduction to Decimals</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1"><b>Decimals</b> are fractions expressed in tenths, hundredths, thousandths, etc., using a combination of digits from 0 to 9.</p>
                            <p data-i18n="aralin1_p2">The <b>decimal point (.)</b> is used to separate the <b>whole number</b> (left) and the <b>fractional part</b> (right).</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Place Value of Decimals</h3>
                            <!--  -->
                            <table class="module-table">
                                <thead>
                                    <tr data-i18n-th-whole>
                                        <th colspan="3" data-i18n="aralin1_th_whole">Whole Number</th>
                                        <th data-i18n="aralin1_th_dot">.</th>
                                        <th colspan="3" data-i18n="aralin1_th_fraction">Fractional Part</th>
                                    </tr>
                                    <tr data-i18n-th-place>
                                        <th data-i18n="aralin1_th_hundreds">Hundreds</th>
                                        <th data-i18n="aralin1_th_tens">Tens</th>
                                        <th data-i18n="aralin1_th_ones">Ones</th>
                                        <th>.</th>
                                        <th data-i18n="aralin1_th_tenths">Tenths (1/10)</th>
                                        <th data-i18n="aralin1_th_hundredths">Hundredths (1/100)</th>
                                        <th data-i18n="aralin1_th_thousandths">Thousandths (1/1000)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>4</td><td>7</td><td>3</td><td>.</td><td>1</td><td>8</td><td>2</td></tr>
                                </tbody>
                            </table>
                            <p data-i18n="aralin1_p3"><b>473.182</b> is read as <b>Four hundred seventy-three and one hundred eighty-two thousandths</b>. The decimal point is read as <b>"and"</b>.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Fraction and Decimal Conversion</h3>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_q">Converting Decimal to Fraction:</p>
                                <p data-i18n="aralin1_ex1_a"><b>0.06</b> has two (2) decimal places. Thus, use 100 (two zeros). Answer: <b>6/100</b>.</p>
                            </div>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_q">Converting Fraction to Decimal:</p>
                                <p data-i18n="aralin1_ex2_a"><b>1/2</b> is obtained by dividing 1 by 2. Solution: <b>1 &divide; 2 = 0.5</b>.</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Pagdaragdag ng mga Desimal -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Addition of Decimals</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1"><b>Adding decimals</b> is similar to adding whole numbers. The decimals being added are called <b>addends</b>, and the answer is the <b>sum</b>.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Rules for Addition</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin2_ol1">Align the addends vertically. <b>It is important that all decimal points are aligned.</b></li>
                                <li data-i18n="aralin2_ol2">Add starting from the rightmost digit (smallest place value) moving to the left.</li>
                                <li data-i18n="aralin2_ol3">Carry or regroup the excess to the next place value.</li>
                                <li data-i18n="aralin2_ol4">Place the decimal point in the sum, aligned with the addends.</li>
                            </ol>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_q">EXAMPLE: Find the sum of 14.34, 1.628, and 3.96.</p>
                                <pre class="whitespace-pre-wrap font-mono mt-2 text-gray-900">
  14.340
   1.628
+  3.960
--------
  <b>19.928</b>
                                </pre>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Adding Money (Word Problem)</h3>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_q">EXAMPLE: Aling Rita spent: P31.75, P22.15, P15.50, P73.65. What is the Total Cost?</p>
                                <pre class="whitespace-pre-wrap font-mono mt-2 text-gray-900">
   P 31.75
     22.15
     15.50
+    73.65
---------
   <b>P143.05</b>
                                </pre>
                                <p class="mt-2 italic" data-i18n="aralin2_ex2_a">The total amount is <b>P143.05</b>.</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 3: Pagbabawas ng mga Desimal -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Subtraction of Decimals</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1"><b>Subtracting decimals</b> is similar to subtracting whole numbers. The number being subtracted from is the <b>minuend</b>, the number being subtracted is the <b>subtrahend</b>, and the answer is the <b>difference</b>.</p>
                            <p data-i18n="aralin3_p2"><b>The minuend must always be larger than the subtrahend.</b></p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Rules for Subtraction</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin3_ol1">Align the minuend and subtrahend, ensuring the decimal points are aligned.</li>
                                <li data-i18n="aralin3_ol2">Start from the rightmost digit.</li>
                                <li data-i18n="aralin3_ol3">If a digit cannot be subtracted, <b>regroup (borrow)</b> from the adjacent digit to the left.</li>
                                <li data-i18n="aralin3_ol4">Place the decimal point in the difference, aligned with the decimals.</li>
                            </ol>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex1_q">EXAMPLE: Find the difference between 5.32 and 3.86.</p>
                                <pre class="whitespace-pre-wrap font-mono mt-2 text-gray-900">
  <span class="text-gray-500">4 12 12</span> 
   5.32
 - 3.86
 --------
   <b>1.46</b>
                                </pre>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">Subtracting Money (Word Problem)</h3>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex2_q">EXAMPLE: Aling Carol bought P68.45 worth of vitamins. She paid P100.00. How much change did she receive?</p>
                                <pre class="whitespace-pre-wrap font-mono mt-2 text-gray-900">
  <span class="text-gray-500">9 9 9 10</span> 
  P100.00
 - P 68.45
 ---------
  <b>P 31.55</b>
                                </pre>
                                <p class="mt-2 italic" data-i18n="aralin3_ex2_a">Aling Carol's change is <b>P31.55</b>.</p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Test your knowledge of adding and subtracting decimals.</p>

                    <form id="decimal-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Addition of Decimals (Provide the Sum)</p>
                            <!-- Changed to vertical stacking (space-y-4) -->
                            <div class="space-y-4">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2"><label for="qa1" class="font-medium" data-i18n="qa1_label">1. 36.125 + 8.01 + 23.9 =</label><input type="text" id="qa1" class="quiz-input w-full sm:w-48" placeholder="Sum"></div>
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2"><label for="qa2" class="font-medium" data-i18n="qa2_label">2. P1,062.75 + P958.10 + P1,139.65 + P980.25 =</label><input type="text" id="qa2" class="quiz-input w-full sm:w-48" placeholder="Sum"></div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Subtraction of Decimals (Provide the Difference)</p>
                            <!-- Changed to vertical stacking (space-y-4) -->
                            <div class="space-y-4">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2"><label for="qb1" class="font-medium" data-i18n="qb1_label">1. P39.45 - P14.23 =</label><input type="text" id="qb1" class="quiz-input w-full sm:w-48" placeholder="Difference"></div>
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2"><label for="qb2" class="font-medium" data-i18n="qb2_label">2. 41.36 - 37.19 =</label><input type="text" id="qb2" class="quiz-input w-full sm:w-48" placeholder="Difference"></div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_c">C. Word Problem (Provide the Answer)</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qc1" class="font-medium" data-i18n="qc1_label">1. Mang Nardo had P8,726.35 in the bank and withdrew P3,457.25. How much is left?</label>
                                    <input type="text" id="qc1" class="quiz-input w-full sm:w-48" placeholder="Remaining Amount (P)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qc2" class="font-medium" data-i18n="qc2_label">2. Rina and Lita's combined weight is 80.7 kg. If Rina is 46.9 kg, what is Lita's weight?</label>
                                    <input type="text" id="qc2" class="quiz-input w-full sm:w-48" placeholder="Lita's Weight (kg)">
                                </div>
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
                outline_aralin1: "Lesson 1: Introduction to Decimals",
                outline_aralin2: "Lesson 2: Addition of Decimals",
                outline_aralin3: "Lesson 3: Subtraction of Decimals",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Addition and Subtraction of Decimals",
                h1_subtitle: "Studying decimals and using them in addition and subtraction.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Identify the place value and value of decimal digits;",
                obj_2: "Write decimals in words and symbols;",
                obj_3: "Compare the value of decimal digits;",
                obj_4: "Perform addition and subtraction of decimals; and",
                obj_5: "Solve word problems involving addition and subtraction of decimals.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Introduction to Decimals",
                aralin1_p1: "<b>Decimals</b> are fractions expressed in tenths, hundredths, thousandths, etc., using a combination of digits from 0 to 9.",
                aralin1_p2: "The <b>decimal point (.)</b> is used to separate the <b>whole number</b> (left) and the <b>fractional part</b> (right).",
                aralin1_h3_1: "Place Value of Decimals",
                aralin1_th_whole: "Whole Number",
                aralin1_th_dot: ".",
                aralin1_th_fraction: "Fractional Part",
                aralin1_th_hundreds: "Hundreds",
                aralin1_th_tens: "Tens",
                aralin1_th_ones: "Ones",
                aralin1_th_tenths: "Tenths (1/10)",
                aralin1_th_hundredths: "Hundredths (1/100)",
                aralin1_th_thousandths: "Thousandths (1/1000)",
                aralin1_p3: "<b>473.182</b> is read as <b>Four hundred seventy-three and one hundred eighty-two thousandths</b>. The decimal point is read as <b>\"and\"</b>.",
                aralin1_h3_2: "Fraction and Decimal Conversion",
                aralin1_ex1_q: "Converting Decimal to Fraction:",
                aralin1_ex1_a: "<b>0.06</b> has two (2) decimal places. Thus, use 100 (two zeros). Answer: <b>6/100</b>.",
                aralin1_ex2_q: "Converting Fraction to Decimal:",
                aralin1_ex2_a: "<b>1/2</b> is obtained by dividing 1 by 2. Solution: <b>1 &divide; 2 = 0.5</b>.",
                
                // Lesson 2 Content
                aralin2_title: "Lesson 2: Addition of Decimals",
                aralin2_p1: "<b>Adding decimals</b> is similar to adding whole numbers. The decimals being added are called <b>addends</b>, and the answer is the <b>sum</b>.",
                aralin2_h3_1: "Rules for Addition",
                aralin2_ol1: "Align the addends vertically. <b>It is important that all decimal points are aligned.</b>",
                aralin2_ol2: "Add starting from the rightmost digit (smallest place value) moving to the left.",
                aralin2_ol3: "Carry or regroup the excess to the next place value.",
                aralin2_ol4: "Place the decimal point in the sum, aligned with the addends.",
                aralin2_ex1_q: "EXAMPLE: Find the sum of 14.34, 1.628, and 3.96.",
                aralin2_h3_2: "Adding Money (Word Problem)",
                aralin2_ex2_q: "EXAMPLE: Aling Rita spent: P31.75, P22.15, P15.50, P73.65. What is the Total Cost?",
                aralin2_ex2_a: "The total amount is <b>P143.05</b>.",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Subtraction of Decimals",
                aralin3_p1: "<b>Subtracting decimals</b> is similar to subtracting whole numbers. The number being subtracted from is the <b>minuend</b>, the number being subtracted is the <b>subtrahend</b>, and the answer is the <b>difference</b>.",
                aralin3_p2: "<b>The minuend must always be larger than the subtrahend.</b>",
                aralin3_h3_1: "Rules for Subtraction",
                aralin3_ol1: "Align the minuend and subtrahend, ensuring the decimal points are aligned.",
                aralin3_ol2: "Start from the rightmost digit.",
                aralin3_ol3: "If a digit cannot be subtracted, <b>regroup (borrow)</b> from the adjacent digit to the left.",
                aralin3_ol4: "Place the decimal point in the difference, aligned with the decimals.",
                aralin3_ex1_q: "EXAMPLE: Find the difference between 5.32 and 3.86.",
                aralin3_h3_2: "Subtracting Money (Word Problem)",
                aralin3_ex2_q: "EXAMPLE: Aling Carol bought P68.45 worth of vitamins. She paid P100.00. How much change did she receive?",
                aralin3_ex2_a: "Aling Carol's change is <b>P31.55</b>.",
                
                // Quiz Labels
                quiz_title: "Practice",
                quiz_subtitle: "Test your knowledge of adding and subtracting decimals.",
                quiz_section_a: "A. Addition of Decimals (Provide the Sum)",
                qa1_label: "1. 36.125 + 8.01 + 23.9 =",
                qa2_label: "2. P1,062.75 + P958.10 + P1,139.65 + P980.25 =",
                quiz_section_b: "B. Subtraction of Decimals (Provide the Difference)",
                qb1_label: "1. P39.45 - P14.23 =",
                qb2_label: "2. 41.36 - 37.19 =",
                quiz_section_c: "C. Word Problem (Provide the Answer)",
                qc1_label: "1. Mang Nardo had P8,726.35 in the bank and withdrew P3,457.25. How much is left?",
                qc2_label: "2. Rina and Lita's combined weight is 80.7 kg. If Rina is 46.9 kg, what is Lita's weight?",
                quiz_button: "Check Answers",

                // Quiz Placeholders
                qa1_placeholder: "Sum",
                qa2_placeholder: "Sum",
                qb1_placeholder: "Difference",
                qb2_placeholder: "Difference",
                qc1_placeholder: "Remaining Amount (P)",
                qc2_placeholder: "Lita's Weight (kg)",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered decimals!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score} out of ${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score} out of ${total} (${percentage}%). Read Lessons 1-3 again.`,

            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Ang mga Desimal",
                outline_aralin2: "Aralin 2: Pagdaragdag ng mga Desimal",
                outline_aralin3: "Aralin 3: Pagbabawas ng mga Desimal",
                outline_quiz: "Pagsasanay",
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Pagdaragdag at Pagbabawas ng mga Desimal",
                h1_subtitle: "Ang pag-aaral ng mga desimal at ang paggamit nito sa pagdaragdag at pagbabawas.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",

                // Objectives
                obj_1: "Matukoy ang place value at halaga ng mga tambilang ng desimal;",
                obj_2: "Maisulat ang mga desimal sa salita at sa mga simbolo;",
                obj_3: "Maihambing ang halaga ng mga tambilang ng desimal;",
                obj_4: "Maisagawa ang pagdaragdag at pagbabawas ng mga desimal; at",
                obj_5: "Malutas ang mga suliranin na nagsasangkot ng pagdaragdag at pagbabawas ng mga decimal.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Ang mga Desimal",
                aralin1_p1: "Ang mga <b>desimal</b> ay mga praksiyon na ipinahahayag sa tenths, hundredths, thousandths, atbp. na may kombinasyon ng mga tambilang na 0 hanggang 9.",
                aralin1_p2: "Ang <b>puntong desimal (.)</b> ang ginagamit upang paghiwalayin ang <b>buong bilang</b> (kaliwa) at ang <b>praksiyon</b> (kanan).",
                aralin1_h3_1: "Place Value ng mga Desimal",
                aralin1_th_whole: "Buong Bilang",
                aralin1_th_dot: ".",
                aralin1_th_fraction: "Praksiyon",
                aralin1_th_hundreds: "Tig-iisang Daan",
                aralin1_th_tens: "Tig-sasampu",
                aralin1_th_ones: "Tig-iisa",
                aralin1_th_tenths: "Tenths (1/10)",
                aralin1_th_hundredths: "Hundredths (1/100)",
                aralin1_th_thousandths: "Thousandths (1/1000)",
                aralin1_p3: "Ang <b>473.182</b> ay binabasa bilang <b>Apatnadaan pitumpu't-tatlo at isandaan walumpu't-dalawang thousandths</b>. Ang puntong desimal ay binabasa bilang <b>\"at\"</b>.",
                aralin1_h3_2: "Pagbabago ng Praksiyon at Desimal",
                aralin1_ex1_q: "Pagbabago ng Desimal sa Praksiyon:",
                aralin1_ex1_a: "Ang <b>0.06</b> ay may dalawang (2) lunan ng desimal. Kaya, gamitin ang 100 (dalawang zero). Sagot: <b>6/100</b>.",
                aralin1_ex2_q: "Pagbabago ng Praksiyon sa Desimal:",
                aralin1_ex2_a: "Ang <b>1/2</b> ay makukuha sa pamamagitan ng paghati ng 1 sa 2. Solusyon: <b>1 &divide; 2 = 0.5</b>.",
                
                // Lesson 2 Content
                aralin2_title: "Aralin 2: Pagdaragdag ng mga Desimal",
                aralin2_p1: "Ang <b>pagdaragdag ng mga desimal</b> ay katulad din ng pagdaragdag ng mga buong bilang. Ang mga desimal na idinaragdag ay tinatawag na <b>addend</b>, at ang sagot ay <b>kabuuan</b>.",
                aralin2_h3_1: "Tuntunin sa Pagdaragdag",
                aralin2_ol1: "Ihanay ang mga addend sa hanay. <b>Mahalaga na nakahanay ang lahat ng puntong desimal.</b>",
                aralin2_ol2: "Ipagdagdag simula sa pinaka-kanang tambilang (pinakamaliit na place value) papunta sa kaliwa.",
                aralin2_ol3: "I-carry o I-grupo ang mga sobra sa susunod na place value.",
                aralin2_ol4: "Ilagay ang puntong desimal sa kabuuan na nakahanay sa mga addend.",
                aralin2_ex1_q: "HALIMBAWA: Hanapin ang kabuuan ng 14.34, 1.628, at 3.96.",
                aralin2_h3_2: "Pagdaragdag ng Salapi (Word Problem)",
                aralin2_ex2_q: "HALIMBAWA: Ginastos ni Aling Rita: P31.75, P22.15, P15.50, P73.65. Kabuuang Gastos?",
                aralin2_ex2_a: "Ang kabuuang halaga ay <b>P143.05</b>.",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Pagbabawas ng mga Desimal",
                aralin3_p1: "Ang <b>pagbabawas ng mga desimal</b> ay katulad din ng pagbabawas ng mga buong bilang. Ang bilang na babawasan ay <b>minuend</b>, ang ibabawas ay <b>subtrahend</b>, at ang sagot ay <b>difference</b>.",
                aralin3_p2: "<b>Ang minuend ay laging mas malaki kaysa subtrahend.</b>",
                aralin3_h3_1: "Tuntunin sa Pagbabawas",
                aralin3_ol1: "Ihanay ang minuend at subtrahend, tiyakin na nakahanay ang mga puntong desimal.",
                aralin3_ol2: "Magsimula sa pinaka-kanang tambilang.",
                aralin3_ol3: "Kung hindi kayang ibawas, <b>mag-pangkat (borrow)</b> mula sa katabing kaliwang tambilang.",
                aralin3_ol4: "Ilagay ang puntong desimal sa difference na nakahanay sa mga desimal.",
                aralin3_ex1_q: "HALIMBAWA: Hanapin ang difference ng 5.32 at 3.86.",
                aralin3_h3_2: "Pagbabawas ng Salapi (Word Problem)",
                aralin3_ex2_q: "HALIMBAWA: Bumili si Aling Carol ng P68.45 na bitamina. Nagbigay ng P100.00. Magkano ang sukli?",
                aralin3_ex2_a: "Ang sukli ni Aling Carol ay <b>P31.55</b>.",
                
                // Quiz Labels
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Subukan ang iyong kaalaman sa Pagdaragdag at Pagbabawas ng mga Desimal.",
                quiz_section_a: "A. Pagdaragdag ng mga Desimal (Ibigay ang Kabuuan)",
                qa1_label: "1. 36.125 + 8.01 + 23.9 =",
                qa2_label: "2. P1,062.75 + P958.10 + P1,139.65 + P980.25 =",
                quiz_section_b: "B. Pagbabawas ng mga Desimal (Ibigay ang Difference)",
                qb1_label: "1. P39.45 - P14.23 =",
                qb2_label: "2. 41.36 - 37.19 =",
                quiz_section_c: "C. Word Problem (Ibigay ang Sagot)",
                qc1_label: "1. Si Mang Nardo ay may P8,726.35 sa bangko at kinuha niya ang P3,457.25. Magkano ang natira?",
                qc2_label: "2. Pinagsamang timbang nina Rina at Lita ay 80.7 kg. Kung si Rina ay 46.9 kg, ilan ang timbang ni Lita?",
                quiz_button: "Tingnan ang Sagot",

                // Quiz Placeholders
                qa1_placeholder: "Kabuuan",
                qa2_placeholder: "Kabuuan",
                qb1_placeholder: "Difference",
                qb2_placeholder: "Difference",
                qc1_placeholder: "Natirang Salapi (P)",
                qc2_placeholder: "Timbang ni Lita (kg)",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang desimal!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score} out of ${total} (${percentage}%). Balikan lang ang mga aralin para sa mga mali mong sagot.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score} out of ${total} (${percentage}%). Basahin ulit ang Aralin 1-3.`,

            }
        };

        let currentLang = 'en'; // DEFAULT LANGUAGE IS ENGLISH, as requested

        /**
         * Updates the text content and placeholders of all elements with data-i18n attributes.
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
                    // Use innerHTML for text that contains <b> tags
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
            
            // 5. Update placeholders for inputs
            document.getElementById('qa1').placeholder = langData.qa1_placeholder;
            document.getElementById('qa2').placeholder = langData.qa2_placeholder;
            document.getElementById('qb1').placeholder = langData.qb1_placeholder;
            document.getElementById('qb2').placeholder = langData.qb2_placeholder;
            document.getElementById('qc1').placeholder = langData.qc1_placeholder;
            document.getElementById('qc2').placeholder = langData.qc2_placeholder;
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
            // Initialize default language (English) on load
             updateLanguage('en');
             highlightOutlineLink();
        });
        // --- END SCROLL TRACKING LOGIC ---


        // Function to standardize currency/number input
        function standardizeInput(value, isCurrency = false) {
            if (typeof value !== 'string') value = String(value);
            value = value.trim().replace(/\s/g, ''); // Remove spaces
            
            if (isCurrency) {
                // Remove 'P' or 'p' and commas, then standardize two decimal places
                value = value.replace(/^[Pp]/, '').replace(/,/g, '');
                 
                 // Ensure minimum of two decimal places for currency (e.g., '5' becomes '5.00')
                 const parsedValue = parseFloat(value);
                 if (isNaN(parsedValue)) return value;
                 value = parsedValue.toFixed(2);


            } else {
                // For non-currency numbers (like kg or general math)
                 value = value.replace(/kg|kilo|m|meter/gi, '').trim();
                 // Normalize to 3 decimal places for precision check unless it's a whole number
                 const parsedValue = parseFloat(value);
                 if (isNaN(parsedValue)) return value;
                 
                 // Use toFixed(3) then replace trailing zeros to handle decimals correctly, e.g., '33.8' instead of '33.800'
                 value = parsedValue.toFixed(3).replace(/\.?0+$/, ''); 
            }
            return value;
        }

        document.getElementById('decimal-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const resultsDiv = document.getElementById('results');
            let correctCount = 0;
            const totalQuestions = 6; 

            // Define correct answers (Standardized format)
            const answers = {
                qa1: standardizeInput('68.035', false), // 36.125 + 8.01 + 23.9 = 68.035
                qa2: standardizeInput('4140.75', true), // P1062.75 + P958.10 + P1139.65 + P980.25 = P4140.75
                qb1: standardizeInput('25.22', true), // P39.45 - P14.23 = P25.22
                qb2: standardizeInput('4.17', false), // 41.36 - 37.19 = 4.17
                qc1: standardizeInput('5269.10', true), // P8,726.35 - P3,457.25 = P5,269.10
                qc2: standardizeInput('33.8', false), // 80.7 - 46.9 = 33.8 kg
            };

            // Helper function for currency inputs (uses standardizeInput with isCurrency=true)
            function checkCurrencyInput(id, expected) {
                const input = document.getElementById(id);
                let value = standardizeInput(input.value, true);
                let isCorrect = false;

                input.classList.remove('correct-answer', 'incorrect-answer');

                // Check against the standardized expected value
                if (value === expected) {
                    isCorrect = true;
                }
                
                if (isCorrect) {
                    correctCount++;
                    input.classList.add('correct-answer');
                } else if (input.value.length > 0) {
                    input.classList.add('incorrect-answer');
                }
            }
            
            // Helper function for general number inputs (uses standardizeInput with isCurrency=false)
            function checkGeneralInput(id, expected) {
                const input = document.getElementById(id);
                // Ensure value is standardized, removing trailing zeros (e.g., '68.035' not '68.035000')
                let value = standardizeInput(input.value, false); 
                let isCorrect = false;

                input.classList.remove('correct-answer', 'incorrect-answer');

                // Compare the standardized string values
                if (value === expected) {
                    isCorrect = true;
                }
                
                if (isCorrect) {
                    correctCount++;
                    input.classList.add('correct-answer');
                } else if (input.value.length > 0) {
                    input.classList.add('incorrect-answer');
                }
            }


            // Run checks
            checkGeneralInput('qa1', answers.qa1);
            checkCurrencyInput('qa2', answers.qa2);
            checkCurrencyInput('qb1', answers.qb1);
            checkGeneralInput('qb2', answers.qb2);
            checkCurrencyInput('qc1', answers.qc1);
            checkGeneralInput('qc2', answers.qc2);


            // Display results
            const totalPossible = totalQuestions;
            const percentage = ((correctCount / totalPossible) * 100).toFixed(0);
            let message = '';
            
            // Determine the message based on current language
            const resultMessage = translations[currentLang];

            const overallScore = `${correctCount}/${totalPossible}`;

            if (correctCount === totalPossible) {
                message = resultMessage.quiz_result_excellent(correctCount, totalPossible, percentage);
                resultsDiv.classList.remove('bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800');
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalPossible * 0.7) {
                message = resultMessage.quiz_result_good(correctCount, totalPossible, percentage);
                resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-yellow-100', 'text-yellow-800');
                resultsDiv.classList.add('bg-green-100', 'text-green-800');
            } else {
                message = resultMessage.quiz_result_fail(correctCount, totalPossible, percentage);
                resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800');
                resultsDiv.classList.add('bg-yellow-100', 'text-yellow-800');
            }

            resultsDiv.innerHTML = message;
            resultsDiv.classList.remove('hidden');
            resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    </script>
</body>
</html>
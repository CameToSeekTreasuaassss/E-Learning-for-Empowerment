<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addition and Subtraction in Daily Life</title>
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
        
        /* Table styles (ensuring 20px font) */
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
            /* Ensure the text is readable without LaTeX rendering */
            font-family: 'Inter', sans-serif;
        }
        
        /* NEW: Flex container for alignment inside example box */
        .computation-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        /* NEW: Class to ensure fixed-width for the math calculation part only */
        .math-calc {
            font-family: monospace; /* Essential for number alignment */
            text-align: right;
            line-height: 1.5;
            padding-right: 1rem; /* Space between numbers and labels */
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Place-Value Numeration</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Addition in Daily Life</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Subtraction in Daily Life</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Addition and Subtraction in Daily Life</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Learn how these simple operations apply to everyday tasks.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Identify <b>numbers</b> and <b>digits</b>;</li>
                        <li data-i18n="obj_2">Determine the <b>place-value</b> of a digit;</li>
                        <li data-i18n="obj_3">Perform <b>addition</b> of whole numbers (up to three digits);</li>
                        <li data-i18n="obj_4">Perform <b>subtraction</b> of whole numbers (up to three digits); and</li>
                        <li data-i18n="obj_5">Apply knowledge of addition and subtraction to solve everyday problems.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Ang Sistema ng Place-Value Numeration (Based on PDF Page 5-9) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Place-Value Numeration System</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">A <b>digit</b> is only part of a number (from 0 to 9). A <b>number</b> is the overall representation of how many or how much of something is contained and consists of one or more digits.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Place-Value</h3>
                            <p data-i18n="aralin1_p2">The <b>value</b> of a digit in a number depends on its <b>place</b>. In our system, a digit is ten times greater than the digit to its right.</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_q">EXAMPLE: Reading 705,300</p>
                                <table class="module-table">
                                    <thead>
                                        <tr><th colspan="3" data-i18n="aralin1_ex1_th1">Thousands</th><th colspan="3" data-i18n="aralin1_ex1_th2">Units</th></tr>
                                        <tr>
                                            <th data-i18n="aralin1_ex1_th3">Hundred Thousands</th>
                                            <th data-i18n="aralin1_ex1_th4">Ten Thousands</th>
                                            <th data-i18n="aralin1_ex1_th5">Thousands</th>
                                            <th data-i18n="aralin1_ex1_th6">Hundreds</th>
                                            <th data-i18n="aralin1_ex1_th7">Tens</th>
                                            <th data-i18n="aralin1_ex1_th8">Ones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>7</td><td>0</td><td>5</td><td>3</td><td>0</td><td>0</td></tr>
                                    </tbody>
                                </table>
                                                                <p class="mt-2" data-i18n="aralin1_ex1_a">This number is read as: <b>Seven Hundred Five Thousand, Three Hundred</b>.</p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Expanded Form</h3>
                            <p data-i18n="aralin1_p3">The value of each digit is equal to the digit multiplied by its place-value.</p>
                            <p class="math-formula" data-i18n="aralin1_math_1">705,300 = (7 &times; 100,000) + (0 &times; 10,000) + (5 &times; 1,000) + (3 &times; 100) + (0 &times; 10) + (0 &times; 1)</p>
                        </div>
                    </details>

                    <!-- ARALIN 2: Ang Pagdaragdag sa Pang-araw-araw na Buhay (Based on PDF Page 10-21) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Addition in Daily Life</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">In addition, the numbers being added are called the <b>addends</b>, and the answer is the <b>sum</b> or <b>total</b>.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Addition Without Regrouping</h3>
                            <p data-i18n="aralin2_p2">The short method is faster to use:</p>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin2_ol1">Write the addends in <b>column form</b> (place value to place value).</li>
                                <li data-i18n="aralin2_ol2">Add starting from the <b>ones</b>, followed by the tens, and so on.</li>
                            </ol>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_q">EXAMPLE: 250 + 136</p>
                                <div class="computation-container">
                                    <pre class="math-calc" data-i18n="aralin2_ex1_math">
  250
+ 136
-----
  <b>386</b></pre>
                                    <div class="math-label">
                                        <br>
                                        <div data-i18n="aralin2_ex1_l1">(Addend)</div>
                                        <div data-i18n="aralin2_ex1_l2">(Addend)</div>
                                        <div style="height: 1.5em;"></div>
                                        <div data-i18n="aralin2_ex1_l3">(Sum)</div>
                                    </div>
                                </div>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Addition With Regrouping (Carrying)</h3>
                            <p data-i18n="aralin2_p3"><b>Regrouping</b> (carrying) is used when the sum of the digits in a place value is 10 or greater.</p>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_q">EXAMPLE: 478 + 735</p>
                                <div class="computation-container">
                                    <pre class="math-calc" data-i18n="aralin2_ex2_math">
    1 1
  478
+ 735
-----
 <b>1213</b></pre>
                                    <div class="math-label">
                                        <br>
                                        <div style="height: 1.5em;" data-i18n="aralin2_ex2_l1">(Carries)</div>
                                    </div>
                                </div>
                                                                <ul class="list-disc list-inside ml-4 mt-2">
                                    <li data-i18n="aralin2_ul1"><b>Ones:</b> 8 + 5 = 13. Write 3, carry 1 to the tens.</li>
                                    <li data-i18n="aralin2_ul2"><b>Tens:</b> 1 + 7 + 3 = 11. Write 1, carry 1 to the hundreds.</li>
                                    <li data-i18n="aralin2_ul3"><b>Hundreds:</b> 1 + 4 + 7 = 12. Write 12.</li>
                                </ul>
                            </div>
                        </div>
                    </details>
                    
                    <!-- ARALIN 3: Ang Pagbabawas sa Pang-araw-araw na Buhay (Based on PDF Page 22-40) -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Subtraction in Daily Life</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">In subtraction, the number being reduced is the <b>minuend</b>, the number being subtracted is the <b>subtrahend</b>, and the answer is the <b>difference</b>. Remember: <b>The minuend is always larger than the subtrahend.</b></p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Subtraction Without Regrouping</h3>
                            <p data-i18n="aralin3_p2">Align the numbers and subtract starting from the ones place moving to the left.</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex1_q">EXAMPLE: 544 - 320</p>
                                <div class="computation-container">
                                    <pre class="math-calc" data-i18n="aralin3_ex1_math">
  544
- 320
-----
  <b>224</b></pre>
                                    <div class="math-label">
                                        <br>
                                        <div data-i18n="aralin3_ex1_l1">(Minuend)</div>
                                        <div data-i18n="aralin3_ex1_l2">(Subtrahend)</div>
                                        <div style="height: 1.5em;"></div>
                                        <div data-i18n="aralin3_ex1_l3">(Difference)</div>
                                    </div>
                                </div>
                            </div>  
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">Subtraction With Regrouping (Borrowing)</h3>
                            <p data-i18n="aralin3_p3"><b>Regrouping</b> is done when the digit in the minuend is smaller than the digit in the subtrahend at the same place value. You must <b>borrow</b> from the digit to the immediate left.</p>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex2_q">EXAMPLE: 935 - 478</p>
                                <div class="computation-container">
                                    <pre class="math-calc" data-i18n="aralin3_ex2_math">
  <span class="text-gray-900">8 12 15</span>
  9 3 5
- 4 7 8
-------
  <b>457</b></pre>
                                    <div class="math-label">
                                        <br>
                                        <div data-i18n="aralin3_ex2_l1">(Regrouped values)</div>
                                    </div>
                                </div>
                                                                <p class="mt-2" data-i18n="aralin3_ex2_a">The answer is <b>457</b>. You can check the answer using addition: <b>457 + 478 = 935</b>.</p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Test your knowledge of Place Value, Addition, and Subtraction of Whole Numbers. (Enter the answer with the correct format, e.g., <b>P125</b> for money)</p>

                    <form id="whole-number-quiz-form" class="space-y-6">
                        
                        <!-- Pagsasanay A: Place Value (Aralin 1) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Place Value and Numbers</p>
                            <div class="space-y-4">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. How many digits does the number 987,654 have?</label>
                                    <input type="text" id="qa1" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa1_placeholder" placeholder="Number">
                                </div>
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. What is the value of 5 in 65,725?</label>
                                    <input type="text" id="qa2" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa2_placeholder" placeholder="Value (e.g., 5000)">
                                </div>
                            </div>
                        </div>

                        <!-- Pagsasanay B: Pagdaragdag (Aralin 2) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Addition (Give the Total)</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1" class="font-medium" data-i18n="qb1_label">1. Jessie (P9) and Jamie (P18) paid for the bus. Total fare?</label>
                                    <input type="text" id="qb1" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qb1_placeholder" placeholder="Total (P)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2" class="font-medium" data-i18n="qb2_label">2. Income: P100 (Mother), P150 (Father), P200 (Grandparents). Total income?</label>
                                    <input type="text" id="qb2" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qb2_placeholder" placeholder="Total (P)">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pagsasanay C: Pagbabawas (Aralin 3) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_c">C. Subtraction (Give the Difference)</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qc1" class="font-medium" data-i18n="qc1_label">1. 17 books, 8 borrowed. How many are left?</label>
                                    <input type="text" id="qc1" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qc1_placeholder" placeholder="Left (Books)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qc2" class="font-medium" data-i18n="qc2_label">2. Kiko had P500, spent P375. How much is left?</label>
                                    <input type="text" id="qc2" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qc2_placeholder" placeholder="Left (P)">
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
                outline_aralin1: "Lesson 1: Place-Value Numeration",
                outline_aralin2: "Lesson 2: Addition in Daily Life",
                outline_aralin3: "Lesson 3: Subtraction in Daily Life",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Addition and Subtraction in Daily Life",
                h1_subtitle: "Learn how these simple operations apply to everyday tasks.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Identify <b>numbers</b> and <b>digits</b>;",
                obj_2: "Determine the <b>place-value</b> of a digit;",
                obj_3: "Perform <b>addition</b> of whole numbers (up to three digits);",
                obj_4: "Perform <b>subtraction</b> of whole numbers (up to three digits); and",
                obj_5: "Apply knowledge of addition and subtraction to solve everyday problems.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Place-Value Numeration System",
                aralin1_p1: "A <b>digit</b> is only part of a number (from 0 to 9). A <b>number</b> is the overall representation of how many or how much of something is contained and consists of one or more digits.",
                aralin1_h3_1: "Place-Value",
                aralin1_p2: "The <b>value</b> of a digit in a number depends on its <b>place</b>. In our system, a digit is ten times greater than the digit to its right.",
                aralin1_ex1_q: "EXAMPLE: Reading 705,300",
                aralin1_ex1_th1: "Thousands",
                aralin1_ex1_th2: "Units",
                aralin1_ex1_th3: "Hundred Thousands",
                aralin1_ex1_th4: "Ten Thousands",
                aralin1_ex1_th5: "Thousands",
                aralin1_ex1_th6: "Hundreds",
                aralin1_ex1_th7: "Tens",
                aralin1_ex1_th8: "Ones",
                aralin1_ex1_a: "This number is read as: <b>Seven Hundred Five Thousand, Three Hundred</b>.",
                aralin1_h3_2: "Expanded Form",
                aralin1_p3: "The value of each digit is equal to the digit multiplied by its place-value.",
                aralin1_math_1: "705,300 = (7 &times; 100,000) + (0 &times; 10,000) + (5 &times; 1,000) + (3 &times; 100) + (0 &times; 10) + (0 &times; 1)",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Addition in Daily Life",
                aralin2_p1: "In addition, the numbers being added are called the <b>addends</b>, and the answer is the <b>sum</b> or <b>total</b>.",
                aralin2_h3_1: "Addition Without Regrouping",
                aralin2_p2: "The short method is faster to use:",
                aralin2_ol1: "Write the addends in <b>column form</b> (place value to place value).",
                aralin2_ol2: "Add starting from the <b>ones</b>, followed by the tens, and so on.",
                aralin2_ex1_q: "EXAMPLE: 250 + 136",
                aralin2_ex1_math: '\r\n  250\r\n+ 136\r\n-----\r\n  <b>386</b>',
                aralin2_ex1_l1: "(Addend)",
                aralin2_ex1_l2: "(Addend)",
                aralin2_ex1_l3: "(Sum)",
                aralin2_h3_2: "Addition With Regrouping (Carrying)",
                aralin2_p3: "<b>Regrouping</b> (carrying) is used when the sum of the digits in a place value is 10 or greater.",
                aralin2_ex2_q: "EXAMPLE: 478 + 735",
                aralin2_ex2_math: '\r\n    1 1\r\n  478\r\n+ 735\r\n-----\r\n <b>1213</b>',
                aralin2_ex2_l1: "(Carries)",
                aralin2_ul1: "<b>Ones:</b> 8 + 5 = 13. Write 3, carry 1 to the tens.",
                aralin2_ul2: "<b>Tens:</b> 1 + 7 + 3 = 11. Write 1, carry 1 to the hundreds.",
                aralin2_ul3: "<b>Hundreds:</b> 1 + 4 + 7 = 12. Write 12.",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Subtraction in Daily Life",
                aralin3_p1: "In subtraction, the number being reduced is the <b>minuend</b>, the number being subtracted is the <b>subtrahend</b>, and the answer is the <b>difference</b>. Remember: <b>The minuend is always larger than the subtrahend.</b>",
                aralin3_h3_1: "Subtraction Without Regrouping",
                aralin3_p2: "Align the numbers and subtract starting from the ones place moving to the left.",
                aralin3_ex1_q: "EXAMPLE: 544 - 320",
                aralin3_ex1_math: '\r\n  544\r\n- 320\r\n-----\r\n  <b>224</b>',
                aralin3_ex1_l1: "(Minuend)",
                aralin3_ex1_l2: "(Subtrahend)",
                aralin3_ex1_l3: "(Difference)",
                aralin3_h3_2: "Subtraction With Regrouping (Borrowing)",
                aralin3_p3: "<b>Regrouping</b> is done when the digit in the minuend is smaller than the digit in the subtrahend at the same place value. You must <b>borrow</b> from the digit to the immediate left.",
                aralin3_ex2_q: "EXAMPLE: 935 - 478",
                aralin3_ex2_math: '\r\n  <span class="text-gray-900">8 12 15</span>\r\n  9 3 5\r\n- 4 7 8\r\n-------\r\n  <b>457</b>',
                aralin3_ex2_l1: "(Regrouped values)",
                aralin3_ex2_a: "The answer is <b>457</b>. You can check the answer using addition: <b>457 + 478 = 935</b>.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Test your knowledge of Place Value, Addition, and Subtraction of Whole Numbers. (Enter the answer with the correct format, e.g., <b>P125</b> for money)",
                quiz_section_a: "A. Place Value and Numbers",
                qa1_label: "1. How many digits does the number 987,654 have?",
                qa2_label: "2. What is the value of 5 in 65,725?",
                qa1_placeholder: "Number",
                qa2_placeholder: "Value (e.g., 5000)",
                quiz_section_b: "B. Addition (Give the Total)",
                qb1_label: "1. Jessie (P9) and Jamie (P18) paid for the bus. Total fare?",
                qb2_label: "2. Income: P100 (Mother), P150 (Father), P200 (Grandparents). Total income?",
                qb1_placeholder: "Total (P)",
                qb2_placeholder: "Total (P)",
                quiz_section_c: "C. Subtraction (Give the Difference)",
                qc1_label: "1. 17 books, 8 borrowed. How many are left?",
                qc2_label: "2. Kiko had P500, spent P375. How much is left?",
                qc1_placeholder: "Left (Books)",
                qc2_placeholder: "Left (P)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered whole number arithmetic!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Read Lessons 1-3 again.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Place-Value Numeration",
                outline_aralin2: "Aralin 2: Pagdaragdag sa Pang-araw-araw na Buhay",
                outline_aralin3: "Aralin 3: Pagbabawas sa Pang-araw-araw na Buhay",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Pagdaragdag at Pagbabawas sa Pang araw araw na Buhay",
                h1_subtitle: "Matututuhan mo kung paano ang mga simpleng pamamaraang ito ay angkop sa pang-araw-araw na mga gawain.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Makilala ang mga <b>bilang</b> at <b>tambilang</b> (digit);",
                obj_2: "Matukoy ang <b>place-value</b> ng isang tambilang;",
                obj_3: "Maisagawa ang <b>pagdaragdag</b> ng mga buong bilang (hanggang tatlong tambilang);",
                obj_4: "Maisagawa ang <b>pagbabawas</b> ng mga buong bilang (hanggang tatlong tambilang);",
                obj_5: "Magamit ang kaalaman sa pagdaragdag at pagbabawas upang malutas ang pang-araw-araw na mga suliranin.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Ang Sistema ng Place-Value Numeration",
                aralin1_p1: "Ang <b>tambilang</b> (digit) ay bahagi lamang ng isang bilang (mula 0 hanggang 9). Ang <b>bilang</b> naman ay ang kabuuang representasyon kung gaano o kung magkano ang tinataglay ng isang bagay at binubuo ng isa o higit pang tambilang.",
                aralin1_h3_1: "Place-Value",
                aralin1_p2: "Ang <b>halaga</b> ng isang tambilang sa bilang ay nakasalalay sa <b>lugar</b> nito. Sa ating sistema, ang isang tambilang ay sampung beses ang higit kaysa sa tambilang na nasa kanan nito.",
                aralin1_ex1_q: "HALIMBAWA: Pagbabasa ng 705,300",
                aralin1_ex1_th1: "Libo",
                aralin1_ex1_th2: "Yunit",
                aralin1_ex1_th3: "Tig-iisang Daang Libo",
                aralin1_ex1_th4: "Tig-sasampung Libo",
                aralin1_ex1_th5: "Tig-iisang Libo",
                aralin1_ex1_th6: "Tig-iisang Daan",
                aralin1_ex1_th7: "Tig-sasampu",
                aralin1_ex1_th8: "Tig-iisa",
                aralin1_ex1_a: "Ang bilang na ito ay binabasa bilang: <b>Pitong Daan at Limang Libo, Tatlong Daan</b>.",
                aralin1_h3_2: "Pinahabang Anyo (Expanded Form)",
                aralin1_p3: "Ang halaga ng bawat tambilang ay katumbas ng tambilang na pinarami sa place-value nito.",
                aralin1_math_1: "705,300 = (7 x 100,000) + (0 x 10,000) + (5 x 1,000) + (3 x 100) + (0 x 10) + (0 x 1)",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Ang Pagdaragdag sa Pang-araw-araw na Buhay",
                aralin2_p1: "Sa pagdaragdag, ang mga bilang na idadagdag ay tinatawag na <b>addend</b>, at ang sagot ay <b>kabuuan</b>.",
                aralin2_h3_1: "Pagdaragdag Nang Walang Pagpapangkat",
                aralin2_p2: "Ang maikling pamamaraan (short method) ay mas mabilis gamitin:",
                aralin2_ol1: "Isulat ang mga addend sa anyong <b>nakahanay</b> (place value sa place value).",
                aralin2_ol2: "Ipagdagdag simula sa <b>tig-iisa</b> (ones), isusunod ang tig-sasampu (tens), at iba pa.",
                aralin2_ex1_q: "HALIMBAWA: 250 + 136",
                aralin2_ex1_math: '\r\n  250\r\n+ 136\r\n-----\r\n  <b>386</b>',
                aralin2_ex1_l1: "(Addend)",
                aralin2_ex1_l2: "(Addend)",
                aralin2_ex1_l3: "(Kabuuan)",
                aralin2_h3_2: "Pagdaragdag Nang May Pagpapangkat (Regrouping)",
                aralin2_p3: "Ginagamit ang <b>pagpapangkat</b> (carrying/regrouping) kapag ang kabuuan ng mga tambilang sa isang place value ay 10 o mas mataas.",
                aralin2_ex2_q: "HALIMBAWA: 478 + 735",
                aralin2_ex2_math: '\r\n    1 1\r\n  478\r\n+ 735\r\n-----\r\n <b>1213</b>',
                aralin2_ex2_l1: "(Carries)",
                aralin2_ul1: "<b>Tig-iisa:</b> 8 + 5 = 13. Isulat ang 3, i-carry ang 1 sa tig-sasampu.",
                aralin2_ul2: "<b>Tig-sasampu:</b> 1 + 7 + 3 = 11. Isulat ang 1, i-carry ang 1 sa tig-iisang daan.",
                aralin2_ul3: "<b>Tig-iisang Daan:</b> 1 + 4 + 7 = 12. Isulat ang 12.",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Ang Pagbabawas sa Pang-araw-araw na Buhay",
                aralin3_p1: "Sa pagbabawas, ang bilang na babawasan ay <b>minuend</b>, ang ibabawas ay <b>subtrahend</b>, at ang sagot ay <b>difference</b>. Tandaan: <b>Ang minuend ay laging mas malaki kaysa sa subtrahend.</b>",
                aralin3_h3_1: "Pagbabawas Nang Walang Pagpapangkat",
                aralin3_p2: "Ihanay ang mga bilang at magbawas simula sa tig-iisa papunta sa kaliwa.",
                aralin3_ex1_q: "HALIMBAWA: 544 - 320",
                aralin3_ex1_math: '\r\n  544\r\n- 320\r\n-----\r\n  <b>224</b>',
                aralin3_ex1_l1: "(Minuend)",
                aralin3_ex1_l2: "(Subtrahend)",
                aralin3_ex1_l3: "(Difference)",
                aralin3_h3_2: "Pagbabawas Nang May Pagpapangkat (Regrouping/Borrowing)",
                aralin3_p3: "Ginagawa ang <b>pagpapangkat</b> kapag ang tambilang sa minuend ay mas maliit kaysa sa tambilang sa subtrahend sa parehong place value. Kailangang <b>manghiram</b> (borrow) mula sa katabing kaliwang tambilang.",
                aralin3_ex2_q: "HALIMBAWA: 935 - 478",
                aralin3_ex2_math: '\r\n  <span class="text-gray-900">8 12 15</span>\r\n  9 3 5\r\n- 4 7 8\r\n-------\r\n  <b>457</b>',
                aralin3_ex2_l1: "(Regrouped values)",
                aralin3_ex2_a: "Ang sagot ay <b>457</b>. Maaari mong iwasto ang sagot sa pamamagitan ng pagdaragdag: <b>457 + 478 = 935</b>.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Subukan ang iyong kaalaman sa Place Value, Pagdaragdag, at Pagbabawas ng Buong Bilang. (Ilagay ang sagot na may tamang format, hal. <b>P125</b> para sa salapi)",
                quiz_section_a: "A. Place Value at Bilang",
                qa1_label: "1. Ilang tambilang mayroon ang bilang na 987,654?",
                qa2_label: "2. Ano ang halaga ng 5 sa 65,725?",
                qa1_placeholder: "Bilang",
                qa2_placeholder: "Halaga (e.g., 5000)",
                quiz_section_b: "B. Pagdaragdag (Ibigay ang Kabuuan)",
                qb1_label: "1. Nagbayad sina Jessie (P9) at Jamie (P18) sa bus. Kabuuang bayad?",
                qb2_label: "2. Tubo: P100 (Ina), P150 (Ama), P200 (Lolo/Lola). Kabuuang tubo?",
                qb1_placeholder: "Kabuuan (P)",
                qb2_placeholder: "Kabuuan (P)",
                quiz_section_c: "C. Pagbabawas (Ibigay ang Difference)",
                qc1_label: "1. 17 aklat, humiram ng 8. Ilan ang natira?",
                qc2_label: "2. May P500 si Kiko, ginastos ang P375. Magkano ang natira?",
                qc1_placeholder: "Natira (Aklat)",
                qc2_placeholder: "Natira (P)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang aritmetika ng buong bilang!`,
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


        // Utility function to check and standardize input (similar to decimal_module but for whole numbers)
        function standardizeInput(value, isCurrency = false) {
            if (typeof value !== 'string') value = String(value);
            value = value.trim().replace(/\s/g, '').replace(/,/g, ''); // Remove spaces and commas
            
            if (isCurrency) {
                value = value.replace(/^[Pp]/, ''); // Remove 'P' or 'p'
                // Ensure currency is treated as whole numbers (since it's only whole peso values in the answers)
                const parsedValue = parseFloat(value);
                if (isNaN(parsedValue)) return value;
                return String(Math.round(parsedValue)); 
            } else {
                // General whole number or quantity
                // Remove unit labels for comparison (e.g., 'Aklat', 'Books')
                value = value.replace(/aklat|tambilang|halaga|books|number|value/gi, '').trim();
                const parsedValue = parseFloat(value);
                if (isNaN(parsedValue)) return value;
                return String(Math.round(parsedValue));
            }
        }

        // Function to check a general numeric input
        function checkInput(id, expected, isCurrency = false) {
            const input = document.getElementById(id);
            let value = standardizeInput(input.value, isCurrency);
            let expectedValue = standardizeInput(String(expected), isCurrency);

            let isCorrect = (value === expectedValue);
            let correctCountRef = 0;

            input.classList.remove('correct-answer', 'incorrect-answer');
            
            if (isCorrect) {
                correctCountRef = 1;
                input.classList.add('correct-answer');
            } else if (input.value.trim().length > 0) {
                input.classList.add('incorrect-answer');
            }
            return correctCountRef;
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
                qa1: 6,      // 987,654 has 6 digits
                qa2: 5000,   // Value of 5 in 65,725 is 5,000 (Tig-iisang Libo)
                qb1: 27,     // P9 + P18 = P27 (Currency)
                qb2: 450,    // P100 + P150 + P200 = P450 (Currency)
                qc1: 9,      // 17 - 8 = 9 (Quantity)
                qc2: 125,    // P500 - P375 = P125 (Currency)
            };

            if (!isLanguageToggle) {
                // Run checks only on button click, not language toggle
                correctCount += checkInput('qa1', answers.qa1, false);
                correctCount += checkInput('qa2', answers.qa2, false);
                correctCount += checkInput('qb1', answers.qb1, true); // True for currency
                correctCount += checkInput('qb2', answers.qb2, true); // True for currency
                correctCount += checkInput('qc1', answers.qc1, false);
                correctCount += checkInput('qc2', answers.qc2, true); // True for currency

                // Store the current score to maintain state across language toggles
                resultsDiv.setAttribute('data-current-score', correctCount);
            } else {
                 // If it's a language toggle, retrieve the score
                 correctCount = parseInt(resultsDiv.getAttribute('data-current-score')) || 0;
            }


            // Display results using translated messages
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
            } else if (correctCount >= totalQuestions / 2) {
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
        
        document.getElementById('whole-number-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); // Run scoring logic
        });
    </script>
</body>
</html>
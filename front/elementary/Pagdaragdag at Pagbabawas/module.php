<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagdaragdag at Pagbabawas</title>
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
        @media (min-width: 640px) {
            .quiz-input {
                width: 4rem; /* Adjusted for smaller number inputs like comparison */
            }
        }
        .quiz-input:focus {
            border-color: #059669;
            outline: none;
        }
        
        /* Table styles (ensuring 20px font) - NOT APPLICABLE IN THIS MODULE BUT KEPT FOR CONSISTENCY */
        .conversion-table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
            text-align: center;
        }
        .conversion-table th, .conversion-table td {
            border: 1px solid #d1d5db;
            padding: 0.75rem;
            font-size: 1.25rem; /* 20px */
        }
        .conversion-table th {
            background-color: #e5e7eb;
            font-weight: 600;
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
        .latex-display {
            display: block;
            margin: 1.5rem 0;
            padding: 0.75rem;
            text-align: center;
            font-size: 1.25rem;
            font-weight: bold;
            color: #059669; /* Green 600 */
            background-color: #ecfdf5; /* Green 50 */
            border-radius: 0.5rem;
            border: 1px dashed #a7f3d0;
        }
        .content-box pre {
            font-size: 1.25rem; /* 20px */
        }
        /* Radio button styles for correctness feedback */
        .radio-choice {
            font-size: 1.25rem; /* 20px */
            /* PADDING (p-1) for spacing around the input and text */
            padding: 0.25rem 0.5rem; 
        }
        .radio-choice.correct-border {
            border: 2px solid #10b981;
            background-color: #ecfdf5;
            border-radius: 0.375rem;
        }
        .radio-choice.incorrect-border {
            border: 2px solid #ef4444;
            background-color: #fef2f2;
            border-radius: 0.375rem;
        }
        .radio-choice input[type="radio"] {
            /* Added margin-right to separate radio from text */
            margin-right: 0.75rem; 
            /* REVERTED size to 1rem (16px) for smaller appearance */
            width: 1rem; 
            height: 1rem;
        }
        
        /* Custom CSS to make the entire NAV sticky */
        #outline-nav .sticky-container {
            position: sticky;
            top: 1rem; /* Adjust this value as needed, 1rem (16px) is usually good */
        }

    </style>
</head>
<body class="p-4 sm:p-8 lg:p-20">

    <!-- MAIN GRID CONTAINER -->
    <div class="mx-auto lg:grid lg:grid-cols-12 lg:gap-8">
        
        <!-- LEFT OUTLINE (Table of Contents) -->
        <nav id="outline-nav" class="lg:block lg:col-span-3 mb-8 lg:mb-0">
            
            <!-- STICKY WRAPPER: Contains all elements that need to stick to the top -->
            <div class="sticky-container space-y-4">
            
                <!-- 1. Go Back to Modules (Bumalik sa Modyul) - FIRST POSITION -->
                <a href="http://localhost/als/front/modules.php" id="back-to-modules" 
                   class="w-full flex items-center text-base text-gray-600 hover:text-green-700 transition duration-150 p-4 rounded-xl bg-white shadow-lg border border-gray-200 hover:bg-gray-50 font-normal">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    <!-- UPDATED: Added data-i18n -->
                    <span data-i18n="back_to_modules">Go Back to Modules</span>
                </a>
            
                <!-- 2. OUTLINE (Balangkas ng Modyul) - SECOND POSITION -->
                <div id="outline" class="p-4 space-y-2 bg-white rounded-xl shadow-lg border border-green-100">
                    
                    <!-- Outline Header: Title only -->
                    <div class="border-b pb-2 mb-2">
                        <!-- UPDATED: Added data-i18n -->
                        <h3 class="text-lg font-bold text-green-700" data-i18n="outline_title">Module Outline</h3>
                    </div>
                    
                    <a href="#objectives" class="outline-link" data-i18n="outline_objectives">Objectives</a>
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Reading and Writing Numbers</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Addition</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Subtraction</a>
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

        <!-- MAIN CONTENT AREA -->
        <main class="lg:col-span-9">
            <div id="main-content-wrapper" class="bg-white p-6 sm:p-10 rounded-2xl shadow-2xl border-t-4 border-l-4 border-green-600">
                
                <!-- Header Section -->
                <header class="text-center mb-10">
                    <!-- UPDATED: Meta Text -->
                    <span class="text-xs font-semibold uppercase tracking-wider text-green-600 bg-green-100 px-3 py-1 rounded-full" data-i18n="meta_text">Lower Elementary Learning Module Sheet</span>
                    <!-- UPDATED: Added data-i18n -->
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Addition and Subtraction</h1>
                    <p class="mt-4 text-gray-600 italic" data-i18n="h1_subtitle">Numbers are part of our daily lives. This will help you become proficient in using numbers.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <!-- UPDATED: Added data-i18n -->
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <!-- UPDATED: Added data-i18n -->
                        <li data-i18n="obj_1">State the difference between a digit and a number;</li>
                        <li data-i18n="obj_2">Determine the place value of a digit in a given number;</li>
                        <li data-i18n="obj_3">Express the relationship between numbers;</li>
                        <li data-i18n="obj_4">Perform addition of whole numbers (whole numbers) up to three digits;</li>
                        <li data-i18n="obj_5">Perform subtraction of whole numbers up to three digits; and</li>
                        <li data-i18n="obj_6">Solve problems involving addition and subtraction.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">
                    
                    <!-- ARALIN 1: PAGBASA AT PAGSULAT NG MGA BILANG -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <!-- UPDATED: Added data-i18n -->
                            <span data-i18n="aralin1_title">Lesson 1: Reading and Writing Numbers</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <!-- UPDATED: Added data-i18n -->
                            <p data-i18n="aralin1_p1">Everyone shops. We pay for the goods and services provided to us. Prices are expressed using numbers. Do you know the terms "how many" and "how much?" Numbers are used for many things. We see them inside passenger jeeps, in the market, at work, and even at home.</p>

                            <!-- UPDATED: Added data-i18n -->
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Reading and Writing Digits and Numbers</h3>
                            
                            <!-- UPDATED: Added data-i18n -->
                            <p data-i18n="aralin1_p2">The ten symbols we use for numbers or counting are: <strong class="highlighted-number">0, 1, 2, 3, 4, 5, 6, 7, 8, and 9</strong>. These symbols are called <b>digits</b>. Numbers are made up of digits. For example, in the number <strong class="highlighted-number">349</strong>, the digits are 3, 4, and 9.</p>
                                <br>
                            <!-- UPDATED: Added data-i18n -->
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Place Value Numeration System</h3>
                            
                            <!-- UPDATED: Added data-i18n -->
                            <p data-i18n="aralin1_p3">The value of a digit is based on its position in the number. Therefore, our method of writing numbers is called the <b>place value numeration system</b>.</p>
                            
                            <div class="example-box">
                                <!-- UPDATED: Added data-i18n -->
                                <p class="font-bold" data-i18n="aralin1_ex1_q">Example: Number 543</p>
                                <ul class="list-disc list-inside ml-4">
                                    <!-- UPDATED: Added data-i18n -->
                                    <li data-i18n="aralin1_ex1_l1">The digit <strong class="highlighted-number">5</strong> is in the <b>Hundreds</b> place, so its value is <b>five hundred (500)</b>.</li>
                                    <li data-i18n="aralin1_ex1_l2">The digit <strong class="highlighted-number">4</strong> is in the <b>Tens</b> place, so its value is <b>forty (40)</b>.</li>
                                    <li data-i18n="aralin1_ex1_l3">The digit <strong class="highlighted-number">3</strong> is in the <b>Ones</b> place, so its value is <b>three (3)</b>.</li>
                                </ul>
                                <!-- UPDATED: Added data-i18n -->
                                <p class="mt-2 italic" data-i18n="aralin1_ex1_note">It is read as: Five hundred forty-three.</p>
                            </div>

                            <!-- UPDATED: Added data-i18n -->
                            <p data-i18n="aralin1_p4">If there is no digit in a place value position, we use <strong class="highlighted-number">0</strong>. <b>Zero</b> is a <b>place holder</b>. For example, <strong class="highlighted-number">109</strong> is composed of 1 in the Hundreds, 0 in the Tens, and 9 in the Ones.</p>
                                <br>
                            <!-- UPDATED: Added data-i18n -->
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Relationship of Numbers</h3>

                            <!-- UPDATED: Added data-i18n -->
                            <p>Ang isang bilang ay maaaring mas kaunti, mas higit, o katumbas ng isa pang bilang.</p>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <!-- UPDATED: Added data-i18n -->
                                <li data-i18n="aralin1_l4_gt"><b>Greater Than</b> (<span class="text-gray-900 font-bold text-lg"> > </span>): If the first number is larger or has a higher value.
                                    <div class="latex-display"> <b>819 > 807</b> </div>
                                </li>
                                <!-- UPDATED: Added data-i18n -->
                                <li data-i18n="aralin1_l5_lt"><b>Less Than</b> (<span class="text-gray-900 font-bold text-lg"> < </span>): If the first number is smaller or has a lower value.
                                    <div class="latex-display"> <b>725 < 983</b> </div>
                                </li>
                                <!-- UPDATED: Added data-i18n -->
                                <li data-i18n="aralin1_l6_eq"><b>Equal to</b> (<span class="text-gray-900 font-bold text-lg"> = </span>): If the two numbers have the same value.
                                    <div class="latex-display"> <b>615 = 615</b> </div>
                                </li>
                            </ul>
                        </div>
                    </details>

                    <!-- ARALIN 2: PAGDARAGDAG -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <!-- UPDATED: Added data-i18n -->
                            <span data-i18n="aralin2_title">Lesson 2: Addition</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <!-- UPDATED: Added data-i18n -->
                            <p data-i18n="aralin2_p1"><b>Addition</b> is a method of combining two or more numbers to get another number (sum) that is equal to the combined numbers.</p>

                            <!-- UPDATED: Added data-i18n -->
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Terms in Addition</h3>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <!-- UPDATED: Added data-i18n -->
                                <li data-i18n="aralin2_l1"><b>Addends:</b> The numbers being added.</li>
                                <li data-i18n="aralin2_l2"><b>Addition Sign:</b> <span class="font-mono text-xl text-gray-900">+</span>.</li>
                                <li data-i18n="aralin2_l3"><b>Sum:</b> The number obtained after adding the addends. It is always greater than any of the addends.</li>
                            </ul>
                            <div class="latex-display"> <b>37</b> (addend) + <b>19</b> (addend) + <b>28</b> (addend) = <b>84</b> (sum) </div>
                                <br>
                            <!-- UPDATED: Added data-i18n -->
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Method of Addition (Short Method)</h3>
                            
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <!-- UPDATED: Added data-i18n -->
                                <li data-i18n="aralin2_ol1">Write the addends and ensure that digits with the same place value are aligned.</li>
                                <li data-i18n="aralin2_ol2">First, add the numbers in the <b>Ones</b> column.</li>
                                <li data-i18n="aralin2_ol3"><b>Carry</b> the tens to the next column (Tens column).</li>
                                <li data-i18n="aralin2_ol4">Add all the digits in the <b>Tens</b> column, including the carried number.</li>
                                <li data-i18n="aralin2_ol5"><b>Carry</b> the hundreds to the Hundreds column.</li>
                                <li data-i18n="aralin2_ol6">Add the digits in the <b>Hundreds</b> column to get the final sum.</li>
                            </ol>
                            
                            <div class="example-box">
                                <!-- UPDATED: Added data-i18n -->
                                <p class="font-bold" data-i18n="aralin2_ex1_q">Example: Find the sum of 147 + 219 + 38</p>
                                <!-- UPDATED: Added data-i18n -->
                                <pre class="whitespace-pre-wrap font-mono mt-2" data-i18n="aralin2_ex1_pre">
  <span class="text-gray-900">12</span> (Carry)
  147
  219
+  38
-----
  <strong class="highlighted-number">404</strong>
                                </pre>
                                <!-- UPDATED: Added data-i18n -->
                                <p class="mt-2 italic" data-i18n="aralin2_ex1_note">The sum is <strong class="highlighted-number">404</strong>.</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 3: PAGBABAWAS -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <!-- UPDATED: Added data-i18n -->
                            <span data-i18n="aralin3_title">Lesson 3: Subtraction</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <!-- UPDATED: Added data-i18n -->
                            <p data-i18n="aralin3_p1"><b>Subtraction</b> is an operation or method of taking a number away from a larger number.</p>

                            <!-- UPDATED: Added data-i18n -->
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Terms in Subtraction</h3>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <!-- UPDATED: Added data-i18n -->
                                <li data-i18n="aralin3_l1"><b>Minuend:</b> The number from which another number is subtracted (the larger number).</li>
                                <li data-i18n="aralin3_l2"><b>Subtrahend:</b> The number being taken away from the minuend.</li>
                                <li data-i18n="aralin3_l3"><b>Subtraction Sign:</b> <span class="font-mono text-xl text-gray-900">-</span>.</li>
                                <li data-i18n="aralin3_l4"><b>Difference:</b> The number obtained after subtraction. It is always smaller than the minuend.</li>
                            </ul>
                            <div class="latex-display"> <b>50</b> (minuend) - <b>14</b> (subtrahend) = <b>36</b> (difference) </div>
                                <br>
                            <!-- UPDATED: Added data-i18n -->
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">Method of Subtraction (with Borrowing)</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <!-- UPDATED: Added data-i18n -->
                                <li data-i18n="aralin3_ol1">Ensure that the digits are aligned according to place value. Start in the <b>Ones</b> column.</li>
                                <li data-i18n="aralin3_ol2">If the digit in the minuend is smaller than the subtrahend (e.g., $0-4$), you need to <b>borrow ten</b> from the adjacent Tens column.</li>
                                <li data-i18n="aralin3_ol3">You subtract <strong class="highlighted-number">1</strong> (ten) from the minuend's Tens column and add it as <strong class="highlighted-number">10</strong> to the Ones column.</li>
                                <li data-i18n="aralin3_ol4">After subtracting in the Ones column, proceed to the Tens column (don't forget to subtract the borrowed ten).</li>
                                <li data-i18n="aralin3_ol5">Continue the process in the Hundreds column.</li>
                            </ol>
                            
                            <div class="example-box">
                                <!-- UPDATED: Added data-i18n -->
                                <p class="font-bold" data-i18n="aralin3_ex1_q">Example: 50 - 14</p>
                                <!-- UPDATED: Added data-i18n -->
                                <pre class="whitespace-pre-wrap font-mono mt-2" data-i18n="aralin3_ex1_pre">
   <span class="text-gray-900">4 10</span> (5 becomes 4, 0 becomes 10)
    50
-   14
------
    <strong class="highlighted-number">36</strong>
                                </pre>
                                <!-- UPDATED: Added data-i18n -->
                                <p class="mt-2 italic" data-i18n="aralin3_ex1_note">The difference is <strong class="highlighted-number">36</strong>.</p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Added data-i18n -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Test your knowledge of reading, addition, and subtraction.</p>

                    <form id="math-quiz-form" class="space-y-6">

                        <!-- SECTION A: Tambilang and Place Value (Multiple Choice) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <!-- UPDATED: Added data-i18n -->
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Digit and Place Value (Choose the correct answer)</p>
                            <div class="space-y-4">
                                <!-- Q1: Ilang tambilang -->
                                <div id="q_qa1">
                                    <!-- UPDATED: Added data-i18n -->
                                    <label class="block mb-1 font-medium" data-i18n="qa1_label">1. How many digits are in the number 917?</label>
                                    <div class="flex flex-col space-y-2">
                                        <label class="radio-choice" for="qa1_2"><input type="radio" id="qa1_2" name="qa1" value="2">2</label>
                                        <label class="radio-choice" for="qa1_3"><input type="radio" id="qa1_3" name="qa1" value="3">3</label>
                                        <label class="radio-choice" for="qa1_4"><input type="radio" id="qa1_4" name="qa1" value="4">4</label>
                                        <label class="radio-choice" for="qa1_5"><input type="radio" id="qa1_5" name="qa1" value="5">5</label>
                                    </div>
                                </div>
                                
                                <!-- Q2: Place value (Tig-iisang daan) -->
                                <div id="q_qa2">
                                    <!-- UPDATED: Added data-i18n -->
                                    <label class="block mb-1 font-medium" data-i18n="qa2_label">2. What is the place value of <b>4</b> in the number 406?</label>
                                    <div class="flex flex-col space-y-2">
                                        <!-- UPDATED: Added data-i18n -->
                                        <label class="radio-choice" for="qa2_iisa"><input type="radio" id="qa2_iisa" name="qa2" value="tig-iisa"><span data-i18n="qa2_iisa_val">Ones</span></label>
                                        <label class="radio-choice" for="qa2_sasampu"><input type="radio" id="qa2_sasampu" name="qa2" value="tig-sasampu"><span data-i18n="qa2_sasampu_val">Tens</span></label>
                                        <label class="radio-choice" for="qa2_daan"><input type="radio" id="qa2_daan" name="qa2" value="tig-iisang daan"><span data-i18n="qa2_daan_val">Hundreds</span></label>
                                        <label class="radio-choice" for="qa2_wala"><input type="radio" id="qa2_wala" name="qa2" value="wala"><span data-i18n="qa2_wala_val">None</span></label>
                                    </div>
                                </div>

                                <!-- Q3: Place value (Tig-sasampu) -->
                                <div id="q_qa3">
                                    <!-- UPDATED: Added data-i18n -->
                                    <label class="block mb-1 font-medium" data-i18n="qa3_label">3. What is the place value of <b>4</b> in the number 849?</label>
                                    <div class="flex flex-col space-y-2">
                                        <!-- UPDATED: Reused i18n keys for values -->
                                        <label class="radio-choice" for="qa3_iisa"><input type="radio" id="qa3_iisa" name="qa3" value="tig-iisa"><span data-i18n="qa2_iisa_val">Ones</span></label>
                                        <label class="radio-choice" for="qa3_sasampu"><input type="radio" id="qa3_sasampu" name="qa3" value="tig-sasampu"><span data-i18n="qa2_sasampu_val">Tens</span></label>
                                        <label class="radio-choice" for="qa3_daan"><input type="radio" id="qa3_daan" name="qa3" value="tig-iisang daan"><span data-i18n="qa2_daan_val">Hundreds</span></label>
                                        <label class="radio-choice" for="qa3_wala"><input type="radio" id="qa3_wala" name="qa3" value="wala"><span data-i18n="qa2_wala_val">None</span></label>
                                    </div>
                                </div>
                                
                                <!-- Q4: Isulat ang simbolo -->
                                <div id="q_qa4">
                                    <!-- UPDATED: Added data-i18n -->
                                    <label class="block mb-1 font-medium" data-i18n="qa4_label">4. Write in symbols: <b>Four hundred twenty</b></label>
                                    <div class="flex flex-col space-y-2">
                                        <label class="radio-choice" for="qa4_402"><input type="radio" id="qa4_402" name="qa4" value="402">402</label>
                                        <label class="radio-choice" for="qa4_420"><input type="radio" id="qa4_420" name="qa4" value="420">420</label>
                                        <label class="radio-choice" for="qa4_240"><input type="radio" id="qa4_240" name="qa4" value="240">240</label>
                                        <label class="radio-choice" for="qa4_42"><input type="radio" id="qa4_42" name="qa4" value="42">42</label>
                                    </div>
                                </div>
                                
                                <!-- Q5: Isulat ang simbolo -->
                                <div id="q_qa5">
                                    <!-- UPDATED: Added data-i18n -->
                                    <label class="block mb-1 font-medium" data-i18n="qa5_label">5. Write in symbols: <b>Seven hundred ninety</b></label>
                                    <div class="flex flex-col space-y-2">
                                        <label class="radio-choice" for="qa5_709"><input type="radio" id="qa5_709" name="qa5" value="709">709</label>
                                        <label class="radio-choice" for="qa5_970"><input type="radio" id="qa5_970" name="qa5" value="970">970</label>
                                        <label class="radio-choice" for="qa5_790"><input type="radio" id="qa5_790" name="qa5" value="790">790</label>
                                        <label class="radio-choice" for="qa5_79"><input type="radio" id="qa5_79" name="qa5" value="79">79</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section B: Comparison (Paghambing) - Input width adjusted for 20px font size -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <!-- UPDATED: Added data-i18n -->
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Comparison (Use >, <, or =)</p>
                            <div class="space-y-4">
                                <div class="flex items-center space-x-2">
                                    <span class="text-xl" data-i18n="qb1_label">1. 10</span>
                                    <input type="text" id="q1" class="quiz-input w-24 text-center" maxlength="1" placeholder="?">
                                    <span class="text-xl">19</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-xl" data-i18n="qb2_label">2. 76</span>
                                    <input type="text" id="q2" class="quiz-input w-24 text-center" maxlength="1" placeholder="?">
                                    <span class="text-xl">76</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-xl" data-i18n="qb3_label">3. 84</span>
                                    <input type="text" id="q3" class="quiz-input w-24 text-center" maxlength="1" placeholder="?">
                                    <span class="text-xl">64</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-xl" data-i18n="qb4_label">4. 55</span>
                                    <input type="text" id="q4" class="quiz-input w-24 text-center" maxlength="1" placeholder="?">
                                    <span class="text-xl">41</span>
                                </div>
                            </div>
                        </div>

                        <!-- Section C: Addition and Subtraction (Pagdaragdag at Pagbabawas) - Input width adjusted for 20px font size -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <!-- UPDATED: Added data-i18n -->
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_c">C. Addition and Subtraction (Provide the answer)</p>
                            <div class="space-y-4">
                                <div class="flex items-center space-x-2">
                                    <!-- UPDATED: Added data-i18n and simplified label structure -->
                                    <label for="q5" data-i18n="qc1_label">1. 18 + 1 =</label>
                                    <input type="number" id="q5" class="quiz-input w-24 text-center" placeholder="Answer">
                                </div>
                                <div class="flex items-center space-x-2">
                                    <label for="q6" data-i18n="qc2_label">2. 7 + 6 =</label>
                                    <input type="number" id="q6" class="quiz-input w-24 text-center" placeholder="Answer">
                                </div>
                                <div class="flex items-center space-x-2">
                                    <label for="q7" data-i18n="qc3_label">3. 12 - 0 =</label>
                                    <input type="number" id="q7" class="quiz-input w-24 text-center" placeholder="Answer">
                                </div>
                                <div class="flex items-center space-x-2">
                                    <label for="q8" data-i18n="qc4_label">4. 13 - 6 =</label>
                                    <input type="number" id="q8" class="quiz-input w-24 text-center" placeholder="Answer">
                                </div>
                                <div class="flex items-center space-x-2">
                                    <label for="q9" data-i18n="qc5_label">5. 17 - 9 =</label>
                                    <input type="number" id="q9" class="quiz-input w-24 text-center" placeholder="Answer">
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
                outline_aralin1: "Lesson 1: Reading and Writing Numbers",
                outline_aralin2: "Lesson 2: Addition",
                outline_aralin3: "Lesson 3: Subtraction",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Lower Elementary Learning Module Sheet",
                h1_title: "Addition and Subtraction",
                h1_subtitle: "Numbers are part of our daily lives. This will help you become proficient in using numbers.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "State the difference between a digit and a number;",
                obj_2: "Determine the place value of a digit in a given number;",
                obj_3: "Express the relationship between numbers;",
                obj_4: "Perform addition of whole numbers (whole numbers) up to three digits;",
                obj_5: "Perform subtraction of whole numbers up to three digits; and",
                obj_6: "Solve problems involving addition and subtraction.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Reading and Writing Numbers",
                aralin1_p1: "Everyone shops. We pay for the goods and services provided to us. Prices are expressed using numbers. Do you know the terms \"how many\" and \"how much?\" Numbers are used for many things. We see them inside passenger jeeps, in the market, at work, and even at home.",
                aralin1_h3_1: "Reading and Writing Digits and Numbers",
                aralin1_p2: "The ten symbols we use for numbers or counting are: <strong class=\"highlighted-number\">0, 1, 2, 3, 4, 5, 6, 7, 8, and 9</strong>. These symbols are called <b>digits</b>. Numbers are made up of digits. For example, in the number <strong class=\"highlighted-number\">349</strong>, the digits are 3, 4, and 9.",
                aralin1_h3_2: "Place Value Numeration System",
                aralin1_p3: "The value of a digit is based on its position in the number. Therefore, our method of writing numbers is called the <b>place value numeration system</b>.",
                aralin1_ex1_q: "Example: Number 543",
                aralin1_ex1_l1: "The digit <strong class=\"highlighted-number\">5</strong> is in the <b>Hundreds</b> place, so its value is <b>five hundred (500)</b>.",
                aralin1_ex1_l2: "The digit <strong class=\"highlighted-number\">4</strong> is in the <b>Tens</b> place, so its value is <b>forty (40)</b>.",
                aralin1_ex1_l3: "The digit <strong class=\"highlighted-number\">3</strong> is in the <b>Ones</b> place, so its value is <b>three (3)</b>.",
                aralin1_ex1_note: "It is read as: Five hundred forty-three.",
                aralin1_p4: "If there is no digit in a place value position, we use <strong class=\"highlighted-number\">0</strong>. <b>Zero</b> is a <b>place holder</b>. For example, <strong class=\"highlighted-number\">109</strong> is composed of 1 in the Hundreds, 0 in the Tens, and 9 in the Ones.",
                aralin1_h3_3: "Relationship of Numbers",
                aralin1_l4_gt: "<b>Greater Than</b> (<span class=\"text-gray-900 font-bold text-lg\"> > </span>): If the first number is larger or has a higher value.",
                aralin1_l5_lt: "<b>Less Than</b> (<span class=\"text-gray-900 font-bold text-lg\"> < </span>): If the first number is smaller or has a lower value.",
                aralin1_l6_eq: "<b>Equal to</b> (<span class=\"text-gray-900 font-bold text-lg\"> = </span>): If the two numbers have the same value.",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Addition",
                aralin2_p1: "<b>Addition</b> is a method of combining two or more numbers to get another number (sum) that is equal to the combined numbers.",
                aralin2_h3_1: "Terms in Addition",
                aralin2_l1: "<b>Addends:</b> The numbers being added.",
                aralin2_l2: "<b>Addition Sign:</b> <span class=\"font-mono text-xl text-gray-900\">+</span>.",
                aralin2_l3: "<b>Sum:</b> The number obtained after adding the addends. It is always greater than any of the addends.",
                aralin2_h3_2: "Method of Addition (Short Method)",
                aralin2_ol1: "Write the addends and ensure that digits with the same place value are aligned.",
                aralin2_ol2: "First, add the numbers in the <b>Ones</b> column.",
                aralin2_ol3: "<b>Carry</b> the tens to the next column (Tens column).",
                aralin2_ol4: "Add all the digits in the <b>Tens</b> column, including the carried number.",
                aralin2_ol5: "<b>Carry</b> the hundreds to the Hundreds column.",
                aralin2_ol6: "Add the digits in the <b>Hundreds</b> column to get the final sum.",
                aralin2_ex1_q: "Example: Find the sum of 147 + 219 + 38",
                aralin2_ex1_pre: "  <span class=\"text-gray-900\">12</span> (Carry)\n  147\n  219\n+  38\n-----\n  <strong class=\"highlighted-number\">404</strong>",
                aralin2_ex1_note: "The sum is <strong class=\"highlighted-number\">404</strong>.",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Subtraction",
                aralin3_p1: "<b>Subtraction</b> is an operation or method of taking a number away from a larger number.",
                aralin3_h3_1: "Terms in Subtraction",
                aralin3_l1: "<b>Minuend:</b> The number from which another number is subtracted (the larger number).",
                aralin3_l2: "<b>Subtrahend:</b> The number being taken away from the minuend.",
                aralin3_l3: "<b>Subtraction Sign:</b> <span class=\"font-mono text-xl text-gray-900\">-</span>.",
                aralin3_l4: "<b>Difference:</b> The number obtained after subtraction. It is always smaller than the minuend.",
                aralin3_h3_2: "Method of Subtraction (with Borrowing)",
                aralin3_ol1: "Ensure that the digits are aligned according to place value. Start in the <b>Ones</b> column.",
                aralin3_ol2: "If the digit in the minuend is smaller than the subtrahend (e.g., $0-4$), you need to <b>borrow ten</b> from the adjacent Tens column.",
                aralin3_ol3: "You subtract <strong class=\"highlighted-number\">1</strong> (ten) from the minuend's Tens column and add it as <strong class=\"highlighted-number\">10</strong> to the Ones column.",
                aralin3_ol4: "After subtracting in the Ones column, proceed to the Tens column (don't forget to subtract the borrowed ten).",
                aralin3_ol5: "Continue the process in the Hundreds column.",
                aralin3_ex1_q: "Example: 50 - 14",
                aralin3_ex1_pre: "  <span class=\"text-gray-900\">4 10</span> (5 becomes 4, 0 becomes 10)\n    50\n-   14\n------\n    <strong class=\"highlighted-number\">36</strong>",
                aralin3_ex1_note: "The difference is <strong class=\"highlighted-number\">36</strong>.",
                
                // Quiz Labels
                quiz_title: "Practice",
                quiz_subtitle: "Test your knowledge of reading, addition, and subtraction.",
                quiz_section_a: "A. Digit and Place Value (Choose the correct answer)",
                qa1_label: "1. How many digits are in the number 917?",
                qa2_label: "2. What is the place value of <b>4</b> in the number 406?",
                qa2_iisa_val: "Ones",
                qa2_sasampu_val: "Tens",
                qa2_daan_val: "Hundreds",
                qa2_wala_val: "None",
                qa3_label: "3. What is the place value of <b>4</b> in the number 849?",
                qa4_label: "4. Write in symbols: <b>Four hundred twenty</b>",
                qa5_label: "5. Write in symbols: <b>Seven hundred ninety</b>",
                quiz_section_b: "B. Comparison (Use >, <, or =)",
                qb1_label: "1. 10",
                qb2_label: "2. 76",
                qb3_label: "3. 84",
                qb4_label: "4. 55",
                quiz_section_c: "C. Addition and Subtraction (Provide the answer)",
                qc1_label: "1. 18 + 1 =",
                qc2_label: "2. 7 + 6 =",
                qc3_label: "3. 12 - 0 =",
                qc4_label: "4. 13 - 6 =",
                qc5_label: "5. 17 - 9 =",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}).`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score} out of ${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score} out of ${total} (${percentage}%). Read Lessons 1-3 again.`,

            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_tl: "Switch to: Tagalog", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pagbasa at Pagsulat",
                outline_aralin2: "Aralin 2: Pagdaragdag",
                outline_aralin3: "Aralin 3: Pagbabawas",
                outline_quiz: "Pagsasanay",
                
                // Main Content Titles
                meta_text: "Pang-elementaryang Modyul para sa Mababang Antas",
                h1_title: "Pagdaragdag at Pagbabawas",
                h1_subtitle: "Ang mga bilang ay bahagi ng ating pang-araw-araw na pamumuhay. Tutulungan ka nito na maging bihasa sa paggamit ng mga bilang.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",

                // Objectives
                obj_1: "Masabi ang pagkakaiba ng isang tambilang sa isang bilang;",
                obj_2: "Matukoy ang place value ng isang tambilang sa ibinigay na bilang;",
                obj_3: "Maipahayag ang mga kaugnayan ng mga bilang;",
                obj_4: "Maisagawa ang pagdaragdag ng mga buong bilang (whole numbers) hanggang sa tatlong tambilang;",
                obj_5: "Maisagawa ang pagbabawas ng mga buong bilang hanggang sa tatlong tambilang; at",
                obj_6: "Malutas ang mga tanong na ginagamitan ng pagdaragdag at pagbabawas.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Pagbasa at Pagsulat ng mga Bilang",
                aralin1_p1: "Bawat isa sa atin ay namimili. Binabayaran natin ang mga paninda at paglilingkod na ibinibigay sa atin. Ang presyo ay sinasabi sa pamamagitan ng mga bilang. Alam mo ba ang mga katagang \"ilan\" at \"magkano?\" Maraming bagay ang pinaggagamitan ng mga bilang. Makikita natin ito sa loob ng pampasaherong dyip, sa palengke, sa trabaho at maging sa tahanan.",
                aralin1_h3_1: "Pagbasa at Pagsulat ng mga Tambilang at Bilang",
                aralin1_p2: "Ang sampung simbolo na ginagamit natin sa mga bilang o paraan ng pagbibilang ay ang: <strong class=\"highlighted-number\">0, 1, 2, 3, 4, 5, 6, 7, 8, at 9</strong>. Ang mga simbolong ito ay tinatawag na <b>tambilang (digits)</b>. Ang mga bilang ay binubuo ng mga tambilang. Halimbawa, sa bilang na <strong class=\"highlighted-number\">349</strong>, ang mga tambilang ay ang 3, 4, at 9.",
                aralin1_h3_2: "Place Value Numeration System",
                aralin1_p3: "Ang halaga ng tambilang ay nakabatay sa kinalalagyan nito sa bilang. Kaya ang ating paraan ng pagsusulat ng mga bilang ay tinatawag na <b>place value numeration system</b>.",
                aralin1_ex1_q: "Halimbawa: Bilang na 543",
                aralin1_ex1_l1: "Ang tambilang na <strong class=\"highlighted-number\">5</strong> ay nasa <b>Tig-iisang daan (Hundreds)</b> kaya ang halaga nito ay <b>limang daan (500)</b>.",
                aralin1_ex1_l2: "Ang tambilang na <strong class=\"highlighted-number\">4</strong> ay nasa <b>Tig-sasampu (Tens)</b> kaya ang halaga nito ay <b>apatnapu (40)</b>.",
                aralin1_ex1_l3: "Ang tambilang na <strong class=\"highlighted-number\">3</strong> ay nasa <b>Tig-iisa (Ones)</b> kaya ang halaga nito ay <b>tatlo (3)</b>.",
                aralin1_ex1_note: "Binabasa ito na: Limandaan apatnapu't-tatlo.",
                aralin1_p4: "Kung walang tambilang sa isang lugar sa place value, ginagamit natin ang <strong class=\"highlighted-number\">0</strong>. Ang <b>sero</b> ay isang <b>place holder</b>. Halimbawa, ang <strong class=\"highlighted-number\">109</strong> ay binubuo ng 1 sa Tig-iisang Daan, 0 sa Tig-sasampu, at 9 sa Tig-iisa.",
                aralin1_h3_3: "Kaugnayan ng mga Bilang",
                aralin1_l4_gt: "<b>Mas Higit sa</b> (<span class=\"text-gray-900 font-bold text-lg\"> > </span>): Kung ang unang bilang ay mas malaki o mas mataas ang halaga.",
                aralin1_l5_lt: "<b>Mas Kaunti sa</b> (<span class=\"text-gray-900 font-bold text-lg\"> < </span>): Kung ang unang bilang ay mas maliit o mas mababa ang halaga.",
                aralin1_l6_eq: "<b>Katumbas ng</b> (<span class=\"text-gray-900 font-bold text-lg\"> = </span>): Kung ang dalawang bilang ay may magkatulad na halaga.",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Pagdaragdag (Addition)",
                aralin2_p1: "Ang <b>Pagdaragdag</b> ay isang pamamaraan ng pagsasama ng dalawa o higit pang mga bilang upang makakuha ng isa pang bilang (kabuuan) na katumbas ng pinagsama-samang mga bilang.",
                aralin2_h3_1: "Mga Termino sa Pagdaragdag",
                aralin2_l1: "<b>Addends:</b> Ang mga bilang na idinaragdag.",
                aralin2_l2: "<b>Tanda ng Pagdaragdag:</b> <span class=\"font-mono text-xl text-gray-900\">+</span>.",
                aralin2_l3: "<b>Kabuuan (Sum):</b> Ang bilang na makukuha pagkatapos idagdag ang mga addends. Ito ay laging mas higit kaysa alin mang addends.",
                aralin2_h3_2: "Pamamaraan ng Pagdaragdag (Short Method)",
                aralin2_ol1: "Isulat ang mga addends at tiyakin na ang mga tambilang na magkatulad ang kinalalagyan ay magkakahanay.",
                aralin2_ol2: "Idagdag muna ang mga bilang sa hanay ng <b>Tig-iisa</b>.",
                aralin2_ol3: "<b>Dalhin (Carry)</b> ang mga sampu (tens) sa susunod na hanay (Tig-sasampu).",
                aralin2_ol4: "Idagdag ang lahat ng mga tambilang na nasa hanay ng <b>Tig-sasampu</b>, kasama ang dinalang bilang.",
                aralin2_ol5: "<b>Dalhin</b> ang mga daan (hundreds) sa hanay ng Tig-iisang daan.",
                aralin2_ol6: "Idagdag ang mga tambilang sa hanay ng <b>Tig-iisang daan</b> upang makuha ang huling kabuuan.",
                aralin2_ex1_q: "Halimbawa: Hanapin ang kabuuan ng 147 + 219 + 38",
                aralin2_ex1_pre: "  <span class=\"text-gray-900\">12</span> (Dalhin)\n  147\n  219\n+  38\n-----\n  <strong class=\"highlighted-number\">404</strong>",
                aralin2_ex1_note: "Ang kabuuan ay <strong class=\"highlighted-number\">404</strong>.",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Pagbabawas (Subtraction)",
                aralin3_p1: "Ang <b>Pagbabawas</b> ay isang operasyon o pamamaraan ng pagkuha ng bilang mula sa isang mas malaking bilang.",
                aralin3_h3_1: "Mga Termino sa Pagbabawas",
                aralin3_l1: "<b>Minuend:</b> Ang bilang kung saan ibinabawas ang isa pang bilang (mas malaking bilang).",
                aralin3_l2: "<b>Subtrahend:</b> Ang bilang na tinatanggal mula sa minuend.",
                aralin3_l3: "<b>Tanda ng Pagbabawas:</b> <span class=\"font-mono text-xl text-gray-900\">-</span>.",
                aralin3_l4: "<b>Difference:</b> Ang bilang na makukuha pagkatapos magbawas. Ito ay laging mas maliit kaysa sa minuend.",
                aralin3_h3_2: "Pamamaraan ng Pagbabawas (may Pagpapalit/Borrowing)",
                aralin3_ol1: "Tiyakin na ang mga tambilang ay nakahanay ayon sa place value. Magsimula sa hanay ng <b>Tig-iisa</b>.",
                aralin3_ol2: "Kung ang tambilang sa minuend ay mas maliit kaysa sa subtrahend (hal. $0-4$), kailangan mong <b>kumuha ng sampu (borrow)</b> mula sa katabing Tig-sasampu.",
                aralin3_ol3: "Ibabawas mo ang <strong class=\"highlighted-number\">1</strong> (sampu) mula sa Tig-sasampu ng minuend at idadagdag mo ito bilang <strong class=\"highlighted-number\">10</strong> sa Tig-iisa.",
                aralin3_ol4: "Pagkatapos magbawas sa Tig-iisa, magpatuloy sa hanay ng Tig-sasampu (huwag kalimutang ibawas ang kinuhang sampu).",
                aralin3_ol5: "Ipagpatuloy ang proseso sa hanay ng Tig-iisang daan.",
                aralin3_ex1_q: "Halimbawa: 50 - 14",
                aralin3_ex1_pre: "   <span class=\"text-gray-900\">4 10</span> (5 becomes 4, 0 becomes 10)\n    50\n-   14\n------\n    <strong class=\"highlighted-number\">36</strong>",
                aralin3_ex1_note: "Ang difference ay <strong class=\"highlighted-number\">36</strong>.",
                
                // Quiz Labels
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Subukan ang iyong kaalaman sa pagbasa, pagdaragdag, at pagbabawas.",
                quiz_section_a: "A. Tambilang at Place Value (Pumili ng tamang sagot)",
                qa1_label: "1. Ilang tambilang mayroon sa bilang na 917?",
                qa2_label: "2. Ano ang place value ng <b>4</b> sa bilang na 406?",
                qa2_iisa_val: "Tig-iisa",
                qa2_sasampu_val: "Tig-sasampu",
                qa2_daan_val: "Tig-iisang daan",
                qa2_wala_val: "Wala",
                qa3_label: "3. Ano ang place value ng <b>4</b> sa bilang na 849?",
                qa4_label: "4. Isulat sa simbolo: <b>Apat na raan at dalawampu</b>",
                qa5_label: "5. Isulat sa simbolo: <b>Pitong daan at siyamnapu</b>",
                quiz_section_b: "B. Paghambing (Gamitin ang >, <, o =)",
                qb1_label: "1. 10",
                qb2_label: "2. 76",
                qb3_label: "3. 84",
                qb4_label: "4. 55",
                quiz_section_c: "C. Pagdaragdag at Pagbabawas (Ibigay ang sagot)",
                qc1_label: "1. 18 + 1 =",
                qc2_label: "2. 7 + 6 =",
                qc3_label: "3. 12 - 0 =",
                qc4_label: "4. 13 - 6 =",
                qc5_label: "5. 17 - 9 =",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}).`,
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
            
            // 5. Update placeholder text for inputs (Placeholder only needed for C section)
            const answerInput = document.querySelector('#q5');
            const placeholderText = lang === 'tl' ? 'Sagot' : 'Answer';
            if (answerInput) {
                document.querySelectorAll('.quiz-input').forEach(input => {
                    if (input.id.startsWith('q')) { // Only apply to addition/subtraction
                        input.placeholder = placeholderText;
                    }
                });
            }
        }

        // --- LANGUAGE TOGGLE EVENT LISTENER ---
        document.getElementById('lang-toggle-btn').addEventListener('click', () => {
            const newLang = currentLang === 'tl' ? 'en' : 'tl';
            updateLanguage(newLang);
        });

        // --- EXISTING LOGIC FOLLOWS ---

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

        // Function to handle quiz logic
        document.getElementById('math-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const resultsDiv = document.getElementById('results');
            let correctCount = 0;
            const totalQuestions = 14; 

            // Define correct answers. Note: qa answers are now strings matching radio button values.
            const answers = {
                // SECTION A: Tambilang and Place Value
                qa1: '3',                 // Ilang tambilang sa 917? (3)
                qa2: 'tig-iisang daan',   // Place value ng 4 sa 406 (Tig-iisang daan)
                qa3: 'tig-sasampu',       // Place value ng 4 sa 849 (Tig-sasampu)
                qa4: '420',               // Apat na raan at dalawampu (420)
                qa5: '790',               // Pitong daan at siyamnapu (790)
                
                // SECTION B: Comparison
                q1: '<', // 10 < 19
                q2: '=', // 76 = 76
                q3: '>', // 84 > 64
                q4: '>', // 55 > 41

                // SECTION C: Addition/Subtraction (Numbers)
                q5: 19,  // 18 + 1
                q6: 13,  // 7 + 6
                q7: 12,  // 12 - 0
                q8: 7,   // 13 - 6
                q9: 8,   // 17 - 9
            };
            
            // Helper function to handle non-radio inputs (Comparison, Addition, Subtraction)
            function checkSimpleInput(id, expected) {
                const input = document.getElementById(id);
                let value = input.value.trim();
                let isCorrect = false;

                // Reset styles
                input.classList.remove('border-red-500', 'border-green-500', 'bg-green-50');

                if (id.startsWith('q')) { // For C: Addition/Subtraction (numbers)
                    value = parseInt(value);
                    if (!isNaN(value) && value === expected) {
                        isCorrect = true;
                    }
                } else { // For B: Comparison (string)
                    // Normalize HTML entities to plain symbols for checking
                    if (value === '&lt;') value = '<';
                    if (value === '&gt;') value = '>';

                    if (value === expected) {
                        isCorrect = true;
                    }
                }
                
                if (isCorrect) {
                    correctCount++;
                    input.classList.add('border-green-500', 'bg-green-50');
                } else if (input.value.length > 0) {
                    input.classList.add('border-red-500');
                }
            }

            // Helper function to handle radio button inputs (Section A)
            function checkRadioInput(name, expected) {
                const checkedRadio = document.querySelector(`input[name="${name}"]:checked`);
                const questionDiv = document.getElementById(`q_${name}`);
                
                // Clear previous styles from all labels/choices in this group
                questionDiv.querySelectorAll('.radio-choice').forEach(label => {
                    label.classList.remove('correct-border', 'incorrect-border');
                });
                
                if (checkedRadio && checkedRadio.value === expected) {
                    correctCount++;
                    // Apply correct styling to the checked label
                    checkedRadio.parentElement.classList.add('correct-border');
                } else if (checkedRadio) {
                    // Apply incorrect styling to the checked label
                    checkedRadio.parentElement.classList.add('incorrect-border');
                } 
            }


            // Run checks for Section A (Radio Buttons)
            checkRadioInput('qa1', answers.qa1);
            checkRadioInput('qa2', answers.qa2);
            checkRadioInput('qa3', answers.qa3);
            checkRadioInput('qa4', answers.qa4);
            checkRadioInput('qa5', answers.qa5);
            
            // Run checks for Sections B and C (Simple Inputs)
            checkSimpleInput('q1', answers.q1);
            checkSimpleInput('q2', answers.q2);
            checkSimpleInput('q3', answers.q3);
            checkSimpleInput('q4', answers.q4);
            checkSimpleInput('q5', answers.q5);
            checkSimpleInput('q6', answers.q6);
            checkSimpleInput('q7', answers.q7);
            checkSimpleInput('q8', answers.q8);
            checkSimpleInput('q9', answers.q9);

            // Display results
            const percentage = ((correctCount / totalQuestions) * 100).toFixed(0);
            let message = '';
            
            const totalScore = correctCount;
            const totalPossible = totalQuestions;

            // Determine the message based on current language
            const resultMessage = translations[currentLang];

            // Reset background classes
            resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800');


            if (totalScore === totalPossible) {
                message = resultMessage.quiz_result_excellent(totalScore, totalPossible, percentage);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (totalScore >= totalPossible * 0.7) {
                message = resultMessage.quiz_result_good(totalScore, totalPossible, percentage);
                resultsDiv.classList.add('bg-green-100', 'text-green-800');
            } else {
                message = resultMessage.quiz_result_fail(totalScore, totalPossible, percentage);
                resultsDiv.classList.add('bg-yellow-100', 'text-yellow-800');
            }

            resultsDiv.innerHTML = message;
            resultsDiv.classList.remove('hidden');
            resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
        
        
        // --- SCROLL TRACKING LOGIC FOR OUTLINE ---
        const sections = [
            'objectives', 
            'aralin1', 
            'aralin2', 
            'aralin3', 
            'pagsasanay'
        ];
        
        const outlineElement = document.getElementById('outline');
        // Filter out null links to avoid errors
        const outlineLinks = sections.map(id => outlineElement ? outlineElement.querySelector(`a[href="#${id}"]`) : null).filter(link => link);
        const sectionElements = sections.map(id => document.getElementById(id)).filter(element => element);

        function highlightOutlineLink() {
            let activeLink = null;
            
            // Check which section is closest to the top of the viewport
            for (let i = 0; i < sectionElements.length; i++) {
                // Check if element exists before calling getBoundingClientRect
                if (!sectionElements[i]) continue;

                const rect = sectionElements[i].getBoundingClientRect();
                // A section is considered active if its top is near or above the top of the viewport
                if (rect.top <= 100) { 
                    activeLink = outlineLinks[i];
                }
            }

            // Clear all active classes
            outlineLinks.forEach(link => {
                if(link) link.classList.remove('active');
            });

            // Apply active class to the determined link
            if (activeLink) {
                activeLink.classList.add('active');
            }
        }

        // Event listener for highlighting links on scroll
        window.addEventListener('scroll', highlightOutlineLink);
        // Initial highlight on load
        window.addEventListener('load', () => {
            // Initialize default language (English) on load, as requested
            updateLanguage('en');
            highlightOutlineLink();
        });
        // --- END SCROLL TRACKING LOGIC ---
    </script>
</body>
</html>
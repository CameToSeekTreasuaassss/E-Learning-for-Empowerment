<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication and Division 2</title>
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Three-Digit Multiplication</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Three-Digit Division</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Multiplication and Division 2</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Focusing on multiplication and division of numbers with <b>three digits</b> or more.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Multiply whole numbers with <b>three digits</b> or more;</li>
                        <li data-i18n="obj_2">Divide whole numbers with <b>three digits</b> or more; and</li>
                        <li data-i18n="obj_3">Solve simple math problems involving multiplication and division.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">
                    
                    <!-- ARALIN 1: Pagpaparami ng mga Bilang na may Tatlong Tambilang -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Three-Digit Multiplication</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">Multiplying three-digit numbers is similar to two-digit multiplication, but involves <b>more steps</b> and <b>regrouping</b> (carrying) into the hundreds place.</p>
                            
                            <p data-i18n="aralin1_p2">The easiest method is to use the <b>expanded form</b> of the three-digit number.  </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Multiplication Using Expanded Form</h3>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_q">EXAMPLE: Get the product of 187 &times; 5.</p>
                                <pre class="whitespace-pre-wrap text-2xl font-mono mt-2 text-gray-800" data-i18n="aralin1_ex1_math">
  187  ->  100 + 80 + 7
x 5    ->       x 5
-----      -----------
             35  <span class="text-gray-600 text-base">(5 x 7)</span>
            400  <span class="text-gray-600 text-base">(5 x 80)</span>
          + 500  <span class="text-gray-600 text-base">(5 x 100)</span>
          -----
          <b>935</b>
                                </pre>
                                <p class="mt-2 text-gray-700 italic text-xl" data-i18n="aralin1_ex1_a">The product of 187 and 5 is <b>935</b>.</p>
                            </div>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Multiplying by Multiples of 100</h3>
                            <p data-i18n="aralin1_p3">When multiplying a number by 100, 200, or any number ending in two zeros, multiply the non-zero digits first, then add the two zeros to the result.</p>
                            <div class="math-display" data-i18n="aralin1_math_1">
                                <b>4 &times; 300 = 1200</b><br>
                                <span class="text-base font-normal">(Multiply 4 &times; 3 = 12, then add two zeros)</span>
                            </div>
                            <div class="math-display" data-i18n="aralin1_math_2">
                                <b>15 &times; 100 = 1500</b><br>
                                <span class="text-base font-normal">(Multiply 15 &times; 1 = 15, then add two zeros)</span>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Paghahati ng mga Bilang na may Tatlong Tambilang -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Three-Digit Division</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">Dividing three-digit numbers is done using the <b>long division</b> method, starting from the <b>hundreds</b> place down to the <b>ones</b> place.  </p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Long Division Steps</h3>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_q">EXAMPLE: Divide 972 by 4.</p>
                                <p data-i18n="aralin2_ex1_p">The <b>Dividend</b> is 972. The <b>Divisor</b> is 4.</p>
                                <ol class="list-decimal list-inside space-y-2 ml-4 long-division-step">
                                    <li data-i18n="aralin2_ol1">Divide the <b>Hundreds</b>: 9 &divide; 4 = <b>2</b> with a remainder of 1.</li>
                                    <li data-i18n="aralin2_ol2">Carry the remainder (1) to the 7. The new number is <b>17</b>.</li>
                                    <li data-i18n="aralin2_ol3">Divide the <b>Tens</b>: 17 &divide; 4 = <b>4</b> with a remainder of 1.</li>
                                    <li data-i18n="aralin2_ol4">Carry the remainder (1) to the 2. The new number is <b>12</b>.</li>
                                    <li data-i18n="aralin2_ol5">Divide the <b>Ones</b>: 12 &divide; 4 = <b>3</b>.</li>
                                </ol>
                                <div class="math-display" data-i18n="aralin2_ex1_a">
                                    Result: <b>243</b>
                                </div>
                                <p class="mt-2 text-gray-700 italic text-xl" data-i18n="aralin2_ex1_check">Check: 243 &times; 4 = 972. Correct.</p>
                            </div>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Dividing with a Remainder</h3>
                            <p data-i18n="aralin2_p2">If the division results in a number that cannot be divided evenly, the remaining number is called the <b>remainder (R)</b>.  </p>
                            <div class="math-display" data-i18n="aralin2_math_1">
                                <b>17 &divide; 5 = 3 R 2</b><br>
                                <span class="text-base font-normal">(5 &times; 3 = 15; 17 - 15 = 2 remainder)</span>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Solve the following problems using Multiplication and Division.</p>

                    <form id="final-assessment-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Multiplication (Give the Product)</p>
                            <!-- Vertical alignment applied via flex-col space-y-4 -->
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2"><label for="qa1_final" class="font-medium" data-i18n="qa1_label">1. 365 days &times; 8 years (Total days):</label><input type="text" id="qa1_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_product" placeholder="Product"></div>
                                <div class="flex flex-col space-y-2"><label for="qa2_final" class="font-medium" data-i18n="qa2_label">2. 450 tickets &times; P15 per ticket (Total sales, P):</label><input type="text" id="qa2_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_product" placeholder="Product"></div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Division (Give the Quotient)</p>
                            <!-- Vertical alignment applied via flex-col space-y-4 -->
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2"><label for="qb1_final" class="font-medium" data-i18n="qb1_label">1. Divide 768 by 6:</label><input type="text" id="qb1_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_quotient" placeholder="Quotient"></div>
                                <div class="flex flex-col space-y-2"><label for="qb2_final" class="font-medium" data-i18n="qb2_label">2. 1,000 &divide; 4 =</label><input type="text" id="qb2_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_quotient" placeholder="Quotient"></div>
                            </div>
                        </div>
                        
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_c">C. Word Problems</p>
                            <!-- Vertical alignment applied via flex-col space-y-4 -->
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qc1_final" class="font-medium" data-i18n="qc1_label">1. A factory made 850 pieces of soap in 5 days. How many soaps were made each day?</label>
                                    <input type="text" id="qc1_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_answer" placeholder="Answer">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qc2_final" class="font-medium" data-i18n="qc2_label">2. A cinema has 125 seats per row. If there are 7 rows, what is the total number of seats?</label>
                                    <input type="text" id="qc2_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_answer" placeholder="Answer">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qc3_final" class="font-medium" data-i18n="qc3_label">3. Divide the P2,400 income among 8 employees. How much will each receive?</label>
                                    <input type="text" id="qc3_final" class="quiz-input w-full sm:w-48" data-i18n-placeholder="placeholder_answer" placeholder="Answer">
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
                outline_aralin1: "Lesson 1: Three-Digit Multiplication",
                outline_aralin2: "Lesson 2: Three-Digit Division",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Lower Elementary Learning Module Sheet",
                h1_title: "Multiplication and Division 2",
                h1_subtitle: "Focusing on multiplication and division of numbers with <b>three digits</b> or more.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Multiply whole numbers with <b>three digits</b> or more;",
                obj_2: "Divide whole numbers with <b>three digits</b> or more; and",
                obj_3: "Solve simple math problems involving multiplication and division.",

                // Lesson 1 Content (Multiplication)
                aralin1_title: "Lesson 1: Three-Digit Multiplication",
                aralin1_p1: "Multiplying three-digit numbers is similar to two-digit multiplication, but involves <b>more steps</b> and <b>regrouping</b> (carrying) into the hundreds place.",
                aralin1_p2: "The easiest method is to use the <b>expanded form</b> of the three-digit number.  ",
                aralin1_h3_1: "Multiplication Using Expanded Form",
                aralin1_ex1_q: "EXAMPLE: Get the product of 187 &times; 5.",
                aralin1_ex1_math: '  187  ->  100 + 80 + 7\nx 5    ->       x 5\n-----\t  -----------\n\t     35  <span class="text-gray-600 text-base">(5 x 7)</span>\n\t    400  <span class="text-gray-600 text-base">(5 x 80)</span>\n\t  + 500  <span class="text-gray-600 text-base">(5 x 100)</span>\n\t  -----\n\t  <b>935</b>',
                aralin1_ex1_a: "The product of 187 and 5 is <b>935</b>.",
                aralin1_h3_2: "Multiplying by Multiples of 100",
                aralin1_p3: "When multiplying a number by 100, 200, or any number ending in two zeros, multiply the non-zero digits first, then add the two zeros to the result.",
                aralin1_math_1: '<b>4 &times; 300 = 1200</b><br><span class="text-base font-normal">(Multiply 4 &times; 3 = 12, then add two zeros)</span>',
                aralin1_math_2: '<b>15 &times; 100 = 1500</b><br><span class="text-base font-normal">(Multiply 15 &times; 1 = 15, then add two zeros)</span>',
                
                // Lesson 2 Content (Division)
                aralin2_title: "Lesson 2: Three-Digit Division",
                aralin2_p1: "Dividing three-digit numbers is done using the <b>long division</b> method, starting from the <b>hundreds</b> place down to the <b>ones</b> place.  ",
                aralin2_h3_1: "Long Division Steps",
                aralin2_ex1_q: "EXAMPLE: Divide 972 by 4.",
                aralin2_ex1_p: "The <b>Dividend</b> is 972. The <b>Divisor</b> is 4.",
                aralin2_ol1: "Divide the <b>Hundreds</b>: 9 &divide; 4 = <b>2</b> with a remainder of 1.",
                aralin2_ol2: "Carry the remainder (1) to the 7. The new number is <b>17</b>. ",
                aralin2_ol3: "Divide the <b>Tens</b>: 17 &divide; 4 = <b>4</b> with a remainder of 1.",
                aralin2_ol4: "Carry the remainder (1) to the 2. The new number is <b>12</b>.",
                aralin2_ol5: "Divide the <b>Ones</b>: 12 &divide; 4 = <b>3</b>.",
                aralin2_ex1_a: "Result: <b>243</b>",
                aralin2_ex1_check: "Check: 243 &times; 4 = 972. Correct.",
                aralin2_h3_2: "Dividing with a Remainder",
                aralin2_p2: "If the division results in a number that cannot be divided evenly, the remaining number is called the <b>remainder (R)</b>.",
                aralin2_math_1: '<b>17 &divide; 5 = 3 R 2</b><br><span class="text-base font-normal">(5 &times; 3 = 15; 17 - 15 = 2 remainder)</span>',
                
                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Solve the following problems using Multiplication and Division.",
                quiz_section_a: "A. Multiplication (Give the Product)",
                qa1_label: "1. 365 days &times; 8 years (Total days):",
                qa2_label: "2. 450 tickets &times; P15 per ticket (Total sales, P):",
                quiz_section_b: "B. Division (Give the Quotient)",
                qb1_label: "1. Divide 768 by 6:",
                qb2_label: "2. 1,000 &divide; 4 =",
                quiz_section_c: "C. Word Problems",
                qc1_label: "1. A factory made 850 pieces of soap in 5 days. How many soaps were made each day?",
                qc2_label: "2. A cinema has 125 seats per row. If there are 7 rows, what is the total number of seats?",
                qc3_label: "3. Divide the P2,400 income among 8 employees. How much will each receive?",
                quiz_button: "Check Answers",
                placeholder_product: "Product",
                placeholder_quotient: "Quotient",
                placeholder_answer: "Answer",

                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered three-digit multiplication and division.`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Read Lessons 1 and 2 again.`,

            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pagpaparami ng Tatlong Tambilang",
                outline_aralin2: "Aralin 2: Paghahati ng Tatlong Tambilang",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Lower Elementary Learning Module Sheet",
                h1_title: "Pagpaparami at Paghahati 2",
                h1_subtitle: "Nakatuon sa pagpaparami at paghahati ng mga bilang na may <b>tatlong tambilang</b> o higit pa.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Makapagparami ng mga buong bilang na may <b>tatlong tambilang</b> o higit pa;",
                obj_2: "Makapaghati ng mga buong bilang na may <b>tatlong tambilang</b> o higit pa; at",
                obj_3: "Makalutas ng mga simpleng suliranin gamit ang pagpaparami at paghahati.",

                // Lesson 1 Content (Multiplication)
                aralin1_title: "Aralin 1: Pagpaparami ng mga Bilang na may Tatlong Tambilang",
                aralin1_p1: "Ang pagpaparami ng mga bilang na may tatlong tambilang ay pareho lamang sa dalawang tambilang, ngunit may <b>mas maraming hakbang</b> at <b>regrouping</b> (pagpapangkat) sa tig-iisang daan (hundreds).",
                aralin1_p2: "Ang pinakamadaling paraan ay gamitin ang <b>pinahabang anyo</b> (expanded form) ng tatlong tambilang na bilang.  ",
                aralin1_h3_1: "Pagpaparami sa Paggamit ng Pinahabang Anyo",
                aralin1_ex1_q: "HALIMBAWA: Kunin ang product ng 187 &times; 5.",
                aralin1_ex1_math: '  187  ->  100 + 80 + 7\nx 5    ->       x 5\n-----\t  -----------\n\t     35  <span class="text-gray-600 text-base">(5 x 7)</span>\n\t    400  <span class="text-gray-600 text-base">(5 x 80)</span>\n\t  + 500  <span class="text-gray-600 text-base">(5 x 100)</span>\n\t  -----\n\t  <b>935</b>',
                aralin1_ex1_a: "Ang product ng 187 at 5 ay <b>935</b>.",
                aralin1_h3_2: "Pagpaparami sa Paggamit ng Multiples ng 100",
                aralin1_p3: "Kapag pinararami ang isang bilang sa 100, 200, o anumang bilang na nagtatapos sa dalawang sero, iparami muna ang mga di-serong tambilang, pagkatapos ay idagdag ang dalawang sero sa resulta.",
                aralin1_math_1: '<b>4 &times; 300 = 1200</b><br><span class="text-base font-normal">(Iparami ang 4 &times; 3 = 12, pagkatapos ay idagdag ang dalawang sero)</span>',
                aralin1_math_2: '<b>15 &times; 100 = 1500</b><br><span class="text-base font-normal">(Iparami ang 15 &times; 1 = 15, pagkatapos ay idagdag ang dalawang sero)</span>',
                
                // Lesson 2 Content (Division)
                aralin2_title: "Aralin 2: Paghahati ng mga Bilang na may Tatlong Tambilang",
                aralin2_p1: "Ang paghahati ng mga bilang na may tatlong tambilang ay ginagawa sa paggamit ng <b>mahabang paraan (long division)</b>, simula sa <b>tig-iisang daan</b> (hundreds) patungo sa <b>tig-iisa</b> (ones).  ",
                aralin2_h3_1: "Mga Hakbang sa Paghahati",
                aralin2_ex1_q: "HALIMBAWA: Hatiin ang 972 sa 4.",
                aralin2_ex1_p: "Ang <b>Dividend</b> ay 972. Ang <b>Divisor</b> ay 4.",
                aralin2_ol1: "Hatiin ang <b>Tig-iisang Daan</b>: 9 &divide; 4 = <b>2</b> may remainder na 1.",
                aralin2_ol2: "I-carry ang remainder (1) sa 7. Ang bagong bilang ay <b>17</b>. ",
                aralin2_ol3: "Hatiin ang <b>Tig-sasampu</b>: 17 &divide; 4 = <b>4</b> may remainder na 1.",
                aralin2_ol4: "I-carry ang remainder (1) sa 2. Ang bagong bilang ay <b>12</b>.",
                aralin2_ol5: "Hatiin ang <b>Tig-iisa</b>: 12 &divide; 4 = <b>3</b>.",
                aralin2_ex1_a: "Resulta: <b>243</b>",
                aralin2_ex1_check: "Tsek: 243 &times; 4 = 972. Tama.",
                aralin2_h3_2: "Paghahati na may Remainder",
                aralin2_p2: "Kung ang paghahati ay nagreresulta sa isang bilang na hindi mahahati nang eksakto, ang natitirang bilang ay tinatawag na <b>remainder (R)</b>.",
                aralin2_math_1: '<b>17 &divide; 5 = 3 R 2</b><br><span class="text-base font-normal">(5 &times; 3 = 15; 17 - 15 = 2 ang natira)</span>',

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Lutasin ang mga sumusunod na suliranin gamit ang Pagpaparami at Paghahati.",
                quiz_section_a: "A. Pagpaparami (Ibigay ang Product)",
                qa1_label: "1. 365 araw &times; 8 taon (Kabuuang araw):",
                qa2_label: "2. 450 tiket &times; P15 bawat tiket (Kabuuang benta, P):",
                quiz_section_b: "B. Paghahati (Ibigay ang Quotient)",
                qb1_label: "1. Hatiin ang 768 sa 6:",
                qb2_label: "2. 1,000 &divide; 4 =",
                quiz_section_c: "C. Word Problems",
                qc1_label: "1. Ang isang pabrika ay gumawa ng 850 piraso ng sabon sa 5 araw. Ilang sabon ang nagawa sa bawat araw?",
                qc2_label: "2. May 125 na upuan ang isang sinehan sa bawat row. Kung may 7 row, ilang upuan lahat?",
                qc3_label: "3. Hatiin ang P2,400 na kita sa 8 empleyado. Magkano ang matatanggap ng bawat isa?",
                quiz_button: "Tingnan ang Sagot",
                placeholder_product: "Product",
                placeholder_quotient: "Quotient",
                placeholder_answer: "Sagot",

                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang pagpaparami at paghahati ng tatlong tambilang.`,
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

        function checkNumberAnswer(id, expected) {
            const input = document.getElementById(id);
            // Clean the input, then remove any leading P or peso symbols (for question 1)
            const rawValue = standardizeNumberInput(input.value.replace(/p\s?|peso|days|seats|sabon/gi, '')); // General unit removal
            const expectedStr = String(expected).trim();
            
            let isCorrect = false;

            // Check if the input value matches the expected value exactly
            if (rawValue === expectedStr) {
                isCorrect = true;
            } else if (parseFloat(rawValue) === parseFloat(expectedStr)) {
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
            const totalQuestions = 7; 
            const resultsDiv = document.getElementById('results');

            // Define correct answers
            const answers = {
                qa1: 2920,   // 365 * 8 = 2920
                qa2: 6750,   // 450 * 15 = 6750
                qb1: 128,    // 768 / 6 = 128
                qb2: 250,    // 1000 / 4 = 250
                qc1: 170,    // 850 / 5 = 170
                qc2: 875,    // 125 * 7 = 875
                qc3: 300,    // 2400 / 8 = 300
            };
            
            if (!isLanguageToggle) {
                // Run checks only on button click, not language toggle
                correctCount += checkNumberAnswer('qa1_final', answers.qa1); 
                correctCount += checkNumberAnswer('qa2_final', answers.qa2);
                correctCount += checkNumberAnswer('qb1_final', answers.qb1); 
                correctCount += checkNumberAnswer('qb2_final', answers.qb2);
                correctCount += checkNumberAnswer('qc1_final', answers.qc1); 
                correctCount += checkNumberAnswer('qc2_final', answers.qc2);
                correctCount += checkNumberAnswer('qc3_final', answers.qc3);
                
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
        
        document.getElementById('final-assessment-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); // Run scoring logic
        });
    </script>
</body>
</html>
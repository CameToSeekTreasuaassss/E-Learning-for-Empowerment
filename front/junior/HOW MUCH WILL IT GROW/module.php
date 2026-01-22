<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">How Much Will It Grow? | Sequences and Series</title>
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
            color: #059669; /* Green 600 */
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Arithmetic Sequence (Addition)</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Geometric Sequence (Multiplication)</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Applications of Sequences</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">How Much Will It Grow? | Sequences and Series</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Learning Arithmetic and Geometric Sequences and Series for future planning.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <!-- Changed ID from 'tungkol-saan' to 'objectives' for consistency -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Confirmed: List items font size is set to 1.25rem (20px) -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Describe an <b>Arithmetic Sequence</b> (adding a constant) and <b>Geometric Sequence</b> (multiplying by a constant).</li>
                        <li data-i18n="obj_2">Find the <b>n-th term</b> (a<sub>n</sub>) and the <b>sum</b> (S<sub>n</sub>) of both sequences.</li>
                        <li data-i18n="obj_3">Calculate <b>Arithmetic Means</b>.</li>
                        <li data-i18n="obj_4">Solve problems about growth in money, population, and other applications.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Arithmetic Sequence -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Arithmetic Sequence (Addition)</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">A <b>Sequence</b> is a list of numbers that follows a pattern. Each number is called a <b>Term</b> (a<sub>n</sub>).</p>
                            <p data-i18n="aralin1_p2">An <b>Arithmetic Sequence</b> is a sequence where every two consecutive terms have the same difference, called the <b>Common Difference</b> (d).</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Formula for the n-th Term (a<sub>n</sub>)</h3>
                            <p data-i18n="aralin1_p3">This is used to find the value of any term in the sequence (e.g., the amount saved in the 30th month).</p>
                            <div class="math-formula">
                                <span>a<sub>n</sub> = a<sub>1</sub> + (n - 1)d</span>
                            </div>
                            <p data-i18n="aralin1_p4">Where: <b>a<sub>n</sub></b> = n-th term; <b>a<sub>1</sub></b> = first term; <b>d</b> = common difference; <b>n</b> = number of terms.</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE: Find the 12th term of 6, 13, 20, 27,...</p>
                                <p data-i18n="aralin1_ex1_given">Given: a<sub>1</sub>=6, d=7, n=12.</p>
                                <p class="math-formula" data-i18n="aralin1_ex1_solution">a<sub>12</sub> = 6 + (12 - 1) &times; 7 = 6 + 77 = 83</p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Arithmetic Series (Sum: S<sub>n</sub>)</h3>
                            <p data-i18n="aralin1_p5">The <b>Series</b> is the total sum of the terms in a sequence. This formula is used to find Abdul's total savings over 12 months.</p>
                            <div class="math-formula">
                                <span>S<sub>n</sub> = (n &divide; 2) &times; (a<sub>1</sub> + a<sub>n</sub>)</span>
                            </div>
                            <p data-i18n="aralin1_p6">Or if the last term (a<sub>n</sub>) is unknown:</p>
                            <div class="math-formula">
                                <span>S<sub>n</sub> = (n &divide; 2) &times; [2a<sub>1</sub> + (n - 1)d]</span>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Arithmetic Means</h3>
                            <p data-i18n="aralin1_p7">These are the terms inserted between two non-consecutive terms. First, the <b>Common Difference (d)</b> must be found using the a<sub>n</sub> formula.</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_title">EXAMPLE: Insert 5 arithmetic means between 5 and 35.</p>
                                <p data-i18n="aralin1_ex2_sequence">5, [10, 15, 20, 25, 30], 35 (Total: 7 terms)</p>
                                <p data-i18n="aralin1_ex2_step1">Step 1: Find d. a<sub>7</sub> = 35, a<sub>1</sub> = 5, n=7. </p>
                                <p class="math-formula" data-i18n="aralin1_ex2_solution">35 = 5 + (7 - 1)d → 30 = 6d → <b>d = 5</b>.</p>
                                <p data-i18n="aralin1_ex2_step2">Step 2: Using d=5, add 5 starting from a<sub>1</sub>: 5+5=10, 10+5=15, etc.</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Geometric Sequence -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Geometric Sequence (Multiplication)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">A <b>Geometric Sequence</b> is a set of numbers where each term is found by multiplying the previous term by a constant called the <b>Common Ratio</b> (r).</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Formula for the n-th Term (a<sub>n</sub>)</h3>
                            <p data-i18n="aralin2_p2">This is used to find the value of an investment (e.g., stocks) after several years.</p>
                            <div class="math-formula">
                                <span>a<sub>n</sub> = a<sub>1</sub> &times; r<sup>(n - 1)</sup></span>
                            </div>
                            <p data-i18n="aralin2_p3">Where: <b>a<sub>n</sub></b> = n-th term; <b>a<sub>1</sub></b> = first term; <b>r</b> = common ratio; <b>n</b> = number of terms.</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">EXAMPLE: Find the 7th term of 3, 6, 12,...</p>
                                <p data-i18n="aralin2_ex1_given">Given: a<sub>1</sub>=3, r=2, n=7.</p>
                                <p class="math-formula" data-i18n="aralin2_ex1_solution">a<sub>7</sub> = 3 &times; 2<sup>(7 - 1)</sup> = 3 &times; 2<sup>6</sup> = 3 &times; 64 = 192</p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Geometric Series (Sum: S<sub>n</sub>)</h3>
                            <p data-i18n="aralin2_p4">This is the total sum of the terms in a geometric sequence.</p>
                            <div class="math-formula">
                                <span>S<sub>n</sub> = a<sub>1</sub> &times; [(1 - r<sup>n</sup>) &divide; (1 - r)]</span>
                            </div>
                            <p data-i18n="aralin2_p5">Where: <b>S<sub>n</sub></b> = sum of n terms; <b>a<sub>1</sub></b> = first term; <b>r</b> = common ratio (r &ne; 1).</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_title">EXAMPLE: Find the sum of the first 5 terms of 4, 8, 16,... (r=2)</p>
                                <p data-i18n="aralin2_ex2_given">Given: a<sub>1</sub>=4, r=2, n=5.</p>
                                <p class="math-formula" data-i18n="aralin2_ex2_solution1">S<sub>5</sub> = 4 &times; [(1 - 2<sup>5</sup>) &divide; (1 - 2)]</p>
                                <p class="math-formula" data-i18n="aralin2_ex2_solution2">S<sub>5</sub> = 4 &times; 31 = 124</p>
                            </div>
                        </div>
                    </details>
                    
                    <!-- ARALIN 3: Paglalapat (Application) -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Applications of Sequences and Series</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">These concepts are used in solving real-world problems such as finance (savings/investment) and scientific applications (cell or bacterial growth).</p>
                                                        
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Differentiating Sequence Types</h3>
                            <p data-i18n="aralin3_p2">To know which formula to use, ask yourself:</p>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin3_l1">If the next number is found by <b>Adding (Addition)</b> or <b>Subtracting (Subtraction)</b> a constant: Use <b>Arithmetic Sequence</b>.</li>
                                <li data-i18n="aralin3_l2">If the next number is found by <b>Multiplying (Multiplication)</b> or <b>Dividing (Division)</b> by a constant: Use <b>Geometric Sequence</b>.</li>
                            </ul>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex1_title">EXAMPLE: (Arithmetic Sequence - General)</p>
                                <p data-i18n="aralin3_ex1_problem">A networking business adds 5 members every week. They started with 11 members. How many members will they have after 8 weeks?</p>
                                <p class="math-formula" data-i18n="aralin3_ex1_solution">a<sub>n</sub> = 11 + (8 - 1) &times; 5 = 46 members.</p>
                                
                                <p class="font-bold mt-4" data-i18n="aralin3_ex2_title">EXAMPLE: (Geometric Sequence - Cell Growth)</p>
                                <p data-i18n="aralin3_ex2_problem">A cell divides into two every minute. It started with 1,000 cells. How many cells will there be after 6 minutes?</p>
                                <p class="math-formula" data-i18n="aralin3_ex2_solution">a<sub>n</sub> = 1000 &times; 2<sup>(6 - 1)</sup> = 1000 &times; 32 = 32,000 cells.</p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Solve the problems using the correct Sequence or Series formula.</p>

                    <form id="sequence-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <!-- Questions 1-3 (Original) -->
                            <div class="space-y-4"> 
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. (Arithmetic Sequence) Find the 10th term of the sequence: 5, 8, 11,...</label>
                                    <input type="text" id="qa1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa1_placeholder" placeholder="10th Term">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. (Geometric Sequence) Find the next term in the sequence: 4, 12, 36,...</label>
                                    <input type="text" id="qa2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa2_placeholder" placeholder="Next Term">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. (Geometric Series) Find the sum of the first 5 terms of: 10, 20, 40,...</label>
                                    <input type="text" id="qa3" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa3_placeholder" placeholder="Total Sum (S5)">
                                </div>

                                <!-- NEW QUESTIONS 4-5 (Word Problems) -->
                                <div class="flex flex-col space-y-2 pt-4 border-t border-gray-200">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. (Arithmetic Series - Application) Rey saves ₱50 on the first week, and increases his savings by ₱10 every week after that. How much total money will Rey have saved after 20 weeks?</label>
                                    <input type="text" id="qa4" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa4_placeholder" placeholder="Total Savings (₱)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">5. (Geometric Sequence - Application) A virus doubles the number of infected people every 3 days. If 5 people were initially infected, how many people will be infected after 15 days?</label>
                                    <input type="text" id="qa5" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa5_placeholder" placeholder="Total People (Count)">
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
                outline_aralin1: "Lesson 1: Arithmetic Sequence (Addition)",
                outline_aralin2: "Lesson 2: Geometric Sequence (Multiplication)",
                outline_aralin3: "Lesson 3: Applications of Sequences",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "How Much Will It Grow? | Sequences and Series",
                h1_subtitle: "Learning Arithmetic and Geometric Sequences and Series for future planning.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Describe an <b>Arithmetic Sequence</b> (adding a constant) and <b>Geometric Sequence</b> (multiplying by a constant).",
                obj_2: "Find the <b>n-th term</b> (a<sub>n</sub>) and the <b>sum</b> (S<sub>n</sub>) of both sequences.",
                obj_3: "Calculate <b>Arithmetic Means</b>.",
                obj_4: "Solve problems about growth in money, population, and other applications.",

                // Lesson 1 Content (Arithmetic)
                aralin1_title: "Lesson 1: Arithmetic Sequence (Addition)",
                aralin1_p1: "A <b>Sequence</b> is a list of numbers that follows a pattern. Each number is called a <b>Term</b> (a<sub>n</sub>).",
                aralin1_p2: "An <b>Arithmetic Sequence</b> is a sequence where every two consecutive terms have the same difference, called the <b>Common Difference</b> (d).",
                aralin1_h3_1: "Formula for the n-th Term (a<sub>n</sub>)",
                aralin1_p3: "This is used to find the value of any term in the sequence (e.g., the amount saved in the 30th month).",
                aralin1_p4: "Where: <b>a<sub>n</sub></b> = n-th term; <b>a<sub>1</sub></b> = first term; <b>d</b> = common difference; <b>n</b> = number of terms.",
                aralin1_ex1_title: "EXAMPLE: Find the 12th term of 6, 13, 20, 27,...",
                aralin1_ex1_given: "Given: a<sub>1</sub>=6, d=7, n=12.",
                aralin1_ex1_solution: "a<sub>12</sub> = 6 + (12 - 1) &times; 7 = 6 + 77 = 83",
                aralin1_h3_2: "Arithmetic Series (Sum: S<sub>n</sub>)",
                aralin1_p5: "The <b>Series</b> is the total sum of the terms in a sequence. This formula is used to find Abdul's total savings over 12 months.",
                aralin1_p6: "Or if the last term (a<sub>n</sub>) is unknown:",
                aralin1_h3_3: "Arithmetic Means",
                aralin1_p7: "These are the terms inserted between two non-consecutive terms. First, the <b>Common Difference (d)</b> must be found using the a<sub>n</sub> formula.",
                aralin1_ex2_title: "EXAMPLE: Insert 5 arithmetic means between 5 and 35.",
                aralin1_ex2_sequence: "5, [10, 15, 20, 25, 30], 35 (Total: 7 terms)",
                aralin1_ex2_step1: "Step 1: Find d. a<sub>7</sub> = 35, a<sub>1</sub> = 5, n=7. ",
                aralin1_ex2_solution: "35 = 5 + (7 - 1)d → 30 = 6d → <b>d = 5</b>.",
                aralin1_ex2_step2: "Step 2: Using d=5, add 5 starting from a<sub>1</sub>: 5+5=10, 10+5=15, etc.",

                // Lesson 2 Content (Geometric)
                aralin2_title: "Lesson 2: Geometric Sequence (Multiplication)",
                aralin2_p1: "A <b>Geometric Sequence</b> is a set of numbers where each term is found by multiplying the previous term by a constant called the <b>Common Ratio</b> (r).",
                aralin2_h3_1: "Formula for the n-th Term (a<sub>n</sub>)",
                aralin2_p2: "This is used to find the value of an investment (e.g., stocks) after several years.",
                aralin2_p3: "Where: <b>a<sub>n</sub></b> = n-th term; <b>a<sub>1</sub></b> = first term; <b>r</b> = common ratio; <b>n</b> = number of terms.",
                aralin2_ex1_title: "EXAMPLE: Find the 7th term of 3, 6, 12,...",
                aralin2_ex1_given: "Given: a<sub>1</sub>=3, r=2, n=7.",
                aralin2_ex1_solution: "a<sub>7</sub> = 3 &times; 2<sup>(7 - 1)</sup> = 3 &times; 2<sup>6</sup> = 3 &times; 64 = 192",
                aralin2_h3_2: "Geometric Series (Sum: S<sub>n</sub>)",
                aralin2_p4: "This is the total sum of the terms in a geometric sequence.",
                aralin2_p5: "Where: <b>S<sub>n</sub></b> = sum of n terms; <b>a<sub>1</sub></b> = first term; <b>r</b> = common ratio (r &ne; 1).",
                aralin2_ex2_title: "EXAMPLE: Find the sum of the first 5 terms of 4, 8, 16,... (r=2)",
                aralin2_ex2_given: "Given: a<sub>1</sub>=4, r=2, n=5.",
                aralin2_ex2_solution1: "S<sub>5</sub> = 4 &times; [(1 - 2<sup>5</sup>) &divide; (1 - 2)]",
                aralin2_ex2_solution2: "S<sub>5</sub> = 4 &times; 31 = 124",

                // Lesson 3 Content (Application)
                aralin3_title: "Lesson 3: Applications of Sequences and Series",
                aralin3_p1: "These concepts are used in solving real-world problems such as finance (savings/investment) and scientific applications (cell or bacterial growth).",
                aralin3_h3_1: "Differentiating Sequence Types",
                aralin3_p2: "To know which formula to use, ask yourself:",
                aralin3_l1: "If the next number is found by <b>Adding (Addition)</b> or <b>Subtracting (Subtraction)</b> a constant: Use <b>Arithmetic Sequence</b>.",
                aralin3_l2: "If the next number is found by <b>Multiplying (Multiplication)</b> or <b>Dividing (Division)</b> by a constant: Use <b>Geometric Sequence</b>.",
                aralin3_ex1_title: "EXAMPLE: (Arithmetic Sequence - General)",
                aralin3_ex1_problem: "A networking business adds 5 members every week. They started with 11 members. How many members will they have after 8 weeks?",
                aralin3_ex1_solution: "a<sub>n</sub> = 11 + (8 - 1) &times; 5 = 46 members.",
                aralin3_ex2_title: "EXAMPLE: (Geometric Sequence - Cell Growth)",
                aralin3_ex2_problem: "A cell divides into two every minute. It started with 1,000 cells. How many cells will there be after 6 minutes?",
                aralin3_ex2_solution: "a<sub>n</sub> = 1000 &times; 2<sup>(6 - 1)</sup> = 1000 &times; 32 = 32,000 cells.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Solve the problems using the correct Sequence or Series formula.",
                qa1_label: "1. (Arithmetic Sequence) Find the 10th term of the sequence: 5, 8, 11,...",
                qa1_placeholder: "10th Term",
                qa2_label: "2. (Geometric Sequence) Find the next term in the sequence: 4, 12, 36,...",
                qa2_placeholder: "Next Term",
                qa3_label: "3. (Geometric Series) Find the sum of the first 5 terms of: 10, 20, 40,...",
                qa3_placeholder: "Total Sum (S5)",
                
                qa4_label: "4. (Arithmetic Series - Application) Rey saves ₱50 on the first week, and increases his savings by ₱10 every week after that. How much total money will Rey have saved after 20 weeks?",
                qa4_placeholder: "Total Savings (₱)",
                qa5_label: "5. (Geometric Sequence - Application) A virus doubles the number of infected people every 3 days. If 5 people were initially infected, how many people will be infected after 15 days?",
                qa5_placeholder: "Total People (Count)",

                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Sequence and Series calculation!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the Arithmetic and Geometric formulas.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Re-read Lessons 1 and 2.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Arithmetic Sequence (Pagdaragdag)",
                outline_aralin2: "Aralin 2: Geometric Sequence (Pagpaparami)",
                outline_aralin3: "Aralin 3: Paglalapat ng Sequences",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Gaano Ito Lalaki? | Sequences at Series",
                h1_subtitle: "Pag-aaral ng Arithmetic at Geometric Sequences at Series para sa pagpaplano ng kinabukasan.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ilarawan ang <b>Arithmetic Sequence</b> (pagdaragdag ng constant) at <b>Geometric Sequence</b> (pagpaparami ng constant).",
                obj_2: "Hanapin ang <b>n-th term</b> (a<sub>n</sub>) at ang <b>sum</b> (S<sub>n</sub>) ng parehong sequence.",
                obj_3: "Kalkulahin ang <b>Arithmetic Means</b>.",
                obj_4: "Sagutin ang mga problema tungkol sa paglago ng pera, populasyon, at iba pang aplikasyon.",

                // Lesson 1 Content (Arithmetic)
                aralin1_title: "Aralin 1: Arithmetic Sequence (Pagdaragdag)",
                aralin1_p1: "Ang <b>Sequence</b> ay listahan ng mga numero na sumusunod sa isang pattern. Ang bawat numero ay tinatawag na <b>Term</b> (a<sub>n</sub>).",
                aralin1_p2: "Ang <b>Arithmetic Sequence</b> ay isang sequence kung saan ang bawat dalawang magkasunod na term ay may parehong diperensiya (difference) na tinatawag na <b>Common Difference</b> (d).",
                aralin1_h3_1: "Formula para sa n-th Term (a<sub>n</sub>)",
                aralin1_p3: "Ginagamit ito para mahanap ang halaga ng anumang term sa sequence (hal. ang ika-30 na buwan ng ipon).",
                aralin1_p4: "Kung saan: <b>a<sub>n</sub></b> = n-th term; <b>a<sub>1</sub></b> = first term; <b>d</b> = common difference; <b>n</b> = bilang ng term.",
                aralin1_ex1_title: "HALIMBAWA: Hanapin ang ika-12 term ng 6, 13, 20, 27,...",
                aralin1_ex1_given: "Given: a<sub>1</sub>=6, d=7, n=12.",
                aralin1_ex1_solution: "a<sub>12</sub> = 6 + (12 - 1) &times; 7 = 6 + 77 = 83",
                aralin1_h3_2: "Arithmetic Series (Sum: S<sub>n</sub>)",
                aralin1_p5: "Ang <b>Series</b> ay ang kabuuang sum (total) ng mga term sa isang sequence. Ang formula na ito ay ginagamit para mahanap ang total savings ni Abdul sa loob ng 12 buwan.",
                aralin1_p6: "O kaya kung hindi alam ang huling term (a<sub>n</sub>):",
                aralin1_h3_3: "Arithmetic Means",
                aralin1_p7: "Ito ang mga term na ipinapasok sa pagitan ng dalawang non-consecutive terms. Kinakailangan munang hanapin ang <b>Common Difference (d)</b> gamit ang a<sub>n</sub> formula.",
                aralin1_ex2_title: "HALIMBAWA: Maglagay ng 5 arithmetic means sa pagitan ng 5 at 35.",
                aralin1_ex2_sequence: "5, [10, 15, 20, 25, 30], 35 (Kabuuan: 7 terms)",
                aralin1_ex2_step1: "Step 1: Hanapin ang d. a<sub>7</sub> = 35, a<sub>1</sub> = 5, n=7. ",
                aralin1_ex2_solution: "35 = 5 + (7 - 1)d → 30 = 6d → <b>d = 5</b>.",
                aralin1_ex2_step2: "Step 2: Gamit ang d=5, idagdag ang 5 simula sa a<sub>1</sub>: 5+5=10, 10+5=15, atbp.",

                // Lesson 2 Content (Geometric)
                aralin2_title: "Aralin 2: Geometric Sequence (Pagpaparami)",
                aralin2_p1: "Ang <b>Geometric Sequence</b> ay isang set ng mga numero kung saan ang bawat term ay nakukuha sa pamamagitan ng pag-multiply ng nakaraang term sa isang constant na tinatawag na <b>Common Ratio</b> (r).",
                aralin2_h3_1: "Formula para sa n-th Term (a<sub>n</sub>)",
                aralin2_p2: "Ginagamit ito para mahanap ang halaga ng investment (hal. stocks) pagkatapos ng ilang taon.",
                aralin2_p3: "Kung saan: <b>a<sub>n</sub></b> = n-th term; <b>a<sub>1</sub></b> = first term; <b>r</b> = common ratio; <b>n</b> = bilang ng term.",
                aralin2_ex1_title: "HALIMBAWA: Hanapin ang ika-7 term ng 3, 6, 12,...",
                aralin2_ex1_given: "Given: a<sub>1</sub>=3, r=2, n=7.",
                aralin2_ex1_solution: "a<sub>7</sub> = 3 &times; 2<sup>(7 - 1)</sup> = 3 &times; 2<sup>6</sup> = 3 &times; 64 = 192",
                aralin2_h3_2: "Geometric Series (Sum: S<sub>n</sub>)",
                aralin2_p4: "Ito ang kabuuang sum ng mga term sa isang geometric sequence.",
                aralin2_p5: "Kung saan: <b>S<sub>n</sub></b> = sum ng n terms; <b>a<sub>1</sub></b> = first term; <b>r</b> = common ratio (r &ne; 1).",
                aralin2_ex2_title: "HALIMBAWA: Hanapin ang sum ng unang 5 term ng 4, 8, 16,... (r=2)",
                aralin2_ex2_given: "Given: a<sub>1</sub>=4, r=2, n=5.",
                aralin2_ex2_solution1: "S<sub>5</sub> = 4 &times; [(1 - 2<sup>5</sup>) &divide; (1 - 2)]",
                aralin2_ex2_solution2: "S<sub>5</sub> = 4 &times; 31 = 124",

                // Lesson 3 Content (Application)
                aralin3_title: "Aralin 3: Paglalapat ng Sequence at Series (Application)",
                aralin3_p1: "Ang mga konseptong ito ay ginagamit sa paglutas ng problema tulad ng pananalapi (savings/investment) at mga siyentipikong aplikasyon (pagdami ng cell o bacteria).",
                aralin3_h3_1: "Pag-iiba ng Uri ng Sequence",
                aralin3_p2: "Para malaman kung anong formula ang gagamitin, tanungin ang sarili:",
                aralin3_l1: "Kung ang susunod na numero ay nakukuha sa <b>Pagdaragdag (Addition)</b> o <b>Pagbabawas (Subtraction)</b> ng isang constant: Gumamit ng <b>Arithmetic Sequence</b>.",
                aralin3_l2: "Kung ang susunod na numero ay nakukuha sa <b>Pagpaparami (Multiplication)</b> o <b>Paghahati (Division)</b> ng isang constant: Gumamit ng <b>Geometric Sequence</b>.",
                aralin3_ex1_title: "HALIMBAWA: (Arithmetic Sequence - Pangkalahatan)",
                aralin3_ex1_problem: "Ang networking business ay nagdadagdag ng 5 miyembro bawat linggo. Nagsimula sila sa 11. Ilan sila pagkatapos ng 8 linggo?",
                aralin3_ex1_solution: "a<sub>n</sub> = 11 + (8 - 1) &times; 5 = 46 miyembro.",
                aralin3_ex2_title: "HALIMBAWA: (Geometric Sequence - Pagdami ng Cells)",
                aralin3_ex2_problem: "Ang cell ay nagdi-divide sa dalawa bawat minuto. Nagsimula sa 1,000 cells. Ilan ang cells pagkatapos ng 6 na minuto?",
                aralin3_ex2_solution: "a<sub>n</sub> = 1000 &times; 2<sup>(6 - 1)</sup> = 1000 &times; 32 = 32,000 cells.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang mga problema gamit ang tamang formula ng Sequence o Series.",
                qa1_label: "1. (Arithmetic Sequence) Hanapin ang ika-10 term ng sequence: 5, 8, 11,...",
                qa1_placeholder: "Ika-10 Term",
                qa2_label: "2. (Geometric Sequence) Hanapin ang susunod na term: 4, 12, 36,...",
                qa2_placeholder: "Susunod na Term",
                qa3_label: "3. (Geometric Series) Hanapin ang sum ng unang 5 terms ng: 10, 20, 40,...",
                qa3_placeholder: "Total Sum (S5)",

                qa4_label: "4. (Arithmetic Series - Application) Si Rey ay nag-iipon ng ₱50 sa unang linggo, at dinagdagan niya ng ₱10 ang ipon bawat linggo pagkatapos nito. Magkano ang kabuuang pera na naipon ni Rey pagkatapos ng 20 linggo?",
                qa4_placeholder: "Total Savings (₱)",
                qa5_label: "5. (Geometric Sequence - Application) Isang virus ang dumodoble ang bilang ng taong nahawaan bawat 3 araw. Kung 5 tao ang nagsimulang nahawaan, ilang tao ang mahahawa pagkatapos ng 15 araw?",
                qa5_placeholder: "Total People (Bilang)",

                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang pagkalkula ng Sequence at Series!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga pormula ng Arithmetic at Geometric.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang Aralin 1 at 2.`,
            }
        };

        let currentLang = 'en'; // DEFAULT LANGUAGE IS ENGLISH, as requested

        // --- UTILITY FUNCTIONS ---
        
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
            if (isNaN(parsedValue)) return ''; 
            return String(parsedValue);
        }

        function checkAnswer(id, expected) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            const standardizedInput = parseFloat(standardizeFloat(rawValue));
            const expectedFloat = parseFloat(String(expected));
            
            // Use a small tolerance for comparison
            const isCorrect = Math.abs(standardizedInput - expectedFloat) < 0.01;

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
            const totalQuestions = 5; // UPDATED: Total questions is now 5
            const resultsDiv = document.getElementById('results');
            
            // --- Expected Calculations ---
            
            // 1. Arithmetic an: 5, 8, 11,... (a1=5, d=3, n=10)
            const ans1 = 5 + (10 - 1) * 3; // 5 + 27 = 32
            
            // 2. Geometric an: 4, 12, 36,... (r=3). Find a4 (the next term).
            const ans2 = 36 * 3; // 108
            
            // 3. Geometric Sn: 10, 20, 40,... (a1=10, r=2, n=5)
            const a1_geom_3 = 10;
            const r_geom_3 = 2;
            const n_geom_3 = 5;
            const r_power_n = Math.pow(r_geom_3, n_geom_3); // 2^5 = 32
            const ans3 = a1_geom_3 * ((r_power_n - 1) / (r_geom_3 - 1)); // Formula: Sn = a1 * [(r^n - 1) / (r - 1)] (Used this version as r > 1)
            // ans3 = 10 * ((32 - 1) / (2 - 1)) = 10 * 31 = 310

            // 4. Rey's Savings (Arithmetic Sn): a1=50, d=10, n=20
            const a1_arith_4 = 50;
            const d_arith_4 = 10;
            const n_arith_4 = 20;
            // Sn = (n/2) * [2*a1 + (n-1)d]
            const ans4 = (n_arith_4 / 2) * (2 * a1_arith_4 + (n_arith_4 - 1) * d_arith_4);
            // ans4 = 10 * (100 + 19 * 10) = 10 * (100 + 190) = 10 * 290 = 2900 
            
            // 5. Virus (Geometric an): a1=5, r=2, 15 days / 3 days/cycle = 5 cycles/generations (n). The n-th term is the 6th term (n=6)
            // The number of doubling periods is 15/3 = 5. The total number of terms is 5 cycles + 1 start = 6 terms (n=6).
            // a_n = a1 * r^(n-1) where n is the term number. We need the value after 5 cycles (6th term).
            const a1_geom_5 = 5;
            const r_geom_5 = 2;
            const cycles = 15 / 3; // 5 cycles
            const n_geom_5 = cycles + 1; // n = 6th term
            const ans5 = a1_geom_5 * Math.pow(r_geom_5, (n_geom_5 - 1)); // 5 * 2^5 = 5 * 32 = 160

            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1', ans1); // 32
                correctCount += checkAnswer('qa2', ans2); // 108
                correctCount += checkAnswer('qa3', ans3); // 310
                correctCount += checkAnswer('qa4', ans4); // 2900
                correctCount += checkAnswer('qa5', ans5); // 160
                
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
        
        document.getElementById('sequence-quiz-form').addEventListener('submit', function(e) {
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
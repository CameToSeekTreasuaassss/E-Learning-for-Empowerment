<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding and Subtracting of Fractions</title>
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Like Fractions</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Unlike Fractions</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Adding/Subtracting Mixed Numbers</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Adding and Subtracting of Fractions</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Learning how to use the basic operations of fractions in daily situations.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Perform addition and subtraction of <b>like fractions</b>;</li>
                        <li data-i18n="obj_2">Perform addition and subtraction of <b>unlike fractions</b>;</li>
                        <li data-i18n="obj_3">Perform addition and subtraction of <b>mixed numbers</b>; and</li>
                        <li data-i18n="obj_4">Solve problems involving addition and subtraction of fractions.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Pagdaragdag at Pagbabawas ng mga Magkatulad na Praksiyon -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Like Fractions</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1"><b>Like fractions</b> are fractions that have the same <b>denominator</b> (e.g., <b>1/5</b> and <b>3/5</b>). These are easy to add or subtract directly.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Adding Like Fractions</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin1_ol1">Add the <b>numerators</b>.</li>
                                <li data-i18n="aralin1_ol2">Retain the denominator.</li>
                                <li data-i18n="aralin1_ol3">Simplify the answer to its <b>lowest term</b>, if necessary.</li>
                            </ol>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_q">EXAMPLE: <b>3/8 + 1/8</b></p>
                                <p class="math-formula">(3+1)/8 = 4/8</p>
                                <p data-i18n="aralin1_ex1_a">Simplify: 4/8 <b>divided by</b> 4/4 = <b>1/2</b></p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Subtracting Like Fractions</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin1_ol4">Find the <b>difference</b> between the numerators.</li>
                                <li data-i18n="aralin1_ol5">Retain the denominator.</li>
                                <li data-i18n="aralin1_ol6">Simplify the answer.</li>
                            </ol>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_q">EXAMPLE: <b>7/9 - 4/9</b></p>
                                <p class="math-formula">(7-4)/9 = 3/9</p>
                                <p data-i18n="aralin1_ex2_a">Simplify: 3/9 <b>divided by</b> 3/3 = <b>1/3</b></p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Pagdaragdag at Pagbabawas ng mga Di-Magkatulad na Praksiyon -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Unlike Fractions</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1"><b>Unlike fractions</b> have different denominators (e.g., <b>1/3</b> and <b>1/4</b>). They cannot be added or subtracted directly.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Adding/Subtracting Unlike Fractions</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin2_ol1">Find the <b>Least Common Denominator (LCD)</b>. This is the smallest number that is a multiple of all denominators.</li>
                                <li data-i18n="aralin2_ol2">Change each fraction to an <b>equivalent fraction</b> using the LCD as the new denominator.</li>
                                <li data-i18n="aralin2_ol3">Add or subtract the numerators of the like fractions now.</li>
                                <li data-i18n="aralin2_ol4">Simplify the answer.</li>
                            </ol>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_q">EXAMPLE: <b>1/3 + 1/4</b></p>
                                <p data-i18n="aralin2_ex1_a">1. Find the LCD of 3 and 4. The LCD is <b>12</b>.</p>
                                <p data-i18n="aralin2_ex1_b">2. Create equivalent fractions: 1/3 <b>x</b> 4/4 = 4/12 and 1/4 <b>x</b> 3/3 = 3/12</p>
                                <p data-i18n="aralin2_ex1_c">3. Add: 4/12 + 3/12 = <b>7/12</b></p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 3: Pagdaragdag at Pagbabawas ng mga Pinaghalong Bilang -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Adding/Subtracting Mixed Numbers</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">A <b>mixed number</b> is a combination of a <b>whole number</b> and a <b>fraction</b> (e.g., <b>2 3/4</b>).</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Adding Mixed Numbers</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin3_ol1">Find the LCD of the fractions.</li>
                                <li data-i18n="aralin3_ol2">Change the fractions to equivalent fractions.</li>
                                <li data-i18n="aralin3_ol3">Add the whole numbers. Add the fractions.</li>
                                <li data-i18n="aralin3_ol4">Simplify the answer. (If the fraction is an <b>improper fraction</b>, convert it to a mixed number and add it to the whole number.)</li>
                            </ol>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex1_q">EXAMPLE: <b>2 3/4 + 1 2/3</b></p>
                                <p data-i18n="aralin3_ex1_a">1. LCD of 4 and 3 is <b>12</b>. <b>-></b> 2 9/12 + 1 8/12</p>
                                <p data-i18n="aralin3_ex1_b">2. 2+1 = 3; 9/12 + 8/12 = 17/12</p>
                                <p data-i18n="aralin3_ex1_c">3. 17/12 = 1 5/12. Add: 3 + 1 5/12 = <b>4 5/12</b></p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">Subtracting Mixed Numbers (with Regrouping)</h3>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex2_q">EXAMPLE: <b>5 1/4 - 1 3/4</b></p>
                                <p data-i18n="aralin3_ex2_a">You cannot subtract 3/4 from 1/4. Regroup from the 5.</p>
                                <p data-i18n="aralin3_ex2_b">1. Regrouping: 5 1/4 = 4 + (4/4 + 1/4) = 4 5/4</p>
                                <p data-i18n="aralin3_ex2_c">2. Subtract: 4 5/4 - 1 3/4 = 3 2/4 or <b>3 1/2</b></p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Solve the problems using addition and subtraction of fractions.</p>

                    <form id="fraction-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Like Fractions</p>
                            <!-- Vertical stacking (space-y-4) applied for consistency -->
                            <div class="space-y-4">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2"><label for="qa1" class="font-medium" data-i18n="qa1_label">1. 4/7 + 3/7 + 5/7 =</label><input type="text" id="qa1" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (Mixed No. / Fraction)"></div>
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2"><label for="qa2" class="font-medium" data-i18n="qa2_label">2. 7/9 - 5/9 =</label><input type="text" id="qa2" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (Lowest Term)"></div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Unlike Fractions</p>
                            <!-- Vertical stacking (space-y-4) applied for consistency -->
                            <div class="space-y-4">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2"><label for="qb1" class="font-medium" data-i18n="qb1_label">1. 1/3 + 1/4 =</label><input type="text" id="qb1" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qb1_placeholder" placeholder="Answer"></div>
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2"><label for="qb2" class="font-medium" data-i18n="qb2_label">2. 3/4 - 1/5 =</label><input type="text" id="qb2" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qb2_placeholder" placeholder="Answer"></div>
                            </div>
                        </div>
                        
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_c">C. Mixed Numbers</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qc1" class="font-medium" data-i18n="qc1_label">1. Liza bought 3 1/2 kg of fish, 2 3/4 kg of meat, and 1 2/3 kg of chicken. What is the total weight?</label>
                                    <input type="text" id="qc1" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qc1_placeholder" placeholder="Answer (Mixed Number)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qc2" class="font-medium" data-i18n="qc2_label">2. A cake needs 3 1/2 cups of milk. If 1 3/4 cups have already been added, how much more is needed?</label>
                                    <input type="text" id="qc2" class="quiz-input w-full sm:w-48" data-i18n-placeholder="qc2_placeholder" placeholder="Answer (Mixed Number)">
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
                outline_aralin1: "Lesson 1: Like Fractions",
                outline_aralin2: "Lesson 2: Unlike Fractions",
                outline_aralin3: "Lesson 3: Adding/Subtracting Mixed Numbers",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Adding and Subtracting of Fractions",
                h1_subtitle: "Learning how to use the basic operations of fractions in daily situations.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Perform addition and subtraction of <b>like fractions</b>;",
                obj_2: "Perform addition and subtraction of <b>unlike fractions</b>;",
                obj_3: "Perform addition and subtraction of <b>mixed numbers</b>; and",
                obj_4: "Solve problems involving addition and subtraction of fractions.",
                obj_5: "Solve problems involving addition and subtraction of fractions.", // Filler, only 4 objectives exist, but kept structure safe

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Like Fractions",
                aralin1_p1: "<b>Like fractions</b> are fractions that have the same <b>denominator</b> (e.g., <b>1/5</b> and <b>3/5</b>). These are easy to add or subtract directly.",
                aralin1_h3_1: "Adding Like Fractions",
                aralin1_ol1: "Add the <b>numerators</b>.",
                aralin1_ol2: "Retain the denominator.",
                aralin1_ol3: "Simplify the answer to its <b>lowest term</b>, if necessary.",
                aralin1_ol4: "Find the <b>difference</b> between the numerators.",
                aralin1_ol5: "Retain the denominator.",
                aralin1_ol6: "Simplify the answer.",
                aralin1_ex1_q: "EXAMPLE: <b>3/8 + 1/8</b>",
                aralin1_ex1_a: "Simplify: 4/8 <b>divided by</b> 4/4 = <b>1/2</b>",
                aralin1_h3_2: "Subtracting Like Fractions",
                aralin1_ex2_q: "EXAMPLE: <b>7/9 - 4/9</b>",
                aralin1_ex2_a: "Simplify: 3/9 <b>divided by</b> 3/3 = <b>1/3</b>",
                
                // Lesson 2 Content
                aralin2_title: "Lesson 2: Unlike Fractions",
                aralin2_p1: "<b>Unlike fractions</b> have different denominators (e.g., <b>1/3</b> and <b>1/4</b>). They cannot be added or subtracted directly.",
                aralin2_h3_1: "Adding/Subtracting Unlike Fractions",
                aralin2_ol1: "Find the <b>Least Common Denominator (LCD)</b>. This is the smallest number that is a multiple of all denominators.",
                aralin2_ol2: "Change each fraction to an <b>equivalent fraction</b> using the LCD as the new denominator.",
                aralin2_ol3: "Add or subtract the numerators of the like fractions now.",
                aralin2_ol4: "Simplify the answer.",
                aralin2_ex1_q: "EXAMPLE: <b>1/3 + 1/4</b>",
                aralin2_ex1_a: "1. Find the LCD of 3 and 4. The LCD is <b>12</b>.",
                aralin2_ex1_b: "2. Create equivalent fractions: 1/3 <b>x</b> 4/4 = 4/12 and 1/4 <b>x</b> 3/3 = 3/12",
                aralin2_ex1_c: "3. Add: 4/12 + 3/12 = <b>7/12</b>",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Adding/Subtracting Mixed Numbers",
                aralin3_p1: "A <b>mixed number</b> is a combination of a <b>whole number</b> and a <b>fraction</b> (e.g., <b>2 3/4</b>).",
                aralin3_h3_1: "Adding Mixed Numbers",
                aralin3_ol1: "Find the LCD of the fractions.",
                aralin3_ol2: "Change the fractions to equivalent fractions.",
                aralin3_ol3: "Add the whole numbers. Add the fractions.",
                aralin3_ol4: "Simplify the answer. (If the fraction is an <b>improper fraction</b>, convert it to a mixed number and add it to the whole number.)",
                aralin3_ex1_q: "EXAMPLE: <b>2 3/4 + 1 2/3</b>",
                aralin3_ex1_a: "1. LCD of 4 and 3 is <b>12</b>. <b>-></b> 2 9/12 + 1 8/12",
                aralin3_ex1_b: "2. 2+1 = 3; 9/12 + 8/12 = 17/12",
                aralin3_ex1_c: "3. 17/12 = 1 5/12. Add: 3 + 1 5/12 = <b>4 5/12</b>",
                aralin3_h3_2: "Subtracting Mixed Numbers (with Regrouping)",
                aralin3_ex2_q: "EXAMPLE: <b>5 1/4 - 1 3/4</b>",
                aralin3_ex2_a: "You cannot subtract 3/4 from 1/4. Regroup from the 5.",
                aralin3_ex2_b: "1. Regrouping: 5 1/4 = 4 + (4/4 + 1/4) = 4 5/4",
                aralin3_ex2_c: "2. Subtract: 4 5/4 - 1 3/4 = 3 2/4 or <b>3 1/2</b>",
                
                // Quiz Labels
                quiz_title: "Practice",
                quiz_subtitle: "Solve the problems using addition and subtraction of fractions.",
                quiz_section_a: "A. Like Fractions",
                qa1_label: "1. 4/7 + 3/7 + 5/7 =",
                qa2_label: "2. 7/9 - 5/9 =",
                quiz_section_b: "B. Unlike Fractions",
                qb1_label: "1. 1/3 + 1/4 =",
                qb2_label: "2. 3/4 - 1/5 =",
                quiz_section_c: "C. Mixed Numbers",
                qc1_label: "1. Liza bought 3 1/2 kg of fish, 2 3/4 kg of meat, and 1 2/3 kg of chicken. What is the total weight?",
                qc2_label: "2. A cake needs 3 1/2 cups of milk. If 1 3/4 cups have already been added, how much more is needed?",
                quiz_button: "Check Answers",

                // Quiz Placeholders
                qa1_placeholder: "Answer (Mixed No. / Fraction)",
                qa2_placeholder: "Answer (Lowest Term)",
                qb1_placeholder: "Answer",
                qb2_placeholder: "Answer",
                qc1_placeholder: "Answer (Mixed Number)",
                qc2_placeholder: "Answer (Mixed Number)",

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
                outline_aralin1: "Aralin 1: Magkatulad na Praksiyon",
                outline_aralin2: "Aralin 2: Di-Magkatulad na Praksiyon",
                outline_aralin3: "Aralin 3: Pagdaragdag/Pagbabawas ng Pinaghalong Bilang",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Pagdaragdag at Pagbabawas ng mga Praksiyon",
                h1_subtitle: "Pag-aaral kung paano gamitin ang batayang operasyon ng mga praksiyon sa pang-araw-araw na sitwasyon.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",

                // Objectives
                obj_1: "Maisagawa ang pagdaragdag at pagbabawas ng mga <b>magkatulad na praksiyon</b>;",
                obj_2: "Maisagawa ang pagdaragdag at pagbabawas ng mga <b>di-magkatulad na praksiyon</b>;",
                obj_3: "Maisagawa ang pagdaragdag at pagbabawas ng mga <b>pinaghalong bilang</b>;",
                obj_4: "Malutas ang mga suliranin hinggil sa pagdaragdag at pagbabawas ng mga praksiyon.",
                obj_5: "Malutas ang mga suliranin hinggil sa pagdaragdag at pagbabawas ng mga praksiyon.", // Filler

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Magkatulad na Praksiyon",
                aralin1_p1: "Ang mga <b>magkatulad na praksiyon (like fractions)</b> ay mga praksiyon na may magkatulad na <b>denamineytor</b> (hal. <b>1/5</b> at <b>3/5</b>). Madaling ipagdagdag o ipagbawas ang mga ito.",
                aralin1_h3_1: "Pagdaragdag ng Magkatulad na Praksiyon",
                aralin1_ol1: "Ipagdagdag ang mga <b>nyumereytor</b>.",
                aralin1_ol2: "Panatilihin ang denamineytor.",
                aralin1_ol3: "Gawing simple ang sagot sa <b>pinakamababang term (lowest term)</b>, kung kinakailangan.",
                aralin1_ol4: "Kunin ang <b>difference</b> ng mga nyumereytor.",
                aralin1_ol5: "Panatilihin ang denamineytor.",
                aralin1_ol6: "Gawing simple ang sagot.",
                aralin1_ex1_q: "HALIMBAWA: <b>3/8 + 1/8</b>",
                aralin1_ex1_a: "Gawing simple: 4/8 <b>hatiin sa</b> 4/4 = <b>1/2</b>",
                aralin1_h3_2: "Pagbabawas ng Magkatulad na Praksiyon",
                aralin1_ex2_q: "HALIMBAWA: <b>7/9 - 4/9</b>",
                aralin1_ex2_a: "Gawing simple: 3/9 <b>hatiin sa</b> 3/3 = <b>1/3</b>",
                
                // Lesson 2 Content
                aralin2_title: "Aralin 2: Di-Magkatulad na Praksiyon",
                aralin2_p1: "Ang mga <b>di-magkatulad na praksiyon (unlike fractions)</b> ay may magkakaibang denamineytor (hal. <b>1/3</b> at <b>1/4</b>). Hindi sila maaaring ipagdagdag o ipagbawas nang tuwiran.",
                aralin2_h3_1: "Pagdaragdag/Pagbabawas ng Di-Magkatulad na Praksiyon",
                aralin2_ol1: "Hanapin ang <b>Least Common Denominator (LCD)</b>. Ito ang pinakamaliit na bilang na multiple ng lahat ng denamineytor.",
                aralin2_ol2: "Baguhin ang bawat praksiyon sa isang <b>katumbas na praksiyon</b> gamit ang LCD bilang bagong denamineytor.",
                aralin2_ol3: "Ipagdagdag o Ipagbawas ang mga nyumereytor ng magkatulad na praksiyon na ngayon.",
                aralin2_ol4: "Gawing simple ang sagot.",
                aralin2_ex1_q: "HALIMBAWA: <b>1/3 + 1/4</b>",
                aralin2_ex1_a: "1. Hanapin ang LCD ng 3 at 4. Ang LCD ay <b>12</b>.",
                aralin2_ex1_b: "2. Gumawa ng katumbas na praksiyon: 1/3 <b>x</b> 4/4 = 4/12 at 1/4 <b>x</b> 3/3 = 3/12",
                aralin2_ex1_c: "3. Ipagdagdag: 4/12 + 3/12 = <b>7/12</b>",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Pagdaragdag/Pagbabawas ng Pinaghalong Bilang",
                aralin3_p1: "Ang <b>pinaghalong bilang (mixed number)</b> ay kombinasyon ng <b>buong bilang</b> at <b>praksiyon</b> (hal. <b>2 3/4</b>).",
                aralin3_h3_1: "Pagdaragdag ng Pinaghalong Bilang",
                aralin3_ol1: "Hanapin ang LCD ng mga praksiyon.",
                aralin3_ol2: "Baguhin ang mga praksiyon sa katumbas na praksiyon.",
                aralin3_ol3: "Ipagdagdag ang mga buong bilang. Ipagdagdag ang mga praksiyon.",
                aralin3_ol4: "Gawing simple ang sagot. (Kung ang praksiyon ay <b>improper fraction</b>, i-convert sa mixed number at idagdag sa buong bilang.)",
                aralin3_ex1_q: "HALIMBAWA: <b>2 3/4 + 1 2/3</b>",
                aralin3_ex1_a: "1. LCD ng 4 at 3 ay <b>12</b>. <b>-></b> 2 9/12 + 1 8/12",
                aralin3_ex1_b: "2. 2+1 = 3; 9/12 + 8/12 = 17/12",
                aralin3_ex1_c: "3. 17/12 = 1 5/12. Idagdag: 3 + 1 5/12 = <b>4 5/12</b>",
                aralin3_h3_2: "Pagbabawas ng Pinaghalong Bilang (may Regrouping)",
                aralin3_ex2_q: "HALIMBAWA: <b>5 1/4 - 1 3/4</b>",
                aralin3_ex2_a: "Hindi maaaring ibawas ang 3/4 sa 1/4. Mag-regroup mula sa 5.",
                aralin3_ex2_b: "1. Regrouping: 5 1/4 = 4 + (4/4 + 1/4) = 4 5/4",
                aralin3_ex2_c: "2. Magbawas: 4 5/4 - 1 3/4 = 3 2/4 o <b>3 1/2</b>",
                
                // Quiz Labels
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang mga suliranin gamit ang pagdaragdag at pagbabawas ng praksiyon.",
                quiz_section_a: "A. Magkatulad na Praksiyon",
                qa1_label: "1. 4/7 + 3/7 + 5/7 =",
                qa2_label: "2. 7/9 - 5/9 =",
                quiz_section_b: "B. Di-Magkatulad na Praksiyon",
                qb1_label: "1. 1/3 + 1/4 =",
                qb2_label: "2. 3/4 - 1/5 =",
                quiz_section_c: "C. Pinaghalong Bilang (Mixed Numbers)",
                qc1_label: "1. Bumili si Liza ng 3 1/2 kg isda, 2 3/4 kg karne, at 1 2/3 kg manok. Kabuuang timbang?",
                qc2_label: "2. Kailangan ng cake 3 1/2 tasa gatas. Kung 1 3/4 tasa na ang naihalo, ilan pa ang kailangan?",
                quiz_button: "Tingnan ang Sagot",

                // Quiz Placeholders
                qa1_placeholder: "Sagot (Mixed No. / Fraction)",
                qa2_placeholder: "Sagot (Lowest Term)",
                qb1_placeholder: "Sagot",
                qb2_placeholder: "Sagot",
                qc1_placeholder: "Sagot (Mixed Number)",
                qc2_placeholder: "Sagot (Mixed Number)",

                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang praksiyon!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score} out of ${total} (${percentage}%). Balikan lang ang mga aralin para sa mga mali mong sagot.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score} out of ${total} (${percentage}%). Basahin ulit ang Aralin 1-3.`,
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
                    // Use innerHTML for text that contains <b> tags
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


        // Helper function to check for exact input match (Fractions and Mixed Numbers)
        function checkExactInput(id, expectedAnswer) {
            const input = document.getElementById(id);
            
            // 1. Standardize user input:
            // - trim spaces
            // - convert to lowercase
            // - remove common units (kg, cups)
            // - standardize mixed number format (e.g., '1 5/7' becomes '15/7')
            const value = input.value.trim().toLowerCase()
                                       .replace(/kg|kilo|tasa|cup(s)?/g, '') // Remove units
                                       .replace(/\s/g, ''); // Remove spaces, including between whole and fraction

            // 2. Standardize expected answer:
            const expected = expectedAnswer.trim().toLowerCase().replace(/\s/g, '');
            
            let isCorrect = (value === expected);
            let correctCountRef = 0;

            input.classList.remove('correct-answer', 'incorrect-answer');

            if (isCorrect) {
                correctCountRef++;
                input.classList.add('correct-answer');
            } else if (input.value.length > 0) {
                input.classList.add('incorrect-answer');
            }
            return correctCountRef;
        }

        /**
         * Submits the quiz and calculates the score.
         * @param {boolean} isLanguageToggle - True if called only to refresh results language.
         */
        function submitQuiz(isLanguageToggle = false) {
            let score = 0;
            const resultsDiv = document.getElementById('results');

            // Define correct answers as EXACT simplified strings (no spaces, e.g., '1 5/7' -> '15/7')
            // Note on Mixed Number Format: The quiz expects the format 'W N/D' entered as 'WN/D' (e.g., 1 5/7 -> 15/7).
            const answers = {
                qa1: '15/7',   // 4/7+3/7+5/7 = 12/7 = 1 5/7 -> 15/7
                qa2: '2/9',     // 7/9-5/9 = 2/9
                qb1: '7/12',    // 1/3+1/4 = 7/12
                qb2: '11/20',   // 3/4-1/5 = 11/20
                qc1: '711/12', // 3 1/2 + 2 3/4 + 1 2/3 = 7 11/12 -> 711/12
                qc2: '13/4',   // 3 1/2 - 1 3/4 = 1 3/4 -> 13/4
            };

            if (!isLanguageToggle) {
                // Run checks only on button click, not language toggle
                score += checkExactInput('qa1', answers.qa1); 
                score += checkExactInput('qa2', answers.qa2);
                score += checkExactInput('qb1', answers.qb1);
                score += checkExactInput('qb2', answers.qb2);
                score += checkExactInput('qc1', answers.qc1); 
                score += checkExactInput('qc2', answers.qc2); 
                
                // Store the current score to maintain state across language toggles
                resultsDiv.setAttribute('data-current-score', score);
            } else {
                 // If it's a language toggle, retrieve the score
                 score = parseInt(resultsDiv.getAttribute('data-current-score')) || 0;
            }

            // Display results
            const totalQuestions = Object.keys(answers).length;
            const percentage = ((score / totalQuestions) * 100).toFixed(0);
            let message = '';
            
            // Determine the message based on current language
            const resultMessage = translations[currentLang];

            // Reset background for results box
            resultsDiv.classList.remove('bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800', 'bg-red-100', 'text-red-800', 'bg-green-600', 'text-white');

            if (score === totalQuestions) {
                message = resultMessage.quiz_result_excellent(score, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (score >= totalQuestions / 2) {
                message = resultMessage.quiz_result_good(score, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-100', 'text-green-800');
            } else {
                message = resultMessage.quiz_result_fail(score, totalQuestions, percentage);
                resultsDiv.classList.add('bg-yellow-100', 'text-yellow-800');
            }

            resultsDiv.innerHTML = `<p class="text-xl font-bold mb-2">${currentLang === 'en' ? 'Your Score' : 'Iyong Iskor'}: ${score}/${totalQuestions} (${percentage}%)</p>` + `<p class="text-lg">${message}</p>`;
            resultsDiv.classList.remove('hidden');
            
            if (!isLanguageToggle) {
                 resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
        
        document.getElementById('fraction-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); // Run scoring logic
        });
    </script>
</body>
</html>
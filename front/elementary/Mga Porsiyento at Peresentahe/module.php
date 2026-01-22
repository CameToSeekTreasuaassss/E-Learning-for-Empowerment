<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Percent and Percentages</title>
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
        
        /* Math/Formula Display Style */
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
        
        /* Table styles */
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
            background-color: #10b981;
            color: white;
            font-weight: 600;
        }
        .conversion-table td {
            background-color: #ecfdf5; 
            color: #1f2937; 
        }

        /* Custom CSS to make the entire NAV sticky */
        #outline-nav .sticky-container {
            position: sticky;
            top: 1rem; /* Adjust this value as needed, 16px */
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: What is Percent?</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Percentage Problems</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Percent and Percentages</h1>
                    <p class="mt-4 text-gray-600 italic" data-i18n="h1_subtitle">Used for calculating discounts, commissions, interest, and many more daily applications.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Explain the meaning of <b>percent</b>;</li>
                        <li data-i18n="obj_2">Identify the relationship of percent to <b>ratio</b>, <b>decimal</b>, and <b>fraction</b>;</li>
                        <li data-i18n="obj_3">Convert fractions to percent and vice versa; and</li>
                        <li data-i18n="obj_4">Solve problems related to <b>percentage</b>.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">
                    
                    <!-- ARALIN 1: ANO ANG PORSIYENTO? -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: What is Percent?</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">The word <b>percent</b> means <b>parts per one hundred</b>. The symbol <b>%</b> is used to express percent. Percent is the <b>ratio</b> where <b>100</b> is the second term (e.g., 20:100 or 20%).</p>
                               
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Converting Percent to Decimal</h3>
                            <p data-i18n="aralin1_p2">To convert percent to decimal, remove the <b>%</b> symbol and move the decimal point <b>two places to the left</b>.</p>
                            <div class="example-box" data-i18n="aralin1_ex1">
                                <p>Example: <b>7.5%</b> &rarr; 0.075</p>
                                <p>Example: <b>34%</b> &rarr; 0.34</p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Converting Decimal to Percent</h3>
                            <p data-i18n="aralin1_p3">To convert decimal to percent, move the decimal point <b>two places to the right</b> and add the <b>%</b> symbol.</p>
                            <div class="example-box" data-i18n="aralin1_ex2">
                                <p>Example: <b>0.02</b> &rarr; 2%</p>
                                <p>Example: <b>3.1</b> &rarr; 310%</p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Converting Fraction to Percent</h3>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="aralin1_l1">If the denominator is 100, just write the numerator and add <b>%</b> (Example: 90/100 &rarr; <b>90%</b>).</li>
                                <li data-i18n="aralin1_l2">If the denominator is a factor of 100, multiply the numerator and denominator by a factor that yields 100 as the denominator (Example: 10/25 &rarr; 40/100 &rarr; <b>40%</b>).</li>
                                <li data-i18n="aralin1_l3">If the denominator is not a factor of 100, divide the numerator by the denominator to get a <b>decimal</b>, and then convert it to <b>percent</b> (Example: 21/30 &rarr; 0.7 &rarr; <b>70%</b>).</li>
                            </ul>
                        </div>
                    </details>

                    <!-- ARALIN 2: PAGLUTAS SA MGA SULIRANING KAUGNAAN SA PERSENTAHE -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Percentage Problems</span>
                            <svg class="w-6 h-6 text-green-600 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1"><b>Percentage</b> is the result of taking the percent of a number. Problems about percentage can be solved using the formula:</p>
                            
                            <div class="math-display" data-i18n="aralin2_formula">
                                <b>P = B x r</b>
                            </div>
                            
                            
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="aralin2_l_p"><b>P</b> = Percentage (The value being sought)</li>
                                <li data-i18n="aralin2_l_b"><b>B</b> = Base (The original or total value)</li>
                                <li data-i18n="aralin2_l_r"><b>r</b> = Rate (The percent, written in <b>decimal form</b>)</li>
                            </ul>
                                <br><br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Application of Percentage</h3>
                            <ol class="list-decimal list-inside space-y-4 ml-4">
                                <br>
                                <li>
                                    <b data-i18n="aralin2_a1_title">Commission:</b> Incentive given on sales. <b>P</b> is the commission.
                                    <div class="example-box" data-i18n="aralin2_a1_ex">
                                        <p>Example: 15% commission on P1,400 worth of sales.</p>
                                        <p>B = P1,400.00 | r = 0.15</p>
                                        <p>P = 1,400 x 0.15 = <b>P210.00</b> (Commission)</p>
                                    </div>
                                <br>
                                </li>
                                <li>
                                    <b data-i18n="aralin2_a2_title">Discount:</b> Amount subtracted from the price.
                                    <div class="example-box" data-i18n="aralin2_a2_ex">
                                        <p>Example: 20% discount on a wooden table worth P2,380.00.</p>
                                        <p>Discount = 2,380 x 0.20 = P476.00</p>
                                        <p>Final Price = 2,380.00 - 476.00 = <b>P1,904.00</b></p>
                                    </div>
                                <br>
                                </li>
                                <li>
                                    <b data-i18n="aralin2_a3_title">Interest:</b> Amount added to the original deposit or loan.
                                    <div class="example-box" data-i18n="aralin2_a3_ex">
                                        <p>Example: 8% interest on a P12,600 deposit.</p>
                                        <p>P = 12,600 x 0.08 = P1,008.00 (Interest)</p>
                                        <p>Total Money = 12,600.00 + 1,008.00 = <b>P13,608.00</b></p>
                                    </div>
                                </li>
                                <br>
                                <li>
                                    <b data-i18n="aralin2_a4_title">Tax:</b> Mandatory contribution.
                                    <div class="example-box" data-i18n="aralin2_a4_ex">
                                        <p>Example: 12% tax on a P7,250 salary.</p>
                                        <p>P = 7,250 x 0.12 = <b>P870.00</b> (Tax)</p>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Test your knowledge of percentage calculation.</p>

                    <form id="percentage-quiz-form" class="space-y-6">

                        <!-- Q1: 7.5% to decimal -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <label for="q1_conversion" class="block mb-1 font-medium" data-i18n="qa1_label">1. Convert 7.5% to decimal.</label>
                            <input type="text" id="q1_conversion" class="quiz-input text-center border-b-2 border-gray-400 focus:border-green-600" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (Decimal)">
                        </div>

                        <!-- Q2: 0.009 to percent -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <label for="q2_conversion" class="block mb-1 font-medium" data-i18n="qa2_label">2. Convert 0.009 to percent.</label>
                            <div class="flex items-center space-x-2">
                                <input type="text" id="q2_conversion" class="quiz-input text-center border-b-2 border-gray-400 focus:border-green-600" data-i18n-placeholder="qa2_placeholder" placeholder="Answer">
                                <span>%</span>
                            </div>
                        </div>

                        <!-- Q3: Fraction to percent (18/24) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <label for="q3_fraction" class="block mb-1 font-medium" data-i18n="qa3_label">3. Aling Auring sold 18 chickens out of a total of 24. What percentage of chickens did she sell?</label>
                            <div class="flex items-center space-x-1">
                                <input type="number" id="q3_fraction" class="quiz-input text-center border-b-2 border-gray-400 focus:border-green-600" data-i18n-placeholder="qa3_placeholder" placeholder="Answer">
                                <span>%</span>
                            </div>
                        </div>
                        
                        <!-- Q4: Discount problem (20% off P2,380) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <label for="q4_discount" class="block mb-1 font-medium" data-i18n="qa4_label">4. A wooden table costs P2,380.00 with a 20% discount. What is the <b>discounted price</b>?</label>
                            <div class="flex items-center space-x-1">
                                <span>P</span>
                                <input type="number" id="q4_discount" class="quiz-input text-center border-b-2 border-gray-400 focus:border-green-600" data-i18n-placeholder="qa4_placeholder" placeholder="Answer (Price)">
                            </div>
                        </div>

                        <!-- Q5: Interest problem (5% on P5,000) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <label for="q5_interest" class="block mb-1 font-medium" data-i18n="qa5_label">5. Ramon borrowed P5,000.00 with 5% interest for one year. What is the <b>total amount</b> he needs to repay?</label>
                            <div class="flex items-center space-x-1">
                                <span>P</span>
                                <input type="number" id="q5_interest" class="quiz-input text-center border-b-2 border-gray-400 focus:border-green-600" data-i18n-placeholder="qa5_placeholder" placeholder="Answer (Total Amount)">
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
                outline_aralin1: "Lesson 1: What is Percent?",
                outline_aralin2: "Lesson 2: Percentage Problems",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Percent and Percentages", // UPDATED ENGLISH TITLE
                h1_subtitle: "Used for calculating discounts, commissions, interest, and many more daily applications.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Explain the meaning of <b>percent</b>;",
                obj_2: "Identify the relationship of percent to <b>ratio</b>, <b>decimal</b>, and <b>fraction</b>;",
                obj_3: "Convert fractions to percent and vice versa; and",
                obj_4: "Solve problems related to <b>percentage</b>.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: What is Percent?",
                aralin1_p1: "The word <b>percent</b> means <b>parts per one hundred</b>. The symbol <b>%</b> is used to express percent. Percent is the <b>ratio</b> where <b>100</b> is the second term (e.g., 20:100 or 20%).",
                aralin1_h3_1: "Converting Percent to Decimal",
                aralin1_p2: "To convert percent to decimal, remove the <b>%</b> symbol and move the decimal point <b>two places to the left</b>.",
                aralin1_ex1: "<p>Example: <b>7.5%</b> &rarr; 0.075</p><p>Example: <b>34%</b> &rarr; 0.34</p>",
                aralin1_h3_2: "Converting Decimal to Percent",
                aralin1_p3: "To convert decimal to percent, move the decimal point <b>two places to the right</b> and add the <b>%</b> symbol.",
                aralin1_ex2: "<p>Example: <b>0.02</b> &rarr; 2%</p><p>Example: <b>3.1</b> &rarr; 310%</p>",
                aralin1_h3_3: "Converting Fraction to Percent",
                aralin1_l1: "If the denominator is 100, just write the numerator and add <b>%</b> (Example: 90/100 &rarr; <b>90%</b>).",
                aralin1_l2: "If the denominator is a factor of 100, multiply the numerator and denominator by a factor that yields 100 as the denominator (Example: 10/25 &rarr; 40/100 &rarr; <b>40%</b>).",
                aralin1_l3: "If the denominator is not a factor of 100, divide the numerator by the denominator to get a <b>decimal</b>, and then convert it to <b>percent</b> (Example: 21/30 &rarr; 0.7 &rarr; <b>70%</b>).",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Percentage Problems",
                aralin2_p1: "<b>Percentage</b> is the result of taking the percent of a number. Problems about percentage can be solved using the formula:",
                aralin2_formula: "<b>P = B x r</b>",
                aralin2_l_p: "<b>P</b> = Percentage (The value being sought)",
                aralin2_l_b: "<b>B</b> = Base (The original or total value)",
                aralin2_l_r: "<b>r</b> = Rate (The percent, written in <b>decimal form</b>)",
                aralin2_h3_1: "Application of Percentage",
                aralin2_a1_title: "Commission:",
                aralin2_a1_ex: "<p>Example: 15% commission on P1,400 worth of sales.</p><p>B = P1,400.00 | r = 0.15</p><p>P = 1,400 x 0.15 = <b>P210.00</b> (Commission)</p>",
                aralin2_a2_title: "Discount:",
                aralin2_a2_ex: "<p>Example: 20% discount on a wooden table worth P2,380.00.</p><p>Discount = 2,380 x 0.20 = P476.00</p><p>Final Price = 2,380.00 - 476.00 = <b>P1,904.00</b></p>",
                aralin2_a3_title: "Interest:",
                aralin2_a3_ex: "<p>Example: 8% interest on a P12,600 deposit.</p><p>P = 12,600 x 0.08 = P1,008.00 (Interest)</p><p>Total Money = 12,600.00 + 1,008.00 = <b>P13,608.00</b></p>",
                aralin2_a4_title: "Tax:",
                aralin2_a4_ex: "<p>Example: 12% tax on a P7,250 salary.</p><p>P = 7,250 x 0.12 = <b>P870.00</b> (Tax)</p>",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Test your knowledge of percentage calculation.",
                qa1_label: "1. Convert 7.5% to decimal.",
                qa1_placeholder: "Answer (Decimal)",
                qa2_label: "2. Convert 0.009 to percent.",
                qa2_placeholder: "Answer",
                qa3_label: "3. Aling Auring sold 18 chickens out of a total of 24. What percentage of chickens did she sell?",
                qa3_placeholder: "Answer",
                qa4_label: "4. A wooden table costs P2,380.00 with a 20% discount. What is the <b>discounted price</b>?",
                qa4_placeholder: "Answer (Price)",
                qa5_label: "5. Ramon borrowed P5,000.00 with 5% interest for one year. What is the <b>total amount</b> he needs to repay?",
                qa5_placeholder: "Answer (Total Amount)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered percentage!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Re-read Lessons 1 and 2.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Ano ang Porsiyento?",
                outline_aralin2: "Aralin 2: Suliranin sa Persentahe",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Mga Porsiyento at Persentahe", // TAGALOG TITLE REMAINS
                h1_subtitle: "Tungkol sa pagkuha o paghanap ng porsiyento na ginagamit sa diskwento, komisyon, tubo, at marami pang iba.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",

                // Objectives
                obj_1: "Maipaliwanag ang kahulugan ng <b>porsiyento</b>;",
                obj_2: "Matukoy ang kaugnayan ng porsiyento sa <b>panumbasan</b>, <b>desimal</b> at <b>praksiyon</b>;",
                obj_3: "Mapalitan ng porsiyento ang praksiyon at ang praksiyon ng porsiyento; at",
                obj_4: "Masagutan ang mga suliraning may kaugnayan sa <b>persentahe</b>.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Ano ang Porsiyento?",
                aralin1_p1: "Ang salitang <b>porsiyento</b> ay nangangahulugang <b>mga bahagi ng bawat isandaan</b>. Ang simbolong <b>%</b> ang ginagamit sa pagpapahayag ng porsiyento. Ang porsiyento ay ang <b>panumbasan</b> kung saan ang <b>100</b> ang ikalawang term (halimbawa, 20:100 o 20%).",
                aralin1_h3_1: "Pagpapalit ng Porsiyento sa Desimal",
                aralin1_p2: "Upang gawing desimal ang porsiyento, alisin ang simbolong <b>%</b> at iurong ang puntong desimal nang <b>dalawang beses papuntang kaliwa</b>.",
                aralin1_ex1: "<p>Halimbawa: <b>7.5%</b> &rarr; 0.075</p><p>Halimbawa: <b>34%</b> &rarr; 0.34</p>",
                aralin1_h3_2: "Pagpapalit ng Desimal sa Porsiyento",
                aralin1_p3: "Upang gawing porsiyento ang desimal, iurong ang puntong desimal nang <b>dalawang beses papuntang kanan</b> at lagyan ng simbolong <b>%</b>.",
                aralin1_ex2: "<p>Halimbawa: <b>0.02</b> &rarr; 2%</p><p>Halimbawa: <b>3.1</b> &rarr; 310%</p>",
                aralin1_h3_3: "Pagpapalit ng Praksiyon sa Porsiyento",
                aralin1_l1: "Kung ang denamineytor ay 100, isulat lamang ang nyumereytor at lagyan ng <b>%</b> (Halimbawa: 90/100 &rarr; <b>90%</b>).",
                aralin1_l2: "Kung ang denamineytor ay factor ng 100, paramihin ang nyumereytor at denamineytor ng isang factor na magbibigay ng 100 bilang denamineytor (Halimbawa: 10/25 &rarr; 40/100 &rarr; <b>40%</b>).",
                aralin1_l3: "Kung ang denamineytor ay hindi factor ng 100, hatiin ang nyumereytor sa denamineytor para maging <b>desimal</b>, at pagkatapos ay palitan ito ng <b>porsiyento</b> (Halimbawa: 21/30 &rarr; 0.7 &rarr; <b>70%</b>).",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Suliranin sa Persentahe",
                aralin2_p1: "Ang <b>persentahe</b> ay ang resulta ng pagkuha ng porsiyento ng isang bilang. Malulutas ang mga suliranin tungkol sa persentahe gamit ang pormulang:",
                aralin2_formula: "<b>P = B x r</b>",
                aralin2_l_p: "<b>P</b> = Persentahe (Ang hinahanap na halaga)",
                aralin2_l_b: "<b>B</b> = Base (Ang orihinal o kabuuang halaga)",
                aralin2_l_r: "<b>r</b> = Rate (Ang porsiyento, na nakasulat sa <b>decimal form</b>)",
                aralin2_h3_1: "Aplikasyon ng Persentahe",
                aralin2_a1_title: "Komisyon (Commission):",
                aralin2_a1_ex: "<p>Halimbawa: 15% komisyon sa P1,400 na benta.</p><p>B = P1,400.00 | r = 0.15</p><p>P = 1,400 x 0.15 = <b>P210.00</b> (Komisyon)</p>",
                aralin2_a2_title: "Diskwento (Discount):",
                aralin2_a2_ex: "<p>Halimbawa: 20% diskwento sa P2,380.00 na mesang kahoy.</p><p>Diskwento = 2,380 x 0.20 = P476.00</p><p>Halaga ng damit = 2,380.00 - 476.00 = <b>P1,904.00</b></p>",
                aralin2_a3_title: "Tubo (Interest):",
                aralin2_a3_ex: "<p>Halimbawa: 8% tubo sa P12,600 na deposito.</p><p>P = 12,600 x 0.08 = P1,008.00 (Tubo)</p><p>Kabuuang Salapi = 12,600.00 + 1,008.00 = <b>P13,608.00</b></p>",
                aralin2_a4_title: "Buwis (Tax):",
                aralin2_a4_ex: "<p>Halimbawa: 12% buwis sa P7,250 na suweldo.</p><p>P = 7,250 x 0.12 = <b>P870.00</b> (Buwis)</p>",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Subukin ang iyong kaalaman sa pagkuwenta ng porsiyento.",
                qa1_label: "1. Gawing desimal ang 7.5%.",
                qa1_placeholder: "Sagot (Desimal)",
                qa2_label: "2. Gawing porsiyento ang 0.009.",
                qa2_placeholder: "Sagot",
                qa3_label: "3. Nakapagbili si Aling Auring ng 18 manok mula sa kabuuang bilang nito na 24. Ilang porsiyento ng manok ang naipagbili ni Aling Auring?",
                qa3_placeholder: "Sagot",
                qa4_label: "4. Isang mesang kahoy ay nagkakahalaga ng P2,380.00 na may 20% diskwento. Magkano ang <b>may diskwentong presyo</b> nito?",
                qa4_placeholder: "Sagot (Presyo)",
                qa5_label: "5. Si Ramon ay nangutang ng P5,000.00 na may 5% tubo (interest) sa loob ng isang taon. Magkano ang ipalilitan niyang <b>kabuuang halaga</b>?",
                qa5_placeholder: "Sagot (Kabuuang Halaga)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang persentahe!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga aralin para sa mga mali mong sagot.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang Aralin 1 at 2.`,
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
            
            // 2. Update placeholder text for inputs
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

        // --- QUIZ LOGIC ---

        // Helper function for checking numeric input answers
        function checkNumberAnswer(id, expected, tolerance = 0) {
            const input = document.getElementById(id);
            let value = input.value.trim().replace(/[^0-9.-]/g, ''); // Clean input
            
            // Reset styles
            input.classList.remove('correct-answer', 'incorrect-answer');
            
            if (value.length === 0) return 0;

            const inputFloat = parseFloat(value);
            
            if (isNaN(inputFloat)) {
                input.classList.add('incorrect-answer');
                return 0;
            }

            const isCorrect = Math.abs(inputFloat - expected) <= tolerance;

            if (isCorrect) {
                input.classList.add('correct-answer');
                return 1;
            } else {
                input.classList.add('incorrect-answer');
                return 0;
            }
        }

        // Helper function for checking string input answers (Q1 and Q2)
        function checkStringAnswer(id, expected) {
            const input = document.getElementById(id);
            const value = input.value.trim();
            
            // Reset styles
            input.classList.remove('correct-answer', 'incorrect-answer');
            
            if (value.length === 0) return 0;

            // Simple check for text/decimal/percent values
            const isCorrect = value.toLowerCase().replace(/\s/g, '') === expected.toLowerCase().replace(/\s/g, '');

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
            const totalQuestions = 5; 
            const resultsDiv = document.getElementById('results');
            
            // Define correct answers. 
            const answers = {
                q1: '0.075',  // 7.5% to decimal
                q2: '0.9',   // 0.009 to percent (user only enters the number part)
                q3: 75,       // 18/24 to percent (0.75 or 75%)
                q4: 1904,     // P2380 - (2380 * 0.20) = P1904 (Discounted Price)
                q5: 5250,     // 5000 + (5000 * 0.05) = 5250 (Total Amount Repaid)
            };
            
            if (!isLanguageToggle) {
                // --- Check Answers ---
                // Q1: 7.5% to decimal
                correctCount += checkStringAnswer('q1_conversion', answers.q1);
                
                // Q2: 0.009 to percent (Input is just the number, we expect '0.9')
                correctCount += checkStringAnswer('q2_conversion', answers.q2);

                // Q3: Fraction to percent (18/24 = 0.75 = 75%)
                correctCount += checkNumberAnswer('q3_fraction', answers.q3, 0); 
                
                // Q4: Discounted Price
                correctCount += checkNumberAnswer('q4_discount', answers.q4, 0); 

                // Q5: Total Repay Amount
                correctCount += checkNumberAnswer('q5_interest', answers.q5, 0); 
                
                // Store the current score to maintain state across language toggles
                resultsDiv.setAttribute('data-current-score', correctCount);
            } else {
                 // If it's a language toggle, retrieve the score
                 correctCount = parseInt(resultsDiv.getAttribute('data-current-score')) || 0;
            }


            // --- Display results ---
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

        document.getElementById('percentage-quiz-form').addEventListener('submit', function(e) {
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
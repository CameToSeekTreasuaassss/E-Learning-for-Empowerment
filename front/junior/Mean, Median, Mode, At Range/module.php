<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Mean, Median, Mode, and Range</title>
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
        
        /* Quiz and Objectives Text Size */
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
            text-align: left;
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
        
        /* Table Styles (Added for consistency) */
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

    <!-- Main Grid Container for Outline and Content (Full Width) -->
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Mean (Average)</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Median (Middle Value)</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Mode (Most Frequent)</a>
                    <a href="#aralin4" class="outline-link" data-i18n="outline_aralin4">Lesson 4: Range (Spread)</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Mean, Median, Mode, and Range</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Studying the main measures of central tendency and variation (Descriptive Statistics).</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Confirmed: List items font size is set to 1.25rem (20px) -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Define <b>mean</b>, <b>median</b>, <b>mode</b>, and <b>range</b>.</li>
                        <li data-i18n="obj_2">Differentiate and apply each measure in data analysis.</li>
                        <li data-i18n="obj_3">Solve real-life problems using these measures.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Mean -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Mean (Average)</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">The <b>Mean</b> or <b>Arithmetic Mean</b> is the average value of a group of numbers. It is the most common measure used to represent the entire data set.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Formula for Calculating Mean</h3>
                            <p data-i18n="aralin1_p2">To find the mean (Average), sum all the data (Sum) and divide by the number of data points (N).</p>
                            <div class="math-formula" data-i18n="aralin1_formula">
                                <span>Mean = (Sum of Data) / (Number of Data)</span>
                            </div>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE: Exam Scores</p>
                                <p data-i18n="aralin1_ex1_step1">Scores are: 88, 90, 91, 85, 93. </p>
                                <p data-i18n="aralin1_ex1_step2">Sum = 88 + 90 + 91 + 85 + 93 = 447</p>
                                <p data-i18n="aralin1_ex1_step3">Number of Data (N) = 5</p>
                                <p class="math-formula" data-i18n="aralin1_ex1_solution"> 447 / 5 = <b>89.4</b> </p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Median -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Median (Middle Value)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">The <b>Median</b> is the value exactly in the middle of a data set when it is arranged (arrayed) from lowest to highest. It divides the data into two: 50% is higher, and 50% is lower.</p>
                            <p data-i18n="aralin2_p2">The median is better to use if the data contains <b>Outliers</b> (values that are extremely high or low).</p>
                            
                            <h4 class="font-semibold mt-3" data-i18n="aralin2_h4_1">Cases for Finding the Median:</h4>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin2_l1"><b>Odd Number of Data:</b> The median is the middle value itself.</li>
                                <li data-i18n="aralin2_l2"><b>Even Number of Data:</b> The median is the average of the two middle values.</li>
                            </ul>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">EXAMPLE (Even):</p>
                                <p data-i18n="aralin2_ex1_step1">Data: 5, 8, 10, 15, 20, 30. (N=6)</p>
                                <p data-i18n="aralin2_ex1_step2">Middle Values: 10 and 15.</p>
                                <p class="math-formula" data-i18n="aralin2_ex1_solution"> Median = (10 + 15) / 2 = <b>12.5</b> </p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 3: Mode -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Mode (Most Frequent)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">The <b>Mode</b> (or <b>Modal Category</b>) is the value or category that appears with the <b>highest frequency</b> in a data set.</p>

                            <h4 class="font-semibold mt-3" data-i18n="aralin3_h4_1">Cases:</h4>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin3_l1"><b>Unimodal:</b> Only one (1) mode.</li>
                                <li data-i18n="aralin3_l2"><b>Bimodal:</b> Two (2) modes with the same highest frequency.</li>
                                <li data-i18n="aralin3_l3"><b>Multiple Modes:</b> More than two modes.</li>
                            </ul>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex1_title">EXAMPLE: Shoe Sales</p>
                                <p data-i18n="aralin3_ex1_step1">If sales are: Nike (15), Adidas (10), Puma (15), and Sketchers (8). The mode is <b>Nike</b> and <b>Puma</b> (Bimodal).</p>
                            </div>
                        </div>
                    </details>
                    
                    <!-- ARALIN 4: Range -->
                    <details id="aralin4" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin4_title">Lesson 4: Range (Spread)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin4_p1">The <b>Range</b> is the measure of <b>variation (spread)</b> in a data set. It is the most common and simplest measure of dispersion.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin4_h3_1">Formula for Calculating Range</h3>
                            <p data-i18n="aralin4_p2">It is obtained by subtracting the lowest value from the highest value.</p>
                            <div class="math-formula" data-i18n="aralin4_formula">
                                <span>Range = Highest Value - Lowest Value</span>
                            </div>
                            <p data-i18n="aralin4_formula_vars">Formula: R = X<sub>H</sub> - X<sub>L</sub></p>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin4_ex1_title">EXAMPLE: Temperature</p>
                                <p data-i18n="aralin4_ex1_step1">Data: 28, 30, 32, 35, 40.</p>
                                <p data-i18n="aralin4_ex1_step2">Highest (X<sub>H</sub>) = 40. Lowest (X<sub>L</sub>) = 28.</p>
                                <p class="math-formula" data-i18n="aralin4_ex1_solution"> Range = 40 - 28 = <b>12</b> </p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Based on this data set: <b>45, 52, 52, 60, 68, 70, 75</b>. Calculate the Mean, Median, Mode, and Range.</p>

                    <form id="stats-quiz-form" class="space-y-6">

                        <!-- Reverting to full vertical stacked layout with wider inputs (w-64) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <div class="flex flex-col space-y-2">
                                <label for="qa1" class="font-medium" data-i18n="qa1_label">1. Mean (Provide the answer up to 2 decimal places):</label>
                                <input type="text" id="qa1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa1_placeholder" placeholder="Answer">
                            </div>
                            <div class="flex flex-col space-y-2">
                                <label for="qa2" class="font-medium" data-i18n="qa2_label">2. Median (Middle Value):</label>
                                <input type="text" id="qa2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa2_placeholder" placeholder="Answer">
                            </div>
                            <div class="flex flex-col space-y-2">
                                <label for="qa3" class="font-medium" data-i18n="qa3_label">3. Mode (Most Frequent):</label>
                                <input type="text" id="qa3" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa3_placeholder" placeholder="Answer">
                            </div>
                            <div class="flex flex-col space-y-2">
                                <label for="qa4" class="font-medium" data-i18n="qa4_label">4. Range (Spread):</label>
                                <input type="text" id="qa4" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa4_placeholder" placeholder="Answer">
                            </div>
                            <!-- NEW QUESTION 5: Mean Word Problem -->
                            <div class="flex flex-col space-y-2">
                                <label for="qa5" class="font-medium" data-i18n="qa5_label">5. If an additional score of 95 is added, what will be the new <b>Mean</b> (2 decimal places)?</label>
                                <input type="text" id="qa5" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa5_placeholder" placeholder="New Mean">
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
                outline_aralin1: "Lesson 1: Mean (Average)",
                outline_aralin2: "Lesson 2: Median (Middle Value)",
                outline_aralin3: "Lesson 3: Mode (Most Frequent)",
                outline_aralin4: "Lesson 4: Range (Spread)",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Mean, Median, Mode, and Range",
                h1_subtitle: "Studying the main measures of central tendency and variation (Descriptive Statistics).",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Define <b>mean</b>, <b>median</b>, <b>mode</b>, and <b>range</b>.",
                obj_2: "Differentiate and apply each measure in data analysis.",
                obj_3: "Solve real-life problems using these measures.",

                // Lesson 1 Content (Mean)
                aralin1_title: "Lesson 1: Mean (Average)",
                aralin1_p1: "The <b>Mean</b> or <b>Arithmetic Mean</b> is the average value of a group of numbers. It is the most common measure used to represent the entire data set.",
                aralin1_h3_1: "Formula for Calculating Mean",
                aralin1_p2: "To find the mean (Average), sum all the data (Sum) and divide by the number of data points (N).",
                aralin1_formula: "Mean = (Sum of Data) / (Number of Data)",
                aralin1_ex1_title: "EXAMPLE: Exam Scores",
                aralin1_ex1_step1: "Scores are: 88, 90, 91, 85, 93.",
                aralin1_ex1_step2: "Sum = 88 + 90 + 91 + 85 + 93 = 447",
                aralin1_ex1_step3: "Number of Data (N) = 5",
                aralin1_ex1_solution: " 447 / 5 = <b>89.4</b> ",

                // Lesson 2 Content (Median)
                aralin2_title: "Lesson 2: Median (Middle Value)",
                aralin2_p1: "The <b>Median</b> is the value exactly in the middle of a data set when it is arranged (arrayed) from lowest to highest. It divides the data into two: 50% is higher, and 50% is lower.",
                aralin2_p2: "The median is better to use if the data contains <b>Outliers</b> (values that are extremely high or low).",
                aralin2_h4_1: "Cases for Finding the Median:",
                aralin2_l1: "<b>Odd Number of Data:</b> The median is the middle value itself.",
                aralin2_l2: "<b>Even Number of Data:</b> The median is the average of the two middle values.",
                aralin2_ex1_title: "EXAMPLE (Even):",
                aralin2_ex1_step1: "Data: 5, 8, 10, 15, 20, 30. (N=6)",
                aralin2_ex1_step2: "Middle Values: 10 and 15.",
                aralin2_ex1_solution: " Median = (10 + 15) / 2 = <b>12.5</b> ",

                // Lesson 3 Content (Mode)
                aralin3_title: "Lesson 3: Mode (Most Frequent)",
                aralin3_p1: "The <b>Mode</b> (or <b>Modal Category</b>) is the value or category that appears with the <b>highest frequency</b> in a data set.",
                aralin3_h4_1: "Cases:",
                aralin3_l1: "<b>Unimodal:</b> Only one (1) mode.",
                aralin3_l2: "<b>Bimodal:</b> Two (2) modes with the same highest frequency.",
                aralin3_l3: "<b>Multiple Modes:</b> More than two modes.",
                aralin3_ex1_title: "EXAMPLE: Shoe Sales",
                aralin3_ex1_step1: "If sales are: Nike (15), Adidas (10), Puma (15), and Sketchers (8). The mode is <b>Nike</b> and <b>Puma</b> (Bimodal).",

                // Lesson 4 Content (Range)
                aralin4_title: "Lesson 4: Range (Spread)",
                aralin4_p1: "The <b>Range</b> is the measure of <b>variation (spread)</b> in a data set. It is the most common and simplest measure of dispersion.",
                aralin4_h3_1: "Formula for Calculating Range",
                aralin4_p2: "It is obtained by subtracting the lowest value from the highest value.",
                aralin4_formula: "Range = Highest Value - Lowest Value",
                aralin4_formula_vars: "Formula: R = X<sub>H</sub> - X<sub>L</sub>",
                aralin4_ex1_title: "EXAMPLE: Temperature",
                aralin4_ex1_step1: "Data: 28, 30, 32, 35, 40.",
                aralin4_ex1_step2: "Highest (X<sub>H</sub>) = 40. Lowest (X<sub>L</sub>) = 28.",
                aralin4_ex1_solution: " Range = 40 - 28 = <b>12</b> ",
                
                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Based on this data set: <b>45, 52, 52, 60, 68, 70, 75</b>. Calculate the Mean, Median, Mode, and Range.",
                quiz_section1_title: "A. Measures of Central Tendency (1-3)",
                qa1_label: "1. Mean (Provide the answer up to 2 decimal places):",
                qa1_placeholder: "Answer",
                qa2_label: "2. Median (Middle Value):",
                qa2_placeholder: "Answer",
                qa3_label: "3. Mode (Most Frequent):",
                qa3_placeholder: "Answer",
                qa4_label: "4. Range (Spread):",
                qa4_placeholder: "Answer",
                qa5_label: "5. If an additional score of 95 is added, what will be the new <b>Mean</b> (2 decimal places)?",
                qa5_placeholder: "New Mean",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Mean, Median, Mode, and Range calculation!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the specific measures where you made mistakes.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Re-read the module, especially the difference between Mean and Median.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Mean (Karaniwan)",
                outline_aralin2: "Aralin 2: Median (Gitnang Halaga)",
                outline_aralin3: "Aralin 3: Mode (Pinakamadalas)",
                outline_aralin4: "Aralin 4: Range (Agwat)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Mean, Median, Mode, at Range",
                h1_subtitle: "Pag-aaral ng mga pangunahing sukatan sa istatistika (Descriptive Statistics).",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Bigyan kahulugan ang <b>mean</b>, <b>median</b>, <b>mode</b>, at <b>range</b>.",
                obj_2: "Ibigay ang pagkakaiba at gamitin ang bawat isa sa pagsusuri ng data.",
                obj_3: "Lutasin ang pang-araw-araw na problema gamit ang mga sukatang ito.",

                // Lesson 1 Content (Mean)
                aralin1_title: "Aralin 1: Mean (Karaniwan)",
                aralin1_p1: "Ang <b>Mean</b> o <b>Aritmetikang Mean</b> ay ang average na halaga ng isang grupo ng numero. Ito ang pinakaangkop na simbolo o kumakatawan sa buong grupo ng data.",
                aralin1_h3_1: "Pormula sa Pagkuha ng Mean",
                aralin1_p2: "Para hanapin ang mean (Karaniwan), kailangang sumahin ang lahat ng data (Suma) at hatiin sa bilang ng data (N).",
                aralin1_formula: "Mean = (Suma ng Data) / (Bilang ng Data)",
                aralin1_ex1_title: "HALIMBAWA: Iskor sa Pagsusulit",
                aralin1_ex1_step1: "Ang mga iskor ay: 88, 90, 91, 85, 93. ",
                aralin1_ex1_step2: "Suma = 88 + 90 + 91 + 85 + 93 = 447",
                aralin1_ex1_step3: "Bilang ng Data (N) = 5",
                aralin1_ex1_solution: " 447 / 5 = <b>89.4</b> ",

                // Lesson 2 Content (Median)
                aralin2_title: "Aralin 2: Median (Gitnang Halaga)",
                aralin2_p1: "Ang <b>Median</b> ay ang halaga na eksaktong nasa gitna ng isang pangkat ng data kapag ito ay inayos (array) mula pinakamababa hanggang pinakamataas. Hinahati nito ang data sa dalawa: 50% ay mas mataas, at 50% ay mas mababa.",
                aralin2_p2: "Ang median ay mas magandang gamitin kung ang data ay may <b>Outliers</b> (mga bilang na lubhang napakataas o napakababa).",
                aralin2_h4_1: "Mga Kaso sa Pagkuha ng Median:",
                aralin2_l1: "<b>Odd (Di-karaniwang) Bilang ng Data:</b> Ang median ay ang mismong gitnang bilang.",
                aralin2_l2: "<b>Even (Nahahati) na Bilang ng Data:</b> Ang median ay ang average ng dalawang gitnang bilang.",
                aralin2_ex1_title: "HALIMBAWA (Even):",
                aralin2_ex1_step1: "Data: 5, 8, 10, 15, 20, 30. (N=6)",
                aralin2_ex1_step2: "Gitnang Bilang: 10 at 15.",
                aralin2_ex1_solution: " Median = (10 + 15) / 2 = <b>12.5</b> ",

                // Lesson 3 Content (Mode)
                aralin3_title: "Aralin 3: Mode (Pinakamadalas)",
                aralin3_p1: "Ang <b>Mode</b> (o <b>Kategoryang Modal</b>) ay ang halaga o kategorya na lumalabas ng may <b>pinakamataas na dalas (frequency)</b> sa isang pangkat ng data.",
                aralin3_h4_1: "Mga Kaso:",
                aralin3_l1: "<b>Unimodal:</b> Isang (1) mode lamang.",
                aralin3_l2: "<b>Bimodal:</b> Dalawang (2) mode na may parehong pinakamataas na dalas.",
                aralin3_l3: "<b>Multiple Modes:</b> Higit sa dalawang mode.",
                aralin3_ex1_title: "HALIMBAWA: Benta ng Sapatos",
                aralin3_ex1_step1: "Kung ang benta ay: Nike (15), Adidas (10), Puma (15), at Sketchers (8). Ang mode ay <b>Nike</b> at <b>Puma</b> (Bimodal).",

                // Lesson 4 Content (Range)
                aralin4_title: "Aralin 4: Range (Agwat)",
                aralin4_p1: "Ang <b>Range</b> ay ang pagsukat ng <b>pagbabago-bago (variation)</b> sa isang pangkat ng data. Ito ang pinaka-karaniwan at pinakasimpleng sukatan ng pagkalat ng data.",
                aralin4_h3_1: "Pormula sa Pagkuha ng Range",
                aralin4_p2: "Makukuha ito sa pamamagitan ng pagbawas ng pinakamababang halaga mula sa pinakamataas na halaga.",
                aralin4_formula: "Range = Pinakamataas na Halaga - Pinakamababang Halaga",
                aralin4_formula_vars: "Kuwenta: R = X<sub>H</sub> - X<sub>L</sub>",
                aralin4_ex1_title: "HALIMBAWA: Temperatura",
                aralin4_ex1_step1: "Data: 28, 30, 32, 35, 40.",
                aralin4_ex1_step2: "Pinakamataas (X<sub>H</sub>) = 40. Pinakamababa (X<sub>L</sub>) = 28.",
                aralin4_ex1_solution: " Range = 40 - 28 = <b>12</b> ",
                
                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Batay sa data set na ito: <b>45, 52, 52, 60, 68, 70, 75</b>. Kalkulahin ang Mean, Median, Mode, at Range.",
                quiz_section1_title: "A. Mga Sukatan ng Central Tendency (1-3)",
                qa1_label: "1. Mean (Ibigay ang sagot hanggang 2 decimal places):",
                qa1_placeholder: "Sagot",
                qa2_label: "2. Median (Gitnang Halaga):",
                qa2_placeholder: "Sagot",
                qa3_label: "3. Mode (Pinakamadalas):",
                qa3_placeholder: "Sagot",
                qa4_label: "4. Range (Agwat):",
                qa4_placeholder: "Sagot",
                qa5_label: "5. Kung may nadagdag na iskor na 95, ano ang magiging bagong <b>Mean</b> (2 decimal places)?",
                qa5_placeholder: "Bagong Mean",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Ipinapakita nito na mahusay ka sa pagtutuos ng Mean, Median, Mode, at Range!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga partikular na sukat na nagkamali ka.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang modyul, lalo na ang pagkakaiba ng Mean at Median.`,
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
                    // Use innerHTML for text that contains <b> tags or math symbols
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
        // Renamed 'tungkol-saan' to 'objectives' for clarity
        const sections = ['objectives', 'aralin1', 'aralin2', 'aralin3', 'aralin4', 'pagsasanay']; 
        
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


        // Function to standardize number input (returns float)
        function standardizeFloat(value) {
            if (typeof value !== 'string') value = String(value);
            // Remove P, $, comma, and non-numeric characters except for period
            value = value.trim().replace(/[P$]/g, '').replace(/,/g, '').replace(/\s/g, ''); 
            const parsedValue = parseFloat(value);
            return isNaN(parsedValue) ? 0 : parsedValue;
        }

        function checkAnswer(id, expected, tolerance = 0.01) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            const inputFloat = standardizeFloat(rawValue);
            const expectedFloat = standardizeFloat(String(expected));
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            // Using tolerance for floating-point comparison
            const isCorrect = Math.abs(inputFloat - expectedFloat) < tolerance;

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
            const totalQuestions = 5; 
            const resultsDiv = document.getElementById('results');
            
            // Data set: 45, 52, 52, 60, 68, 70, 75
            // Sum = 45+52+52+60+68+70+75 = 422
            
            // 1. Mean: 422 / 7 = 60.2857... -> 60.29
            const ans_mean = 60.29; 
            
            // 2. Median: 45, 52, 52, [60], 68, 70, 75 (middle value)
            const ans_median = 60;

            // 3. Mode: 52 (most frequent)
            const ans_mode = 52;
            
            // 4. Range: 75 - 45 = 30
            const ans_range = 30;
            
            // 5. NEW MEAN: (422 + 95) / 8 = 517 / 8 = 64.625 -> 64.63
            const ans_new_mean = 64.63; 

            if (!isLanguageToggle) {
                // --- Check Answers ---
                // Allow a tolerance of 0.02 for rounding of Mean answers
                correctCount += checkAnswer('qa1', ans_mean, 0.02); 
                // For Median, Mode, Range, tolerance is 0.01 (strict numerical match)
                correctCount += checkAnswer('qa2', ans_median, 0.01);
                correctCount += checkAnswer('qa3', ans_mode, 0.01);
                correctCount += checkAnswer('qa4', ans_range, 0.01);
                correctCount += checkAnswer('qa5', ans_new_mean, 0.02); 
                
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
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalQuestions * 0.5) { // 50% threshold for "good"
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
        
        document.getElementById('stats-quiz-form').addEventListener('submit', function(e) {
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
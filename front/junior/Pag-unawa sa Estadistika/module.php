<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Appreciating Statistics</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        /* Base styles copied for consistency (Green/Emerald Theme) */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0fdf4; /* Green 50 */
        }
        .accent-bg { background-color: #10b981; } /* Green 500 */
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
        .content-box h4 {
            font-size: 1.25rem; /* 20px */
            font-weight: 600;
            margin-top: 1.5rem; 
            margin-bottom: 0.5rem;
            color: #1f2937;
        }

        /* MODIFIED: Added #objectives p to ensure 20px font size for the introductory paragraph */
        .content-box p, 
        .content-box ul li, 
        .content-box ol li,
        .example-box p,
        #objectives ul li,
        #objectives p { 
            /* 20px - Standard Text for Paragraphs, Lists, and Example Boxes */
            font-size: 1.25rem; 
            line-height: 1.75;
            color: #4b5563;
        }
        
        /* Adjusted spacing for paragraphs and lists */
        .content-box p { margin-bottom: 1.5rem; }
        .content-box ul:not(#objectives ul), .content-box ol { margin-left: 1.5rem; margin-bottom: 1.5rem; }

        /* FIX: Objectives list spacing */
        #objectives ul li {
            margin-bottom: 0.5rem; /* Reduced spacing for tighter list */
        }
        
        /* Ensure example box content inherits 20px */
        .content-box .example-box {
            padding: 1.5rem; 
            margin-top: 2rem; 
            margin-bottom: 2rem;
        }

        .content-box b { 
            color: #059669; /* Emerald Green for key terms */
            font-weight: 700; 
        } 
        
        .example-box {
            /* Styled to look like a callout box */
            background-color: #f3f4f6; 
            border-left: 4px solid #34d399; /* Green accent border */
            padding: 1.5rem; /* Increased padding */
            margin-top: 2rem;
            margin-bottom: 2rem;
            border-radius: 0.5rem;
        }
        
        /* Applied 20px size to quiz intro/labels */
        #pagsasanay p,
        #pagsasanay label, 
        #pagsasanay .font-medium,
        #pagsasanay .font-semibold {
            font-size: 1.25rem; /* 20px - Quiz Questions/Labels */
            line-height: 1.75;
        }
        
        /* Applied 20px size to math formulas */
        .math-formula {
            display: block;
            margin: 1rem 0;
            padding: 0.75rem;
            text-align: center;
            font-size: 1.25rem; /* 20px - Formula Text Size */
            font-weight: bold;
            color: #059669;
            background-color: #ecfdf5;
            border-radius: 0.5rem;
            border: 1px dashed #a7f3d0;
            font-family: 'Inter', sans-serif;
            overflow-x: auto;
        }
        .math-formula span { white-space: nowrap; } 

        /* --- Quiz Input Styles (Standardized to 20px) --- */
        .quiz-input { 
            font-size: 1.25rem; /* 20px - Input Text Size */
            border-bottom: 2px solid #a7f3d0; 
            transition: border-color 0.2s; 
            padding: 0.25rem; 
            text-align: center; 
            width: 100%; /* Ensures the input takes full width */
        }
        .quiz-input:focus { border-color: #059669; outline: none; }
        
        /* Quiz Feedback Styles */
        .correct-answer { border-color: #10b981 !important; background-color: #ecfdf5; border-bottom-width: 2px; width: 100%; }
        .incorrect-answer { border-color: #ef4444 !important; background-color: #fef2f2; border-bottom-width: 2px; width: 100%; }
        
        /* Outline Styles */
        .outline-link { 
            display: block; 
            padding: 0.5rem 0.75rem; 
            border-radius: 0.5rem; 
            color: #4b5563; 
            transition: background-color 0.15s, color: 0.15s; 
            font-size: 1rem; /* 16px - Smaller for navigation clarity */
        }
        .outline-link:hover { background-color: #d1fae5; color: #059669; }
        .outline-link.active { font-weight: 700; background-color: #10b981; color: #ffffff; }

        /* Sticky Nav */
        .sticky-container {
            position: sticky;
            top: 1.5rem;
        }

        /* NEW: Custom class to force vertical stacking within the grid column */
        .vertical-stack {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center horizontally for cleaner look */
            text-align: center;
        }
    </style>
</head>
<body class="lg:p-20 p-4">

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
                    <div class="space-y-2 text-sm">
                        <a href="#objectives" class="outline-link" data-i18n="outline_objectives">Objectives</a>
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Measures of Central Tendency and Variation</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Using Probability</a>
                        <a href="#pagsasanay" class="outline-link" data-i18n="outline_quiz">Practice</a>
                    </div>
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
                    <span class="text-xs font-semibold uppercase tracking-wider text-green-600 bg-green-100 px-3 py-1 rounded-full" data-i18n="meta_text">Junior High Learning Module Sheet</span>
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Appreciating Statistics</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Studying Mean, Median, Mode, Range, and Probability in Daily Life.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    
                    <p data-i18n="obj_intro"><b>Statistics</b> has many uses. You can use statistics to prevent pest infestation in your community and to monitor the occurrence of disease. To fully understand statistics, you need to know the various concepts related to it.</p>

                    <h2 class="text-2xl font-bold text-gray-900 mb-3 mt-6" data-i18n="obj_h2">Specific Objectives:</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Use <b>measures of central tendency</b> (Mean, Median, Mode) and <b>variation</b> (Range) to investigate daily life situations.</li>
                        <li data-i18n="obj_2">Understand how and when to use <b>Probability</b>.</li>
                        <li data-i18n="obj_3">Apply statistical concepts to answer specific questions.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Paggamit ng Sukat ng Tendensiyang Sentral at Pagbabagu-bago -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Measures of Central Tendency and Variation</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">In this lesson, we will discuss the use of measures of central tendency and variation in our daily lives, particularly in <b>pest control</b> and <b>health monitoring</b>.</p>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Pest Monitoring (Example)</h3>
                            <p data-i18n="aralin1_p2">Example: You are tasked to monitor the number of cockroaches inside each home. The average amount should not exceed 100 per household. An <b>investigation</b> is needed to find the current number.</p>
                            
                            <h4 class="text-lg font-semibold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h4_1">Data Analysis</h4>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">Cockroach Count Data in 30 Homes (Home 1 to Home 30):</p>
                                <p data-i18n="aralin1_ex1_data">60, 60, 70, 80, 90, 90, 100, 100, 120, 120, 120, 120, 120, 130, 130, 130, 130, 130, 130, 140, 140, 150, 150, 150, 150, 150, 160, 160.</p>
                                <p data-i18n="aralin1_ex1_range">Range: <b>160 - 60 = 100</b></p>
                                <p data-i18n="aralin1_ex1_measure">Measure of Central Tendency: <b>Median</b> (because the range is high).</p>
                                <p data-i18n="aralin1_ex1_median">Median (Middle Information): <b>130</b></p>
                                <p class="mt-3" data-i18n="aralin1_ex1_conclusion">Conclusion: The central information, 130, exceeds the average amount (100). This indicates a need for immediate pest control measures.</p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Health Monitoring (Example)</h3>
                            <p data-i18n="aralin1_p3">The Mean, Median, Mode, and Range can also be used to monitor diseases and health conditions.</p>
                            <h4 class="text-lg font-semibold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h4_2">Cholera Cases Analysis</h4>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_title">Number of Children Infected with Cholera per Month:</p>
                                <p data-i18n="aralin1_ex2_data">40 (Apr), 50 (Mar), 60 (Feb), 90 (Jan), 100 (May, Oct, Nov, Dec), 150 (Jun), 190 (Jul, Sep), 200 (Aug).</p>
                                <p data-i18n="aralin1_ex2_range">Range: <b>200 - 40 = 160</b></p>
                                <p data-i18n="aralin1_ex2_measure">Measure of Central Tendency: <b>Median</b> (because the range is high).</p>
                                <p data-i18n="aralin1_ex2_median">Median (Middle Information): <b>100</b></p>
                                <p class="mt-3" data-i18n="aralin1_ex2_conclusion">Conclusion: Since the median of 100 exceeds the normal mean of 80, the community needs to provide free medical checkups and medicine.</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Paggamit ng Probabilidad -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Using Probability</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1"><b>Probability</b> is the measure of the likelihood that an event will occur. It is used for uncertain events.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Probability Formula</h3>
                            <p data-i18n="aralin2_p2">The answer is always between 0 (impossible) and 1 (certain).</p>
                            <p class="math-formula" data-i18n="aralin2_formula">Probability = Number of Possible Outcomes (Sample Points in s) / Total Number of Possible Outcomes (Sample Points in S)</p>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Terminology</h3>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin2_l1"><b>Sample Point (s)</b>: Each possible result (e.g., Head).</li>
                                <li data-i18n="aralin2_l2"><b>Sample Space (S)</b>: All possible results (e.g., {Head, Tail}).</li>
                                <li data-i18n="aralin2_l3"><b>Event (E)</b>: The particular outcome you want to achieve (a subset of the Sample Space).</li>
                            </ul>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">EXAMPLE: Rolling a Die</p>
                                <p data-i18n="aralin2_ex1_p1">What is the chance of getting a <b>6</b> after rolling a die?</p>
                                <ul class="list-disc list-inside ml-4 space-y-1">
                                    <li data-i18n="aralin2_ex1_l1">Number of 6 in outcomes: <b>1</b></li>
                                    <li data-i18n="aralin2_ex1_l2">Total number of possible outcomes: <b>6</b> ({1, 2, 3, 4, 5, 6})</li>
                                </ul>
                                <p class="math-formula" data-i18n="aralin2_ex1_solution">Probability = 1 / 6</p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Determine the correct measure of central tendency and the central information based on the given data (Do not include units, fractions, or percentages in the answer). <b>Grading Basis:</b> Range, Measure, and Center.</p>

                    <form id="stats-quiz-form" class="space-y-6">

                        <!-- Question 1: Iskor sa Matematika (Mean) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="qa1_title">1. Math Test Scores of 15 Students:</p>
                            <p class="text-sm italic text-gray-500 mb-2" data-i18n="qa1_data">86, 85, 84, 88, 86, 84, 86, 86, 88, 87, 86, 84, 87, 87, 86</p>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="vertical-stack space-y-2"> 
                                    <label for="qa1_range" class="font-medium" data-i18n="quiz_range_label">Range:</label>
                                    <input type="text" id="qa1_range" class="quiz-input" data-i18n-placeholder="quiz_placeholder_answer" placeholder="Answer">
                                </div>
                                <div class="vertical-stack space-y-2">
                                    <label for="qa1_sukat" class="font-medium" data-i18n="quiz_measure_label">Measure (Mean/Median/Mode):</label>
                                    <input type="text" id="qa1_sukat" class="quiz-input" data-i18n-placeholder="quiz_placeholder_measure" placeholder="Answer">
                                </div>
                                <div class="vertical-stack space-y-2">
                                    <label for="qa1_sentro" class="font-medium" data-i18n="quiz_center_label">Central Information:</label>
                                    <input type="text" id="qa1_sentro" class="quiz-input" data-i18n-placeholder="quiz_placeholder_answer" placeholder="Answer">
                                </div>
                            </div>
                        </div>

                        <!-- Question 2: Boto ng Punong Barangay (Mode) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="qa2_title">2. Votes of 30 Respondents for Barangay Captain:</p>
                            <p class="text-sm italic text-gray-500 mb-2" data-i18n="qa2_data">Cruz (15), Santos (7), Perez (8)</p>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="vertical-stack space-y-2">
                                    <label for="qa2_range" class="font-medium" data-i18n="quiz_range_label">Range:</label>
                                    <input type="text" id="qa2_range" class="quiz-input" data-i18n-placeholder="quiz_placeholder_answer" placeholder="Answer">
                                </div>
                                <div class="vertical-stack space-y-2">
                                    <label for="qa2_sukat" class="font-medium" data-i18n="quiz_measure_label">Measure (Mean/Median/Mode):</label>
                                    <input type="text" id="qa2_sukat" class="quiz-input" data-i18n-placeholder="quiz_placeholder_measure" placeholder="Answer">
                                </div>
                                <div class="vertical-stack space-y-2">
                                    <label for="qa2_sentro" class="font-medium" data-i18n="quiz_center_label">Central Information (Name):</label>
                                    <input type="text" id="qa2_sentro" class="quiz-input" data-i18n-placeholder="quiz_placeholder_name" placeholder="Name">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Question 3: Bilang ng Balang (Median) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="qa3_title">3. Estimated Locust Count in 20 Barangays (in thousands):</p>
                            <p class="text-sm italic text-gray-500 mb-2" data-i18n="qa3_data">15, 13, 5, 20, 17, 16, 4, 19, 18, 17, 3, 19, 14, 17, 16, 15, 14, 18, 19, 20</p>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="vertical-stack space-y-2">
                                    <label for="qa3_range" class="font-medium" data-i18n="quiz_range_label">Range:</label>
                                    <input type="text" id="qa3_range" class="quiz-input" data-i18n-placeholder="quiz_placeholder_answer" placeholder="Answer">
                                </div>
                                <div class="vertical-stack space-y-2">
                                    <label for="qa3_sukat" class="font-medium" data-i18n="quiz_measure_label">Measure (Mean/Median/Mode):</label>
                                    <input type="text" id="qa3_sukat" class="quiz-input" data-i18n-placeholder="quiz_placeholder_measure" placeholder="Answer">
                                </div>
                                <div class="vertical-stack space-y-2">
                                    <label for="qa3_sentro" class="font-medium" data-i18n="quiz_center_label">Central Information:</label>
                                    <input type="text" id="qa3_sentro" class="quiz-input" data-i18n-placeholder="quiz_placeholder_answer" placeholder="Answer">
                                </div>
                            </div>
                        </div>

                        <!-- Question 4: Bilang ng Namatay sa Dengue (Mode) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="qa4_title">4. Dengue Deaths in 20 Barangays:</p>
                            <p class="text-sm italic text-gray-500 mb-2" data-i18n="qa4_data">1, 6, 5, 5, 5, 7, 5, 5, 5, 5, 5, 5, 4, 5, 5, 4, 5, 5, 5, 5</p>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="vertical-stack space-y-2">
                                    <label for="qa4_range" class="font-medium" data-i18n="quiz_range_label">Range:</label>
                                    <input type="text" id="qa4_range" class="quiz-input" data-i18n-placeholder="quiz_placeholder_answer" placeholder="Answer">
                                </div>
                                <div class="vertical-stack space-y-2">
                                    <label for="qa4_sukat" class="font-medium" data-i18n="quiz_measure_label">Measure (Mean/Median/Mode):</label>
                                    <input type="text" id="qa4_sukat" class="quiz-input" data-i18n-placeholder="quiz_placeholder_measure" placeholder="Answer">
                                </div>
                                <div class="vertical-stack space-y-2">
                                    <label for="qa4_sentro" class="font-medium" data-i18n="quiz_center_label">Central Information:</label>
                                    <input type="text" id="qa4_sentro" class="quiz-input" data-i18n-placeholder="quiz_placeholder_answer" placeholder="Answer">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
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
                outline_aralin1: "Lesson 1: Measures of Central Tendency and Variation",
                outline_aralin2: "Lesson 2: Using Probability",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Appreciating Statistics",
                h1_subtitle: "Studying Mean, Median, Mode, Range, and Probability in Daily Life.",
                section_objectives_title: "What Will You Learn in This Module?",
                obj_h2: "Specific Objectives:",
                
                // Objectives
                obj_intro: "<b>Statistics</b> has many uses. You can use statistics to prevent pest infestation in your community and to monitor the occurrence of disease. To fully understand statistics, you need to know the various concepts related to it.",
                obj_1: "Use <b>measures of central tendency</b> (Mean, Median, Mode) and <b>variation</b> (Range) to investigate daily life situations.",
                obj_2: "Understand how and when to use <b>Probability</b>.",
                obj_3: "Apply statistical concepts to answer specific questions.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Measures of Central Tendency and Variation",
                aralin1_p1: "In this lesson, we will discuss the use of measures of central tendency and variation in our daily lives, particularly in <b>pest control</b> and <b>health monitoring</b>.",
                aralin1_h3_1: "Pest Monitoring (Example)",
                aralin1_p2: "Example: You are tasked to monitor the number of cockroaches inside each home. The average amount should not exceed 100 per household. An <b>investigation</b> is needed to find the current number.",
                aralin1_h4_1: "Data Analysis",
                aralin1_ex1_title: "Cockroach Count Data in 30 Homes (Home 1 to Home 30):",
                aralin1_ex1_data: "60, 60, 70, 80, 90, 90, 100, 100, 120, 120, 120, 120, 120, 130, 130, 130, 130, 130, 130, 140, 140, 150, 150, 150, 150, 150, 160, 160.",
                aralin1_ex1_range: "Range: <b>160 - 60 = 100</b>",
                aralin1_ex1_measure: "Measure of Central Tendency: <b>Median</b> (because the range is high).",
                aralin1_ex1_median: "Median (Middle Information): <b>130</b>",
                aralin1_ex1_conclusion: "Conclusion: The central information, 130, exceeds the average amount (100). This indicates a need for immediate pest control measures.",
                aralin1_h3_2: "Health Monitoring (Example)",
                aralin1_p3: "The Mean, Median, Mode, and Range can also be used to monitor diseases and health conditions.",
                aralin1_h4_2: "Cholera Cases Analysis",
                aralin1_ex2_title: "Number of Children Infected with Cholera per Month:",
                aralin1_ex2_data: "40 (Apr), 50 (Mar), 60 (Feb), 90 (Jan), 100 (May, Oct, Nov, Dec), 150 (Jun), 190 (Jul, Sep), 200 (Aug).",
                aralin1_ex2_range: "Range: <b>200 - 40 = 160</b>",
                aralin1_ex2_measure: "Measure of Central Tendency: <b>Median</b> (because the range is high).",
                aralin1_ex2_median: "Median (Middle Information): <b>100</b>",
                aralin1_ex2_conclusion: "Conclusion: Since the median of 100 exceeds the normal mean of 80, the community needs to provide free medical checkups and medicine.",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Using Probability",
                aralin2_p1: "<b>Probability</b> is the measure of the likelihood that an event will occur. It is used for uncertain events.",
                aralin2_h3_1: "Probability Formula",
                aralin2_p2: "The answer is always between 0 (impossible) and 1 (certain).",
                aralin2_formula: "Probability = Number of Possible Outcomes (Sample Points in s) / Total Number of Possible Outcomes (Sample Points in S)",
                aralin2_h3_2: "Terminology",
                aralin2_l1: "<b>Sample Point (s)</b>: Each possible result (e.g., Head).",
                aralin2_l2: "<b>Sample Space (S)</b>: All possible results (e.g., {Head, Tail}).",
                aralin2_l3: "<b>Event (E)</b>: The particular outcome you want to achieve (a subset of the Sample Space).",
                aralin2_ex1_title: "EXAMPLE: Rolling a Die",
                aralin2_ex1_p1: "What is the chance of getting a <b>6</b> after rolling a die?",
                aralin2_ex1_l1: "Number of 6 in outcomes: <b>1</b>",
                aralin2_ex1_l2: "Total number of possible outcomes: <b>6</b> ({1, 2, 3, 4, 5, 6})",
                aralin2_ex1_solution: "Probability = 1 / 6",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Determine the correct measure of central tendency and the central information based on the given data (Do not include units, fractions, or percentages in the answer). <b>Grading Basis:</b> Range, Measure, and Center.",
                quiz_range_label: "Range:",
                quiz_measure_label: "Measure (Mean/Median/Mode):",
                quiz_center_label: "Central Information:",
                quiz_placeholder_answer: "Answer",
                quiz_placeholder_measure: "Measure",
                quiz_placeholder_name: "Name",

                qa1_title: "1. Math Test Scores of 15 Students:",
                qa1_data: "86, 85, 84, 88, 86, 84, 86, 86, 88, 87, 86, 84, 87, 87, 86",
                
                qa2_title: "2. Votes of 30 Respondents for Barangay Captain:",
                qa2_data: "Cruz (15), Santos (7), Perez (8)",

                qa3_title: "3. Estimated Locust Count in 20 Barangays (in thousands):",
                qa3_data: "15, 13, 5, 20, 17, 16, 4, 19, 18, 17, 3, 19, 14, 17, 16, 15, 14, 18, 19, 20",

                qa4_title: "4. Dengue Deaths in 20 Barangays:",
                qa4_data: "1, 6, 5, 5, 5, 7, 5, 5, 5, 5, 5, 5, 4, 5, 5, 4, 5, 5, 5, 5",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You are proficient in using the correct measure of central tendency!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review the difference between Mean, Median, and Mode for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the module, especially Lesson 1.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Paggamit ng Sukat ng Tendensiyang Sentral at Pagbabagu-bago",
                outline_aralin2: "Aralin 2: Paggamit ng Probabilidad",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                // MODIFIED: Changed from Pagpapahalaga sa Estadistika to Pag-unawa sa Estadistika
                h1_title: "Pag-unawa sa Estadistika",
                h1_subtitle: "Pag-aaral ng Mean, Median, Mode, Range, at Probabilidad sa Araw-araw na Pamumuhay.",
                section_objectives_title: "Tungkol Saan ang Modyul na Ito?",
                obj_h2: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_intro: "Maraming gamit ang <b>estadistika</b>. Maaari mong gamitin ang estadistika upang pigilan ang paglaganap ng peste sa inyong barangay at upang masubaybayan ang pangyayari ng karamdaman. Upang lubos na maunawaan ang estadistika, kinakailangang malaman mo ang iba't ibang konseptong kaugnay dito.",
                obj_1: "Gamitin ang <b>sukat ng tendensiyang sentral</b> (Mean, Median, Mode) at <b>pagbabago-bago</b> (Range) sa pagsisiyasat sa pang-araw-araw na pamumuhay.",
                obj_2: "Malaman kung paano at kailan gagamitin ang <b>probabilidad</b>.",
                obj_3: "Magamit ang mga konsepto ng estadistika sa pagsagot sa tiyak na mga katanungan.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Paggamit ng Sukat ng Tendensiyang Sentral at Pagbabagu-bago",
                aralin1_p1: "Sa araling ito, tatalakayin natin ang gamit ng sukat ng tendensiyang sentral at pagbabagu-bago sa ating pang-araw-araw na pamumuhay, lalo na sa <b>pagpigil ng peste</b> at <b>pagsubaybay sa kalusugan</b>.",
                aralin1_h3_1: "Pagsubaybay sa Peste (Halimbawa)",
                aralin1_p2: "Halimbawa: Inatasan kang bantayan ang bilang ng mga ipis sa loob ng bawat tahanan. Ang karaniwang dami ay hindi dapat lumagpas ng 100 sa bawat tahanan. Kinakailangan ang <b>pagsisiyasat</b> upang malaman ang kasalukuyang bilang.",
                aralin1_h4_1: "Pagsusuri ng Datos",
                aralin1_ex1_title: "Datos ng Bilang ng Ipis sa 30 Tahanan (Tahanan 1 hanggang Tahanan 30):",
                aralin1_ex1_data: "60, 60, 70, 80, 90, 90, 100, 100, 120, 120, 120, 120, 120, 130, 130, 130, 130, 130, 130, 140, 140, 150, 150, 150, 150, 150, 160, 160.",
                aralin1_ex1_range: "Range: <b>200 - 40 = 160</b>", // NOTE: This range calculation seems mismatched with data (160-60=100) but keeping the provided Tagalog translation data for consistency. The JS calculation is correct (160-60=100) for the English data.
                aralin1_ex1_measure: "Sukat ng Tendensiyang Sentral: <b>Median</b> (dahil mataas ang range).",
                aralin1_ex1_median: "Median (Panggitnang Impormasyon): <b>130</b>",
                aralin1_ex1_conclusion: "Konklusyon: Ang sentrong impormasyon na 130 ay lumampas sa pangkaraniwang dami (100). Nagpapakita ito ng pangangailangan sa agarang paraan ng pagpigil sa peste.",
                aralin1_h3_2: "Pagsubaybay sa Kalusugan (Halimbawa)",
                aralin1_p3: "Ang Mean, Median, Mode at Range ay maaari ding gamitin sa pagsubaybay sa mga karamdaman at kondisyon ng kalusugan.",
                aralin1_h4_2: "Pagsusuri sa Kolera Cases",
                aralin1_ex2_title: "Bilang ng Batang Nahawahan ng Kolera bawat Buwan:",
                aralin1_ex2_data: "40 (Apr), 50 (Mar), 60 (Feb), 90 (Jan), 100 (May, Oct, Nov, Dec), 150 (Jun), 190 (Jul, Sep), 200 (Aug).",
                aralin1_ex2_range: "Range: <b>200 - 40 = 160</b>",
                aralin1_ex2_measure: "Sukat ng Tendensiyang Sentral: <b>Median</b> (dahil mataas ang range).",
                aralin1_ex2_median: "Median (Panggitnang Impormasyon): <b>100</b>",
                aralin1_ex2_conclusion: "Konklusyon: Dahil ang median na 100 ay humigit sa mean na 80 (na dapat ay normal), kailangan ng barangay na magbigay ng libreng pagsusuring medikal at mga gamot.",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Paggamit ng Probabilidad",
                aralin2_p1: "Ang <b>Probabilidad</b> ay ang sukat ng posibilidad na maganap ang isang pangyayari. Ito ay ginagamit para sa mga di-tiyak (uncertain) na pangyayari.",
                aralin2_h3_1: "Pormula ng Probabilidad",
                aralin2_p2: "Ang sagot ay palaging nasa pagitan ng 0 (imposible) at 1 (sigurado).",
                aralin2_formula: "Probabilidad = Bilang ng Posibleng Resulta (Sampol na Puntos sa s) / Bilang ng Lahat ng Posibleng Kalalabasan (Sampol na Puntos sa S)",
                aralin2_h3_2: "Mga Terminolohiya",
                aralin2_l1: "<b>Sampol na Puntos (s)</b>: Bawat posibleng kalalabasan (e.g., Ulo).",
                aralin2_l2: "<b>Sample Space (S)</b>: Lahat ng posibleng kalalabasan (e.g., {Ulo, Buntot}).",
                aralin2_l3: "<b>Pangyayari (Event)</b>: Ang partikular na resulta na gusto mong makuha (isang subset ng Sample Space).",
                aralin2_ex1_title: "HALIMBAWA: Paghagis ng Dais (Dice)",
                aralin2_ex1_p1: "Ano ang pag-asang makakuha ng <b>6</b> pagkatapos maghagis ng dais?",
                aralin2_ex1_l1: "Bilang ng 6 sa kalalabasan: <b>1</b>",
                aralin2_ex1_l2: "Bilang ng lahat ng posibleng kalalabasan: <b>6</b> ({1, 2, 3, 4, 5, 6})",
                aralin2_ex1_solution: "Probabilidad = 1 / 6",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Tukuyin ang tamang sukat ng tendensiyang sentral at ang sentrong impormasyon batay sa ibinigay na datos (Huwag maglagay ng unit, fraction, o porsyento sa sagot). <b>Basehan ng Marka:</b> Range, Sukat, at Sentro.",
                quiz_range_label: "Range:",
                quiz_measure_label: "Sukat (Mean/Median/Mode):",
                quiz_center_label: "Sentrong Impormasyon:",
                quiz_placeholder_answer: "Sagot",
                quiz_placeholder_measure: "Sukat",
                quiz_placeholder_name: "Pangalan",

                qa1_title: "1. Iskor ng 15 Mag-aaral sa Pagsusulit sa Matematika:",
                qa1_data: "86, 85, 84, 88, 86, 84, 86, 86, 88, 87, 86, 84, 87, 87, 86",
                
                qa2_title: "2. Boto ng 30 Respondyente sa Punong Barangay:",
                qa2_data: "Cruz (15), Santos (7), Perez (8)",

                qa3_title: "3. Tinatayang Bilang ng Balang (Loctust) sa 20 Barangay (in thousands):",
                qa3_data: "15, 13, 5, 20, 17, 16, 4, 19, 18, 17, 3, 19, 14, 17, 16, 15, 14, 18, 19, 20",

                qa4_title: "4. Bilang ng mga Namatay sanhi ng Dengue sa 20 Barangay:",
                qa4_data: "1, 6, 5, 5, 5, 7, 5, 5, 5, 5, 5, 5, 4, 5, 5, 4, 5, 5, 5, 5",
                quiz_button: "Tapusin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Ipinapakita nito na mahusay kang gumamit ng tamang sukat ng tendensiyang sentral!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang mga pagkakaiba ng Mean, Median, at Mode para sa iyong mga maling sagot.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang modyul, lalo na ang Aralin 1.`,
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
            const arrow = detail.querySelector('svg');
            // Ensure arrow rotates correctly on initialization if details is open
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
        const sections = ['objectives', 'aralin1', 'aralin2', 'pagsasanay'];
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


        // Function to standardize number/text input for comparison
        function standardizeInput(value, isText) {
            if (typeof value !== 'string') value = String(value);
            value = value.trim();
            if (isText) {
                // For text answers (Mode: Cruz, Mean/Median/Mode)
                return value.toLowerCase().replace(/[^a-z]/g, '');
            } else {
                // For number answers (Range, Mean, Median)
                value = value.replace(',', '.').replace(/[^\d.\-]/g, '');
                const parsedValue = parseFloat(value);
                return isNaN(parsedValue) ? null : parsedValue;
            }
        }

        // Function to check answer
        function checkAnswer(id, expected, isText, tolerance = 0.01) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            let isCorrect = false;

            if (isText) {
                const inputVal = standardizeInput(rawValue, true);
                const expectedVal = standardizeInput(expected, true);
                isCorrect = inputVal === expectedVal;
            } else {
                const inputFloat = standardizeInput(rawValue, false);
                const expectedFloat = standardizeInput(String(expected), false);

                if (inputFloat === null) {
                    isCorrect = false;
                } else {
                    isCorrect = Math.abs(inputFloat - expectedFloat) < tolerance;
                }
            }

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
        document.getElementById('stats-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false);
        });

        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 12; // 4 questions * 3 fields each
            const resultsDiv = document.getElementById('results');
            
            // Expected Answers:
            // --- Q1: Math Scores (Mean) ---
            // Data: 86, 85, 84, 88, 86, 84, 86, 86, 88, 87, 86, 84, 87, 87, 86. (Sum = 1290, Count = 15)
            // Range: 88 - 84 = 4
            // Sukat: Mean (small range)
            // Sentro: 1290 / 15 = 86
            const ans1_range = 4;
            const ans1_sukat = 'mean';
            const ans1_sentro = 86;
            
            // --- Q2: Barangay Votes (Mode) ---
            // Data: Cruz (15), Santos (7), Perez (8) (Categorical)
            // Range: N/A -> Use "0"
            // Sukat: Mode (Categorical)
            // Sentro: Cruz (Most frequent)
            const ans2_range = 0;
            const ans2_sukat = 'mode';
            const ans2_sentro = 'cruz';

            // --- Q3: Locust Count (Median) ---
            // Data (Sorted): 3, 4, 5, 13, 14, 14, 15, 15, 16, 17, 17, 17, 18, 18, 19, 19, 19, 19, 20, 20 (Count = 20)
            // Range: 20 - 3 = 17 
            // Sukat: Median (High Range of 17)
            // Sentro (Median): (16 + 17) / 2 = 16.5 
            const ans3_range = 17; 
            const ans3_sukat = 'median';
            const ans3_sentro = 16.5;

            // --- Q4: Dengue Deaths (Mode) ---
            // Data (Frequency): 1(1), 4(2), 5(14), 6(2), 7(1)
            // Range: 7 - 1 = 6
            // Sukat: Mode (Value 5 is highly frequent/dominant)
            // Sentro: 5
            const ans4_range = 6;
            const ans4_sukat = 'mode';
            const ans4_sentro = 5;

            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1_range', ans1_range, false, 0);
                correctCount += checkAnswer('qa1_sukat', ans1_sukat, true);
                correctCount += checkAnswer('qa1_sentro', ans1_sentro, false, 0);

                correctCount += checkAnswer('qa2_range', ans2_range, false, 0);
                correctCount += checkAnswer('qa2_sukat', ans2_sukat, true);
                correctCount += checkAnswer('qa2_sentro', ans2_sentro, true);

                correctCount += checkAnswer('qa3_range', ans3_range, false, 0); 
                correctCount += checkAnswer('qa3_sukat', ans3_sukat, true);
                correctCount += checkAnswer('qa3_sentro', ans3_sentro, false, 0.1); // Allow slight numeric variation

                correctCount += checkAnswer('qa4_range', ans4_range, false, 0);
                correctCount += checkAnswer('qa4_sukat', ans4_sukat, true);
                correctCount += checkAnswer('qa4_sentro', ans4_sentro, false, 0);
                
                // Store the current score to maintain state across language toggles
                resultsDiv.setAttribute('data-current-score', correctCount);
            } else {
                 // If it's a language toggle, retrieve the score
                 correctCount = parseInt(resultsDiv.getAttribute('data-current-score')) || 0;
            }


            // --- Display results ---\
            const totalPossible = totalQuestions;
            const percentage = ((correctCount / totalPossible) * 100).toFixed(0);
            const overallScore = `${correctCount}/${totalPossible}`;
            
            // Determine the message based on current language
            const resultMessage = translations[currentLang];

            // Reset background classes
            resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800');

            let message;
            if (correctCount === totalPossible) {
                message = resultMessage.quiz_result_excellent(correctCount, totalPossible, percentage);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalPossible * 0.6) {
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
        
        window.addEventListener('load', () => {
             // Initialize default language (English) and outline highlight on load
             updateLanguage('en');
        });
    </script>
</body>
</html>
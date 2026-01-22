<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Estimation</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Base styles copied from previous module for consistency (Green/Emerald Theme) */
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

        /* --- Standardizing Text Size to 1.25rem (20px) --- */
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
        
        /* Grouped 20px content styles */
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
            text-align: left; 
            font-size: 1.25rem; /* 20px - Formula Text Size */
            font-weight: bold;
            color: #059669;
            background-color: #ecfdf5;
            border-radius: 0.5rem;
            border: 1px dashed #a7f3d0;
            font-family: 'Inter', sans-serif;
            overflow-x: auto;
            line-height: 2; 
        }
        /* CHANGE: Ensure each formula span is on its own line */
        .math-formula span { 
            white-space: nowrap; 
            display: block;
            margin-bottom: 0.25rem; /* slight vertical space between lines */
        } 

        /* --- Quiz Input Styles (Standardized to 20px) --- */
        .quiz-input { 
            font-size: 1.25rem; /* 20px - Input Text Size */
            border-bottom: 2px solid #a7f3d0; 
            transition: border-color 0.2s; 
            padding: 0.25rem; 
            text-align: left; /* Aligned left for Estimation answers */
            width: 100%; 
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
            font-size: 1rem; 
        }
        .outline-link:hover { background-color: #d1fae5; color: #059669; }
        .outline-link.active { font-weight: 700; background-color: #10b981; color: #ffffff; }

        /* Sticky Nav */
        .sticky-container {
            position: sticky;
            top: 1.5rem;
        }

        /* Custom class to force vertical stacking within the grid column */
        .vertical-stack-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Align contents to the left */
            text-align: left; /* Ensure text alignment is left */
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
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Estimation in Daily Life</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Estimation in Quantities and Business</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Estimation</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Learning to Round Off Numbers and Application in Shopping and Business.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    
                    <p data-i18n="obj_intro">This module will teach you about different methods of <b>estimation</b> and how to use them in your daily life.</p>
                    <br>
                    <h2 class="text-2xl font-bold text-gray-900 mb-3 mt-6" data-i18n="obj_h2">Specific Objectives:</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Apply estimation skills to various quantities used in daily life.</li>
                        <li data-i18n="obj_2">Determine if estimation is <b>appropriate</b> for a given quantity.</li>
                        <li data-i18n="obj_3">Determine if an estimate is <b>accurate</b>.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Pagtantiya sa Pang-araw-araw na Pamumuhay (Content from PDF page 7) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Estimation in Daily Life</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">Estimation means "a temporary judgment or guess of the value, price, or significance of something." It is based on our experience and is used for easier calculation, especially when budgeting. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Rounding Off Decimals</h3>
                            <p data-i18n="aralin1_p2">To make estimation easier, you need to round off the decimal to the nearest <b>Whole Number</b>.</p>
                            
                            <h4 class="font-semibold mt-3" data-i18n="aralin1_h4_1">Rules:</h4>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin1_l1">If the digit after the decimal point is <b>5 or greater</b>, round up to the next whole number. (Example: <b>9.598 → 10</b>)</li>
                                <li data-i18n="aralin1_l2">If the digit after the decimal point is <b>less than 5</b>, keep the whole number and remove the decimal. (Example: <b>5.29 → 5</b>)</li>
                            </ul>
                            
                            <h4 class="font-semibold mt-6" data-i18n="aralin1_h4_2">Rounding Off Mixed Numbers:</h4>
                            <p data-i18n="aralin1_p3">The first step is to transform the fraction into a decimal (divide the numerator by the denominator). Then, apply the decimal rule.</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE: Round off 7 7/8 (Mixed Number)</p>
                                <ol class="list-decimal list-inside ml-4 space-y-1">
                                    <li data-i18n="aralin1_ex1_l1">Convert 7/8 to decimal: 7 / 8 = 0.875</li>
                                    <li data-i18n="aralin1_ex1_l2">The number becomes 7.875.</li>
                                    <li data-i18n="aralin1_ex1_l3">Check 8 (greater than 5), so round up. Result: <b>8</b>.</li>
                                </ol>
                            </div>
                                                        <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Rounding Off to Tens, Hundreds, etc.</h3>
                            <p data-i18n="aralin1_p4">For larger numbers, round off to the nearest <b>Tens, Hundreds, or Thousands</b> for quicker calculation.</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_title">EXAMPLE: P899 and P1,435</p>
                                <p data-i18n="aralin1_ex2_l1"><b>P899</b> (Check 90. Greater than 50) → <b>P900</b></p>
                                <p data-i18n="aralin1_ex2_l2"><b>P1,435</b> (Check 35. Less than 50) → <b>P1,400</b></p>
                                <p class="mt-2" data-i18n="aralin1_ex2_p1">Estimated Total: P900 + P1,400 = <b>P2,300</b> (The exact answer is P2,334)</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Pagtantiya sa mga Kantidad at Negosyo (Content from PDF page 20) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Estimation in Quantities and Business</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">Estimation is critical in business for: <b>(1) Preventing overbuying</b> (like vegetables that spoil) and <b>(2) Quickly calculating profit</b>.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Estimating Profit</h3>
                            <p data-i18n="aralin2_p2">If a 20% profit is sufficient for a vendor, we can estimate the price and profit by rounding off to the nearest <b>Multiple of 5</b>.</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">EXAMPLE: Onions (P45.00/kilo)</p>
                                <ol class="list-decimal list-inside ml-4 space-y-1">
                                    <li data-i18n="aralin2_ex1_l1">Calculated Profit (20%): P45.00 x 0.20 = P9.00</li>
                                    <li data-i18n="aralin2_ex1_l2">Estimated Profit (Round P9.00 to multiple of 5): <b>P10.00</b> (closer to 10 than 5)</li>
                                    <li data-i18n="aralin2_ex1_l3">Estimated Selling Price: P45.00 + P10.00 = <b>P55.00</b></li>
                                </ol>
                                <p class="mt-3" data-i18n="aralin2_ex1_p1">Using the estimated amount (e.g., P10.00 profit) is easier and more accurate for actual business than P9.00.</p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Determining if Estimation is Appropriate</h3>
                            <p data-i18n="aralin2_p3">Estimation is <b>appropriate</b> if the values have a proportional relationship.</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_title">EXAMPLE:</p>
                                <p data-i18n="aralin2_ex2_p1">If 6 family members spend P750.00 on groceries, the appropriate estimate for 4 members is <b>P500.00</b>.</p>
                                <p class="math-formula" data-i18n="aralin2_ex2_f1"><span>6 members / P750 = 4 members / P500 (The estimate is accurate)</span></p>
                            </div>
                                                    </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Use your knowledge of estimation to answer the questions. Answer A. with <b>Y/N (Yes/No)</b> and B. with <b>T/F (True/False)</b> (Do not include units or symbols in the answer).</p>

                    <form id="stats-quiz-form" class="space-y-6">

                        <!-- Part A: Angkop ba ang Pagtantiya (Y / N) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Is Estimation Appropriate? (Y = Yes, N = No)</p>
                            
                            <div class="space-y-4">
                                <!-- Q1 -->
                                <div class="vertical-stack-left space-y-2"> 
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. How many pieces of fish are in 1 kilo?</label>
                                    <input type="text" id="qa1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="quiz_placeholder_yn" placeholder="Y/N">
                                </div>
                                <!-- Q2 -->
                                <div class="vertical-stack-left space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. How many cups of rice for 10 people?</label>
                                    <input type="text" id="qa2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="quiz_placeholder_yn" placeholder="Y/N">
                                </div>
                                <!-- Q3 -->
                                <div class="vertical-stack-left space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. What time should one leave the house?</label>
                                    <input type="text" id="qa3" class="quiz-input w-full sm:w-64" data-i18n-placeholder="quiz_placeholder_yn" placeholder="Y/N">
                                </div>
                                <!-- Q4 -->
                                <div class="vertical-stack-left space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. How much should one spend (Based on monthly income)?</label>
                                    <input type="text" id="qa4" class="quiz-input w-full sm:w-64" data-i18n-placeholder="quiz_placeholder_yn" placeholder="Y/N">
                                </div>
                                <!-- Q5 -->
                                <div class="vertical-stack-left space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">5. Is P100 reasonable for 3 socks (originally P35 each)?</label>
                                    <input type="text" id="qa5" class="quiz-input w-full sm:w-64" data-i18n-placeholder="quiz_placeholder_yn" placeholder="Y/N">
                                </div>
                            </div>
                        </div>

                        <!-- Part B: Angkop/Tumpak ba ang Pagtantiya (True / False) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Is the Estimate Appropriate or Accurate? (T = True, F = False)</p>
                            <div class="space-y-4">
                                <!-- Q1 -->
                                <div class="vertical-stack-left space-y-2">
                                    <label for="qb1" class="font-medium" data-i18n="qb1_label">1. For 1 1/2 bars of gelatin, 1/2 cup of water is needed (If 3 cups are needed for 1 bar).</label>
                                    <input type="text" id="qb1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="quiz_placeholder_tf" placeholder="T/F">
                                </div>

                                <!-- Q2 -->
                                <div class="vertical-stack-left space-y-2">
                                    <label for="qb2" class="font-medium" data-i18n="qb2_label">2. If P750 is the grocery cost for 6 members, P500 is needed for 4 members.</label>
                                    <input type="text" id="qb2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="quiz_placeholder_tf" placeholder="T/F">
                                </div>
                                
                                <!-- Q3 -->
                                <div class="vertical-stack-left space-y-2">
                                    <label for="qb3" class="font-medium" data-i18n="qb3_label">3. 2 1/4 chicken is P185.00 because 2 kilos is P160.00 (Exact answer: P180.00).</label>
                                    <input type="text" id="qb3" class="quiz-input w-full sm:w-64" data-i18n-placeholder="quiz_placeholder_tf" placeholder="T/F">
                                </div>

                                <!-- Q4 -->
                                <div class="vertical-stack-left space-y-2">
                                    <label for="qb4" class="font-medium" data-i18n="qb4_label">4. If 20 tomatoes (1 kilo) are P20.00, 1 tomato is estimated at P0.75 (Exact answer: P1.00).</label>
                                    <input type="text" id="qb4" class="quiz-input w-full sm:w-64" data-i18n-placeholder="quiz_placeholder_tf" placeholder="T/F">
                                </div>

                                <!-- Q5 -->
                                <div class="vertical-stack-left space-y-2">
                                    <label for="qb5" class="font-medium" data-i18n="qb5_label">5. If a 30-minute walk equals 2km, then 5km is estimated as a 75-minute walk.</label>
                                    <input type="text" id="qb5" class="quiz-input w-full sm:w-64" data-i18n-placeholder="quiz_placeholder_tf" placeholder="T/F">
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
                outline_aralin1: "Lesson 1: Estimation in Daily Life",
                outline_aralin2: "Lesson 2: Estimation in Quantities and Business",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Estimation",
                h1_subtitle: "Learning to Round Off Numbers and Application in Shopping and Business.",
                section_objectives_title: "What Will You Learn in This Module?",
                obj_h2: "Specific Objectives:",
                
                // Objectives
                obj_intro: "This module will teach you about different methods of <b>estimation</b> and how to use them in your daily life.",
                obj_1: "Apply estimation skills to various quantities used in daily life.",
                obj_2: "Determine if estimation is <b>appropriate</b> for a given quantity.",
                obj_3: "Determine if an estimate is <b>accurate</b>.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Estimation in Daily Life",
                aralin1_p1: "Estimation means \"a temporary judgment or guess of the value, price, or significance of something.\" It is based on our experience and is used for easier calculation, especially when budgeting. ",
                aralin1_h3_1: "Rounding Off Decimals",
                aralin1_p2: "To make estimation easier, you need to round off the decimal to the nearest <b>Whole Number</b>.",
                aralin1_h4_1: "Rules:",
                aralin1_l1: "If the digit after the decimal point is <b>5 or greater</b>, round up to the next whole number. (Example: <b>9.598 → 10</b>)",
                aralin1_l2: "If the digit after the decimal point is <b>less than 5</b>, keep the whole number and remove the decimal. (Example: <b>5.29 → 5</b>)",
                aralin1_h4_2: "Rounding Off Mixed Numbers:",
                aralin1_p3: "The first step is to transform the fraction into a decimal (divide the numerator by the denominator). Then, apply the decimal rule.",
                aralin1_ex1_title: "EXAMPLE: Round off 7 7/8 (Mixed Number)",
                aralin1_ex1_l1: "Convert 7/8 to decimal: 7 / 8 = 0.875",
                aralin1_ex1_l2: "The number becomes 7.875.",
                aralin1_ex1_l3: "Check 8 (greater than 5), so round up. Result: <b>8</b>.",
                aralin1_h3_2: "Rounding Off to Tens, Hundreds, etc.",
                aralin1_p4: "For larger numbers, round off to the nearest <b>Tens, Hundreds, or Thousands</b> for quicker calculation.",
                aralin1_ex2_title: "EXAMPLE: P899 and P1,435",
                aralin1_ex2_l1: "<b>P899</b> (Check 90. Greater than 50) → <b>P900</b>",
                aralin1_ex2_l2: "<b>P1,435</b> (Check 35. Less than 50) → <b>P1,400</b>",
                aralin1_ex2_p1: "Estimated Total: P900 + P1,400 = <b>P2,300</b> (The exact answer is P2,334)",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Estimation in Quantities and Business",
                aralin2_p1: "Estimation is critical in business for: <b>(1) Preventing overbuying</b> (like vegetables that spoil) and <b>(2) Quickly calculating profit</b>.",
                aralin2_h3_1: "Estimating Profit",
                aralin2_p2: "If a 20% profit is sufficient for a vendor, we can estimate the price and profit by rounding off to the nearest <b>Multiple of 5</b>.",
                aralin2_ex1_title: "EXAMPLE: Onions (P45.00/kilo)",
                aralin2_ex1_l1: "Calculated Profit (20%): P45.00 x 0.20 = P9.00",
                aralin2_ex1_l2: "Estimated Profit (Round P9.00 to multiple of 5): <b>P10.00</b> (closer to 10 than 5)",
                aralin2_ex1_l3: "Estimated Selling Price: P45.00 + P10.00 = <b>P55.00</b>",
                aralin2_ex1_p1: "Using the estimated amount (e.g., P10.00 profit) is easier and more accurate for actual business than P9.00.",
                aralin2_h3_2: "Determining if Estimation is Appropriate",
                aralin2_p3: "Estimation is <b>appropriate</b> if the values have a proportional relationship.",
                aralin2_ex2_title: "EXAMPLE:",
                aralin2_ex2_p1: "If 6 family members spend P750.00 on groceries, the appropriate estimate for 4 members is <b>P500.00</b>.",
                aralin2_ex2_f1: "6 members / P750 = 4 members / P500 (The estimate is accurate)",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Use your knowledge of estimation to answer the questions. Answer A. with <b>Y/N (Yes/No)</b> and B. with <b>T/F (True/False)</b> (Do not include units or symbols in the answer).",
                quiz_section1_title: "A. Is Estimation Appropriate? (Y = Yes, N = No)",
                qa1_label: "1. How many pieces of fish are in 1 kilo?",
                qa2_label: "2. How many cups of rice for 10 people?",
                qa3_label: "3. What time should one leave the house?",
                qa4_label: "4. How much should one spend (Based on monthly income)?",
                qa5_label: "5. Is P100 reasonable for 3 socks (originally P35 each)?",
                quiz_placeholder_yn: "Y/N",
                
                quiz_section2_title: "B. Is the Estimate Appropriate or Accurate? (T = True, F = False)",
                qb1_label: "1. For 1 1/2 bars of gelatin, 1/2 cup of water is needed (If 3 cups are needed for 1 bar).",
                qb2_label: "2. If P750 is the grocery cost for 6 members, P500 is needed for 4 members.",
                qb3_label: "3. 2 1/4 chicken is P185.00 because 2 kilos is P160.00 (Exact answer: P180.00).",
                qb4_label: "4. If 20 tomatoes (1 kilo) are P20.00, 1 tomato is estimated at P0.75 (Exact answer: P1.00).",
                qb5_label: "5. If a 30-minute walk equals 2km, then 5km is estimated as a 75-minute walk.",
                quiz_placeholder_tf: "T/F",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered estimation!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review the difference between Accurate and Appropriate estimation.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the entire module, especially Lesson 2.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pagtantiya sa Pang-araw-araw na Pamumuhay",
                outline_aralin2: "Aralin 2: Pagtantiya sa mga Kantidad at Negosyo",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Pagtantiya (Estimation)",
                h1_subtitle: "Pag-aaral ng Pagra-round Off ng mga Numero at Aplikasyon sa Pamimili at Negosyo.",
                section_objectives_title: "Tungkol Saan ang Modyul na Ito?",
                obj_h2: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_intro: "Ituturo ng modyul na ito ang tungkol sa iba't ibang pamamaraan ng <b>pagtantiya (estimation)</b> at kung paano mo ito gagamitin sa iyong pang-araw-araw na pamumuhay.",
                obj_1: "Magamit ang iyong kahusayan sa pagtantiya sa iba't ibang kantidad na ginagamit sa pang-araw-araw na pamumuhay.",
                obj_2: "Matukoy kung <b>angkop</b> o hindi ang pagtantiya sa isang kantidad.",
                obj_3: "Matukoy kung <b>tumpak</b> ang isang pagtantiya.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Pagtantiya sa Pang-araw-araw na Pamumuhay",
                aralin1_p1: "Ang pagtantiya ay nangangahulugan ng \"pansamantalang pagkilatis o paghula sa halaga, presyo, o kahalagahan ng isang bagay.\" Ito ay batay sa ating karanasan at ginagamit para sa mas madaling pagkalkula, lalo na sa pagba-budget.",
                aralin1_h3_1: "Pagra-round Off ng Decimals",
                aralin1_p2: "Upang mas madali ang pagtantiya, kailangan i-round off ang decimal sa pinakamalapit na <b>Whole Number</b> (Buong Numero).",
                aralin1_h4_1: "Mga Tuntunin:",
                aralin1_l1: "Kung ang digit pagkatapos ng decimal point ay <b>5 o mas mataas</b>, i-round off pataas (up) sa kasunod na whole number. (Halimbawa: <b>9.598 → 10</b>)",
                aralin1_l2: "Kung ang digit pagkatapos ng decimal point ay <b>mas mababa sa 5</b>, panatilihin ang whole number at alisin ang decimal. (Halimbawa: <b>5.29 → 5</b>)",
                aralin1_h4_2: "Pagra-round Off ng Mixed Numbers:",
                aralin1_p3: "Ang unang hakbang ay i-transform o baguhin ang fraction sa decimal (i-divide ang numerator sa denominator). Pagkatapos, i-apply ang decimal rule.",
                aralin1_ex1_title: "HALIMBAWA: I-round off ang 7 7/8 (Mixed Number)",
                aralin1_ex1_l1: "Convert 7/8 sa decimal: 7 / 8 = 0.875",
                aralin1_ex1_l2: "Ang number ay nagiging 7.875.",
                aralin1_ex1_l3: "Tingnan ang 8 (mas malaki sa 5), kaya round up. Resulta: <b>8</b>.",
                aralin1_h3_2: "Pagra-round Off sa Tens, Hundreds, atbp.",
                aralin1_p4: "Para sa mas malalaking numero, i-round off sa pinakamalapit na <b>Tens, Hundreds, o Thousands</b> para sa mabilis na pagkuwenta.",
                aralin1_ex2_title: "HALIMBAWA: P899 at P1,435",
                aralin1_ex2_l1: "<b>P899</b> (Tingnan ang 90. Mas malaki sa 50) → <b>P900</b>",
                aralin1_ex2_l2: "<b>P1,435</b> (Tingnan ang 35. Mas mababa sa 50) → <b>P1,400</b>",
                aralin1_ex2_p1: "Tinatantiyang Kabuuan: P900 + P1,400 = <b>P2,300</b> (Ang eksaktong sagot ay P2,334)",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Pagtantiya sa mga Kantidad at Negosyo",
                aralin2_p1: "Ang pagtantiya ay kritikal sa negosyo para sa: <b>(1) Pag-iwas sa sobrang pagbili</b> (tulad ng gulay na nabubulok) at <b>(2) Mabilis na pagkalkula ng kita</b>.",
                aralin2_h3_1: "Pagtantiya sa Kita (Profit)",
                aralin2_p2: "Kung sapat na ang 20% kita para sa isang manininda, maaari nating tantiyahin ang presyo at kita sa pamamagitan ng pag-round off sa pinakamalapit na <b>Multiple of 5</b>.",
                aralin2_ex1_title: "HALIMBAWA: Sibuyas (P45.00/kilo)",
                aralin2_ex1_l1: "Kinompyut na Kita (20%): P45.00 x 0.20 = P9.00",
                aralin2_ex1_l2: "Tinatantiyang Kita (Round off P9.00 sa multiple ng 5): <b>P10.00</b> (mas malapit sa 10 kaysa 5)",
                aralin2_ex1_l3: "Tinatantiyang Presyo ng Pagbenta: P45.00 + P10.00 = <b>P55.00</b>",
                aralin2_ex1_p1: "Ang paggamit ng tinantiyang halaga (e.g., P10.00 kita) ay mas madali at tumpak sa aktuwal na negosyo kaysa P9.00.",
                aralin2_h3_2: "Pagtiyak kung Angkop (Appropriate) ang Pagtantiya",
                aralin2_p3: "Ang pagtantiya ay <b>angkop</b> kung ang mga halaga ay may proportional na relasyon.",
                aralin2_ex2_title: "HALIMBAWA:",
                aralin2_ex2_p1: "Kung ang 6 na miyembro ng pamilya ay gumagastos ng P750.00 sa grocery, ang angkop na pagtantiya para sa 4 na miyembro ay <b>P500.00</b>.",
                aralin2_ex2_f1: "6 miyembro / P750 = 4 na miyembro / P500 (Tumpak ang pagtantiya)",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Gamitin ang iyong kaalaman sa pagtantiya upang sagutin ang mga katanungan. Sagutin ang A. ng <b>O/H (Oo/Hindi)</b> at ang B. ng <b>T/M (Tama/Mali)</b> (Huwag maglagay ng unit o simbolo sa sagot).",
                quiz_section1_title: "A. Maaari ba itong Tantiyahin? (O = Oo, H = Hindi)",
                qa1_label: "1. Ilang piraso ng isda mayroon sa 1 kilo?",
                qa2_label: "2. Ilang tasa ng bigas para sa 10 tao?",
                qa3_label: "3. Anong oras dapat umalis ng bahay?",
                qa4_label: "4. Magkano ang baong panggastos (Base sa buwanang kita)?",
                qa5_label: "5. Makatwiran ba ang P100 para sa 3 medyas (dating P35 bawat isa)?",
                quiz_placeholder_yn: "O/H",
                
                quiz_section2_title: "B. Angkop o Tumpak ba ang Tantiya? (T = Tama, M = Mali)",
                qb1_label: "1. Para sa 1 1/2 bar ng gelatin, kailangan ng 1/2 tasa ng tubig (Kung 3 tasa ang kailangan para sa 1 bar).",
                qb2_label: "2. Kung P750 ang grocery ng 6 na miyembro, P500 ang kailangan para sa 4 na miyembro.",
                qb3_label: "3. Ang 2 1/4 manok ay P185.00 dahil P160.00 ang 2 kilo (Eksaktong sagot: P180.00).",
                qb4_label: "4. Kung 20 kamatis (1 kilo) ay P20.00, ang 1 kamatis ay tinatayang P0.75 (Eksaktong sagot: P1.00).",
                qb5_label: "5. Kung ang 30 minutong paglalakad ay katumbas ng 2km, ang 5km ay tinatayang 75 minutong lakad.",
                quiz_placeholder_tf: "T/M",
                quiz_button: "Tapusin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang pagtantiya!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang mga pagkakaiba ng Tumpak (Accurate) at Angkop (Appropriate) na pagtantiya.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang buong modyul, lalo na ang Aralin 2.`,
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
                // For text answers (Y/N, T/F, O/H, T/M)
                return value.toLowerCase().replace(/[^a-z]/g, '');
            } else {
                // Not used in this quiz
                return value;
            }
        }

        // Function to check answer
        function checkAnswer(id, expected, isText) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            let isCorrect = false;
            const inputVal = standardizeInput(rawValue, true);
            const expectedVal = standardizeInput(expected, true);

            isCorrect = inputVal === expectedVal;
            
            input.classList.remove('correct-answer', 'incorrect-answer');
            
            if (isCorrect) {
                input.classList.add('correct-answer');
                return 1;
            } else {
                input.classList.add('incorrect-answer');
                return 0;
            }
        }

        // --- QUIZ LOGIC ---
        document.getElementById('stats-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); 
        });
        
        /**
         * Submits the quiz and calculates the score.
         * @param {boolean} isLanguageToggle - True if called only to refresh results language.
         */
        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 10; // 5 questions in Part A + 5 questions in Part B
            const resultsDiv = document.getElementById('results');
            
            // Expected Answers (English for consistent JS logic)
            
            // Part A: Is Estimation Appropriate? (Y/N)
            // 1. Fish per kilo - Yes, estimation is appropriate for quantity.
            const ans_a1 = 'y'; 
            // 2. Cups of rice for 10 people - Yes, estimation is appropriate for proportion/quantity.
            const ans_a2 = 'y'; 
            // 3. What time to leave - Yes, based on travel time (rate x distance).
            const ans_a3 = 'y'; 
            // 4. How much to spend (Budget) - Yes, critical for budgeting/planning.
            const ans_a4 = 'y'; 
            // 5. Is P100 reasonable for 3 socks (3*35=105) - Yes, estimation is appropriate for reasonableness.
            const ans_a5 = 'y'; 

            // Part B: Is the Estimate Accurate or Appropriate? (T/F)
            // 1. Gelatin: 1 bar = 3 cups water. 1.5 bar = 4.5 cups water. Estimate is 0.5 cup. F (Incorrect ratio/estimate).
            const ans_b1 = 'f'; 
            
            // 2. Grocery: 6 members = P750. 4 members = P500. (750/6 = 125 per person. 125*4 = 500). T (Accurate).
            const ans_b2 = 't'; 

            // 3. Chicken: 2 1/4 kg = P185. 2 kg = P160. P180 is the exact price. P185 is close but inaccurate/false statement about accuracy in a true/false context. F (The estimate P185 is close, but the statement implies accuracy based on P180 exact price in a module testing accuracy).
            const ans_b3 = 'f'; 

            // 4. Tomatoes: 20 pcs = P20. 1 pc = P1.00. Estimate P0.75. F (Inaccurate).
            const ans_b4 = 'f'; 

            // 5. Walk: 30 min / 2km = 15 min/km. 5km * 15 min/km = 75 minutes. T (Accurate estimate based on given rate).
            const ans_b5 = 't'; 
            
            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1', ans_a1, true); 
                correctCount += checkAnswer('qa2', ans_a2, true); 
                correctCount += checkAnswer('qa3', ans_a3, true); 
                correctCount += checkAnswer('qa4', ans_a4, true); 
                correctCount += checkAnswer('qa5', ans_a5, true); 

                correctCount += checkAnswer('qb1', ans_b1, true); 
                correctCount += checkAnswer('qb2', ans_b2, true); 
                correctCount += checkAnswer('qb3', ans_b3, true); 
                correctCount += checkAnswer('qb4', ans_b4, true); 
                correctCount += checkAnswer('qb5', ans_b5, true); 
                
                // Store the current score to maintain state across language toggles
                resultsDiv.setAttribute('data-current-score', correctCount);
            } else {
                 // If it's a language toggle, retrieve the score
                 correctCount = parseInt(resultsDiv.getAttribute('data-current-score')) || 0;
            }

            // --- Display results ---\
            const percentage = ((correctCount / totalQuestions) * 100).toFixed(0);
            const overallScore = `${correctCount}/${totalQuestions}`;
            
            // Determine the message based on current language
            const resultMessage = translations[currentLang];

            // Reset background classes
            resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800');

            let message;
            if (correctCount === totalQuestions) {
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalQuestions * 0.5) {
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
        
        window.addEventListener('load', () => {
             // Initialize default language (English) and outline highlight on load
             updateLanguage('en');
        });
    </script>
</body>
</html>
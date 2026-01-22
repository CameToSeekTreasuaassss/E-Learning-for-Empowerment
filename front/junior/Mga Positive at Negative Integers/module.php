<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Positive and Negative Integers</title>
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
        .content-box p, 
        .content-box ul li, 
        .content-box ol li,
        .example-box p,
        #objectives ul li { 
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

        .content-box strong, .content-box b { 
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
    </style>
</head>
<!-- UPDATED BODY PADDING AND REMOVED MAX-WIDTH FROM CONTAINER -->
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
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Plus or Minus (Difference and Ordering)</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Addition and Subtraction of Integers</a>
                        <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Multiplication and Division of Integers</a>
                        <a href="#aralin4" class="outline-link" data-i18n="outline_aralin4">Lesson 4: Integers in Word Problems</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Positive and Negative Integers</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Studying Arithmetic Operations with Integers and their Use in Daily Life.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Differentiate between <b>Positive</b> (+) and <b>Negative</b> (-) Integers.</li>
                        <li data-i18n="obj_2">Perform <b>Addition</b>, <b>Subtraction</b>, <b>Multiplication</b>, and <b>Division</b> of Integers.</li>
                        <li data-i18n="obj_3">Use knowledge of Integers to solve <b>Word Problems</b>.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Plus o Minus -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Plus or Minus (Difference and Ordering)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1"><b>Integers</b> consist of all whole numbers (including zero) and their negative counterparts. They are illustrated on a <b>Number Line</b>. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Difference</h3>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin1_l1"><b>Positive Integers</b>: Numbers <b>to the right</b> (or above) of zero. They represent increases, gains, or advances. (Ex. <b>+5</b>, <b>10</b>)</li>
                                <li data-i18n="aralin1_l2"><b>Negative Integers</b>: Numbers <b>to the left</b> (or below) of zero. They represent decreases, losses, or debts. (Ex. <b>-3</b>, <b>-7</b>)</li>
                                <li data-i18n="aralin1_l3"><b>Zero (0)</b>: Has no sign, neither positive nor negative.</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Ordering Integers</h3>
                            <p data-i18n="aralin1_p2">An integer's value increases as it moves right or up on the number line.</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title1">Ascending Order:</p>
                                <p data-i18n="aralin1_ex1_p1">From smallest to largest: <b>-10, -5, 0, 5, 10</b>.</p>
                                <p class="font-bold" data-i18n="aralin1_ex1_title2">Descending Order:</p>
                                <p data-i18n="aralin1_ex1_p2">From largest to smallest: <b>10, 5, 0, -5, -10</b>.</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Addition at Subtraction ng Integers -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Addition and Subtraction of Integers</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Addition</h3><br>
                            <ol class="list-decimal list-inside ml-4 space-y-1">
                                <li data-i18n="aralin2_l1"><b>Same Sign</b>: Find the sum of the absolute values, and use the common sign.
                                    <p class="math-formula" data-i18n="aralin2_ex1_solution1"><span>(+3) + (+5) = +8</span><br><span>(-6) + (-3) = -9</span></p>
                                </li>
                                <li data-i18n="aralin2_l2"><b>Different Signs</b>: Find the difference (subtraction) of the absolute values, and use the sign of the number with the higher absolute value.
                                    <p class="math-formula" data-i18n="aralin2_ex1_solution2"><span>(+7) + (-4) = +3</span> (7 is higher than 4)<br><span>(-5) + (+3) = -2</span> (5 is higher than 3)</p>
                                </li>
                            </ol>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Subtraction</h3>
                            <p data-i18n="aralin2_p1"><b>Rule:</b> Change the sign of the <b>Subtrahend</b> (the number being subtracted) and follow the Addition rules. </p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_title">EXAMPLE:</p>
                                <p data-i18n="aralin2_ex2_p1"><span>(+8) - (+5) → (+8) + (-5) = <b>+3</b></span></p>
                                <p data-i18n="aralin2_ex2_p2"><span>(-7) - (-4) → (-7) + (+4) = <b>-3</b></span></p>
                                <p data-i18n="aralin2_ex2_p3"><span>(+9) - (-2) → (+9) + (+2) = <b>+11</b></span></p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 3: Multiplication at Division ng Integers -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Multiplication and Division of Integers</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Multiplication and Division</h3><br>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin3_l1"><b>Same Sign</b> (Positive &times; Positive / Negative &times; Negative): The answer is always <b>Positive</b> (+).
                                    <p class="math-formula" data-i18n="aralin3_ex1_solution1"><span>(+9) x (+2) = +18</span><br><span>(-8) / (-2) = +4</span></p>
                                </li>
                                <li data-i18n="aralin3_l2"><b>Different Signs</b> (Positive &times; Negative / Negative &times; Positive): The answer is always <b>Negative</b> (-).
                                    <p class="math-formula" data-i18n="aralin3_ex1_solution2"><span>(+5) x (-4) = -20</span><br><span>(-18) / (+3) = -6</span></p>
                                </li>
                            </ul>
                        </div>
                    </details>

                    <!-- ARALIN 4: Pag-aaral ng Integers (Word Problems) -->
                    <details id="aralin4" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin4_title">Lesson 4: Integers in Word Problems</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin4_p1"><b>Word Problems</b> use integers to solve real-life situations involving money, elevation/depth, and temperature.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin4_h3_1">Steps for Solving</h3>
                            <ol class="list-decimal list-inside ml-4 space-y-1">
                                <li data-i18n="aralin4_l1">Identify the <b>Clues</b> and determine the <b>Positive (+)</b> and <b>Negative (-)</b> values.</li>
                                <li data-i18n="aralin4_l2">Determine the required <b>Operation</b> (Addition, Subtraction, Multiplication, Division).</li>
                                <li data-i18n="aralin4_l3">Apply the correct <b>Rules of Integers</b>.</li>
                            </ol>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin4_ex1_title">EXAMPLE:</p>
                                <p data-i18n="aralin4_ex1_p1">The helicopter is <b>2,500 meters high</b> (+2,500) from the sea surface. The submarine is <b>1,850 meters below</b> (-1,850) the sea. What is the distance between the helicopter and the submarine?</p>
                                <p data-i18n="aralin4_ex1_p2">Operation: Subtraction (Pagbabawas) to find the distance.</p>
                                <p class="math-formula" data-i18n="aralin4_ex1_solution1"><span><b>+2,500 - (-1,850)</b> → 2,500 + 1,850 = <b>4,350 meters</b></span></p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the following integer operations.</p>

                    <form id="integer-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Mixed Operations</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. (+15) + (-20) =</label>
                                    <input type="text" id="qa1" class="quiz-input" data-i18n-placeholder="qa1_placeholder" placeholder="Answer">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. (-7) - (-14) =</label>
                                    <input type="text" id="qa2" class="quiz-input" data-i18n-placeholder="qa2_placeholder" placeholder="Answer">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. (-9) x (+4) =</label>
                                    <input type="text" id="qa3" class="quiz-input" data-i18n-placeholder="qa3_placeholder" placeholder="Answer">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. (-45) / (-5) =</label>
                                    <input type="text" id="qa4" class="quiz-input" data-i18n-placeholder="qa4_placeholder" placeholder="Answer">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">5. (+100) + (-120) - (-10) =</label>
                                    <input type="text" id="qa5" class="quiz-input" data-i18n-placeholder="qa5_placeholder" placeholder="Answer">
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit-integer-quiz" class="w-[70%] mx-auto block accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
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
                outline_aralin1: "Lesson 1: Plus or Minus (Difference and Ordering)",
                outline_aralin2: "Lesson 2: Addition and Subtraction of Integers",
                outline_aralin3: "Lesson 3: Multiplication and Division of Integers",
                outline_aralin4: "Lesson 4: Integers in Word Problems",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Positive and Negative Integers",
                h1_subtitle: "Studying Arithmetic Operations with Integers and their Use in Daily Life.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Differentiate between <b>Positive</b> (+) and <b>Negative</b> (-) Integers.",
                obj_2: "Perform <b>Addition</b>, <b>Subtraction</b>, <b>Multiplication</b>, and <b>Division</b> of Integers.",
                obj_3: "Use knowledge of Integers to solve <b>Word Problems</b>.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Plus or Minus (Difference and Ordering)",
                aralin1_p1: "<b>Integers</b> consist of all whole numbers (including zero) and their negative counterparts. They are illustrated on a <b>Number Line</b>. ",
                aralin1_h3_1: "Difference",
                aralin1_l1: "<b>Positive Integers</b>: Numbers <b>to the right</b> (or above) of zero. They represent increases, gains, or advances. (Ex. <b>+5</b>, <b>10</b>)",
                aralin1_l2: "<b>Negative Integers</b>: Numbers <b>to the left</b> (or below) of zero. They represent decreases, losses, or debts. (Ex. <b>-3</b>, <b>-7</b>)",
                aralin1_l3: "<b>Zero (0)</b>: Has no sign, neither positive nor negative.",
                aralin1_h3_2: "Ordering Integers",
                aralin1_p2: "An integer's value increases as it moves right or up on the number line.",
                aralin1_ex1_title1: "Ascending Order:",
                aralin1_ex1_p1: "From smallest to largest: <b>-10, -5, 0, 5, 10</b>.",
                aralin1_ex1_title2: "Descending Order:",
                aralin1_ex1_p2: "From largest to smallest: <b>10, 5, 0, -5, -10</b>.",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Addition and Subtraction of Integers",
                aralin2_h3_1: "Addition",
                aralin2_l1: "<b>Same Sign</b>: Find the sum of the absolute values, and use the common sign.",
                aralin2_ex1_solution1: "<span>(+3) + (+5) = +8</span><br><span>(-6) + (-3) = -9</span>",
                aralin2_l2: "<b>Different Signs</b>: Find the difference (subtraction) of the absolute values, and use the sign of the number with the higher absolute value.",
                aralin2_ex1_solution2: "<span>(+7) + (-4) = +3</span> (7 is higher than 4)<br><span>(-5) + (+3) = -2</span> (5 is higher than 3)",
                aralin2_h3_2: "Subtraction",
                aralin2_p1: "<b>Rule:</b> Change the sign of the <b>Subtrahend</b> (the number being subtracted) and follow the Addition rules.",
                aralin2_ex2_title: "EXAMPLE:",
                aralin2_ex2_p1: "<span>(+8) - (+5) → (+8) + (-5) = <b>+3</b></span>",
                aralin2_ex2_p2: "<span>(-7) - (-4) → (-7) + (+4) = <b>-3</b></span>",
                aralin2_ex2_p3: "<span>(+9) - (-2) → (+9) + (+2) = <b>+11</b></span>",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Multiplication and Division of Integers",
                aralin3_h3_1: "Multiplication and Division",
                aralin3_l1: "<b>Same Sign</b> (Positive x Positive / Negative x Negative): The answer is always <b>Positive</b> (+).",
                aralin3_ex1_solution1: "<span>(+9) x (+2) = +18</span><br><span>(-8) / (-2) = +4</span>",
                aralin3_l2: "<b>Different Signs</b> (Positive x Negative / Negative x Positive): The answer is always <b>Negative</b> (-).",
                aralin3_ex1_solution2: "<span>(+5) x (-4) = -20</span><br><span>(-18) / (+3) = -6</span>",

                // Lesson 4 Content
                aralin4_title: "Lesson 4: Integers in Word Problems",
                aralin4_p1: "<b>Word Problems</b> use integers to solve real-life situations involving money, elevation/depth, and temperature.",
                aralin4_h3_1: "Steps for Solving",
                aralin4_l1: "Identify the <b>Clues</b> and determine the <b>Positive (+)</b> and <b>Negative (-)</b> values.",
                aralin4_l2: "Determine the required <b>Operation</b> (Addition, Subtraction, Multiplication, Division).",
                aralin4_l3: "Apply the correct <b>Rules of Integers</b>.",
                aralin4_ex1_title: "EXAMPLE:",
                aralin4_ex1_p1: "The helicopter is <b>2,500 meters high</b> (+2,500) from the sea surface. The submarine is <b>1,850 meters below</b> (-1,850) the sea. What is the distance between the helicopter and the submarine?",
                aralin4_ex1_p2: "Operation: Subtraction to find the distance.",
                aralin4_ex1_solution1: "<span><b>+2,500 - (-1,850)</b> → 2,500 + 1,850 = <b>4,350 meters</b></span>",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Answer the following integer operations.",
                quiz_section1_title: "A. Mixed Operations",
                qa1_label: "1. (+15) + (-20) =",
                qa1_placeholder: "Answer",
                qa2_label: "2. (-7) - (-14) =",
                qa2_placeholder: "Answer",
                qa3_label: "3. (-9) x (+4) =",
                qa3_placeholder: "Answer",
                qa4_label: "4. (-45) / (-5) =",
                qa4_placeholder: "Answer",
                qa5_label: "5. (+100) + (-120) - (-10) =",
                qa5_placeholder: "Answer",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered the rules of integers!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review the rules for Addition and Subtraction.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the entire module.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Plus o Minus (Pagkakaiba at Pag-aayos)",
                outline_aralin2: "Aralin 2: Addition at Subtraction ng Integers",
                outline_aralin3: "Aralin 3: Multiplication at Division ng Integers",
                outline_aralin4: "Aralin 4: Pag-aaral ng Integers (Word Problems)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Mga Positive at Negative Integers",
                h1_subtitle: "Pag-aaral ng Arithmetic Operations sa mga Integers at ang Gamit nito sa Pang-araw-araw na Buhay.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ibigay ang kaibahan ng <b>Positive</b> (+) at <b>Negative</b> (-) Integers.",
                obj_2: "Isagawa ang <b>Addition</b>, <b>Subtraction</b>, <b>Multiplication</b>, at <b>Division</b> ng Integers.",
                obj_3: "Gamitin ang mga kaalaman sa Integers sa paglutas ng <b>Word Problems</b>.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Plus o Minus (Pagkakaiba at Pag-aayos)",
                aralin1_p1: "Ang <b>Integers</b> ay binubuo ng lahat ng whole numbers (kasama ang zero) at ang kanilang negatibong bersyon. Ito ay inilalarawan sa isang <b>Number Line</b>. ",
                aralin1_h3_1: "Pagkakaiba",
                aralin1_l1: "<b>Positive Integers</b>: Mga numerong <b>nasa kanan</b> (o itaas) ng zero. Ito ay nagpapakita ng pagtaas, tubo, o pag-abante. (Hal. <b>+5</b>, <b>10</b>)",
                aralin1_l2: "<b>Negative Integers</b>: Mga numerong <b>nasa kaliwa</b> (o ibaba) ng zero. Ito ay nagpapakita ng pagbaba, pagkalugi, o utang. (Hal. <b>-3</b>, <b>-7</b>)",
                aralin1_l3: "<b>Zero (0)</b>: Walang simbolo, hindi positibo o negatibo.",
                aralin1_h3_2: "Pag-aayos ng Integers",
                aralin1_p2: "Mas malaki ang halaga ng integer habang umuusad ito pakanan o pataas sa number line.",
                aralin1_ex1_title1: "Pataas (Ascending Order):",
                aralin1_ex1_p1: "Mula sa pinakamaliit hanggang pinakamalaki: <b>-10, -5, 0, 5, 10</b>.",
                aralin1_ex1_title2: "Pababa (Descending Order):",
                aralin1_ex1_p2: "Mula sa pinakamalaki hanggang pinakamaliit: <b>10, 5, 0, -5, -10</b>.",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Addition at Subtraction ng Integers",
                aralin2_h3_1: "Pagdaragdag (Addition)",
                aralin2_l1: "<b>Magkatulad ang Simbolo</b>: Hanapin ang suma ng absolute values, at gamitin ang common na simbolo.",
                aralin2_ex1_solution1: "<span>(+3) + (+5) = +8</span><br><span>(-6) + (-3) = -9</span>",
                aralin2_l2: "<b>Magkaiba ang Simbolo</b>: Hanapin ang difference (pagbabawas) ng absolute values, at gamitin ang simbolo ng numerong may mas mataas na absolute value.",
                aralin2_ex1_solution2: "<span>(+7) + (-4) = +3</span> (Mas mataas ang 7 kaysa 4)<br><span>(-5) + (+3) = -2</span> (Mas mataas ang 5 kaysa 3)",
                aralin2_h3_2: "Pagbabawas (Subtraction)",
                aralin2_p1: "<b>Rule:</b> Palitan ang simbolo ng <b>Subtrahend</b> (ang binabawas) at sundin ang mga tuntunin ng Addition.",
                aralin2_ex2_title: "HALIMBAWA:",
                aralin2_ex2_p1: "<span>(+8) - (+5) → (+8) + (-5) = <b>+3</b></span>",
                aralin2_ex2_p2: "<span>(-7) - (-4) → (-7) + (+4) = <b>-3</b></span>",
                aralin2_ex2_p3: "<span>(+9) - (-2) → (+9) + (+2) = <b>+11</b></span>",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Multiplication at Division ng Integers",
                aralin3_h3_1: "Pagpaparami (Multiplication) at Paghahati (Division)",
                aralin3_l1: "<b>Magkatulad ang Simbolo</b> (Positive x Positive / Negative x Negative): Ang sagot ay laging <b>Positive</b> (+).",
                aralin3_ex1_solution1: "<span>(+9) x (+2) = +18</span><br><span>(-8) / (-2) = +4</span>",
                aralin3_l2: "<b>Magkaiba ang Simbolo</b> (Positive x Negative / Negative x Positive): Ang sagot ay laging <b>Negative</b> (-).",
                aralin3_ex1_solution2: "<span>(+5) x (-4) = -20</span><br><span>(-18) / (+3) = -6</span>",

                // Lesson 4 Content
                aralin4_title: "Aralin 4: Pag-aaral ng Integers (Word Problems)",
                aralin4_p1: "Ang <b>Word Problems</b> ay ginagamitan ng integers sa paglutas ng mga sitwasyon sa totoong buhay tulad ng pera, taas/lalim, at temperatura.",
                aralin4_h3_1: "Hakbang sa Paglutas",
                aralin4_l1: "Alamin ang mga <b>Katibayan</b> at tukuyin ang <b>Positive (+)</b> at <b>Negative (-)</b> na halaga.",
                aralin4_l2: "Alamin kung anong <b>Operasyon</b> (Addition, Subtraction, Multiplication, Division) ang gagamitin.",
                aralin4_l3: "I-apply ang tamang <b>Rules of Integers</b>.",
                aralin4_ex1_title: "HALIMBAWA:",
                aralin4_ex1_p1: "Ang helikopter ay <b>2,500 metro ang lipad</b> (+2,500) mula sa ibabaw ng karagatan. Ang submarino ay nasa <b>1,850 metro sa ilalim</b> (-1,850) ng dagat. Gaano kalayo ang helikopter sa submarino?",
                aralin4_ex1_p2: "Operasyon: Subtraction (Pagbabawas) upang mahanap ang distansya.",
                aralin4_ex1_solution1: "<span><b>+2,500 - (-1,850)</b> → 2,500 + 1,850 = <b>4,350 metro</b></span>",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang sumusunod na integer operations.",
                quiz_section1_title: "A. Mixed Operations",
                qa1_label: "1. (+15) + (-20) =",
                qa1_placeholder: "Sagot",
                qa2_label: "2. (-7) - (-14) =",
                qa2_placeholder: "Sagot",
                qa3_label: "3. (-9) x (+4) =",
                qa3_placeholder: "Sagot",
                qa4_label: "4. (-45) / (-5) =",
                qa4_placeholder: "Sagot",
                qa5_label: "5. (+100) + (-120) - (-10) =",
                qa5_placeholder: "Sagot",
                quiz_button: "Tapusin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakagaling! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang rules ng integers!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang rules ng Addition at Subtraction.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang buong module.`,
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
            // Allow negative sign and decimals
            value = value.trim().replace(',', '.').replace(/[^0-9.-]/g, ''); 
            const parsedValue = parseFloat(value);
            return isNaN(parsedValue) ? 0 : parsedValue;
        }

        function checkAnswer(id, expected, tolerance = 0.001) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            const inputFloat = standardizeFloat(rawValue);
            const expectedFloat = standardizeFloat(String(expected));
            
            // Allow for positive sign to be omitted (+5 vs 5)
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
        document.getElementById('integer-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false);
        });

        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 5; 
            const resultsDiv = document.getElementById('results');
            
            // Expected Answers:
            // 1. (+15) + (-20) = -5
            const ans_a1 = -5;
            
            // 2. (-7) - (-14) = -7 + 14 = +7
            const ans_a2 = 7;
            
            // 3. (-9) * (+4) = -36
            const ans_a3 = -36;

            // 4. (-45) / (-5) = +9
            const ans_a4 = 9;

            // 5. (+100) + (-120) - (-10) = 100 - 120 + 10 = -20 + 10 = -10
            const ans_a5 = -10;

            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1', ans_a1);
                correctCount += checkAnswer('qa2', ans_a2);
                correctCount += checkAnswer('qa3', ans_a3);
                correctCount += checkAnswer('qa4', ans_a4);
                correctCount += checkAnswer('qa5', ans_a5);
                
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
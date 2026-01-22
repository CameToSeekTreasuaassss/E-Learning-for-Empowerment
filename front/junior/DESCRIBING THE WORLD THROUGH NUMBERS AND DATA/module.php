<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Describing the World Using Numbers and Data</title>
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
        #objectives ul li { /* Changed #tungkol-saan to #objectives */
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
            text-align: left; /* Changed from center */
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
        }
        
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Data Collection (Survey)</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Data Organization (Graphs)</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Reading and Interpretation</a>
                    <a href="#pagsasanay" class="outline-link" data-i18n="outline_quiz">Practice (Interpretation)</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Describing the World Using Numbers and Data</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Learning how to collect, organize, and interpret information (data) around us.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <!-- Changed ID from 'tungkol-saan' to 'objectives' for consistency -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Confirmed: List items font size is set to 1.25rem (20px) -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Create simple and effective <b>statistical instruments (survey)</b>.</li>
                        <li data-i18n="obj_2">Present data using different types of <b>graphs</b> (Pictograph, Bar, Pie, Line).</li>
                        <li data-i18n="obj_3">Read, understand, and draw conclusions based on data presented in graphs and tables.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Pagkuha ng Datos (Survey) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Excuse Me, May I Ask You a Question? (Data Collection)</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1"><b>Data</b> refers to facts (such as numbers, words, or descriptions) used for analysis. The <b>Population</b> is the entire group being studied.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Methods of Data Collection</h3>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin1_l1"><b>Observation</b>: Observing the behavior/characteristics of the subject without direct interaction.</li>
                                <li data-i18n="aralin1_l2"><b>Experiment</b>: Performing a scientific procedure to find an answer to a problem.</li>
                                <li data-i18n="aralin1_l3"><b>Survey</b>: An investigation using questions to obtain information from <b>respondents</b>. This is the most popular method.</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Types of Survey</h3>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin1_l4"><b>Interview</b>: Direct interaction (in-person, phone, online) with the respondent.</li>
                                <li data-i18n="aralin1_l5"><b>Questionnaire</b>: A series of written questions (document or online form) answered by the respondent.</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Types of Survey Questions</h3>
                            <div class="example-box">
                                <ul class="list-disc list-inside ml-4">
                                    <li data-i18n="aralin1_l6"><b>Dichotomous</b>: Only two options to choose from (e.g., <b>Yes or No</b>).</li>
                                    <li data-i18n="aralin1_l7"><b>Multiple-Choice</b>: Choose one or more answers from a list.</li>
                                    <li data-i18n="aralin1_l8"><b>Scaling Questions</b>: Uses <b>numbers (1-5, 1-10)</b> to measure feelings or level of agreement (e.g., how satisfied are you?).</li>
                                    <li data-i18n="aralin1_l9"><b>Likert Scales</b>: Measures attitude/opinion using <b>Agree/Disagree</b> (e.g., Strongly Agree, Neutral, Strongly Disagree). </li>
                                </ul>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Pagsasaayos ng Datos (Graphs) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Let's Organize This (Graphs and Units)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">A <b>Graph</b> is a visual representation that shows the relationship between two sets of data in an organized manner.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Types of Graphs</h3>
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full">
                                    <thead>
                                        <tr data-i18n="aralin2_table_header"><th>Type of Graph</th><th>Description</th><th>Usage</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin2_table_row1"><td><b>Pictograph</b></td><td>Uses pictures/symbols (with a <b>Legend</b>)</td><td>Showing the count or quantity of each category.</td></tr>
                                        <tr data-i18n="aralin2_table_row2"><td><b>Pie Chart</b></td><td>A circular graph with slices (<b>Percentage</b>)</td><td>Comparing parts to the whole (100%). E.g., Budget. </td></tr>
                                        <tr data-i18n="aralin2_table_row3"><td><b>Bar Graph</b></td><td>Uses vertical or horizontal <b>Bars</b></td><td>Comparing values between different groups. </td></tr>
                                        <tr data-i18n="aralin2_table_row4"><td><b>Line Graph</b></td><td>Uses <b>Lines</b> connected by points</td><td>Tracking <b>changes</b> or <b>trends</b> over a short or long period. </td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Parts of a Graph</h3>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin2_l1"><b>Title</b>: States what the graph is about.</li>
                                <li data-i18n="aralin2_l2"><b>Axes</b>: The <b>Horizontal Axis</b> (x-axis) and <b>Vertical Axis</b> (y-axis) containing categories and values.</li>
                                <li data-i18n="aralin2_l3"><b>Labels/Scale</b>: Explains the numbers and what they represent (e.g., Number of Students, In Kilograms).</li>
                                <li data-i18n="aralin2_l4"><b>Legend</b>: A key that explains the symbols, colors, or lines.</li>
                            </ul>
                        </div>
                    </details>
                    
                    <!-- ARALIN 3: Pagbabasa at Interpretasyon -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: So, What Do You Mean? (Reading and Interpretation)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1"><b>Interpretation</b> is the ability to read and understand what the data shows in order to make <b>Comparisons</b> and form the correct <b>Conclusion</b>.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Steps in Interpretation</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin3_ol1"><b>Read the Title and Axes:</b> Know what is being compared (e.g., Month vs. Sales Volume).</li>
                                <li data-i18n="aralin3_ol2"><b>Find the Highest and Lowest:</b> Determine the trend. In a Line Graph, an upward line is <b>increase</b>, and a downward line is <b>decrease</b>.</li>
                                <li data-i18n="aralin3_ol3"><b>Draw a Conclusion:</b> Answer the question based on the data (e.g., "Why did sales increase in May?").</li>
                            </ol>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex_title">EXAMPLE: Reading a Bar Graph</p>
                                <p data-i18n="aralin3_ex_p1">If the bar for <b>Basketball</b> is 32 and the bar for <b>Football</b> is 5, the comparison is: "32-5 = 27." 27 more students prefer Basketball than Football.</p>
                            </div>

                            <p class="mt-4" data-i18n="aralin3_p2">In a <b>Pie Chart</b>, always remember that all parts must sum to <b>100%</b>. It is used to calculate the part from the whole.</p>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the questions based on the information learned in each lesson. (Total: 9 Questions)</p>

                    <form id="data-interpretation-quiz-form" class="space-y-6">
                        
                        <!-- ARALIN 1: Pagkuha ng Datos (Survey) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">Lesson 1: Data Collection</p>
                            
                            <!-- USED FLEX-COL FOR VERTICAL ALIGNMENT AND W-FULL/W-64 INPUTS -->
                            <div class="flex flex-col space-y-4">
                                <label for="q1" class="font-medium" data-i18n="q1_label">1. Which data collection method is the most popular and uses a set of questions?</label>
                                <input type="text" id="q1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="q1_placeholder" placeholder="Answer">
                                
                                <label for="q2" class="font-medium" data-i18n="q2_label">2. What type of question only provides two options (e.g., <b>Yes or No</b>) to the respondent?</label>
                                <input type="text" id="q2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="q2_placeholder" placeholder="Question Type">

                                <label for="q3" class="font-medium" data-i18n="q3_label">3. A study where you only watch people's behavior without interaction is called?</label>
                                <input type="text" id="q3" class="quiz-input w-full sm:w-64" data-i18n-placeholder="q3_placeholder" placeholder="Collection Method">
                            </div>
                        </div>

                        <!-- ARALIN 2: Pagsasaayos ng Datos (Graphs) -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">Lesson 2: Data Organization</p>
                            
                            <div class="flex flex-col space-y-4">
                                <label for="q4" class="font-medium" data-i18n="q4_label">4. What type of graph is best used to show the percentage of a budget (part of the whole)?</label>
                                <input type="text" id="q4" class="quiz-input w-full sm:w-64" data-i18n-placeholder="q4_placeholder" placeholder="Type of Graph">
                                
                                <label for="q5" class="font-medium" data-i18n="q5_label">5. What part of a pictograph explains how many units each picture represents?</label>
                                <input type="text" id="q5" class="quiz-input w-full sm:w-64" data-i18n-placeholder="q5_placeholder" placeholder="Part of Graph">

                                <label for="q6" class="font-medium" data-i18n="q6_label">6. What type of graph is best used to show the increase and decrease in vegetable prices over six months?</label>
                                <input type="text" id="q6" class="quiz-input w-full sm:w-64" data-i18n-placeholder="q6_placeholder" placeholder="Type of Graph">
                            </div>
                        </div>

                        <!-- ARALIN 3: Pagbabasa at Interpretasyon -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section3_title">Lesson 3: Reading and Interpretation</p>
                            
                            <!-- Reference Tables (Kept for context in interpretation questions) -->
                            <p class="text-gray-600 mt-2 text-xl" data-i18n="quiz_ref_title"><b>Reference Tables:</b></p>
                            <div class="overflow-x-auto mb-4">
                                <p class="text-sm font-semibold text-gray-700 mb-1" data-i18n="quiz_ref_table1_name">Subject Preference (Number of Students)</p>
                                <table class="module-table w-full">
                                    <thead><tr data-i18n="quiz_ref_table1_header"><th>Subject</th><th>Math</th><th>Science</th><th>English</th><th>Filipino</th><th>MAPEH</th></tr></thead>
                                    <tbody data-i18n="quiz_ref_table1_data"><tr><td>Count</td><td>32</td><td>23</td><td>27</td><td>26</td><td>21</td></tr></tbody>
                                </table>
                            </div>
                            <div class="overflow-x-auto mb-4">
                                <p class="text-sm font-semibold text-gray-700 mb-1" data-i18n="quiz_ref_table2_name">CO₂ Emission by Sector</p>
                                <table class="module-table w-full">
                                    <thead><tr data-i18n="quiz_ref_table2_header"><th>Sector</th><th>Transpo</th><th>Electric Power</th><th>Industrial</th><th>Residential</th><th>Commercial</th></tr></thead>
                                    <tbody data-i18n="quiz_ref_table2_data"><tr><td>Percentage (%)</td><td>58%</td><td>16%</td><td>13%</td><td>9%</td><td>4%</td></tr></tbody>
                                </table>
                            </div>
                            
                            <div class="flex flex-col space-y-4">
                                <label for="q7" class="font-medium" data-i18n="q7_label">7. (Using Subject Data) Which subject has the lowest number of students?</label>
                                <input type="text" id="q7" class="quiz-input w-full sm:w-64" data-i18n-placeholder="q7_placeholder" placeholder="Answer (Subject)">

                                <label for="q8" class="font-medium" data-i18n="q8_label">8. (Using CO₂ Data) What is the total contribution percentage (%) of Transportation (58%) and Electric Power (16%)?</label>
                                <input type="text" id="q8" class="quiz-input w-full sm:w-64" data-i18n-placeholder="q8_placeholder" placeholder="Answer (%)">

                                <label for="q9" class="font-medium" data-i18n="q9_label">9. (Using Subject Data) What is the difference in students between Math (32) and Filipino (26)?</label>
                                <input type="text" id="q9" class="quiz-input w-full sm:w-64" data-i18n-placeholder="q9_placeholder" placeholder="Answer (Count)">
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
                outline_aralin1: "Lesson 1: Data Collection (Survey)",
                outline_aralin2: "Lesson 2: Data Organization (Graphs)",
                outline_aralin3: "Lesson 3: Reading and Interpretation",
                outline_quiz: "Practice (Interpretation)", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Describing the World Using Numbers and Data",
                h1_subtitle: "Learning how to collect, organize, and interpret information (data) around us.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Create simple and effective <b>statistical instruments (survey)</b>.",
                obj_2: "Present data using different types of <b>graphs</b> (Pictograph, Bar, Pie, Line).",
                obj_3: "Read, understand, and draw conclusions based on data presented in graphs and tables.",

                // Lesson 1 Content (Data Collection)
                aralin1_title: "Lesson 1: Excuse Me, May I Ask You a Question? (Data Collection)",
                aralin1_p1: "<b>Data</b> refers to facts (such as numbers, words, or descriptions) used for analysis. The <b>Population</b> is the entire group being studied.",
                aralin1_h3_1: "Methods of Data Collection",
                aralin1_l1: "<b>Observation</b>: Observing the behavior/characteristics of the subject without direct interaction.",
                aralin1_l2: "<b>Experiment</b>: Performing a scientific procedure to find an answer to a problem.",
                aralin1_l3: "<b>Survey</b>: An investigation using questions to obtain information from <b>respondents</b>. This is the most popular method.",
                aralin1_h3_2: "Types of Survey",
                aralin1_l4: "<b>Interview</b>: Direct interaction (in-person, phone, online) with the respondent.",
                aralin1_l5: "<b>Questionnaire</b>: A series of written questions (document or online form) answered by the respondent.",
                aralin1_h3_3: "Types of Survey Questions",
                aralin1_l6: "<b>Dichotomous</b>: Only two options to choose from (e.g., <b>Yes or No</b>).",
                aralin1_l7: "<b>Multiple-Choice</b>: Choose one or more answers from a list.",
                aralin1_l8: "<b>Scaling Questions</b>: Uses <b>numbers (1-5, 1-10)</b> to measure feelings or level of agreement (e.g., how satisfied are you?).",
                aralin1_l9: "<b>Likert Scales</b>: Measures attitude/opinion using <b>Agree/Disagree</b> (e.g., Strongly Agree, Neutral, Strongly Disagree).",

                // Lesson 2 Content (Graphs)
                aralin2_title: "Lesson 2: Let's Organize This (Graphs and Units)",
                aralin2_p1: "A <b>Graph</b> is a visual representation that shows the relationship between two sets of data in an organized manner.",
                aralin2_h3_1: "Types of Graphs",
                aralin2_table_header: "<th>Type of Graph</th><th>Description</th><th>Usage</th>",
                aralin2_table_row1: "<td><b>Pictograph</b></td><td>Uses pictures/symbols (with a <b>Legend</b>)</td><td>Showing the count or quantity of each category.</td>",
                aralin2_table_row2: "<td><b>Pie Chart</b></td><td>A circular graph with slices (<b>Percentage</b>)</td><td>Comparing parts to the whole (100%). E.g., Budget.</td>",
                aralin2_table_row3: "<td><b>Bar Graph</b></td><td>Uses vertical or horizontal <b>Bars</b></td><td>Comparing values between different groups.</td>",
                aralin2_table_row4: "<td><b>Line Graph</b></td><td>Uses <b>Lines</b> connected by points</td><td>Tracking <b>changes</b> or <b>trends</b> over a short or long period.</td>",
                aralin2_h3_2: "Parts of a Graph",
                aralin2_l1: "<b>Title</b>: States what the graph is about.",
                aralin2_l2: "<b>Axes</b>: The <b>Horizontal Axis</b> (x-axis) and <b>Vertical Axis</b> (y-axis) containing categories and values.",
                aralin2_l3: "<b>Labels/Scale</b>: Explains the numbers and what they represent (e.g., Number of Students, In Kilograms).",
                aralin2_l4: "<b>Legend</b>: A key that explains the symbols, colors, or lines.",

                // Lesson 3 Content (Interpretation)
                aralin3_title: "Lesson 3: So, What Do You Mean? (Reading and Interpretation)",
                aralin3_p1: "<b>Interpretation</b> is the ability to read and understand what the data shows in order to make <b>Comparisons</b> and form the correct <b>Conclusion</b>.",
                aralin3_h3_1: "Steps in Interpretation",
                aralin3_ol1: "<b>Read the Title and Axes:</b> Know what is being compared (e.g., Month vs. Sales Volume).",
                aralin3_ol2: "<b>Find the Highest and Lowest:</b> Determine the trend. In a Line Graph, an upward line is <b>increase</b>, and a downward line is <b>decrease</b>.",
                aralin3_ol3: "<b>Draw a Conclusion:</b> Answer the question based on the data (e.g., \"Why did sales increase in May?\").",
                aralin3_ex_title: "EXAMPLE: Reading a Bar Graph",
                aralin3_ex_p1: "If the bar for <b>Basketball</b> is 32 and the bar for <b>Football</b> is 5, the comparison is: \"32-5 = 27.\" 27 more students prefer Basketball than Football.",
                aralin3_p2: "In a <b>Pie Chart</b>, always remember that all parts must sum to <b>100%</b>. It is used to calculate the part from the whole.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Answer the questions based on the information learned in each lesson. (Total: 9 Questions)",
                
                quiz_section1_title: "Lesson 1: Data Collection",
                q1_label: "1. Which data collection method is the most popular and uses a set of questions?",
                q1_placeholder: "Answer",
                q2_label: "2. What type of question only provides two options (e.g., <b>Yes or No</b>) to the respondent?",
                q2_placeholder: "Question Type",
                q3_label: "3. A study where you only watch people's behavior without interaction is called?",
                q3_placeholder: "Collection Method",
                
                quiz_section2_title: "Lesson 2: Data Organization",
                q4_label: "4. What type of graph is best used to show the percentage of a budget (part of the whole)?",
                q4_placeholder: "Type of Graph",
                q5_label: "5. What part of a pictograph explains how many units each picture represents?",
                q5_placeholder: "Part of Graph",
                q6_label: "6. What type of graph is best used to show the increase and decrease in vegetable prices over six months?",
                q6_placeholder: "Type of Graph",
                
                quiz_section3_title: "Lesson 3: Reading and Interpretation",
                quiz_ref_title: "<b>Reference Tables:</b>",
                quiz_ref_table1_name: "Subject Preference (Number of Students)",
                quiz_ref_table1_header: "<th>Subject</th><th>Math</th><th>Science</th><th>English</th><th>Filipino</th><th>MAPEH</th>",
                quiz_ref_table1_data: "<tr><td>Count</td><td>32</td><td>23</td><td>27</td><td>26</td><td>21</td></tr>",
                quiz_ref_table2_name: "CO₂ Emission by Sector",
                quiz_ref_table2_header: "<th>Sector</th><th>Transpo</th><th>Electric Power</th><th>Industrial</th><th>Residential</th><th>Commercial</th>",
                quiz_ref_table2_data: "<tr><td>Percentage (%)</td><td>58%</td><td>16%</td><td>13%</td><td>9%</td><td>4%</td></tr>",

                q7_label: "7. (Using Subject Data) Which subject has the lowest number of students?",
                q7_placeholder: "Answer (Subject)",
                q8_label: "8. (Using CO₂ Data) What is the total contribution percentage (%) of Transportation (58%) and Electric Power (16%)?",
                q8_placeholder: "Answer (%)",
                q9_label: "9. (Using Subject Data) What is the difference in students between Math (32) and Filipino (26)?",
                q9_placeholder: "Answer (Count)",

                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You successfully mastered the module!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Re-read Lessons 1-3.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pagkuha ng Datos (Survey)",
                outline_aralin2: "Aralin 2: Pagsasaayos ng Datos (Graphs)",
                outline_aralin3: "Aralin 3: Pagbabasa at Interpretasyon",
                outline_quiz: "Pagsasanay (Interpretasyon)", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Paglalarawan sa Mundo Gamit ang Numero at Datos",
                h1_subtitle: "Pag-aaral kung paano kokolektahin, iaayos, at iintindihin ang mga impormasyon (data) sa ating paligid.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Gumawa ng simple at epektibong <b>statistical instruments (survey)</b>.",
                obj_2: "Ilahad ang mga datos gamit ang iba't ibang uri ng <b>graphs</b> (Pictograph, Bar, Pie, Line).",
                obj_3: "Basahin, intindihin, at gumawa ng konklusyon base sa mga datos na nakita sa graphs at tables.",

                // Lesson 1 Content (Data Collection)
                aralin1_title: "Aralin 1: Excuse Me, May I Ask You a Question? (Pagkuha ng Datos)",
                aralin1_p1: "Ang <b>Datos (Data)</b> ay mga katotohanan (facts) tulad ng numero, salita, o paglalarawan na ginagamit para sa pagsusuri. Ang <b>Populasyon (Population)</b> ay ang kabuuang grupo na pinag-aaralan.",
                aralin1_h3_1: "Mga Paraan ng Pagkolekta ng Datos",
                aralin1_l1: "<b>Observation</b>: Pagtingin sa ugali/katangian ng subject nang walang direktang interaksyon.",
                aralin1_l2: "<b>Experiment</b>: Paggawa ng scientific procedure para makahanap ng sagot sa isang problema.",
                aralin1_l3: "<b>Survey</b>: Isang imbestigasyon gamit ang mga tanong upang makakuha ng impormasyon mula sa mga <b>respondent</b>. Ito ang pinakapopular na paraan.",
                aralin1_h3_2: "Uri ng Survey",
                aralin1_l4: "<b>Interview</b>: Direktang pakikipag-ugnayan (personal, telepono, online) sa respondent.",
                aralin1_l5: "<b>Questionnaire</b>: Isang serye ng nakasulat na tanong (dokumento o online form) na sinasagutan ng respondent.",
                aralin1_h3_3: "Mga Uri ng Tanong sa Survey",
                aralin1_l6: "<b>Dichotomous</b>: Dalawang opsyon lang ang pagpipilian (hal. <b>Oo o Hindi</b>) sa respondent.",
                aralin1_l7: "<b>Multiple-Choice</b>: Pumili ng isa o higit pang sagot mula sa listahan.",
                aralin1_l8: "<b>Scaling Questions</b>: Gumagamit ng <b>numero (1-5, 1-10)</b> upang sukatin ang damdamin o lebel ng pagsang-ayon (hal. gaano ka nasisiyahan?).",
                aralin1_l9: "<b>Likert Scales</b>: Sinusukat ang pag-uugali/opinyon gamit ang <b>Agree/Disagree</b> (hal. Strongly Agree, Neutral, Strongly Disagree).",

                // Lesson 2 Content (Graphs)
                aralin2_title: "Aralin 2: Let's Organize This (Graphs at Yunit)",
                aralin2_p1: "Ang <b>Graph</b> ay isang biswal na representasyon na nagpapakita ng relasyon sa pagitan ng dalawang hanay ng datos sa maayos na paraan.",
                aralin2_h3_1: "Mga Uri ng Graph",
                aralin2_table_header: "<th>Uri ng Graph</th><th>Paglalarawan</th><th>Gamit</th>",
                aralin2_table_row1: "<td><b>Pictograph</b></td><td>Gumagamit ng larawan/simbolo (may <b>Legend</b>)</td><td>Pagpapakita ng bilang o dami ng bawat kategorya.</td>",
                aralin2_table_row2: "<td><b>Pie Chart</b></td><td>Pabilog na graph na may hati (<b>Percentage</b>)</td><td>Pagkumpara ng mga bahagi (parts) sa kabuuan (whole - 100%). Hal. Budget.</td>",
                aralin2_table_row3: "<td><b>Bar Graph</b></td><td>Gumagamit ng vertical o horizontal na <b>Bars</b></td><td>Pagkumpara ng values sa pagitan ng iba't ibang grupo.</td>",
                aralin2_table_row4: "<td><b>Line Graph</b></td><td>Gumagamit ng <b>Lines</b> na konektado ng points</td><td>Pag-track ng <b>pagbabago (changes)</b> o <b>trend</b> sa loob ng maikli o mahabang panahon.</td>",
                aralin2_h3_2: "Mga Bahagi ng Graph",
                aralin2_l1: "<b>Title</b>: Sinasabi kung tungkol saan ang graph.",
                aralin2_l2: "<b>Axes</b>: Ang <b>Horizontal Axis</b> (x-axis) at <b>Vertical Axis</b> (y-axis) na naglalaman ng kategorya at values.",
                aralin2_l3: "<b>Labels/Scale</b>: Nagpapaliwanag ng mga numero at kung ano ang kinakatawan nito (hal. Number of Students, In Kilograms).",
                aralin2_l4: "<b>Legend</b>: Susi (key) na nagpapaliwanag ng mga simbolo, kulay, o linya.",

                // Lesson 3 Content (Interpretation)
                aralin3_title: "Aralin 3: So, What Do You Mean? (Pagbabasa at Interpretasyon)",
                aralin3_p1: "Ang <b>Interpretasyon</b> ay ang kakayahang basahin at unawain ang ipinapakita ng datos para makagawa ng mga <b>Comparison</b> at makabuo ng tamang <b>Conclusion</b> (konklusyon).",
                aralin3_h3_1: "Hakbang sa Interpretasyon",
                aralin3_ol1: "<b>Basahin ang Title at Axes:</b> Alamin kung ano ang pinagkukumpara (hal. Buwan vs. Dami ng Benta).",
                aralin3_ol2: "<b>Hanapin ang Pinakamataas at Pinakamababa:</b> Tukuyin ang trend. Sa Line Graph, ang paakyat na linya ay <b>increase</b>, ang pababa ay <b>decrease</b>.",
                aralin3_ol3: "<b>Gumawa ng Konklusyon:</b> Sagutin ang tanong batay sa datos (hal. \"Bakit tumaas ang benta noong Mayo?\").",
                aralin3_ex_title: "HALIMBAWA: Pagbasa sa Bar Graph",
                aralin3_ex_p1: "Kung ang bar ng <b>Basketball</b> ay 32 at ang bar ng <b>Football</b> ay 5, ang comparison ay: \"32-5 = 27.\" Mas marami ng 27 estudyante ang paborito ang Basketball kaysa Football.",
                aralin3_p2: "Sa <b>Pie Chart</b>, laging tandaan na ang lahat ng bahagi ay dapat mag-dagdag (sum) sa <b>100%</b>. Ginagamit ito para magkalkula ng bahagi mula sa kabuuan.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutan ang mga tanong base sa impormasyon na natutunan sa bawat aralin. (Total: 9 Questions)",
                
                quiz_section1_title: "Aralin 1: Pagkuha ng Datos",
                q1_label: "1. Aling paraan ng pagkuha ng datos ang pinakapopular at gumagamit ng set ng tanong?",
                q1_placeholder: "Sagot",
                q2_label: "2. Anong uri ng tanong ang nagbibigay lang ng dalawang opsyon (hal. <b>Oo o Hindi</b>) sa respondent?",
                q2_placeholder: "Uri ng Tanong",
                q3_label: "3. Ang isang pag-aaral kung saan tinitingnan mo lang ang ugali ng mga tao nang walang interaksyon ay tinatawag na?",
                q3_placeholder: "Paraan ng Pagkuha",
                
                quiz_section2_title: "Aralin 2: Pagsasaayos ng Datos",
                q4_label: "4. Anong uri ng graph ang pinakamainam gamitin para ipakita ang porsyento ng budget (parte sa kabuuan)?",
                q4_placeholder: "Uri ng Graph",
                q5_label: "5. Anong bahagi ng pictograph ang nagpapaliwanag kung ilang units ang katumbas ng bawat larawan?",
                q5_placeholder: "Bahagi ng Pictograph",
                q6_label: "6. Anong uri ng graph ang pinakamahusay na ginagamit upang ipakita ang pagtaas at pagbaba ng presyo ng gulay sa loob ng anim na buwan?",
                q6_placeholder: "Uri ng Graph",
                
                quiz_section3_title: "Aralin 3: Pagbabasa at Interpretasyon",
                quiz_ref_title: "<b>Reference Tables:</b>",
                quiz_ref_table1_name: "Subject Preference (Bilang ng Estudyante)",
                quiz_ref_table1_header: "<th>Subject</th><th>Math</th><th>Science</th><th>English</th><th>Filipino</th><th>MAPEH</th>",
                quiz_ref_table1_data: "<tr><td>Bilang</td><td>32</td><td>23</td><td>27</td><td>26</td><td>21</td></tr>",
                quiz_ref_table2_name: "CO₂ Emission by Sector",
                quiz_ref_table2_header: "<th>Sector</th><th>Transpo</th><th>Electric Power</th><th>Industrial</th><th>Residential</th><th>Commercial</th>",
                quiz_ref_table2_data: "<tr><td>Porsiyento (%)</td><td>58%</td><td>16%</td><td>13%</td><td>9%</td><td>4%</td></tr>",

                q7_label: "7. (Gamit ang Subject Data) Anong subject ang may pinakamababang bilang ng estudyante?",
                q7_placeholder: "Sagot (Subject)",
                q8_label: "8. (Gamit ang CO₂ Data) Ilang porsyento (%) ang kabuuang kontribusyon ng Transportation (58%) at Electric Power (16%)?",
                q8_placeholder: "Sagot (%)",
                q9_label: "9. (Gamit ang Subject Data) Ilan ang pagkakaiba (difference) ng estudyante sa Math (32) at Filipino (26)?",
                q9_placeholder: "Sagot (Bilang)",

                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Mahusay ang iyong pag-unawa sa buong modyul!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga bahagi ng aralin kung saan ka nagkamali.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang Aralin 1-3.`,
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
            'objectives', // Updated from 'tungkol-saan'
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
        document.addEventListener('DOMContentLoaded', highlightOutlineLink); // Keep for initial load


        // --- QUIZ LOGIC ---

        // Function to standardize numerical input for float comparison
        function standardizeFloat(value, precision = 2) {
            if (typeof value !== 'string') value = String(value);
            // Remove all non-numeric characters except for dots
            value = value.trim().replace(/\s/g, '').replace(/[^0-9.]/g, ''); 
            const parsedValue = parseFloat(value);
            if (isNaN(parsedValue)) return ''; 
            
            // Remove trailing zeros for cleaner comparison (e.g., 4.7 instead of 4.70)
            return parsedValue.toFixed(precision).replace(/\.?0+$/, ''); 
        }
        
        // Function to standardize text answers (Comparison/Yes/No)
        function standardizeText(value) {
            if (typeof value !== 'string') return String(value).toLowerCase();
            // Remove special characters (except spaces) and standardize spaces
            return value.trim().toLowerCase().replace(/[^a-z0-9 ]/g, '').replace(/\s+/g, ' '); 
        }

        function checkAnswer(id, expected, isStrictText = false, precision = 2) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            let isCorrect = false;

            if (isStrictText) {
                const standardizedInput = standardizeText(rawValue);
                const standardizedExpected = standardizeText(expected);
                
                // Use includes for flexible text matching (e.g., 'pie' matches 'pie chart')
                isCorrect = standardizedInput.includes(standardizedExpected);
                
            } else {
                const standardizedInput = parseFloat(standardizeFloat(rawValue, precision));
                const expectedFloat = parseFloat(standardizeFloat(String(expected), precision));
                
                // Use a small tolerance for comparison
                isCorrect = Math.abs(standardizedInput - expectedFloat) < 0.01;
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
        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 9; 
            const resultsDiv = document.getElementById('results');
            
            // --- Expected Answers ---
            const answers = {
                // Aralin 1 (Text)
                q1: 'survey',
                q2: 'dichotomous',
                q3: 'observation',

                // Aralin 2 (Text)
                q4: 'pie chart',
                q5: 'legend',
                q6: 'line graph',

                // Aralin 3 (Interpretation - Numerical/Text)
                q7: 'MAPEH', // Lowest student count: 21
                q8: 74,      // 58 + 16 = 74
                q9: 6,       // 32 - 26 = 6
            };
            
            if (!isLanguageToggle) {
                // Run checks only on button click, not language toggle
                correctCount += checkAnswer('q1', answers.q1, true); 
                correctCount += checkAnswer('q2', answers.q2, true); 
                correctCount += checkAnswer('q3', answers.q3, true); 

                correctCount += checkAnswer('q4', answers.q4, true); 
                correctCount += checkAnswer('q5', answers.q5, true); 
                correctCount += checkAnswer('q6', answers.q6, true); 
                
                correctCount += checkAnswer('q7', answers.q7, true); 
                correctCount += checkAnswer('q8', answers.q8, false, 0); // Numerical, whole number
                correctCount += checkAnswer('q9', answers.q9, false, 0); // Numerical, whole number

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
        
        document.getElementById('data-interpretation-quiz-form').addEventListener('submit', function(e) {
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oras (Time)</title>
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
        .accent-bg { background-color: #10b981; } /* Emerald Green */
        .module-section { 
            transition: all 0.3s ease; 
            border: 1px solid #e5e7eb; /* Light border */
        }
        .module-section:hover { 
            /* Subtle emerald glow effect on hover */
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
        
        /* Time Math Display */
        .time-math {
            font-family: monospace;
            white-space: pre;
            padding: 0.75rem;
            background-color: #ecfdf5; /* Light green background */
            border-radius: 0.5rem;
            border: 1px solid #a7f3d0; /* Light green border */
            color: #059669; /* Dark green text */
            font-size: 1.25rem; /* 20px, consistent with content */
            margin: 2rem 0; /* 2rem spacing */
            overflow-x: auto;
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
        
        /* Table Styles for Schedules */
        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            margin: 2rem 0; /* 2rem spacing */
        }
        .schedule-table th, .schedule-table td {
            border: 1px solid #a7f3d0;
            padding: 0.75rem 0.5rem;
            font-size: 1.25rem; 
        }
        .schedule-table th {
            background-color: #a7f3d0; /* Light green header */
            font-weight: 600;
            color: #065f46;
        }
        .schedule-table tbody tr:nth-child(even) {
            background-color: #f0fdf4; /* Alternating row color */
        }
        
        /* Input Styles - Now 20px (1.25rem) for consistency */
        .quiz-input, .calc-input {
            border: 1px solid #d1fae5;
            border-bottom: 2px solid #a7f3d0; 
            transition: border-color 0.2s, background-color 0.2s; 
            padding: 0.5rem; 
            text-align: center; 
            border-radius: 0.375rem;
            font-size: 1.25rem; /* Input text size also 20px for consistency */
            width: 100%;
        }
        @media (min-width: 640px) {
            .quiz-input, .calc-input {
                width: 12rem; /* w-48 equivalent on desktop for calc inputs */
                max-width: 12rem;
            }
        }
        .quiz-input:focus, .calc-input:focus { border-color: #059669; outline: none; box-shadow: 0 0 0 1px #059669; }

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
        
        /* Custom CSS to make the entire NAV sticky */
        #outline-nav .sticky-container {
            position: sticky;
            top: 1rem; /* Adjust this value as needed, 1rem (16px) is usually good */
        }
        /* Style for LaTeX/Math formulas */
        .math-formula {
            display: block;
            margin: 1rem 0;
            padding: 0.75rem;
            text-align: center;
            font-size: 1.25rem; /* Updated to 20px */
            font-weight: bold;
            color: #059669; /* Green 600 */
            background-color: #ecfdf5; /* Green 50 */
            border-radius: 0.5rem;
            border: 1px dashed #a7f3d0;
        }
        /* Responsive Clock Placeholder - CHANGED TO CIRCLE */
        .clock-placeholder {
            border: 2px solid #ccc;
            border-radius: 50%; /* Changed to circle */
            width: 150px;
            height: 150px; /* Equal width/height for circle */
            font-size: 1.25rem; /* 20px */
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0.5rem;
            background-color: #fff;
            box-shadow: inset 0 0 5px rgba(0,0,0,0.1);
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
                    <span data-i18n="back_to_modules">Go Back to Modules</span>
                </a>
            
                <!-- 2. OUTLINE (Balangkas ng Modyul) - SECOND POSITION -->
                <div id="outline" class="p-4 space-y-2 bg-white rounded-xl shadow-lg border border-green-100">
                    
                    <!-- Outline Header: Title only -->
                    <div class="border-b pb-2 mb-2">
                        <h3 class="text-lg font-bold text-green-700" data-i18n="outline_title">Module Outline</h3>
                    </div>
                    
                    <a href="#objectives" class="outline-link" data-i18n="outline_objectives">Objectives</a>
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Reading and Recording Time</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Time Conversion</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Relating Time</a>
                    <a href="#pagsasanay" class="outline-link" data-i18n="outline_quiz">Practice</a>
                </div>

                <!-- 3. Language Toggle Button (Translator) - LAST POSITION -->
                <div class="p-4 bg-white rounded-xl shadow-lg border border-green-100 flex justify-between items-center">
                    <!-- STATIC LANGUAGE LABEL (Wika: Tagalog / Language: English) - text-base is 16px, font-normal (unbolded) -->
                    <span id="current-lang-label" class="text-base text-gray-700 font-normal">Language: English</span> 
                    
                    <!-- TOGGLE BUTTON: Emerald Green colors, text-base (16px), unbolded -->
                    <button id="lang-toggle-btn" class="py-1 px-3 rounded-xl bg-[#10b981] text-white hover:bg-[#059669] transition duration-150 text-base font-normal">
                        <span data-i18n="toggle_text">Switch to: Tagalog</span>
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
                    <span class="text-xs font-semibold uppercase tracking-wider text-green-600 bg-green-100 px-3 py-1 rounded-full">Advance Elementary Learning Module Sheet</span>
                    <!-- UPDATED: Added main-title-h1 class and font-bold for 50px size -->
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Time</h1>
                    <p class="mt-4 text-gray-600 italic" data-i18n="h1_subtitle">This module covers reading, converting, and relating time in daily life situations.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Read and record time, using a clock;</li>
                        <li data-i18n="obj_2">Convert time units from larger to smaller units or vice versa;</li>
                        <li data-i18n="obj_3">Convert time stated in the 12-hour clock format to 24-hour format or vice versa;</li>
                        <li data-i18n="obj_4">Answer exercises related to time;</li>
                        <li data-i18n="obj_5">Interpret timetables or schedules; and</li>
                        <li data-i18n="obj_6">Relate time to distance, speed, and amount of work.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Pagbabasa at Pagtatala ng Oras -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Reading and Recording Time</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">Time is essential to people. Knowing the time helps you avoid being late for your scheduled activities.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Reading and Recording Time</h3>
                            <p data-i18n="aralin1_p2">We use clocks (analog and digital) to tell time. On an analog clock, the short hand is for the <span class="font-bold text-green-700">hour</span>, the long hand is for the <span class="font-bold text-green-700">minute</span>, and the thin hand is for the <span class="font-bold text-green-700">second</span>.</p>
                            <p data-i18n="aralin1_p3"><span class="font-bold text-green-700">60 seconds</span> = 1 minute<br><span class="font-bold text-green-700">60 minutes</span> = 1 hour<br><span class="font-bold text-green-700">24 hours</span> = 1 day</p>
                            <div class="flex flex-wrap justify-center my-4">
                                <div class="clock-placeholder bg-blue-50" data-i18n="aralin1_clock1">8:00 a.m.</div>
                                <div class="clock-placeholder bg-blue-50" data-i18n="aralin1_clock2">9:30 a.m.</div>
                                <div class="clock-placeholder bg-blue-50" data-i18n="aralin1_clock3">Digital: 8:30</div>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Calculating Time Duration</h3>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_q">EXAMPLE 1: How long is the trip from 6:30 a.m. to 11:30 a.m.?</p>
                                <p data-i18n="aralin1_ex1_a">Solution: From 6:30 to 11:30 is exactly <span class="font-bold">5 hours</span>.</p>
                            </div>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_q">EXAMPLE 2: How many hours are in 120 minutes?</p>
                                <p data-i18n="aralin1_ex2_a">Solution: <b>120 minutes / 60 minutes/hour = 2 hours</b>.</p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Calculating Total Days in a Month</h3>
                            <p data-i18n="aralin1_p4">It is important to know how many days each month has:</p>
                            <ul class="list-disc list-inside ml-4">
                                <li data-i18n="aralin1_list4"><span class="font-bold">31 days:</span> January, March, May, July, August, October, December.</li>
                                <li data-i18n="aralin1_list5"><span class="font-bold">30 days:</span> April, June, September, November.</li>
                                <li data-i18n="aralin1_list6"><span class="font-bold">February:</span> 28 days (common year) or 29 days (every <span class="font-bold">leap year</span>).</li>
                            </ul>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex3_q">EXAMPLE: How many days are there from January 16 to March 9 (in 2000, a leap year)?</p>
                                <p data-i18n="aralin1_ex3_a">January (31-16) = <span class="font-bold">16 days</span><br>February = <span class="font-bold">29 days</span> (because 2000 is a leap year)<br>March = <span class="font-bold">9 days</span><br>Total: 16 + 29 + 9 = <span class="font-bold">54 days</span>.</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Pagpapalit ng Oras -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Time Conversion (12-Hour vs 24-Hour)</span>
                            <svg class="w-6 h-6 text-green-600 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">The <span class="font-bold text-green-700">24-hour clock</span> or <span class="font-bold text-green-700">Military Time</span> is used in schedules and scientific work because it eliminates confusion with <span class="font-bold text-green-700">a.m.</span> and <span class="font-bold text-green-700">p.m.</span></p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Converting 12-Hour to 24-Hour</h3>
                            <ul class="list-disc list-inside ml-4">
                                <li data-i18n="aralin2_list1"><span class="font-bold">From 12:00 p.m. to 12:59 p.m.:</span> Add 1200. (E.g., 1:00 p.m. &rarr; 1300)</li>
                                <li data-i18n="aralin2_list2"><span class="font-bold">From 1:00 p.m. to 11:59 p.m.:</span> Add 1200. (E.g., 8:00 p.m. &rarr; 2000)</li>
                                <li data-i18n="aralin2_list3"><span class="font-bold">From 12:00 a.m. to 11:59 a.m.:</span> Do not add 1200. Use the same number (E.g., 7:30 a.m. &rarr; 0730)</li>
                                <li data-i18n="aralin2_list4"><span class="font-bold">12:00 a.m. (Midnight):</span> Becomes 2400 (or 0000 for the start of the new day).</li>
                            </ul>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_q">EXAMPLE: Convert 8:00 p.m. to military time.</p>
                                <p data-i18n="aralin2_ex1_a">Solution: 8 hours + 12 hours (for p.m.) = 20 hours. Answer: <span class="font-bold">2000</span>.</p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Converting 24-Hour to 12-Hour</h3>
                            <ul class="list-disc list-inside ml-4">
                                <li data-i18n="aralin2_list5"><span class="font-bold">If the time is 1300 or higher:</span> Subtract 1200 and add <span class="font-bold">p.m.</span></li>
                                <li data-i18n="aralin2_list6"><span class="font-bold">If the time is 1200:</span> It is <span class="font-bold">12:00 p.m. (Noon)</span>.</li>
                                <li data-i18n="aralin2_list7"><span class="font-bold">If the time is 1159 or lower:</span> It is <span class="font-bold">a.m.</span></li>
                            </ul>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex2_q">EXAMPLE: Convert 2333 to 12-hour format.</p>
                                <p data-i18n="aralin2_ex2_a">Solution: 2333 - 1200 = 1133. Answer: <span class="font-bold">11:33 p.m.</span></p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_3">Converting Time Units (Minutes &harr; Hours)</h3>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex3_q">EXAMPLE: How many minutes are in 2 hours?</p>
                                <p data-i18n="aralin2_ex3_a">Solution: 2 hours x 60 minutes/hour = <span class="font-bold">120 minutes</span>.</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 3: Pag-uugnay ng Oras sa Distansiya, Bilis, at Dami ng Trabaho -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Relating Time to Distance, Speed, and Workload</span>
                            <svg class="w-6 h-6 text-green-600 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">Time is used not only for reading the clock but also for calculating speed, distance, and how long a job will take.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Calculating Speed</h3>
                            <p class="math-formula" data-i18n="aralin3_formula1">Speed = Distance / Time</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex1_q">EXAMPLE: Traveled 240 km in 4 hours. What is the speed?</p>
                                <p data-i18n="aralin3_ex1_a">Solution: 240 km / 4 hours = <span class="font-bold">60 km/hour</span>.</p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">Calculating Distance</h3>
                            <p class="math-formula" data-i18n="aralin3_formula2">Distance = Speed x Time</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex2_q">EXAMPLE: Traveled for 4 hours at a speed of 2 km/hour. How far?</p>
                                <p data-i18n="aralin3_ex2_a">Solution: 2 km/hour x 4 hours = <span class="font-bold">8 km</span>.</p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_3">Calculating Workload</h3>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex3_q">EXAMPLE: Makes 12 paper cups in 30 minutes. How many in 1 hour?</p>
                                <p data-i18n="aralin3_ex3_a">Solution: There are 2 groups of 30 minutes in 1 hour. 12 paper cups x 2 = <span class="font-bold">24 paper cups</span>.</p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Test your knowledge of time conversion and calculation.</p>

                    <form id="time-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Time Conversion (24-Hour &harr; 12-Hour)</p>
                            <!-- UPDATED: Applied 20px font to labels via CSS -->
                            <div class="space-y-4"> 
                                <div class="flex items-center space-x-2"><label for="qc1" class="font-medium" data-i18n="qc1_label">1. 1330 &rarr;</label><input type="text" id="qc1" class="quiz-input" placeholder="Time (a.m./p.m.)"></div>
                                <div class="flex items-center space-x-2"><label for="qc2" class="font-medium" data-i18n="qc2_label">2. 1645 &rarr;</label><input type="text" id="qc2" class="quiz-input" placeholder="Time (a.m./p.m.)"></div>
                                <div class="flex items-center space-x-2"><label for="qc3" class="font-medium" data-i18n="qc3_label">3. 9:00 p.m. &rarr;</label><input type="number" id="qc3" class="quiz-input" placeholder="24-Hour"></div>
                                <div class="flex items-center space-x-2"><label for="qc4" class="font-medium" data-i18n="qc4_label">4. 10:30 p.m. &rarr;</label><input type="number" id="qc4" class="quiz-input" placeholder="24-Hour"></div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Time Duration Calculation</p>
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                                <div class="flex items-center space-x-2"><label for="q1" data-i18n="q1_label">1. How many hours are in 180 minutes?</label><input type="number" id="q1" class="quiz-input" placeholder="Hours"></div>
                                <div class="flex items-center space-x-2"><label for="q2" data-i18n="q2_label">2. How many minutes are in 3 hours?</label><input type="number" id="q2" class="quiz-input" placeholder="Minutes"></div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_c">C. Relating Time</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="q3" class="font-medium" data-i18n="q3_label">1. Traveled 200 km in 4 hours. What is the average speed (km/hour)?</label>
                                    <input type="number" id="q3" class="quiz-input" placeholder="Speed">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="q4" class="font-medium" data-i18n="q4_label">2. Tonyo left home at 8:00 p.m. and traveled for 7 hours. What time did he arrive (in 12-hour format)?</label>
                                    <input type="text" id="q4" class="quiz-input" placeholder="Time (a.m./p.m.)">
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
                outline_aralin1: "Lesson 1: Reading and Recording Time",
                outline_aralin2: "Lesson 2: Time Conversion",
                outline_aralin3: "Lesson 3: Relating Time",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                h1_title: "Time",
                h1_subtitle: "This module covers reading, converting, and relating time in daily life situations.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives (Capitalized first letter and applied span conversion)
                obj_1: "Read and record time, using a clock;",
                obj_2: "Convert time units from larger to smaller units or vice versa;",
                obj_3: "Convert time stated in the 12-hour clock format to 24-hour format or vice versa;",
                obj_4: "Answer exercises related to time;",
                obj_5: "Interpret timetables or schedules; and",
                obj_6: "Relate time to distance, speed, and amount of work.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Reading and Recording Time",
                aralin1_p1: "Time is essential to people. Knowing the time helps you avoid being late for your scheduled activities.",
                aralin1_h3_1: "Reading and Recording Time",
                aralin1_p2: "We use clocks (analog and digital) to tell time. On an analog clock, the short hand is for the <span class=\"font-bold text-green-700\">hour</span>, the long hand is for the <span class=\"font-bold text-green-700\">minute</span>, and the thin hand is for the <span class=\"font-bold text-green-700\">second</span>.",
                aralin1_p3: "<span class=\"font-bold text-green-700\">60 seconds</span> = 1 minute<br><span class=\"font-bold text-green-700\">60 minutes</span> = 1 hour<br><span class=\"font-bold text-green-700\">24 hours</span> = 1 day",
                aralin1_clock1: "8:00 a.m.",
                aralin1_clock2: "9:30 a.m.",
                aralin1_clock3: "Digital: 8:30",
                aralin1_h3_2: "Calculating Time Duration",
                aralin1_ex1_q: "EXAMPLE 1: How long is the trip from 6:30 a.m. to 11:30 a.m.?",
                aralin1_ex1_a: "Solution: From 6:30 to 11:30 is exactly <span class=\"font-bold\">5 hours</span>.",
                aralin1_ex2_q: "EXAMPLE 2: How many hours are in 120 minutes?",
                aralin1_ex2_a: "Solution: <b>120 minutes / 60 minutes/hour = 2 hours</b>.",
                aralin1_h3_3: "Calculating Total Days in a Month",
                aralin1_p4: "It is important to know how many days each month has:",
                aralin1_list4: "<span class=\"font-bold\">31 days:</span> January, March, May, July, August, October, December.",
                aralin1_list5: "<span class=\"font-bold\">30 days:</span> April, June, September, November.",
                aralin1_list6: "<span class=\"font-bold\">February:</span> 28 days (common year) or 29 days (every <span class=\"font-bold\">leap year</span>).",
                aralin1_ex3_q: "EXAMPLE: How many days are there from January 16 to March 9 (in 2000, a leap year)?",
                aralin1_ex3_a: "January (31-16) = <span class=\"font-bold\">16 days</span><br>February = <span class=\"font-bold\">29 days</span> (because 2000 is a leap year)<br>March = <span class=\"font-bold\">9 days</span><br>Total: 16 + 29 + 9 = <span class=\"font-bold\">54 days</span>.",
                
                // Lesson 2 Content
                aralin2_title: "Lesson 2: Time Conversion (12-Hour vs 24-Hour)",
                aralin2_p1: "The <span class=\"font-bold text-green-700\">24-hour clock</span> or <span class=\"font-bold text-green-700\">Military Time</span> is used in schedules and scientific work because it eliminates confusion with <span class=\"font-bold text-green-700\">a.m.</span> and <span class=\"font-bold text-green-700\">p.m.</span>",
                aralin2_h3_1: "Converting 12-Hour to 24-Hour",
                aralin2_list1: "<span class=\"font-bold\">From 12:00 p.m. to 12:59 p.m.:</span> Add 1200. (E.g., 1:00 p.m. &rarr; 1300)",
                aralin2_list2: "<span class=\"font-bold\">From 1:00 p.m. to 11:59 p.m.:</span> Add 1200. (E.g., 8:00 p.m. &rarr; 2000)",
                aralin2_list3: "<span class=\"font-bold\">From 12:00 a.m. to 11:59 a.m.:</span> Do not add 1200. Use the same number (E.g., 7:30 a.m. &rarr; 0730)",
                aralin2_list4: "<span class=\"font-bold\">12:00 a.m. (Midnight):</span> Becomes 2400 (or 0000 for the start of the new day).",
                aralin2_ex1_q: "EXAMPLE: Convert 8:00 p.m. to military time.",
                aralin2_ex1_a: "Solution: 8 hours + 12 hours (for p.m.) = 20 hours. Answer: <span class=\"font-bold\">2000</span>.",
                aralin2_h3_2: "Converting 24-Hour to 12-Hour",
                aralin2_list5: "<span class=\"font-bold\">If the time is 1300 or higher:</span> Subtract 1200 and add <span class=\"font-bold\">p.m.</span>",
                aralin2_list6: "<span class=\"font-bold\">If the time is 1200:</span> It is <span class=\"font-bold\">12:00 p.m. (Noon)</span>.",
                aralin2_list7: "<span class=\"font-bold\">If the time is 1159 or lower:</span> It is <span class=\"font-bold\">a.m.</span>",
                aralin2_ex2_q: "EXAMPLE: Convert 2333 to 12-hour format.",
                aralin2_ex2_a: "Solution: 2333 - 1200 = 1133. Answer: <span class=\"font-bold\">11:33 p.m.</span>",
                aralin2_h3_3: "Converting Time Units (Minutes &harr; Hours)",
                aralin2_ex3_q: "EXAMPLE: How many minutes are in 2 hours?",
                aralin2_ex3_a: "Solution: 2 hours x 60 minutes/hour = <span class=\"font-bold\">120 minutes</span>.",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Relating Time to Distance, Speed, and Workload",
                aralin3_p1: "Time is used not only for reading the clock but also for calculating speed, distance, and how long a job will take.",
                aralin3_h3_1: "Calculating Speed",
                aralin3_formula1: "Speed = Distance / Time",
                aralin3_ex1_q: "EXAMPLE: Traveled 240 km in 4 hours. What is the speed?",
                aralin3_ex1_a: "Solution: 240 km / 4 hours = <span class=\"font-bold\">60 km/hour</span>.",
                aralin3_h3_2: "Calculating Distance",
                aralin3_formula2: "Distance = Speed x Time",
                aralin3_ex2_q: "EXAMPLE: Traveled for 4 hours at a speed of 2 km/hour. How far?",
                aralin3_ex2_a: "Solution: 2 km/hour x 4 hours = <span class=\"font-bold\">8 km</span>.",
                aralin3_h3_3: "Calculating Workload",
                aralin3_ex3_q: "EXAMPLE: Makes 12 paper cups in 30 minutes. How many in 1 hour?",
                aralin3_ex3_a: "Solution: There are 2 groups of 30 minutes in 1 hour. 12 paper cups x 2 = <span class=\"font-bold\">24 paper cups</span>.",

                // Quiz Labels
                quiz_title: "Practice",
                quiz_subtitle: "Test your knowledge of time conversion and calculation.",
                quiz_section_a: "A. Time Conversion (24-Hour \u2194 12-Hour)",
                quiz_section_b: "B. Time Duration Calculation",
                quiz_section_c: "C. Relating Time",
                qc1_label: "1. 1330 \u2192",
                qc2_label: "2. 1645 \u2192",
                qc3_label: "3. 9:00 p.m. \u2192",
                qc4_label: "4. 10:30 p.m. \u2192",
                q1_label: "1. How many hours are in 180 minutes?",
                q2_label: "2. How many minutes are in 3 hours?",
                q3_label: "1. Traveled 200 km in 4 hours. What is the average speed (km/hour)?",
                q4_label: "2. Tonyo left home at 8:00 p.m. and traveled for 7 hours. What time did he arrive (in 12-hour format)?",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}, ${percentage}%). You have mastered time calculation!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Read Lessons 1 and 3 again.`,

            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pagbabasa at Pagtatala ng Oras",
                outline_aralin2: "Aralin 2: Pagpapalit ng Oras",
                outline_aralin3: "Aralin 3: Pag-uugnay ng Oras",
                outline_quiz: "Pagsasanay",
                
                // Main Content Titles
                h1_title: "Oras (Time)",
                h1_subtitle: "Pag-aaral tungkol sa pagkuha, pagpapalit, at pag-uugnay ng oras sa pang-araw-araw na buhay.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",

                // Objectives (Capitalized first letter and applied span conversion)
                obj_1: "Basahin at itala ang oras, gamit ang isang orasan;",
                obj_2: "Palitan ang oras nang mas malalaking yunit mula maliliit na yunit o kaya'y palitan ng maliliit na yunit ang mas malalaking yunit;",
                obj_3: "Palitan ang oras na nakasaad sa 12 oras at gawing 24 oras o kaya'y ang 24 oras na gawing 12 oras;",
                obj_4: "Sagutin ang mga pagsasanay na may kaugnayan sa oras;",
                obj_5: "Bigyan ng kahulugan ang mga talaan ng itinakdang oras o iskedyul; at",
                obj_6: "Iugnay ang oras sa distansiya, bilis, at dami ng trabaho.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Pagbabasa at Pagtatala ng Oras",
                aralin1_p1: "Napakahalaga ng oras sa tao. Sa pag-alam sa oras, maiiwasan mong mahuli sa iyong mga nakatakdang gawain.",
                aralin1_h3_1: "Pagbasa at Pagtatala ng Oras",
                aralin1_p2: "Ginagamit natin ang mga relo (analogue at digital) para malaman ang oras. Sa analogue, ang maikling kamay ay para sa <span class=\"font-bold text-green-700\">oras</span>, ang mahabang kamay ay para sa <span class=\"font-bold text-green-700\">minuto</span>, at ang manipis na kamay ay para sa <span class=\"font-bold text-green-700\">segundo</span>.",
                aralin1_p3: "<span class=\"font-bold text-green-700\">60 segundo</span> = 1 minuto<br><span class=\"font-bold text-green-700\">60 minuto</span> = 1 oras<br><span class=\"font-bold text-green-700\">24 oras</span> = 1 araw",
                aralin1_clock1: "8:00 a.m.",
                aralin1_clock2: "9:30 a.m.",
                aralin1_clock3: "Digital: 8:30",
                aralin1_h3_2: "Pagkukuwenta ng Tagal ng Oras",
                aralin1_ex1_q: "HALIMBAWA 1: Ilang oras ang biyahe mula 6:30 a.m. hanggang 11:30 a.m.?",
                aralin1_ex1_a: "Solusyon: Mula 6:30 hanggang 11:30 ay eksaktong <span class=\"font-bold\">5 oras</span>.",
                aralin1_ex2_q: "HALIMBAWA 2: Ilang oras ang 120 minuto?",
                aralin1_ex2_a: "Solusyon: <b>120 minuto / 60 minuto/oras = 2 oras</b>.",
                aralin1_h3_3: "Pagkuha ng Kabuuang Araw sa Buwan",
                aralin1_p4: "Mahalagang malaman kung ilang araw mayroon ang bawat buwan:",
                aralin1_list4: "<span class=\"font-bold\">31 araw:</span> Enero, Marso, Mayo, Hulyo, Agosto, Oktubre, Disyembre.",
                aralin1_list5: "<span class=\"font-bold\">30 araw:</span> Abril, Hunyo, Setyembre, Nobyembre.",
                aralin1_list6: "<span class=\"font-bold\">Pebrero:</span> 28 araw (karaniwang taon) o 29 araw (tuwing <span class=\"font-bold\">leap year</span>).",
                aralin1_ex3_q: "HALIMBAWA: Ilang araw mula Enero 16 hanggang Marso 9 (sa 2000, leap year)?",
                aralin1_ex3_a: "Enero (31-16) = <span class=\"font-bold\">16 araw</span><br>Pebrero = <span class=\"font-bold\">29 araw</span> (dahil 2000 ay leap year)<br>Marso = <span class=\"font-bold\">9 araw</span><br>Kabuuan: 16 + 29 + 9 = <span class=\"font-bold\">54 araw</span>.",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Pagpapalit ng Oras (12-Oras vs 24-Oras)",
                aralin2_p1: "Ang <span class=\"font-bold text-green-700\">24-oras</span> o <span class=\"font-bold text-green-700\">Oras Militar</span> ay ginagamit sa mga iskedyul at siyentipikong gawain dahil inaalis nito ang pagkalito sa <span class=\"font-bold text-green-700\">a.m.</span> at <span class=\"font-bold text-green-700\">p.m.</span>",
                aralin2_h3_1: "Pagpapalit ng 12-Oras sa 24-Oras",
                aralin2_list1: "<span class=\"font-bold\">Mula 12:00 p.m. hanggang 12:59 p.m.:</span> Idagdag ang 1200. (Hal. 1:00 p.m. \u2192 1300)",
                aralin2_list2: "<span class=\"font-bold\">Mula 1:00 p.m. hanggang 11:59 p.m.:</span> Idagdag ang 1200. (Hal. 8:00 p.m. \u2192 2000)",
                aralin2_list3: "<span class=\"font-bold\">Mula 12:00 a.m. hanggang 11:59 a.m.:</span> Huwag idagdag ang 1200. Gamitin ang parehong numero (Hal. 7:30 a.m. \u2192 0730)",
                aralin2_list4: "<span class=\"font-bold\">12:00 a.m. (Hatinggabi):</span> Nagiging 2400 (o 0000 para sa simula ng bagong araw).",
                aralin2_ex1_q: "HALIMBAWA: Palitan ng oras militar ang 8:00 p.m.",
                aralin2_ex1_a: "Solusyon: 8 oras + 12 oras (para sa p.m.) = 20 oras. Sagot: <span class=\"font-bold\">2000</span>.",
                aralin2_h3_2: "Pagpapalit ng 24-Oras sa 12-Oras",
                aralin2_list5: "<span class=\"font-bold\">Kung ang oras ay 1300 o mas mataas:</span> Ibawas ang 1200 at lagyan ng <span class=\"font-bold\">p.m.</span>",
                aralin2_list6: "<span class=\"font-bold\">Kung ang oras ay 1200:</span> Ito ay <span class=\"font-bold\">12:00 p.m. (Tanghali)</span>.",
                aralin2_list7: "<span class=\"font-bold\">Kung ang oras ay 1159 o mas mababa:</span> Ito ay <span class=\"font-bold\">a.m.</span>",
                aralin2_ex2_q: "HALIMBAWA: Palitan ng 12 oras ang 2333.",
                aralin2_ex2_a: "Solusyon: 2333 - 1200 = 1133. Sagot: <span class=\"font-bold\">11:33 p.m.</span>",
                aralin2_h3_3: "Pagpalit ng Yunit ng Oras (Minuto \u2194 Oras)",
                aralin2_ex3_q: "HALIMBAWA: Ilang minuto ang 2 oras?",
                aralin2_ex3_a: "Solusyon: 2 oras x 60 minuto/oras = <span class=\"font-bold\">120 minuto</span>.",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Pag-uugnay ng Oras sa Distansiya, Bilis, at Dami ng Trabaho",
                aralin3_p1: "Ang oras ay ginagamit hindi lamang sa pagbabasa ng relo kundi pati na rin sa pagkalkula ng bilis, layo, at kung gaano katagal matatapos ang isang trabaho.",
                aralin3_h3_1: "Pagkalkula ng Bilis (Speed)",
                aralin3_formula1: "Bilis = Distansiya / Oras",
                aralin3_ex1_q: "HALIMBAWA: Nagbiyahe nang 240 km sa loob ng 4 na oras. Ano ang bilis?",
                aralin3_ex1_a: "Solusyon: 240 km / 4 oras = <span class=\"font-bold\">60 km/oras</span>.",
                aralin3_h3_2: "Pagkalkula ng Distansiya (Distance)",
                aralin3_formula2: "Distansiya = Bilis x Oras",
                aralin3_ex2_q: "HALIMBAWA: Naglakbay nang 4 na oras sa bilis na 2 km/oras. Gaano kalayo?",
                aralin3_ex2_a: "Solusyon: 2 km/oras x 4 oras = <span class=\"font-bold\">8 km</span>.",
                aralin3_h3_3: "Pagkalkula ng Dami ng Trabaho",
                aralin3_ex3_q: "HALIMBAWA: Gumagawa ng 12 basong papel sa 30 minuto. Ilan sa 1 oras?",
                aralin3_ex3_a: "Solusyon: May 2 grupo ng 30 minuto sa 1 oras. 12 basong papel x 2 = <span class=\"font-bold\">24 basong papel</span>.",

                // Quiz Labels
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Subukan ang iyong kaalaman sa pagpapalit at pagkukuwenta ng oras.",
                quiz_section_a: "A. Pagpapalit ng Oras (24-Oras \u2194 12-Oras)",
                quiz_section_b: "B. Pagkalkula ng Tagal ng Oras",
                quiz_section_c: "C. Pag-uugnay ng Oras",
                qc1_label: "1. 1330 \u2192",
                qc2_label: "2. 1645 \u2192",
                qc3_label: "3. 9:00 p.m. \u2192",
                qc4_label: "4. 10:30 p.m. \u2192",
                q1_label: "1. Ilang oras ang 180 minuto?",
                q2_label: "2. Ilang minuto ang 3 oras?",
                q3_label: "1. Nagbiyahe nang 200 km sa loob ng 4 na oras. Ano ang karaniwang bilis (km/oras)?",
                q4_label: "2. Lumabas ng bahay si Tonyo nang 8:00 p.m. at nagbiyahe nang 7 oras. Anong oras siya dumating (sa 12-oras format)?",
                quiz_button: "Tingnan ang Sagot",

                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}, ${percentage}%). Master mo na ang pagkuwenta ng oras!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga aralin para sa mga mali mong sagot.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang Aralin 1 at 3.`,
            }
        };

        let currentLang = 'en'; // DEFAULT LANGUAGE IS ENGLISH

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
            const toggleKey = lang === 'tl' ? 'toggle_text_en' : 'toggle_text_tl'; 
            
            if (translations[oppositeLang] && translations[oppositeLang][toggleKey]) {
                toggleButton.querySelector('span').textContent = translations[oppositeLang][toggleKey];
            } else {
                 // Fallback
                 toggleButton.querySelector('span').textContent = lang === 'tl' ? 'Switch to: English' : 'Switch to: Tagalog';
            }
        }

        // --- LANGUAGE TOGGLE EVENT LISTENER ---
        document.getElementById('lang-toggle-btn').addEventListener('click', () => {
            const newLang = currentLang === 'tl' ? 'en' : 'tl';
            updateLanguage(newLang);
        });
        
        // ADD NEW TOGGLE TEXT KEYS TO TRANSLATION OBJECT
        translations.en.toggle_text_tl = "Switch to: Tagalog";
        translations.tl.toggle_text_en = "Switch to: English";


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
            
            for (let i = 0; i < sectionElements.length; i++) {
                const rect = sectionElements[i].getBoundingClientRect();
                // Highlight when section hits the top 100px of the viewport
                if (rect.top <= 100) { 
                    activeLink = outlineLinks[i];
                }
            }

            // Ensure only the active link is highlighted
            outlineLinks.forEach(link => link.classList.remove('active'));

            if (activeLink) {
                activeLink.classList.add('active');
            }
        }

        window.addEventListener('scroll', highlightOutlineLink);
        window.addEventListener('load', () => {
             // Initialize default language (English) on load
             updateLanguage('en');
             highlightOutlineLink();
        });
        // --- END SCROLL TRACKING LOGIC ---

        // Function to standardize time input for a.m. and p.m.
        function standardizeTimeInput(value) {
            if (typeof value !== 'string') return value;
            return value.toLowerCase().trim()
                .replace(/\s+/g, ' ') // Collapse multiple spaces
                // Standardize English format (accepts 'am', 'a.m.', 'pm', 'p.m.')
                .replace(/a\.m\.|am/g, ' a.m.') 
                .replace(/p\.m\.|pm/g, ' p.m.') 
                // Standardize Filipino format to English format for robust checking
                .replace(/n\.u\.|nu/g, ' a.m.') // n.u. -> a.m.
                .replace(/n\.h\.|n\.g\.|nh|ng/g, ' p.m.') // n.h. or n.g. -> p.m.
                .trim();
        }

        document.getElementById('time-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const resultsDiv = document.getElementById('results');
            let correctCount = 0;
            const totalQuestions = 8; 

            // Define correct answers. 
            const answers = {
                // SECTION A: Conversion
                qc1: '1:30 p.m.', // 1330 -> 1:30 p.m.
                qc2: '4:45 p.m.', // 1645 -> 4:45 p.m.
                qc3: 2100,        // 9:00 p.m. -> 2100 
                qc4: 2230,        // 10:30 p.m. -> 2230

                // SECTION B: Duration
                q1: 3,            // 180 min / 60 = 3 hrs
                q2: 180,          // 3 hrs * 60 = 180 min
                
                // SECTION C: Application
                q3: 50,           // 200 km / 4 hrs = 50 km/oras
                q4: '3:00 a.m.',  // 8:00 p.m. + 7 hrs = 3:00 a.m.
            };

            // Helper function for text/time inputs
            function checkTextInput(id, expected) {
                const input = document.getElementById(id);
                // Standardize the expected answer for comparison
                const expectedStandardized = standardizeTimeInput(expected);
                let value = standardizeTimeInput(input.value);
                let isCorrect = false;

                // Reset styles
                input.classList.remove('correct-answer', 'incorrect-answer');

                // Check against the expected standardized value
                if (value === expectedStandardized) {
                    isCorrect = true;
                } else if (value.length > 0) {
                    // Check if input value contains the core expected time structure (more permissive match)
                    if (value.includes(expectedStandardized) && expectedStandardized.length > 0) {
                        isCorrect = true;
                    }
                }
                
                if (isCorrect) {
                    correctCount++;
                    input.classList.add('correct-answer');
                } else if (value.length > 0) {
                    input.classList.add('incorrect-answer');
                }
            }

            // Helper function for number inputs
            function checkNumberInput(id, expected) {
                const input = document.getElementById(id);
                const value = parseInt(input.value.trim());
                let isCorrect = false;

                input.classList.remove('correct-answer', 'incorrect-answer');

                // Check for strict equality
                if (!isNaN(value) && value === expected) {
                    isCorrect = true;
                }
                
                if (isCorrect) {
                    correctCount++;
                    input.classList.add('correct-answer');
                } else if (!isNaN(value)) {
                    input.classList.add('incorrect-answer');
                }
            }

            // Run checks
            checkTextInput('qc1', answers.qc1);
            checkTextInput('qc2', answers.qc2);
            checkNumberInput('qc3', answers.qc3);
            checkNumberInput('qc4', answers.qc4);
            checkNumberInput('q1', answers.q1);
            checkNumberInput('q2', answers.q2);
            checkNumberInput('q3', answers.q3);
            checkTextInput('q4', answers.q4);


            // Display results
            const totalScore = correctCount;
            const totalPossible = totalQuestions;
            const percentage = ((totalScore / totalPossible) * 100).toFixed(0);
            let message = '';

            // Determine the message based on current language
            const resultMessage = translations[currentLang];

            const overallScore = `${totalScore}/${totalPossible}`;

            if (totalScore === totalPossible) {
                message = resultMessage.quiz_result_excellent(totalScore, totalPossible, percentage);
                resultsDiv.classList.remove('bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800');
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (totalScore >= totalPossible * 0.7) {
                message = resultMessage.quiz_result_good(totalScore, totalPossible, percentage);
                resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-yellow-100', 'text-yellow-800');
                resultsDiv.classList.add('bg-green-100', 'text-green-800');
            } else {
                message = resultMessage.quiz_result_fail(totalScore, totalPossible, percentage);
                resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800');
                resultsDiv.classList.add('bg-yellow-100', 'text-yellow-800');
            }

            resultsDiv.innerHTML = message;
            resultsDiv.classList.remove('hidden');
            resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    </script>
</body>
</html>
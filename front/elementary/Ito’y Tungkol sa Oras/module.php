<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ito'y Tungkol sa Oras</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ADDED weight 900 for font-extrabold to ensure font-bold works correctly -->
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
        /* Applied bold color and span conversion */
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
        #objectives ul li {
            font-size: 1.25rem; /* 20px for consistency */
        }
        
        /* Quiz Question and Label Text Size to 20px (1.25rem) */
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
            text-align: center;
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
        }
        .quiz-input:focus, .calc-input:focus { border-color: #059669; outline: none; box-shadow: 0 0 0 1px #059669; }

        /* Quiz Feedback */
        .border-green-500 { border-color: #10b981 !important; }
        .border-red-500 { border-color: #ef4444 !important; }
        .bg-green-50 { background-color: #f0fdf4 !important; }
        
        /* Custom CSS to make the entire NAV sticky */
        #outline-nav .sticky-container {
            position: sticky;
            top: 1rem; /* Adjust this value as needed, 1rem (16px) is usually good */
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

                <!-- 1. Go Back to Modules (Bumalik sa Modyul) - MOVED TO FIRST POSITION -->
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Time Difference</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Right Schedule</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Reading Timetables</a>
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
                    <span class="text-xs font-semibold uppercase tracking-wider text-green-600 bg-green-100 px-3 py-1 rounded-full">Advance Elementary Learning Module Sheet</span>
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">It's About Time</h1>
                    <p class="mt-4 text-gray-600 italic" data-i18n="h1_subtitle">We will discuss how time is used and how to properly manage it to utilize it well and profitably.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">You will be able to calculate the difference between two recorded times, whether using the <span class="font-bold text-green-700">twelve-hour clock</span> or the <span class="font-bold text-green-700">twenty-four-hour clock</span>;</li>
                        <li data-i18n="obj_2">You can create a schedule for your tasks; and</li>
                        <li data-i18n="obj_3">You can read and understand a travel schedule or <span class="font-bold text-green-700">timetable</span>.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">
                    
                    <!-- ARALIN 1: ILANG ORAS PA? -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: How Much Time Left?</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">We use time every day to measure the duration of an event. Measuring time helps us know how long an activity lasted, is currently happening, or will happen.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Types of Clocks</h3>
                            
                            <p data-i18n="aralin1_p2">There are two types of clocks used to measure time:</p>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="aralin1_list1">The <span class="font-bold text-green-700">Twelve-Hour Clock (12-hour clock)</span>: This is what we commonly use. It uses <span class="font-bold text-green-700">a.m.</span> (ante meridian - midnight to noon) and <span class="font-bold text-green-700">p.m.</span> (post meridian - noon to midnight).</li>
                                <li data-i18n="aralin1_list2">The <span class="font-bold text-green-700">Twenty-four-Hour Clock (24-hour clock)</span>: Also known as <span class="font-bold text-green-700">military time</span>. It starts at 0000 hours (12:00 a.m.) up to 2359 hours (11:59 p.m.). It is easier to use for calculating time intervals.</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Calculating Time Intervals (12-Hour)</h3>
                                <br>
                            <p data-i18n="aralin1_p3"><b>Example 1: Subtraction without borrowing</b></p>
                            <div class="example-box">
                                <p data-i18n="aralin1_ex1_p">Start: 9:00 a.m. | End: 11:30 a.m.</p>
                                <pre class="time-math" data-i18n="aralin1_math1">
Hours  Minutes
 11   30
 -9   -00
---- ----
 <b>2</b>    <b>30</b>  (Answer: 2 hours and 30 minutes)
                                </pre>
                            </div>
                                <br>
                            <p data-i18n="aralin1_p4"><b>Example 2: Subtraction with borrowing</b></p>
                            <div class="example-box">
                                <p data-i18n="aralin1_ex2_p">Start: 6:45 p.m. | End: 10:15 p.m.</p>
                                <p data-i18n="aralin1_ex2_p2">Since 15 minutes is less than 45 minutes, we borrow 1 hour (60 minutes) from 10 hours:</p>
                                <pre class="time-math" data-i18n="aralin1_math2">
Hours  Minutes
 9   (15+60) -> 75
 -6   -45
---- ----
 <b>3</b>    <b>30</b>  (Answer: 3 hours and 30 minutes)
                                </pre>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Calculating Time Intervals (24-Hour)</h3>
                            <p data-i18n="aralin1_p5">Calculation is easier because direct subtraction is performed and there is no issue with a.m./p.m. conversion.</p>
                            
                            <p data-i18n="aralin1_ex3_p"><b>Example: Start 0745 | End 1550</b></p>
                            <div class="example-box">
                                <pre class="time-math" data-i18n="aralin1_math3">
Hours  Minutes
 15   50
 -07   -45
---- ----
 <b>8</b>    <b>5</b>   (Answer: 8 hours and 5 minutes)
                                </pre>
                            </div>

                        </div>
                    </details>

                    <!-- ARALIN 2: NASA TAMANG ISKEDYUL -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: On the Right Schedule</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">This lesson helps you organize your tasks. Scheduling prevents the habit of <span class="font-bold text-green-700">"Filipino time"</span>, or being late for commitments and tasks. Only you can decide if you want to change bad habits.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Suggested Time Management Methods</h3>
                                <br>
                            <ol class="list-decimal list-inside space-y-3 ml-4">
                                <li data-i18n="tip_1"><span class="font-bold text-green-700">Prioritization:</span> You need to choose what the most important task is. Prioritize important tasks over tasks that just need to be done but are not important.</li>
                                <li data-i18n="tip_2"><span class="font-bold text-green-700">Scheduling:</span> It is better to make it a habit to plan your tasks for the day. Make a list and set time limits to ensure they are completed.</li>
                                <li data-i18n="tip_3"><span class="font-bold text-green-700">Avoid Procrastination:</span> Filipinos are accustomed to doing things at the last minute (<span class="font-bold text-green-700">mañana habit</span>). Avoid this habit to do work well and efficiently.</li>
                                <li data-i18n="tip_4"><span class="font-bold text-green-700">Avoid Wasting Time:</span> Avoid unproductive tasks or tasks that do not contribute to your progress, such as:
                                    <ul class="list-disc list-inside ml-6">
                                        <li data-i18n="tip_4a">Watching meaningless shows.</li>
                                        <li data-i18n="tip_4b">Gossiping.</li>
                                        <li data-i18n="tip_4c">Gambling.</li>
                                    </ul>
                                </li>
                                <li data-i18n="tip_5"><span class="font-bold text-green-700">Estimate Time:</span> Accurate time estimation is important before performing a task (e.g., showering, dressing) so you are not late for your meetings or work.</li>
                            </ol>
                        </div>
                    </details>

                    <!-- ARALIN 3: PAGBABASA NG TALAAN NG ORAS -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Reading Timetables</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">The <span class="font-bold text-green-700">timetable</span> or <span class="font-bold text-green-700">schedule</span> is used to know the travel schedules (planes, buses, ships) as well as the sunrise and sunset times. It is important to understand its contents.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Parts of a Travel Schedule:</h3>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="part1">Originating Location and Destination.</li>
                                <li data-i18n="part2">Departure Time and Arrival Time (usually uses the 24-hour clock).</li>
                                <li data-i18n="part3">Frequency of Travel (Daily, Mon., Tue., etc.).</li>
                                <li data-i18n="part4">Trip/Vehicle Number (Code for the route/vehicle).</li>
                                <li data-i18n="part5">Fare (How much to pay).</li>
                            </ul>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">Example of Airplane Travel Schedule (Manila - Davao):</h3>
                            <table class="schedule-table">
                                <thead>
                                    <tr>
                                        <th data-i18n="tbl_header1">Trip No.</th>
                                        <th data-i18n="tbl_header2">Frequency</th>
                                        <th data-i18n="tbl_header3">Departure (24h)</th>
                                        <th data-i18n="tbl_header4">Arrival (24h)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-i18n-schedule="row1"><td>5J-961</td><td>Daily</td><td>0500</td><td>0640</td></tr>
                                    <tr data-i18n-schedule="row2"><td>5J-963</td><td>Daily</td><td>1000</td><td>1140</td></tr>
                                    <tr data-i18n-schedule="row3"><td>5J-967</td><td>Daily</td><td>1500</td><td>1640</td></tr>
                                </tbody>
                            </table>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_3">Sunrise and Sunset Timetable:</h3>
                            <p data-i18n="aralin3_p2">These timetables are used to know when the sun will rise and set. For example, on <span class="font-bold text-green-700">March 3</span>, the sun will rise around <span class="font-bold text-green-700">0616</span> (6:16 a.m.) and set around <span class="font-bold text-green-700">1808</span> (6:08 p.m.). This is used by fishermen to adjust their sailing schedule.</p>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the questions to test your knowledge.</p>

                    <form id="time-quiz-form" class="space-y-6">

                        <!-- SECTION A: Time Difference Calculation -->
                        <div class="space-y-6 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Calculation of Time Interval (Provide the answer in <span class="font-bold">hours and minutes</span>)</p>
                            
                            <div class="grid grid-cols-1 gap-y-6">
                                <!-- Q1: Aling Gina Naglaba (5:10pm - 2:25pm) = 2h 45m -->
                                <div class="space-y-2">
                                    <label class="block" data-i18n="qa1_label">1. Aling Gina did laundry from 2:25 PM until 5:10 PM. How long did she do laundry?</label>
                                    <div class="flex space-x-4 items-center">
                                        <input type="number" id="qa1_h" class="w-32 calc-input" placeholder="Hours">
                                        <span class="text-base" data-i18n="label_hour">hours</span>
                                        <input type="number" id="qa1_m" class="w-32 calc-input" placeholder="Minutes">
                                        <span class="text-base" data-i18n="label_minute">minutes</span>
                                    </div>
                                </div>
                                <!-- Q2: Mang Ramon Nagtrabaho (1420 - 1050) = 3h 30m -->
                                <div class="space-y-2">
                                    <label class="block" data-i18n="qa2_label">2. Mang Ramon started working in his field at 1050 hours and finished at 1420 hours. How long did he work?</label>
                                    <div class="flex space-x-4 items-center">
                                        <input type="number" id="qa2_h" class="w-32 calc-input" placeholder="Hours">
                                        <span class="text-base" data-i18n="label_hour">hours</span>
                                        <input type="number" id="qa2_m" class="w-32 calc-input" placeholder="Minutes">
                                        <span class="text-base" data-i18n="label_minute">minutes</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SECTION B: Schedule Calculation (Fill in the blank - 24H time) -->
                        <div class="space-y-6 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Schedule Calculation (Provide the answer in <span class="font-bold">24-hour time - HHHH</span>)</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                                <!-- Q3: Nelson's Medicine (Starts 0920, every 2h 30m) -->
                                <div class="space-y-2">
                                    <label class="block" data-i18n="qb3_label">3. Nelson takes medicine every 2h 30m. He started at 0920. What is the time for his second and third dose?</label>
                                    <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
                                        <span class="font-medium" data-i18n="label_second">Second:</span>
                                        <input type="number" id="qb3_2" class="w-32 calc-input" placeholder="HHHH">
                                        <span class="font-medium" data-i18n="label_third">Third:</span>
                                        <input type="number" id="qb3_3" class="w-32 calc-input" placeholder="HHHH">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- SECTION C: Schedule Reading -->
                        <div class="space-y-6 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_c">C. Timetable Reading (Based on the table below)</p>
                            
                            <div class="overflow-x-auto">
                                <table class="schedule-table">
                                    <thead>
                                        <tr>
                                            <th data-i18n="tbl_header5">From Manila to</th>
                                            <th data-i18n="tbl_header6">Trip No./Type</th>
                                            <th data-i18n="tbl_header7">Departure Frequency</th>
                                            <th data-i18n="tbl_header8">Departure Time</th>
                                            <th data-i18n="tbl_header9">Arrival Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n-schedule="read_row1"><td>Zamboanga</td><td>PR 123 (A320/B737)</td><td>Daily</td><td>0450H</td><td>0620H</td></tr>
                                        <tr data-i18n-schedule="read_row2"><td>Zamboanga</td><td>PR 125 (B737)</td><td>Daily</td><td>1530H</td><td>1700H</td></tr>
                                        <tr data-i18n-schedule="read_row3"><td>Zamboanga</td><td>PR 124 (A320/B737)</td><td>Daily</td><td>0720H</td><td>0850H</td></tr>
                                        <tr data-i18n-schedule="read_row4"><td>Zamboanga</td><td>PR 126 (B737)</td><td>Daily</td><td>1740H</td><td>1910H</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="space-y-4">
                                <div id="q_qc1" class="space-y-1">
                                    <label class="block mb-1 font-medium" data-i18n="qc1_label">1. Which trip number is scheduled to depart from Manila to Zamboanga at 5:40 PM (1740H)?</label>
                                    <input type="text" id="qc1" class="w-80 quiz-input" placeholder="Trip No.">
                                </div>
                                <div id="q_qc2" class="space-y-1">
                                    <label class="block mb-1 font-medium" data-i18n="qc2_label">2. What is the arrival time for trip number PR 123?</label>
                                    <input type="number" id="qc2" class="w-80 quiz-input" placeholder="HHHH">
                                </div>
                                <div id="q_qc3" class="space-y-1">
                                    <label class="block mb-1 font-medium" data-i18n="qc3_label">3. What is the destination for trip number PR 124?</label>
                                    <input type="text" id="qc3" class="w-80 quiz-input" placeholder="Destination">
                                </div>
                            </div>
                        </div>

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
                outline_aralin1: "Lesson 1: Time Difference",
                outline_aralin2: "Lesson 2: Right Schedule",
                outline_aralin3: "Lesson 3: Reading Timetables",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                h1_title: "It's About Time",
                h1_subtitle: "We will discuss how time is used and how to properly manage it to utilize it well and profitably.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives (Capitalized first letter and applied span conversion)
                obj_1: "You will be able to calculate the difference between two recorded times, whether using the <span class=\"font-bold text-green-700\">twelve-hour clock</span> or the <span class=\"font-bold text-green-700\">twenty-four-hour clock</span>;",
                obj_2: "You can create a schedule for your tasks; and",
                obj_3: "You can read and understand a travel schedule or <span class=\"font-bold text-green-700\">timetable</span>.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: How Much Time Left?",
                aralin1_p1: "We use time every day to measure the duration of an event. Measuring time helps us know how long an activity lasted, is currently happening, or will happen.",
                aralin1_h3_1: "Types of Clocks",
                aralin1_p2: "There are two types of clocks used to measure time:",
                aralin1_list1: "The <span class=\"font-bold text-green-700\">Twelve-Hour Clock (12-hour clock)</span>: This is what we commonly use. It uses <span class=\"font-bold text-green-700\">a.m.</span> (ante meridian - midnight to noon) and <span class=\"font-bold text-green-700\">p.m.</span> (post meridian - noon to midnight).",
                aralin1_list2: "The <span class=\"font-bold text-green-700\">Twenty-four-Hour Clock (24-hour clock)</span>: Also known as <span class=\"font-bold text-green-700\">military time</span>. It starts at 0000 hours (12:00 a.m.) up to 2359 hours (11:59 p.m.). It is easier to use for calculating time intervals.",
                aralin1_h3_2: "Calculating Time Intervals (12-Hour)",
                aralin1_p3: "<b>Example 1: Subtraction without borrowing</b>",
                aralin1_ex1_p: "Start: 9:00 a.m. | End: 11:30 a.m.",
                aralin1_math1: "\nHours  Minutes\n 11   30\n -9   -00\n---- ----\n <b>2</b>    <b>30</b>  (Answer: 2 hours and 30 minutes)",
                aralin1_p4: "<b>Example 2: Subtraction with borrowing</b>",
                aralin1_ex2_p: "Start: 6:45 p.m. | End: 10:15 p.m.",
                aralin1_ex2_p2: "Since 15 minutes is less than 45 minutes, we borrow 1 hour (60 minutes) from 10 hours:",
                aralin1_math2: "\nHours  Minutes\n 9   (15+60) -> 75\n -6   -45\n---- ----\n <b>3</b>    <b>30</b>  (Answer: 3 hours and 30 minutes)",
                aralin1_h3_3: "Calculating Time Intervals (24-Hour)",
                aralin1_p5: "Calculation is easier because direct subtraction is performed and there is no issue with a.m./p.m. conversion.",
                aralin1_ex3_p: "<b>Example: Start 0745 | End 1550</b>",
                aralin1_math3: "\nHours  Minutes\n 15   50\n -07   -45\n---- ----\n <b>8</b>    <b>5</b>   (Answer: 8 hours and 5 minutes)",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: On the Right Schedule",
                aralin2_p1: "This lesson helps you organize your tasks. Scheduling prevents the habit of <span class=\"font-bold text-green-700\">\"Filipino time\"</span>, or being late for commitments and tasks. Only you can decide if you want to change bad habits.",
                aralin2_h3_1: "Suggested Time Management Methods",
                tip_1: "<span class=\"font-bold text-green-700\">Prioritization:</span> You need to choose what the most important task is. Prioritize important tasks over tasks that just need to be done but are not important.",
                tip_2: "<span class=\"font-bold text-green-700\">Scheduling:</span> It is better to make it a habit to plan your tasks for the day. Make a list and set time limits to ensure they are completed.",
                tip_3: "<span class=\"font-bold text-green-700\">Avoid Procrastination:</span> Filipinos are accustomed to doing things at the last minute (<span class=\"font-bold text-green-700\">mañana habit</span>). Avoid this habit to do work well and efficiently.",
                tip_4: "<span class=\"font-bold text-green-700\">Avoid Wasting Time:</span> Avoid unproductive tasks or tasks that do not contribute to your progress, such as:",
                tip_4a: "Watching meaningless shows.",
                tip_4b: "Gossiping.",
                tip_4c: "Gambling.",
                tip_5: "<span class=\"font-bold text-green-700\">Estimate Time:</span> Accurate time estimation is important before performing a task (e.g., showering, dressing) so you are not late for your meetings or work.",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Reading Timetables",
                aralin3_p1: "The <span class=\"font-bold text-green-700\">timetable</span> or <span class=\"font-bold text-green-700\">schedule</span> is used to know the travel schedules (planes, buses, ships) as well as the sunrise and sunset times. It is important to understand its contents.",
                aralin3_h3_1: "Parts of a Travel Schedule:",
                part1: "Originating Location and Destination.",
                part2: "Departure Time and Arrival Time (usually uses the 24-hour clock).",
                part3: "Frequency of Travel (Daily, Mon., Tue., etc.).",
                part4: "Trip/Vehicle Number (Code for the route/vehicle).",
                part5: "Fare (How much to pay).",
                aralin3_h3_2: "Example of Airplane Travel Schedule (Manila - Davao):",
                tbl_header1: "Trip No.",
                tbl_header2: "Frequency",
                tbl_header3: "Departure (24h)",
                tbl_header4: "Arrival (24h)",
                aralin3_h3_3: "Sunrise and Sunset Timetable:",
                aralin3_p2: "These timetables are used to know when the sun will rise and set. For example, on <span class=\"font-bold text-green-700\">March 3</span>, the sun will rise around <span class=\"font-bold text-green-700\">0616</span> (6:16 a.m.) and set around <span class=\"font-bold text-green-700\">1808</span> (6:08 p.m.). This is used by fishermen to adjust their sailing schedule.",
                
                // Quiz Labels
                quiz_title: "Practice",
                quiz_subtitle: "Answer the questions to test your knowledge.",
                quiz_section_a: "A. Calculation of Time Interval (Provide the answer in <span class=\"font-bold\">hours and minutes</span>)",
                label_hour: "hours",
                label_minute: "minutes",
                qa1_label: "1. Aling Gina did laundry from 2:25 PM until 5:10 PM. How long did she do laundry?",
                qa2_label: "2. Mang Ramon started working in his field at 1050 hours and finished at 1420 hours. How long did he work?",
                quiz_section_b: "B. Schedule Calculation (Provide the answer in <span class=\"font-bold\">24-hour time - HHHH</span>)",
                qb3_label: "3. Nelson takes medicine every 2h 30m. He started at 0920. What is the time for his second and third dose?",
                label_second: "Second:",
                label_third: "Third:",
                quiz_section_c: "C. Timetable Reading (Based on the table below)",
                tbl_header5: "From Manila to",
                tbl_header6: "Trip No./Type",
                tbl_header7: "Departure Frequency",
                tbl_header8: "Departure Time",
                tbl_header9: "Arrival Time",
                qc1_label: "1. Which trip number is scheduled to depart from Manila to Zamboanga at 5:40 PM (1740H)?",
                qc2_label: "2. What is the arrival time for trip number PR 123?",
                qc3_label: "3. What is the destination for trip number PR 124?",
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
                outline_aralin1: "Aralin 1: Ilang Oras Pa?",
                outline_aralin2: "Aralin 2: Nasa Tamang Iskedyul",
                outline_aralin3: "Aralin 3: Pagbabasa ng Talaan",
                outline_quiz: "Pagsasanay",
                
                // Main Content Titles
                h1_title: "Ito'y Tungkol sa Oras",
                h1_subtitle: "Tatalakayin natin kung paano ginagamit ang oras at kung paano maisasaayos ang pamamahala nito para magamit nang maayos at kapaki-pakinabang.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",

                // Objectives (Capitalized first letter and applied span conversion)
                obj_1: "Makukuwenta mo ang pagkakaiba ng dalawang naitalang oras, ginamitan man ito ng <span class=\"font-bold text-green-700\">labindalawahang oras</span> o <span class=\"font-bold text-green-700\">dalawampu't apatang-oras na orasan</span>;",
                obj_2: "Makagagawa ka ng iskedyul ng iyong mga gawain; at",
                obj_3: "Mababasa at maiintindihan mo ang talaan ng oras ng pagdating at pag-alis o <span class=\"font-bold text-green-700\">talaorasan</span>.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Ilang Oras Pa?",
                aralin1_p1: "Ginagamit natin ang oras araw-araw para sukatin ang tagal ng isang pangyayari. Makatutulong ang pagsukat sa oras para malaman kung gaano katagal naganap, nagaganap, o magaganap pa lamang ang isang aktibidad.",
                aralin1_h3_1: "Mga Uri ng Orasan",
                aralin1_p2: "May dalawang uri ng orasan na ginagamit para sukatin ang oras:",
                aralin1_list1: "Ang <span class=\"font-bold text-green-700\">Labindalawahang-Oras na Orasan (12-hour clock)</span>: Ito ang karaniwan nating ginagamit. Gumagamit ito ng <span class=\"font-bold text-green-700\">a.m.</span> (ante meridian - hatinggabi hanggang katanghalian) at <span class=\"font-bold text-green-700\">p.m.</span> (post meridian - tanghali hanggang hatinggabi).",
                aralin1_list2: "Ang <span class=\"font-bold text-green-700\">Dalawampu't Apatang-Oras na Orasan (24-hour clock)</span>: Kilala rin bilang <span class=\"font-bold text-green-700\">oras pang-militar (military time)</span>. Nagsisimula ito sa 0000 oras (12:00 a.m.) hanggang 2359 oras (11:59 p.m.). Mas madali itoong gamitin sa pagkuwenta ng pagitan ng oras.",
                aralin1_h3_2: "Pagkuwenta sa Pagitan ng Oras (12-Hour)",
                aralin1_p3: "<b>Halimbawa 1: Pagbabawas nang walang pagpapalit (borrowing)</b>",
                aralin1_ex1_p: "Simula: 9:00 a.m. | Tapos: 11:30 a.m.",
                aralin1_math1: "\nOras  Minuto\n 11   30\n -9   -00\n---- ----\n <b>2</b>    <b>30</b>  (Sagot: 2 oras at 30 minuto)",
                aralin1_p4: "<b>Halimbawa 2: Pagbabawas na may pagpapalit (borrowing)</b>",
                aralin1_ex2_p: "Simula: 6:45 p.m. | Tapos: 10:15 p.m.",
                aralin1_ex2_p2: "Dahil ang 15 minuto ay mas maliit kaysa 45 minuto, manghihiram tayo ng 1 oras (60 minuto) mula sa 10 oras:",
                aralin1_math2: "\nOras  Minuto\n 9   (15+60) -> 75\n -6   -45\n---- ----\n <b>3</b>    <b>30</b>  (Sagot: 3 oras at 30 minuto)",
                aralin1_h3_3: "Pagkuwenta sa Pagitan ng Oras (24-Hour)",
                aralin1_p5: "Mas madali ang pagkuwenta dahil diretsong pagbabawas ang ginagawa at walang isyu sa a.m./p.m. conversion.",
                aralin1_ex3_p: "<b>Halimbawa: Simula 0745 | Tapos 1550</b>",
                aralin1_math3: "\nOras  Minuto\n 15   50\n -07   -45\n---- ----\n <b>8</b>    <b>5</b>   (Sagot: 8 oras at 5 minuto)",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Nasa Tamang Iskedyul",
                aralin2_p1: "Ang araling ito ay tumutulong sa iyo para ayusin ang mga gawain mo. Sa pag-iiskedyul, maiiwasan ang ugaling <span class=\"font-bold text-green-700\">\"Filipino time\"</span> o ang pagiging huli sa mga kompromiso at gawain. Ikaw lang ang makakapagpasya kung nais mong baguhin ang masamang gawi.",
                aralin2_h3_1: "Mga Panukala sa Tamang Pamamahala ng Oras",
                tip_1: "<span class=\"font-bold text-green-700\">Pagpapahalaga (Prioritization):</span> Kailangang piliin mo kung ano ang pinakamahalagang gawain. Unahin ang importanteng gawain kaysa sa mga gawaing kailangan lang gawin subalit hindi mahalaga.",
                tip_2: "<span class=\"font-bold text-green-700\">Pagsasaayos ng Iskedyul:</span> Mas nakabubuti kung uugaliin mong magplano ng mga gawain para sa isang araw. Gumawa ng listahan at takdang oras para masigurong matatapos ang mga ito.",
                tip_3: "<span class=\"font-bold text-green-700\">Iwasan ang Pag-antala (Procrastination):</span> Nasanay ang mga Pilipino na gawin ang isang bagay sa huling sandali (<span class=\"font-bold text-green-700\">mañana habit</span>). Iwasan ang ugaling ito para magawa nang maayos at mahusay ang trabaho.",
                tip_4: "<span class=\"font-bold text-green-700\">Iwasan ang Pagsasayang ng Oras:</span> Iwasan ang mga gawaing hindi produktibo o hindi nakatutulong sa iyong pag-unlad, tulad ng:",
                tip_4a: "Panonood ng walang kuwentang palabas.",
                tip_4b: "Pakikipagtsismisa.",
                tip_4c: "Pagsusugal.",
                tip_5: "<span class=\"font-bold text-green-700\">Tantiyahin ang Oras:</span> Mahalaga ang tumpak na pagtantiya ng oras bago gumawa ng isang gawain (hal. pagligo, pagbibihis) para hindi ka mahuli sa iyong mga miting o trabaho.",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Pagbabasa ng Talaan ng Oras",
                aralin3_p1: "Ang <span class=\"font-bold text-green-700\">talaorasan</span> o <span class=\"font-bold text-green-700\">talaan ng oras</span> ay ginagamit upang malaman ang mga iskedyul ng biyahe (eroplano, bus, barko) at pati na rin ang paglitaw at paglubog ng araw o buwan. Mahalagang maunawaan ang mga nilalaman nito.",
                aralin3_h3_1: "Mga Bahagi ng Talaan ng Biyahe:",
                part1: "Lugar na Panggagalingan at Destinasyon.",
                part2: "Oras ng Pag-alis at Oras ng Pagdating (karaniwang gumagamit ng 24-hour clock).",
                part3: "Dalas ng Biyahe (Araw-araw, Lun., Myr., atbp.).",
                part4: "Bilang ng Biyahe/Sasakyan (Code para sa ruta/sasakyan).",
                part5: "Pamasahe (Kung magkano ang babayaran).",
                aralin3_h3_2: "Halimbawa ng Talaan ng Biyahe sa Eroplano (Manila - Davao):",
                tbl_header1: "Biyahe Bilang",
                tbl_header2: "Dalas ng Biyahe",
                tbl_header3: "Pag-alis (24h)",
                tbl_header4: "Pagdating (24h)",
                aralin3_h3_3: "Talaan ng Pagsikat at Paglubog ng Araw:",
                aralin3_p2: "Ang mga talaang ito ay ginagamit upang malaman kung kailan sisikat at lulubog ang araw. Halimbawa, sa <span class=\"font-bold text-green-700\">Marso 3</span>, sisikat ang araw bandang <span class=\"font-bold text-green-700\">0616</span> (6:16 a.m.) at lulubog bandang <span class=\"font-bold text-green-700\">1808</span> (6:08 p.m.). Ginagamit ito ng mga mangingisda para ayusin ang kanilang iskedyul ng paglayag sa dagat.",
                
                // Quiz Labels
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutan ang mga katanungan upang subukin ang iyong kaalaman.",
                quiz_section_a: "A. Pagkuwenta ng Pagitan ng Oras (Ibigay ang sagot sa <span class=\"font-bold\">oras at minuto</span>)",
                label_hour: "oras",
                label_minute: "minuto",
                qa1_label: "1. Si Aling Gina ay naglaba mula 2:25 ng hapon hanggang 5:10 ng hapon. Gaano katagal siya naglaba?",
                qa2_label: "2. Nagsimulang magtrabaho si Mang Ramon sa kanyang bukid ika-1050 ng oras at natapos siya ika-1420 ng oras. Gaano katagal siya nagtrabaho?",
                quiz_section_b: "B. Pagkuwenta ng Iskedyul (Ibigay ang sagot sa <span class=\"font-bold\">24-hour time - HHHH</span>)",
                qb3_label: "3. Si Nelson ay uminom ng gamot tuwing 2h 30m. Nagsimula siya sa 0920. Ano ang oras para sa pangalawa at pangatlong inuman niya?",
                label_second: "Pangalawa:",
                label_third: "Pangatlo:",
                quiz_section_c: "C. Pagbabasa ng Talaorasan (Batay sa table sa ibaba)",
                tbl_header5: "Mula Manila tungo sa",
                tbl_header6: "Biyahe-Bilang/Uri",
                tbl_header7: "Dalas ng Pag-alis",
                tbl_header8: "Oras ng Pag-alis",
                tbl_header9: "Oras ng Pagdating",
                qc1_label: "1. Anong biyahe-bilang ang nakatakdang umalis galing sa Maynila patungong Zamboanga sa ika-5:40 ng hapon (1740H)?",
                qc2_label: "2. Ano ang oras ng pagdating ng biyahe-bilang PR 123?",
                qc3_label: "3. Saan patungo ang biyahe-bilang PR 124?",
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


        document.getElementById('time-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const resultsDiv = document.getElementById('results');
            let correctCount = 0;
            const totalQuestions = 7; // 2 time diff + 2 schedule calc + 3 schedule read

            // Define correct answers. 
            const answers = {
                // SECTION A: Time Difference (Hours and Minutes)
                qa1_h: 2, 
                qa1_m: 45, 
                qa2_h: 3, 
                qa2_m: 30,

                // SECTION B: Schedule Calculation (24H Time)
                qb3_2: 1150, // 0920 + 2:30 = 1150
                qb3_3: 1420, // 1150 + 2:30 = 1420

                // SECTION C: Schedule Reading
                qc1: 'PR 126', 
                qc2: 620,    
                qc3: 'Zamboanga',
            };
            
            // Helper function for simple input check (A. and C.)
            function checkSimpleInput(id, expected, type = 'number') {
                const input = document.getElementById(id);
                let value = input.value.trim();
                let isCorrect = false;

                // Reset styles
                input.classList.remove('border-red-500', 'border-green-500', 'bg-green-50');
                
                // Clear existing feedback messages
                const parent = input.closest('div.space-y-2');
                let feedback = parent ? parent.querySelector('.calculation-feedback') : null;
                if (feedback) feedback.remove();

                if (type === 'number') {
                    value = parseInt(value);
                    if (!isNaN(value) && value === expected) {
                        isCorrect = true;
                    }
                } else if (type === 'string') {
                    // Case-insensitive check for strings
                    if (value.toUpperCase() === expected.toUpperCase()) {
                        isCorrect = true;
                    }
                }
                
                if (isCorrect) {
                    correctCount++;
                    input.classList.add('border-green-500', 'bg-green-50');
                } else {
                    input.classList.add('border-red-500');
                    // Add message for incorrect calculation if needed
                    if (parent && type === 'number') {
                        feedback = document.createElement('p');
                        feedback.classList.add('text-sm', 'mt-1', 'text-red-600', 'font-medium', 'calculation-feedback');
                        parent.appendChild(feedback);
                        
                        const isEnglish = currentLang === 'en';
                        feedback.textContent = isEnglish ? `The correct answer is ${expected}.` : `Ang tamang sagot ay ${expected}.`;
                    }
                }
            }


            // Run checks for Section A (Time Difference)
            checkSimpleInput('qa1_h', answers.qa1_h);
            checkSimpleInput('qa1_m', answers.qa1_m);
            checkSimpleInput('qa2_h', answers.qa2_h);
            checkSimpleInput('qa2_m', answers.qa2_m);

            // Run checks for Section B (Schedule Calculation)
            checkSimpleInput('qb3_2', answers.qb3_2);
            checkSimpleInput('qb3_3', answers.qb3_3);

            // Run checks for Section C (Schedule Reading)
            checkSimpleInput('qc1', answers.qc1, 'string');
            checkSimpleInput('qc2', answers.qc2);
            checkSimpleInput('qc3', answers.qc3, 'string');


            // Display results
            const percentage = ((correctCount / totalQuestions) * 100).toFixed(0);
            const overallScore = `${correctCount}/${totalQuestions}`;
            let message = '';

            // Determine the message based on current language
            const resultMessage = translations[currentLang];

            // Reset background classes
            resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800');

            if (correctCount === totalQuestions) {
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalQuestions * 0.7) {
                message = resultMessage.quiz_result_good(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-100', 'text-green-800');
            } else {
                message = resultMessage.quiz_result_fail(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-yellow-100', 'text-yellow-800');
            }

            resultsDiv.innerHTML = message;
            resultsDiv.classList.remove('hidden');
            resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">SO THAT’S WHAT NORMAL IS!</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Base styles copied for consistency (Green/Emerald Theme) */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0fdf4; /* Green 50 */
        }
        .accent-bg { background-color: #10b981; }   
        .module-section { 
            transition: all 0.3s ease; 
            border: 1px solid #e5e7eb; /* Light border */
        }
        .module-section:hover { 
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.2), 0 4px 6px -2px rgba(16, 185, 129, 0.1); 
        }
        .content-box { padding: 1.5rem; background-color: #ffffff; }
        
        /* --- CUSTOM STYLE FOR MAIN H1 TITLE (50px) --- */
        .main-title-h1 {
            font-size: 50px; /* 50px */
            line-height: 1.1;
        }
        /* --- END ADDED CUSTOM STYLE --- */

        /* Standardizing Text Sizes to 1.25rem (20px) */
        .content-box h2 { font-size: 1.75rem; color: #0e7490; font-weight: 700; margin-top: 1rem; margin-bottom: 0.5rem; } /* Dark Teal */
        .content-box h3 { font-size: 1.5rem; color: #1f2937; font-weight: 700; margin-top: 1rem; margin-bottom: 0.5rem; }
        /* H4 and other subheadings */
        .content-box h4 { font-size: 1.25rem; color: #1f2937; font-weight: 600; margin-top: 1rem; margin-bottom: 0.5rem; }
        
        /* 20px for all main content, lists, and intro text */
        .content-box p, 
        .content-box ul li, 
        .content-box ol li,
        .example-box p,
        #objectives p,
        #objectives ul li { 
            font-size: 1.25rem; /* 20px */
            line-height: 1.75;
            color: #4b5563;
        }

        /* Adjustments for list and paragraph spacing */
        .content-box p { margin-bottom: 1.5rem; }
        .content-box ul, .content-box ol { margin-left: 1.5rem; margin-bottom: 1.5rem; }
        #objectives ul li { margin-bottom: 0.5rem; }

        .content-box b { color: #059669; font-weight: 700; } /* Emerald Green for key terms */
        
        .example-box {
            background-color: #f3f4f6; 
            border-left: 4px solid #34d399; /* Green accent border */
            padding: 1.5rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
            border-radius: 0.5rem;
        }
        
        /* 20px for Math Formulas */
        .math-formula {
            display: block;
            margin: 1rem 0;
            padding: 0.75rem;
            text-align: center;
            font-size: 1.25rem; /* 20px */
            font-weight: bold;
            color: #0e7490;
            background-color: #ecfdf5;
            border-radius: 0.5rem;
            border: 1px dashed #a7f3d0;
            overflow-x: auto;
        }
        .math-formula span { white-space: nowrap; } 
        
        /* Quiz labels/text */
        #pagsasanay p,
        #pagsasanay label, 
        #pagsasanay .font-medium,
        #pagsasanay .font-semibold {
            font-size: 1.25rem; /* 20px */
            line-height: 1.75;
        }

        /* Quiz dropdown input */
        .quiz-dropdown {
            font-size: 1.25rem; /* 20px */
            border-bottom: 2px solid #a7f3d0;
            height: 3rem; /* Taller height for 20px text */
            padding: 0.5rem;
            background-size: 1.25em 1.25em;
            width: 100%;
            border-radius: 0.5rem;
            border: 1px solid #d1fae5;
        }
        .quiz-dropdown:focus {
            border-color: #059669;
            outline: none;
        }

        .quiz-correct {
            border-color: #10b981 !important; 
            background-color: #ecfdf5 !important; 
        }
        .quiz-incorrect {
            border-color: #ef4444 !important; 
            background-color: #fef2f2 !important;
        }

        /* Table styles */
        .module-table { width: 100%; border-collapse: collapse; margin-bottom: 1.5rem; }
        .module-table th, .module-table td { 
            border: 1px solid #d1fae5; 
            padding: 0.75rem; 
            text-align: left; 
            font-size: 1.25rem; /* 20px */
        }
        .module-table th { background-color: #a7f3d0; color: #065f46; font-weight: 600; text-align: center; }
        .module-table td { color: #000000; } 
        
        /* Outline Styles (Sticky Navigation) */
        .outline-link { 
            display: block; padding: 0.5rem 0.75rem; border-radius: 0.5rem; color: #4b5563; 
            transition: background-color 0.15s, color 0.15s; font-size: 1rem; 
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
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Sorting Through the Numbers</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Where Is Normal?</a>
                        <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Let Me Show You (Graphs)</a>
                        <a href="#pagsasanay" class="outline-link" data-i18n="outline_quiz">Practice (Quiz)</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">SO THAT'S WHAT NORMAL IS!</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Analyzing Data, Calculating Central Tendency, and Statistical Graphs.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Identify the difference between types of <b>Variables</b> and <b>Data</b>.</li>
                        <li data-i18n="obj_2">Organize data using a <b>Frequency Distribution Table (FDT)</b>.</li>
                        <li data-i18n="obj_3">Describe and calculate the <b>Measures of Central Tendency</b> (Mean, Median, Mode) for ungrouped and grouped data.</li>
                        <li data-i18n="obj_4">Construct and analyze various <b>Statistical Graphs</b> (Pie, Histogram, Frequency Polygon, Ogive).</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Sorting Through the Numbers -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Sorting Through the Numbers (Data Organization)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">A <b>Variable</b> is a characteristic that can take on different values. <b>Data</b> are the values (measurements or observations) that the variables can possess.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Types of Data</h3>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="aralin1_l1"><b>Qualitative Variables:</b> Placed into different categories based on some characteristic (e.g., gender, hair color). </li>
                                <li data-i18n="aralin1_l2"><b>Quantitative Variables:</b> Numerical and can be ordered or ranked (e.g., age, height, weight).
                                    <ul class="list-circle list-inside ml-6 mt-1">
                                        <li data-i18n="aralin1_l2_1"><b>Discrete:</b> Can be counted (e.g., number of chairs, number of siblings).</li>
                                        <li data-i18n="aralin1_l2_2"><b>Continuous:</b> Can assume an infinite number of values between any two specific values; obtained by measuring (e.g., height, weight, time). </li>
                                    </ul>
                                </li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Ungrouped vs Grouped Data</h3>
                            <p data-i18n="aralin1_p2"><b>Ungrouped Data</b> is raw data that has not been organized. When ordered from lowest to highest (ascending) or vice versa, it is called an <b>Array</b>.</p>
                            <p data-i18n="aralin1_p3"><b>Grouped Data</b> is data that has been bundled into categories or ranges and placed in a <b>Frequency Distribution Table (FDT)</b>.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Parts of an FDT</h3>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="aralin1_l3"><b>Range (R):</b> The difference between the highest (H) and lowest (L) value.
                                    <p class="math-formula" data-i18n="aralin1_f1"> R = H - L </p>
                                </li>
                                <li data-i18n="aralin1_l4"><b>Class (Class Interval):</b> The grouping of values.</li>
                                <li data-i18n="aralin1_l5"><b>Class Limits:</b> The lowest (lower limit) and highest (upper limit) number in a class.</li>
                                <li data-i18n="aralin1_l6"><b>Class Width (i):</b> The difference between the limits of two consecutive class intervals.
                                    <p class="math-formula" data-i18n="aralin1_f2"> Class Width = R &divide; (number of class intervals) </p>
                                </li>
                            </ul>
                        </div>
                    </details>

                    <!-- ARALIN 2: Where Is Normal? (Measures of Central Tendency) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Where Is Normal? (Measures of Central Tendency)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">A <b>Measure of Central Tendency</b> is a single value that describes the center or central position of a data set.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">1. Mean ( <b>x̄</b> ) - <b>Average</b></h3>
                            <p data-i18n="aralin2_p2">It is obtained by summing all the data values and dividing by the number of data values (n).</p>
                            <h4 class="font-semibold mt-3" data-i18n="aralin2_h4_1">For Ungrouped Data:</h4>
                            <p class="math-formula" data-i18n="aralin2_f1"> Mean (\u0078\u0304) = Sum of X \u00f7 n </p>
                            <h4 class="font-semibold mt-3" data-i18n="aralin2_h4_2">For Grouped Data:</h4>
                            <p data-i18n="aralin2_p3">Requires the Class Midpoint (X<sub>m</sub>) and multiplying it by the Frequency (f).</p>
                            <p class="math-formula" data-i18n="aralin2_f2"> Mean (\u0078\u0304) = Sum of (f \u00d7 X<sub>m</sub>) \u00f7 n </p>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">2. Median ( <b>x̃</b> ) - <b>Middle Value</b></h3>
                            <p data-i18n="aralin2_p4">This is the middle value of the data array (data must be ordered first).</p>
                            <ul class="list-disc list-inside ml-4">
                                <li data-i18n="aralin2_l1"><b>Odd Count:</b> The middle number.</li>
                                <li data-i18n="aralin2_l2"><b>Even Count:</b> The average of the two middle numbers.</li>
                            </ul>
                            <h4 class="font-semibold mt-3" data-i18n="aralin2_h4_3">For Grouped Data:</h4>
                            <p data-i18n="aralin2_p5">Uses Class Boundaries and Cumulative Frequency (f<sub>x</sub>).</p>
                            <p class="math-formula" data-i18n="aralin2_f3"> Median (\u0078\u0303) = L<sub>B</sub> + [ (n \u00f7 2) - f<sub>x</sub>(before) ] \u00f7 f<sub>med</sub> \u00d7 i </p>
                            <ul class="list-none ml-4 text-sm italic">
                                <li data-i18n="aralin2_l3"><b>L<sub>B</sub></b>: lower boundary of the median class</li>
                                <li data-i18n="aralin2_l4"><b>f<sub>x</sub>(before)</b>: cumulative frequency before the median class</li>
                                <li data-i18n="aralin2_l5"><b>f<sub>med</sub></b>: frequency of the median class</li>
                                <li data-i18n="aralin2_l6"><b>i</b>: class width</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_3">3. Mode ( <b>x̂</b> ) - <b>Most Frequent Value</b></h3>
                            <p data-i18n="aralin2_p6">This is the value that occurs most often in a data set.</p>
                            <ul class="list-disc list-inside ml-4">
                                <li data-i18n="aralin2_l7">Unimodal (one mode), Bimodal (two modes), Multimodal (more than two modes).</li>
                            </ul>
                            <h4 class="font-semibold mt-3" data-i18n="aralin2_h4_4">For Grouped Data:</h4>
                            <p data-i18n="aralin2_p7">The <b>Modal Class</b> is the class interval with the highest frequency.</p>
                            <p class="math-formula" data-i18n="aralin2_f4"> Mode (\u0078\u0302) = L<sub>B</sub> + [ d<sub>1</sub> \u00f7 (d<sub>1</sub> + d<sub>2</sub>) ] \u00d7 i </p>
                            <ul class="list-none ml-4 text-sm italic">
                                <li data-i18n="aralin2_l8"><b>L<sub>B</sub></b>: lower boundary of the modal class</li>
                                <li data-i18n="aralin2_l9"><b>d<sub>1</sub></b>: difference in frequency of the modal class and frequency below</li>
                                <li data-i18n="aralin2_l10"><b>d<sub>2</sub></b>: difference in frequency of the modal class and frequency above</li>
                                <li data-i18n="aralin2_l11"><b>i</b>: class width</li>
                            </ul>
                        </div>
                    </details>

                    <!-- ARALIN 3: Let Me Show You (Statistical Graphs) -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Let Me Show You (Statistical Graphs)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1"><b>Statistical Graphs</b> are used to visually describe, summarize, and analyze a data set, showing trends or patterns.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">1. Pie Graph (Circle Graph)</h3>
                            <p data-i18n="aralin3_p2">Used to show the distribution of frequencies among classes in an FDT, illustrating numerical proportions.</p>
                            
                            <div class="example-box">
                                <p class="font-bold text-center text-lg mb-4" data-i18n="aralin3_ex1_title">Example: Monthly Household Expenses</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                                    <!-- Mock Data Table -->
                                    <div class="flex justify-center md:justify-end">
                                        <table class="w-full max-w-xs border-collapse module-table">
                                            <thead>
                                                <tr><th class="py-2 px-3 bg-green-200 border border-green-300" data-i18n="aralin3_table1_h1">Category</th><th class="py-2 px-3 bg-green-200 border border-green-300" data-i18n="aralin3_table1_h2">Percentage</th></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="background-color: #d1fae5;"><td class="py-1 px-3 border border-green-300" data-i18n="aralin3_table1_r1">Food</td><td class="py-1 px-3 border border-green-300 text-center">40%</td></tr>
                                                <tr style="background-color: #ecfdf5;"><td class="py-1 px-3 border border-green-300" data-i18n="aralin3_table1_r2">Rent</td><td class="py-1 px-3 border border-green-300 text-center">30%</td></tr>
                                                <tr style="background-color: #f3f4f6;"><td class="py-1 px-3 border border-green-300" data-i18n="aralin3_table1_r3">Utilities</td><td class="py-1 px-3 border border-green-300 text-center">20%</td></tr>
                                                <tr style="background-color: #f7fee7;"><td class="py-1 px-3 border border-green-300" data-i18n="aralin3_table1_r4">Savings</td><td class="py-1 px-3 border border-green-300 text-center">10%</td></tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- SVG Pie Chart -->
                                    <div class="flex justify-center md:justify-start">
                                        <svg viewBox="0 0 36 36" class="w-48 h-48 rounded-full shadow-lg">
                                            <!-- 40% (0% to 40%) - Food -->
                                            <circle cx="18" cy="18" r="15.91549430918954" fill="#d1fae5" stroke="#10b981" stroke-width="1.5" stroke-dasharray="40 60" stroke-dashoffset="0"></circle>
                                            <!-- 30% (40% to 70%) - Rent -->
                                            <circle cx="18" cy="18" r="15.91549430918954" fill="#ecfdf5" stroke="#059669" stroke-width="1.5" stroke-dasharray="30 70" stroke-dashoffset="-40"></circle>
                                            <!-- 20% (70% to 90%) - Utilities -->
                                            <circle cx="18" cy="18" r="15.91549430918954" fill="#f3f4f6" stroke="#0e7490" stroke-width="1.5" stroke-dasharray="20 80" stroke-dashoffset="-70"></circle>
                                            <!-- 10% (90% to 100%) - Savings -->
                                            <circle cx="18" cy="18" r="15.91549430918954" fill="#f7fee7" stroke="#1f2937" stroke-width="1.5" stroke-dasharray="10 90" stroke-dashoffset="-90"></circle>
                                        </svg>
                                    </div>
                                </div>
                                <p class="mt-4 text-center text-sm text-gray-600" data-i18n="aralin3_p3">The Pie Graph effectively shows the proportion of each category to the total (100%).</p>
                            </div>
                            
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">2. Histogram</h3>
                            <p data-i18n="aralin3_p4">A graph that displays data using adjacent <b>vertical bars</b> whose height is equal to the frequency of each class interval. The horizontal axis uses <b>Class Boundaries</b>.</p>
                            
                            <div class="example-box">
                                <p class="font-bold text-center text-lg mb-4" data-i18n="aralin3_ex2_title">Example: Histogram of Electricity Usage (kWh)</p>
                                <div class="w-full h-64 overflow-x-auto p-2">
                                    <svg viewBox="0 0 100 50" class="w-full h-full" style="background-color: white;">
                                        <!-- Axis: Max Y=50 (43 is max freq) -->
                                        <line x1="5" y1="5" x2="5" y2="45" stroke="#a7f3d0" stroke-width="0.3"/> 
                                        <line x1="5" y1="45" x2="95" y2="45" stroke="#a7f3d0" stroke-width="0.3"/> 

                                        <!-- Bars (Width = 16 units, Gap = 2 units. Start X=7) -->
                                        <!-- Bar 1 (f=6) | Height 6/50 * 40 = 4.8. Actual SVG height: 45 - 4.8 = 40.2 -->
                                        <rect x="7" y="40.2" width="16" height="4.8" fill="#10b981" stroke="#065f46" stroke-width="0.2"/>
                                        <!-- Bar 2 (f=22) | Height 22/50 * 40 = 17.6. Actual SVG height: 45 - 17.6 = 27.4 -->
                                        <rect x="25" y="27.4" width="16" height="17.6" fill="#10b981" stroke="#065f46" stroke-width="0.2"/>
                                        <!-- Bar 3 (f=43) | Height 43/50 * 40 = 34.4. Actual SVG height: 45 - 34.4 = 10.6 -->
                                        <rect x="43" y="10.6" width="16" height="34.4" fill="#10b981" stroke="#065f46" stroke-width="0.2"/>
                                        <!-- Bar 4 (f=28) | Height 28/50 * 40 = 22.4. Actual SVG height: 45 - 22.4 = 22.6 -->
                                        <rect x="61" y="22.6" width="16" height="22.4" fill="#10b981" stroke="#065f46" stroke-width="0.2"/>
                                        <!-- Bar 5 (f=9) | Height 9/50 * 40 = 7.2. Actual SVG height: 45 - 7.2 = 37.8 -->
                                        <rect x="79" y="37.8" width="16" height="7.2" fill="#10b981" stroke="#065f46" stroke-width="0.2"/>

                                        <!-- Labels (Boundary Values) -->
                                        <text x="7" y="48" font-size="3" text-anchor="middle" fill="#1f2937">89.5</text>
                                        <text x="25" y="48" font-size="3" text-anchor="middle" fill="#1f2937">98.5</text>
                                        <text x="43" y="48" font-size="3" text-anchor="middle" fill="#1f2937">107.5</text>
                                        <text x="61" y="48" font-size="3" text-anchor="middle" fill="#1f2937">116.5</text>
                                        <text x="79" y="48" font-size="3" text-anchor="middle" fill="#1f2937">125.5</text>
                                        <text x="95" y="48" font-size="3" text-anchor="middle" fill="#1f2937">134.5</text>
                                    </svg>
                                </div>
                                <p class="mt-4 text-center text-sm text-gray-600" data-i18n="aralin3_p5">The Histogram shows the highest frequency (43) falls between the Class Boundaries of 107.5 and 116.5.</p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_3">3. Frequency Polygon</h3>
                            <p data-i18n="aralin3_p6">A graph that displays data using lines connected to points plotted at the <b>Class Midpoints</b>, with the height equal to the class frequency. It shows the progression of data from one class to the next.</p>
                            
                            <div class="example-box">
                                <p class="font-bold text-center text-lg mb-4" data-i18n="aralin3_ex3_title">Example: Frequency Polygon (Midpoints)</p>
                                <div class="w-full h-64 overflow-x-auto p-2">
                                    <svg viewBox="0 0 100 50" class="w-full h-full" style="background-color: white;">
                                        <!-- Axis: Max Y=50 -->
                                        <line x1="5" y1="5" x2="5" y2="45" stroke="#a7f3d0" stroke-width="0.3"/> 
                                        <line x1="5" y1="45" x2="95" y2="45" stroke="#a7f3d0" stroke-width="0.3"/> 
                                        
                                        <!-- Data Points (Normalized X: 18, 36, 54, 72, 90) -->
                                        <!-- (0,0) point (f=0) -->
                                        <circle cx="5" cy="45" r="0.5" fill="#0e7490"/>
                                        <!-- P0 (f=6) Height: 4.8. Y= 45-4.8 = 40.2. X=18 -->
                                        <circle cx="18" cy="40.2" r="0.8" fill="#0e7490"/>
                                        <!-- P1 (f=22) Height: 17.6. Y= 45-17.6 = 27.4. X=36 -->
                                        <circle cx="36" cy="27.4" r="0.8" fill="#0e7490"/>
                                        <!-- P2 (f=43) Height: 34.4. Y= 45-34.4 = 10.6. X=54 -->
                                        <circle cx="54" cy="10.6" r="0.8" fill="#0e7490"/>
                                        <!-- P3 (f=28) Height: 22.4. Y= 45-22.4 = 22.6. X=72 -->
                                        <circle cx="72" cy="22.6" r="0.8" fill="#0e7490"/>
                                        <!-- P4 (f=9) Height: 7.2. Y= 45-7.2 = 37.8. X=90 -->
                                        <circle cx="90" cy="37.8" r="0.8" fill="#0e7490"/>
                                        <!-- (n+1, 0) point (f=0) -->
                                        <circle cx="95" cy="45" r="0.5" fill="#0e7490"/>

                                        <!-- Lines connecting points -->
                                        <polyline points="5,45 18,40.2 36,27.4 54,10.6 72,22.6 90,37.8 95,45" fill="none" stroke="#10b981" stroke-width="0.5"/>
                                        
                                        <!-- Labels (Midpoints) -->
                                        <text x="18" y="48" font-size="3" text-anchor="middle" fill="#1f2937">94</text>
                                        <text x="36" y="48" font-size="3" text-anchor="middle" fill="#1f2937">103</text>
                                        <text x="54" y="48" font-size="3" text-anchor="middle" fill="#1f2937">112</text>
                                        <text x="72" y="48" font-size="3" text-anchor="middle" fill="#1f2937">121</text>
                                        <text x="90" y="48" font-size="3" text-anchor="middle" fill="#1f2937">130</text>
                                    </svg>
                                </div>
                                <p class="mt-4 text-center text-sm text-gray-600" data-i18n="aralin3_p7">The Frequency Polygon shows the rapid increase in electricity usage up to the 112 kWh Midpoint, and then a subsequent decrease.</p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_4">4. Cumulative Frequency Table (OGIVE)</h3>
                            <p data-i18n="aralin3_p8">A graph that represents the progression of <b>Cumulative Frequencies</b> for the classes, showing how many values are below or above a certain data point. It illustrates the rate of change from one class to the next. </p>
                                                         <div class="example-box">
                                <p class="font-bold text-center text-lg mb-4" data-i18n="aralin3_ex4_title">Example: Ogive (Cumulative Frequency)</p>
                                <div class="w-full h-64 overflow-x-auto p-2">
                                    <svg viewBox="0 0 100 110" class="w-full h-full" style="background-color: white;">
                                        <!-- Axis: Max Y=110 (108 is max CF) -->
                                        <line x1="5" y1="10" x2="5" y2="100" stroke="#a7f3d0" stroke-width="0.8"/> 
                                        <line x1="5" y1="100" x2="95" y2="100" stroke="#a7f3d0" stroke-width="0.8"/> 

                                        <!-- Scale Marks (CF: 0, 20, 40, 60, 80, 100) -->
                                        <text x="4" y="100" font-size="3" text-anchor="end" fill="#4b5563">0</text>
                                        <line x1="5" y1="82" x2="7" y2="82" stroke="#4b5563" stroke-width="0.3"/> 
                                        <text x="4" y="82" font-size="3" text-anchor="end" fill="#4b5563">20</text>
                                        <line x1="5" y1="64" x2="7" y2="64" stroke="#4b5563" stroke-width="0.3"/> 
                                        <text x="4" y="64" font-size="3" text-anchor="end" fill="#4b5563">40</text>
                                        <line x1="5" y1="46" x2="7" y2="46" stroke="#4b5563" stroke-width="0.3"/> 
                                        <text x="4" y="46" font-size="3" text-anchor="end" fill="#4b5563">60</text>
                                        <line x1="5" y1="28" x2="7" y2="28" stroke="#4b5563" stroke-width="0.3"/> 
                                        <text x="4" y="28" font-size="3" text-anchor="end" fill="#4b5563">80</text>
                                        <line x1="5" y1="10" x2="7" y2="10" stroke="#4b5563" stroke-width="0.3"/> 
                                        <text x="4" y="10" font-size="3" text-anchor="end" fill="#4b5563">100</text>

                                        <!-- Points (X=Boundary, Y=CF) | Max CF = 108. Max Y scale = 110. Height = (CF/110) * 90. Inverted Y. -->
                                        <!-- P0 (89.5, 0) -->
                                        <circle cx="10" cy="100" r="1.5" fill="#0e7490"/>
                                        <!-- P1 (98.5, 6) | Y = 100 - (6/110 * 90) = 95.09 -->
                                        <circle cx="27" cy="95.09" r="1.5" fill="#0e7490"/>
                                        <!-- P2 (107.5, 28) | Y = 100 - (28/110 * 90) = 77.09 -->
                                        <circle cx="44" cy="77.09" r="1.5" fill="#0e7490"/>
                                        <!-- P3 (116.5, 71) | Y = 100 - (71/110 * 90) = 42.91 -->
                                        <circle cx="61" cy="42.91" r="1.5" fill="#0e7490"/>
                                        <!-- P4 (125.5, 99) | Y = 100 - (99/110 * 90) = 19.0 -->
                                        <circle cx="78" cy="19.0" r="1.5" fill="#0e7490"/>
                                        <!-- P5 (134.5, 108) | Y = 100 - (108/110 * 90) = 11.55 -->
                                        <circle cx="95" cy="11.55" r="1.5" fill="#0e7490"/>

                                        <!-- Line connecting points -->
                                        <polyline points="10,100 27,95.09 44,77.09 61,42.91 78,19.0 95,11.55" fill="none" stroke="#10b981" stroke-width="1"/>
                                        
                                        <!-- Labels (Boundary Values) -->
                                        <text x="10" y="105" font-size="3" text-anchor="middle" fill="#1f2937">89.5</text>
                                        <text x="27" y="105" font-size="3" text-anchor="middle" fill="#1f2937">98.5</text>
                                        <text x="44" y="105" font-size="3" text-anchor="middle" fill="#1f2937">107.5</text>
                                        <text x="61" y="105" font-size="3" text-anchor="middle" fill="#1f2937">116.5</text>
                                        <text x="78" y="105" font-size="3" text-anchor="middle" fill="#1f2937">125.5</text>
                                        <text x="95" y="105" font-size="3" text-anchor="middle" fill="#1f2937">134.5</text>
                                    </svg>
                                </div>
                                <p class="mt-4 text-center text-sm text-gray-600" data-i18n="aralin3_p9">The Ogive shows the rapid increase in cumulative frequency between 98.5 and 116.5 kWh, where the fastest rate of change is achieved.</p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Pagsasanay 1-10) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice (Quiz) - 10 Items</h2>
                    
                    <form id="stats-quiz-form" class="space-y-6">
                        <!-- Q1 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q1_label">1. Which of the following is an example of a <b>Continuous Variable</b>?</p>
                            <select id="q1" name="q1" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="height" data-i18n="q1_a">A. Height of a basketball player</option>
                                <option value="tv_count" data-i18n="q1_b">B. Number of TVs per household</option>
                                <option value="pages" data-i18n="q1_c">C. Number of pages in a book</option>
                                <option value="students" data-i18n="q1_d">D. Number of students in a class</option>
                            </select>
                        </div>
                        
                        <!-- Q2 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q2_label">2. The following are examples of a <b>Qualitative Variable</b>, EXCEPT:</p>
                             <select id="q2" name="q2" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="gender" data-i18n="q2_a">A. Gender</option>
                                <option value="hair_color" data-i18n="q2_b">B. Hair color</option>
                                <option value="skin_type" data-i18n="q2_c">C. Skin type</option>
                                <option value="weight" data-i18n="q2_d">D. Weight</option>
                            </select>
                        </div>

                        <!-- Q3 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q3_label">3. A measure of central tendency is a single value that describes the central position of a data set. The following are valid measures of central tendency, EXCEPT:</p>
                             <select id="q3" name="q3" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="mean" data-i18n="q3_a">A. Mean</option>
                                <option value="median" data-i18n="q3_b">B. Median</option>
                                <option value="mode" data-i18n="q3_c">C. Mode</option>
                                <option value="range" data-i18n="q3_d">D. Range</option>
                            </select>
                        </div>

                        <!-- Q4 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q4_label">4. This is obtained by summing the data values and dividing by the number of data values.</p>
                            <select id="q4" name="q4" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="mean" data-i18n="q4_a">A. Mean</option>
                                <option value="median" data-i18n="q4_b">B. Median</option>
                                <option value="mode" data-i18n="q4_c">C. Mode</option>
                                <option value="range" data-i18n="q4_d">D. Range</option>
                            </select>
                        </div>
                        
                        <!-- Q5 (Original Q6 - Mean calculation) -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q5_label">5. Melissa obtained 96, 94, and 93. What should she get in the fourth grading period to achieve an average of 95?</p>
                            <select id="q5" name="q5" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="94" data-i18n="q5_a">A. 94</option>
                                <option value="95" data-i18n="q5_b">B. 95</option>
                                <option value="96" data-i18n="q5_c">C. 96</option>
                                <option value="97" data-i18n="q5_d">D. 97</option>
                            </select>
                        </div>

                        <!-- Q6 (Original Q9 - Mean calculation) -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q6_label">6. If the weight (kg) of employees are 65, 76, 84, 70, 87, and 68, what is the <b>mean weight</b>?</p>
                            <select id="q6" name="q6" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="73" data-i18n="q6_a">A. 73</option>
                                <option value="74" data-i18n="q6_b">B. 74</option>
                                <option value="75" data-i18n="q6_c">C. 75</option>
                                <option value="76" data-i18n="q6_d">D. 76</option>
                            </select>
                        </div>
                        
                        <!-- Q7 (Original Q10 - Range calculation) -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q7_label">7. If the <b>range</b> of a set is 27 and the highest score is 56, what is the lowest score?</p>
                            <select id="q7" name="q7" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="28" data-i18n="q7_a">A. 28</option>
                                <option value="29" data-i18n="q7_b">B. 29</option>
                                <option value="30" data-i18n="q7_c">C. 30</option>
                                <option value="31" data-i18n="q7_d">D. 31</option>
                            </select>
                        </div>

                        <!-- Q8 (Reach the Top Q1 - Discrete EXCEPT) -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q8_label">8. The following are examples of a <b>Discrete Variable</b>, EXCEPT:</p>
                            <select id="q8" name="q8" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="tv_count" data-i18n="q8_a">A. Number of TVs per household</option>
                                <option value="height" data-i18n="q8_b">B. Height of a basketball player</option>
                                <option value="pages" data-i18n="q8_c">C. Number of pages in a book</option>
                                <option value="students" data-i18n="q8_d">D. Number of students in a class</option>
                            </select>
                        </div>

                        <!-- Q9 (Reach the Top Q3 - Weighted Mean calculation) -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q9_label">9. There are 10 groups of students: 2 groups got 89, 3 groups got 93, and 5 groups got 95. Find the <b>average score</b> (Mean).</p>
                             <select id="q9" name="q9" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="92.2" data-i18n="q9_a">A. 92.2</option>
                                <option value="93.2" data-i18n="q9_b">B. 93.2</option>
                                <option value="94.2" data-i18n="q9_c">C. 94.2</option>
                                <option value="95.2" data-i18n="q9_d">D. 95.2</option>
                            </select>
                        </div>
                        
                        <!-- Q10 (Reach the Top Q15 - Graph type) -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q10_label">10. Which graph displays data using lines connected to points plotted at the <b>midpoints</b> of the class frequencies?</p>
                            <select id="q10" name="q10" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="pie" data-i18n="q10_a">A. Pie graph</option>
                                <option value="ogive" data-i18n="q10_b">B. Ogive</option>
                                <option value="histogram" data-i18n="q10_c">C. Histogram</option>
                                <option value="frequency_polygon" data-i18n="q10_d">D. Frequency polygon</option>
                            </select>
                        </div>


                        <button type="submit" class="w-full accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
                            Check Answers
                        </button>
                    </form>

                    <div id="quiz-results" class="mt-6 p-4 rounded-xl bg-green-100 text-green-800 font-semibold hidden">
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
                outline_aralin1: "Lesson 1: Sorting Through the Numbers",
                outline_aralin2: "Lesson 2: Where Is Normal?",
                outline_aralin3: "Lesson 3: Let Me Show You (Graphs)",
                outline_quiz: "Practice (Quiz)", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "SO THAT'S WHAT NORMAL IS!",
                h1_subtitle: "Analyzing Data, Calculating Central Tendency, and Statistical Graphs.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Identify the difference between types of <b>Variables</b> and <b>Data</b>.",
                obj_2: "Organize data using a <b>Frequency Distribution Table (FDT)</b>.",
                obj_3: "Describe and calculate the <b>Measures of Central Tendency</b> (Mean, Median, Mode) for ungrouped and grouped data.",
                obj_4: "Construct and analyze various <b>Statistical Graphs</b> (Pie, Histogram, Frequency Polygon, Ogive).",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Sorting Through the Numbers (Data Organization)",
                aralin1_p1: "A <b>Variable</b> is a characteristic that can take on different values. <b>Data</b> are the values (measurements or observations) that the variables can possess.",
                aralin1_h3_1: "Types of Data",
                aralin1_l1: "<b>Qualitative Variables:</b> Placed into different categories based on some characteristic (e.g., gender, hair color).",
                aralin1_l2: "<b>Quantitative Variables:</b> Numerical and can be ordered or ranked (e.g., age, height, weight).",
                aralin1_l2_1: "<b>Discrete:</b> Can be counted (e.g., number of chairs, number of siblings).",
                aralin1_l2_2: "<b>Continuous:</b> Can assume an infinite number of values between any two specific values; obtained by measuring (e.g., height, weight, time).",
                aralin1_h3_2: "Ungrouped vs Grouped Data",
                aralin1_p2: "<b>Ungrouped Data</b> is raw data that has not been organized. When ordered from lowest to highest (ascending) or vice versa, it is called an <b>Array</b>.",
                aralin1_p3: "<b>Grouped Data</b> is data that has been bundled into categories or ranges and placed in a <b>Frequency Distribution Table (FDT)</b>.",
                aralin1_h3_3: "Parts of an FDT",
                aralin1_l3: "<b>Range (R):</b> The difference between the highest (H) and lowest (L) value.",
                aralin1_f1: " R = H - L ",
                aralin1_l4: "<b>Class (Class Interval):</b> The grouping of values.",
                aralin1_l5: "<b>Class Limits:</b> The lowest (lower limit) and highest (upper limit) number in a class.",
                aralin1_l6: "<b>Class Width (i):</b> The difference between the limits of two consecutive class intervals.",
                aralin1_f2: " Class Width = R \u00f7 (number of class intervals) ",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Where Is Normal? (Measures of Central Tendency)",
                aralin2_p1: "A <b>Measure of Central Tendency</b> is a single value that describes the center or central position of a data set.",
                aralin2_h3_1: "1. Mean ( \u0078\u0304 ) - <b>Average</b>",
                aralin2_p2: "It is obtained by summing all the data values and dividing by the number of data values (n).",
                aralin2_h4_1: "For Ungrouped Data:",
                aralin2_f1: " Mean (\u0078\u0304) = Sum of X \u00f7 n ",
                aralin2_h4_2: "For Grouped Data:",
                aralin2_p3: "Requires the Class Midpoint (X<sub>m</sub>) and multiplying it by the Frequency (f).",
                aralin2_f2: " Mean (\u0078\u0304) = Sum of (f \u00d7 X<sub>m</sub>) \u00f7 n ",
                aralin2_h3_2: "2. Median ( \u0078\u0303 ) - <b>Middle Value</b>",
                aralin2_p4: "This is the middle value of the data array (data must be ordered first).",
                aralin2_l1: "<b>Odd Count:</b> The middle number.",
                aralin2_l2: "<b>Even Count:</b> The average of the two middle numbers.",
                aralin2_h4_3: "For Grouped Data:",
                aralin2_p5: "Uses Class Boundaries and Cumulative Frequency (f<sub>x</sub>).",
                aralin2_f3: " Median (\u0078\u0303) = L<sub>B</sub> + [ (n \u00f7 2) - f<sub>x</sub>(before) ] \u00f7 f<sub>med</sub> \u00d7 i ",
                aralin2_l3: "<b>L<sub>B</sub></b>: lower boundary of the median class",
                aralin2_l4: "<b>f<sub>x</sub>(before)</b>: cumulative frequency before the median class",
                aralin2_l5: "<b>f<sub>med</sub></b>: frequency of the median class",
                aralin2_l6: "<b>i</b>: class width",
                aralin2_h3_3: "3. Mode ( \u0078\u0302 ) - <b>Most Frequent Value</b>",
                aralin2_p6: "This is the value that occurs most often in a data set.",
                aralin2_l7: "Unimodal (one mode), Bimodal (two modes), Multimodal (more than two modes).",
                aralin2_h4_4: "For Grouped Data:",
                aralin2_p7: "The <b>Modal Class</b> is the class interval with the highest frequency.",
                aralin2_f4: " Mode (\u0078\u0302) = L<sub>B</sub> + [ d<sub>1</sub> \u00f7 (d<sub>1</sub> + d<sub>2</sub>) ] \u00d7 i ",
                aralin2_l8: "<b>L<sub>B</sub></b>: lower boundary of the modal class",
                aralin2_l9: "<b>d<sub>1</sub></b>: difference in frequency of the modal class and frequency below",
                aralin2_l10: "<b>d<sub>2</sub></b>: difference in frequency of the modal class and frequency above",
                aralin2_l11: "<b>i</b>: class width",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Let Me Show You (Statistical Graphs)",
                aralin3_p1: "<b>Statistical Graphs</b> are used to visually describe, summarize, and analyze a data set, showing trends or patterns.",
                aralin3_h3_1: "1. Pie Graph (Circle Graph)",
                aralin3_p2: "Used to show the distribution of frequencies among classes in an FDT, illustrating numerical proportions.",
                aralin3_ex1_title: "Example: Monthly Household Expenses",
                aralin3_table1_h1: "Category",
                aralin3_table1_h2: "Percentage",
                aralin3_table1_r1: "Food",
                aralin3_table1_r2: "Rent",
                aralin3_table1_r3: "Utilities",
                aralin3_table1_r4: "Savings",
                aralin3_p3: "The Pie Graph effectively shows the proportion of each category to the total (100%).",
                aralin3_h3_2: "2. Histogram",
                aralin3_p4: "A graph that displays data using adjacent <b>vertical bars</b> whose height is equal to the frequency of each class interval. The horizontal axis uses <b>Class Boundaries</b>.",
                aralin3_ex2_title: "Example: Histogram of Electricity Usage (kWh)",
                aralin3_p5: "The Histogram shows the highest frequency (43) falls between the Class Boundaries of 107.5 and 116.5.",
                aralin3_h3_3: "3. Frequency Polygon",
                aralin3_p6: "A graph that displays data using lines connected to points plotted at the <b>Class Midpoints</b>, with the height equal to the class frequency. It shows the progression of data from one class to the next.",
                aralin3_ex3_title: "Example: Frequency Polygon (Midpoints)",
                aralin3_p7: "The Frequency Polygon shows the rapid increase in electricity usage up to the 112 kWh Midpoint, and then a subsequent decrease.",
                aralin3_h3_4: "4. Cumulative Frequency Table (OGIVE)",
                aralin3_p8: "A graph that represents the progression of <b>Cumulative Frequencies</b> for the classes, showing how many values are below or above a certain data point. It illustrates the rate of change from one class to the next.",
                aralin3_ex4_title: "Example: Ogive (Cumulative Frequency)",
                aralin3_p9: "The Ogive shows the rapid increase in cumulative frequency between 98.5 and 116.5 kWh, where the fastest rate of change is achieved.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice (Quiz) - 10 Items",
                select_answer: "Select Answer",
                q1_label: "1. Which of the following is an example of a <b>Continuous Variable</b>?",
                q1_a: "A. Height of a basketball player",
                q1_b: "B. Number of TVs per household",
                q1_c: "C. Number of pages in a book",
                q1_d: "D. Number of students in a class",
                q2_label: "2. The following are examples of a <b>Qualitative Variable</b>, EXCEPT:",
                q2_a: "A. Gender",
                q2_b: "B. Hair color",
                q2_c: "C. Skin type",
                q2_d: "D. Weight",
                q3_label: "3. A measure of central tendency is a single value that describes the central position of a data set. The following are valid measures of central tendency, EXCEPT:",
                q3_a: "A. Mean",
                q3_b: "B. Median",
                q3_c: "C. Mode",
                q3_d: "D. Range",
                q4_label: "4. This is obtained by summing the data values and dividing by the number of data values.",
                q4_a: "A. Mean",
                q4_b: "B. Median",
                q4_c: "C. Mode",
                q4_d: "D. Range",
                q5_label: "5. Melissa obtained 96, 94, and 93. What should she get in the fourth grading period to achieve an average of 95?",
                q5_a: "A. 94",
                q5_b: "B. 95",
                q5_c: "C. 96",
                q5_d: "D. 97",
                q6_label: "6. If the weight (kg) of employees are 65, 76, 84, 70, 87, and 68, what is the <b>mean weight</b>?",
                q6_a: "A. 73",
                q6_b: "B. 74",
                q6_c: "C. 75",
                q6_d: "D. 76",
                q7_label: "7. If the <b>range</b> of a set is 27 and the highest score is 56, what is the lowest score?",
                q7_a: "A. 28",
                q7_b: "B. 29",
                q7_c: "C. 30",
                q7_d: "D. 31",
                q8_label: "8. The following are examples of a <b>Discrete Variable</b>, EXCEPT:",
                q8_a: "A. Number of TVs per household",
                q8_b: "B. Height of a basketball player",
                q8_c: "C. Number of pages in a book",
                q8_d: "D. Number of students in a class",
                q9_label: "9. There are 10 groups of students: 2 groups got 89, 3 groups got 93, and 5 groups got 95. Find the <b>average score</b> (Mean).",
                q9_a: "A. 92.2",
                q9_b: "B. 93.2",
                q9_c: "C. 94.2",
                q9_d: "D. 95.2",
                q10_label: "10. Which graph displays data using lines connected to points plotted at the <b>midpoints</b> of the class frequencies?",
                q10_a: "A. Pie graph",
                q10_b: "B. Ogive",
                q10_c: "C. Histogram",
                q10_d: "D. Frequency polygon",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}, ${percentage}%). You mastered Data Analysis and Central Tendency!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the formulas for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Re-read Lessons 1-3.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pag-aayos ng Data",
                outline_aralin2: "Aralin 2: Sentral na Tendensiya",
                outline_aralin3: "Aralin 3: Mga Statistical Graph",
                outline_quiz: "Pagsasanay (Pagsusulit)", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "SO THAT'S WHAT NORMAL IS!",
                h1_subtitle: "Pagsusuri ng Data, Pagkuwenta ng Central Tendency, at Statistical Graphs.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Alamin ang pagkakaiba ng mga uri ng <b>Variable</b> at <b>Data</b>.",
                obj_2: "Organisahin ang data gamit ang <b>Frequency Distribution Table (FDT)</b>.",
                obj_3: "Ilarawan at kuwentahin ang <b>Measures of Central Tendency</b> (Mean, Median, Mode) para sa ungrouped at grouped data.",
                obj_4: "Bumuo at suriin ang iba't ibang <b>Statistical Graphs</b> (Pie, Histogram, Frequency Polygon, Ogive).",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Sorting Through the Numbers (Pag-aayos ng Data)",
                aralin1_p1: "Ang <b>Variable</b> ay isang katangian na maaaring magkaroon ng iba't ibang halaga. Ang <b>Data</b> naman ay ang mga halaga (sukat o obserbasyon) na maaaring taglayin ng mga variable.",
                aralin1_h3_1: "Mga Uri ng Data",
                aralin1_l1: "<b>Qualitative Variables:</b> Inilalagay sa iba't ibang kategorya batay sa ilang katangian (hal. kasarian, kulay ng buhok).",
                aralin1_l2: "<b>Quantitative Variables:</b> Numerikal at maaaring isaayos o i-rank (hal. edad, taas, timbang).",
                aralin1_l2_1: "<b>Discrete:</b> Maaaring bilangin (hal. bilang ng upuan, bilang ng kapatid).",
                aralin1_l2_2: "<b>Continuous:</b> Maaaring magkaroon ng walang-hanggang dami ng halaga sa pagitan ng dalawang tiyak na halaga; nakuha sa pamamagitan ng pagsukat (hal. taas, timbang, oras).",
                aralin1_h3_2: "Ungrouped at Grouped Data",
                aralin1_p2: "Ang <b>Ungrouped Data</b> ay hilaw na data na hindi pa organisado. Kapag inayos ito mula sa pinakamababa hanggang sa pinakamataas (ascending) o kabaligtaran, tinatawag itong <b>Array</b>.",
                aralin1_p3: "Ang <b>Grouped Data</b> ay data na pinagsama-sama sa mga kategorya o saklaw (ranges) at inilalagay sa isang <b>Frequency Distribution Table (FDT)</b>.",
                aralin1_h3_3: "Mga Bahagi ng FDT",
                aralin1_l3: "<b>Range (R):</b> Pagkakaiba ng pinakamataas (H) at pinakamababang (L) halaga.",
                aralin1_f1: " R = H - L ",
                aralin1_l4: "<b>Class (Class Interval):</b> Ang pagpapangkat ng mga halaga.",
                aralin1_l5: "<b>Class Limits:</b> Ang pinakamababa (lower limit) at pinakamataas (upper limit) na numero sa isang class.",
                aralin1_l6: "<b>Class Width (i):</b> Ang pagkakaiba ng mga limitasyon ng dalawang magkasunod na class interval.",
                aralin1_f2: " Class Width = R \u00f7 (bilang ng class intervals) ",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Sentral na Tendensiya (Measures of Central Tendency)",
                aralin2_p1: "Ang <b>Measure of Central Tendency</b> ay isang solong halaga na naglalarawan sa sentro o sentral na posisyon ng isang data set.",
                aralin2_h3_1: "1. Mean ( \u0078\u0304 ) - <b>Average</b>",
                aralin2_p2: "Ito ay nakuha sa pamamagitan ng pag-suma sa lahat ng halaga ng data at paghati sa bilang ng data (n).",
                aralin2_h4_1: "Para sa Ungrouped Data:",
                aralin2_f1: " Mean (\u0078\u0304) = Sum of X \u00f7 n ",
                aralin2_h4_2: "Para sa Grouped Data:",
                aralin2_p3: "Kailangan ng Class Midpoint (X<sub>m</sub>) at i-multiply sa Frequency (f).",
                aralin2_f2: " Mean (\u0078\u0304) = Sum of (f \u00d7 X<sub>m</sub>) \u00f7 n ",
                aralin2_h3_2: "2. Median ( \u0078\u0303 ) - <b>Gitnang Halaga</b>",
                aralin2_p4: "Ito ang gitnang halaga ng data array (inaayos muna ang data).",
                aralin2_l1: "<b>Odd Count:</b> Gitnang numero.",
                aralin2_l2: "<b>Even Count:</b> Average ng dalawang gitnang numero.",
                aralin2_h4_3: "Para sa Grouped Data:",
                aralin2_p5: "Gumagamit ng Class Boundaries at Cumulative Frequency (f<sub>x</sub>).",
                aralin2_f3: " Median (\u0078\u0303) = L<sub>B</sub> + [ (n \u00f7 2) - f<sub>x</sub>(before) ] \u00f7 f<sub>med</sub> \u00d7 i ",
                aralin2_l3: "<b>L<sub>B</sub></b>: lower boundary ng median class",
                aralin2_l4: "<b>f<sub>x</sub>(before)</b>: cumulative frequency bago ang median class",
                aralin2_l5: "<b>f<sub>med</sub></b>: frequency ng median class",
                aralin2_l6: "<b>i</b>: class width",
                aralin2_h3_3: "3. Mode ( \u0078\u0302 ) - <b>Halagang Madalas Lumabas</b>",
                aralin2_p6: "Ito ang halaga na pinakamadalas mangyari sa isang data set.",
                aralin2_l7: "Unimodal (isang mode), Bimodal (dalawang mode), Multimodal (higit sa dalawang mode).",
                aralin2_h4_4: "Para sa Grouped Data:",
                aralin2_p7: "Ang <b>Modal Class</b> ay ang class interval na may pinakamataas na frequency.",
                aralin2_f4: " Mode (\u0078\u0302) = L<sub>B</sub> + [ d<sub>1</sub> \u00f7 (d<sub>1</sub> + d<sub>2</sub>) ] \u00d7 i ",
                aralin2_l8: "<b>L<sub>B</sub></b>: lower boundary ng modal class",
                aralin2_l9: "<b>d<sub>1</sub></b>: difference sa frequency ng modal class at frequency sa ibaba (below)",
                aralin2_l10: "<b>d<sub>2</sub></b>: difference sa frequency ng modal class at frequency sa itaas (above)",
                aralin2_l11: "<b>i</b>: class width",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Mga Statistical Graph",
                aralin3_p1: "Ang <b>Statistical Graphs</b> ay ginagamit upang biswal na ilarawan, buod, at suriin ang isang data set, na nagpapakita ng mga trends o patterns.",
                aralin3_h3_1: "1. Pie Graph (Circle Graph)",
                aralin3_p2: "Ginagamit upang ipakita ang distribusyon ng mga frequency sa pagitan ng mga class sa FDT, na nagpapakita ng numerical proportions.",
                aralin3_ex1_title: "Halimbawa: Monthly Household Expenses",
                aralin3_table1_h1: "Kategorya",
                aralin3_table1_h2: "Porsyento",
                aralin3_table1_r1: "Pagkain (Food)",
                aralin3_table1_r2: "Renta (Rent)",
                aralin3_table1_r3: "Bayarin (Utilities)",
                aralin3_table1_r4: "Savings",
                aralin3_p3: "Ang Pie Graph ay mabisang nagpapakita ng proporsyon ng bawat kategorya sa kabuuan (100%).",
                aralin3_h3_2: "2. Histogram",
                aralin3_p4: "Isang graph na nagpapakita ng data gamit ang magkakatabing <b>vertical bars</b> na ang taas ay katumbas ng frequency ng bawat class interval. Ang horizontal axis ay gumagamit ng <b>Class Boundaries</b>.",
                aralin3_ex2_title: "Halimbawa: Histogram ng Paggamit ng Kuryente (kWh)",
                aralin3_p5: "Ipinapakita ng Histogram ang pinakamataas na frequency (43) sa pagitan ng Class Boundaries na 107.5 at 116.5.",
                aralin3_h3_3: "3. Frequency Polygon",
                aralin3_p6: "Isang graph na nagpapakita ng data gamit ang mga linya na konektado sa mga punto na naka-plot sa <b>Class Midpoints</b> at ang taas ay katumbas ng frequency ng class. Ipinapakita ang pag-unlad ng data mula sa isang class hanggang sa susunod.",
                aralin3_ex3_title: "Halimbawa: Frequency Polygon (Midpoints)",
                aralin3_p7: "Ipinapakita ng Frequency Polygon ang mabilis na pagtaas ng paggamit ng kuryente hanggang sa 112 kWh Midpoint, at pagkatapos ay bumababa.",
                aralin3_h3_4: "4. Cumulative Frequency Table (OGIVE)",
                aralin3_p8: "Isang graph na kumakatawan sa progresyon ng <b>Cumulative Frequencies</b> para sa mga class, na nagpapakita kung gaano karaming numero ang nasa ilalim o sa itaas ng isang data. Ipinapakita ang bilis ng pagbabago mula sa isang class patungo sa susunod.",
                aralin3_ex4_title: "Halimbawa: Ogive (Cumulative Frequency)",
                aralin3_p9: "Ipinapakita ng Ogive ang mabilis na pagdami ng cumulative frequency sa pagitan ng 98.5 at 116.5 kWh, kung saan naabot ang pinakamataas na pagbabago.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay (Pagsusulit) - 10 Items",
                select_answer: "Pumili ng Sagot",
                q1_label: "1. Alin sa mga sumusunod ang halimbawa ng <b>Continuous Variable</b>?",
                q1_a: "A. Taas ng isang basketball player",
                q1_b: "B. Bilang ng TV bawat sambahayan",
                q1_c: "C. Bilang ng pahina sa isang aklat",
                q1_d: "D. Bilang ng mag-aaral sa isang klase",
                q2_label: "2. Ang mga sumusunod ay halimbawa ng <b>Qualitative Variable</b>, MALIBAN sa:",
                q2_a: "A. Kasarian",
                q2_b: "B. Kulay ng buhok",
                q2_c: "C. Uri ng balat",
                q2_d: "D. Timbang",
                q3_label: "3. Ang isang measure of central tendency ay isang solong halaga na naglalarawan sa sentral na posisyon ng data set. Ang mga sumusunod ay valid measures ng central tendency, MALIBAN sa:",
                q3_a: "A. Mean",
                q3_b: "B. Median",
                q3_c: "C. Mode",
                q3_d: "D. Range",
                q4_label: "4. Ito ay nakuha sa pamamagitan ng pag-suma sa mga halaga ng data at paghati sa bilang ng data values.",
                q4_a: "A. Mean",
                q4_b: "B. Median",
                q4_c: "C. Mode",
                q4_d: "D. Range",
                q5_label: "5. Si Melissa ay nakakuha ng 96, 94, at 93. Ano ang dapat niyang makuha sa ika-apat na grading period upang maging 95 ang kanyang average?",
                q5_a: "A. 94",
                q5_b: "B. 95",
                q5_c: "C. 96",
                q5_d: "D. 97",
                q6_label: "6. Kung ang timbang (kg) ng mga empleyado ay 65, 76, 84, 70, 87, at 68, ano ang <b>mean weight</b>?",
                q6_a: "A. 73",
                q6_b: "B. 74",
                q6_c: "C. 75",
                q6_d: "D. 76",
                q7_label: "7. Kung ang <b>range</b> ng isang set ay 27 at ang pinakamataas na score ay 56, ano ang pinakamababang score?",
                q7_a: "A. 28",
                q7_b: "B. 29",
                q7_c: "C. 30",
                q7_d: "D. 31",
                q8_label: "8. Ang mga sumusunod ay halimbawa ng <b>Discrete Variable</b>, MALIBAN sa:",
                q8_a: "A. Bilang ng TV bawat sambahayan",
                q8_b: "B. Taas ng isang basketball player",
                q8_c: "C. Bilang ng pahina sa isang aklat",
                q8_d: "D. Bilang ng mag-aaral sa isang klase",
                q9_label: "9. May 10 grupo ng estudyante: 2 grupo ay nakakuha ng 89, 3 grupo ay nakakuha ng 93, at 5 grupo ay nakakuha ng 95. Hanapin ang <b>average scores</b> (Mean).",
                q9_a: "A. 92.2",
                q9_b: "B. 93.2",
                q9_c: "C. 94.2",
                q9_d: "D. 95.2",
                q10_label: "10. Aling graph ang nagpapakita ng data gamit ang mga linya na konektado sa mga punto na naka-plot para sa mga frequency sa <b>midpoints</b> ng class?",
                q10_a: "A. Pie graph",
                q10_b: "B. Ogive",
                q10_c: "C. Histogram",
                q10_d: "D. Frequency polygon",
                quiz_button: "Kalkulahin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}, ${percentage}%). Master mo na ang Pagsusuri ng Data at Sentral na Tendensiya!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang mga formula para sa iyong mga maling sagot.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang Aralin 1-3.`,
            }
        };

        let currentLang = 'en'; 

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
            
            // 2. Update dropdown options
            document.querySelectorAll('.quiz-dropdown option').forEach(option => {
                const key = option.getAttribute('data-i18n');
                if (langData[key]) {
                    option.textContent = langData[key];
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
            const resultsDiv = document.getElementById('quiz-results');
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
        const sections = ['objectives', 'aralin1', 'aralin2', 'aralin3', 'pagsasanay'];
        const outlineLinks = sections.map(id => document.querySelector(`#outline a[href="#${id}"]`));
        const sectionElements = sections.map(id => document.getElementById(id));

        function highlightOutlineLink() {
            let activeLink = null;
            
            // Re-check from bottom up to handle section overlap gracefully
            for (let i = sectionElements.length - 1; i >= 0; i--) {
                if (!sectionElements[i]) continue;
                // Changed from 100 to 150 to make the highlight slightly more aggressive
                const rect = sectionElements[i].getBoundingClientRect();
                if (rect.top <= 150) { 
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
        

        // --- QUIZ LOGIC (Modified for Dropdowns) ---
        const correctAnswers = {
            q1: 'height',       // Continuous: Height
            q2: 'weight',       // Qualitative EXCEPT: Weight (Quantitative)
            q3: 'range',        // Central Tendency EXCEPT: Range (Measure of Dispersion)
            q4: 'mean',         // Sum / n
            q5: '97',           // (96+94+93+x) / 4 = 95 -> 283 + x = 380 -> x = 97
            q6: '75',           // (65+76+84+70+87+68) / 6 = 450 / 6 = 75
            q7: '29',           // Range = H - L -> 27 = 56 - L -> L = 56 - 27 = 29
            q8: 'height',       // Discrete EXCEPT: Height (Continuous)
            q9: '93.2',         // Weighted Mean: (2*89 + 3*93 + 5*95) / 10 = (178 + 279 + 475) / 10 = 932 / 10 = 93.2
            q10: 'frequency_polygon' // Midpoints connected by lines
        };

        document.getElementById('stats-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); 
        });

        /**
         * Submits the quiz and calculates the score.
         * @param {boolean} isLanguageToggle - True if called only to refresh results language.
         */
        function submitQuiz(isLanguageToggle = false) {
            const totalQuestions = 10; 
            const resultsDiv = document.getElementById('quiz-results');
            let correctCount = 0;
            
            if (!isLanguageToggle) {
                // --- Check Answers ---
                for (let i = 1; i <= totalQuestions; i++) {
                    const questionId = 'q' + i;
                    const selectElement = document.getElementById(questionId);
                    const userAnswer = selectElement.value;
                    const correctAnswer = correctAnswers[questionId];
                    
                    // Reset classes
                    selectElement.classList.remove('quiz-correct', 'quiz-incorrect');

                    if (userAnswer === "") {
                        // Skip if not answered or invalid
                        continue;
                    }

                    if (userAnswer === correctAnswer) {
                        correctCount++;
                        selectElement.classList.add('quiz-correct');
                    } else {
                        selectElement.classList.add('quiz-incorrect');
                    }
                }
                
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

            // Reset background classes
            resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800');

            let message;
            if (correctCount === totalQuestions) {
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalQuestions * 0.7) { // 70% threshold
                message = resultMessage.quiz_result_good(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-100', 'text-green-800');
            } else {
                message = resultMessage.quiz_result_fail(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-yellow-100', 'text-yellow-800');
            }

            // Display the final score and message
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
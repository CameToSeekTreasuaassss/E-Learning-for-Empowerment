<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Statistics In Action (Sampling and Survey)</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
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
        
        /* 20px for Math Formulas (if applicable) */
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
            border: 1px solid #d1fae5;
            border-bottom: 2px solid #a7f3d0;
            height: 3rem; /* Taller height for 20px text */
            padding: 0.5rem;
            width: 100%;
            border-radius: 0.375rem;
            background-color: #ffffff;
            transition: border-color 0.2s, background-color 0.2s;
        }
        .quiz-dropdown:focus { border-color: #059669; outline: none; box-shadow: 0 0 0 1px #059669; }

        .quiz-correct { border-color: #10b981 !important; background-color: #ecfdf5 !important; }
        .quiz-incorrect { border-color: #ef4444 !important; background-color: #fef2f2 !important; }

        /* Table styles (EXPLICITLY SET TO 20PX) */
        .module-table { width: 100%; border-collapse: collapse; margin-bottom: 1.5rem; }
        .module-table th, .module-table td { 
            border: 1px solid #d1fae5; 
            padding: 0.75rem; 
            text-align: left; 
            font-size: 1.25rem; /* Guarantee 20px size for table content */
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
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Sampling (Population vs. Sample)</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Sampling Techniques</a>
                        <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Conducting a Survey</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Statistics In Action (Sampling and Survey)</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">A study on sampling, sampling error, and conducting a survey.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Identify the difference between <b>Sample</b> and <b>Population</b>.</li>
                        <li data-i18n="obj_2">Identify and differentiate <b>Parameters</b> and <b>Statistics</b>.</li>
                        <li data-i18n="obj_3">Understand the use of <b>Sampling</b>.</li>
                        <li data-i18n="obj_4">Describe and differentiate the types of <b>Sampling Techniques</b>.</li>
                        <li data-i18n="obj_5">Conduct a simple survey using sampling.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Sampling (Populasyon vs. Sample) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Sampling (Population, Sample, Parameter, Statistic)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin1_h3_1">Population vs. Sample</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l1"><b>Population:</b> The entire group of people or objects being studied. The researcher determines its size.</li>
                                <li data-i18n="aralin1_l2"><b>Sample:</b> A subset (portion) of the population. Used because it is more practical and faster than studying the entire population.</li>
                            </ul>
                                                        <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin1_h3_2">Parameter vs. Statistic</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l3"><b>Parameter:</b> A characteristic of the <b>Population</b> (usually fixed but <b>unknown</b> to the researcher).</li>
                                <li data-i18n="aralin1_l4"><b>Statistic:</b> A characteristic of the <b>Sample</b> (known to the researcher but may vary between samples).</li>
                            </ul>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE:</p>
                                <p data-i18n="aralin1_ex1_p">You want to find the average income of 10,000 households in your village.</p>
                                <ul class="list-disc list-inside ml-4 text-sm mt-2">
                                    <li data-i18n="aralin1_ex1_l1"><b>Population:</b> 10,000 households.</li>
                                    <li data-i18n="aralin1_ex1_l2"><b>Sample:</b> 60 households you interviewed.</li>
                                    <li data-i18n="aralin1_ex1_l3"><b>Parameter:</b> Average household income based on the entire population.</li>
                                    <li data-i18n="aralin1_ex1_l4"><b>Statistic:</b> Average household income based on your 60 samples.</li>
                                </ul>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin1_h3_3">Sampling and Sampling Error</h3>
                            <p data-i18n="aralin1_p4"><b>Sampling</b> is the process of selecting enough samples to represent the entire population. The sample size should be <b>30 or more</b> to be representative.</p>
                            <p data-i18n="aralin1_p5">The difference between the Statistic and the Parameter is called the <b>Sampling Error</b>.</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l5"><b>Random Sampling Error:</b> Always occurs because the sample will never exactly match the population. A smaller sample means a larger error.</li>
                                <li data-i18n="aralin1_l6"><b>Bias:</b> Occurs when the researcher makes a mistake in the sample selection process and it is not representative of the population (e.g., only choosing high-income earners).</li>
                            </ul>
                        </div>
                    </details>

                    <!-- ARALIN 2: Sampling Techniques -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Sampling Techniques</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">I. Probability Sampling</h3>
                            <p data-i18n="aralin2_p1">Sample selection is based on the <b>chance of occurrence or probability</b>. Every member has a known chance of being selected. Used when there are no budget or time limitations.</p>
                                                        <div class="overflow-x-auto my-4">
                                <table class="module-table w-full">
                                    <thead>
                                        <tr data-i18n="aralin2_table1_h"><th>Type</th><th>Description</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin2_table1_r1"><td><b>1. Simple Random Sampling</b></td><td>Every member has an equal chance of being selected (e.g., Draw Lots). Best for small populations.</td></tr>
                                        <tr data-i18n="aralin2_table1_r2"><td><b>2. Systematic Random Sampling</b></td><td>Uses a number (interval) to systematically select samples. Better for large populations (e.g., Select every 5th person on a list).</td></tr>
                                        <tr data-i18n="aralin2_table1_r3"><td><b>3. Stratified Random Sampling</b></td><td>The population is divided into <b>Strata</b> (subgroups with the same distinct characteristic, e.g., age range, gender) and samples are randomly selected proportionally from each stratum.</td></tr>
                                        <tr data-i18n="aralin2_table1_r4"><td><b>4. Cluster Sampling</b></td><td>The population is divided into <b>Clusters</b> (subgroups with no distinct common trait) and the entire cluster (group) is randomly selected. Used for very large populations (e.g., selecting a few specific villages).</td></tr>
                                    </tbody>
                                
                                </table>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">II. Non-probability Sampling</h3>
                            <p data-i18n="aralin2_p2">Sample selection is based on <b>convenience and accessibility</b> or the purpose of the study. Used when time and budget are limited.</p>
                            
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full">
                                    <thead>
                                        <tr data-i18n="aralin2_table2_h"><th>Type</th><th>Description</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin2_table2_r1"><td><b>1. Accidental/Incidental Sampling</b></td><td>Samples are chosen based on convenience and accessibility (e.g., Interviewing neighbors because they are close).</td></tr>
                                        <tr data-i18n="aralin2_table2_r2"><td><b>2. Quota Sampling</b></td><td>Similar to Stratified, divided into strata, but selection within each stratum is based on convenience, not random.</td></tr>
                                        <tr data-i18n="aralin2_table2_r3"><td><b>3. Purposive Sampling</b></td><td>Samples are selected based on <b>specific traits/characteristics</b> needed for the study (e.g., Only students who listen to rock music).</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 3: Conducting a Survey -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Conducting a Survey</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">A <b>Survey</b> is a study that uses a <b>sample</b>. A <b>Census</b> uses the entire <b>population</b>.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Four Steps in Conducting a Survey:</h3>
                                                        <ol class="list-decimal list-inside ml-4 space-y-2">
                                <li data-i18n="aralin3_l1"><b>Conceptualization and Planning:</b> Choose a topic, define the population, and select the best sampling technique and sample size.</li>
                                <li data-i18n="aralin3_l2"><b>Data Gathering:</b> Prepare questions/queries, and choose a method: <b>Interview</b>, <b>Questionnaire</b>, <b>Observation</b>, or <b>Experimentation</b>.</li>
                                <li data-i18n="aralin3_l3"><b>Analysis:</b> Calculate the <b>Range</b> (Variability) and the appropriate <b>Measure of Central Tendency</b> (Mean, Median, or Mode).</li>
                                <li data-i18n="aralin3_l4"><b>Conclusion:</b> Based on the analysis, form a conclusion that applies to the entire population.</li>
                            </ol>
                                                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">Selecting the Central Tendency (Analysis):</h3>
                            <p data-i18n="aralin3_p2">Choosing the right measure depends on the type of data and its distribution:</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin3_l5"><b>Median (Middle):</b> Used when data has <b>High Variability (Large Range)</b>. It prevents extremely high or low data from skewing the average.</li>
                                <li data-i18n="aralin3_l6"><b>Mean (Average):</b> Used when data has <b>Small Variability (Low Range)</b>.</li>
                                <li data-i18n="aralin3_l7"><b>Mode (Most Frequent):</b> Used for <b>Categorical Data</b> (non-numerical data, e.g., yes/no, color) or when one numerical value forms the <b>Majority</b> of the data.</li>
                            </ul>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex1_title">EXAMPLE: Data Analysis</p>
                                <p data-i18n="aralin3_ex1_p1"><b>Data:</b> Student scores (83, 85, 90, 83, 89, 87, 85, 87, 83, 90)</p>
                                <p data-i18n="aralin3_ex1_p2"><b>Range:</b> 90 - 83 = 7 (Low Range)</p>
                                <p data-i18n="aralin3_ex1_p3"><b>Result:</b> Use the <b>Mean</b>. (Sum of scores &divide; 10)</p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6" data-i18n="quiz_subtitle">Choose the best answer for each question.</p>

                    <form id="stats-quiz-form" class="space-y-6">

                        <!-- Q1 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q1_label">1. A <b>Statistic</b> is a characteristic of which part of a study?</p>
                            <select id="q1" name="q1" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="population" data-i18n="q1_a">A. Population</option>
                                <option value="sample" data-i18n="q1_b">B. Sample</option>
                                <option value="parameter" data-i18n="q1_c">C. Parameter</option>
                                <option value="bias" data-i18n="q1_d">D. Bias</option>
                            </select>
                        </div>
                        
                        <!-- Q2 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q2_label">2. Which describes the <b>Parameter</b>?</p>
                             <select id="q2" name="q2" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="variable" data-i18n="q2_a">A. Variable that can change</option>
                                <option value="population_characteristic" data-i18n="q2_b">B. Characteristic fixed in the population</option>
                                <option value="sample_characteristic" data-i18n="q2_c">C. Characteristic obtained from the sample</option>
                                <option value="random_error" data-i18n="q2_d">D. The random sampling error</option>
                            </select>
                        </div>

                        <!-- Q3 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q3_label">3. <b>Random Sampling Error</b> is:</p>
                             <select id="q3" name="q3" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="avoidable" data-i18n="q3_a">A. Avoidable with correct sample selection</option>
                                <option value="unavoidable" data-i18n="q3_b">B. Always occurs in all studies using sampling</option>
                                <option value="bias" data-i18n="q3_c">C. Also called bias</option>
                                <option value="zero" data-i18n="q3_d">D. Becomes zero when sample size is 30</option>
                            </select>
                        </div>

                        <!-- Q4 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q4_label">4. For the sample to be representative of the population, the minimum sample size should be:</p>
                            <select id="q4" name="q4" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="15" data-i18n="q4_a">A. 15</option>
                                <option value="20" data-i18n="q4_b">B. 20</option>
                            <option value="30" data-i18n="q4_c">C. 30</option>
                                <option value="50" data-i18n="q4_d">D. 50</option>
                            </select>
                        </div>
                        
                        <!-- Q5 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q5_label">5. Which type of sampling bases selection on the <b>chance of occurrence or probability</b>?</p>
                            <select id="q5" name="q5" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="non_probability" data-i18n="q5_a">A. Non-probability Sampling</option>
                                <option value="quota" data-i18n="q5_b">B. Quota Sampling</option>
                            <option value="probability" data-i18n="q5_c">C. Probability Sampling</option>
                                <option value="purposive" data-i18n="q5_d">D. Purposive Sampling</option>
                            </select>
                        </div>

                        <!-- Q6 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q6_label">6. Which technique divides the population into <b>Strata</b> and selects samples randomly to ensure proportional representation?</p>
                            <select id="q6" name="q6" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="simple_random" data-i18n="q6_a">A. Simple Random Sampling</option>
                                <option value="systematic" data-i18n="q6_b">B. Systematic Random Sampling</option>
                            <option value="stratified" data-i18n="q6_c">C. Stratified Random Sampling</option>
                                <option value="cluster" data-i18n="q6_d">D. Cluster Sampling</option>
                            </select>
                        </div>
                        
                        <!-- Q7 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q7_label">7. Which sampling technique is best used when time is limited and you need to choose the sample based on <b>specific traits/characteristics</b> (Selection Criterion)?</p>
                            <select id="q7" name="q7" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="accidental" data-i18n="q7_a">A. Accidental/Incidental Sampling</option>
                                <option value="quota" data-i18n="q7_b">B. Quota Sampling</option>
                            <option value="purposive" data-i18n="q7_c">C. Purposive Sampling</option>
                                <option value="systematic" data-i18n="q7_d">D. Systematic Random Sampling</option>
                            </select>
                        </div>

                        <!-- Q8 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q8_label">8. A <b>Census</b> is a study that uses the:</p>
                            <select id="q8" name="q8" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="sample" data-i18n="q8_a">A. Sample</option>
                                <option value="statistic" data-i18n="q8_b">B. Statistic</option>
                            <option value="population" data-i18n="q8_c">C. Population</option>
                                <option value="strata" data-i18n="q8_d">D. Strata</option>
                            </select>
                        </div>

                        <!-- Q9 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q9_label">9. Which measure of central tendency is best used when the data has <b>High Variability (Large Range)</b>?</p>
                             <select id="q9" name="q9" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="mean" data-i18n="q9_a">A. Mean</option>
                            <option value="median" data-i18n="q9_b">B. Median</option>
                                <option value="mode" data-i18n="q9_c">C. Mode</option>
                                <option value="range" data-i18n="q9_d">D. Range</option>
                            </select>
                        </div>
                        
                        <!-- Q10 -->
                        <div class="p-4 border rounded-lg bg-white">
                            <p class="font-medium mb-3" data-i18n="q10_label">10. When data is <b>Categorical</b> (such as "yes" or "no"), the measure of central tendency used is:</p>
                            <select id="q10" name="q10" class="quiz-dropdown">
                                <option value="" disabled selected data-i18n="select_answer">Select Answer</option>
                                <option value="mean" data-i18n="q10_a">A. Mean</option>
                                <option value="median" data-i18n="q10_b">B. Median</option>
                            <option value="mode" data-i18n="q10_c">C. Mode</option>
                                <option value="range" data-i18n="q10_d">D. Range</option>
                            </select>
                        </div>


                        <button type="submit" class="w-full accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
                            Check Answers
                        </button>
                    </form>

                    <div id="quiz-results" class="mt-6 p-4 rounded-xl text-green-800 font-semibold hidden">
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
                outline_aralin1: "Lesson 1: Sampling (Population vs. Sample)",
                outline_aralin2: "Lesson 2: Sampling Techniques",
                outline_aralin3: "Lesson 3: Conducting a Survey",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Statistics In Action (Sampling and Survey)",
                h1_subtitle: "A study on sampling, sampling error, and conducting a survey.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Identify the difference between <b>Sample</b> and <b>Population</b>.",
                obj_2: "Identify and differentiate <b>Parameters</b> and <b>Statistics</b>.",
                obj_3: "Understand the use of <b>Sampling</b>.",
                aralin1_l3: "<b>Parameter:</b> A characteristic of the <b>Population</b> (usually fixed but <b>unknown</b> to the researcher).",
                obj_4: "Describe and differentiate the types of <b>Sampling Techniques</b>.",
                obj_5: "Conduct a simple survey using sampling.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Sampling (Population, Sample, Parameter, Statistic)",
                aralin1_h3_1: "Population vs. Sample",
                aralin1_l1: "<b>Population:</b> The entire group of people or objects being studied. The researcher determines its size.",
                aralin1_l2: "<b>Sample:</b> A subset (portion) of the population. Used because it is more practical and faster than studying the entire population.",
                aralin1_h3_2: "Parameter vs. Statistic",
                aralin1_l3: "<b>Parameter:</b> A characteristic of the <b>Population</b> (usually fixed but <b>unknown</b> to the researcher).",
                aralin1_l4: "<b>Statistic:</b> A characteristic of the <b>Sample</b> (known to the researcher but may vary between samples).",
                aralin1_ex1_title: "EXAMPLE:",
                aralin1_ex1_p: "You want to find the average income of 10,000 households in your village.",
                aralin1_ex1_l1: "<b>Population:</b> 10,000 households.",
                aralin1_ex1_l2: "<b>Sample:</b> 60 households you interviewed.",
                aralin1_ex1_l3: "<b>Parameter:</b> Average household income based on the entire population.",
                aralin1_ex1_l4: "<b>Statistic:</b> Average household income based on your 60 samples.",
                aralin1_h3_3: "Sampling and Sampling Error",
                aralin1_p4: "<b>Sampling</b> is the process of selecting enough samples to represent the entire population. The sample size should be <b>30 or more</b> to be representative.",
                aralin1_p5: "The difference between the Statistic and the Parameter is called the <b>Sampling Error</b>.",
                aralin1_l5: "<b>Random Sampling Error:</b> Always occurs because the sample will never exactly match the population. A smaller sample means a larger error.",
                aralin1_l6: "<b>Bias:</b> Occurs when the researcher makes a mistake in the sample selection process and it is not representative of the population (e.g., only choosing high-income earners).",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Sampling Techniques",
                aralin2_h3_1: "I. Probability Sampling",
                aralin2_p1: "Sample selection is based on the <b>chance of occurrence or probability</b>. Every member has a known chance of being selected. Used when there are no budget or time limitations.",
                aralin2_table1_h: "<th>Type</th><th>Description</th>",
                aralin2_table1_r1: "<td><b>1. Simple Random Sampling</b></td><td>Every member has an equal chance of being selected (e.g., Draw Lots). Best for small populations.</td>",
                aralin2_table1_r2: "<td><b>2. Systematic Random Sampling</b></td><td>Uses a number (interval) to systematically select samples. Better for large populations (e.g., Select every 5th person on a list).</td>",
                aralin2_table1_r3: "<td><b>3. Stratified Random Sampling</b></td><td>The population is divided into <b>Strata</b> (subgroups with the same distinct characteristic, e.g., age range, gender) and samples are randomly selected proportionally from each stratum.</td>",
                aralin2_table1_r4: "<td><b>4. Cluster Sampling</b></td><td>The population is divided into <b>Clusters</b> (subgroups with no distinct common trait) and the entire cluster (group) is randomly selected. Used for very large populations (e.g., selecting a few specific villages).</td>",
                aralin2_h3_2: "II. Non-probability Sampling",
                aralin2_p2: "Sample selection is based on <b>convenience and accessibility</b> or the purpose of the study. Used when time and budget are limited.",
                aralin2_table2_h: "<th>Type</th><th>Description</th>",
                aralin2_table2_r1: "<td><b>1. Accidental/Incidental Sampling</b></td><td>Samples are chosen based on convenience and accessibility (e.g., Interviewing neighbors because they are close).</td>",
                aralin2_table2_r2: "<td><b>2. Quota Sampling</b></td><td>Similar to Stratified, divided into strata, but selection within each stratum is based on convenience, not random.</td>",
                aralin2_table2_r3: "<td><b>3. Purposive Sampling</b></td><td>Samples are selected based on <b>specific traits/characteristics</b> needed for the study (e.g., Only students who listen to rock music).</td>",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Conducting a Survey",
                aralin3_p1: "A <b>Survey</b> is a study that uses a <b>sample</b>. A <b>Census</b> uses the entire <b>population</b>.",
                aralin3_h3_1: "Four Steps in Conducting a Survey:",
                aralin3_l1: "<b>Conceptualization and Planning:</b> Choose a topic, define the population, and select the best sampling technique and sample size.",
                aralin3_l2: "<b>Data Gathering:</b> Prepare questions/queries, and choose a method: <b>Interview</b>, <b>Questionnaire</b>, <b>Observation</b>, or <b>Experimentation</b>.",
                aralin3_l3: "<b>Analysis:</b> Calculate the <b>Range</b> (Variability) and the appropriate <b>Measure of Central Tendency</b> (Mean, Median, or Mode).",
                aralin3_l4: "<b>Conclusion:</b> Based on the analysis, form a conclusion that applies to the entire population.",
                aralin3_h3_2: "Selecting the Central Tendency (Analysis):",
                aralin3_p2: "Choosing the right measure depends on the type of data and its distribution:",
                aralin3_l5: "<b>Median (Middle):</b> Used when data has <b>High Variability (Large Range)</b>. It prevents extremely high or low data from skewing the average.",
                aralin3_l6: "<b>Mean (Average):</b> Used when data has <b>Small Variability (Low Range)</b>.",
                aralin3_l7: "<b>Mode (Most Frequent):</b> Used for <b>Categorical Data</b> (non-numerical data, e.g., yes/no, color) or when one numerical value forms the <b>Majority</b> of the data.",
                aralin3_ex1_title: "EXAMPLE: Data Analysis",
                aralin3_ex1_p1: "<b>Data:</b> Student scores (83, 85, 90, 83, 89, 87, 85, 87, 83, 90)",
                aralin3_ex1_p2: "<b>Range:</b> 90 - 83 = 7 (Low Range)",
                aralin3_ex1_p3: "<b>Result:</b> Use the <b>Mean</b>. (Sum of scores ÷ 10)",

                // Quiz Labels and Placeholders
                quiz_title: "Practice", // REMOVED " - 10 Items"
                quiz_subtitle: "Choose the best answer for each question.",
                select_answer: "Select Answer",
                q1_label: "1. A <b>Statistic</b> is a characteristic of which part of a study?",
                q1_a: "A. Population",
                q1_b: "B. Sample",
                q1_c: "C. Parameter",
                q1_d: "D. Bias",
                q2_label: "2. Which describes the <b>Parameter</b>?",
                q2_a: "A. Variable that can change",
                q2_b: "B. Characteristic fixed in the population",
                q2_c: "C. Characteristic obtained from the sample",
                q2_d: "D. The random sampling error",
                q3_label: "3. <b>Random Sampling Error</b> is:",
                q3_a: "A. Avoidable with correct sample selection",
                q3_b: "B. Always occurs in all studies using sampling",
                q3_c: "C. Also called bias",
                q3_d: "D. Becomes zero when sample size is 30",
                q4_label: "4. For the sample to be representative of the population, the minimum sample size should be:",
                q4_a: "A. 15",
                q4_b: "B. 20",
                q4_c: "C. 30",
                q4_d: "D. 50",
                q5_label: "5. Which type of sampling bases selection on the <b>chance of occurrence or probability</b>?",
                q5_a: "A. Non-probability Sampling",
                q5_b: "B. Quota Sampling",
                q5_c: "C. Probability Sampling",
                q5_d: "D. Purposive Sampling",
                q6_label: "6. Which technique divides the population into <b>Strata</b> and selects samples randomly to ensure proportional representation?",
                q6_a: "A. Simple Random Sampling",
                q6_b: "B. Systematic Random Sampling",
                q6_c: "C. Stratified Random Sampling",
                q6_d: "D. Cluster Sampling",
                q7_label: "7. Which sampling technique is best used when time is limited and you need to choose the sample based on <b>specific traits/characteristics</b> (Selection Criterion)?",
                q7_a: "A. Accidental/Incidental Sampling",
                q7_b: "B. Quota Sampling",
                q7_c: "C. Purposive Sampling",
                q7_d: "D. Systematic Random Sampling",
                q8_label: "8. A <b>Census</b> is a study that uses the:",
                q8_a: "A. Sample",
                q8_b: "B. Statistic",
                q8_c: "C. Population",
                q8_d: "D. Strata",
                q9_label: "9. Which measure of central tendency is best used when the data has <b>High Variability (Large Range)</b>?",
                q9_a: "A. Mean",
                q9_b: "B. Median",
                q9_c: "C. Mode",
                q9_d: "D. Range",
                q10_label: "10. When data is <b>Categorical</b> (such as \"yes\" or \"no\"), the measure of central tendency used is:",
                q10_a: "A. Mean",
                q10_b: "B. Median",
                q10_c: "C. Mode",
                q10_d: "D. Range",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}, ${percentage}%). You mastered Sampling and Survey methods!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the Sampling Techniques and Central Tendency Rules.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Re-read Lessons 1-3.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Sampling (Populasyon vs. Sample)",
                outline_aralin2: "Aralin 2: Sampling Techniques",
                outline_aralin3: "Aralin 3: Pagsasagawa ng Survey",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Statistics In Action (Sampling and Survey)",
                h1_subtitle: "Pag-aaral tungkol sa sampling, sampling error, at paggawa ng survey.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Makilala ang pagkakaiba sa pagitan ng <b>Sample</b> at <b>Population</b>.",
                obj_2: "Tukuyin at iiba-iba ang <b>Parameters</b> at <b>Statistics</b>.",
                obj_3: "Malaman ang gamit ng <b>Sampling</b>.",
                obj_4: "Ilarawan at iiba-iba ang uri ng <b>Sampling Techniques</b>.",
                obj_5: "Magsagawa ng simpleng survey gamit ang sampling.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Sampling (Populasyon, Sample, Parameter, Statistic)",
                aralin1_h3_1: "Populasyon vs. Sample",
                aralin1_l1: "<b>Population:</b> Isang grupo ng mga tao o bagay na pag-aaralan. Ang researcher ang nagdedetermina kung gaano ito kalaki.",
                aralin1_l2: "<b>Sample:</b> Isang bahagi ng populasyon. Ginagamit ito dahil mas praktikal at mas mabilis kaysa pag-aaral sa buong populasyon.",
                aralin1_h3_2: "Parameter vs. Statistic",
                aralin1_l3: "<b>Parameter:</b> Katangian ng <b>Population</b> (kadalasang nakapirmi ngunit <b>hindi alam</b> ng researcher).",
                aralin1_l4: "<b>Statistic:</b> Katangian ng <b>Sample</b> (alam ng researcher ngunit maaaring mag-iba sa bawat sample).",
                aralin1_ex1_title: "HALIMBAWA:",
                aralin1_ex1_p: "Gusto mong malaman ang average na kita ng 10,000 kabahayan sa iyong barangay.",
                aralin1_ex1_l1: "<b>Population:</b> 10,000 kabahayan.",
                aralin1_ex1_l2: "<b>Sample:</b> 60 kabahayan na iyong ininterbyu.",
                aralin1_ex1_l3: "<b>Parameter:</b> Average household income batay sa buong populasyon.",
                aralin1_ex1_l4: "<b>Statistic:</b> Average household income batay sa iyong 60 sample.",
                aralin1_h3_3: "Sampling at Sampling Error",
                aralin1_p4: "Ang <b>Sampling</b> ay ang proseso ng pagpili ng sapat na sample upang kumatawan sa buong populasyon. Ang sample size ay dapat <b>30 o higit pa</b> para maging representative.",
                aralin1_p5: "Ang pagkakaiba sa pagitan ng Statistic at Parameter ay tinatawag na <b>Sampling Error</b>.",
                aralin1_l5: "<b>Random Sampling Error:</b> Laging nangyayari dahil hindi magiging eksaktong kapareho ng populasyon ang sample. Ang mas maliit na sample ay nangangahulugang mas malaking error.",
                aralin1_l6: "<b>Bias:</b> Nangyayari kapag nagkakamali ang researcher sa proseso ng pagpili ng sample at hindi ito representative ng populasyon (hal. pumili lang ng matataas ang sahod).",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Sampling Techniques",
                aralin2_h3_1: "I. Probability Sampling",
                aralin2_p1: "Ang pagpili ng sample ay batay sa <b>chance of occurrence o probability</b>. Ang bawat miyembro ay may kilalang pagkakataong mapili. Ginagamit kapag walang limitasyon sa budget at oras.",
                aralin2_table1_h: "<th>Uri</th><th>Paglalarawan</th>",
                aralin2_table1_r1: "<td><b>1. Simple Random Sampling</b></td><td>Ang bawat miyembro ay may pantay na pagkakataong mapili (Hal. Draw Lots). Pinakamainam sa maliit na populasyon.</td>",
                aralin2_table1_r2: "<td><b>2. Systematic Random Sampling</b></td><td>Gumagamit ng isang numero (interval) para sistematikong pumili. Mas mahusay sa malalaking populasyon (Hal. Pumili ng bawat ika-5 tao sa listahan).</td>",
                aralin2_table1_r3: "<td><b>3. Stratified Random Sampling</b></td><td>Hahatiin ang populasyon sa <b>Strata</b> (subgroups na may parehong natatanging katangian, e.g., age range, gender) at random na pipiliin ang sample mula sa bawat stratum nang proporsyonal.</td>",
                aralin2_table1_r4: "<td><b>4. Cluster Sampling</b></td><td>Hahatiin ang populasyon sa <b>Clusters</b> (subgroups na walang natatanging common trait) at random na pipiliin ang buong cluster (grupo). Ginagamit sa napakalaking populasyon (e.g., pumili ng ilang barangay).</td>",
                aralin2_h3_2: "II. Non-probability Sampling",
                aralin2_p2: "Ang pagpili ng sample ay batay sa <b>convenience at accessibility</b> o sa layunin ng pag-aaral. Ginagamit kapag limitado ang oras at budget.",
                aralin2_table2_h: "<th>Uri</th><th>Paglalarawan</th>",
                aralin2_table2_r1: "<td><b>1. Accidental/Incidental Sampling</b></td><td>Pumipili ng sample batay sa convenience at accessibility (Hal. Ininterbyu ang mga kapitbahay dahil malapit).</td>",
                aralin2_table2_r2: "<td><b>2. Quota Sampling</b></td><td>Katulad ng Stratified, hinahati sa strata, ngunit ang pagpili sa bawat stratum ay batay sa convenience, hindi random.</td>",
                aralin2_table2_r3: "<td><b>3. Purposive Sampling</b></td><td>Pumipili ng sample batay sa <b>specific traits/katangian</b> na kailangan ng pag-aaral (Hal. Mag-aaral lang na nakikinig sa rock music).</td>",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Pagsasagawa ng Survey",
                aralin3_p1: "A <b>Survey</b> is a study that uses a <b>sample</b>. A <b>Census</b> uses the entire <b>population</b>.",
                aralin3_h3_1: "Apat na Hakbang sa Pagsasagawa ng Survey:",
                aralin3_l1: "<b>Conceptualization and Planning:</b> Pumili ng paksa, tukuyin ang population, at piliin ang best sampling technique at sample size.",
                aralin3_l2: "<b>Data Gathering:</b> Maghanda ng katanungan/query, at pumili ng paraan: <b>Interview</b>, <b>Questionnaire</b>, <b>Observation</b>, o <b>Experimentation</b>.",
                aralin3_l3: "<b>Analysis:</b> Kuwentahin ang <b>Range</b> (Variability) at ang tamang <b>Measure of Central Tendency</b> (Mean, Median, o Mode).",
                aralin3_l4: "<b>Conclusion:</b> Batay sa analysis, gumawa ng konklusyon na aangkop sa buong populasyon.",
                aralin3_h3_2: "Pagpili ng Central Tendency (Analysis):",
                aralin3_p2: "Ang pagpili ng tamang sukat ay nakasalalay sa uri ng data at distribusyon nito:",
                aralin3_l5: "<b>Median (Gitna):</b> Ginagamit kapag ang data ay may <b>High Variability (Large Range)</b>. Pinipigilan nito ang sobrang taas o sobrang baba na data na makahila sa average.",
                aralin3_l6: "<b>Mean (Average):</b> Ginagamit kapag ang data ay may <b>Small Variability (Low Range)</b>.",
                aralin3_l7: "<b>Mode (Madalas):</b> Ginagamit para sa <b>Categorical Data</b> (data na hindi numero, hal. yes/no, kulay) o kapag ang isang numerical value ay bumubuo sa <b>Majority</b> ng data.",
                aralin3_ex1_title: "HALIMBAWA: Pagsusuri ng Data",
                aralin3_ex1_p1: "<b>Data:</b> Mga score ng estudyante (83, 85, 90, 83, 89, 87, 85, 87, 83, 90)",
                aralin3_ex1_p2: "<b>Range:</b> 90 - 83 = 7 (Low Range)",
                aralin3_ex1_p3: "<b>Resulta:</b> Gamitin ang <b>Mean</b>. (Sum of scores \u00f7 10)",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay", // REMOVED " - 10 Items"
                quiz_subtitle: "Pumili ng pinakatamang sagot para sa bawat tanong.",
                select_answer: "Pumili ng Sagot",
                q1_label: "1. Ang isang <b>Statistic</b> ay katangian ng anong bahagi ng pag-aaral?",
                q1_a: "A. Population",
                q1_b: "B. Sample",
                q1_c: "C. Parameter",
                q1_d: "D. Bias",
                q2_label: "2. Alin ang naglalarawan sa <b>Parameter</b>?",
                q2_a: "A. Variable na maaaring mag-iba",
                q2_b: "B. Katangian na nakapirmi sa populasyon",
                q2_c: "C. Katangian na nakuha mula sa sample",
                q2_d: "D. Ang random sampling error",
                q3_label: "3. Ang <b>Random Sampling Error</b> ay:",
                q3_a: "A. Maaaring maiwasan sa tamang pagpili ng sample",
                q3_b: "B. Laging nangyayari sa lahat ng pag-aaral na gumagamit ng sampling",
                q3_c: "C. Isa ring tawag para sa bias",
                q3_d: "D. Nagiging zero kapag 30 ang sample size",
                q4_label: "4. Upang maging representative ang sample ng populasyon, ang minimum sample size ay dapat:",
                q4_a: "A. 15",
                q4_b: "B. 20",
                q4_c: "C. 30",
                q4_d: "D. 50",
                q5_label: "5. Sa anong uri ng sampling binabasa ang pagpili sa <b>chance of occurrence o probability</b>?",
                q5_a: "A. Non-probability Sampling",
                q5_b: "B. Quota Sampling",
                q5_c: "C. Probability Sampling",
                q5_d: "D. Purposive Sampling",
                q6_label: "6. Aling sampling technique ang naghahati ng populasyon sa <b>Strata</b> at random na pumipili upang maging proporsyonal ang representasyon?",
                q6_a: "A. Simple Random Sampling",
                q6_b: "B. Systematic Random Sampling",
                q6_c: "C. Stratified Random Sampling",
                q6_d: "D. Cluster Sampling",
                q7_label: "7. Aling sampling technique ang pinakamainam gamitin kung may limitasyon sa oras at kailangan mong piliin ang sample batay sa <b>specific traits/katangian</b> (Selection Criterion)?",
                q7_a: "A. Accidental/Incidental Sampling",
                q7_b: "B. Quota Sampling",
                q7_c: "C. Purposive Sampling",
                q7_d: "D. Systematic Random Sampling",
                q8_label: "8. Ang <b>Census</b> ay isang pag-aaral na gumagamit ng:",
                q8_a: "A. Sample",
                q8_b: "B. Statistic",
                q8_c: "C. Population",
                q8_d: "D. Strata",
                q9_label: "9. Aling measure ng central tendency ang pinakamainam gamitin kapag ang data ay mayroong <b>High Variability (Large Range)</b>?",
                q9_a: "A. Mean",
                q9_b: "B. Median",
                q9_c: "C. Mode",
                q9_d: "D. Range",
                q10_label: "10. Kapag ang data ay <b>Categorical</b> (tulad ng \"yes\" o \"no\"), ang ginagamit na measure of central tendency ay:",
                q10_a: "A. Mean",
                q10_b: "B. Median",
                q10_c: "C. Mode",
                q10_d: "D. Range",
                quiz_button: "Kalkulahin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}, ${percentage}%). Master mo na ang Sampling at Survey methods!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang Sampling Techniques at Central Tendency Rules.`,
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
            q1: 'sample',
            q2: 'population_characteristic',
            q3: 'unavoidable',
            q4: '30',
            q5: 'probability',
            q6: 'stratified',
            q7: 'purposive',
            q8: 'population',
            q9: 'median',
            q10: 'mode'
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
            resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800', 'bg-red-100', 'text-red-800');

            let message;
            if (correctCount === totalQuestions) {
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalQuestions * 0.7) { // 70% threshold
                message = resultMessage.quiz_result_good(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-100', 'text-green-800');
            } else {
                message = resultMessage.quiz_result_fail(correctCount, totalQuestions, percentage);
                // Using yellow-100/800 for below passing, consistent with other modules
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
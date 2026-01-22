<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Statistics and Probability</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        /* Base styles copied for consistency (Green/Emerald Theme) */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0fdf4; /* Green 50 (light green background) */
        }
        .accent-bg { background-color: #10b981; } /* Green 500 (Primary accent color) */
        .module-section { 
            transition: all 0.3s ease; 
            border: 1px solid #e5e7eb; /* Light border */
        }
        .module-section:hover { 
            /* Subtle green glow effect on hover */
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.2), 0 4px 6px -2px rgba(16, 185, 129, 0.1); 
        }
        /* Content box styles */
        .content-box { padding: 1.5rem; background-color: #ffffff; }
        
        /* --- FONT SIZE CONSISTENCY --- */
        /* General content font size (20px) */
        .content-box p, 
        .content-box ul, 
        .content-box ol, 
        .content-box li, 
        .content-box .example-box p,
        .content-box .text-illustration,
        #economics-quiz-form label,
        .content-box .module-table td { 
            font-size: 1.25rem; /* 20px */
            line-height: 1.75;
            color: #1f2937; 
        }
        
        /* --- Objectives Content Overrides (P, H3, LI) -> 20px --- */
        /* Forces 20px (1.25rem) on all content inside the objectives box */
        #objectives p, 
        #objectives h3,
        #objectives ul li {
             font-size: 1.25rem !important; /* Forces 20px on content/h3/li */
             line-height: 1.75 !important;
             color: #1f2937 !important;
        }
        
        /* Restore list margin for list inside objectives */
        #objectives ul { margin-left: 1.5rem !important; }

        /* Titles and Headers */
        .content-box h2, .content-box h3 {
            font-weight: 700;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }
        /* Main H2 Title (28px) */
        .content-box h2 { font-size: 1.75rem; color: #10b981; } /* Green 600 (28px) */
        /* Regular H3 (24px) */
        .content-box h3 { font-size: 1.5rem; color: #1f2937; } /* 24px */
        
        /* Main H1 Title (50px) */
        .main-title-h1 {
            font-size: 50px; /* 50px */
            line-height: 1.1;
        }

        .content-box .example-box {
            /* Styled to look like a callout box */
            background-color: #f3f4f6; 
            border-left: 4px solid #34d399; /* Green accent border */
            padding: 1rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
            border-radius: 0.5rem;
        }
        /* Consistent bolding style (Dark Green) */
        .content-box b {
            color: #047857; /* Dark Green 700 for strong emphasis */
            font-weight: 700;
        }

        /* Outline Styles (Sticky Navigation) */
        /* FORCED TO 16PX (1rem) */
        .outline-link { 
            display: block; 
            padding: 0.5rem 0.75rem; 
            border-radius: 0.5rem; 
            color: #4b5563; 
            transition: background-color 0.15s, color: 0.15s; 
            font-size: 1rem; /* 16px */
        }
        .outline-link:hover { background-color: #d1fae5; color: #059669; }
        .outline-link.active { font-weight: 700; background-color: #10b981; color: #ffffff; }

        /* Quiz styles (Inherit 20px font, added width control) */
        .quiz-input {
            border-bottom: 2px solid #a7f3d0;
            transition: border-color 0.2s;
            padding: 0.25rem 0.5rem;
            text-align: center;
            font-size: 1.25rem; /* 20px */
        }
        /* Full width on mobile, max width on desktop */
        @media (min-width: 640px) {
            .quiz-input {
                max-width: 24rem; /* LONGER WIDTH: 24rem (384px) */
                text-align: left; /* Text alignment for longer answers */
            }
        }
        .quiz-input:focus { border-color: #059669; outline: none; }
        .correct-answer { border-color: #10b981 !important; background-color: #ecfdf5; }
        .incorrect-answer { border-color: #ef4444 !important; background-color: #fef2f2; }
        
        /* Table Styles (Updated to Green Theme) */
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
            text-align: left; /* Adjusted table text alignment */
            font-size: 1.25rem; /* 20px inherited from parent */
        }
        .module-table tbody tr:nth-child(odd) {
            background-color: #f7fee7; /* Lime 50 */
        }
        /* New style for the thin green line under the aralin header */
        .aralin-summary-border {
            border-bottom: 2px solid #34d399; /* Green 400 */
        }
        
        /* RESTORED STICKY CONTAINER CSS */
        .sticky-container {
            position: sticky;
            top: 1.5rem; /* Control the top offset for the entire sticky block */
        }
    </style>
</head>
<body class="lg:p-20 p-4">

    <!-- Main Grid Container for Outline and Content (Width limit removed for full responsiveness) -->
    <div class="lg:grid lg:grid-cols-12 lg:gap-8 mx-auto">

        <!-- Left Column: Balangkas ng Modyul (Outline) -->
        <nav id="outline-nav" class="hidden lg:block lg:col-span-3">
            
            <!-- STICKY WRAPPER: Contains all three elements and handles the single sticky position -->
            <div class="sticky-container space-y-4">
            
                <!-- 1. Go Back to Modules (Bumalik sa Modyul) - FIRST POSITION -->
                <a href="http://localhost/als/front/modules.php" id="back-to-modules" 
                   class="w-full flex items-center text-base font-normal text-gray-600 hover:text-green-700 transition duration-150 p-3 rounded-xl hover:bg-green-50 bg-white shadow-md border border-gray-200">
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
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Random Variables & Distributions</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Normal Curve and Sampling</a>
                        <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Hypothesis Testing & Regression</a>
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
                    <span class="text-xs font-semibold uppercase tracking-wider text-green-600 bg-green-100 px-3 py-1 rounded-full" data-i18n="meta_text">Senior High Learning Module Sheet</span>
                    <!-- H1 Title size updated to 50px (main-title-h1 class) -->
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Statistics and Probability</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Analyzing chance and data to make informed decisions.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (All content inside is 20px) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <!-- H2 Title is 28px and black -->
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Content paragraph is now 20px -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Illustrate a <b>Random Variable</b> and distinguish between <b>Discrete</b> and <b>Continuous</b> variables.</li>
                        <li data-i18n="obj_2">Calculate the <b>Mean (M), Variance (SD²), and Standard Deviation (SD)</b> of a discrete random variable.</li>
                        <li data-i18n="obj_3">Illustrate the properties of the <b>Normal Curve</b> and convert raw scores to <b>Z-scores</b>.</li>
                        <li data-i18n="obj_4">Understand the <b>Central Limit Theorem</b> and construct a <b>Confidence Interval</b> for the population mean.</li>
                        <li data-i18n="obj_5">Formulate <b>Null and Alternative Hypotheses</b> and solve problems involving Hypothesis Testing.</li>
                        <li data-i18n="obj_6">Identify <b>Bivariate Data</b> and perform basic <b>Regression Analysis</b> (slope and y-intercept).</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Random Variables and Discrete Distributions -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin1_title">Lesson 1: Random Variables and Probability Distributions</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin1_h3_1">Random Variables (R.V.)</h3>
                            <p data-i18n="aralin1_p1">A <b>Random Variable (R.V.)</b> is a function that assigns a real number to each outcome in a sample space. It is a variable whose values are determined by chance. Capital letters like <b>X</b> or <b>Y</b> are used to represent an R.V.</p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin1_h3_2">Discrete vs. Continuous R.V.</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l2_1"><b>Discrete R.V.</b>: Has a finite or countable number of possible outcomes (e.g., the number of tails when tossing three coins, or the number of defective computers). It is typically 'count data'.</li>
                                <li data-i18n="aralin1_l2_2"><b>Continuous R.V.</b>: Takes on any value on a continuous scale (e.g., the height of a person, the temperature of a room, or the amount of sugar in coffee). It is typically 'measured data'.</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin1_h3_3">Discrete Probability Distribution</h3>
                            <p data-i18n="aralin1_p3">A <b>Discrete Probability Distribution</b> lists the values an R.V. can assume and their corresponding probabilities. It must satisfy two properties:</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l3_1">The probability of each value must be between or equal to 0 and 1 (0 &le; P(X) &le; 1).</li>
                                <li data-i18n="aralin1_l3_2">The sum of all probabilities must be equal to 1 (Sum of P(X) = 1).</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin1_h3_4">Mean and Variance</h3>
                            <p data-i18n="aralin1_p4">The <b>Mean (M)</b> describes the average outcome, while the <b>Variance (SD²)</b> and <b>Standard Deviation (SD)</b> describe the spread or variability of the distribution. The mean is calculated as: M = Sum of [<b>X</b> &bullet; P(<b>X</b>)].</p>
                        </div>
                    </details>

                    <!-- ARALIN 2: Normal Curve and Sampling -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin2_title">Lesson 2: Normal Curve and Sampling</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin2_h3_1">The Normal Probability Distribution</h3>
                            <p data-i18n="aralin2_p1">The <b>Normal Curve</b> is bell-shaped and symmetrical about its center. Its mean (M), median, and mode coincide at the center. The total area under the curve is 1, representing <b>100%</b> probability.</p>
                            <p class="mt-4" data-i18n="aralin2_p2">The <b>Standard Normal Curve</b> has a mean of 0 (M=0) and a standard deviation of 1 (SD=1).</p>
                                                        <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin2_h3_2">Z-Score (Standard Score)</h3>
                            <p data-i18n="aralin2_p3">The <b>Z-score</b> standardizes a raw measurement <b>X</b> by calculating how many standard deviations it is from the mean. This allows us to use the standard normal table to find probabilities/areas.</p>
                            <p class="text-center italic mt-4" data-i18n="aralin2_formula_z"><b>Z = (X - M) / SD</b></p>

                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin2_h3_3">Sampling and the Central Limit Theorem</h3>
                            <p data-i18n="aralin2_p4">The <b>Central Limit Theorem (CLT)</b> states that for large sample sizes (<b>n</b> &ge; 30), the sampling distribution of the sample means (<b>Sample M</b>) approaches a normal distribution, regardless of the shape of the original population distribution. This is fundamental for <b>Confidence Interval</b> estimation.</p>
                            <p class="mt-4" data-i18n="aralin2_p5">A <b>Confidence Interval (CI)</b> is a range of values used to estimate a population parameter, such as the population mean (M).</p>
                        </div>
                    </details>

                    <!-- ARALIN 3: Hypothesis Testing and Regression -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin3_title">Lesson 3: Hypothesis Testing and Regression</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin3_h3_1">Hypothesis Testing Basics</h3>
                            <p data-i18n="aralin3_p1"><b>Hypothesis Testing</b> is a process for deciding between two opposing statements about a population parameter:</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin3_l1_1"><b>Null Hypothesis (H0)</b>: A statement that claims \"no difference\" or \"no change\" from the status quo (e.g., <b>H0</b>: <b>M = 50</b>).</li>
                                <li data-i18n="aralin3_l1_2"><b>Alternative Hypothesis (H1)</b>: A statement that contradicts <b>H0</b> and claims a difference (e.g., <b>H1</b>: <b>M &ne; 50</b> or <b>H1</b>: <b>M &lt; 50</b>).</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin3_h3_2">Types of Errors</h3>
                            <p data-i18n="aralin3_p2">In decision-making, two types of errors can occur:</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin3_l2_1"><b>Type I Error</b>: Rejecting the Null Hypothesis (<b>H0</b>) when it is actually true. The probability is &alpha; (level of significance).</li>
                                <li data-i18n="aralin3_l2_2"><b>Type II Error</b>: Failing to reject (<b>H0</b>) when it is actually false. The probability is &beta;.",
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin3_h3_3">Correlation and Regression</h3>
                            <p data-i18n="aralin3_p3"><b>Bivariate Data</b> involves two variables, typically categorized as <b>Independent Variable</b> (X) and <b>Dependent Variable</b> (Y).</p>
                            <p class="mt-4" data-i18n="aralin3_p4"><b>Regression Analysis</b> uses the best-fit line (Y' = <b>b</b>X + <b>a</b>) to describe the relationship. The <b>slope</b> (<b>b</b>) indicates the rate of change in <b>Y</b> for every unit change in <b>X</b>, and the <b>Y-intercept</b> (<b>a</b>) is the value of <b>Y</b> when <b>X</b> is zero.</p>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6" data-i18n="quiz_subtitle">Test your knowledge on key concepts from Statistics and Probability.</p>

                    <form id="economics-quiz-form" class="space-y-6 flex flex-col items-center">

                        <div class="space-y-4 p-4 border rounded-lg bg-white w-full">
                            <p class="font-semibold text-xl text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Random Variables and Distributions</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. The number of defective items produced is an example of what kind of random variable?</label>
                                    <input type="text" id="qa1" class="quiz-input w-full" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (Discrete or Continuous)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. What numerical value must the sum of all probabilities in a discrete distribution equal?</label>
                                    <input type="text" id="qa2" class="quiz-input w-full" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (e.g., 0, 1, 10)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white w-full">
                            <p class="font-semibold text-xl text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Sampling and Hypothesis Testing</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. What is the mean (M) of the Standard Normal Distribution?</label>
                                    <input type="text" id="qa3" class="quiz-input w-full" data-i18n-placeholder="qa3_placeholder" placeholder="Answer">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. What theorem guarantees that the distribution of sample means approaches normal for large <b>n</b>?</label>
                                    <input type="text" id="qa4" class="quiz-input w-full" data-i18n-placeholder="qa4_placeholder" placeholder="Answer (e.g., Limit Theorem)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">5. What type of error is committed when you reject a true null hypothesis?</label>
                                    <input type="text" id="qa5" class="quiz-input w-full" data-i18n-placeholder="qa5_placeholder" placeholder="Answer (e.g., Type I)">
                                
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg text-lg w-[70%]" data-i18n="quiz_button">
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
                outline_aralin1: "Lesson 1: Random Variables & Distributions",
                outline_aralin2: "Lesson 2: Normal Curve and Sampling",
                outline_aralin3: "Lesson 3: Hypothesis Testing & Regression",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Senior High Learning Module Sheet",
                h1_title: "Statistics and Probability",
                h1_subtitle: "Analyzing chance and data to make informed decisions.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Illustrate a <b>Random Variable</b> and distinguish between <b>Discrete</b> and <b>Continuous</b> variables.",
                obj_2: "Calculate the <b>Mean (M), Variance (SD²), and Standard Deviation (SD)</b> of a discrete random variable.",
                obj_3: "Illustrate the properties of the <b>Normal Curve</b> and convert raw scores to <b>Z-scores</b>.",
                obj_4: "Understand the <b>Central Limit Theorem</b> and construct a <b>Confidence Interval</b> for the population mean.",
                obj_5: "Formulate <b>Null and Alternative Hypotheses</b> and solve problems involving Hypothesis Testing.",
                obj_6: "Identify <b>Bivariate Data</b> and perform basic <b>Regression Analysis</b> (slope and y-intercept).",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Random Variables and Probability Distributions",
                aralin1_h3_1: "Random Variables (R.V.)",
                aralin1_p1: "A <b>Random Variable (R.V.)</b> is a function that assigns a real number to each outcome in a sample space. It is a variable whose values are determined by chance. Capital letters like <b>X</b> or <b>Y</b> are used to represent an R.V.",
                aralin1_h3_2: "Discrete vs. Continuous R.V.",
                aralin1_l2_1: "<b>Discrete R.V.</b>: Has a finite or countable number of possible outcomes (e.g., the number of tails when tossing three coins, or the number of defective computers). It is typically 'count data'.",
                aralin1_l2_2: "<b>Continuous R.V.</b>: Takes on any value on a continuous scale (e.g., the height of a person, the temperature of a room, or the amount of sugar in coffee). It is typically 'measured data'.",
                aralin1_h3_3: "Discrete Probability Distribution",
                aralin1_p3: "A <b>Discrete Probability Distribution</b> lists the values an R.V. can assume and their corresponding probabilities. It must satisfy two properties:",
                aralin1_l3_1: "The probability of each value must be between or equal to 0 and 1 (0 &le; P(X) &le; 1).",
                aralin1_l3_2: "The sum of all probabilities must be equal to 1 (Sum of P(X) = 1).",
                aralin1_h3_4: "Mean and Variance",
                aralin1_p4: "The <b>Mean (M)</b> describes the average outcome, while the <b>Variance (SD²)</b> and <b>Standard Deviation (SD)</b> describe the spread or variability of the distribution. The mean is calculated as: M = Sum of [<b>X</b> &bullet; P(<b>X</b>)].",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Normal Curve and Sampling",
                aralin2_h3_1: "The Normal Probability Distribution",
                aralin2_p1: "The <b>Normal Curve</b> is bell-shaped and symmetrical about its center. Its mean (M), median, and mode coincide at the center. The total area under the curve is 1, representing <b>100%</b> probability.",
                aralin2_p2: "The <b>Standard Normal Curve</b> has a mean of 0 (M=0) and a standard deviation of 1 (SD=1).",
                aralin2_h3_2: "Z-Score (Standard Score)",
                aralin2_p3: "The <b>Z-score</b> standardizes a raw measurement <b>X</b> by calculating how many standard deviations it is from the mean. This allows us to use the standard normal table to find probabilities/areas.",
                aralin2_formula_z: "Formula: <b>Z = (X - M) / SD</b>",
                aralin2_h3_3: "Sampling and the Central Limit Theorem",
                aralin2_p4: "The <b>Central Limit Theorem (CLT)</b> states that for large sample sizes (<b>n</b> &ge; 30), the sampling distribution of the sample means (<b>Sample M</b>) approaches a normal distribution, regardless of the shape of the original population distribution. This is fundamental for <b>Confidence Interval</b> estimation.",
                aralin2_p5: "A <b>Confidence Interval (CI)</b> is a range of values used to estimate a population parameter, such as the population mean (M).",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Hypothesis Testing and Regression",
                aralin3_h3_1: "Hypothesis Testing Basics",
                aralin3_p1: "<b>Hypothesis Testing</b> is a process for deciding between two opposing statements about a population parameter:",
                aralin3_l1_1: "<b>Null Hypothesis (H0)</b>: A statement that claims \"no difference\" or \"no change\" from the status quo (e.g., <b>H0</b>: <b>M = 50</b>).",
                aralin3_l1_2: "<b>Alternative Hypothesis (H1)</b>: A statement that contradicts <b>H0</b> and claims a difference (e.g., <b>H1</b>: <b>M &ne; 50</b> or <b>H1</b>: <b>M &lt; 50</b>).",
                aralin3_h3_2: "Types of Errors",
                aralin3_p2: "In decision-making, two types of errors can occur:",
                aralin3_l2_1: "<b>Type I Error</b>: Rejecting the Null Hypothesis (<b>H0</b>) when it is actually true. The probability is &alpha; (level of significance).",
                aralin3_l2_2: "<b>Type II Error</b>: Failing to reject (<b>H0</b>) when it is actually false. The probability is &beta;.",
                aralin3_h3_3: "Correlation and Regression",
                aralin3_p3: "<b>Bivariate Data</b> involves two variables, typically categorized as <b>Independent Variable</b> (X) and <b>Dependent Variable</b> (Y).",
                aralin3_p4: "<b>Regression Analysis</b> uses the best-fit line (Y' = <b>b</b>X + <b>a</b>) to describe the relationship. The <b>slope</b> (<b>b</b>) indicates the rate of change in <b>Y</b> for every unit change in <b>X</b>, and the <b>Y-intercept</b> (<b>a</b>) is the value of <b>Y</b> when <b>X</b> is zero.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Test your knowledge on key concepts from Statistics and Probability.",
                quiz_section1_title: "A. Random Variables and Distributions",
                qa1_label: "1. The number of defective items produced is an example of what kind of random variable?",
                qa1_placeholder: "Answer (Discrete or Continuous)",
                qa2_label: "2. What numerical value must the sum of all probabilities in a discrete distribution equal?",
                qa2_placeholder: "Answer (e.g., 0, 1, 10)",
                quiz_section2_title: "B. Sampling and Hypothesis Testing",
                qa3_label: "3. What is the mean (M) of the Standard Normal Distribution?",
                qa3_placeholder: "Answer",
                qa4_label: "4. What theorem guarantees that the distribution of sample means approaches normal for large <b>n</b>?",
                qa4_placeholder: "Answer (e.g., Limit Theorem)",
                qa5_label: "5. What type of error is committed when you reject a true null hypothesis?",
                qa5_placeholder: "Answer (e.g., Type I)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Statistics and Probability!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review the Normal Curve and Hypothesis Errors.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the entire module.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Random Variables at Distributions",
                outline_aralin2: "Aralin 2: Normal Curve at Sampling",
                outline_aralin3: "Aralin 3: Hypothesis Testing at Regression",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Senior High Learning Module Sheet",
                h1_title: "Istatistika at Probabilidad",
                h1_subtitle: "Pagsusuri ng tsansa at datos para sa matalinong pagdedesisyon.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ilarawan ang <b>Random Variable</b> at tukuyin ang pagkakaiba ng <b>Discrete</b> at <b>Continuous</b> variables.",
                obj_2: "Kalkulahin ang <b>Mean (M), Variance (SD²), at Standard Deviation (SD)</b> ng isang discrete random variable.",
                obj_3: "Ilarawan ang katangian ng <b>Normal Curve</b> at i-convert ang raw scores sa <b>Z-scores</b>.",
                obj_4: "Unawain ang <b>Central Limit Theorem</b> at bumuo ng <b>Confidence Interval</b> para sa population mean.",
                obj_5: "Bumuo ng <b>Null at Alternative Hypotheses</b> at lutasin ang mga problema sa Hypothesis Testing.",
                obj_6: "Tukuyin ang <b>Bivariate Data</b> at gawin ang batayang <b>Regression Analysis</b> (slope at y-intercept).",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Random Variables at Probability Distributions",
                aralin1_h3_1: "Random Variables (R.V.)",
                aralin1_p1: "Ang <b>Random Variable (R.V.)</b> ay isang function na nagtatalaga ng real number sa bawat outcome sa isang sample space. Ito ay variable na ang values ay natutukoy ng tsansa. Ginagamit ang malalaking letra tulad ng <b>X</b> o <b>Y</b> para kumatawan sa R.V.",
                aralin1_h3_2: "Discrete vs. Continuous R.V.",
                aralin1_l2_1: "<b>Discrete R.V.</b>: Mayroon itong limitado o nabibilang na dami ng posibleng outcomes (hal. bilang ng tails sa pagtapon ng tatlong barya, o bilang ng defective computers). Ito ay karaniwang 'count data'.",
                aralin1_l2_2: "<b>Continuous R.V.</b>: Kumukuha ng anumang value sa isang continuous scale (hal. taas ng tao, temperatura ng silid, o dami ng asukal sa kape). Ito ay karaniwang 'measured data'.",
                aralin1_h3_3: "Discrete Probability Distribution",
                aralin1_p3: "Ang <b>Discrete Probability Distribution</b> ay naglilista ng mga value na maaaring makuha ng R.V. at ang kaukulang probabilities nito. Dapat nitong sundin ang dalawang katangian:",
                aralin1_l3_1: "Ang probability ng bawat value ay dapat nasa pagitan o katumbas ng 0 at 1 (0 &le; P(X) &le; 1).",
                aralin1_l3_2: "Ang kabuuan ng lahat ng probabilities ay dapat katumbas ng 1 (Kabuuan ng P(X) = 1).",
                aralin1_h3_4: "Mean and Variance",
                aralin1_p4: "Ang <b>Mean (M)</b> ay naglalarawan ng average na outcome, habang ang <b>Variance (SD²)</b> at <b>Standard Deviation (SD)</b> ay naglalarawan ng pagkalat o variability ng distribution. Ang mean ay kinalkula bilang: M = Kabuuan ng [<b>X</b> &bullet; P(<b>X</b>)].",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Normal Curve at Sampling",
                aralin2_h3_1: "Ang Normal Probability Distribution",
                aralin2_p1: "Ang <b>Normal Curve</b> ay may hugis kampana (bell-shaped) at simetrikal sa gitna nito. Ang mean (M), median, at mode nito ay nagtatagpo sa gitna. Ang kabuuang area sa ilalim ng curve ay 1, na kumakatawan sa <b>100%</b> probability.",
                aralin2_p2: "Ang <b>Standard Normal Curve</b> ay may mean na 0 (M=0) at standard deviation na 1 (SD=1).",
                aralin2_h3_2: "Z-Score (Standard Score)",
                aralin2_p3: "Ang <b>Z-score</b> ay nag-istandardisa ng raw measurement <b>X</b> sa pamamagitan ng pagkalkula kung ilang standard deviation ito mula sa mean. Ginagamit ito para mahanap ang probabilities/areas gamit ang standard normal table.",
                aralin2_formula_z: "Formula: <b>Z = (X - M) / SD</b>",
                aralin2_h3_3: "Sampling at ang Central Limit Theorem",
                aralin2_p4: "Sinasabi ng <b>Central Limit Theorem (CLT)</b> na para sa malalaking sample size (<b>n</b> &ge; 30), ang sampling distribution ng sample means (<b>Sample M</b>) ay lumalapit sa normal distribution, anuman ang hugis ng orihinal na population distribution. Ito ay mahalaga para sa <b>Confidence Interval</b> estimation.",
                aralin2_p5: "Ang <b>Confidence Interval (CI)</b> ay isang range ng values na ginagamit upang i-estimate ang population parameter, tulad ng population mean (M).",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Hypothesis Testing at Regression",
                aralin3_h3_1: "Mga Batayan ng Hypothesis Testing",
                aralin3_p1: "Ang <b>Hypothesis Testing</b> ay isang proseso para magdesisyon sa pagitan ng dalawang magkasalungat na pahayag tungkol sa population parameter:",
                aralin3_l1_1: "<b>Null Hypothesis (H0)</b>: Isang pahayag na nagsasabing \"walang pagkakaiba\" o \"walang pagbabago\" mula sa status quo (e.g., <b>H0</b>: <b>M = 50</b>).",
                aralin3_l1_2: "<b>Alternative Hypothesis (H1)</b>: Isang pahayag na sumasalungat sa <b>H0</b> at nagsasabing may pagkakaiba (e.g., <b>H1</b>: <b>M &ne; 50</b> o <b>H1</b>: <b>M &lt; 50</b>).",
                aralin3_h3_2: "Mga Uri ng Error",
                aralin3_p2: "Sa paggawa ng desisyon, dalawang uri ng error ang maaaring maganap:",
                aralin3_l2_1: "<b>Type I Error</b>: Pagtanggi sa Null Hypothesis (<b>H0</b>) kahit na ito ay totoo. Ang probability ay &alpha; (level of significance).",
                aralin3_l2_2: "<b>Type II Error</b>: Hindi pagtanggi sa (<b>H0</b>) kahit na ito ay mali. Ang probability ay &beta;.",
                aralin3_h3_3: "Correlation at Regression",
                aralin3_p3: "Ang <b>Bivariate Data</b> ay may dalawang variables, na karaniwang ikinakategorya bilang <b>Independent Variable</b> (X) at <b>Dependent Variable</b> (Y).",
                aralin3_p4: "Ginagamit ng <b>Regression Analysis</b> ang best-fit line (Y' = <b>b</b>X + <b>a</b>) para ilarawan ang relasyon. Ang <b>slope</b> (<b>b</b>) ay nagpapakita ng rate ng pagbabago sa <b>Y</b> para sa bawat unit ng pagbabago sa **X**, at ang <b>Y-intercept</b> (<b>a</b>) ay ang value ng <b>Y</b> kapag ang **X** ay zero.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Subukin ang iyong kaalaman sa mga pangunahing konsepto sa Istatistika at Probabilidad.",
                quiz_section1_title: "A. Random Variables at Distributions",
                qa1_label: "1. Ang bilang ng defective items na na-produce ay isang halimbawa ng anong uri ng random variable?",
                qa1_placeholder: "Sagot (Discrete o Continuous)",
                qa2_label: "2. Anong numerical value dapat ang kabuuan ng lahat ng probabilities sa isang discrete distribution?",
                qa2_placeholder: "Sagot (hal. 0, 1, 10)",
                quiz_section2_title: "B. Sampling at Hypothesis Testing",
                qa3_label: "3. Ano ang mean (M) ng Standard Normal Distribution?",
                qa3_placeholder: "Sagot",
                qa4_label: "4. Anong theorem ang naggarantiya na ang distribution ng sample means ay lumalapit sa normal para sa malaking <b>n</b>?",
                qa4_placeholder: "Sagot (hal. Limit Theorem)",
                qa5_label: "5. Anong uri ng error ang nagagawa kapag tinanggihan mo ang isang totoong null hypothesis?",
                qa5_placeholder: "Sagot (hal. Type I)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Statistics and Probability!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review the Normal Curve and Hypothesis Errors.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the entire module.`,
            }
        };

        let currentLang = 'en'; // DEFAULT LANGUAGE IS ENGLISH

        // --- UTILITY FUNCTIONS ---
        
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
                // If results are visible, run submitQuiz(true) to update the score message
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

        // --- SCROLL TRACKING LOGIC FOR OUTLINE ---
        const sections = ['objectives', 'aralin1', 'aralin2', 'aralin3', 'pagsasanay'];
        const outlineLinks = sections.map(id => document.querySelector(`#outline a[href="#${id}"]`));
        const sectionElements = sections.map(id => document.getElementById(id));

        function highlightOutlineLink() {
            let activeLink = null;
            
            // Iterate backwards to prioritize sections closer to the top of the viewport
            for (let i = sectionElements.length - 1; i >= 0; i--) {
                if (!sectionElements[i]) continue;
                const rect = sectionElements[i].getBoundingClientRect();
                // Highlight when section hits 100px from top
                if (rect.top <= 100) { 
                    activeLink = outlineLinks[i]; 
                    break;
                }
            }
            // Default to the first link if we are at the very top of the page
            if (!activeLink && window.scrollY < 100 && outlineLinks.length > 0) { 
                activeLink = outlineLinks[0]; 
            }

            outlineLinks.forEach(link => { if (link) link.classList.remove('active'); });
            if (activeLink) { activeLink.classList.add('active'); }
        }

        window.addEventListener('scroll', highlightOutlineLink);
        document.addEventListener('DOMContentLoaded', highlightOutlineLink);


        // Function to clean and normalize text input (for non-numeric answers)
        function normalizeText(input) {
            if (typeof input !== 'string') return '';
            // Lowercase and remove spaces/non-essential punctuation/diacritics/symbols, keep only letters a-z
            return input.toLowerCase().replace(/[^a-z0-9]/g, ''); 
        }

        // Function to check answer, handling specific needs (text)
        function checkAnswer(id, expected_keywords) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            let isCorrect = false;

            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            // Normalize the raw input text
            const normalizedInput = normalizeText(rawValue);
            
            // Expected keywords are arrays of acceptable normalized strings (e.g., ['scarcity', 'kakulangan'])
            isCorrect = expected_keywords.some(keyword => normalizedInput.includes(keyword));

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
            const resultsDiv = document.getElementById('results');
            let correctCount = 0;
            const totalQuestions = 5; 

            // Expected Answers (Keywords must be fully lowercase, no spaces/punctuation)
            const answers = {
                qa1: ['discrete', 'count', 'countable', 'discrete', 'nabibilang'], // 1. Defective items
                qa2: ['1', 'one', 'uno', 'isa'],                                  // 2. Sum of probabilities
                qa3: ['0', 'zero', 'sero'],                                       // 3. Mean of Standard Normal
                qa4: ['central', 'limit', 'theorem', 'clt'],                      // 4. Sampling theorem
                qa5: ['typei', 'type1', 'type1error', 'typeierror'],              // 5. Rejecting true H0
            };

            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1', answers.qa1); 
                correctCount += checkAnswer('qa2', answers.qa2); 
                correctCount += checkAnswer('qa3', answers.qa3); 
                correctCount += checkAnswer('qa4', answers.qa4); 
                correctCount += checkAnswer('qa5', answers.qa5); 
                
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
            } else if (correctCount >= totalQuestions * 0.6) {
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


        document.getElementById('economics-quiz-form').addEventListener('submit', function(e) {
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
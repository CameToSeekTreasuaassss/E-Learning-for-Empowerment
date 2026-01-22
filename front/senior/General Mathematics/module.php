<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Updated title to use data-i18n -->
    <title data-i18n="h1_title">General Mathematics</title>
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
        #general-math-quiz-form label,
        .content-box .module-table td,
        .content-box .math-formula { /* Added math-formula here for consistency */
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
        /* Main H2 Title (28px) - Used for 'Anu-ano...' title */
        .content-box h2 { font-size: 1.75rem; color: #10b981; } /* Green 600 */
        /* Regular H3 (24px) */
        .content-box h3 { font-size: 1.5rem; color: #1f2937; } /* 24px */
        
        /* Main H1 Title (50px) */
        .main-title-h1 {
            font-size: 50px; /* 50px */
            line-height: 1.1;
        }

        .content-box .example-box {
            /* Styled to look like a callout box - Reverted to light green encasing */
            background-color: #ecfdf5; /* Light Green 50 equivalent */ 
            border-left: 4px solid #34d399; /* Green accent border */
            padding: 1rem;
            margin-top: 0; /* Adjusted margin to fit new structure */
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
        
        /* STICKY CONTAINER CSS for the whole sidebar */
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
                   class="w-full flex items-center text-base font-semibold text-gray-600 hover:text-green-700 transition duration-150 p-3 rounded-xl hover:bg-green-50 bg-white shadow-md border border-gray-200">
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
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Operations on Functions</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Rational Functions</a>
                        <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Inverse and Exponential Functions</a>
                        <a href="#aralin4" class="outline-link" data-i18n="outline_aralin4">Lesson 4: Logarithmic Functions</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">General Mathematics</h1>
                    <p class="mt-4 text-gray-600 italic" data-i18n="h1_subtitle">A study on Functions, Rational, Exponential, and Logarithmic Mathematics.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (All content inside is 20px) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <!-- H2 Title is 28px and black -->
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Content paragraph and list items are now 20px -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Describe <b>Functions</b> and perform basic operations (addition, subtraction, multiplication, division, composition).</li>
                        <li data-i18n="obj_2">Describe, solve, and graph <b>Rational Functions</b> (including Domain, Range, Intercepts, and Asymptotes).</li>
                        <li data-i18n="obj_3">Describe, solve, and graph <b>Inverse</b> and <b>Exponential Functions</b>.</li>
                        <li data-i18n="obj_4">Describe, solve, and graph <b>Logarithmic Functions</b> (using properties and laws).</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Operations on Functions -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin1_title">Lesson 1: Operations on Functions</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin1_h3_1">Representation and Evaluation</h3>
                            <p data-i18n="aralin1_p1">A <b>Function</b> represents real-life situations. It can be represented as a single function or a <b>Piece-Wise Function</b> (using multiple formulas across different domains).</p>
                            
                            <p class="font-bold mt-4" data-i18n="aralin1_example_label">EXAMPLE (Piece-Wise):</p>
                            <p data-i18n="aralin1_example_desc">Cost of Lemonade: If you buy <b>1-10 glasses</b>, ₱10 per glass. If <b>11 or more</b>, ₱8 per glass.</p>
                            <br>
                            <div class="example-box">
                                <!-- SIMPLIFIED MATH -->
                                <div class="math-formula">
                                    C(x) = { 10x (if 1 &le; x &le; 10); 8x (if x &ge; 11) }
                                </div>
                                <!-- END SIMPLIFIED MATH -->
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin1_h3_2">Operations of Functions</h3>
                            <p data-i18n="aralin1_p2">For two functions, f(x) and g(x), operations are performed as:</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l2_1"><b>Addition</b>: (f + g)(x) = f(x) + g(x)</li>
                                <li data-i18n="aralin1_l2_2"><b>Subtraction</b>: (f - g)(x) = f(x) - g(x)</li>
                                <li data-i18n="aralin1_l2_3"><b>Multiplication</b>: (f . g)(x) = f(x) . g(x)</li>
                                <li data-i18n="aralin1_l2_4"><b>Division</b>: (f / g)(x) = f(x) / g(x) (where g(x) is <b>NOT 0</b>)</li>
                                <li data-i18n="aralin1_l2_5"><b>Composition</b>: (f o g)(x) = f(g(x)) (substitute the entire function g(x) inside f(x)).</li>
                            </ul>
                        </div>
                    </details>

                    <!-- ARALIN 2: Rational Functions -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin2_title">Lesson 2: Rational Functions</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">A <b>Rational Function</b> is in the form of f(x) = p(x) / q(x), where p(x) and q(x) are <b>Polynomials</b>, and q(x) is <b>NOT 0</b>.</p>

                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin2_h3_1">Rational Equations vs. Inequalities</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin2_l1_1"><b>Rational Equation</b>: An equation with a rational expression (e.g., 2/x - 1/2 = 2/3).</li>
                                <li data-i18n="aralin2_l1_2"><b>Rational Inequality</b>: An inequality with a rational expression (e.g., 5/(x+1) < 1).</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin2_h3_2">Domain, Range, Intercepts, and Asymptotes</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin2_l2_1"><b>Domain</b>: All x-values except those that make the denominator (q(x)) equal zero.</li>
                                <li data-i18n="aralin2_l2_2"><b>x-intercept (Zeroes)</b>: Found where the numerator (p(x)) is zero.</li>
                                <li data-i18n="aralin2_l2_3"><b>Vertical Asymptote</b>: A vertical line (x = a) that the graph approaches but never touches. This is found where the denominator (q(x)) is zero.</li>
                                <li data-i18n="aralin2_l2_4"><b>Horizontal Asymptote</b>: A horizontal line (y = b) that determines the end behavior of the graph.</li>
                            </ul>
                        </div>
                    </details>

                    <!-- ARALIN 3: Inverse at Exponential Functions -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin3_title">Lesson 3: Inverse and Exponential Functions</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin3_h3_1">Inverse Functions</h3>
                            <p data-i18n="aralin3_p1">An <b>Inverse Function</b> (f<sup>-1</sup>(x)) only exists if the original function is <b>One-to-One</b>. It is obtained by interchanging x and y and re-solving for y. The Domain of the original function becomes the Range of the Inverse function, and vice-versa.</p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin3_h3_2">Exponential Functions</h3>
                            <p data-i18n="aralin3_p2">An <b>Exponential Function</b> has the form f(x) = b<sup>x</sup> (b>0, b is <b>NOT 1</b>). It is used to model Population Growth, Radioactive Decay, and Investments (Compounded Interest).</p>
                            <br>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_example_label">EXAMPLE (Compound Interest):</p>
                                <!-- SIMPLIFIED MATH -->
                                <div class="math-formula">
                                    A = P(1 + r)<sup>t</sup>
                                </div>
                                <!-- END SIMPLIFIED MATH -->
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin3_h3_3">Exponential Equations and Inequalities</h3>
                            <p data-i18n="aralin3_p3">The <b>One-to-One Property</b> (b<sup>x</sup> = b<sup>y</sup>, so x = y) is used to solve exponential equations and inequalities.</p>
                        </div>
                    </details>

                    <!-- ARALIN 4: Logarithmic Functions -->
                    <details id="aralin4" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin4_title">Lesson 4: Logarithmic Functions</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin4_h3_1">Introduction to Logarithms</h3>
                            <p data-i18n="aralin4_p1">A <b>Logarithm</b> is the inverse of the exponential function. If the exponential form is b<sup>y</sup> = a, the logarithmic form is log<sub>b</sub> a = y.</p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin4_h3_2">Properties and Laws</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin4_l2_1">log<sub>b</sub> 1 = 0</li>
                                <li data-i18n="aralin4_l2_2">log<sub>b</sub> b<sup>x</sup> = x</li>
                                <li data-i18n="aralin4_l2_3"><b>Product Law</b>: log(uv) = log u + log v</li>
                            </ul>
                            <p data-i18n="aralin4_p2">These are used to solve <b>Logarithmic Equations</b> and <b>Logarithmic Inequalities</b>.</p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin4_h3_3">Logarithmic Graphing</h3>
                            <p data-i18n="aralin4_p3">The graph of a logarithmic function has a <b>Vertical Asymptote</b> and always intersects the x-axis at (1, 0).</p>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6" data-i18n="quiz_subtitle">Solve the following problems using the formulas in each lesson.</p>

                    <form id="general-math-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-xl text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Functions and Inverse (Lessons 1 & 3)</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. If f(x) = 2x + 1 and g(x) = x - 3, find (f o g)(x).</label>
                                    <input type="text" id="qa1" class="quiz-input w-full" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (e.g., 2x-5)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. Find the Inverse of f(x) = 5x - 2.</label>
                                    <input type="text" id="qa2" class="quiz-input w-full" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (e.g., (x+2)/5)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-xl text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Rational and Exponential (Lessons 2 & 3)</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. What is the Vertical Asymptote of f(x) = 1 / (x-5)?</label>
                                    <input type="text" id="qa3" class="quiz-input w-full" data-i18n-placeholder="qa3_placeholder" placeholder="Answer (e.g., x=5)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. Solve: 4<sup>2x</sup> = 64.</label>
                                    <input type="text" id="qa4" class="quiz-input w-full" data-i18n-placeholder="qa4_placeholder" placeholder="x = ?">
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-xl text-gray-800 border-b pb-2" data-i18n="quiz_section3_title">C. Logarithms and Other Topics (Lessons 4 & 1)</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">5. Write 10<sup>3</sup> = 1000 in Logarithmic Form.</label>
                                    <input type="text" id="qa5" class="quiz-input w-full" data-i18n-placeholder="qa5_placeholder" placeholder="Answer (e.g., log_10 1000 = 3)">
                                </div>

                                <!-- NEW QUESTION 6 (Aralin 2: HA) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa6" class="font-medium" data-i18n="qa6_label">6. What is the Horizontal Asymptote of f(x) = 3x<sup>2</sup> / (x<sup>2</sup>+1)?</label>
                                    <input type="text" id="qa6" class="quiz-input w-full" data-i18n-placeholder="qa6_placeholder" placeholder="Answer (e.g., y=3)">
                                </div>
                                
                                <!-- NEW QUESTION 7 (Aralin 1: Subtraction) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa7" class="font-medium" data-i18n="qa7_label">7. If f(x) = 3x and g(x) = x-5, find (f - g)(x).</label>
                                    <input type="text" id="qa7" class="quiz-input w-full" data-i18n-placeholder="qa7_placeholder" placeholder="Answer (e.g., 2x+5)">
                                </div>

                                <!-- NEW QUESTION 8 (Aralin 4: Log to Exp) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa8" class="font-medium" data-i18n="qa8_label">8. Write log<sub>2</sub> 16 = 4 in Exponential Form.</label>
                                    <input type="text" id="qa8" class="quiz-input w-full" data-i18n-placeholder="qa8_placeholder" placeholder="Answer (e.g., 2^4=16)">
                                </div>
                            </div>
                        </div>

                        <!-- Button container: Use flex and justify-center to center the button -->
                        <div class="flex justify-center w-full"> 
                            <button type="submit" class="accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg text-lg w-[70%]" data-i18n="quiz_button">
                                Check Answers
                            </button>
                        </div>
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
                outline_aralin1: "Lesson 1: Operations on Functions",
                outline_aralin2: "Lesson 2: Rational Functions",
                outline_aralin3: "Lesson 3: Inverse and Exponential Functions",
                outline_aralin4: "Lesson 4: Logarithmic Functions",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Senior High Learning Module Sheet",
                h1_title: "General Mathematics",
                h1_subtitle: "A study on Functions, Rational, Exponential, and Logarithmic Mathematics.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Describe <b>Functions</b> and perform basic operations (addition, subtraction, multiplication, division, composition).",
                obj_2: "Describe, solve, and graph <b>Rational Functions</b> (including Domain, Range, Intercepts, and Asymptotes).",
                obj_3: "Describe, solve, and graph <b>Inverse</b> and <b>Exponential Functions</b>.",
                obj_4: "Describe, solve, and graph <b>Logarithmic Functions</b> (using properties and laws).",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Operations on Functions",
                aralin1_h3_1: "Representation and Evaluation",
                aralin1_p1: "A <b>Function</b> represents real-life situations. It can be represented as a single function or a <b>Piece-Wise Function</b> (using multiple formulas across different domains).",
                aralin1_example_label: "EXAMPLE (Piece-Wise):",
                aralin1_example_desc: "Cost of Lemonade: If you buy <b>1-10 glasses</b>, ₱10 per glass. If <b>11 or more</b>, ₱8 per glass.",
                aralin1_h3_2: "Operations of Functions",
                aralin1_p2: "For two functions, f(x) and g(x), operations are performed as:",
                aralin1_l2_1: "<b>Addition</b>: (f + g)(x) = f(x) + g(x)",
                aralin1_l2_2: "<b>Subtraction</b>: (f - g)(x) = f(x) - g(x)",
                aralin1_l2_3: "<b>Multiplication</b>: (f . g)(x) = f(x) . g(x)",
                aralin1_l2_4: "<b>Division</b>: (f / g)(x) = f(x) / g(x) (where g(x) is <b>NOT 0</b>)",
                aralin1_l2_5: "<b>Composition</b>: (f o g)(x) = f(g(x)) (substitute the entire function g(x) inside f(x)).",


                // Lesson 2 Content
                aralin2_title: "Lesson 2: Rational Functions",
                aralin2_h3_1: "Rational Equations vs. Inequalities",
                aralin2_p1: "A <b>Rational Function</b> is in the form of f(x) = p(x) / q(x), where p(x) and q(x) are <b>Polynomials</b>, and q(x) is <b>NOT 0</b>.",
                aralin2_l1_1: "<b>Rational Equation</b>: An equation with a rational expression (e.g., 2/x - 1/2 = 2/3).",
                aralin2_l1_2: "<b>Rational Inequality</b>: An inequality with a rational expression (e.g., 5/(x+1) < 1).",
                aralin2_h3_2: "Domain, Range, Intercepts, and Asymptotes",
                aralin2_l2_1: "<b>Domain</b>: All x-values except those that make the denominator (q(x)) equal zero.",
                aralin2_l2_2: "<b>x-intercept (Zeroes)</b>: Found where the numerator (p(x)) is zero.",
                aralin2_l2_3: "<b>Vertical Asymptote</b>: A vertical line (x = a) that the graph approaches but never touches. This is found where the denominator (q(x)) is zero.",
                aralin2_l2_4: "<b>Horizontal Asymptote</b>: A horizontal line (y = b) that determines the end behavior of the graph.",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Inverse and Exponential Functions",
                aralin3_h3_1: "Inverse Functions",
                aralin3_p1: "An <b>Inverse Function</b> (f<sup>-1</sup>(x)) only exists if the original function is <b>One-to-One</b>. It is obtained by interchanging x and y and re-solving for y. The Domain of the original function becomes the Range of the Inverse function, and vice-versa.",
                aralin3_h3_2: "Exponential Functions",
                aralin3_p2: "An <b>Exponential Function</b> has the form f(x) = b<sup>x</sup> (b>0, b is <b>NOT 1</b>). It is used to model Population Growth, Radioactive Decay, and Investments (Compounded Interest).",
                aralin3_example_label: "EXAMPLE (Compound Interest):",
                aralin3_h3_3: "Exponential Equations and Inequalities",
                aralin3_p3: "The <b>One-to-One Property</b> (b<sup>x</sup> = b<sup>y</sup>, so x = y) is used to solve exponential equations and inequalities.",


                // Lesson 4 Content
                aralin4_title: "Lesson 4: Logarithmic Functions",
                aralin4_h3_1: "Introduction to Logarithms",
                aralin4_p1: "A <b>Logarithm</b> is the inverse of the exponential function. If the exponential form is b<sup>y</sup> = a, the logarithmic form is log<sub>b</sub> a = y.",
                aralin4_h3_2: "Properties and Laws",
                aralin4_l2_1: "log<sub>b</sub> 1 = 0",
                aralin4_l2_2: "log<sub>b</sub> b<sup>x</sup> = x",
                aralin4_l2_3: "<b>Product Law</b>: log(uv) = log u + log v",
                aralin4_p2: "These are used to solve <b>Logarithmic Equations</b> and <b>Logarithmic Inequalities</b>.",
                aralin4_h3_3: "Logarithmic Graphing",
                aralin4_p3: "The graph of a logarithmic function has a <b>Vertical Asymptote</b> and always intersects the x-axis at (1, 0).",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Solve the following problems using the formulas in each lesson.",
                quiz_section1_title: "A. Functions and Inverse (Lessons 1 & 3)",
                qa1_label: "1. If f(x) = 2x + 1 and g(x) = x - 3, find (f o g)(x).",
                qa1_placeholder: "Answer (e.g., 2x-5)",
                qa2_label: "2. Find the Inverse of f(x) = 5x - 2.",
                qa2_placeholder: "Answer (e.g., (x+2)/5)",
                quiz_section2_title: "B. Rational and Exponential (Lessons 2 & 3)",
                qa3_label: "3. What is the Vertical Asymptote of f(x) = 1 / (x-5)?",
                qa3_placeholder: "Answer (e.g., x=5)",
                qa4_label: "4. Solve: 4<sup>2x</sup> = 64.",
                qa4_placeholder: "x = ?",
                quiz_section3_title: "C. Logarithms and Other Topics (Lessons 4 & 1)",
                qa5_label: "5. Write 10<sup>3</sup> = 1000 in Logarithmic Form.",
                qa5_placeholder: "Answer (e.g., log_10 1000 = 3)",
                qa6_label: "6. What is the Horizontal Asymptote of f(x) = 3x<sup>2</sup> / (x<sup>2</sup>+1)?",
                qa6_placeholder: "Answer (e.g., y=3)",
                qa7_label: "7. If f(x) = 3x and g(x) = x-5, find (f - g)(x).",
                qa7_placeholder: "Answer (e.g., 2x+5)",
                qa8_label: "8. Write log<sub>2</sub> 16 = 4 in Exponential Form.",
                qa8_placeholder: "Answer (e.g., 2^4=16)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered General Mathematics!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review Logarithms and Asymptotes.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the entire module.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Operations on Functions",
                outline_aralin2: "Aralin 2: Rational Functions",
                outline_aralin3: "Aralin 3: Inverse at Exponential Functions",
                outline_aralin4: "Aralin 4: Logarithmic Functions",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Senior High Learning Module Sheet",
                h1_title: "General Mathematics",
                h1_subtitle: "Pag-aaral sa Functions, Rational, Exponential, at Logarithmic Mathematics.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ilarawan ang <b>Functions</b> at mag-perform ng basic operations (addition, subtraction, multiplication, division, composition).",
                obj_2: "Ilarawan, i-solve, at i-graph ang <b>Rational Functions</b> (kasama ang Domain, Range, Intercepts, at Asymptotes).",
                obj_3: "Ilarawan, i-solve, at i-graph ang <b>Inverse</b> at <b>Exponential Functions</b>.",
                obj_4: "Ilarawan, i-solve, at i-graph ang <b>Logarithmic Functions</b> (gamit ang properties at laws).",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Operations on Functions",
                aralin1_h3_1: "Representasyon at Pag-evaluate",
                aralin1_p1: "Ang <b>Function</b> ay nagre-representa ng real-life situations. Maaari itong i-represent bilang single function o <b>Piece-Wise Function</b> (gamit ang maraming formula sa iba't ibang domain).",
                aralin1_example_label: "HALIMBAWA (Piece-Wise):",
                aralin1_example_desc: "Cost ng Lemonade: Kung bibili ng <b>1-10 baso</b>, ₱10 bawat baso. Kung <b>11 pataas</b>, ₱8 bawat baso.",
                aralin1_h3_2: "Operations ng Functions",
                aralin1_p2: "Para sa dalawang function, f(x) at g(x), ang operations ay ginagawa sa pamamagitan ng:",
                aralin1_l2_1: "<b>Addition</b>: (f + g)(x) = f(x) + g(x)",
                aralin1_l2_2: "<b>Subtraction</b>: (f - g)(x) = f(x) - g(x)",
                aralin1_l2_3: "<b>Multiplication</b>: (f . g)(x) = f(x) . g(x)",
                aralin1_l2_4: "<b>Division</b>: (f / g)(x) = f(x) / g(x) (where g(x) is <b>HINDI 0</b>)",
                aralin1_l2_5: "<b>Composition</b>: (f o g)(x) = f(g(x)) (i-substitute ang buong function g(x) sa loob ng f(x)).",


                // Lesson 2 Content
                aralin2_title: "Aralin 2: Rational Functions",
                aralin2_h3_1: "Rational Equations vs. Inequalities",
                aralin2_p1: "Ang <b>Rational Function</b> ay nasa form na f(x) = p(x) / q(x), kung saan ang p(x) at q(x) ay <b>Polynomials</b>, at q(x) is <b>HINDI 0</b>.",
                aralin2_l1_1: "<b>Rational Equation</b>: Equation na may rational expression (e.g., 2/x - 1/2 = 2/3).",
                aralin2_l1_2: "<b>Rational Inequality</b>: Inequality na may rational expression (e.g., 5/(x+1) < 1).",
                aralin2_h3_2: "Domain, Range, Intercepts, at Asymptotes",
                aralin2_l2_1: "<b>Domain</b>: Lahat ng x-values maliban sa ginagawang zero ang denominator (q(x)).",
                aralin2_l2_2: "<b>x-intercept (Zeroes)</b>: Kinukuha kung saan ang numerator (p(x)) ay zero.",
                aralin2_l2_3: "<b>Vertical Asymptote</b>: Vertical line (x = a) kung saan ang graph ay lalapit ngunit hindi hahawak. Ito ay nakukuha kung saan ang denominator (q(x)) ay zero.",
                aralin2_l2_4: "<b>Horizontal Asymptote</b>: Horizontal line (y = b) na nagde-determine ng end behavior ng graph.",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Inverse at Exponential Functions",
                aralin3_h3_1: "Inverse Functions",
                aralin3_p1: "Ang <b>Inverse Function</b> (f<sup>-1</sup>(x)) ay umiiral lamang kung ang original function ay <b>One-to-One</b>. Nakukuha ito sa pamamagitan ng pag-interchange ng x at y at pag-solve ulit para sa y. Ang Domain ng original function ay nagiging Range ng Inverse function, at vice-versa.",
                aralin3_h3_2: "Exponential Functions",
                aralin3_p2: "Ang <b>Exponential Function</b> ay may form na f(x) = b<sup>x</sup> (b>0, b is <b>HINDI 1</b>). Ginagamit ito sa pag-model ng Population Growth, Radioactive Decay, at Investments (Compounded Interest).",
                aralin3_example_label: "HALIMBAWA (Compound Interest):",
                aralin3_h3_3: "Exponential Equations at Inequalities",
                aralin3_p3: "Ginagamit ang <b>One-to-One Property</b> (b<sup>x</sup> = b<sup>y</sup>, kaya x = y) para mag-solve ng exponential equations at inequalities.",


                // Lesson 4 Content
                aralin4_title: "Aralin 4: Logarithmic Functions",
                aralin4_h3_1: "Introduction to Logarithms",
                aralin4_p1: "Ang <b>Logarithm</b> ay ang inverse ng exponential function. Kung ang exponential form ay b<sup>y</sup> = a, ang logarithmic form is log<sub>b</sub> a = y.",
                aralin4_h3_2: "Properties at Laws",
                aralin4_l2_1: "log<sub>b</sub> 1 = 0",
                aralin4_l2_2: "log<sub>b</sub> b<sup>x</sup> = x",
                aralin4_l2_3: "<b>Product Law</b>: log(uv) = log u + log v",
                aralin4_p2: "Ginagamit ang mga ito para i-solve ang <b>Logarithmic Equations</b> at <b>Logarithmic Inequalities</b>.",
                aralin4_h3_3: "Logarithmic Graphing",
                aralin4_p3: "Ang graph ng logarithmic function ay may <b>Vertical Asymptote</b> at palaging nagta-touch sa x-axis at (1, 0).",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Lutasin ang mga sumusunod. Gamitin ang formula sa bawat aralin.",
                quiz_section1_title: "A. Functions and Inverse (Aralin 1 & 3)",
                qa1_label: "1. Kung f(x) = 2x + 1 at g(x) = x - 3, hanapin ang (f o g)(x).",
                qa1_placeholder: "Sagot (e.g., 2x-5)",
                qa2_label: "2. Hanapin ang Inverse ng f(x) = 5x - 2.",
                qa2_placeholder: "Sagot (e.g., (x+2)/5)",
                quiz_section2_title: "B. Rational at Exponential (Aralin 2 & 3)",
                qa3_label: "3. Ano ang Vertical Asymptote ng f(x) = 1 / (x-5)?",
                qa3_placeholder: "Sagot (e.g., x=5)",
                qa4_label: "4. Solve: 4<sup>2x</sup> = 64.",
                qa4_placeholder: "x = ?",
                quiz_section3_title: "C. Logarithms and Other Topics (Aralin 4 & 1)",
                qa5_label: "5. Isulat ang 10<sup>3</sup> = 1000 sa Logarithmic Form.",
                qa5_placeholder: "Sagot (e.g., log_10 1000 = 3)",
                qa6_label: "6. Ano ang Horizontal Asymptote ng f(x) = 3x<sup>2</sup> / (x<sup>2</sup>+1)?",
                qa6_placeholder: "Sagot (e.g., y=3)",
                qa7_label: "7. Kung f(x) = 3x at g(x) = x-5, hanapin ang (f - g)(x).",
                qa7_placeholder: "Sagot (e.g., 2x+5)",
                qa8_label: "8. Isulat ang log<sub>2</sub> 16 = 4 sa Exponential Form.",
                qa8_placeholder: "Sagot (e.g., 2^4=16)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang General Mathematics!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang Logarithms at Asymptotes.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang buong modyul.`,
            }
        };

        let currentLang = 'en'; // DEFAULT LANGUAGE IS ENGLISH

        // --- UTILITY FUNCTIONS ---
        
        // Function to handle the opening/closing arrow animation
        document.querySelectorAll('details').forEach(detail => {
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
        const sections = ['objectives', 'aralin1', 'aralin2', 'aralin3', 'aralin4', 'pagsasanay'];
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


        // Function to standardize number input (returns float)
        function standardizeFloat(value) {
            if (typeof value !== 'string') return 0;
            // Clean up to keep only numbers, dots, and slashes (for fractions)
            value = value.trim().replace(/[^-0-9./]/g, ''); 
            
            // Handle fractions before final parsing
            if (value.includes('/')) {
                const parts = value.split('/');
                if (parts.length === 2) {
                    const num = parseFloat(parts[0]);
                    const den = parseFloat(parts[1]);
                    if (!isNaN(num) && !isNaN(den) && den !== 0) {
                        return num / den;
                    }
                }
            }
            
            const parsedValue = parseFloat(value);
            return isNaN(parsedValue) ? 0 : parsedValue;
        }

        
        // Function to clean and normalize text input (for non-numeric answers)
        function normalizeText(input) {
            if (typeof input !== 'string') return '';
            // Lowercase and remove spaces/non-essential punctuation/diacritics/symbols, keeping only letters, numbers, equals, and minus signs
            return input.toLowerCase().replace(/[^a-z0-9\-\=]/g, ''); 
        }

        // Function to check symbolic/math answers
        function checkSymbolicAnswer(input, expected_patterns) {
            const normalizedInput = normalizeText(input);
            // Expected patterns can be separated by '|' for OR conditions
            const patterns = expected_patterns.split('|');

            return patterns.some(expected => {
                const normalizedExpected = normalizeText(expected);
                // For composition and subtraction, check for an exact match (or inclusion if simple)
                if (normalizedInput === normalizedExpected) return true;
                
                // For log/exp forms, check if the input contains the core elements of the expected normalized string
                // Example: 'log1000=3' should match 'log101000=3' or 'log1000is3' (if equals is removed)
                // Use includes for flexibility on complex answers (like log/inverse)
                if (normalizedExpected.length > 5 && normalizedInput.includes(normalizedExpected)) return true;
                
                return false;
            });
        }
        
        // Function to check answer, handling specific needs (text/symbolic)
        function checkAnswer(id, expected_sym, expected_num) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            let isCorrect = false;

            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            // 1. Check Symbolic/Text answers
            if (expected_sym && checkSymbolicAnswer(rawValue, expected_sym)) {
                isCorrect = true;
            }

            // 2. Check Numeric answers (used for Q4, exponential solve)
            if (id === 'qa4') {
                const input_num = standardizeFloat(rawValue);
                if (Math.abs(input_num - expected_num) < 0.01) {
                    isCorrect = true;
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
        function submitQuiz(isLanguageToggle = false) {
            const resultsDiv = document.getElementById('results');
            let correctCount = 0;
            const totalQuestions = 8; 

            // Expected Answers (Keywords must be fully lowercase, no spaces/punctuation/symbols except '-' and '=')
            const answers = {
                // 1. Composition: f(g(x)) = 2(x-3) + 1 = 2x - 5
                qa1: { sym: "2x-5" }, 
                // 2. Inverse: y = (x+2)/5. Allow: (x+2)/5 or just x+2/5 (since we strip symbols, the parenthesis distinction is lost)
                qa2: { sym: "x+25|x+2/5" }, 
                // 3. V.A.: x-5 = 0 -> x = 5
                qa3: { sym: "x=5" }, 
                // 4. Exponential: 4^(2x) = 64 -> 2x = 3 -> x = 1.5. Allow 3/2 or 1.5
                qa4: { sym: "3/2", num: 1.5 },
                // 5. Log form: 10³=1000 -> log₁₀ 1000 = 3. Allow: log101000=3 or log1000=3
                qa5: { sym: "log1000=3|log101000=3" }, 
                // 6. Horizontal Asymptote: Ratio of leading coefficients 3/1 = 3
                qa6: { sym: "y=3" },
                // 7. Subtraction: 3x - (x-5) = 2x + 5
                qa7: { sym: "2x+5" },
                // 8. Log to Exp: log₂ 16 = 4 -> 2⁴ = 16. Allow: 2^4=16 or 24=16
                qa8: { sym: "2^4=16|24=16" }
            };

            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1', answers.qa1.sym, answers.qa1.num); 
                correctCount += checkAnswer('qa2', answers.qa2.sym, answers.qa2.num); 
                correctCount += checkAnswer('qa3', answers.qa3.sym, answers.qa3.num); 
                correctCount += checkAnswer('qa4', answers.qa4.sym, answers.qa4.num); 
                correctCount += checkAnswer('qa5', answers.qa5.sym, answers.qa5.num); 
                correctCount += checkAnswer('qa6', answers.qa6.sym, answers.qa6.num); 
                correctCount += checkAnswer('qa7', answers.qa7.sym, answers.qa7.num); 
                correctCount += checkAnswer('qa8', answers.qa8.sym, answers.qa8.num); 
                
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


        document.getElementById('general-math-quiz-form').addEventListener('submit', function(e) {
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
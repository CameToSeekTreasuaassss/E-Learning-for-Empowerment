<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Playing with Missing X's</title>
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
        .math-formula span { white-space: nowrap; display: block; } 

        /* --- Quiz Input Styles (Standardized to 20px) --- */
        .quiz-input { 
            font-size: 1.25rem; /* 20px - Input Text Size */
            border-bottom: 2px solid #a7f3d0; 
            transition: border-color 0.2s; 
            padding: 0.25rem; 
            text-align: center; 
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
        
        /* Table Styles */
        .table-custom {
            border-collapse: collapse;
            border: 2px solid #059669; /* Green 600 */
            border-radius: 0.5rem;
            overflow: hidden;
            margin-bottom: 2rem;
            width: 100%;
        }
        .table-custom th {
            background-color: #059669; 
            color: white;
            padding: 0.75rem;
            font-size: 1.1rem;
            font-weight: 700;
            border: 1px solid #047857;
        }
        .table-custom td {
            padding: 0.75rem;
            border: 1px solid #a7f3d0; 
            text-align: left; 
            font-size: 1.25rem; 
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
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: To Combine or Not to Combine (Polynomials)</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Let's Distribute and Share (Multiplication/Division)</a>
                        <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Fractions of Your X (Rational Expressions)</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Playing with Missing X's</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Analyzing Polynomials and Rational Algebraic Expressions (Algebra).</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Describe <b>Polynomials</b> and classify them (Monomial, Binomial, Trinomial).</li>
                        <li data-i18n="obj_2">Perform <b>Addition</b> and <b>Subtraction</b> of Polynomials.</li>
                        <li data-i18n="obj_3">Perform <b>Multiplication</b> and <b>Division</b> of Polynomials.</li>
                        <li data-i18n="obj_4">Describe <b>Rational Algebraic Expressions</b> and perform their <b>Addition/Subtraction</b>.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: To Combine or Not to Combine (Polynomials) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: To Combine or Not to Combine (Polynomials)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">A <b>Polynomial</b> is the sum or difference of algebraic expressions. Each expression is called a <b>Term</b>. The parts of a term (e.g., 3x⁴) are:</p>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin1_l1"><b>Coefficient</b> (3): The number.</li>
                                <li data-i18n="aralin1_l2"><b>Variable</b> (x): The letter (missing value).</li>
                                <li data-i18n="aralin1_l3"><b>Exponent</b> (4): The power or degree.</li>
                            </ul>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Classification of Polynomials</h3>
                            <div class="overflow-x-auto my-4">
                                <table class="table-custom w-full"> 
                                    <thead>
                                        <tr class="bg-green-200">
                                            <th data-i18n="aralin1_table_h1">Number of Terms</th>
                                            <th data-i18n="aralin1_table_h2">Name</th>
                                            <th data-i18n="aralin1_table_h3">Example</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin1_table_r1"><td>1</td><td><b>Monomial</b></td><td>5x, -7</td></tr>
                                        <tr data-i18n="aralin1_table_r2"><td>2</td><td><b>Binomial</b></td><td>x + 1, 2x² - y</td></tr>
                                        <tr data-i18n="aralin1_table_r3"><td>3</td><td><b>Trinomial</b></td><td>x² + 3x - 4</td></tr>
                                        <tr data-i18n="aralin1_table_r4"><td>4+</td><td><b>Multinomial</b></td><td>x³ - 3x² + 6x - 15</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <p data-i18n="aralin1_p2">The <b>Degree</b> of a Polynomial is the highest exponent. Example: The degree of <b>2x⁴ - 3x²y + 5</b> is <b>4</b>.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Addition and Subtraction (Like Terms)</h3>
                            <p data-i18n="aralin1_p3">You can only add or subtract <b>Like Terms</b> (same variable and exponent). Align the terms and perform the operation on the coefficients.</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE:</p>
                                <p data-i18n="aralin1_ex1_p1">(3x² + 4x + 1) + (2x² - 2x + 5) =</p>
                                <p data-i18n="aralin1_ex1_l1">1. Combine Like Terms: (3x² + 2x²) + (4x - 2x) + (1 + 5)</p>
                                <p data-i18n="aralin1_ex1_l2">2. Result: <b>5x² + 2x + 6</b></p>
                            </div>
                                                    </div>
                    </details>

                    <!-- ARALIN 2: Let's Distribute and Share (Multiplication/Division) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Let's Distribute and Share (Multiplication/Division)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Multiplication</h3>
                            <p data-i18n="aralin2_p1">Multiply the coefficients and add the exponents.</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">EXAMPLE 1 (Distribution):</p>
                                <p data-i18n="aralin2_ex1_p1">x(x + 5) = x(x) + x(5) = <b>x² + 5x</b></p>
                                <p class="font-bold mt-3" data-i18n="aralin2_ex2_title">EXAMPLE 2 (Box Method):</p>
                                <p data-i18n="aralin2_ex2_p1">The product of (x + 3)(x + 2) is <b>x² + 5x + 6</b> (In the Box Method, multiply each term and add the like terms along the diagonal).</p>
                            </div>
                                                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Division</h3>
                            <p data-i18n="aralin2_p2">Divide the coefficients and subtract the exponents.</p>
                            <p class="font-semibold mt-3" data-i18n="aralin2_h4_1">Monomial by Monomial/Polynomial:</p>
                            <div class="math-formula" data-i18n="aralin2_ex3_f1">
                                <span>(6x + 8) / 2 = (6x / 2) + (8 / 2) = <b>3x + 4</b></span>
                            </div>
                            <p class="font-semibold mt-3" data-i18n="aralin2_h4_2">Polynomial by Polynomial (Long Division):</p>
                            <p data-i18n="aralin2_p3">This is used to divide a polynomial by another polynomial. If there is a <b>missing term</b> (e.g., no x²), use a placeholder with a zero coefficient (e.g., <b>0x²</b>).</p>
                        </div>
                    </details>

                    <!-- ARALIN 3: Fractions of Your X (Rational Algebraic Expressions) -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Fractions of Your X (Rational Algebraic Expressions)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">A <b>Rational Algebraic Expression</b> is simply a fraction where the <b>Numerator</b> and <b>Denominator</b> are composed of Polynomials. (Ex. (x+10) / 2).</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Addition and Subtraction</h3>
                            <p data-i18n="aralin3_p2">The same rules are used as with ordinary fractions.</p>
                            <p class="font-semibold mt-3" data-i18n="aralin3_h4_1">Similar Denominators:</p>
                            <div class="math-formula" data-i18n="aralin3_ex1_f1">
                                <span>(x + 2) / x + (3x - 5) / x = <b>(4x - 3) / x</b></span>
                            </div>
                            
                            <p class="font-semibold mt-3" data-i18n="aralin3_h4_2">Dissimilar Denominators:</p>
                            <p data-i18n="aralin3_p3">First, find the <b>Least Common Denominator (LCD)</b>, transform the fractions into similar ones, and then perform the operation.</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex2_title">EXAMPLE:</p>
                                <p data-i18n="aralin3_ex2_p1">x / 5 + x / 3</p>
                                <ol class="list-decimal list-inside ml-4 space-y-1">
                                    <li data-i18n="aralin3_ex2_l1">LCD: 15</li>
                                    <li data-i18n="aralin3_ex2_l2">Transform: (3x / 15) + (5x / 15)</li>
                                    <li data-i18n="aralin3_ex2_l3">Result: <b>8x / 15</b></li>
                                </ol>
                            </div>
                                                    </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Solve the following problems. Write the answer in its simplest form and without special characters (e.g., 'x2' for x squared). Use parentheses only if needed for the numerator of a fraction.</p>

                    <form id="algebra-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Addition and Subtraction</p>
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. Add: (7x² - 4x + 3) + (x² + 3x - 2)</label>
                                    <input type="text" id="qa1" class="quiz-input w-full" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (e.g., 8x2-x+1)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. Find the difference: (5x - 3) - (2x + 6)</label>
                                    <input type="text" id="qa2" class="quiz-input w-full" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (e.g., 3x-9)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Multiplication and Division</p>
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. Multiply: (x - 3) x (x + 2)</label>
                                    <input type="text" id="qa3" class="quiz-input w-full" data-i18n-placeholder="qa3_placeholder" placeholder="Answer (e.g., x2-x-6)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. Divide: (10x - 12) / 2</label>
                                    <input type="text" id="qa4" class="quiz-input w-full" data-i18n-placeholder="qa4_placeholder" placeholder="Answer (e.g., 5x-6)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section3_title">C. Rational Expressions</p>
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">5. Add: (x+3)/2 + (2x-3)/2</label>
                                    <input type="text" id="qa5" class="quiz-input w-full" data-i18n-placeholder="qa5_placeholder" placeholder="Answer (e.g., 3x/2)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa6" class="font-medium" data-i18n="qa6_label">6. Find the difference: x/3 - 1/x</label>
                                    <input type="text" id="qa6" class="quiz-input w-full" data-i18n-placeholder="qa6_placeholder" placeholder="Answer (e.g., (x2-3)/3x)">
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
                outline_aralin1: "Lesson 1: To Combine or Not to Combine (Polynomials)",
                outline_aralin2: "Lesson 2: Let's Distribute and Share (Multiplication/Division)",
                outline_aralin3: "Lesson 3: Fractions of Your X (Rational Expressions)",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Playing with Missing X's",
                h1_subtitle: "Analyzing Polynomials and Rational Algebraic Expressions (Algebra).",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Describe <b>Polynomials</b> and classify them (Monomial, Binomial, Trinomial).",
                obj_2: "Perform <b>Addition</b> and <b>Subtraction</b> of Polynomials.",
                obj_3: "Perform <b>Multiplication</b> and <b>Division</b> of Polynomials.",
                obj_4: "Describe <b>Rational Algebraic Expressions</b> and perform their <b>Addition/Subtraction</b>.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: To Combine or Not to Combine (Polynomials)",
                aralin1_p1: "A <b>Polynomial</b> is the sum or difference of algebraic expressions. Each expression is called a <b>Term</b>. The parts of a term (e.g., 3x⁴) are:",
                aralin1_l1: "<b>Coefficient</b> (3): The number.",
                aralin1_l2: "<b>Variable</b> (x): The letter (missing value).",
                aralin1_l3: "<b>Exponent</b> (4): The power or degree.",
                aralin1_h3_1: "Classification of Polynomials",
                aralin1_table_h1: "Number of Terms",
                aralin1_table_h2: "Name",
                aralin1_table_h3: "Example",
                aralin1_table_r1: "<td>1</td><td><b>Monomial</b></td><td>5x, -7</td>",
                aralin1_table_r2: "<td>2</td><td><b>Binomial</b></td><td>x + 1, 2x² - y</td>",
                aralin1_table_r3: "<td>3</td><td><b>Trinomial</b></td><td>x² + 3x - 4</td>",
                aralin1_table_r4: "<td>4+</td><td><b>Multinomial</b></td><td>x³ - 3x² + 6x - 15</td>",
                aralin1_p2: "The <b>Degree</b> of a Polynomial is the highest exponent. Example: The degree of <b>2x⁴ - 3x²y + 5</b> is <b>4</b>.",
                aralin1_h3_2: "Addition and Subtraction (Like Terms)",
                aralin1_p3: "You can only add or subtract <b>Like Terms</b> (same variable and exponent). Align the terms and perform the operation on the coefficients.",
                aralin1_ex1_title: "EXAMPLE:",
                aralin1_ex1_p1: "(3x² + 4x + 1) + (2x² - 2x + 5) =",
                aralin1_ex1_l1: "1. Combine Like Terms: (3x² + 2x²) + (4x - 2x) + (1 + 5)",
                aralin1_ex1_l2: "2. Result: <b>5x² + 2x + 6</b>",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Let's Distribute and Share (Multiplication/Division)",
                aralin2_h3_1: "Multiplication",
                aralin2_p1: "Multiply the coefficients and add the exponents.",
                aralin2_ex1_title: "EXAMPLE 1 (Distribution):",
                aralin2_ex1_p1: "x(x + 5) = x(x) + x(5) = <b>x² + 5x</b>",
                aralin2_ex2_title: "EXAMPLE 2 (Box Method):",
                aralin2_ex2_p1: "The product of (x + 3)(x + 2) is <b>x² + 5x + 6</b> (In the Box Method, multiply each term and add the like terms along the diagonal).",
                aralin2_h3_2: "Division",
                aralin2_p2: "Divide the coefficients and subtract the exponents.",
                aralin2_h4_1: "Monomial by Monomial/Polynomial:",
                aralin2_ex3_f1: "<span>(6x + 8) / 2 = (6x / 2) + (8 / 2) = <b>3x + 4</b></span>",
                aralin2_h4_2: "Polynomial by Polynomial (Long Division):",
                aralin2_p3: "This is used to divide a polynomial by another polynomial. If there is a <b>missing term</b> (e.g., no x²), use a placeholder with a zero coefficient (e.g., <b>0x²</b>).",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Fractions of Your X (Rational Algebraic Expressions)",
                aralin3_p1: "A <b>Rational Algebraic Expression</b> is simply a fraction where the <b>Numerator</b> and <b>Denominator</b> are composed of Polynomials. (Ex. (x+10) / 2).",
                aralin3_h3_1: "Addition and Subtraction",
                aralin3_p2: "The same rules are used as with ordinary fractions.",
                aralin3_h4_1: "Similar Denominators:",
                aralin3_ex1_f1: "<span>(x + 2) / x + (3x - 5) / x = <b>(4x - 3) / x</b></span>",
                aralin3_h4_2: "Dissimilar Denominators:",
                aralin3_p3: "First, find the <b>Least Common Denominator (LCD)</b>, transform the fractions into similar ones, and then perform the operation.",
                aralin3_ex2_title: "EXAMPLE:",
                aralin3_ex2_p1: "x / 5 + x / 3",
                aralin3_ex2_l1: "LCD: 15",
                aralin3_ex2_l2: "Transform: (3x / 15) + (5x / 15)",
                aralin3_ex2_l3: "Result: <b>8x / 15</b>",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Solve the following problems. Write the answer in its simplest form and without special characters (e.g., 'x2' for x squared). Use parentheses only if needed for the numerator of a fraction.",
                quiz_section1_title: "A. Addition and Subtraction",
                qa1_label: "1. Add: (7x² - 4x + 3) + (x² + 3x - 2)",
                qa1_placeholder: "Answer (e.g., 8x2-x+1)",
                qa2_label: "2. Find the difference: (5x - 3) - (2x + 6)",
                qa2_placeholder: "Answer (e.g., 3x-9)",
                quiz_section2_title: "B. Multiplication and Division",
                qa3_label: "3. Multiply: (x - 3) x (x + 2)",
                qa3_placeholder: "Answer (e.g., x2-x-6)",
                qa4_label: "4. Divide: (10x - 12) / 2",
                qa4_placeholder: "Answer (e.g., 5x-6)",
                quiz_section3_title: "C. Rational Expressions",
                qa5_label: "5. Add: (x+3)/2 + (2x-3)/2",
                qa5_placeholder: "Answer (e.g., 3x/2)",
                qa6_label: "6. Find the difference: x/3 - 1/x",
                qa6_placeholder: "Answer (e.g., (x2-3)/3x)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Algebra!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review Multiplication and Division of Polynomials.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the entire module.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: To Combine or Not to Combine (Polynomials)",
                outline_aralin2: "Aralin 2: Let's Distribute and Share (Multiplication/Division)",
                outline_aralin3: "Aralin 3: Fractions of Your X (Rational Expressions)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Playing with Missing X's",
                h1_subtitle: "Pagsusuri sa Polynomials at Rational Algebraic Expressions (Algebra).",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ilarawan ang <b>Polynomials</b> at uriin ito (Monomial, Binomial, Trinomial).",
                obj_2: "Isagawa ang <b>Addition</b> at <b>Subtraction</b> ng Polynomials.",
                obj_3: "Isagawa ang <b>Multiplication</b> at <b>Division</b> ng Polynomials.",
                obj_4: "Ilarawan ang <b>Rational Algebraic Expressions</b> at isagawa ang <b>Addition/Subtraction</b> nito.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: To Combine or Not to Combine (Polynomials)",
                aralin1_p1: "Ang <b>Polynomial</b> ay sum o difference ng mga algebraic expressions. Ang bawat expression ay tinatawag na <b>Term</b>. Ang mga bahagi ng isang term (hal. 3x⁴) ay:",
                aralin1_l1: "<b>Coefficient</b> (3): Ang numero.",
                aralin1_l2: "<b>Variable</b> (x): Ang letra (missing value).",
                aralin1_l3: "<b>Exponent</b> (4): Ang power o degree.",
                aralin1_h3_1: "Pag-uri ng Polynomials",
                aralin1_table_h1: "Bilang ng Term",
                aralin1_table_h2: "Pangalan",
                aralin1_table_h3: "Halimbawa",
                aralin1_table_r1: "<td>1</td><td><b>Monomial</b></td><td>5x, -7</td>",
                aralin1_table_r2: "<td>2</td><td><b>Binomial</b></td><td>x + 1, 2x² - y</td>",
                aralin1_table_r3: "<td>3</td><td><b>Trinomial</b></td><td>x² + 3x - 4</td>",
                aralin1_table_r4: "<td>4+</td><td><b>Multinomial</b></td><td>x³ - 3x² + 6x - 15</td>",
                aralin1_p2: "Ang <b>Degree</b> ng Polynomial ay ang pinakamataas na exponent. Halimbawa: Ang degree ng <b>2x⁴ - 3x²y + 5</b> ay <b>4</b>.",
                aralin1_h3_2: "Pagdaragdag at Pagbabawas (Like Terms)",
                aralin1_p3: "Maaari lang mag-add o mag-subtract ng <b>Like Terms</b> (parehong variable at exponent). I-align ang mga term at i-perform ang operation sa coefficients.",
                aralin1_ex1_title: "HALIMBAWA:",
                aralin1_ex1_p1: "(3x² + 4x + 1) + (2x² - 2x + 5) =",
                aralin1_ex1_l1: "1. Pagsamahin ang Like Terms: (3x² + 2x²) + (4x - 2x) + (1 + 5)",
                aralin1_ex1_l2: "2. Resulta: <b>5x² + 2x + 6</b>",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Let's Distribute and Share (Multiplication/Division)",
                aralin2_h3_1: "Pagpaparami (Multiplication)",
                aralin2_p1: "I-multiply ang coefficients at i-add ang exponents.",
                aralin2_ex1_title: "HALIMBAWA 1 (Distribution):",
                aralin2_ex1_p1: "x(x + 5) = x(x) + x(5) = <b>x² + 5x</b>",
                aralin2_ex2_title: "HALIMBAWA 2 (Box Method):",
                aralin2_ex2_p1: "Ang product ng (x + 3)(x + 2) ay <b>x² + 5x + 6</b> (Sa Box Method, i-multiply ang bawat term at i-add ang like terms na nasa diagonal).",
                aralin2_h3_2: "Paghahati (Division)",
                aralin2_p2: "I-divide ang coefficients at i-subtract ang exponents.",
                aralin2_h4_1: "Monomial sa Monomial/Polynomial:",
                aralin2_ex3_f1: "<span>(6x + 8) / 2 = (6x / 2) + (8 / 2) = <b>3x + 4</b></span>",
                aralin2_h4_2: "Polynomial sa Polynomial (Long Division):",
                aralin2_p3: "Ginagamit ito sa pag-divide ng polynomial sa isa pang polynomial. Kung may <b>missing term</b> (hal. walang x²), gumamit ng placeholder na may zero coefficient (hal. <b>0x²</b>).",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Fractions of Your X (Rational Algebraic Expressions)",
                aralin3_p1: "Ang <b>Rational Algebraic Expression</b> ay simpleng fraction kung saan ang <b>Numerator</b> at <b>Denominator</b> ay binubuo ng Polynomials. (Hal. (x+10) / 2).",
                aralin3_h3_1: "Addition at Subtraction",
                aralin3_p2: "Ginagamit ang parehong tuntunin sa ordinaryong fractions.",
                aralin3_h4_1: "Similar Denominators (Pareho):",
                aralin3_ex1_f1: "<span>(x + 2) / x + (3x - 5) / x = <b>(4x - 3) / x</b></span>",
                aralin3_h4_2: "Dissimilar Denominators (Magkaiba):",
                aralin3_p3: "Hanapin muna ang <b>Least Common Denominator (LCD)</b>, i-transform sa similar fractions, at saka isagawa ang operation.",
                aralin3_ex2_title: "HALIMBAWA:",
                aralin3_ex2_p1: "x / 5 + x / 3",
                aralin3_ex2_l1: "LCD: 15",
                aralin3_ex2_l2: "I-transform: (3x / 15) + (5x / 15)",
                aralin3_ex2_l3: "Resulta: <b>8x / 15</b>",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Lutasin ang mga sumusunod. Isulat ang sagot nang simple at walang special characters (hal. 'x2' para sa x squared). Gumamit lamang ng parentheses kung kailangan ito para sa numerator ng isang fraction.",
                quiz_section1_title: "A. Addition at Subtraction",
                qa1_label: "1. Sumahin: (7x² - 4x + 3) + (x² + 3x - 2)",
                qa1_placeholder: "Sagot (e.g., 8x2-x+1)",
                qa2_label: "2. Hanapin ang difference: (5x - 3) - (2x + 6)",
                qa2_placeholder: "Sagot (e.g., 3x-9)",
                quiz_section2_title: "B. Multiplication at Division",
                qa3_label: "3. I-multiply: (x - 3) x (x + 2)",
                qa3_placeholder: "Sagot (e.g., x2-x-6)",
                qa4_label: "4. I-divide: (10x - 12) / 2",
                qa4_placeholder: "Sagot (e.g., 5x-6)",
                quiz_section3_title: "C. Rational Expressions",
                qa5_label: "5. Sumahin: (x+3)/2 + (2x-3)/2",
                qa5_placeholder: "Sagot (e.g., 3x/2)",
                qa6_label: "6. Hanapin ang difference: x/3 - 1/x",
                qa6_placeholder: "Sagot (e.g., (x2-3)/3x)",
                quiz_button: "Tapusin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang Algebra!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang Multiplication at Division ng Polynomials.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang buong modyul.`,
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
        const sections = ['objectives', 'aralin1', 'aralin2', 'aralin3', 'pagsasanay'];
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
        
        // Function to clean and normalize algebraic input
        function normalizeAlgebraicInput(input) {
            if (typeof input !== 'string') return '';
            
            // 1. Remove all whitespace
            let cleaned = input.toLowerCase().replace(/\s/g, '');
            
            // 2. Normalize exponents (x^2 to x2, x**2 to x2)
            cleaned = cleaned.replace(/[\^\*\*]/g, '2'); 

            // 3. Normalize forms of multiplication (x*y to xy)
            cleaned = cleaned.replace(/\*/g, '');

            // 4. Handle rational expression numerator parenthesis (remove them if outside)
            cleaned = cleaned.replace(/\(|\)/g, ''); 

            // 5. Ensure signs are handled consistently (e.g. 'x+-y' -> 'x-y')
            cleaned = cleaned.replace(/\+-/g, '-').replace(/--/g, '+');
            
            // 6. Remove leading + sign if present
            if (cleaned.startsWith('+')) {
                cleaned = cleaned.substring(1);
            }
            
            return cleaned;
        }

        // Function to check algebraic answer
        function checkAlgebraicAnswer(id, expected, expectedAlt = null) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            const normalizedInput = normalizeAlgebraicInput(rawValue);
            const normalizedExpected = normalizeAlgebraicInput(expected);
            const normalizedExpectedAlt = expectedAlt ? normalizeAlgebraicInput(expectedAlt) : null;
            
            let isCorrect = (normalizedInput === normalizedExpected);
            
            if (!isCorrect && normalizedExpectedAlt) {
                isCorrect = (normalizedInput === normalizedExpectedAlt);
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

        // --- QUIZ LOGIC ---
        document.getElementById('algebra-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); 
        });
        
        /**
         * Submits the quiz and calculates the score.
         * @param {boolean} isLanguageToggle - True if called only to refresh results language.
         */
        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 6; 
            const resultsDiv = document.getElementById('results');
            
            // Expected Answers (must be provided as strings and normalized if necessary)
            
            // 1. (7x² - 4x + 3) + (x² + 3x - 2) = 8x² - x + 1
            const ans_a1 = '8x2-x+1'; 
            
            // 2. (5x - 3) - (2x + 6) = 5x - 3 - 2x - 6 = 3x - 9
            const ans_a2 = '3x-9'; 
            
            // 3. (x - 3) * (x + 2) = x² + 2x - 3x - 6 = x² - x - 6
            const ans_a3 = 'x2-x-6'; 
            
            // 4. (10x - 12) / 2 = 5x - 6
            const ans_a4 = '5x-6';
            
            // 5. (x+3)/2 + (2x-3)/2 = (x+3+2x-3)/2 = 3x/2
            const ans_a5 = '3x/2';
            
            // 6. x/3 - 1/x = (x^2 - 3) / 3x
            const ans_a6 = 'x2-3/3x'; // Numerator must be in parentheses if not simplified further, but normalization removes outer ()


            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAlgebraicAnswer('qa1', ans_a1); 
                correctCount += checkAlgebraicAnswer('qa2', ans_a2); 
                correctCount += checkAlgebraicAnswer('qa3', ans_a3); 
                correctCount += checkAlgebraicAnswer('qa4', ans_a4); 
                correctCount += checkAlgebraicAnswer('qa5', ans_a5); 
                correctCount += checkAlgebraicAnswer('qa6', ans_a6);
                
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
        
        window.addEventListener('load', () => {
             // Initialize default language (English) and outline highlight on load
             updateLanguage('en');
        });
    </script>
</body>
</html>
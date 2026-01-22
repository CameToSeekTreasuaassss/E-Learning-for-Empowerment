<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Business Mathematics 1</title>
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
        
        /* Quiz and Objectives Text Size */
        /* FIX: Explicitly target Objectives list items and set to 20px */
        #objectives ul li { 
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
        /* UPDATED: Increased desktop width for input fields (w-80) */
        @media (min-width: 640px) {
            .quiz-input {
                width: 20rem; /* w-80 = 20rem (longer answer line) */
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
            text-align: left; 
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
            overflow-x: auto;
        }
        .math-formula span { white-space: nowrap; } 

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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Calculating Interest and Installments</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Currency Conversion</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Tax Computation</a>
                    <a href="#pagsasanay" class="outline-link" data-i18n="outline_quiz">Practice</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Business Mathematics 1</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Studying the computation of interest, monthly payments, currency conversion, and taxes.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Confirmed: List items font size is set to 1.25rem (20px) -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Calculate <b>simple</b> and <b>compounded</b> interest.</li>
                        <li data-i18n="obj_2">Estimate <b>monthly installments</b> (monthly payments).</li>
                        <li data-i18n="obj_3">Perform <b>currency conversion</b>.</li>
                        <li data-i18n="obj_4">Calculate <b>income tax</b> using the progressive table.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Pagtutuos ng Interes at Hulog -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Calculating Simple and Compounded Interest</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1"><b>Interest</b> is the fee paid for money borrowed or the return earned from money invested. There are two main types: Simple and Compounded.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">1. Simple Interest</h3>
                            <p data-i18n="aralin1_p2">Interest is calculated only based on the original <b>Principal (P)</b>. </p>
                            <div class="math-formula" data-i18n="aralin1_formula">
                                <span>Interest (I) = Principal (P) x Rate (R) x Time (T)</span>
                            </div>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE: Simple Interest</p>
                                <p data-i18n="aralin1_ex1_step1">Borrowed P10,000 at 5% interest for 6 months.</p>
                                <p class="math-formula" data-i18n="aralin1_ex1_solution"> I = P10,000 x 0.05 x (6 / 12) = <b>P250.00</b> </p>
                                <p class="mt-2 italic text-gray-600" data-i18n="aralin1_ex1_conclusion">Total payment (A) = P10,000 + P250 = P10,250.00</p>
                            </div>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">2. Compounded Interest</h3>
                            <p data-i18n="aralin1_p3">Interest is added to the principal, and the interest for the next period is calculated based on the higher new balance. This is often calculated quarterly (every 3 months).</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_title">EXAMPLE: Compounded Interest (6 months, 5% quarterly)</p>
                                <p data-i18n="aralin1_ex2_step1">Principal: P10,000</p>
                                <p data-i18n="aralin1_ex2_step2">1st Quarter (3 months): I = P10,000 x 0.05 x (3/12) = P125. New Balance: P10,125.</p>
                                <p data-i18n="aralin1_ex2_step3">2nd Quarter (3 months): I = P10,125 x 0.05 x (3/12) ≈ P126.56.</p>
                                <p class="math-formula" data-i18n="aralin1_ex2_solution"> Total Payment = P10,125 + P126.56 = <b>P10,251.56</b> </p>
                            </div>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">3. Monthly Installments</h3>
                            <p data-i18n="aralin1_p4">Simple Interest is used to calculate the surcharge on the product price, and then divided by the number of payment months.</p>
                        </div>
                    </details>

                    <!-- ARALIN 2: Kombersiyon ng Pananalapi -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Currency Conversion</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">The <b>Exchange Rate</b> is the basis for converting one currency to another. This uses simple multiplication or division.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Exchange Rate Table (Mock Rates)</h3>
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full text-sm">
                                    <thead>
                                        <tr data-i18n="aralin2_table_header"><th>Currency</th><th>Value in Peso (P)</th><th>Usage</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin2_table_row1"><td>1 US Dollar (<b>US$</b>1.00)</td><td>P55.50</td><td>Converting <b>US$</b> → P: Multiply by 55.50</td></tr>
                                        <tr data-i18n="aralin2_table_row2"><td>1 US Dollar (<b>US$</b>1.00)</td><td>P55.50</td><td>Converting P → <b>US$</b>: Divide by 55.50</td></tr>
                                        <tr data-i18n="aralin2_table_row3"><td>1 Saudi Rial (SR)</td><td>P14.80</td><td>Converting SR → P: Multiply by 14.80</td></tr>
                                        <tr data-i18n="aralin2_table_row4"><td>1 HK Dollar (HK$)</td><td>P7.10</td><td>Converting P → HK$: Divide by 7.10</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">EXAMPLE: Convert P2,500 to Saudi Rials (SR1.00 = P14.80)</p>
                                <p data-i18n="aralin2_ex1_step1">You want to know how many Saudi Rials are equivalent to P2,500.</p>
                                <p class="math-formula" data-i18n="aralin2_ex1_solution"> P2,500 / P14.80/SR1.00 ≈ <b>SR 168.92</b> </p>
                            </div>
                        </div>
                    </details>
                    
                    <!-- ARALIN 3: Pagtutuos ng mga Buwis -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Income Tax Computation</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1"><b>Income Tax</b> is calculated using the <b>Progressive Method</b>, where higher income corresponds to a higher tax percentage.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Tax Table Excerpt (Annual Income)</h3>
                            <div class="overflow-x-auto my-4">
                                <table class="module-table w-full text-sm">
                                    <thead>
                                        <tr data-i18n="aralin3_table_header"><th>Annual Income</th><th>Tax Due (Excerpt)</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin3_table_row1"><td>Not over P250,000</td><td>0%</td></tr>
                                        <tr data-i18n="aralin3_table_row2"><td>Over P400,000 but not over P800,000</td><td>P30,000 + 25% of the excess over P400,000</td></tr>
                                        <tr data-i18n="aralin3_table_row3"><td>Over P800,000 but not over P2,000,000</td><td>P130,000 + 30% of the excess over P800,000</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex1_title">EXAMPLE: Annual Income of P480,000</p>
                                <p data-i18n="aralin3_ex1_step1">The income is in the second bracket: P30,000 + 25% of the excess over P400,000.</p>
                                <p data-i18n="aralin3_ex1_step2">Excess over P400,000: P480,000 - P400,000 = P80,000.</p>
                                <p data-i18n="aralin3_ex1_step3">Tax on Excess: P80,000 x 0.25 = P20,000.</p>
                                <p class="math-formula" data-i18n="aralin3_ex1_solution"> Total Tax = P30,000 + P20,000 = <b>P50,000</b> </p>
                            </div>
                            <p class="text-sm text-gray-500 italic mt-4" data-i18n="aralin3_note">Note: The tax brackets above are simplified examples and may not reflect the current actual tax system.</p>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Solve the following problems based on the lessons.</p>

                    <form id="business-math-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Interest and Installments</p>
                            <!-- USED FLEX-COL FOR VERTICAL ALIGNMENT AND W-FULL/W-80 INPUTS -->
                            <div class="flex flex-col space-y-4"> 
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. Simple Interest: Principal P8,000, Rate 4% / 3 years. What is the <b>Total Amount Due</b>?</label>
                                    <input type="text" id="qa1" class="quiz-input w-full sm:w-80" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (P)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. Monthly Installment: Price P5,000. Surcharge 20% annual. Time 5 months. What is the <b>Monthly Installment</b>?</label>
                                    <input type="text" id="qa2" class="quiz-input w-full sm:w-80" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (P)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Conversion and Tax</p>
                            <div class="flex flex-col space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1" class="font-medium" data-i18n="qb1_label">3. Conversion: How many <b>US$</b> is P5,400? (Use: <b>US$</b>1.00 = P50.25)</label>
                                    <input type="text" id="qb1" class="quiz-input w-full sm:w-80" data-i18n-placeholder="qb1_placeholder" placeholder="Answer (US$)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2" class="font-medium" data-i18n="qb2_label">4. Tax: Annual income P45,000. Tax = P3,075 + 15% (excess over P40,000). What is the <b>Total Annual Tax</b>?</label>
                                    <input type="text" id="qb2" class="quiz-input w-full sm:w-80" data-i18n-placeholder="qb2_placeholder" placeholder="Answer (P)">
                                </div>
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
                outline_aralin1: "Lesson 1: Calculating Interest and Installments",
                outline_aralin2: "Lesson 2: Currency Conversion",
                outline_aralin3: "Lesson 3: Tax Computation",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Business Mathematics 1",
                h1_subtitle: "Studying the computation of interest, monthly payments, currency conversion, and taxes.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Calculate <b>simple</b> and <b>compounded</b> interest.",
                obj_2: "Estimate <b>monthly installments</b> (monthly payments).",
                obj_3: "Perform <b>currency conversion</b>.",
                obj_4: "Calculate <b>income tax</b> using the progressive table.",

                // Lesson 1 Content (Interest)
                aralin1_title: "Lesson 1: Calculating Simple and Compounded Interest",
                aralin1_p1: "<b>Interest</b> is the fee paid for money borrowed or the return earned from money invested. There are two main types: Simple and Compounded.",
                aralin1_h3_1: "1. Simple Interest",
                aralin1_p2: "Interest is calculated only based on the original <b>Principal (P)</b>. ",
                aralin1_formula: "Interest (I) = Principal (P) x Rate (R) x Time (T)",
                aralin1_ex1_title: "EXAMPLE: Simple Interest",
                aralin1_ex1_step1: "Borrowed P10,000 at 5% interest for 6 months.",
                aralin1_ex1_solution: " I = P10,000 x 0.05 x (6 / 12) = <b>P250.00</b> ",
                aralin1_ex1_conclusion: "Total payment (A) = P10,000 + P250 = P10,250.00",
                aralin1_h3_2: "2. Compounded Interest",
                aralin1_p3: "Interest is added to the principal, and the interest for the next period is calculated based on the higher new balance. This is often calculated quarterly (every 3 months).",
                aralin1_ex2_title: "EXAMPLE: Compounded Interest (6 months, 5% quarterly)",
                aralin1_ex2_step1: "Principal: P10,000",
                aralin1_ex2_step2: "1st Quarter (3 months): I = P10,000 x 0.05 x (3/12) = P125. New Balance: P10,125.",
                aralin1_ex2_step3: "2nd Quarter (3 months): I = P10,125 x 0.05 x (3/12) ≈ P126.56.",
                aralin1_ex2_solution: " Total Payment = P10,125 + P126.56 = <b>P10,251.56</b> ",
                aralin1_h3_3: "3. Monthly Installments",
                aralin1_p4: "Simple Interest is used to calculate the surcharge on the product price, and then divided by the number of payment months.",

                // Lesson 2 Content (Currency Conversion)
                aralin2_title: "Lesson 2: Currency Conversion",
                aralin2_p1: "The <b>Exchange Rate</b> is the basis for converting one currency to another. This uses simple multiplication or division.",
                aralin2_h3_1: "Exchange Rate Table (Mock Rates)",
                aralin2_table_header: "<th>Currency</th><th>Value in Peso (P)</th><th>Usage</th>",
                aralin2_table_row1: "<td>1 US Dollar (<b>US$</b>1.00)</td><td>P55.50</td><td>Converting <b>US$</b> → P: Multiply by 55.50</td>",
                aralin2_table_row2: "<td>1 US Dollar (<b>US$</b>1.00)</td><td>P55.50</td><td>Converting P → <b>US$</b>: Divide by 55.50</td>",
                aralin2_table_row3: "<td>1 Saudi Rial (SR)</td><td>P14.80</td><td>Converting SR → P: Multiply by 14.80</td>",
                aralin2_table_row4: "<td>1 HK Dollar (HK$)</td><td>P7.10</td><td>Converting P → HK$: Divide by 7.10</td>",
                aralin2_ex1_title: "EXAMPLE: Convert P2,500 to Saudi Rials (SR1.00 = P14.80)",
                aralin2_ex1_step1: "You want to know how many Saudi Rials are equivalent to P2,500.",
                aralin2_ex1_solution: " P2,500 / P14.80/SR1.00 ≈ <b>SR 168.92</b> ",

                // Lesson 3 Content (Tax)
                aralin3_title: "Lesson 3: Income Tax Computation",
                aralin3_p1: "<b>Income Tax</b> is calculated using the <b>Progressive Method</b>, where higher income corresponds to a higher tax percentage.",
                aralin3_h3_1: "Tax Table Excerpt (Annual Income)",
                aralin3_table_header: "<th>Annual Income</th><th>Tax Due (Excerpt)</th>",
                aralin3_table_row1: "<td>Not over P250,000</td><td>0%</td>",
                aralin3_table_row2: "<td>Over P400,000 but not over P800,000</td><td>P30,000 + 25% of the excess over P400,000</td>",
                aralin3_table_row3: "<td>Over P800,000 but not over P2,000,000</td><td>P130,000 + 30% of the excess over P800,000</td>",
                aralin3_ex1_title: "EXAMPLE: Annual Income of P480,000",
                aralin3_ex1_step1: "The income is in the second bracket: P30,000 + 25% of the excess over P400,000.",
                aralin3_ex1_step2: "Excess over P400,000: P480,000 - P400,000 = P80,000.",
                aralin3_ex1_step3: "Tax on Excess: P80,000 x 0.25 = P20,000.",
                aralin3_ex1_solution: " Total Tax = P30,000 + P20,000 = <b>P50,000</b> ",
                aralin3_note: "Note: The tax brackets above are simplified examples and may not reflect the current actual tax system.",


                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Solve the following problems based on the lessons.",
                quiz_section1_title: "A. Interest and Installments",
                qa1_label: "1. Simple Interest: Principal P8,000, Rate 4% / 3 years. What is the <b>Total Amount Due</b>?",
                qa1_placeholder: "Answer (P)",
                qa2_label: "2. Monthly Installment: Price P5,000. Surcharge 20% annual. Time 5 months. What is the <b>Monthly Installment</b>?",
                qa2_placeholder: "Answer (P)",
                quiz_section2_title: "B. Conversion and Tax",
                qb1_label: "3. Conversion: How many <b>US$</b> is P5,400? (Use: <b>US$</b>1.00 = P50.25)",
                qb1_placeholder: "Answer (US$)",
                qb2_label: "4. Tax: Annual income P45,000. Tax = P3,075 + 15% (excess over P40,000). What is the <b>Total Annual Tax</b>?",
                qb2_placeholder: "Answer (P)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). Your knowledge of Business Mathematics is excellent.`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the interest and tax formulas.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Re-read the entire module, especially Lesson 3 on taxes.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pagtutuos ng Interes at Hulog",
                outline_aralin2: "Aralin 2: Kombersiyon ng Pananalapi",
                outline_aralin3: "Aralin 3: Pagtutuos ng Buwis",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Matematikang Pangkalakal 1",
                h1_subtitle: "Pag-aaral sa pagtutuos ng interes, buwanang hulog, kombersiyon ng pananalapi, at buwis.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Tuusin ang <b>payak</b> at <b>compounded</b> na interes.",
                obj_2: "Matantiya ang <b>buwanang hulog</b> (monthly installment).",
                obj_3: "Magkombert ng <b>pananalapi</b> (currency conversion).",
                obj_4: "Tuusin ang <b>buwis sa kita</b> (income tax) gamit ang progresibong talahanayan.",

                // Lesson 1 Content (Interest)
                aralin1_title: "Aralin 1: Pagtutuos ng Payak at Compounded Interest",
                aralin1_p1: "Ang <b>Interes</b> ay ang upa na binabayaran sa perang hiniram o kinita mula sa inimpok. May dalawang pangunahing uri ito: Payak at Compounded.",
                aralin1_h3_1: "1. Payak na Interes (Simple Interest)",
                aralin1_p2: "Ang interes ay kinakalkula lamang batay sa orihinal na <b>Prinsipal (P)</b>. ",
                aralin1_formula: "Interes (I) = Prinsipal (P) x Rate (R) x Taning (T)",
                aralin1_ex1_title: "HALIMBAWA: Payak na Interes",
                aralin1_ex1_step1: "Humiram ng P10,000 na may 5% interes sa loob ng 6 na buwan.",
                aralin1_ex1_solution: " I = P10,000 x 0.05 x (6 / 12) = <b>P250.00</b> ",
                aralin1_ex1_conclusion: "Kabuuang babayaran (A) = P10,000 + P250 = P10,250.00",
                aralin1_h3_2: "2. Compounded Interest",
                aralin1_p3: "Ang interes ay idinadagdag sa prinsipal, at ang interes sa susunod na panahon ay kinakalkula na batay sa mas mataas na bagong balanse. Ito ay kadalasang tinutuos kada kuwarto (3 buwan).",
                aralin1_ex2_title: "HALIMBAWA: Compounded Interest (6 buwan, 5% quarterly)",
                aralin1_ex2_step1: "Prinsipal: P10,000",
                aralin1_ex2_step2: "1st Quarter (3 buwan): I = P10,000 x 0.05 x (3/12) = P125. Bagong Balanse: P10,125.",
                aralin1_ex2_step3: "2nd Quarter (3 buwan): I = P10,125 x 0.05 x (3/12) ≈ P126.56.",
                aralin1_ex2_solution: " Kabuuang Babayaran = P10,125 + P126.56 = <b>P10,251.56</b> ",
                aralin1_h3_3: "3. Buwanang Hulog (Monthly Installments)",
                aralin1_p4: "Ginagamit ang Payak na Interes para tuusin ang dagdag na singil (surcharge) sa halaga ng produkto, at pagkatapos ay hahatiin sa bilang ng buwan ng pagbabayad.",

                // Lesson 2 Content (Currency Conversion)
                aralin2_title: "Aralin 2: Kombersiyon ng Pananalapi",
                aralin2_p1: "Ang <b>Exchange Rate</b> (tasa ng palitan) ang batayan sa pagpapalit ng isang pananalapi (pera) sa iba. Ginagamitan ito ng simpleng pagpaparami o paghahati.",
                aralin2_h3_1: "Talahanayan ng Palitan (Mock Rates)",
                aralin2_table_header: "<th>Pananalapi</th><th>Halaga sa Piso (P)</th><th>Gamit</th>",
                aralin2_table_row1: "<td>1 US Dollar (<b>US$</b>1.00)</td><td>P55.50</td><td>Pagpalit ng <b>US$</b> → P: Multiply by 55.50</td>",
                aralin2_table_row2: "<td>1 US Dollar (<b>US$</b>1.00)</td><td>P55.50</td><td>Pagpalit ng P → <b>US$</b>: Divide by 55.50</td>",
                aralin2_table_row3: "<td>1 Saudi Rial (SR)</td><td>P14.80</td><td>Pagpalit ng SR → P: Multiply by 14.80</td>",
                aralin2_table_row4: "<td>1 HK Dollar (HK$)</td><td>P7.10</td><td>Pagpalit ng P → HK$: Divide by 7.10</td>",
                aralin2_ex1_title: "HALIMBAWA: Pagpalit ng P2,500 sa Saudi Rials (SR1.00 = P14.80)",
                aralin2_ex1_step1: "Gusto mong malaman kung ilang Saudi Rials ang katumbas ng P2,500.",
                aralin2_ex1_solution: " P2,500 / P14.80/SR1.00 ≈ <b>SR 168.92</b> ",

                // Lesson 3 Content (Tax)
                aralin3_title: "Aralin 3: Pagtutuos ng Buwis sa Kita",
                aralin3_p1: "Ang <b>Buwis sa Kita (Income Tax)</b> ay kinakalkula gamit ang <b>Progresibong Pamamaraan</b>, kung saan ang mas malaking kita ay may katumbas na mas mataas na porsyento ng buwis.",
                aralin3_h3_1: "Sipi mula sa Talahanayan ng Buwis (Taunang Kita)",
                aralin3_table_header: "<th>Taunang Kita</th><th>Buwis na Dapat Bayaran (Sipi)</th>",
                aralin3_table_row1: "<td>Hindi hihigit sa P250,000</td><td>0%</td>",
                aralin3_table_row2: "<td>Higit sa P400,000 subalit hindi hihigit sa P800,000</td><td>P30,000 + 25% ng labis sa P400,000</td>",
                aralin3_table_row3: "<td>Higit sa P800,000 subalit hindi hihigit sa P2,000,000</td><td>P130,000 + 30% ng labis sa P800,000</td>",
                aralin3_ex1_title: "HALIMBAWA: Taunang Kita na P480,000",
                aralin3_ex1_step1: "Ang kita ay nasa ikalawang bracket: P30,000 + 25% ng labis sa P400,000.",
                aralin3_ex1_step2: "Labis sa P400,000: P480,000 - P400,000 = P80,000.",
                aralin3_ex1_step3: "Buwis sa Labis: P80,000 x 0.25 = P20,000.",
                aralin3_ex1_solution: " Kabuuang Buwis = P30,000 + P20,000 = <b>P50,000</b> ",
                aralin3_note: "Note: Ang mga bracket sa itaas ay pinasimpleng halimbawa at maaaring hindi sumasalamin sa kasalukuyang sistema ng buwis.",


                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Lutasin ang sumusunod na problema batay sa mga aralin.",
                quiz_section1_title: "A. Interes at Hulog",
                qa1_label: "1. Simple Interest: Prinsipal P8,000, Rate 4% / 3 years. Ano ang <b>Kabuuang Babayaran</b>?",
                qa1_placeholder: "Sagot (P)",
                qa2_label: "2. Monthly Installment: Presyo P5,000. Dagdag Singil 20% annual. Taning 5 months. Ano ang <b>Buwanang Hulog</b>?",
                qa2_placeholder: "Sagot (P)",
                quiz_section2_title: "B. Conversion at Buwis",
                qb1_label: "3. Conversion: Ilang <b>US$</b> ang P5,400? (Gamitin: <b>US$</b>1.00 = P50.25)",
                qb1_placeholder: "Sagot (US$)",
                qb2_label: "4. Tax: Taunang kita P45,000. Tax = P3,075 + 15% (labis sa P40,000). Ano ang <b>Kabuuang Taunang Buwis</b>?",
                qb2_placeholder: "Sagot (P)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Ang iyong kaalaman sa Matematikang Pangkalakal ay mahusay.`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga formula ng interes at buwis.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang buong modyul, lalo na ang Aralin 3 tungkol sa buwis.`,
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
                    // Use innerHTML for text that contains <b> tags or math symbols
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
        // Renamed 'tungkol-saan' to 'objectives' for clarity
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


        // Function to standardize number input (returns float)
        function standardizeFloat(value) {
            if (typeof value !== 'string') value = String(value);
            // Remove P, $, comma, and non-numeric characters except for period
            value = value.trim().replace(/[P$]/g, '').replace(/,/g, '').replace(/\s/g, ''); 
            const parsedValue = parseFloat(value);
            return isNaN(parsedValue) ? 0 : parsedValue;
        }

        function checkAnswer(id, expected, tolerance = 0.01) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            const inputFloat = standardizeFloat(rawValue);
            const expectedFloat = standardizeFloat(String(expected));
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            // Using tolerance for floating-point comparison
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
        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 4; 
            const resultsDiv = document.getElementById('results');
            
            // --- Expected Calculations ---
            
            // Q1: Simple Interest Total Amount. P=8000, R=0.04, T=3
            // I = 8000 * 0.04 * 3 = 960. A = 8000 + 960 = 8960
            const ans_a1 = 8960;
            
            // Q2: Monthly Installment. P=5000, R=0.20 (annual), T=5/12
            // I = 5000 * 0.20 * (5/12) = 416.666...
            // A = 5000 + 416.666... = 5416.666...
            // M = A / 5 months = 1083.333...
            const ans_a2 = 1083.33; 

            // Q3: Conversion. P5,400 to US$. Rate: 50.25
            // US$ = 5400 / 50.25 = 107.463...
            const ans_b1 = 107.46;
            
            // Q4: Tax Calculation. Income=45000. Base=3075, Excess Rate=15% over 40000.
            // Excess = 45000 - 40000 = 5000
            // Tax on Excess = 5000 * 0.15 = 750
            // Total Tax = 3075 + 750 = 3825
            const ans_b2 = 3825;


            if (!isLanguageToggle) {
                // --- Check Answers ---
                // Tolerance is set to 0.01 for money calculations.
                correctCount += checkAnswer('qa1', ans_a1, 0.01);
                correctCount += checkAnswer('qa2', ans_a2, 0.01);
                correctCount += checkAnswer('qb1', ans_b1, 0.01);
                correctCount += checkAnswer('qb2', ans_b2, 0.01);
                
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

            // Reset background for results box
            resultsDiv.classList.remove('bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800', 'bg-red-100', 'text-red-800', 'bg-green-600', 'text-white');

            let message;
            if (correctCount === totalQuestions) {
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalQuestions * 0.5) { // 50% threshold for "good"
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
        
        document.getElementById('business-math-quiz-form').addEventListener('submit', function(e) {
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
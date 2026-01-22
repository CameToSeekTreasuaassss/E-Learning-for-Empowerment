<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Business Mathematics 2</title>
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
            text-align: left;
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
        
        /* Table Styles (Added for consistency) */
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
                    <!-- Added data-i18n attributes to outline links -->
                    <a href="#objectives" class="outline-link" data-i18n="outline_objectives">Objectives</a>
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Calculating Profit and Loss</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Balance Sheet and Income Statement</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Budgeting and Future Growth</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Business Mathematics 2</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Calculating Profit, Loss, Balance, and Budget Planning.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Confirmed: List items font size is set to 1.25rem (20px) -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Calculate <b>profit</b>, <b>loss</b>, and <b>net income</b>.</li>
                        <li data-i18n="obj_2">Prepare a <b>Balance Sheet</b> and <b>Income Statement</b>.</li>
                        <li data-i18n="obj_3">Prepare and monitor a <b>budget</b>.</li>
                        <li data-i18n="obj_4">Estimate the business's <b>future growth</b>.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Pagtutuos ng Tinubo at Pagkalugi -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Calculating Profit and Loss</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">Business profit is determined by the difference between sales revenue and total expenses.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Gross Profit</h3>
                            <p data-i18n="aralin1_p2">This is the profit from sales before subtracting other expenses.</p>
                            <div class="math-formula" data-i18n="aralin1_formula1">
                                <span>Gross Profit = Sales Revenue - Cost of Goods Sold (COGS)</span>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Net Income or Loss</h3>
                            <p data-i18n="aralin1_p3">This is the true earnings of the business after subtracting all expenses.</p>
                            <div class="math-formula" data-i18n="aralin1_formula2">
                                <span>Net Income = Total Sales - All Expenses</span>
                            </div>

                            <p data-i18n="aralin1_p4"><b>Expenses</b> include <b>Operating Expenses</b> (overhead, rent, salary) and <b>Selling Expenses</b> (delivery, transportation).</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">Profit Analysis:</p>
                                <ul class="list-disc list-inside ml-4 space-y-1">
                                    <li data-i18n="aralin1_ex1_l1">If Net Income is <b>Positive</b>: The business has a <b>Profit (Tubo)</b>.</li>
                                    <li data-i18n="aralin1_ex1_l2">If Net Income is <b>Zero (0)</b>: The business is at <b>Break-even (Nakabawi)</b>.</li>
                                    <li data-i18n="aralin1_ex1_l3">If Net Income is <b>Negative</b>: The business incurred a <b>Loss (Nalugi)</b>.</li>
                                </ul>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Paghahanda ng Balance Sheet at Pahayag ng Kita -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Balance Sheet and Income Statement Preparation</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">1. Balance Sheet (Statement of Financial Position)</h3>
                            <p data-i18n="aralin2_p1">This shows the <b>financial status</b> of the business on a <b>specific date</b>. It is based on the following accounting equation:</p>
                                                        <div class="math-formula" data-i18n="aralin2_formula">
                                <span>Assets = Liabilities + Owner's Equity</span>
                            </div>
                            
                            <h4 class="font-semibold mt-3" data-i18n="aralin2_h4_1">Components:</h4>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin2_l1"><b>Assets (Ari-arian)</b>: All property owned by the business (e.g., Cash, Inventory, Office Equipment).</li>
                                <li data-i18n="aralin2_l2"><b>Liabilities (Obligasyon)</b>: All debts of the business (e.g., Accounts Payable, Notes Payable).</li>
                                <li data-i18n="aralin2_l3"><b>Owner's Equity (Ekidad ng May-ari)</b>: The remaining financial interest of the owner (Capital + Net Income).</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">2. Income Statement (Pahayag ng Kita)</h3>
                            <p data-i18n="aralin2_p2">This is a report showing the business's <b>profit</b> or <b>loss</b> over a <b>specific period</b> (weekly, monthly).</p>
                            
                            <h4 class="font-semibold mt-3" data-i18n="aralin2_h4_2">Flow:</h4>
                            <ol class="list-decimal list-inside ml-4 space-y-1">
                                <li data-i18n="aralin2_ol1"><b>Sales</b>: Total sales revenue.</li>
                                <li data-i18n="aralin2_ol2"><b>Less: Cost of Goods Sold (COGS)</b>: Cost of purchased/produced goods.</li>
                                <li data-i18n="aralin2_ol3"><b>Result: Gross Profit (Kabuuang Kita)</b></li>
                                <li data-i18n="aralin2_ol4"><b>Less: Selling and Administrative Expenses</b>: All operating expenses.</li>
                                <li data-i18n="aralin2_ol5"><b>Result: Net Income (Netong Kita)</b></li>
                            </ol>
                        </div>
                    </details>
                    
                    <!-- ARALIN 3: Paghahanda ng Badyet at Pagtatantiya ng Pag-unlad -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Budgeting and Future Growth</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Budget Preparation</h3>
                            <p data-i18n="aralin3_p1">A <b>Budget</b> is a business plan over a period. It is prepared to control expenses and prevent <b>overspending</b>.</p>

                            <h4 class="font-semibold mt-3" data-i18n="aralin3_h4_1">Monitoring:</h4>
                            <p data-i18n="aralin3_p2">Budget monitoring is done by comparing <b>actual expenses</b> to <b>expected income</b>. If income is too low, the budget needs adjustment (e.g., reduce ingredients or raise prices).</p>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex1_title">Monitoring Guidelines:</p>
                                <p data-i18n="aralin3_ex1_p1">The <b>Income Statement</b> must be reviewed weekly or monthly to determine if the business is profitable or incurring losses. This review will guide necessary budget changes.</p>
                            </div>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">Estimating Future Growth</h3>
                            <p data-i18n="aralin3_p3"><b>Business Growth</b> depends on having a <b>large Net Income</b> and reinvesting part of this profit as <b>Capital</b> or <b>Initial Inventory</b>.</p>
                            <p data-i18n="aralin3_p4">If the business continuously incurs losses, it is not a sign of healthy growth.</p>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Solve the following problems based on the lessons.</p>

                    <form id="business-math-quiz-form-part2" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Income and Cost</p>
                            <div class="space-y-4">
                                <!-- Removed mx-auto from inputs and added w-full/w-64 -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. Net Income: Sales P5,000, Product Cost P4,200, Expenses P800. What is the <b>Net Income</b>?</label>
                                    <input type="text" id="qa1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (P)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. COGS: Beginning Inventory P4,500, Purchases P600, Ending Inventory P2,000. What is the <b>Cost of Goods Sold</b>?</label>
                                    <input type="text" id="qa2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (P)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Financial Statements</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1" class="font-medium" data-i18n="qb1_label">3. Balance Sheet: Capital P20,000, Net Income P5,400. What is the <b>Total Owner's Equity</b>?</label>
                                    <input type="text" id="qb1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qb1_placeholder" placeholder="Answer (P)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2" class="font-medium" data-i18n="qb2_label">4. Balance Sheet: Cash P6,000, Inventory P5,500, Office Equipment P12,000. What are the <b>Total Assets</b>?</label>
                                    <input type="text" id="qb2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qb2_placeholder" placeholder="Answer (P)">
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
                outline_aralin1: "Lesson 1: Calculating Profit and Loss",
                outline_aralin2: "Lesson 2: Balance Sheet and Income Statement",
                outline_aralin3: "Lesson 3: Budgeting and Future Growth",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Business Mathematics 2",
                h1_subtitle: "Calculating Profit, Loss, Balance, and Budget Planning.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Calculate <b>profit</b>, <b>loss</b>, and <b>net income</b>.",
                obj_2: "Prepare a <b>Balance Sheet</b> and <b>Income Statement</b>.",
                obj_3: "Prepare and monitor a <b>budget</b>.",
                obj_4: "Estimate the business's <b>future growth</b>.",

                // Lesson 1 Content (Profit/Loss)
                aralin1_title: "Lesson 1: Calculating Profit and Loss",
                aralin1_p1: "Business profit is determined by the difference between sales revenue and total expenses.",
                aralin1_h3_1: "Gross Profit",
                aralin1_p2: "This is the profit from sales before subtracting other expenses.",
                aralin1_formula1: "Gross Profit = Sales Revenue - Cost of Goods Sold (COGS)",
                aralin1_h3_2: "Net Income or Loss",
                aralin1_p3: "This is the true earnings of the business after subtracting all expenses.",
                aralin1_formula2: "Net Income = Total Sales - All Expenses",
                aralin1_p4: "<b>Expenses</b> include <b>Operating Expenses</b> (overhead, rent, salary) and <b>Selling Expenses</b> (delivery, transportation).",
                aralin1_ex1_title: "Profit Analysis:",
                aralin1_ex1_l1: "If Net Income is <b>Positive</b>: The business has a <b>Profit (Tubo)</b>.",
                aralin1_ex1_l2: "If Net Income is <b>Zero (0)</b>: The business is at <b>Break-even (Nakabawi)</b>.",
                aralin1_ex1_l3: "If Net Income is <b>Negative</b>: The business incurred a <b>Loss (Nalugi)</b>.",

                // Lesson 2 Content (Statements)
                aralin2_title: "Lesson 2: Balance Sheet and Income Statement Preparation",
                aralin2_h3_1: "1. Balance Sheet (Statement of Financial Position)",
                aralin2_p1: "This shows the <b>financial status</b> of the business on a <b>specific date</b>. It is based on the following accounting equation:",
                aralin2_formula: "Assets = Liabilities + Owner's Equity",
                aralin2_h4_1: "Components:",
                aralin2_l1: "<b>Assets (Ari-arian)</b>: All property owned by the business (e.g., Cash, Inventory, Office Equipment).",
                aralin2_l2: "<b>Liabilities (Obligasyon)</b>: All debts of the business (e.g., Accounts Payable, Notes Payable).",
                aralin2_l3: "<b>Owner's Equity (Ekidad ng May-ari)</b>: The remaining financial interest of the owner (Capital + Net Income).",
                aralin2_h3_2: "2. Income Statement (Pahayag ng Kita)",
                aralin2_p2: "This is a report showing the business's <b>profit</b> or <b>loss</b> over a <b>specific period</b> (weekly, monthly).",
                aralin2_h4_2: "Flow:",
                aralin2_ol1: "<b>Sales</b>: Total sales revenue.",
                aralin2_ol2: "<b>Less: Cost of Goods Sold (COGS)</b>: Cost of purchased/produced goods.",
                aralin2_ol3: "<b>Result: Gross Profit (Kabuuang Kita)</b>",
                aralin2_ol4: "<b>Less: Selling and Administrative Expenses</b>: All operating expenses.",
                aralin2_ol5: "<b>Result: Net Income (Netong Kita)</b>",

                // Lesson 3 Content (Budgeting)
                aralin3_title: "Lesson 3: Budgeting and Future Growth",
                aralin3_h3_1: "Budget Preparation",
                aralin3_p1: "A <b>Budget</b> is a business plan over a period. It is prepared to control expenses and prevent <b>overspending</b>.",
                aralin3_h4_1: "Monitoring:",
                aralin3_p2: "Budget monitoring is done by comparing <b>actual expenses</b> to <b>expected income</b>. If income is too low, the budget needs adjustment (e.g., reduce ingredients or raise prices).",
                aralin3_ex1_title: "Monitoring Guidelines:",
                aralin3_ex1_p1: "The <b>Income Statement</b> must be reviewed weekly or monthly to determine if the business is profitable or incurring losses. This review will guide necessary budget changes.",
                aralin3_h3_2: "Estimating Future Growth",
                aralin3_p3: "<b>Business Growth</b> depends on having a <b>large Net Income</b> and reinvesting part of this profit as <b>Capital</b> or <b>Initial Inventory</b>.",
                aralin3_p4: "If the business continuously incurs losses, it is not a sign of healthy growth.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Solve the following problems based on the lessons.",
                quiz_section1_title: "A. Income and Cost",
                qa1_label: "1. Net Income: Sales P5,000, Product Cost P4,200, Expenses P800. What is the <b>Net Income</b>?",
                qa1_placeholder: "Answer (P)",
                qa2_label: "2. COGS: Beginning Inventory P4,500, Purchases P600, Ending Inventory P2,000. What is the <b>Cost of Goods Sold</b>?",
                qa2_placeholder: "Answer (P)",
                quiz_section2_title: "B. Financial Statements",
                qb1_label: "3. Balance Sheet: Capital P20,000, Net Income P5,400. What is the <b>Total Owner's Equity</b>?",
                qb1_placeholder: "Answer (P)",
                qb2_label: "4. Balance Sheet: Cash P6,000, Inventory P5,500, Office Equipment P12,000. What are the <b>Total Assets</b>?",
                qb2_placeholder: "Answer (P)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). Your knowledge of business financial analysis is excellent!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the Balance Sheet and Income Statement components.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Review the calculation of Net Income and the Accounting Equation.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pagtutuos ng Tinubo at Pagkalugi",
                outline_aralin2: "Aralin 2: Balance Sheet at Pahayag ng Kita",
                outline_aralin3: "Aralin 3: Badyet at Pag-unlad sa Hinaharap",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Matematikang Pangkalakal 2",
                h1_subtitle: "Pagtutuos ng Tinubo, Pagkalugi, Balanse, at Pagplano ng Badyet.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Tuusin ang <b>kita</b> (profit), <b>pagkalugi</b> (loss), at <b>netong kita</b> (net income).",
                obj_2: "Maghanda ng <b>Balance Sheet</b> at <b>Pahayag ng Kita</b> (Income Statement).",
                obj_3: "Maghanda at subaybayan ang <b>badyet</b> (budget).",
                obj_4: "Magtantiya ang <b>pag-unlad</b> sa hinaharap ng negosyo.",

                // Lesson 1 Content (Profit/Loss)
                aralin1_title: "Aralin 1: Pagtutuos ng Tinubo at Pagkalugi",
                aralin1_p1: "Ang kita ng negosyo ay makikita sa pagkakaiba ng halaga ng benta at ng kabuuang gastusin.",
                aralin1_h3_1: "Kabuuang Kita (Gross Profit)",
                aralin1_p2: "Ito ang tubo mula sa pagbebenta bago ibawas ang iba pang gastos.",
                aralin1_formula1: "Kabuuang Kita = Halaga ng Paninda (Presyo ng Benta) - Halaga ng Pagkakabili (COGS)",
                aralin1_h3_2: "Netong Kita o Pagkalugi",
                aralin1_p3: "Ito ang tunay na kinikita ng negosyo matapos ibawas ang lahat ng gastusin.",
                aralin1_formula2: "Netong Kita = Kabuuang Benta - Lahat ng Gastos",
                aralin1_p4: "Ang <b>Gastusin</b> ay binubuo ng <b>Gastos sa Pagpapalakad</b> (overhead, upa, sahod) at <b>Gastos sa Pagbebenta</b> (delivery, transportasyon).",
                aralin1_ex1_title: "Pagsusuri ng Kita:",
                aralin1_ex1_l1: "Kung ang Netong Kita ay <b>Positibo</b>: May <b>Kita (Profit/Tubo)</b> ang negosyo.",
                aralin1_ex1_l2: "Kung ang Netong Kita ay <b>Sero (0)</b>: Ang negosyo ay <b>Nakabawi (Break-even)</b>.",
                aralin1_ex1_l3: "Kung ang Netong Kita ay <b>Negatibo</b>: Ang negosyo ay <b>Nalugi (Loss)</b>.",

                // Lesson 2 Content (Statements)
                aralin2_title: "Aralin 2: Paghahanda ng Balance Sheet at Pahayag ng Kita",
                aralin2_h3_1: "1. Balance Sheet (Pahayag ng Balanse)",
                aralin2_p1: "Ito ay nagpapakita ng <b>pinansyal na kalagayan</b> ng negosyo sa <b>isang tiyak na petsa</b>. Ito ay batay sa sumusunod na accounting equation:",
                aralin2_formula: "Ari-arian = Obligasyon + Ekidad ng May-ari",
                aralin2_h4_1: "Mga Bahagi:",
                aralin2_l1: "<b>Ari-arian (Assets)</b>: Lahat ng pag-aari ng negosyo (Hal: Salaping Hawak, Imbentaryo, Gamit sa Opisina).",
                aralin2_l2: "<b>Obligasyon (Liabilities)</b>: Lahat ng utang ng negosyo (Hal: Utang na Babayaran, Notes Payable).",
                aralin2_l3: "<b>Ekidad ng May-ari (Owner's Equity)</b>: Ang natitirang pinansyal na interes ng may-ari (Kapital + Netong Kita).",
                aralin2_h3_2: "2. Pahayag ng Kita (Income Statement)",
                aralin2_p2: "Ito ay ulat na nagpapakita kung magkano ang <b>tubo</b> o <b>lugi</b> ng negosyo sa loob ng isang <b>tiyak na panahon</b> (lingguhan, buwanan).",
                aralin2_h4_2: "Sirkulasyon:",
                aralin2_ol1: "<b>Naipagbili (Sales)</b>: Kabuuang halaga ng benta.",
                aralin2_ol2: "<b>Ibawas: Halaga ng Produktong Naipagbili (COGS)</b>: Halaga ng biniling produkto.",
                aralin2_ol3: "<b>Resulta: Kabuuang Kita (Gross Profit)</b>",
                aralin2_ol4: "<b>Ibawas: Gastusin sa Pagtitinda at Pangangasiwa</b>: Lahat ng operating expenses.",
                aralin2_ol5: "<b>Resulta: Netong Kita (Net Income)</b>",

                // Lesson 3 Content (Budgeting)
                aralin3_title: "Aralin 3: Paghahanda ng Badyet at Pag-unlad sa Hinaharap",
                aralin3_h3_1: "Paghahanda ng Badyet (Budget)",
                aralin3_p1: "Ang <b>Badyet</b> ay isang plano sa negosyo sa loob ng isang panahon. Ginagawa ito upang makontrol ang gastos at maiwasan ang <b>sobrang paggastos</b>.",
                aralin3_h4_1: "Pagsubaybay (Monitoring):",
                aralin3_p2: "Ang pagsubaybay sa badyet ay ginagawa sa pamamagitan ng paghahambing ng <b>aktuwal na gastos</b> sa <b>inaasahang kita</b>. Kung masyadong mababa ang kita, kailangang ayusin ang badyet (hal. bawasan ang sangkap o itaas ang presyo).",
                aralin3_ex1_title: "Patnubay sa Pagsubaybay:",
                aralin3_ex1_p1: "Kinakailangang suriin ang <b>Pahayag ng Kita</b> lingguhan o buwanan upang makita kung ang negosyo ay tumutubo o nalulugi. Ang pagbabalik-aral na ito ang magsasabi kung kailangang baguhin ang badyet.",
                aralin3_h3_2: "Pagtatantiya ng Paglago (Future Growth)",
                aralin3_p3: "Ang <b>Paglago ng Negosyo</b> ay nakasalalay sa pagkakaroon ng <b>malaking Netong Kita</b> at ang pagbabalik ng bahagi ng tubong ito bilang <b>Kapital</b> o <b>Panimulang Imbentaryo</b>.",
                aralin3_p4: "Kung ang negosyo ay patuloy na nalulugi, hindi ito senyales ng magandang paglago.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Lutasin ang sumusunod na problema batay sa mga aralin.",
                quiz_section1_title: "A. Kita at Gastusin",
                qa1_label: "1. Netong Kita: Benta P5,000, Halaga ng Produkto P4,200, Gastusin P800. Magkano ang <b>Netong Kita</b>?",
                qa1_placeholder: "Sagot (P)",
                qa2_label: "2. Halaga ng Naipagbili: Panimulang Imbentaryo P4,500, Pinamili P600, Huling Imbentaryo P2,000. Ano ang <b>Halaga ng Naipagbili</b>?",
                qa2_placeholder: "Sagot (P)",
                quiz_section2_title: "B. Pinansyal na Pahayag",
                qb1_label: "3. Balance Sheet: Kapital P20,000, Netong Kita P5,400. Magkano ang <b>Kabuuang Ekidad ng May-ari</b>?",
                qb1_placeholder: "Sagot (P)",
                qb2_label: "4. Balance Sheet: Salaping Hawak P6,000, Imbentaryo P5,500, Gamit sa Opisina P12,000. Magkano ang <b>Kabuuang Ari-arian</b>?",
                qb2_placeholder: "Sagot (P)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Ang iyong kaalaman sa pag-analisa ng lagay pinansyal ng negosyo ay mahusay!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga bahagi ng Balance Sheet at Pahayag ng Kita.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Pag-aralan ulit ang pagtutuos ng Netong Kita at ang Accounting Equation.`,
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
            
            // Q1: Net Income = Sales - Product Cost - Expenses. 5000 - 4200 - 800 = 0
            const ans_a1 = 0; 
            
            // Q2: Halaga ng Naipagbili (COGS) = Panimulang + Pinamili - Huling. 4500 + 600 - 2000 = 3100
            const ans_a2 = 3100;

            // Q3: Ekidad ng May-ari = Kapital + Netong Kita. 20000 + 5400 = 25400
            const ans_b1 = 25400;
            
            // Q4: Kabuuang Ari-arian = Salaping Hawak + Imbentaryo + Gamit sa Opisina. 6000 + 5500 + 12000 = 23500
            const ans_b2 = 23500;

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
        
        document.getElementById('business-math-quiz-form-part2').addEventListener('submit', function(e) {
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
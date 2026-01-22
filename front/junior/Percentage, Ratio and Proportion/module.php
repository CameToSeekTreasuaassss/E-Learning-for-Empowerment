<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Percentage, Ratio, and Proportion</title>
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
            text-align: left; 
            font-size: 1.25rem; /* 20px - Formula Text Size */
            font-weight: bold;
            color: #059669;
            background-color: #ecfdf5;
            border-radius: 0.5rem;
            border: 1px dashed #a7f3d0;
            font-family: 'Inter', sans-serif;
            overflow-x: auto;
            line-height: 2; 
        }
        /* CHANGE: Ensure each formula span is on its own line */
        .math-formula span { 
            white-space: nowrap; 
            display: block;
            margin-bottom: 0.25rem; /* slight vertical space between lines */
        } 

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

        /* Custom class to force vertical stacking within the grid column */
        .vertical-stack {
            display: flex;
            flex-direction: column;
            align-items: center; 
            text-align: center;
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
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Solving Percentage Problems</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Solving Ratio and Proportion Problems</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Percentage, Ratio, and Proportion</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Application in Discounts, Commissions, Interest, and Currency Conversion.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Solve problems about <b>Commission</b>, <b>Discount</b>, and <b>Simple Interest</b>.</li>
                        <li data-i18n="obj_2">Use <b>Ratio</b> and <b>Proportion</b> in Currency Conversion.</li>
                        <li data-i18n="obj_3">Use Proportion in <b>Indirect Measurement</b> (calculating the height of a building or width of a river).</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Paglutas ng Problema sa Percentage -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Solving Percentage Problems</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">There are three general formulas used to solve percentage problems:</p>
                            
                            <!-- Formulas for Percentage -->
                            <div class="math-formula">
                                <span data-i18n="aralin1_f1">1. Finding Percentage (P): P = B x r</span>
                                <span data-i18n="aralin1_f2">2. Finding Base (B) or Original Amount: B = P / r</span>
                                <span data-i18n="aralin1_f3">3. Finding Rate (r): r = (P / B) x 100%</span>
                            </div>
                                                        
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">The 5-6 Scheme and Simple Interest</h3>
                            <p data-i18n="aralin1_p2">The <b>5-6 Scheme</b> is an informal loan system with a **20%** interest (P6 is 120% of P5). Therefore, the total amount payable (A) is **120%** of the amount borrowed (Principal).</p>

                            <p data-i18n="aralin1_p3">The following formula is used for <b>Simple Interest</b> (Interest in banks or formal loans):</p>
                            <p class="math-formula" data-i18n="aralin1_f4">I = P x r x t</p>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin1_l1"><b>I</b>: Interest</li>
                                <li data-i18n="aralin1_l2"><b>P</b>: Principal (Original Amount)</li>
                                <li data-i18n="aralin1_l3"><b>r</b>: Rate (Interest Rate, must be in decimal form)</li>
                                <li data-i18n="aralin1_l4"><b>t</b>: Time (Duration of the loan or deposit, must be in years)</li>
                            </ul>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE: Simple Interest (Loan)</p>
                                <p data-i18n="aralin1_ex1_p1">Mrs. Santos borrowed <b>P15,000</b> (P) at a <b>9%</b> (r) simple interest rate for <b>1.5 years</b> (t).</p>
                                <p class="math-formula" data-i18n="aralin1_ex1_f1">I = 15,000 x 0.09 x 1.5 = <b>P2,025</b> (Interest)</p>
                                <p data-i18n="aralin1_ex1_p2">Total Payment = P15,000 + P2,025 = <b>P17,025</b></p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Paglutas ng Problema sa Ratio at Proporsyon -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Solving Ratio and Proportion Problems</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1"><b>Ratio</b> and <b>Proportion</b> are used to relate two different ratios that have equal value. A <b>Proportion</b> is written as <b>a : b = c : d</b>.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">A. Currency Conversion</h3>
                            <p data-i18n="aralin2_p2">Converting currency is done by relating the exchange rate to the amount you want to convert.</p>
                            <div class="math-formula" data-i18n="aralin2_f1">
                                <span>Exchange Rate (Foreign : Peso) = Amount to Convert (Foreign : Peso)</span>
                            </div>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">EXAMPLE: Convert 280 Pounds (1 Pound = P70.73)</p>
                                <p class="math-formula" data-i18n="aralin2_ex1_f1">1 : 70.73 = 280 : N</p>
                                <p data-i18n="aralin2_ex1_p1">Product of Means = Product of Extremes</p>
                                <p class="math-formula" data-i18n="aralin2_ex1_f2">70.73 x 280 = 1 x N</p>
                                <p data-i18n="aralin2_ex1_p2">N = <b>P19,804.40</b></p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">B. Indirect Measurement</h3>
                            <p data-i18n="aralin2_p3">The principle of proportion is used (using shadow or proportional triangles) to measure objects that are difficult to reach (buildings, river width).</p>
                            <div class="math-formula" data-i18n="aralin2_f2">
                                <span>Ratio of Height / Shadow of Object 1 = Ratio of Height / Shadow of Object 2</span>
                            </div>
                                                    </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Solve the following problems. Write the answer in number form only, without units (Use two decimal places for currency).</p>

                    <form id="propo-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Percentage Problems</p>
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                                <div class="vertical-stack space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. Alex has a commission of P2,325 at a 15% rate. What is the Total Sales (Base)?</label>
                                    <input type="text" id="qa1" class="quiz-input" data-i18n-placeholder="qa1_placeholder" placeholder="Sales (P)">
                                </div>
                                <div class="vertical-stack space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. Aling Senya borrowed P12,400 under the 5-6 scheme (20% interest). What is the Total Payment?</label>
                                    <input type="text" id="qa2" class="quiz-input" data-i18n-placeholder="qa2_placeholder" placeholder="Total Payment (P)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Ratio and Proportion</p>
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                                <div class="vertical-stack space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. Mang Danny sent 280 Pounds. (1 Pound = P70.73). How much was received in Pesos?</label>
                                    <input type="text" id="qa3" class="quiz-input" data-i18n-placeholder="qa3_placeholder" placeholder="Pesos">
                                </div>
                                <div class="vertical-stack space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. A 16 ft statue has a 4 ft shadow. How tall is a building with a 12.5 ft shadow?</label>
                                    <input type="text" id="qa4" class="quiz-input" data-i18n-placeholder="qa4_placeholder" placeholder="Height (ft)">
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
                outline_aralin1: "Lesson 1: Solving Percentage Problems",
                outline_aralin2: "Lesson 2: Solving Ratio and Proportion Problems",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Percentage, Ratio, and Proportion",
                h1_subtitle: "Application in Discounts, Commissions, Interest, and Currency Conversion.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Solve problems about <b>Commission</b>, <b>Discount</b>, and <b>Simple Interest</b>.",
                obj_2: "Use <b>Ratio</b> and <b>Proportion</b> in Currency Conversion.",
                obj_3: "Use Proportion in <b>Indirect Measurement</b> (calculating the height of a building or width of a river).",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Solving Percentage Problems",
                aralin1_p1: "There are three general formulas used to solve percentage problems:",
                aralin1_f1: "1. Finding Percentage (P): P = B x r",
                aralin1_f2: "2. Finding Base (B) or Original Amount: B = P / r",
                aralin1_f3: "3. Finding Rate (r): r = (P / B) x 100%",
                aralin1_h3_1: "The 5-6 Scheme and Simple Interest",
                aralin1_p2: "The <b>5-6 Scheme</b> is an informal loan system with a <b>20%</b> interest (P6 is 120% of P5). Therefore, the total amount payable (A) is <b>120%</b> of the amount borrowed (Principal).",
                aralin1_p3: "The following formula is used for <b>Simple Interest</b> (Interest in banks or formal loans):",
                aralin1_f4: "I = P x r x t",
                aralin1_l1: "<b>I</b>: Interest",
                aralin1_l2: "<b>P</b>: Principal (Original Amount)",
                aralin1_l3: "<b>r</b>: Rate (Interest Rate, must be in decimal form)",
                aralin1_l4: "<b>t</b>: Time (Duration of the loan or deposit, must be in years)",
                aralin1_ex1_title: "EXAMPLE: Simple Interest (Loan)",
                aralin1_ex1_p1: "Mrs. Santos borrowed <b>P15,000</b> (P) at a <b>9%</b> (r) simple interest rate for <b>1.5 years</b> (t).",
                aralin1_ex1_f1: "I = 15,000 x 0.09 x 1.5 = <b>P2,025</b> (Interest)",
                aralin1_ex1_p2: "Total Payment = P15,000 + P2,025 = <b>P17,025</b>",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Solving Ratio and Proportion Problems",
                aralin2_p1: "<b>Ratio</b> and <b>Proportion</b> are used to relate two different ratios that have equal value. A <b>Proportion</b> is written as <b>a : b = c : d</b>.",
                aralin2_h3_1: "A. Currency Conversion",
                aralin2_p2: "Converting currency is done by relating the exchange rate to the amount you want to convert.",
                aralin2_f1: "Exchange Rate (Foreign : Peso) = Amount to Convert (Foreign : Peso)",
                aralin2_ex1_title: "EXAMPLE: Convert 280 Pounds (1 Pound = P70.73)",
                aralin2_ex1_f1: "1 : 70.73 = 280 : N",
                aralin2_ex1_p1: "Product of Means = Product of Extremes",
                aralin2_ex1_f2: "70.73 x 280 = 1 x N",
                aralin2_ex1_p2: "N = <b>P19,804.40</b>",
                aralin2_h3_2: "B. Indirect Measurement",
                aralin2_p3: "The principle of proportion is used (using shadow or proportional triangles) to measure objects that are difficult to reach (buildings, river width).",
                aralin2_f2: "Ratio of Height / Shadow of Object 1 = Ratio of Height / Shadow of Object 2",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Solve the following problems. Write the answer in number form only, without units (Use two decimal places for currency).",
                quiz_section1_title: "A. Percentage Problems",
                qa1_label: "1. Alex has a commission of P2,325 at a 15% rate. What is the Total Sales (Base)?",
                qa1_placeholder: "Sales (P)",
                qa2_label: "2. Aling Senya borrowed P12,400 under the 5-6 scheme (20% interest). What is the Total Payment?",
                qa2_placeholder: "Total Payment (P)",
                quiz_section2_title: "B. Ratio and Proportion",
                qa3_label: "3. Mang Danny sent 280 Pounds. (1 Pound = P70.73). How much was received in Pesos?",
                qa3_placeholder: "Pesos",
                qa4_label: "4. A 16 ft statue has a 4 ft shadow. How tall is a building with a 12.5 ft shadow?",
                qa4_placeholder: "Height (ft)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered percentage and proportion!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review the formulas for percentage and proportion.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the entire module.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Paglutas ng Problema sa Percentage",
                outline_aralin2: "Aralin 2: Paglutas ng Problema sa Ratio at Proporsyon",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Percentage, Ratio at Proporsyon",
                h1_subtitle: "Aplikasyon sa Discounts, Commissions, Interest, at Currency Conversion.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Lutasin ang mga problema tungkol sa <b>Commission</b>, <b>Discount</b>, at <b>Simple Interest</b>.",
                obj_2: "Gumamit ng <b>Ratio</b> at <b>Proporsyon</b> sa Currency Conversion.",
                obj_3: "Gamitin ang Proporsyon sa <b>Indirect Measurement</b> (pagsukat ng taas ng gusali o lapad ng ilog).",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Paglutas ng Problema sa Percentage",
                aralin1_p1: "May tatlong pangkalahatang formula na ginagamit sa paglutas ng mga problema sa percentage:",
                aralin1_f1: "1. Paghahanap ng Percentage (P): P = B x r",
                aralin1_f2: "2. Paghahanap ng Base (B) o Original Amount: B = P / r",
                aralin1_f3: "3. Paghahanap ng Rate (r): r = (P / B) x 100%",
                aralin1_h3_1: "Ang 5-6 Scheme at Simpleng Interes",
                aralin1_p2: "Ang <b>5-6 Scheme</b> ay isang impormal na pagpapautang na mayroong <b>20%</b> na interes (Ang P6 ay 120% ng P5). Samakatuwid, ang kabuuang babayaran (A) ay <b>120%</b> ng hiniram (Principal).",
                aralin1_p3: "Ginagamit naman ang formula na ito para sa <b>Simple Interest</b> (Interes sa bangko o pormal na pautang):",
                aralin1_f4: "I = P x r x t",
                aralin1_l1: "<b>I</b>: Interes",
                aralin1_l2: "<b>P</b>: Principal (Original Amount)",
                aralin1_l3: "<b>r</b>: Rate (Interest Rate, dapat naka-decimal)",
                aralin1_l4: "<b>t</b>: Time (Duration ng pautang o deposit, dapat naka-taon)",
                aralin1_ex1_title: "HALIMBAWA: Simple Interest (Loan)",
                aralin1_ex1_p1: "Inutang ni Mrs. Santos ang <b>P15,000</b> (P) sa <b>9%</b> (r) simple interest sa loob ng <b>1.5 taon</b> (t).",
                aralin1_ex1_f1: "I = 15,000 x 0.09 x 1.5 = <b>P2,025</b> (Interes)",
                aralin1_ex1_p2: "Kabuuang Bayad = P15,000 + P2,025 = <b>P17,025</b>",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Paglutas ng Problema sa Ratio at Proporsyon",
                aralin2_p1: "Ginagamit ang <b>Ratio</b> at <b>Proporsyon</b> (Proportion) para mag-ugnay ng dalawang magkaibang ratio na may pantay na halaga. Ang <b>Proportion</b> ay isinusulat bilang <b>a : b = c : d</b>.",
                aralin2_h3_1: "A. Currency Conversion",
                aralin2_p2: "Ang pag-convert ng pera ay ginagawa sa pamamagitan ng pag-uugnay ng exchange rate sa halagang gustong i-convert.",
                aralin2_f1: "Exchange Rate (Foreign : Peso) = Amount to Convert (Foreign : Peso)",
                aralin2_ex1_title: "HALIMBAWA: Convert 280 Pounds (1 Pound = P70.73)",
                aralin2_ex1_f1: "1 : 70.73 = 280 : N",
                aralin2_ex1_p1: "Product of Means = Product of Extremes",
                aralin2_ex1_f2: "70.73 x 280 = 1 x N",
                aralin2_ex1_p2: "N = <b>P19,804.40</b>",
                aralin2_h3_2: "B. Indirect Measurement",
                aralin2_p3: "Ginagamit ang prinsipyo ng proporsyon (gamit ang anino o proportional triangles) para sukatin ang mga bagay na mahirap abutin (gusali, lapad ng ilog).",
                aralin2_f2: "Ratio ng Taas / Anino ng Object 1 = Ratio ng Taas / Anino ng Object 2",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Lutasin ang mga sumusunod. Isulat ang sagot nang naka-numero lamang, walang unit (Gumamit ng dalawang decimal places para sa pera).",
                quiz_section1_title: "A. Percentage Problems",
                qa1_label: "1. Si Alex ay may commission na P2,325 sa 15% rate. Magkano ang Total Sales (Base)?",
                qa1_placeholder: "Sales (P)",
                qa2_label: "2. Inutang ni Aling Senya ang P12,400 sa 5-6 scheme (20% interes). Magkano ang Total na Babayaran?",
                qa2_placeholder: "Total Bayad (P)",
                quiz_section2_title: "B. Ratio at Proporsyon",
                qa3_label: "3. Nagpadala si Mang Danny ng 280 Pounds. (1 Pound = P70.73). Magkano ang natanggap sa Pesos?",
                qa3_placeholder: "Pesos",
                qa4_label: "4. Isang 16 ft na estatwa ay may 4 ft na anino. Gaano kataas ang gusali na may 12.5 ft na anino?",
                qa4_placeholder: "Taas (ft)",
                quiz_button: "Tapusin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang percentage at proporsyon!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang mga formula ng percentage at proporsyon.`,
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
        const sections = ['objectives', 'aralin1', 'aralin2', 'pagsasanay'];
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
            // Remove all non-numeric/non-decimal/non-negative characters, and replace comma with dot
            value = value.trim().replace(',', '.').replace(/[^\d.\-]/g, ''); 
            const parsedValue = parseFloat(value);
            // Use 0 if NaN to prevent errors in calculations
            return isNaN(parsedValue) ? 0 : parsedValue;
        }

        // Function to check answer, specifically handling rounding for float/decimal
        function checkAnswer(id, expected, tolerance = 0.01) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            const inputFloat = standardizeFloat(rawValue);
            const expectedFloat = standardizeFloat(String(expected));
            
            // Use a slight tolerance for currency/float comparisons
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

        // --- QUIZ LOGIC ---
        document.getElementById('propo-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); 
        });
        
        /**
         * Submits the quiz and calculates the score.
         * @param {boolean} isLanguageToggle - True if called only to refresh results language.
         */
        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 4; 
            const resultsDiv = document.getElementById('results');
            
            // Expected Calculations:
            // 1. Alex's commission: P2,325 (P) / 0.15 (r) = 15,500
            const ans_a1 = 15500;
            
            // 2. Aling Senya: 12,400 * 1.20 (120% for 5-6 scheme) = 14,880
            const ans_a2 = 14880; 
            
            // 3. Mang Danny: 280 * 70.73 = 19,804.40
            const ans_a3 = 19804.4; 

            // 4. Taas / Anino = Taas / Anino -> 16 / 4 = N / 12.5 -> 4 = N / 12.5 -> N = 50
            const ans_a4 = 50;

            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1', ans_a1, 0.01); 
                correctCount += checkAnswer('qa2', ans_a2, 0.01); 
                correctCount += checkAnswer('qa3', ans_a3, 0.01); // Pera check (2 decimal places)
                correctCount += checkAnswer('qa4', ans_a4, 0.01); 
                
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
            } else if (correctCount >= totalQuestions * 0.5) {
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
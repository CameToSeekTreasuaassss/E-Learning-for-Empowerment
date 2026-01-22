<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Interpreting Electric Bills and Meters</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
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
        .content-box p, 
        .content-box ul li, 
        .content-box ol li,
        .example-box p,
        #objectives ul li { 
            /* 20px - Standard Text for Paragraphs, Lists, and Example Boxes */
            font-size: 1.25rem; 
            line-height: 1.75;
            color: #4b5563;
        }
        
        /* Adjusted spacing for paragraphs and lists */
        .content-box p { margin-bottom: 1.5rem; }
        .content-box ul:not(#objectives ul), .content-box ol { margin-left: 1.5rem; margin-bottom: 1.5rem; }

        /* FIX: Objectives list spacing */
        #objectives ul li {
            margin-bottom: 0.5rem; /* Reduced spacing for tighter list */
        }
        
        /* Ensure example box content inherits 20px */
        .content-box .example-box {
            padding: 1.5rem; 
            margin-top: 2rem; 
            margin-bottom: 2rem;
        }

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
        .math-formula span { white-space: nowrap; } 

        /* --- Quiz Input Styles (Standardized to 20px) --- */
        .quiz-input { 
            font-size: 1.25rem; /* 20px - Input Text Size */
            border-bottom: 2px solid #a7f3d0; 
            transition: border-color 0.2s; 
            padding: 0.25rem; 
            text-align: center; 
            width: 100%; /* Ensures the input takes full width */
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
            font-size: 1rem; /* 16px - Smaller for navigation clarity */
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
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Electric Meter (Consumption and Reading)</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Electric Bill (Calculating Charges)</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Interpreting Electric Bills and Meters</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Studying Electricity Consumption (kW-h) Calculation and Monthly Bill Analysis.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Explain <b>Power Rating</b> (Watts/kW) and <b>Consumption</b> (kW-h) of Electricity.</li>
                        <li data-i18n="obj_2">Read and understand the <b>Kilowatt-hour Meter</b>. </li>
                        <li data-i18n="obj_3">Calculate the <b>Total Bill</b> based on <b>Basic Charge</b>, <b>Currency Adjustment</b>, and <b>PPA</b>.</li>
                        <li data-i18n="obj_4">Suggest ways to save electricity.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Metro ng Kuryente (Konsumo at Pagbasa) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Electric Meter (Consumption and Reading)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Measuring Electricity (Power Rating)</h3>
                            <p data-i18n="aralin1_p1">The electricity used by appliances is measured in <b>Watts (W)</b> or <b>Kilowatts (kW)</b>, also known as the Power Rating or Wattage. This is usually found on the back of the appliance.</p>
                            <div class="math-formula">
                                <span data-i18n="aralin1_formula1">1,000 W = 1 kW</span>
                            </div>
                            <p data-i18n="aralin1_p2">To get the <b>Electricity Consumption</b>, use this formula:</p>
                            <p class="math-formula" data-i18n="aralin1_formula2">Power Rating (kW) x Hours Used (h) = Consumption (kW-h)</p>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE: Total Consumption</p>
                                <p data-i18n="aralin1_ex1_p1">An iron (600 W) and a TV (100 W) were used for 3 hours.</p>
                                <p data-i18n="aralin1_ex1_p2">Total Power Rating: 600 W + 100 W = 700 W = <b>0.7 kW</b></p>
                                <p data-i18n="aralin1_ex1_p3">Consumption: 0.7 kW x 3 h = <b>2.1 kW-h</b></p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Reading the Kilowatt-hour Meter (Analog)</h3>
                            
                            <p data-i18n="aralin1_p3">The meter has four dials (thousand, hundred, ten, unit). The meter reading is read from left to right.</p>
                            <ol class="list-decimal list-inside ml-4 space-y-1">
                                <li data-i18n="aralin1_l1">Read the dial at the <b>lower number</b> the pointer is pointing to.</li>
                                <li data-i18n="aralin1_l2">When the pointer is between 9 and 0 (which is 10), the reading is always <b>9</b>.</li>
                            </ol>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_title">Meter Reading Example:</p>
                                <p data-i18n="aralin1_ex2_p1">Thousands Dial (pointer between 3 & 4): Reading = <b>3</b></p>
                                <p data-i18n="aralin1_ex2_p2">Hundreds Dial (pointer between 1 & 2): Reading = <b>1</b></p>
                                <p data-i18n="aralin1_ex2_p3">Tens Dial (pointer between 5 & 6): Reading = <b>5</b></p>
                                <p data-i18n="aralin1_ex2_p4">Units Dial (pointer on 9): Reading = <b>9</b></p>
                                <p data-i18n="aralin1_ex2_p5">The present reading is: <b>3,159 kW-h</b></p>
                            </div>
                            <p data-i18n="aralin1_p4">The <b>Total Consumption</b> for one month is obtained by subtracting the <b>Previous Reading</b> from the <b>Present Reading</b>.</p>
                        </div>
                    </details>

                    <!-- ARALIN 2: Bill sa Kuryente (Pagkuwenta ng Bayarin) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Electric Bill (Calculating Charges)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">The Total Bill Amount consists of the <b>Basic Charge (Generation Charge)</b>, <b>Currency Adjustment (CA)</b>, and <b>Power Purchase Adjustment (PPA) / Distribution Charge</b>. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">1. Basic Charge (Generation Charge)</h3>
                            <p data-i18n="aralin2_p2">This is the charge for purchasing electricity. Companies like MERALCO use <b>Progressive Rates</b> (as consumption increases, the rate increases).</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">Progressive Rate (MERALCO Example):</p>
                                <ul class="list-disc list-inside ml-4 space-y-1">
                                    <li data-i18n="aralin2_l1">First 10 kW-h: <b>Minimum Rate</b> (e.g., <b>P17.40</b>)</li>
                                    <li data-i18n="aralin2_l2">Next kW-h: <b>Lower Rate</b> (e.g., <b>P1.7400/kW-h</b>)</li>
                                    <li data-i18n="aralin2_l3">Subsequent kW-h: <b>Higher Rate</b> (e.g., <b>P3.4000/kW-h</b>)</li>
                                </ul>
                                <p data-i18n="aralin2_p3"><b>IMPORTANT:</b> If consumption reaches <b>300 kW-h or more</b>, the charge becomes a <b>Flat Rate</b> (e.g., <b>P3.4000/kW-h</b>) for all usage, which is usually more expensive. Saving electricity means keeping consumption below 300 kW-h.</p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">2. Currency Adjustment (CA)</h3>
                            <p data-i18n="aralin2_p4">This is a charge for the fluctuation of the <b>exchange rate</b> between the Peso and the U.S. Dollar (used for fuel purchases). It is calculated as a percentage of the Basic Charge.</p>
                            <p class="math-formula" data-i18n="aralin2_formula3">Basic Charge x Percentage Rate (e.g., 4.58%) = Currency Adjustment</p>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_3">3. Power Purchase Adjustment (PPA) / Distribution Charge</h3>
                            <p data-i18n="aralin2_p5">This is the charge for the service of electricity distribution. It is usually a <b>Flat Rate</b> per kW-h.</p>
                            <p class="math-formula" data-i18n="aralin2_formula4">Total Consumption (kW-h) x PPA Rate = PPA Charge</p>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the following questions about electricity consumption and bills. Do not include units (Peso, kW-h, etc.) in the answer.</p>

                    <form id="electric-bill-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Consumption and Meter Reading</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. How many Kilowatts (kW) is 1,500 Watts (W)?</label>
                                    <input type="text" id="qa1" class="quiz-input" data-i18n-placeholder="qa1_placeholder" placeholder="kW">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. An 800 W appliance was used for 5 hours. What is the consumption (kW-h)?</label>
                                    <input type="text" id="qa2" class="quiz-input" data-i18n-placeholder="qa2_placeholder" placeholder="kW-h">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. Previous Reading: 5,690 kW-h. Present Reading: 5,968 kW-h. What is the consumption?</label>
                                    <input type="text" id="qa3" class="quiz-input" data-i18n-placeholder="qa3_placeholder" placeholder="kW-h">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Calculating the Bill</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. Basic Charge: P862.20. Currency Adjustment Rate: 4.58%. What is the CA charge (Round to 2 decimal places)?</label>
                                    <input type="text" id="qa4" class="quiz-input" data-i18n-placeholder="qa4_placeholder" placeholder="Peso">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">5. Total Consumption: 278 kW-h. PPA Rate: P1.699/kW-h. What is the PPA charge (Round to 2 decimal places)?</label>
                                    <input type="text" id="qa5" class="quiz-input" data-i18n-placeholder="qa5_placeholder" placeholder="Peso">
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit-electric-bill-quiz" class="w-[70%] mx-auto block accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
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
                outline_aralin1: "Lesson 1: Electric Meter (Consumption and Reading)",
                outline_aralin2: "Lesson 2: Electric Bill (Calculating Charges)",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Interpreting Electric Bills and Meters",
                h1_subtitle: "Studying Electricity Consumption (kW-h) Calculation and Monthly Bill Analysis.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Explain <b>Power Rating</b> (Watts/kW) and <b>Consumption</b> (kW-h) of Electricity.",
                obj_2: "Read and understand the <b>Kilowatt-hour Meter</b>.",
                obj_3: "Calculate the <b>Total Bill</b> based on <b>Basic Charge</b>, <b>Currency Adjustment</b>, and <b>PPA</b>.",
                obj_4: "Suggest ways to save electricity.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Electric Meter (Consumption and Reading)",
                aralin1_h3_1: "Measuring Electricity (Power Rating)",
                aralin1_p1: "The electricity used by appliances is measured in <b>Watts (W)</b> or <b>Kilowatts (kW)</b>, also known as the Power Rating or Wattage. This is usually found on the back of the appliance.",
                aralin1_formula1: "1,000 W = 1 kW",
                aralin1_p2: "To get the <b>Electricity Consumption</b>, use this formula:",
                aralin1_formula2: "Power Rating (kW) x Hours Used (h) = Consumption (kW-h)",
                aralin1_ex1_title: "EXAMPLE: Total Consumption",
                aralin1_ex1_p1: "An iron (600 W) and a TV (100 W) were used for 3 hours.",
                aralin1_ex1_p2: "Total Power Rating: 600 W + 100 W = 700 W = <b>0.7 kW</b>",
                aralin1_ex1_p3: "Consumption: 0.7 kW x 3 h = <b>2.1 kW-h</b>",
                aralin1_h3_2: "Reading the Kilowatt-hour Meter (Analog)",
                aralin1_p3: "The meter has four dials (thousand, hundred, ten, unit). The meter reading is read from left to right.",
                aralin1_l1: "Read the dial at the <b>lower number</b> the pointer is pointing to.",
                aralin1_l2: "When the pointer is between 9 and 0 (which is 10), the reading is always <b>9</b>.",
                aralin1_ex2_title: "Meter Reading Example:",
                aralin1_ex2_p1: "Thousands Dial (pointer between 3 & 4): Reading = <b>3</b>",
                aralin1_ex2_p2: "Hundreds Dial (pointer between 1 & 2): Reading = <b>1</b>",
                aralin1_ex2_p3: "Tens Dial (pointer between 5 & 6): Reading = <b>5</b>",
                aralin1_ex2_p4: "Units Dial (pointer on 9): Reading = <b>9</b>",
                aralin1_ex2_p5: "The present reading is: <b>3,159 kW-h</b>",
                aralin1_p4: "The <b>Total Consumption</b> for one month is obtained by subtracting the <b>Previous Reading</b> from the <b>Present Reading</b>.",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Electric Bill (Calculating Charges)",
                aralin2_p1: "The Total Bill Amount consists of the <b>Basic Charge (Generation Charge)</b>, <b>Currency Adjustment (CA)</b>, and <b>Power Purchase Adjustment (PPA) / Distribution Charge</b>.",
                aralin2_h3_1: "1. Basic Charge (Generation Charge)",
                aralin2_p2: "This is the charge for purchasing electricity. Companies like MERALCO use <b>Progressive Rates</b> (as consumption increases, the rate increases).",
                aralin2_ex1_title: "Progressive Rate (MERALCO Example):",
                aralin2_l1: "First 10 kW-h: <b>Minimum Rate</b> (e.g., <b>P17.40</b>)",
                aralin2_l2: "Next kW-h: <b>Lower Rate</b> (e.g., <b>P1.7400/kW-h</b>)",
                aralin2_l3: "Subsequent kW-h: <b>Higher Rate</b> (e.g., <b>P3.4000/kW-h</b>)",
                aralin2_p3: "<b>IMPORTANT:</b> If consumption reaches <b>300 kW-h or more</b>, the charge becomes a <b>Flat Rate</b> (e.g., <b>P3.4000/kW-h</b>) for all usage, which is usually more expensive. Saving electricity means keeping consumption below 300 kW-h.",
                aralin2_h3_2: "2. Currency Adjustment (CA)",
                aralin2_p4: "This is a charge for the fluctuation of the <b>exchange rate</b> between the Peso and the U.S. Dollar (used for fuel purchases). It is calculated as a percentage of the Basic Charge.",
                aralin2_formula3: "Basic Charge x Percentage Rate (e.g., 4.58%) = Currency Adjustment",
                aralin2_h3_3: "3. Power Purchase Adjustment (PPA) / Distribution Charge",
                aralin2_p5: "This is the charge for the service of electricity distribution. It is usually a <b>Flat Rate</b> per kW-h.",
                aralin2_formula4: "Total Consumption (kW-h) x PPA Rate = PPA Charge",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Answer the following questions about electricity consumption and bills. Do not include units (Peso, kW-h, etc.) in the answer.",
                quiz_section1_title: "A. Consumption and Meter Reading",
                qa1_label: "1. How many Kilowatts (kW) is 1,500 Watts (W)?",
                qa1_placeholder: "kW",
                qa2_label: "2. An 800 W appliance was used for 5 hours. What is the consumption (kW-h)?",
                qa2_placeholder: "kW-h",
                qa3_label: "3. Previous Reading: 5,690 kW-h. Present Reading: 5,968 kW-h. What is the consumption?",
                qa3_placeholder: "kW-h",
                quiz_section2_title: "B. Calculating the Bill",
                qa4_label: "4. Basic Charge: P862.20. Currency Adjustment Rate: 4.58%. What is the CA charge (Round to 2 decimal places)?",
                qa4_placeholder: "Peso",
                qa5_label: "5. Total Consumption: 278 kW-h. PPA Rate: P1.699/kW-h. What is the PPA charge (Round to 2 decimal places)?",
                qa5_placeholder: "Peso",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You now know how to calculate electricity bills!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the conversion of Watts to kW or the calculation of charges.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the entire module.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Metro ng Kuryente (Konsumo at Pagbasa)",
                outline_aralin2: "Aralin 2: Bill sa Kuryente (Pagkuwenta ng Bayarin)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Pag-interpreta ng mga Bill at Metro ng Kuryente",
                h1_subtitle: "Pag-aaral ng Pagkuwenta ng Konsumo sa Kuryente (kW-h) at Pagsuri ng Buwanang Bill.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ipaliwanag ang <b>Power Rating</b> (Watts/kW) at <b>Konsumo</b> (kW-h) sa Kuryente.",
                obj_2: "Basahin at unawain ang <b>Kilowatt-hour Meter</b> ng Kuryente.",
                obj_3: "Kuwentahin ang <b>Kabuuang Bayarin</b> batay sa <b>Basic Charge</b>, <b>Currency Adjustment</b>, at <b>PPA</b>.",
                obj_4: "Magmungkahi ng paraan para makatipid sa kuryente.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Metro ng Kuryente (Konsumo at Pagbasa)",
                aralin1_h3_1: "Pagsukat ng Kuryente (Power Rating)",
                aralin1_p1: "Ang kuryente na ginagamit ng appliances ay sinusukat sa <b>Watts (W)</b> o <b>Kilowatts (kW)</b>, na tinatawag na Power Rating o Wattage. Ito ay karaniwang nakikita sa likod ng appliance.",
                aralin1_formula1: "1,000 W = 1 kW",
                aralin1_p2: "Upang makuha ang <b>Konsumo sa Kuryente (Consumption)</b>, ginagamit ang pormulang ito:",
                aralin1_formula2: "Power Rating (kW) x Bilang ng Oras (h) = Konsumo (kW-h)",
                aralin1_ex1_title: "HALIMBAWA: Kabuuang Konsumo",
                aralin1_ex1_p1: "Isang plantsa (600 W) at TV (100 W) ang ginamit sa loob ng 3 oras.",
                aralin1_ex1_p2: "Kabuuang Power Rating: 600 W + 100 W = 700 W = <b>0.7 kW</b>",
                aralin1_ex1_p3: "Konsumo: 0.7 kW x 3 h = <b>2.1 kW-h</b>",
                aralin1_h3_2: "Pagbasa ng Kilowatt-hour Meter (Analog)",
                aralin1_p3: "Ang metro ay may apat na dial (thousand, hundred, ten, unit). Ang meter reading ay binabasa mula kaliwa pakanan.",
                aralin1_l1: "Basahin ang dial sa <b>higit na mababang bilang</b> (lower number) na tinuturo ng pointer.",
                aralin1_l2: "Kapag ang pointer ay nasa pagitan ng 9 at 0 (na 10), ang basa ay laging <b>9</b>.",
                aralin1_ex2_title: "Metro Reading Halimbawa:",
                aralin1_ex2_p1: "Thousands Dial (pointer between 3 & 4): Basa = <b>3</b>",
                aralin1_ex2_p2: "Hundreds Dial (pointer between 1 & 2): Basa = <b>1</b>",
                aralin1_ex2_p3: "Tens Dial (pointer between 5 & 6): Basa = <b>5</b>",
                aralin1_ex2_p4: "Units Dial (pointer on 9): Basa = <b>9</b>",
                aralin1_ex2_p5: "Ang kasalukuyang basa ay: <b>3,159 kW-h</b>",
                aralin1_p4: "Ang <b>Kabuuang Konsumo</b> sa loob ng isang buwan ay kinukuha sa pagbawas ng <b>Nakaraang Basa</b> (Previous Reading) sa <b>Kasalukuyang Basa</b> (Present Reading).",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Bill sa Kuryente (Pagkuwenta ng Bayarin)",
                aralin2_p1: "Ang Kabuuang Halaga ng Bill ay binubuo ng <b>Basic Charge</b>, <b>Currency Adjustment</b>, at <b>Power Purchase Adjustment (PPA) / Distribution Charge</b>.",
                aralin2_h3_1: "1. Basic Charge (Generation Charge)",
                aralin2_p2: "Ito ang singil para sa pagbili ng kuryente. Ang MERALCO at katulad na kumpanya ay gumagamit ng <b>Progressive Rates</b> (tumaas ang konsumo, tumaas ang singil).",
                aralin2_ex1_title: "Progressive Rate (MERALCO Example):",
                aralin2_l1: "Unang 10 kW-h: <b>Minimum Rate</b> (e.g., <b>P17.40</b>)",
                aralin2_l2: "Susunod na kW-h: <b>Mababang Rate</b> (e.g., <b>P1.7400/kW-h</b>)",
                aralin2_l3: "Susunod na kW-h: <b>Mas Mataas na Rate</b> (e.g., <b>P3.4000/kW-h</b>)",
                aralin2_p3: "<b>MAHALAGA:</b> Kapag umabot ng <b>300 kW-h o higit pa</b> ang konsumo, ang singil ay magiging <b>Flat Rate</b> (e.g., <b>P3.4000/kW-h</b>) para sa lahat, na kadalasan ay mas mahal. Kaya, mas makakatipid kung pananatilihin ang konsumo na mas mababa sa 300 kW-h.",
                aralin2_h3_2: "2. Currency Adjustment (CA)",
                aralin2_p4: "Ito ay singil para sa pagbabagu-bago ng <b>exchange rate</b> ng Piso at U.S. Dollar (ginagamit sa pagbili ng fuel). Ito ay kinukuha bilang percentage ng Basic Charge.",
                aralin2_formula3: "Basic Charge x Percentage Rate (e.g., 4.58%) = Currency Adjustment",
                aralin2_h3_3: "3. Power Purchase Adjustment (PPA) / Distribution Charge",
                aralin2_p5: "Ito ang singil para sa serbisyo ng pamamahagi ng kuryente. Kadalasan, <b>Flat Rate</b> ito kada kW-h.",
                aralin2_formula4: "Kabuuang Konsumo (kW-h) x PPA Rate = Halaga ng PPA",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang sumusunod na katanungan tungkol sa konsumo at bill sa kuryente. Huwag maglagay ng unit (Piso, kW-h, atbp.) sa sagot.",
                quiz_section1_title: "A. Konsumo at Pagbasa ng Meter",
                qa1_label: "1. Ilang Kilowatts (kW) ang 1,500 Watts (W)?",
                qa1_placeholder: "kW",
                qa2_label: "2. Isang 800 W na appliance ang ginamit sa loob ng 5 oras. Ano ang konsumo (kW-h)?",
                qa2_placeholder: "kW-h",
                qa3_label: "3. Nakaraang Basa: 5,690 kW-h. Kasalukuyang Basa: 5,968 kW-h. Ano ang konsumo?",
                qa3_placeholder: "kW-h",
                quiz_section2_title: "B. Pagkuwenta ng Bill",
                qa4_label: "4. Basic Charge: P862.20. Currency Adjustment Rate: 4.58%. Ano ang halaga ng CA (Round to 2 decimal places)?",
                qa4_placeholder: "Piso",
                qa5_label: "5. Kabuuang Konsumo: 278 kW-h. PPA Rate: P1.699/kW-h. Ano ang halaga ng PPA (Round to 2 decimal places)?",
                qa5_placeholder: "Piso",
                quiz_button: "Tapusin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Marunong ka na ngayong mag-kuwenta ng bill sa kuryente!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang conversion ng Watts sa kW o ang pagkalkula ng charges.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang buong module.`,
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
            // Allow negative sign and decimals, filter out P, kW, h, etc.
            value = value.trim().replace(',', '.').replace(/[^\d.\-]/g, ''); 
            const parsedValue = parseFloat(value);
            return isNaN(parsedValue) ? 0 : parsedValue;
        }

        function checkAnswer(id, expected, tolerance = 0.001) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            const inputFloat = standardizeFloat(rawValue);
            const expectedFloat = standardizeFloat(String(expected));
            
            // Check if the input is within the specified tolerance
            const isCorrect = Math.abs(inputFloat - expectedFloat) <= tolerance;

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
        document.getElementById('electric-bill-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false);
        });

        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 5; 
            const resultsDiv = document.getElementById('results');
            
            // Expected Answers:
            // 1. 1500 W / 1000 = 1.5 kW
            const ans_a1 = 1.5;
            
            // 2. 800 W * 5 h = 4000 Wh = 4.0 kW-h
            const ans_a2 = 4.0;
            
            // 3. 5968 - 5690 = 278 kW-h
            const ans_a3 = 278;

            // 4. CA: 862.20 * 0.0458 = 39.50156. Rounded to 2 decimals = 39.50.
            const ans_a4 = 39.50;

            // 5. PPA: 278 * 1.699 = 472.322. Rounded to 2 decimals = 472.32.
            const ans_a5 = 472.32; 

            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1', ans_a1, 0.001); 
                correctCount += checkAnswer('qa2', ans_a2, 0.001); 
                correctCount += checkAnswer('qa3', ans_a3, 0.001); 
                correctCount += checkAnswer('qa4', ans_a4, 0.01); // 2 decimal tolerance for currency
                correctCount += checkAnswer('qa5', ans_a5, 0.01); // 2 decimal tolerance for currency
                
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
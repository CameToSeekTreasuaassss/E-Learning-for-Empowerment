<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Measuring Weight 1</title>
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
        
        /* Math Display Style: Simplified, uses plain text and standard symbols */
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Metric System (Kilo, Gram)</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: English System (Pound, Ounce)</a>
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
                    <span class="text-xs font-semibold uppercase tracking-wider text-green-600 bg-green-100 px-3 py-1 rounded-full" data-i18n="meta_text">Junior High Learning Module Sheet</span>
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Measuring Weight 1</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Studying the metric and English systems for measuring weight for everyday use.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Identify the units of weight in the <b>metric</b> and <b>English</b> systems.</li>
                        <li data-i18n="obj_2">Read and record weight using a weighing scale.</li>
                        <li data-i18n="obj_3">Convert units (e.g., grams to kilograms).</li>
                        <li data-i18n="obj_4">Learn methods of <b>estimating</b> weight.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Metric System (Off to the Market We Go) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Metric System (Kilo, Gram, and Guhit)</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">The <b>Metric System</b> is commonly used for everyday goods (e.g., meat, vegetables, rice). The main units are the <b>Gram (g)</b> and <b>Kilogram (kg)</b>. </p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Metric Units Table (Weight)</h3>
                            <div class="example-box">
                                <ul class="list-disc list-inside ml-4 space-y-1">
                                    <li data-i18n="aralin1_l1"><b>1,000 milligrams (mg)</b> = 1 gram (g)</li>
                                    <li data-i18n="aralin1_l2"><b>1,000 grams (g)</b> = 1 kilogram (kilo or kg)</li>
                                    <li data-i18n="aralin1_l3"><b>1,000 kilograms (kg)</b> = 1 metric ton</li>
                                    <li data-i18n="aralin1_l4"><b>100 grams (g)</b> = 1 guhit (local unit, equivalent to 1/10 kilo)</li>
                                </ul>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Conversion (Smaller Unit → Larger Unit)</h3>
                            <p data-i18n="aralin1_p2">To convert from a smaller unit to a larger unit, <b>divide</b> the value by 1,000 (for g → kg, or kg → metric ton).</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE: How many kilos are 500 grams?</p>
                                <p class="math-formula" data-i18n="aralin1_ex1_solution"> 500 grams / 1,000 = <b>0.5 kilo (or 1/2 kilo)</b> </p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Reading a Scale (Timbangan)</h3>
                            <p data-i18n="aralin1_p3">On a standard market scale, each small mark between whole kilos represents <b>50 grams</b>. There are 20 marks between 0 and 1 kilo (20 x 50 g = 1,000 g).</p>
                            <p data-i18n="aralin1_p4">The <b>Guhit</b> is equivalent to 100 grams, or <b>two marks</b> on the scale. </p>
                        </div>
                    </details>

                    <!-- ARALIN 2: English System (How Heavy Is Totoy?) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: English System (Pound, Ounce, and Ton)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">The <b>English System</b> is commonly used for measuring human weight (especially in health centers) or ingredients in baking.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">English Units Table (Weight)</h3>
                            <div class="example-box">
                                <ul class="list-disc list-inside ml-4 space-y-1">
                                    <li data-i18n="aralin2_l1"><b>16 ounces (oz)</b> = 1 pound (lb)</li>
                                    <li data-i18n="aralin2_l2"><b>2,000 pounds (lbs)</b> = 1 ton (English Ton)</li>
                                </ul>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Conversion (Larger Unit → Smaller Unit)</h3>
                            <p data-i18n="aralin2_p2">To convert from a larger unit to a smaller unit, <b>multiply</b> the value.</p>
                            
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">EXAMPLE 1: How many ounces are 2 pounds?</p>
                                <p class="math-formula" data-i18n="aralin2_ex1_solution"> 2 lbs x 16 oz/lb = <b>32 ounces</b> </p>
                                <p class="font-bold mt-4" data-i18n="aralin2_ex2_title">EXAMPLE 2: How many pounds are 3 tons?</p>
                                <p class="math-formula" data-i18n="aralin2_ex2_solution"> 3 tons x 2,000 lbs/ton = <b>6,000 pounds</b> </p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_3">Estimating Weight (Pagtantiya)</h3>
                            <p data-i18n="aralin2_p3">Estimating can help prevent being cheated on weight. Two methods are suggested:</p>
                            <ol class="list-decimal list-inside ml-4 space-y-1">
                                <li data-i18n="aralin2_ol1"><b>Familiarize</b> yourself with the feel of 1 kilo in your hand.</li>
                                <li data-i18n="aralin2_ol2"><b>Count</b> the pieces (e.g., potatoes) within 1 kilo.</li>
                            </ol>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the weight conversion problems. (Provide the answer in decimal format.)</p>

                    <form id="weight-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Metric System</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. How many kilos are 2,500 grams of chicken feed?</label>
                                    <input type="text" id="qa1" class="quiz-input" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (kilos)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. How many kilos are 1.2 metric tons of rice?</label>
                                    <input type="text" id="qa2" class="quiz-input" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (kilos)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. English System</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1" class="font-medium" data-i18n="qb1_label">3. How many pounds are 144 ounces of lollipops?</label>
                                    <input type="text" id="qb1" class="quiz-input" data-i18n-placeholder="qb1_placeholder" placeholder="Answer (pounds)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2" class="font-medium" data-i18n="qb2_label">4. How many ounces are 3.5 pounds of ingredients?</label>
                                    <input type="text" id="qb2" class="quiz-input" data-i18n-placeholder="qb2_placeholder" placeholder="Answer (ounces)">
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit-weight-quiz" class="w-full accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
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
                outline_aralin1: "Lesson 1: Metric System (Kilo, Gram)",
                outline_aralin2: "Lesson 2: English System (Pound, Ounce)",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Measuring Weight 1",
                h1_subtitle: "Studying the metric and English systems for measuring weight for everyday use.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Identify the units of weight in the <b>metric</b> and <b>English</b> systems.",
                obj_2: "Read and record weight using a weighing scale.",
                obj_3: "Convert units (e.g., grams to kilograms).",
                obj_4: "Learn methods of <b>estimating</b> weight.",

                // Lesson 1 Content (Metric)
                aralin1_title: "Lesson 1: Metric System (Kilo, Gram, and Guhit)",
                aralin1_p1: "The <b>Metric System</b> is commonly used for everyday goods (e.g., meat, vegetables, rice). The main units are the <b>Gram (g)</b> and <b>Kilogram (kg)</b>.",
                aralin1_h3_1: "Metric Units Table (Weight)",
                aralin1_l1: "<b>1,000 milligrams (mg)</b> = 1 gram (g)",
                aralin1_l2: "<b>1,000 grams (g)</b> = 1 kilogram (kilo or kg)",
                aralin1_l3: "<b>1,000 kilograms (kg)</b> = 1 metric ton",
                aralin1_l4: "<b>100 grams (g)</b> = 1 guhit (local unit, equivalent to 1/10 kilo)",
                aralin1_h3_2: "Conversion (Smaller Unit → Larger Unit)",
                aralin1_p2: "To convert from a smaller unit to a larger unit, <b>divide</b> the value by 1,000 (for g → kg, or kg → metric ton).",
                aralin1_ex1_title: "EXAMPLE: How many kilos are 500 grams?",
                aralin1_ex1_solution: " 500 grams / 1,000 = <b>0.5 kilo (or 1/2 kilo)</b> ",
                aralin1_h3_3: "Reading a Scale (Timbangan)",
                aralin1_p3: "On a standard market scale, each small mark between whole kilos represents <b>50 grams</b>. There are 20 marks between 0 and 1 kilo (20 x 50 g = 1,000 g).",
                aralin1_p4: "The <b>Guhit</b> is equivalent to 100 grams, or <b>two marks</b> on the scale.",

                // Lesson 2 Content (English)
                aralin2_title: "Lesson 2: English System (Pound, Ounce, and Ton)",
                aralin2_p1: "The <b>English System</b> is commonly used for measuring human weight (especially in health centers) or ingredients in baking.",
                aralin2_h3_1: "English Units Table (Weight)",
                aralin2_l1: "<b>16 ounces (oz)</b> = 1 pound (lb)",
                aralin2_l2: "<b>2,000 pounds (lbs)</b> = 1 ton (English Ton)",
                aralin2_h3_2: "Conversion (Larger Unit → Smaller Unit)",
                aralin2_p2: "To convert from a larger unit to a smaller unit, <b>multiply</b> the value.",
                aralin2_ex1_title: "EXAMPLE 1: How many ounces are 2 pounds?",
                aralin2_ex1_solution: " 2 lbs x 16 oz/lb = <b>32 ounces</b> ",
                aralin2_ex2_title: "EXAMPLE 2: How many pounds are 3 tons?",
                aralin2_ex2_solution: " 3 tons x 2,000 lbs/ton = <b>6,000 pounds</b> ",
                aralin2_h3_3: "Estimating Weight (Pagtantiya)",
                aralin2_p3: "Estimating can help prevent being cheated on weight. Two methods are suggested:",
                aralin2_ol1: "<b>Familiarize</b> yourself with the feel of 1 kilo in your hand.",
                aralin2_ol2: "<b>Count</b> the pieces (e.g., potatoes) within 1 kilo.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Answer the weight conversion problems. (Provide the answer in decimal format.)",
                quiz_section1_title: "A. Metric System",
                qa1_label: "1. How many kilos are 2,500 grams of chicken feed?",
                qa1_placeholder: "Answer (kilos)",
                qa2_label: "2. How many kilos are 1.2 metric tons of rice?",
                qa2_placeholder: "Answer (kilos)",
                quiz_section2_title: "B. English System",
                qb1_label: "3. How many pounds are 144 ounces of lollipops?",
                qb1_placeholder: "Answer (pounds)",
                qb2_label: "4. How many ounces are 3.5 pounds of ingredients?",
                qb2_placeholder: "Answer (ounces)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You are ready for Part Two of the module!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the conversion factors for metric and English units.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Make sure you know when to divide (small to big) and multiply (big to small).`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Metric System (Kilo, Gram)",
                outline_aralin2: "Aralin 2: English System (Pound, Ounce)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Pagsukat ng Timbang 1",
                h1_subtitle: "Pag-aaral ng metric at English systems ng pagsukat ng timbang para sa pang-araw-araw na gamit.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Tukuyin ang mga yunit ng timbang sa <b>metric</b> at <b>English</b> systems.",
                obj_2: "Magbasa at mag-record ng timbang gamit ang timbangan (weighing scale).",
                obj_3: "Mag-convert ng mga yunit (hal. gramo patungong kilo).",
                obj_4: "Matuto ng mga paraan ng <b>pagtantiya (estimating)</b> ng timbang.",

                // Lesson 1 Content (Metric)
                aralin1_title: "Aralin 1: Metric System (Kilo, Gram, at Guhit)",
                aralin1_p1: "Ang <b>Metric System</b> ang karaniwang ginagamit para sa pangaraw-araw na bilihin (hal. karne, gulay, bigas). Ang pangunahing yunit ay ang <b>Gram (g)</b> at <b>Kilogram (kg)</b>.",
                aralin1_h3_1: "Talahanayan ng Metric Units (Timbang)",
                aralin1_l1: "<b>1,000 milligrams (mg)</b> = 1 gram (g)",
                aralin1_l2: "<b>1,000 grams (g)</b> = 1 kilogram (kilo o kg)",
                aralin1_l3: "<b>1,000 kilograms (kg)</b> = 1 metric ton",
                aralin1_l4: "<b>100 grams (g)</b> = 1 guhit (lokal na yunit, katumbas ng 1/10 kilo)",
                aralin1_h3_2: "Conversion (Mas Maliit na Yunit → Mas Malaking Yunit)",
                aralin1_p2: "Para mag-convert mula sa mas maliit patungo sa mas malaking yunit, <b>hatiin (divide)</b> ang halaga sa 1,000 (para sa g → kg, o kg → metric ton).",
                aralin1_ex1_title: "HALIMBAWA: Ilang kilo ang 500 grams?",
                aralin1_ex1_solution: " 500 grams / 1,000 = <b>0.5 kilo (o 1/2 kilo)</b> ",
                aralin1_h3_3: "Pagbasa ng Timbangan (Scale Reading)",
                aralin1_p3: "Sa karaniwang timbangan sa palengke, ang bawat maliit na guhit sa pagitan ng buong kilo ay kumakatawan sa <b>50 grams</b>. Mayroong 20 guhit sa pagitan ng 0 at 1 kilo (20 x 50 g = 1,000 g).",
                aralin1_p4: "Ang <b>Guhit</b> ay katumbas ng 100 grams, o <b>dalawang guhit</b> sa timbangan.",

                // Lesson 2 Content (English)
                aralin2_title: "Aralin 2: English System (Pound, Ounce, at Ton)",
                aralin2_p1: "Ang <b>English System</b> ay karaniwang ginagamit sa pagsukat ng timbang ng tao (lalo na sa health centers) o sa mga sangkap sa pagbe-bake.",
                aralin2_h3_1: "Talahanayan ng English Units (Timbang)",
                aralin2_l1: "<b>16 ounces (oz)</b> = 1 pound (lb)",
                aralin2_l2: "<b>2,000 pounds (lbs)</b> = 1 ton (English Ton)",
                aralin2_h3_2: "Conversion (Mas Malaki → Mas Maliit na Yunit)",
                aralin2_p2: "Para mag-convert mula sa mas malaking yunit patungo sa mas maliit, <b>i-multiply</b> ang halaga.",
                aralin2_ex1_title: "HALIMBAWA 1: Ilang ounces ang 2 pounds?",
                aralin2_ex1_solution: " 2 lbs x 16 oz/lb = <b>32 ounces</b> ",
                aralin2_ex2_title: "HALIMBAWA 2: Ilang pounds ang 3 tons?",
                aralin2_ex2_solution: " 3 tons x 2,000 lbs/ton = <b>6,000 pounds</b> ",
                aralin2_h3_3: "Pagtantiya (Estimating Weight)",
                aralin2_p3: "Makakatulong ang pagtantiya para maiwasan ang pagkadaya sa timbang. Dalawang paraan ang iminumungkahi:",
                aralin2_ol1: "<b>Pag-familiarize</b> sa pakiramdam ng 1 kilo sa kamay.",
                aralin2_ol2: "<b>Pagbilang</b> ng piraso (hal. patatas) sa loob ng 1 kilo.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang mga problema sa conversion ng timbang. (Ibigay ang sagot sa decimal format.)",
                quiz_section1_title: "A. Metric System",
                qa1_label: "1. Ilang kilo ang 2,500 grams ng chicken feed?",
                qa1_placeholder: "Sagot (kilos)",
                qa2_label: "2. Ilang kilo ang 1.2 metric tons ng bigas?",
                qa2_placeholder: "Sagot (kilos)",
                quiz_section2_title: "B. English System",
                qb1_label: "3. Ilang pounds ang 144 ounces ng lollipops?",
                qb1_placeholder: "Sagot (pounds)",
                qb2_label: "4. Ilang ounces ang 3.5 pounds ng ingredients?",
                qb2_placeholder: "Sagot (ounces)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Handa ka na para sa Part Two ng modyul!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga conversion factor para sa metric at English units.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Siguraduhin na alam mo kung kailan mag-divide (small to big) at mag-multiply (big to small).`,
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
            // Replace comma as decimal point and remove non-numeric characters except '.' and '-'
            value = value.trim().replace(',', '.').replace(/[^\d.-]/g, ''); 
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
        document.getElementById('weight-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false);
        });

        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 4; 
            const resultsDiv = document.getElementById('results');
            
            // --- Expected Calculations ---
            
            // Q1: 2500 g to kg. 2500 / 1000 = 2.5
            const ans_a1 = 2.5; 
            
            // Q2: 1.2 metric tons to kg. 1.2 * 1000 = 1200
            const ans_a2 = 1200;

            // Q3: 144 oz to lbs. 144 / 16 = 9
            const ans_b1 = 9;
            
            // Q4: 3.5 lbs to oz. 3.5 * 16 = 56
            const ans_b2 = 56;


            if (!isLanguageToggle) {
                // --- Check Answers ---
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
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions, percentage);
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
        
        window.addEventListener('load', () => {
             // Initialize default language (English) and outline highlight on load
             updateLanguage('en');
        });
    </script>
</body>
</html>
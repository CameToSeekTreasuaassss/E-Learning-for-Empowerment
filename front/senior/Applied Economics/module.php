<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Applied Economics</title>
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
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Basics and Economic Problems</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Demand, Supply, and Market Structures</a>
                        <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Business Viability and Community</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Applied Economics</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">A study on the wise use of resources for general benefit.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (All content inside is 20px) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <!-- H2 Title is 28px and black -->
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Content paragraph is now 20px -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Define Economics and <b>Applied Economics</b>.</li>
                        <li data-i18n="obj_2">Identify the basic economic problems of the country (e.g., <b>Scarcity</b> and <b>Inequality</b>).</li>
                        <li data-i18n="obj_3">Explain the <b>Law of Supply and Demand</b> and <b>Equilibrium</b>.</li>
                        <li data-i18n="obj_4">Analyze various <b>Market Structures</b> and the effect of contemporary issues (e.g., oil price hike) on purchasing power.</li>
                        <li data-i18n="obj_5">Determine the principles for establishing a <b>Viable Business</b> and its effect on the community.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Batayan at Problema sa Ekonomiya -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin1_title">Lesson 1: Basics and Economic Problems</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin1_h3_1">Definition of Economics</h3>
                            <p data-i18n="aralin1_p1"><b>Economics</b> (from the Greek "oikonomia") is the wise use of money and resources for material benefit. We are all "economists" because everyday life is full of economic realities.</p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin1_h3_2">Applied Economics</h3>
                            <p data-i18n="aralin1_p2"><b>Applied Economics</b> is the application of economic theories and principles to analyze and solve practical issues in various fields (e.g., labor, business, agriculture, health).</p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin1_h3_3">Basic Economic Problems (Resource Problems)</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l3_1"><b>Scarcity</b>: The lack or limitation of resources (land, labor, capital) compared to the unlimited needs of people. </li>
                                <li data-i18n="aralin1_l3_2"><b>What to produce and how much?</b>: What product or service should be made, and how much?</li>
                                <li data-i18n="aralin1_l3_3"><b>How to produce?</b>: What production method should be used?</li>
                                <li data-i18n="aralin1_l3_4"><b>For whom to produce?</b>: Who is the target market for the product?</li>
                            </ul>
                            <p class="mt-4" data-i18n="aralin1_p4">Problems like <b>Poverty</b>, <b>Unemployment</b>, and <b>Hunger</b> continue to plague the Philippines, especially due to unequal resource distribution.</p>
                        </div>
                    </details>

                    <!-- ARALIN 2: Demand, Supply, at Market Structures -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin2_title">Lesson 2: Demand, Supply, and Market Structures</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin2_h3_1">Law of Supply and Demand</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin2_l1_1"><b>Law of Demand</b>: When the price is higher, the quantity demanded is <b>lower</b>. </li>
                                <li data-i18n="aralin2_l1_2"><b>Law of Supply</b>: When the price is higher, the quantity supplied is <b>higher</b> (producer's willingness to sell). </li>
                            </ul>
                            <p data-i18n="aralin2_p1">The <b>Equilibrium Price and Quantity</b> is the point in the market where the supply and demand curves meet. This is the price agreed upon by buyers and sellers. </p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin2_h3_2">Factors Affecting Demand and Supply</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin2_l2_1"><b>Income</b>: If income is higher, demand is higher.</li>
                                <li data-i18n="aralin2_l2_2"><b>Tastes and Preferences</b>: People's tastes change, affecting demand.</li>
                                <li data-i18n="aralin2_l2_3"><b>Technology</b>: Lowers production cost, increasing supply.</li>
                                <li data-i18n="aralin2_l2_4"><b>Price of Related Goods</b>: Prices of substitutes and complementary goods affect demand.</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin2_h3_3">Market Structures</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin2_l3_1"><b>Perfect Competition</b>: Many small firms, selling homogenous (similar) products.</li>
                                <li data-i18n="aralin2_l3_2"><b>Monopolistic Competition</b>: Many small firms, selling similar but differentiated (with differences) products (e.g., various soap brands).</li>
                                <li data-i18n="aralin2_l3_3"><b>Oligopoly</b>: A small number (few) of large firms dominate the entire market (e.g., Telecommunications, Gasoline companies).</li>
                                <li data-i18n="aralin2_l3_4"><b>Monopoly</b>: Only one (single) firm controls the entire market (e.g., Meralco before deregulation).</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin2_h3_4">Effect of Contemporary Issues</h3>
                            <p data-i18n="aralin2_p4">The increase in <b>Oil Price</b> raises the price of commodities. <b>Fluctuations in the Exchange Rate</b> affect the value of OFW remittances and the country's ability to import.</p>
                        </div>
                    </details>

                    <!-- ARALIN 3: Business Viability at Komunidad -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin3_title">Lesson 3: Business Viability and Community</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin3_h3_1">Socioeconomic Factors in Business</h3>
                            <p data-i18n="aralin3_p1">The success of a business depends on the socioeconomic status of the customer base:</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin3_l1_1"><b>Income</b>: If income is low, spending is more restricted to essential items.</li>
                                <li data-i18n="aralin3_l1_2"><b>Education/Skills</b>: Affects the type of job and the purchasing power of the population.</li>
                                <li data-i18n="aralin3_l1_3"><b>Occupation</b>: The type of job people have.</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin3_h3_2">Business Viability and Community</h3>
                            <p data-i18n="aralin3_p2"><b>Viability</b> is the ability of a business to succeed and continue operating. When establishing a business, it is important to ask:</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin3_l2_1">Where to get the <b>Raw Materials</b> (Supply)?</li>
                                <li data-i18n="aralin3_l2_2">What is the <b>Potential Market Size</b> (Demand)?</li>
                                <li data-i18n="aralin3_l2_3">Who are the <b>Competitors</b>?</li>
                                <li data-i18n="aralin3_l2_4">Who are the <b>Target Customers</b>?</li>
                            </ul>
                            <p class="mt-4" data-i18n="aralin3_p3">Business is not just for profit. It must be a partner of the community by creating <b>jobs</b>, increasing the <b>tax base</b>, and being <b>innovative</b>.</p>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6" data-i18n="quiz_subtitle">Identify the correct answer based on Applied Economics concepts.</p>

                    <form id="economics-quiz-form" class="space-y-6 flex flex-col items-center">

                        <div class="space-y-4 p-4 border rounded-lg bg-white w-full">
                            <p class="font-semibold text-xl text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Economic Basics</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. What basic problem does Economics address due to limited resources?</label>
                                    <input type="text" id="qa1" class="quiz-input w-full" data-i18n-placeholder="qa1_placeholder" placeholder="Answer">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. In which market structure does only one company sell?</label>
                                    <input type="text" id="qa2" class="quiz-input w-full" data-i18n-placeholder="qa2_placeholder" placeholder="Answer">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white w-full">
                            <p class="font-semibold text-xl text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Supply, Demand, and Viability</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. According to the Law of Demand, when the price <b>rises</b>, what happens to the quantity demanded?</label>
                                    <input type="text" id="qa3" class="quiz-input w-full" data-i18n-placeholder="qa3_placeholder" placeholder="Answer (rises or lowers)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. Where do the supply and demand curves meet?</label>
                                    <input type="text" id="qa4" class="quiz-input w-full" data-i18n-placeholder="qa4_placeholder" placeholder="Answer">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">5. What socioeconomic factor refers to the type of job people have?</label>
                                    <input type="text" id="qa5" class="quiz-input w-full" data-i18n-placeholder="qa5_placeholder" placeholder="Answer">
                                
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
                outline_aralin1: "Lesson 1: Basics and Economic Problems",
                outline_aralin2: "Lesson 2: Demand, Supply, and Market Structures",
                outline_aralin3: "Lesson 3: Business Viability and Community",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Senior High Learning Module Sheet",
                h1_title: "Applied Economics",
                h1_subtitle: "A study on the wise use of resources for general benefit.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Define Economics and <b>Applied Economics</b>.",
                obj_2: "Identify the basic economic problems of the country (e.g., <b>Scarcity</b> and <b>Inequality</b>).",
                obj_3: "Explain the <b>Law of Supply and Demand</b> and <b>Equilibrium</b>.",
                obj_4: "Analyze various <b>Market Structures</b> and the effect of contemporary issues (e.g., oil price hike) on purchasing power.",
                obj_5: "Determine the principles for establishing a <b>Viable Business</b> and its effect on the community.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Basics and Economic Problems",
                aralin1_h3_1: "Definition of Economics",
                aralin1_p1: "<b>Economics</b> (from the Greek \"oikonomia\") is the wise use of money and resources for material benefit. We are all \"economists\" because everyday life is full of economic realities.",
                aralin1_h3_2: "Applied Economics",
                aralin1_p2: "<b>Applied Economics</b> is the application of economic theories and principles to analyze and solve practical issues in various fields (e.g., labor, business, agriculture, health).",
                aralin1_h3_3: "Basic Economic Problems (Resource Problems)",
                aralin1_l3_1: "<b>Scarcity</b>: The lack or limitation of resources (land, labor, capital) compared to the unlimited needs of people.", 
                aralin1_l3_2: "<b>What to produce and how much?</b>: What product or service should be made, and how much?",
                aralin1_l3_3: "<b>How to produce?</b>: What production method should be used?",
                aralin1_l3_4: "<b>For whom to produce?</b>: Who is the target market for the product?",
                aralin1_p4: "Problems like <b>Poverty</b>, <b>Unemployment</b>, and <b>Hunger</b> continue to plague the Philippines, especially due to unequal resource distribution.",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Demand, Supply, and Market Structures",
                aralin2_h3_1: "Law of Supply and Demand",
                aralin2_l1_1: "<b>Law of Demand</b>: When the price is higher, the quantity demanded is <b>lower</b>.",
                aralin2_l1_2: "<b>Law of Supply</b>: When the price is higher, the quantity supplied is <b>higher</b> (producer's willingness to sell).",
                aralin2_p1: "The <b>Equilibrium Price and Quantity</b> is the point in the market where the supply and demand curves meet. This is the price agreed upon by buyers and sellers.",
                aralin2_h3_2: "Factors Affecting Demand and Supply",
                aralin2_l2_1: "<b>Income</b>: If income is higher, demand is higher.",
                aralin2_l2_2: "<b>Tastes and Preferences</b>: People's tastes change, affecting demand.",
                aralin2_l2_3: "<b>Technology</b>: Lowers production cost, increasing supply.",
                aralin2_l2_4: "<b>Price of Related Goods</b>: Prices of substitutes and complementary goods affect demand.",
                aralin2_h3_3: "Market Structures",
                aralin2_l3_1: "<b>Perfect Competition</b>: Many small firms, selling homogenous (similar) products.",
                aralin2_l3_2: "<b>Monopolistic Competition</b>: Many small firms, selling similar but differentiated (with differences) products (e.g., various soap brands).",
                aralin2_l3_3: "<b>Oligopoly</b>: A small number (few) of large firms dominate the entire market (e.g., Telecommunications, Gasoline companies).",
                aralin2_l3_4: "<b>Monopoly</b>: Only one (single) firm controls the entire market (e.g., Meralco before deregulation).",
                aralin2_h3_4: "Effect of Contemporary Issues",
                aralin2_p4: "The increase in <b>Oil Price</b> raises the price of commodities. <b>Fluctuations in the Exchange Rate</b> affect the value of OFW remittances and the country's ability to import.",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Business Viability and Community",
                aralin3_h3_1: "Socioeconomic Factors in Business",
                aralin3_p1: "The success of a business depends on the socioeconomic status of the customer base:",
                aralin3_l1_1: "<b>Income</b>: If income is low, spending is more restricted to essential items.",
                aralin3_l1_2: "<b>Education/Skills</b>: Affects the type of job and the purchasing power of the population.",
                aralin3_l1_3: "<b>Occupation</b>: The type of job people have.",
                aralin3_h3_2: "Business Viability and Community",
                aralin3_p2: "<b>Viability</b> is the ability of a business to succeed and continue operating. When establishing a business, it is important to ask:",
                aralin3_l2_1: "Where to get the <b>Raw Materials</b> (Supply)?",
                aralin3_l2_2: "What is the <b>Potential Market Size</b> (Demand)?",
                aralin3_l2_3: "Who are the <b>Competitors</b>?",
                aralin3_l2_4: "Who are the <b>Target Customers</b>?",
                aralin3_p3: "Business is not just for profit. It must be a partner of the community by creating <b>jobs</b>, increasing the <b>tax base</b>, and being <b>innovative</b>.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Identify the correct answer based on Applied Economics concepts.",
                quiz_section1_title: "A. Economic Basics",
                qa1_label: "1. What basic problem does Economics address due to limited resources?",
                qa1_placeholder: "Answer",
                qa2_label: "2. In which market structure does only one company sell?",
                qa2_placeholder: "Answer",
                quiz_section2_title: "B. Supply, Demand, and Viability",
                qa3_label: "3. According to the Law of Demand, when the price <b>rises</b>, what happens to the quantity demanded?",
                qa3_placeholder: "Answer (rises or lowers)",
                qa4_label: "4. Where do the supply and demand curves meet?",
                qa4_placeholder: "Answer",
                qa5_label: "5. What socioeconomic factor refers to the type of job people have?",
                qa5_placeholder: "Answer",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Applied Economics!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review Market Structures and Demand/Supply Laws.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the entire module.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Batayan at Problema sa Ekonomiya",
                outline_aralin2: "Aralin 2: Demand, Supply, at Market Structures",
                outline_aralin3: "Aralin 3: Business Viability at Komunidad",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Senior High Learning Module Sheet",
                h1_title: "Applied Economics",
                h1_subtitle: "Pag-aaral sa matalinong paggamit ng resources para sa pangkalahatang benepisyo.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ibigay ang kahulugan ng Economics at <b>Applied Economics</b>.",
                obj_2: "Kilalanin ang mga pangunahing problema ng bansa (e.g., <b>Scarcity</b> at <b>Inequality</b>).",
                obj_3: "Ipaliwanag ang <b>Law of Supply and Demand</b> at <b>Equilibrium</b>.",
                obj_4: "Suriin ang iba't ibang <b>Market Structures</b> at ang epekto ng contemporary issues (e.g., oil price hike) sa purchasing power.",
                obj_5: "Tukuyin ang mga prinsipyo sa pagtatag ng <b>Viable Business</b> at ang epekto nito sa komunidad.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Batayan at Problema sa Ekonomiya",
                aralin1_h3_1: "Kahulugan ng Economics",
                aralin1_p1: "Ang <b>Economics</b> (mula sa Griyegong \"eikonomia\") ay ang matalinong paggamit ng salapi at resources para sa material na benepisyo. Lahat tayo ay \"economist\" dahil ang pang-araw-araw na buhay ay puno ng economic realities.",
                aralin1_h3_2: "Applied Economics",
                aralin1_p2: "Ang <b>Applied Economics</b> ay ang paggamit ng economic theories at principles para masuri at lutasin ang mga praktikal na isyu sa iba't ibang larangan (hal. labor, negosyo, agrikultura, kalusugan).",
                aralin1_h3_3: "Basic Economic Problems (Problema sa Resources)",
                aralin1_l3_1: "<b>Scarcity</b>: Ang kakulangan o limitasyon sa resources (lupa, labor, capital) kumpara sa walang katapusang pangangailangan ng tao. ", 
                aralin1_l3_2: "<b>What to produce and how much?</b>: Anong produkto o serbisyo ang dapat gawin, at gaano karami?",
                aralin1_l3_3: "<b>How to produce?</b>: Anong production method ang gagamitin?",
                aralin1_l3_4: "<b>For whom to produce?</b>: Sino ang target market ng produkto?",
                aralin1_p4: "Ang mga problema tulad ng <b>Kahirapan</b> (Poverty), <b>Kakulangan sa Trabaho</b> (Unemployment), at <b>Kakulangan sa Pagkain</b> (Hunger) ay patuloy na bumabagabag sa Pilipinas, lalo na dahil sa hindi pantay na paggamit ng resources.",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Demand, Supply, at Market Structures",
                aralin2_h3_1: "Law of Supply and Demand",
                aralin2_l1_1: "<b>Law of Demand</b>: Kapag mas mataas ang presyo, mas <b>mababa</b> ang quantity demanded.",
                aralin2_l1_2: "<b>Law of Supply</b>: Kapag mas mataas ang presyo, mas <b>mataas</b> ang quantity supplied (willingness ng producer na magbenta).",
                aralin2_p1: "Ang <b>Equilibrium Price and Quantity</b> ay ang punto sa market kung saan nagtatagpo ang supply at demand curves. Ito ang presyo na napagkasunduan ng buyers at sellers.",
                aralin2_h3_2: "Factors Affecting Demand and Supply",
                aralin2_l2_1: "<b>Income</b>: Kung mas malaki ang kita, mas mataas ang demand.",
                aralin2_l2_2: "<b>Tastes and Preferences</b>: Nagbabago ang gusto ng tao, na nakakaapekto sa demand.",
                aralin2_l2_3: "<b>Technology</b>: Nagpapababa ng production cost, na nagpapataas ng supply.",
                aralin2_l2_4: "<b>Price of Related Goods</b>: Nakakaapekto ang presyo ng substitutes at complementary goods.",
                aralin2_h3_3: "Market Structures",
                aralin2_l3_1: "<b>Perfect Competition</b>: Maraming small firms, nagbebenta ng homogenous (magkakahawig) na produkto.",
                aralin2_l3_2: "<b>Monopolistic Competition</b>: Maraming small firms, nagbebenta ng similar pero differentiated (may kaibahan) na produkto (e.g., iba't ibang brand ng sabon).",
                aralin2_l3_3: "<b>Oligopoly</b>: Maliit na bilang (few) ng malalaking firms ang nangingibabaw (e.g., Telecommunications, Gasoline companies).",
                aralin2_l3_4: "<b>Monopoly</b>: Iisang (single) firm lang ang kumokontrol sa buong market (e.g., Meralco bago ang deregulation).",
                aralin2_h3_4: "Epekto ng Contemporary Issues",
                aralin2_p4: "Ang pagtaas ng <b>Oil Price</b> ay nagpapataas ng presyo ng commodities. Ang <b>Fluctuations sa Exchange Rate</b> ay nakakaapekto sa halaga ng remittances ng OFWs at sa kakayahan ng bansa na mag-import.",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Business Viability at Komunidad",
                aralin3_h3_1: "Socioeconomic Factors sa Negosyo",
                aralin3_p1: "Ang tagumpay ng negosyo ay nakasalalay sa socioeconomic status ng customer base:",
                aralin3_l1_1: "<b>Income</b>: Kung mababa ang kita, mas restricted ang paggastos sa essential items.",
                aralin3_l1_2: "<b>Education/Skills</b>: Nakakaapekto sa uri ng trabaho at sa purchasing power ng populasyon.",
                aralin3_l1_3: "<b>Occupation</b>: Uri ng trabaho ng tao.",
                aralin3_h3_2: "Viability ng Negosyo at Komunidad",
                aralin3_p2: "Ang <b>Viability</b> ay ang kakayahan ng negosyo na magtagumpay at magpatuloy sa pag-operate. Sa pagtatatag ng negosyo, mahalagang itanong:",
                aralin3_l2_1: "Saan kukunin ang <b>Raw Materials</b> (Supply)?",
                aralin3_l2_2: "Ano ang <b>Potential Market Size</b> (Demand)?",
                aralin3_l2_3: "Sino ang mga <b>Competitors</b>?",
                aralin3_l2_4: "Sino ang <b>Target Customers</b>?",
                aralin3_p3: "Ang negosyo ay hindi lang para sa tubo. Dapat itong maging kasama ng komunidad sa pamamagitan ng pag-create ng <b>trabaho</b>, pagtaas ng <b>tax base</b>, at pagiging <b>innovative</b>.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Tukuyin ang tamang sagot batay sa mga konsepto ng Applied Economics.",
                quiz_section1_title: "A. Economic Basics",
                qa1_label: "1. Anong pangunahing problema ang tinutugunan ng Economics dahil sa limitadong resources?",
                qa1_placeholder: "Sagot",
                qa2_label: "2. Saang market structure iisang kumpanya lamang ang nagbebenta?",
                qa2_placeholder: "Sagot",
                quiz_section2_title: "B. Supply, Demand, at Viability",
                qa3_label: "3. Ayon sa Law of Demand, kapag <b>tumataas</b> ang presyo, ano ang mangyayari sa quantity demanded?",
                qa3_placeholder: "Sagot (tumataas o bumababa)",
                qa4_label: "4. Saan nagtatagpo ang supply at demand curves?",
                qa4_placeholder: "Sagot",
                qa5_label: "5. Anong socioeconomic factor ang tumutukoy sa kung anong trabaho mayroon ang mga tao?",
                qa5_placeholder: "Sagot",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Applied Economics!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review Market Structures and Demand/Supply Laws.`,
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
            return input.toLowerCase().replace(/[^a-z]/g, ''); 
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
                qa1: ['scarcity', 'kakulangan'],        // 1. Basic problem (Scarcity)
                qa2: ['monopoly', 'monopoliya', 'isa'],// 2. Single company sells (Monopoly)
                qa3: ['lower', 'mababa', 'bumababa'],  // 3. Price rises -> quantity demanded lowers
                qa4: ['equilibrium', 'tagpo'],         // 4. Meet point (Equilibrium)
                qa5: ['occupation', 'trabaho', 'hanapbuhay'], // 5. Type of job (Occupation)
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
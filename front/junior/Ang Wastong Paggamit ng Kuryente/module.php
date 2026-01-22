<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Proper Use of Electricity</title>
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
        
        /* Quiz and Outline Text Size */
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
        
        /* Table Styles */
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
            text-align: center;
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
        }
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
                    <a href="#objectives" class="outline-link" data-i18n="outline_objectives">Objectives</a>
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Understanding Electricity Use</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Ways to Reduce Electricity Use</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Electrical Safety</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Proper Use of Electricity</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Learning how electricity is used, consumed, and safely managed at home.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Confirmed: List items font size is set to 1.25rem (20px) -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Explain what <b>electricity</b> is and describe its uses.</li>
                        <li data-i18n="obj_2">Measure and calculate electrical energy consumption (<b>kW-h</b>).</li>
                        <li data-i18n="obj_3">Describe ways to <b>reduce electricity usage</b>.</li>
                        <li data-i18n="obj_4">Implement safe practices when using electricity and electrical appliances.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Ang Paggamit ng Elektrisidad -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Understanding Electricity Use</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1"><b>Electricity</b> is a form of energy created by the movement of <b>electrons</b> within atoms. It is generated primarily in large <b>power generators</b>.</p>
                            
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Energy Conversion</h3>
                            <p data-i18n="aralin1_p2">Appliances convert electrical energy into different forms of energy:</p>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin1_l1"><b>Mechanical Energy</b>: Causes movement (e.g., fan, washing machine).</li>
                                <li data-i18n="aralin1_l2"><b>Heat Energy</b>: Provides heat (e.g., iron, rice cooker, oven).</li>
                                <li data-i18n="aralin1_l3"><b>Light Energy</b>: Provides illumination (e.g., bulb, television).</li>
                                <li data-i18n="aralin1_l4"><b>Sound Energy</b>: Provides sound/music (e.g., radio, stereo).</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Conductors and Insulators</h3>
                            <p data-i18n="aralin1_p3">The flow of current depends on the material:</p>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin1_l5"><b>Conductors</b>: Materials that easily allow electricity to pass through (e.g., <b>metals, water</b>).</li>
                                <li data-i18n="aralin1_l6"><b>Insulators</b>: Materials that do not conduct electricity; used for safety (e.g., <b>plastic, dry wood, rubber</b>).</li>
                            </ul>
                        </div>
                    </details>

                    <!-- ARALIN 2: Mga Tamang Paraan upang Bawasan ang Paggamit ng Elektrisidad -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Ways to Reduce Electricity Use</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">Electricity consumption is measured in <b>Watt (W)</b> or <b>Kilowatt (kW)</b>. <b>1,000 W</b> is equivalent to <b>1 kW</b>.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Calculating Consumption (kW-h)</h3>
                            <p data-i18n="aralin2_p2">Consumption is measured in <b>Kilowatt-Hour (kW-h)</b>, which is the basis for your monthly electricity bill.</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex_p1">Formula:</p>
                                <p class="math-formula" data-i18n="aralin2_ex_formula"> kW-h = (Wattage &times; Hours of Use) &divide; 1,000 </p>
                                <p class="font-bold mt-2" data-i18n="aralin2_ex_q">EXAMPLE: Air Conditioner (1400 W) used for 8 hours.</p>
                                <p data-i18n="aralin2_ex_step1">1400 W &times; 8 hours = 11,200 Wh</p>
                                <p data-i18n="aralin2_ex_step2">11,200 Wh &divide; 1,000 = <b>11.2 kW-h</b></p>
                            </div>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Three Rules of Saving</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin2_l1"><b>Turn off</b> appliances when not needed.</li>
                                <li data-i18n="aralin2_l2"><b>Maintain</b> appliances (maintenance). Clean bulbs and filters, and defrost the refrigerator.</li>
                                <li data-i18n="aralin2_l3"><b>Choose Wisely</b> when purchasing (buy low Wattage, or fluorescent instead of incandescent).</li>
                            </ol>
                        </div>
                    </details>

                    <!-- ARALIN 3: Kaligtasan sa Paggamit ng Elektrisidad -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Electrical Safety</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">Electricity is dangerous. It is important to follow these safety rules:</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Basic Rules</h3>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin3_l1">Keep <b>Water</b> or any <b>Conductor</b> (metal) away from outlets or appliances.</li>
                                <li data-i18n="aralin3_l2">Do not overload outlets (do not plug too many appliances into one outlet).</li>
                                <li data-i18n="aralin3_l3">Ensure the <b>voltage (110V or 220V)</b> of the appliance matches the outlet.</li>
                                <li data-i18n="aralin3_l4">If there are infants, use <b>outlet covers</b> on sockets.</li>
                                <li data-i18n="aralin3_l5"><b>Unplug</b> appliances after use.</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">In Case of Electrocution</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4">
                                <li data-i18n="aralin3_ol1">Immediately <b>Turn Off the Main Power</b> (Circuit Breaker/Fuse Box) of the house.</li>
                                <li data-i18n="aralin3_ol2">Do not touch the victim or the cable with your bare hands. Use an <b>Insulator</b> (dry wood, dry cloth) to push the victim away.</li>
                                <li data-i18n="aralin3_ol3">Take the victim to the hospital. Even if they seem okay, they still need to be checked by a doctor.</li>
                            </ol>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Calculate the total electricity consumption. Provide the answer in <b>kilowatt-hour (kW-h)</b>. Provide the numerical answer.</p>

                    <form id="electricity-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_title">Consumption Calculation</p>
                            
                            <div class="flex flex-col space-y-4">
                                
                                <!-- QUESTION 1-3: Scenario 1 -->
                                <div class="space-y-2 pb-4 border-b border-gray-100">
                                    <p class="font-medium text-gray-700 text-xl" data-i18n="qa1_scenario"><b>Scenario 1:</b> 2 Bulbs (60 W each), 1 Air Conditioner (1,420 W), 1 Computer (250 W) - used for <b>3 hours</b>.</p>
                                    <br>
                                    <div class="flex flex-col space-y-2 ml-4">
                                        <!-- W-64 INPUT -->
                                        <label for="qa1" class="font-normal text-gray-700" data-i18n="qa1_label">1. Total Wattage (W) of the appliances:</label>
                                        <input type="text" id="qa1" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa1_placeholder" placeholder="Total Wattage (W)">
                                    </div>
                                    <div class="flex flex-col space-y-2 ml-4">
                                        <label for="qa2" class="font-normal text-gray-700" data-i18n="qa2_label">2. Total Consumption (Wh) (Total W &times; 3 hours):</label>
                                        <input type="text" id="qa2" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa2_placeholder" placeholder="Total Watt-hour (Wh)">
                                    </div>
                                    <div class="flex flex-col space-y-2 ml-4">
                                        <label for="qa3" class="font-normal text-gray-700" data-i18n="qa3_label">3. Final Consumption (<b>kW-h</b>) (Total Wh &divide; 1000):</label>
                                        <input type="text" id="qa3" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa3_placeholder" placeholder="kW-h">
                                    </div>
                                </div>

                                <!-- QUESTION 4-6: Scenario 2 -->
                                <div class="space-y-2 pt-4">
                                    <p class="font-medium text-gray-700 text-xl" data-i18n="qa4_scenario"><b>Scenario 2:</b> 1 Electric Fan (75 W), 1 Refrigerator (150 W), 3 Bulbs (15 W each) - used for <b>5 hours</b>.</p>
                                     <br>
                                    <div class="flex flex-col space-y-2 ml-4">
                                        <label for="qa4" class="font-normal text-gray-700" data-i18n="qa4_label">4. Total Wattage (W) of the appliances:</label>
                                        <input type="text" id="qa4" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa4_placeholder" placeholder="Total Wattage (W)">
                                    </div>
                                    <div class="flex flex-col space-y-2 ml-4">
                                        <label for="qa5" class="font-normal text-gray-700" data-i18n="qa5_label">5. Total Consumption (Wh) (Total W &times; 5 hours):</label>
                                        <input type="text" id="qa5" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa5_placeholder" placeholder="Total Watt-hour (Wh)">
                                    </div>
                                    <div class="flex flex-col space-y-2 ml-4">
                                        <label for="qa6" class="font-normal text-gray-700" data-i18n="qa6_label">6. Final Consumption (<b>kW-h</b>) (Total Wh &divide; 1000):</label>
                                        <input type="text" id="qa6" class="quiz-input w-full sm:w-64" data-i18n-placeholder="qa6_placeholder" placeholder="kW-h">
                                    </div>
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
                outline_aralin1: "Lesson 1: Understanding Electricity Use",
                outline_aralin2: "Lesson 2: Ways to Reduce Electricity Use",
                outline_aralin3: "Lesson 3: Electrical Safety",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Proper Use of Electricity",
                h1_subtitle: "Learning how electricity is used, consumed, and safely managed at home.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Explain what <b>electricity</b> is and describe its uses.",
                obj_2: "Measure and calculate electrical energy consumption (<b>kW-h</b>).",
                obj_3: "Describe ways to <b>reduce electricity usage</b>.",
                obj_4: "Implement safe practices when using electricity and electrical appliances.",

                // Lesson 1 Content (Basic Units)
                aralin1_title: "Lesson 1: Understanding Electricity Use",
                aralin1_p1: "<b>Electricity</b> is a form of energy created by the movement of <b>electrons</b> within atoms. It is generated primarily in large <b>power generators</b>.",
                aralin1_h3_1: "Energy Conversion",
                aralin1_p2: "Appliances convert electrical energy into different forms of energy:",
                aralin1_l1: "<b>Mechanical Energy</b>: Causes movement (e.g., fan, washing machine).",
                aralin1_l2: "<b>Heat Energy</b>: Provides heat (e.g., iron, rice cooker, oven).",
                aralin1_l3: "<b>Light Energy</b>: Provides illumination (e.g., bulb, television).",
                aralin1_l4: "<b>Sound Energy</b>: Provides sound/music (e.g., radio, stereo).",
                aralin1_h3_2: "Conductors and Insulators",
                aralin1_p3: "The flow of current depends on the material:",
                aralin1_l5: "<b>Conductors</b>: Materials that easily allow electricity to pass through (e.g., <b>metals, water</b>).",
                aralin1_l6: "<b>Insulators</b>: Materials that do not conduct electricity; used for safety (e.g., <b>plastic, dry wood, rubber</b>).",

                // Lesson 2 Content (Conversion)
                aralin2_title: "Lesson 2: Ways to Reduce Electricity Use",
                aralin2_p1: "Electricity consumption is measured in <b>Watt (W)</b> or <b>Kilowatt (kW)</b>. <b>1,000 W</b> is equivalent to <b>1 kW</b>.",
                aralin2_h3_1: "Calculating Consumption (kW-h)",
                aralin2_p2: "Consumption is measured in <b>Kilowatt-Hour (kW-h)</b>, which is the basis for your monthly electricity bill.",
                aralin2_ex_p1: "Formula:",
                aralin2_ex_formula: " kW-h = (Wattage &times; Hours of Use) &divide; 1,000 ",
                aralin2_ex_q: "EXAMPLE: Air Conditioner (1400 W) used for 8 hours.",
                aralin2_ex_step1: "1400 W &times; 8 hours = 11,200 Wh",
                aralin2_ex_step2: "11,200 Wh &divide; 1,000 = <b>11.2 kW-h</b>",
                aralin2_h3_2: "Three Rules of Saving",
                aralin2_l1: "<b>Turn off</b> appliances when not needed.",
                aralin2_l2: "<b>Maintain</b> appliances (maintenance). Clean bulbs and filters, and defrost the refrigerator.",
                aralin2_l3: "<b>Choose Wisely</b> when purchasing (buy low Wattage, or fluorescent instead of incandescent).",
                
                // Lesson 3 Content (Safety)
                aralin3_title: "Lesson 3: Electrical Safety",
                aralin3_p1: "Electricity is dangerous. It is important to follow these safety rules:",
                aralin3_h3_1: "Basic Rules",
                aralin3_l1: "Keep <b>Water</b> or any <b>Conductor</b> (metal) away from outlets or appliances.",
                aralin3_l2: "Do not overload outlets (do not plug too many appliances into one outlet).",
                aralin3_l3: "Ensure the <b>voltage (110V or 220V)</b> of the appliance matches the outlet.",
                aralin3_l4: "If there are infants, use <b>outlet covers</b> on sockets.",
                aralin3_l5: "<b>Unplug</b> appliances after use.",
                aralin3_h3_2: "In Case of Electrocution",
                aralin3_ol1: "Immediately <b>Turn Off the Main Power</b> (Circuit Breaker/Fuse Box) of the house.",
                aralin3_ol2: "Do not touch the victim or the cable with your bare hands. Use an <b>Insulator</b> (dry wood, dry cloth) to push the victim away.",
                aralin3_ol3: "Take the victim to the hospital. Even if they seem okay, they still need to be checked by a doctor.",


                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Calculate the total electricity consumption. Provide the answer in <b>kilowatt-hour (kW-h)</b>. Provide the numerical answer.",
                quiz_section_title: "Consumption Calculation",
                
                qa1_scenario: "<b>Scenario 1:</b> 2 Bulbs (60 W each), 1 Air Conditioner (1,420 W), 1 Computer (250 W) - used for <b>3 hours</b>.",
                qa1_label: "1. Total Wattage (W) of the appliances:",
                qa1_placeholder: "Total Wattage (W)",
                qa2_label: "2. Total Consumption (Wh) (Total W &times; 3 hours):",
                qa2_placeholder: "Total Watt-hour (Wh)",
                qa3_label: "3. Final Consumption (<b>kW-h</b>) (Total Wh &divide; 1000):",
                qa3_placeholder: "kW-h",
                
                qa4_scenario: "<b>Scenario 2:</b> 1 Electric Fan (75 W), 1 Refrigerator (150 W), 3 Bulbs (15 W each) - used for <b>5 hours</b>.",
                qa4_label: "4. Total Wattage (W) of the appliances:",
                qa4_placeholder: "Total Wattage (W)",
                qa5_label: "5. Total Consumption (Wh) (Total W &times; 5 hours):",
                qa5_placeholder: "Total Watt-hour (Wh)",
                qa6_label: "6. Final Consumption (<b>kW-h</b>) (Total Wh &divide; 1000):",
                qa6_placeholder: "kW-h",

                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your calculations are correct (${score}/${total}). You mastered kW-h calculation!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the formula: kW-h = (W &times; Hours) &divide; 1000.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Re-read Lesson 2 and try again.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Ang Paggamit ng Elektrisidad",
                outline_aralin2: "Aralin 2: Paraan para Bawasan ang Paggamit",
                outline_aralin3: "Aralin 3: Kaligtasan sa Paggamit ng Elektrisidad",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Ang Wastong Paggamit ng Kuryente",
                h1_subtitle: "Pag-aaral kung paano ginagamit, kino-konsumo, at sinisiguro ang kaligtasan ng kuryente sa bahay.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ipaliwanag kung ano ang <b>elektrisidad</b> at ilarawan ang mga gamit nito.",
                obj_2: "Sukatin at kalkulahin ang nagagamit na enerhiyang elektrikal (<b>kW-h</b>).",
                obj_3: "Ilarawan ang mga paraan upang <b>mabawasan ang paggamit ng elektrisidad</b>.",
                obj_4: "Ipatupad ang mga ligtas na paraan sa paggamit ng kuryente at kasangkapang elektrikal.",

                // Lesson 1 Content (Basic Units)
                aralin1_title: "Aralin 1: Ang Paggamit ng Elektrisidad",
                aralin1_p1: "Ang <b>Elektrisidad</b> ay isang uri ng enerhiya na nalilikha sa pamamagitan ng paggalaw ng mga <b>elektron</b> sa loob ng mga atom. Ginagawa ito sa malalaking <b>generator</b>.",
                aralin1_h3_1: "Pagbabago ng Enerhiya",
                aralin1_p2: "Ang mga kasangkapan ay nagbabago ng enerhiyang elektrikal sa iba't ibang uri ng enerhiya:",
                aralin1_l1: "<b>Enerhiyang Mekanikal</b>: Nagdudulot ng paggalaw (hal. bentilador, washing machine).",
                aralin1_l2: "<b>Enerhiyang Init</b>: Nagbibigay ng init (hal. plantsa, rice cooker, oven).",
                aralin1_l3: "<b>Enerhiyang Ilaw</b>: Nagbibigay ng liwanag (hal. bombilya, telebisyon).",
                aralin1_l4: "<b>Enerhiyang Tunog</b>: Nagbibigay ng ingay/musika (hal. radyo, stereo).",
                aralin1_h3_2: "Conductors at Insulators",
                aralin1_p3: "Ang daloy ng kuryente ay nakasalalay sa materyal:",
                aralin1_l5: "<b>Conductors</b>: Materyales na madaling dinaraanan ng kuryente (hal. <b>metal, tubig</b>).",
                aralin1_l6: "<b>Insulators</b>: Materyales na hindi nagpapadaan ng kuryente; ginagamit para sa kaligtasan (hal. <b>plastik, tuyong kahoy, goma</b>).",

                // Lesson 2 Content (Conversion)
                aralin2_title: "Aralin 2: Paraan para Bawasan ang Paggamit ng Elektrisidad",
                aralin2_p1: "Ang paggamit ng kuryente ay nasusukat sa <b>Watt (W)</b> o <b>Kilowatt (kW)</b>. Ang <b>1,000 W</b> ay katumbas ng <b>1 kW</b>.",
                aralin2_h3_1: "Pagkalkula ng Konsumo (kW-h)",
                aralin2_p2: "Ang pagkonsumo ay nasusukat sa <b>Kilowatt-Oras (kW-h)</b>, na siyang basehan ng inyong buwanang bayarin.",
                aralin2_ex_p1: "Pormula:",
                aralin2_ex_formula: " kW-h = (Wattage &times; Oras ng Paggamit) &divide; 1,000 ",
                aralin2_ex_q: "HALIMBAWA: Aircon (1400 W) ginamit ng 8 oras.",
                aralin2_ex_step1: "1400 W &times; 8 oras = 11,200 Wh",
                aralin2_ex_step2: "11,200 Wh &divide; 1,000 = <b>11.2 kW-h</b>",
                aralin2_h3_2: "Tatlong Tuntunin sa Pagtitipid",
                aralin2_l1: "<b>Patayin</b> ang kagamitan kung hindi kinakailangan.",
                aralin2_l2: "<b>Panatilihing Maayos</b> ang kagamitan (maintenance). Linisin ang mga bombilya, filter, at i-defrost ang refrigerator.",
                aralin2_l3: "<b>Piliin Nang Mabuti</b> ang bibilhin (bumili ng may mababang Wattage, o fluorescent kaysa incandescent).",
                
                // Lesson 3 Content (Safety)
                aralin3_title: "Aralin 3: Kaligtasan sa Paggamit ng Elektrisidad",
                aralin3_p1: "Ang kuryente ay mapanganib. Mahalagang sundin ang mga sumusunod na panuntunan para sa kaligtasan:",
                aralin3_h3_1: "Pangunahing Panuntunan",
                aralin3_l1: "Huwag ilapit ang <b>Tubig</b> o anumang <b>Conductor</b> (metal) sa saksakan o kagamitan.",
                aralin3_l2: "Huwag mag-overload ng saksakan (huwag mag-saksak ng maraming kagamitan sa isang outlet).",
                aralin3_l3: "Siguraduhin na ang <b>boltahe (110V o 220V)</b> ng kagamitan ay tugma sa saksakan.",
                aralin3_l4: "Kapag may sanggol, lagyan ng <b>takip (outlet cover)</b> ang mga saksakan.",
                aralin3_l5: "<b>Tanggalin sa saksakan</b> ang mga kagamitan pagkatapos gamitin.",
                aralin3_h3_2: "Kapag May Nakuryente",
                aralin3_ol1: "Agad na <b>Patayin ang Main Power</b> (Circuit Breaker/Fuse Box) ng bahay.",
                aralin3_ol2: "Huwag hawakan ang biktima o ang kable gamit ang kamay. Gumamit ng <b>Insulator</b> (tuyong kahoy, tuyong damit) para itulak palayo ang biktima.",
                aralin3_ol3: "Dalhin ang biktima sa ospital. Kahit mukhang okay, kailangan pa rin siyang tingnan ng doktor.",


                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Kalkulahin ang kabuuang pagkonsumo ng kuryente. Ibigay ang sagot sa <b>kilowatt-oras (kW-h)</b>. Ibigay ang numerical answer.",
                quiz_section_title: "Kalkulasyon ng Konsumo",
                
                qa1_scenario: "<b>Scenario 1:</b> 2 Bombilya (60 W bawat isa), 1 Air Conditioner (1,420 W), 1 Kompyuter (250 W) - ginamit ng <b>3 oras</b>.",
                qa1_label: "1. Kabuuang Wattage (W) ng kagamitan:",
                qa1_placeholder: "Total Wattage (W)",
                qa2_label: "2. Kabuuang Consumption (Wh) (Total W &times; 3 hours):",
                qa2_placeholder: "Total Watt-oras (Wh)",
                qa3_label: "3. Final Consumption (<b>kW-h</b>) (Total Wh &divide; 1000):",
                qa3_placeholder: "kW-h",
                
                qa4_scenario: "<b>Scenario 2:</b> 1 Electric Fan (75 W), 1 Refrigerator (150 W), 3 Bombilya (15 W each) - ginamit ng <b>5 oras</b>.",
                qa4_label: "4. Kabuuang Wattage (W) ng kagamitan:",
                qa4_placeholder: "Total Wattage (W)",
                qa5_label: "5. Kabuuang Consumption (Wh) (Total W &times; 5 hours):",
                qa5_placeholder: "Total Watt-oras (Wh)",
                qa6_label: "6. Final Consumption (<b>kW-h</b>) (Total Wh &divide; 1000):",
                qa6_placeholder: "kW-h",

                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong kalkulasyon (${score}/${total}). Master mo na ang pagkalkula ng kW-h!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang pormula: kW-h = (W &times; Oras) &divide; 1000.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang Aralin 2 at subukan muli.`,
            }
        };

        let currentLang = 'en'; // DEFAULT LANGUAGE IS ENGLISH, as requested

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
                    // Use innerHTML for text that contains <b> tags or <pre> code blocks
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
        const sections = [
            'objectives', 
            'aralin1', 
            'aralin2', 
            'aralin3', 
            'pagsasanay'
        ];
        
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

        // --- QUIZ LOGIC ---

        // Function to standardize numerical input for float comparison
        function standardizeFloat(value, precision = 2) {
            if (typeof value !== 'string') value = String(value);
            // Remove all non-numeric characters except for dots
            value = value.trim().replace(/\s/g, '').replace(/[^0-9.]/g, ''); 
            const parsedValue = parseFloat(value);
            if (isNaN(parsedValue)) return ''; 
            
            // Remove trailing zeros for cleaner comparison (e.g., 4.7 instead of 4.70)
            return parsedValue.toFixed(precision).replace(/\.?0+$/, ''); 
        }

        function checkAnswer(id, expected, precision = 2) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            const standardizedInput = parseFloat(standardizeFloat(rawValue, precision));
            const expectedFloat = parseFloat(standardizeFloat(String(expected), precision));
            
            // Use a small tolerance for comparison
            const isCorrect = Math.abs(standardizedInput - expectedFloat) < 0.01;

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
            const totalQuestions = 6; 
            const resultsDiv = document.getElementById('results');

            // --- Final Assessment Answers ---
            // Scenario 1: 3 Hours
            const W_Bombilya_1 = 2 * 60; // 120 W
            const W_Aircon_1 = 1420;     
            const W_Kompyuter_1 = 250;    
            
            const totalWattage_1 = W_Bombilya_1 + W_Aircon_1 + W_Kompyuter_1; // 1790 W
            const totalWh_1 = totalWattage_1 * 3; // 5370 Wh
            const totalKwh_1 = totalWh_1 / 1000; // 5.37 kWh

            // Scenario 2: 5 Hours
            const W_Fan_2 = 75; 
            const W_Fridge_2 = 150; 
            const W_Lights_2 = 3 * 15; // 45 W
            
            const totalWattage_2 = W_Fan_2 + W_Fridge_2 + W_Lights_2; // 270 W
            const totalWh_2 = totalWattage_2 * 5; // 1350 Wh
            const totalKwh_2 = totalWh_2 / 1000; // 1.35 kWh
            
            if (!isLanguageToggle) {
                // Run checks only on button click, not language toggle
                correctCount += checkAnswer('qa1', totalWattage_1, 0); // 1. Total Wattage (W)
                correctCount += checkAnswer('qa2', totalWh_1, 0);      // 2. Total Consumption (Wh)
                correctCount += checkAnswer('qa3', totalKwh_1, 2);     // 3. Final Consumption (kW-h)
                
                correctCount += checkAnswer('qa4', totalWattage_2, 0);  // 4. Total Wattage (W)
                correctCount += checkAnswer('qa5', totalWh_2, 0);       // 5. Total Consumption (Wh)
                correctCount += checkAnswer('qa6', totalKwh_2, 2);      // 6. Final Consumption (kW-h)
                
                // Store the current score to maintain state across language toggles
                resultsDiv.setAttribute('data-current-score', correctCount);
            } else {
                 // If it's a language toggle, retrieve the score
                 correctCount = parseInt(resultsDiv.getAttribute('data-current-score')) || 0;
            }

            // Display results
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
        
        document.getElementById('electricity-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); 
        });
        
        window.addEventListener('load', () => {
             // Initialize default language (English) and outline highlight on load
             updateLanguage('en');
             highlightOutlineLink();
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ang Elektrisidad at ang mga Gamit Nito</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        /* Base styles copied for consistency (Green/Emerald Theme) */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0fdf4; /* Green 50 */
        }
        /* REVERTED: Set primary accent back to #10b981 (Emerald Green) */
        .accent-bg { background-color: #10b981; } 
        .module-section { 
            transition: all 0.3s ease; 
            border: 1px solid #e5e7eb; /* Light border */
        }
        .module-section:hover { 
            /* Subtle emerald glow effect on hover */
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.2), 0 4px 6px -2px rgba(16, 185, 129, 0.1); 
        }
        .content-box { padding: 1.5rem; background-color: #ffffff; }
        .content-box h2, .content-box h3 { font-weight: 700; margin-top: 1rem; margin-bottom: 0.5rem; }
        .content-box h2 { font-size: 1.75rem; color: #0e7490; } /* Dark Teal */
        .content-box h3 { font-size: 1.5rem; color: #1f2937; }
        
        /* --- ADDED CUSTOM STYLE FOR MAIN H1 TITLE (50px) --- */
        .main-title-h1 {
            font-size: 50px; /* 50px */
            line-height: 1.1;
        }
        /* --- END ADDED CUSTOM STYLE --- */

        /* --- UPDATED MAIN CONTENT FONT SIZE AND SPACING --- */
        .content-box p { 
            margin-bottom: 2rem; 
            line-height: 1.75; 
            color: #4b5563;
            font-size: 1.25rem; /* Explicitly 20px */
        }
        .content-box ul, .content-box ol { 
            margin-left: 1.5rem; 
            margin-bottom: 2rem; 
            font-size: 1.25rem; /* Explicitly 20px */
        }
        .content-box .example-box {
            /* Styled to look like a callout box */
            background-color: #f3f4f6; 
            border-left: 4px solid #34d399; /* Green accent border */
            padding: 1rem;
            margin-top: 2rem; 
            margin-bottom: 2rem; 
            border-radius: 0.5rem;
            font-size: 1.25rem; /* Explicitly 20px for example box content (UPDATED) */
        }
        /* REVERTED: Key terms use Emerald 700 (#059669) - keeping this dark green as it looks best for text */
        .content-box strong, .content-box b { color: #059669; font-weight: 700; } 
        
        .text-illustration {
            font-style: italic;
            color: #4b5563;
            border: 1px dashed #d1d5db;
            padding: 0.75rem;
            margin-bottom: 2rem; 
            border-radius: 0.5rem;
            font-size: 1.25rem; /* Explicitly 20px */
        }
        .math-display {
            display: block;
            margin: 2rem 0; 
            padding: 0.75rem; 
            text-align: center;
            font-size: 1.5rem; 
            font-weight: bold;
            color: #059669; /* Matched color to key terms */
            background-color: #ecfdf5;
            border-radius: 0.5rem;
            border: 1px dashed #a7f3d0;
        }
        .highlighted-number {
            color: #0e7490; /* Dark Teal for distinct highlighting */
            font-weight: 700;
        }
        
        /* Outline Styles (Sticky Navigation) */
        .outline-link { 
            display: block; 
            padding: 0.5rem 0.75rem; 
            border-radius: 0.5rem; 
            color: #4b5563; 
            transition: background-color 0.15s, color 0.15s; 
        }
        .outline-link:hover { 
            background-color: #d1fae5; 
            color: #059669; 
        }
        /* REVERTED: Active link background uses Emerald 500 (#10b981) */
        .outline-link.active { 
            font-weight: 700; 
            background-color: #10b981; 
            color: #ffffff; 
        }

        /* --- NEW LESSON TITLE FONT SIZE: 22px (1.375rem) --- */
        .module-section summary span {
            font-size: 1.375rem; /* Explicitly 22px */
        }

        /* Quiz styles refined for consistency */
        .radio-choice {
            /* Now block-level to fill grid cell */
            display: block; 
            align-items: center;
            margin-right: 0; 
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: all 0.2s;
            cursor: pointer;
            font-size: 1.25rem; /* Explicitly 20px */
        }
        .radio-choice:hover {
            background-color: #f0fdf4;
        }
        
        .radio-choice input[type="radio"] {
            margin-right: 0.5rem;
            cursor: pointer;
            display: inline-block; 
        }
        /* REVERTED: Correct border uses Emerald 500 (#10b981) */
        .radio-choice.correct-border {
            border: 1px solid #10b981 !important;
            background-color: #ecfdf5;
        }
        .radio-choice.incorrect-border {
            border: 1px solid #ef4444 !important;
            background-color: #fef2f2;
        }
        
        /* Calculation input styles */
        .calc-input {
            border: 1px solid #d1fae5;
            border-bottom: 2px solid #a7f3d0; 
            transition: border-color 0.2s, background-color 0.2s; 
            padding: 0.5rem; 
            text-align: center; 
            border-radius: 0.375rem;
            font-size: 1.125rem; 
            /* Added consistency for full width on mobile, and a max width on desktop */
            width: 100%;
            max-width: 30rem; /* Adjusted for better desktop spacing */
        }
        /* REVERTED: Focus border uses Emerald 700 (#059669) */
        .calc-input:focus { border-color: #059669; outline: none; box-shadow: 0 0 0 1px #059669; }
        
        /* Quiz labels and text now set to 1.25rem (20px) */
        #pagsasanay label {
            font-size: 1.25rem; 
        }
        
        /* Specific text size for titles above example boxes (UPDATED) */
        .content-box h4 {
            font-size: 1.25rem; 
        }
        
        /* Explicitly set Objectives list items to default content size (1.25rem/20px) */
        #objectives ul li {
            font-size: 1.25rem; 
        }
        
        /* Custom CSS to make the entire NAV sticky */
        #outline-nav .sticky-container {
            position: sticky;
            top: 1rem; /* Adjust this value as needed, 1rem (16px) is usually good */
        }
    </style>
</head>
<body class="p-4 sm:p-8 lg:p-20">

    <!-- MAIN GRID CONTAINER -->
    <div class="mx-auto lg:grid lg:grid-cols-12 lg:gap-8">
        
        <!-- LEFT OUTLINE (Table of Contents) -->
        <nav id="outline-nav" class="lg:block lg:col-span-3 mb-8 lg:mb-0">
            
            <!-- STICKY WRAPPER: Contains all elements that need to stick to the top -->
            <div class="sticky-container space-y-4">
            
                <!-- 1. Go Back to Modules (Balik sa mga Modyul) - FIRST POSITION -->
                <a href="http://localhost/als/front/modules.php" id="back-to-modules" 
                   class="w-full flex items-center text-base text-gray-600 hover:text-green-700 transition duration-150 p-4 rounded-xl bg-white shadow-lg border border-gray-200 hover:bg-gray-50">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    <span data-i18n="back_to_modules">Go Back to Modules</span>
                </a>
                
                <!-- 2. OUTLINE (Balangkas ng Modyul) - SECOND POSITION -->
                <div id="outline" class="p-4 space-y-2 bg-white rounded-xl shadow-lg border border-green-100">
                    
                    <!-- Outline Header: Title only -->
                    <div class="border-b pb-2 mb-2">
                        <h3 class="text-lg font-bold text-green-700" data-i18n="outline_title">Module Outline</h3>
                    </div>
                    
                    <a href="#objectives" class="outline-link" data-i18n="outline_objectives">Objectives</a>
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Electricity and Uses</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Energy Saving</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Safety</a>
                    <a href="#pagsasanay" class="outline-link" data-i18n="outline_quiz">Practice</a>
                </div>

                <!-- 3. Language Toggle Button (Translator) - LAST POSITION -->
                <div class="p-4 bg-white rounded-xl shadow-lg border border-green-100 flex justify-between items-center">
                    <!-- STATIC LANGUAGE LABEL (Wika: Tagalog / Language: English) -->
                    <span id="current-lang-label" class="text-base text-gray-700">Language: English</span> 
                    
                    <!-- TOGGLE BUTTON: Emerald Green colors -->
                    <button id="lang-toggle-btn" class="py-1 px-3 rounded-xl bg-[#10b981] text-white hover:bg-[#059669] transition duration-150 text-base">
                        <span data-i18n="toggle_text">Switch to: Tagalog</span>
                    </button>
                </div>
            
            </div>
            
        </nav>

        <!-- MAIN CONTENT AREA -->
        <main class="lg:col-span-9">
            <!-- Main Module Container with Top/Left Green Border -->
            <div id="main-content-wrapper" class="bg-white p-6 sm:p-10 rounded-2xl shadow-2xl border-t-4 border-l-4 border-green-600">
                
                <!-- Header Section -->
                <header class="text-center mb-10">
                    <span class="text-xs font-semibold uppercase tracking-wider text-green-600 bg-green-100 px-3 py-1 rounded-full">Advance Elementary Learning Module Sheet</span>
                    
                    <!-- H1 Title -->
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Electricity and Its Uses</h1>
                    
                    <!-- Subtitle -->
                    <p class="mt-4 text-gray-600 italic" data-i18n="h1_subtitle">This module will help you understand essential concepts about electricity that you can use in your daily life.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Objective list items are individually translatable -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4 mb-6"> 
                        <li data-i18n="obj_1">Explain the importance of electricity;</li>
                        <li data-i18n="obj_2">Calculate the electricity consumption of your appliances;</li>
                        <li data-i18n="obj_3">Lower your electricity bill; and</li>
                        <li data-i18n="obj_4">Practice safety procedures at home when using electrical devices.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">
                    
                    <!-- ARALIN 1: ANG ELEKTRISIDAD AT MGA GAMIT NITO -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Electricity and Its Uses</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150 rotate-180" fill="none" stroke="currentColor" viewBox="0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <!-- Paragraph 1 -->
                            <p data-i18n="aralin1_p1">Look around your house and observe what electricity does for you. Doesn't it provide power to your fan, television, radio, iron, and refrigerator? In this lesson, you will learn a lot about the <span class=\"font-bold text-green-700\">importance of electricity</span>, especially at home.</p>
                            <br>
                            
                            <!-- Subtitle 1 -->
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Let's Learn: What is Electricity?</h3>
                            
                            <!-- Paragraph 2 -->
                            <p data-i18n="aralin1_p2"><span class=\"font-bold text-green-700\">Electricity</span> is a form of energy. We cannot see it, but we can witness how it runs things. An object that requires electrical power has a <span class=\"font-bold text-green-700\">motor</span> inside. Electricity is what drives the motor.</p>

                            <!-- Illustration Box -->
                            <div class="text-illustration" data-i18n="aralin1_illustration">
                                <span class=\"font-bold text-green-700\">(Illustration placeholder for Electric Fan)</span> Electricity flows through its wires. This then spins the rotor, which is the reason electricity spins the fan's blade.
                            </div>
                            <br>
                            
                            <!-- Subtitle 2 -->
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Uses of Electricity</h3>
                            
                            <!-- List of Uses -->
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="use_1">Provides light to houses.</li>
                                <li data-i18n="use_2">Used in <span class=\"font-bold text-green-700\">computers</span> and <span class=\"font-bold text-green-700\">communication</span> (radio/telephone).</li>
                                <li data-i18n="use_3">Used for <span class=\"font-bold text-green-700\">cooking</span> and <span class=\"font-bold text-green-700\">preserving</span> food (refrigerator).</li>
                                <li data-i18n="use_4">Runs the <span class=\"font-bold text-green-700\">Light Rail Transit (LRT)</span>.</li>
                                <li data-i18n="use_5">Used for <span class=\"font-bold text-green-700\">laundry</span> (washing machine) and <span class=\"font-bold text-green-700\">ironing</span> (electric iron).</li>
                            </ul>
                            <br>
                            
                            <!-- Subtitle 3 -->
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Measuring Electricity Consumption</h3>
                            
                            <!-- Paragraph 3 -->
                            <p data-i18n="aralin1_p3">The label found on the appliance (e.g., 600w) is called <span class=\"font-bold text-green-700\">wattage</span>. 'w' stands for <span class=\"font-bold text-green-700\">watts</span>. The <span class=\"font-bold text-green-700\">watt</span> is the unit used to measure electric power.</p>
                            
                            <!-- Math Display 1 -->
                            <div class="math-display"> <span data-i18n="math_1"><span class=\"font-bold text-green-700\">1,000 watts = 1 kilowatt</span> (1 kw)</span> </div>
                            <br>
                            
                            <!-- Paragraph 4 -->
                            <p data-i18n="aralin1_p4">The <span class=\"font-bold text-green-700\">kilowatt-hour (kwh)</span> is the standard unit of measurement for electricity consumption.</p>
                            
                            <!-- Math Display 2 -->
                            <div class="math-display"> <span data-i18n="math_2"><span class=\"font-bold text-green-700\">1,000 watt-hours (wh) = 1 kilowatt-hour (kwh)</span></span> </div>
                            <br>
                            
                            <!-- Formula Title -->
                            <h4 class="font-bold text-gray-800 mt-4" data-i18n="aralin1_h4_formula">Consumption Formula:</h4>
                            
                            <!-- Formula Box -->
                            <div class="example-box">
                                <span data-i18n="aralin1_formula_text">Electricity Consumption (wh) = Wattage (w) <span class=\"text-green-600 font-bold\">x</span> Duration of Use (h)</span>
                            </div>
                            <br>
                            
                            <!-- Example Title -->
                            <h4 class="font-bold text-gray-800 mt-4" data-i18n="aralin1_h4_example">Calculation Example (Iron):</h4>
                            
                            <!-- Example Box -->
                            <div class="example-box">
                                <p data-i18n="aralin1_example_p1">Appliance: Iron (<span class=\"font-bold text-green-700\">600w</span>) used for <span class=\"font-bold text-green-700\">5 hours</span>.</p>
                                <p>600 w x 5 h = <strong class="highlighted-number">3000 wh</strong></p>
                                <p data-i18n="aralin1_example_p2">Conversion: 3000 wh &divide; 1000 = <strong class="highlighted-number">3 kwh</strong></p>
                            </div>

                        </div>
                    </details>

                    <!-- ARALIN 2: PAANO KA MAKATITIPID NG KURYENTE -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <!-- Span uses data-i18n for translation -->
                            <span data-i18n="aralin2_title">Lesson 2: How to Save Electricity</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">Saving on your electricity consumption is <span class=\"font-bold text-green-700\">saving money</span>. There are many easy and effective ways to lower your electricity consumption.</p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Suggested Ways to Save</h3>
                            <ol class="list-decimal list-inside space-y-3 ml-4">
                                <li data-i18n="tip_1"><span class=\"font-bold text-green-700\">Turn off</span> electrical appliances when not in use (e.g., TV, lights).</li>
                                <li data-i18n="tip_2">Use <span class=\"font-bold text-green-700\">fluorescent lights</span> (or LED) instead of incandescent bulbs, as they have lower wattage.</li>
                                <li data-i18n="tip_3"><span class=\"font-bold text-green-700\">Regularly clean</span> lights and fans to make them more efficient.</li>
                                <li data-i18n="tip_4">For fans, set to the <span class=\"font-bold text-green-700\">lowest speed</span> if it's not too hot.</li>
                                <li data-i18n="tip_5">For the <span class=\"font-bold text-green-700\">Refrigerator</span>:
                                    <ul class="list-disc list-inside ml-6 space-y-1">
                                        <li data-i18n="tip_5a">Clean the <span class=\"font-bold text-green-700\">coil</span> at the back.</li>
                                        <li data-i18n="tip_5b">Ensure the door is always <span class=\"font-bold text-green-700\">closed</span>.</li>
                                        <li data-i18n="tip_5c">Avoid repeatedly opening and closing the door.</li>
                                    </ul>
                                </li>
                                <li data-i18n="tip_6"><span class=\"font-bold text-green-700\">Hang</span> clothes outside instead of using a spin dryer.</li>
                                <li data-i18n="tip_7">Set an <span class=\"font-bold text-green-700\">ironing day</span>. Iron in large batches rather than small ones.</li>
                                <li data-i18n="tip_8">Buy electrical appliances with <span class=\"font-bold text-green-700\">low wattage</span>.</li>
                            </ol>
                        </div>
                    </details>

                    <!-- ARALIN 3: KALIGTASANG PANG-ELEKTRISIDAD -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <!-- Span uses data-i18n for translation -->
                            <span data-i18n="aralin3_title">Lesson 3: Electrical Safety</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <!-- Paragraph 1 -->
                            <p data-i18n="aralin3_p1">Electricity is useful, but if used carelessly, it also becomes a <span class=\"font-bold text-green-700\">danger</span> to us. Electricity can cause an <span class=\"font-bold text-green-700\">'electric shock'</span> and <span class=\"font-bold text-green-700\">fire</span>.</p>
                            <br>
                            
                            <!-- Subtitle 1 -->
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Procedures to Prevent Accidents</h3>
                            
                            <!-- List of Safety Tips -->
                            <ol class="list-decimal list-inside space-y-3 ml-4">
                                <li data-i18n="safety_tip_1">If you are not using the electricity, <span class=\"font-bold text-green-700\">turn it off</span>.</li>
                                <li data-i18n="safety_tip_2"><span class=\"font-bold text-green-700\">Cover</span> electrical outlets with plastic covers, especially if there are <span class=\"font-bold text-green-700\">children</span> in the house.</li>
                                <li data-i18n="safety_tip_3">Do not plug <span class=\"font-bold text-green-700\">too many</span> appliances into a single electrical outlet. This can cause a <span class=\"font-bold text-green-700\">fire</span>.</li>
                                <li data-i18n="safety_tip_4">Pull the plug from the <span class=\"font-bold text-green-700\">plug head</span>, not the cord.</li>
                                <li data-i18n="safety_tip_5">Do not touch light switches or plug in appliances if your hands are <span class=\"font-bold text-green-700\">wet</span> or if you are standing on a wet floor.</li>
                                <li data-i18n="safety_tip_6">Do not put metal objects inside an electrical appliance (e.g., toaster, fan).</li>
                                <li data-i18n="safety_tip_7">Cover bare electrical wires with <span class=\"font-bold text-green-700\">electrical tape</span>.</li>
                            </ol>
                            <br>
                            
                            <!-- Subtitle 2 -->
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">What to Do When Someone is Electrocuted?</h3>
                            
                            <!-- List of Electric Shock Response -->
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="shock_1"><span class=\"font-bold text-green-700\">Do not touch the victim.</span> You will also be electrocuted.</li>
                                <li data-i18n="shock_2">First unplug the appliance or <span class=\"font-bold text-green-700\">turn off the power at the main switch</span>.</li>
                                <li data-i18n="shock_3">If you cannot turn off the power, use a <span class=\"font-bold text-green-700\">dry wooden broom</span> or dry clothing to <span class=\"font-bold text-green-700\">push the victim</span> away from the electricity.</li>
                                <li data-i18n="shock_4">Then call for medical help.</li>
                            </ul>
                            <br>
                            
                            <!-- Subtitle 3 -->
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_3">What to Do When There is an Electrical Fire?</h3>
                            
                            <!-- List of Fire Response -->
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="fire_1">Unplug the burning appliance. <span class=\"font-bold text-green-700\">Do not pour water</span> on the appliance.</li>
                                <li data-i18n="fire_2">Get everyone out of the house.</li>
                                <li data-i18n="fire_3"><span class=\"font-bold text-green-700\">Call the fire department.</span></li>
                            </ul>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- Pagsasanay Title size set to text-4xl -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <!-- Added text-xl class for 20px font size -->
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the questions to test your knowledge.</p>

                    <form id="math-quiz-form" class="space-y-6">

                        <!-- Section A: Multiple Choice -->
                        <div class="space-y-6 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Multiple Choice (Choose the correct answer)</p>
                            <div class="space-y-6"> <!-- This space-y-6 creates the equal spacing between questions -->
                                <!-- Q1: May nakuryente -->
                                <div id="q_qa1">
                                    <label class="block mb-1 font-medium" data-i18n="q1_label">1. What should you do if you see a person being electrocuted?</label>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-2"> <!-- Modified to grid-cols-2 -->
                                        <label class="radio-choice" for="qa1_a"><input type="radio" id="qa1_a" name="qa1" value="a" data-i18n="q1_a">Pour water on the victim.</label>
                                        <label class="radio-choice" for="qa1_b"><input type="radio" id="qa1_b" name="qa1" value="b" data-i18n="q1_b">Pull them away from the electricity.</label>
                                        <label class="radio-choice" for="qa1_c"><input type="radio" id="qa1_c" name="qa1" value="c" data-i18n="q1_c">Push them with the handle of a dry wooden broom.</label>
                                        <label class="radio-choice" for="qa1_d"><input type="radio" id="qa1_d" name="qa1" value="d" data-i18n="q1_d">Call a doctor.</label>
                                    </div>
                                </div>
                                
                                <!-- Q2: Ilalayo sa kuryente -->
                                <div id="q_qa2">
                                    <label class="block mb-1 font-medium" data-i18n="q2_label">2. What object should you keep away from your electrical appliances?</label>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-2"> <!-- Modified to grid-cols-2 -->
                                        <label class="radio-choice" for="qa2_a"><input type="radio" id="qa2_a" name="qa2" value="a" data-i18n="q2_a">Plastic</label>
                                        <label class="radio-choice" for="qa2_b"><input type="radio" id="qa2_b" name="qa2" value="b" data-i18n="q2_b">Rubber</label>
                                        <label class="radio-choice" for="qa2_c"><input type="radio" id="qa2_c" name="qa2" value="c" data-i18n="q2_c">Wood</label>
                                        <label class="radio-choice" for="qa2_d"><input type="radio" id="qa2_d" name="qa2" value="d" data-i18n="q2_d">Water</label>
                                    </div>
                                </div>

                                <!-- Q3: Paano makatipid -->
                                <div id="q_qa3">
                                    <label class="block mb-1 font-medium" data-i18n="q3_label">3. What should you do to save electricity?</label>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-2"> <!-- Modified to grid-cols-2 -->
                                        <label class="radio-choice" for="qa3_a"><input type="radio" id="qa3_a" name="qa3" value="a" data-i18n="q3_a">Leave the lights on even when no one is around.</label>
                                        <label class="radio-choice" for="qa3_b"><input type="radio" id="qa3_b" name="qa3" value="b" data-i18n="q3_b">In the morning, open the windows to let in light.</label>
                                        <label class="radio-choice" for="qa3_c"><input type="radio" id="qa3_c" name="qa3" value="c" data-i18n="q3_c">Let dust accumulate on the light bulbs.</label>
                                        <label class="radio-choice" for="qa3_d"><input type="radio" id="qa3_d" name="qa3" value="d" data-i18n="q3_d">Paint your room a dark color.</label>
                                    </div>
                                </div>
                                
                                <!-- Q4: Iwas sunog -->
                                <div id="q_qa4">
                                    <label class="block mb-1 font-medium" data-i18n="q4_label">4. What should you do to prevent a fire?</label>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-2"> <!-- Modified to grid-cols-2 -->
                                        <label class="radio-choice" for="qa4_a"><input type="radio" id="qa4_a" name="qa4" value="a" data-i18n="q4_a">Cover all electrical sockets or 'outlets'.</label>
                                        <label class="radio-choice" for="qa4_b"><input type="radio" id="qa4_b" name="qa4" value="b" data-i18n="q4_b">Do not use electrical appliances.</label>
                                        <label class="radio-choice" for="qa4_c"><input type="radio" id="qa4_c" name="qa4" value="c" data-i18n="q4_c">Do not touch any wire or electrical device when your hands are wet.</label>
                                        <label class="radio-choice" for="qa4_d"><input type="radio" id="qa4_d" name="qa4" value="d" data-i18n="q4_d">Do not plug too many appliances into one 'outlet'.</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section B: Calculation -->
                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Calculation (Provide the answer in <span class=\"font-bold\">watt-hours (wh)</span>)</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1" data-i18n="qb1_label">1. Airpot (600w) used for 1 and 1/2 hours:</label>
                                    <!-- Class w-full and max-w-30rem are now applied via the .calc-input CSS class -->
                                    <input type="number" id="qb1" class="calc-input" placeholder="wh"> 
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2" data-i18n="qb2_label">2. Refrigerator (8 ft³ - 130w) used for 7 hours:</label>
                                    <input type="number" id="qb2" class="calc-input" placeholder="wh">
                                </div>
                                <!-- NEW QUESTION 3 -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qb3" data-i18n="qb3_label">3. LED Light (10w) kept on for 24 hours:</label>
                                    <input type="number" id="qb3" class="calc-input" placeholder="wh">
                                </div>
                                <!-- NEW QUESTION 4 -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qb4" data-i18n="qb4_label">4. Electric Fan (70w) used for 6 hours:</label>
                                    <input type="number" id="qb4" class="calc-input" placeholder="wh">
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="w-[70%] mx-auto block accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
                            Check Answers
                        </button>
                    </form>

                    <!-- REVERTED: Removed w-full max-w-4xl from results div -->
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
                toggle_text_tl: "Switch to: Tagalog", // Button text when current language is EN
                outline_title: "Module Outline",
                outline_objectives: "Objectives",
                outline_aralin1: "Lesson 1: Electricity and Uses",
                outline_aralin2: "Lesson 2: Energy Saving",
                outline_aralin3: "Lesson 3: Safety",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                h1_title: "Electricity and Its Uses",
                h1_subtitle: "This module will help you understand essential concepts about electricity that you can use in your daily life.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Explain the importance of electricity;",
                obj_2: "Calculate the electricity consumption of your appliances;",
                obj_3: "Lower your electricity bill; and",
                obj_4: "Practice safety procedures at home when using electrical devices.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Electricity and Its Uses",
                aralin1_p1: "Look around your house and observe what electricity does for you. Doesn't it provide power to your fan, television, radio, iron, and refrigerator? In this lesson, you will learn a lot about the <span class=\"font-bold text-green-700\">importance of electricity</span>, especially at home.",
                aralin1_h3_1: "Let's Learn: What is Electricity?",
                aralin1_p2: "<span class=\"font-bold text-green-700\">Electricity</span> is a form of energy. We cannot see it, but we can witness how it runs things. An object that requires electrical power has a <span class=\"font-bold text-green-700\">motor</span> inside. Electricity is what drives the motor.",
                aralin1_illustration: "<span class=\"font-bold text-green-700\">(Illustration placeholder for Electric Fan)</span> Electricity flows through its wires. This then spins the rotor, which is the reason electricity spins the fan's blade.",
                aralin1_h3_2: "Uses of Electricity",
                use_1: "Provides light to houses.",
                use_2: "Used in <span class=\"font-bold text-green-700\">computers</span> and <span class=\"font-bold text-green-700\">communication</span> (radio/telephone).",
                use_3: "Used for <span class=\"font-bold text-green-700\">cooking</span> and <span class=\"font-bold text-green-700\">preserving</span> food (refrigerator).",
                use_4: "Runs the <span class=\"font-bold text-green-700\">Light Rail Transit (LRT)</span>.",
                use_5: "Used for <span class=\"font-bold text-green-700\">laundry</span> (washing machine) and <span class=\"font-bold text-green-700\">ironing</span> (electric iron).",
                aralin1_h3_3: "Measuring Electricity Consumption",
                aralin1_p3: "The label found on the appliance (e.g., 600w) is called <span class=\"font-bold text-green-700\">wattage</span>. 'w' stands for <span class=\"font-bold text-green-700\">watts</span>. The <span class=\"font-bold text-green-700\">watt</span> is the unit used to measure electric power.",
                math_1: "<span class=\"font-bold text-green-700\">1,000 watts = 1 kilowatt</span> (1 kw)",
                aralin1_p4: "The <span class=\"font-bold text-green-700\">kilowatt-hour (kwh)</span> is the standard unit of measurement for electricity consumption.",
                math_2: "<span class=\"font-bold text-green-700\">1,000 watt-hours (wh) = 1 kilowatt-hour (kwh)</span>",
                aralin1_h4_formula: "Consumption Formula:",
                aralin1_formula_text: "Electricity Consumption (wh) = Wattage (w) <span class=\"text-green-600 font-bold\">x</span> Duration of Use (h)",
                aralin1_h4_example: "Calculation Example (Iron):",
                aralin1_example_p1: "Appliance: Iron (<span class=\"font-bold text-green-700\">600w</span>) used for <span class=\"font-bold text-green-700\">5 hours</span>.",
                aralin1_example_p2: "Conversion:",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: How to Save Electricity",
                aralin2_p1: "Saving on your electricity consumption is <span class=\"font-bold text-green-700\">saving money</span>. There are many easy and effective ways to lower your electricity consumption.",
                aralin2_h3_1: "Suggested Ways to Save",
                tip_1: "<span class=\"font-bold text-green-700\">Turn off</span> electrical appliances when not in use (e.g., TV, lights).",
                tip_2: "Use <span class=\"font-bold text-green-700\">fluorescent lights</span> (or LED) instead of incandescent bulbs, as they have lower wattage.",
                tip_3: "<span class=\"font-bold text-green-700\">Regularly clean</span> lights and fans to make them more efficient.",
                tip_4: "For fans, set to the <span class=\"font-bold text-green-700\">lowest speed</span> if it's not too hot.",
                tip_5: "For the <span class=\"font-bold text-green-700\">Refrigerator</span>:",
                tip_5a: "Clean the <span class=\"font-bold text-green-700\">coil</span> at the back.",
                tip_5b: "Ensure the door is always <span class=\"font-bold text-green-700\">closed</span>.",
                tip_5c: "Avoid repeatedly opening and closing the door.",
                tip_6: "<span class=\"font-bold text-green-700\">Hang</span> clothes outside instead of using a spin dryer.",
                tip_7: "Set an <span class=\"font-bold text-green-700\">ironing day</span>. Iron in large batches rather than small ones.",
                tip_8: "Buy electrical appliances with <span class=\"font-bold text-green-700\">low wattage</span>.",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Electrical Safety",
                aralin3_p1: "Electricity is useful, but if used carelessly, it also becomes a <span class=\"font-bold text-green-700\">danger</span> to us. Electricity can cause an <span class=\"font-bold text-green-700\">'electric shock'</span> and <span class=\"font-bold text-green-700\">fire</span>.",
                aralin3_h3_1: "Procedures to Prevent Accidents",
                safety_tip_1: "If you are not using the electricity, <span class=\"font-bold text-green-700\">turn it off</span>.",
                safety_tip_2: "<span class=\"font-bold text-green-700\">Cover</span> electrical outlets with plastic covers, especially if there are <span class=\"font-bold text-green-700\">children</span> in the house.",
                safety_tip_3: "Do not plug <span class=\"font-bold text-green-700\">too many</span> appliances into a single electrical outlet. This can cause a <span class=\"font-bold text-green-700\">fire</span>.",
                safety_tip_4: "Pull the plug from the <span class=\"font-bold text-green-700\">plug head</span>, not the cord.",
                safety_tip_5: "Do not touch light switches or plug in appliances if your hands are <span class=\"font-bold text-green-700\">wet</span> or if you are standing on a wet floor.",
                safety_tip_6: "Do not put metal objects inside an electrical appliance (e.g., toaster, fan).",
                safety_tip_7: "Cover bare electrical wires with <span class=\"font-bold text-green-700\">electrical tape</span>.",
                aralin3_h3_2: "What to Do When Someone is Electrocuted?",
                shock_1: "<span class=\"font-bold text-green-700\">Do not touch the victim.</span> You will also be electrocuted.",
                shock_2: "First unplug the appliance or <span class=\"font-bold text-green-700\">turn off the power at the main switch</span>.",
                shock_3: "If you cannot turn off the power, use a <span class=\"font-bold text-green-700\">dry wooden broom</span> or dry clothing to <span class=\"font-bold text-green-700\">push the victim</span> away from the electricity.",
                shock_4: "Then call for medical help.",
                aralin3_h3_3: "What to Do When There is an Electrical Fire?",
                fire_1: "Unplug the burning appliance. <span class=\"font-bold text-green-700\">Do not pour water</span> on the appliance.",
                fire_2: "Get everyone out of the house.",
                fire_3: "<span class=\"font-bold text-green-700\">Call the fire department.</span>",
                
                // Quiz Labels (Questions, choices, and calculation labels)
                quiz_title: "Practice", 
                quiz_subtitle: "Answer the questions to test your knowledge.",
                quiz_section_a: "A. Multiple Choice (Choose the correct answer)",
                quiz_section_b: "B. Calculation (Provide the answer in <span class=\"font-bold\">watt-hours (wh)</span>)",
                quiz_button: "Check Answers",
                
                q1_label: "1. What should you do if you see a person being electrocuted?",
                q1_a: "Pour water on the victim.",
                q1_b: "Pull them away from the electricity.",
                q1_c: "Push them with the handle of a dry wooden broom.",
                q1_d: "Call a doctor.",
                
                q2_label: "2. What object should you keep away from your electrical appliances?",
                q2_a: "Plastic",
                q2_b: "Rubber",
                q2_c: "Wood",
                q2_d: "Water",

                q3_label: "3. What should you do to save electricity?",
                q3_a: "Leave the lights on even when no one is around.",
                q3_b: "In the morning, open the windows to let in light.",
                q3_c: "Let dust accumulate on the light bulbs.",
                q3_d: "Paint your room a dark color.",
                
                q4_label: "4. What should you do to prevent a fire?",
                q4_a: "Cover all electrical sockets or 'outlets'.",
                q4_b: "Do not use electrical appliances.",
                q4_c: "Do not touch any wire or electrical device when your hands are wet.",
                q4_d: "Do not plug too many appliances into one 'outlet'.",
                
                qb1_label: "1. Airpot (600w) used for 1 and 1/2 hours:",
                qb2_label: "2. Refrigerator (8 ft³ - 130w) used for 7 hours:",
                qb3_label: "3. LED Light (10w) kept on for 24 hours:",
                qb4_label: "4. Electric Fan (70w) used for 6 hours:",
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Balik sa mga Modyul",
                toggle_text_en: "Switch to: English", // Button text when current language is TL
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Elektrisidad at Gamit",
                outline_aralin2: "Aralin 2: Pagtitipid ng Kuryente",
                outline_aralin3: "Aralin 3: Kaligtasan",
                outline_quiz: "Pagsasanay",
                
                // Main Content Titles
                h1_title: "Ang Elektrisidad at ang mga Gamit Nito",
                h1_subtitle: "Ang modyul na ito ay makatutulong sa iyo upang maintindihan ang mga mahahalagang konsepto tungkol sa kuryente na magagamit mo sa iyong pang-araw-araw na pamumuhay.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",

                // Objectives
                // UPDATED: Capitalized the first letter of each objective item
                obj_1: "Ipaliwanag ang kahalagahan ng elektrisidad;",
                obj_2: "Magkuwenta kung magkano ang nakonsumong kuryente ng iyong mga kagamitan;",
                obj_3: "Pababain ang bill ng iyong kuryente; at",
                obj_4: "Isagawa sa tahanan ang mga pamamaraang pangkaligtasan kapag gumagamit ng mga kasangkapang nangangailangan ng kuryente.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Ang Elektrisidad at mga Gamit Nito",
                aralin1_p1: "Tingnan mo ang kabuuan ng iyong bahay at pagmasdan ang nagagawa ng elektrisidad para sa iyo. Hindi ba ito ang nagbibigay ng buhay (power) sa iyong bentilador, telebisyon, radyo, plantsa, at refrigerator? Sa araling ito, marami kang matututuhan ukol sa <span class=\"font-bold text-green-700\">kahalagahan ng kuryente</span> lalo na sa tahanan.",
                aralin1_h3_1: "Alamin Natin: Ano ang Kuryente?",
                aralin1_p2: "Ang <span class=\"font-bold text-green-700\">elektrisidad</span> ay isang anyo ng enerhiya. Hindi natin ito nakikita subalit matutunghayan natin kung paano nito pinatatakbo ang mga bagay. Ang isang bagay na nangangailangan ng puwersa ng kuryente ay mayroong <span class=\"font-bold text-green-700\">motor</span> sa loob. Ang kuryente ang nagpapatakbo sa motor.",
                aralin1_illustration: "<span class=\"font-bold text-green-700\">(Illustration placeholder for Electric Fan)</span> Ang kuryente ay tatakbo sa mga kable nito. Ito ngayon ang magpapaikot sa rotor, na siyang dahilan kung paano napapaikot ng elektrisidad ang talim (blade) ng bentilidor.",
                aralin1_h3_2: "Mga Gamit ng Kuryente",
                use_1: "Nagbibigay-liwanag sa mga bahay.",
                use_2: "Nagagamit sa <span class=\"font-bold text-green-700\">kompyuter</span> at <span class=\"font-bold text-green-700\">komunikasyon</span> (radyo/telepono).",
                use_3: "Ginagamit sa <span class=\"font-bold text-green-700\">pagluluto</span> at <span class=\"font-bold text-green-700\">pagpreserba</span> ng pagkain (refrigerator).",
                use_4: "Pinatatakbo ang <span class=\"font-bold text-green-700\">Light Rail Transit (LRT)</span>.",
                use_5: "Ginagamit sa <span class=\"font-bold text-green-700\">paglalaba</span> (washing machine) at <span class=\"font-bold text-green-700\">pamamalantsa</span> (de-kuryenteng plantsa).",
                aralin1_h3_3: "Pagsukat sa Konsumo ng Kuryente",
                aralin1_p3: "Ang tatak (label) na makikita sa kasangkapan (hal. 600w) ay tinatawag na <span class=\"font-bold text-green-700\">boltahe (wattage)</span>. Ang 'w' ay <span class=\"font-bold text-green-700\">watts</span>. Ang <span class=\"font-bold text-green-700\">watt</span> ay yunit para sukatin ang lakas ng elektrisidad. ",
                math_1: "<span class=\"font-bold text-green-700\">1,000 watts = 1 kilowatt</span> (1 kw)",
                aralin1_p4: "Ang <span class=\"font-bold text-green-700\">kilowatt-hour (kwh)</span> ang pamantayang yunit ng sukatan sa konsumo ng kuryente.",
                math_2: "<span class=\"font-bold text-green-700\">1,000 watt-hours (wh) = 1 kilowatt-hour (kwh)</span>",
                aralin1_h4_formula: "Pormula sa Konsumo:",
                aralin1_formula_text: "Konsumo ng kuryente (wh) = Wattage (w) <span class=\"text-green-600 font-bold\">x</span> Haba ng oras ng paggamit (h)",
                aralin1_h4_example: "Halimbawa ng Pagkuwenta (Plantsa):",
                aralin1_example_p1: "Gamit: Plantsa (<span class=\"font-bold text-green-700\">600w</span>) ginamit sa loob ng <span class=\"font-bold text-green-700\">5 oras</span>.",
                aralin1_example_p2: "Conversion:",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Paano ka Makatitipid sa Paggamit ng Kuryente",
                aralin2_p1: "Ang pagtitipid sa konsumo ng iyong kuryente ay <span class=\"font-bold text-green-700\">pag-iipon ng pera</span>. Maraming madadali at epektibong pamamaraan kung paano mo mapabababa ang iyong konsumo sa kuryente.",
                tip_1: "<span class=\"font-bold text-green-700\">Patayin</span> ang mga kasangkapang de-kuryente kung hindi na ito ginagamit (hal. TV, ilaw).",
                tip_2: "Gumamit ng <span class=\"font-bold text-green-700\">fluorescent na ilaw</span> (o LED) kaysa sa bombilya (incandescent bulb), dahil mas mababa ang kanilang wattage.",
                tip_3: "<span class=\"font-bold text-green-700\">Regular na linisin</span> ang mga ilaw at mga bentilador para mas maging episyente.",
                tip_4: "Sa bentilador, ilagay sa <span class=\"font-bold text-green-700\">pinakamababang bilis</span> kung hindi naman masyadong mainit.",
                tip_5: "Para sa <span class=\"font-bold text-green-700\">Refrigerator</span>:",
                tip_5a: "Linisin ang <span class=\"font-bold text-green-700\">coil</span> sa likuran.",
                tip_5b: "Siguraduhing laging <span class=\"font-bold text-green-700\">nakasara</span> ang pintuan.",
                tip_5c: "Iwasan ang pagbukas at pagsara ng pintuan nang paulit-ulit.",
                tip_6: "<span class=\"font-bold text-green-700\">Isampay</span> ang mga damit sa labas imbes na gumamit ng spin dryer.",
                tip_7: "Magtakda ng <span class=\"font-bold text-green-700\">araw ng pamamalantsa</span>. Mamalantsa nang maramihan kaysa sa kakaunti.",
                tip_8: "Bumili ng mga kagamitang de-kuryente na <span class=\"font-bold text-green-700\">mababa ang boltahe/batyahe</span>.",
                
                // Lesson 3 Content
                aralin3_title: "Aralin 3: Kaligtasang Pang-Elektrisidad",
                aralin3_p1: "Ang elektrisidad ay kapaki-pakinabang, subalit kung walang ingat itong gagamitin, ito ay nagiging <span class=\"font-bold text-green-700\">panganib</span> din sa atin. Ang kuryente ay nakakapagdulot ng <span class=\"font-bold text-green-700\">\"electric shock\"</span> at <span class=\"font-bold text-green-700\">sunog</span>.",
                aralin3_h3_1: "Mga Pamamaraan Upang Maiwasan ang Aksidente",
                safety_tip_1: "Kung hindi mo na ginagamit ang kuryente, <span class=\"font-bold text-green-700\">patayin</span> ito.",
                safety_tip_2: "<span class=\"font-bold text-green-700\">Takpan</span> ang mga saksakan ng kuryente ng mga plastik na pantakip lalo kung may mga <span class=\"font-bold text-green-700\">bata</span> sa bahay.",
                safety_tip_3: "Huwag magsaksak nang <span class=\"font-bold text-green-700\">marami</span> sa iisang saksakan ng kuryente. Ito ay maaaring pagmulan ng <span class=\"font-bold text-green-700\">sunog</span>.",
                safety_tip_4: "Hilahin ang pansaksak mula sa <span class=\"font-bold text-green-700\">plug</span>, hindi sa kable.",
                safety_tip_5: "Huwag hawakan ang mga pindutan ng ilaw o magsaksak ng kasangkapan kung <span class=\"font-bold text-green-700\">basa</span> ang iyong mga kamay o kung nakatapak ka sa basang sahig.",
                safety_tip_6: "Huwag maglagay ng metal na bagay sa loob ng isang de-kuryenteng kasangkapan (hal. toaster, bentilador).",
                safety_tip_7: "Takpan ang mga walang balot na kable ng kuryente ng <span class=\"font-bold text-green-700\">electrical tape</span>.",
                aralin3_h3_2: "Ano ang Gagawin Kapag May Nakuryente?",
                shock_1: "<span class=\"font-bold text-green-700\">Huwag hawakan ang biktima.</span> Makukuryente ka rin.",
                shock_2: "Alisin muna sa saksakan ang kasangkapan o <span class=\"font-bold text-green-700\">patayin ang power sa main switch</span>.",
                shock_3: "Kung hindi mo kayang patayin ang power, gumamit ng <span class=\"font-bold text-green-700\">tuyong walis na kahoy</span> o tuyong damit upang <span class=\"font-bold text-green-700\">itulak ang biktima</span> palayo sa kuryente.",
                shock_4: "Tapos ay tumawag ng tulong mula sa doktor.",
                aralin3_h3_3: "Ano ang Gagawin Kapag May Sunog Dahil sa Kuryente?",
                fire_1: "Alisin sa pagkakasaksak ang kasangkapang nasusunog. <span class=\"font-bold text-green-700\">Huwag bubuhusan ng tubig</span> ang kasangkapang.",
                fire_2: "Palabasin ang lahat ng tao sa bahay.",
                fire_3: "<span class=\"font-bold text-green-700\">Tumawag ng bumbero.</span>",
                
                // Quiz Labels (Questions, choices, and calculation labels)
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutan ang mga katanungan upang subukin ang iyong kaalaman.",
                quiz_section_a: "A. Multiple Choice (Pumili ng tamang sagot)",
                quiz_section_b: "B. Pagkuwenta (Ibigay ang sagot sa <span class=\"font-bold\">watt-hours (wh)</span>)",
                quiz_button: "Tingnan ang Sagot",
                
                q1_label: "1. Ano ang iyong gagawin kung may nakita kang isang taong nakuryente?",
                q1_a: "Buhusan ng tubig ang biktima.",
                q1_b: "Hatakin ito palayo sa kuryente.",
                q1_c: "Itulak ito sa pamamagitan ng tuyong walis na kahoy ang hawakan.",
                q1_d: "Tumawag ng doktor.",
                
                q2_label: "2. Anong bagay ang dapat mong ilayo sa iyong mga kasangkapang gumagamit ng kuryente?",
                q2_a: "Plastik",
                q2_b: "Goma",
                q2_c: "Kahoy",
                q2_d: "Tubig",

                q3_label: "3. Ano ang dapat mong gawin upang makatipid ng kuryente?",
                q3_a: "Iwanang nakabukas ang mga ilaw kahit walang tao.",
                q3_b: "Kapag umaga, buksan ang mga bintana upang pumasok ang liwanag.",
                q3_c: "Hayaang kumapal ang mga alikabok sa bombilya.",
                q3_d: "Pinturahan ang iyong silid nang madilim na kulay.",
                
                q4_label: "4. Ano ang dapat mong gawin upang maiwasan ang pagkakaroon ng sunog?",
                q4_a: "Takpan lahat ang mga saksakan o 'outlet' pang-elektrisidad.",
                q4_b: "Huwag gumamit ng mga kagamitang de-kuryente.",
                q4_c: "Huwag hihipuin ang anumang kawad o gamit pang-elektrisidad kapag basa ang mga kamay.",
                q4_d: "Huwag magsasaksak ng maraming kagamitan sa isang 'outlet'.",
                
                qb1_label: "1. Termos (airpot - 600w) na ginamit sa loob ng 1 at 1/2 oras:",
                qb2_label: "2. Refrigerator (8 ft³ - 130w) na ginamit sa loob ng 7 oras:",
                qb3_label: "3. LED Ilaw (10w) na nakabukas sa loob ng 24 oras:",
                qb4_label: "4. Electric Fan (70w) na ginamit sa loob ng 6 oras:",
            }
        };

        let currentLang = 'en'; // Default language is English

        /**
         * Updates the text content of all elements with a data-i18n attribute.
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
                    // Use innerHTML for text that contains span classes for bolding/styling
                    element.innerHTML = langData[key];
                }
            });
            
            // 2. Update language code on HTML tag
            document.documentElement.lang = lang;

            // 3. Update the static current language label
            currentLangLabel.textContent = lang === 'tl' ? 'Wika: Tagalog' : 'Language: English';

            // 4. Update toggle button text: shows the language it will switch TO
            // If current lang is TL, show "Switch to: English" (key: toggle_text_en from TL obj)
            // If current lang is EN, show "Switch to: Tagalog" (key: toggle_text_tl from EN obj)
            const toggleKey = (lang === 'tl' ? 'toggle_text_en' : 'toggle_text_tl');
            toggleButton.querySelector('span').textContent = translations[lang === 'tl' ? 'tl' : 'en'][toggleKey];
        }

        // --- LANGUAGE TOGGLE EVENT LISTENER ---
        document.getElementById('lang-toggle-btn').addEventListener('click', () => {
            const newLang = currentLang === 'tl' ? 'en' : 'tl';
            updateLanguage(newLang);
        });
        
        // ADD NEW TOGGLE TEXT KEYS TO TRANSLATION OBJECT
        // These keys define the text that appears *on the button* itself.
        // When currentLang is TL, button text is "Switch to: English" (key: toggle_text_en in TL obj)
        // When currentLang is EN, button text is "Switch to: Tagalog" (key: toggle_text_tl in EN obj)
        translations.en.toggle_text_tl = "Switch to: Tagalog";
        translations.tl.toggle_text_en = "Switch to: English";


        // --- EXISTING LOGIC FOLLOWS ---

        // Function to handle the opening/closing arrow animation
        document.querySelectorAll('details').forEach(detail => {
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
        
        // Use document.getElementById for better performance, but ensure it exists
        const outline = document.getElementById('outline');
        // Select links using the data-i18n attribute as they no longer have consistent text
        const outlineLinks = sections.map(id => outline ? outline.querySelector(`a[href="#${id}"]`) : null).filter(link => link);
        const sectionElements = sections.map(id => document.getElementById(id)).filter(element => element);

        function highlightOutlineLink() {
            let activeLink = null;
            
            for (let i = 0; i < sectionElements.length; i++) {
                const rect = sectionElements[i].getBoundingClientRect();
                // Highlight when section hits the top 100px of the viewport
                if (rect.top <= 100) { 
                    activeLink = outlineLinks[i];
                }
            }

            // Ensure only the active link is highlighted
            outlineLinks.forEach(link => link.classList.remove('active'));

            if (activeLink) {
                activeLink.classList.add('active');
            }
        }

        window.addEventListener('scroll', highlightOutlineLink);
        window.addEventListener('load', () => {
             // Initialize default language (English) on load
             updateLanguage('en');
             highlightOutlineLink();
        });
        // --- END SCROLL TRACKING LOGIC ---


        document.getElementById('math-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const resultsDiv = document.getElementById('results');
            let correctCount = 0;
            const totalQuestions = 8; // 4 MC + 4 Calc

            // Define correct answers. 
            const answers = {
                // SECTION A: Multiple Choice
                qa1: 'c', // Itulak sa pamamagitan ng tuyong walis
                qa2: 'd', // Tubig
                qa3: 'b', // Buksan ang bintana
                qa4: 'd', // Huwag magsasaksak ng marami

                // SECTION B: Calculation (in wh)
                qb1: 900, // 600w * 1.5h
                qb2: 910, // 130w * 7h
                qb3: 240, // 10w * 24h
                qb4: 420, // 70w * 6h
            };
            
            // Helper function to handle radio button inputs (Section A)
            function checkRadioInput(name, expected) {
                const checkedRadio = document.querySelector(`input[name="${name}"]:checked`);
                const questionDiv = document.getElementById(`q_${name}`);
                
                // Clear previous styles from all labels/choices in this group
                questionDiv.querySelectorAll('.radio-choice').forEach(label => {
                    label.classList.remove('correct-border', 'incorrect-border');
                    // Remove feedback for correct answer highlight
                    if (label.classList.contains('correct-border')) {
                        label.classList.remove('correct-border');
                    }
                });
                
                if (checkedRadio && checkedRadio.value === expected) {
                    correctCount++;
                    checkedRadio.parentElement.classList.add('correct-border');
                } else if (checkedRadio) {
                    checkedRadio.parentElement.classList.add('incorrect-border');
                    
                    // Highlight the correct answer if the user answered incorrectly
                    const correctAnswerLabel = document.querySelector(`input[name="${name}"][value="${expected}"]`).parentElement;
                    if(correctAnswerLabel) {
                        correctAnswerLabel.classList.add('correct-border');
                    }
                } 
            }
            
            // Helper function to handle non-radio inputs (Calculation)
            function checkSimpleInput(id, expected) {
                const input = document.getElementById(id);
                let value = input.value.trim();
                let isCorrect = false;

                // Reset styles and feedback
                input.classList.remove('border-red-500', 'border-green-500', 'bg-green-50');
                const parent = input.closest('div');
                let feedback = parent.querySelector('.calculation-feedback');
                if (feedback) {
                    feedback.remove();
                }


                // For number inputs
                value = parseInt(value);
                if (!isNaN(value) && value === expected) {
                    isCorrect = true;
                }
                
                if (isCorrect) {
                    correctCount++;
                    input.classList.add('border-green-500', 'bg-green-50');
                } else {
                    input.classList.add('border-red-500');
                    // Add message for incorrect calculation
                    feedback = document.createElement('p');
                    feedback.classList.add('text-sm', 'mt-1', 'text-red-600', 'font-medium', 'calculation-feedback');
                    parent.appendChild(feedback);
                    
                    // Display feedback based on current language
                    const isEnglish = currentLang === 'en';
                    feedback.textContent = isEnglish ? `The correct answer is ${expected} wh.` : `Ang tamang sagot ay ${expected} wh.`;
                }
            }


            // Run checks for Section A (Radio Buttons)
            checkRadioInput('qa1', answers.qa1);
            checkRadioInput('qa2', answers.qa2);
            checkRadioInput('qa3', answers.qa3);
            checkRadioInput('qa4', answers.qa4);
            
            // Run checks for Section B (Calculation)
            checkSimpleInput('qb1', answers.qb1);
            checkSimpleInput('qb2', answers.qb2);
            checkSimpleInput('qb3', answers.qb3); 
            checkSimpleInput('qb4', answers.qb4); 

            // Display results
            const percentage = ((correctCount / totalQuestions) * 100).toFixed(0);
            let message = '';
            const isEnglish = currentLang === 'en';

            // Reset background classes
            resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800');

            if (correctCount === totalQuestions) {
                message = isEnglish ? "🎉 Excellent! All your answers are correct (" + correctCount + "/" + totalQuestions + ")." : "🎉 Napakahusay! Tama lahat ang iyong sagot (" + correctCount + "/" + totalQuestions + ").";
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalQuestions * 0.7) {
                message = isEnglish ? "Well done! You scored " + correctCount + " out of " + totalQuestions + " (" + percentage + "%). Just review the lessons for your incorrect answers." : "Magaling! Nakakuha ka ng " + correctCount + " out of " + totalQuestions + " (" + percentage + "%). Balikan lang ang mga aralin para sa mga mali mong sagot.";
                resultsDiv.classList.add('bg-green-100', 'text-green-800');
            } else {
                message = isEnglish ? "You need to study more. You only scored " + correctCount + " out of " + totalQuestions + " (" + percentage + "%). Read Lessons 1-3 again." : "Kailangan mo pang mag-aral. Nakakuha ka lang ng " + correctCount + " out of " + totalQuestions + " (" + percentage + "%). Basahin ulit ang Aralin 1-3.";
                resultsDiv.classList.add('bg-yellow-100', 'text-yellow-800');
            }

            resultsDiv.innerHTML = message;
            resultsDiv.classList.remove('hidden');
            resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    </script>
</body>
</html>
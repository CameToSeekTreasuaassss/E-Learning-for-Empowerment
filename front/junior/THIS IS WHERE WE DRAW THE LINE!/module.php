<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">This Is Where We Draw The Line! (Linear Equation)</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
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
        .content-box { padding: 1.5rem; background-color: #ffffff; }
        
        /* --- CUSTOM STYLE FOR MAIN H1 TITLE (50px) --- */
        .main-title-h1 {
            font-size: 50px; /* 50px */
            line-height: 1.1;
        }
        /* --- END ADDED CUSTOM STYLE --- */

        /* Standardizing Text Sizes to 1.25rem (20px) */
        .content-box h2 { font-size: 1.75rem; color: #0e7490; font-weight: 700; margin-top: 1rem; margin-bottom: 0.5rem; } /* Dark Teal */
        .content-box h3 { font-size: 1.5rem; color: #1f2937; font-weight: 700; margin-top: 1rem; margin-bottom: 0.5rem; }
        /* H4 and other subheadings */
        .content-box h4 { font-size: 1.25rem; color: #1f2937; font-weight: 600; margin-top: 1rem; margin-bottom: 0.5rem; }
        
        /* 20px for all main content, lists, and intro text */
        .content-box p, 
        .content-box ul li, 
        .content-box ol li,
        .example-box p,
        #objectives p,
        #objectives ul li { 
            font-size: 1.25rem; /* 20px */
            line-height: 1.75;
            color: #4b5563;
        }

        /* Adjustments for list and paragraph spacing */
        .content-box p { margin-bottom: 1.5rem; }
        .content-box ul, .content-box ol { margin-left: 1.5rem; margin-bottom: 1.5rem; }
        #objectives ul li { margin-bottom: 0.5rem; }

        .content-box b { color: #059669; font-weight: 700; } /* Emerald Green for key terms */
        
        .example-box {
            background-color: #f3f4f6; 
            border-left: 4px solid #34d399; /* Green accent border */
            padding: 1.5rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
            border-radius: 0.5rem;
        }
        
        /* 20px for Math Formulas (if applicable) */
        .math-formula {
            display: block;
            margin: 1rem 0;
            padding: 0.75rem;
            text-align: center;
            font-size: 1.25rem; /* 20px */
            font-weight: bold;
            color: #0e7490;
            background-color: #ecfdf5;
            border-radius: 0.5rem;
            border: 1px dashed #a7f3d0;
            overflow-x: auto;
        }
        .math-formula span { white-space: nowrap; } 
        
        /* Quiz labels/text */
        #pagsasanay p,
        #pagsasanay label, 
        #pagsasanay .font-medium,
        #pagsasanay .font-semibold {
            font-size: 1.25rem; /* 20px */
            line-height: 1.75;
        }

        /* Quiz input */
        .quiz-input {
            font-size: 1.25rem; /* 20px */
            border-bottom: 2px solid #a7f3d0;
            transition: border-color 0.2s; 
            padding: 0.25rem; 
            text-align: center; 
            width: 100%;
        }
        .quiz-input:focus { border-color: #059669; outline: none; }
        .correct-answer { border-color: #10b981 !important; background-color: #ecfdf5; border-bottom-width: 2px; }
        .incorrect-answer { border-color: #ef4444 !important; background-color: #fef2f2; border-bottom-width: 2px; }

        /* Table styles */
        .module-table { width: 100%; border-collapse: collapse; margin-bottom: 1.5rem; }
        .module-table th, .module-table td { 
            border: 1px solid #d1fae5; 
            padding: 0.75rem; 
            text-align: left; 
            font-size: 1.25rem; /* Guarantee 20px size for table content */
        }
        .module-table th { background-color: #a7f3d0; color: #065f46; font-weight: 600; text-align: center; }
        .module-table td { color: #000000; } 
        
        /* Outline Styles (Sticky Navigation) */
        .outline-link { 
            display: block; padding: 0.5rem 0.75rem; border-radius: 0.5rem; color: #4b5563; 
            transition: background-color 0.15s, color 0.15s; font-size: 1rem; 
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
<body class="lg:p-20 p-4"> <!-- CHANGED to lg:p-20 to match Applied Economics module width -->

    <!-- Main Grid Container for Outline and Content (REMOVED MAX-WIDTH) -->
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
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Make Relations Function (Functions)</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Where are You Exactly? (Cartesian Plane)</a>
                        <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Watch Your Steep (Slope & Intercepts)</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">This Is Where We Draw The Line! (Linear Equation)</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">A study on Relations, Functions, and Linear Equations.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Describe <b>Relations</b> and <b>Functions</b>.</li>
                        <li data-i18n="obj_2">Describe and use the <b>Rectangular Coordinate System</b> (Cartesian Plane). </li>
                        <li data-i18n="obj_3">Calculate the <b>Slope</b> of a line.</li>
                        <li data-i18n="obj_4">Find the <b>x-intercept</b> and <b>y-intercept</b> of a linear equation.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Make Relations Function -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Make Relations Function (Functions)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">A <b>Relation</b> is a set of <b>Ordered Pairs</b> (x, y). A <b>Function</b> is a special type of relation where every member in the first set (x) has exactly <b>one</b> match in the second set (y). </p>

                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin1_h3_1">Types of Function</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l1"><b>One-to-One</b>: Every x has exactly one y.</li>
                                <li data-i18n="aralin1_l2"><b>Many-to-One</b>: Multiple x's have the same single y.</li>
                                <li data-i18n="aralin1_l3"><b>Not a Function</b>: One x has more than one y (One-to-Many).</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin1_h3_2">Evaluating Functions</h3>
                            <p data-i18n="aralin1_p2">In an equation with two variables (e.g., y = 3x - 1), the value of y is found by substituting the value of x. This forms the Ordered Pair (x, y).</p>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE: y = 3x + 1. Find y when x = 5.</p>
                                <p data-i18n="aralin1_ex1_solution">y = 3(5) + 1 = 15 + 1 = <b>16</b>. Ordered Pair: (5, 16).</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Where are You Exactly? (Cartesian Plane) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Where are You Exactly? (Cartesian Plane)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">The <b>Rectangular Coordinate System</b> (or <b>Cartesian Plane</b>) is used to find the exact location of a <b>Point</b> (Ordered Pair) on a plane. </p>

                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin2_h3_1">Parts</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin2_l1"><b>Axes</b>: The two perpendicular number lines (Horizontal and Vertical).</li>
                                <li data-i18n="aralin2_l2"><b>x-axis</b>: The horizontal axis (left/right movement).</li>
                                <li data-i18n="aralin2_l3"><b>y-axis</b>: The vertical axis (up/down movement).</li>
                                <li data-i18n="aralin2_l4"><b>Origin (0, 0)</b>: The intersection point of the x-axis and y-axis.</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin2_h3_2">Plotting Points (x, y)</h3>
                            <p data-i18n="aralin2_p2">In the Ordered Pair (x, y), x is the horizontal movement (right (+) or left (-)) and y is the vertical movement (up (+) or down (-)).</p>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">EXAMPLE: Plot Point (-4, 3)</p>
                                <p data-i18n="aralin2_ex1_solution">Start at the Origin, move 4 units <b>left</b> (due to -4) and 3 units <b>up</b> (due to +3).</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 3: Watch Your Steep (Slope at Intercepts) -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Watch Your Steep (Slope & Intercepts)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">A <b>Linear Function</b> represents a straight line when plotted on the Cartesian Plane. It has three important characteristics:</p>

                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin3_h3_1">1. Slope (Steepness)</h3>
                            <p data-i18n="aralin3_p2">The <b>Slope (m)</b> measures the steepness of a line. The formula is: </p>
                            <div class="math-formula">
                                <span data-i18n="aralin3_formula">m = (y₂ - y₁) &divide; (x₂ - x₁)</span>
                            </div>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin3_l1"><b>Positive Slope</b>: Line goes up (uphill, value increases). </li>
                                <li data-i18n="aralin3_l2"><b>Negative Slope</b>: Line goes down (downhill, value decreases).  </li>
                                <li data-i18n="aralin3_l3"><b>Zero Slope</b>: Horizontal line.</li>
                                <li data-i18n="aralin3_l4"><b>Undefined Slope</b>: Vertical line.</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin3_h3_2">2. Intercepts</h3>
                            <p data-i18n="aralin3_p3">The intercepts are the points where the line hits the axes.</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin3_l5"><b>x-intercept</b>: Where the line hits the x-axis (where y = 0).</li>
                                <li data-i18n="aralin3_l6"><b>y-intercept</b>: Where the line hits the y-axis (where x = 0).</li>
                            </ul>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice - 5 Items</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Solve the following problems and enter your answer.</p>

                    <form id="algebra-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Function and Coordinate</p>
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. If x = 2, what is the value of y in y = 4x - 5?</label>
                                    <input type="number" id="qa1" class="quiz-input w-full" data-i18n-placeholder="qa1_placeholder" placeholder="Answer">
                                </diV>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. What point is 3 units left, 1 unit down from the Origin?</label>
                                    <input type="text" id="qa2" class="quiz-input w-full" data-i18n-placeholder="qa2_placeholder" placeholder="Answer (e.g., (-1, 2))">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Slope and Intercepts</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. Find the Slope of the line with points (1, 5) and (3, 1).</label>
                                    <input type="text" id="qa3" class="quiz-input w-full" data-i18n-placeholder="qa3_placeholder" placeholder="Answer (fraction/integer)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. Find the x-intercept (x-value) of y = -2x + 8.</label>
                                    <input type="number" id="qa4" class="quiz-input w-full" data-i18n-placeholder="qa4_placeholder" placeholder="Answer">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">5. What type of slope does a line have that goes down from left to right?</label>
                                    <input type="text" id="qa5" class="quiz-input w-full" data-i18n-placeholder="qa5_placeholder" placeholder="Answer">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
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
                outline_aralin1: "Lesson 1: Make Relations Function (Functions)",
                outline_aralin2: "Lesson 2: Where are You Exactly? (Cartesian Plane)",
                outline_aralin3: "Lesson 3: Watch Your Steep (Slope & Intercepts)",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "This Is Where We Draw The Line! (Linear Equation)",
                h1_subtitle: "A study on Relations, Functions, and Linear Equations.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Describe <b>Relations</b> and <b>Functions</b>.",
                obj_2: "Describe and use the <b>Rectangular Coordinate System</b> (Cartesian Plane).",
                obj_3: "Calculate the <b>Slope</b> of a line.",
                obj_4: "Find the <b>x-intercept</b> and <b>y-intercept</b> of a linear equation.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Make Relations Function (Functions)",
                aralin1_p1: "A <b>Relation</b> is a set of <b>Ordered Pairs</b> (x, y). A <b>Function</b> is a special type of relation where every member in the first set (x) has exactly <b>one</b> match in the second set (y).",
                aralin1_h3_1: "Types of Function",
                aralin1_l1: "<b>One-to-One</b>: Every x has exactly one y.",
                aralin1_l2: "<b>Many-to-One</b>: Multiple x's have the same single y.",
                aralin1_l3: "<b>Not a Function</b>: One x has more than one y (One-to-Many).",
                aralin1_h3_2: "Evaluating Functions",
                aralin1_p2: "In an equation with two variables (e.g., y = 3x - 1), the value of y is found by substituting the value of x. This forms the Ordered Pair (x, y).",
                aralin1_ex1_title: "EXAMPLE: y = 3x + 1. Find y when x = 5.",
                aralin1_ex1_solution: "y = 3(5) + 1 = 15 + 1 = <b>16</b>. Ordered Pair: (5, 16).",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Where are You Exactly? (Cartesian Plane)",
                aralin2_p1: "The <b>Rectangular Coordinate System</b> (or <b>Cartesian Plane</b>) is used to find the exact location of a <b>Point</b> (Ordered Pair) on a plane.",
                aralin2_h3_1: "Parts",
                aralin2_l1: "<b>Axes</b>: The two perpendicular number lines (Horizontal and Vertical).",
                aralin2_l2: "<b>x-axis</b>: The horizontal axis (left/right movement).",
                aralin2_l3: "<b>y-axis</b>: The vertical axis (up/down movement).",
                aralin2_l4: "<b>Origin (0, 0)</b>: The intersection point of the x-axis and y-axis.",
                aralin2_h3_2: "Plotting Points (x, y)",
                aralin2_p2: "In the Ordered Pair (x, y), x is the horizontal movement (right (+) or left (-)) and y is the vertical movement (up (+) or down (-)).",
                aralin2_ex1_title: "EXAMPLE: Plot Point (-4, 3)",
                aralin2_ex1_solution: "Start at the Origin, move 4 units <b>left</b> (due to -4) and 3 units <b>up</b> (due to +3).",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Watch Your Steep (Slope & Intercepts)",
                aralin3_p1: "A <b>Linear Function</b> represents a straight line when plotted on the Cartesian Plane. It has three important characteristics:",
                aralin3_h3_1: "1. Slope (Steepness)",
                aralin3_p2: "The <b>Slope (m)</b> measures the steepness of a line. The formula is:",
                aralin3_formula: "m = (y₂ - y₁) &divide; (x₂ - x₁)",
                aralin3_l1: "<b>Positive Slope</b>: Line goes up (uphill, value increases).",
                aralin3_l2: "<b>Negative Slope</b>: Line goes down (downhill, value decreases).",
                aralin3_l3: "<b>Zero Slope</b>: Horizontal line.",
                aralin3_l4: "<b>Undefined Slope</b>: Vertical line.",
                aralin3_h3_2: "2. Intercepts",
                aralin3_p3: "The intercepts are the points where the line hits the axes.",
                aralin3_l5: "<b>x-intercept</b>: Where the line hits the x-axis (where y = 0).",
                aralin3_l6: "<b>y-intercept</b>: Where the line hits the y-axis (where x = 0).",

                // Quiz Labels and Placeholders
                quiz_title: "Practice - 5 Items",
                quiz_subtitle: "Solve the following problems and enter your answer.",
                quiz_section1_title: "A. Function and Coordinate",
                qa1_label: "1. If x = 2, what is the value of y in y = 4x - 5?",
                qa1_placeholder: "Answer",
                qa2_label: "2. What point is 3 units left, 1 unit down from the Origin?",
                qa2_placeholder: "Answer (e.g., (-1, 2))",
                quiz_section2_title: "B. Slope and Intercepts",
                qa3_label: "3. Find the Slope of the line with points (1, 5) and (3, 1).",
                qa3_placeholder: "Answer (fraction/integer)",
                qa4_label: "4. Find the x-intercept (x-value) of y = -2x + 8.",
                qa4_placeholder: "Answer",
                qa5_label: "5. What type of slope does a line have that goes down from left to right?",
                qa5_placeholder: "Answer",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Linear Algebra!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review the Slope formula and x-intercept calculation.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the entire module.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Make Relations Function (Functions)",
                outline_aralin2: "Aralin 2: Where are You Exactly? (Cartesian Plane)",
                outline_aralin3: "Aralin 3: Watch Your Steep (Slope at Intercepts)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "This Is Where We Draw The Line! (Linear Equation)",
                h1_subtitle: "Pag-aaral sa Relations, Functions, at Linear Equations.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ilarawan ang <b>Relations</b> at <b>Functions</b>.",
                obj_2: "Ilarawan at gamitin ang <b>Rectangular Coordinate System</b> (Cartesian Plane).",
                obj_3: "Kalkulahin ang <b>Slope</b> ng isang linya.",
                obj_4: "Hanapin ang <b>x-intercept</b> at <b>y-intercept</b> ng isang linear equation.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Make Relations Function (Functions)",
                aralin1_p1: "Ang <b>Relation</b> ay isang set ng <b>Ordered Pairs</b> (x, y). Ang <b>Function</b> ay isang espesyal na uri ng relation kung saan bawat miyembro sa unang grupo (x) ay may eksaktong <b>isang</b> kapareha sa pangalawang grupo (y).",
                aralin1_h3_1: "Uri ng Function",
                aralin1_l1: "<b>One-to-One</b>: Bawat x ay may eksaktong isang y.",
                aralin1_l2: "<b>Many-to-One</b>: Maraming x ang may parehong isang y.",
                aralin1_l3: "<b>Hindi Function</b>: May isang x na may higit sa isang y (One-to-Many).",
                aralin1_h3_2: "Evaluating Functions",
                aralin1_p2: "Sa equation na may two variables (e.g., y = 3x - 1), ang value ng y ay nakukuha sa pamamagitan ng pag-substitute ng value ng x. Ito ang bumubuo sa Ordered Pair (x, y).",
                aralin1_ex1_title: "HALIMBAWA: y = 3x + 1. Find y when x = 5.",
                aralin1_ex1_solution: "y = 3(5) + 1 = 15 + 1 = <b>16</b>. Ordered Pair: (5, 16).",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Where are You Exactly? (Cartesian Plane)",
                aralin2_p1: "Ang <b>Rectangular Coordinate System</b> (o <b>Cartesian Plane</b>) ay ginagamit para hanapin ang eksaktong lokasyon ng isang <b>Point</b> (Ordered Pair) sa isang plane.",
                aralin2_h3_1: "Mga Bahagi",
                aralin2_l1: "<b>Axes</b>: Ang dalawang perpendicular number lines (Horizontal at Vertical).",
                aralin2_l2: "<b>x-axis</b>: Ang horizontal axis (left/right movement).",
                aralin2_l3: "<b>y-axis</b>: Ang vertical axis (up/down movement).",
                aralin2_l4: "<b>Origin (0, 0)</b>: Ang intersection point ng x-axis at y-axis.",
                aralin2_h3_2: "Plotting Points (x, y)",
                aralin2_p2: "Sa Ordered Pair (x, y), ang x ang horizontal movement (kanan (+) o kaliwa (-)) at ang y ang vertical movement (pataas (+) o pababa (-)).",
                aralin2_ex1_title: "HALIMBAWA: Plot Point (-4, 3)",
                aralin2_ex1_solution: "Magsimula sa Origin, mag-move ng 4 units <b>kaliwa</b> (dahil sa -4) at 3 units <b>pataas</b> (dahil sa +3).",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Watch Your Steep (Slope at Intercepts)",
                aralin3_p1: "Ang <b>Linear Function</b> ay nagre-representa ng tuwid na linya kapag pinlot sa Cartesian Plane. May tatlo itong mahahalagang katangian:",
                aralin3_h3_1: "1. Slope (Steepness)",
                aralin3_p2: "Ang <b>Slope (m)</b> ay sumusukat sa katarikan ng isang linya. Ang formula ay:",
                aralin3_formula: "m = (y₂ - y₁) &divide; (x₂ - x₁)",
                aralin3_l1: "<b>Positive Slope</b>: Linya ay umaakyat (uphill, tumataas ang value).",
                aralin3_l2: "<b>Negative Slope</b>: Linya ay bumababa (downhill, bumababa ang value).",
                aralin3_l3: "<b>Zero Slope</b>: Horizontal na linya.",
                aralin3_l4: "<b>Undefined Slope</b>: Vertical na linya.",
                aralin3_h3_2: "2. Intercepts",
                aralin3_p3: "Ang intercepts ay mga punto kung saan tumatama ang linya sa axes.",
                aralin3_l5: "<b>x-intercept</b>: Dito tumatama ang linya sa x-axis (kung saan y = 0).",
                aralin3_l6: "<b>y-intercept</b>: Dito tumatama ang linya sa y-axis (kung saan x = 0).",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay - 5 Items",
                quiz_subtitle: "Lutasin ang mga sumusunod. Tiyakin ang tamang sagot.",
                quiz_section1_title: "A. Function at Coordinate",
                qa1_label: "1. Kung x = 2, ano ang value ng y sa y = 4x - 5?",
                qa1_placeholder: "Sagot",
                qa2_label: "2. Anong punto ang 3 units left, 1 unit down mula sa Origin?",
                qa2_placeholder: "Sagot (e.g., (-1, 2))",
                quiz_section2_title: "B. Slope at Intercepts",
                qa3_label: "3. Hanapin ang Slope ng linya na may points (1, 5) at (3, 1).",
                qa3_placeholder: "Sagot (fraction/integer)",
                qa4_label: "4. Hanapin ang x-intercept (x-value) ng y = -2x + 8.",
                qa4_placeholder: "Sagot",
                qa5_label: "5. Anong uri ng slope ang linya na bumababa mula kaliwa pakanan?",
                qa5_placeholder: "Sagot",
                quiz_button: "Kalkulahin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang Linear Algebra!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang Slope formula at ang x-intercept.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang buong modyul.`,
            }
        };

        let currentLang = 'en'; 

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
                // Changed from 100 to 150 to make the highlight slightly more aggressive
                const rect = sectionElements[i].getBoundingClientRect();
                if (rect.top <= 150) { 
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
            if (typeof value !== 'string') return 0;
            // Allow for fractional input like 1/2 or -4/2
            value = value.trim().replace(/[^0-9\.\-\/]/g, ''); 
            
            // Handle division before parsing float if a '/' is present
            if (value.includes('/')) {
                try {
                    // Simple evaluation for fractions
                    return eval(value); 
                } catch (e) {
                    return NaN;
                }
            }
            
            const parsedValue = parseFloat(value);
            return isNaN(parsedValue) ? 0 : parsedValue;
        }
        
        // Function to clean and normalize text input (for non-numeric answers)
        function normalizeText(input) {
            if (typeof input !== 'string') return '';
            // Lowercase and remove spaces/non-essential punctuation/diacritics/symbols
            return input.toLowerCase().replace(/[^a-z0-9\-\.\,]/g, '');
        }

        // Function to check answer, handling specific needs (number/text/coordinate)
        function checkAnswer(id, expected, type = 'number', tolerance = 0.01) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            let isCorrect = false;

            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            if (type === 'number') {
                const inputFloat = standardizeFloat(rawValue);
                const expectedFloat = standardizeFloat(String(expected));
                isCorrect = Math.abs(inputFloat - expectedFloat) < tolerance;
            } else if (type === 'text') {
                const normalizedInput = rawValue.toLowerCase().replace(/[^a-z]/g, ''); // Simplified text normalization for "negative"/"positive"
                // Expected can be an array of acceptable keywords/phrases
                const expectedKeywords = Array.isArray(expected) ? expected : [expected];
                
                // Check if the input matches any of the expected keywords (normalized)
                isCorrect = expectedKeywords.some(keyword => normalizedInput === keyword.toLowerCase().replace(/[^a-z]/g, ''));
            } else if (type === 'coordinate') {
                // Normalize and check for (-3,-1) format
                const normalizedInput = rawValue.toLowerCase().replace(/[^0-9\-\,]/g, '');
                const expectedCoord = String(expected).toLowerCase().replace(/[^0-9\-\,]/g, '');
                isCorrect = (normalizedInput === expectedCoord);
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
            const totalQuestions = 5; 
            
            // Expected Answers:

            // 1. y = 4(2) - 5 = 8 - 5 = 3
            const ans_a1 = 3;
            
            // 2. 3 units left (-3), 1 unit down (-1) -> (-3, -1)
            const ans_a2 = "-3,-1"; 

            // 3. Slope m = (1 - 5) / (3 - 1) = -4 / 2 = -2. 
            const ans_a3 = -2; 

            // 4. x-intercept (y=0): 0 = -2x + 8 -> 2x = 8 -> x = 4
            const ans_a4 = 4; 

            // 5. Bumababa mula kaliwa pakanan: Negative
            const ans_a5 = ["negative", "negatibo"];

            if (!isLanguageToggle) {
                 // --- Check Answers ---
                correctCount += checkAnswer('qa1', ans_a1, 'number'); 
                correctCount += checkAnswer('qa2', ans_a2, 'coordinate'); 
                correctCount += checkAnswer('qa3', ans_a3, 'number');
                correctCount += checkAnswer('qa4', ans_a4, 'number');
                correctCount += checkAnswer('qa5', ans_a5, 'text');
                
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
            resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800', 'bg-red-100', 'text-red-800');

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


        document.getElementById('algebra-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); 
        });
        
        window.addEventListener('load', () => {
             // Initialize default language (English) and outline highlight on load
             updateLanguage('en');
        });
        
        // --- END SCROLL TRACKING LOGIC ---
    </script>
</body>
</html>
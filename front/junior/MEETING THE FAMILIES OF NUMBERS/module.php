<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Meeting the Families of Numbers</title>
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
        .content-box ul:not(#objectives ul), .content-box ol { 
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
            margin-bottom: 0.5rem; /* Added small margin for breathing room */
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Sets, Elements, and Union</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Intersection and Types of Sets</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Number Line and Integers</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Meeting the Families of Numbers</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Studying Set Theory, Union, Intersection, and the Number Line.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Explain the meaning of <b>Set</b>, <b>Element</b>, <b>Union</b>, and <b>Intersection</b>.</li>
                        <li data-i18n="obj_2">Identify different types of sets (Singleton, Null, Finite, Infinite).</li>
                        <li data-i18n="obj_3">Describe and use the <b>Number Line</b> and the concept of <b>Integers</b>. </li>
                        <li data-i18n="obj_4">Show inequalities (<b>></b>, <b><</b>, <b>&le;</b>, <b>&ge;</b>) on the number line.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Sets, Elements, at Union -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Ready, Sets, Go (Sets, Elements, and Union)</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">What is a Set?</h3>
                            <p data-i18n="aralin1_p1">In mathematics, a <b>Set</b> is a collection of objects (like numbers) that share a common characteristic. It is usually enclosed in braces <b>"{ }"</b> and named using <b>Capital Letters</b>.</p>
                            <p data-i18n="aralin1_p2">Each member inside the set is called an <b>Element</b> or <b>Member</b>.</p>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex1_title">EXAMPLE:</p>
                                <p data-i18n="aralin1_ex1_p1">Set of Even Integers: E = {2, 4, 6, 8}</p>
                                <p data-i18n="aralin1_ex1_p2">Set E has four elements.</p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Union of Sets</h3>
                            <p data-i18n="aralin1_p3">The <b>Union of Sets</b> (symbol: <b>&cup;</b>) is the combination of all elements from two or more sets to form one larger set. Common elements are written only <b>once</b>.</p>
                            <div class="math-formula" data-i18n="aralin1_formula1">
                                <span>A &cup; B = All Elements in A and All Elements in B</span>
                            </div>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin1_ex2_title">EXAMPLE of Union: </p>
                                <p data-i18n="aralin1_ex2_p1">A = {1, 3, 5, 8}</p>
                                <p data-i18n="aralin1_ex2_p2">B = {-2, 0, 4, 9}</p>
                                <p class="math-formula" data-i18n="aralin1_ex2_solution">A &cup; B = <b>{-2, 0, 1, 3, 4, 5, 8, 9}</b> (Arranged in ascending order).</p>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: Intersection at Uri ng Sets -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Setting It Up (Intersection and Types of Sets)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Intersection of Sets</h3>
                            <p data-i18n="aralin2_p1">The <b>Intersection of Sets</b> (symbol: <b>&cap;</b>) is the set consisting only of the <b>common elements</b> found in all sets. </p>
                            <div class="math-formula" data-i18n="aralin2_formula1">
                                <span>A &cap; B = Elements that are in A and in B</span>
                            </div>
                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_title">EXAMPLE of Intersection: </p>
                                <p data-i18n="aralin2_ex1_p1">M = {1, 2, 3, 4, 5}</p>
                                <p data-i18n="aralin2_ex1_p2">N = {2, 4, 6, 8, 10}</p>
                                <p class="math-formula" data-i18n="aralin2_ex1_solution">M &cap; N = <b>{2, 4}</b></p>
                                <p class="mt-2" data-i18n="aralin2_ex1_note">If there are no common elements, the intersection is the <b>Null Set (&empty;)</b>.</p>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Different Types of Sets</h3>
                            <ul class="list-disc list-inside ml-4 space-y-1">
                                <li data-i18n="aralin2_l1"><b>Singleton Set</b>: Has only <b>one (1)</b> element. Example: C = {2}.</li>
                                <li data-i18n="aralin2_l2"><b>Null Set</b> or <b>Empty Set</b>: Has no elements. Symbol: <b>{ }</b> or <b>&empty;</b>.</li>
                                <li data-i18n="aralin2_l3"><b>Finite Set</b>: Has a <b>limited</b> and <b>countable</b> number of elements. Example: P = {1, 2, 3}.</li>
                                <li data-i18n="aralin2_l4"><b>Infinite Set</b>: Has an endless number of elements. Uses the <b>ellipsis (...)</b>. Example: J = {2, 4, 6, 8, ...}.</li>
                                <li data-i18n="aralin2_l5"><b>Subset</b>: A set where <b>all elements</b> are also members of another larger set. Symbol: <b>&sub;</b>. Example: {1, 2} &sub; {1, 2, 3}.</li>
                            </ul>
                        </div>
                    </details>
                    
                    <!-- ARALIN 3: Number Line at Integers -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Falling in Line (Number Line and Integers)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">The Number Line</h3>
                            <p data-i18n="aralin3_p1">The <b>Number Line</b> is a straight, horizontal line with equally spaced numbers. It uses <b>zero (0)</b> as the reference point. </p>
                            <p data-i18n="aralin3_p2">Numbers to the <b>right</b> of 0 are <b>Positive</b> (gain/profit), and numbers to the <b>left</b> of 0 are <b>Negative</b> (loss/debt).</p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_2">Integers</h3>
                            <p data-i18n="aralin3_p3"><b>Integers</b> are composed of <b>Positive Numbers</b> (1, 2, 3, ...), <b>Negative Numbers</b> (-1, -2, -3, ...), and <b>Zero (0)</b>.</p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_3">Representing Inequalities</h3>
                            <p data-i18n="aralin3_p4">Inequalities (<b>></b>, <b><</b>, <b>&le;</b>, <b>&ge;</b>) are shown on the number line by shading the region that contains the set.</p>
                            <div class="example-box">
                                <ul class="list-disc list-inside ml-4 space-y-1">
                                    <li data-i18n="aralin3_l1"><b>Open Circle (Unshaded)</b>: Used for <b>></b> (greater than) and <b><</b> (less than). The reference number is not included.</li>
                                    <li data-i18n="aralin3_l2"><b>Closed Circle (Shaded)</b>: Used for <b>&ge;</b> (greater than or equal to) and <b>&le;</b> (less than or equal to). The reference number is included.</li>
                                </ul>
                                <p class="font-bold mt-2" data-i18n="aralin3_ex1_title">EXAMPLE: </p>
                                <p data-i18n="aralin3_ex1_p1">For x <b>></b> 2: Use an open circle at 2 and shade the region to the right.</p>
                                <p data-i18n="aralin3_ex1_p2">For x <b>&le;</b> -5: Use a closed circle at -5 and shade the region to the left.</p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the following questions based on Set Theory.</p>

                    <form id="set-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Union and Intersection</p>
                            <div class="space-y-4">
                                <p data-i18n="quiz_set_def">Let A = {0, 1, 2, 3, 4, 5} and B = {0, 2, 4, 6, 8}.</p>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. Give A &cup; B (Union):</label>
                                    <input type="text" id="qa1" class="quiz-input" data-i18n-placeholder="qa1_placeholder" placeholder="Ex: {0, 1, 2, 3}">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. Give A &cap; B (Intersection):</label>
                                    <input type="text" id="qa2" class="quiz-input" data-i18n-placeholder="qa2_placeholder" placeholder="Ex: {0, 2}">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Types of Sets</p>
                            <div class="space-y-4">
                                <div class="flex flex-col space-y-2">
                                    <label for="qb1" class="font-medium" data-i18n="qb1_label">3. What type of set is S = { }?</label>
                                    <input type="text" id="qb1" class="quiz-input" data-i18n-placeholder="qb1_placeholder" placeholder="Answer (One Word)">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="qb2" class="font-medium" data-i18n="qb2_label">4. What type of set is T = {5, 10, 15, ...}?</label>
                                    <input type="text" id="qb2" class="quiz-input" data-i18n-placeholder="qb2_placeholder" placeholder="Answer (One Word)">
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit-set-quiz" class="w-[70%] mx-auto block accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
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
                outline_aralin1: "Lesson 1: Sets, Elements, and Union",
                outline_aralin2: "Lesson 2: Intersection and Types of Sets",
                outline_aralin3: "Lesson 3: Number Line and Integers",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Meeting the Families of Numbers",
                h1_subtitle: "Studying Set Theory, Union, Intersection, and the Number Line.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Explain the meaning of <b>Set</b>, <b>Element</b>, <b>Union</b>, and <b>Intersection</b>.",
                obj_2: "Identify different types of sets (Singleton, Null, Finite, Infinite).",
                obj_3: "Describe and use the <b>Number Line</b> and the concept of <b>Integers</b>. ",
                obj_4: "Show inequalities (<b>></b>, <b><</b>, <b>&le;</b>, <b>&ge;</b>) on the number line.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Ready, Sets, Go (Sets, Elements, and Union)",
                aralin1_h3_1: "What is a Set?",
                aralin1_p1: "In mathematics, a <b>Set</b> is a collection of objects (like numbers) that share a common characteristic. It is usually enclosed in braces <b>\"{ }\"</b> and named using <b>Capital Letters</b>.",
                aralin1_p2: "Each member inside the set is called an <b>Element</b> or <b>Member</b>.",
                aralin1_ex1_title: "EXAMPLE:",
                aralin1_ex1_p1: "Set of Even Integers: E = {2, 4, 6, 8}",
                aralin1_ex1_p2: "Set E has four elements.",
                aralin1_h3_2: "Union of Sets",
                aralin1_p3: "The <b>Union of Sets</b> (symbol: <b>&cup;</b>) is the combination of all elements from two or more sets to form one larger set. Common elements are written only <b>once</b>.",
                aralin1_formula1: "A &cup; B = All Elements in A and All Elements in B",
                aralin1_ex2_title: "EXAMPLE of Union: ",
                aralin1_ex2_p1: "A = {1, 3, 5, 8}",
                aralin1_ex2_p2: "B = {-2, 0, 4, 9}",
                aralin1_ex2_solution: "A &cup; B = <b>{-2, 0, 1, 3, 4, 5, 8, 9}</b> (Arranged in ascending order).",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Setting It Up (Intersection and Types of Sets)",
                aralin2_h3_1: "Intersection of Sets",
                aralin2_p1: "The <b>Intersection of Sets</b> (symbol: <b>&cap;</b>) is the set consisting only of the <b>common elements</b> found in all sets. ",
                aralin2_formula1: "A &cap; B = Elements that are in A and in B",
                aralin2_ex1_title: "EXAMPLE of Intersection: ",
                aralin2_ex1_p1: "M = {1, 2, 3, 4, 5}",
                aralin2_ex1_p2: "N = {2, 4, 6, 8, 10}",
                aralin2_ex1_solution: "M &cap; N = <b>{2, 4}</b>",
                aralin2_ex1_note: "If there are no common elements, the intersection is the <b>Null Set (&empty;)</b>.",
                aralin2_h3_2: "Different Types of Sets",
                aralin2_l1: "<b>Singleton Set</b>: Has only <b>one (1)</b> element. Example: C = {2}.",
                aralin2_l2: "<b>Null Set</b> or <b>Empty Set</b>: Has no elements. Symbol: <b>{ }</b> or <b>&empty;</b>.",
                aralin2_l3: "<b>Finite Set</b>: Has a <b>limited</b> and <b>countable</b> number of elements. Example: P = {1, 2, 3}.",
                aralin2_l4: "<b>Infinite Set</b>: Has an endless number of elements. Uses the <b>ellipsis (...)</b>. Example: J = {2, 4, 6, 8, ...}.",
                aralin2_l5: "<b>Subset</b>: A set where <b>all elements</b> are also members of another larger set. Symbol: <b>&sub;</b>. Example: {1, 2} &sub; {1, 2, 3}.",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Falling in Line (Number Line and Integers)",
                aralin3_h3_1: "The Number Line",
                aralin3_p1: "The <b>Number Line</b> is a straight, horizontal line with equally spaced numbers. It uses <b>zero (0)</b> as the reference point.",
                aralin3_p2: "Numbers to the <b>right</b> of 0 are <b>Positive</b> (gain/profit), and numbers to the <b>left</b> of 0 are <b>Negative</b> (loss/debt).",
                aralin3_h3_2: "Integers",
                aralin3_p3: "<b>Integers</b> are composed of <b>Positive Numbers</b> (1, 2, 3, ...), <b>Negative Numbers</b> (-1, -2, -3, ...), and <b>Zero (0)</b>.",
                aralin3_h3_3: "Representing Inequalities",
                aralin3_p4: "Inequalities (<b>></b>, <b><</b>, <b>&le;</b>, <b>&ge;</b>) are shown on the number line by shading the region that contains the set.",
                aralin3_ex1_title: "EXAMPLE: ",
                aralin3_l1: "<b>Open Circle (Unshaded)</b>: Used for <b>></b> (greater than) and <b><</b> (less than). The reference number is not included.",
                aralin3_l2: "<b>Closed Circle (Shaded)</b>: Used for <b>&ge;</b> (greater than or equal to) and <b>&le;</b> (less than or equal to). The reference number is included.",
                aralin3_ex1_p1: "For x <b>></b> 2: Use an open circle at 2 and shade the region to the right.",
                aralin3_ex1_p2: "For x <b>&le;</b> -5: Use a closed circle at -5 and shade the region to the left.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Answer the following questions based on Set Theory.",
                quiz_section1_title: "A. Union and Intersection",
                quiz_set_def: "Let A = {0, 1, 2, 3, 4, 5} and B = {0, 2, 4, 6, 8}.",
                qa1_label: "1. Give A &cup; B (Union):",
                qa1_placeholder: "Ex: {0, 1, 2, 3}",
                qa2_label: "2. Give A &cap; B (Intersection):",
                qa2_placeholder: "Ex: {0, 2}",
                quiz_section2_title: "B. Types of Sets",
                qb1_label: "3. What type of set is S = { }?",
                qb1_placeholder: "Answer (One Word)",
                qb2_label: "4. What type of set is T = {5, 10, 15, ...}?",
                qb2_placeholder: "Answer (One Word)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Set Theory and the Number Line!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the difference between Union and Intersection.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Re-read the section on different types of sets.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Sets, Elements, at Union",
                outline_aralin2: "Aralin 2: Intersection at Uri ng Sets",
                outline_aralin3: "Aralin 3: Number Line at Integers",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Meeting the Families of Numbers",
                h1_subtitle: "Pag-aaral ng Set Theory, Union, Intersection, at Number Line.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ibigay ang kahulugan ng <b>Set</b>, <b>Element</b>, <b>Union</b>, at <b>Intersection</b>.",
                obj_2: "Tukuyin ang iba't ibang uri ng sets (Singleton, Null, Finite, Infinite).",
                obj_3: "Ilarawan at gamitin ang <b>Number Line</b> at ang konsepto ng <b>Integers</b>. ",
                obj_4: "Ipakita ang inequalities (<b>></b>, <b><</b>, <b>&le;</b>, <b>&ge;</b>) sa number line.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Ready, Sets, Go (Sets, Elements, at Union)",
                aralin1_h3_1: "Ano ang Set?",
                aralin1_p1: "Sa matematika, ang <b>Set</b> ay isang koleksiyon ng mga bagay (tulad ng numero) na may parehong katangian. Karaniwan itong nakapaloob sa braces <b>\"{ }\"</b> at pinangalanan gamit ang <b>Capital Letters</b>.",
                aralin1_p2: "Ang bawat miyembro sa loob ng set ay tinatawag na <b>Element</b> o <b>Member</b>.",
                aralin1_ex1_title: "HALIMBAWA:",
                aralin1_ex1_p1: "Set ng Even Integers: E = {2, 4, 6, 8}",
                aralin1_ex1_p2: "Ang set E ay may apat na elements.",
                aralin1_h3_2: "Union of Sets",
                aralin1_p3: "Ang <b>Union of Sets</b> (simbolo: <b>&cup;</b>) ay ang pagsasama-sama ng lahat ng elements mula sa dalawa o higit pang sets upang bumuo ng isang mas malaking set. Ang mga magkakaparehong elements ay isinusulat lamang nang <b>isang beses</b>.",
                aralin1_formula1: "A &cup; B = Lahat ng Elements sa A at Lahat ng Elements sa B",
                aralin1_ex2_title: "HALIMBAWA ng Union: ",
                aralin1_ex2_p1: "A = {1, 3, 5, 8}",
                aralin1_ex2_p2: "B = {-2, 0, 4, 9}",
                aralin1_ex2_solution: "A &cup; B = <b>{-2, 0, 1, 3, 4, 5, 8, 9}</b> (Nakaayos sa ascending order).",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Setting It Up (Intersection at Uri ng Sets)",
                aralin2_h3_1: "Intersection of Sets",
                aralin2_p1: "Ang <b>Intersection of Sets</b> (simbolo: <b>&cap;</b>) ay ang set na binubuo lamang ng mga <b>common elements</b> o magkakaparehong elements na matatagpuan sa lahat ng sets. ",
                aralin2_formula1: "A &cap; B = Mga Elements na nasa A at nasa B",
                aralin2_ex1_title: "HALIMBAWA ng Intersection: ",
                aralin2_ex1_p1: "M = {1, 2, 3, 4, 5}",
                aralin2_ex1_p2: "N = {2, 4, 6, 8, 10}",
                aralin2_ex1_solution: "M &cap; N = <b>{2, 4}</b>",
                aralin2_ex1_note: "Kung walang common elements, ang intersection ay <b>Null Set (&empty;)</b>.",
                aralin2_h3_2: "Iba't Ibang Uri ng Sets",
                aralin2_l1: "<b>Singleton Set</b>: Mayroon lamang <b>isang (1)</b> element. Halimbawa: C = {2}.",
                aralin2_l2: "<b>Null Set</b> o <b>Empty Set</b>: Walang laman. Simbolo: <b>{ }</b> o <b>&empty;</b>.",
                aralin2_l3: "<b>Finite Set</b>: May <b>limited</b> at <b>countable</b> na bilang ng elements. Halimbawa: P = {1, 2, 3}.",
                aralin2_l4: "<b>Infinite Set</b>: Walang katapusan (endless) ang bilang ng elements. Gumagamit ng <b>ellipsis (...)</b>. Halimbawa: J = {2, 4, 6, 8, ...}.",
                aralin2_l5: "<b>Subset</b>: Isang set na ang <b>lahat ng elements</b> ay miyembro din ng isa pang mas malaking set. Simbolo: <b>&sub;</b>. Halimbawa: {1, 2} &sub; {1, 2, 3}.",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Falling in Line (Number Line at Integers)",
                aralin3_h3_1: "Ang Number Line",
                aralin3_p1: "Ang <b>Number Line</b> ay isang tuwid, pahalang (horizontal) na linya na may mga numerong magkakapareho ang pagitan. Gumagamit ito ng <b>zero (0)</b> bilang reference point.",
                aralin3_p2: "Ang mga numero sa <b>kanan</b> ng 0 ay <b>Positive</b> (nagdaragdag/kita), at ang mga numero sa <b>kaliwa</b> ng 0 ay <b>Negative</b> (nagbabawas/utang).",
                aralin3_h3_2: "Integers",
                aralin3_p3: "Ang <b>Integers</b> ay binubuo ng <b>Positive Numbers</b> (1, 2, 3, ...), <b>Negative Numbers</b> (-1, -2, -3, ...), at <b>Zero (0)</b>.",
                aralin3_h3_3: "Representing Inequalities",
                aralin3_p4: "Ang mga inequalities (<b>></b>, <b><</b>, <b>&le;</b>, <b>&ge;</b>) ay ipinapakita sa number line sa pamamagitan ng shading (pagkulay) sa rehiyon na kinabibilangan ng set.",
                aralin3_ex1_title: "HALIMBAWA: ",
                aralin3_l1: "<b>Open Circle (Unshaded)</b>: Ginagamit para sa <b>></b> (greater than) at <b><</b> (less than). Hindi kasama ang reference number.",
                aralin3_l2: "<b>Closed Circle (Shaded)</b>: Ginagamit para sa <b>&ge;</b> (greater than or equal to) at <b>&le;</b> (less than or equal to). Kasama ang reference number.",
                aralin3_ex1_p1: "Para sa x <b>></b> 2: Gumamit ng open circle sa 2 at i-shade ang rehiyon sa kanan.",
                aralin3_ex1_p2: "Para sa x <b>&le;</b> -5: Gumamit ng closed circle sa -5 at i-shade ang rehiyon sa kaliwa.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang sumusunod na tanong batay sa Set Theory.",
                quiz_section1_title: "A. Union at Intersection",
                quiz_set_def: "Hayaan ang A = {0, 1, 2, 3, 4, 5} at B = {0, 2, 4, 6, 8}.",
                qa1_label: "1. Ibigay ang A &cup; B (Union):",
                qa1_placeholder: "Hal: {0, 1, 2, 3}",
                qa2_label: "2. Ibigay ang A &cap; B (Intersection):",
                qa2_placeholder: "Hal: {0, 2}",
                quiz_section2_title: "B. Uri ng Sets",
                qb1_label: "3. Anong uri ng set ang S = { }?",
                qb1_placeholder: "Sagot (Isang Salita)",
                qb2_label: "4. Anong uri ng set ang T = {5, 10, 15, ...}?",
                qb2_placeholder: "Sagot (Isang Salita)",
                quiz_button: "Tapusin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang Set Theory at ang Number Line!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang pagkakaiba ng Union at Intersection.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Pag-aralan ulit ang iba't ibang uri ng sets.`,
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
        // Renamed 'tungkol-saan' to 'objectives' for consistency in the HTML element ID
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


        // Helper function to process set strings into a standardized array of numbers/strings
        function normalizeSet(setStr) {
            if (!setStr) return [];
            // Remove braces, split by comma, trim whitespace
            let elements = setStr.replace(/[{}]/g, '').split(',').map(e => e.trim()).filter(e => e.length > 0);
            
            // Try to convert to numbers where applicable, otherwise keep as string
            let normalized = elements.map(e => {
                const num = parseFloat(e);
                // Check if it's a number and if the string representation matches the original (to avoid converting non-numeric strings)
                if (!isNaN(num) && String(num) === e) {
                    return num;
                }
                return e;
            });
            
            // Sort the array for order-insensitive comparison
            return normalized.sort((a, b) => {
                if (typeof a === 'number' && typeof b === 'number') return a - b;
                if (typeof a === 'number') return -1; // Numbers before strings
                if (typeof b === 'number') return 1;
                return String(a).localeCompare(String(b));
            });
        }
        
        // Helper function for array comparison (order insensitive)
        function setsAreEqual(arr1, arr2) {
            if (arr1.length !== arr2.length) return false;
            for (let i = 0; i < arr1.length; i++) {
                if (arr1[i] !== arr2[i]) return false;
            }
            return true;
        }
        
        // Helper function for single word comparison
        function normalizeWord(word) {
            // Allows letters and numbers
            return word.trim().toLowerCase().replace(/[^a-z0-9]/g, '');
        }

        function checkSetAnswer(id, expectedSet) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            const inputSet = normalizeSet(rawValue);
            
            // Expected set must also be normalized
            const expectedNormalized = normalizeSet(expectedSet);
            
            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            const isCorrect = setsAreEqual(inputSet, expectedNormalized);

            input.classList.remove('correct-answer', 'incorrect-answer');
            
            if (isCorrect) {
                input.classList.add('correct-answer');
                return 1;
            } else {
                input.classList.add('incorrect-answer');
                return 0;
            }
        }
        
        function checkWordAnswer(id, expectedWords) {
            const input = document.getElementById(id);
            const rawValue = input.value;
            const inputWord = normalizeWord(rawValue);
            
            const expectedNormalized = Array.isArray(expectedWords) ? expectedWords.map(normalizeWord) : [normalizeWord(expectedWords)];

            if (rawValue.length === 0) {
                input.classList.remove('correct-answer', 'incorrect-answer');
                return 0;
            }

            const isCorrect = expectedNormalized.includes(inputWord);

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
        document.getElementById('set-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false);
        });

        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 4; 
            const resultsDiv = document.getElementById('results');

            // Sets: A = {0, 1, 2, 3, 4, 5} and B = {0, 2, 4, 6, 8}
            
            // A1: A U B = {0, 1, 2, 3, 4, 5, 6, 8}
            const ans_a1 = "{0, 1, 2, 3, 4, 5, 6, 8}";
            
            // A2: A n B = {0, 2, 4}
            const ans_a2 = "{0, 2, 4}";
            
            // B1: S = { } (Null/Empty Set)
            const ans_b1 = ["null", "empty"]; 
            
            // B2: T = {5, 10, 15, ...} (Infinite Set)
            const ans_b2 = "infinite";

            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkSetAnswer('qa1', ans_a1);
                correctCount += checkSetAnswer('qa2', ans_a2);
                correctCount += checkWordAnswer('qb1', ans_b1); 
                correctCount += checkWordAnswer('qb2', ans_b2);
                
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
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions);
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
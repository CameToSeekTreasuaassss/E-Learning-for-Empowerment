<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paglutas ng Pang-araw-araw na Suliranin</title>
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
        
        /* --- ADDED CUSTOM STYLE FOR MAIN H1 TITLE (50px) --- */
        .main-title-h1 {
            font-size: 50px; /* 50px */
            line-height: 1.1;
        }
        /* --- END ADDED CUSTOM STYLE --- */

        /* --- TEXT SIZE AND SPACING (Consistent with previous module - 20px) --- */
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
        /* Explicitly set Objectives list items to 20px (1.25rem) */
        #objectives ul li {
            font-size: 1.25rem; 
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
        /* Increased desktop width for better input visibility */
        @media (min-width: 640px) {
            .quiz-input {
                width: 12rem; /* 48 = 12rem (standardized width) */
            }
        }
        .quiz-input:focus {
            border-color: #059669;
            outline: none;
        }
        
        /* Quiz Feedback */
        .correct-answer {
            background-color: #d1fae5 !important;
            border-color: #10b981 !important;
        }
        .incorrect-answer {
            background-color: #fecaca !important;
            border-color: #ef4444 !important;
        }
        .selected-correct {
            background-color: #a7f3d0 !important;
            border-color: #059669 !important;
            box-shadow: 0 0 0 3px #d1fae5;
        }
        .selected-incorrect {
            background-color: #fecaca !important;
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px #fee2e2;
        }
        
        /* Specific header size adjustment (Paraan 1 and 2 in Aralin 2) */
        .content-box h4 {
            font-size: 1.25rem; /* 20px */
            font-weight: 600;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #1f2937;
        }
        
        /* Quiz Styles for Agree/Disagree */
        .quiz-option {
            display: flex;
            align-items: center;
            padding: 0.75rem; 
            cursor: pointer;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            transition: all 0.2s;
            background-color: #ffffff;
            font-size: 1.25rem; /* 20px for quiz text */
            color: #1f2937;
        }
        .quiz-option:hover {
            border-color: #34d399;
            background-color: #ecfdf5;
        }
        .quiz-option input[type="radio"] {
            margin-right: 0.75rem;
            width: 1.25rem; /* Larger radio button */
            height: 1.25rem;
        }
        
        /* Custom CSS to make the entire NAV sticky */
        #outline-nav .sticky-container {
            position: sticky;
            top: 1rem; /* Adjust this value as needed, 1rem (16px) is usually good */
        }
    </style>
</head>
<body class="p-4 sm:p-8 lg:p-20">

    <!-- Main Grid Container for Outline and Content -->
    <div class="mx-auto lg:grid lg:grid-cols-12 lg:gap-8">

        <!-- Left Column: Outline and Translator -->
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Do You Have Problems in Life?</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: How Do We Solve Our Problems?</a>
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
                    <!-- UPDATED: Meta Text -->
                    <span class="text-xs font-semibold uppercase tracking-wider text-green-600 bg-green-100 px-3 py-1 rounded-full" data-i18n="meta_text">Advance Elementary Learning Module Sheet</span>
                    <!-- UPDATED: Added main-title-h1 class and font-bold for 50px size -->
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Solving Day-to-Day Problems</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Learning how to face life's problems and how they strengthen our character.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (using 1.25rem/20px font size) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Font size of li is now set to 1.25rem (20px) via the custom CSS above -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Identify different types of <b>problems</b>;</li>
                        <li data-i18n="obj_2">Explain how a problem begins;</li>
                        <li data-i18n="obj_3">Explain how problems strengthen our character;</li>
                        <li data-i18n="obj_4">Suggest possible <b>solutions</b> to a problem; and</li>
                        <li data-i18n="obj_5">Apply the most effective solutions to your own problems.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Mayroon Ka bang mga Suliranin sa Buhay? -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Do You Have Problems in Life?</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">A <b>problem</b> is something difficult to face or understand. It is normal and common to have problems in life, and they help us become stronger.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">How Does a Problem Start?</h3>
                            <p data-i18n="aralin1_p2">Often, our own <b>actions</b> cause problems (such as not studying or coming home drunk). Problems occur when we fail to address an obstacle promptly, and it starts affecting our family, work, or studies. </p>
                            
                            <p class="p-2 bg-green-100 border-l-4 border-green-400 text-green-800" data-i18n="aralin1_ex1">For example, Pilo's (the older brother in the story) problem began when he kept secrets from his wife about his job, which led to arguments and his family leaving. </p>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Effect of Problems</h3>
                            <p data-i18n="aralin1_p3">Problems do not only affect us (physically, emotionally, socially) but also those close to us (spouse, children, parents, colleagues). Therefore, it is important to solve them immediately.</p>

                            <h4 class="font-semibold mt-4 text-gray-700" data-i18n="aralin1_h4_1">Reflection: Look Positively</h4>
                            <p data-i18n="aralin1_p4">No matter how difficult the problem is, we must view it <b>positively</b> and believe that there is always a solution. Problems push us to <b>think carefully</b> about our actions and to find new ways to become a better person.</p>
                            
                        </div>
                    </details>

                    <!-- ARALIN 2: Paano Natin Lulutasin ang Ating mga Suliranin? -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: How Do We Solve Our Problems?</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">Problem-solving begins with <b>being calm</b> and having a <b>positive outlook</b>. Tension and confusion will only worsen the situation. </p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Steps in Problem Solving</h3>
                            <ol class="list-decimal list-inside space-y-3 ml-4">
                                <li data-i18n="aralin2_ol1"><b>Identify the Problem:</b> Determine what the real issue is (e.g., not just low grades, but the reason is skipping class).</li>
                                <li data-i18n="aralin2_ol2"><b>Focus on Planning:</b> Analyze how it started and who is affected. Determine what you <b>want to happen</b> (the ideal outcome).</li>
                                <li data-i18n="aralin2_ol3"><b>Avoid Blaming:</b> Take <b>responsibility</b> for your own problem. Do not blame others. This helps you think of a solution.</li>
                                <li data-i18n="aralin2_ol4"><b>Overcome Emotions:</b> Keep calm. Do not let anger, sadness, or anxiety take over. Think <b>clearly and openly</b>.</li>
                                <li data-i18n="aralin2_ol5"><b>Take Responsibility and Act:</b> You should face it and find a solution. Think of many possible solutions.</li>
                                <li data-i18n="aralin2_ol6"><b>Determine the Effectiveness of the Solution:</b> Evaluate the <b>possible consequences</b> of each solution. Choose the <b>most effective one</b> that will not cause a new problem.</li>
                            </ol>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin2_ex1_q">EXAMPLE: Marian's Solution (Older sister in the story)</p>
                                <p data-i18n="aralin2_ex1_a">Problem: Worrying about pregnancy because of a missed period.</p>
                                <p data-i18n="aralin2_ex1_b">Solution: With Rina's help, she visited a doctor to find the <b>truth</b> (The wisest solution is to find the facts first). Her worry disappeared when the result was negative.</p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section: Pre-Test Review (Based on PDF Page 2-3) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Answer the following questions based on what you learned in the module. Check Agree or Disagree.</p>
                    
                    <form id="problem-solving-quiz-form" class="space-y-4">
                        <!-- Questions 1-10 from PDF Pre-Test -->
                        
                        <div class="space-y-2 p-3 bg-white rounded-lg shadow">
                            <p class="font-semibold text-gray-800" data-i18n="q1_text">1. A single problem can have many solutions.</p>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="quiz-option"><input type="radio" name="q1" value="A"> <span data-i18n="option_agree">Agree</span></label>
                                <label class="quiz-option"><input type="radio" name="q1" value="D"> <span data-i18n="option_disagree">Disagree</span></label>
                            </div>
                        </div>

                        <div class="space-y-2 p-3 bg-white rounded-lg shadow">
                            <p class="font-semibold text-gray-800" data-i18n="q2_text">2. It helps if a person views a problem positively.</p>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="quiz-option"><input type="radio" name="q2" value="A"> <span data-i18n="option_agree">Agree</span></label>
                                <label class="quiz-option"><input type="radio" name="q2" value="D"> <span data-i18n="option_disagree">Disagree</span></label>
                            </div>
                        </div>

                        <div class="space-y-2 p-3 bg-white rounded-lg shadow">
                            <p class="font-semibold text-gray-800" data-i18n="q3_text">3. Every solution to a problem has an inherent risk.</p>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="quiz-option"><input type="radio" name="q3" value="A"> <span data-i18n="option_agree">Agree</span></label>
                                <label class="quiz-option"><input type="radio" name="q3" value="D"> <span data-i18n="option_disagree">Disagree</span></label>
                            </div>
                        </div>
                        
                        <div class="space-y-2 p-3 bg-white rounded-lg shadow">
                            <p class="font-semibold text-gray-800" data-i18n="q4_text">4. Sometimes, a problem has no solution, so we should just give up.</p>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="quiz-option"><input type="radio" name="q4" value="A"> <span data-i18n="option_agree">Agree</span></label>
                                <label class="quiz-option"><input type="radio" name="q4" value="D"> <span data-i18n="option_disagree">Disagree</span></label>
                            </div>
                        </div>

                        <div class="space-y-2 p-3 bg-white rounded-lg shadow">
                            <p class="font-semibold text-gray-800" data-i18n="q5_text">5. Problems are opportunities for self-improvement.</p>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="quiz-option"><input type="radio" name="q5" value="A"> <span data-i18n="option_agree">Agree</span></label>
                                <label class="quiz-option"><input type="radio" name="q5" value="D"> <span data-i18n="option_disagree">Disagree</span></label>
                            </div>
                        </div>
                        
                        <div class="space-y-2 p-3 bg-white rounded-lg shadow">
                            <p class="font-semibold text-gray-800" data-i18n="q6_text">6. How we view a problem affects the way we approach it.</p>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="quiz-option"><input type="radio" name="q6" value="A"> <span data-i18n="option_agree">Agree</span></label>
                                <label class="quiz-option"><input type="radio" name="q6" value="D"> <span data-i18n="option_disagree">Disagree</span></label>
                            </div>
                        </div>

                        <div class="space-y-2 p-3 bg-white rounded-lg shadow">
                            <p class="font-semibold text-gray-800" data-i18n="q7_text">7. Solving problems does not require proper planning.</p>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="quiz-option"><input type="radio" name="q7" value="A"> <span data-i18n="option_agree">Agree</span></label>
                                <label class="quiz-option"><input type="radio" name="q7" value="D"> <span data-i18n="option_disagree">Disagree</span></label>
                            </div>
                        </div>

                        <div class="space-y-2 p-3 bg-white rounded-lg shadow">
                            <p class="font-semibold text-gray-800" data-i18n="q8_text">8. Anyone aiming to solve a problem should have an open mind.</p>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="quiz-option"><input type="radio" name="q8" value="A"> <span data-i18n="option_agree">Agree</span></label>
                                <label class="quiz-option"><input type="radio" name="q8" value="D"> <span data-i18n="option_disagree">Disagree</span></label>
                            </div>
                        </div>

                        <div class="space-y-2 p-3 bg-white rounded-lg shadow">
                            <p class="font-semibold text-gray-800" data-i18n="q9_text">9. Problems do not strengthen our character.</p>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="quiz-option"><input type="radio" name="q9" value="A"> <span data-i18n="option_agree">Agree</span></label>
                                <label class="quiz-option"><input type="radio" name="q9" value="D"> <span data-i18n="option_disagree">Disagree</span></label>
                            </div>
                        </div>

                        <div class="space-y-2 p-3 bg-white rounded-lg shadow">
                            <p class="font-semibold text-gray-800" data-i18n="q10_text">10. A person should know what they want before fully solving their own problem.</p>
                            <div class="grid grid-cols-2 gap-4">
                                <label class="quiz-option"><input type="radio" name="q10" value="A"> <span data-i18n="option_agree">Agree</span></label>
                                <label class="quiz-option"><input type="radio" name="q10" value="D"> <span data-i18n="option_disagree">Disagree</span></label>
                            </div>
                        </div>


                        <!-- UPDATED: Button width and text -->
                        <button type="button" onclick="submitQuiz()" class="w-[70%] mx-auto block accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
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
                outline_aralin1: "Lesson 1: Do You Have Problems in Life?",
                outline_aralin2: "Lesson 2: How Do We Solve Our Problems?",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Solving Day-to-Day Problems",
                h1_subtitle: "Learning how to face life's problems and how they strengthen our character.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Identify different types of <b>problems</b>;",
                obj_2: "Explain how a problem begins;",
                obj_3: "Explain how problems strengthen our character;",
                obj_4: "Suggest possible <b>solutions</b> to a problem; and",
                obj_5: "Apply the most effective solutions to your own problems.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Do You Have Problems in Life?",
                aralin1_p1: "A <b>problem</b> is something difficult to face or understand. It is normal and common to have problems in life, and they help us become stronger.",
                aralin1_h3_1: "How Does a Problem Start?",
                aralin1_p2: "Often, our own <b>actions</b> cause problems (such as not studying or coming home drunk). Problems occur when we fail to address an obstacle promptly, and it starts affecting our family, work, or studies. ",
                aralin1_ex1: "For example, Pilo's (the older brother in the story) problem began when he kept secrets from his wife about his job, which led to arguments and his family leaving. ",
                aralin1_h3_2: "Effect of Problems",
                aralin1_p3: "Problems do not only affect us (physically, emotionally, socially) but also those close to us (spouse, children, parents, colleagues). Therefore, it is important to solve them immediately.",
                aralin1_h4_1: "Reflection: Look Positively",
                aralin1_p4: "No matter how difficult the problem is, we must view it <b>positively</b> and believe that there is always a solution. Problems push us to <b>think carefully</b> about our actions and to find new ways to become a better person.",
                
                // Lesson 2 Content
                aralin2_title: "Lesson 2: How Do We Solve Our Problems?",
                aralin2_p1: "Problem-solving begins with <b>being calm</b> and having a <b>positive outlook</b>. Tension and confusion will only worsen the situation. ",
                aralin2_h3_1: "Steps in Problem Solving",
                aralin2_ol1: "<b>Identify the Problem:</b> Determine what the real issue is (e.g., not just low grades, but the reason is skipping class).",
                aralin2_ol2: "<b>Focus on Planning:</b> Analyze how it started and who is affected. Determine what you <b>want to happen</b> (the ideal outcome).",
                aralin2_ol3: "<b>Avoid Blaming:</b> Take <b>responsibility</b> for your own problem. Do not blame others. This helps you think of a solution.",
                aralin2_ol4: "<b>Overcome Emotions:</b> Keep calm. Do not let anger, sadness, or anxiety take over. Think <b>clearly and openly</b>.",
                aralin2_ol5: "<b>Take Responsibility and Act:</b> You should face it and find a solution. Think of many possible solutions.",
                aralin2_ol6: "<b>Determine the Effectiveness of the Solution:</b> Evaluate the <b>possible consequences</b> of each solution. Choose the <b>most effective one</b> that will not cause a new problem.",
                aralin2_ex1_q: "EXAMPLE: Marian's Solution (Older sister in the story)",
                aralin2_ex1_a: "Problem: Worrying about pregnancy because of a missed period.",
                aralin2_ex1_b: "Solution: With Rina's help, she visited a doctor to find the <b>truth</b> (The wisest solution is to find the facts first). Her worry disappeared when the result was negative.",

                // Quiz Labels
                quiz_title: "Practice",
                quiz_subtitle: "Answer the following questions based on what you learned in the module. Check Agree or Disagree.",
                q1_text: "1. A single problem can have many solutions.",
                q2_text: "2. It helps if a person views a problem positively.",
                q3_text: "3. Every solution to a problem has an inherent risk.",
                q4_text: "4. Sometimes, a problem has no solution, so we should just give up.",
                q5_text: "5. Problems are opportunities for self-improvement.",
                q6_text: "6. How we view a problem affects the way we approach it.",
                q7_text: "7. Solving problems does not require proper planning.",
                q8_text: "8. Anyone aiming to solve a problem should have an open mind.",
                q9_text: "9. Problems do not strengthen our character.",
                q10_text: "10. A person should know what they want before fully solving their own problem.",
                option_agree: "Agree",
                option_disagree: "Disagree",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! You understood the problem-solving concepts well. Your score: ${score}/${total}.`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Just review the lessons to improve your understanding.`,
                quiz_result_fail: (score, total, percentage) => `You need to study the module again. Your score: ${score}/${total} (${percentage}%). Remember, every problem has a solution!`,

            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Mayroon Ka bang mga Suliranin sa Buhay?",
                outline_aralin2: "Aralin 2: Paano Natin Lulutasin ang Ating mga Suliranin?",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Advance Elementary Learning Module Sheet",
                h1_title: "Paglutas ng Pang-araw-araw na Suliranin",
                h1_subtitle: "Pag-aaral kung paano dapat harapin ang mga suliranin sa buhay at kung paano ito nakapagpapatibay sa ating pagkatao.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",

                // Objectives
                obj_1: "Matukoy ang iba't ibang uri ng mga <b>suliranin</b>;",
                obj_2: "Maipaliwanag kung paano nagsisimula ang isang suliranin;",
                obj_3: "Maipaliwanag kung paano nakapagpapatibay sa ating pagkatao ang mga suliranin;",
                obj_4: "Makapagmungkahi ng mga posibleng <b>solusyon</b> sa isang suliranin; at",
                obj_5: "Magamit ang mga pinakamabibisang solusyon sa mga sariling suliranin.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Mayroon Ka bang mga Suliranin sa Buhay?",
                aralin1_p1: "Ang <b>suliranin</b> ay isang bagay na mahirap harapin o unawain. Normal at karaniwan lamang na magkaroon ng mga suliranin sa buhay, at ang mga ito ay tumutulong upang tayo ay maging mas matatag.",
                aralin1_h3_1: "Paano Nagsisimula ang Suliranin?",
                aralin1_p2: "Kadalasan, ang ating mga <b>kilos</b> ang nagdudulot ng suliranin (tulad ng hindi pag-aaral o pag-uwi nang lasing). Nagkakaroon ng suliranin kapag hindi natin binibigyan ng maagap na pansin ang isang balakid, at ito ay nakaapekto na sa ating pamilya, trabaho, o pag-aaral. ",
                aralin1_ex1: "Halimbawa, ang suliranin ni Pilo (Kuya sa kuwento) ay nagsimula sa paglilihim niya sa asawa tungkol sa kaniyang trabaho, na nagdulot ng pag-aaway at pag-alis ng pamilya. ",
                aralin1_h3_2: "Epekto ng Suliranin",
                aralin1_p3: "Ang mga suliranin ay hindi lamang nakaaapekto sa atin (pisikal, emosyonal, sosyal), kundi pati na rin sa mga taong malalapit sa atin (asawa, anak, magulang, katrabaho). Kaya't mahalagang lutasin ito kaagad.",
                aralin1_h4_1: "Reflection: Tumingin nang Positibo",
                aralin1_p4: "Kahit gaano kahirap ang suliranin, dapat natin itong tingnan nang <b>positibo</b> at maniwala na laging may solusyon. Ang mga suliranin ay nagtutulak sa atin para <b>pag-isipan nang mabuti</b> ang ating mga galaw at para makahanap ng mga bagong paraan para maging mas mabuting tao.",
                
                // Lesson 2 Content
                aralin2_title: "Aralin 2: Paano Natin Lulutasin ang Ating mga Suliranin?",
                aralin2_p1: "Ang paglutas ng suliranin ay nagsisimula sa <b>pagiging mahinahon</b> at <b>positibong pananaw</b>. Ang tensiyon at pagkalito ay makapagpapalala lamang ng sitwasyon. ",
                aralin2_h3_1: "Mga Hakbang sa Paglutas ng Suliranin",
                aralin2_ol1: "<b>Tukuyin ang Suliranin:</b> Alamin kung ano talaga ang problema (e.g., hindi lang mababa ang marka, kundi ang dahilan ay pagliban sa klase).",
                aralin2_ol2: "<b>Tutukan ang Pagpaplano:</b> Suriin kung paano nagsimula at sino ang apektado. Tukuyin kung ano ang <b>gusto mong mangyari</b> (ang ideal outcome).",
                aralin2_ol3: "<b>Iwasang Manisi:</b> Akuin ang <b>pananagutan</b> sa iyong sariling suliranin. Huwag isisi sa iba. Ito ay makatutulong para makapag-isip ng solusyon.",
                aralin2_ol4: "<b>Pangibabawan ang Damdamin:</b> Magpakahinahon. Huwag hayaang madala ng galit, lungkot, o pagkabalisa. Mag-isip nang <b>malinaw at bukas</b>.",
                aralin2_ol5: "<b>Akuin ang Pananagutan at Kumilos:</b> Ikaw ang dapat humarap at humanap ng solusyon. Mag-isip ng maraming posibleng solusyon.",
                aralin2_ol6: "<b>Alamin ang Bisa ng Solusyon:</b> Suriin ang mga <b>posibleng bunga (consequences)</b> ng bawat solusyon. Piliin ang <b>pinakamabisa</b> na hindi magdudulot ng panibagong suliranin.",
                aralin2_ex1_q: "HALIMBAWA: Ang Solusyon ni Marian (Kuya sa kuwento)",
                aralin2_ex1_a: "Suliranin: Pag-aalala na mabuntis dahil hindi dinatnan ng regla.",
                aralin2_ex1_b: "Solusyon: Sa tulong ni Rina, nagpatingin sa doktor para malaman ang <b>katotohanan</b> (The wisest solution is to find the facts first). Nawala ang pag-aalala nang malaman na negatibo ang resulta.",

                // Quiz Labels
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Sagutin ang sumusunod na tanong batay sa iyong natutuhan sa modyul. Lagyan ng tsek ang Sang-ayon o Hindi-sang-ayon.",
                q1_text: "1. Maaaring magkaroon ng maraming solusyon sa iisang suliranin.",
                q2_text: "2. Makatutulong kung positibo ang tingin ng isang tao sa isang suliranin.",
                q3_text: "3. May kaakibat na panganib ang bawat solusyon sa isang suliranin.",
                q4_text: "4. Minsan, walang solusyon ang isang problema kung kaya't nararapat lang na tayo ay susuko.",
                q5_text: "5. Ang mga suliranin ay mga pagkakataon para mapaunlad ang sarili.",
                q6_text: "6. Kung paano natin tinitingnan ang isang suliranin ay nakaaapekto sa paraan ng pagharap natin dito.",
                q7_text: "7. Hindi nangangailangan ng maayos na pagpaplano ang paglutas sa mga suliranin.",
                q8_text: "8. Dapat na bukas ang isip ng sinumang naglalayon na lumutas ng isang suliranin.",
                q9_text: "9. Hindi nakapagpapatibay ng ating pagkatao ang mga suliranin.",
                q10_text: "10. Alam dapat ng isang tao kung ano ang kaniyang gusto bago niya lubusang malutas ang sariling suliranin.",
                option_agree: "Sang-ayon",
                option_disagree: "Hindi-sang-ayon",
                quiz_button: "Tingnan ang Sagot",

                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Naunawaan mo ang mga pananaw sa paglutas ng suliranin. Iyong Iskor: ${score}/${total}.`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan lang ang mga aralin para mas mapahusay ang iyong pag-unawa.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mong pag-aralan ulit ang module. Iyong Iskor: ${score}/${total} (${percentage}%). Tandaan, ang suliranin ay may solusyon!`,
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
                    // Use innerHTML for text that contains <b> tags
                    element.innerHTML = langData[key];
                }
            });
            
            // 2. Update language code on HTML tag
            document.documentElement.lang = lang;

            // 3. Update the static current language label
            currentLangLabel.textContent = lang === 'tl' ? 'Wika: Tagalog' : 'Language: English';

            // 4. Update toggle button text: shows the language it will switch TO
            const oppositeLang = lang === 'tl' ? 'en' : 'tl';
            const toggleKey = `toggle_text_${oppositeLang}`; 
            
            if (translations[oppositeLang] && translations[oppositeLang][toggleKey]) {
                toggleButton.querySelector('span').textContent = translations[oppositeLang][toggleKey];
            } else {
                 // Fallback
                 toggleButton.querySelector('span').textContent = lang === 'tl' ? 'Switch to: English' : 'Switch to: Tagalog';
            }
        }
        
        // --- LANGUAGE TOGGLE EVENT LISTENER ---
        document.getElementById('lang-toggle-btn').addEventListener('click', () => {
            const newLang = currentLang === 'tl' ? 'en' : 'tl';
            updateLanguage(newLang);
            // Re-run quiz logic to update result message if displayed
            const resultsDiv = document.getElementById('results');
            if (!resultsDiv.classList.contains('hidden')) {
                // If results are visible, update them for the new language
                submitQuiz(true); 
            }
        });


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
            'pagsasanay'
        ];
        
        const outlineLinks = sections.map(id => document.querySelector(`#outline a[href="#${id}"]`));
        const sectionElements = sections.map(id => document.getElementById(id));

        function highlightOutlineLink() {
            let activeLink = null;
            
            // Find the last section that has scrolled past 100px from the top
            for (let i = 0; i < sectionElements.length; i++) {
                if (!sectionElements[i]) continue;
                
                const rect = sectionElements[i].getBoundingClientRect();
                if (rect.top <= 100) { 
                    activeLink = outlineLinks[i];
                }
            }
            
            // Ensure the first link is active if at the very top
            if (window.scrollY < 100 && outlineLinks.length > 0 && outlineLinks[0]) {
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
        window.addEventListener('load', () => {
             // Initialize default language (English) on load
             updateLanguage('en');
             highlightOutlineLink();
        });
        // --- END SCROLL TRACKING LOGIC ---

        // --- QUIZ LOGIC ---
        // A = Agree/Sang-ayon, D = Disagree/Hindi-sang-ayon
        // Based on the 'Batayan sa Pagwawasto' in the PDF (pages 34-35)
        const correctAnswers = {
            'q1': 'A', 
            'q2': 'A', 
            'q3': 'A', 
            'q4': 'D', 
            'q5': 'A', 
            'q6': 'A', 
            'q7': 'D', 
            'q8': 'A', 
            'q9': 'D', 
            'q10': 'A' 
        };
        
        // Function to submit or re-submit the quiz (used by button and language toggle)
        function submitQuiz(isLanguageToggle = false) {
            let score = 0;
            const totalQuestions = 10;
            const resultsDiv = document.getElementById('results');

            // Only run score calculation if it's the initial submission (not just a language switch)
            if (!isLanguageToggle) {
                 for (let i = 1; i <= totalQuestions; i++) {
                    const qName = `q${i}`;
                    const selected = document.querySelector(`input[name="${qName}"]:checked`);
                    const correctAnswer = correctAnswers[qName];
                    
                    const optionElements = document.querySelectorAll(`input[name="${qName}"]`);
                    
                    optionElements.forEach(input => {
                        const label = input.closest('label');
                        label.classList.remove('correct-answer', 'incorrect-answer', 'selected-correct', 'selected-incorrect');

                        if (input.value === correctAnswer) {
                            // Mark the correct answer in light green
                            label.classList.add('correct-answer');
                        }

                        if (selected && input.value === selected.value) {
                            // Highlight the user's selection
                            if (input.value === correctAnswer) {
                                label.classList.add('selected-correct');
                            } else {
                                label.classList.add('selected-incorrect');
                            }
                        }
                    });

                    if (selected && selected.value === correctAnswer) {
                        score++;
                    }
                }
                
                // Store the current score to maintain state across language toggles
                resultsDiv.setAttribute('data-current-score', score);
            } else {
                 // If it's a language toggle, retrieve the score
                 score = parseInt(resultsDiv.getAttribute('data-current-score')) || 0;
            }


            // Display results using translated messages
            const percentage = ((score / totalQuestions) * 100).toFixed(0);
            const totalPossible = totalQuestions;
            const resultMessage = translations[currentLang];
            
            // Reset background for results box
            resultsDiv.classList.remove('bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800', 'bg-red-100', 'text-red-800', 'bg-green-600', 'text-white');

            let message;
            if (score >= 9) {
                message = resultMessage.quiz_result_excellent(score, totalPossible, percentage);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (score >= 5) {
                message = resultMessage.quiz_result_good(score, totalPossible, percentage);
                resultsDiv.classList.add('bg-yellow-100', 'text-yellow-800');
            } else {
                message = resultMessage.quiz_result_fail(score, totalPossible, percentage);
                resultsDiv.classList.add('bg-red-100', 'text-red-800');
            }

            resultsDiv.innerHTML = `<p class="text-xl font-bold mb-2" data-i18n="score_label">${currentLang === 'en' ? 'Your Score' : 'Iyong Iskor'}: ${score}/${totalPossible} (${percentage}%)</p>` + `<p class="text-lg">${message}</p>`;
            resultsDiv.classList.remove('hidden');

            if (!isLanguageToggle) {
                resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    </script>
</body>
</html>
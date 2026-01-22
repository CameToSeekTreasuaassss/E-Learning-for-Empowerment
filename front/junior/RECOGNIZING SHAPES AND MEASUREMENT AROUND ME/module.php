<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Recognizing Shapes and Measurements Around Me</title>
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
        .math-formula span { white-space: nowrap; display: block; } 

        /* --- Quiz Input Styles (Standardized to 20px) --- */
        .quiz-input { 
            font-size: 1.25rem; /* 20px - Input Text Size */
            border-bottom: 2px solid #a7f3d0; 
            transition: border-color 0.2s; 
            padding: 0.25rem; 
            text-align: center; /* Keep input text centered */
            width: 100%; /* Ensures the input takes full width */
        }
        .quiz-input:focus { border-color: #059669; outline: none; }
        
        /* Quiz Feedback Styles */
        .correct-answer { border-color: #10b981 !important; background-color: #ecfdf5; border-bottom-width: 2px; }
        .incorrect-answer { border-color: #ef4444 !important; background-color: #fef2f2; border-bottom-width: 2px; }
        
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
        
        /* Table Styles */
        .table-custom {
            border-collapse: collapse;
            border: 2px solid #059669; /* Green 600 */
            border-radius: 0.5rem;
            overflow: hidden;
            margin-bottom: 2rem;
            width: 100%;
        }
        .table-custom th {
            background-color: #059669; 
            color: white;
            padding: 0.75rem;
            font-size: 1.1rem;
            font-weight: 700;
            border: 1px solid #047857;
        }
        .table-custom td {
            padding: 0.75rem;
            border: 1px solid #a7f3d0; 
            text-align: left; 
            font-size: 1.25rem; 
        }
        
        /* Custom class to stack quiz vertically */
        .vertical-stack {
            display: flex;
            flex-direction: column;
            align-items: flex-start; 
            text-align: left; 
        }
        /* New styles for images/SVGs */
        .figure-box {
            margin-top: 1rem;
            margin-bottom: 1.5rem;
            text-align: center;
            display: block; /* Ensure it takes full width for centering */
        }
        .figure-box.inline {
            margin: 0.5rem 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1.5rem; /* Increased spacing between inline items */
        }
        .geometric-figure-img {
            /* Placeholder for generic box/div style for SVGs */
            display: inline-block;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 10px;
        }
        .geometric-figure-img svg {
            stroke: #059669;
            fill: #ecfdf5;
            max-width: 100%;
            height: auto;
        }
    </style>

    <!-- SVG Definitions for Reusability -->
    <svg style="display: none;">
        <!-- Undefined Terms -->
        <symbol id="svg-point" viewBox="0 0 20 20"><circle cx="10" cy="10" r="4" fill="#059669" /></symbol>
        <symbol id="svg-line-segment" viewBox="0 0 100 10"><line x1="10" y1="5" x2="90" y2="5" stroke="#059669" stroke-width="2" stroke-linecap="round" /></symbol>
        <symbol id="svg-ray" viewBox="0 0 100 10"><line x1="10" y1="5" x2="90" y2="5" stroke="#059669" stroke-width="2" stroke-linecap="round" /><circle cx="10" cy="5" r="2" fill="#059669" /><polyline points="90,3 100,5 90,7" stroke="#059669" stroke-width="2" fill="none" /></symbol>
        
        <!-- Lines -->
        <symbol id="svg-perpendicular" viewBox="0 0 100 100">
            <line x1="50" y1="10" x2="50" y2="90" stroke="#059669" stroke-width="3" />
            <line x1="10" y1="50" x2="90" y2="50" stroke="#059669" stroke-width="3" />
            <rect x="50" y="50" width="10" height="10" stroke="#059669" stroke-width="1" fill="none" />
        </symbol>
        <symbol id="svg-parallel" viewBox="0 0 100 100">
            <line x1="10" y1="20" x2="90" y2="20" stroke="#059669" stroke-width="3" />
            <line x1="10" y1="80" x2="90" y2="80" stroke="#059669" stroke-width="3" />
            <path d="M 50 20 L 55 25 M 50 80 L 55 75" stroke="#059669" stroke-width="1" fill="none" />
        </symbol>
        
        <!-- Angles -->
        <symbol id="svg-angle" viewBox="0 0 150 100">
            <line x1="10" y1="90" x2="140" y2="90" stroke="#059669" stroke-width="2" />
            <line x1="10" y1="90" x2="100" y2="10" stroke="#059669" stroke-width="2" />
            <circle cx="10" cy="90" r="3" fill="#059669" /><!-- Vertex -->
            <path d="M 20 90 A 10 10 0 0 1 18 80" stroke="#059669" stroke-width="1" fill="none" />
            <text x="60" y="50" font-size="12" fill="#059669" text-anchor="middle">Angle</text>
            <text x="5" y="95" font-size="12" fill="#059669">Vertex</text>
        </symbol>
        <symbol id="svg-acute" viewBox="0 0 100 100">
            <line x1="10" y1="90" x2="90" y2="90" stroke="#059669" stroke-width="2" />
            <line x1="10" y1="90" x2="70" y2="30" stroke="#059669" stroke-width="2" />
            <path d="M 20 90 A 10 10 0 0 1 18 82" stroke="#059669" stroke-width="1" fill="none" />
            <text x="30" y="80" font-size="12" fill="#059669" text-anchor="middle">&lt; 90°</text>
        </symbol>
        <symbol id="svg-right" viewBox="0 0 100 100">
            <line x1="10" y1="90" x2="90" y2="90" stroke="#059669" stroke-width="2" />
            <line x1="10" y1="90" x2="10" y2="10" stroke="#059669" stroke-width="2" />
            <rect x="10" y="70" width="20" height="20" stroke="#059669" stroke-width="1" fill="none" />
            <text x="35" y="75" font-size="12" fill="#059669" text-anchor="start">90°</text>
        </symbol>
        <symbol id="svg-obtuse" viewBox="0 0 100 100">
            <line x1="10" y1="90" x2="90" y2="90" stroke="#059669" stroke-width="2" />
            <line x1="10" y1="90" x2="25" y2="10" stroke="#059669" stroke-width="2" />
            <path d="M 20 90 A 10 10 0 0 1 15 80" stroke="#059669" stroke-width="1" fill="none" />
            <text x="45" y="80" font-size="12" fill="#059669" text-anchor="middle">90° - 180°</text>
        </symbol>
        <symbol id="svg-straight" viewBox="0 0 200 50">
            <line x1="10" y1="25" x2="190" y2="25" stroke="#059669" stroke-width="3" />
            <circle cx="100" cy="25" r="3" fill="#059669" />
            <path d="M 10 25 A 90 20 0 0 1 190 25" stroke="#059669" stroke-width="1" fill="none" />
            <text x="100" y="20" font-size="12" fill="#059669" text-anchor="middle">180°</text>
        </symbol>
        <symbol id="svg-reflex" viewBox="0 0 150 100">
            <line x1="10" y1="90" x2="140" y2="90" stroke="#059669" stroke-width="2" />
            <line x1="10" y1="90" x2="100" y2="10" stroke="#059669" stroke-width="2" />
            <circle cx="10" cy="90" r="3" fill="#059669" /><!-- Vertex -->
            <path d="M 10 90 A 80 80 0 1 0 140 90" stroke="#059669" stroke-width="1" fill="none" />
            <text x="75" y="45" font-size="12" fill="#059669" text-anchor="middle">Reflex (>180°)</text>
        </symbol>
        <symbol id="svg-complementary" viewBox="0 0 100 100">
            <line x1="10" y1="90" x2="90" y2="90" stroke="#059669" stroke-width="2" />
            <line x1="10" y1="90" x2="10" y2="10" stroke="#059669" stroke-width="2" />
            <line x1="10" y1="90" x2="50" y2="40" stroke="#059669" stroke-width="2" stroke-dasharray="3 3"/>
            <rect x="10" y="70" width="20" height="20" stroke="#059669" stroke-width="1" fill="none" />
            <text x="35" y="80" font-size="12" fill="#059669">Angle A</text>
            <text x="10" y="50" font-size="12" fill="#059669" transform="rotate(-45 35 50)">Angle B</text>
        </symbol>
        <symbol id="svg-supplementary" viewBox="0 0 200 50">
            <line x1="10" y1="25" x2="190" y2="25" stroke="#059669" stroke-width="3" />
            <line x1="100" y1="25" x2="100" y2="5" stroke="#059669" stroke-width="2" stroke-dasharray="3 3"/>
            <text x="55" y="20" font-size="12" fill="#059669" text-anchor="middle">Angle X</text>
            <text x="145" y="20" font-size="12" fill="#059669" text-anchor="middle">Angle Y</text>
            <circle cx="100" cy="25" r="3" fill="#059669" />
        </symbol>
        
        <!-- Polygons -->
        <symbol id="svg-polygon" viewBox="0 0 150 150">
            <polygon points="75,10 140,50 110,140 40,140 10,50" stroke="#059669" stroke-width="3" fill="#ecfdf5" />
            <text x="75" y="75" font-size="14" fill="#059669" text-anchor="middle">Polygon</text>
        </symbol>
        <symbol id="svg-triangle" viewBox="0 0 100 100"><polygon points="50,10 90,90 10,90" stroke="#059669" stroke-width="3" fill="#ecfdf5" /></symbol>
        <symbol id="svg-quadrilateral" viewBox="0 0 100 100"><polygon points="20,10 80,10 90,80 10,80" stroke="#059669" stroke-width="3" fill="#ecfdf5" /></symbol>
        <symbol id="svg-hexagon" viewBox="0 0 100 100"><polygon points="50,10 90,30 90,70 50,90 10,70 10,30" stroke="#059669" stroke-width="3" fill="#ecfdf5" /></symbol>
        <symbol id="svg-octagon" viewBox="0 0 100 100"><polygon points="30,10 70,10 90,30 90,70 70,90 30,90 10,70 10,30" stroke="#059669" stroke-width="3" fill="#ecfdf5" /></symbol>
        <symbol id="svg-decagon" viewBox="0 0 100 100">
            <path d="M 50 10 L 70 15 L 85 30 L 90 50 L 85 70 L 70 85 L 50 90 L 30 85 L 15 70 L 10 50 L 15 30 L 30 15 Z" stroke="#059669" stroke-width="3" fill="#ecfdf5" />
        </symbol>
    </svg>
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
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: The Foundation of Shapes & Figures</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: How Open is It? (Angles)</a>
                        <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Many Angles (Polygons)</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Recognizing Shapes and Measurements Around Me</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Analyzing basic figures, lines, angles, and polygons (Geometry).</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Describe <b>Point, Line, and Plane</b>.</li>
                        <li data-i18n="obj_2">Identify <b>Parallel</b> and <b>Perpendicular Lines</b>.</li>
                        <li data-i18n="obj_3">Measure and classify different types of <b>Angles</b>.</li>
                        <li data-i18n="obj_4">Identify and solve problems about <b>Polygons</b>.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: The Foundation of Shapes & Figures -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: The Foundation of Shapes & Figures</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin1_h3_1">Undefined Terms</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l1"><b>Point</b>: A location in space, without dimension (length or width). Symbolized by a dot (.).</li>
                            </ul>
                            <div class="figure-box inline"><div class="geometric-figure-img"><svg width="50" height="50"><use href="#svg-point"/></svg></div></div>

                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l2"><b>Line</b>: A straight path that is endless in both directions. Two points can form a line. </li>
                                <li data-i18n="aralin1_l3"><b>Plane</b>: A flat surface with no boundaries. Lines and points lie on this (Ex. floor, wall). </li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin1_h3_2">Subsets of a Line</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l4"><b>Line Segment</b>: Part of a line with two endpoints. It does not extend.</li>
                            </ul>
                            <div class="figure-box inline"><div class="geometric-figure-img"><svg width="150" height="20" viewBox="0 0 100 10"><use href="#svg-line-segment"/></svg></div></div>

                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l5"><b>Ray</b>: Part of a line with one endpoint and extends in only one direction (half-line). </li>
                            </ul>
                            <div class="figure-box inline"><div class="geometric-figure-img"><svg width="150" height="20" viewBox="0 0 100 10"><use href="#svg-ray"/></svg></div></div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin1_h3_3">Intersection and Lines</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l6">The intersection of two lines is a <b>Point</b>.</li>
                                <li data-i18n="aralin1_l7">The intersection of two planes is a <b>Line</b> (Ex. corner of a wall and floor).</li>
                                <li data-i18n="aralin1_l8"><b>Perpendicular Lines ( &perp; )</b>: Intersect at a <b>Right Angle</b> (90&deg;).</li>
                            </ul>
                            <div class="figure-box inline"><div class="geometric-figure-img"><svg width="100" height="100"><use href="#svg-perpendicular"/></svg></div></div>

                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_l9"><b>Parallel Lines ( || )</b>: Never intersect, even if extended.</li>
                            </ul>
                            <div class="figure-box inline"><div class="geometric-figure-img"><svg width="150" height="70" viewBox="0 0 100 100"><use href="#svg-parallel"/></svg></div></div>
                        </div>
                    </details>

                    <!-- ARALIN 2: How Open is It? (Angles) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: How Open is It? (Angles)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">An <b>Angle</b> is formed by two rays meeting at a <b>Vertex</b>. The unit of measure is <b>Degrees (&deg;)</b>. A <b>Protractor</b> is used to measure or draw an angle.</p>
                            <div class="figure-box"><div class="geometric-figure-img"><svg width="250" height="150" viewBox="0 0 150 100"><use href="#svg-angle"/></svg></div></div>

                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin2_h3_1">Types of Angles (By Measure)</h3>
                            <div class="overflow-x-auto my-4">
                                <!-- Table text size is now 20px via .table-custom CSS -->
                                <table class="table-custom w-full">
                                    <thead>
                                        <tr class="bg-green-200">
                                            <th data-i18n="aralin2_table_h1">Name</th>
                                            <th data-i18n="aralin2_table_h2">Measure (m)</th>
                                            <th data-i18n="aralin2_table_h3">Characteristic</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin2_table_r1"><td><b>Acute Angle</b></td><td>m < 90&deg;</td><td>Small opening. <div class="figure-box inline"><svg width="80" height="80" viewBox="0 0 100 100"><use href="#svg-acute"/></svg></div></td></tr>
                                        <tr data-i18n="aralin2_table_r2"><td><b>Right Angle</b></td><td>m = 90&deg;</td><td>Perpendicular lines. (Symbolized by a small square). <div class="figure-box inline"><svg width="80" height="80" viewBox="0 0 100 100"><use href="#svg-right"/></svg></div></td></tr>
                                        <tr data-i18n="aralin2_table_r3"><td><b>Obtuse Angle</b></td><td>90&deg; < m < 180&deg;</td><td>Large, but not straight. <div class="figure-box inline"><svg width="80" height="80" viewBox="0 0 100 100"><use href="#svg-obtuse"/></svg></div></td></tr>
                                        <tr data-i18n="aralin2_table_r4"><td><b>Straight Angle</b></td><td>m = 180&deg;</td><td>A straight line. <div class="figure-box inline"><svg width="150" height="30" viewBox="0 0 200 50"><use href="#svg-straight"/></svg></div></td></tr>
                                        <tr data-i18n="aralin2_table_r5"><td><b>Reflex Angle</b></td><td>180&deg; < m < 360&deg;</td><td>The larger opening around the vertex. <div class="figure-box inline"><svg width="150" height="80" viewBox="0 0 150 100"><use href="#svg-reflex"/></svg></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin2_h3_2">Related Angles</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin2_l6"><b>Complementary Angles</b>: Two angles whose sum is <b>90&deg;</b>.</li>
                            </ul>
                            <div class="figure-box"><div class="geometric-figure-img"><svg width="120" height="100" viewBox="0 0 100 100"><use href="#svg-complementary"/></svg></div></div>

                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin2_l7"><b>Supplementary Angles</b>: Two angles whose sum is <b>180&deg;</b>.</li>
                            </ul>
                            <div class="figure-box"><div class="geometric-figure-img"><svg width="200" height="40" viewBox="0 0 200 50"><use href="#svg-supplementary"/></svg></div></div>
                        </div>
                    </details>

                    <!-- ARALIN 3: Many Angles (Polygons) -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Lesson 3: Many Angles (Polygons)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">A <b>Polygon</b> is a closed plane figure made up of straight line segments (sides) meeting at <b>Vertices</b> (corners).</p>
                            <div class="figure-box"><div class="geometric-figure-img"><svg width="200" height="150" viewBox="0 0 150 150"><use href="#svg-polygon"/></svg></div></div>

                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin3_h3_1">Classification of Polygons (By Sides)</h3>
                            <div class="overflow-x-auto my-4">
                                <!-- Table text size is now 20px via .table-custom CSS -->
                                <table class="table-custom w-full">
                                    <thead>
                                        <tr class="bg-green-200">
                                            <th data-i18n="aralin3_table_h1">Sides (n)</th>
                                            <th data-i18n="aralin3_table_h2">Name</th>
                                            <th data-i18n="aralin3_table_h3">Example</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-i18n="aralin3_table_r1"><td>3</td><td><b>Triangle</b></td><td><div class="figure-box inline"><svg width="80" height="80" viewBox="0 0 100 100"><use href="#svg-triangle"/></svg></div></td></tr>
                                        <tr data-i18n="aralin3_table_r2"><td>4</td><td><b>Quadrilateral</b></td><td>(Square, Rectangle) <div class="figure-box inline"><svg width="80" height="80" viewBox="0 0 100 100"><use href="#svg-quadrilateral"/></svg></div></td></tr>
                                        <tr data-i18n="aralin3_table_r3"><td>5</td><td><b>Pentagon</b></td><td></td></tr>
                                        <tr data-i18n="aralin3_table_r4"><td>6</td><td><b>Hexagon</b></td><td><div class="figure-box inline"><svg width="80" height="80" viewBox="0 0 100 100"><use href="#svg-hexagon"/></svg></div></td></tr>
                                        <tr data-i18n="aralin3_table_r5"><td>8</td><td><b>Octagon</b></td><td>(Stop Sign) <div class="figure-box inline"><svg width="80" height="80" viewBox="0 0 100 100"><use href="#svg-octagon"/></svg></div></td></tr>
                                        <tr data-i18n="aralin3_table_r6"><td>10</td><td><b>Decagon</b></td><td><div class="figure-box inline"><svg width="80" height="80" viewBox="0 0 100 100"><use href="#svg-decagon"/></svg></div></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <p data-i18n="aralin3_p2">A <b>Regular Polygon</b> has equal side lengths (equilateral) and equal angle measures (equiangular).</p>
                                <br>
                            <h3 class="text-xl font-bold mt-4 mb-2" data-i18n="aralin3_h3_2">Interior Angles (Regular Polygons)</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin3_l1">The <b>Sum</b> of Interior Angles (S) is: <b>S = 180(n - 2)</b>.</li>
                                <li data-i18n="aralin3_l2">The measure of <b>Each Angle</b> (A) is: <b>A = S &divide; n</b>.</li>
                            </ul>

                            <div class="example-box">
                                <p class="font-bold" data-i18n="aralin3_ex1_title">EXAMPLE: Regular Pentagon (n=5)</p>
                                <p data-i18n="aralin3_ex1_l1">S = 180(5 - 2) = 180(3) = <b>540&deg;</b></p>
                                <p data-i18n="aralin3_ex1_l2">A = 540&deg; &divide; 5 = <b>108&deg;</b></p>
                            </div>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Solve the following problems. (Write answers in words for Q1-Q4, numbers only for Q5-Q8).</p>

                    <form id="geometry-quiz-form" class="space-y-6">

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Basic Concepts</p>
                            <div class="space-y-4">
                                <!-- Q1 -->
                                <div class="vertical-stack space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. What type of lines intersect at 90&deg;?</label>
                                    <input type="text" id="qa1" class="quiz-input w-full" data-i18n-placeholder="qa_placeholder_text" placeholder="Answer (English)">
                                </div>
                                <!-- Q2 -->
                                <div class="vertical-stack space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. What is the name of an angle that measures 75&deg;?</label>
                                    <input type="text" id="qa2" class="quiz-input w-full" data-i18n-placeholder="qa_placeholder_text" placeholder="Answer (English)">
                                </div>
                                <!-- Q3 -->
                                <div class="vertical-stack space-y-2">
                                    <label for="qa6" class="font-medium" data-i18n="qa6_label">3. What is the intersection of two Planes?</label>
                                    <input type="text" id="qa6" class="quiz-input w-full" data-i18n-placeholder="qa_placeholder_text" placeholder="Answer (English)">
                                </div>
                                <!-- Q4 -->
                                <div class="vertical-stack space-y-2">
                                    <label for="qa7" class="font-medium" data-i18n="qa7_label">4. What is the subset of a line that has only one endpoint?</label>
                                    <input type="text" id="qa7" class="quiz-input w-full" data-i18n-placeholder="qa_placeholder_text" placeholder="Answer (English)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Angle and Polygon Calculations</p>
                            <div class="space-y-4">
                                <div class="vertical-stack space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">5. What is the supplement of 110&deg;?</label>
                                    <input type="number" id="qa3" class="quiz-input w-full" data-i18n-placeholder="qa_placeholder_number" placeholder="Answer (degrees)">
                                </div>
                                <div class="vertical-stack space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">6. What is the sum of the interior angles of a Quadrilateral?</label>
                                    <input type="number" id="qa4" class="quiz-input w-full" data-i18n-placeholder="qa_placeholder_number" placeholder="Answer (degrees)">
                                </div>
                                <div class="vertical-stack space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">7. The side length of a Regular Pentagon is (2x+6) and (3x-3). Find the length of the side (units).</label>
                                    <input type="number" id="qa5" class="quiz-input w-full" data-i18n-placeholder="qa_placeholder_number" placeholder="Answer (units)">
                                </div>
                                <div class="vertical-stack space-y-2">
                                    <label for="qa8" class="font-medium" data-i18n="qa8_label">8. What is the measure of Each Interior Angle of a Regular Octagon (8 sides)?</label>
                                    <input type="number" id="qa8" class="quiz-input w-full" data-i18n-placeholder="qa_placeholder_number" placeholder="Answer (degrees)">
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
                outline_aralin1: "Lesson 1: The Foundation of Shapes & Figures",
                outline_aralin2: "Lesson 2: How Open is It? (Angles)",
                outline_aralin3: "Lesson 3: Many Angles (Polygons)",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Recognizing Shapes and Measurements Around Me",
                h1_subtitle: "Analyzing basic figures, lines, angles, and polygons (Geometry).",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Describe <b>Point, Line, and Plane</b>.",
                obj_2: "Identify <b>Parallel</b> and <b>Perpendicular Lines</b>.",
                obj_3: "Measure and classify different types of <b>Angles</b>.",
                obj_4: "Identify and solve problems about <b>Polygons</b>.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: The Foundation of Shapes & Figures",
                aralin1_h3_1: "Undefined Terms",
                aralin1_l1: "<b>Point</b>: A location in space, without dimension (length or width). Symbolized by a dot (.).",
                aralin1_l2: "<b>Line</b>: A straight path that is endless in both directions. Two points can form a line.",
                aralin1_l3: "<b>Plane</b>: A flat surface with no boundaries. Lines and points lie on this (Ex. floor, wall).",
                aralin1_h3_2: "Subsets of a Line",
                aralin1_l4: "<b>Line Segment</b>: Part of a line with two endpoints. It does not extend.",
                aralin1_l5: "<b>Ray</b>: Part of a line with one endpoint and extends in only one direction (half-line).",
                aralin1_h3_3: "Intersection and Lines",
                aralin1_l6: "The intersection of two lines is a <b>Point</b>.",
                aralin1_l7: "The intersection of two planes is a <b>Line</b> (Ex. corner of a wall and floor).",
                aralin1_l8: "<b>Perpendicular Lines ( &perp; )</b>: Intersect at a <b>Right Angle</b> (90&deg;).",
                aralin1_l9: "<b>Parallel Lines ( || )</b>: Never intersect, even if extended.",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: How Open is It? (Angles)",
                aralin2_p1: "An <b>Angle</b> is formed by two rays meeting at a <b>Vertex</b>. The unit of measure is <b>Degrees (&deg;)</b>. A <b>Protractor</b> is used to measure or draw an angle.",
                aralin2_h3_1: "Types of Angles (By Measure)",
                aralin2_table_h1: "Name",
                aralin2_table_h2: "Measure (m)",
                aralin2_table_h3: "Characteristic",
                aralin2_table_r1: "<td><b>Acute Angle</b></td><td>m < 90&deg;</td><td>Small opening. <div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-acute\"/></svg></div></td>",
                aralin2_table_r2: "<td><b>Right Angle</b></td><td>m = 90&deg;</td><td>Perpendicular lines. (Symbolized by a small square). <div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-right\"/></svg></div></td>",
                aralin2_table_r3: "<td><b>Obtuse Angle</b></td><td>90&deg; < m < 180&deg;</td><td>Large, but not straight. <div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-obtuse\"/></svg></div></td>",
                aralin2_table_r4: "<td><b>Straight Angle</b></td><td>m = 180&deg;</td><td>A straight line. <div class=\"figure-box inline\"><svg width=\"150\" height=\"30\" viewBox=\"0 0 200 50\"><use href=\"#svg-straight\"/></svg></div></td>",
                aralin2_table_r5: "<td><b>Reflex Angle</b></td><td>180&deg; < m < 360&deg;</td><td>The larger opening around the vertex. <div class=\"figure-box inline\"><svg width=\"150\" height=\"80\" viewBox=\"0 0 150 100\"><use href=\"#svg-reflex\"/></svg></div></td>",
                aralin2_h3_2: "Related Angles",
                aralin2_l6: "<b>Complementary Angles</b>: Two angles whose sum is <b>90&deg;</b>.",
                aralin2_l7: "<b>Supplementary Angles</b>: Two angles whose sum is <b>180&deg;</b>.",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Many Angles (Polygons)",
                aralin3_p1: "A <b>Polygon</b> is a closed plane figure made up of straight line segments (sides) meeting at <b>Vertices</b> (corners).",
                aralin3_h3_1: "Classification of Polygons (By Sides)",
                aralin3_table_h1: "Sides (n)",
                aralin3_table_h2: "Name",
                aralin3_table_h3: "Example",
                aralin3_table_r1: "<td>3</td><td><b>Triangle</b></td><td><div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-triangle\"/></svg></div></td>",
                aralin3_table_r2: "<td>4</td><td><b>Quadrilateral</b></td><td>(Square, Rectangle) <div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-quadrilateral\"/></svg></div></td>",
                aralin3_table_r3: "<td>5</td><td><b>Pentagon</b></td><td></td>",
                aralin3_table_r4: "<td>6</td><td><b>Hexagon</b></td><td><div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-hexagon\"/></svg></div></td>",
                aralin3_table_r5: "<td>8</td><td><b>Octagon</b></td><td>(Stop Sign) <div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-octagon\"/></svg></div></td>",
                aralin3_table_r6: "<td>10</td><td><b>Decagon</b></td><td><div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-decagon\"/></svg></div></td>",
                aralin3_p2: "A <b>Regular Polygon</b> has equal side lengths (equilateral) and equal angle measures (equiangular).",
                aralin3_h3_2: "Interior Angles (Regular Polygons)",
                aralin3_l1: "The <b>Sum</b> of Interior Angles (S) is: <b>S = 180(n - 2)</b>.",
                aralin3_l2: "The measure of <b>Each Angle</b> (A) is: <b>A = S &divide; n</b>.",
                aralin3_ex1_title: "EXAMPLE: Regular Pentagon (n=5)",
                aralin3_ex1_l1: "S = 180(5 - 2) = 180(3) = <b>540&deg;</b>",
                aralin3_ex1_l2: "A = 540&deg; &divide; 5 = <b>108&deg;</b>",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Solve the following problems. (Write answers in words for Q1-Q4, numbers only for Q5-Q8).",
                quiz_section1_title: "A. Basic Concepts",
                qa1_label: "1. What type of lines intersect at 90&deg;?",
                qa_placeholder_text: "Answer (English)",
                qa2_label: "2. What is the name of an angle that measures 75&deg;?",
                qa6_label: "3. What is the intersection of two Planes?",
                qa7_label: "4. What is the subset of a line that has only one endpoint?",
                
                quiz_section2_title: "B. Angle and Polygon Calculations",
                qa3_label: "5. What is the supplement of 110&deg;?",
                qa_placeholder_number: "Answer (degrees)",
                qa4_label: "6. What is the sum of the interior angles of a Quadrilateral?",
                qa5_label: "7. The side length of a Regular Pentagon is (2x+6) and (3x-3). Find the length of the side (units).",
                qa8_label: "8. What is the measure of Each Interior Angle of a Regular Octagon (8 sides)?",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Geometry!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review the Polygon formulas and Angle Rules.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the entire module.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Ang Pundasyon ng Hugis at Pigura",
                outline_aralin2: "Aralin 2: Gaano Ito Ka-bukas? (Angles)",
                outline_aralin3: "Aralin 3: Maraming Anggulo (Polygons)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Junior High Learning Module Sheet",
                h1_title: "Pagkilala sa mga Hugis at Sukat sa Aking Paligid",
                h1_subtitle: "Pagsusuri sa mga batayang figure, linya, anggulo, at polygons (Geometry).",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ilarawan ang <b>Point, Line, at Plane</b>.",
                obj_2: "Kilalanin ang <b>Parallel</b> at <b>Perpendicular Lines</b>.",
                obj_3: "Sukatin at uriin ang iba't ibang uri ng <b>Angles</b>.",
                obj_4: "Kilalanin at lutasin ang mga problema tungkol sa <b>Polygons</b>.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Ang Pundasyon ng Hugis at Pigura",
                aralin1_h3_1: "Di-Natukoy na Termino",
                aralin1_l1: "<b>Point</b>: Isang lokasyon sa espasyo, walang dimensyon (habang o lapad). Sinisimbolo ng tuldok (.).",
                aralin1_l2: "<b>Line</b>: Tuwid na daan na walang katapusan sa magkabilang direksyon. May kakayahan ang dalawang punto na bumuo ng isang linya.",
                aralin1_l3: "<b>Plane</b>: Isang patag na ibabaw na walang hangganan. Dito nakahiga ang mga linya at punto (Hal. sahig, pader).",
                aralin1_h3_2: "Mga Bahagi ng Linya",
                aralin1_l4: "<b>Line Segment</b>: Bahagi ng linya na may dalawang dulo (endpoints). Hindi ito umaabot.",
                aralin1_l5: "<b>Ray</b>: Bahagi ng linya na may isang dulo at umaabot sa isang direksyon lamang (half-line).",
                aralin1_h3_3: "Intersection at Linya",
                aralin1_l6: "Ang intersection ng dalawang linya ay isang <b>Point</b>.",
                aralin1_l7: "Ang intersection ng dalawang plane ay isang <b>Line</b> (Hal. kanto ng pader at sahig).",
                aralin1_l8: "<b>Perpendicular Lines ( &perp; )</b>: Nagtatagpo sa <b>Right Angle</b> (90&deg;).",
                aralin1_l9: "<b>Parallel Lines ( || )</b>: Hindi kailanman magtatagpo, kahit pa pahabain.",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Gaano Ito Ka-bukas? (Angles)",
                aralin2_p1: "Ang <b>Angle</b> ay nabubuo sa pagitan ng dalawang ray na nagtatagpo sa isang <b>Vertex</b>. Ang yunit ng sukat ay <b>Degrees (&deg;)</b>. Ginagamit ang <b>Protractor</b> para sukatin o iguhit ang anggulo.",
                aralin2_h3_1: "Uri ng Angles (Ayon sa Sukat)",
                aralin2_table_h1: "Pangalan",
                aralin2_table_h2: "Sukat (m)",
                aralin2_table_h3: "Katangian",
                aralin2_table_r1: "<td><b>Acute Angle</b></td><td>m < 90&deg;</td><td>Maliit na siwang. <div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-acute\"/></svg></div></td>",
                aralin2_table_r2: "<td><b>Right Angle</b></td><td>m = 90&deg;</td><td>Perpendicular lines. (Sinisimbolo ng maliit na square). <div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-right\"/></svg></div></td>",
                aralin2_table_r3: "<td><b>Obtuse Angle</b></td><td>90&deg; < m < 180&deg;</td><td>Malaki, ngunit hindi tuwid. <div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-obtuse\"/></svg></div></td>",
                aralin2_table_r4: "<td><b>Straight Angle</b></td><td>m = 180&deg;</td><td>Tuwid na linya. <div class=\"figure-box inline\"><svg width=\"150\" height=\"30\" viewBox=\"0 0 200 50\"><use href=\"#svg-straight\"/></svg></div></td>",
                aralin2_table_r5: "<td><b>Reflex Angle</b></td><td>180&deg; < m < 360&deg;</td><td>Ang mas malaking siwang sa paligid ng vertex. <div class=\"figure-box inline\"><svg width=\"150\" height=\"80\" viewBox=\"0 0 150 100\"><use href=\"#svg-reflex\"/></svg></div></td>",
                aralin2_h3_2: "Kaugnay na Angles",
                aralin2_l6: "<b>Complementary Angles</b>: Dalawang anggulo na ang kabuuan ay <b>90&deg;</b>.",
                aralin2_l7: "<b>Supplementary Angles</b>: Dalawang anggulo na ang kabuuan ay <b>180&deg;</b>.",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Maraming Anggulo (Polygons)",
                aralin3_p1: "Ang <b>Polygon</b> ay isang saradong plane figure na binubuo ng mga tuwid na linya (sides) at nagtatagpo sa mga <b>Vertex</b> (corners).",
                aralin3_h3_1: "Pag-uri ng Polygons (Ayon sa Sides)",
                aralin3_table_h1: "Sides (n)",
                aralin3_table_h2: "Pangalan",
                aralin3_table_h3: "Halimbawa",
                aralin3_table_r1: "<td>3</td><td><b>Triangle</b></td><td><div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-triangle\"/></svg></div></td>",
                aralin3_table_r2: "<td>4</td><td><b>Quadrilateral</b></td><td>(Square, Rectangle) <div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-quadrilateral\"/></svg></div></td>",
                aralin3_table_r3: "<td>5</td><td><b>Pentagon</b></td><td></td>",
                aralin3_table_r4: "<td>6</td><td><b>Hexagon</b></td><td><div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-hexagon\"/></svg></div></td>",
                aralin3_table_r5: "<td>8</td><td><b>Octagon</b></td><td>(Stop Sign) <div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-octagon\"/></svg></div></td>",
                aralin3_table_r6: "<td>10</td><td><b>Decagon</b></td><td><div class=\"figure-box inline\"><svg width=\"80\" height=\"80\" viewBox=\"0 0 100 100\"><use href=\"#svg-decagon\"/></svg></div></td>",
                aralin3_p2: "Ang <b>Regular Polygon</b> ay may parehong haba ng sides (equilateral) at parehong sukat ng angles (equiangular).",
                aralin3_h3_2: "Interior Angles (Regular Polygons)",
                aralin3_l1: "Ang <b>Sum</b> ng Interior Angles (S) ay: <b>S = 180(n - 2)</b>.",
                aralin3_l2: "Ang sukat ng <b>Bawat Angle</b> (A) ay: <b>A = S &divide; n</b>.",
                aralin3_ex1_title: "HALIMBAWA: Regular Pentagon (n=5)",
                aralin3_ex1_l1: "S = 180(5 - 2) = 180(3) = <b>540&deg;</b>",
                aralin3_ex1_l2: "A = 540&deg; &divide; 5 = <b>108&deg;</b>",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Lutasin ang mga sumusunod. (Isulat ang sagot nang naka-salita para sa Q1-Q4, numero lamang para sa Q5-Q8).",
                quiz_section1_title: "A. Batayang Konsepto",
                qa1_label: "1. Anong uri ng linya ang nagtatagpo sa 90&deg;?",
                qa_placeholder_text: "Sagot (Tagalog)",
                qa2_label: "2. Ano ang tawag sa anggulo na 75&deg; ang sukat?",
                qa6_label: "3. Ano ang intersection ng dalawang Plane?",
                qa7_label: "4. Ano ang tawag sa bahagi ng linya na may isang dulo lamang?",
                
                quiz_section2_title: "B. Angle at Polygon",
                qa3_label: "5. Ano ang supplement ng 110&deg;?",
                qa_placeholder_number: "Sagot (degrees)",
                qa4_label: "6. Ilang degrees ang sum ng interior angles ng isang Quadrilateral?",
                qa5_label: "7. Ang side length ng isang Regular Pentagon ay (2x+6) at (3x-3). Hanapin ang length ng side (units).",
                qa8_label: "8. Ilang degrees ang sukat ng Bawat Interior Angle ng Regular Octagon (8 sides)?",
                quiz_button: "Tapusin at Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang Geometry!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang mga formula ng Polygon at Angle Rules.`,
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
            // Allow numbers and decimal point, remove everything else
            value = value.trim().replace(/[^0-9.]/g, ''); 
            const parsedValue = parseFloat(value);
            return isNaN(parsedValue) ? 0 : parsedValue;
        }
        
        // Function to clean and normalize text input (for non-numeric answers)
        function normalizeText(input) {
            if (typeof input !== 'string') return '';
            // Lowercase and remove spaces/non-essential punctuation (to check keywords)
            return input.toLowerCase().replace(/[^a-z0-9]/g, '');
        }

        // Function to check answer, handling specific needs (number/text)
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
                // Determine expected keywords based on current language
                let expectedKeywords = [];
                const lang = currentLang;

                if (id === 'qa1') { // Perpendicular Lines
                     expectedKeywords = lang === 'en' ? ['perpendicular'] : ['perpendicular', 'patindig'];
                } else if (id === 'qa2') { // Acute Angle
                    expectedKeywords = lang === 'en' ? ['acute'] : ['acute', 'siwang', 'maliit'];
                } else if (id === 'qa6') { // Intersection of two planes (Line)
                    expectedKeywords = lang === 'en' ? ['line'] : ['line', 'linya'];
                } else if (id === 'qa7') { // Ray (Bahagi ng linya na may isang dulo)
                    expectedKeywords = lang === 'en' ? ['ray', 'halfline'] : ['ray', 'sinag'];
                } else {
                     // Fallback for strict text check
                    expectedKeywords.push(normalizeText(expected));
                }
                
                const normalizedInput = normalizeText(rawValue);
                
                isCorrect = expectedKeywords.some(keyword => normalizedInput.includes(keyword));
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

        // --- QUIZ LOGIC ---
        document.getElementById('geometry-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); 
        });
        
        /**
         * Submits the quiz and calculates the score.
         * @param {boolean} isLanguageToggle - True if called only to refresh results language.
         */
        function submitQuiz(isLanguageToggle = false) {
            let correctCount = 0;
            const totalQuestions = 8; 
            const resultsDiv = document.getElementById('results');
            
            // Expected Answers (Number/Text, using base English/Number for consistency)

            // A. Basic Concepts (4 Questions)
            const ans_a1 = "perpendicular"; // 1. 90 deg lines
            const ans_a2 = "acute";         // 2. 75 deg angle
            const ans_a6 = "line";          // 3. Intersection of two planes
            const ans_a7 = "ray";           // 4. Subset of a line with one endpoint

            // B. Angle at Polygon (4 Questions)
            const ans_a3 = 70;      // 5. Supplement of 110: 180 - 110 = 70
            const ans_a4 = 360;     // 6. Sum of angles of Quadrilateral (n=4): 180 * (4-2) = 360
            // 7. Regular Pentagon sides equal: 2x + 6 = 3x - 3 -> 9 = x. Length = 2(9)+6 = 24
            const ans_a5 = 24; 
            // 8. Interior Angle of Regular Octagon (n=8): 180 * (8-2) / 8 = 1080 / 8 = 135
            const ans_a8 = 135; 
            

            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1', ans_a1, 'text'); 
                correctCount += checkAnswer('qa2', ans_a2, 'text'); 
                correctCount += checkAnswer('qa6', ans_a6, 'text');
                correctCount += checkAnswer('qa7', ans_a7, 'text');

                correctCount += checkAnswer('qa3', ans_a3, 'number');
                correctCount += checkAnswer('qa4', ans_a4, 'number');
                correctCount += checkAnswer('qa5', ans_a5, 'number');
                correctCount += checkAnswer('qa8', ans_a8, 'number');
                
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
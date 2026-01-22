<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mga Heometrikong Hugis</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ADDED weight 900 for font-extrabold to ensure font-bold works correctly, consistent with other module -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        /* Base styles for Green/Emerald Theme */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0fdf4; /* Green 50 */
        }
        .accent-bg { background-color: #10b981; } /* Emerald Green */
        .module-section { 
            transition: all 0.3s ease; 
            border: 1px solid #e5e7eb; /* Light border */
        }
        .module-section:hover { 
            /* Subtle emerald glow effect on hover */
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
        /* Applied bold color and span conversion */
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
        #objectives ul li {
            font-size: 1.25rem; /* 20px for consistency */
        }
        
        /* Quiz Question and Label Text Size to 20px (1.25rem) */
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
        
        /* Quiz Term List Styles */
        .term-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 1rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        .term-list > div {
             font-size: 1.25rem; /* 20px */
             line-height: 1.75;
        }
        
        /* Quiz Option Grid */
        .options-grid {
            display: grid;
            grid-template-columns: 1fr; /* Default to 1 column on mobile */
            gap: 0.5rem 1.5rem; /* Row gap and column gap */
        }
        @media (min-width: 640px) {
            .options-grid {
                grid-template-columns: repeat(2, 1fr); /* 2 columns on sm and up */
            }
        }
        /* Quiz Feedback */
        .radio-choice {
            display: inline-flex;
            align-items: center;
            margin-right: 1.5rem;
            line-height: 1.75;
        }
        .radio-choice input[type="radio"] {
            margin-right: 0.5rem;
            cursor: pointer;
        }
        .radio-choice.correct-border {
            border: 1px solid #10b981 !important;
            background-color: #ecfdf5;
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
        }
        .radio-choice.incorrect-border {
            border: 1px solid #ef4444 !important;
            background-color: #fef2f2;
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
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

                <!-- 1. Go Back to Modules (Bumalik sa Modyul) - MOVED TO FIRST POSITION -->
                <a href="http://localhost/als/front/modules.php" id="back-to-modules" 
                   class="w-full flex items-center text-base text-gray-600 hover:text-green-700 transition duration-150 p-4 rounded-xl bg-white shadow-lg border border-gray-200 hover:bg-gray-50 font-normal">
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
                    <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Lines and Angles</a>
                    <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Plane Shapes</a>
                    <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: 3D Shapes</a>
                    <a href="#pagsasanay" class="outline-link" data-i18n="outline_quiz">Practice</a>
                </div>

                <!-- 3. Language Toggle Button (Translator) - LAST POSITION -->
                <div class="p-4 bg-white rounded-xl shadow-lg border border-green-100 flex justify-between items-center">
                    <!-- STATIC LANGUAGE LABEL (Wika: Tagalog / Language: English) - text-base is 16px, font-normal (unbolded) -->
                    <span id="current-lang-label" class="text-base text-gray-700 font-normal">Language: English</span> 
                    
                    <!-- TOGGLE BUTTON: Emerald Green colors, text-base (16px), unbolded -->
                    <button id="lang-toggle-btn" class="py-1 px-3 rounded-xl bg-[#10b981] text-white hover:bg-[#059669] transition duration-150 text-base font-normal">
                        <span data-i18n="toggle_text">Switch to: Tagalog</span>
                    </button>
                </div>
                
            </div>
            
        </nav>

        <!-- MAIN CONTENT AREA -->
        <main class="lg:col-span-9">
            <div id="main-content-wrapper" class="bg-white p-6 sm:p-10 rounded-2xl shadow-2xl border-t-4 border-l-4 border-green-600">
                
                <!-- Header Section -->
                <header class="text-center mb-10">
                    <span class="text-xs font-semibold uppercase tracking-wider text-green-600 bg-green-100 px-3 py-1 rounded-full">Advance Elementary Learning Module Sheet</span>
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Geometric Shapes</h1>
                    <p class="mt-4 text-gray-600 italic" data-i18n="h1_subtitle">Shapes are part of our daily lives. We will study the different types of lines, angles, and geometric shapes.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Identify the different types of lines;</li>
                        <li data-i18n="obj_2">Explain the concept of <span class="font-bold text-green-700">congruence</span>;</li>
                        <li data-i18n="obj_3">Define <span class="font-bold text-green-700">rays</span>, <span class="font-bold text-green-700">angles</span>, <span class="font-bold text-green-700">plane shapes</span> and <span class="font-bold text-green-700">3D shapes</span>; and</li>
                        <li data-i18n="obj_4">Identify the different types of angles, plane shapes, and 3D shapes.</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">
                    
                    <!-- ARALIN 1: MGA GUHIT AT ANGULO -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin1_title">Lesson 1: Lines and Angles</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin1_p1">A <span class="font-bold text-green-700">line</span> has no definite beginning and end. It can only be measured when its <span class="font-bold text-green-700">endpoints</span> are given. These points are called <span class="font-bold text-green-700">line segments</span>.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_1">Types of Straight Lines</h3><br>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="aralin1_list1"><span class="font-bold text-green-700">Parallel Line:</span> Lines that are on the same plane, are side-by-side, and <span class="font-bold text-green-700">never intersect</span>. </li><br>
                                <li data-i18n="aralin1_list2"><span class="font-bold text-green-700">Intersecting Line:</span> Lines that meet at at least one point. </li><br>
                                <li data-i18n="aralin1_list3"><span class="font-bold text-green-700">Perpendicular Line:</span> Lines that intersect and form a <span class="font-bold text-green-700">right angle</span> (90 degrees). </li><br>
                                <li data-i18n="aralin1_list4"><span class="font-bold text-green-700">Curved Line:</span> Lines that are not straight.</li>
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_2">Congruence</h3>
                            <p data-i18n="aralin1_p2">Congruence refers to the quality of being in agreement. Two <span class="font-bold text-green-700">line segments</span> are congruent if their measurements are the same.</p>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin1_h3_3">Angles and Their Types</h3>
                            <p data-i18n="aralin1_p3">A <span class="font-bold text-green-700">ray</span> is a line with a start but no definite end. An <span class="font-bold text-green-700">angle</span> is the figure formed when two rays or lines meet at a point.</p>
                            
                            <div class="term-list">
                                <div class="p-4 border rounded bg-gray-50" data-i18n="aralin1_term1"><span class="font-bold text-green-700">Acute Angle:</span> Less than 90 degrees. </div>
                                <div class="p-4 border rounded bg-gray-50" data-i18n="aralin1_term2"><span class="font-bold text-green-700">Right Angle:</span> Exactly 90 degrees. </div>
                                <div class="p-4 border rounded bg-gray-50" data-i18n="aralin1_term3"><span class="font-bold text-green-700">Obtuse Angle:</span> More than 90 degrees but less than 180 degrees. </div>
                                <div class="p-4 border rounded bg-gray-50" data-i18n="aralin1_term4"><span class="font-bold text-green-700">Straight Angle:</span> Exactly 180 degrees.</div>
                            </div>
                        </div>
                    </details>

                    <!-- ARALIN 2: HUGIS NA PATAG -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin2_title">Lesson 2: Plane Shapes</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin2_p1">Ang mga <span class="font-bold text-green-700">Hugis na Patag</span> (Plane Shapes) ay mga saradong hugis o pigurang nabubuo ng mga linyang tuwid (tinatawag na <span class="font-bold text-green-700">Poligon</span>), o mga kurba.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_1">Mga Uri ng Poligon (Apat na Panig)</h3><br>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="aralin2_list1"><span class="font-bold text-green-700">Tropezoyd:</span> Has four sides where <span class="font-bold text-green-700">only two sides</span> are parallel. ",
                aralin2_list2: "<span class=\"font-bold text-green-700\">Paralelogram:</span> Kwadrelateral na may <span class=\"font-bold text-green-700\">dalawang pares</span> na magkasalungat na panig na paralel. ",
                aralin2_list3: "<span class=\"font-bold text-green-700\">Rhombus:</span> Isang paralelogram na may <span class=\"font-bold text-green-700\">apat na gilid na magkakapantay-pantay</span> ang sukat. ",
                aralin2_list4: "<span class=\"font-bold text-green-700\">Parihaba (Rectangle):</span> Isang paralelogram na ang lahat ng anggulo ay <span class=\"font-bold text-green-700\">kwadrado</span> (90 degrees). ",
                aralin2_list5: "<span class=\"font-bold text-green-700\">Parisukat (Square):</span> Isang pararelogram na may <span class=\"font-bold text-green-700\">apat na gilid na magkakapantay-pantay</span> ang sukat at lahat ng anggulo ay kwadrado. ",
                            </ul>
                            <br>
                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin2_h3_2">Iba Pang Hugis na Patag</h3><br>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="aralin2_list6"><span class="font-bold text-green-700">Tatsulok (Triangle):</span> Poligonong may <span class="font-bold text-green-700">tatlong panig</span> at tatlong anggulo. </li><br>
                                <li data-i18n="aralin2_list7"><span class="font-bold text-green-700">Pentagon:</span> Poligonong may <span class="font-bold text-green-700">limang panig</span> at limang anggulo.</li><br>
                                <li data-i18n="aralin2_list8"><span class="font-bold text-green-700">Heksagon:</span> Poligonong may <span class="font-bold text-green-700">anim na panig</span> at anggulo.</li><br>
                                <li data-i18n="aralin2_list9"><span class="font-bold text-green-700">Oktagon (Octagon):</span> Poligonong may <span class="font-bold text-green-700">walong panig</span> at anggulo.</li><br>
                                <li data-i18n="aralin2_list10"><span class="font-bold text-green-700">Bilog (Circle):</span> Saradong hugis na patag na ang bawat punto ay may distansiyang magkakapareho mula sa sentro.</li><br>
                                <li data-i18n="aralin2_list11"><span class="font-bold text-green-700">Biluhaba (Oblong/Ellipse):</span> Hugis na patag na naiiba sa isang bilog sa pamamagitan ng pagpapahaba ng isang dimensiyon.</li>
                            </ul>
                        </div>
                    </details>

                    <!-- ARALIN 3: HUGIS NA MAY PUWANG -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl shadow-md border-b-2 border-green-500">
                            <span data-i18n="aralin3_title">Aralin 3: Hugis na May Puwang (3D Shapes)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <p data-i18n="aralin3_p1">Ang mga <span class="font-bold text-green-700">Hugis na May Puwang</span> o <span class="font-bold text-green-700">pigurang may tatlong dimensiyon</span> ay may lalim bukod sa taas at lapad. Kabilang dito ang kiyub, ispir, silinder, prisma, kono at piramid.</p>

                            <h3 class="text-xl font-bold mt-4 mb-2 text-gray-800" data-i18n="aralin3_h3_1">Mga Uri ng Hugis na May Puwang</h3><br>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li data-i18n="aralin3_list1"><span class="font-bold text-green-700">Kiyub (Cube):</span> May anim na magkakasinglaking panig na kuwadrado. (Halimbawa: Kahon). </li><br>
                                <li data-i18n="aralin3_list2"><span class="font-bold text-green-700">Silinder (Cylinder):</span> May dalawang parelel at magkalapat na <span class="font-bold text-green-700">pabilog na ilalim</span>. (Halimbawa: Pitsel/Baso). </li><br>
                                <li data-i18n="aralin3_list3"><span class="font-bold text-green-700">Ispir (Sphere):</span> Lahat ng punto ay pare-pareho ang distansiya mula sa sentro. (Halimbawa: Bola). </li><br>
                                <li data-i18n="aralin3_list4"><span class="font-bold text-green-700">Kono (Cone):</span> May <span class="font-bold text-green-700">pabilog na ilalim</span> at <span class="font-bold text-green-700">vertex</span> (punto) sa taas kung saan nagsasalikop ang mga panig. (Halimbawa: Apa ng Sorbetes). </li><br>
                                <li data-i18n="aralin3_list5"><span class="font-bold text-green-700">Piramid (Pyramid):</span> May parisukat na ilalim at apat na gilid na hugis tatsulok na nagtatagpo sa isang vertex. (Halimbawa: Piramid ng Ehipto). </li><br>
                                <li data-i18n="aralin3_list6"><span class="font-bold text-green-700">Tetrahedron:</span> May apat na panig kung saan ang bawat mukha ay hugis <span class="font-bold text-green-700">tatsulok</span>. </li><br>
                                <li data-i18n="aralin3_list7"><span class="font-bold text-green-700">Prisma (Prism):</span> May dalawang magkalapat at paralel na ilalim na poligon. (Halimbawa: Prismang Tatsulok). </li>
                            </ul>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <!-- UPDATED: Pagsasanay Title size set to text-4xl and simplified title -->
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Pagsasanay</h2>
                    <p class="text-gray-600 text-center mb-6 text-xl" data-i18n="quiz_subtitle">Subukin ang iyong kaalaman sa mga hugis at konsepto ng heometriya.</p>

                    <form id="geometry-quiz-form" class="space-y-6">

                        <!-- SECTION A: True or False -->
                        <div class="space-y-6 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_a">A. Tama o Mali (Pumili ng T kung Tama at M kung Mali)</p>
                            <div class="space-y-4">
                                <!-- Q1: Ispir walang ilalim. (T) -->
                                <div id="q_qa1">
                                    <label class="block mb-1 font-medium" data-i18n="qa1_label">1. Ang inspir ay walang ilalim.</label>
                                    <div class="flex flex-wrap gap-4">
                                        <label class="radio-choice" for="qa1_t"><input type="radio" id="qa1_t" name="qa1" value="T" data-i18n="label_T">T</label>
                                        <label class="radio-choice" for="qa1_m"><input type="radio" id="qa1_m" name="qa1" value="M" data-i18n="label_M">M</label>
                                    </div>
                                </div>
                                <!-- Q2: Congruent (T) -->
                                <div id="q_qa2">
                                    <label class="block mb-1 font-medium" data-i18n="qa2_label">2. Ang dalawang linya ay magkalapat (congruent) kung pareho ang kanilang sukat.</label>
                                    <div class="flex flex-wrap gap-4">
                                        <label class="radio-choice" for="qa2_t"><input type="radio" id="qa2_t" name="qa2" value="T" data-i18n="label_T">T</label>
                                        <label class="radio-choice" for="qa2_m"><input type="radio" id="qa2_m" name="qa2" value="M" data-i18n="label_M">M</label>
                                    </div>
                                </div>
                                <!-- Q3: Poligon na may 4 na magkakaparehong sukat ng gilid ay parihaba. (M - Dapat Parisukat) -->
                                <div id="q_qa3">
                                    <label class="block mb-1 font-medium" data-i18n="qa3_label">3. Ang poligon na may apat na magkakaparehong sukat ng gilid ay tinatawag na parihaba.</label>
                                    <div class="flex flex-wrap gap-4">
                                        <label class="radio-choice" for="qa3_t"><input type="radio" id="qa3_t" name="qa3" value="T" data-i18n="label_T">T</label>
                                        <label class="radio-choice" for="qa3_m"><input type="radio" id="qa3_m" name="qa3" value="M" data-i18n="label_M">M</label>
                                    </div>
                                </div>
                                <!-- Q4: Lahat ng prisma ay kiyub. (M) -->
                                <div id="q_qa4">
                                    <label class="block mb-1 font-medium" data-i18n="qa4_label">4. Ang lahat ng prisma ay kiyub.</label>
                                    <div class="flex flex-wrap gap-4">
                                        <label class="radio-choice" for="qa4_t"><input type="radio" id="qa4_t" name="qa4" value="T" data-i18n="label_T">T</label>
                                        <label class="radio-choice" for="qa4_m"><input type="radio" id="qa4_m" name="qa4" value="M" data-i18n="label_M">M</label>
                                    </div>
                                </div>
                                <!-- Q5: Linya walang simula at walang katapusan. (T) -->
                                <div id="q_qa5">
                                    <label class="block mb-1 font-medium" data-i18n="qa5_label">5. Ang linya ay walang simula at walang katapusan.</label>
                                    <div class="flex flex-wrap gap-4">
                                        <label class="radio-choice" for="qa5_t"><input type="radio" id="qa5_t" name="qa5" value="T" data-i18n="label_T">T</label>
                                        <label class="radio-choice" for="qa5_m"><input type="radio" id="qa5_m" name="qa5" value="M" data-i18n="label_M">M</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SECTION B: Multiple Choice -->
                        <div class="space-y-6 p-4 border rounded-lg bg-white">
                            <p class="font-semibold text-lg text-gray-800 border-b pb-2" data-i18n="quiz_section_b">B. Multiple Choice (Bilugan ang titik ng tamang sagot)</p>
                            <div class="space-y-4">
                                <!-- Q6: May dalawang pabilog na ilalim. (C - Silinder) -->
                                <div id="q_qb1">
                                    <label class="block mb-1 font-medium" data-i18n="qb1_label">1. Ang ________ ay may dalawang pabilog na ilalim.</label>
                                    <div class="options-grid">
                                        <label class="radio-choice" for="qb1_a"><input type="radio" id="qb1_a" name="qb1" value="a" data-i18n="qb1_a">a. Kono</label>
                                        <label class="radio-choice" for="qb1_b"><input type="radio" id="qb1_b" name="qb1" value="b" data-i18n="qb1_b">b. Bilog</label>
                                        <label class="radio-choice" for="qb1_c"><input type="radio" id="qb1_c" name="qb1" value="c" data-i18n="qb1_c">c. Silinder</label>
                                        <label class="radio-choice" for="qb1_d"><input type="radio" id="qb1_d" name="qb1" value="d" data-i18n="qb1_d">d. Ispir</label>
                                    </div>
                                </div>
                                
                                <!-- Q7: May tatlong gilid at tatlong kanto. (A - Tatsulok) -->
                                <div id="q_qb2">
                                    <label class="block mb-1 font-medium" data-i18n="qb2_label">2. Ang ________ ay may tatlong gilid at tatlong kanto.</label>
                                    <div class="options-grid">
                                        <label class="radio-choice" for="qb2_a"><input type="radio" id="qb2_a" name="qb2" value="a" data-i18n="qb2_a">a. Tatsulok</label>
                                        <label class="radio-choice" for="qb2_b"><input type="radio" id="qb2_b" name="qb2" value="b" data-i18n="qb2_b">b. Parisukat</label>
                                        <label class="radio-choice" for="qb2_c"><input type="radio" id="qb2_c" name="qb2" value="c" data-i18n="qb2_c">c. Parihaba</label>
                                        <label class="radio-choice" for="qb2_d"><input type="radio" id="qb2_d" name="qb2" value="d" data-i18n="qb2_d">d. Tropezoyd</label>
                                    </div>
                                </div>

                                <!-- Q8: Apat na gilid na magkakasukat at apat na sulok. (B - Parisukat) -->
                                <div id="q_qb3">
                                    <label class="block mb-1 font-medium" data-i18n="qb3_label">3. Ang ________ ay may apat na gilid na magkakasukat at apat na sulok.</label>
                                    <div class="options-grid">
                                        <label class="radio-choice" for="qb3_a"><input type="radio" id="qb3_a" name="qb3" value="a" data-i18n="qb3_a">a. Parihaba</label>
                                        <label class="radio-choice" for="qb3_b"><input type="radio" id="qb3_b" name="qb3" value="b" data-i18n="qb3_b">b. Parisukat</label>
                                        <label class="radio-choice" for="qb3_c"><input type="radio" id="qb3_c" name="qb3" value="c" data-i18n="qb3_c">c. Tropezoyd</label>
                                        <label class="radio-choice" for="qb3_d"><input type="radio" id="qb3_d" name="qb3" value="d" data-i18n="qb3_d">d. Rhombus</label>
                                    </div>
                                </div>
                                
                                <!-- Q9: Hugis na may tatlong dimensyon. (C - Hugis na may Puwang) -->
                                <div id="q_qb4">
                                    <label class="block mb-1 font-medium" data-i18n="qb4_label">4. Ang mga hugis na may tatlong dimensyon ay tinatawag na ________.</label>
                                    <div class="options-grid">
                                        <label class="radio-choice" for="qb4_a"><input type="radio" id="qb4_a" name="qb4" value="a" data-i18n="qb4_a">a. Tatsulok</label>
                                        <label class="radio-choice" for="qb4_b"><input type="radio" id="qb4_b" name="qb4" value="b" data-i18n="qb4_b">b. Kono</label>
                                        <label class="radio-choice" for="qb4_c"><input type="radio" id="qb4_c" name="qb4" value="c" data-i18n="qb4_c">c. Hugis na may puwang</label>
                                        <label class="radio-choice" for="qb4_d"><input type="radio" id="qb4_d" name="qb4" value="d" data-i18n="qb4_d">d. Hugis na patag</label>
                                    </div>
                                </div>
                                
                                <!-- Q10: Dalawang bahagi ng linya ay ______ kapag sukat ay magkatulad. (B - Magkalapat) -->
                                <div id="q_qb5">
                                    <label class="block mb-1 font-medium" data-i18n="qb5_label">5. Ang dalawang bahagi ng linya (line segment) ay ________ kapag ang kanilang sukat ay magkatulad.</label>
                                    <div class="options-grid">
                                        <label class="radio-choice" for="qb5_a"><input type="radio" id="qb5_a" name="qb5" value="a" data-i18n="qb5_a">a. Magkatumbas</label>
                                        <label class="radio-choice" for="qb5_b"><input type="radio" id="qb5_b" name="qb5" value="b" data-i18n="qb5_b">b. Magkalapat</label>
                                        <label class="radio-choice" for="qb5_c"><input type="radio" id="qb5_c" name="qb5" value="c" data-i18n="qb5_c">c. Magkatulad</label>
                                        <label class="radio-choice" for="qb5_d"><input type="radio" id="qb5_d" name="qb5" value="d" data-i18n="qb5_d">d. Magkatabi (adjacent)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- UPDATED: Button width and text -->
                        <button type="submit" class="w-[70%] mx-auto block accent-bg text-white py-3 rounded-xl font-bold hover:bg-green-700 transition duration-150 shadow-lg" data-i18n="quiz_button">
                            Tingnan ang Sagot
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
                outline_aralin1: "Lesson 1: Lines and Angles",
                outline_aralin2: "Lesson 2: Plane Shapes",
                outline_aralin3: "Lesson 3: 3D Shapes",
                outline_quiz: "Practice", 
                
                // Main Content Titles
                h1_title: "Geometric Shapes",
                h1_subtitle: "Shapes are part of our daily lives. We will study the different types of lines, angles, and geometric shapes.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives (Capitalized first letter and applied span conversion)
                obj_1: "Identify the different types of lines;",
                obj_2: "Explain the concept of <span class=\"font-bold text-green-700\">congruence</span>;",
                obj_3: "Define <span class=\"font-bold text-green-700\">rays</span>, <span class=\"font-bold text-green-700\">angles</span>, <span class=\"font-bold text-green-700\">plane shapes</span> and <span class=\"font-bold text-green-700\">3D shapes</span>; and",
                obj_4: "Identify the different types of angles, plane shapes, and 3D shapes.",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Lines and Angles",
                aralin1_p1: "A <span class=\"font-bold text-green-700\">line</span> has no definite beginning and end. It can only be measured when its <span class=\"font-bold text-green-700\">endpoints</span> are given. These points are called <span class=\"font-bold text-green-700\">line segments</span>.",
                aralin1_h3_1: "Types of Straight Lines",
                aralin1_list1: "<span class=\"font-bold text-green-700\">Parallel Line:</span> Lines that are on the same plane, are side-by-side, and <span class=\"font-bold text-green-700\">never intersect</span>. ",
                aralin1_list2: "<span class=\"font-bold text-green-700\">Intersecting Line:</span> Lines that meet at at least one point. ",
                aralin1_list3: "<span class=\"font-bold text-green-700\">Perpendicular Line:</span> Lines that intersect and form a <span class=\"font-bold text-green-700\">right angle</span> (90 degrees). ",
                aralin1_list4: "<span class=\"font-bold text-green-700\">Curved Line:</span> Lines that are not straight.",
                aralin1_h3_2: "Congruence",
                aralin1_p2: "Congruence refers to the quality of being in agreement. Two <span class=\"font-bold text-green-700\">line segments</span> are congruent if their measurements are the same.",
                aralin1_h3_3: "Angles and Their Types",
                aralin1_p3: "A <span class=\"font-bold text-green-700\">ray</span> is a line with a start but no definite end. An <span class=\"font-bold text-green-700\">angle</span> is the figure formed when two rays or lines meet at a point.",
                aralin1_term1: "<span class=\"font-bold text-green-700\">Acute Angle:</span> Less than 90 degrees. ",
                aralin1_term2: "<span class=\"font-bold text-green-700\">Right Angle:</span> Exactly 90 degrees. ",
                aralin1_term3: "<span class=\"font-bold text-green-700\">Obtuse Angle:</span> More than 90 degrees but less than 180 degrees. ",
                aralin1_term4: "<span class=\"font-bold text-green-700\">Straight Angle:</span> Exactly 180 degrees.",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Plane Shapes",
                aralin2_p1: "<span class=\"font-bold text-green-700\">Plane Shapes</span> are closed shapes or figures formed by straight lines (called <span class=\"font-bold text-green-700\">Polygons</span>), or curves.",
                aralin2_h3_1: "Types of Polygons (Four Sides)",
                aralin2_list1: "<span class=\"font-bold text-green-700\">Trapezoid:</span> Has four sides where <span class=\"font-bold text-green-700\">only two sides</span> are parallel. ",
                aralin2_list2: "<span class=\"font-bold text-green-700\">Parallelogram:</span> A quadrilateral with <span class=\"font-bold text-green-700\">two pairs</span> of opposite parallel sides. ",
                aralin2_list3: "<span class=\"font-bold text-green-700\">Rhombus:</span> A parallelogram with <span class=\"font-bold text-green-700\">four sides of equal length</span>. ",
                aralin2_list4: "<span class=\"font-bold text-green-700\">Rectangle:</span> A parallelogram where all angles are <span class=\"font-bold text-green-700\">right angles</span> (90 degrees). ",
                aralin2_list5: "<span class=\"font-bold text-green-700\">Square:</span> A parallelogram with <span class=\"font-bold text-green-700\">four sides of equal length</span> and all angles are right angles. ",
                aralin2_h3_2: "Other Plane Shapes",
                aralin2_list6: "<span class=\"font-bold text-green-700\">Triangle:</span> A polygon with <span class=\"font-bold text-green-700\">three sides</span> and three angles. ",
                aralin2_list7: "<span class=\"font-bold text-green-700\">Pentagon:</span> A polygon with <span class=\"font-bold text-green-700\">five sides</span> and five angles.",
                aralin2_list8: "<span class=\"font-bold text-green-700\">Hexagon:</span> A polygon with <span class=\"font-bold text-green-700\">six sides</span> and angles.",
                aralin2_list9: "<span class=\"font-bold text-green-700\">Octagon:</span> A polygon with <span class=\"font-bold text-green-700\">walong panig</span> and angles.",
                aralin2_list10: "<span class=\"font-bold text-green-700\">Circle:</span> A closed plane shape where every point is equidistant from the center.",
                aralin2_list11: "<span class=\"font-bold text-green-700\">Ellipse/Oblong:</span> A plane shape that differs from a circle by being elongated in one dimension.",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: 3D Shapes",
                aralin3_p1: "<span class=\"font-bold text-green-700\">3D Shapes</span> or <span class=\"font-bold text-green-700\">three-dimensional figures</span> have depth in addition to height and width. These include cubes, spheres, cylinders, prisms, cones, and pyramids.",
                aralin3_h3_1: "Types of 3D Shapes",
                aralin3_list1: "<span class=\"font-bold text-green-700\">Cube:</span> Has six equal square sides. (Example: Box). ",
                aralin3_list2: "<span class=\"font-bold text-green-700\">Cylinder:</span> Has two parallel and congruent <span class=\"font-bold text-green-700\">circular bases</span>. (Example: Pitcher/Glass). ",
                aralin3_list3: "<span class=\"font-bold text-green-700\">Sphere:</span> All points are equidistant from the center. (Example: Ball). ",
                aralin3_list4: "<span class=\"font-bold text-green-700\">Cone:</span> Has a <span class=\"font-bold text-green-700\">circular base</span> and a <span class=\"font-bold text-green-700\">vertex</span> (point) at the top where the sides converge. (Example: Ice Cream Cone). ",
                aralin3_list5: "<span class=\"font-bold text-green-700\">Pyramid:</span> Has a square base and four triangular sides that meet at a single vertex. (Example: Egyptian Pyramid). ",
                aralin3_list6: "<span class=\"font-bold text-green-700\">Tetrahedron:</span> Has four faces where every face is a <span class=\"font-bold text-green-700\">triangle</span>. ",
                aralin3_list7: "<span class=\"font-bold text-green-700\">Prism:</span> Has two congruent and parallel polygon bases. (Example: Triangular Prism). ",
                
                // Quiz Labels
                quiz_title: "Practice",
                quiz_subtitle: "Test your knowledge of shapes and geometric concepts.",
                quiz_section_a: "A. True or False (Choose T for True and M for False)",
                label_T: "T",
                label_M: "F",
                qa1_label: "1. A sphere has no base.",
                qa2_label: "2. Two line segments are congruent if their measurements are the same.",
                qa3_label: "3. A polygon with four sides of equal length is called a rectangle.",
                qa4_label: "4. All prisms are cubes.",
                qa5_label: "5. A line has no beginning and no end.",
                quiz_section_b: "B. Multiple Choice (Circle the letter of the correct answer)",
                qb1_label: "1. The ________ has two circular bases.",
                qb1_a: "a. Cone",
                qb1_b: "b. Circle",
                qb1_c: "c. Cylinder",
                qb1_d: "d. Sphere",
                qb2_label: "2. The ________ has three sides and three corners.",
                qb2_a: "a. Triangle",
                qb2_b: "b. Square",
                qb2_c: "c. Rectangle",
                qb2_d: "d. Trapezoid",
                qb3_label: "3. The ________ has four sides of equal length and four corners.",
                qb3_a: "a. Rectangle",
                qb3_b: "b. Square",
                qb3_c: "c. Trapezoid",
                qb3_d: "d. Rhombus",
                qb4_label: "4. Three-dimensional shapes are called ________.",
                qb4_a: "a. Triangle",
                qb4_b: "b. Cone",
                qb4_c: "c. 3D shapes (Solid shapes)",
                qb4_d: "d. Plane shapes (Flat shapes)",
                qb5_label: "5. Two line segments are ________ if their measurements are the same.",
                qb5_a: "a. Equivalent",
                qb5_b: "b. Congruent",
                qb5_c: "c. Similar",
                qb5_d: "d. Adjacent",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Excellent! All your answers are correct (${score}/${total}). You have mastered geometry!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score} out of ${total} (${percentage}%). Just review the lessons for your incorrect answers.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score} out of ${total} (${percentage}%). Read Lessons 1-3 again.`,

            },
            tl: {
                // UI & Navigation
                // UPDATED: Changed the translation text here
                back_to_modules: "Bumalik sa Modyul", 
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Mga Guhit at Anggulo",
                outline_aralin2: "Aralin 2: Hugis na Patag",
                outline_aralin3: "Aralin 3: Hugis na May Puwang",
                outline_quiz: "Pagsasanay",
                
                // Main Content Titles
                h1_title: "Mga Heometrikong Hugis",
                h1_subtitle: "Ang mga hugis ay bahagi ng ating pang-araw-araw na buhay. Pag-aaralan natin ang iba't ibang uri ng linya, anggulo, at heometrikong hugis.",
                section_objectives_title: "Anu-ano ang mga Matututuhan Mo sa Modyul na Ito?",

                // Objectives (Capitalized first letter and applied span conversion)
                obj_1: "Matukoy ang iba't ibang uri ng linya;",
                obj_2: "Maipaliwanag ang konsepto ng <span class=\"font-bold text-green-700\">pagkakalapat (congruence)</span>;",
                obj_3: "Mabigyang-kahulugan ang mga <span class=\"font-bold text-green-700\">rey</span>, <span class=\"font-bold text-green-700\">anggulo</span>, <span class=\"font-bold text-green-700\">hugis na patag</span> at <span class=\"font-bold text-green-700\">hugis na may puwang</span>; at",
                obj_4: "Matukoy ang iba't ibang uri ng anggulo, hugis na patag at hugis na may puwang.",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Mga Guhit at Anggulo",
                aralin1_p1: "Ang <span class=\"font-bold text-green-700\">linya</span> ay walang tiyak na simula at katapusan. Maaari lamang itong sukatin kapag ang <span class=\"font-bold text-green-700\">dulong-punto (endpoints)</span> nito ay ibinigay. Ang mga puntong ito ay tinatawag na <span class=\"font-bold text-green-700\">bahagi ng linya (line segment)</span>.",
                aralin1_h3_1: "Mga Uri ng Tuwid na Linya",
                aralin1_list1: "<span class=\"font-bold text-green-700\">Linyang Paralel:</span> Mga linya na nasa iisang kapatagan na magkatabi at <span class=\"font-bold text-green-700\">hindi kailanman nagsasalubong</span>. ",
                aralin1_list2: "<span class=\"font-bold text-green-700\">Linyang Magkabagtas (Intersecting):</span> Mga linya na nagtatagpo sa kahit na isang punto. ",
                aralin1_list3: "<span class=\"font-bold text-green-700\">Linyang Perpendikular:</span> Mga linya na nagtatagpo at bumubuo ng <span class=\"font-bold text-green-700\">anggulong kwadrado</span> (90 degrees). ",
                aralin1_list4: "<span class=\"font-bold text-green-700\">Linyang Nakakurba:</span> Mga linya na hindi tuwid.",
                aralin1_h3_2: "Pagkakalapat (Congruence)",
                aralin1_p2: "Ang <span class=\"font-bold text-green-700\">pagkakalapat</span> ay tumutukoy sa kalidad ng pagiging magkasang-ayon. Ang dalawang <span class=\"font-bold text-green-700\">bahagi ng linya</span> ay magkalapat kung pareho ang kanilang sukat.",
                aralin1_h3_3: "Anggulo at mga Uri Nito",
                aralin1_p3: "Ang <span class=\"font-bold text-green-700\">rey (ray)</span> ay linya na may simula ngunit walang tiyak na katapusan. Ang <span class=\"font-bold text-green-700\">anggulo</span> ay ang pigurang nabubuo kapag ang dalawang rey o linya ay nagtatagpo sa isang punto.",
                aralin1_term1: "<span class=\"font-bold text-green-700\">Anggulong Akyut:</span> Mas kaunti sa 90 degrees. ",
                aralin1_term2: "<span class=\"font-bold text-green-700\">Anggulong Kwadrado (Right):</span> Eksaktong 90 degrees. ",
                aralin1_term3: "<span class=\"font-bold text-green-700\">Anggulong Bika (Obtuse):</span> Higit sa 90 degrees ngunit mas kaunti sa 180 degrees. ",
                aralin1_term4: "<span class=\"font-bold text-green-700\">Anggulong Tuwid (Straight):</span> Eksaktong 180 degrees.",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Hugis na Patag (Plane Shapes)",
                aralin2_p1: "Ang mga <span class=\"font-bold text-green-700\">Hugis na Patag</span> (Plane Shapes) ay mga saradong hugis o pigurang nabubuo ng mga linyang tuwid (tinatawag na <span class=\"font-bold text-green-700\">Poligon</span>), o mga kurba.",
                aralin2_h3_1: "Mga Uri ng Poligon (Apat na Panig)",
                aralin2_list1: "<span class=\"font-bold text-green-700\">Tropezoyd:</span> May apat na panig na ang <span class=\"font-bold text-green-700\">dalawang panig lamang</span> ang paralel. ",
                aralin2_list2: "<span class=\"font-bold text-green-700\">Paralelogram:</span> Kwadrelateral na may <span class=\"font-bold text-green-700\">dalawang pares</span> na magkasalungat na panig na paralel. ",
                aralin2_list3: "<span class=\"font-bold text-green-700\">Rhombus:</span> Isang paralelogram na may <span class=\"font-bold text-green-700\">apat na gilid na magkakapantay-pantay</span> ang sukat. ",
                aralin2_list4: "<span class=\"font-bold text-green-700\">Parihaba (Rectangle):</span> Isang paralelogram na ang lahat ng anggulo ay <span class=\"font-bold text-green-700\">kwadrado</span> (90 degrees). ",
                aralin2_list5: "<span class=\"font-bold text-green-700\">Parisukat (Square):</span> Isang pararelogram na may <span class=\"font-bold text-green-700\">apat na gilid na magkakapantay-pantay</span> ang sukat at lahat ng anggulo ay kwadrado. ",
                aralin2_h3_2: "Iba Pang Hugis na Patag",
                aralin2_list6: "<span class=\"font-bold text-green-700\">Tatsulok (Triangle):</span> Poligonong may <span class=\"font-bold text-green-700\">tatlong panig</span> at tatlong anggulo. ",
                aralin2_list7: "<span class=\"font-bold text-green-700\">Pentagon:</span> Poligonong may <span class=\"font-bold text-green-700\">limang panig</span> at limang anggulo.",
                aralin2_list8: "<span class=\"font-bold text-green-700\">Heksagon:</span> Poligonong may <span class=\"font-bold text-green-700\">anim na panig</span> at anggulo.",
                aralin2_list9: "<span class=\"font-bold text-green-700\">Oktagon (Octagon):</span> Poligonong may <span class=\"font-bold text-green-700\">walong panig</span> at anggulo.",
                aralin2_list10: "<span class=\"font-bold text-green-700\">Bilog (Circle):</span> Saradong hugis na patag na ang bawat punto ay may distansiyang magkakapareho mula sa sentro.",
                aralin2_list11: "<span class=\"font-bold text-green-700\">Biluhaba (Oblong/Ellipse):</span> Hugis na patag na naiiba sa isang bilog sa pamamagitan ng pagpapahaba ng isang dimensiyon.",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Hugis na May Puwang (3D Shapes)",
                aralin3_p1: "Ang mga <span class=\"font-bold text-green-700\">Hugis na May Puwang</span> o <span class=\"font-bold text-green-700\">pigurang may tatlong dimensiyon</span> ay may lalim bukod sa taas at lapad. Kabilang dito ang kiyub, ispir, silinder, prisma, kono at piramid.",
                aralin3_h3_1: "Mga Uri ng Hugis na May Puwang",
                aralin3_list1: "<span class=\"font-bold text-green-700\">Kiyub (Cube):</span> May anim na magkakasinglaking panig na kuwadrado. (Halimbawa: Kahon). ",
                aralin3_list2: "<span class=\"font-bold text-green-700\">Silinder (Cylinder):</span> May dalawang parelel at magkalapat na <span class=\"font-bold text-green-700\">pabilog na ilalim</span>. (Halimbawa: Pitsel/Baso). ",
                aralin3_list3: "<span class=\"font-bold text-green-700\">Ispir (Sphere):</span> Lahat ng punto ay pare-pareho ang distansiya mula sa sentro. (Halimbawa: Bola). ",
                aralin3_list4: "<span class=\"font-bold text-green-700\">Kono (Cone):</span> May <span class=\"font-bold text-green-700\">pabilog na ilalim</span> at <span class=\"font-bold text-green-700\">vertex</span> (punto) sa taas kung saan nagsasalikop ang mga panig. (Halimbawa: Apa ng Sorbetes). ",
                aralin3_list5: "<span class=\"font-bold text-green-700\">Piramid (Pyramid):</span> May parisukat na ilalim at apat na gilid na hugis tatsulok na nagtatagpo sa isang vertex. (Halimbawa: Piramid ng Ehipto). ",
                aralin3_list6: "<span class=\"font-bold text-green-700\">Tetrahedron:</span> May apat na panig kung saan ang bawat mukha ay hugis <span class=\"font-bold text-green-700\">tatsulok</span>. ",
                aralin3_list7: "<span class=\"font-bold text-green-700\">Prisma (Prism):</span> May dalawang magkalapat at paralel na ilalim na poligon. (Halimbawa: Prismang Tatsulok). ",
                
                // Quiz Labels
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Subukin ang iyong kaalaman sa mga hugis at konsepto ng heometriya.",
                quiz_section_a: "A. Tama o Mali (Pumili ng T kung Tama at M kung Mali)",
                label_T: "T",
                label_M: "M",
                qa1_label: "1. Ang inspir ay walang ilalim.",
                qa2_label: "2. Ang dalawang linya ay magkalapat (congruent) kung pareho ang kanilang sukat.",
                qa3_label: "3. Ang poligon na may apat na magkakaparehong sukat ng gilid ay tinatawag na parihaba.",
                qa4_label: "4. Ang lahat ng prisma ay kiyub.",
                qa5_label: "5. Ang linya ay walang simula at walang katapusan.",
                quiz_section_b: "B. Multiple Choice (Bilugan ang titik ng tamang sagot)",
                qb1_label: "1. Ang ________ ay may dalawang pabilog na ilalim.",
                qb1_a: "a. Kono",
                qb1_b: "b. Bilog",
                qb1_c: "c. Silinder",
                qb1_d: "d. Ispir",
                qb2_label: "2. Ang ________ ay may tatlong gilid at tatlong kanto.",
                qb2_a: "a. Tatsulok",
                qb2_b: "b. Parisukat",
                qb2_c: "c. Parihaba",
                qb2_d: "d. Tropezoyd",
                qb3_label: "3. Ang ________ ay may apat na gilid na magkakasukat at apat na sulok.",
                qb3_a: "a. Parihaba",
                qb3_b: "b. Parisukat",
                qb3_c: "c. Tropezoyd",
                qb3_d: "d. Rhombus",
                qb4_label: "4. Ang mga hugis na may tatlong dimensyon ay tinatawag na ________.",
                qb4_a: "a. Tatsulok",
                qb4_b: "b. Kono",
                qb4_c: "c. Hugis na may puwang",
                qb4_d: "d. Hugis na patag",
                qb5_label: "5. Ang dalawang bahagi ng linya (line segment) ay ________ kapag ang kanilang sukat ay magkatulad.",
                qb5_a: "a. Magkatumbas",
                qb5_b: "b. Magkalapat",
                qb5_c: "c. Magkatulad",
                qb5_d: "d. Magkatabi (adjacent)",
                quiz_button: "Tingnan ang Sagot",

                // Quiz Results
                quiz_result_excellent: (score, total, percentage) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang heometriya!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score} out of ${total} (${percentage}%). Balikan lang ang mga aralin para sa mga mali mong sagot.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score} out of ${total} (${percentage}%). Basahin ulit ang Aralin 1-3.`,
            }
        };

        let currentLang = 'en'; // CHANGED DEFAULT LANGUAGE TO ENGLISH

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
            // FIXED LOGIC: Accessing the toggle text from the opposite language's map
            const oppositeLang = lang === 'tl' ? 'en' : 'tl';
            const toggleKey = lang === 'tl' ? 'toggle_text_en' : 'toggle_text_tl'; 
            
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
        });
        
        // ADD NEW TOGGLE TEXT KEYS TO TRANSLATION OBJECT
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
        
        const outlineElement = document.getElementById('outline');
        const outlineLinks = sections.map(id => outlineElement ? outlineElement.querySelector(`a[href="#${id}"]`) : null).filter(link => link);
        const sectionElements = sections.map(id => document.getElementById(id));

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


        document.getElementById('geometry-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const resultsDiv = document.getElementById('results');
            let correctCount = 0;
            const totalQuestions = 10; // 5 True/False + 5 Multiple Choice

            // Define correct answers. 
            const answers = {
                // SECTION A: True/False (T/M)
                qa1: 'T', // Ispir walang ilalim
                qa2: 'T', // Congruent
                qa3: 'M', // 4 same sides is Rectangle (Mali, dapat Parisukat)
                qa4: 'M', // Lahat ng prisma ay kiyub (Mali)
                qa5: 'T', // Linya walang simula/katapusan
                
                // SECTION B: Multiple Choice (a/b/c/d)
                qb1: 'c', // Dalawang pabilog na ilalim (Silinder)
                qb2: 'a', // Tatlong gilid at kanto (Tatsulok)
                qb3: 'b', // 4 magkakasukat na gilid at 4 sulok (Parisukat)
                qb4: 'c', // Hugis na may tatlong dimensyon (Hugis na may Puwang)
                qb5: 'b', // Magkatulad ang sukat (Magkalapat)
            };
            
            // Helper function to handle radio button inputs (Section A and B)
            function checkRadioInput(name, expected) {
                const checkedRadio = document.querySelector(`input[name="${name}"]:checked`);
                const questionDiv = document.getElementById(`q_${name}`);
                
                // Clear previous styles from all labels/choices in this group
                questionDiv.querySelectorAll('.radio-choice').forEach(label => {
                    label.classList.remove('correct-border', 'incorrect-border');
                });
                
                if (checkedRadio && checkedRadio.value === expected) {
                    correctCount++;
                    
                    // Highlight the correct answer
                    const correctAnswerLabel = questionDiv.querySelector(`input[value="${expected}"]`).parentElement;
                    if (correctAnswerLabel) {
                        correctAnswerLabel.classList.add('correct-border');
                    }

                } else if (checkedRadio) {
                    // Highlight the incorrect user answer in red
                    checkedRadio.parentElement.classList.add('incorrect-border');

                    // Also highlight the correct answer in green for reference
                    const correctAnswerLabel = questionDiv.querySelector(`input[value="${expected}"]`).parentElement;
                    if (correctAnswerLabel) {
                        correctAnswerLabel.classList.add('correct-border');
                    }
                } 
            }
            
            // Run checks for Section A (True/False)
            checkRadioInput('qa1', answers.qa1);
            checkRadioInput('qa2', answers.qa2);
            checkRadioInput('qa3', answers.qa3);
            checkRadioInput('qa4', answers.qa4);
            checkRadioInput('qa5', answers.qa5);

            // Run checks for Section B (Multiple Choice)
            checkRadioInput('qb1', answers.qb1);
            checkRadioInput('qb2', answers.qb2);
            checkRadioInput('qb3', answers.qb3);
            checkRadioInput('qb4', answers.qb4);
            checkRadioInput('qb5', answers.qb5);
            
            // Display results
            const percentage = ((correctCount / totalQuestions) * 100).toFixed(0);
            const overallScore = `${correctCount}/${totalQuestions}`;
            let message = '';
            
            // Determine if the message should be English or Tagalog
            const resultMessage = translations[currentLang];

            // Reset background classes
            resultsDiv.classList.remove('bg-green-600', 'text-white', 'bg-green-100', 'text-green-800', 'bg-yellow-100', 'text-yellow-800');


            if (correctCount === totalQuestions) {
                message = resultMessage.quiz_result_excellent(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-600', 'text-white');
            } else if (correctCount >= totalQuestions * 0.7) {
                message = resultMessage.quiz_result_good(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-green-100', 'text-green-800');
            } else {
                message = resultMessage.quiz_result_fail(correctCount, totalQuestions, percentage);
                resultsDiv.classList.add('bg-yellow-100', 'text-yellow-800');
            }

            resultsDiv.innerHTML = message;
            resultsDiv.classList.remove('hidden');
            resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    </script>
</body>
</html>
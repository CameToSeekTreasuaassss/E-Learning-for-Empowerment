<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Practical Research 1</title>
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
        #research-quiz-form label,
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
                        <h3 class="text-lg font-bold text-green-700" data-i18n="outline_title">Module Outline (M1-M22)</h3>
                    </div>
                    <div class="space-y-2 text-sm">
                        <a href="#objectives" class="outline-link" data-i18n="outline_objectives">Objectives</a>
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Foundations & Qualitative Basics (M1-M7)</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Research Proposal Development (M8-M13)</a>
                        <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Methodology, Data, and Final Output (M14-M22)</a>
                        <a href="#pagsasanay" class="outline-link" data-i18n="outline_quiz">Practice Quiz</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Practical Research 1</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">Qualitative Research: Understanding phenomena through participants' views.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (All content inside is 20px) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <!-- H2 Title is 28px and black -->
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Content paragraph is now 20px -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Explain the <b>Importance of Research</b> (M1) and define its core <b>Characteristics and Ethics</b> (M2).</li>
                        <li data-i18n="obj_2">Differentiate <b>Quantitative and Qualitative Research</b> (M3) and explore <b>Kinds of Research Across Fields</b> (M4).</li>
                        <li data-i18n="obj_3">Describe the characteristics (M5), <b>Strengths and Weaknesses</b> (M6), and <b>Kinds of Qualitative Research</b> (M7).</li>
                        <li data-i18n="obj_4">Formulate a complete research proposal, including the <b>Title, Questions, Scope, and Statement of the Problem</b> (M8, M9, M10, M11).</li>
                        <li data-i18n="obj_5">Apply proper criteria and <b>Ethical Standards</b> in writing and citing <b>Related Literature</b> (M12, M13).</li>
                        <li data-i18n="obj_6">Plan and execute the methodology: **Research Design** (M14), <b>Sampling</b> (M15), <b>Data Collection</b> (M16, M18), and <b>Analysis Procedures</b> (M17, M19).</li>
                        <li data-i18n="obj_7">Finalize the study by making <b>Conclusions and Recommendations</b> (M20) and listing <b>References</b> (M21, M22).</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Foundations & Qualitative Basics (M1 - M7) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin1_title">Lesson 1: Foundations & Qualitative Basics (M1-M7)</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin1_m1_title">M1: The Importance of Research in Daily Life</h3>
                            <p data-i18n="aralin1_m1_p1"><b>Research</b> is defined as a careful, systematic inquiry using scientific methods to describe, explain, predict, and control observed phenomena. Its importance includes leading to great observations, resulting in predictions and theories, developing new understanding, and helping in decision making.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin1_m2_title">M2: Characteristics, Processes, and Ethics of Research</h3>
                            <p data-i18n="aralin1_m2_p1">Research is a scientific investigation of phenomena. Key characteristics include: <b>Empirical</b> (based on facts), <b>Logical</b>, <b>Cyclical</b> (starting over again), <b>Analytical</b>, <b>Critical</b>, <b>Methodical</b>, and <b>Replicability</b> (design and procedures can be repeated).</p>
                            <p data-i18n="aralin1_m2_p2" class="mt-4">Ethical considerations include <b>Objectivity and Integrity</b>, respect for subjects' <b>right to privacy</b>, proper <b>Presentation of Findings</b>, and <b>Acknowledgement of assistance</b>. </p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin1_m3_title">M3: Quantitative and Qualitative Research</h3>
                            <p data-i18n="aralin1_m3_p1">These are the two main types of research:</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_m3_l1"><b>Quantitative Research:</b> Focuses on testing hypotheses, collecting **quantifiable data** (numbers), analyzing using **statistics**, and maintaining an unbiased, objective manner.</li>
                                <li data-i18n="aralin1_m3_l2"><b>Qualitative Research:</b> Relies on participants' views, collects data primarily in **words (text)**, describes and analyzes themes, and uses a subjective approach to understand social interaction.</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin1_m4_title">M4: The Kinds of Research Across Fields</h3>
                            <p data-i18n="aralin1_m4_p1">Research studies occur across all fields (Arts, Science, Business, etc.). Research approaches include:</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_m4_l1"><b>Scientific/Positive Approach:</b> Stresses measurable and observable facts (Quantitative).</li>
                                <li data-i18n="aralin1_m4_l2"><b>Naturalistic Approach:</b> People-oriented, concerned with qualitative data (Qualitative).</li>
                                <li data-i18n="aralin1_m4_l3"><b>Triangulation/Mixed Method:</b> Combination of quantitative and qualitative approaches.</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin1_m5_title">M5: Characteristics of Qualitative Research</h3>
                            <p data-i18n="aralin1_m5_p1">Qualitative research is defined by key characteristics, including **Naturalistic Inquiry** (studying naturally occurring situations), **Inductive Analysis** (discovering themes from data details), **Holistic Perspective**, and utilizing **Qualitative Data** (detailed, thick description, direct quotations).</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin1_m6_title">M6: Strengths and Weaknesses of Qualitative Research</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_m6_l1"><b>Strengths:</b> Issues can be examined in **detail and depth**, interviews are not restricted, and the obtained data based on human experience is powerful.</li>
                                <li data-i18n="aralin1_m6_l2"><b>Weaknesses:</b> Research quality is heavily dependent on the **individual skills of the researcher**, data volume makes analysis time-consuming, and findings can be difficult to characterize visually.</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin1_m7_title">M7: Kinds of Qualitative Research</h3>
                            <p data-i18n="aralin1_m7_p1">The main types of qualitative research designs are:</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_m7_l1"><b>Ethnography:</b> Immersing oneself in the target participants' environment to understand their **goals and culture**.</li>
                                <li data-i18n="aralin1_m7_l2"><b>Phenomenological:</b> Using multiple methods to understand the **meaning participants place on a shared lived experience**.</li>
                                <li data-i18n="aralin1_m7_l3"><b>Grounded Theory:</b> Developing an **explanation or theory** behind events based on data from participants.</li>
                                <li data-i18n="aralin1_m7_l4"><b>Case Study:</b> A deep understanding through multiple types of data sources focused on a specific case (individual, group, event).</li>
                            </ul>
                        </div>
                    </details>

                    <!-- ARALIN 2: Research Proposal Development (M8 - M13) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin2_title">Lesson 2: Research Proposal Development (M8-M13)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin2_m8_title">M8: Research Title and Justifications</h3>
                            <p data-i18n="aralin2_m8_p1">The **Research Title** should be clear, interesting, concise (10-15 words is preferred), and free of unnecessary jargon. It should highlight the key aspects of the study. **Justifications/Reasons** explain why the research is worthy of conducting (e.g., to improve practice, develop new understanding).</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin2_m9_title">M9: Stating the Research Questions</h3>
                            <p data-i18n="aralin2_m9_p1">A **Research Question** is the core question around which the research centers. It must be <b>Clear</b>, <b>Focused</b> (narrow enough to be answered thoroughly), <b>Concise</b>, <b>Complex</b> (not a yes/no answer), and <b>Arguable</b> (potential answers are open to debate).</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin2_m10_title">M10: Scope, Delimitation, and Beneficiaries</h3>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin2_m10_l1"><b>Scope:</b> Identifies the **boundaries** of the study (subjects, objectives, facilities, area, time frame).</li>
                                <li data-i18n="aralin2_m10_l2"><b>Delimitation:</b> Identifies the **constraints or weaknesses** of the study not within the researcher's control (e.g., limiting to a specific geographic area or age group).</li>
                                <li data-i18n="aralin2_m10_l3"><b>Benefits and Beneficiaries:</b> Citing who will gain from the research findings (e.g., students, teachers, the community).</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin2_m11_title">M11: Statement of the Problem</h3>
                            <p data-i18n="aralin2_m11_p1">The **Problem Statement** formally points out the issue the study wishes to address. It states what is to be investigated, identifies the variables, and discusses their relationships, answering: "Why is the problem worthy of being investigated?" </p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin2_m12_title">M12: Criteria in Selecting, Citing, and Synthesizing Related Literature</h3>
                            <p data-i18n="aralin2_m12_p1">The **Literature Review** identifies, evaluates, and synthesizes relevant literature to show how knowledge has evolved. The steps involve: **Locating** relevant texts, **Reviewing** them critically, and **Writing** a synthesis. Proper **Citing** is mandatory (e.g., APA/MLA style). </p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin2_m13_title">M13: Ethical Standards in Writing Related Literature</h3>
                            <p data-i18n="aralin2_m13_p1">When writing the literature review, ethical standards must be followed. This includes defining a topic/audience, being **critical and consistent** in evaluation, **finding a logical structure**, including your own relevant research objectively, and ensuring the review is **up-to-date** but doesn't neglect older studies.</p>
                        </div>
                    </details>

                    <!-- ARALIN 3: Methodology, Data, and Final Output (M14 - M22) -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin3_title">Lesson 3: Methodology, Data, and Final Output (M14-M22)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin3_m14_title">M14: Appropriate Qualitative Research Design</h3>
                            <p data-i18n="aralin3_m14_p1">Choosing the right design depends on the research focus: **Narrative Research** (exploring the life of an individual), **Phenomenology** (understanding the essence of an experience), **Grounded Theory** (developing a theory), **Ethnography** (describing a culture-sharing group), or **Case Study** (in-depth description of a case/event). </p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin3_m15_title">M15: Sampling Procedure and Sample</h3>
                            <p data-i18n="aralin3_m15_p1">Qualitative research often uses **Non-Probability Sampling**. The common types are:</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin3_m15_l1"><b>Purposeful Sampling:</b> Participants are selected based on **pre-selected criteria** relevant to the research question.</li>
                                <li data-i18n="aralin3_m15_l2"><b>Quota Sampling:</b> Participant quotas are **preset** prior to sampling (e.g., a certain number of males/females).</li>
                                <li data-i18n="aralin3_m15_l3"><b>Snowball Sampling:</b> Participants refer the researcher to others who may be able to contribute (used for hard-to-reach populations).</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin3_m16_title">M16: Data Collection; M18: Collecting Data through Observation and Interviews</h3>
                            <p data-i18n="aralin3_m16_p1">The main methods for collecting qualitative data are **Individual Interviews** (M18), **Focus Groups**, and **Observations** (M18). Observation techniques include written descriptions, video recording, and using artifacts. Interviews can use protocols (like the Sample Interview Protocol shown in LAS 18) to ensure all content questions are addressed.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin3_m17_title">M17: Analysis Procedures; M19: Inferring and Explain Patterns and Themes from Data</h3>
                            <p data-i18n="aralin3_m17_p1">Data analysis involves examining, categorizing, and interpreting evidence. Procedures (M17) include **Content Analysis**, **Narrative Analysis**, **Discourse Analysis**, and **Grounded Theory**. Inferring patterns (M19) involves **Coding and Categorizing** data (preset or emergent) and identifying themes. </p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin3_m20_title">M20: Guidelines in Making Conclusions and Recommendations</h3>
                            <p data-i18n="aralin3_m20_p1">The final chapter should present a **Summary of Findings** (organized around research questions), followed by **Conclusions** (discussing findings in relation to the problem), and **Recommendations** (suggesting courses of action based on conclusions). The number of recommendations is usually aligned with the number of conclusions.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin3_m21_title">M21 & M22: Techniques in Listing References (Print & Electronic)</h3>
                            <p data-i18n="aralin3_m21_p1">The **References** list must follow established styles (e.g., APA or MLA). Guidelines include listing the **Author's Name**, **Title**, **Year of Publication**, and **Source details**. Electronic sources (M22) require additional information like the **URL** and the **date of access**.</p>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6" data-i18n="quiz_subtitle">Test your knowledge on the core concepts of Practical Research 1.</p>

                    <form id="research-quiz-form" class="space-y-6 flex flex-col items-center">

                        <div class="space-y-4 p-4 border rounded-lg bg-white w-full">
                            <p class="font-semibold text-xl text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Foundations and Qualitative Research (M1-M7)</p>
                            <div class="space-y-4">
                                <!-- Q1 (M1) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. Research aims to describe, explain, predict, and control observed phenomena. (M1) True or False?</label>
                                    <input type="text" id="qa1" class="quiz-input w-full" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (True or False)">
                                </div>
                                <!-- Q2 (M3) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. What type of research relies on collecting data consisting primarily of words (text) and themes (M3)?</label>
                                    <input type="text" id="qa2" class="quiz-input w-full" data-i18n-placeholder="qa2_placeholder" placeholder="Answer">
                                </div>
                                <!-- Q3 (M2) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. What research characteristic means the study procedure can be repeated by others (M2)?</label>
                                    <input type="text" id="qa3" class="quiz-input w-full" data-i18n-placeholder="qa3_placeholder" placeholder="Answer">
                                </div>
                                <!-- Q4 (M7) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. Which qualitative design studies a culture-sharing group by immersing in their environment (M7)?</label>
                                    <input type="text" id="qa4" class="quiz-input w-full" data-i18n-placeholder="qa4_placeholder" placeholder="Answer">
                                </div>
                                <!-- Q5 (M6) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">5. True or False: A weakness of qualitative research is that rigor is easier to maintain and assess (M6).</label>
                                    <input type="text" id="qa5" class="quiz-input w-full" data-i18n-placeholder="qa5_placeholder" placeholder="Answer (True or False)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white w-full">
                            <p class="font-semibold text-xl text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Proposal and Methodology (M8-M22)</p>
                            <div class="space-y-4">
                                <!-- Q6 (M11) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa6" class="font-medium" data-i18n="qa6_label">6. What formally points out the issue a study addresses and identifies variables (M11)?</label>
                                    <input type="text" id="qa6" class="quiz-input w-full" data-i18n-placeholder="qa6_placeholder" placeholder="Answer (Three Words)">
                                </div>
                                <!-- Q7 (M15) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa7" class="font-medium" data-i18n="qa7_label">7. Which non-probability sampling method selects participants based on pre-selected criteria (M15)?</label>
                                    <input type="text" id="qa7" class="quiz-input w-full" data-i18n-placeholder="qa7_placeholder" placeholder="Answer (Two Words)">
                                </div>
                                <!-- Q8 (M10) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa8" class="font-medium" data-i18n="qa8_label">8. What identifies the boundaries of the study (subjects, objectives, time frame) (M10)?</label>
                                    <input type="text" id="qa8" class="quiz-input w-full" data-i18n-placeholder="qa8_placeholder" placeholder="Answer">
                                </div>
                                <!-- Q9 (M17) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa9" class="font-medium" data-i18n="qa9_label">9. What data analysis method attempts to develop causal explanations from one or more cases being studied (M17)?</label>
                                    <input type="text" id="qa9" class="quiz-input w-full" data-i18n-placeholder="qa9_placeholder" placeholder="Answer (Two Words)">
                                </div>
                                <!-- Q10 (M20) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa10" class="font-medium" data-i18n="qa10_label">10. True or False: Conclusions should be discussed in relation to your research problem and questions (M20).</label>
                                    <input type="text" id="qa10" class="quiz-input w-full" data-i18n-placeholder="qa10_placeholder" placeholder="Answer (True or False)">
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
                outline_title: "Module Outline (M1-M22)",
                outline_objectives: "Objectives",
                outline_aralin1: "Lesson 1: Foundations & Qualitative Basics (M1-M7)",
                outline_aralin2: "Lesson 2: Research Proposal Development (M8-M13)",
                outline_aralin3: "Lesson 3: Methodology, Data, and Final Output (M14-M22)",
                outline_quiz: "Practice Quiz", 
                
                // Main Content Titles
                meta_text: "Senior High Learning Module Sheet",
                h1_title: "Practical Research 1",
                h1_subtitle: "Qualitative Research: Understanding phenomena through participants' views.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Explain the <b>Importance of Research</b> (M1) and define its core <b>Characteristics and Ethics</b> (M2).",
                obj_2: "Differentiate <b>Quantitative and Qualitative Research</b> (M3) and explore <b>Kinds of Research Across Fields</b> (M4).",
                obj_3: "Describe the characteristics (M5), <b>Strengths and Weaknesses</b> (M6), and <b>Kinds of Qualitative Research</b> (M7).",
                obj_4: "Formulate a complete research proposal, including the <b>Title, Questions, Scope, and Statement of the Problem</b> (M8, M9, M10, M11).",
                obj_5: "Apply proper criteria and <b>Ethical Standards</b> in writing and citing <b>Related Literature</b> (M12, M13).",
                obj_6: "Plan and execute the methodology: <b>Research Design</b> (M14), <b>Sampling</b> (M15), <b>Data Collection</b> (M16, M18), and <b>Analysis Procedures</b> (M17, M19).",
                obj_7: "Finalize the study by making <b>Conclusions and Recommendations</b> (M20) and listing <b>References</b> (M21, M22).",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Foundations & Qualitative Basics (M1-M7)",
                aralin1_m1_title: "M1: The Importance of Research in Daily Life",
                aralin1_m1_p1: "<b>Research</b> is defined as a careful, systematic inquiry using scientific methods to describe, explain, predict, and control observed phenomena. Its importance includes leading to great observations, resulting in predictions and theories, developing new understanding, and helping in decision making.",
                
                aralin1_m2_title: "M2: Characteristics, Processes, and Ethics of Research",
                aralin1_m2_p1: "Research is a scientific investigation of phenomena. Key characteristics include: <b>Empirical</b> (based on facts), <b>Logical</b>, <b>Cyclical</b> (starting over again), <b>Analytical</b>, <b>Critical</b>, <b>Methodical</b>, and <b>Replicability</b> (design and procedures can be repeated).",
                aralin1_m2_p2: "Ethical considerations include <b>Objectivity and Integrity</b>, respect for subjects' <b>right to privacy</b>, proper <b>Presentation of Findings</b>, and <b>Acknowledgement of assistance</b>.",

                aralin1_m3_title: "M3: Quantitative and Qualitative Research",
                aralin1_m3_p1: "These are the two main types of research:",
                aralin1_m3_l1: "<b>Quantitative Research:</b> Focuses on testing hypotheses, collecting <b>quantifiable data</b> (numbers), analyzing using <b>statistics</b>, and maintaining an unbiased, objective manner.",
                aralin1_m3_l2: "<b>Qualitative Research:</b> Relies on participants' views, collects data primarily in <b>words (text)</b>, describes and analyzes themes, and uses a subjective approach to understand social interaction.",

                aralin1_m4_title: "M4: The Kinds of Research Across Fields",
                aralin1_m4_p1: "Research studies occur across all fields (Arts, Science, Business, etc.). Research approaches include:",
                aralin1_m4_l1: "<b>Scientific/Positive Approach:</b> Stresses measurable and observable facts (Quantitative).",
                aralin1_m4_l2: "<b>Naturalistic Approach:</b> People-oriented, concerned with qualitative data (Qualitative).",
                aralin1_m4_l3: "<b>Triangulation/Mixed Method:</b> Combination of quantitative and qualitative approaches.",
                
                aralin1_m5_title: "M5: Characteristics of Qualitative Research",
                aralin1_m5_p1: "Qualitative research is defined by key characteristics, including <b>Naturalistic Inquiry</b> (studying naturally occurring situations), <b>Inductive Analysis</b> (discovering themes from data details), <b>Holistic Perspective</b>, and utilizing <b>Qualitative Data</b> (detailed, thick description, direct quotations).",

                aralin1_m6_title: "M6: Strengths and Weaknesses of Qualitative Research",
                aralin1_m6_l1: "<b>Strengths:</b> Issues can be examined in <b>detail and depth</b>, interviews are not restricted, and the obtained data based on human experience is powerful.",
                aralin1_m6_l2: "<b>Weaknesses:</b> Research quality is heavily dependent on the <b>individual skills of the researcher</b>, data volume makes analysis time-consuming, and findings can be difficult to characterize visually.",

                aralin1_m7_title: "M7: Kinds of Qualitative Research",
                aralin1_m7_p1: "The main types of qualitative research designs are:",
                aralin1_m7_l1: "<b>Ethnography:</b> Immersing oneself in the target participants' environment to understand their <b>goals and culture</b>.",
                aralin1_m7_l2: "<b>Phenomenological:</b> Using multiple methods to understand the <b>meaning participants place on a shared lived experience</b>.",
                aralin1_m7_l3: "<b>Grounded Theory:</b> Developing an <b>explanation or theory</b> behind events based on data from participants.",
                aralin1_m7_l4: "<b>Case Study:</b> A deep understanding through multiple types of data sources focused on a specific case (individual, group, event).",

                // Lesson 2 Content
                aralin2_title: "Lesson 2: Research Proposal Development (M8-M13)",
                aralin2_m8_title: "M8: Research Title and Justifications",
                aralin2_m8_p1: "The <b>Research Title</b> should be clear, interesting, concise (10-15 words is preferred), and free of unnecessary jargon. It should highlight the key aspects of the study. <b>Justifications/Reasons</b> explain why the research is worthy of conducting (e.g., to improve practice, develop new understanding).",
                
                aralin2_m9_title: "M9: Stating the Research Questions",
                aralin2_m9_p1: "A <b>Research Question</b> is the core question around which the research centers. It must be <b>Clear</b>, <b>Focused</b> (narrow enough to be answered thoroughly), <b>Concise</b>, <b>Complex</b> (not a yes/no answer), and <b>Arguable</b> (potential answers are open to debate).",
                
                aralin2_m10_title: "M10: Scope, Delimitation, and Beneficiaries",
                aralin2_m10_l1: "<b>Scope:</b> Identifies the <b>boundaries</b> of the study (subjects, objectives, facilities, area, time frame).",
                aralin2_m10_l2: "<b>Delimitation:</b> Identifies the <b>constraints or weaknesses</b> of the study not within the researcher's control (e.g., limiting to a specific geographic area or age group).",
                aralin2_m10_l3: "<b>Benefits and Beneficiaries:</b> Citing who will gain from the research findings (e.g., students, teachers, the community).",
                
                aralin2_m11_title: "M11: Statement of the Problem",
                aralin2_m11_p1: "The <b>Problem Statement</b> formally points out the issue the study wishes to address. It states what is to be investigated, identifies the variables, and discusses their relationships, answering: \"Why is the problem worthy of being investigated?\"",

                aralin2_m12_title: "M12: Criteria in Selecting, Citing, and Synthesizing Related Literature",
                aralin2_m12_p1: "The <b>Literature Review</b> identifies, evaluates, and synthesizes relevant literature to show how knowledge has evolved. The steps involve: <b>Locating</b> relevant texts, <b>Reviewing</b> them critically, and <b>Writing</b> a synthesis. Proper <b>Citing</b> is mandatory (e.g., APA/MLA style).",

                aralin2_m13_title: "M13: Ethical Standards in Writing Related Literature",
                aralin2_m13_p1: "When writing the literature review, ethical standards must be followed. This includes defining a topic/audience, being <b>critical and consistent</b> in evaluation, <b>finding a logical structure</b>, including your own relevant research objectively, and ensuring the review is <b>up-to-date</b> but doesn't neglect older studies.",

                // Lesson 3 Content
                aralin3_title: "Lesson 3: Methodology, Data, and Final Output (M14-M22)",
                aralin3_m14_title: "M14: Appropriate Qualitative Research Design",
                aralin3_m14_p1: "Choosing the right design depends on the research focus: <b>Narrative Research</b> (exploring the life of an individual), <b>Phenomenology</b> (understanding the essence of an experience), <b>Grounded Theory</b> (developing a theory), <b>Ethnography</b> (describing a culture-sharing group), or <b>Case Study</b> (in-depth description of a case/event).",
                
                aralin3_m15_title: "M15: Sampling Procedure and Sample",
                aralin3_m15_p1: "Qualitative research often uses <b>Non-Probability Sampling</b>. The common types are:",
                aralin3_m15_l1: "<b>Purposeful Sampling:</b> Participants are selected based on <b>pre-selected criteria</b> relevant to the research question.",
                aralin3_m15_l2: "<b>Quota Sampling:</b> Participant quotas are <b>preset</b> prior to sampling (e.g., a certain number of males/females).",
                aralin3_m15_l3: "<b>Snowball Sampling:</b> Participants refer the researcher to others who may be able to contribute (used for hard-to-reach populations).",

                aralin3_m16_title: "M16: Data Collection; M18: Collecting Data through Observation and Interviews",
                aralin3_m16_p1: "The main methods for collecting qualitative data are <b>Individual Interviews</b> (M18), <b>Focus Groups</b>, and <b>Observations</b> (M18). Observation techniques include written descriptions, video recording, and using artifacts. Interviews can use protocols to ensure all content questions are addressed.",
                
                aralin3_m17_title: "M17: Analysis Procedures; M19: Inferring and Explain Patterns and Themes from Data",
                aralin3_m17_p1: "Data analysis involves examining, categorizing, and interpreting evidence. Procedures (M17) include <b>Content Analysis</b>, <b>Narrative Analysis</b>, <b>Discourse Analysis</b>, and <b>Grounded Theory</b>. Inferring patterns (M19) involves <b>Coding and Categorizing</b> data (preset or emergent) and identifying themes.",
                
                aralin3_m20_title: "M20: Guidelines in Making Conclusions and Recommendations",
                aralin3_m20_p1: "The final chapter should present a <b>Summary of Findings</b>, followed by <b>Conclusions</b> (discussing findings in relation to the problem), and <b>Recommendations</b> (suggesting courses of action based on conclusions). The number of recommendations is usually aligned with the number of conclusions.",
                
                aralin3_m21_title: "M21 & M22: Techniques in Listing References (Print & Electronic)",
                aralin3_m21_p1: "The <b>References</b> list must follow established styles (e.g., APA or MLA). Guidelines include listing the <b>Author's Name</b>, <b>Title</b>, <b>Year of Publication</b>, and <b>Source details</b>. Electronic sources (M22) require additional information like the <b>URL</b> and the <b>date of access</b>.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Test your knowledge on the core concepts of Practical Research 1.",
                quiz_section1_title: "A. Foundations and Qualitative Research (M1-M7)",
                qa1_label: "1. Research aims to describe, explain, predict, and control observed phenomena. (M1) True or False?",
                qa1_placeholder: "Answer (True or False)",
                qa2_label: "2. What type of research relies on collecting data consisting primarily of words (text) and themes (M3)?",
                qa2_placeholder: "Answer",
                qa3_label: "3. What research characteristic means the study procedure can be repeated by others (M2)?",
                qa3_placeholder: "Answer",
                qa4_label: "4. Which qualitative design studies a culture-sharing group by immersing in their environment (M7)?",
                qa4_placeholder: "Answer",
                qa5_label: "5. True or False: A weakness of qualitative research is that rigor is easier to maintain and assess (M6).",
                qa5_placeholder: "Answer (True or False)",
                quiz_section2_title: "B. Proposal and Methodology (M8-M22)",
                qa6_label: "6. What formally points out the issue a study addresses and identifies variables (M11)?",
                qa6_placeholder: "Answer (Three Words)",
                qa7_label: "7. Which non-probability sampling method selects participants based on pre-selected criteria (M15)?",
                qa7_placeholder: "Answer (Two Words)",
                qa8_label: "8. What identifies the boundaries of the study (subjects, objectives, time frame) (M10)?",
                qa8_placeholder: "Answer",
                qa9_label: "9. What data analysis method attempts to develop causal explanations from one or more cases being studied (M17)?",
                qa9_placeholder: "Answer (Two Words)",
                qa10_label: "10. True or False: Conclusions should be discussed in relation to your research problem and questions (M20).",
                qa10_placeholder: "Answer (True or False)",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Practical Research 1 concepts!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review Qualitative Basics and Methodology.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the module.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul (M1-M22)",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Batayan at Qualitative Basics (M1-M7)",
                outline_aralin2: "Aralin 2: Pagbuo ng Research Proposal (M8-M13)",
                outline_aralin3: "Aralin 3: Metodolohiya, Data, at Final Output (M14-M22)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Senior High Learning Module Sheet",
                h1_title: "Practical Research 1",
                h1_subtitle: "Qualitative Research: Pag-unawa sa phenomena sa pananaw ng mga kalahok.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Ipaliwanag ang <b>Kahalagahan ng Research</b> (M1) at tukuyin ang mga pangunahing <b>Katangian at Etika</b> (M2).",
                obj_2: "Iba-iba ang <b>Quantitative at Qualitative Research</b> (M3) at tuklasin ang mga <b>Uri ng Research Across Fields</b> (M4).",
                obj_3: "Ilarawan ang katangian (M5), <b>Kalakasan at Kahinaan</b> (M6), at <b>Uri ng Qualitative Research</b> (M7).",
                obj_4: "Bumuo ng kumpletong research proposal, kasama ang <b>Title, Questions, Scope, at Statement of the Problem</b> (M8, M9, M10, M11).",
                obj_5: "I-apply ang tamang pamantayan at <b>Ethical Standards</b> sa pagsulat at pag-cite ng <b>Related Literature</b> (M12, M13).",
                obj_6: "Planuhin at isagawa ang methodology: <b>Research Design</b> (M14), <b>Sampling</b> (M15), <b>Data Collection</b> (M16, M18), at <b>Analysis Procedures</b> (M17, M19).",
                obj_7: "I-finalize ang pag-aaral sa pamamagitan ng paggawa ng <b>Conclusions at Recommendations</b> (M20) at paglilista ng <b>References</b> (M21, M22).",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Batayan at Qualitative Basics (M1-M7)",
                aralin1_m1_title: "M1: Ang Kahalagahan ng Research sa Pang-araw-araw na Buhay",
                aralin1_m1_p1: "Ang <b>Research</b> ay tinukoy bilang isang maingat, sistematikong pag-aaral gamit ang siyentipikong pamamaraan upang ilarawan, ipaliwanag, hulaan, at kontrolin ang naobserbahang phenomena. Kabilang sa kahalagahan nito ang pagdulot ng magagandang obserbasyon, pagreresulta sa mga hula at teorya, pagbuo ng bagong pag-unawa, at pagtulong sa paggawa ng desisyon.",
                
                aralin1_m2_title: "M2: Katangian, Proseso, at Etika ng Research",
                aralin1_m2_p1: "Ang Research ay isang siyentipikong imbestigasyon ng phenomena. Kabilang sa mga pangunahing katangian ang: <b>Empirical</b> (batay sa katotohanan), <b>Logical</b>, <b>Cyclical</b> (nagsisimula muli), <b>Analytical</b>, <b>Critical</b>, <b>Methodical</b>, at <b>Replicability</b> (maaaring ulitin ang disenyo at pamamaraan).",
                aralin1_m2_p2: "Kabilang sa mga ethical consideration ang <b>Objectivity at Integrity</b>, paggalang sa <b>right to privacy</b> ng mga subject, tamang <b>Presentation of Findings</b>, at <b>Acknowledgement ng assistance</b>.",

                aralin1_m3_title: "M3: Quantitative at Qualitative Research",
                aralin1_m3_p1: "Ito ang dalawang pangunahing uri ng research:",
                aralin1_m3_l1: "<b>Quantitative Research:</b> Nakatuon sa pagsubok ng hypotheses, pagkuha ng <b>quantifiable data</b> (numero), pag-aanalisa gamit ang <b>statistics</b>, at pagpapanatili ng walang kinikilingan, layunin na paraan.",
                aralin1_m3_l2: "<b>Qualitative Research:</b> Nakasalalay sa pananaw ng mga kalahok, nagkokolekta ng data pangunahin sa <b>salita (teksto)</b>, naglalarawan at nag-aanalisa ng mga tema, at gumagamit ng subjective approach upang maunawaan ang social interaction.",

                aralin1_m4_title: "M4: Mga Uri ng Research Across Fields",
                aralin1_m4_p1: "Ang mga pag-aaral ng research ay nangyayari sa lahat ng larangan (Arts, Science, Business, atbp.). Kasama sa mga research approach ang:",
                aralin1_m4_l1: "<b>Scientific/Positive Approach:</b> Nagbibigay-diin sa masusukat at naobserbahang katotohanan (Quantitative).",
                aralin1_m4_l2: "<b>Naturalistic Approach:</b> People-oriented, nababahala sa qualitative data (Qualitative).",
                aralin1_m4_l3: "<b>Triangulation/Mixed Method:</b> Kombinasyon ng quantitative at qualitative na approach.",
                
                aralin1_m5_title: "M5: Katangian ng Qualitative Research",
                aralin1_m5_p1: "Ang qualitative research ay tinutukoy ng mga pangunahing katangian, kabilang ang <b>Naturalistic Inquiry</b> (pag-aaral ng natural na sitwasyon), <b>Inductive Analysis</b> (pagtuklas ng mga tema mula sa data details), <b>Holistic Perspective</b>, at paggamit ng <b>Qualitative Data</b> (detalyado, makapal na paglalarawan, direktang sipi).",

                aralin1_m6_title: "M6: Kalakasan at Kahinaan ng Qualitative Research",
                aralin1_m6_l1: "<b>Kalakasan:</b> Ang mga isyu ay maaaring suriin nang <b>detalyado at malalim</b>, ang mga panayam ay hindi limitado, at ang nakuha na data batay sa karanasan ng tao ay malakas.",
                aralin1_m6_l2: "<b>Kahinaan:</b> Ang kalidad ng research ay lubos na nakasalalay sa <b>indibidwal na kasanayan ng researcher</b>, ang dami ng data ay nagpapahirap sa pag-aanalisa, at ang mga natuklasan ay maaaring mahirap ilarawan nang biswal.",

                aralin1_m7_title: "M7: Uri ng Qualitative Research",
                aralin1_m7_p1: "Ang mga pangunahing uri ng qualitative research design ay:",
                aralin1_m7_l1: "<b>Ethnography:</b> Paglulubog sa sarili sa kapaligiran ng mga target na kalahok upang maunawaan ang kanilang <b>layunin at kultura</b>.",
                aralin1_m7_l2: "<b>Phenomenological:</b> Paggamit ng maraming pamamaraan upang maunawaan ang <b>kahulugan na ibinibigay ng mga kalahok sa isang shared lived experience</b>.",
                aralin1_m7_l3: "<b>Grounded Theory:</b> Pagbuo ng isang <b>paliwanag o teorya</b> sa likod ng mga pangyayari batay sa data mula sa mga kalahok.",
                aralin1_m7_l4: "<b>Case Study:</b> Isang malalim na pag-unawa sa pamamagitan ng maraming uri ng data sources na nakatuon sa isang partikular na kaso (indibidwal, grupo, event).",

                // Lesson 2 Content
                aralin2_title: "Aralin 2: Pagbuo ng Research Proposal (M8-M13)",
                aralin2_m8_title: "M8: Research Title at Justifications",
                aralin2_m8_p1: "Ang <b>Research Title</b> ay dapat na malinaw, kawili-wili, maikli (mas mainam ang 10-15 salita), at walang hindi kinakailangang jargon. Dapat nitong i-highlight ang mga pangunahing aspeto ng pag-aaral. Ang <b>Justifications/Reasons</b> ay nagpapaliwanag kung bakit karapat-dapat isagawa ang research.",
                
                aralin2_m9_title: "M9: Pagsasaad ng Research Questions",
                aralin2_m9_p1: "Ang <b>Research Question</b> ay ang pangunahing tanong sa research. Dapat itong maging <b>Clear</b>, <b>Focused</b> (sapat na makitid upang masagot nang lubusan), <b>Concise</b>, <b>Complex</b> (hindi sagot na oo/hindi), at <b>Arguable</b> (bukas sa debate ang potensyal na sagot).",
                
                aralin2_m10_title: "M10: Scope, Delimitation, at Beneficiaries",
                aralin2_m10_l1: "<b>Scope:</b> Tinutukoy ang mga <b>hangganan</b> ng pag-aaral (subject, layunin, pasilidad, lugar, time frame).",
                aralin2_m10_l2: "<b>Delimitation:</b> Tinutukoy ang mga <b>limitasyon o kahinaan</b> ng pag-aaral na wala sa kontrol ng researcher (hal., paglilimita sa isang partikular na geographic area o age group).",
                aralin2_m10_l3: "<b>Benefits and Beneficiaries:</b> Pagsipi kung sino ang makikinabang sa mga natuklasan ng research.",
                
                aralin2_m11_title: "M11: Statement of the Problem",
                aralin2_m11_p1: "Ang <b>Problem Statement</b> ay pormal na itinuturo ang isyu na nais tugunan ng pag-aaral. Sinasabi nito kung ano ang iimbestigahan, tinutukoy ang mga variable, at tinatalakay ang kanilang relasyon, sinasagot ang: \"Bakit karapat-dapat imbestigahan ang problema?\"",

                aralin2_m12_title: "M12: Pamantayan sa Pagpili, Pag-cite, at Pag-synthesize ng Related Literature",
                aralin2_m12_p1: "Ang <b>Literature Review</b> ay nagpapakilala, nagtatasa, at nag-synthesize ng mga kaugnay na literature upang ipakita kung paano nag-evolve ang kaalaman. Kasama sa mga hakbang ang: <b>Paghanap</b> ng mga kaugnay na teksto, <b>Pagsusuri</b> sa mga ito nang kritikal, at <b>Pagsulat</b> ng synthesis. Mandatory ang tamang <b>Pag-cite</b> (hal., APA/MLA style).",

                aralin2_m13_title: "M13: Ethical Standards sa Pagsulat ng Related Literature",
                aralin2_m13_p1: "Kapag nagsusulat ng literature review, dapat sundin ang ethical standards. Kabilang dito ang pagtukoy ng topic/audience, pagiging <b>critical at consistent</b> sa pagtatasa, <b>paghahanap ng logical na istruktura</b>, at pagsiguro na ang review ay <b>up-to-date</b> ngunit hindi pinapabayaan ang mas lumang pag-aaral.",

                // Lesson 3 Content
                aralin3_title: "Aralin 3: Metodolohiya, Data, at Final Output (M14-M22)",
                aralin3_m14_title: "M14: Naaangkop na Qualitative Research Design",
                aralin3_m14_p1: "Ang pagpili ng tamang disenyo ay nakasalalay sa focus ng research: <b>Narrative Research</b> (pagtuklas ng buhay ng isang indibidwal), <b>Phenomenology</b> (pag-unawa sa esensya ng isang karanasan), <b>Grounded Theory</b> (pagbuo ng teorya), <b>Ethnography</b> (paglalarawan ng isang culture-sharing group), o <b>Case Study</b> (malalim na paglalarawan ng isang kaso/event).",
                
                aralin3_m15_title: "M15: Sampling Procedure at Sample",
                aralin3_m15_p1: "Madalas gumamit ang qualitative research ng <b>Non-Probability Sampling</b>. Ang mga karaniwang uri ay:",
                aralin3_m15_l1: "<b>Purposeful Sampling:</b> Ang mga kalahok ay pinili batay sa <b>pre-selected criteria</b> na nauugnay sa research question.",
                aralin3_m15_l2: "<b>Quota Sampling:</b> Ang quotas ng kalahok ay <b>preset</b> bago ang sampling (hal., isang tiyak na bilang ng lalaki/babae).",
                aralin3_m15_l3: "<b>Snowball Sampling:</b> Ang mga kalahok ay nagre-refer sa researcher sa iba na maaaring makapag-ambag (ginagamit para sa mahirap abutin na populasyon).",

                aralin3_m16_title: "M16: Data Collection; M18: Pagkolekta ng Data sa pamamagitan ng Observation at Interviews",
                aralin3_m16_p1: "Ang mga pangunahing pamamaraan sa pagkolekta ng qualitative data ay <b>Individual Interviews</b> (M18), <b>Focus Groups</b>, at <b>Observations</b> (M18). Kabilang sa mga observation technique ang nakasulat na paglalarawan, video recording, at paggamit ng artifacts. Maaaring gumamit ng protocols ang interviews upang masiguro na natugunan ang lahat ng content questions.",
                
                aralin3_m17_title: "M17: Analysis Procedures; M19: Paghinuha at Pagpapaliwanag ng Patterns at Themes mula sa Data",
                aralin3_m17_p1: "Ang data analysis ay nagsasangkot ng pagsusuri, pagkakategorya, at pagbibigay-kahulugan ng ebidensya. Kabilang sa mga procedure (M17) ang <b>Content Analysis</b>, <b>Narrative Analysis</b>, <b>Discourse Analysis</b>, at <b>Grounded Theory</b>. Ang paghinuha ng patterns (M19) ay nagsasangkot ng <b>Coding at Categorizing</b> ng data at pagtukoy ng mga tema.",
                
                aralin3_m20_title: "M20: Guidelines sa Paggawa ng Conclusions at Recommendations",
                aralin3_m20_p1: "Ang huling kabanata ay dapat magpakita ng <b>Summary of Findings</b>, na sinusundan ng <b>Conclusions</b> (pagtalakay sa mga natuklasan kaugnay ng problema), at <b>Recommendations</b> (pagmumungkahi ng mga kurso ng pagkilos batay sa conclusions). Karaniwan, naka-align ang bilang ng recommendations sa bilang ng conclusions.",
                
                aralin3_m21_title: "M21 & M22: Techniques sa Paglilista ng References (Print & Electronic)",
                aralin3_m21_p1: "Ang listahan ng <b>References</b> ay dapat sumunod sa mga itinatag na estilo (hal., APA o MLA). Kabilang sa mga guidelines ang paglilista ng <b>Author's Name</b>, <b>Title</b>, <b>Year of Publication</b>, at <b>Source details</b>. Ang electronic sources (M22) ay nangangailangan ng karagdagang impormasyon tulad ng <b>URL</b> at ang <b>date of access</b>.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Subukan ang iyong kaalaman sa mga pangunahing konsepto ng Practical Research 1.",
                quiz_section1_title: "A. Batayan at Qualitative Research (M1-M7)",
                qa1_label: "1. Ang research ay naglalayong ilarawan, ipaliwanag, hulaan, at kontrolin ang naobserbahang phenomena. (M1) Tama o Mali?",
                qa1_placeholder: "Sagot (Tama o Mali)",
                qa2_label: "2. Anong uri ng research ang umaasa sa pagkolekta ng data na binubuo pangunahin ng salita (teksto) at tema (M3)?",
                qa2_placeholder: "Sagot",
                qa3_label: "3. Anong katangian ng research ang nangangahulugang maaaring ulitin ng iba ang pag-aaral (M2)?",
                qa3_placeholder: "Sagot",
                qa4_label: "4. Aling qualitative design ang nag-aaral sa isang culture-sharing group sa pamamagitan ng paglulubog sa kanilang kapaligiran (M7)?",
                qa4_placeholder: "Sagot",
                qa5_label: "5. Tama o Mali: Ang isang kahinaan ng qualitative research ay mas madaling mapanatili at masuri ang rigor (M6).",
                qa5_placeholder: "Sagot (Tama o Mali)",
                quiz_section2_title: "B. Proposal at Metodolohiya (M8-M22)",
                qa6_label: "6. Ano ang pormal na tumutukoy sa isyu na tinutugunan ng isang pag-aaral at tumutukoy sa mga variable (M11)?",
                qa6_placeholder: "Sagot (Tatlong Salita)",
                qa7_label: "7. Aling non-probability sampling method ang pumipili ng mga kalahok batay sa pre-selected criteria (M15)?",
                qa7_placeholder: "Sagot (Dalawang Salita)",
                qa8_label: "8. Ano ang tumutukoy sa mga hangganan ng pag-aaral (subject, layunin, time frame) (M10)?",
                qa8_placeholder: "Sagot",
                qa9_label: "9. Anong data analysis method ang nagtatangkang bumuo ng causal explanations mula sa isa o higit pang kaso na pinag-aaralan (M17)?",
                qa9_placeholder: "Sagot (Dalawang Salita)",
                qa10_label: "10. Tama o Mali: Ang conclusions ay dapat talakayin kaugnay ng iyong research problem at questions (M20).",
                qa10_placeholder: "Sagot (Tama o Mali)",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang konsepto ng Practical Research 1!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang Qualitative Basics at Metodolohiya.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang modyul.`,
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
            const totalQuestions = 10; 

            // --- Practical Research 1 Quiz Answers ---
            const answers = {
                qa1: ['true', 'tama'],          // 1. Research aims to describe, explain, predict, and control... (M1)
                qa2: ['qualitativeresearch', 'qualitative', 'research'],// 2. Data primarily in words (M3)
                qa3: ['replicability'],         // 3. Study procedure can be repeated (M2)
                qa4: ['ethnography'],           // 4. Studies culture by immersion (M7)
                qa5: ['false', 'mali'],         // 5. Rigor is easier to maintain... (False, it's harder) (M6)
                qa6: ['statementoftheproblem', 'statement', 'problem'], // 6. Points out the issue and identifies variables (M11)
                qa7: ['purposefulsampling', 'purposeful'], // 7. Selects participants based on pre-selected criteria (M15)
                qa8: ['scope'],                 // 8. Identifies boundaries (M10)
                qa9: ['groundedtheory', 'grounded'], // 9. Develops causal explanations/theory from cases (M17)
                qa10: ['true', 'tama'],         // 10. Conclusions should be discussed in relation to problems/questions (M20)
            };

            if (!isLanguageToggle) {
                // --- Check Answers ---
                correctCount += checkAnswer('qa1', answers.qa1); 
                correctCount += checkAnswer('qa2', answers.qa2); 
                correctCount += checkAnswer('qa3', answers.qa3); 
                correctCount += checkAnswer('qa4', answers.qa4); 
                correctCount += checkAnswer('qa5', answers.qa5); 
                correctCount += checkAnswer('qa6', answers.qa6); 
                correctCount += checkAnswer('qa7', answers.qa7); 
                correctCount += checkAnswer('qa8', answers.qa8); 
                correctCount += checkAnswer('qa9', answers.qa9); 
                correctCount += checkAnswer('qa10', answers.qa10); 
                
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


        document.getElementById('research-quiz-form').addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuiz(false); 
        });
        
        window.onload = () => {
             // Initialize default language (English) and outline highlight on load
             updateLanguage('en');
        };
    </script>
</body>
</html>
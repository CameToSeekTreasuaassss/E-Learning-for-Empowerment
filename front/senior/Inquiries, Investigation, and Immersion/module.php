<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="h1_title">Inquiries, Investigations, and Immersion</title>
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
                        <h3 class="text-lg font-bold text-green-700" data-i18n="outline_title">Module Outline (M1-M19)</h3>
                    </div>
                    <div class="space-y-2 text-sm">
                        <a href="#objectives" class="outline-link" data-i18n="outline_objectives">Objectives</a>
                        <a href="#aralin1" class="outline-link" data-i18n="outline_aralin1">Lesson 1: Pre-Immersion Basics (M1-M8)</a>
                        <a href="#aralin2" class="outline-link" data-i18n="outline_aralin2">Lesson 2: Documents & Readiness (M9-M13)</a>
                        <a href="#aralin3" class="outline-link" data-i18n="outline_aralin3">Lesson 3: Processes & Reflection (M14-M19)</a>
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
                    <h1 class="main-title-h1 font-bold text-gray-900 mt-2" data-i18n="h1_title">Inquiries, Investigations, and Immersion</h1>
                    <p class="mt-4 text-gray-600 italic text-xl" data-i18n="h1_subtitle">A crucial subject for applying competencies in an authentic work environment.</p>
                </header>

                <hr class="mb-8 border-green-200">

                <!-- Initial Learning Objectives (All content inside is 20px) -->
                <div id="objectives" class="mb-10 p-6 bg-green-50 border-l-4 border-green-400 rounded-lg">
                    <!-- H2 Title is 28px and black -->
                    <h2 class="text-2xl font-bold text-gray-900 mb-3" data-i18n="section_objectives_title">What Will You Learn in This Module?</h2>
                    <!-- Content paragraph is now 20px -->
                    <ul class="list-disc list-inside space-y-2 text-gray-700 ml-4">
                        <li data-i18n="obj_1">Understand the <b>Nature and Legal Basis</b> (M1) and the terms of the <b>MOA</b> (M8).</li>
                        <li data-i18n="obj_2">Demonstrate proper behavior through <b>Work Ethics</b> (M2), <b>Teamwork</b> (M6A), <b>Conflict Resolution</b> (M6B), and <b>Rules/Regulations</b> (M7).</li>
                        <li data-i18n="obj_3">Discuss <b>Workplace Safety</b> (M3), <b>Rights & Responsibilities</b> (M4), and <b>Confidentiality</b> (M5).</li>
                        <li data-i18n="obj_4">Acquire job readiness skills: <b>Resume</b> (M9), <b>Application Forms</b> (M10), <b>Credentials</b> (M11), and <b>Interview Skills</b> (M12).</li>
                        <li data-i18n="obj_5">Appreciate the partner institution's structure: <b>Management Processes</b> (M14/16) and <b>Business Processes</b> (M17/18).</li>
                        <li data-i18n="obj_6">Compile the <b>Portfolio</b> (M13/15) and write the final <b>Reflection</b> (M19).</li>
                    </ul>
                </div>

                <!-- Main Content: Collapsible Lessons -->
                <div class="space-y-6">

                    <!-- ARALIN 1: Legal Basis, Ethics, and Rules (M1-M8) -->
                    <details id="aralin1" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden" open>
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin1_title">Lesson 1: Pre-Immersion Basics (M1-M8)</span>
                            <svg class="w-6 h-6 text-green-600 transform rotate-180 transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin1_m1_title">M1: Immersion: Its Nature and Legal Basis</h3>
                            <p data-i18n="aralin1_m1_p1"><b>Immersion</b> is a <b>mandatory</b> Senior High School subject based on <b>DepEd Order No. 30 s. 2017</b>. It involves hands-on experience or work simulation where learners apply competencies relevant to their track. This subject is a fundamental <b>requirement for graduation</b>.</p>
                            <ul class="list-disc list-inside ml-4 space-y-2 mt-4">
                                <li data-i18n="aralin1_m1_l1">The Latin root <i>mergere</i> ("to plunge") emphasizes the <b>absorption</b> into the work situation.</li>
                                <li data-i18n="aralin1_m1_l2">The goal is to become <b>familiar with the workplace</b> and engage in <b>employment simulation</b>.</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin1_m2_title">M2: Work Ethics</h3>
                            <p data-i18n="aralin1_m2_p1"><b>Work Ethic</b> is the belief that work is valuable and morally good. A strong work ethic combines hard work, professionalism, and dependable results, built upon the following characteristics:</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin1_m2_l1"><b>Integrity:</b> Doing the right thing at all times, even when nobody is watching.</li>
                                <li data-i18n="aralin1_m2_l2"><b>Time Management:</b> Being punctual, having a good attendance record, and observing deadlines.</li>
                                <li data-i18n="aralin1_m2_l3"><b>Respect:</b> Showing fair treatment to others and avoiding harmful talks/gossip.</li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin1_m3_title">M3: Safety in the Workplace</h3>
                            <p data-i18n="aralin1_m3_p1"><b>Workplace Safety (M3)</b>, governed by <b>RA 11058</b>, covers policies and procedures ensuring the health of workers. The employer is responsible for providing a <b>safe environment</b> and <b>protective equipment</b> (PPE). The worker is responsible for working safely and avoiding harm to others. [Image of workplace safety warning sign] </p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin1_m4_title">M4: Workplace Rights and Responsibilities</h3>
                            <p data-i18n="aralin1_m4_p1">It is essential to understand the mutual rights and duties between the <b>Employer</b> (responsible for entitlements like minimum wage, safe environment, and freedom from bullying) and the <b>Worker</b> (responsible for knowing their work hours, entitlements, and maintaining safety).</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin1_m5_title">M5: Confidentiality in the Workplace and NDA</h3>
                            <p data-i18n="aralin1_m5_p1"><b>Confidentiality</b> is maintained by not sharing <b>trade secrets</b> or internal company goings-on with competitors or outsiders. This commitment is formalized through a <b>Non-Disclosure Agreement (NDA)</b>, a legal contract protecting proprietary information.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin1_m6_title">M6A & M6B: Teamwork Skills and Conflict Resolution</h3>
                            <p data-i18n="aralin1_m6_p1"><b>Teamwork (M6A)</b> involves combining individual skills to achieve common goals, requiring <b>active listening</b> and <b>shared responsibility</b>. <b>Conflict Resolution (M6B)</b> is the process of settling disagreements. Techniques include <b>Joint Decision-Making</b>, <b>Unilateral Decision-Making</b>, and seeking <b>Third-Party Intervention</b>.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin1_m7_title">M7: Work Immersion Rules and Regulations</h3>
                            <p data-i18n="aralin1_m7_p1">The learner must adhere to all official <b>Work Immersion Rules</b> (guidelines on correct behavior like wearing uniform, punctuality) and <b>Regulations</b> (rules authorized by the government, like mandatory parental consent and required total hours).</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin1_m8_title">M8: Terms and Conditions in the Memorandum of Agreement (MOA)</h3>
                            <p data-i18n="aralin1_m8_p1">The MOA specifies the <b>Joint Responsibilities</b> of the school and partner institution (e.g., forming a joint working group, adhering to child protection laws, developing the Immersion module) to ensure the program's success.</p>
                        </div>
                    </details>

                    <!-- ARALIN 2: Documents and Job Readiness (M9-M13) -->
                    <details id="aralin2" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin2_title">Lesson 2: Documents and Job Readiness (M9-M13)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin2_m9_title">M9: Writing a Resume</h3>
                            <p data-i18n="aralin2_m9_p1">The <b>Resume</b> is a document used to showcase a person's background, skills, education, and relevant achievements to secure placement or employment. It typically follows a clear, basic template focusing on work experience, education, and skills.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin2_m10_title">M10: Application Letter / Application Forms</h3>
                            <p data-i18n="aralin2_m10_p1">The <b>Application Form</b> is a standardized tool used by companies to collect essential information (availability, past history, salary requirements). It must be filled out <b>correctly and completely</b> (except for the signature, if applying digitally).</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin2_m11_title">M11: Credentials: Barangay Clearance, Police Clearance, Medical Certificate</h3>
                            <p data-i18n="aralin2_m11_p1">These are pre-immersion documents required for legal clearance and health certification:</p>
                            <ul class="list-disc list-inside ml-4 space-y-2">
                                <li data-i18n="aralin2_m11_l1"><b>Barangay Clearance:</b> Certifies residency and good standing (requires Cedula).</li>
                                <li data-i18n="aralin2_m11_l2"><b>Police Clearance:</b> Certifies the applicant has no criminal record (requires personal appearance).</li>
                                <li data-i18n="aralin2_m11_l3"><b>Medical Certificate:</b> Confirms the individual is physically and medically fit for the job/immersion. [Image of a medical certificate] </li>
                            </ul>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin2_m12_title">M12: Job Interview Skills Training</h3>
                            <p data-i18n="aralin2_m12_p1">A <b>Job Interview</b> is a formal conversation to assess an applicant's suitability. Key skills to acquire include: <b>Communication</b>, <b>Critical Thinking</b>, <b>Organizational Skills</b>, <b>Interpersonal Skills</b>, and <b>Multi-Tasking Skills</b>.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin2_m13_title">M13: Daily Time Record (DTR)</h3>
                            <p data-i18n="aralin2_m13_p1">The <b>DTR</b> is a core Immersion Proper document used to accurately track the learner's <b>Daily Work Accomplishment</b> and <b>attendance record</b>, verifying the total number of hours completed as required by the curriculum.</p>
                        </div>
                    </details>

                    <!-- ARALIN 3: Company Processes and Portfolio (M14-M19) -->
                    <details id="aralin3" class="module-section rounded-xl border border-gray-200 shadow-md overflow-hidden">
                        <summary class="flex items-center justify-between p-5 bg-green-50 cursor-pointer text-gray-800 font-bold text-xl aralin-summary-border">
                            <span data-i18n="aralin3_title">Lesson 3: Processes and Reflection (M14-M19)</span>
                            <svg class="w-6 h-6 text-green-600 transform transition duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="content-box">
                            <h3 class="text-xl font-bold mb-2" data-i18n="aralin3_m14_title">M14 & M16: Management Processes (Company Profile)</h3>
                            <p data-i18n="aralin3_m14_p1">The <b>Management Process</b> involves profiling the organizational structure of the partner institution. The learner must interview supervisors and describe the company's: <b>Nature of Business</b>, <b>Organizational Structure</b>, <b>Target Clientele</b>, <b>Description of Product/Services</b>, and <b>Company Rules/Regulations</b>.</p>
                            <p data-i18n="aralin3_m14_p2">[Image of management process cycle] Understanding these elements provides a comprehensive appreciation of how the company operates and is managed.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin3_m17_title">M17 & M18: Business Processes (Operational Profile)</h3>
                            <p data-i18n="aralin3_m17_p1">The <b>Business Process</b> focuses on the operational and quality control aspects of the company. The learner must describe procedures related to: <b>Safety</b>, <b>Production</b>, <b>Maintenance</b>, <b>Quality Control</b>, <b>Quality Assurance</b>, <b>Customer Satisfaction</b>, and <b>Housekeeping and Hygiene</b>.</p>
                            <p data-i18n="aralin3_m17_p2">[Image of business process cycle] These processes ensure operational efficiency and the delivery of quality goods or services.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin3_m15_title">M15: Portfolio Content and Packaging</h3>
                            <p data-i18n="aralin3_m15_p1">The <b>Work Immersion Portfolio</b> is the final output containing all documents from the three phases: Pre-Immersion (M1-M12), Immersion Proper (M13/DWAR/Diary), and Post-Immersion (Evaluation, Certificates). <b>Packaging</b> and organization of the portfolio are essential for final submission.</p>
                                <br>
                            <h3 class="text-xl font-bold mt-8 mb-2" data-i18n="aralin3_m19_title">M19: Work Immersion Reflection</h3>
                            <p data-i18n="aralin3_m19_p1">The module concludes with the learner writing a <b>Reflection Paper or Journal</b> on their work immersion experiences. The reflection should focus on the <b>Enhanced Skills</b>, <b>Work Ethics</b>, and <b>Values Learned</b> during the immersion period, demonstrating appreciation and respect for the work environment.</p>
                        </div>
                    </details>
                </div>

                <!-- Quiz Section (Final Assessment) -->
                <section id="pagsasanay" class="mt-12 bg-gray-50 p-6 sm:p-8 rounded-xl border-4 border-green-500 shadow-lg">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4 text-center" data-i18n="quiz_title">Practice</h2>
                    <p class="text-gray-600 text-center mb-6" data-i18n="quiz_subtitle">Test your knowledge on the core concepts of Immersion.</p>

                    <form id="economics-quiz-form" class="space-y-6 flex flex-col items-center">

                        <div class="space-y-4 p-4 border rounded-lg bg-white w-full">
                            <p class="font-semibold text-xl text-gray-800 border-b pb-2" data-i18n="quiz_section1_title">A. Immersion Basics (M1-M7)</p>
                            <div class="space-y-4">
                                <!-- Q1 (M1) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa1" class="font-medium" data-i18n="qa1_label">1. True or False: Immersion is an elective subject for SHS students (M1).</label>
                                    <input type="text" id="qa1" class="quiz-input w-full" data-i18n-placeholder="qa1_placeholder" placeholder="Answer (True or False)">
                                </div>
                                <!-- Q2 (M2) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa2" class="font-medium" data-i18n="qa2_label">2. What belief states that work is valuable as an activity and is morally good (M2)?</label>
                                    <input type="text" id="qa2" class="quiz-input w-full" data-i18n-placeholder="qa2_placeholder" placeholder="Answer">
                                </div>
                                <!-- Q3 (M5) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa3" class="font-medium" data-i18n="qa3_label">3. What legal contract protects confidential and proprietary company information (M5)?</label>
                                    <input type="text" id="qa3" class="quiz-input w-full" data-i18n-placeholder="qa3_placeholder" placeholder="Answer (Acronym or Full Name)">
                                </div>
                                <!-- Q4 (M6B) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa4" class="font-medium" data-i18n="qa4_label">4. What conflict resolution technique involves seeking the help of third groups or organizations (M6B)?</label>
                                    <input type="text" id="qa4" class="quiz-input w-full" data-i18n-placeholder="qa4_placeholder" placeholder="Answer">
                                </div>
                                <!-- Q5 (M4) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa5" class="font-medium" data-i18n="qa5_label">5. True or False: Ensuring workers are free from bullying is a primary responsibility of the worker (M4).</label>
                                    <input type="text" id="qa5" class="quiz-input w-full" data-i18n-placeholder="qa5_placeholder" placeholder="Answer (True or False)">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4 p-4 border rounded-lg bg-white w-full">
                            <p class="font-semibold text-xl text-gray-800 border-b pb-2" data-i18n="quiz_section2_title">B. Documents and Processes (M9-M18)</p>
                            <div class="space-y-4">
                                <!-- Q6 (M12) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa6" class="font-medium" data-i18n="qa6_label">6. What readiness skill involves assessing whether the applicant should be hired (M12)?</label>
                                    <input type="text" id="qa6" class="quiz-input w-full" data-i18n-placeholder="qa6_placeholder" placeholder="Answer (Two Words)">
                                </div>
                                <!-- Q7 (M11) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa7" class="font-medium" data-i18n="qa7_label">7. What document, signed by a doctor, certifies the learner is fit for work (M11)?</label>
                                    <input type="text" id="qa7" class="quiz-input w-full" data-i18n-placeholder="qa7_placeholder" placeholder="Answer">
                                </div>
                                <!-- Q8 (M13) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa8" class="font-medium" data-i18n="qa8_label">8. What document is used to track the learner's attendance and hours during Immersion Proper (M13)?</label>
                                    <input type="text" id="qa8" class="quiz-input w-full" data-i18n-placeholder="qa8_placeholder" placeholder="Answer (Acronym)">
                                </div>
                                <!-- Q9 (M14/M16) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa9" class="font-medium" data-i18n="qa9_label">9. The Nature of Business and Target Clientele are components of which company process (M14/M16)?</label>
                                    <input type="text" id="qa9" class="quiz-input w-full" data-i18n-placeholder="qa9_placeholder" placeholder="Answer">
                                </div>
                                <!-- Q10 (M18) -->
                                <div class="flex flex-col space-y-2">
                                    <label for="qa10" class="font-medium" data-i18n="qa10_label">10. What process covers Quality Control, Production, and Housekeeping (M18)?</label>
                                    <input type="text" id="qa10" class="quiz-input w-full" data-i18n-placeholder="qa10_placeholder" placeholder="Answer">
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
                outline_title: "Module Outline (M1-M19)",
                outline_objectives: "Objectives",
                outline_aralin1: "Lesson 1: Pre-Immersion Basics (M1-M8)",
                outline_aralin2: "Lesson 2: Documents & Readiness (M9-M13)",
                outline_aralin3: "Lesson 3: Processes & Reflection (M14-M19)",
                outline_quiz: "Practice Quiz", 
                
                // Main Content Titles
                meta_text: "Senior High Learning Module Sheet",
                h1_title: "Inquiries, Investigations, and Immersion",
                h1_subtitle: "A crucial subject for applying competencies in an authentic work environment.",
                section_objectives_title: "What Will You Learn in This Module?",
                
                // Objectives
                obj_1: "Understand the <b>Nature and Legal Basis</b> (M1) and the terms of the <b>MOA</b> (M8).",
                obj_2: "Demonstrate proper behavior through <b>Work Ethics</b> (M2), <b>Teamwork</b> (M6A), <b>Conflict Resolution</b> (M6B), and <b>Rules/Regulations</b> (M7).",
                obj_3: "Discuss <b>Workplace Safety</b> (M3), <b>Rights & Responsibilities</b> (M4), and <b>Confidentiality</b> (M5).",
                obj_4: "Acquire job readiness skills: <b>Resume</b> (M9), <b>Application Forms</b> (M10), <b>Credentials</b> (M11), and <b>Interview Skills</b> (M12).",
                obj_5: "Appreciate the partner institution's structure: <b>Management Processes</b> (M14/16) and <b>Business Processes</b> (M17/18).",
                obj_6: "Compile the <b>Portfolio</b> (M13/15) and write the final <b>Reflection</b> (M19).",

                // Lesson 1 Content
                aralin1_title: "Lesson 1: Pre-Immersion Basics (M1-M8)",
                aralin1_m1_title: "M1: Immersion: Its Nature and Legal Basis",
                aralin1_m1_p1: "<b>Immersion</b> is a <b>mandatory</b> Senior High School subject based on <b>DepEd Order No. 30 s. 2017</b>. It involves hands-on experience or work simulation where learners apply competencies relevant to their track. This subject is a fundamental <b>requirement for graduation</b>.",
                aralin1_m1_l1: "The Latin root <i>mergere</i> (\"to plunge\") emphasizes the <b>absorption</b> into the work situation.",
                aralin1_m1_l2: "The goal is to become <b>familiar with the workplace</b> and engage in <b>employment simulation</b>.",
                
                aralin1_m2_title: "M2: Work Ethics",
                aralin1_m2_p1: "<b>Work Ethic</b> is the belief that work is valuable and morally good. A strong work ethic combines hard work, professionalism, and dependable results, built upon the following characteristics:",
                aralin1_m2_l1: "<b>Integrity:</b> Doing the right thing at all times, even when nobody is watching.",
                aralin1_m2_l2: "<b>Time Management:</b> Being punctual, having a good attendance record, and observing deadlines.",
                aralin1_m2_l3: "<b>Respect:</b> Showing fair treatment to others and avoiding harmful talks/gossip.",

                aralin1_m3_title: "M3: Safety in the Workplace",
                aralin1_m3_p1: "<b>Workplace Safety (M3)</b>, governed by <b>RA 11058</b>, covers policies and procedures ensuring the health of workers. The employer is responsible for providing a <b>safe environment</b> and <b>protective equipment</b> (PPE). The worker is responsible for working safely and avoiding harm to others.",

                aralin1_m4_title: "M4: Workplace Rights and Responsibilities",
                aralin1_m4_p1: "It is essential to understand the mutual rights and duties between the <b>Employer</b> (responsible for entitlements like minimum wage, safe environment, and freedom from bullying) and the <b>Worker</b> (responsible for knowing their work hours, entitlements, and maintaining safety).",

                aralin1_m5_title: "M5: Confidentiality in the Workplace and NDA",
                aralin1_m5_p1: "<b>Confidentiality</b> is maintained by not sharing <b>trade secrets</b> or internal company goings-on with competitors or outsiders. This commitment is formalized through a <b>Non-Disclosure Agreement (NDA)</b>, a legal contract protecting proprietary information.",
                
                aralin1_m6_title: "M6A & M6B: Teamwork Skills and Conflict Resolution",
                aralin1_m6_p1: "<b>Teamwork (M6A)</b> involves combining individual skills to achieve common goals, requiring <b>active listening</b> and <b>shared responsibility</b>. <b>Conflict Resolution (M6B)</b> is the process of settling disagreements. Techniques include <b>Joint Decision-Making</b>, <b>Unilateral Decision-Making</b>, and seeking <b>Third-Party Intervention</b>.",

                aralin1_m7_title: "M7: Work Immersion Rules and Regulations",
                aralin1_m7_p1: "The learner must adhere to all official <b>Work Immersion Rules</b> (guidelines on correct behavior like wearing uniform, punctuality) and <b>Regulations</b> (rules authorized by the government, like mandatory parental consent and required total hours).",

                aralin1_m8_title: "M8: Terms and Conditions in the Memorandum of Agreement (MOA)",
                aralin1_m8_p1: "The MOA specifies the <b>Joint Responsibilities</b> of the school and partner institution (e.g., forming a joint working group, adhering to child protection laws, developing the Immersion module) to ensure the program's success.",


                // Lesson 2 Content
                aralin2_title: "Lesson 2: Documents and Job Readiness (M9-M13)",
                aralin2_m9_title: "M9: Writing a Resume",
                aralin2_m9_p1: "The <b>Resume</b> is a document used to showcase a person's background, skills, education, and relevant achievements to secure placement or employment. It typically follows a clear, basic template focusing on work experience, education, and skills.",
                
                aralin2_m10_title: "M10: Application Letter / Application Forms",
                aralin2_m10_p1: "The <b>Application Form</b> is a standardized tool used by companies to collect essential information (availability, past history, salary requirements). It must be filled out <b>correctly and completely</b> (except for the signature, if applying digitally).",
                
                aralin2_m11_title: "M11: Credentials: Barangay Clearance, Police Clearance, Medical Certificate",
                aralin2_m11_p1: "These are pre-immersion documents required for legal clearance and health certification:",
                aralin2_m11_l1: "<b>Barangay Clearance:</b> Certifies residency and good standing (requires Cedula).",
                aralin2_m11_l2: "<b>Police Clearance:</b> Certifies the applicant has no criminal record (requires personal appearance).",
                aralin2_m11_l3: "<b>Medical Certificate:</b> Confirms the individual is physically and medically fit for the job/immersion.",
                
                aralin2_m12_title: "M12: Job Interview Skills Training",
                aralin2_m12_p1: "A <b>Job Interview</b> is a formal conversation to assess an applicant's suitability. Key skills to acquire include: <b>Communication</b>, <b>Critical Thinking</b>, <b>Organizational Skills</b>, <b>Interpersonal Skills</b>, and <b>Multi-Tasking Skills</b>.",
                
                aralin2_m13_title: "M13: Daily Time Record (DTR)",
                aralin2_m13_p1: "The <b>DTR</b> is a core Immersion Proper document used to accurately track the learner's <b>Daily Work Accomplishment</b> and <b>attendance record</b>, verifying the total number of hours completed as required by the curriculum.",


                // Lesson 3 Content
                aralin3_title: "Lesson 3: Processes and Reflection (M14-M19)",
                aralin3_m14_title: "M14 & M16: Management Processes (Company Profile)",
                aralin3_m14_p1: "The <b>Management Process</b> involves profiling the organizational structure of the partner institution. The learner must interview supervisors and describe the company's: <b>Nature of Business</b>, <b>Organizational Structure</b>, <b>Target Clientele</b>, <b>Description of Product/Services</b>, and <b>Company Rules/Regulations</b>.",
                aralin3_m14_p2: "[Image of management process cycle] Understanding these elements provides a comprehensive appreciation of how the company operates and is managed.",
                
                aralin3_m17_title: "M17 & M18: Business Processes (Operational Profile)",
                aralin3_m17_p1: "The <b>Business Process</b> focuses on the operational and quality control aspects of the company. The learner must describe procedures related to: <b>Safety</b>, <b>Production</b>, <b>Maintenance</b>, <b>Quality Control</b>, <b>Quality Assurance</b>, <b>Customer Satisfaction</b>, and <b>Housekeeping and Hygiene</b>.",
                aralin3_m17_p2: "[Image of business process cycle] These processes ensure operational efficiency and the delivery of quality goods or services.",
                
                aralin3_m15_title: "M15: Portfolio Content and Packaging",
                aralin3_m15_p1: "The <b>Work Immersion Portfolio</b> is the final output containing all documents from the three phases: Pre-Immersion (M1-M12), Immersion Proper (M13/DWAR/Diary), and Post-Immersion (Evaluation, Certificates). <b>Packaging</b> and organization of the portfolio are essential for final submission.",

                aralin3_m19_title: "M19: Work Immersion Reflection",
                aralin3_m19_p1: "The module concludes with the learner writing a <b>Reflection Paper or Journal</b> on their work immersion experiences. The reflection should focus on the <b>Enhanced Skills</b>, <b>Work Ethics</b>, and <b>Values Learned</b> during the immersion period, demonstrating appreciation and respect for the work environment.",

                // Quiz Labels and Placeholders
                quiz_title: "Practice",
                quiz_subtitle: "Test your knowledge on the core concepts of Immersion.",
                quiz_section1_title: "A. Immersion Basics (M1-M7)",
                qa1_label: "1. True or False: Immersion is an elective subject for SHS students (M1).",
                qa1_placeholder: "Answer (True or False)",
                qa2_label: "2. What belief states that work is valuable as an activity and is morally good (M2)?",
                qa2_placeholder: "Answer",
                qa3_label: "3. What legal contract protects confidential and proprietary company information (M5)?",
                qa3_placeholder: "Answer (Acronym or Full Name)",
                qa4_label: "4. What conflict resolution technique involves seeking the help of third groups or organizations (M6B)?",
                qa4_placeholder: "Answer",
                qa5_label: "5. True or False: Ensuring workers are free from bullying is a primary responsibility of the worker (M4).",
                qa5_placeholder: "Answer (True or False)",
                quiz_section2_title: "B. Documents and Processes (M9-M18)",
                qa6_label: "6. What readiness skill involves assessing whether the applicant should be hired (M12)?",
                qa6_placeholder: "Answer (Two Words)",
                qa7_label: "7. What document, signed by a doctor, certifies the learner is fit for work (M11)?",
                qa7_placeholder: "Answer",
                qa8_label: "8. What document is used to track the learner's attendance and hours during Immersion Proper (M13)?",
                qa8_placeholder: "Answer (Acronym)",
                qa9_label: "9. The Nature of Business and Target Clientele are components of which company process (M14/M16)?",
                qa9_placeholder: "Answer",
                qa10_label: "10. What process covers Quality Control, Production, and Housekeeping (M18)?",
                qa10_placeholder: "Answer",
                quiz_button: "Check Answers",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Excellent! All your answers are correct (${score}/${total}). You mastered Immersion concepts!`,
                quiz_result_good: (score, total, percentage) => `Well done! You scored ${score}/${total} (${percentage}%). Review Workplace Safety and Rules.`,
                quiz_result_fail: (score, total, percentage) => `You need to study more. You only scored ${score}/${total} (${percentage}%). Reread the entire module.`,
            },
            tl: {
                // UI & Navigation
                back_to_modules: "Bumalik sa Modyul",
                toggle_text_en: "Switch to: English", 
                outline_title: "Balangkas ng Modyul (M1-M19)",
                outline_objectives: "Mga Matututuhan",
                outline_aralin1: "Aralin 1: Pangunahing Kaalaman (M1-M8)",
                outline_aralin2: "Aralin 2: Dokumento at Kahandaan (M9-M13)",
                outline_aralin3: "Aralin 3: Proseso at Refleksyon (M14-M19)",
                outline_quiz: "Pagsasanay", 
                
                // Main Content Titles
                meta_text: "Senior High Learning Module Sheet",
                h1_title: "Inquiries, Investigations, and Immersion",
                h1_subtitle: "Isang mahalagang asignatura para sa pag-apply ng kasanayan sa tunay na lugar ng trabaho.",
                section_objectives_title: "Anu-ano ang Matututuhan Mo sa Modyul na Ito?",
                
                // Objectives
                obj_1: "Maunawaan ang <b>Kalikasan at Legal na Batayan</b> (M1) at ang mga tuntunin ng <b>MOA</b> (M8).",
                obj_2: "Maipakita ang tamang kilos sa pamamagitan ng <b>Work Ethics</b> (M2), <b>Teamwork</b> (M6A), <b>Conflict Resolution</b> (M6B), at <b>Rules/Regulations</b> (M7).",
                obj_3: "Talakayin ang <b>Kaligtasan sa Lugar ng Trabaho</b> (M3), <b>Karapatan at Responsibilidad</b> (M4), at <b>Kompidensyalidad</b> (M5).",
                obj_4: "Makakuha ng mga kasanayan sa paghahanap ng trabaho: <b>Resume</b> (M9), <b>Application Forms</b> (M10), <b>Credentials</b> (M11), at <b>Interview Skills</b> (M12).",
                obj_5: "Ma-apreciate ang istruktura ng partner institution: <b>Management Processes</b> (M14/16) at <b>Business Processes</b> (M17/18).",
                obj_6: "I-compile ang <b>Portfolio</b> (M13/15) at isulat ang huling <b>Refleksyon</b> (M19).",

                // Lesson 1 Content
                aralin1_title: "Aralin 1: Batayan sa Batas, Etika, at Patakaran (M1-M8)",
                aralin1_m1_title: "M1: Immersion: Kalikasan at Legal na Batayan",
                aralin1_m1_p1: "Ang <b>Immersion</b> ay isang <b>mandatoryong</b> asignatura sa Senior High School batay sa <b>DepEd Order No. 30 s. 2017</b>. Nagbibigay ito ng hands-on experience o work simulation kung saan ina-apply ng mga mag-aaral ang kasanayan na may kaugnayan sa kanilang track. Ito ay isang pangunahing <b>kinakailangan para sa pagtatapos</b>.",
                aralin1_m1_l1: "Ang Latin root na <i>mergere</i> (\"sumisid\") ay nagbibigay-diin sa <b>pagiging ganap na bahagi</b> ng sitwasyon sa trabaho.",
                aralin1_m1_l2: "Ang layunin ay maging <b>pamilyar sa lugar ng trabaho</b> at makilahok sa <b>employment simulation</b>.",
                
                aralin1_m2_title: "M2: Work Ethics (Etika sa Trabaho)",
                aralin1_m2_p1: "Ang <b>Work Ethic</b> ay ang paniniwala na ang trabaho ay mahalaga at moral na mabuti. Ang isang matibay na work ethic ay binubuo ng sipag, propesyonalismo, at mapagkakatiwalaang resulta, na nakabatay sa mga katangian:",
                aralin1_m2_l1: "<b>Integridad:</b> Paggawa ng tama sa lahat ng oras, kahit walang nakakakita.",
                aralin1_m2_l2: "<b>Time Management:</b> Pagiging punctual, magandang record ng pagdalo, at pagsunod sa deadlines.",
                aralin1_m2_l3: "<b>Respeto:</b> Pagpapakita ng patas na pagtrato sa iba at pag-iwas sa tsismis/nakakasamang usapan.",

                aralin1_m3_title: "M3: Kaligtasan sa Lugar ng Trabaho",
                aralin1_m3_p1: "Ang <b>Workplace Safety (M3)</b>, sa ilalim ng <b>RA 11058</b>, ay sumasaklaw sa mga patakaran at pamamaraan para sa kalusugan ng mga manggagawa. Responsibilidad ng employer na magbigay ng <b>ligtas na kapaligiran</b> at <b>protective equipment</b> (PPE). Responsibilidad ng manggagawa ang magtrabaho nang ligtas at iwasan ang pinsala sa iba.",

                aralin1_m4_title: "M4: Karapatan at Responsibilidad sa Lugar ng Trabaho",
                aralin1_m4_p1: "Mahalagang maunawaan ang mutual na karapatan at tungkulin sa pagitan ng <b>Employer</b> (responsable para sa mga entitlements tulad ng minimum wage, ligtas na kapaligiran, at kalayaan mula sa bullying) at ng <b>Manggagawa</b> (responsable para sa pag-alam ng kanilang oras, entitlements, at pagpapanatili ng kaligtasan).",

                aralin1_m5_title: "M5: Kompidensyalidad sa Lugar ng Trabaho at NDA",
                aralin1_m5_p1: "Ang <b>Kompidensyalidad</b> ay pinapanatili sa pamamagitan ng hindi pagbabahagi ng <b>trade secrets</b> o internal na impormasyon sa mga kakumpitensya o tagalabas. Ito ay ginagawang pormal sa pamamagitan ng isang <b>Non-Disclosure Agreement (NDA)</b>, isang legal na kontrata.",
                
                aralin1_m6_title: "M6A & M6B: Teamwork Skills at Conflict Resolution",
                aralin1_m6_p1: "Ang <b>Teamwork (M6A)</b> ay kinapapalooban ng pagsasama-sama ng indibidwal na kasanayan upang makamit ang mga layunin, nangangailangan ng <b>aktibong pakikinig</b> at <b>pinagsamang responsibilidad</b>. Ang <b>Conflict Resolution (M6B)</b> ay ang proseso ng pag-aayos ng hindi pagkakasundo. Kasama sa mga teknik ang <b>Joint Decision-Making</b>, <b>Unilateral Decision-Making</b>, at paghingi ng <b>Third-Party Intervention</b>.",

                aralin1_m7_title: "M7: Work Immersion Rules and Regulations",
                aralin1_m7_p1: "Dapat sundin ng mag-aaral ang lahat ng opisyal na **Work Immersion Rules** (guidelines sa tamang kilos tulad ng pagsusuot ng uniporme, pagiging punctual) at <b>Regulations</b> (mga patakaran na awtorisado ng gobyerno, tulad ng mandatoryong pahintulot ng magulang at kinakailangang total hours).",

                aralin1_m8_title: "M8: Terms and Conditions sa Memorandum of Agreement (MOA)",
                aralin1_m8_p1: "Ang MOA ay nagdetalye ng <b>Pinagsamang Responsibilidad</b> ng paaralan at partner institution (hal. pagbuo ng joint working group, pagsunod sa child protection laws, pagbuo ng Immersion module) upang masiguro ang tagumpay ng programa.",


                // Lesson 2 Content
                aralin2_title: "Aralin 2: Dokumento at Kahandaan sa Trabaho (M9-M13)",
                aralin2_m9_title: "M9: Pagsulat ng Resume",
                aralin2_m9_p1: "Ang **Resume** ay isang dokumento na ginagamit upang ipakita ang background, kasanayan, edukasyon, at mga kaugnay na achievement ng isang tao upang makakuha ng placement. Karaniwan itong sumusunod sa isang malinaw at basic na template na nakatuon sa karanasan sa trabaho, edukasyon, at kasanayan.",
                
                aralin2_m10_title: "M10: Application Letter / Application Forms",
                aralin2_m10_p1: "Ang **Application Form** ay isang standardized tool na ginagamit ng mga kumpanya upang mangolekta ng mahahalagang impormasyon (availability, nakaraang kasaysayan, salary requirements). Dapat itong mapunan nang **tama at kumpleto**.",
                
                aralin2_m11_title: "M11: Credentials: Barangay Clearance, Police Clearance, Medical Certificate",
                aralin2_m11_p1: "Ito ang mga pre-immersion document na kinakailangan para sa legal clearance at health certification:",
                aralin2_m11_l1: "<b>Barangay Clearance:</b> Nagpapatunay ng residency at good standing (nangangailangan ng Cedula).",
                aralin2_m11_l2: "<b>Police Clearance:</b> Mahalaga para sa trabaho upang masiguro na walang criminal record (nangangailangan ng personal appearance).",
                aralin2_m11_l3: "<b>Medical Certificate:</b> Nagpapatunay na ang indibidwal ay physically at medically fit para sa trabaho/immersion.",
                
                aralin2_m12_title: "M12: Job Interview Skills Training",
                aralin2_m12_p1: "Ang **Job Interview** ay isang pormal na pag-uusap upang suriin ang pagiging angkop ng aplikante. Ang mga pangunahing kasanayan na dapat makuha ay: **Communication**, **Critical Thinking**, **Organizational Skills**, **Interpersonal Skills**, at **Multi-Tasking Skills**.",
                
                aralin2_m13_title: "M13: Daily Time Record (DTR)",
                aralin2_m13_p1: "Ang **DTR** ay isang pangunahing Immersion Proper document na ginagamit upang tumpak na subaybayan ang **Daily Work Accomplishment** at **attendance record** ng mag-aaral, na nagpapatunay sa kabuuang bilang ng oras na nakumpleto.",


                // Lesson 3 Content
                aralin3_title: "Aralin 3: Proseso at Refleksyon (M14-M19)",
                aralin3_m14_title: "M14 & M16: Management Processes (Profile ng Kumpanya)",
                aralin3_m14_p1: "Ang <b>Management Process</b> ay nangangailangan sa mag-aaral na i-profile ang organizational structure ng partner institution. Dapat interbyuhin ng mag-aaral ang mga supervisor at ilarawan ang **Nature of Business**, **Organizational Structure**, **Target Clientele**, **Description of Product/Services**, at **Company Rules/Regulations** ng kumpanya.",
                aralin3_m14_p2: "Ang pag-unawa sa mga elementong ito ay nagbibigay ng komprehensibong pagpapahalaga sa kung paano gumagana at pinamamahalaan ang kumpanya.",
                
                aralin3_m17_title: "M17 & M18: Business Processes (Operational Profile)",
                aralin3_m17_p1: "Ang <b>Business Process</b> ay nakatuon sa operational at quality control na aspeto ng kumpanya. Dapat ilarawan ng mag-aaral ang mga pamamaraan na may kauhaan sa: **Safety**, **Production**, **Maintenance**, **Quality Control**, **Quality Assurance**, **Customer Satisfaction**, at **Housekeeping and Hygiene**.",
                aralin3_m17_p2: "Ang mga prosesong ito ay nagsisiguro ng operational efficiency at paghahatid ng kalidad na produkto o serbisyo.",
                
                aralin3_m15_title: "M15: Portfolio Content at Packaging",
                aralin3_m15_p1: "Ang <b>Work Immersion Portfolio</b> ay ang huling output na naglalaman ng lahat ng dokumento mula sa tatlong phase: Pre-Immersion (M1-M12), Immersion Proper (M13/DWAR/Diary), at Post-Immersion (Evaluation, Certificates). Ang **Packaging** at pag-oorganisa ng portfolio ay mahalaga para sa final submission.",

                aralin3_m19_title: "M19: Work Immersion Reflection",
                aralin3_m19_p1: "Nagtatapos ang modyul sa pagsulat ng <b>Reflection Paper o Journal</b> ng mag-aaral tungkol sa kanilang mga karanasan sa work immersion. Dapat itong tumuon sa <b>Enhanced Skills</b>, <b>Work Ethics</b>, at <b>Values Learned</b>.",

                // Quiz Labels and Placeholders
                quiz_title: "Pagsasanay",
                quiz_subtitle: "Subukan ang iyong kaalaman sa mga pangunahing konsepto ng Immersion.",
                quiz_section1_title: "A. Pangunahing Kaalaman sa Immersion",
                qa1_label: "1. Tama o Mali: Ang Immersion ay isang elective subject para sa mga mag-aaral ng SHS.",
                qa1_placeholder: "Sagot (Tama o Mali)",
                qa2_label: "2. Anong paniniwala ang nagsasaad na ang trabaho ay mahalaga bilang isang aktibidad at moral na mabuti (M2)?",
                qa2_placeholder: "Sagot",
                qa3_label: "3. Anong legal na kontrata ang nagpoprotekta sa kompidensyal at proprietary na impormasyon ng kumpanya (M5)?",
                qa3_placeholder: "Sagot (Acronym o Buong Pangalan)",
                qa4_label: "4. Anong conflict resolution technique ang nag-iimbita ng tulong mula sa third groups o organizations (M6B)?",
                qa4_placeholder: "Sagot",
                qa5_label: "5. Tama o Mali: Ang pagsisigurado na ang mga manggagawa ay malaya sa bullying ay isang pangunahing responsibilidad ng manggagawa (M4).",
                qa5_placeholder: "Sagot (Tama o Mali)",
                quiz_section2_title: "B. Dokumento at Proseso",
                qa6_label: "6. Anong readiness skill ang sumusuri kung ang aplikante ay dapat i-hire (M12)?",
                qa6_placeholder: "Sagot (Dalawang Salita)",
                qa7_label: "7. Anong dokumento, na nilagdaan ng isang doktor, ang nagpapatunay na ang mag-aaral ay fit para sa trabaho (M11)?",
                qa7_placeholder: "Sagot",
                qa8_label: "8. Anong dokumento ang ginagamit upang subaybayan ang pagdalo at oras ng mag-aaral sa Immersion Proper (M13)?",
                qa8_placeholder: "Sagot (Acronym)",
                qa9_label: "9. Ang Nature of Business at Target Clientele ay mga bahagi ng anong proseso ng kumpanya (M14/M16)?",
                qa9_placeholder: "Sagot",
                qa10_label: "10. Anong proseso ang sumasaklaw sa Quality Control, Production, at Housekeeping (M18)?",
                qa10_placeholder: "Sagot",
                quiz_button: "Tingnan ang Sagot",
                
                // Quiz Results
                quiz_result_excellent: (score, total) => `🎉 Napakahusay! Tama lahat ang iyong sagot (${score}/${total}). Master mo na ang konsepto ng Immersion!`,
                quiz_result_good: (score, total, percentage) => `Magaling! Nakakuha ka ng ${score}/${total} (${percentage}%). Balikan ang Kaligtasan at mga Patakaran sa Lugar ng Trabaho.`,
                quiz_result_fail: (score, total, percentage) => `Kailangan mo pang mag-aral. Nakakuha ka lang ng ${score}/${total} (${percentage}%). Basahin ulit ang buong modyul.`,
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
            const totalQuestions = 10; // Updated to 10!

            // --- Work Immersion Quiz Answers ---
            // Keywords must be fully lowercase, no spaces/punctuation
            const answers = {
                qa1: ['false', 'mali'],        // 1. T/F: Work Immersion is elective. (False - it is mandatory)
                qa2: ['workethic', 'etikasatrabaho'],// 2. Belief that work is valuable (Work Ethic)
                qa3: ['nda', 'nondisclosureagreement', 'kontrata'], // 3. Legal contract for confidentiality (NDA / Non-Disclosure Agreement)
                qa4: ['thirdpartyintervention','thirdparty','intervention','tulong','third','party'], // 4. Seeking third party help (Third-Party Intervention)
                qa5: ['false', 'mali','employer'], // 5. T/F: Freeing workers from bullying is a primary responsibility of the worker. (False - it is the Employer's)
                qa6: ['jobinterview', 'interview'], // 6. Assessing whether applicant should be hired (Job Interview)
                qa7: ['medicalcertificate', 'medical','sertipiko','doktor','certificate'],  // 7. Document signed by doctor (Medical Certificate)
                qa8: ['dtr'], // 8. Document for tracking attendance (DTR)
                qa9: ['managementprocess', 'management','pamamahala'], // 9. Nature of Business/Clientele components of which process (Management Process)
                qa10: ['businessprocess', 'negosyo'], // 10. QC, Production, Housekeeping process (Business Process)
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


        document.getElementById('economics-quiz-form').addEventListener('submit', function(e) {
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